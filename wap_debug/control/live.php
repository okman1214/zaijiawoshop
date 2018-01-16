<?php
/**
 * 生活馆
 */
defined('InShopNC') or exit('Access Invalid!');
class liveControl extends BaseHomeControl {
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
        
        if(isset($_GET['special_id'])){
            $model = Model();
            $ord['special_id'] = intval($_GET['special_id']);
            $ord['item_type'] = 'adv_list';
            $adv_list1 = $model->table('mb_special_item')->where($ord)->select();
            $title = $model->table('mb_special')->where(array('special_id'=>$_GET['special_id']))->find();
            $title = $title['special_desc'];
            foreach ($adv_list1 as $ke => $value) {
              $unserarr=unserialize($value['item_data']);
            }
            foreach ($unserarr as $k => $val) {
              foreach ($val as $key => $value) {
                $i = substr($value['image'],0,2);
                $value['i'] = $i;
                $adv_list[] = $value;
              }
            }
            Tpl::output('ord',$ord['special_id']);
            Tpl::output('title',$title);
            Tpl::output('adv_list',$adv_list);

            //获取小圆行图标
            $ord2['special_id'] = intval($_GET['special_id']);
            $ord2['item_type'] = 'home3';
            $ord2['item_usable'] = '1';

            $tubiao_list1 = $model->table('mb_special_item')->where($ord2)->select();
            foreach ($tubiao_list1 as $ke => $value) {         
               $tubiao = unserialize($value['item_data']);
            }
            $list=$tubiao['item'];
            if(!empty($list)){
              foreach ($list as $ke1 => $valu1) {
                  $i = substr($valu1['image'],0,2);
                  $valu1['i'] = $i;
                  $tubiao_list[] = $valu1;
              }
            }

            Tpl::output('tubiao_list',$tubiao_list);
        }
    }
	public function indexOp(){
        //获取生活馆分类
        $model = Model();
        $ord['special_id'] = intval($_GET['special_id']);
        $ord['item_type'] = 'adv_list';
        $adv_list1 = $model->table('mb_special_item')->where($ord)->select();
        $title = $model->table('mb_special')->where(array('special_id'=>$_GET['special_id']))->find();
        $title = $title['special_desc'];
        foreach ($adv_list1 as $ke => $value) {
          $unserarr=unserialize($value['item_data']);
        }
        $list = $unserarr['item'];
          foreach ($list as $key => $value) {
            $i = substr($value['image'],0,2);
            $value['i'] = $i;
            $adv_list[$key] = $value;
          }
       //  echo "<pre>";
       //  var_dump($adv_list);
       // var_dump($list);
        Tpl::output('ord',$ord['special_id']);
        Tpl::output('title',$title);
        Tpl::output('adv_list',$adv_list);

        //获取小圆行图标
        $ord2['special_id'] = intval($_GET['special_id']);
        $ord2['item_type'] = 'home3';

        $tubiao_list1 = $model->table('mb_special_item')->where($ord2)->select();
        foreach ($tubiao_list1 as $ke => $value) {         
           $tubiao = unserialize($value['item_data']);
        }
        
        $list=$tubiao['item'];
        if(!empty($list)){
          foreach ($list as $ke1 => $valu1) {
              $i = @explode("_",$valu1['image']);
              $valu1['i'] = $i['0'];
              $tubiao_list[] = $valu1;

          }
        }
Tpl::output('tubiao_list',$tubiao_list);
        $model = Model();
        $condition['goods_show'] = '1';
        $condition['gc_id'] = array('in','108,109,110,111,112');
        $live_list = $model->table('flea')->where($condition)->order('goods_add_time DESC')->select();
        foreach ($live_list as $key => $value) {
          $i = @explode("_",$value['goods_image']);
          $live_list[$key]['i'] = $i['0'];
        }
        //var_dump($live_list);die;
        Tpl::output('live_list',$live_list);        
        $add_num = $model->table('live')->count('live_id>0');
        Tpl::output('add_num',$add_num);
  
		Tpl::showpage('live');
	}

  //订购信息添加
  public function live_addOp(){    
    $code = $_POST['code'];
    $ca = strtolower($_SESSION['code']);
    if(!($code ==$_SESSION['code']) && !($code == $ca) ){
        showMessage('验证码不正确',$url='',$show_type='',$msg_type='error',$is_show=0,$time=2000);exit;
    }
    $model = Model('live');
    if(isset($_POST)){
      $data['store_id']      = $_POST['store_id'];
      $data['store_name']    = $_POST['store_name'];
      
      if(isset($_POST['kf_name']) && !empty($_POST['kf_name'])){
        $data['apply_name']  = $_POST['kf_name'];
      }else{
        showMessage('姓名为空',$url='',$show_type='',$msg_type='error',$is_show=0,$time=2000);exit;
      }
      if(isset($_POST['kf_phone']) && !empty($_POST['kf_phone'])){
        $data['apply_phone']  = $_POST['kf_phone'];
      }else{
        showMessage('联系方式为空',$url='',$show_type='',$msg_type='error',$is_show=0,$time=2000);exit;
      }
      if(isset($_POST['goods_id']) && $_POST['goods_id'] >0){
        $data['goods_id']      = $_POST['goods_id'];
      }else{
        showMessage('请选择意向楼盘',$url='',$show_type='',$msg_type='error',$is_show=0,$time=2000);exit;
      }
      $live_add = $model->insert($data);
      $mod = Model('goods');
        
        $goods_one_list = $mod->find($data['goods_id']);
        $up['goods_salenum'] = $goods_one_list['goods_salenum']+1;
        $insert = $mod->where(array('goods_id'=>$data['goods_id']))->update($up);
      if($live_add && $insert){       
        showMessage('报名成功',$url='',$show_type='',$msg_type='succ',$is_show=0,$time=2000);exit;
      }
    }    
   }
	public function searchOp(){
		$data['keyword'] = $_GET['keyword'];
		var_dump($data);die;
		Tpl::showpage('live');
	}
  //二手房发布
  public function senhouseOp(){
    //var_dump();
    $model = Model();
    $condition['goods_show'] = '1';
    $condition['gc_id'] = isset($_GET['gc_id'])?$_GET['gc_id']:110;
    $title = $model->table('flea_class')->where(array('gc_id'=>$condition['gc_id']))->find();
    $search_list1 = $model->table('flea')->where($condition)->order('goods_add_time DESC')->select();
    foreach ($search_list1 as $key => $value) {           
           $pieces = @explode("_", $value['goods_image']);
           $value['i'] = $pieces['0'];
           $search_list[$key] = $value; 
    }             
    Tpl::output('title',$title['gc_name']);
    Tpl::output('search_list',$search_list);
    Tpl::showpage('live_senhouse');
  }

  //生成租房信息
  public function rehouseOp(){
    $model = Model('goods');
    $condition['goods_type'] = '1';
    $condition['gc_id'] = isset($_GET['gc_id'])?$_GET['gc_id']:1079;
    $search_list1 = $model->getWapGoodsList($condition);
    foreach ($search_list1 as $key => $value) {
           $store_phone = $model->table('store')->Field('store_phone')->find($value['store_id']);
           $value['store_phone'] = $store_phone['store_phone'];
           $pieces = explode("_", $value['goods_image']);
           $value['i'] = $pieces['0'];
           $search_list[$key] = $value; 
        }
        
    Tpl::output('live_list',$live_list);        
    Tpl::output('title','租房');
    Tpl::output('search_list',$search_list);
    Tpl::showpage('live_rehouse');
  }
