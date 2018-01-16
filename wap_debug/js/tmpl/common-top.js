//头部信息
$(function (){
	//修改网站标题
	var specialId = GetQueryString("special_id");
	//alert(specialId);
	if(specialId>'0'){
		if(specialId=='1'){
			document.title = "安利产品";         
		}else if(specialId=='2'){
			document.title = "快餐外卖";
		}else if(specialId=='3'){
			document.title = "二手交易";
		}else if(specialId=='4'){
			document.title = "房屋租售";
		}else if(specialId=='5'){
			document.title = "微直销";
		}else if(specialId=='6'){
			document.title = "崇明新闻";
		}else if(specialId=='7'){
			document.title = "招聘求职";
		}else if(specialId=='8'){
			document.title = "生活小工具";
		}else if(specialId=='28'){
			document.title = "微直销";
		}else if(specialId=='29'){
			document.title = "商家";
		}else{
			document.title = "崇明";
		}
	}
	var headTitle = document.title;
	var tmpl = '<div class="header-wrap">'
	        		+'<a href="javascript:history.back();" class="header-back"><span>返回</span></a>'
						+'<h2>'+headTitle+'</h2>'
						+'<a href="'+WapSiteUrl+'/tmpl/product_first_categroy.html" id="btn-opera" class="i-main-opera">'
					 	+'<span></span>'
						
				 	+'</a>'
    			+'</div>'
		    	
    //渲染页面
	var html = template.compile(tmpl);
	$("#header").html(html);
	$("#btn-opera").click(function (){
		$(".main-opera-pannel").toggle();
	});
	//当前页面
	if(headTitle == "商品分类"){
		$(".i-categroy").parent().addClass("current");
	}else if(headTitle == "购物车列表"){
		$(".i-cart").parent().addClass("current");
	}else if(headTitle == "我的商城"){
		$(".i-mine").parent().addClass("current");
	}
});