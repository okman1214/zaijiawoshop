<?php defined('InShopNC') or exit('Access Invalid!');?>
<html>
<link type="text/css" rel="stylesheet" href="<?php echo RESOURCE_SITE_URL?>/riqi/laydate/need/laydate.css">
<script src="<?php echo RESOURCE_SITE_URL?>/riqi/laydate/laydate.js"></script>
<body>
	<div class="laydate">
		<ul>
			<?php if($output['jianli_list'] && is_array($output['jianli_list'])){?>
			<?php foreach ($output['jianli_list'] as $key => $jianli_list) {?>
			<a href="<?php echo WAP_SITE_URL.'/index.php?act=work&op=work_jianli_detail&jlid='.$jianli_list['jl_id'];?>">
				<li>
					<div class="workname"><?php echo $jianli_list['name'];?> ( <?php echo $jianli_list['xxarea'];?> <?php echo $jianli_list['sex']==0?"男":'女'; ?> <?php //echo $jianli_list['xxarea'];?> <?php //echo $jianli_list['xxarea'];?> )</div>
					<div class="workjob">期望职业：<?php echo $jianli_list['work_name'];?></div>				
				</li>
			</a>
			<?php }?>
			<?php }else{?>
				<li>
					<div class="nouser">该类下还没有人发布简历</div>
				</li>
			<?php }?>
		</ul>
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