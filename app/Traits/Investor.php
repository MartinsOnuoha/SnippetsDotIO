<?php

namespace App\Traits;

use App\User;
use Auth;
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

    // Get user type
    public function isInvestor()
    {
        if ($this->user_type === 'investor') {
            return 1;
        } else {
            return 0;
        }
    }
}
