<?php defined('InShopNC') or exit('Access Invalid!');?>

	
	<style type="text/css">
		body{margin:0px;padding: 0px;background: #e3e3e3;}
		
		
		
		input.submit_btn{
	height: 40px;
    line-height: 40px;
    color: #FFF;
    background: #D9434E none repeat scroll 0% 0%;
    display: block;
    text-align: center;
	border:0px;
}

	</style>


<body>
<div class="main">
<div class="house">

<div class="house_tit">推荐房源</div>
<div style="float:right;"></div>
<?php if(!empty($output['live_list'])){ ?>
	<?php foreach($output['live_list'] as $key =>$live_list){?>
	<div class="message">
	
		<a href="<?php echo WAP_SITE_URL.'/index.php?act=brand&op=brand_detail&goods_id='.$live_list['goods_id'];?>">
		<div class="message_img">
			<img src="<?php echo UPLOAD_SITE_URL."/shop/member/".$live_list['i']."/".$live_list['goods_image'];?>">
		</div>
		</a>	
		<div class="message_title">
		<div class="message_neme">
				<?php echo $live_list['goods_name'] ?>
				<?php 
					if($live_list['goods_type']==1){
						echo "(个人)";
					}else if($live_list['goods_type']==2){
						echo "(中介)";
					}
				?>

			</div>
			<div class="message_neme">
				更新时间：<span><?php echo date("Y年m月d日",$live_list['goods_add_time']); ?></span>
			</div>
			
			<div class="message_neme">
				地址：<span><?php echo $live_list['flea_area_xiaoqu'] ?></span>
			</div>			
			<div class="message_price">
				房屋价格：<span><em>￥<?php echo $live_list['goods_store_price'] ?></em><?php echo $live_list['goods_money_attr'] ?></span>
			</div>
			<div class="message_salenum">
				联系人：<span><?php echo $live_list['flea_pname'] ?></span>
			</div> 
			<div class="message_phone">
			联系电话：<span><?php if(!empty($live_list['flea_pphone'])){?>
			<a href="tel:<?php echo $live_list['flea_pphone'] ?>"><?php echo $live_list['flea_pphone'];?>
			</a>
			<?php }else{?>
			<?php }?></span>
			</div>
		</div>
	</div>
	<?php }?>
	<?php }?>
	
	<div class="kf_message">
		<div class="kf_title"><span>我要看房</span></div>
		<div class="house_form">
		<form method="post" action="<?php echo WAP_SITE_URL.'/index.php?act=live&op=live_add' ?>" >
			<ul>
			<li><label>姓名： </label><div class="house_form_td"><input type="text"name="kf_name"></div></li>
			<li><label>联系方式： </label><div class="house_form_td"><input type="text"name="kf_phone"></div></li>
			<li><label>意向楼盘： </label>
					<div class="house_form_td">
						<select name="goods_id">
						<option value="0">请选楼盘</option>
						<?php if(!empty($output['live_list'])){ ?>
							<?php foreach($output['live_list'] as $key =>$live_list){?>
							<option value="<?php echo $live_list['goods_id'] ?>"><?php echo $live_list['goods_name']?></option>
							
						<?php }?>
						<?php }?>
					</select>
					</div>
			 </li>
			 <li><label>新房团购：</label><div class="house_form_td"><span><?php echo $live_list['flea_pphone'] ?></span></div></li>
			  <li><label>验证码：</label><div class="house_form_td house_ver"><input type="text" name="code"/><img style="width:44px;" src="index.php?act=seccode&op=makecode&nchash=<?php echo getNchash();?>" title="" name="codeimage" border="0" id="codeimage" class="fl ml5"  onclick="this.src=this.src+'?'+Math.random()"/>
				已有<?php echo $output['add_num']; ?>人报名</div></li>
						<li class="house_but"> <input  type="submit" class="submit_btn" value="马上报名"></li>
						<input type="hidden" name="store_id" value="<?php echo $live_list['store_id']?>">
					<input type="hidden" name="store_name" value="<?php echo $live_list['store_name']?>">
		
		</form>
		</div>
	</div>
	</div>
	</div>