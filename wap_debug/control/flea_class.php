<?php
/**
 * 前台闲置物品搜索页面
 * by abc.com
 */
defined('InShopNC') or exit('Access Invalid!');

class flea_classControl extends BaseHomeControl {
	/**
	 *	验证是否开启闲置功能
	 */
	public function __construct(){
		parent::__construct();
		Language::read('home_flea_index');
		if($GLOBALS['setting_config']['flea_isuse']!='1'){
			showMessage(Language::get('flea_index_unable'),'index.php','','error');
		}
	}
	/**
	 * 闲置物品搜索列表
	 */
	public function indexOp(){
		//加载模型		
		$class_model	= Model('flea_class');

		
		//判断是否有子分类
		$con['gc_parent_id'] = $_GET['cate_input'];
		$son_class = Model()->table("flea_class")->where($con)->field('gc_id')->select();
		if($son_class){
			$arr = array();
			foreach ($son_class as $key => $value) {
				$arr[] = $value['gc_id'];
			}
			$a = implode(',',$arr);
			$where['gc_id'] =array('in',$_GET['cate_input'].','.$a);
		}else{
			$where['gc_id'] = $_GET['cate_input'];
		}
		
		// echo "<pre>";
		// var_dump($where);
		$where['goods_show'] = "1";
		$flea_list = Model()->table("flea")->where($where)->limit()->order('goods_add_time DESC')->select();				
		foreach($flea_list as $key=>$val){
			$flea_area = Model()->table('flea_area')->where(array('flea_area_id'=>$val['flea_area_id']))->field('flea_area_name')->find();			
			$flea_list[$key]['flea_area_name'] = $flea_area['flea_area_name'];
		}
		Tpl::output('flea_list',$flea_list);	

		$title = Model()->table('flea_class')->where(array('gc_id'=>$where['gc_id']))->field('gc_name')->find();
		Tpl::output('title',$title['gc_name']);
		Tpl::showpage('flea_class');
	}
}
