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


    public function addFriend($id)
    {
        // sending Notifications, Emails. broadcasting.
        return Auth::user()->addFriend($id);
    }
}
