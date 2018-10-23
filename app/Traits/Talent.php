<?php

namespace App\Traits;

use App\User;
/**
<<<<<<< HEAD
 * Trait to handle Talents related methods for AJAX CALLS
=======
 * Trait to handle Investor related methods for AJAX CALLS
>>>>>>> 2562a9aeb9139a32ffeafff0cdc299d79f7dbdc1
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
}
