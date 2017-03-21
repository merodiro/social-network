<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['content'];

    public function user()
    {
        return $this->belongsTO('App\User');
    }

    public function likes()
    {
        return $this->hasMany('App\Like');
    }

    public function getCreatedAtAttribute($value)
    {
        return Carbon::parse($value)->diffForHumans();
    }
}
