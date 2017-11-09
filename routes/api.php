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

// Route::group(['prefix'=>'v1'],function(){
// 	Route::resource('lessons'  ,'LessonController');
// });

// $api = app('Dingo\Api\Routing\Router');

// $api->version('v3', function ($api) { //跟laravel route不同，要完整的namespace路徑

// });

//這句接管路由
$api = app('Dingo\Api\Routing\Router');

$api->version('v1', function ($api) {
    $api->get('/hello/', function () {
        return "hello";
    });
 	$api->get('test', function () {
        throw new Symfony\Component\HttpKernel\Exception\NotFoundHttpException('沒有資料');
    });
	$api->group(['namespace' => 'App\Http\Controllers','prefix'=>'v1'],function($api){
		$api->resource('lessons'  ,'LessonController');

	});
	$api->get('showDD', 'App\Http\Controllers\LessonController@showDD');

	$api->post('login', 'App\Http\Controllers\LoginController@login');
	$api->post('register', 'App\Http\Controllers\RegisterController@register');

	// Route::group(['middleware' => 'api.auth'], function ($api) {
	//     Route::get('user', 'UsersController@index');
	//     Route::get('tw', 'UsersController@tw');
	// });

    $api->group(['namespace' => 'App\Http\Controllers\Api','middleware' => 'jwt.auth'], function ($api) {
        $api->get('user', 'UsersController@index');
        $api->get('tw', 'UsersController@tw');
    });  

    $api->get('logout', 'App\Http\Controllers\LoginController@logout');    //登出

    // throw new Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException([],'沒有資料',null,3);

   
});