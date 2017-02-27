<?php
/**
 * 后台登录控制器
 *
 * @package App\Http\Controllers\Admin
 */

namespace App\Http\Controllers\Admin;

use App\Models\Admin;
use App\Traits\AdminControllerTrait;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LoginController extends Controller {
	use AdminControllerTrait;
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
		return $this->adminView('login');
	}

	/**
	 * 执行登录操作
	 *
	 * @param Request $request
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function postIndex(Request $request) {
		$this->validate($request, array(
			'username' => 'required',
			'password' => 'required',
		));
		$admin = new Admin();
		$loginResult = $admin->loginCheck($request->get('username'), $request->get('password'));
		// 登录失败情况
		if ($loginResult !== true) {
			return response()->json($loginResult);
		}
		// 保存管理员session
		$session_key = config('custom.admin_session_key');
		$session_info = $admin->getSessionInfo(array(
			'username' => $request->get('username'),
		));
		$request->session()->put($session_key, $session_info);
		return response()->json($this->errorHandler->getError('admin_login_success'));
	}

	public function test(Request $request) {
		echo config('app.locale');
		echo trans('errorCodes.admin_login_success');
		echo "<br />";
		echo trans('validation.accepted');
	}
}
