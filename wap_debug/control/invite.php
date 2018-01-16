<?php
/**
 * 邀请返利页面
 * by 多用户商城 ww w.33 ha o.c om 
 */
defined('InShopNC') or exit('Access Invalid!');
class inviteControl extends BaseHomeControl{
	public function indexOp(){
		$title = "分享网站";
		Tpl::output('title',$title);
		//var_dump($_Cookie);
		Tpl::showpage('invite');
	}
}
