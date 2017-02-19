<?php
/**
 * Get参数检测中间件
 * 只允许Post参数传进，如若存Get参数，直接拦截
 *
 * User: rick
 * Date: 17-2-19
 * Time: 下午9:01
 */
namespace App\Http\Middleware;

use App\Exceptions\ContainsGetDataException;
use Closure;


class OnlyPost {
	/**
	 * 中间件处理方法
	 *
	 * @param \Illuminate\Http\Request $request
	 * @param \Closure $next
	 * @return mixed
	 * @throws ContainsGetDataException
	 */
	public function handle($request, Closure $next) {
		if (!empty($_GET)) {
			throw new ContainsGetDataException(trans('exception.contains_get_data'));
		}
		return $next($request);
	}
}