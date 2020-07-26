<?php

namespace App\Models;

use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;


class User extends Authenticatable
{
    use Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
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




    public function departments()
    {
        return  $this->belongsToMany('App\Models\Department', 'user_departments')->withTimestamps();
    }


    public function universities()
    {
        return  $this->belongsToMany('App\Models\University', 'user_universities')->withTimestamps();
    }


    public function city()
    {
        return  $this->hasOne('App\Models\City', 'id', 'city_id');
    }


    public function posts()
    {
        return $this->hasMany("Post");
    }
    public function scientificarticles()
    {
        return $this->hasMany("ScientificArticle");
    }


}
