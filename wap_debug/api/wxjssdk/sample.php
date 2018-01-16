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

        <button id="selectImage" type="button" class="btn btn-primary btn-hight"><h2>选择图片</h2></button>

    </div>

    <div class="form-group text-center">

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

    </div>
</div>
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0-alpha1/jquery.min.js"></script>
<script src="./jquery.min.js"></script>
<script src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
<script>
alert(555666);
    wx.config({

        debug: true,

        appId: '<?php $signPackage["appId"]; ?>',

        timestamp: <?php $signPackage["timestamp"]; ?>,

        nonceStr: '<?php $signPackage["nonceStr"]; ?>',

        signature: '<?php $signPackage["signature"]; ?>',

        jsApiList: [

            'checkJsApi',

            'chooseImage',

            'uploadImage',

            'downloadImage',

            'previewImage'

        ]

    });

    wx.ready(function () {

        var images = {

            localId: [],

            serverId: [],

            downloadId: []

        };

        document.querySelector('#selectImage').onclick = function () {

            wx.chooseImage({

                success: function (res) {

                    images.localId = res.localIds;

                    jQuery(function(){

                        $.each( res.localIds, function(i, n){

                            $("#img").append('<img src="'+n+'" /> <br />');

                        });

                    });

                }

            });

        };

 

        document.querySelector('#uploadImage').onclick = function () {

            if (images.localId.length == 0) {

                alert('请先使用选择图片按钮');

                return;

            }

            images.serverId = [];

            jQuery(function(){

                $.each(images.localId, function(i,n) {

                    wx.uploadImage({

                        localId: n,

                        success: function (res) {

                            images.serverId.push(res.serverId);

                        },

                        fail: function (res) {

                            alert(JSON.stringify(res));

                        }

                    });

                });

            });

        };

 

        document.querySelector('#downloadImage').onclick = function () {

            if (images.serverId.length == 0) {

                alert('请先按上传图片按钮');

                return;

            }

            jQuery(function() {

                $.each(images.serverId, function (i, n) {

                    wx.downloadImage({

                        serverId: n,

                        success: function (res) {

                            images.downloadId.push(res.localId);

                        }

                    });

                });

                $.each( images.downloadId, function(i, n){

                    $("#img2").append('<img src="'+n+'" /> <br />');

                });

            });

        };

 

        document.querySelector('#previewImage').onclick = function () {

            var imgList = [

                'http://wp83.net__PUBLIC__/images/gallery/image-1.jpg',

                'http://wp83.net__PUBLIC__/images/gallery/image-2.jpg'

            ];

            wx.previewImage({

                current: imgList[0],

                urls:  imgList

            });

        };

 

    });

 

    wx.error(function(res){

        var str = res.errMsg;

        var reg = /invalid signature$/;

        var r = str.match(reg);

        if(r !== null) {

            jQuery(function(){

                $.getJSON('http://www.demo.com/tp/home/index/ticket', function(data) {

                    if(data) {

                        alert('ticket update');

                        location = location;

                        window.navigate(location);

                    }

                });

            });

        }

    });
</script>
</html>
