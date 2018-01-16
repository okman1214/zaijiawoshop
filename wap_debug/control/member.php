<?php
/**
 * 生活馆
 */
defined('InShopNC') or exit('Access Invalid!');
class memberControl extends BaseHomeControl {
  public function __construct(){
        parent::__construct();
        $key = $_POST['key'];
        if(empty($key)) {
            $key = $_COOKIE['key'];
        }
        //var_dump($key);die;
        $model_mb_user_token  = Model('mb_user_token');
        $mb_user_token_info = $model_mb_user_token->getMbUserTokenInfoByToken($key);
        if($mb_user_token_info){
          $model_member = Model('member');
          $this->member_info = $model_member->getMemberInfoByID($mb_user_token_info['member_id']);
          $this->member_info['client_type'] = $mb_user_token_info['client_type'];
        }
        
        
    }
	public function indexOp(){
       
    Tpl::output('title','修改头像');
    Tpl::output('member_avatar',$this->member_info['member_avatar']);
    Tpl::output('member_id',$this->member_info['member_id']);
		Tpl::showpage('member_index');
	}

    public function change_passOp(){
        if($_POST){
          $obj_validate = new Validate(); 
          //var_dump($obj_validate);die;
          $obj_validate->validateparam = array( 

          array("input"=>$_POST["oldpass"],"require"=>"true","message"=>'原密码不能为空'), 

          array("input"=>$_POST["newpass"],"require"=>"true","message"=>'新密码不能为空'), 

          array("input"=>$_POST["querenpass"],    "require"=>"true","message"=>'确认密码不能为空'), 

          ); 

          $error = $obj_validate->validate(); 

          if ($error != ''){ 

          //输出错误信息 

          showDialog($error); 

          }

          if($this->member_info['member_passwd'] == md5($_POST["oldpass"])){

            $data['member_passwd'] = md5($_POST['newpass']);
            $mem_pw = Model()->table('member')->where(array('member_id' =>$this->member_info['member_id']))->update($data);
            if($mem_pw){
              $mes['ok'] = '1';
              
            }
          }else{
            $mes['err'] = '1';
          }
          echo json_encode($mes);
        }else{
            Tpl::output('title','密码修改');
            Tpl::showpage('member_change_pass');    
        }
    }

    public function member_infoOp(){
      Tpl::output('title','我的消息');
      Tpl::showpage('member_info.index');
    }
  /**
     * 图片上传
     */
    public function member_image_uploadOp() {
        $data = array();
        //上传图片
        //var_dump($_FILES);
        $member_id = $_POST['member_id'];
        $upload = new UploadFile();
        $upload->set('thumb_width', 500);
        $upload->set('thumb_height',499);
        $ext = strtolower(pathinfo($_FILES['news_pic']['name'], PATHINFO_EXTENSION));
        //var_dump($ext);die;
        $upload->set('file_name',"avatar_$member_id.$ext");
        $upload->set('thumb_ext','_new');
        //$upload->set('ifremove',true);
        $upload->set('default_dir',ATTACH_AVATAR);
        if (!empty($_FILES['news_pic']['tmp_name'])){
          $result = $upload->upfile('news_pic');
          //var_dump($upload);
          if ($result){
            $data['image_name'] = $upload->file_name;
            $data['image_url'] = C('upload_site_url'). DS .'shop' . DS . 'avatar' . DS .$data['image_name'];
          }
        }else{
          showMessage('上传失败，请尝试更换图片格式或小图片','','html','error');
        }
        
        echo json_encode($data);
    }
    public function wxImgUploadOp(){
      $access_token = $this->get_access_token();
      $media_id = $_POST['serverId'];
      $img_name = 'avatar'.'_'.$this->member_info['member_id'];
      //unlink()
      //D:\www\chongm\data\upload\shop\member
      $dir = 'D:/www/chongm/data/upload/shop/avatar/';
      @unlink($dir.$img_name.'.jpg');
      $url = "http://file.api.weixin.qq.com/cgi-bin/media/get?access_token=".$access_token."&media_id=".$media_id;
        if (!file_exists($dir)) {
            mkdir($dir, 0777, true);
        }
        $targetName = $dir.$img_name.'.jpg';
        $ch = curl_init($url); // 初始化
        $fp = fopen($targetName, 'wb'); // 打开写入
        curl_setopt($ch, CURLOPT_FILE, $fp); // 设置输出文件的位置，值是一个资源类型
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_exec($ch);
        curl_close($ch);
        fclose($fp);
        $data['img_name'] = $img_name.'.jpg';
        $data['i']        = $this->member_info['member_id'];
        echo json_encode($data);
     
    }
    //获取 access_token
    private function get_access_token(){
        $appid = "wxa8277650681f814f";
        $appsecret = "b82cc730807ddf345b4313a66f2f040d";
        $url = 'https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid='.$appid.'&secret='.$appsecret;
        $rurl = file_get_contents($url);
        $rurl = json_decode($rurl,true);
        if(array_key_exists('errcode',$rurl)){
            return false;
        }else{
            $access_token = $rurl['access_token'];
            return $access_token;
        }
    }
}