<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = ['question', 'type'];
    public function events(){
        return $this->belongsToMany('App\Event');
    }
    public function answers(){
        return $this->hasMany('App\Answer');
    }
}
