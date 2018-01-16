<?php defined('InShopNC') or exit('Access Invalid!');?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta charset="utf-8" /><meta name="viewport" content="width=device-width, initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
<meta name="apple-mobile-web-app-capable" content="yes" />
<meta name="apple-mobile-web-app-status-bar-style" content="black" /><meta name="format-detection" content="telephone=yes" />
<meta name="format-detection" content="email=no" />
<link rel="stylesheet" type="text/css" href="./css/css.css" />
<link rel="stylesheet" type="text/css" href="./css/select.css" />
<meta content="" name="keywords" />
<link rel="apple-touch-icon" href="./app/tzrllogo.png" />
<script type="text/javascript" src="./js/jquery.js"></script>

</head>
<body>
<?php if(!empty($output['clsaai_list'])){ ?>
<?php foreach($output['clsaai_list'] as $key =>$clsaai_list){ ?>
    <div class="recrDet">
        <div class="recrDet_tit"><h3><?php echo $clsaai_list['title'];?></h3>
			 <h4><span><?php echo date('Y-m-d',time()); ?> </span><?php echo $clsaai_list['bus'];?></h4></div>
		<div class="recrDet_req"> 
			<ul>
			 <li><label>薪资待遇：</label><span  class="recrDet_pay"><?php echo $clsaai_list['work_money'];?></span></li>
			 <li><label>地&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;点：</label><?php echo $clsaai_list['work_address'];?></li>
			 <li><label>职&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;位：</label><?php echo $clsaai_list['work_name'];?></li>
			 <li><label>要&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;求：</label><?php echo $clsaai_list['description'];?></li>
			 <li><label>福&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;利：</label><span class="recrDet_wel"><?php echo $clsaai_list['goods'];?></span></li></ul></div>
		<div class="recrDet_cont">
			 <span>联系电话：<a href="tel:<?php echo $clsaai_list['lxtel'];?>"><?php echo $clsaai_list['lxtel'];?></a></span>联系人：<?php echo $clsaai_list['lxname'];?> </div>
	    <div class="recrDet_desc">
			 <h3>职位描述： </h3><?php echo $clsaai_list['tell_description'];?></div>
     </div>
<?php }?>
<?php }?>
    <?php if(!empty($output['clsaai_list1'])){?>
    <div class="recr_type recr_det" >
		<h5>该公司还在招聘：</h5>
		<div class="recr_comp"><ul>
       <?php foreach ($output['clsaai_list1'] as $key => $clsaai_list1) {?>
	   <li><a href="<?php echo WAP_SITE_URL.'/index.php?act=work&op=work_detail&mid='.$clsaai_list1['id'] ?>"> 
	   <?php echo $clsaai_list1['title']; ?></a></li>
       <?php }?>
	   </ul> </div>
    </div>

<?php }?>
</body>
</html>
