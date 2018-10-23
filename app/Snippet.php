<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Snippet extends Model
{
    protected $fillable = [
        'requester', 'user_requested', 'status',
    ];

    public function users(){
    	return $this->belongsToMany('App\User')
    }
}
