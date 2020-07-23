<?php

namespace App\Http\Controllers;
use App\Clubs;

use Illuminate\Http\Request;
use yii\data\Pagination;

class PaginationController extends Controller
{
    public function fut()
    {
//      $futbol = Clubs::all();
      $futbol = Clubs::paginate(4);
        return view('pagination', compact('futbol'));
    }
}
