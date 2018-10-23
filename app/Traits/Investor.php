<?php

namespace App\Traits;

use App\User;
/**
 * Trait to handle Investor related methods for AJAX CALLS
 */
trait Investor
{
    // Get all talents
    public function getAllTalents()
    {
        $talents = User::where('user_type', 'talent')->get();

        return $talents;
    }
}
