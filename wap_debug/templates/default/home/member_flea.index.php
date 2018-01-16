<?php defined('InShopNC') or exit('Access Invalid!');?>
<?php if(!empty($output['member_flea_list']) && is_array($output['member_flea_list'])){?>
	<table>
	<tr>
		<th>标题</th>
		<th>时间</th>
		<th>操作</th>
	</tr>
	<?php foreach ($output['member_flea_list'] as $key => $value) {?>
	
		<tr>
			<td><a href="<?php echo WAP_SITE_URL.'/index.php?act=brand&op=brand_detail&goods_id='.$value['goods_id'];?>"><?php echo $value['goods_name']?></a></td>
			<td><?php echo date('Y-m-d H时',$value['goods_add_time'])?></td>
			<td><a href="<?php echo WAP_SITE_URL.'/index.php?act=member_flea&op=del&flea_id='.$value['goods_id'];?>">删除</a></td>
		</tr>
	
	<?php }?>
	</table>
<?php }else{?>
	<div>
		你还没有自己发布的二手物品
	</div>
<?php }?>