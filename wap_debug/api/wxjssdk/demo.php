<?php
//header("Content-Type: text/html;charset=utf-8");
require_once "jssdk.php";
$jssdk = new JSSDK("wxa8277650681f814f", "b82cc730807ddf345b4313a66f2f040d");
$signPackage = $jssdk->GetSignPackage();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="gb2312">
  <title>测试</title>
</head>
<body>
   111111111111111111111111111111111
   <input type="hidden" value="123" id="uid">
   
</body>
<script src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>

<script>
  // 注意：所有的JS接口只能在公众号绑定的域名下调用，公众号开发者需要先登录微信公众平台进入“公众号设置”的“功能设置”里填写“JS接口安全域名”。 
  // 如果发现在 Android 不能分享自定义内容，请到官网下载最新的包覆盖安装，Android 自定义分享接口需升级至 6.0.2.58 版本及以上。
  // 完整 JS-SDK 文档地址：http://mp.weixin.qq.com/wiki/7/aaa137b55fb2e0456bf8dd9148dd613f.html
  wx.config({
	debug: false,    //调试
    appId: '<?php echo $signPackage["appId"];?>',
    timestamp: <?php echo $signPackage["timestamp"];?>,
    nonceStr: '<?php echo $signPackage["nonceStr"];?>',
    signature: '<?php echo $signPackage["signature"];?>',
    jsApiList: [
      // 所有要调用的 API 都要加到这个列表中
	  'onMenuShareTimeline',
        'onMenuShareAppMessage',
        'onMenuShareQQ',
        'onMenuShareWeibo'
    ]
  });
  wx.ready(function () {
	  
	  var id=document.getElementById('uid').value;
	  //alert(id);
    // 在这里调用 API
	
	//分享微信朋友圈接口
    wx.onMenuShareTimeline({
        title: '', // 分享标题
        link: location.href+"?uid="+id, // 分享链接
        imgUrl: '', // 分享图标
        success: function () { 
            // 用户确认分享后执行的回调函数
			alert(111);
        },
        cancel: function () { 
            // 用户取消分享后执行的回调函数
			alert(222);
        }
    });
     
	 //分享给微信个人接口
    wx.onMenuShareAppMessage({
        title: '', // 分享标题
        desc: '', // 分享描述
        link: location.href+"?uid="+id, // 分享链接
        imgUrl: '', // 分享图标
        type: '', // 分享类型,music、video或link，不填默认为link
        dataUrl: '', // 如果type是music或video，则要提供数据链接，默认为空
        success: function () { 
            // 用户确认分享后执行的回调函数
			alert(333);
        },
        cancel: function () { 
            // 用户取消分享后执行的回调函数
			alert(444);
        }
    });
     
	//用微信分享QQ接口
    wx.onMenuShareQQ({
        title: '测试qq分享', // 分享标题
        desc: '微信测试', // 分享描述
        link: location.href+"?uid="+id, // 分享链接
        imgUrl: '', // 分享图标
        success: function () { 
           // 用户确认分享后执行的回调函数
		   alert(555);
        },
        cancel: function () { 
           // 用户取消分享后执行的回调函数
		   alert(666);
        }
    });
 
    wx.onMenuShareWeibo({
        title: '测试微博', // 分享标题
        desc: '微博', // 分享描述
        link: location.href+"?uid="+id, // 分享链接
        imgUrl: '', // 分享图标
        success: function () { 
           // 用户确认分享后执行的回调函数
		   alert(777);
        },
        cancel: function () { 
            // 用户取消分享后执行的回调函数
			alert(888);
        }
    });
 
  });
</script>
</html>