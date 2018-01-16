<?php defined('InShopNC') or exit('Access Invalid!');?>
<div class="recruit">
<div class="recr_search">
     <form method="post" action="<?php echo WAP_SITE_URL.'/index.php?act=work&op=work_list'?>">
    <input class="recr_txt" type="text" name="keyword" placeholder="请输入职位、公司名称或关键词">
    <input class="recr_butt" type="submit" value="搜索">
    </form></div>
<?php if ($output['worker_class_list']) {  ?>
<div class="recr_type">
<h5>招聘分类 </h5>
    <div class="recr_job"><ul>
    <?php foreach($output['worker_class_list'] as $key => $worker_class_list){?>
    <li>
        <a href="<?php echo WAP_SITE_URL.'/index.php?act=work&op=work_list&type=three&gcid='.$worker_class_list['gc_id'];?>"><?php echo $worker_class_list['gc_name'];?></a>
    </li>
    <?php }?>
	</ul></div>   
</div> 
<?php }?>  

<div class="recr_type recr_det" >
<h5>招聘职位 </h5>
    <?php if(!empty($output['worker_list'])){ ?>
    <div class="recr_comp"><ul>
    <?php foreach ($output['worker_list'] as $key => $worker_list) {?>
	<li> <a href="<?php echo WAP_SITE_URL.'/index.php?act=work&op=work_detail&mid='.$worker_list['id'] ?>"> 
	<p class="recra_t"><?php echo $worker_list['title']?></p>
	
	<p class="recra_pay" ><?php echo $worker_list['work_money']?></p>
	   </a>
        </li>
    <?php }?>
	</ul>
    <?php }else{?>
    <div class="recra_none">没有招聘信息，<a href="/wap/index.php?act=work&op=work_add">点击发布</a>吧!</div>
    <?php }?>
</div>
</div>