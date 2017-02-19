<?php
/**
 * 错误码特性
 *
 * User: rick
 * Date: 17-2-7
 * Time: 下午3:35
 */

namespace App\Traits;


trait ErrorCodeTrait {
	private $_errorCodesFile = 'errorCodes';
	public $errorArray = array(
		// 没有错误
		'no_error' => 0,
		// 管理员不存在
		'admin_not_found' => 10000,
		// 管理员登录密码错误
		'admin_pwd_wrong' => 10001,
	);

	/**
	 * 获取错误编码
	 *
	 * @param string|int $error 错误编码key或code
	 * @return mixed 错误编码
	 */
	public function getError($error) {
		if (is_numeric($error)) {
			$error = array_search((int)$error, $this->errorArray);
			if ($error === false) {
				return null;
			}
		}
		return key_exists($error, $this->errorArray) ? array(
			'error' => $error,
			'code' => $this->errorArray[$error],
			'msg' => trans($this->_errorCodesFile.'.'.$error)
		) : null;
	}
}