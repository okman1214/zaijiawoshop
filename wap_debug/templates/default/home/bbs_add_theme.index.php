<?php defined('InShopNC') or exit('Access Invalid!');?>
<?php 
    require_once ('D:/www/chongm/wap/api/wxjssdk/jssdk.php'); //表示主机根目录下jssdk文件夹内jssdk.php文件
    $jssdk = new JSSDK("wxa8277650681f814f", "b82cc730807ddf345b4313a66f2f040d");//填写开发者中心你的开发者ID
    $signPackage = $jssdk->GetSignPackage();
//var_dump($signPackage);
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">

<title></title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black">
<meta name="format-detection" content="telephone=no">
<link rel="stylesheet" type="text/css" href="<?php echo WAP_SITE_URL;?>/css/reset.css">
<link rel="stylesheet" type="text/css" href="<?php echo WAP_SITE_URL;?>/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo WAP_SITE_URL;?>/css/main.css">
<link rel="stylesheet" type="text/css" href="<?php echo WAP_SITE_URL;?>/css/index/child.css">
<link rel="stylesheet" type="text/css" href="<?php echo WAP_SITE_URL;?>/css/index.css">
<script src="<?php echo WAP_SITE_URL;?>/js/jquery.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo WAP_SITE_URL;?>/css/webuploader.css">
<link rel="stylesheet" type="text/css" href="<?php echo WAP_SITE_URL;?>/css/diyUpload.css">
<script type="text/javascript" src="<?php echo WAP_SITE_URL;?>/js/webuploader.html5only.min.js"></script>
<script type="text/javascript" src="<?php echo WAP_SITE_URL;?>/js/diyUpload_topic.js"></script>
<style type="text/css">
	body{background-color:#fff;}
	.parentFileBox{width:auto;}
	.webuploader-container{float:none;}
	.parentFileBox {float:none;}
	.topic_img{margin-left:60px;position: relative;}
	.parentFileBox>.fileBoxUl>li{margin:5px 5px 5px 0;}
</style>
</head>
<body>
<div class="main" >
    <div class="topic">
		<form action="<?php echo WAP_SITE_URL.'/index.php?act=bbs&op=bbs_add_theme'?>" method="post" onsubmit ="getElementById('submitInput').disabled=true;return true;">
			<dl><dt>分类：</dt>
			<dd><select name="category">
            <option>请选择...</option>
            <?php foreach ($output['theme_class_list'] as $key => $value) {?>
			<option value="<?php echo $value['class_id'].','.$value['class_name'];?>"><?php echo $value['class_name'];?></option>
			
            <?php }?>
			</select>
			</dd></dl>
            <dl><dt>标题：</dt><dd><input type="text" name="theme_name" value="" placeholder="请输入标题"/></dd></dl>
            <dl><dt>正文：</dt><dd><textarea name="theme_content" style="line-height:30px;height:60px;" placeholder="请输入宝贝信息"></textarea></dd></dl>
            <dl class="hidd"><dt>图片：</dt>
			<div class="topic_img" >
    		<div class="topic_text" >最多上传6张图</div>
    		<div id="demo">
            <div class="" >
            <div id="as" >
			</div>
			</div>
    		</div>
			</div>
			</dl>
            <div>
				<label id="picSelect">图片&nbsp;&nbsp;<br>&nbsp;&nbsp;添加</label>
                <div id="picImg">
                    <ul class="fileBoxUl">
					
					</ul>
                </div>
			</div>
            <input type="hidden" name="token" value="<?php $_SESSION['token']= rand(1000,9999);echo $_SESSION['token'];?>">
			 <input class="topic_subm" type="submit"  id="submitInput" value="发布话题">
		 </form>
        </div>
</div>
</body>
<script type="text/javascript" src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
<script type="text/javascript">
    var key = getcookie('key');
    if(key==''){
        window.location.href = '<?php echo WAP_SITE_URL;?>/tmpl/member/login.html';
    }
</script>
<script type="text/javascript">
    /*
    * 服务器地址,成功返回,失败返回参数格式依照jquery.ajax习惯;
    * 其他参数同WebUploader
    */
    if(!is_weixin() ){
        $('#as').diyUpload({
            url:'<?php echo WAP_SITE_URL.'/index.php?act=bbs&op=bbs_image_upload';?>',
            success:function( data ) {
                $("input[name="+data.id+"]").val(data.image_name);
                console.info( data );
            },
            error:function( err ) {
                console.info( err );    
            },
            buttonText : '选择图片',
            chunked:true,
            // 分片大小
            chunkSize:1024 * 1024*2,
            //最大上传的文件数量, 总文件大小,单个文件大小(单位字节);
            fileNumLimit:6,
            fileSizeLimit:1024 * 1024*12,
            fileSingleSizeLimit:50000 * 1024,
            accept: {}
        });
    }else{
        $('.hidd').hide();
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
            //alert(555);
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
        var url ="<?php echo WAP_SITE_URL.'/index.php?act=bbs&op=wxImgUpload';?>";         
        $.ajax({
            url:url,
            type:"post",
            dataType:"json",
            data:{serverId:serverId},
            success:function(data){
                var picName=$('#picImg').attr("name");
                $('#picImg').attr("name",picName+1);
             if (data.code == 0) {
        
             } else {
                $("#picImg ul").append('<li><img src=<?php echo UPLOAD_SITE_URL;?>/shop/circle/'+data.i+'/'+data.img_name+'><input id="img" type="hidden" name="img[]" value="'+data.img_name+'"></li>');
            
             }
            }
        }) 
    }
});

</script>