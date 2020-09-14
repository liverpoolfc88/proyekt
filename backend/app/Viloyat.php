<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Viloyat extends Model
{
    public function shaxar()
	{
		return $this->hasMany('App\Shaxar', 'viloyat_id', 'id');
    }
}
