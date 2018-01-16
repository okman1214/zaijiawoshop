<?php defined('InShopNC') or exit('Access Invalid!');?>
<?php ?>
	
	
	
<body>
	<?php if(!empty($output['search_list'])){ ?>
		<div class="main">
		<div class="house">
	<?php foreach($output['search_list'] as $key =>$search_list){ ?>
	<div class="message">
		<div class="message_img"><img src="<?php echo UPLOAD_SITE_URL.'/shop/store/goods/'.$search_list['i']."/".$search_list['goods_image'] ?>"></div>
		<div class="message_title">
			<div class="message_neme">
				开始时间：<span><?php if(empty($search_list['goods_selltime'])){echo date('Y-m-d',time());} echo $search_list['goods_selltime']; ?></span>
			</div>
			<div class="message_neme">
				租房类型：<span><?php echo $search_list['goods_jingle'] ?></span>
			</div>
			
			<div class="message_price">
				出租价格：<span><em><?php echo $search_list['goods_price'] ?></em>元/每月</span>
			</div>
			<div class="message_salenum">
				已有<em><?php echo $search_list['goods_salenum']+10; ?></em>人浏览
			</div>
			<div class="message_neme">
				联系人：<span><?php echo $search_list['store_name']; ?></span>
			</div>
			<div class="message_phone">
				联系电话：<span><a href="tel:<?php echo $search_list['store_phone']; ?>"><?php echo $search_list['store_phone']; ?></a></span>
			</div>
		
		</div>
	</div>
	<?php }?>	
	<?Php }else{?>
	<div class="s_main">
		没有租房信息...
	</div>
	<?php }?>
	</div>
	</div>
	<!-- <div class="kf_message">
		<div class="kf_title">我要看房</div>
		<form method="post" action="<?php echo WAP_SITE_URL.'/index.php?act=live&op=live_add' ?>" >
		<div class="kf_des">
			<div class="ke_base_mes"><span>姓名：<input type="text"name="kf_name"></span><span>联系方式：<input type="text"name="kf_phone"></span></div>
			<div><span>意向楼盘：
					<select style='width:25%;' name="goods_id">
						<option value="0">请选楼盘</option>
						<?php if(!empty($output['live_list'])){ ?>
							<?php foreach($output['live_list'] as $key =>$live_list){?>
							<option value="<?php echo $live_list['goods_id'] ?>"><?php echo $live_list['goods_name']?></option>
							
						<?php }?>
						<?php }?>
						
					</select>
					<input type="hidden" name="store_id" value="<?php echo $live_list['store_id']?>">
							<input type="hidden" name="store_name" value="<?php echo $live_list['store_name']?>">
				</span><span>新房团购：<?php echo $live_list['store_phone'] ?></span>
			</div>
		
		<div class="">
		 验证码：<input type="text" name="code" /><img src="index.php?act=seccode&op=makecode&nchash=<?php echo getNchash();?>" title="" name="codeimage" border="0" id="codeimage" class="fl ml5"  onclick="this.src=this.src+'?'+Math.random()"/>

			
			 已有<?php echo $output['add_num']; ?>人报名
						 <input type="submit" value="马上报名">	
		</div>
		</div>
		</form>
	</div> -->