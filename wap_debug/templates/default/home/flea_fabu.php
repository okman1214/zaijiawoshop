<?php defined('InShopNC') or exit('Access Invalid!');?>	
<?php 
	require_once ('D:/www/chongm/wap/api/wxjssdk/jssdk.php'); //表示主机根目录下jssdk文件夹内jssdk.php文件
	$jssdk = new JSSDK("wxa8277650681f814f", "b82cc730807ddf345b4313a66f2f040d");//填写开发者中心你的开发者ID
	$signPackage = $jssdk->GetSignPackage();

?>
	<style type="text/css">
		body{margin:0px;padding: 0px;background: #e3e3e3;}
	.upload-thumb{width:25%;}	
	.upload-thumb img{width: 100%;}	
	input.submit_btn{
	height: 40px;
    line-height: 40px;
    color: #FFF;
    background: #D9434E none repeat scroll 0% 0%;
    display: block;
    text-align: center;
	border:0px;

}
	*{ margin:0; padding:0;}
/*#box{ margin:50px auto; width:540px; min-height:400px; background:#FF9}*/
#demo{/* margin:50px auto; background:#CF9 */width:100%;overflow-x: auto;overflow-y: hidden;}
</style>
<script src="<?php echo WAP_SITE_URL;?>/js/jquery.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo WAP_SITE_URL;?>/css/webuploader.css">
<link rel="stylesheet" type="text/css" href="<?php echo WAP_SITE_URL;?>/css/diyUpload.css">
<script type="text/javascript" src="<?php echo WAP_SITE_URL;?>/js/webuploader.html5only.min.js"></script>
<script type="text/javascript" src="<?php echo WAP_SITE_URL;?>/js/diyUpload.js"></script>
<script type="text/javascript">
	function check(form){
		if (form.class1.value=="0")
		{
			alert("请选择分类！");
			return false;
		}
		
		if (form.goods_name.value.length<4||form.goods_name.value.length>30)
		{
			alert("宝贝名称必须为4-30个字！");
			return false;
		}
		if (form.inform.value=="")
		{
			alert("请输入宝贝信息！");
			return false;
		}
		if (!(/^[0-9]+$/.test(form.goods_store_price.value)))
		{
			alert("请输入金额且只能是数字！");
			return false;
		}
		if (form.province.value=="")
		{
			alert("请选择所在的省份或者城市！");
			return false;
		}
		if (form.area.value=="")
		{
			alert("请输入小区名！");
			return false;
		}
		if (form.flea_pname.value=="")
		{
			alert("请输入联系人姓名！");
			return false;
		}
		if (!(/^[0-9]{11}$/.test(form.flea_pphone.value)))
		{
			alert("请输入11位手机号！");
			return false;
		}
		return true;
	}
</script>


<body>
<div class="main">
<!--<div class="" align="center">宝贝信息发布</div>-->
<div class="pubMust">
	<form method="post" name="fm" action="<?php echo WAP_SITE_URL.'/index.php?act=brand&op=flea_house_contri_add';?>" onsubmit ="getElementById('submitInput').disabled=true;return true;">
	<div class="">
	<ul>
	<li id="gcategory"><label>分类:</label>
	<dfn>
		<div id="gcategory">
		<select name="class1" value="">
            <option value="0">请选择...</option>
            <?php foreach($output['goods_class'] as $val) { ?>
            <option value="<?php echo $val['gc_id']; ?>"><?php echo $val['gc_name']; ?></option>
            <?php } ?>
        </select>
        <input type="hidden" id="cate_id" name="cate_id" value="" class="mls_id text" />
        <input type="hidden" name="cate_name" value="" class="mls_names text"/>
        </div>
	</dfn>
	</li>
	<li><label>宝贝名称:</label><dfn><input type="text" name="goods_name" placeholder="请输入4-30个字"></dfn></li>
	<li><label>宝贝信息：</label>
		<dfn><textarea style="line-height:30px;height:60px;" name="inform" placeholder="请输入宝贝信息"></textarea></dfn>
		<!--<input name="flea_goods_info" type="text" >-->
	</li>
	<li><label>转让/租金:</label>
	<dfn class="pubMust_money"><input style="text-align:right;" type="text" name="goods_store_price" placeholder="请输入金额">
	<select name="money_attr">
		<option value="元">元</option>
		<option value="万元">万元</option>
		<option value="元/月">元/月</option>
		<option value="元/平米">元/平米</option>
	</select></dfn></li>
	<li class="pubMust_img" id="box">	
		<div id="demo">
			<div class="pubMust_img_load" >
			<div id="as" ></div></div>
		</div>
	</li>
	<li>
		<span> </span><span style="color:red;">只能上传5张图片</span>
		<div id="picSelect" >点击选择图片</div>
		<div id="picImg" class="picImg" name="img1">
		<img class="pic" src="">
		
		<ul></ul>
		</div>
	</li>
	<!--<li style="clear:both;border:none"></li>-->
	<li><label>区域:</label>   
	<dfn>
      <div class="select_add" id="region_flea" style="">            
        <select name="province">
          <option value="">请选择...</option>
          <?php if(!empty($output['area_one_level']) && is_array($output['area_one_level'])){ ?>
          <?php foreach($output['area_one_level'] as $k => $v){ ?>
          <option value="<?php echo $v['flea_area_id'];?>"><?php echo $v['flea_area_name'];?></option>
          <?php } ?>
          <?php } ?>
        </select>          
        <input type="hidden" name="area_id" id="area_id" value="<?php echo $output['goods']['flea_area_id']?$output['goods']['flea_area_id']:'';?>" class="area_ids" />
        <input type="hidden" name="area_info" id="area_info" value="<?php echo $output['goods']['flea_area_name'];?>" class="area_names" />
      </div>  
	</dfn>
	</li>

	<li><label>小区:</label><dfn><input type="text" name="area_xiaoqu" placeholder="请输入小区名"></dfn></li>		
	<li><label>联系人:</label><dfn><input type="text" name="flea_pname" placeholder="请输入联系人姓名"></dfn></li>
	<li style="border:none"><label>手机号:</label><dfn><input type="text" name="flea_pphone" placeholder="请输入手机号"></dfn></li>
	</ul>
	</div>
	<input type="hidden" name="flea_token" value="<?php $_SESSION['flea_token']= rand(1000,9999);echo $_SESSION['flea_token'];?>">
	<div class="pubSele"><input type="submit" id="submitInput" value="立即发布"></div>
	</form>
	</div>
</div>
</body>
<script type="text/javascript" src="<?php echo RESOURCE_SITE_URL;?>/js/flea/common_wap_flea_select.js"></script>
<script type="text/javascript" src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>

<script type="text/javascript">
    var key = getcookie('key');
	if(key==''){
    	window.location.href = '<?php echo WAP_SITE_URL;?>/tmpl/member/login.html';
	}
</script>
<script type="text/javascript">
$(document).ready(function(){
	regionInit("region_flea");
	$('input[class="edit_region"]').click(function(){
		$(this).css('display','none');
		$('#area_id').val('');
		$(this).parent().children('select').css('display','');
		$(this).parent().children('span').css('display','none');
	});
});
$(document).ready(function(){
gcategoryInit("gcategory");
	$('#li_1').click(function(){
		$('#li_1').attr('class','active');
		$('#li_2').attr('class','');
		$('#demo').hide();
	});
	$('#goods_demo').click(function(){
		$('#li_1').attr('class','');
		$('#li_2').attr('class','active');
		$('#demo').show();
	});

	$('.des_demo').click(function(){
		if($('#des_demo').css('display') == 'none'){
            $('#des_demo').show();
        }else{
            $('#des_demo').hide();
        }
	});
});
/*
* 服务器地址,成功返回,失败返回参数格式依照jquery.ajax习惯;
* 其他参数同WebUploader
*/
if(!is_weixin() ){
$('#as').diyUpload({
	url:'<?php echo WAP_SITE_URL.'/index.php?act=live&op=live_image_upload';?>',
	success:function( data ) {
		$("input[name="+data.id+"]").val(data.image_name);
		//alert(data.image_url);
		console.info( data );
	},
	error:function( err ) {
		console.info( err );	
	},
	buttonText : '宝贝图片',
	chunked:true,
	// 分片大小
	chunkSize:1024 * 1024*2,
	//最大上传的文件数量, 总文件大小,单个文件大小(单位字节);
	fileNumLimit:5,
	fileSizeLimit:1024 * 1024*10,
	fileSingleSizeLimit:50000 * 1024,
	accept: {}
});
}else{
$('#box').hide();


}

function is_weixin(){
	var ua = navigator.userAgent.toLowerCase();
	if(ua.match(/MicroMessenger/i)=="micromessenger") {
		return true;
 	} else {
		return false;
	}
}
function fBrowserRedirect(){
 var sUserAgent = navigator.userAgent.toLowerCase();
 var isIphone = sUserAgent.match(/iphone/i) == "iphone";
 var isAndroid = sUserAgent.match(/android/i) == "android";
 if(isIphone){ return true }
 if(isAndroid){ return false }
}
</script>
<script>
    wx.config({
        debug: false,
        appId: '<?php echo $signPackage["appId"]; ?>',
        timestamp: <?php echo  $signPackage["timestamp"]; ?>,
        nonceStr: '<?php echo  $signPackage["nonceStr"]; ?>',
        signature: '<?php echo  $signPackage["signature"]; ?>',
        jsApiList: ['checkJsApi','chooseImage','uploadImage', 'downloadImage', 'previewImage']

    });
    wx.ready(function () {
        $('#picSelect').click(function(){
          wx.checkJsApi({
            jsApiList: ['chooseImage'], // 选取图片
            success: function(res) {
                wx.chooseImage({
                    count: 1, // 默认9
                    sizeType: ['original', 'compressed'], // 可以指定是原图还是压缩图，默认二者都有
                    sourceType: ['album', 'camera'], // 可以指定来源是相册还是相机，默认二者都有
                    success: function (res) {
                        var localIds = res.localIds; // 返回选定照片的本地ID列表，localId可以作为img标签的src属性显示图片
                              wx.uploadImage({
                                    localId: localIds.toString() , // 需要上传的图片的本地ID，由chooseImage接口获得
                                    isShowProgressTips: 1, // 默认为1，显示进度提示
                                    success: function (res) {
                                       wxImgCallback(res.serverId); // 返回图片的服务器端ID                                  
                                    }
                                });     
                    }
                });
            }
   });
	  
	  
   
})
	function wxImgCallback(serverId) {
		    //将serverId传给wx_upload.php的upload方法
	     var url ="<?php echo WAP_SITE_URL.'/index.php?act=live&op=wxImgUpload';?>";
	     
	     $.ajax({
			url:url,
            type:"post",
            dataType:"json",
            data:{serverId:serverId},
	     	success:function(data){
				var picName=$('#picImg').attr("name");
				$('#picImg').attr("name",picName+1);
	         if (data.code == 0) {
	         	//alert(22222);
	            //alert(data.msg);
	         } else {
				$("#picImg ul").append('<li><img src=<?php echo UPLOAD_SITE_URL;?>/shop/member/'+data.i+'/'+data.img_name+'><input id="img" type="hidden" name="img[]" value="'+data.img_name+'"></li>');
	        
	         }
	     	}
	     }) 
	}
});

</script>