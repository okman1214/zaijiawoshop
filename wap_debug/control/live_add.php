<?php
/**
 * 生活馆
 */
defined('InShopNC') or exit('Access Invalid!');
class live_addControl extends BaseHomeControl {
//发布信息
  public function live_house_contriOp(){
    Tpl::output('title','我要发布');
    
    Tpl::showpage('live_rehouse');

  }
}