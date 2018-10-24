<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use App\Notification;
use Illuminate\Http\Request;

class FriendshipsController extends Controller
{
    public function check($id)
    {
        // If Users are friends
        if(Auth::user()->isFriendsWith($id)) {
            return ['status' => 'friends'];
        }

        // If User has pending request
        if(Auth::user()->hasPendingRequestFrom($id)) {
            return ['status' => 'pending'];
        }

        if(Auth::user()->hasPendingRequestTo($id)) {
            return ['status' => 'waiting'];
        }
 
        return ['status' => 0];
    }

    // Add Friend
    public function addFriend($id)
    {
        // Sending Email, Notifications, Broadcast
        $resp = Auth::user()->addFriend($id);

        Notification::create([
            'receiver' => $id,
            'user_id' => Auth::user()->id,
            'message' => 'You have received a new connection request'
        ]);

        Notification::create([
            'user_id' => $id,
            'receiver' => Auth::user()->id,
            'message' => 'Your request has been sent successfully'
        ]);
        // User::find($id)->notify(new \App\Notifications\NewFriendRequest(Auth::user()));

        return $resp;
    }

    // Accept Friend
    public function acceptFriend($id)
    {
        // Send notifications and all
        $resp = Auth::user()->acceptFriend($id);

        // User::find($id)->notify(new \App\Notifications\FriendRequestAccepted(Auth::user()));

        return $resp;
    }

    // Delete Friend
    public function deleteFriend($id)
    {
        return Auth::user()->deleteFriend($id);
    }

    // Get all Connections
    public function getAllConnections()
    {
        $friends = Auth::user()->getFriends();
        
        return view('user.connections')->with('friends', $friends);
    }

    // Cancle Connection request
    public function cancleRequest($id)
    {
        return Auth::user()->canclePendingRequest($id);
    }

    // Get Pending Request
    public function getPendingConnections()
    {
        return Auth::user()->getPendingRequests();
    }
}
