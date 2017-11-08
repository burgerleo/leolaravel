<?php

use Illuminate\Http\Request;

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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::group(['prefix'=>'v1'],function(){
	Route::resource('lessons'  ,'LessonController');
});

// $api = app('Dingo\Api\Routing\Router');

// $api->version('v3', function ($api) { //跟laravel route不同，要完整的namespace路徑

// });

//這句接管路由
$api = app('Dingo\Api\Routing\Router');

$api->version('v1', function ($api) {
    $api->get('/hello/', function () {
        return "hello";
    });
		Route::group(['prefix'=>'v1'],function(){
		Route::resource('lessons'  ,'LessonController');
	});
	$api->post('login', 'App\Http\Controllers\Api\Auth\LoginController@login');
	$api->post('register', 'App\Http\Controllers\Api\Auth\RegisterController@register');
});
