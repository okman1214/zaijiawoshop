<?php defined('InShopNC') or exit('Access Invalid!');?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">

<title></title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black">
<meta name="format-detection" content="telephone=no">
<link rel="stylesheet" type="text/css" href="<?php echo WAP_SITE_URL;?>/css/reset.css">
<link rel="stylesheet" type="text/css" href="<?php echo WAP_SITE_URL;?>/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo WAP_SITE_URL;?>/css/main.css">
<link rel="stylesheet" type="text/css" href="<?php echo WAP_SITE_URL;?>/css/index/child.css">
<link rel="stylesheet" type="text/css" href="<?php echo WAP_SITE_URL;?>/css/index.css">
<link rel="stylesheet" type="text/css" href="<?php echo WAP_SITE_URL;?>/css/bbs.css">

</head>
<body>
<!--圈子的内容-->
<div class="plate_head">
        <div class="plate_head_img"><img src="<?php echo UPLOAD_SITE_URL?>/circle/default_group_logo.gif"></div>
		<div class="plate_head_con">
            <div class="plate_head_tit"><?php echo $output['circle_list']['circle_name'];?></div>
            <div class="plate_head_vip">成员<?php echo $output['circle_list']['circle_mcount'];?></div>
			<div class="plate_head_join"><?php if($output['key'] ==$_COOKIE['key']){?><img src=""><span class="ok_circle">已加入</span><?php }else{?><img src=""><span class="add_circle">已加入</span><?php }?></div>
		</div>
    
</div>
<!--圈子的话题-->
<div class="">
    <?php if(!empty($output['theme_list'])){?>
        <div class="plate_conOut" style="margin-bottom:40px">
            <?php foreach ($output['theme_list'] as $key => $theme_list) {?>
			<div class="plate_con">
            <a href="<?php echo WAP_SITE_URL.'/index.php?act=bbs&op=bbs_theme_detail&theme_id='.$theme_list['theme_id'];?>">
                <div class="bbs_user plate_con_user">
                    <img src="<?php echo empty($theme_list['img'])?UPLOAD_SITE_URL.'/shop/avatar/avatar_19.jpg':UPLOAD_SITE_URL.'/shop/avatar/'.$theme_list['img'];?>">
                    <span><?php echo $theme_list['member_name'];?></span>
                    <?php if($theme_list['is_identity']==1){?><em>版主</em><?php }?>
                </div>
                <div class="plate_con_tit">
                    <?php if($theme_list['is_stick']==1){?><i>顶</i><?php }?>
                    <?php if($theme_list['is_digest']==1){?><b>精</b><?php }?>
                    <span><?php echo $theme_list['theme_name'];?></span>
                </div>
                <div class="plate_con_con">
                    <span><?php echo $theme_list['theme_content'];?></span>
                </div>
                <div class="bbs_bot">
                    <span class="tblogo"><img src="<?php echo WAP_SITE_URL?>/images/time.png">
                        <?php 
                          $a = floor((time()-$theme_list['theme_addtime'])/(60*60*24));
                          $b = floor((time()-$theme_list['theme_addtime'])/(60*60));
                          $c = floor((time()-$theme_list['theme_addtime'])/60);
                          if($a ){
                            echo $a."天前";
                          }else{
                            if($b){
                                echo $b."小时前";
                            }else{
                                echo $c."分前";
                            }
                          }                         
                        ?>
                    </span>
                    <dfn class="tblogo">
                        <img src="<?php echo WAP_SITE_URL?>/images/liulan.png">浏览量(<?php echo $theme_list['theme_browsecount'];?>)  
                    </dfn>
                    <em>
                        <img src="">回复(<?php echo $theme_list['theme_commentcount'];?> )   
                    </em>
                </div>
            </a>
			</div>
            <?php }?>
        </div>
    <?php }else{?>
    <div class="huantikong">该圈子还没有话题</div>
    <?php }?>
</div>

<!--创建话题-->
<div class="plate_create"><a href="<?php echo WAP_SITE_URL.'./index.php?act=bbs&op=bbs_add_theme'?>">创建话题</a></div>


</body>
<style type="text/css">
    html,body{margin:0;padding:0;}
    .iw_poi_title {color:#CC5522;font-size:14px;font-weight:bold;overflow:hidden;padding-right:13px;white-space:nowrap}
    .iw_poi_content {font:12px arial,sans-serif;overflow:visible;padding-top:4px;white-space:-moz-pre-wrap;word-wrap:break-word}
</style>
</html>

<script type="text/javascript">
    $(function(){
        $('.add_circle').click(function(){
            var circle_id = "<?php echo $_GET['circle_id'];?>";
            var circle_name = $('.plate_head_tit').html();
            
            var key = getcookie('key'); 
            if(key==''){
                window.location.href = '<?php echo WAP_SITE_URL;?>/tmpl/member/login.html';
            }else{
                $.ajax({
                    url:"<?php echo WAP_SITE_URL?>/index.php?act=bbs&op=addcircle",
                    type:"post",
                    data:{circle_id:circle_id,circle_name:circle_name,key:key},
                    dataType:"json",
                    success:function (res){

                        if(res.ok == 1){
                            $('.add_circle').html('已加入');
                        }
                                         
                    }
                });
            }
        })
    })
</script>