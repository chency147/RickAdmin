<?php
/**
 * GUID生成工具类
 *
 * User: rick
 * Date: 17-1-28
 * Time: 下午1:34
 */

namespace App\Tools;

class GUID {
	/**
	 * 生成GUID
	 *
	 * @return string guid
	 */
	public static function generate() {
		if (function_exists('com_create_guid')) {
			return com_create_guid();
		} else {
			// optional for php 4.2.0 and up.
			mt_srand((double)microtime() * 10000);
			$charid = strtoupper(md5(uniqid(rand(), true)));
			$hyphen = chr(45);// "-"
			$uuid = substr($charid, 0, 8) . $hyphen
				. substr($charid, 8, 4) . $hyphen
				. substr($charid, 12, 4) . $hyphen
				. substr($charid, 16, 4) . $hyphen
				. substr($charid, 20, 12);
			return $uuid;
		}
	}
}