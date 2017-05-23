<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Flavour extends Model
{
    public $timestamps = false;

     public function recipe()
     {
     	return $this->belongsToMany('App\Recipe','ingredients','flavour_id','recipe_id')->withPivot('ml_mixer','ml_singles');
     }
}
