<?php defined('InShopNC') or exit('Access Invalid!');?>

<!-- <html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black">
<meta name="format-detection" content="telephone=no">
<meta charset="utf-8">
	<style type="text/css">
		.gtopid{width: 300px; height: 200px; background: blue;}
	</style>
</head>
<body>
	<div class="gtopid">х╥хо</div> 

</body>
</html> -->

<script type="text/javascript" src="./js/jquery.min.js"></script>
<script type="text/javascript" src="js/config.js"></script>
<script type="text/javascript" src="js/zepto.min.js"></script>
<script type="text/javascript" src="js/template.js"></script>
<script type="text/javascript" src="js/common.js"></script>
<script type="text/javascript">

	 //$(".gtopid").click(function(){
    var username = "<?php echo $_SESSION['username'];?>";
    var memberid = "<?php echo $_SESSION['member_id'];?>";
    var key = "<?php echo $_SESSION['key'];?>";
    var openid = "<?php echo $_SESSION['openid'];?>";
    if(key){
      addcookie('username',username,180);
      addcookie('memberid',memberid,180);
      addcookie('key',key,180);
      window.location.href = WapSiteUrl+"/index.html";
    }else{
      addcookie('openid',openid,180);
      window.location.href = WapSiteUrl+"/index.html";
    }
	 	
</script>
