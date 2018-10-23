<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Snippet extends Model
{
    protected $fillable = [
        'snippetdetails', 'snippetags', 'snippetfile', 'file_type','user_id', 'file_extension', 'user_name', 'user_slug',
    ];

    public function users(){
    	return $this->belongsToMany('App\User');
    }
}
