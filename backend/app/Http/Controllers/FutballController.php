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
    public function delete($id)
    {
        $futball = Futball::findOrFail($id);
        $futball->delete();

        return "delete ishladi!";
    }

    public function update(Request $request)
    {
        $model = Futball::find($request->input('id'));
        if(!$model){
            $model = new Futball();
//            $model->created_by = Auth::id();
        }
        else{
//            $model->updated_by = Auth::id();
        }
        $model->name = $request->input('name');
        $model->age = $request->input('age');
        $model->rating = $request->input('rating');
        $model->country = $request->input('country');
        $model->youtube_link = $request->input('youtube_link');
        $model->number = $request->input('number');
        $model->save();


        return "delete ishladi!";
    }
}
