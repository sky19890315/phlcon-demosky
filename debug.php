<?php
/**
 * Created by PhpStorm.
 * User: sunkeyi
 * Date: 2017/5/1
 * Time: 下午4:19
 */
function debug ($value) {
	if ($value === null) {
		echo "没有值";
	} else {
		echo "结果为：<br />";
		var_dump($value);
	}
}