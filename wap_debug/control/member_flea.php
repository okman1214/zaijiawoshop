<?php
/**
 * 生活馆
 */
defined('InShopNC') or exit('Access Invalid!');
class member_fleaControl extends BaseHomeControl {
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
       
       $model = Model();
      // $a = Model()->table('flea')->select();
       $member_flea_list =Model()->table('flea')->where(array('member_id'=>$this->member_info['member_id']))->order('goods_add_time desc')->select();
       //var_dump($member_flea_list);die;
       Tpl::output('member_flea_list',$member_flea_list);
       Tpl::output('title','我的二手');
	   Tpl::showpage('member_flea.index');
	}
    //删除个人二手
    public function delOp(){
        if(!isset($_GET['flea_id'])){
            showMessage('参数错误');
        }else{
            $where['goods_id'] = $_GET['flea_id'];
            $member_del = Model()->table('flea')->where($where)->delete();
            if($member_del){
              showMessage('删除成功');  
            }
        }

    }

}