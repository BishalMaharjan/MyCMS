<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
// use App\Events\UserCreatedEvent;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens,Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','active', 'activation_token'
    ];

    /**
     * The event map for the model.
     *
     * @var array
     */
    // protected $dispatchesEvents = [
    //     'created ' => UserCreatedEvent::class,

    // ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token', 'activation_token'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    // protected $table = 'users';

    //protected $fillable = ['name', 'email', 'email_verified_at', 'password', 'remember_token'];

    public function getDates()
    {
        return ['email_verified_at'];
    }

    public function bookmarks()
    {
        return $this->hasMany('App\Bookmarks', 'user_id', 'id');
    }

    public function contents()
    {
        return $this->hasMany('App\Contents', 'user_id', 'id');
    }

    public function rolePivots()
    {

        return $this->hasMany('App\RolePivots', 'user_id', 'id');
    }

    public function roles()
    {
        return $this->belongsToMany('App\Roles');
    }
}
