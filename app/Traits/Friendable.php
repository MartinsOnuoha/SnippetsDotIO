<?php

namespace App\Traits;

use App\Friendship;

trait Friendable
{

    // Add Friend
    public function add_friend($user_requested_id)
    {
        $Friendship = Friendship::create([
            'requester' => $this->id,
            'user_requested' => $user_requested_id
        ]);

        if($Friendship) {
            return response()->json($Friendship, 200);
        }
        return response()->json('Failed', 501);
    }


    // Accept Friend
    public function accept_friend($requester)
    {
        $friendship = Friendship::where('requester', $requester)
                                ->where('user_requested', $this->id)
                                ->first();
        
        if($friendship) {
            $friendship->update([
                'status' => 1,
            ]);

            return response()->json($friendship, 200);
        }

        return response()->json('failed', 501);
    }


    // Get All Friends
    public function get_friends()
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

    // Pending Requests
    public function get_pending_requests()
    {
        $pending_friends = array();

        $friendships = Friendship::where('status', 0)
                                ->where('user_requested', $this->id)
                                ->get();

        foreach ($friendships as $friendship):
            array_push($pending_friends, \App\User::find($friendship->requester));
        endforeach;

        return $pending_friends;
    }
    
}