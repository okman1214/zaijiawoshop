<?php defined('InShopNC') or exit('Access Invalid!');?>

    <header id="header"></header>
    <div class="login-form">
        <form action="" method ="">
            <span>
               手机号：<input type="text" placeholder="" class="input-40" name="username" id="username"/>
            </span>
             <span>
                验证码：<input type="text" placeholder="" class="input-40" name="yzm" id="userpwd"/>
            </span>
			<span>
                修改密码：<input type="password" placeholder="" class="input-40" name="pwd" id="userpwd"/>
            </span><span>
                确认密码：<input type="password" placeholder="" class="input-40" name="pwd1" id="userpwd"/>
            </span>
            <!-- <span class="clearfix auto-login">
                <i class="s-chk1 fleft mr5"></i>
                <span>7天内免登录</span>
            </span> -->
            <div class="error-tips mt10"></div>
           
			<a href="<?PHP echo WAP_SITE_URL?>/index.php?act=login&op=loginreback" class="l-btn-login mt10" id="loginreback">修改密码</a>
        </form>
    </div>
	
    <div class="footer" id="footer1"></div>
	<footer id="footer"></footer>
    <input type="hidden" name="referurl">
    <script type="text/javascript" src="../../js/config.js"></script>
    <script type="text/javascript" src="../../js/zepto.min.js"></script>
    <script type="text/javascript" src="../../js/template.js"></script>
    <script type="text/javascript" src="../../js/common.js"></script>
    <script type="text/javascript" src="../../js/tmpl/common-top.js"></script>
    <script type="text/javascript" src="../../js/simple-plugin.js"></script>
    <script type="text/javascript" src="../../js/tmpl/login.js"></script>
	<script type="text/javascript" src="../../js/tmpl/footer.js"></script>
