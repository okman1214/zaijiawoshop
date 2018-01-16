<?php
/**
 * 生活小工具
 */
defined('InShopNC') or exit('Access Invalid!');
class shxgjControl extends BaseHomeControl {
	public function __construct(){
        parent::__construct();
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
      // echo "<pre>";  
      // var_dump($adv_list); 
            Tpl::output('ord',$ord['special_id']);
            Tpl::output('title',$title);
            Tpl::output('adv_list',$adv_list);
        
    }
	public function indexOp(){
    if(isset($_GET['special_id'])){
            $model = Model();
            //获取小圆行图标
            $ord2['special_id'] = intval($_GET['special_id']);
            $ord2['item_type'] = 'home3';
            $ord2['item_usable'] = '1';
            $tubiao_list1 = $model->table('mb_special_item')->where($ord2)->order('item_sort desc')->select();
            foreach ($tubiao_list1 as $ke => $value) {   
               $tubiao = unserialize($value['item_data']);
            }
            $list=$tubiao['item'];
            if(!empty($list)){
              foreach ($list as $ke1 => $valu1) {
                  $i = @explode("_",$valu1['image']);
                  $valu1['i'] = $i['0'];
                  $shgj_list[] = $valu1;

              }
            }

            Tpl::output('shgj_list',$shgj_list);
          
        }
		Tpl::showpage('tools');
  }
    
}
