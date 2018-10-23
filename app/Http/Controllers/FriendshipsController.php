<?php

namespace App\Http\Controllers;

use Auth;
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
        return Auth::user()->addFriend($id);
    }

    // Accept Friend
    public function acceptFriend($id)
    {
        // Send notifications and all
        return Auth::user()->acceptFriend($id);
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
}