//发布信息
  public function live_house_contriOp(){

//职位区域-省
    $area=Model('area');
    //$data2['area_parent_id'] = 
    $area_list1=$area->where(array("area_deep"=>'1'))->select();
    $area_list2=$area->where(array("area_deep"=>'2'))->select();
    $area_list3=$area->where(array("area_deep"=>'3'))->select();
    foreach ($area_list2 as $k2 => $v2) {
        foreach ($area_list3 as $k3 => $v3) {
           if($v2['area_id'] ==$v3['area_parent_id']){
            $area_list2[$k2]['son'][] = $v3;
           }
        }
    }
    $area_model=Model('flea_area');
    $condition['flea_area_parent_id']='0';
    $condition['field']='flea_area_id,flea_area_name';
    $area_one_level=$area_model->getListArea($condition);
    Tpl::output('area_one_level',$area_one_level);
    /**
     * 实例化商品分类模型
     */
    $model_class    = Model('flea_class');
    $condition['gc_show'] = 1;
    $goods_class    = $model_class->getNextLevelGoodsClassById('108');
    //$goods_class    = $model_class->getTreeClassList(1, $condition);
    Tpl::output('goods_class',$goods_class);
    Tpl::output('title','房屋信息发布');
    Tpl::output('area_list2',$area_list2);
    Tpl::showpage('house_contri');

  }
