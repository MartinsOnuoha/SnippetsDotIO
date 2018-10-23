<?php

namespace App\Traits;

use App\User;
/**
 * Trait to handle Investor related methods for AJAX CALLS
 */
trait Talent
{
    // Get all talents
    public function getAllInvestors()
    {
        $investor = User::where('user_type', 'investor')->get();

        return $investor;
    }
}
