<?php defined('InShopNC') or exit('Access Invalid!');?>
<style type="text/css">
body{background: #fff;}
.slider{display:none}/*用于获取更加体验*/
.focus span{width:10px;height:10px;margin-right:10px;border-radius:50%;background:#666;font-size:0}
.focus span.current{background:#fff}
.boxbg,.boxli{position:fixed;height:100%;display:none;}
.boxbg{z-index:100;background:#000;width:100%;filter:alpha(opacity=80); /*IE滤镜，透明度80%*/
-moz-opacity:0.8; /*Firefox私有，透明度80%*/
opacity:0.8;/*其他，透明度80%*/}
.boxli{z-index:110;width:80%;left:18%;top:15%;}
.boxli img{width:80%;}
</style>
<div class="main">
<?php if(!empty($output['flea_detail'])){?>
  <div class="slider">
  	  <ul>           
  	    <?php if(!empty($output['flea_detail']['img1'])){?>
        <li>
	
          <img src="<?php echo UPLOAD_SITE_URL.'/shop/member/'.$output['flea_detail']['i'].'/'.$output['flea_detail']['img1'];?>" alt="">
    
        </li>
        <?php }?>
        <?php if(!empty($output['flea_detail']['img2'])){?>
        <li>
		
        <img src="<?php echo UPLOAD_SITE_URL.'/shop/member/'.$output['flea_detail']['i'].'/'.$output['flea_detail']['img2'];?>" alt="">
        
        </li>
        <?php }?>
        <?php if(!empty($output['flea_detail']['img3'])){?>
        <li>
          <img src="<?php echo UPLOAD_SITE_URL.'/shop/member/'.$output['flea_detail']['i'].'/'.$output['flea_detail']['img3'];?>" alt="">
          
        </li>
        <?php }?>
        <?php if(!empty($output['flea_detail']['img4'])){?>
        <li>
          <img src="<?php echo UPLOAD_SITE_URL.'/shop/member/'.$output['flea_detail']['i'].'/'.$output['flea_detail']['img4'];?>" alt="">
          
        </li>
        <?php }?>
        <?php if(!empty($output['flea_detail']['img5'])){?>
        <li>
          <img src="<?php echo UPLOAD_SITE_URL.'/shop/member/'.$output['flea_detail']['i'].'/'.$output['flea_detail']['img5'];?>" alt="">
          
        </li>
        <?php }?>
     
      </ul>
	  <div class="boxbg"></div>
	  <div class="boxli"><img src="<?php echo UPLOAD_SITE_URL.'/shop/member/'.$output['flea_detail']['i'].'/'.$output['flea_detail']['img1'];?>" alt=""></div>
  </div>

   
  <div class="Det_info">
  	<dl class="Det_info_price"><dt>价格：</dt><dd><i><?php echo $output['flea_detail']['goods_store_price'];?></i><?php echo $output['flea_detail']['goods_money_attr'];?></dd></dl>
  	<dl class="Det_info_area"><dt>所在地区：</dt><dd><?php echo $output['flea_detail']['flea_area_name']; ?></dt><dd><?php echo $output['flea_detail']['flea_area_xiaoqu']; ?></dd></dl>
  	<dl><dt>新旧程度：</dt><dd>9成新</dd></dl>
  </div>
  <div class="Det_des">
  	<h2>描述：</h2>
  	<p><?php echo $output['flea_detail']['goods_des']; ?></p></div>
  <div class="Det_cont">
  	<dl style="width:40%;"><dt>联系人：</dt><dd><?php echo $output['flea_detail']['flea_pname']; ?></dd></dl>
  	<dl style="width:60%;"><dt>联系电话：</dt><dd style="color: #F96D06;"><a href="tel:<?php echo $output['flea_detail']['flea_pphone']; ?>"><?php echo $output['flea_detail']['flea_pphone']; ?></a></dd></dl>
  </div>
  <div class="Det_att">
  	<i>*</i>购买前请与卖家进行沟通，避免交易中产生纠纷
  </div>
<?php }?>
</div>
<script type="text/javascript" src="<?php echo WAP_SITE_URL;?>/js/yxMobileSlider.js"></script>
<script>
  $(".slider").yxMobileSlider({width:640,height:320,during:4000});
  $(function(){
	  $(".slider li img").click(function(){
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
</script>



