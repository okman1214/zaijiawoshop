<?php
/**
 * 前台品牌分类
 */
defined('InShopNC') or exit('Access Invalid!');
class salesControl extends BaseHomeControl {
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
		$model = Model('store');
		$model_s_goods = Model('goods');
		//获取推荐商家 
		$condition['store_recommend'] = 0;
		$store_list = $model->getStoreOnlineList($condition,$page = null, $order = 'store_id', $field = '*',$limit = '');
		$store_list = $model->getStoreSearchList($store_list);
		//var_dump($store_list);die;
		
		foreach($store_list as $key =>$value){
			$where['store_id'] = $value['store_id'];
			$where["goods_type"] = "0";
			$goods_list = $model_s_goods->where($where)->field('goods_id,goods_image,goods_price')->limit(3)->select();
			foreach($goods_list as $k =>$val){
				$i = cthumb($val['goods_image'], 240, $val['store_id']);
				
				$goods_list[$k]["image_url"] = $i;
			}
			//$value[$key] = $goods_list;
			$store_list[$key]['store_goods'] = $goods_list ; 
      if (empty($store_list[$key]['store_goods'])) {
        unset($store_list[$key]);
      }
		}
		//echo"<pre>";
		//var_dump($store_list);

		Tpl::output('store_list',$store_list);
		Tpl::output('work_list',$work_list);
		Tpl::showpage('sales');
    }
    
}
