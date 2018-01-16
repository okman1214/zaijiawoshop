<?php 
session_start();
require_once(dirname(__FILE__).'/'.'../comm/config.php');
require_once(dirname(__FILE__).'/'.'../comm/utils.php');
function wx_callback()
{
    if($_REQUEST['state'] == $_SESSION['state']) //csrf
    {
        $token_url = "https://api.weixin.qq.com/sns/oauth2/access_token?grant_type=authorization_code"
            . "&appid=" . $_SESSION["appid"]
            . "&secret=" . $_SESSION["appkey"]
			. "&code=" . $_REQUEST["code"];

        $response = get_url_contents($token_url);
       
            $msg = json_decode($response);
            if (isset($msg->errcode))
            {
                echo "<h3>error:</h3>" . $msg->errcode;
                echo "<h3>msg  :</h3>" . $msg->errmsg;
                exit;
            }       

        //debug
        //print_r($params);

        //set access token to session
        $_SESSION["access_token"] =$msg->access_token; //$params["access_token"];
		$_SESSION["openid"] = $msg->openid;
		if(isset($msg->unionid))
		{
			$_SESSION["unionid"] = $msg->unionid;
		}
//        echo "<pre>";
//        print_r($_SESSION);
//        exit;
    }
    else 
    {
        echo("The state does not match. You may be a victim of CSRF.");
    }
}


	//登录成功后的回调地址,主要保存access token he openid
	wx_callback();
	@header('location: http://wap.baihuipc.com/tmpl/member/wxlogin.html?openid='.$_SESSION['openid'].'&unionid='.$_SESSION['unionid'].'&access_token='.$_SESSION["access_token"] );
	//@header('location: http://mobile.baihuipc.com/index.php?act=connectwx');
	exit;
?>
