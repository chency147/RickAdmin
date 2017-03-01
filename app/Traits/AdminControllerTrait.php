<?php
/**
 * Admin系列控制器特性
 *
 * User: rick
 * Date: 17-2-27
 * Time: 下午4:01
 */

namespace App\Traits;


use App\Models\Module;

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
		// 从URL中确定控制器和操作
		$request = request();
		$controller = $request->segment(2, 'index');
		$action = $request->segment(3, 'index');

		// 加载侧边栏数据
		if ($view != 'login') {
			$module = new Module();
			$data['menuData'] = $module->getMenuData($controller, $action);
			$data['controller'] = $controller;
			$data['action'] = $action;
		}
		$theme = config('admin_theme');
		if (empty($theme)) {
			$theme = 'admin';
		}
		return view("$theme/$view", $data, $mergeData);
	}
}