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

Route::get('/phpinfo', function () {
	echo phpinfo();
});

Route::get('/guid', function () {
	require __DIR__ . '/../app/Tools/GUID.php';
	echo \app\Tools\GUID::generate();
});

/* 管理员后台路由 BEGIN */
Route::group(array(
	'prefix' => '/admin',
), function () {
	// 后台登录页面
	Route::get('/login', 'Admin\LoginController@getIndex');
	// 后台主页
	Route::get('/', 'Admin\HomeController@getIndex');
	Route::get('/index', 'Admin\HomeController@getIndex');

	Route::get('/test', 'Admin\LoginController@test');
});

Route::group(array(
	'prefix' => '/admin',
	'middleware' => 'onlyPost',
), function () {
	// 后台执行登录操作
	Route::post('/login', 'Admin\LoginController@postIndex');
});
/* 管理员后台路由 END */
