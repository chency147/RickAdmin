<?php
/**
 * 状态处理句柄
 *
 * User: rick
 * Date: 17-2-9
 * Time: 下午3:04
 */

namespace App\Exceptions;

class StatusHandler {
	// 单例
	private static $_instance = null;
	// 错误码翻译文件
	private $_statusCodesLangFile = 'statusCodes';
	// 错误码列表，由至少五位数字构成(个别除外)，如果个位为0，则说明没有错误，请将个位为0的数字保留给成功信息
	protected $statusArray = null;

	/**
	 * 私有化构造方法，防止从外部声明
	 */
	private function __construct() {
		$this->statusArray = config($this->_statusCodesLangFile.'.codeList');
	}

	/**
	 * 私有化克隆方法，防止克隆
	 */
	private function __clone() {
		// Do nothing here.
	}

	/**
	 * 获取单例
	 *
	 * @return StatusHandler|null
	 */
	public static function getInstance() {
		if (!(self::$_instance instanceof self)) {
			self::$_instance = new self();
		}
		return self::$_instance;
	}

	/**
	 * 获取状态编码
	 *
	 * @param string|int $status 状态编码key或code
	 * @return mixed 状态编码
	 */
	public function getStatus($status) {
		if (is_numeric($status)) {
			$status = array_search((int)$status, $this->statusArray);
			if ($status === false) {
				return null;
			}
		}
		if (!key_exists($status, $this->statusArray)) {
			return null;
		}
		$result = array(
			'status' => $status,
			'code' => $this->statusArray[$status],
			'msg'  => trans($this->_statusCodesLangFile . '.' . $status)
		);
		return $result;
	}
}