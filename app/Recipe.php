<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
     public function user()
     {
     	return $this->belongsTo('App\User');
     }

     public function flavour()
     {
     	return $this->belongsToMany('App\Flavour','ingredients','recipe_id','flavour_id')->withPivot('ml_mixer','ml_singles');
     }

}
