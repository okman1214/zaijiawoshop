<?php defined('InShopNC') or exit('Access Invalid!');?>
<link href="<?php echo SHOP_TEMPLATES_URL;?>/css/home_group.css" rel="stylesheet" type="text/css">
<style type="text/css">
.nch-breadcrumb-layout {display: none; }
</style>

<div class="ncg-container">
<!--
  <div class="ncg-category" id="ncgCategory">
    <h3>线上抢</h3>
    <ul>
<?php $i = 0; $names = $output['groupbuy_classes']['name']; foreach ((array) $output['groupbuy_classes']['children'][0] as $v) { if (++$i > 6) break; ?>
      <li><a href="<?php echo WAP_SITE_URL.'/index.php?act=groupbuy&op=groupbuy_list&class='.$v; ?>">
        <?php echo $names[$v]; ?></a>
      </li>
<?php } ?>
    </ul>
    <h3>虚拟抢</h3>
    <ul>
<?php $i = 0; $names = $output['groupbuy_vr_classes']['name']; foreach ((array) $output['groupbuy_vr_classes']['children'][0] as $v) { if (++$i > 6) break; ?>
      <li><a href="<?php echo WAP_SITE_URL.'/index.php?act=groupbuy&op=index&vr_class='.$v; ?>">
        <?php echo $names[$v]; ?></a>
      </li>
<?php } ?>
    </ul>
  </div>
-->


  <div class="ncg-content">
    <?php if (!empty($output['picArr'])) { ?>
    <!-- <div class="ncg-slides-banner">
      <ul id="fullScreenSlides" class="full-screen-slides">
        <?php foreach($output['picArr'] as $p) { ?>
        <li><a href="<?php echo $p[1];?>" target="_blank"><img src="<?php echo UPLOAD_SITE_URL.'/'.ATTACH_LIVE.'/'.$p[0];?>"></a></li>
        <?php } ?>
      </ul>
    </div> -->
    <?php } ?>
<!--
    <div class="group-list mt20">


      <?php  if (!empty($output['groupbuy'])) { ?>
      <ul>
        <?php foreach ($output['groupbuy'] as $groupbuy) { ?>
        <li class="<?php echo $output['current'];?>">
          <div class="ncg-list-content"> <a title="<?php echo $groupbuy['groupbuy_name'];?>" href="tmpl/product_detail.html?goods_id=<?php  echo $groupbuy['goods_id'];?>" class="pic-thumb" target="_blank"><img src="<?php echo gthumb($groupbuy['groupbuy_image'],'mid');?>" alt=""></a>
            <h3 class="title"><a title="<?php echo $groupbuy['groupbuy_name'];?>" href="<?php echo $groupbuy['groupbuy_url'];?>" target="_blank"><?php echo $groupbuy['groupbuy_name'];?></a></h3>
            <?php list($integer_part, $decimal_part) = explode('.', $groupbuy['groupbuy_price']);?>
            <div class="item-prices"> <span class="price"><i><?php echo $lang['currency'];?></i><?php echo $integer_part;?><em>.<?php echo $decimal_part;?></em></span>
              <div class="dock"><span class="limit-num"><?php echo $groupbuy['groupbuy_rebate'];?>&nbsp;<?php echo $lang['text_zhe'];?></span> <del class="orig-price"><?php echo $lang['currency'].$groupbuy['goods_price'];?></del></div>
              <span class="sold-num"><em><?php echo $groupbuy['buy_quantity']+$groupbuy['virtual_quantity'];?></em><?php echo $lang['text_piece'];?><?php echo $lang['text_buy'];?></span><a href="<?php echo $groupbuy['groupbuy_url'];?>" target="_blank" class="buy-button">我要抢</a></div>
          </div>
        </li>
        <?php } ?>
      </ul>
      <?php } else { ?>
      <div class="norecommend">暂无线上抢购推荐</div>
      <?php } ?>
    </div>
    <div class="group-list mt30">
      <div class="ncg-recommend-title">
        <h3>虚拟抢购推荐</h3>
        <a href="<?php echo urlShop('show_groupbuy', 'vr_groupbuy_list'); ?>" class="more">查看更多</a></div>
      <?php if (!empty($output['vr_groupbuy'])) { ?>
      <ul>
        <?php foreach($output['vr_groupbuy'] as $groupbuy) { ?>
        <li class="<?php echo $output['current'];?>">
          <div class="ncg-list-content"> <a title="<?php echo $groupbuy['groupbuy_name'];?>" href="<?php echo $groupbuy['groupbuy_url'];?>" class="pic-thumb" target="_blank"><img src="<?php echo gthumb($groupbuy['groupbuy_image'],'mid');?>" alt=""></a>
            <h3 class="title"><a title="<?php echo $groupbuy['groupbuy_name'];?>" href="<?php echo $groupbuy['groupbuy_url'];?>" target="_blank"><?php echo $groupbuy['groupbuy_name'];?></a></h3>
            <?php list($integer_part, $decimal_part) = explode('.', $groupbuy['groupbuy_price']);?>
            <div class="item-prices"> <span class="price"><i><?php echo $lang['currency'];?></i><?php echo $integer_part;?><em>.<?php echo $decimal_part;?></em></span>
              <div class="dock"><span class="limit-num"><?php echo $groupbuy['groupbuy_rebate'];?>&nbsp;<?php echo $lang['text_zhe'];?></span> <del class="orig-price"><?php echo $lang['currency'].$groupbuy['goods_price'];?></del></div>
              <span class="sold-num"><em><?php echo $groupbuy['buy_quantity']+$groupbuy['virtual_quantity'];?></em><?php echo $lang['text_piece'];?><?php echo $lang['text_buy'];?></span><a href="<?php echo $groupbuy['groupbuy_url'];?>" target="_blank" class="buy-button">我要抢</a></div>
          </div>
        </li>
        <?php } ?>
      </ul>
      <?php } else{ ?>
      <div class="norecommend">暂无虚拟抢购推荐</div>
      <?php } ?>
    </div>
