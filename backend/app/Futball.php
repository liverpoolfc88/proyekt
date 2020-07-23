<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Futball extends Model
{
    protected $table = 'futballs';
    protected $fillable = array('name','adres','tel');
}
