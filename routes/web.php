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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::group(['prefix'=>'view'],function(){
	Route::resource('/' ,'adminController');
});

Route::group(['middleware' => 'jwt.auth'], function () {

	Route::get('view/date' ,'adminController@date');

});

Route::group(['prefix'=>'log'],function(){
	Route::resource('/' ,'LogController');
});
