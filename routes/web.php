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

Route::get('/', function () {
    return view('welcome');
});
Auth::routes(['verify' => true]);
Route::get('2fa', 'TwoFactorController@showTwoFactorForm');
Route::post('2fa', 'TwoFactorController@verifyTwoFactor');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('hello',function(){
    return "This is a hello";
})->middleware('verified');

Route::group(['namespace' => 'Admin'], function () {
    Route::get('/in',function(){
        return "this is insede in";
    });
});




// Route::get('')
Route::get('/test',function() {

	return "i am returning";
})->middleware('role:admin','auth');
