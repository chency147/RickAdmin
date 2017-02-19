<?php
/**
 * 后台登录控制器
 *
 * @package App\Http\Controllers\Admin
 */

namespace App\Http\Controllers\Admin;

use App\Models\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LoginController extends Controller {
	/**
	 * 构造方法
	 */
	public function __construct() {
		parent::__construct();
	}

	/**
	 * 登录页面
	 *
	 * @param Request $request
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function getIndex(Request $request) {
		return view('admin/login');
	}

	/**
	 * 执行登录操作
	 *
	 * @param Request $request
	 */
	public function postIndex(Request $request) {
		dump($_GET);
		$this->validate($request, array(
			'username' => 'required',
			'password' => 'required',
		));
		$admin = new Admin();

		echo 111;
	}

	public function test(Request $request) {
		$data = array(
			'role_id' => 0,
			'username' => 'chency147',
			'nickname' => 'chency147',
			'password' => '123456',
			'created_ip' => ip2long($request->getClientIp()),
		);
		$admin = new Admin();
		dump($admin->loginCheck('chency147', '123456'));
	}
}
