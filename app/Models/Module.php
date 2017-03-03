<?php
/**
 * 模块Model
 *
 * User: rick
 * Date: 17-2-28
 * Time: 下午6:43
 */

namespace App\Models;

use App\Tools\ArrayFilter;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;

class Module extends BaseModel {
	protected $table = 'module';
	protected $primaryKey = 'module_id';

	protected $fillable = array(
		'parent_id', 'code', 'name', 'icon', 'controller', 'action', 'sort',
		'created_at', 'updated_at'
	);

	// 创建时必需的字段
	private $_createFieldsNeed = array(
		'code', 'name', 'icon', 'controller', 'action',
	);

	/**
	 * 创建模块或者操作
	 *
	 * @param array $moduleData
	 * @return array
	 */
	public function create(array $moduleData) {
		$moduleData = ArrayFilter::doFilter($moduleData, $this->_createFieldsNeed);
		$this->fill($moduleData);
		try {
			$this->save();
			return array(
				'result'    => true,
				'module_id' => $this->getAttribute($this->primaryKey)
			);
		} catch (QueryException $e) {
			return array(
				'result' => false,
				'code'   => $e->getCode()
			);
		}
	}

	/**
	 * 修改模块或操作
	 *
	 * @param array $where 查询条件
	 * @param array $moduleData 新的模块或操作信息
	 * @return array
	 */
	public function modify(array $where, array $moduleData) {
		$moduleData['updated_at'] = $_SERVER['REQUEST_TIME'];
		try {
			$result = $this::where($where)->update($moduleData);
			if ($result) {
				return array(
					'result' => true
				);
			} else {
				return array(
					'result' => false
				);
			}
		} catch (QueryException $e) {
			return array(
				'result' => false,
				'code'   => $e->getCode()
			);
		}
	}

	/**
	 * 获取列表
	 *
	 * @param array $where 查询条件
	 * @param array $fields 选定字段
	 * @param array $sorts
	 * @param int $perPage 每页数量
	 * @return \Illuminate\Support\Collection
	 */
	public function getList(array $where = array(), array $fields = array('*'),
							array $sorts = array(), $perPage = 0) {
		$query = DB::table($this->table)
			->where($where)
			->select($fields);
		if (!empty($sorts)) {
			foreach ($sorts as $sort) {
				if (count($sort) == 2) {
					$query->orderBy($sort[0], $sort[1]);
				}
			}
		}
		return $query->paginate($perPage);
	}

	/**
	 * 获取后台侧边菜单的数据
	 *
	 * @param string $controller 控制器
	 * @param string $action 操作
	 * @return array
	 */
	public function getMenuData($controller = null, $action = null) {
		// 判断是不是主页
		$fields = array(
			$this->primaryKey, 'parent_id', 'code', 'name', 'icon', 'controller', 'action', 'sort', 'is_show'
		);
		// TODO 之后要在这里加入权限验证以及缓存
		$query = DB::table($this->table)
			->select($fields)
			->where('is_show', '=', 1)
			->orderBy('parent_id', 'asc')
			->orderBy('sort', 'desc');
		$moduleCollection = $query->get();
		$menuData = array();
		// 菜单数据组装
		foreach ($moduleCollection as $module) {
			if ($module->parent_id == 0) {
				$module->subMenu = array();
				$menuData[$module->module_id] = $module;
				$module->isActive = false;
				continue;
			}
			// 组装子菜单
			$menuData[$module->parent_id]->subMenu[] = $module;
			// 根据操作判断当前页面是否属于该操作
			$module->isActive = $controller == $module->controller && $action == $module->action;
			if ($module->isActive) {
				$menuData[$module->parent_id]->isActive = true;
			}
		}
		return $menuData;
	}
}