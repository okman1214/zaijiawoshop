<?php
/**
 * 前台品牌分类
 */
defined('InShopNC') or exit('Access Invalid!');
class weizhixiaoControl extends BaseHomeControl {
	public function __construct(){
        parent::__construct();
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
    $model_brand = Model('brand');
    $condition['store_id'] = array('gt',0);
    $condition['brand_apply'] = 1;
    $condition['show_type'] = 0;
    $brand_store_list = $model_brand->where($condition)->select();
    foreach ($brand_store_list as $key => $value) {
      $where['store_id'] = $value['store_id'];
      $where['brand_id'] = $value['brand_id'];
      $model_goods = Model();
      $goods_list = $model_goods->table('goods')->where($where)->order('goods_addtime')->limit(20)->find();
      $goods_list['goods_image_url'] = cthumb($goods_list['goods_image'], 240, $goods_list['store_id']);
      $brand_store_list[$key]['goods_list'] = $goods_list;
      if(empty($brand_store_list[$key]['goods_list']['goods_name'])){
        unset($brand_store_list[$key]);
      }
      
    }

		Tpl::output('brand_store_list',$brand_store_list);
		Tpl::showpage('weizhixiao');
  }
    
}
