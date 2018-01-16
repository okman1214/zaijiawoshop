<?php defined('InShopNC') or exit('Access Invalid!');?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>崇明微生活工具</title>
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
<div class="tools">
<?php if(!empty($output['shgj_list'])){?>
<ul>
<?php foreach($output['shgj_list'] as $key => $shgj_list){?>
<li><a href="<?php echo $shgj_list['type']=='url'?$shgj_list['data']:'###';?>"><img src="<?php echo UPLOAD_SITE_URL.'/mobile/special/'.$shgj_list['i'].'/'.$shgj_list['image'];?>"><?php echo $shgj_list['title'];?></a></li>
<?php }?>
<!-- <li><a href=""><img src="<?php echo WAP_SITE_URL?>/images/tools_icon2.png">车辆保险</a></li>
<li><a href=""><img src="<?php echo WAP_SITE_URL?>/images/tools_icon3.png">崇明黄历</a></li>
<li><a href=""><img src="<?php echo WAP_SITE_URL?>/images/tools_icon4.png">崇明天气预报</a></li>
<li><a href=""><img src="<?php echo WAP_SITE_URL?>/images/tools_icon5.png">法律咨询</a></li>
<li><a href=""><img src="<?php echo WAP_SITE_URL?>/images/tools_icon6.png">交通时刻</a></li>
<li><a href=""><img src="<?php echo WAP_SITE_URL?>/images/tools_icon7.png">快递查询</a></li>
<li><a href=""><img src="<?php echo WAP_SITE_URL?>/images/tools_icon8.png">违章查询</a></li>
<li><a href=""><img src="<?php echo WAP_SITE_URL?>/images/tools_icon9.png"></a>一嗨租车</li> --></ul>
<?php }?>
</div>

</body>




</html>