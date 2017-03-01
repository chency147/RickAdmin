<?php
/**
 * 模块控制器
 *
 * User: rick
 * Date: 17-3-1
 * Time: 下午4:49
 */

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\Module;
use App\Traits\AdminControllerTrait;

class ModuleController extends Controller {
	use AdminControllerTrait;

	/**
	 * 构造方法
	 */
	public function __construct() {
		parent::__construct();
	}

	/**
	 * 模块列表页面
	 */
	public function getModuleIndex() {
		$module = new Module();
		$module->getList(array(
			'parent_id' => 0
		), array(
			'module_id', 'code', 'name', 'icon', 'sort', 'is_show'
		), array(
			array('sort', 'desc')
		), 10);
	}
}
