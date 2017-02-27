<?php
/**
 * 管理员模型
 *
 * User: rick
 * Date: 17-2-6
 * Time: 下午9:12
 */

namespace App\Models;


use App\Tools\ArrayFilter;
use App\Tools\GUID;
use App\Tools\Password;
use Illuminate\Database\QueryException;

class Admin extends BaseModel {
	protected $table = 'admin';
	protected $primaryKey = 'admin_id';

	protected $fillable = array(
		'role_id', 'username', 'guid', 'nickname', 'password', 'created_at', 'updated_at', 'login_at', 'created_ip'
	);

	// 创建时必需的字段
	private $_createFieldsNeed = array(
		'role_id', 'username', 'guid', 'nickname', 'password', 'created_ip'
	);


	/**
	 * 创建管理员
	 *
	 * @param array $adminData 管理员信息
	 * @return array
	 */
	public function create(array $adminData) {
		$adminData['guid'] = GUID::generate();
		$adminData['password'] = Password::generate($adminData['password']);
		$adminData = ArrayFilter::doFilter($adminData, $this->_createFieldsNeed);
		$this->fill($adminData);
		try {
			$this->save();
			return array(
				'result' => true,
				'admin_id' => $this->getAttribute('admin_id')
			);
		} catch (QueryException $e) {
			return array(
				'result' => false,
				'code' => $e->getCode()
			);
		}
	}

	/**
	 * 登录验证
	 *
	 * @param string $username 用户名
	 * @param string $password 密码明文
	 * @return bool|array
	 */
	public function loginCheck($username, $password) {
		$admin = $this->getInfo(array(
			'username' => $username
		), array(
			'admin_id', 'username', 'password'
		));
		if ($admin == null) {
			return $this->errorHandler->getError('admin_login_failed');
		}
		if (Password::verify($password, $admin['password'])) {
			return true;
		} else {
			return $this->errorHandler->getError('admin_login_failed');
		}
	}

	/**
	 * 获取要保存在Session中的管理员信息
	 *
	 * @param array $where 查询条件，通常是admin_id或者是username
	 * @return bool|array
	 */
	public function getSessionInfo($where) {
		$admin = $this->getInfo($where, array(
			'admin_id', 'username', 'guid', 'nickname'
		));
		return empty($admin) ? false : $admin->getAttributes();
	}
}