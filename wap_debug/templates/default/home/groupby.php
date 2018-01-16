<?php defined('InShopNC') or exit('Access Invalid!');?>
<div class="col-one main">
    <h4 class="xx"><em class="x8"></em>热门招聘 <code></code> </h4>
    <?php if(!empty($output['work_list']) && $output['work_list']['gc_parent_id']==0){?>
    <?php foreach($output['work_list'] as $key => $work_list){?>
    
        <dl class="work_zhiwei">
            <dt class="djfl">
            <a href="<?php echo WAP_SITE_URL.'/index.php?act=work&op=work_list&gcid='.$work_list['gc_id'].'&type=one'?>">
            <?php echo $work_list['gc_name']?>
            </a>
            </dt> <!-- <br>  -->
            <?php  if(!empty($work_list['son'])){  ?>
            <?php foreach($work_list['son'] as $key => $work_son_list){?>
            <a href="<?php echo WAP_SITE_URL.'/index.php?act=work&op=work_list&gcid='.$work_son_list['gc_id'].'&type=two' ?>">
            <?php echo $work_son_list['gc_name']?>
            </a>
            <?php }?>
     <?php }?> 
                                               
        </dl>
        <?php }?>
     <?php }?>   
</div>
<?php  if(!empty($output['home2_list'])){?>
<div class="index_block home2  main">
<div class="title"><?php echo $output['home2_list']['title'];?></div>
<div class="content">

 
        
    <div class="item home2_1 ">
        <a href="<?php echo $output['home2_list']['square_data'];?>">
            <img src="<?php echo UPLOAD_SITE_URL.'/mobile/special/'.$output['home2_list']['i'].'/'.$output['home2_list']['square_image'];?>" alt="">
        </a>
    </div>
    <div class="item home2_2">
    <div class="border-right">
        <div class="item">
            <a href="<?php echo $output['home2_list']['rectangle1_data'];?>">
                <img src="<?php echo UPLOAD_SITE_URL.'/mobile/special/'.$output['home2_list']['i'].'/'.$output['home2_list']['rectangle1_image'];?>" alt="">
            </a>
        </div>
        <div class="item">
            <a href="<?php echo $output['home2_list']['rectangle2_data'];?>">
                <img src="<?php echo UPLOAD_SITE_URL.'/mobile/special/'.$output['home2_list']['i'].'/'.$output['home2_list']['rectangle2_image'];?>" alt="">
            </a>
        </div>
    </div>
    </div>
    
  
</div>    
</div>
<?php }?>
