<?php

namespace App;
use App\Traits\Snippeter;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
	use Snippeter;

    protected $fillable = ['location', 'about', 'user_id', 'industry', 'website', 'talent', 'phone'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
