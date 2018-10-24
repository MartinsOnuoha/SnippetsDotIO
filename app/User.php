<?php

namespace App;

use App\Traits\Friendable;
use App\Traits\Investor;
use App\Traits\Talent;
use App\Traits\Snippeter;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
    use Friendable;
    use Investor;
    use Talent;
    use Snippeter;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'gender', 'avatar', 'slug', 'user_type'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function profile()
    {
        return $this->hasOne('App\Profile');
    }

    public function friends()
    {
        return $this->hasMany('App\Friendship');
    }

    public function notifications()
    {
        return $this->hasMany('App\Notification');
    }
}
