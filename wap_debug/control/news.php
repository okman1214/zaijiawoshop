<?php
/**
 * 前台品牌分类
 */
defined('InShopNC') or exit('Access Invalid!');
class newsControl extends BaseHomeControl {
	public function __construct(){
        parent::__construct();
//获取bander图和小图标
        // if(isset($_GET['special_id'])){
        //     $model = Model();
        //     $ord['special_id'] = intval($_GET['special_id']);
        //     $ord['item_type'] = 'adv_list';
        //     $adv_list1 = $model->table('mb_special_item')->where($ord)->select();
        //     $title = $model->table('mb_special')->where(array('special_id'=>$_GET['special_id']))->find();
        //     $title = $title['special_desc'];
        //     foreach ($adv_list1 as $ke => $value) {
        //       $unserarr=unserialize($value['item_data']);
        //     }
        //     foreach ($unserarr as $k => $val) {
        //       foreach ($val as $key => $value) {
        //         $i = substr($value['image'],0,2);
        //         $value['i'] = $i;
        //         $adv_list[] = $value;
        //       }
        //     }
			
        //     Tpl::output('ord',$ord['special_id']);
        //     Tpl::output('title',$title);
        //     Tpl::output('adv_list',$adv_list);

        //     //获取小圆行图标
        //     $ord2['special_id'] = intval($_GET['special_id']);
        //     $ord2['item_type'] = 'home3';

        //     $tubiao_list1 = $model->table('mb_special_item')->where($ord2)->select();
        //     foreach ($tubiao_list1 as $ke => $value) {         
        //        $tubiao = unserialize($value['item_data']);
        //     }
        //     $list=$tubiao['item'];
        //     if(!empty($list)){
        //       foreach ($list as $ke1 => $valu1) {
        //           $i = substr($valu1['image'],0,2);
        //           $valu1['i'] = $i;
        //           $tubiao_list[] = $valu1;

        //       }
        //     }

        //     Tpl::output('tubiao_list',$tubiao_list);
        // }
    }
	public function indexOp(){
        if($_GET['news_class']){
            $where['news_class_id'] = $_GET['news_class'];
        }
		$model_news_class = Model('news_class');
		$model_news       = Model('news');
		$news_class_list = $model_news_class->where(array('gc_parent_id'=>0))->select();
        //三张图片新闻
        $san_news_list = $model_news->where(array('news_hot'=>1))->order('news_addtime')->select();
		

        $all_news_list = $model_news->where($where)->field('news_id,news_name,news_title,news_pic,news_onclick')->order('news_addtime')->select();
        
        Tpl::output('title','崇明新闻');
        Tpl::output('all_news_list',$all_news_list);
        Tpl::output('news_class_list',$news_class_list);
		Tpl::output('san_news_list',$san_news_list);
		Tpl::showpage('news');
    }
    //按分类排列
    // public function news_classOp(){

    // }

    //新闻详情
    public function news_detailOp(){
        $model_news = Model('news');
        $news_detail_list = $model_news->where(array('news_id'=>$_GET['news_id']))->select();
        $model_news ->where(array('news_id'=>$_GET['news_id']))->setInc('news_onclick',1);
//查找上一篇
        Tpl::output('news_detail_list',$news_detail_list);
         $top_one = $model_news->where(array('news_id'=>$_GET['news_id']+1))->field('news_id,news_name')->find();       
         $but_one = $model_news->where(array('news_id'=>$_GET['news_id']-1))->field('news_id,news_name')->find();       
        //var_dump($news_detail_list);
        Tpl::output('top_one',$top_one);
        Tpl::output('but_one',$but_one);
        Tpl::output('news_detail_list',$news_detail_list);
        Tpl::output('title','新闻详情');


    	Tpl::showpage('news_detail');
    }

//添加关注    
    public function news_addclickOp(){
    	$model_news = Model('news');
        $model_news ->where(array('news_id'=>$_POST['news_id']))->setInc('news_onclick',1);

    }
}
