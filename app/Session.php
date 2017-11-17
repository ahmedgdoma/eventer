<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Session extends Model
{
    protected $fillable = ['speaker_id', 'duration', 'start_time', 'title', 'event_id'];
    public function speaker(){
        return $this->belongsTo('App\Speaker');
    }
    public function users(){
        return $this->belongsToMany('App\User');
    }
}
