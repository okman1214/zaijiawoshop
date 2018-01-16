<?php defined('InShopNC') or exit('Access Invalid!');?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>崇明新闻</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black">
<meta name="format-detection" content="telephone=no">
<link rel="stylesheet" type="text/css" href="<?php echo WAP_SITE_URL;?>/css/reset.css">
<link rel="stylesheet" type="text/css" href="<?php echo WAP_SITE_URL;?>/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo WAP_SITE_URL;?>/css/main.css">
<link rel="stylesheet" type="text/css" href="<?php echo WAP_SITE_URL;?>/css/child.css">
<link rel="stylesheet" type="text/css" href="<?php echo WAP_SITE_URL;?>/css/index.css">
<style type="text/css">

.demo{position: relative;    height: 35px;}

/* select */
.select{/*position:relative;*/float:left;width: 33%;}
.select dt{height:35px;line-height:35px;display:inline-block;border:1px solid #d2ccc4;background:#fcfcfb url(images/ico.gif) no-repeat 97px center;font-weight:bold;/*padding-left:10px;cursor:pointer;padding-right:12px;*/width:100%;text-align:center;white-space:nowrap;text-overflow:ellipsis;overflow:hidden;position:relative;z-index:99;}
.select dt:hover,.select dt.cur{border:1px solid #409DFE;box-shadow:0 0 3px #409DFE;}
.select dd{position:absolute;left:0;top:29px;border:1px solid #d2ccc4;background:#fff;display:none;width:100%}
.select dd ul{/*padding:4px;width:104px;*/max-height:100%;overflow:auto;}
.select dd ul li a{line-height:28px;display:block;padding:0 8px;}
.select dd ul li a:hover{background:#f5f5f5;}
</style>
<!--
<script type="text/javascript">
$(function(){
	$(".select ul li").each(function(){
		var s=$(this);
		var z=parseInt(s.css("z-index"));
		//var dt=$(this).children("dt");
		var dd=$(".show");
		var _show=function(){dd.slideDown(200);s.addClass("cur");s.css("z-index",z+1);};   //展开效果
		var _hide=function(){dd.slideUp(200);s.removeClass("cur");s.css("z-index",z);};    //关闭效果
		s.click(function(){dd.is(":hidden")?_show():_hide();});
		dd.find("a").click(function(){dd.html($(this).html());_hide();});     //选择效果（如需要传值，可自定义参数，在此处返回对应的“value”值 ）
		$("body").click(function(i){ !$(i.target).parents(".select").first().is(s) ? _hide():"";});
	})
})
</script>
-->
<script type="text/javascript">
$(function(){
	$(".select").each(function(){
		var s=$(this);
		var z=parseInt(s.css("z-index"));
		var dt=$(this).children("dt");
		var dd=$(this).children("dd");
		var _show=function(){dd.slideDown(200);dt.addClass("cur");s.css("z-index",z+1);};   //展开效果
		var _hide=function(){dd.slideUp(200);dt.removeClass("cur");s.css("z-index",z);};    //关闭效果
		dt.click(function(){dd.is(":hidden")?_show():_hide();});
		dd.find("a").click(function(){dt.html($(this).html());_hide();});     //选择效果（如需要传值，可自定义参数，在此处返回对应的“value”值 ）
		$("body").click(function(i){ !$(i.target).parents(".select").first().is(s) ? _hide():"";});
	})
})
</script>

</head>
<body>
<div class="demo">

	<dl class="select">
		<dt>商家分类</dt>
		<dd>
			<ul>
				<li><a href="#">面点</a></li>
				<li><a href="#">快餐</a></li>
				<li><a href="#">煲仔饭</a></li>
			</ul>
		</dd>
	</dl>
	
	<dl class="select">
		<dt>智能排序</dt>
		<dd>
			<ul>
				<li><a href="#">智能排序</a></li>
				<li><a href="#">最热门</a></li>
				<li><a href="#">好评率高</a></li>
			</ul>
		</dd>
	</dl>

	<dl class="select">
		<dt>优惠活动</dt>
		<dd>
			<ul>
				<li><a href="#">满减活动</a></li>
				<li><a href="#">收单免费</a></li>
				<li><a href="#">首单减10</a></li>
			</ul>
		</dd>
	</dl>
	
</div>

<div class="take">
	<div class="take_shop">
	<div class="take_logo"><img src="<?php echo WAP_SITE_URL?>/images/take_logo.jpg"></div>
	<div class="take_rig">
	<p class="take_rig_p1"><span><i>¥20</i>起送</span><dfn>开心小站煲仔饭</dfn></p>
	<p class="take_rig_p2"><span>付</span>月售2629份</p>
	<p class="take_rig_p3">50分钟/300米</p>
	<p class="take_rig_p4"><span>减</span>在线支付满100送100</p>
	<p class="take_rig_p5"><span>首</span>新用户下单立减10元</p>
	</div>
	</div>

	<div class="take_shop">
	<div class="take_logo"><img src="<?php echo WAP_SITE_URL?>/images/take_logo.jpg"></div>
	<div class="take_rig">
	<p class="take_rig_p1"><span><i>¥20</i>起送</span><dfn>开心小站煲仔饭</dfn></p>
	<p class="take_rig_p2"><span>付</span>月售2629份</p>
	<p class="take_rig_p3">50分钟/300米</p>
	<p class="take_rig_p4"><span>减</span>在线支付满100送100</p>
	<p class="take_rig_p5"><span>首</span>新用户下单立减10元</p>
	</div>
	</div>

</div>







</body>




</html>