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
</head>
<body>

<div class="seco_act"><img src="<?php echo WAP_SITE_URL?>/images/wei_activ.jpg"></div>

<div class="wei">
	
	<div class="sell_recom_tit">
		<i></i>品牌商家每日更新
	</div>
	<?PHP if(!empty($output['brand_store_list'])){?>
		<div class="content">
		<?php foreach($output['brand_store_list'] as $key =>$brand_store_list){?>
			<div class="shop_item ">

				<div class="wei_shop">
				<div class="wei_left">
					<a href="/wap/tmpl/go_store.html?store_id=<?php echo $brand_store_list['store_id'];?>">
						
						<?php if($brand_store_list['brand_pic']){?>
							<img src="<?php echo UPLOAD_SITE_URL.'/shop/brand/'.$brand_store_list['brand_pic'];?>">
						<?php }else{?>
							<img src="<?php echo UPLOAD_SITE_URL.'/shop/common/default_brand_image.gif';?>">
						<?php }?>
						
						<p><?php echo $brand_store_list['brand_des'];?></p>
						<span><?php echo sprintf("%.1f",($brand_store_list['goods_list']['goods_price']/$brand_store_list['goods_list']['goods_marketprice']))*10;?></span>
					</a>
				</div>
				<div class="wei_rig"><a href="/wap/tmpl/product_detail.html?goods_id=<?php echo $brand_store_list['goods_list']['goods_id'];?>"> <img src="<?php echo $brand_store_list['goods_list']['goods_image_url'];?>"> </a></div>
				</div>

				<div class="shop_bott"><span><?php echo date('Y-m-d:h:i',$brand_store_list['goods_list']['goods_addtime'])?></span>新上宝贝</div>
			</div>
		<?php }?>	
			
		</div>
	<?php }?>	
</div>




</body>




</html>