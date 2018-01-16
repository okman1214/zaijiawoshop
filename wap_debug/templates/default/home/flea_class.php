<?php defined('InShopNC') or exit('Access Invalid!');?>
<style type="text/css">
	.goods .goods_none{width: 98%;height: 80px;text-align: center;margin-top:10px;padding-top: 10px; background: #fff;}
	.goods .goods_none a{color: red;padding-top:5px;}
</style>
<div class="goods">
		<div class="title"><img src="<?php echo WAP_SITE_URL?>/images/seco_city.png">热门推荐<?php echo $output['title'];?></div>
		<?php if(!empty($output['flea_list'])){?>
		
		<div class="content">
			<?php foreach($output['flea_list'] as $key =>$flea_list){?>
			<div class="goods-item">
				<a href="<?php echo WAP_SITE_URL.'/index.php?act=brand&op=brand_detail&goods_id='.$flea_list['goods_id'] ?>">
					<div class="goods-item-pic"><img src="<?php echo $flea_list['goods_image']?UPLOAD_SITE_URL.DS.ATTACH_MALBUM.'/'.$flea_list['member_id'].'/'.str_replace('_small', '_tiny', $flea_list['goods_image']):TEMPLATES_PATH.'/images/default_goods_image.gif';?>" alt=""></div>
					<div class="goods-item-name"><?php echo $flea_list['goods_name'];?></div>
										
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
	<?}else{?>	
		<div class="goods_none" style="">此分类下好没有闲置宝贝<br><a href="<?php echo WAP_SITE_URL.'/index.php?act=live&op=live_house_contri'?>">点击添加自己的宝贝吧</a></div>				
	<?php }?>
	</div>
</div>