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
	// 错误码列表，由至少五位数字构成(个别除外)，如果个位为0，则说明没有错误，请将个位为0的数字保留给成功信息
	public $errorArray = array(
		// 没有错误
		'no_error' => 0,
		// 管理后台登录成功
		'admin_login_success' => 10000,
		// 管理后台登录成功
		'admin_login_failed' => 10001,
		// 管理员不存在
		'admin_not_found' => 10002,
		// 管理员登录密码错误
		'admin_pwd_wrong' => 10003,
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
		if (!key_exists($error, $this->errorArray)) {
			return null;
		}
		$result = array(
			'code' => $this->errorArray[$error],
			'msg' => trans($this->_errorCodesFile.'.'.$error)
		);
		$result['error'] = $result['code'] % 10 ? $error : '';
		return $result;
	}
}