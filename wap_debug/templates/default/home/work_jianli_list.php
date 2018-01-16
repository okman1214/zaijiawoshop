<?php defined('InShopNC') or exit('Access Invalid!');?>
<html>
<link type="text/css" rel="stylesheet" href="<?php echo RESOURCE_SITE_URL?>/riqi/laydate/need/laydate.css">
<script src="<?php echo RESOURCE_SITE_URL?>/riqi/laydate/laydate.js"></script>
<body>
	<div class="col-one main">
	    <h4 class="xx"><em class="x8"></em>全部简历 <code></code></h4>
	    <?php if(!empty($output['jianli_class']) && $output['jianli_class']['gc_parent_id']==0){?>
	    <?php foreach($output['jianli_class'] as $key => $jianli_class){?>
	    
	        <dl class="work_zhiwei">
	            <dt class="djfl">
	            <a href="<?php echo WAP_SITE_URL.'/index.php?act=work&op=work_jianli_class_list&gcid='.$jianli_class['gc_id'].'&type=one'?>">
	            <?php echo $jianli_class['gc_name']?>
	            </a>
	            </dt> <!-- <br>  -->
	            <?php  if(!empty($jianli_class['son'])){  ?>
	            <?php foreach($jianli_class['son'] as $key => $jianli_class){?>
	            <a href="<?php echo WAP_SITE_URL.'/index.php?act=work&op=work_jianli_class_list&gcid='.$jianli_class['gc_id'].'&type=two' ?>">
	            <?php echo $jianli_class['gc_name']?>
	            </a>
	            <?php }?>
	     <?php }?> 
	                                               
	        </dl>
	        <?php }?>
	     <?php }?>   
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