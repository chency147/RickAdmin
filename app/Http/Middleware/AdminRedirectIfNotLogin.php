<?php
/**
 * 管理员检查登录状态中间件
 *
 * User: rick
 * Date: 17-2-28
 * Time: 下午3:17
 */

namespace App\Http\Middleware;


use App\Exceptions\ErrorHandler;
use Illuminate\Http\Request;
use Closure;

class AdminRedirectIfNotLogin {
	/**
	 * 中间件处理方法
	 *
	 * @param Request $request
	 * @param Closure $next
	 * @return mixed
	 */
	public function handle(Request $request, Closure $next) {
		$session_key = config('custom.admin_session_key');
		if ($request->session()->exists($session_key)) {
			return $next($request);
		}
		if ($request->ajax()) {
			// 如果是Ajax请求，则返回未登录的json错误信息
			$errorHandler = ErrorHandler::getInstance();
			return response()->json($errorHandler->getError('admin_not_login'));
		} else {
			// 非Ajax请求直接重定向
			return response()->redirectToRoute('adminLogin');
		}
	}
}