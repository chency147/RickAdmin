<?php
/**
 * 管理员登出控制器
 *
 * User: rick
 * Date: 17-2-28
 * Time: 下午3:40
 */

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LogoutController extends Controller {
	/**
	 * 构造方法
	 */
	public function __construct() {
		parent::__construct();
	}

	/**
	 * 执行登出操作
	 *
	 * @param Request $request
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function postIndex(Request $request) {
		// 删除管理员Session
		$sessionKey = config('custom.admin_session_key');
		$request->session()->forget($sessionKey);
		return response()->json($this->statusHandler->getStatus('admin_logout_success'));
	}
}