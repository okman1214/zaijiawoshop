﻿<?php
session_start();
require_once('config.php');

function do_post($url, $data)
{
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE); 
    curl_setopt($ch, CURLOPT_POST, TRUE); 
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data); 
    curl_setopt($ch, CURLOPT_URL, $url);
    $ret = curl_exec($ch);

    curl_close($ch);
    return $ret;
}

function get_url_contents($url)
{

		if (ini_get("allow_url_fopen") == "1")
           return file_get_contents($url);

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    curl_setopt($ch, CURLOPT_URL, $url);
    $result =  curl_exec($ch);
    curl_close($ch);

    return $result;
}

/**
 * 得到数组变量的GBK编码
 *
 * @param array $key 数组
 * @param string $charset 编码
 * @return array 数组类型的返回结果
 */
function getGBK($key,$charset){
	/**
	 * 转码
	 */
	if (strtoupper($charset) == 'GBK' && !empty($key)){
		if (is_array($key)){
			$result = var_export($key, true);//变为字符串
			$result = iconv('UTF-8','GBK',$result);
			eval("\$result = $result;");//转换回数组
		}else {
			$result = iconv('UTF-8','GBK',$key);
		}
	}else{
		$result = $key;
	}
	return $result;
}
?>
