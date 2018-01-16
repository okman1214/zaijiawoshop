<?php defined('InShopNC') or exit('Access Invalid!');

$ua = strtolower($_SERVER['HTTP_USER_AGENT']);
$uachar = "/(nokia|sony|ericsson|mot|samsung|sgh|lg|philips|panasonic|alcatel|lenovo|cldc|midp|mobile)/i";
if(($ua == '' || preg_match($uachar, $ua))&& !strpos(strtolower($_SERVER['REQUEST_URI']),'wap'))
{
	global $config;
        if(!empty($config['wap_site_url'])){
            $url = $config['wap_site_url'];
            switch ($_GET['act']){
			case 'goods':
			  $url .= '/tmpl/product_detail.html?goods_id=' . $_GET['goods_id'];
			  break;
			case 'store_list':
			  $url .= '/shop.html';
			  break;
			case 'show_store':
			  $url .= '/tmpl/go_store.html?store_id=' . $_GET['store_id'];
			  break;
			}
        } else {
            $url = $config['site_url'];
        }
        header('Location:' . $url);
        exit();
    if (!empty($Loaction))
    {
       header("Location: $Loaction\n");
        exit;
    }
}
?>
<!doctype html>
<html lang="zh">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<?php echo CHARSET;?>">
<title><?php echo $output['html_title'];?></title>
<meta name="keywords" content="<?php echo $output['seo_keywords']; ?>" />
<meta name="description" content="<?php echo $output['seo_description']; ?>" />
<?php echo html_entity_decode($output['setting_config']['qq_appcode'],ENT_QUOTES); ?><?php echo html_entity_decode($output['setting_config']['sina_appcode'],ENT_QUOTES); ?><?php echo html_entity_decode($output['setting_config']['share_qqzone_appcode'],ENT_QUOTES); ?><?php echo html_entity_decode($output['setting_config']['share_sinaweibo_appcode'],ENT_QUOTES); ?>
<style type="text/css">
body {
_behavior: url(<?php echo SHOP_TEMPLATES_URL;
?>/css/csshover.htc);
.qc_tubiao{width: 100%;position: relative;}
		.qc_tubiao .qc_tubiao_img{width: 23%;float: left;margin:1% auto;}
		.qc_tubiao .qc_tubiao_img img{width: 100%;}
}
</style>
<link rel="shortcut icon" href="<?php echo BASE_SITE_URL;?>/favicon.ico" />
<link href="<?php echo SHOP_TEMPLATES_URL;?>/css/base.css" rel="stylesheet" type="text/css">
<link href="<?php echo SHOP_TEMPLATES_URL;?>/css/home_header.css" rel="stylesheet" type="text/css">
<link href="<?php echo SHOP_TEMPLATES_URL;?>/css/home_login.css" rel="stylesheet" type="text/css">
<link href="<?php echo SHOP_RESOURCE_SITE_URL;?>/font/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
<!--[if IE 7]>
  <link rel="stylesheet" href="<?php echo SHOP_RESOURCE_SITE_URL;?>/font/font-awesome/css/font-awesome-ie7.min.css">
<![endif]-->
<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!--[if lt IE 9]>
      <script src="<?php echo RESOURCE_SITE_URL;?>/js/html5shiv.js"></script>
      <script src="<?php echo RESOURCE_SITE_URL;?>/js/respond.min.js"></script>
<![endif]-->
<!--[if IE 6]>
<script src="<?php echo RESOURCE_SITE_URL;?>/js/IE6_PNG.js"></script>
<script>
DD_belatedPNG.fix('.pngFix');
</script>
<script>
// <![CDATA[
if((window.navigator.appName.toUpperCase().indexOf("MICROSOFT")>=0)&&(document.execCommand))
try{
document.execCommand("BackgroundImageCache", false, true);
   }
