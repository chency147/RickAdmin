<?php
/**
 * Admin系列控制器特性
 *
 * User: rick
 * Date: 17-2-27
 * Time: 下午4:01
 */

namespace App\Traits;


trait AdminControllerTrait {

	/**
	 * 后台页面展示
	 *
	 * @param string $view 模板名称
	 * @param array $data 携带参数
	 * @param array $mergeData
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function adminView($view = null, $data = array(), $mergeData = array()) {
		$theme = config('admin_theme');
		if (empty($theme)) {
			$theme = 'admin';
		}
		return view("$theme/$view", $data, $mergeData);
	}
}