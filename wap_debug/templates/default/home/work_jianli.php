<?php defined('InShopNC') or exit('Access Invalid!');?>
<html>
<link type="text/css" rel="stylesheet" href="<?php echo RESOURCE_SITE_URL?>/riqi/laydate/need/laydate.css">
<script src="<?php echo RESOURCE_SITE_URL?>/riqi/laydate/laydate.js"></script>
<body>
	<span class="resu_care">注意：有红色星号的为必选项</span>
<div class="resume" >
	<form action="<?php echo WAP_SITE_URL;?>/index.php?act=work&op=do_work_jianli" method="post" >
	<ul>
	<li><label><span>*</span>标&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;题：</label>
	    <div class="resu_td"><input type="text" name="title" placeholder="请填写求职标题" /></div></li>
	<li><label><span>*</span>选择职位：</label>	
		<div class="resu_td">
		<select name="cid">
		<option value="0">请选择期望职位类别</option>
			<?php foreach($output['tree'] as $son){?>
				<?php if($son['level']==1){?>
					<option value="<?php echo $son['gc_id'];?>"><?php echo $son['gc_name']?></option>
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
	<li><label><span>*</span>期望薪资：</label>
			<div class="resu_td">
			    <select name="askmoney">
				<option value="0">请选择期望薪资</option>
				<option value="1000以下">1000以下</option>
				<option value="1000-2000元">1000-2000元</option>
				<option value="2000-3000元">2000-3000元</option>
				<option value="3000-5000元">3000-5000元</option>
				<option value="5000-8000元">5000-8000元</option>
				<option value="8000-12000元">8000-12000元</option>
				<option value="12000-20000元">12000-20000元</option>
				<option value="20000以上">20000以上</option>
				<option value="面议">面议</option>
			    </select></div></li>
	<li><label><span>*</span>期望职位：</label>
	    <div class="resu_td"><input type="text" name="work_name" placeholder="请填写期望的职位"  /></div></li>
	    <li><label><span>*</span>求职区域：</label>
	    <div class="resu_td"><input type="text" name="work_area" placeholder="请填写期望的工作地"  /></div></li>
	<li><label><span>*</span>姓&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;名：</label>
        <div class="resu_td">
		<input class="resu_name" type="text" name="membername" placeholder="请输入姓名" />
		<input class="resu_sex" type="radio" checked="checked" value="0" name="box">男
		<input class="resu_sex" type="radio" value="1" name="box">女</div></li>
		
	<li><label><span>*</span>出生日期：</label>
		<div class="resu_td">
	   	 	<input placeholder="请输入日期" class="laydate-icon" onclick="laydate()" name="time"></div></li>
		<li><label><span>*</span>学历：</label>
			<div class="resu_td">
			    <select name="xuewei">
				<option value="0">请选择学历</option>
				<option value="小学">小学</option>
				<option value="中学">中学</option>
				<option value="高中">高中</option>
				<option value="中专">中专</option>
				<option value="大专">大专</option>
				<option value="本科">本科</option>
				<option value="硕士">硕士</option>
				<option value="博士">博士</option>				
			    </select></div></li>
		<li><label><span>*</span>工作经验：</label>
			<div class="resu_td">
			    <select name="jingyan">				
				<option value="无经验">无经验</option>
				<option value="应届生">应届生</option>
				<option value="1年以下">1年以下</option>
				<option value="1-3年">1-3年</option>
				<option value="3-5年">3-5年</option>
				<option value="5-10年">5-10年</option>
				<option value="10年以上">10年以上</option>				
			    </select></div></li>
	<li><label><span>*</span>联系方式：</label>
		<div class="resu_td">
	   	 	<input placeholder="请输入手机号码" class="laydate-icon"  name="mphone"></div></li>
	<li><label><span></span></label>
	   	 	<div class="resu_td">
	   	 	<input placeholder="请输入座机号码" class="laydate-icon"  name="phone"></div></li>
	<li><label><span>*</span>区&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;域：</label>
			<!-- <input type="text" id="area_info" name="area_info" value=""> -->
         <div class="resu_td">
            <select id="s_province" name="s_province"></select>
            <select id="s_city" name="s_city" ></select>
            <select id="s_county" name="s_county"></select>
            <script type="text/javascript" src="<?php echo RESOURCE_SITE_URL;?>/js/dialog/area.js"></script>
            <script type="text/javascript">_init_area();</script>
            <div id="show"></div>
         	<input type="text" name="area_r" value="填写详细地址"  onfocus="javascript:if(this.value=='填写详细地址')this.value='';"></div></li>
        <script type="text/javascript">
          var a = document.getElementByTagId;
          alert(a('s_province').value);
          var showaddress = function(){
            a('area_info').innerHTML = a('s_province').value + a('s_city').value + a('s_county').value;
            alert(a('s_province').value);
          }
          a('area_info').setAttribute('onchange','showaddress()');


        </script>
			
	<li><label>&nbsp;&nbsp;自我介绍：</label>
	    <div class="resu_td"><textarea name="self_description" placeholder="请填写自我介绍"></textarea></div></li>
		
<input type="hidden" class="laydate-icon"   name="key" value="">
<input type="hidden" name="jl_token" value="<?php $_SESSION['jl_token']= rand(1000,9999);echo $_SESSION['jl_token'];?>">
	<li><input class="resu_sub" type="submit" value="立即发布"></li></ul>
	</form>
    </div>

</body>
</html>
<script src="<?php echo RESOURCE_SITE_URL?>/js/jquery.js"></script> 
<script src="<?php echo RESOURCE_SITE_URL?>/js/jquery.cxselect.js"></script>
<script type="text/javascript" src="<?php echo WAP_SITE_URL?>/js/config.js"></script>
<script type="text/javascript" src="<?php echo WAP_SITE_URL?>/js/zepto.min.js"></script>
<script type="text/javascript" src="<?php echo WAP_SITE_URL?>/js/template.js"></script>
<script type="text/javascript" src="<?php echo WAP_SITE_URL?>/js/common.js"></script>
<script type="text/javascript" src="<?php echo WAP_SITE_URL?>/js/tmpl/common-top.js"></script>

<script type="text/javascript" src="<?php echo WAP_SITE_URL?>/js/tmpl/footer.js"></script>
<script type="text/javascript">
$(function(){
    var key = getcookie('key');
	if(key==''){
    	window.location.href = '<?php echo WAP_SITE_URL;?>/tmpl/member/login.html';
	}      
    $('input[name=key]').val(key);
})
</script>