<?php

namespace App\Http\Controllers;

use App\Futball;
use Illuminate\Http\Request;

class FutballController extends Controller
{
    public function getAll()
    {
        $futball = Futball::all();
        return $futball;

    }
}
