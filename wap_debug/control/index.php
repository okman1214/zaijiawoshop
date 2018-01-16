<?php
/**
 * cms首页
 *
 */


defined('InShopNC') or exit('Access Invalid!');
class indexControl extends BaseHomeControl{

	public function __construct() {
        parent::__construct();    
    }

    /**
     * 首页
     */
  public function getmemberinfoOp(){
    Tpl::output('title','hello');
    
  }
	public function indexOp() {

    include_once('D:/www/chongm/mobile/api/payment/wxpay/lib/WxPayPubHelper.php');//这是微信类  

            $jsApi = new JsApi_pub();
            $APPID = "wxa8277650681f814f";//微信公共平台的appid
            $APPSECRET = "b82cc730807ddf345b4313a66f2f040d";//微信公共平台的appsecret      
            if( !isset($_SESSION['openid']) ){
              //使用jsapi接口

              $jsApi = new JsApi_pub();
              if (!isset($_GET['code'])){               
                $backurl = $this->get_url();
                // error_log('data:'.date('Y-m-d H:i:s',time())."\n".var_export($backurl,1)."\n",3,'D:/WWW/chongm/log77.txt');
                $url = $jsApi->createOauthUrlForCode($backurl);                
                Header("Location: $url");
              }else{
                //error_log('data:'.date('Y-m-d H:i:s',time())."\n".var_export('123123',1)."\n",3,'D:/WWW/chongm/log79.txt');
                //获取code码，以获取openid
                $code = $_GET['code'];                
                $jsApi->setCode($code);
                $openid = $jsApi->getOpenid();
                $_SESSION['openid']  = $openid;
                //查询数据库获取用户信息
                $model_user = Model('member');
                $member_wxinfo = $model_user->where(array('wx_openid'=>$_SESSION['openid']))->find();
                
                if($member_wxinfo){
                  $token = $this->_get_token($member_wxinfo['member_id'], $member_wxinfo['member_name'], "wap");
                  //output_data(array('username' => $member_wxinfo['member_name'],'key'=>$token));
                  $_SESSION['key'] = $token;
                  $_SESSION['username'] = $member_wxinfo['member_name'];
                  $_SESSION['member_id'] = $member_wxinfo['member_id'];
                }else{
                  $_SESSION['openid'] = $_SESSION['openid'];
                }               
              }
              //echo json_encode($data);
            }else{

              $model_user = Model('member');
              $member_wxinfo = $model_user->where(array('wx_openid'=>$_SESSION['openid']))->find();                
              if($member_wxinfo){
                $token = $this->_get_token($member_wxinfo['member_id'], $member_wxinfo['member_name'], "wap");
                //output_data(array('username' => $member_wxinfo['member_name'],'key'=>$token));
                $_SESSION['key'] = $token;
                $_SESSION['member_id'] = $member_wxinfo['member_id'];
                $_SESSION['username'] = $member_wxinfo['member_name'];
              }else{
                //output_data(array('openid' => $_SESSION['openid']));
                $_SESSION['openid'] = $_SESSION['openid'];
              }
              //echo json_encode($data);
            }
           Tpl::showpage('index'); 
  }
  private function get_url(){
    $sys_protocal = isset($_SERVER['SERVER_PORT']) && $_SERVER['SERVER_PORT'] == '443' ? 'https://' : 'http://';
    $php_self = $_SERVER['PHP_SELF'] ? $_SERVER['PHP_SELF'] : $_SERVER['SCRIPT_NAME'];
    $path_info = isset($_SERVER['PATH_INFO']) ? $_SERVER['PATH_INFO'] : '';
    $relate_url = isset($_SERVER['REQUEST_URI']) ? $_SERVER['REQUEST_URI'] : $php_self.(isset($_SERVER['QUERY_STRING']) ? '?'.$_SERVER['QUERY_STRING'] : $path_info);
    return $sys_protocal.(isset($_SERVER['HTTP_HOST']) ? $_SERVER['HTTP_HOST'] : '').$relate_url;
  }
/*可获得code码的url*/
private function createOauthUrlForCode($redirectUrl){
  $urlObj["appid"] = WxPayConf_pub::APPID;
  $urlObj["redirect_uri"] = "redirectUrl";//返回网页地址
  $urlObj["response_type"] = "code";//获得参数
  $urlObj["scope"] = "snsapi_base";
  $urlObj["state"] = "STATE"."#wechat_redirect";
  $bizString = $this->formatBizQueryParaMap($urlObj, false);//生成可获得code的参数

  return "https://open.weixin.qq.com/connect/oauth2/authorize?".$bizString;
}

private function _get_token($member_id, $member_name, $client) {
        $model_mb_user_token = Model('mb_user_token');

        //重新登录后以前的令牌失效
        //暂时停用
        //$condition = array();
        //$condition['member_id'] = $member_id;
        //$condition['client_type'] = $_POST['client'];
        //$model_mb_user_token->delMbUserToken($condition); ww w.sho pjl.co m出 品

        //生成新的token
        $mb_user_token_info = array();
        $token = md5($member_name . strval(TIMESTAMP) . strval(rand(0,999999)));
        $mb_user_token_info['member_id'] = $member_id;
        $mb_user_token_info['member_name'] = $member_name;
        $mb_user_token_info['token'] = $token;
        $mb_user_token_info['login_time'] = TIMESTAMP;
        $mb_user_token_info['client_type'] = $_POST['client'] == null ? 'Android' : $_POST['client'] ;

        $result = $model_mb_user_token->addMbUserToken($mb_user_token_info);

        if($result) {
            return $token;
        } else {
            return null;
        }

    }


}
