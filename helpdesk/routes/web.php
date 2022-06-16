<?php

use Illuminate\Support\Facades\Route;
use App\Count;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Http\Controllers\AuthController;
use App\Http\Middleware\EnsureTokenIsValid;

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


Route::get('/verticalColumn','HomeController@verColumn');


// Route::get('/dashboard','DashboardController@index');


Route::get('/login','AuthController@index');
// Route::post('custom-login', [AuthController::class, 'customLogin'])->name('login.custom');
// Route::get('signout', [AuthController::class, 'signOut'])->name('signout');
// // Route::get('dashboard', [AuthController::class, 'dashboard']); 
Route::post('custom-login','AuthController@customLogin')->name('login.custom'); 
Route::get('signout','AuthController@signOut');
Route::group(['middleware' => ['web','EnsureTokenIsValid']], function () {
    Route::get('/','HomeController@index');
    Route::get('/welcome','HomeController@index'); 
    Route::get('/dashboard','DashboardController@index')->name('dashboard');
    Route::get('/dashboard_aadk','DashboardController@aadk');
    Route::get('/dashboard_hsnz','DashboardController@hsnz');
});