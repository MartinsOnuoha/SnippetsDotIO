<?php


namespace App\Traits;

use App\Notify;
use Auth;

trait Notification
{
    public function getAllNotifications()
    {
        return Auth::user()->notify;
    }
}