<?php defined('InShopNC') or exit('Access Invalid!');?>
<?php 
	require_once ('D:/www/chongm/wap/api/wxjssdk/jssdk.php'); //表示主机根目录下jssdk文件夹内jssdk.php文件
	$jssdk = new JSSDK("wxa8277650681f814f", "b82cc730807ddf345b4313a66f2f040d");//填写开发者中心你的开发者ID
	$signPackage = $jssdk->GetSignPackage();

?>
<style>
	body{background-color:#fff}
</style>
<div class="">
    <div class="upload-thumb"> 
		<img id="dialog_item_image" src="<?php echo UPLOAD_SITE_URL.'/shop/avatar/'.$output['member_avatar'];?>" alt="">
    </div>
	<!-- <div class="upload-butt"> 
		
		</div>
		<span>点击更换头像</span>
		<input type="file"   name="news_pic" id="btn_upload_image" />
		<input type="hidden"   name="news_pic" id="post_upload_image"  value="" />
    </div> -->
  	<div id="picSelect" >点击更换头像</div>
		<div id="picImg" class="picImg" name="img1">
		<img class="pic" src="">
		
		<ul></ul>	

</div>
<script type="text/javascript" src="<?php echo WAP_SITE_URL?>/js/jquery.js"></script>
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
	url:"<?php echo WAP_SITE_URL.'/index.php?act=member&op=member_image_upload';?>",
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
	     var url ="<?php echo WAP_SITE_URL.'/index.php?act=member&op=wxImgUpload';?>";
	     
	     $.ajax({
			url:url,
            type:"post",
            dataType:"json",
            data:{serverId:serverId},
	     	success:function(data){
				window.location.href = '<?php echo WAP_SITE_URL;?>/tmpl/member/member.html';
	     	}
	     }) 
	}
});

</script>