catch(e){}
// ]]>
</script>
<![endif]-->
<script>
var COOKIE_PRE = '<?php echo COOKIE_PRE;?>';var _CHARSET = '<?php echo strtolower(CHARSET);?>';var SITEURL = '<?php echo SHOP_SITE_URL;?>';var SHOP_SITE_URL = '<?php echo SHOP_SITE_URL;?>';var RESOURCE_SITE_URL = '<?php echo RESOURCE_SITE_URL;?>';var RESOURCE_SITE_URL = '<?php echo RESOURCE_SITE_URL;?>';var SHOP_TEMPLATES_URL = '<?php echo SHOP_TEMPLATES_URL;?>';
</script>
<script src="<?php echo RESOURCE_SITE_URL;?>/js/jquery.js"></script>
<script src="<?php echo RESOURCE_SITE_URL;?>/js/common.js" charset="utf-8"></script>
<script src="<?php echo RESOURCE_SITE_URL;?>/js/jquery-ui/jquery.ui.js"></script>
<script src="<?php echo RESOURCE_SITE_URL;?>/js/jquery.validation.min.js"></script>
<script src="<?php echo RESOURCE_SITE_URL;?>/js/jquery.masonry.js"></script>
<script src="<?php echo RESOURCE_SITE_URL;?>/js/dialog/dialog.js" id="dialog_js" charset="utf-8"></script>

 
<!-- PublicHeadLayout Begin -->
<!-- 顶部广告展开效果-->
<!-- 顶部广告展开效果-->
<style type="text/css">
header .main{width:100%;height:60px;backgroud:red;}
</style>
<header class="main">
<div class="header-wrap">
  <a class="header-back" href="javascript:history.back();"><span>返回</span></a>
  <h2 align="center">临泉</h2>
	<!--商品和店铺-->
      <form class="search-form" method="get" action="<?php echo WAP_SITE_URL.'/index.php?act=live&op=search&special_id=9';?>">
        <input type="hidden" value="live_list" id="search_act" name="act">
         <input placeholder="请输入商品关键字" name="keyword" id="keyword" type="text" class="input-text" value="<?php echo $_GET['keyword'];?>" maxlength="60" x-webkit-speech lang="zh-CN" onwebkitspeechchange="foo()" x-webkit-grammar="builtin:search" />
        <input type="submit" id="button" value="<?php echo '搜索';?>" class="input-submit">
      </form>
	  <!--搜索关键字-->
      
</div>
	</header>
	<?php if(empty($output['search_list'])){ ?>
    <div class="top main">
  <?php if(!empty($output['adv_list'])){ ?>
  <?php foreach($output['adv_list'] as $key=>$adv_list){ ?>
		<div style="width: 2560px;" class="swipe-wrap">
		
			<div data-index="0" style="width: 640px; left: 0px; transition-duration: 400ms; transform: translateX(-640px);" class="item">
				<a href="http://xxx.ahxdnet.com/wap">
					<img src="http://xxx.ahxdnet.com/data/upload/mobile/special/s2/s2_04977108565584296.jpg" alt="">
				</a>
			</div>
			</div>
	
  <div style="width:360px"><img style="width:100%" src="<?php echo UPLOAD_SITE_URL.'/mobile/special/'.$adv_list['i'].'/'.$adv_list['image'];?>"></div>
  <?php }　?>
  <?php }　?>
</div>
<?php }?>
<div class="qc_tubiao">
	<?php if(!empty($output['tubiao_list'])){?>
	<?php foreach($output['tubiao_list'] as $key =>$tubiao_list ){?>
	<div class="qc_tubiao_img">
		<a href="<?PHP echo $tubiao_list['data']  ?>">
			<img src="<?php echo UPLOAD_SITE_URL.'/mobile/special/'.$tubiao_list['i'].'/'.$tubiao_list['image'];?>">
		</a>
	</div>
	<?php }?>
	<?php }?>
</div>
  </header>
</div>
<!-- PublicHeadLayout End -->

<!-- publicNavLayout Begin -->

