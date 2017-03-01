<?php
/**
 * 后台登录控制器
 *
 * User: rick
 * Date: 17-2-28
 * Time: 下午3:17
 */

namespace App\Http\Controllers\Admin;

use App\Models\Admin;
use App\Models\Module;
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
		$sessionKey = config('custom.admin_session_key');
		$sessionInfo = $admin->getSessionInfo(array(
			'username' => $request->get('username'),
		));
		$request->session()->put($sessionKey, $sessionInfo);
		return response()->json($this->statusHandler->getStatus('admin_login_success'));
	}

	public function test(Request $request) {
		$module = new Module();
		dd($module->getMenuData());
	}
}
