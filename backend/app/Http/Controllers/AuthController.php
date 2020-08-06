<?php

namespace App\Http\Controllers;

use app\modules\nextadmin\components\paycom\Paycom\Response;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Str;
use Hash;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api')->only('logout');
    }

    public function register(Request $request){
//        $this->validate($request,[
//            'name' => 'required|max:255',
//            'email' => 'required|email|unique:users',
//            'password' => 'required|between:6.25|confirmed'
//        ]);

        $user = new User($request->all());
        $user->password = bcrypt($request->password);
        $user->save();

        return response()->json([
           'success'=>true
        ]);
    }

    public function login(Request $request){
//        $this->validate($request,[
//
//            'email' => 'required|email',
//            'password' => 'required|between:6.25'
//        ]);
        $email = $request->input('email');
        $user = User::where('email', $email)->first();

        if ($user && Hash::check($request->input('password'), $user->password)){
           $user->api_token = Str::random(60);
           $user->save();

           return response()->json([
               'success' => true,
               'user_id' => $user->id,
               'api_token' => $user->api_token,
               'name' => $user->name,
           ]);
        }
        return response()->json([
            'errors' =>[
                'email' => 'YOOOOOOQQQQ'
            ],
        ]);
    }

    public  function logout(Request $request){
        $user = $request->user();
        $user->api_token = null;
        $user->save();

        return response()->json([
            'success'=>true
        ]);
    }
}
