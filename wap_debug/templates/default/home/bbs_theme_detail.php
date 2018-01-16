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
<style type="text/css">
.boxbg,.boxli{position:fixed;height:100%;display:none;top:0;left:0;}
.boxbg{z-index:100;background:#000;width:100%;filter:alpha(opacity=80); /*IE滤镜，透明度80%*/
-moz-opacity:0.8; /*Firefox私有，透明度80%*/
opacity:0.8;/*其他，透明度80%*/}
.boxli{z-index:110;width:80%;left:18%;top:15%;}
.boxli img{width:80%;}
</style>
<body>
<!--圈子的话题-->
<div class="theme" style="margin-bottom:50px">
<div class="">
    <?php if(!empty($output['theme_list'])){?>
        <div class="huati">
            <?php foreach ($output['theme_list'] as $key => $theme_list) {?>
				<div class="theme_user">
                <div class="bbs_user">
                    <img src="<?php echo empty($theme_list['img'])?UPLOAD_SITE_URL.'/shop/avatar/avatar_19.jpg':UPLOAD_SITE_URL.'/shop/avatar/'.$theme_list['img'];?>">
                    <span><?php echo $theme_list['member_name'];?></span>
                    <?php if($theme_list['is_identity']==1){?><span>版主</span><?php }?>
                    <em><a href="<?php echo WAP_SITE_URL.'/index.php?act=bbs&op=bbs_circle_theme&circle_id='.$theme_list['circle_id'];?>">
                    <?php echo $theme_list['circle_name'];?></a></em>
                </div></div>
	<div class="theme_con">
                <div class="theme_tit">
                    <?php if($theme_list['is_stick']==1){?><i>顶</i><?php }?>
                    <?php if($theme_list['is_digest']==1){?><b>精</b><?php }?>
                    
                    <span><?php echo preg_replace_callback('/@E(.{6}==)/', function($r) {return base64_decode($r[1]);}, $theme_list['member_name']);?></span>
                   
                </div>
				<div class="theme_time">
                        <?php 
                          $a = floor((time()-$theme_list['theme_addtime'])/(60*60*24));
                          $b = floor((time()-$theme_list['theme_addtime'])/(60*60));
                          $c = floor((time()-$theme_list['theme_addtime'])/60);
                          if($a ){
                            echo "创建于".$a."天前";
                          }else{
                            if($b){
                                echo "创建于".$b."小时前";
                            }else{
                                echo "创建于".$c."分前";
                            }
                          }                         
                        ?>
                </div>
                <div class="neirong" style="overflow:hidden;">
                    <span><?php echo preg_replace_callback('/@E(.{6}==)/', function($r) {return base64_decode($r[1]);}, $theme_list['theme_content']);?></span>
                    <ul>
                    <?php if(!empty($theme_list['img0'])){?>
                    <li>
                      <img src="<?php echo UPLOAD_SITE_URL.'/shop/circle/'.$theme_list['i'].'/'.$theme_list['img0'];?>" alt="">
                      
                    </li>
                    <?php }?>
                    <?php if(!empty($theme_list['img1'])){?>
                    <li>
                      <img src="<?php echo UPLOAD_SITE_URL.'/shop/circle/'.$theme_list['i'].'/'.$theme_list['img1'];?>" alt="">
                    </li>
                    <?php }?>
                    <?php if(!empty($theme_list['img2'])){?>
                    <li>
                      <img src="<?php echo UPLOAD_SITE_URL.'/shop/circle/'.$theme_list['i'].'/'.$theme_list['img2'];?>" alt="">
                    </li>
                    <?php }?>
                    <?php if(!empty($theme_list['img3'])){?>
                    <li>
                      <img src="<?php echo UPLOAD_SITE_URL.'/shop/circle/'.$theme_list['i'].'/'.$theme_list['img3'];?>" alt="">
                    </li>
                    <?php }?>
                    <?php if(!empty($theme_list['img4'])){?>
                    <li>
                      <img src="<?php echo UPLOAD_SITE_URL.'/shop/circle/'.$theme_list['i'].'/'.$theme_list['img4'];?>" alt="">
                    </li>
                    <?php }?>
                    <?php if(!empty($theme_list['img5'])){?>
                    <li>
                      <img src="<?php echo UPLOAD_SITE_URL.'/shop/circle/'.$theme_list['i'].'/'.$theme_list['img5'];?>" alt="">
                    </li>
                    <?php }?>
                    </ul>

                   <div class="boxbg"></div>
					<div class="boxli"><img src="<?php echo UPLOAD_SITE_URL.'/shop/member/'.$output['flea_detail']['i'].'/'.$output['flea_detail']['img1'];?>" alt=""></div> 

                </div>
                <div class="theme_agr">
                    
                    <span class="addthemelike">
                        <img src="">赞<?php echo $theme_list['theme_likecount'];?>    
                    </span>
                </div>
            
            <?php }?>


<div class="theme_eva">
    <span>有<?php echo $output['threply_cout'];?>人正在讨论</span>
</div>
<?php if(!empty($output['threply_list'])){?>
    <?php foreach ($output['threply_list'] as $key => $threply_list) {?>
        <div class="theme_com">
            <div class="theme_com_user">
                <img src="<?php echo empty($threply_list['img'])?UPLOAD_SITE_URL.'/shop/avatar/avatar_19.jpg':UPLOAD_SITE_URL.'/shop/avatar/'.$threply_list['img'];?>">
                <span><?php echo $threply_list['member_name'] ;?></span><br>
                <em>
                    <?php if(!empty($threply_list['reply_addtime'])){                    
                          $a = floor((time()-$threply_list['reply_addtime'])/(60*60*24));
                          $b = floor((time()-$threply_list['reply_addtime'])/(60*60));
                          $c = floor((time()-$threply_list['reply_addtime'])/60);
                          if($a ){
                            echo $a."天前";
                          }else{
                            if($b){
                                echo $b."小时前";
                            }else{
                                if($c<5){
                                    echo "刚刚";
                                }else{
                                    echo $c."分前"; 
                                }
                                
                            }
                          }  
                        }else{
                            echo "30天前";
                        }                    
                        ?>
                </em>
            </div>
            <div class="theme_com_con">
                <?php echo ubb(preg_replace_callback('/@E(.{6}==)/', function($r) {return base64_decode($r[1]);}, $threply_list['reply_content']));?>   
            </div>
            <?php if(!empty($threply_list['reply_pic'])){?>
            <div class="theme_com_img">
				<a href=""><img src="<?php echo !empty($threply_list['img'])?UPLOAD_SITE_URL.'/shop/avatar/avatar_19.jpg':UPLOAD_SITE_URL.'/shop/avatar/'.$threply_list['img'];?>"></a>
				<a href=""><img src="<?php echo !empty($threply_list['img'])?UPLOAD_SITE_URL.'/shop/avatar/avatar_19.jpg':UPLOAD_SITE_URL.'/shop/avatar/'.$threply_list['img'];?>"></a>
				<a href=""><img src="<?php echo !empty($threply_list['img'])?UPLOAD_SITE_URL.'/shop/avatar/avatar_19.jpg':UPLOAD_SITE_URL.'/shop/avatar/'.$threply_list['img'];?>"></a>
            </div>
            <?php }?>
            <!-- <div class="theme_com_eva">                
                <span class="addlike"><img src="">点赞<?php echo $threply_list['reply_likecount']>0?$threply_list['reply_likecount']:"";?></span>
            </div> -->
        </div>
    <?php }?>
<?php }?>

        </div>

    <?php }else{?>
    <div class="huantikong">该圈子还没有话题</div>
    <?php }?>
