<?php
/**
 * 密码工具类
 *
 * User: rick
 * Date: 17-2-6
 * Time: 下午8:57
 */

namespace App\Tools;


class Password {

	/**
	 * 生成密码
	 *
	 * @param string $origin 原始(明文)密码
	 * @return bool|string
	 */
	public static function generate($origin) {
		return password_hash($origin, PASSWORD_DEFAULT);
	}

	/**
	 * 检验密码
	 *
	 * @param string $origin 原始(明文)密码
	 * @param string $hash 加密后密码
	 * @return bool
	 */
	public static function verify($origin, $hash) {
		return password_verify($origin, $hash);
	}
}