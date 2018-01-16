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
<!--新闻类型-->
<?php if(!empty($output['news_class_list'])){?>
	<div class="newsKinds">
	<?php foreach($output['news_class_list'] as $key =>$news_class_list){?>
		<a href="<?php echo WAP_SITE_URL.'/index.php?act=news&op=index&news_class='.$news_class_list['gc_id']; ?>"> <?php echo $news_class_list['gc_name'];?></a>
	<?php }?>
	</div>
<?php }?>
<!--新闻bander-->

<!--热门新闻-->
<div class="news_out">
<!-- <div class="post">
	<h1><span>3万更贴</span>天津爆炸后首次降雨</h1>
	<div class="post_img">

	<ul><li><a href=""><img src="<?php echo WAP_SITE_URL?>/images/post_img1.jpg"></a></li>
	<li><a href=""><img src="<?php echo WAP_SITE_URL?>/images/post_img2.jpg"></a></li>
	<li><a href=""><img src="<?php echo WAP_SITE_URL?>/images/post_img3.jpg"></a></li></ul>
	</div>
</div> -->
<!--新闻列表-->
<?php if(!empty($output['all_news_list'])){?>
	<div class="news">
		<ul>
		<?php foreach ($output['all_news_list'] as $key => $all_news_list) {?>
			<li><a id="addonclick" href="<?php echo WAP_SITE_URL.'/index.php?act=news&op=news_detail&news_id='.$all_news_list['news_id'];?>"><?php if(!empty($all_news_list['news_pic'])){?><img src="<?php echo $all_news_list['news_pic'];?>"><?php }?>
					
					<p class="news_p1"><?php echo $all_news_list['news_name'];?></p>
					<p class="news_p2"><?php echo $all_news_list['news_title'];?></p>
				</a>	
				<p class="news_p3 news_pro" ><span><?php echo $all_news_list['news_onclick'];?>浏览</span>
				<input type="hidden" value="<?php echo $all_news_list['news_id'];?>" id="news_id">
				</p>
				<a href="javascript:(0)" >
					
				</a>
			</li>
		<?php }?>
		</ul>
	</div>
<?php }?>

<!-- <div class="pic">
	<h1>朱泽君哥哥亿元画作</h1>
	<img src="<?php echo WAP_SITE_URL?>/images/pic_img.jpg">
	<p class="pic_p1">其兄画画仅6年，画作卖出1.1亿元天价，全球第二</p>
	<p class="pic_p2"><span>5789跟帖</span></p>
</div> -->
</div>
</body>




</html>