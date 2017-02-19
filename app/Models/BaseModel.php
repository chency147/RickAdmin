<?php
/**
 * 基础模型
 *
 * User: rick
 * Date: 17-2-7
 * Time: 下午1:11
 */

namespace App\Models;


use App\Exceptions\ErrorHandler;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class BaseModel extends Model {
	protected $errorHandler = null;
	// 默认使用时间戳戳功能
	public $timestamps = true;
	// 使用Unix时间戳格式记录时间
	protected $dateFormat = 'U';

	/**
	 * 构造方法
	 *
	 * @param array $attributes
	 */
	public function __construct(array $attributes = []) {
		parent::__construct($attributes);
		$this->errorHandler = ErrorHandler::getInstance();
	}

	/**
	 * 获取信息
	 *
	 * @param array $where 查询条件，key表示列名，value表示值，运算符号为等号
	 * @param array $columns 选择列
	 * @return $this
	 */
	public function getInfo(array $where, array $columns = array('*')) {
		return $this::where($where)->first($columns);
	}
}