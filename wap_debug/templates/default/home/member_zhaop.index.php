<?php defined('InShopNC') or exit('Access Invalid!');?>
<div class="m-center">
<?php if($output['member_zhaop_list'] || $output['member_jl_list']){?>
    <?php if($output['member_zhaop_list']){?>
    <div class="zhaop">
        <div class="">我的招聘信息</div><br>
        <div class="">
            <ul>
            <?php foreach($output['member_zhaop_list'] as $key =>$val){?>
                <li>
                    <span><a href="<?php echo WAP_SITE_URL.'/index.php?act=work&op=work_detail&mid='.$val['id'];?>"><?php echo $val['title'];?></a></span>
                    <span><a href="<?php echo WAP_SITE_URL.'/index.php?act=member_zhaop&op=work_del&mid='.$val['id'];?>">删除</a></span>
                </li>
            <?php }?>
            </ul>
        </div>

    </div>
    <?php }?> 
    <?php if($output['member_jl_list']){?>
    <div class="jianli">
        <div class="">我的简历信息</div><br>
        <div class="">
            <ul>
            <?php foreach($output['member_jl_list'] as $key =>$value){?>
                <li>
                    <span><a href="<?php echo WAP_SITE_URL.'/index.php?act=work&op=work_jianli_detail&jlid='.$value['jl_id'];?>"><?php echo $value['title'];?></a></span>
                    <span><a href="<?php echo WAP_SITE_URL.'/index.php?act=member_zhaop&op=jianli_del&jlid='.$value['jl_id'];?>">删除</a></span>
                </li>
            <?php }?>
            </ul>
        </div>

    </div>
    <?php }?> 
<?php }else{?>  
    <div>
        你还没有招聘信息
    </div>
<?php }?>        
</div>