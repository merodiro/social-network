<?php

namespace App;

use App\Traits\Friendable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Scout\Searchable;
use Laravel\Passport\HasApiTokens;
use Storage;

class User extends Authenticatable
{
    use Notifiable, Friendable, Searchable, HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'slug', 'gender', 'avatar'
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

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function posts()
    {
        return $this->hasMany('App\Post');
    }

    public function getAvatarAttribute($avatar)
    {
        return asset(Storage::url($avatar));
    }

    public function getUrlAttribute()
    {
        return route('profile', ['slug' => $this->slug]);
    }
}
