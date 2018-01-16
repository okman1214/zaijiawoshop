<?php defined('InShopNC') or exit('Access Invalid!');?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<script type="text/javascript">

</script>
<title></title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black">
<meta name="format-detection" content="telephone=no">
<link rel="stylesheet" type="text/css" href="<?php echo WAP_SITE_URL;?>/css/reset.css">
<link rel="stylesheet" type="text/css" href="<?php echo WAP_SITE_URL;?>/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo WAP_SITE_URL;?>/css/main.css">
<link rel="stylesheet" type="text/css" href="<?php echo WAP_SITE_URL;?>/css/child.css">
<link rel="stylesheet" type="text/css" href="<?php echo WAP_SITE_URL;?>/css/index.css">
</head>
<body>
	<!-- <div class="index_block home1 sell_round">
	
		<div class="sell_tit">
		<div class="sell_add"><i><img src="<?php echo WAP_SITE_URL;?>/images/sell_add.png"  alt=""></i>周边商城</div>
		<div class="sell_loca"><input type="text" name=""></div>
		</div>
		<div class="content">
			<div class="item">
				<a href="<%= url %>">
					<img src="<?php echo WAP_SITE_URL;?>/images/sell_loca.jpg" alt="">
				</a>
			</div>
		</div>
	</div> -->


	<div class="sell_recom">
	
		<div class="sell_recom_tit">
		<i></i>推荐商家
		</div>
<?php if(!empty($output['store_list'])){?>

		<div class="content">
		<?php foreach($output['store_list'] as $key => $store_list){?>
			<div class="shop_item">
				<div class="shop_name"><a href="<?php echo WAP_SITE_URL.'/tmpl/go_store.html?store_id='.$store_list['store_id'] ?>"><dfn></dfn><img src="<?php echo $store_list['store_logo'] ;?>" alt=""><span><?php echo $store_list['store_name']?></span></a></div>
				<div class="shop_img">
				<?php foreach($store_list['store_goods'] as $key => $store_goods_list){?>
					
				<a href="<?php echo WAP_SITE_URL.'/tmpl/product_detail.html?goods_id='.$store_goods_list['goods_id'] ?>"><img src="<?php echo $store_goods_list['image_url'] ;?>" alt="">
				<span></span><i>¥<?php echo $store_goods_list['goods_price'] ;?></i></a>
				<!--<a href=""><img src="<?php echo WAP_SITE_URL;?>/images/sell_img2.jpg" alt="">
				<span></span><i>¥20.00</i></a>
				<a href=""><img src="<?php echo WAP_SITE_URL;?>/images/sell_img3.jpg" alt="">
				<span></span><i>¥20.00</i></a>-->
				
				<?php }?>
				</div>
				<div class="shop_bott"><span>今天12:31</span><dfn>上新</dfn>新上宝贝</div>
			</div>
		<?php }?>	
		</div>
		<?php }?>
	</div>









<script type="text/html" id="home3">
	<div class="index_block home3">
	<% if (title) { %>
		<div class="title"><%= title %></div>
	<% } %>
		<div class="content">
		<% for (var i in item) { %>
			<div class="item">
				<a href="<%= item[i].url %>"><img src="<%= item[i].image %>" alt=""></a>
			</div>
		<% } %>
		</div>
	</div>
</script>



</body>
<style type="text/css">
    html,body{margin:0;padding:0;}
    .iw_poi_title {color:#CC5522;font-size:14px;font-weight:bold;overflow:hidden;padding-right:13px;white-space:nowrap}
    .iw_poi_content {font:12px arial,sans-serif;overflow:visible;padding-top:4px;white-space:-moz-pre-wrap;word-wrap:break-word}
</style>
<script type="text/javascript" src="http://api.map.baidu.com/api?key=&v=1.1&services=true"></script>
</html>