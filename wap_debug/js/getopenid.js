$(function() {
  $.ajax({
    url:WapSiteUrl+"/index.php?act=index&op=getmemberinfo",
    type:'get',
    //jsonp:'callback',
    dataType:'jsonp',
    success:function(result){
      alert(111);
      //window.location.href = WapSiteUrl+'/getopenid.html';
     
      // var data = result.datas;
      // data.WapSiteUrl = WapSiteUrl;
      // var html = template.render('category-one', data);
      // $("#categroy-cnt").html(html);
    }
  });
    
});