</div>
<!--评论模块-->
</div>
<div class="plate_create theme_create">
<form name="form" action="<?php echo WAP_SITE_URL?>/index.php?act=bbs&op=pinglun" method="post">
<input type="hidden" name="theme_id" value="<?php echo $_GET['theme_id']; ?>">
<span><input type="text" name="content" placeholder="随便说两句" id="pl_xie"></span><label id="pl_submit">发送</label>
</form>
</div>
</body>
<style type="text/css">
    html,body{margin:0;padding:0;}
    .iw_poi_title {color:#CC5522;font-size:14px;font-weight:bold;overflow:hidden;padding-right:13px;white-space:nowrap}
    .iw_poi_content {font:12px arial,sans-serif;overflow:visible;padding-top:4px;white-space:-moz-pre-wrap;word-wrap:break-word}
</style>
</html>
<script type="text/javascript" src="<?php echo WAP_SITE_URL?>/js/common.js"></script>
<script type="text/javascript">
//话题赞
$(function(){
    $('.addthemelike').click(function(){
        var circle_id = $('input[name=circle_id]').val();
        var theme_id = $('input[name=theme_id]').val();
        var key = getcookie('key'); 
        if(key==''){
            window.location.href = '<?php echo WAP_SITE_URL;?>/tmpl/member/login.html';
        }else{
            $.ajax({
                url:"<?php echo WAP_SITE_URL?>/index.php?act=bbs&op=addthemelike",
                type:"post",
                data:{circle_id:circle_id,theme_id:theme_id,key:key},
                dataType:"json",
                success:function (res){
                    if(res){
                        window.location.reload(); 
                    }else{
                        alert('你已经赞过了');
                    }
                                     
                }
            });
        }
    });
	
	$(".neirong li img").click(function(){
		  var thisSrc=$(this).attr("src");
		  $(".boxli img").attr("src",thisSrc);
		  $(".boxbg").show();
		  $(".boxli").show();
	  })
	  $(".boxli img").click(function(){
		
		  $(".boxbg").hide();
		  $(".boxli").hide();
	  })
	
	
	
})

//评论
$(function(){
    $('#pl_xie').click(function(){
        var key = getcookie('key');
        if(key==''){
            window.location.href = '<?php echo WAP_SITE_URL;?>/tmpl/member/login.html';
        }
    });
    $('#pl_submit').click(function(){
        var theme_id = $('input[name=theme_id]').val();
        var content = $('input[name=content]').val();
        var key = getcookie('key');
        
        
        if(!content){
            alert('评论不能为空');
        }else{
            $.ajax({
                url:"<?php echo WAP_SITE_URL?>/index.php?act=bbs&op=pinglun",
                type:"post",
                data:{theme_id:theme_id,content:content,key:key},
                dataType:"json",
                success:function (res){

                    if(res.login == 0){
                        window.location.href = '<?php echo WAP_SITE_URL;?>/tmpl/member/login.html';
                    }
                    if(res.canshu){
                     alert(res.datas.error);
                    }
                    if(res.ok==1){
                        window.location.reload();
                    }
                                        
                }
            });
        }
       
    })
})
</script>