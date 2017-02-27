<?php
/**
 * 管理员后台主页控制器
 *
 * User: rick
 * Date: 17-2-27
 * Time: 下午3:03
 */

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Traits\AdminControllerTrait;
use Illuminate\Http\Request;

class HomeController extends Controller {
	use AdminControllerTrait;
	/**
	 * 构造方法
	 */
	public function __construct() {
		parent::__construct();
	}

	/**
	 * 主页
	 * @param Request $request
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function getIndex(Request $request) {
		return $this->adminView('index');
	}
}