<?php

if ( strpos($_SERVER['HTTP_USER_AGENT'], 'MicroMessenger') !== false ) {//判断是否为微信浏览器
            include_once('D:/www/chongm/mobile/api/payment/wxpay/lib/WxPayPubHelper.php');//这是微信类      
            $jsApi = new JsApi_pub();
            $APPID = "wxa8277650681f814f";//微信公共平台的appid
            $APPSECRET = " b82cc730807ddf345b4313a66f2f040d";//微信公共平台的appsecret      
            if( !isset($_SESSION['openid']) ){
              error_log('data:'.date('Y-m-d H:i:s',time())."\n".var_export('123456',1)."\n",3,'D:/WWW/chongm/log_openid.txt');
              //使用jsapi接口
              $jsApi = new JsApi_pub();
              if (!isset($_GET['code'])){
                $backurl = get_url();
                $url = $jsApi->createOauthUrlForCode($backurl);
                Header("Location: $url");
              }else{
                //获取code码，以获取openid
                $code = $_GET['code'];                
                $jsApi->setCode($code);
                $openid = $jsApi->getOpenid();
                $_SESSION['openid']  = $openid;
                $_SESSION['code']    = $code; 
                //var_dump(expression)               
                //var_dump($sys_protocal.(isset($_SERVER['HTTP_HOST']) ? $_SERVER['HTTP_HOST'] : ''));
                
                //var_dump();
                error_log('data:'.date('Y-m-d H:i:s',time())."\n".var_export($openid,1)."\n",3,'D:/WWW/chongm/log3.txt');
              }
            }
        //var_dump($user);die;   
        }

function get_url(){
  $sys_protocal = isset($_SERVER['SERVER_PORT']) && $_SERVER['SERVER_PORT'] == '443' ? 'https://' : 'http://';
  $php_self = $_SERVER['PHP_SELF'] ? $_SERVER['PHP_SELF'] : $_SERVER['SCRIPT_NAME'];
  $path_info = isset($_SERVER['PATH_INFO']) ? $_SERVER['PATH_INFO'] : '';
  $relate_url = isset($_SERVER['REQUEST_URI']) ? $_SERVER['REQUEST_URI'] : $php_self.(isset($_SERVER['QUERY_STRING']) ? '?'.$_SERVER['QUERY_STRING'] : $path_info);
  //var_dump($relate_url);die;
  error_log('data:'.date('Y-m-d H:i:s',time())."\n".var_export($sys_protocal.(isset($_SERVER['HTTP_HOST']) ? $_SERVER['HTTP_HOST'] : '').$relate_url,1)."\n",3,'D:/WWW/chongm/log3222.txt');
  return $sys_protocal.(isset($_SERVER['HTTP_HOST']) ? $_SERVER['HTTP_HOST'] : '').$relate_url;
}


/*可获得code码的url*/
function createOauthUrlForCode($redirectUrl){
  $urlObj["appid"] = WxPayConf_pub::APPID;
  $urlObj["redirect_uri"] = "redirectUrl";//返回网页地址
  $urlObj["response_type"] = "code";//获得参数
  $urlObj["scope"] = "snsapi_base";
  $urlObj["state"] = "STATE"."#wechat_redirect";
  $bizString = $this->formatBizQueryParaMap($urlObj, false);//生成可获得code的参数
  return "https://open.weixin.qq.com/connect/oauth2/authorize?".$bizString;
}


/*页面跳转，并把获得json的字符串转成成json数组*/
function getJson($url){
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $url);
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
  curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  $output = curl_exec($ch);
  curl_close($ch);
  return json_decode($output, true);
}


/*作用：格式化参数，签名过程需要使用*/
function formatBizQueryParaMap($paraMap, $urlencode){
  $buff = "";
  ksort($paraMap);
  foreach ($paraMap as $k => $v){
    if($urlencode){
       $v = urlencode($v);
    }
    $buff .= $k . "=" . $v . "&";
  }
  $reqPar;
  if (strlen($buff) > 0){
    $reqPar = substr($buff, 0, strlen($buff)-1);
  }
  return $reqPar;
}
?>