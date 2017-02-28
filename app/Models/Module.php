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
		'parent_id', 'code', 'name', 'icon', 'controller', 'action',
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
		if ($perPage > 0) {
			return $query->paginate($perPage);
		} else {
			return $query->get();
		}
	}
}