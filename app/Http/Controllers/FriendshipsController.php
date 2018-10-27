<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use App\Notify;

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
        $resp = Auth::user()->addFriend($id);

        // Notify Receiver
        Notify::create([
            'user_id' => $id,
            'type' => 'info',
            'title' => 'New connection request',
            'message' => Auth::user()->name . ' wants to connect with you'
        ]);
        
        // Notify Sender
        Notify::create([
            'user_id' => Auth::user()->id,
            'type' => 'info',
            'title' => 'Connection request sent',
            'message' => 'You have sent a request to ' . User::find($id)->name
        ]);

        // Sending Email, Notifications, Broadcast
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

    // Cancel Connection request
    public function CancelRequest($id)
    {
        return Auth::user()->CancelPendingRequest($id);
    }

    // Get Pending Request
    public function getPendingConnections()
    {
        return Auth::user()->getPendingRequests();
    }
}
