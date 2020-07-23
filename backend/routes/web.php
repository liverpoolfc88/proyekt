<?php

use Illuminate\Support\Facades\Route;
use App\Clubs;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route:: get('/clublar', 'ClubsController@index');
Route:: get('/clublar/{klub}', 'ClubsController@club');

Route:: get('/adres', 'PostsController@index');
Route:: get('/futbol', 'PaginationController@fut');

Route:: get('/player', 'PlayersController@index');
Route:: post('/playerinsert', 'PlayersController@insert');


// Route::get('clublar', function() {
// 	// $klubs = DB::table('clubs')->get();
// 	$klubs = Clubs::all();
// 	// dd($klub);
//     return view('sardor.klublar',compact('klubs'));
// });


// Route::get('clublar/{klub}', function($id) {
// 	// $klub = DB::table('clubs')->find($id);
// 	$klub = Clubs::find($id);
// 	// dd($klub);
//     return view('sardor.klub',compact('klub'));
// });




Route::get('sardor', function () {

	// 3-usul
	$name='Dehqonov';
    return view('sardor.liverpoolfc',compact('name'));

	// 2-usul

    // return view('sardor.liverpoolfc')->with('name','Dehqonov');

    // 1-usul

    // return view('sardor.liverpoolfc',[
    // 	'name'=> 'Dehqonov'

    // ]);

});

Route::get('dilshod', function () {

	$player = [
		'Villian',
		'Abraham',
		'Ceppa'
	];

    return view('sardor.chelseafc',compact('player'));

});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
