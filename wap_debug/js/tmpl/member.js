$(function(){

		var key = getcookie('key');

		if(key==''){
			location.href = 'login.html';
		}
		$.ajax({
			
			type:'post',
			url:ApiUrl+"/index.php?act=member_index",
			data:{key:key},
			dataType:'json',
			//jsonp:'callback',
			success:function(result){

				checklogin(result.login);
				$('#username').html(result.datas.member_info.user_name);
				if(result.datas.member_info.member_exppoints<1000){
					$('#dengji').html('V0');
				}else if(result.datas.member_info.member_exppoints>=1000 && result.datas.member_info.member_exppoints<3000){
					$('#dengji').html('V1');
				}else if(result.datas.member_info.member_exppoints>=3000 && result.datas.member_info.member_exppoints<10000){
					$('#dengji').html('V2');
				}else{
					$('#dengji').html('V3');
				}
				
				$('#point').html(result.datas.member_info.point);
				$('#predepoit').html(result.datas.member_info.predepoit);
					//v3-b11 充值卡
				$('#available_rc_balance').html(result.datas.member_info.available_rc_balance);
				$('#avatar').attr("src",result.datas.member_info.avator);
				return false;
			}
		});
		
});