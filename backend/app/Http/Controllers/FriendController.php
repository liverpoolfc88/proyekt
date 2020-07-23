<?php

namespace App\Http\Controllers;

use App\Friend;
use Illuminate\Http\Request;

class FriendController extends Controller
{
   public function getAll()
   {
        $friend = Friend::all();
        return $friend;

   }

   public function add(Request $request)
   {
       $fr = Friend::create($request->all());
       return 'okkk';
   }
   public function get($id)
   {
       $friend = Friend::find($id);
       return $friend;
   }
   public function delete($id)
   {
       $friend = $this->get($id);
       $friend->delete();
       return 'udalit boldi';
   }

   public function update($id, Request $request)
   {
//       odatda update  emas edit bo'ladi'
       $friend = $this->get($id);
       $friend->fill($request->all());
       $friend->save();
       return 'update boldi, uzgardi';
   }
}
