<?php defined('InShopNC') or exit('Access Invalid!');?>

	
	<style type="text/css">
		body{margin:0px;padding: 0px;background: #e3e3e3;max-width: 640px;min-width: 360px;}
		.message{width: 100%;display: block;height: 170px;border: 0px red solid;font-size: 12px;margin-top: 5px;background: #fff;}
		.message .message_img{width: 40%;float: left;height: 100%; }
		.message .message_img img{width: 100%;height: 100%}
		.message .message_title{width: 58%;float: right;margin-right: 0.5%;}
		.kf_message{width: 100%;background: #fff;}
		.kf_message .kf_title{width: 100%;}
		.kf_message .kf_des{width: 100%; border: 2px #e3e3e3 solid;margin-top: 4px;}
		.kf_message .kf_des input{width: 20%;}
		.s_main{width: 100%;border: 1px red solid; position: relative;display: block;height: 150px;margin-top:4px;background:#fff;}
		.s_main .s_main_img{width: 40%;margin-left: 2px;height: 150px;}
		.s_main .s_main_img img{width: 100%;height: 100%}
		.s_main .s_main_content{width: 56%;float: right;display:block;font-size:12px;height:100%}
	</style>


<body>
	<?php if(!empty($output['search_list'])){ ?>
	<?php foreach($output['search_list'] as $key =>$search_list){ ?>
	<div class="s_main">
		<div class="s_main_img"><img src="<?php echo UPLOAD_SITE_URL.'/shop/store/goods/'.$search_list['i']."/".$search_list['goods_image'] ?>"></div>
		<div class="s_main_content">
			<div class="s_main_content_time">
				开盘时间：<?php echo $search_list['goods_selltime'] ?>
			</div>
			<div class="s_main_content_neme">
				物业地址：<?php echo $search_list['goods_name'] ?>
			</div>
			<div class="s_main_content_neme">
				楼盘地址：<?php echo $search_list['goods_jingle'] ?>
			</div>
			<div class="s_main_content_price">
				楼盘价格￥：<?php echo $search_list['goods_price'] ?>元
			</div>
			<div class="s_main_content_salenum">
				已有<?php echo $search_list['goods_salenum'] ?>人订购
			</div>
			<div class="s_main_content_phone">
			联系电话：<?php echo $search_list['store_phone'] ?>
			</div>
		
		</div>
	</div>
	<?php }?>	
	<?Php }else{?>
	<div class="s_main">
		商品不存在...
	</div>
	<?php }?>
	<div class="kf_message">
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
	</div>