<?php defined('InShopNC') or exit('Access Invalid!');?>
<html>
<body>
	<span class="resu_care">注意：有红色星号的为必选项</span>
<div class="resume employ" >
	<form action="<?php echo WAP_SITE_URL;?>/index.php?act=work&op=do_work_add" method="post" >
	<ul>
	<li><label><span>*</span>标&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;题：</label>
	    <div class="resu_td"><input type="text" name="title" placeholder="请填写招聘信息标题" /></div></li>
	<li><label><span>*</span>联系人姓名：</label>
	    <div class="resu_td"><input type="text" name="lxname" placeholder="请填写联系人姓名" /></div></li>
	<li><label><span>*</span>联系人手机：</label>
	    <div class="resu_td"><input type="text" name="lxtel" placeholder="请填写联系人手机号" /></div></li>
	<li><label><span>*</span>选择分类：</label>
	    <div class="resu_td">
		<select name="cid">
		<option>请选择</option>
			<?php foreach($output['tree'] as $son){?>
				<?php if($son['level']==1){?>
					<option value="<?php echo $son['gc_id'];?>" style="backgroud:red"><?php echo $son['gc_name']?></option>
					<?php foreach($output['tree'] as $son1){?>
						<?php if($son1['level']==2 && $son1['gc_parent_id']==$son['gc_id']){?>
							<option value="<?php echo $son['gc_id'].','.$son1['gc_id']?>">-<?php echo $son1['gc_name']?></option>
							<?php foreach($output['tree'] as $son2){?>
								<?php if($son2['level']==3 && $son2['gc_parent_id']==$son1['gc_id']){?>
									<option value="<?php echo $son['gc_id'].','.$son1['gc_id'].','.$son2['gc_id']?>">--<?php echo $son2['gc_name']?></option>
								<?php }?>
							<?php }?>
						<?php }?>
					<?php }?>
				<?php }?>
			<?php }?>
		</select></div></li>
	<li><label><span>*</span>薪&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;资：</label>
	    <div class="resu_td"><input type="text" name="work_money" placeholder="请填写薪资" /></div></li>
	<li><label><span>*</span>职&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;位：</label>
	    <div class="resu_td"><input type="text" name="work_name" placeholder="请填写招聘职位" /></div></li>
	<li><label><span>*</span>公司名称：</label>
	    <div class="resu_td"><input type="text" name="bus" placeholder="请填写招聘公司名称" /></div></li>
	<li><label><span>*</span>工作地址：</label>
	    <div class="resu_td"><input type="text" name="work_address" placeholder="请填写工作详细地址" /></div></li>
	<li><label><span>*</span>职位要求：</label>
	    <div class="resu_td"><textarea name="description" placeholder="请描写职位要求"></textarea></div></li>
	<li><label><span>*</span>公司福利：</label>
	    <div class="resu_td empl_wel">
		    <ol>
            <li><input class="resu_sex" type="checkbox" value="五险一金" name="box[]" >五险一金</li>
			<li><input class="resu_sex" type="checkbox" value="周末双休" name="box[]">周末双休</li>
			<li><input class="resu_sex" type="checkbox" value="交通补助" name="box[]">交通补助</li>
			<li><input class="resu_sex" type="checkbox" value="带薪年假" name="box[]">带薪年假</li>
			<li><input class="resu_sex" type="checkbox" value="餐补" name="box[]">餐补</li>
			<li><input class="resu_sex" type="checkbox" value="话补" name="box[]">话补</li>
			<li><input class="resu_sex" type="checkbox" value="生日蛋糕" name="box[]">生日蛋糕</li>
			<li><input class="resu_sex" type="checkbox" value="公司旅游" name="box[]">公司旅游</li>
                                                               </ol></div></li>

	<li><label><span>*</span>公司规模：</label>
	    <div class="resu_td">
		    <select name="size">
				<option>请选择相应规模</option>
				<option value="0-99">0-99人</option>
				<option value="100-199">100-199人</option>
				<option value="200-500">200-500人</option>
				<option value="501">500以上</option>
			</select></div></li>
	<li><label><span>*</span>公司性质：</label>
	    <div class="resu_td">
		   <select name="property">
				<option>请选择公司性质</option>
				<option value="私企">私企</option>
				<option value="公私合营">公私合营</option>
				<option value="国企">国企</option>
				<option value="其他">其他</option>
			</select></div></li>
	<li><label><span>*</span>区&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;域：</label>
	    <div class="resu_td">
		  <select name="area">
				<option>请选择所在地区</option>
				<?php foreach($output['area_list'] as $val){?>
					<option value="<?php echo $val['area_id']?>"><?php echo $val['area_name']?></option>
				<?php }?>
			</select></div></li>
	<li><label>&nbsp;&nbsp;说明描述：</label>
	    <div class="resu_td">
		  <textarea name="tell_description" placeholder="请填写其他要求"></textarea></div></li>
		  <input type="hidden" name="work_token" value="<?php $_SESSION['work_token']= rand(1000,9999);echo $_SESSION['work_token'];?>">
	<li><input class="resu_sub" type="submit" value="立即发布"></li>
	</ul>
	</form>
	</div>
</body>
</html>
<script type="text/javascript">
    var key = getcookie('key');
    if(key==''){
        window.location.href = '<?php echo WAP_SITE_URL;?>/tmpl/member/login.html';
    }
</script>