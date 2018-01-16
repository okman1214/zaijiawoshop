<?php
/**
 * 生活馆
 */
defined('InShopNC') or exit('Access Invalid!');
class member_zhaopControl extends BaseHomeControl {
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
       $member_zhaop_list =Model()->table('class_input')->where(array('uid'=>$this->member_info['member_id']))->order('work_addtime desc')->select();
       $member_jl_list =Model()->table('classify_member_info')->where(array('uid'=>$this->member_info['member_id']))->order('jl_addtime desc')->select();
       //var_dump($member_zhaop_list);die;
       Tpl::output('member_jl_list',$member_jl_list);
       Tpl::output('member_zhaop_list',$member_zhaop_list);
       Tpl::output('title','招聘信息管理');
	   Tpl::showpage('member_zhaop.index');
	}
    //删除个人二手
    public function work_delOp(){
        if(!isset($_GET['mid'])){
            showMessage('参数错误');
        }else{
            $where['id'] = $_GET['mid'];
            $member_del = Model()->table('class_input')->where($where)->delete();
            if($member_del){
              showMessage('删除成功');  
            }
        }

    }
    //删除个人二手
    public function jianli_delOp(){
        if(!isset($_GET['jlid'])){
            showMessage('参数错误');
        }else{
            $where['jl_id'] = $_GET['jlid'];
            $member_del = Model()->table('classify_member_info')->where($where)->delete();
            if($member_del){
              showMessage('删除成功');  
            }
        }

    }

}