<?php
/**
 * 前台品牌分类
 */
defined('InShopNC') or exit('Access Invalid!');
class brandControl extends BaseHomeControl {
	public function indexOp(){
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
		//同城闲置
		
		
        //获得汽车品牌列表
		$model_brand = Model('brand');
		$brand_info = $model_brand->getBrandList(array('class_id' => 730));
		Tpl::output('brand_c_list',$brand_info);

		//二手车
        if(isset($_GET['brand'])){
            $order1['brand_id'] = $_GET['brand'];
        }else{
    		$orde['gc_name'] = "二手车";
    		$model = Model();
    		$car_class_list = $model->table('goods_class')->field('gc_id')->where($orde)->find();		
    		$order1['gc_id'] = $car_class_list['gc_id'];
        }
		$order1["goods_type"] = 1; 
		$model_car = Model('goods');
		$goods_list1 = $model_car->getGoodsStoreList($order1, $field = '*');
		
		foreach ($goods_list1 as $key => $value) {
			$i = @explode("_",$value['goods_image']);
              $value['i'] = $i['0'];
		  $goods_list[$key] = $value;
		}
		//var_dump($goods_list);die;
		Tpl::output('goods_list', $goods_list);

		//获取汽车广告
		$car_ap_list = $model->table('adv_position')->where(array('ap_name'=>'汽车广告'))->limit(1)->select();
		foreach ($car_ap_list as $key => $value) {
			$ord['ap_id'] = $value['ap_id'];
		}
		$car_adv_list1 = $model->table('adv')->where(array('ap_id'=>$ord['ap_id']))->order()->select();
		foreach ($car_adv_list1 as $key => $value) {
		  $unserarr=unserialize($value['adv_content']);
		  $car_adv_list[$key] = $unserarr;
		}
		Tpl::output('car_adv_list',$car_adv_list);
   
    	//var_dump($article_list);
    	$article_list = $model->table('article')->where(array(''));
		Model('seo')->type('brand')->show();	
		
	    //闲置	
		/**
		 * 地区
		 */
		$area_model=Model('flea_area');
		$area_array	= $area_model->area_show();
		Tpl::output('area_one_level', $area_array['area_one_level']);
		Tpl::output('area_two_level', $area_array['area_two_level']);
		
		$model_flea = Model('flea');
		
		$where['goods_show'] = "1";
		$where['gc_id'] = array('not in','108,109,110,111,112');
		$flea_list = Model()->table("flea")->where($where)->limit()->order('goods_add_time DESC')->select();				
		foreach($flea_list as $key=>$val){
			$i = @explode("_",$val['goods_image']);
              
			$flea_area = Model()->table('flea_area')->where(array('flea_area_id'=>$val['flea_area_id']))->field('flea_area_name')->find();			
			$flea_list[$key]['flea_area_name'] = $flea_area['flea_area_name'];
			$flea_list[$key]['i'] =$i['0'];
		}
		Tpl::output('flea_list',$flea_list);	

		//二手汽车$condition['member_name|member_trname'] = array(array('like','%shopnc%'));


		$condition['gc_name'] = array(array('like','%二手整车%'));
		$condition['goods_show'] = "1";
		$flea_list1 = @(Model()->table("flea")->where($condition)->limit(3)->order('goods_add_time DESC')->select());
		//$goods_list = $model_flea->listGoods($condition);
		foreach($flea_list1 as $key=>$val){
			$flea_area = Model()->table('flea_area')->where(array('flea_area_id'=>$val['flea_area_id']))->field('flea_area_name')->find();			
			$flea_list1[$key]['flea_area_name'] = $flea_area['flea_area_name'];
		}
		Tpl::output('flea_list1',$flea_list1);	
		Tpl::showpage('flea');
	}
	
	/**
 * 取得的时间间隔 
 */
	function checkTime($time){
		if($time==''){
			return false;
		}
		Language::read('common_flea');
		$lang	= Language::getLangContent();
		$catch_time = (time() - $time);
		if($catch_time < 60){
			echo $catch_time.$lang['second'];
		}elseif ($catch_time < 60*60){
			echo intval($catch_time/60).$lang['minute'];
		}elseif ($catch_time < 60*60*24){
			echo intval($catch_time/60/60).$lang['hour'];
		}elseif ($catch_time < 60*60*24*365){
			echo intval($catch_time/60/60/24).$lang['day'];
		}elseif ($catch_time < 60*60*24*365*999){
			echo intval($catch_time/60/60/24/365).$lang['year'];
		}
	}
	
	
	
	public function brand_detailOp(){
		// if(!isset($_GET['gc_id'])){
		// 	showMessage('参数错误');
		// }
		$data['goods_id'] = $_GET['goods_id'];
		$model = Model('flea');
		$flea_detail = Model()->table("flea")->where($data)->find();
		$m = $flea_detail['goods_more_img'];
		$flea_detail['goods_more_img'] = unserialize($m);
		$i = @explode("_",$flea_detail['goods_image']);
        $flea_detail['i'] = $i['0'];
		Tpl::output('title',$flea_detail['goods_name']);
		Tpl::output('flea_detail',$flea_detail);
		
		Tpl::showpage('flea_goods');
	}

	//发布信息
  public function flea_house_contriOp(){

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
    //$goods_class    = $model_class->getNextLevelGoodsClassById('108');
    $goods_class    = $model_class->getTreeClassList(1, $condition);
    Tpl::output('goods_class',$goods_class);
    Tpl::output('title','二手发布');
    Tpl::output('area_list2',$area_list2);
    Tpl::showpage('flea_fabu');

  }
//  二手宝贝添加
  public function flea_house_contri_addOp(){
//var_dump($_POST['img']);die;
    /**
       * 验证表单
       */
    if(!($_POST['flea_token'] == $_SESSION['flea_token'])){
      header("Location: index.php?act=brand&op=index&special_id=3");
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
        showMessage('发布成功','index.php?act=brand&op=index&special_id=3');
      }
    }
    
  }
	
}