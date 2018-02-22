$(function(){
    $(".searbox .searcate").click(function(e){
        if($(".ulsearcate").is(":hidden")){
            $(".ulsearcate").show();
        }else{
            $(".ulsearcate").hide();
        }
        e.stopPropagation();
    })

    $(".ulsearcate li").click(function(e){
        $(this).parent().siblings("em").html($(this).html());
        $(".ulsearcate").hide();
        e.stopPropagation();
    })

    if($(".searbox").hasClass("hasdrop")){
        $("body").click(function(){
            $(".ulsearcate").hide();
        })
    }
})


 function changeAuthCode()
{
    var num = new Date().getTime();
    var rand = Math.round(Math.random() * 10000);
    var num = num + rand;
    $("#authCode").attr('src', $("#authCode").attr('src') + "&refresh=1&t=" + num);
}

function addFav() {
    var url = window.location;
    var title = document.title;
    var ua = navigator.userAgent.toLowerCase();
    if (ua.indexOf("360se") > -1) {
        alert("由于360浏览器功能限制，请按 Ctrl+D 手动收藏！");
    }
    else if (ua.indexOf("msie 8") > -1) {
        window.external.AddToFavoritesBar(url, title); //IE8
    }
    else if (document.all) {
        try{
            window.external.addFavorite(url, title);
        }catch(e){
            alert('您的浏览器不支持,请按 Ctrl+D 手动收藏!');
        }
    }
    else if (window.sidebar) {
        window.sidebar.addPanel(title, url, "");
    }
    else {
        alert('您的浏览器不支持,请按 Ctrl+D 手动收藏!');
    }
}

function send_reg_sms(mobile) {
    if(!mobile) {
        alert('请填写手机号');
        return;
    }
    $.ajax({
        type: "POST",
        url: "/index.php?g=Member&m=Public&a=sendsms",
        data: {mobile:mobile},
        dataType: "json",
        success: function (data) {
            if(data.status=='1') alert(data.info);
            else alert(data.info);
        },
        error: function (msg) {
            alert(msg);
        }
    });
}
