<?php defined('InShopNC') or exit('Access Invalid!');?>
<!--新闻类型-->
<?php if(!empty($output['news_class_list'])){?>
	<div class="">
	<?php foreach($output['news_class_list'] as $key =>$news_class_list){?>
		<?php echo $news_class_list['gc_name'];?>
	<?php }?>
	</div>
<?php }?>
<!--新闻bander-->

<!--热门新闻-->
<div class="news_out newsDet">
<!-- <div class="post">
	<h1><span>3万更贴</span>天津爆炸后首次降雨</h1>
	<div class="post_img">

	<ul><li><a href=""><img src="<?php echo WAP_SITE_URL?>/images/post_img1.jpg"></a></li>
	<li><a href=""><img src="<?php echo WAP_SITE_URL?>/images/post_img2.jpg"></a></li>
	<li><a href=""><img src="<?php echo WAP_SITE_URL?>/images/post_img3.jpg"></a></li></ul>
	</div>
</div> -->
<!--新闻列表-->
<?php if(!empty($output['news_detail_list'])){?>
	<div class="news">
		<?php foreach ($output['news_detail_list'] as $key => $news_detail_list) {?>
		<div class="newsDet_tit">		
			<?php echo $news_detail_list['news_name'];?>
		</div>
		<div class="newsDet_quote">		
			<?php echo $news_detail_list['news_title'];?>
		</div>
		<div class="newsDet_time">		
			<span><?php echo date('Y-m-d H:s:m',$news_detail_list['news_addtime']);?></span> <?php echo $news_detail_list['news_source'];?>
		</div>
		<div class="newsDet_con">		
			<?php echo html_entity_decode($news_detail_list['news_content'], ENT_QUOTES, 'UTF-8');?>
		</div>
		
		<?php }?>
	</div>
<?php }?>
<div class="">
		上一篇：<?php if(empty($output['but_one'])){?>已经是第一篇了<?php }else{?><a href="<?php echo WAP_SITE_URL.'/index.php?act=news&op=news_detail&news_id='.$output['but_one']['news_id'];?>">
		<?php echo $output['but_one']['news_name'];?></a><?php }?><br>
		下一篇：<?php if(empty($output['top_one'])){?>没有了<?php }else{?><a href="<?php echo WAP_SITE_URL.'/index.php?act=news&op=news_detail&news_id='.$output['top_one']['news_id'];?>">
		<?php echo $output['top_one']['news_name'];?></a><?php }?>
</div>	
<!-- <div class="pic">
	<h1>朱泽君哥哥亿元画作</h1>
	<img src="<?php echo WAP_SITE_URL?>/images/pic_img.jpg">
	<p class="pic_p1">其兄画画仅6年，画作卖出1.1亿元天价，全球第二</p>
	<p class="pic_p2"><span>5789跟帖</span></p>
</div> -->
</div>
</body>




</html>
<script type="text/javascript">
	$(function(){
		
		$('#addonclick').click(function(){
			
			var news_onclick = 1;
			var news_id = $(this).parents("li").find('#news_id').val();
			var client = 'wap';
			var url = "<?php echo WAP_SITE_URL.'/index.php?act=news&op=news_addclick';?>";
			$.ajax({
				type:'post',
				url:url,
				data:{news_onclick:news_onclick,news_id:news_id},
				dataType:'json',
				success:function(result){

				}

			});
		});
		
	})
</script>