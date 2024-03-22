<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','icon','oneword','comment','token'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function service(){
        return $this->hasMany('App\Service');
    }

    public function request(){
        return $this->hasMany('App\Request');
    }

    public function bookmark(){
        return $this->hasMany('App\Bookmark');
    }

    public function sendPasswordResetNotification($token)
    {
    $this->notify(new \App\Notifications\PasswordResetNotification($token));
    }


}
