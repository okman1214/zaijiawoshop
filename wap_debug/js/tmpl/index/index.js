$(function() {
//判断微信内置浏览器
    function is_weixin(){
    var ua = navigator.userAgent.toLowerCase();
    if(ua.match(/MicroMessenger/i)=="micromessenger") {
        return true;
    } else {
        return false;
    }
}

    //if(is_weixin()){
        //alert("暂不支持微信访问");
        //$(html).val("暂不支持微信访问");
        //location.href =javascript:window.history.forward(-1);
        //history.back();
        
    //}else{
 

    //倒计时
    
var d = new Date();
var now = d.getHours();
var nowt = d.getTime();
if(now>=0 && now<12){
    d.setHours(12);
    d.setMinutes(0);
    d.setSeconds(0);
    d.setMilliseconds(0);
    time=d.getTime();
}else if(now>=12 && now<16){   
    d.setHours(16);
    d.setMinutes(0);
    d.setSeconds(0);
    d.setMilliseconds(0);
    time=d.getTime();
}else if(now>=16 && now<20){    
    d.setHours(20);
    d.setMinutes(0);
    d.setSeconds(0);
    d.setMilliseconds(0);
    time=d.getTime();    
}else if(now>=20 && now<24){
    d.setHours(24);
    d.setMinutes(0);
    d.setSeconds(0);
    d.setMilliseconds(0);
    time=d.getTime();
}


var intDiff = parseInt((time-nowt)/1000);//倒计时总秒数量
function timer(intDiff){

    window.setInterval(function(){

    var day=0,
        hour=0,
        minute=0,
        second=0;//时间默认值        
    if(intDiff > 0){
        day = Math.floor(intDiff / (60 * 60 * 24));
        hour = Math.floor(intDiff / (60 * 60)) - (day * 24);
        minute = Math.floor(intDiff / 60) - (day * 24 * 60) - (hour * 60);
        second = Math.floor(intDiff) - (day * 24 * 60 * 60) - (hour * 60 * 60) - (minute * 60);
    }
    if (minute <= 9) minute = '0' + minute;
    if (second <= 9) second = '0' + second;
    $('#day_show').html(day+"天");
    $('#hour_show').html('<s id="h"></s>'+hour+'时');
    $('#minute_show').html('<s></s>'+minute+'分');
    $('#second_show').html('<s></s>'+second+'秒');
    intDiff--;
    }, 1000);
} 

$(function(){
    timer(intDiff);    
}); 

     
        
    $.ajax({
        url: ApiUrl + "/index.php?act=index",
        type: 'get',
        dataType: 'json',
        success: function(result) {
            var data = result.datas;
            var html = '';

            $.each(data, function(k, v) {
                $.each(v, function(kk, vv) {
                    switch (kk) {
                        case 'adv_list':
                        case 'home3':
                            $.each(vv.item, function(k3, v3) {
                                vv.item[k3].url = buildUrl(v3.type, v3.data);
                            });
                            break;

                        case 'home1':
                            vv.url = buildUrl(vv.type, vv.data);
                            break;

                        case 'home2':
                        case 'home4':
                            vv.square_url = buildUrl(vv.square_type, vv.square_data);
                            vv.rectangle1_url = buildUrl(vv.rectangle1_type, vv.rectangle1_data);
                            vv.rectangle2_url = buildUrl(vv.rectangle2_type, vv.rectangle2_data);
                            break;
                        // case 'home5':
                        //     vv.square_url = buildUrl(vv.square_type, vv.square_data);
                        //     vv.rectangle1_url = buildUrl(vv.rectangle1_type, vv.rectangle1_data);
                        //     vv.rectangle2_url = buildUrl(vv.rectangle2_type, vv.rectangle2_data);
                        //     break;
                    }
                    //alert(kk)
                    html += template.render(kk, vv);
                    return false;
                });
            });

            $("#main-container").html(html);

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

        }
    });

    $('.search-btn').click(function(){
        var keyword = encodeURIComponent($('#keyword').val());
        location.href = WapSiteUrl+'/tmpl/product_list.html?keyword='+keyword;
    });

    //猜你喜欢
    
    var key = getcookie('key');
    
   if(!key){
    
   }else{

        $.ajax({
            type:'post',
            url:ApiUrl+"/index.php?act=index&op=youlike",
            data:{key:key},
            dataType:'json',
            //jsonp:'callback',
            success:function(result){
                //var html = template.render('product_detail', data);
            //alert(result.datas.like_list);
                var html2 = template.render('like_list_a', result.datas);
                $("#like_list").html(html2);

                
                return false;
            }
        });
   }
    var html3 = template.render('headerId_1');
    $("#headerId").html(html3);
   //}
});