-->




  </div>
</div>



<div class="main">
<div class="sales_tit">
	<a href="">12点场<br><span>12:00</span></a>
	<a href="">16点场<br><span>16:00</span></a>
	<a href="">20点场<br><span>20:00</span></a>
	<a class="sales_tit_nosh" href="">0点场<br><span>明日00:00</span></a>
</div>
<div class="sales_time">距离下一场开始 
 <?php //$nowt = date("H");
//       $nowtime = time();
//   if($nowt>=0 && $now<12){
//     $ctime = 12 -$nowt;
//   }
//   echo  strtotime("now"), "\n";

?>
        
        
          <span id="day_show">0天</span>
          <strong id="hour_show">0时</strong>
          <strong id="minute_show">0分</strong>
          <strong id="second_show">0秒</strong>
        
</div>
<div class="sales_con">
	<?php  if (!empty($output['groupbuy'])) { ?>

	<ul>
        <?php foreach ($output['groupbuy'] as $groupbuy) { ?>
       <!-- <div class="sales_item">-->
		<li>
		<a title="<?php echo $groupbuy['groupbuy_name'];?>" href="tmpl/product_detail.html?goods_id=<?php  echo $groupbuy['goods_id'];?>" class="pic-thumb" >


		<!--<div class="sales_item_img">--><img src="<?php echo gthumb($groupbuy['groupbuy_image'],'mid');?>" alt=""><!--</div>-->


		<!--<div class="sales_item_des">-->
        <p class="sales_con_tit"><?php echo $groupbuy['groupbuy_name'];?></p>
            <?php list($integer_part, $decimal_part) = explode('.', $groupbuy['groupbuy_price']);?>
            <p class="sales_con_dis"> 
			<?php echo sprintf("%.2f",($groupbuy['groupbuy_price']/$groupbuy['goods_price']))*10;?>折</p>
              <p class="sales_con_buy"> 
			   
			   <em >￥<?php echo $lang['currency'];?><?php echo $integer_part;?>.<?php echo $decimal_part;?></em>
             <del>￥<?php echo $lang['currency'].$groupbuy['goods_price'];?></del>
			  <span>我要抢 </span></p>

			<!--</div>-->
         </a>
		 </li>
        <!--</div>-->
      <?php } ?>
	  </ul>
      <?php } else { ?>
      <div class="norecommend">暂无线上抢购推荐</div>
      <?php } ?>
    </div>
</div>
</div>
<script type="text/javascript" src="<?php echo WAP_SITE_URL?>/js/index.js"></script>
<script type="text/javascript">

 
  var d = new Date();
  var now = d.getHours();
  var nowt = d.getTime();
  if(now>=0 && now<12){
      d.setHours(12);
      d.setMinutes(0);
      d.setSeconds(0);
      d.setMilliseconds(0);
      time=d.getTime();
  }else if(now>=12 && now<16){   
      d.setHours(16);
      d.setMinutes(0);
      d.setSeconds(0);
      d.setMilliseconds(0);
      time=d.getTime();
  }else if(now>=16 && now<20){    
      d.setHours(20);
      d.setMinutes(0);
      d.setSeconds(0);
      d.setMilliseconds(0);
      time=d.getTime();    
  }else if(now>=20 && now<24){
      d.setHours(24);
      d.setMinutes(0);
      d.setSeconds(0);
      d.setMilliseconds(0);
      time=d.getTime();
  }


  var intDiff = parseInt((time-nowt)/1000);//倒计时总秒数量
  
  function timer(intDiff){

      window.setInterval(function(){

      var day=0,
          hour=0,
          minute=0,
          second=0;//时间默认值        
      if(intDiff > 0){
          day = Math.floor(intDiff / (60 * 60 * 24));
          hour = Math.floor(intDiff / (60 * 60)) - (day * 24);
          minute = Math.floor(intDiff / 60) - (day * 24 * 60) - (hour * 60);
          second = Math.floor(intDiff) - (day * 24 * 60 * 60) - (hour * 60 * 60) - (minute * 60);
      }
      if (minute <= 9) minute = '0' + minute;
      if (second <= 9) second = '0' + second;
      $('#day_show').html(day+"天");
      $('#hour_show').html('<s id="h"></s>'+hour+'时');
      $('#minute_show').html('<s></s>'+minute+'分');
      $('#second_show').html('<s></s>'+second+'秒');
      intDiff--;
      }, 1000);
  } 

  
      timer(intDiff);    
  

</script>
