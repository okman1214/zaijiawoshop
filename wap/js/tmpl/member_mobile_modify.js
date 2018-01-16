$(function() {
    var e = getCookie("key");
    if (!e) {
        window.location.href = WapSiteUrl + "/tmpl/member/login.html";
        return
    }
    loadSeccode();
    $("#refreshcode").bind("click",
    function() {
        loadSeccode()
    });
    $.ajax({
        type: "get",
        url: ApiUrl + "/index.php?act=member_account&op=get_mobile_info",
        data: {
            key: e
        },
        dataType: "json",
        success: function(e) {
		
            if (e.code == 200) {
                if (e.datas.state) {
                    $("#mobile").html(e.datas.member_mobile)
                } else {
                    location.href = WapSiteUrl + "/tmpl/member/member_mobile_bind.html"
                }
            }
        }
    });
    $.sValid.init({
        rules: {
            captcha: {
                required: true,
                minlength: 4
            }
        },
        messages: {
            captcha: {
                required: "请填写图形验证码",
                minlength: "图形验证码不正确"
            }
        },
        callback: function(e, a, t) {
            if (e.length > 0) {
                var o = "";
                $.map(a,
                function(e, a) {
                    o += "<p>" + e + "</p>"
                });
                errorTipsShow(o)
            } else {
                errorTipsHide()
            }
        }
    });
    $("#send").click(function() {
        if ($.sValid()) {
            var a = $.trim($("#captcha").val());
            var t = $.trim($("#codekey").val());
            $.ajax({
                type: "post",
                url: ApiUrl + "/index.php?act=member_account&op=modify_mobile_step2",
                data: {
                    key: e,
                    captcha: a,
                    codekey: t
                },
                dataType: "json",
                success: function(e) {
                    if (e.code == 200) {
                        $("#send").hide();
                        $(".code-countdown").show().find("em").html(e.datas.sms_time);
                        $.sDialog({
                            skin: "block",
                            content: "短信验证码已发出",
                            okBtn: false,
                            cancelBtn: false
                        });
                        var a = setInterval(function() {
                            var e = $(".code-countdown").find("em");
                            var t = parseInt(e.html() - 1);
                            if (t == 0) {
                                $("#send").show();
                                $(".code-countdown").hide();
                                clearInterval(a);
                                $("#codeimage").attr("src", ApiUrl + "/index.php?act=seccode&op=makecode&k=" + $("#codekey").val() + "&t=" + Math.random())
                            } else {
                                e.html(t)
                            }
                        },
                        1e3)
                    } else {
                        errorTipsShow("<p>" + e.datas.error + "</p>");
                        $("#codeimage").attr("src", ApiUrl + "/index.php?act=seccode&op=makecode&k=" + $("#codekey").val() + "&t=" + Math.random());
                        $("#captcha").val("")
                    }
                }
            })
        }
    });
    $("#nextform").click(function() {
        if (!$(this).parent().hasClass("ok")) {
            return false
        }
        var a = $.trim($("#auth_code").val());
        if (a) {
            $.ajax({
                type: "post",
                url: ApiUrl + "/index.php?act=member_account&op=modify_mobile_step3",
                data: {
                    key: e,
                    auth_code: a
                },
                dataType: "json",
                success: function(e) {
                    if (e.code == 200) {
                        $.sDialog({
                            skin: "block",
                            content: "解绑成功",
                            okBtn: false,
                            cancelBtn: false
                        });
                        setTimeout("location.href = WapSiteUrl+'/tmpl/member/member_mobile_bind.html'", 2e3)
                    } else {
                        errorTipsShow("<p>" + e.datas.error + "</p>")
                    }
                }
            })
        }
    })
});