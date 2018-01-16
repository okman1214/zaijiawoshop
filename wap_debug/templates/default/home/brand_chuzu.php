<?php defined('InShopNC') or exit('Access Invalid!');?>
	
	<style type="text/css">
		body{margin:0px;padding: 0px;background:#fff;}
		
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
	
<div class='main'>
<div class="qiche">
	<div style="padding:10px 5px;">2015热门汽车品牌</div>
	<!--<div><img src="<?php echo WAP_SITE_URL?>/images/car_brand.png" style="width:100%;"></div>-->
	<?php if(!empty($output['brand_c_list'])){?>
	<div class="qiche_list">
		
			<?php foreach($output['brand_c_list'] as $key=>$brand_c_list){ ?>
			<div class="xiangxi">			
				<a href="<?php echo WAP_SITE_URL?>/index.php?act=brand&op=brand_list&special_id=<?php echo $output['ord'] ?>&brand=<?php echo $brand_c_list['brand_id'] ?>">
					<div><img src="<?php echo UPLOAD_SITE_URL.'/shop/brand/'.$brand_c_list['brand_pic']?>"></div>
					<div style="text-align:center;"><?php echo $brand_c_list['brand_name']?></div>
				</a>
			</div>
			<?php } ?>
		
	</div>
	<?php } ?>
</div>
</div>
<div id="home_body" class='main'>
<div><img src="<?php echo WAP_SITE_URL?>/images/czesc.png">超值出租车</div>
	<?php if(!empty($output['goods_list'])){?>
		<ul class="product-list">
			<?php foreach ($output['goods_list'] as $key=>$goods_list) {?>
			<li class="pdlist-item" goods_id="<?php echo $goods_list['goods_id'] ;?>">
				<a href="###" class="pdlist-item-wrap clearfix" style="float:left;">
					<span class="pdlist-iw-imgwp">
						<img src="<?php echo UPLOAD_SITE_URL.'/shop/store/goods/'.$goods_list['i'].'/'.$goods_list['goods_image'];?>"/>
					</span>
				</a>
					<div class="pdlist-iw-cnt">
						<p class="pdlist-iwc-pdname">
							<b><?php echo $goods_list['goods_name'];?></b>
						</p>
						<p class="pdlist-iwc-pdname" style="font-size:12px;">
							<?php echo $goods_list['goods_jingle'];?>
						</p>
						<p class="pdlist-iwc-pdprice">
							￥<?php echo $goods_list['goods_price'];?>/天
						</p>
						
						<p class="pdlist-iwc-pdcomment  clearfix">
							
							<span class="fleft">
								<a href="tel:<?php echo $goods_list['store_phone']; ?>" target="_blank" title="点我咨询">电话：<?php echo $goods_list['store_phone'];?>
							</span>
						</p>
					</div>
					<!-- <div><a href="<?php echo WAP_SITE_URL.'/index.php?act=brand&op=brand_chuzu_add&special_id='.$_GET['special_id'].'&goods_id='.$goods_list['goods_id'];?>">租车</a></div> -->
			</li>
			<?php }?>
		</ul>
	<?php }else {?>
		<div class="no-record">
            暂无记录
        </div>
	<?php }?>
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

</div>
</body>