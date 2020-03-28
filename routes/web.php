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

Route::group(['namespace' => 'Admin','middleware' => ['role:admin']], function () {
    Route::get('adminall','AdminController@index');

});

Route::group(['namespace' => 'Doctor','middleware' => ['role:doctor']], function () {
    Route::get('adminall2','DoctorController@index');
});

Route::group(['namespace'=>'Patient','middleware' => ['role:patient']],function(){
    Route::get('adminall3','PatientController@index');
});

Route::group(['namespace'=>'Hospital','middleware' => ['role:hospital']],function(){
    Route::get('adminall4','HospitalController@index');
});




// Route::get('')
Route::get('/test',function() {

	return "i am returning";
})->middleware('role:admin','auth');
