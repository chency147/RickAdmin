<?php
/**
 * 模块Model
 *
 * User: rick
 * Date: 17-2-28
 * Time: 下午6:43
 */

namespace App\Models;

use Illuminate\Database\QueryException;

class Module extends BaseModel {
	protected $table = 'admin';
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
				'result'   => true,
				'module_id' => $this->getAttribute($this->primaryKey)
			);
		} catch (QueryException $e) {
			return array(
				'result'   => false,
				'code' => $e->getCode()
			);
		}
	}

	/**
	 * 修改模块或操作
	 *
	 * @param array $where 查询条件
	 * @param array $moduleData 新的模块或操作信息
	 */
	public function modify(array $where, array $moduleData) {
	}
}