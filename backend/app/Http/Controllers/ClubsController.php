<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Clubs;

class ClubsController extends Controller
{
	public function index()
	{

		$klubs = Clubs::all();
		// dd($klub);
	    return view('sardor.klublar',compact('klubs'));

	}
	public function club($id)
	{
		$klub = Clubs::find($id);
		// dd($klub);
	    return view('sardor.klub',compact('klub'));
	}
}
