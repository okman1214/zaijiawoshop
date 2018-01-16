<?php
/**
 * 论坛
 */
defined('InShopNC') or exit('Access Invalid!');
class bbsControl extends BaseLuntanControl {
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
        Tpl::output('title','论坛');
        $model_circle_class         = Model('circle_class');
        $model_circle_theme         = Model('circle_theme');
        $model_circle               = Model('circle');
        $model_circle_like          = Model('circle_like');        
        $cond['class_status'] = 1;
        $circle_class_list = $model_circle_class->where($cond)->field('class_id,class_name')->order('class_sort')->select();
        if($_GET['class_id']){
            $where['thclass_id'] = $_GET['class_id'];
        }
        $theme_list = $model_circle_theme->where($where)->order('theme_addtime  DESC')->select();
        foreach ($theme_list as $key => $value) {
            $member_img = Model()->table('member')->where(array('member_id'=>$value['member_id']))->field('member_avatar')->find();
            $theme_list[$key]['member_avatar'] = $member_img['member_avatar'];
        }
        //var_dump($theme_list);
        Tpl::output('circle_list', $circle_list);        
        Tpl::output('theme_list',$theme_list);
        Tpl::output('circle_class_list',$circle_class_list);
		Tpl::showpage('bbs');
	}

    //圈子下的话题
    public function bbs_circle_themeOp(){
       
        $model_mb_user_token  = Model('mb_user_token');
        $mb_user_token_info = $model_mb_user_token->getMbUserTokenInfoByToken($key);
        $model_member = Model('member');
        
        $model_circle_class         = Model('circle_class');
        $model_circle_theme         = Model('circle_theme');
        $model_circle               = Model('circle');
        $model_circle_like          = Model('circle_like');
        $model_circle_member        = Model('circle_member');
        $key = $_COOKIE['key'];
        $where['circle_id'] = $_GET['circle_id'];
        
        if($key){
            $mb_user_token_info = $model_mb_user_token->getMbUserTokenInfoByToken($key);
            $this->member_info = $model_member->getMemberInfoByID($mb_user_token_info['member_id']);
            $this->member_info['client_type'] = $mb_user_token_info['client_type'];
            if($this->member_info){
                $member_ok = $model_circle_member->where(array('member_id'=>$this->member_info['member_id'],'circle_id'=>$_GET['circle_id']))->find();
                if($member_ok){
                    Tpl::output('key',$key);
                }
            }
        }
        if(!isset($_GET['circle_id'])){
            showMessage('参数错误');
        }
        $circle_list = $model_circle ->field('*')->where($where)->find();
        
        
        $theme_list  = $model_circle_theme->where($where)->order('theme_addtime ase')->select();
        foreach ($theme_list as $key => $value) {
            $img = $model_member->field('member_avatar')->find($value['member_id']);
            $theme_list[$key]['img'] = $img['member_avatar'];
        }
        //var_dump($theme_list);
        Tpl::output('title',$circle_list['circle_name']);
        Tpl::output('circle_list',$circle_list);
        Tpl::output('theme_list',$theme_list);

        Tpl::showpage('bbs_circle_theme');
    }

