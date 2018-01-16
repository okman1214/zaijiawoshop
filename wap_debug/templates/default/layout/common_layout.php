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
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black">
<meta name="format-detection" content="telephone=no">
<title><?php echo $output["title"]; ?></title>
<meta name="keywords" content="<?php echo $output['seo_keywords']; ?>" />
<meta name="description" content="<?php echo $output['seo_description']; ?>" />
<?php echo html_entity_decode($output['setting_config']['qq_appcode'],ENT_QUOTES); ?><?php echo html_entity_decode($output['setting_config']['sina_appcode'],ENT_QUOTES); ?><?php echo html_entity_decode($output['setting_config']['share_qqzone_appcode'],ENT_QUOTES); ?><?php echo html_entity_decode($output['setting_config']['share_sinaweibo_appcode'],ENT_QUOTES); ?>
<style type="text/css">
body {
_behavior: url(<?php echo SHOP_TEMPLATES_URL;
?>/css/csshover.htc);}
.qc_tubiao{width: 100%;position: relative;}
    .qc_tubiao .qc_tubiao_img{width: 23%;margin:1% auto;float: left;}
    .qc_tubiao .qc_tubiao_img img{width: 100%;}
</style>
<link rel="shortcut icon" href="<?php echo BASE_SITE_URL;?>/favicon.ico" />

<link rel="stylesheet" type="text/css" href="<?php echo WAP_SITE_URL;?>/css/index/reset.css">
<link rel="stylesheet" type="text/css" href="<?php echo WAP_SITE_URL;?>/css/index/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo WAP_SITE_URL;?>/css/index/main.css">
<link rel="stylesheet" type="text/css" href="<?php echo WAP_SITE_URL;?>/css/index/child.css">
<link rel="stylesheet" type="text/css" href="<?php echo WAP_SITE_URL;?>/css/index/index.css">
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
<script type="text/javascript" src="<?php echo WAP_SITE_URL?>/js/common.js"></script>


 </head>
 <!--
 <style type='text/css'>
	.header-back span,.i-main-opera span{
		background-image:url("<?php echo WAP_SITE_URL?>/images/icon.png")
	}
</style>
-->
<!-- PublicHeadLayout Begin -->
<!-- 顶部广告展开效果-->
<!-- 顶部广告展开效果-->
<header class='main'>
<div class="header-wrap">
	<a class='header-back' href='javascript:history.back();'>
	<span>返回</span>
	</a>
	<h2><?php echo $output["title"];  ?></h2>
  <?php if($_GET['act'] == 'bbs'){?>
  <a id="btn-opera" class='i-main-opera' href='<?php echo WAP_SITE_URL?>'><span></span></a>
  <?php }else{?>
	<a id="btn-opera" class='i-main-opera' href='<?php echo WAP_SITE_URL?>/tmpl/product_first_categroy.html'><span></span></a>
  <?php }?>
	<div class='htsearch-wrap with-home-logo'>
	</div>
  </header> 

<?php if(!empty($output['adv_list'])){ ?>
<div id="main-container" class='main'>
  <div class="adv_list">
    <div class="swipe-wrap">
    
     
  <?php  foreach($output['adv_list'] as $key=>$adv_list){ ?>
      <div class="item">
        <a href="<?php echo $adv_list['data']; ?>">
          <img src="<?php echo UPLOAD_SITE_URL.'/mobile/special/'.$adv_list['i'].'/'.$adv_list['image'];?>" alt="">
        </a>
		<?if(!empty($adv_list['title'])){?>
			<?php echo $adv_list['title'];?>
		<?php }?>
      </div>
		
    <?php }　?>
  
    </div>
  </div>  
</div>
<?php }　?>
<?php if(!empty($output['tubiao_list'])){?>
<div id="home3" class="main">
  <div class="index_block home3">
    <div class="content">
    
  <?php foreach($output['tubiao_list'] as $key =>$tubiao_list ){?>
    
      <div class="item">
        <a href="<?php echo $tubiao_list['data'];?>"><img src="<?php echo UPLOAD_SITE_URL.'/mobile/special/'.$tubiao_list['i'].'/'.$tubiao_list['image'];?>" alt=""></a>
      </div>
    
    <?php }?>
  
    </div>
  </div>
</div>
<?php }?>
  </header>
</div>
<script type="text/javascript" src="js/swipe.js"></script>
<script type='text/javascript'>
	$(function(){
		$('.adv_list').each(function() {
                if ($(this).find('.item').length < 2) {
                    return;
                }

                Swipe(this, {
                    startSlide: 2,
                    speed: 400,
                    auto: 3000,
                    continuous: true,
                    disableScroll: false,
                    stopPropagation: false,
                    callback: function(index, elem) {},
                    transitionEnd: function(index, elem) {}
                });
            });
		
	})
</script>
<!-- PublicHeadLayout End -->

<!-- publicNavLayout Begin -->

