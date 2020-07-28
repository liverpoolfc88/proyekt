<?php

namespace App\Http\Controllers;

use App\Futball;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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


        return $model->id;
    }

    public function updateFile(Request $request, $id)
    {
        $file = $request->file('files');
        $object_id = $id;

        $filename = time() . rand();
        Storage::putFileAs(
            'players',
            $file,
            $filename
        );
        $file = Futball::where('id', $id);
        $file->img = $file->getClientOriginalName();
        $file->physical_name = $filename;
        $file->save();

        return "nima boldi";
    }
}
