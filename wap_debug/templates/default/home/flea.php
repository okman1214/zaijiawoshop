<?php defined('InShopNC') or exit('Access Invalid!');?>
<!DOCTYPE html>
<html>
<head>
	<title><?php echo $output['title']['special_desc']; ?>汽车专题</title>
	<style type="text/css">		
		.qiche{width: 100%;position: relative;overflow:hidden;}		
		.qiche .qiche_list {width: 98%;margin:5px auto;display: block;}
		.qiche .qiche_list .xiangxi{list-style-type:none;width: 24%;float: left;margin:5px auto;}
		.qiche .qiche_list .xiangxi img{width: 100%;}
		.qcsp{width: 100%;margin-top:5px;}
		.qiche_s_adv{width: 100%;padding:5px}
		.qiche_s_adv .qiche_adv_img {width: 33%;float: left;margin:5px auto; }		
		.qiche_s_adv .qiche_adv_img img{width: 100%;height: 100px}
		.hcht{width: 98%;margin:5px auto;}
		.hcht .hcht_1{width: 32%;float: left;margin-left:1%;}
		.hcht .hcht_1 img{width: 100%;}
		
	</style>
	
</head>

<body>
<header>
	
</header>
<!-- <div class="seco_act"><img src="<?php echo WAP_SITE_URL?>/images/seco_act.jpg"></div> -->
<div class="seco_lay">
<div class="goods">
		<div class="title"><img src="<?php echo WAP_SITE_URL?>/images/seco_city.png">同城二手精选<span>分享你我的闲置</span></div>
		<?php if(!empty($output['flea_list'])){?>
		
		<div class="content">
			<?php foreach($output['flea_list'] as $key =>$flea_list){?>
			<div class="goods-item">
				<a href="<?php echo WAP_SITE_URL.'/index.php?act=brand&op=brand_detail&goods_id='.$flea_list['goods_id'] ?>">
					<div class="goods-item-pic"><img src="<?php echo $flea_list['goods_image']?UPLOAD_SITE_URL.DS.ATTACH_MALBUM.'/'.$flea_list['i'].'/'.str_replace('_small', '_tiny', $flea_list['goods_image']):TEMPLATES_PATH.'/images/default_goods_image.gif';?>" alt=""></div>
					<div class="goods-item-name"><?php echo $flea_list['goods_name'];?>
						
					</div>
										
				</a>
				<div class="goods-det">
					<div class="goods-item-price">￥<?php echo $flea_list['goods_store_price']>10000?($flea_list['goods_store_price']/10000)."万":$flea_list['goods_store_price'];?><del>￥<?php echo $flea_list['goods_price'];?></del></div>
					<div class="seco_lay_time">
						<span><?php echo date('m月d日',$flea_list['goods_add_time']);?></span><i><?php echo $flea_list['flea_area_name'];?></i>
					</div>
				</div>
			</div>
			<?}?>
			
		</div>
	<?}?>	
	</div>
</div>


<div class="seco_lay seco_car">
<div class="goods">
		<div class="title"><img src="<?php echo WAP_SITE_URL?>/images/seco_car.png">超值低价二手车精选<span>每日精选，车主急售</span></div>
		<?PHP if(!empty($output['flea_list1'])){?>
		<div class="content">
			<?php foreach($output['flea_list1'] as $key =>$flea_list1){?>
			<div class="goods-item">
				<a href="">
				<div class="seco_car_img"><img src="<?php echo $flea_list1['goods_image']?UPLOAD_SITE_URL.DS.ATTACH_MALBUM.'/'.$flea_list1['member_id'].'/'.str_replace('_small', '_tiny', $flea_list1['goods_image']):TEMPLATES_PATH.'/images/default_goods_image.gif';?>"></div>
				<div class="seco_car_det">
				<p class="seco_car_p1"><?php echo $flea_list1['goods_name'];?></p>
				<p class="seco_car_p2"><?php echo $flea_list1['goods_des'];?></p>
				<p class="seco_car_p3"><span>比二手车商低<br><i>￥<?php echo $flea_list1['goods_price']-$flea_list1['goods_store_price'];?></i></span><b>￥<?php echo $flea_list1['goods_store_price']/10000;?>万</b></p>
				<p class="seco_car_p4"><del>￥<?php echo $flea_list1['goods_price']/10000;?>万</del>二手车商</p>
				
				</div>					
				</a>
			</div>
			<?}?>			
		</div>
		<?php }else{?>
		<div class="content">还没有二手车</div>
		<?}?>	
	</div>
</div>

<!--<div class="qcsp">
	
	<?php if(!empty($output['goods_list'])){?>

	<?php foreach ($output['goods_list'] as $key=>$goods_list) {?>
	<div class="" style="width:100%">
		<div class="">
			<a href="<?php echo WAP_SITE_URL ?>/tmpl/product_detail.html?goods_id=<?php echo $goods_list['goods_id']?>&type=car">
				<img width="40%" src="<?php echo UPLOAD_SITE_URL.'/shop/store/goods/'.$goods_list['i'].'/'.$goods_list['goods_image']?>" alt="<?php echo $goods_list['goods_jingle'] ?>">
			</a>
		</div>
		<div class="" style="float:right;margin-right:10px;">
			<div><a href="<?php echo WAP_SITE_URL ?>/tmpl/product_detail.html?goods_id=<?php echo $goods_list['goods_id']?>&type=car"><?php echo $goods_list['goods_name'] ?></a></div>
			<div><?php echo $goods_list['goods_jingle'] ?></div>
			<div>￥：<?php echo $goods_list['goods_price'] ?></div>
			<div class="">比二手车商低<br>￥：<?php echo ($goods_list['goods_marketprice']-$goods_list['goods_price']); ?></div>
		</div>
	</div>
	<?php }?>
	<?php }else{?>
	<div>该品牌下没有汽车介绍哦！！！</div>
	<?php }?>
</div>-->
<!--<div class="qiche_s_adv">
	<div><span><img src="<?php echo WAP_SITE_URL?>/images/qcgs.png">好车生活 <h7>分享你身边的精彩</h7></span></div>
	<?php if(!empty($output['car_adv_list'])){?>

<?php foreach ($output['car_adv_list'] as $key=>$car_adv_list) {?>
	<div class="qiche_adv_img">
		<a href="<?php echo $car_adv_list['adv_pic_url']?>">
			<img src="<?php echo UPLOAD_SITE_URL.'/shop/adv/'.$car_adv_list['adv_pic']?>">
		</a>
	</div>
<?php }?>
<?php }?>
<div class="hcht">
	<?php if(!empty($output['article_list'])){?>
	<?php foreach ($output['article_list'] as $key=>$article_list) {?>
		<div class="hcht_1">
			<div><?php echo$article_list['article_title']?></div>
			<a href="<?php echo$article_list['article_url']?>"><img src="<?php echo UPLOAD_SITE_URL.'/shop/article/'.$article_list['img']?>"></a>
		</div>
	<?php }?>
	<?php }?>
	
</div>
</div>-->
</body>
</html>