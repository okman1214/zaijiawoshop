<?php
/**
 * 生活馆
 */
defined('InShopNC') or exit('Access Invalid!');
class live_listControl extends BaseHomeControl {
	public function indexOp(){
    $model = model('goods');
      if ($_GET['keyword'] != '') {
                  $condition['goods_name|goods_jingle'] = array('like', '%' . $_GET['keyword'] . '%');
      }
      $condition['gc_id_1']=1057;
      $search_list1 = $model->where($condition)->limit(2)->select();
      foreach ($search_list1 as $key => $value) {
        $i = substr($value['goods_image'],0,1);
        $value['i'] = $i;
           $search_list[$key] = $value;
      }
       //var_dump($search_list);
       Tpl::output('search_list',$search_list);
       Tpl::showpage('live_list');
    
  }

	
}