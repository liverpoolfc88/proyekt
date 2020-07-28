<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\File;

class FileController extends Controller
{

    public function upload(Request $request){
//        $result = ['succes'=>true];
//
//        if ($request->fupload){
//            $file = $request->fupload;
//
//            $ext = $file->getClientOriginalExtension();
//            $filename = $file->getClientOriginalName();
//            $mime = $file->getClientMimeType();
//            $size = $file->getClientSize();
//
//            try{
//                $file->move('images',$filename);
//                $newFile = [
//                  'name' => $filename,
//                  'ext' => $ext,
//                  'mime' => $mime,
//                  'size' => $size
//                ];
//                File::create($newFile);
//            } catch (Exeption $e){
//                $result['succes'] = false;
//                $result['error'] = $e->getMessage();
//            }
//        }
//        return response()->json($result);
        return 'saqlandi';
    }
}
