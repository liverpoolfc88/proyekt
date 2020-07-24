<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::post('login', 'API\UserController@login');
Route::post('register', 'API\UserController@register');
Route::group(['middleware' => 'auth:api'], function(){
    Route::post('details', 'API\UserController@details');
});


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('dost','FriendController@getAll')->name('getAll');
Route::post('dost','FriendController@add')->name('add');

Route::get('dost/{id}','FriendController@get')->name('get');
Route::get('dost/delete/{id}','FriendController@delete')->name('delete');
Route::post('dost/{id}','FriendController@update')->name('update');


Route::get('futball','FutballController@getAll');
Route::delete('futball_delete/{id}','FutballController@delete');

// plareys
Route::post('update_player','FutballController@update');

