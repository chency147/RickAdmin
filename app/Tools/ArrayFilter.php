<?php
/**
 * 数组过滤工具
 *
 * User: rick
 * Date: 17-2-6
 * Time: 下午9:19
 */

namespace App\Tools;


class ArrayFilter {

	/**
	 * 执行过滤
	 *
	 * @param array $originArray 原始数据数组
	 * @param array $fields 所需字段
	 * @return array|bool 如果返回为false，说明原始数组数组或所需字段数组为空
	 */
	public static function doFilter($originArray, $fields) {
		// 检查原始数据数组和所需字段是否为空
		if (empty($originArray) || empty($fields)) {
			return false;
		}
		$resultArray = array();
		foreach ($fields as $field) {
			// 检查是否存在所需字段，不存在则以null填充
			$resultArray[$field] = key_exists($field, $originArray) ?
				$originArray[$field] : null;
		}
		return $resultArray;
	}
}