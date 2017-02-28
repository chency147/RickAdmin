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
	// 测试页面
	Route::get('/test', 'Admin\LoginController@test');
	// 后台登录页面
	Route::get('/login', 'Admin\LoginController@getIndex')->name('adminLogin');

	// 需要管理员登录才能访问的界面
	Route::group(array(
		'middleware' => 'admin.guest',
	), function () {
		// 后台主页
		Route::get('/', 'Admin\HomeController@getIndex');
		Route::get('/index', 'Admin\HomeController@getIndex');
	});


	// 只允许用Post方式提交的请求
	Route::group(array(
		'middleware' => 'onlyPost',
	), function () {
		// 后台执行登录操作
		Route::post('/login', 'Admin\LoginController@postIndex');
		// 后台执行登出操作
		Route::post('/logout', 'Admin\LogoutController@postIndex');
	});
});
/* 管理员后台路由 END */
