<?php defined('InShopNC') or exit('Access Invalid!');?>
<link rel="stylesheet" href="http://www.pigapp.net/tpl/Wap/static/classify/mball.css" />
<link rel="stylesheet" href="http://www.pigapp.net/tpl/Wap/static/classify/publishall.css" />
<script src="http://libs.baidu.com/jquery/1.7.0/jquery.min.js"></script>
	<body> 
  <div class="dl_nav"> 
   <span> <a href="/wap.php?g=Wap&c=Classify&a=index">首页</a>&gt; <a href="/wap.php?g=Wap&c=Classify&a=SelectSub&cid={pigcms{$fcid}">重选类别</a>&gt; <a href="javascript:;"><h1 style="color:#F76120">填写 {pigcms{$fabuset['cat_name']} 信息</h1></a> </span> 
  </div> 
  <hr /> 
  <div class="bind_mark"></div> 
  <div style="margin: 0px 0px 10px 10px;"><span>注意：有红色星号的为必填项</span></div>
  <!-- form start --> 
  <form id="mpostForm" name="mpostForm" action="{pigcms{:U('Classify/fabuTosave',array('cid'=>$cid))}" method="post" style="margin-bottom: 100px;"> 
   <ul class="list">
     <li class="item"> 
     <div class="title">
      <span><strong style="color:red;">*</strong>标题：</span>
      <div class="placeholder"></div>
     </div> 
     <div class="input"> 
      <input name="tname" id="tname"  value="" type="text" style="width: 90%;height: 30px;"/> 
     </div> 
     <div class="tip"></div>
	 </li>
	 <li class="item"> 
     <div class="title">
      <span><strong style="color:red;">*</strong>联系人名字：</span>
      <div class="placeholder"></div>
     </div> 
     <div class="input"> 
      <input name="lxname" id="lxname"  value="" type="text" style="width: 90%;height: 30px;"/> 
     </div> 
     <div class="tip"></div>
	 </li>
	<li class="item"> 
     <div class="title">
      <span><strong style="color:red;">*</strong>联系手机号：</span>
      <div class="placeholder"></div>
     </div> 
     <div class="input"> 
      <input name="lxtel" id="lxtel"  value="" onkeyup="value=value.replace(/[^1234567890]+/g,'')" placeholder="请填正确联系手机号" type="text" style="width: 90%;height: 30px;"/> 
     </div> 
     <div class="tip"></div>
	 </li>
	 <!----1单文本框--2单选框--3复选框--4下拉框--5多文本框---->
	 <if condition="!empty($subdir)">
	 <li class="item"> 
			<div class="title">
			<span>选择分类：</span>
			<div class="placeholder"></div>
			</div> 
			<div class="input"> 
			<div class="select">
			<label class="psu">请选择</label>
			<select class="decorate" name="subdir">
			<option value="">请选择</option>
			<volist name="subdir" id="opt">
			 <option value="{pigcms{$opt['cid']}">{pigcms{$opt['cat_name']}</option>
			</volist>
			</select>
			</div>
			<span></span> 
			<div class="select" style="display: none;" type="subcate">
			<label class="psu">请选择</label>
			</div>
			</div> 
			<div class="tip"></div>
		</li>
		</if>
	 <if condition="!empty($catfield)">
	  <volist name="catfield" id="vv" key="kk">
	  <if condition="$vv['type'] eq 1" >
		<li class="item"> 
			<div class="title">
			<span><php>if($vv['iswrite']>0)echo '<strong style="color:red;">*</strong>';</php>{pigcms{$vv['name']}：</span>
			<div class="placeholder"></div>
			</div> 
			<div class="input"> 
			 <input name="input[{pigcms{$kk}][vv]"  value="" type="text" <php>if($vv['inarr']==1)echo 'onkeyup="value=value.replace(/[^1234567890]+/g,'."''".')" placeholder="请填数字"';</php> <php>if(($vv['inarr']==1) && !empty($vv['inunit'])){echo 'class="inputtext01"';}else{echo 'class="inputtext02"';}</php>/> <php>if(($vv['inarr']==1) && !empty($vv['inunit']))echo "&nbsp;".$vv['inunit'];</php>
			 <input name="input[{pigcms{$kk}][tn]"  value="{pigcms{$vv['name']}"  type="hidden" />
			 <input name="input[{pigcms{$kk}][unit]"  value="{pigcms{$vv['inunit']}"  type="hidden" />
			 <input name="input[{pigcms{$kk}][inarr]"  value="{pigcms{$vv['inarr']}"  type="hidden" />
			 <input name="input[{pigcms{$kk}][input]"  value="{pigcms{$vv['input']}"  type="hidden" />
			 <input name="input[{pigcms{$kk}][iswrite]"  value="{pigcms{$vv['iswrite']}"  type="hidden" />
			 <input name="input[{pigcms{$kk}][isfilter]"  value="{pigcms{$vv['isfilter']}"  type="hidden" />
			 <input name="input[{pigcms{$kk}][type]"  value="1"  type="hidden" />
			</div> 
			<div class="tip"></div>
		</li>
	  <elseif condition="$vv['type'] eq 2" />
		<li class="item"> 
			<div class="title">
			<span>{pigcms{$vv['name']}：<php>if($vv['iswrite']>0)echo '<strong style="color:red;">*</strong>';</php></span>
			<div class="placeholder"></div>
			</div> 
			<div class="input danfux">
			<volist name="vv['opt']" id="opt">
			<label><input name="input[{pigcms{$kk}][vv]" type="radio" value="{pigcms{$opt}" /> {pigcms{$opt}</label> 
			<php>if($mod==1) echo '<br/>';</php>
			</volist>
			 <input name="input[{pigcms{$kk}][tn]"  value="{pigcms{$vv['name']}"  type="hidden" />
			 <input name="input[{pigcms{$kk}][input]"  value="{pigcms{$vv['input']}"  type="hidden" />
			 <input name="input[{pigcms{$kk}][iswrite]"  value="{pigcms{$vv['iswrite']}"  type="hidden" />
			 <input name="input[{pigcms{$kk}][isfilter]"  value="{pigcms{$vv['isfilter']}"  type="hidden" />
			 <input name="input[{pigcms{$kk}][type]"  value="2"  type="hidden" />
			</div> 
			<div class="tip"></div> 
		</li> 
	  <elseif condition="$vv['type'] eq 3" />
		<li class="item"> 
			<div class="title">
			<span>{pigcms{$vv['name']}：</span>
			<div class="placeholder"></div>
			</div> 
			<div class="input danfux"> 
			<volist name="vv['opt']" id="opt">
			 <label><input name="input[{pigcms{$kk}][vv][]" type="checkbox"  value="{pigcms{$opt}"/> {pigcms{$opt}</label>
			 
			</volist>
			 <input name="input[{pigcms{$kk}][tn]"  value="{pigcms{$vv['name']}"  type="hidden" />
			 <input name="input[{pigcms{$kk}][input]"  value="{pigcms{$vv['input']}"  type="hidden" />
			 <input name="input[{pigcms{$kk}][iswrite]"  value="{pigcms{$vv['iswrite']}"  type="hidden" />
			 <input name="input[{pigcms{$kk}][isfilter]"  value="{pigcms{$vv['isfilter']}"  type="hidden" />
			 <input name="input[{pigcms{$kk}][type]"  value="3"  type="hidden" />
			</div> 
			<div class="tip"></div> 
		</li> 
	  <elseif condition="$vv['type'] eq 4" />
		<li class="item"> 
			<div class="title">
			<span>{pigcms{$vv['name']}：<php>if($vv['iswrite']>0)echo '<strong style="color:red;">*</strong>';</php></span>
			<div class="placeholder"></div>
			</div> 
			<div class="input"> 
			<div class="select">
			<label class="psu">请选择</label>
			<select class="decorate" name="input[{pigcms{$kk}][vv]">
			<option value="">请选择</option>
			<volist name="vv['opt']" id="opt">
			 <option value="{pigcms{$opt}">{pigcms{$opt}</option>
			</volist>
			</select>
			 <input name="input[{pigcms{$kk}][tn]"  value="{pigcms{$vv['name']}"  type="hidden" />
			 <input name="input[{pigcms{$kk}][input]"  value="{pigcms{$vv['input']}"  type="hidden" />
			 <input name="input[{pigcms{$kk}][iswrite]"  value="{pigcms{$vv['iswrite']}"  type="hidden" />
			 <input name="input[{pigcms{$kk}][isfilter]"  value="{pigcms{$vv['isfilter']}"  type="hidden" />
			 <input name="input[{pigcms{$kk}][type]"  value="4"  type="hidden" />
			</div>
			<span></span> 
			<div class="select" style="display: none;" type="subcate">
			<label class="psu">请选择</label>
			</div>
			</div> 
			<div class="tip"></div>
		</li> 
	  <elseif condition="$vv['type'] eq 5" />
		<li class="item"> 
		<div class="title">
		<span>{pigcms{$vv['name']}：<php>if($vv['iswrite']>0)echo '<strong style="color:red;">*</strong>';</php></span>
		<div class="placeholder"></div>
		</div> 
		<div class="input"> 
		<textarea id="Content" name="input[{pigcms{$kk}][vv]" class="myborder"  style="width: 90%;"></textarea> 
		 <input name="input[{pigcms{$kk}][tn]"  value="{pigcms{$vv['name']}"  type="hidden" />
		 <input name="input[{pigcms{$kk}][input]"  value="{pigcms{$vv['input']}"  type="hidden" />
		 <input name="input[{pigcms{$kk}][iswrite]"  value="{pigcms{$vv['iswrite']}"  type="hidden" />
		 <input name="input[{pigcms{$kk}][isfilter]"  value="{pigcms{$vv['isfilter']}"  type="hidden" />
		 <input name="input[{pigcms{$kk}][type]"  value="5"  type="hidden" />
		</div> 
		<div class="tip"></div> 
		</li> 
	  </if>
	  </volist>
	 </if>
    <li class="item"> 
		<div class="title">
		<span>说明描述：</span>
		<div class="placeholder"></div>
		</div> 
		<div class="input"> 
		<textarea id="Content" name="description" class="myborder"  placeholder="写上一些想要说明的内容" style="width: 90%;"></textarea>
		</div> 
		<div class="tip"></div> 
		</li>
  <if condition="$fabuset['isupimg'] eq 1">
    <li class="item uploadNum" id="uploadNum">还可上传<span class="leftNum orange">8</span>张图片，已上传<span class="loadedNum orange">0</span>张(非必填)</li> 
    <li class="item"> 
     <div class="upload_box"> 
      <ul class="upload_list clearfix" id="upload_list"> 
       <li class="upload_action"> <img src="{pigcms{$static_path}classify/upimg.png" /> <input type="file" accept="image/jpg,image/jpeg,image/png,image/gif" id="fileImage" name="" /> </li> 
      </ul> 
     </div>
    </li>
  </if>
   </ul> 
   <div class="post"> 
    <input type="hidden" id="Pic" name="" /> 
    <input type="hidden" name="cid" value="{pigcms{$cid}" /> 
	<input type="hidden" name="fcid" value="{pigcms{$fcid}" /> 
    <input id="btnPost" type="submit" value="发 布" onclick="return submit_FBI()"/> 
   </div> 
  </form> 
  <script src="{pigcms{$static_path}classify/exif.js"></script> 
  <script src="{pigcms{$static_path}classify/imgUpload.js"></script> 
  <!--<div id="pubOK">
   <div>
    <div class="message">
     发布成功，您可以在“个人中心-我的发布”中查看和操作该信息。
    </div>
    <div class="btn">
     <input type="button" value="我的发布" onclick="" />
     <input type="button" value="关闭" onclick="" />
    </div>
   </div>
  </div>
  <div id="pubFail">
   <div>
    <div class="message">
     信息发布失败。
    </div>
    <div class="btn">
     <input type="button" value="关闭" />
    </div>
   </div>
  </div>--->
  <include file="Classify:footer"/>
 <script type="text/javascript">
   function submit_FBI(){
	 var telnum=$.trim($('#lxtel').val());
	 if(!/^0[0-9\-]{10,13}$/.test(telnum) && !/^((\+86)|(86))?(1)\d{10}$/.test(telnum)){
		   alert('联系手机号格式不对');
	       return false;
		}else{
			return true;
		}
		//document.ostForm.submit();	
	}


        $("select").bind("change",
        function() {
            selectChange($(this))
        })
    
    function selectChange(obj, objtext) {
        var value = obj.val();
		var htmlobj=obj.get(0);		
        var text = $(htmlobj.options[htmlobj.selectedIndex]).text();
        var msg = obj.attr("msg");
        var pattern2 = obj.attr("pattern2");
        obj.parent().children("label").text(text);
            var subcate = obj.parent().parent().children("[type=subcate]");
            var selects = subcate.find("select");
            if (selects) {
                selects.remove()
            }
            if (subcate.length > 0) {
                subcate.children("label").text("请选择").parent().css("display", "none")
            }
       
    }
$(function() {
    if ($(".upload_list").length) {
        var imgUpload = new ImgUpload({
            fileInput: "#fileImage",
            container: "#upload_list",
            countNum: "#uploadNum",
			url:"http://" + location.hostname + "/wap.php?g=Wap&c=Classify&a=ajaxImgUpload"
        })
    }
});
 </script>
 </body>

<!DOCTYPE html><html lang="zh-CN"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8" /><title>信息发布</title><meta charset="utf-8" /><meta name="viewport" content="initial-scale=1.0,maximum-scale=1.0,minimum-scale=1.0,user-scalable=0,width=device-width" /><meta name="format-detection" content="telephone=no" /><meta name="format-detection" content="email=no" /><meta name="format-detection" content="address=no;" /><meta name="apple-mobile-web-app-capable" content="yes" /><meta name="apple-mobile-web-app-status-bar-style" content="default" /><link rel="stylesheet" href="http://www.pigapp.net/tpl/Wap/static/classify/mball.css" /><link rel="stylesheet" href="http://www.pigapp.net/tpl/Wap/static/classify/publishall.css" /><script src="http://libs.baidu.com/jquery/1.7.0/jquery.min.js"></script><style type="text/css">
  .item .danfux{display:block;padding-left: 10px;}
  .danfux label{padding-left:10px;line-height: 25px;display: inline-block;}
  input:focus{background:#ececec;outline:0}
  </style></head><body><div class="dl_nav"><span><a href="/wap.php?g=Wap&c=Classify&a=index">首页</a>&gt; <a href="/wap.php?g=Wap&c=Classify&a=SelectSub&cid=1">重选类别</a>&gt; <a href="javascript:;"><h1 style="color:#F76120">填写 餐饮 信息</h1></a></span></div><hr /><div class="bind_mark"></div><div style="margin: 0px 0px 10px 10px;"><span>注意：有红色星号的为必填项</span></div><!-- form start --><form id="mpostForm" name="mpostForm" action="/wap.php?g=Wap&c=Classify&a=fabuTosave&cid=7" method="post" style="margin-bottom: 100px;"><ul class="list"><li class="item"><div class="title"><span><strong style="color:red;">*</strong>标题：</span><div class="placeholder"></div></div><div class="input"><input name="tname" id="tname"  value="" type="text" style="width: 90%;height: 30px;"/></div><div class="tip"></div></li><li class="item"><div class="title"><span><strong style="color:red;">*</strong>联系人名字：</span><div class="placeholder"></div></div><div class="input"><input name="lxname" id="lxname"  value="" type="text" style="width: 90%;height: 30px;"/></div><div class="tip"></div></li><li class="item"><div class="title"><span><strong style="color:red;">*</strong>联系手机号：</span><div class="placeholder"></div></div><div class="input"><input name="lxtel" id="lxtel"  value="" onkeyup="value=value.replace(/[^1234567890]+/g,'')" placeholder="请填正确联系手机号" type="text" style="width: 90%;height: 30px;"/></div><div class="tip"></div></li><!----1单文本框--2单选框--3复选框--4下拉框--5多文本框----><li class="item"><div class="title"><span>选择分类：</span><div class="placeholder"></div></div><div class="input"><div class="select"><label class="psu">请选择</label><select class="decorate" name="subdir"><option value="">请选择</option><option value="19"> 厨师</option><option value="20"> 服务员</option><option value="21"> 送餐员</option><option value="22"> 面点师</option><option value="23"> 大堂经理</option><option value="24">咖啡师</option><option value="25">杂工 </option></select></div><span></span><div class="select" style="display: none;" type="subcate"><label class="psu">请选择</label></div></div><div class="tip"></div></li><li class="item"><div class="title"><span><strong style="color:red;">*</strong>薪资：</span><div class="placeholder"></div></div><div class="input"><input name="input[1][vv]"  value="" type="text" class="inputtext02"/><input name="input[1][tn]"  value="薪资"  type="hidden" /><input name="input[1][unit]"  value=""  type="hidden" /><input name="input[1][inarr]"  value="0"  type="hidden" /><input name="input[1][input]"  value="1"  type="hidden" /><input name="input[1][iswrite]"  value="1"  type="hidden" /><input name="input[1][isfilter]"  value="1"  type="hidden" /><input name="input[1][type]"  value="1"  type="hidden" /></div><div class="tip"></div></li><li class="item"><div class="title"><span><strong style="color:red;">*</strong>职位：</span><div class="placeholder"></div></div><div class="input"><input name="input[2][vv]"  value="" type="text" class="inputtext02"/><input name="input[2][tn]"  value="职位"  type="hidden" /><input name="input[2][unit]"  value=""  type="hidden" /><input name="input[2][inarr]"  value="0"  type="hidden" /><input name="input[2][input]"  value=""  type="hidden" /><input name="input[2][iswrite]"  value="1"  type="hidden" /><input name="input[2][isfilter]"  value="0"  type="hidden" /><input name="input[2][type]"  value="1"  type="hidden" /></div><div class="tip"></div></li><li class="item"><div class="title"><span><strong style="color:red;">*</strong>公司名称：</span><div class="placeholder"></div></div><div class="input"><input name="input[3][vv]"  value="" type="text" class="inputtext02"/><input name="input[3][tn]"  value="公司名称"  type="hidden" /><input name="input[3][unit]"  value=""  type="hidden" /><input name="input[3][inarr]"  value="0"  type="hidden" /><input name="input[3][input]"  value=""  type="hidden" /><input name="input[3][iswrite]"  value="1"  type="hidden" /><input name="input[3][isfilter]"  value="0"  type="hidden" /><input name="input[3][type]"  value="1"  type="hidden" /></div><div class="tip"></div></li><li class="item"><div class="title"><span><strong style="color:red;">*</strong>工作地址：</span><div class="placeholder"></div></div><div class="input"><input name="input[4][vv]"  value="" type="text" class="inputtext02"/><input name="input[4][tn]"  value="工作地址"  type="hidden" /><input name="input[4][unit]"  value=""  type="hidden" /><input name="input[4][inarr]"  value="0"  type="hidden" /><input name="input[4][input]"  value=""  type="hidden" /><input name="input[4][iswrite]"  value="1"  type="hidden" /><input name="input[4][isfilter]"  value="0"  type="hidden" /><input name="input[4][type]"  value="1"  type="hidden" /></div><div class="tip"></div></li><li class="item"><div class="title"><span>职位要求：</span><div class="placeholder"></div></div><div class="input"><textarea id="Content" name="input[5][vv]" class="myborder"  style="width: 90%;"></textarea><input name="input[5][tn]"  value="职位要求"  type="hidden" /><input name="input[5][input]"  value=""  type="hidden" /><input name="input[5][iswrite]"  value="0"  type="hidden" /><input name="input[5][isfilter]"  value="0"  type="hidden" /><input name="input[5][type]"  value="5"  type="hidden" /></div><div class="tip"></div></li><li class="item"><div class="title"><span>公司福利：</span><div class="placeholder"></div></div><div class="input danfux"><label><input name="input[6][vv][]" type="checkbox"  value="五险一金"/>五险一金</label><label><input name="input[6][vv][]" type="checkbox"  value="周末双休"/>周末双休</label><label><input name="input[6][vv][]" type="checkbox"  value="交通补助"/>交通补助</label><label><input name="input[6][vv][]" type="checkbox"  value="带薪年假"/>带薪年假</label><label><input name="input[6][vv][]" type="checkbox"  value="餐补"/>餐补</label><label><input name="input[6][vv][]" type="checkbox"  value="话补"/>话补</label><label><input name="input[6][vv][]" type="checkbox"  value="生日蛋糕"/>生日蛋糕</label><label><input name="input[6][vv][]" type="checkbox"  value="公司旅游"/>公司旅游</label><input name="input[6][tn]"  value="公司福利"  type="hidden" /><input name="input[6][input]"  value="2"  type="hidden" /><input name="input[6][iswrite]"  value="0"  type="hidden" /><input name="input[6][isfilter]"  value="1"  type="hidden" /><input name="input[6][type]"  value="3"  type="hidden" /></div><div class="tip"></div></li><li class="item"><div class="title"><span>公司规模：</span><div class="placeholder"></div></div><div class="input"><div class="select"><label class="psu">请选择</label><select class="decorate" name="input[7][vv]"><option value="">请选择</option><option value="50人一下">50人一下</option><option value="50-100人">50-100人</option><option value="100-150人">100-150人</option><option value="150-200人">150-200人</option><option value="200-300人">200-300人</option><option value="300-500人">300-500人</option><option value="500人以上">500人以上</option></select><input name="input[7][tn]"  value="公司规模"  type="hidden" /><input name="input[7][input]"  value="3"  type="hidden" /><input name="input[7][iswrite]"  value="0"  type="hidden" /><input name="input[7][isfilter]"  value="1"  type="hidden" /><input name="input[7][type]"  value="4"  type="hidden" /></div><span></span><div class="select" style="display: none;" type="subcate"><label class="psu">请选择</label></div></div><div class="tip"></div></li><li class="item"><div class="title"><span>公司性质：</span><div class="placeholder"></div></div><div class="input"><div class="select"><label class="psu">请选择</label><select class="decorate" name="input[8][vv]"><option value="">请选择</option><option value="国有企业">国有企业</option><option value="机关单位 ">机关单位 </option><option value="集体企业 ">集体企业 </option><option value="联营企业 ">联营企业 </option><option value="股份合作制企业">股份合作制企业</option><option value="私营企业 ">私营企业 </option><option value="个体户 ">个体户 </option><option value="合伙企业 ">合伙企业 </option><option value="有限责任公司 ">有限责任公司 </option><option value="股份有限公司 ">股份有限公司 </option><option value="有限责任公司">有限责任公司</option></select><input name="input[8][tn]"  value="公司性质"  type="hidden" /><input name="input[8][input]"  value="4"  type="hidden" /><input name="input[8][iswrite]"  value="0"  type="hidden" /><input name="input[8][isfilter]"  value="1"  type="hidden" /><input name="input[8][type]"  value="4"  type="hidden" /></div><span></span><div class="select" style="display: none;" type="subcate"><label class="psu">请选择</label></div></div><div class="tip"></div></li><li class="item"><div class="title"><span>区域：</span><div class="placeholder"></div></div><div class="input"><div class="select"><label class="psu">请选择</label><select class="decorate" name="input[9][vv]"><option value="">请选择</option><option value="蜀山区">蜀山区</option><option value="经开区">经开区</option><option value="中原区">中原区</option><option value="二七区">二七区</option><option value="管城回族区">管城回族区</option><option value="新郑市">新郑市</option><option value="上街区">上街区</option><option value="惠济区">惠济区</option><option value="登封市">登封市</option><option value="荥阳市">荥阳市</option><option value="新密市">新密市</option><option value="巩义市">巩义市</option><option value="中牟县">中牟县</option><option value="高新区">高新区</option></select><input name="input[9][tn]"  value="区域"  type="hidden" /><input name="input[9][input]"  value="0"  type="hidden" /><input name="input[9][iswrite]"  value="0"  type="hidden" /><input name="input[9][isfilter]"  value="0"  type="hidden" /><input name="input[9][type]"  value="4"  type="hidden" /></div><span></span><div class="select" style="display: none;" type="subcate"><label class="psu">请选择</label></div></div><div class="tip"></div></li><li class="item"><div class="title"><span>说明描述：</span><div class="placeholder"></div></div><div class="input"><textarea id="Content" name="description" class="myborder"  placeholder="写上一些想要说明的内容" style="width: 90%;"></textarea></div><div class="tip"></div></li></ul><div class="post"><input type="hidden" id="Pic" name="" /><input type="hidden" name="cid" value="7" /><input type="hidden" name="fcid" value="1" /><input id="btnPost" type="submit" value="发 布" onclick="return submit_FBI()"/></div></form><script src="http://www.pigapp.net/tpl/Wap/static/classify/exif.js"></script><script src="http://www.pigapp.net/tpl/Wap/static/classify/imgUpload.js"></script><!--<div id="pubOK"><div><div class="message">
     发布成功，您可以在“个人中心-我的发布”中查看和操作该信息。
    </div><div class="btn"><input type="button" value="我的发布" onclick="" /><input type="button" value="关闭" onclick="" /></div></div></div><div id="pubFail"><div><div class="message">
     信息发布失败。
    </div><div class="btn"><input type="button" value="关闭" /></div></div></div>---><link rel="stylesheet" href="http://www.pigapp.net/tpl/Wap/static/classify/showcase.css" /><style type="text/css"> .nav-item{border: 0;}
</style><!--<div class="nav-item"><a class="mainmenu js-mainmenu" href=""><span class="mainmenu-txt"></span></a></div>--><div class="footermenu"><ul><li><a href="http://xxx.ahxdnet.com"><img src="http://www.pigapp.net/upload/slider/2015/09/55f8d064a38e1.png"><p>天天</p></a></li></ul></div><div style="display:none;"></div><script type="text/javascript">
   function submit_FBI(){
	 var telnum=$.trim($('#lxtel').val());
	 if(!/^0[0-9\-]{10,13}$/.test(telnum) && !/^((\+86)|(86))?(1)\d{10}$/.test(telnum)){
		   alert('联系手机号格式不对');
	       return false;
		}else{
			return true;
		}
		//document.ostForm.submit();	
	}


        $("select").bind("change",
        function() {
            selectChange($(this))
        })
    
    function selectChange(obj, objtext) {
        var value = obj.val();
		var htmlobj=obj.get(0);		
        var text = $(htmlobj.options[htmlobj.selectedIndex]).text();
        var msg = obj.attr("msg");
        var pattern2 = obj.attr("pattern2");
        obj.parent().children("label").text(text);
            var subcate = obj.parent().parent().children("[type=subcate]");
            var selects = subcate.find("select");
            if (selects) {
                selects.remove()
            }
            if (subcate.length > 0) {
                subcate.children("label").text("请选择").parent().css("display", "none")
            }
       
    }
$(function() {
    if ($(".upload_list").length) {
        var imgUpload = new ImgUpload({
            fileInput: "#fileImage",
            container: "#upload_list",
            countNum: "#uploadNum",
			url:"http://" + location.hostname + "/wap.php?g=Wap&c=Classify&a=ajaxImgUpload"
        })
    }
});
 </script></body></html><div id="think_page_trace" style="position: fixed;bottom:0;right:0;font-size:14px;width:100%;z-index: 999999;color: #000;text-align:left;font-family:'微软雅黑';">
<div id="think_page_trace_tab" style="display: none;background:white;margin:0;height: 250px;">
<div id="think_page_trace_tab_tit" style="height:30px;padding: 6px 12px 0;border-bottom:1px solid #ececec;border-top:1px solid #ececec;font-size:16px">
	    <span style="color:#000;padding-right:12px;height:30px;line-height: 30px;display:inline-block;margin-right:3px;cursor: pointer;font-weight:700">基本</span>
        <span style="color:#000;padding-right:12px;height:30px;line-height: 30px;display:inline-block;margin-right:3px;cursor: pointer;font-weight:700">文件</span>
        <span style="color:#000;padding-right:12px;height:30px;line-height: 30px;display:inline-block;margin-right:3px;cursor: pointer;font-weight:700">流程</span>
        <span style="color:#000;padding-right:12px;height:30px;line-height: 30px;display:inline-block;margin-right:3px;cursor: pointer;font-weight:700">错误</span>
        <span style="color:#000;padding-right:12px;height:30px;line-height: 30px;display:inline-block;margin-right:3px;cursor: pointer;font-weight:700">SQL</span>
        <span style="color:#000;padding-right:12px;height:30px;line-height: 30px;display:inline-block;margin-right:3px;cursor: pointer;font-weight:700">调试</span>
    </div>
<div id="think_page_trace_tab_cont" style="overflow:auto;height:212px;padding: 0; line-height: 24px">
		    <div style="display:none;">
    <ol style="padding: 0; margin:0">
	<li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">请求信息 : 2015-11-01 09:30:31 HTTP/1.1 GET : /wap.php?g=Wap&amp;c=Classify&amp;a=fabu&amp;cid=7&amp;fcid=1&amp;pfcid=0</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">运行时间 : 0.1836s ( Load:0.0000s Init:0.0010s Exec:0.1807s Template:0.0020s )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">吞吐率 : 5.45req/s</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">内存开销 : 1,448.13 kb</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">查询信息 : 11 queries 0 writes </li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">文件加载 : 26</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">缓存信息 : 0 gets 0 writes </li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">配置加载 : 140</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">会话信息 : SESSION_ID=cm5c9t5d414bduie7n65k4r251</li>    </ol>
    </div>
        <div style="display:none;">
    <ol style="padding: 0; margin:0">
	<li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">D:\WWW\pig\wap.php ( 1.01 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">D:\WWW\pig\runtime\~Wap_runtime.php ( 82.79 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">D:\WWW\pig\conf\db.php ( 0.20 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">D:\WWW\pig\conf\Wap\config.php ( 0.18 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">D:\WWW\pig\cms\Lib\Action\Wap\ClassifyAction.class.php ( 34.18 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">D:\WWW\pig\cms\Lib\Action\Wap\BaseAction.class.php ( 16.07 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">D:\WWW\pig\cms\Lib\Action\CommonAction.class.php ( 3.02 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">D:\WWW\pig\cms\Lib\Model\ConfigModel.class.php ( 2.38 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">D:\WWW\pig\core\Lib\Core\Model.class.php ( 54.21 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">D:\WWW\pig\core\Lib\Core\Db.class.php ( 33.49 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">D:\WWW\pig\core\Lib\Driver\Db\DbMysql.class.php ( 10.88 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">D:\WWW\pig\runtime\Data\_fields\app1.config.php ( 0.45 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">D:\WWW\pig\runtime\Data\_fields\app1.user_level.php ( 0.41 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">D:\WWW\pig\cms\Lib\Model\SliderModel.class.php ( 2.70 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">D:\WWW\pig\runtime\Data\_fields\app1.slider.php ( 0.40 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">D:\WWW\pig\runtime\Data\_fields\app1.slider_category.php ( 0.20 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">D:\WWW\pig\runtime\Data\_fields\app1.merchant_info.php ( 1.75 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">D:\WWW\pig\cms\Lib\Model\MerchantModel.class.php ( 3.20 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">D:\WWW\pig\runtime\Data\_fields\app1.merchant.php ( 1.56 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">D:\WWW\pig\cms\Lib\ORG\WechatShare.class.php ( 8.67 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">D:\WWW\pig\cms\Lib\Model\Access_token_expiresModel.class.php ( 2.02 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">D:\WWW\pig\runtime\Data\_fields\app1.access_token_expires.php ( 0.23 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">D:\WWW\pig\runtime\Data\_fields\app1.classify_category.php ( 0.84 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">D:\WWW\pig\cms\Lib\Model\AreaModel.class.php ( 4.30 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">D:\WWW\pig\runtime\Data\_fields\app1.area.php ( 0.50 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">D:\WWW\pig\runtime\Cache\Wap\1494ec3580255d800d2e6ff1e23e3fc4.php ( 13.08 KB )</li>    </ol>
    </div>
        <div style="display:none;">
    <ol style="padding: 0; margin:0">
	    </ol>
    </div>
        <div style="display:none;">
    <ol style="padding: 0; margin:0">
	<li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">[8] Undefined index: openid D:\WWW\pig\cms\Lib\Action\Wap\BaseAction.class.php 第 83 行.</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">[8] Use of undefined constant CURL_SSLVERSION_TLSv1 - assumed 'CURL_SSLVERSION_TLSv1' D:\WWW\pig\cms\Lib\Model\Access_token_expiresModel.class.php 第 39 行.</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">[2] curl_setopt(): You must pass either an object or an array with the CURLOPT_HTTPHEADER, CURLOPT_QUOTE, CURLOPT_HTTP200ALIASES and CURLOPT_POSTQUOTE arguments D:\WWW\pig\cms\Lib\Model\Access_token_expiresModel.class.php 第 40 行.</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">[8] Use of undefined constant CURL_SSLVERSION_TLSv1 - assumed 'CURL_SSLVERSION_TLSv1' D:\WWW\pig\cms\Lib\Model\Access_token_expiresModel.class.php 第 39 行.</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">[2] curl_setopt(): You must pass either an object or an array with the CURLOPT_HTTPHEADER, CURLOPT_QUOTE, CURLOPT_HTTP200ALIASES and CURLOPT_POSTQUOTE arguments D:\WWW\pig\cms\Lib\Model\Access_token_expiresModel.class.php 第 40 行.</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">[4096] Object of class WechatShare could not be converted to string D:\WWW\pig\cms\Lib\ORG\WechatShare.class.php 第 73 行.</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">[8] Object of class WechatShare to string conversion D:\WWW\pig\cms\Lib\ORG\WechatShare.class.php 第 73 行.</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">[8] Undefined variable: Object D:\WWW\pig\cms\Lib\ORG\WechatShare.class.php 第 73 行.</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">[8] Trying to get property of non-object D:\WWW\pig\cms\Lib\ORG\WechatShare.class.php 第 73 行.</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">[8] Undefined index: input D:\WWW\pig\runtime\Cache\Wap\1494ec3580255d800d2e6ff1e23e3fc4.php 第 5 行.</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">[8] Undefined index: input D:\WWW\pig\runtime\Cache\Wap\1494ec3580255d800d2e6ff1e23e3fc4.php 第 5 行.</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">[8] Undefined index: input D:\WWW\pig\runtime\Cache\Wap\1494ec3580255d800d2e6ff1e23e3fc4.php 第 5 行.</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">[8] Undefined index: input D:\WWW\pig\runtime\Cache\Wap\1494ec3580255d800d2e6ff1e23e3fc4.php 第 5 行.</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">[8] Undefined variable: svv D:\WWW\pig\runtime\Cache\Wap\1494ec3580255d800d2e6ff1e23e3fc4.php 第 10 行.</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">[8] Undefined variable: svv D:\WWW\pig\runtime\Cache\Wap\1494ec3580255d800d2e6ff1e23e3fc4.php 第 10 行.</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">[8] Undefined index: _startUseMems D:\WWW\pig\runtime\~Wap_runtime.php 第 1 行.</li>    </ol>
    </div>
        <div style="display:none;">
    <ol style="padding: 0; margin:0">
	    </ol>
    </div>
        <div style="display:none;">
    <ol style="padding: 0; margin:0">
	    </ol>
    </div>
    </div>
</div>
<div id="think_page_trace_close" style="display:none;text-align:right;height:15px;position:absolute;top:10px;right:12px;cursor: pointer;"></div>
</div>
<div id="think_page_trace_open" style="height:30px;float:right;text-align: right;overflow:hidden;position:fixed;bottom:0;right:0;color:#000;line-height:30px;cursor:pointer;"><div style="background:#232323;color:#FFF;padding:0 6px;float:right;line-height:30px;font-size:14px">0.1836s </div></div>
<script type="text/javascript">
(function(){
var tab_tit  = document.getElementById('think_page_trace_tab_tit').getElementsByTagName('span');
var tab_cont = document.getElementById('think_page_trace_tab_cont').getElementsByTagName('div');
var open     = document.getElementById('think_page_trace_open');
var close    = document.getElementById('think_page_trace_close').childNodes[0];
var trace    = document.getElementById('think_page_trace_tab');
var cookie   = document.cookie.match(/thinkphp_show_page_trace=(\d\|\d)/);
var history  = (cookie && typeof cookie[1] != 'undefined' && cookie[1].split('|')) || [0,0];
open.onclick = function(){
	trace.style.display = 'block';
	this.style.display = 'none';
	close.parentNode.style.display = 'block';
	history[0] = 1;
	document.cookie = 'thinkphp_show_page_trace='+history.join('|')
}
close.onclick = function(){
	trace.style.display = 'none';
this.parentNode.style.display = 'none';
	open.style.display = 'block';
	history[0] = 0;
	document.cookie = 'thinkphp_show_page_trace='+history.join('|')
}
for(var i = 0; i < tab_tit.length; i++){
	tab_tit[i].onclick = (function(i){
		return function(){
			for(var j = 0; j < tab_cont.length; j++){
				tab_cont[j].style.display = 'none';
				tab_tit[j].style.color = '#999';
			}
			tab_cont[i].style.display = 'block';
			tab_tit[i].style.color = '#000';
			history[1] = i;
			document.cookie = 'thinkphp_show_page_trace='+history.join('|')
		}
	})(i)
}
parseInt(history[0]) && open.click();
tab_tit[history[1]].click();
})();
</script>