<?php defined('InShopNC') or exit('Access Invalid!');?>
<?php ?>
	
	
	
<body>
	
	<div class="main">
	<div class="house">
	<?php if(!empty($output['search_list'])){ ?>
	<?php foreach($output['search_list'] as $key =>$search_list){?>
	<div class="message">
	
		<a href="<?php echo WAP_SITE_URL.'/index.php?act=brand&op=brand_detail&goods_id='.$search_list['goods_id'];?>">
			<div class="message_img">
				<img src="<?php echo UPLOAD_SITE_URL."/shop/member/".$search_list['i']."/".$search_list['goods_image'] ?>">
			</div>

			<div class="message_title">
			<div class="message_neme">
				<?php echo $search_list['goods_name'] ?>
				<?php 
					if($search_list['goods_type']==1){
						echo "(个人)";
					}else if($search_list['goods_type']==2){
						echo "(中介)";
					}
				?>

			</div>
			<div class="message_neme">
				更新时间：<span><?php echo date("Y年m月d日",$search_list['goods_add_time']); ?></span>
			</div>
			
			<div class="message_neme">
				地址：<span><?php echo $search_list['flea_area_xiaoqu'] ?></span>
			</div>
			
			
			<div class="message_price">
				楼盘价格：<span><em>￥<?php echo $search_list['goods_store_price'] ?></em><?php echo $search_list['goods_money_attr'] ?></span>
			</div>
			<div class="message_salenum">
				联系人：<span><?php echo $search_list['flea_pname'] ?></span>
			</div> 
		</a>
		<div class="message_phone">
		联系电话：<span><?php if(!empty($search_list['flea_pphone'])){?>
		<a href="tel:<?php echo $search_list['flea_pphone'] ?>"><?php echo $search_list['flea_pphone'];?>
		</a>
		<?php }else{?>
		<?php }?></span>
		</div>
		</div>
	</div>
	<?php }?>
		
	<?Php }else{?>
	<div class="s_main">
		商品不存在...
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
						<?php if(!empty($output['search_list'])){ ?>
							<?php foreach($output['search_list'] as $key =>$search_list){?>
							<option value="<?php echo $search_list['goods_id'] ?>"><?php echo $search_list['goods_name']?></option>
							
						<?php }?>
						<?php }?>
						
					</select>
					<input type="hidden" name="store_id" value="<?php echo $search_list['store_id']?>">
							<input type="hidden" name="store_name" value="<?php echo $search_list['store_name']?>">
				</span><span>新房团购：<?php echo $search_list['store_phone'] ?></span>
			</div>
		
		<div class="">
		 验证码：<input type="text" name="code" /><img src="index.php?act=seccode&op=makecode&nchash=<?php echo getNchash();?>" title="" name="codeimage" border="0" id="codeimage" class="fl ml5"  onclick="this.src=this.src+'?'+Math.random()"/>

			
			 已有<?php echo $output['add_num']; ?>人报名
						 <input type="submit" value="马上报名">	
		</div>
		</div>
		</form>
	</div> -->