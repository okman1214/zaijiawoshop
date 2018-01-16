<?php defined('InShopNC') or exit('Access Invalid!');?>

<link href="<?php echo SHOP_TEMPLATES_URL;?>/css/index.css" rel="stylesheet" type="text/css">

<script src="<?php echo RESOURCE_SITE_URL;?>/js/waypoints.js"></script>

<script type="text/javascript" src="<?php echo SHOP_RESOURCE_SITE_URL;?>/js/home_index.js" charset="utf-8"></script>

<!--[if IE 6]>

<script type="text/javascript" src="<?php echo RESOURCE_SITE_URL;?>/js/ie6.js" charset="utf-8"></script>

<![endif]-->

<style type="text/css">

.category { display: block !important; }

<script src="http://www.vshop.so/taitb/js/pui.js?v=7ddb247fa0" charset="utf-8"></script><!--[if !IE]>|xGv00|dd1ee68aa7fbf28f859d51b0269d84c4<![endif]-->

<script>window["PP.index.v2014b.time"]=[new Date()]</script>

<script id="legos:22195" ver="22195:20140705:20140813142708" name="PP.index.v2014b" src="http://www.vshop.so/taitb/js/pp.index.v2014b.20140705.js?t=20140813142708" charset="gbk"></script><!--[if !IE]>|xGv00|e8b93c240b810c7f7d0fa25062b8533a<![endif]--> 

	<style>

	blingbling{0%{opacity:0;transform:translateY(110px)}30%{opacity:0.6;transform:translateY(0)}40%{opacity:0.3}100%{opacity:1}}.pp819_mask{display:none;position:fixed;_position:absolute;top:0;left:0;right:0;bottom:0;overflow:hidden;width:100%;height:100%;background-color:#000;opacity:0.6;filter:alpha(opacity=60);z-index:1000}.pp819_layer{display:none;position:fixed;_position:absolute;top:50%;_top:100px;left:50%;background:url('http://www.vshop.so/taitb/images/819_layer.png') no-repeat;_background:url('http://www.vshop.so/taitb/images/819_layer.png') no-repeat;width:855px;height:600px;margin-top:-300px;_margin-top:0px;margin-left:-493px;z-index:1001}.pp819_layer_close{display:block;position:absolute;top:163px;left:811px;display:block;width:34px;height:34px;outline:none}.pp819_layer_clock{display:block;position:absolute;top:527px;left:402px;display:block;width:189px;height:43px;outline:none}@media (max-width:1210px){.pp819_logo{margin-left:-615px}}.p_mini .pp819_logo{margin-left:-615px}.pp_showbanner .pp819_logo{top:110px}.pp_shownotice .pp819_logo{top:60px}.pp_hidetopmessage .pp819_logo{top:30px !important}

</style>



<div class="pp819_layer" id="J_pp819_layer" style="display: none;">

	<a href="javascript:;" class="pp819_layer_close" id="J_pp819_close" title="点击关闭"></a>

	<a href="http://www.vshop.so/shop/index.php?act=show_joinin&op=index" class="pp819_layer_clock" id="J_pp819_clock" target="_blank" title="申请商家入驻" ptag="20359.1.1"></a>

</div>

<div class="pp819_mask" id="J_pp819_mask" style="display: none;"></div>

<script>

	!function(){var a=$("#J_pp819_layer"),b=$("#J_pp819_mask"),c=$("#J_pp819_close"),d=$("#J_pp819_logo");$getCookie("ppAugustStarsLayer")||(b.show(),a.show()),c.on("click",function(c){c.preventDefault(),b.hide(),a.hide(),$setCookie("ppAugustStarsLayer",(new Date).getTime())}),d.on("click",function(c){c.preventDefault(),b.show(),a.show()})}();

</script><!--[if !IE]>|xGv00|31976023981561c5f3fffff04e37bc70<![endif]--><!-- 新版商家入驻页面片 --> 

</style>

<div class="clear"></div>



<!-- HomeFocusLayout Begin-->

<div class="home-focus-layout"> <?php echo $output['web_html']['index_pic'];?>

  <div class="right-sidebar">

    <div class="right-panel">

      <?php if ($_SESSION['is_login']) {?>

      <div class="loginBox">

        <div class="exitPanel"> <img src="<?php echo getMemberAvatar($_SESSION['avatar']);?>" alt="" />

          <div class="message">

            <p class="name">Hi, <a href="<?php echo urlShop('member','home');?>"><?php echo $_SESSION['member_name'];?></a></p>

            <p class="logOut qiueExt">[<a href="<?php echo urlShop('login','logout');?>">退出登录</a>]</p>

          </div>

          <div class="clear"></div>

        </div>

        

        <!-- 买家信息 -->

        

        <div class="txtPanel"> <a href="index.php?act=member_order&state_type=state_new" class="line">

          <p class="num"><?php echo $output['member_order_info']['order_nopay_count'];?></p>

          <p class="txt">待付款</p>

          </a> <a target="_blank" href="index.php?act=member_order&op=index" class="line">

          <p class="num"><?php echo $output['member_order_info']['order_noreceipt_count'];?></p>

          <p class="txt">待收货</p>

          </a> <a target="_blank" href="index.php?act=member_refund&op=index">

          <p class="num"><?php echo $output['member_order_info']['order_noeval_count'];?></p>

          <p class="txt">待评价</p>

          </a> </div>

      </div>

      <?php } else {?>

      <div class="loginBox">

        <div class="welcomePanel"> <img src="<?php echo getMemberAvatar($_SESSION['avatar']);?>">

          <p>Hi，欢迎来<?php echo $output['setting_config']['site_name']; ?>，请登录</p>

        </div>

        <div class="loginPanel"> <a href="<?php echo urlShop('login','logout');?>" rel="nofollow"> <span class="loginTxt"><img alt="" src="<?php echo SHOP_TEMPLATES_URL;?>/images/u-me.png">登录</span> </a> <a href="index.php?act=login&op=register&ref_url=<?php echo urlencode($output['ref_url']);?>" rel="nofollow"> <span class="reigsterTxt"><img alt="" src="<?php echo SHOP_TEMPLATES_URL;?>/images/u-pencil.png">注册</span> </a> </div>

      </div>

      <?php } ?>

      <div class="securePanel">

        <li><img alt="买家保障" src="<?php echo SHOP_TEMPLATES_URL;?>/images/u-promise.png">

          <p>买家保障</p>

        </li>

        <li><img alt="商家认证" src="<?php echo SHOP_TEMPLATES_URL;?>/images/u-quality.png">

          <p>商家认证</p>

        </li>

        <li><img alt="安全交易" src="<?php echo SHOP_TEMPLATES_URL;?>/images/u-safe.png">

          <p>安全交易</p>

        </li>

      </div>

      <div class="panelimg-side">

        <ul>

          <li><?php echo loadadv(1049);?></li>

        </ul>

      </div>

      <div class="clear"></div>

    </div>

  </div>

</div>

<!--HomeFocusLayout End-->



<div class="home-sale-layout wrapper">

  <div class="left-layout"> <?php echo $output['web_html']['index_sale'];?> </div>

  <?php if(!empty($output['xianshi_item']) && is_array($output['xianshi_item'])) { ?>

  <div class="right-sidebar">

    <div class="title">

      <h3><?php echo $lang['nc_xianshi'];?></h3>

    </div>

    <div id="saleDiscount" class="sale-discount">

      <ul>

        <?php foreach($output['xianshi_item'] as $val) { ?>

        <li>

          <dl>

            <dt class="goods-name"><?php echo $val['goods_name']; ?></dt>

            <dd class="goods-thumb"><a href="<?php echo urlShop('goods','index',array('goods_id'=> $val['goods_id']));?>"> <img src="<?php echo thumb($val, 240);?>"></a></dd>

            <dd class="goods-price"><?php echo ncPriceFormatForList($val['xianshi_price']); ?> <span class="original"><?php echo ncPriceFormatForList($val['goods_price']);?></span></dd>

            <dd class="goods-price-discount"><em><?php echo $val['xianshi_discount']; ?></em></dd>

            <dd class="time-remain" count_down="<?php echo $val['end_time']-TIMESTAMP;?>"><i></i><em time_id="d">0</em><?php echo $lang['text_tian'];?><em time_id="h">0</em><?php echo $lang['text_hour'];?> <em time_id="m">0</em><?php echo $lang['text_minute'];?><em time_id="s">0</em><?php echo $lang['text_second'];?> </dd>

            <dd class="goods-buy-btn"></dd>

          </dl>

        </li>

        <?php } ?>

      </ul>

    </div>

  </div>

  <?php } ?>

</div>

<div class="wrapper">

  <div class="mt10">

    <div class="mt10"><?php echo loadadv(11,'html');?></div>

  </div>

</div>

<!--StandardLayout Begin--> 

<?php echo $output['web_html']['index'];?> 

<!--StandardLayout End--> 

<!--热门晒单str v3-b12-->

<div class="comment">

  <div class="tit">

    <div class="cmttite"><span>

      <?php if(!empty($output['goods_evaluate_info']) && is_array($output['goods_evaluate_info'])){?>

      大家购买了

      <?php }else{?>

      招商入驻

      <?php }?>

      </span></div>

    <div class="notice">

      <h3><a>商城公告</a></h3>

    </div>

  </div>

  <div class="cmtcon">

    <div class="cmtleft">

      <div id="con">

        <ul>

          <?php if(!empty($output['goods_evaluate_info']) && is_array($output['goods_evaluate_info'])){?>

          <?php foreach($output['goods_evaluate_info'] as $k=>$v){?>

          <li>

            <dl>

              <dt class="goods-thumb"> <a target="_blank" href="<?php echo urlShop('goods','index',array('goods_id'=> $v['geval_goodsid']));?>"> <img src="<?php echo UPLOAD_SITE_URL;?>/shop/common/loading.gif" rel="lazy" data-url="<?php echo strpos($v['goods_pic'],'http')===0 ? $v['goods_pic']:UPLOAD_SITE_URL."/".ATTACH_GOODS."/".$v['geval_storeid']."/".$v['geval_goodsimage'];?>" title="<?php echo $v['geval_goodsname']; ?>" alt="<?php echo $v['geval_goodsname']; ?>" /> </a> </dt>

              <dd>

                <h3><span class="username"> <a target="_blank" href="index.php?act=member_snshome&mid=<?php echo $v['geval_frommemberid'];?>"> <?php echo str_cut($v['geval_frommembername'],2).'***';?> </a> </span> <span class="datetime"> <em> <?php echo @date('m-d',$v['geval_addtime']);?> </em> 购买了</span><span class="star"><i class="v_5"></i></span></h3>

              </dd>

              <dd class="goods-name"> <a target="_blank" href="<?php echo urlShop('goods','index',array('goods_id'=> $v['geval_goodsid']));?>" title="<?php echo $v['geval_goodsname']; ?>"> <?php echo $v[ 'geval_goodsname']; ?> </a> </dd>

            </dl>

          </li>

          <?php }?>

          <?php }else{?>

          <a target="_blank" title="商家入驻" href="<?php echo urlShop('show_joinin', 'index');?>"> <img width="978" height="248" data-url="<?php echo UPLOAD_SITE_URL;?>/shop/common/i_store_joinio.png" rel="lazy" alt="" src="<?php echo UPLOAD_SITE_URL;?>/shop/common/loading.gif"></a>

          <?php }?>

        </ul>

      </div>

    </div>

    <div class="cmtrigt">

      <div class="noticecon">

        <div class="proclamation">

          <div class="tabs-panel">

            <div class="tabs-panel"> <a href="<?php echo urlShop('show_joinin', 'index');?>" title="商家入驻" class="store-join-btn" target="_blank">商家入驻</a> <a href="<?php echo urlShop('seller_login','show_login');?>" target="_blank" class="store-join-help"><i class="icon-cog"></i>登录商家中心</a> </div>

            <ul class="mall-news">

              <?php if(!empty($output['show_article']['notice']['list']) && is_array($output['show_article']['notice']['list'])) { ?>

              <?php foreach($output['show_article']['notice']['list'] as $val) { ?>

              <li><i></i><a target="_blank" href="<?php echo empty($val['article_url']) ? urlMember('article', 'show',array('article_id'=> $val['article_id'])):$val['article_url'] ;?>" title="<?php echo $val['article_title']; ?>"><?php echo str_cut($val['article_title'],24);?> </a>

                <time>(<?php echo date('Y-m-d',$val['article_time']);?>)</time>

              </li>

              <?php } ?>

              <?php } ?>

            </ul>

          </div>

        </div>

      </div>

    </div>

  </div>

</div>

<!--热门晒单end-->



<div class="wrapper mt10"><?php echo loadadv(9,'html');?></div>

<div class="index-link wrapper">

  <dl class="website">

    <dt>合作伙伴 | 友情链接<b></b></dt>

    <dd>

      <?php 

		  if(is_array($output['$link_list']) && !empty($output['$link_list'])) {

		  	foreach($output['$link_list'] as $val) {

		  		if($val['link_pic'] == ''){

		  ?>

      <a href="<?php echo $val['link_url']; ?>" target="_blank" title="<?php echo $val['link_title']; ?>"><?php echo str_cut($val['link_title'],15);?></a>

      <?php

		  		}

		 	}

		 }

		 ?>

    </dd>

  </dl>

</div>

<div class="footer-line"></div>

<!--首页底部保障开始-->

<?php require_once template('layout/index_ensure');?>

<!--首页底部保障结束--> 

<!--StandardLayout Begin-->

<div id="nav_box">

  <ul>

    <li class="nav_h_1"><a href="javascript:;" class="num">1F</a> <a href="javascript:;" class="word">生鲜</a></li>

    <li class="nav_h_2"><a href="javascript:;" class="num">2F</a> <a href="javascript:;" class="word">男装</a></li>

    <li class="nav_h_3"><a href="javascript:;" class="num">3F</a> <a href="javascript:;" class="word">鞋靴</a></li>

    <li class="nav_h_4"><a href="javascript:;" class="num">4F</a> <a href="javascript:;" class="word">护肤</a></li>

    <li class="nav_h_5"><a href="javascript:;" class="num">5F</a> <a href="javascript:;" class="word">皮具</a></li>

    <li class="nav_h_6"><a href="javascript:;" class="num">6F</a> <a href="javascript:;" class="word">户外</a></li>

    <li class="nav_h_7"><a href="javascript:;" class="num">7F</a> <a href="javascript:;" class="word">配饰</a></li>

    <li class="nav_h_8"><a href="javascript:;" class="num">8F</a> <a href="javascript:;" class="word">家居</a></li>

  </ul>

</div>

<!--StandardLayout End-->