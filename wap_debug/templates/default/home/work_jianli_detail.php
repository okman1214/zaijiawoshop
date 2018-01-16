<?php defined('InShopNC') or exit('Access Invalid!');?>
<html>
<link type="text/css" rel="stylesheet" href="<?php echo RESOURCE_SITE_URL?>/riqi/laydate/need/laydate.css">
<script src="<?php echo RESOURCE_SITE_URL?>/riqi/laydate/laydate.js"></script>
<body>
	<div class="laydate_detail">
		
			<?php if($output['jianli_list'] && is_array($output['jianli_list'])){?>
			<?php foreach ($output['jianli_list'] as $key => $jianli_list) {?>
				<div class="detail_tit"><?php echo $jianli_list['title'];?></div>
				<div class="detail_six"><?php echo $jianli_list['name'].'('.($jianli_list['sex']==0?'男':'女').','.$jianli_list['xuewei'].')';?></div>
				<div class="detail_zl">
				<h2>基本资料：</h2>
				<p><?php echo $jianli_list['name'].' / '.($jianli_list['sex']==0?'男':'女').' / '.$jianli_list['xuewei'].' / '.$jianli_list['jingyan'];?><span style="float:right;"><?php echo date('Y-m-d',$jianli_list['jl_addtime']);?></span></p>
				</div>
				<?php if($jianli_list['des_self']){?>
				<div class="detail_ld">
					<h2>我的亮点</h2>
					<p><?php echo $jianli_list['des_self'];?></p>
				</div>
				<?php }?>
				<div class="detail_yx">
					<h2>求职意向</h2>
					<p><?php if($jianli_list['askmoney']){?>期望薪资：<?php echo $jianli_list['askmoney'];?><br><?php }?></p>
					<p><?php if($jianli_list['work_name']){?>期望职位：<?php echo $jianli_list['work_name'];?><br><?php }?></p>
					<p><?php if($jianli_list['work_area']){?>求职区域：<?php echo $jianli_list['work_area'];?><br><?php }?></p>
				</div>
			<?php }?>
			<?php }else{?>
			<?php }?>
		<a class="btns" href="tel:<?php echo $jianli_list['mphone'];?>">联系方式</a>
	</div>

</body>
</html>
<script src="<?php echo RESOURCE_SITE_URL?>/js/jquery.js"></script> 
<script src="<?php echo RESOURCE_SITE_URL?>/js/jquery.cxselect.js"></script>
<script type="text/javascript" src="<?php echo WAP_SITE_URL?>/js/config.js"></script>
<script type="text/javascript" src="<?php echo WAP_SITE_URL?>/js/zepto.min.js"></script>
<script type="text/javascript" src="<?php echo WAP_SITE_URL?>/js/template.js"></script>
<script type="text/javascript" src="<?php echo WAP_SITE_URL?>/js/common.js"></script>
<script type="text/javascript" src="<?php echo WAP_SITE_URL?>/js/tmpl/common-top.js"></script>

<script type="text/javascript" src="<?php echo WAP_SITE_URL?>/js/tmpl/footer.js"></script>
<script type="text/javascript">
$(function(){
    var key = getcookie('key');
	if(key==''){
    	window.location.href = '<?php echo WAP_SITE_URL;?>/tmpl/member/login.html';
	}      
    $('input[name=key]').val(key);
})
</script>