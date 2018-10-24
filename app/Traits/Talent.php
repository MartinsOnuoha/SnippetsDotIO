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
        $investors = User::where('user_type', 'investor')->get();

        return $investors;
    }

    public function getOpportunities()
    {
    	$opportunities = '';
        $investor = User::where('user_type', 'investor')->get();

        return $investor;
    }

    public function isTalent()
    {
        if ($this->user_type === 'talent') {
            return 1;
        } else {
            return 0;
        }
    }
}