//  二手宝贝添加
  public function live_house_contri_addOp(){
//var_dump($_POST['img']);die;
    /**
       * 验证表单
       */
    if(!($_POST['flea_token'] == $_SESSION['flea_token'])){
      header("Location: index.php?act=live&op=live&special_id=4");
    }else{
      $obj_validate = new Validate();
      $obj_validate->validateparam = array(
      array("input"=>$_POST["goods_name"],"require"=>"true","message"=>"宝贝名称不能为空"),
      array("input"=>$_POST["goods_store_price"],"require"=>"true","validator"=>"Double","message"=>"宝贝价格不能为空")
      );
      $error = $obj_validate->validate();

      if ($error != ''){
        showMessage($lang['error'].$error,'','html','error');
      }
      $model_store_goods  = Model('flea');

      $goods_array      = array();
      $goods_array['member_name']    = $this->member_info['member_name'];
      $goods_array['member_id']    = $this->member_info['member_id'];
      $goods_array['goods_name']    = $_POST['goods_name'];
      $goods_array['goods_type']    = $_POST['goods_type'];
      if($_POST['WU_FILE_0']){
        $goods_array['goods_image'] = empty($_POST['WU_FILE_0'])?0:$_POST['WU_FILE_0'];
        $goods_array['img1']        = empty($_POST['WU_FILE_0'])?0:$_POST['WU_FILE_0'];
        $goods_array['img2']        = empty($_POST['WU_FILE_1'])?0:$_POST['WU_FILE_1'];
        $goods_array['img3']        = empty($_POST['WU_FILE_2'])?0:$_POST['WU_FILE_2'];
        $goods_array['img4']        = empty($_POST['WU_FILE_3'])?0:$_POST['WU_FILE_3'];
        $goods_array['img5']        = empty($_POST['WU_FILE_4'])?0:$_POST['WU_FILE_4'];
      }
      //
      if($_POST['img']){
        $goods_array['goods_image'] = empty($_POST['img']['0'])?0:$_POST['img']['0'];
        $goods_array['img1']  = empty($_POST['img']['0'])?0:$_POST['img']['0'];
        $goods_array['img2']  = empty($_POST['img']['1'])?0:$_POST['img']['1'];
        $goods_array['img3']  = empty($_POST['img']['2'])?0:$_POST['img']['2'];
        $goods_array['img4']  = empty($_POST['img']['3'])?0:$_POST['img']['3'];
        $goods_array['img5']  = empty($_POST['img']['4'])?0:$_POST['img']['4'];
      }
      
      //$goods_array['goods_more_img'] = serialize($goods);
      //var_dump($new);die;
      
      $goods_array['goods_des']    = $_POST['inform'];
      $goods_array['gc_id']     = $_POST['cate_id'];
      $goods_array['gc_name']     = $_POST['cate_name'];
      $goods_array['flea_quality']  = $_POST['sh_quality'];
      $goods_array['flea_pname']    = $_POST['flea_pname'];
      $goods_array['flea_area_id']  = $_POST['area_id'];
      $goods_array['flea_area_name']  = $_POST['area_info'];
      $goods_array['flea_area_xiaoqu']  = $_POST['area_xiaoqu'];
      $goods_array['flea_pphone']   = $_POST['flea_pphone'];
      $goods_array['goods_tag']   = $_POST['goods_tag'];
      $goods_array['goods_price']   = $_POST['goods_price'];
      $goods_array['goods_store_price']= $_POST['price'][0] != '' ? $_POST['price'][0] : $_POST['goods_store_price'];
      $goods_array['goods_money_attr']= $_POST['money_attr'];
      $goods_array['goods_show']    = '1';
      $goods_array['goods_commend'] = $_POST['goods_commend'];
      $goods_array['goods_body']    = $_POST['g_body'];
      $goods_array['goods_keywords']    = $_POST['seo_keywords'];
      $goods_array['goods_description']   = $_POST['seo_description'];
      // var_dump($_POST);
      // var_dump($goods_array);die;
      // error_log('data:'.date('Y-m-d H:i:s',time())."\n".var_export($goods_array['img0'],1)."\n",3,'D:/www/chongm/wap/log1.txt');

      // error_log('data:'.date('Y-m-d H:i:s',time())."\n".var_export($goods_array,1)."\n",3,'D:/www/chongm/wap/log2.txt');
      $state = $model_store_goods->saveWapGoods($goods_array);

      if($state){
        unset($_SESSION['flea_token']);
        showMessage('发布成功','index.php?act=live&op=live&special_id=4');
      }
    }
    
  }
  //闲置物品地区json输出
  public function flea_areaOp() {
    if(intval($_GET['check']) > 0) {
      $_GET['area_id'] = $_GET['region_id'];
    }
    if(intval($_GET['area_id']) == 0) {
      return ;
    }
    $model_area = Model('flea_area');
    $area_array     = $model_area->getListArea(array('flea_area_parent_id'=>intval($_GET['area_id'])),'flea_area_sort desc');
    $array  = array();
    if(is_array($area_array) and count($area_array)>0) {
      foreach ($area_array as $val) {
        $array[$val['flea_area_id']] = array('flea_area_id'=>$val['flea_area_id'],'flea_area_name'=>htmlspecialchars($val['flea_area_name']),'flea_area_parent_id'=>$val['flea_area_parent_id'],'flea_area_sort'=>$val['flea_area_sort']);
      }
      /**
       * 转码
       */
      if (strtoupper(CHARSET) == 'GBK'){
        $array = Language::getUTF8(array_values($array));//网站GBK使用编码时,转换为UTF-8,防止json输出汉字问题
      } else {
        $array = array_values($array);
      }
    }
    if(intval($_GET['check']) > 0) {//判断当前地区是否为最后一级
      if(!empty($array) && is_array($array)) {
        echo 'false';
      } else {
        echo 'true';
      }
    } else {
      echo json_encode($array);
    }
  }
  //json输出闲置物品分类
  public function josn_flea_classOp() {
    /**
     * 实例化商品分类模型
     */
    $model_class    = Model('flea_class');
    $goods_class    = $model_class->getClassList(array('gc_parent_id'=>intval($_GET['gc_id'])));
    $array        = array();
    if(is_array($goods_class) and count($goods_class)>0) {
      foreach ($goods_class as $val) {
        $array[$val['gc_id']] = array('gc_id'=>$val['gc_id'],'gc_name'=>htmlspecialchars($val['gc_name']),'gc_parent_id'=>$val['gc_parent_id'],'gc_sort'=>$val['gc_sort']);
      }
    }
    /**
     * 转码
     */
    if (strtoupper(CHARSET) == 'GBK'){
      $array = Language::getUTF8(array_values($array));//网站GBK使用编码时,转换为UTF-8,防止json输出汉字问题
    } else {
      $array = array_values($array);
    }
    echo json_encode($array);
  }
  /**
     * 图片上传
     */
    public function flea_image_uploadOp() {
        $data = array();
        if(!empty($_FILES['file']['name'])) {
            //echo "<script>alert(111)</script>";
            $prefix = $this->member_info['member_id'];
            $upload = new UploadFile();
            
            $upload->set('default_dir', ATTACH_PATH . DS . 'member' . DS . $prefix);
            $upload->set('max_size',1024*1024*2); //图片最大1M
            // $upload->set('thumb_width',  '240,300');
            // $upload->set('thumb_height', '240,300'); 
            // $upload->set('thumb_ext',    '_240,_300');     

            $upload->set('fprefix', $prefix);
            $upload->set('allow_type', array('gif', 'jpg', 'jpeg', 'png'));

            $result = $upload->upfile('file');
    //error_log('data:'.date('Y-m-d H:i:s',time())."\n".var_export($result,1)."\n",3,'D:/www/chongm/wap/log3.txt');

            if(!$result) {
                $data['error'] = $upload->error;
            }
            $data['image_name'] = $upload->file_name;
            $data['id']=$_POST['id'];
            $data['image_url'] = C('upload_site_url'). DS .
             'shop/member' . DS . $prefix. DS .$data['image_name'];
            //$data['thumb_image'] = C('upload_site_url'). DS .'shop/member' . DS . $prefix. DS .$upload->thumb_image;
        }

        echo json_encode($data);

	  }

    public function wxImgUploadOp(){
      $access_token = $this->get_access_token();
      $media_id = $_POST['serverId'];
      $img_name = $this->member_info['member_id'].'_'.date('YmdHis').rand(1000,9999);
      //D:\www\chongm\data\upload\shop\member
      $dir = 'D:/www/chongm/data/upload/shop/member'. DS . $this->member_info['member_id'].'/';
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
        // error_log('data:'.date('Y-m-d H:i:s',time())."\n".var_export($url,1)."\n",3,'D:/www/chongm/wap/log1.txt');
        // error_log('data:'.date('Y-m-d H:i:s',time())."\n".var_export($targetName,1)."\n",3,'D:/www/chongm/wap/log2.txt');
        // error_log('data:'.date('Y-m-d H:i:s',time())."\n".var_export($ch,1)."\n",3,'D:/www/chongm/wap/log3.txt');
        // error_log('data:'.date('Y-m-d H:i:s',time())."\n".var_export($targetName,1)."\n",3,'D:/www/lqsh/mobile/control/log1.txt');
        
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