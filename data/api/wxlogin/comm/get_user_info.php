<?php
session_start();
require_once('config.php');
require_once('utils.php');

function get_user_info()
{
 

    $get_user_info = "https://api.weixin.qq.com/sns/userinfo?"
        . "access_token=" . $_SESSION['access_token']
        //. "&oauth_consumer_key=" . $_SESSION["appid"]
        . "&openid=" . $_SESSION["openid"]
		.'&lang=zh_CN';
        //. "&format=json";
    $info = get_url_contents($get_user_info);
   //return $info;
    $arr = json_decode($info, true);
    $arr = getGBK($arr,CHARSET);

    return $arr;
}

?>
