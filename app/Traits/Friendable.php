<?php

namespace App\Traits;

use App\Friendship;
use App\Notify;

trait Friendable
{

    // Add Friend
    public function addFriend($user_requested_id)
    {
        // User should not Add himself
        if ($this->id === $user_requested_id) {
            return 0;
        }
        if ($this->hasPendingRequestTo($user_requested_id) === 1) {
            return response()->json('Request already sent');
        }
        if ($this->isFriendsWith($user_requested_id)) {
            return response()->json('Already Friends with this user');
        }
        if ($this->hasPendingRequestFrom($user_requested_id) === 1) {
            return $this->acceptFriend($user_requested_id);
        }

        $Friendship = Friendship::create([
            'requester' => $this->id,
            'user_requested' => $user_requested_id
        ]);

        if($Friendship) {
            return 1;
        }
        return 0;
    }


    // Accept Friend
    public function acceptFriend($requester)
    {
        if ($this->hasPendingRequestFrom($requester) === 0) {
            return 0;
        }
        $friendship = Friendship::where('requester', $requester)
                                ->where('user_requested', $this->id)
                                ->first();
        
        if($friendship) {
            $friendship->update([
                'status' => 1,
            ]);

            return 1;
        }

        return 0;
    }


    // Get All Friends
    public function getFriends()
    {
        $friends1 = array();

        $f1 = Friendship::where('status', 1)
                        ->where('requester', $this->id)
                        ->get();

        foreach ($f1 as $friendship):
            array_push($friends1, \App\User::find($friendship->user_requested));
        endforeach;

        
        $friends2 = array();

        $f2 = Friendship::where('status', 1)
                        ->where('user_requested', $this->id)
                        ->get();
        
        foreach ($f2 as $friendship):
            array_push($friends2, \App\User::find($friendship->requester));
        endforeach;

        return array_merge($friends1, $friends2);
        
    }


    // Get Pending Requests
    public function getPendingRequests()
    {
        $pending_friends = array();
        $waiting_friends = array();

        $friendships1 = Friendship::where('status', 0)
                                ->where('user_requested', $this->id)
                                ->get();
        foreach ($friendships1 as $friendship):
            array_push($pending_friends, \App\User::find($friendship->requester));
        endforeach;
        

        $friendships2 = Friendship::where('status', 0)
                                ->where('requester', $this->id)
                                ->get();
        foreach ($friendships2 as $friendship):
            array_push($pending_friends, \App\User::find($friendship->user_requested));
        endforeach;



        return array_merge($pending_friends, $waiting_friends);
    
    }
    

    // Get Pending Request IDs
    public function getPendingRequestsIds()
    {
        return collect($this->getPendingRequests())->pluck('id')->toArray();
    }

    // Get Pending Requests sent
    public function getPendingRequestSent()
    {
        $pending_requests = array();

        $friendships = Friendship::where('status', 0)
                                ->where('requester', $this->id)
                                ->get();
        
        foreach ($friendships as $friendship):
            array_push($pending_requests, \App\User::find($friendship->user_requested));
        endforeach;

        return $pending_requests;
    }


    // Get pending Request sent IDs
    public function getPendingRequestSentId()
    {
        return collect($this->getPendingRequestSent())->pluck('id')->toArray();
    }


    // Get only IDs of friends
    public function getFriendsId()
    {
        return collect($this->getFriends())->pluck('id');
    }



    // Check if IsFriendsWith
    public function isFriendsWith($user_id)
    {
        if (in_array($user_id, $this->getFriendsId()->toArray())) {
            # return response()->json('true', 200);
            return 1;
        } else {
            # return response()->json('false', 404);
            return 0;
        }
    }


    // Check if you have a pending request from a User
    public function hasPendingRequestFrom($user_id)
    {
        $pending_req = Friendship::where('status', 0)
                                ->where('requester', $user_id)
                                ->first();

        if ($pending_req) {
            // return response()->json('true', 200);
            return 1;
        } else {
            // return response()->json('false', 404);
            return 0;
        }
    }

    // Check if you have a pending request to a User
    public function hasPendingRequestTo($user_id)
    {
        if (in_array($user_id, $this->getPendingRequestSentId())) {
            return 1;
        } else {
            return 0;
        }
    }

    // Count number of friends
    public function countFriends()
    {
        return count($this->getFriends());
    }

    // Cancel pending Request
    public function CancelPendingRequest($user_requested_id)
    {
        $F1 = Friendship::where('status', 0)
                        ->where('user_requested', $user_requested_id)
                        ->where('requester', $this->id)
                        ->first();

        $F2 = Friendship::where('status', 0)
                        ->where('user_requested', $this->id)
                        ->where('requester', $user_requested_id)
                        ->first();
       
        if ($F1) {
            $F1->delete();
            return 1;
        } else if ($F2) {
            $F2->delete();
            return 1;
        }
        return 0;
    }

    // Unfriend
    public function deleteFriend($user_id)
    {
        $f1 = Friendship::where('status', 1)
                        ->where('user_requested', $user_id)
                        ->where('requester', $this->id)
                        ->first();
        
        $f2 = Friendship::where('status', 1)
                        ->where('user_requested', $this->id)
                        ->where('requester', $user_id)
                        ->first();
        
        if (!$f1 and $f2) {
            $f2->delete();
            return 1;
        } 
        elseif ($f1 and !$f2) {
            $f1->delete();
            return 1;
        }
        elseif (!$f1 and !$f2) {
            return 0;
        }

        return 0;
    }
}