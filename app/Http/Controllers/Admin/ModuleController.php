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
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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
		$moduleList  = $module->getList(array(
			'parent_code' => null
		), array(
			'code', 'name', 'icon', 'sort', 'is_show',
		), array(
			array('sort', 'desc'),
		), 10);
		return $this->adminView('module.index', array(
			'moduleList' => &$moduleList
		));
}

	/**
	 * 模块编辑页面
	 *
	 * @param Request $request
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function getModuleEdit(Request $request) {
		$validator = Validator::make($request->all(), array(
			'code' => 'required'
		));
		if ($validator->fails()) {
			echo 'Fuck';
		}
		/*
		$this->validate($request, array(
			'code' => 'required|integer'
		));
		*/
		$module = new Module();
		$module = $module->getInfo(array(
			'code' => $request->get('code'),
		));
		return $this->adminView('module.edit', array(
			'module' => &$module
		));
	}

	/**
	 * 执行模块编辑
	 *
	 * @param Request $request
	 */
	public function postModuleEdit(Request $request) {
		$this->validate($request, array(
			'origin_code' => 'required',
			'code' => 'required',
			'sort' => 'numeric',
			'is_show' => 'between:0,1',
		));
	}
}
