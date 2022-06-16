<?php

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

Auth::routes();

Route::get('/', function () {
	if(Auth::guest()){
    	return view('welcome');
	}else{
		return redirect('/home');
	}
});


Route::get('/home', function(){
	return redirect(action('\Kordy\Ticketit\Controllers\TicketsController@index'));
});

Route::get('test', function(){
	$users = DB::select('select * from users');
return view('test',['users'=>$users]);
});
