<?php
session_start();
define("QQDEBUG", false);
if (defined("QQDEBUG") && QQDEBUG)
{
    @ini_set("error_reporting", E_ALL);
    @ini_set("display_errors", TRUE);
}

//申请到的appid
$_SESSION["appid"]    ="wx5178a9046e808949";

//申请到的appkey
$_SESSION["appkey"]   = "61e2ef5ca2485ad780cdd7f51fd594eb";

//登录成功后跳转的地址,请确保地址真实可用，否则会导致登录失败。
/* $_SESSION["callback"] = "http://mobile.baihuipc.com/index.php?act=login&op=wxback"; */
$_SESSION["callback"] = "";

?>
