<?php defined('InShopNC') or exit('Access Invalid!');?>
<form>
原始密码：<input type="password" name="oldpass" value=""><br>
新密码  ：<input type="password" name="newpass" value=""><br>
确认密码: <input type="password" name="querenpass" value=""><br>
<div id="change_pass">提交</div>
<div class="message"></div>
</form>
<script type="text/javascript" src="<?php echo WAP_SITE_URL?>/js/jquery.js"></script>
<script type="text/javascript" src="<?php echo WAP_SITE_URL?>/js/config.js"></script>
<script type="text/javascript">

		$('#change_pass').click(function(){
			var url        = WapSiteUrl+"/index.php?act=member&op=change_pass";
			var oldpass    = $("input[name=oldpass]").val();
			var newpass    = $("input[name=newpass]").val();
			var querenpass = $("input[name=querenpass]").val();
			if(newpass != querenpass){
				alert('新密码和确认密码不相同');
			}
			$.ajax({
				type:'post',
				url:url,
				data:{oldpass:oldpass,newpass:newpass,querenpass:querenpass},
				dataType:'json',
				success:function(result){
					if(result.ok){
						window.location.href = '<?php echo WAP_SITE_URL;?>/tmpl/member/member.html';
					}else if(result.err){
						$('.message').attr('原密码不正确');
					}
				}
			})
		})
</script>