//话题详情
    public function bbs_theme_detailOp(){
        //var_dump($_COOKIE);die;
        if(!isset($_GET['theme_id'])){
            showMessage('参数错误');
        }
        $cond['theme_id'] = $_GET['theme_id'];
        $model_circle_theme         = Model('circle_theme');
        $model_circle_threply       = Model('circle_threply');
        $model_member               = Model('member');
        //浏览量加1
        $model_circle_theme->where($cond)->setInc('theme_browsecount',1);

        $theme_list  = $model_circle_theme->where($cond)->select();
        foreach ($theme_list as $key => $value) {
            if(!empty($value['img0'])){
                $i = @explode("_",$value['img0']);

            }
            $img = $model_member->field('member_avatar')->find($value['member_id']);

            $theme_list[$key]['img'] = $img['member_avatar'];
            $theme_list[$key]['i'] = $i['0'];
        }
//话题回复信息
        $cond['reply_replyid'] = array('eq','0');
        $threply_list = $model_circle_threply->where($cond)->order('reply_addtime desc')->select();
//获取会员消息
        foreach ($threply_list as $key => $value) {
            $img = $model_member->field('member_avatar')->find($value['member_id']);
            $threply_list[$key]['img'] = $img['member_avatar'];       
        }        
        $threply_cout = $model_circle_threply->where($cond)->count('theme_id');
        Tpl::output('title',话题详情);
        Tpl::output('threply_list',$threply_list);
        Tpl::output('threply_cout',$threply_cout);
        Tpl::output('theme_list',$theme_list);
        Tpl::showpage('bbs_theme_detail');
    }
     //创建话题
    public function bbs_add_themeOp(){
        //var_dump($_POST);die;
        $model_circle_theme = Model('circle_theme');

        if($_POST ){
            if(!($_POST['token'] == $_SESSION['token'])){
                header("Location: index.php?act=bbs&op=bbs");
            }else{
            if($_POST['theme_name']){
                $pieces = @explode(",", $_POST['category']);
                $data['thclass_id'] = $pieces['0'];
                $data['thclass_name'] = $pieces['1'];
            }else{
                showMessage('分类不能为空');
            }
            
            if($_POST['theme_name']){
                $str_name = preg_replace_callback('/[\xf0-\xf7].{3}/', function($r) { return '@E' . base64_encode($r[0]);}, $_POST['theme_name']);
                $data['theme_name'] = $str_name;
            }else{
                showMessage('标题不能为空');
            }
            if($_POST['theme_content']){
                $text = preg_replace_callback('/[\xf0-\xf7].{3}/', function($r) { return '@E' . base64_encode($r[0]);}, $_POST['theme_content']);
                $data['theme_content'] = $text;
            }else{
                showMessage('内容不能为空');
            }
            if($_POST['WU_FILE_0']){
                $data['img0'] = empty($_POST['WU_FILE_0'])?0:$_POST['WU_FILE_0'];
                $data['img1'] = empty($_POST['WU_FILE_1'])?0:$_POST['WU_FILE_1'];
                $data['img2'] = empty($_POST['WU_FILE_2'])?0:$_POST['WU_FILE_2'];
                $data['img3'] = empty($_POST['WU_FILE_3'])?0:$_POST['WU_FILE_3'];
                $data['img4'] = empty($_POST['WU_FILE_4'])?0:$_POST['WU_FILE_4'];
                $data['img5'] = empty($_POST['WU_FILE_5'])?0:$_POST['WU_FILE_5'];
            }
            if($_POST['img']){
                $data['img0'] = empty($_POST['img']['0'])?0:$_POST['img']['0'];
                $data['img1'] = empty($_POST['img']['1'])?0:$_POST['img']['1'];
                $data['img2'] = empty($_POST['img']['2'])?0:$_POST['img']['2'];
                $data['img3'] = empty($_POST['img']['3'])?0:$_POST['img']['3'];
                $data['img4'] = empty($_POST['img']['4'])?0:$_POST['img']['4'];
                $data['img5'] = empty($_POST['img']['5'])?0:$_POST['img']['5'];
            }
            
            $data['member_id'] = $this->member_info['member_id'];
            $data['member_name'] = $this->member_info['member_name'];
            $data['theme_addtime'] = time(); 
            // echo "<pre>";
            // var_dump($data);die;           
            $add_s = $model_circle_theme->insert($data);
            if($add_s){
				$_SESSION['token'] = "0";
                showMessage('发布成功','index.php?act=bbs&op=index');
            }
            }
        }
        $model = Model();
        $theme_class_list = $model->table('circle_class')->select();
        Tpl::output('theme_class_list',$theme_class_list);
        Tpl::output('title',"创建话题");
        Tpl::showpage('bbs_add_theme.index');
    }
    // public function bbs_add_theme
//发表评论
    public function pinglunOp(){
        $model_mb_user_token  = Model('mb_user_token');
        $model_circle_threply = Model('circle_threply');
        $model_circle_theme = Model('circle_theme');
        $key = $_POST['key'];
        if(empty($key)) {
            $key = $_GET['key'];
        }
        $mb_user_token_info = $model_mb_user_token->getMbUserTokenInfoByToken($key);
        if(empty($mb_user_token_info)) {
            output_error('请登录', array('login' => '0'));
        }
        $model_member = Model('member');
        $this->member_info = $model_member->getMemberInfoByID($mb_user_token_info['member_id']);
        $this->member_info['client_type'] = $mb_user_token_info['client_type'];
        if(empty($this->member_info)) {
            output_error('请登录', array('login' => '0'));
        }else{
            if(empty($_POST['theme_id'])){
                output_error('参数错误', array('canshu' => '0'));
                return false;
            }
            
            if(empty($_POST['content'])){
                output_error('评论内容不能为空', array('content' => '0'));
                return false;
            }
            $data['member_id']     = $this->member_info['member_id'];
            $data['member_name']   = $this->member_info['member_name'];
            $data['theme_id']      = $_POST['theme_id'];
            
            $data['reply_content'] = preg_replace_callback('/[\xf0-\xf7].{3}/', function($r) { return '@E' . base64_encode($r[0]);}, $_POST['content']);;
            $data['reply_addtime'] = time();
            $sussce = $model_circle_threply->insert($data);
            if($sussce){
                $model_circle_theme->where(array('theme_id'=>$_POST['theme_id']))->setInc('theme_commentcount',1);

               output_error('评论成功', array('ok' => '1'));
            }
            
        }
        
    }
