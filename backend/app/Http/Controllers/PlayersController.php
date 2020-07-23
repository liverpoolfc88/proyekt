<?php

namespace App\Http\Controllers;
use App\Players;
use Illuminate\Http\Request;

class PlayersController extends Controller
{
    public function index()
    {
        $oyinchi = Players::paginate(4);
        return view('players.players', compact('oyinchi'));
    }

    public function insert(Request $request){

        $player = new Players();
        $player->name = $request->input('name');
        $player->clubs = $request->input('clubs');
        $player->age = $request->input('age');
        $player->country = $request->input('country');
        $player->save();
        $request->session()->flash('ok','O\'yinchi saqlandi');
        return redirect('player');
    }
}
