$(function(){

	          $.ajax({
				type:'post',
				url:ApiUrl+"/index.php?act=connectwx",	
				//data:{username:username,password:pwd,client:client},
				dataType:'json',
				success:function(result){
					if(!result.datas.error){
						if(typeof(result.datas.key)=='undefined'){
							return false;
						}else{
							addCookie('username',result.datas.username);
							addCookie('key',result.datas.key);
							var goods_id = getCookie('goods_id');
							if(goods_id >0){
								location.href = WapSiteUrl+'/tmpl/product_detail.html?goods_id='+goods_id;
							}else{
								location.href = WapSiteUrl+'/tmpl/member/member.html?act=member';
							}
						}
						//$(".error-tips").hide();
					}else{
					 location.href = WapSiteUrl+'/index.html';
						//$(".error-tips").html(result.datas.error).show();
					}
				}
			});
});