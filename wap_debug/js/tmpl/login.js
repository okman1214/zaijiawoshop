$(function(){
	var key = getcookie('key');
		
		if(!key==''){
			location.href = WapSiteUrl+"/tmpl/member/member.html?act=member";
		}
    var memberHtml = '<a class="btn mr5" href="'+WapSiteUrl+'/tmpl/member/member.html?act=member">个人中心</a><a class="btn mr5" href="'+WapSiteUrl+'/tmpl/member/register.html">注册</a>';
    var act = GetQueryString("act");
    if(act && act == "member"){
        memberHtml = '<a class="btn mr5" id="logoutbtn" href="javascript:void(0);">注销账号</a>';
    }
    var tmpl = '<div class="footer">'
        +'<div class="footer-top">'
            +'<div class="footer-tleft">'+ memberHtml +'</div>'
            /*+'<a href="javascript:void(0);"class="gotop">'
                +'<span class="gotop-icon"></span>'
                +'<p>回顶部</p>'
            +'</a>'*/
        +'</div>'
        +'<div class="footer-content">'
            /*+'<p class="link">'
                +'<a href="'+WapSiteUrl+'" class="standard">APP首页</a>'
                +'<a href="http://wpa.qq.com/msgrd?v=3&uin=247379476&site=qq&menu=yes">联系我们</a>'
            +'</p>'<a class="btn mr5" href="'+SiteUrl+'/shop/api.php?act=toqq&mobile=mobile">QQ登陆</a>*/
            /*+'<p class="copyright">'
                +'版权所有 2014-2015 © www.shopjl.com'
            +'</p>'*/
        +'</div>'
    +'</div>';
	var render = template.compile(tmpl);
	var html = render();
	$("#footer").html(html);
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
		alert(555);
		$.ajax({
			type:'get',
			url:ApiUrl+'/index.php?act=logout',
			data:{username:username,memberid:memberid,key:key,client:client,openid:openid},
			success:function(result){
				if(result){
					alert(555);
					delCookie('username');
					delCookie('key');
					location.href = WapSiteUrl+'/tmpl/member/login.html';
				}
			}
		});
	});	
	
	var referurl = document.referrer;//上级网址
	$("input[name=referurl]").val(referurl);
	$.sValid.init({
        rules:{
            username:"required",
            userpwd:"required"
        },
        messages:{
            username:"用户名必须填写！",
            userpwd:"密码必填!"
        },
        callback:function (eId,eMsg,eRules){
            if(eId.length >0){
                var errorHtml = "";
                $.map(eMsg,function (idx,item){
                    errorHtml += "<p>"+idx+"</p>";
                });
                $(".error-tips").html(errorHtml).show();
            }else{
                 $(".error-tips").html("").hide();
            }
        }  
    });
	$('#loginbtn').click(function(){//会员登陆
		var username = $('#username').val();
		var pwd = $('#userpwd').val();
		var openid = getcookie('openid');
		var client = 'wap';
		if($.sValid()){
	          $.ajax({
				type:'post',
				url:ApiUrl+"/index.php?act=login",	
				data:{username:username,password:pwd,openid:openid,client:client},
				dataType:'json',
				success:function(result){
					if(!result.datas.error){
						if(typeof(result.datas.key)=='undefined'){
							return false;
						}else{
							var i = 188;
							addcookie('username',result.datas.username,i);
							addcookie('key',result.datas.key,i);
							if(referurl==""){
								referurl=WapSiteUrl+'/tmpl/member/member.html'
							};
							location.href = referurl;
						}
						$(".error-tips").hide();
					}else{
						$(".error-tips").html(result.datas.error).show();
					}
				}
			 });  
        }
	});
	
});