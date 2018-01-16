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
</head>
<body>


<div id="menu">
<!--tag标题-->
<?php if(!empty($output['circle_class_list'])){?>
    <ul id="nav">
    <?php foreach ($output['circle_class_list'] as $key => $circle_class_list) {?>
        <li >
            <a class="qiehuan" href="<?php echo WAP_SITE_URL?>/index.php?act=bbs&op=index&class_id=<?php echo $circle_class_list['class_id']?>"  class_id="<?php echo $circle_class_list['class_id'];?>">
            <?php echo $circle_class_list['class_name'];?>
            </a>
        </li>
    <?php }?>         
    </ul>
<?php }?>    
<!--二级菜单-->
    <div id="menu_con">
    
        <div class="tag" style="display:block">                                       
            <?php foreach ($output['theme_list'] as $key => $theme_list) {?>
			<div class="bbs_item">
                <div class="bbs_user">
                    <img src="<?php echo empty($theme_list['member_avatar'])?UPLOAD_SITE_URL.'/shop/avatar/avatar_19.jpg':UPLOAD_SITE_URL.'/shop/avatar/'.$theme_list['member_avatar'];?>">
                    <span><?php echo $theme_list['member_name'];?></span>
                    
                </div>
                    <!-- <div class="bbs_num"><?php echo $key+1;?></div> -->
                <div class="bbs_con"> 
                    <a href="<?php echo WAP_SITE_URL.'/index.php?act=bbs&op=bbs_theme_detail&theme_id='.$theme_list['theme_id'];?>">
                        <h2><span></span><?php echo preg_replace_callback('/@E(.{6}==)/', function($r) {return base64_decode($r[1]);}, $theme_list['theme_name']);?></h2>
                        <p><?php echo preg_replace_callback('/@E(.{6}==)/', function($r) {return base64_decode($r[1]);}, $theme_list['theme_content']);?></p>
                    </a>
                    <div class="bbs_bot">
						<span><?php 
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
                        ?></span>
                        <dfn><?php echo '回复('.$theme_list['theme_commentcount'].')';?></dfn>
                        <em>浏览量(<?php echo $theme_list['theme_browsecount'];?>)</em>
                    </div>
                </div>
			 </div>
        <?php }?>
        </div> 
        </div>
<div class="bbs_create"><a href="<?php echo WAP_SITE_URL.'./index.php?act=bbs&op=bbs_add_theme'?>"><div class="bbs_crea_in"><i></i>创建话题</div></a></div>

</body>
<style type="text/css">
    html,body{margin:0;padding:0;}
    .iw_poi_title {color:#CC5522;font-size:14px;font-weight:bold;overflow:hidden;padding-right:13px;white-space:nowrap}
    .iw_poi_content {font:12px arial,sans-serif;overflow:visible;padding-top:4px;white-space:-moz-pre-wrap;word-wrap:break-word}

	.hit{color:black;text-shadow:0 1px 0 #fff;
	background:red;
}
</style>
<?php //require_once template('footer');?>
</html>
<script type="text/javascript">
$('.qiehuan').click(function(){  
        // var circle_id = <?php echo $_GET['class_id']?>;     
        var class_id = $(this).attr('class_id');
        $(this).preaddClass("hit");// .siblings("a.hit").removeClass("hit")
        $(this).siblings().removeClass('hit');        
        var url = "<?php echo WAP_SITE_URL?>/index.php?act=bbs&op=a";
        
        $.ajax({
            url:url,//'<?php echo WAP_SITE_URL?>/index.php?act=bbs&op=a',
            type:'post',
            data:{class_id:class_id},
            dataType:'json',
            success:function(result){
                                
                       
                        
                        // var area_id=this.area_id 
                        // option+="<option value="+area_id+">"+area_name+"</option>"; 
                        
                    

                
            }
        });
    });


</script>