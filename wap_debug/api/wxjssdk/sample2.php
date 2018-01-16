<?php
require_once "jssdk.php";
$jssdk = new JSSDK("wxa8277650681f814f", "b82cc730807ddf345b4313a66f2f040d");
$signPackage = $jssdk->GetSignPackage();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title></title>
</head>
<style>

    .text-center {text-align: center;}

    .btn-hight {height:100px;width:230px;}

    #img img{width:200px;}

</style>
<body>
  

<div class="col-lg-12 col-sm-12" style="margin: 12px auto 10px;">

    <div class="form-group text-center">

        <div id="picSelect" style="height:100px;border:1px solid red">选择图片</div>

    </div>

    <!-- <div class="form-group text-center">      //onclick="javascript:up_onepic();"

        <div id="img"></div>

    </div>

    <div class="form-group text-center">

        <button id="uploadImage" type="button" class="btn btn-primary btn-hight"><h2>上传图片</h2></button>

    </div>

    <div class="form-group text-center">

        <button id="downloadImage" type="button" class="btn btn-primary btn-hight"><h2>下载图片</h2></button>

    </div>

    <div class="form-group text-center">

        <div id="img2"></div>

    </div>

    <div class="form-group text-center">

        <button id="previewImage" type="button" class="btn btn-primary btn-hight"><h2>预览图片</h2></button>

    </div> -->
</div>
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0-alpha1/jquery.min.js"></script>
<script src="./jquery.min.js"></script>
<script src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
<script>
    wx.config({

        debug: true,

        appId: '<?php echo $signPackage["appId"]; ?>',

        timestamp: <?php echo  $signPackage["timestamp"]; ?>,

        nonceStr: '<?php echo  $signPackage["nonceStr"]; ?>',

        signature: '<?php echo  $signPackage["signature"]; ?>',

        jsApiList: ['checkJsApi','chooseImage','uploadImage', 'downloadImage', 'previewImage']

    });
    wx.ready(function () {
        $('#picSelect').click(function(){
          alert(6666);
          wx.checkJsApi({
            jsApiList: ['chooseImage'], // 选取图片
            success: function(res) {
                wx.chooseImage({
                    count: 1, // 默认9
                    sizeType: ['original', 'compressed'], // 可以指定是原图还是压缩图，默认二者都有
                    sourceType: ['album', 'camera'], // 可以指定来源是相册还是相机，默认二者都有
                    success: function (res) {
                        //alert(JSON.stringify(res));
                        var localIds = res.localIds; // 返回选定照片的本地ID列表，localId可以作为img标签的src属性显示图片
                              wx.uploadImage({
                                    localId: localIds.toString() , // 需要上传的图片的本地ID，由chooseImage接口获得
                                    isShowProgressTips: 1, // 默认为1，显示进度提示
                                    success: function (res) {
                                        alert(JSON.stringify(res));
                                       //wxImgCallback(res.serverId); // 返回图片的服务器端ID                                  

                                    }
                                });     
                    }
                });
            }
   });
   
        })
      
        

function wxImgCallback(serverId) {

    //将serverId传给wx_upload.php的upload方法
     var url ="<?php echo '000';?>";
     $.post(url, {serverId:serverId},function(data){
         if (data.code == 0) {
            alert(data.msg);
         } else {
            $('.pic').attr('src','/'+data.pic);
            alert(data.msg);
        
         }
     }); }
    });

</script>
</html>
