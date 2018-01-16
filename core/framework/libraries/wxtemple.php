<?php
/**
 * 微信模板推送 WxTemple.class..php
 * ============================================================================
 * 版权所有 (C) 2015-2016 壹尚科技有限公司，并保留所有权利。
 * 网站地址:   http://www.ethank.com.cn
 * ----------------------------------------------------------------------------
 * 许可声明：这是一个开源程序，未经许可不得将本软件的整体或任何部分用于商业用途及再发布。
 * ============================================================================
 * Author: 勾国印 (gouguoyin@ethank.com.cn) 
 * Date: 2016年5月18日 下午11:23:40  
*/
class wxTemple {
    //获得全局access_token
    public function get_token(){ //如果已经存在直接返回access_token
        //if($_SESSION['access_token'] && $_SESSION['expire_time']>time()){
            //return $_SESSION['access_token'];
        //}else{
        //1.请求url地址
        $appid = 'wx5178a9046e808949';
        $appsecret =  '61e2ef5ca2485ad780cdd7f51fd594eb';
        $url = "https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=".$appid."&secret=".$appsecret;
        //2初始化curl请求
        $ch = curl_init();
        //3.配置请求参数
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // 跳过证书检查
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);  // 从证书中检查SSL加密算法是否存在
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        //4.开始请求
        $res = curl_exec($ch);
        if( curl_errno($ch) ){

        }
        //5.关闭curl
        curl_close( $ch );
        $arr = json_decode($res, true);
        //$_SESSION['access_token']=$arr['access_token'];　　//将access_token存入session中，可以不存，每次都获得新的token
        //$_SESSION['expire_time']=time()+7200;

        return $arr['access_token'];

        //}
    }


    //推送模板信息    参数：发送给谁的openid,客户姓名，客户电话，推荐楼盘（参数自定）
    function sendMessage($openid) {
        $appid = 'wx9f82f83f59807f77';
        $appsecret =  '442ca61d8bb3120dd9907996ffab5b04';
        $url = "https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=$appid&secret=$appsecret";

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $output = curl_exec($ch);
        curl_close($ch);
        $jsoninfo = json_decode($output, true);
        $access_token = $jsoninfo["access_token"];




        //获取全局token
        $token = $this->get_token();
        $url=" https://api.weixin.qq.com/sns/userinfo?access_token=".$access_token."ACCESS_TOKEN&openid=oIDhksx_W56Ymne7TCA1z2-rNgbI&lang=zh_CN";//模板信息请求地址
        //发送的模板信息(微信要求json格式，这里为数组（方便添加变量）格式，然后转为json)
        $post_data = array(
            "touser"=>$openid,//推送给谁,openid
                "template_id"=>"nKu4eyktzxOslxq0KfPxhGXbiOo873K9mIxKvs23EVU",//微信后台的模板信息id
                "url"=>"http://www.baidu.com",//下面为预约看房模板示例
                "data"=> array(
            "product" => array(
                "value"=>"您有新客户，请及时查看！",
                "color"=>"#173177"
            ),
            "price"=>array(
                "value"=>'196',//传的变量
                                "color"=>"#173177"
                        ),

                        "tiem"=> array(
            "value"=>date('Y-m-d H:i:s'),
            "color"=>"#173177"
        ),

                )
        );
        //将上面的数组数据转为json格式
        $post_data = json_encode($post_data);
        //发送数据，post方式<br>　　　　　　　　　//配置curl请求
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,$url); //设置发送数据的网址
        curl_setopt($ch, CURLOPT_RETURNTRANSFER,1); //设置有返回值，0，直接显示
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER,0); //禁用证书验证
        curl_setopt($ch, CURLOPT_POST, 1);//post方法请求
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);//post请求发送的数据包
        //接收执行返回的数据
        $data = curl_exec($ch);

        //关闭句柄
        curl_close($ch);
        $data = json_decode($data,true); //将json数据转成数组

        return $data;
    }
    //获取模板信息-行业信息（参考，示例未使用）
    function getHangye(){
        //用户同意授权后，会传过来一个code
        $token = $this->get_token();
        $url = "https://api.weixin.qq.com/cgi-bin/template/get_industry?access_token=".$token;
        //请求token，get方式
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,$url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER,0);
        $data = curl_exec($ch);
        curl_close($ch);
        $data = json_decode($data,true); //将json数据转成数组

        //return $data["access_token"];
        return $data;
      }

}
