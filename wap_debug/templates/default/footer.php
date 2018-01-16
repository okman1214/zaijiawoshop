<?php defined('InShopNC') or exit('Access Invalid!');?>

<style type="text/css">
.gotop-icon{background:url("<?php echo WAP_SITE_URL ?>/images/icon.png") -86px -211px}
#home_body{padding:5px;}
</style>


<div id="bottom" class='main'>
		<div style=" height:50px;">
 <div id="nav-tab" style="bottom:-40px;">
          <div id="nav-tab-btn"><i class="fa fa-chevron-down"></i></div>
           <div class="clearfix tab-line nav">
     <div class="tab-line-item" style="width:19%;" ><a href="<?php echo WAP_SITE_URL ?>"><i class="home"><img id="home" src="<?php echo WAP_SITE_URL ?>/images/sy.png" width="25%"></i><br>首页</a></div>
      <div class="tab-line-item tab-categroy" style="width:19%;" ><i class="kefu"><a target="_blank" href="mqqwpa://im/chat?chat_type=wpa&uin=1587289528"><img src="<?php echo WAP_SITE_URL ?>/images/kf.png" width="25%"></i><br>客服</a></div>
	  <div class="tab-line-item tab-categroy" style="width:19%;" ><a href="<?php echo WAP_SITE_URL ?>/index.php?act=bbs&op=index"><i class="list"><img src="<?php echo WAP_SITE_URL ?>/images/gj.png" width="25%"></i><br>微论坛</a></div>
      <div class="tab-line-item" style="width:19%;position: relative;" ><a href="<?php echo WAP_SITE_URL ?>/tmpl/cart_list.html"><i class="gwc"><img src="<?php echo WAP_SITE_URL ?>/images/gwc.png" width="26%"></i><br>购物车</a></div>
      <div class="tab-line-item" style="width:19%;" ><a href="<?php echo WAP_SITE_URL ?>/tmpl/member/member.html?act=member"><i class="grzx"><img src="<?php echo WAP_SITE_URL ?>/images/ren.png" width="26%"></i><br>个人中心</a></div>
    </div>
   </div>
</div>
</div>		
        <div class="right_menu mask selecter hide " style="height: auto; background-color: rgba(51, 51, 51, 0);">
            <div class="f_left" style="">
                <i style="position: relative; -webkit-transition: top 0.3s ease; transition: top 0.3s ease;"
                    class="arrow_icon"><i></i><i></i></i>
            </div>
            
        </div>

    <script type="text/javascript" src="js/showtip.js"></script>

    <script type="text/javascript">
      $(function(){
        $('.search_btn').click(function () {
            if ($('#keyword').val() == ""  && $('#area').val() == "") {
                    showTip('请输入关键字或选择工作地区');
                    return false;
                }
             $(this).closest('form').submit();
         });
         
         
          //-------------------------------------------------------------------
         $('.right_menu').height($('body').height()).click(function(e){
            if ($(e.target).parents('.f_body').size()==0) {
                $('.arrow_icon').click();
                return false;    
            }     
         });
         
         $('.arrow_icon').css({top:($(window).height()-16)/2+$(window).scrollTop(),left:$(window).width()-312});
         $(window).scroll(function(){
            $('.arrow_icon').css({top:($(this).height()-16)/2+$(this).scrollTop()});
         });
         
         $('.selectorClear').click(function(){
            $('.contentbody2 :radio:checked').prop('checked',false);
            return false;         
         });
         
         $('.contentbody2 :radio').click(function(){
            if ($(this).prop('checked')) {
                $('#area').val($(this).val());
                $('.select_area').text($.trim($(this).next().text()));
                $('.arrow_icon').click();
            }
         });
         
         $('.arrow_icon').click(function(){
            $('.arrow_icon').hide();
            $('.right_menu').css({'background-color':'rgba(51, 51, 51, 0)'});
            $('.f_body h2,.contentbody2').css({'-webkit-transform':'translate(280px, 0px)'});
            setTimeout(function(){$('.right_menu').hide();},100);   
            return false;         
         });
         $('.selectorOk').click(function(){
            var c = $('.contentbody2 :radio:checked');
            if (c.size()>0) {
                $('#area').val($(c).val());
                $('.select_area').text($.trim($(c).next().text()));   
            }else{
                $('#area').val('');
                $('.select_area').text('地区');
            }
            $('.arrow_icon').click();    
            return false;         
         });
         
        $('.select_area').click(function(){
            $('.arrow_icon').show();
            $('.right_menu').css({'background-color':'rgba(51, 51, 51, 0.8)'}).show();
            setTimeout(function(){ $('.f_body h2,.contentbody2').css({'-webkit-transform':'translate(0px, 0px)'});},100);       
               
            return false;         
        });
        })
    </script>

</body>
</html>
