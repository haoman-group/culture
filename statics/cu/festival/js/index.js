
var _hmt = _hmt || [];
(function(){
    var  hm = document.createElement("script");  
  hm.src = "https://hm.baidu.com/hm.js?84e5b4a1e302ec72e0c37601fa5ae08a";
  var s = document.getElementsByTagName("script")[0]; 
  s.parentNode.insertBefore(hm, s);
})();

$(document).ready(function(){    
  $(window).scroll( function() { 
    var offset = $("#1f").offset();
    if($(document).scrollTop() > offset.top - 500){
      $(".right-nav").show();
    }else{
      $(".right-nav").hide();
    }
  } );
});
