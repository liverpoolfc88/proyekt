<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shaxar extends Model
{
    public function viloyat()
	{
		return $this->hasOne('App\Viloyat', 'id', 'viloyat_id');
    }
    public function maxalla()
	{
		return $this->hasMany('App\Maxalla', 'tuman_id', 'id');
    }
}
