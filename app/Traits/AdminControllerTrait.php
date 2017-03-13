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
	// 状态码翻译文件
	private $_statusCodesLangFile = 'statusCodes';
	/**
	 * 后台页面展示
	 *
	 * @param string $view 模板名称
	 * @param array $data 携带参数
	 * @param array $mergeData
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function adminView($view = null, $data = array(), $mergeData = array()) {
		$data = $this->generateMenuData($view, $data);
		$theme = config('admin_theme', 'admin');
		return view("$theme/$view", $data, $mergeData);
	}

	/**
	 * 显示错误页面
	 *
	 * @param int $code HTTP错误码
	 * @param string $msg 错误消息
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function errorPage($code = 404, $msg = '') {
		$data = $this->generateMenuData();
		$data['code'] = $code;
		$data['codeMsg'] = trans($this->_statusCodesLangFile.'.http_error_' . $code);
		$data['msg'] = $msg;
		$theme = config('admin_theme', 'admin');
		return response()->view("$theme/error", $data, $code);
	}

	/**
	 * 组装菜单数据
	 *
	 * @param null $view 欲显示页面
	 * @param array $data 原数据
	 * @return array
	 */
	public function generateMenuData($view = null, $data = array()) {
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
		return $data;
	}
}