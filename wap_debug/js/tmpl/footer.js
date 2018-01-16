$(function (){
//加载状态
// window.onload=function(){
// 	document.getElementById('main-container','categroy-cnt','product_detail_wp','content1').innerHTML = "<img width = 100% src='./images/jz.gif'/>";
// };

//and


	var key = getcookie('key');
    var memberHtml = '<!--<a class="btn mr5" href="'+WapSiteUrl+'/tmpl/member/member.html?act=member"">登录</a><a class="btn mr5" href="'+SiteUrl+'/shop/api.php?act=toqq&mobile=mobile">QQ登陆</a><a class="btn mr5" href="'+WapSiteUrl+'/tmpl/member/register.html">注册</a>-->';
    var act = GetQueryString("act");
    if((act && act == "member") || key!=''){
        memberHtml = '<a class="btn mr5" href="'+WapSiteUrl+'/tmpl/member/member.html?act=member"">个人中心</a><a class="btn mr5" id="logoutbtn" href="javascript:void(0);">注销</a>';
    }
    var tmpl =  '<div class="footer">'
       /*+'<div class="footer-top">'
            +'<div class="footer-tleft">'+ memberHtml +'</div>'
            +'<a href="javascript:void(0);"class="gotop">'
                +'<p>返回顶部</p><span class="gotop-icon"></span>'
            +'</a>'
        +'</div>'*/
        +'<div class="footer-content">'
           /* +'<p class="link">'
			+'<a href="'+WapSiteUrl+'/tmpl/load.html" class="standard">app下载</a>'
      +'<a href="'+WapSiteUrl+'/shop_class.html" class="standard">所有店铺</a>'
            +'<a href="'+WapSiteUrl+'/index.php?act=invite" class="standard">分享一下</a>'
            +'<a href="'+WapSiteUrl+'/tmpl/article_list.html?ac_id=7">关于我们</a>'
            
            +'</p>'*/
            +'<p class="copyright">'
                +'技术支持 2014-2015 小点网络科技'
            +'</p>'
        +'</div>'
    +'</div>';
	 var tmpl2 = '<div id="bottom">'
		+'<div style=" height:50px;">'
  +'<div id="nav-tab" style="bottom:-40px;">'
            +'<div id="nav-tab-btn"><i class="fa fa-chevron-down"></i></div>'
            +'<div class="clearfix tab-line nav">'
      +'<div class="tab-line-item" style="width:19%;" ><a href="'+WapSiteUrl+'"><i class="home"><img id="home" src="'+WapSiteUrl+'/images/sy.png" width="25%"></i><br>首页</a></div>'
	  
      +'<div class="tab-line-item tab-categroy" style="width:19%;" ><i class="kefu"><a href="http://wpa.qq.com/msgrd?v=3&uin=1587289528&site=qq&menu=yes"  id="xzkf111"><img src="'+WapSiteUrl+'/images/kf.png" width="25%"></i><br>客服</a></div>'
	   +'<div class="tab-line-item tab-categroy" style="width:19%;" ><a href="'+WapSiteUrl+'/index.php?act=bbs&op=index"><i class="list"><img src="'+WapSiteUrl+'/images/gj.png" width="25%"></i><br>微论坛</a></div>'
      +'<div class="tab-line-item" style="width:19%;position: relative;" ><a href="'+WapSiteUrl+'/tmpl/cart_list.html"><i class="gwc"><img src="'+WapSiteUrl+'/images/gwc.png" width="26%"></i><br>购物车</a></div>'
      +'<div class="tab-line-item" style="width:19%;" ><a href="'+WapSiteUrl+'/tmpl/member/member.html?act=member"><i class="grzx"><img src="'+WapSiteUrl+'/images/ren.png" width="26%"></i><br>个人中心</a></div>'
    +'</div>'
   +'</div>'
+'</div>'
		+'<div style="z-index: 10000; border-radius: 3px; position: fixed; background: none repeat scroll 0% 0% rgb(255, 255, 255); display: none;" id="myAlert" class="modal hide fade">'
  +'<div style="text-align: center;padding: 15px 0 0;" class="title"></div>'
  +'<div style="min-height: 40px;padding: 15px;" class="modal-body"></div>'
  +'<div style="padding:3px;height: 35px;line-height: 35px;" class="alert-footer">'
  +'<a style="padding-top: 4px;border-top: 1px solid #ddd;display: block;float: left;width: 50%;text-align: center;border-right: 1px solid #ddd;margin-right: -1px;" class="confirm" href="javascript:;">Save changes</a><a aria-hidden="true" data-dismiss="modal" class="cancel" style="padding-top: 4px;border-top: 1px solid #ddd;display: block;float: left;width: 50%;text-align: center;" href="javascript:;">关闭</a></div>'
+'</div>'
		+'<div style="display:none;" class="tips"><i class="fa fa-info-circle fa-lg"></i><span style="margin-left:5px" class="tips_text"></span></div>'
		+'<div class="bgbg" id="bgbg" style="display: none;"></div>'
        +'</div>'
	+'</div>';
	var render = template.compile(tmpl);
	var html = render();
	$("#footer").html(html+tmpl2);
    //回到顶部
    $(".gotop").click(function (){
        $(window).scrollTop(0);
    });
    var key = getcookie('key');
	$('#logoutbtn').click(function(){
		var username = getcookie('username');
    var memberid = getcookie('memberid');
    var key = getcookie('key');
    var openid = getcookie('openid');
    var client = 'wap';
		$.ajax({
			type:'post',
			url:ApiUrl+'/index.php?act=logout',
			data:{username:username,memberid:memberid,key:key,client:client,openid:openid},
			success:function(result){
				if(result){
          delCookie('username');
					delCookie('memberid');
					delCookie('key');
					location.href = WapSiteUrl+'/tmpl/member/login.html';
				}
			}
		});
	});
	var headTitle = document.title;
	//当前页面
	if(headTitle == "首页"){
		$(".home").parent().addClass("current");
	}else if(headTitle == "逛街"){
		$(".list").parent().addClass("current");
	}else if(headTitle == "客服"){
    $(".kefu").parent().addClass("current");
  }else if(headTitle == "购物车列表"){
		$(".fa-shopping-cart").parent().addClass("current");
	}else if(headTitle == "我的商城"){
		$(".fa-user").parent().addClass("current");
	}
  $("#home1").attr("src",WapSiteUrl+'/images/sy1.png');
  
  $("#xzkf").click(function (){
	  alert(1111);
	  if (browser.versions.mobile) {//判断是否是移动设备打开。browser代码在下面
        var ua = navigator.userAgent.toLowerCase();//获取判断用的对象
        if (ua.match(/MicroMessenger/i) == "micromessenger") {
                //在微信中打开
				alert(1111);
		  location.href="http://wpa.qq.com/msgrd?v=3&uin=1804533648&site=qq&menu=yes";
        }
        if (ua.match(/WeiBo/i) == "weibo") {
                //在新浪微博客户端打开
        }
        if (ua.match(/QQ/i) == "qq") {
                //在QQ空间打开
        }
        if (browser.versions.ios) {
                //是否在IOS浏览器打开
        } 
        if(browser.versions.android){
                //是否在安卓浏览器打开
        }
	} else {
			//否则就是PC浏览器打开
	}
	  
  });
function is_weixin(){
		var ua = navigator.userAgent.toLowerCase();
		if(ua.match(/MicroMessenger/i)=="micromessenger") {
			return true;
		} else {
			return false;
		}
	}  
});

