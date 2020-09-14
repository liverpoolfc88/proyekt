<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Maxalla extends Model
{
    public function tuman()
	{
		return $this->hasOne('App\Tuman', 'id', 'tuman_id');
    }
}
