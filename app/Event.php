<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = ['title', 'description', 'image', 'type',	'attendance','location','code', 'vip_chairs'];

    public function sessions(){
        return $this->hasMany('App\Session');
    }
    public function session(){
        return $this->hasOne('App\Session');
    }
    public function materials(){
        return $this->hasMany('App\Material');
    }

    public function chairs(){
        return $this->hasMany('App\Chair');
    }
    public function users(){
        return $this->hasManyThrough('App\User', 'App\Session', 'event_id', 'session_user.session_id', 'session_user.user_id');
    }
    public function questions(){
        return $this->belongsToMany('App\Question');
    }

}