//主题点赞
    public function addthemelikeOp(){
        $model_mb_user_token  = Model('mb_user_token');
        $model_circle_theme   = Model('circle_theme');
        $model_circle_like    = Model('circle_like');
        $key = $_POST['key'];
        if(empty($key)) {
            $key = $_GET['key'];
        }
        $mb_user_token_info = $model_mb_user_token->getMbUserTokenInfoByToken($key);
        if(empty($mb_user_token_info)) {
            output_error('请登录', array('login' => '0'));
        }
        $model_member = Model('member');
        $this->member_info = $model_member->getMemberInfoByID($mb_user_token_info['member_id']);
        $this->member_info['client_type'] = $mb_user_token_info['client_type'];
        if(empty($this->member_info)) {
            output_error('请登录', array('login' => '0'));
        }
        
        $data['member_id']     = $this->member_info['member_id'];
        $data['theme_id']      = $_POST['theme_id'];
        $data['circle_id']     = $_POST['circle_id'];
//添加主题赞
        $like_info = Model()->table('circle_like')->where(array('theme_id'=>$data['theme_id'], 'member_id'=>$data['member_id']))->find();
        //var_dump($like_info);
        if(empty($like_info)){
            // 插入话题赞表
            Model()->table('circle_like')->insert(array('theme_id'=>$data['theme_id'], 'member_id'=>$data['member_id'], 'circle_id'=>$data['circle_id']));
            // 更新赞数量
            Model()->table('circle_theme')->update(array('theme_id'=>$data['theme_id'], 'theme_likecount'=>array('exp', 'theme_likecount+1')));
            echo 'true';
        }else{
            echo 'false';
        }
        exit;
    }

//加入圈子    
    public function addcircleOp(){
        $model_mb_user_token  = Model('mb_user_token');
        $model_circle_theme   = Model('circle_theme');
        $model_circle_like    = Model('circle_like');
        $model_circle_member    = Model('circle_member');
        $key = $_POST['key'];
        if(empty($key)) {
            $key = $_GET['key'];
        }
        $mb_user_token_info = $model_mb_user_token->getMbUserTokenInfoByToken($key);
        if(empty($mb_user_token_info)) {
            output_error('请登录', array('login' => '0'));
        }
        $model_member = Model('member');
        $this->member_info = $model_member->getMemberInfoByID($mb_user_token_info['member_id']);
        $this->member_info['client_type'] = $mb_user_token_info['client_type'];
        if(empty($this->member_info)) {
            output_error('请登录', array('login' => '0'));
        }
        $data['member_id']        = $this->member_info['member_id'];
        $data['member_name']      = $this->member_info['member_name'];
        $data['circle_id']        = $_POST['circle_id'];
        $data['circle_name']      = $_POST['circle_name'];
        $data['cm_state']         = 1;
        $data['cm_applytime']     = time();
        $data['cm_jointime']      = time();
        $data['cm_level']         = 1;
        $data['cm_levelname']     = '初级粉丝';
        $data['cm_exp']           = '1';
        $data['cm_nextexp']       = '5';
        $data['is_identity']      = '3';
        $data['is_allowspeak']    = '1';
        $data['is_star']          = '0';
        $data['cm_thcount']       = '0';
        $data['cm_comcount']      = '0';
        $data['cm_lastspeaktime'] = '';
        $data['is_recommend']     = '0';
        //var_dump($data);die;
        $add_memner = $model_circle_member->insert($data);
        if($add_memner){
            output_error('请登录', array('ok' => '1'));
        }

    }
    /**
     * 图片上传
     */
    public function bbs_image_uploadOp() {
        $data = array();
        if(!empty($_FILES['file']['name'])) {
            //echo "<script>alert(111)</script>";
            $prefix = $this->member_info['member_id'];
            $upload = new UploadFile();
            $upload->set('default_dir', ATTACH_PATH . DS . 'circle' . DS . $prefix);
            $upload->set('max_size',2048*1024); //图片最大2M
            // $upload->set('thumb_width',  '240,300');
            // $upload->set('thumb_height', '240,300'); 
            // $upload->set('thumb_ext',    '_240,_300');     

            $upload->set('fprefix', $prefix);
            $upload->set('allow_type', array('gif', 'jpg', 'jpeg', 'png'));

            $result = $upload->upfile('file');
            if(!$result) {
                $data['error'] = $upload->error;
            }
            $data['image_name'] = $upload->file_name;
            $data['id']=$_POST['id'];
            $data['image_url'] = C('upload_site_url'). DS .
             'circle' . DS . $prefix. DS .$data['image_name'];
            //$data['thumb_image'] = C('upload_site_url'). DS .'shop/member' . DS . $prefix. DS .$upload->thumb_image;
        }

        echo json_encode($data);

      }
      public function wxImgUploadOp(){
      $access_token = $this->get_access_token();
      $media_id = $_POST['serverId'];
      $img_name = $this->member_info['member_id'].'_'.date('YmdHis').rand(1000,9999);
      //D:\www\chongm\data\upload\shop\member
      $dir = 'D:/www/chongm/data/upload/shop/circle'. DS . $this->member_info['member_id'].'/';
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