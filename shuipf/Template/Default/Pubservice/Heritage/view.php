<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>山西文化云</title>
    <link rel="stylesheet" href="{$config_siteurl}statics/cu/bootstrap/bootstrap.min.css" />
    <link rel="stylesheet" href="{$config_siteurl}statics/cu/Heritage/css/idangerous.swiper.css">
    
<link rel="stylesheet" type="text/css" href="{$config_siteurl}statics/cu/css/base.css" />
	<link rel="stylesheet" href="{$config_siteurl}statics/cu/css/public-service.css" />
    <link rel="stylesheet" href="{$config_siteurl}statics/cu/Heritage/css/common.css">
    <link rel="stylesheet" href="https://cdn.bootcss.com/font-awesome/4.7.0/css/font-awesome.css">
</head>
<body >
    <div class="wap">
    <header>
        <template file="Pubservice/Common/_top"/>
    </header>
    <article class="index_article1">
        <div class="container">
             <!-- <div class="index_center">
              
            </div> -->
           <h2 style="text-align:center;"><if condition="$_GET['type'] eq 'content' ">历史起源<elseif condition="$_GET['type'] eq 'process' "/>制作工艺 <elseif condition="$_GET['type'] eq 'theme' "/>主题特色
            <elseif condition="$_GET['type'] eq 'heritage' "/>非遗传人<else/>非遗纵横</if></h2>
           <h3 style="text-align:center;margin-top:30px;"> {$data['title']}</h3>
           <span style="word-break:break-all;text-indent:2em;"><if condition="$_GET['type'] eq 'content' ">{$data['content']}<elseif condition="$_GET['type'] eq 'process' "/>{$data['process']} <elseif condition="$_GET['type'] eq 'theme' "/>{$data['theme']}
            <elseif condition="$_GET['type'] eq 'heritage' "/>{$data['heritage']}<else/>{$data['intangible']}</if></span>
        </div>
    </article>
   <template file="Pubservice/Common/_foot"/>
  <template file="Pubservice/Common/checklogin"/>
    </div>
</body>
</html>
<script src="{$config_siteurl}statics/cu/Heritage/js/jquery-1.10.1.min.js"></script>
<script src="{$config_siteurl}statics/cu/Heritage/js/idangerous.swiper.min.js"></script>
<script src="{$config_siteurl}statics/cu/Heritage/js/index.js"></script>
<script type="text/javascript" src="{$config_siteurl}statics/cu/layer/layer.js"></script>
<script>
    $(function(){
        $(".menuadiv a").hover(
            function(){
            $(".yunindexbanbox img").eq($(".menuadiv a").index(this)).show().siblings().hide();
            $(this).siblings().removeClass('on');
        },function(){
            $(this).addClass('on');
        })
    })
    function citylist(){
        layer.open({
        title:'请选择地区',
        shadeClose:true,
        area: ['810px', '520px'],
        type: 2, 
        content: "/Pubservice/Index/zonecloud"
        });
    }
</script>