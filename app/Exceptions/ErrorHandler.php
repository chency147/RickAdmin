<?php
/**
 * 错误处理句柄
 *
 * User: rick
 * Date: 17-2-9
 * Time: 下午3:04
 */

namespace App\Exceptions;


use App\Traits\ErrorCodeTrait;

class ErrorHandler {
	use ErrorCodeTrait;

	// 单例
	private static $_instance = null;

	/**
	 * 私有化构造方法，防止从外部声明
	 */
	private function __construct() {
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
	 * @return ErrorHandler|null
	 */
	public static function getInstance() {
		if (!(self::$_instance instanceof self)) {
			self::$_instance = new self();
		}
		return self::$_instance;
	}
}