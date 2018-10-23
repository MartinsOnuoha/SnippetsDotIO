<?php

namespace App\Traits;

use App\User;
/**
 * Trait to handle Talents related methods for AJAX CALLS
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
    }
}
