<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    protected $fillable = ['event_id', 'material_name', 'type', 'link', 'extension', 'slider'];
}
