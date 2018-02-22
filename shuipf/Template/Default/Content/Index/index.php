<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>山西文化云平台</title>
    <link rel="stylesheet" type="text/css" href="{$config_siteurl}statics/cu/css/base.css" />
    <link rel="stylesheet" type="text/css" href="{$config_siteurl}statics/cu/css/index.css" />
    <script src="{$config_siteurl}statics/cu/jquery/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdn.bootcss.com/font-awesome/4.7.0/css/font-awesome.css">
    <style>
        /*#footer { padding: 10px 0 10px; margin-top: 10px; }*/
    </style>
</head>
<body class="bg">
<div id="top">
    <div class="container">
        <div class="logo"><a href="/index.php"><img src="{$config_siteurl}statics/cu/images/icon/logo.png" alt="山西文化云"></a></div>
        <div class="top_txt">
            <ul>
                <li class="desc">漫步云端/畅想文化</li>
                <li class="chinese"><a href="javascript:citylist()" class="on">{$cityname}</a><a href="javascript:citylist()">文化云</a></li>
                <!--<li class="city" >
                    <i class="fa fa-map-marker"></i>
                    <span></span>
                </li>-->
                <li class="weixin"></li>
            </ul>
        </div>
        <div class="clr"></div>
    </div>
</div>
<!-- <div class="banner">

</div> -->
<div class="content">
    <div class="">
        <div class="yunindexbanbox">
            <img src="<?=!empty($slideData[0])?$slideData[0]:$config_siteurl.'statics/cu/images/index/yunindexban1.jpg';?>" style="display: inline;" alt="">
            <img src="<?=!empty($slideData[1])?$slideData[1]:$config_siteurl.'statics/cu/images/index/yunindexban2.jpg';?>" alt="">
            <img src="<?=!empty($slideData[2])?$slideData[2]:$config_siteurl.'statics/cu/images/index/yunindexban3.jpg';?>" alt="">
        </div>
        <div class="menuadiv">
            <a class="on" target="_blank" href="{:U('Pubservice/Index/index')}"><i></i></a>
            <a  target="_blank" href="{:U('Content/Resoursemanage/index')}"><i></i></a>
            <a  target="_blank" href="{:U('Industry/Index/index')}"><i></i></a>
        </div>
<!--        <div><img src="{$config_siteurl}statics/cu/images/index/lALOv-Ylz80B8c0Epg_1190_497.png" alt=""></div>-->
<!--        <ul class="three clearfix">-->
<!--            <li><a href="{:U('Pubservice/Index/index')}" target="_blank"><img src="{$config_siteurl}statics/cu/images/index/f1.jpg" alt=""></a></li>-->
<!--            <li><a href="{:U('Content/Resoursemanage/index')}" target="_blank"><img src="{$config_siteurl}statics/cu/images/index/f2.jpg" alt=""></a></li>-->
<!--            <li><a href="{:U('Industry/Index/index')}" target="_blank"><img src="{$config_siteurl}statics/cu/images/index/f3.jpg" alt=""></a></li>-->
<!--            <div class="clr"></div>-->
<!--        </ul>-->
        <!-- <div class="title">
            <h1>三大服务平台</h1>
            <h2>文化活动/大数据库/产业服务等</h2>
        </div> -->
        <!-- <div class="txt">
            <ul>
                <li class="li_1">
                    <div class="img"><img src="{$config_siteurl}statics/cu/images/index/service.jpg" alt="公共服务"></div>
                    <div class="tit">ServiceThree<br>Module<br><span>三大服务平台</span></div>
                </li>
                <li class="li_2">
                    <a href="{:U('Pubservice/Index/index')}" target="_blank" class="tit">Public<br>Service Platform<br><span>公共服务平台</span><i></i><em></em></a>
                    <div class="img"><img src="{$config_siteurl}statics/cu/images/index/service2.jpg" alt="公共服务"></div>
                </li>
                <li class="li_3">
                    <div class="img"><img src="{$config_siteurl}statics/cu/images/index/resource.jpg" alt="资源管理"></div>
                    <a href="{:U('Industry/Index/index')}" target="_blank" class="tit">Industry service<br>platform<br><span>产业服务平台</span><i></i><em></em></a>
                </li>
                <li class="li_4">
                    <a href="{:U('Content/Resoursemanage/index')}" target="_blank" class="tit">Resource management<br>platform<br><span>资源管理平台</span><i></i><em></em></a>
                    <div class="img"><img src="{$config_siteurl}statics/cu/images/index/industry.jpg" alt="产业服务"></div>
                </li>
                <div class="clr"></div>
            </ul>
        </div> -->
    </div>
</div>
<div id="footer">
    <div class="container">
        <p class="link">
            <a href="">关于我们</a>
            <a href="">网站邮箱</a>
            <a href="">网站地图</a>
            <a href="">友情链接</a>
            <a href="">本网声明</a>
        </p>
        <p class="worker">
            <volist name="citylist" id="vo">
                <a href="/?id={$key}">{$vo}文化云</a> ·
            </volist>
        </p>
        <p class="worker">
            <a href="">中国文化市场网</a> ·
            <a href="">中国文化产业网</a> ·
            <a href="">国家数字文化网</a> ·
            <a href="">山西演艺网</a> ·
            <a href="">山西省图书馆</a> ·
            <a href="">山西省非物质文化遗产保护网</a> ·
            <a href="">中国城市文化网</a> ·
            <a href="">中国文化报社</a> ·
            <a href="">艺术中国</a> ·
            <a href="">中国文化信息网</a>
        </p>
        <p class="copy">© 2005－2015 Shanxi Yunpingtai.com, All Rights Reserved</p>
    </div>
</div>
<!-- <div class="wrap"> -->
    <!-- <div class="container">
        <div class="top">
            <div class="logo1"></div>
            <div class="logoimg" style="width:155px; height:75;"></div>
            <div class="by">
                <img src="{$config_siteurl}statics/cu/images/index/culterlog2.gif" width="168" height="20" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <a href="#">
                    <img src="{$config_siteurl}statics/cu/images/index/f3.png" width="35" height="20" />
                </a>
            </div>
            <div class="by1">
                <img src="{$config_siteurl}statics/cu/images/index/erweima.gif" width="65" height="60" style="margin-top:15px;"/>
            </div>
            <div></div>
        </div>
    </div> -->
    <!-- <div class="clr"> </div> -->
    <!-- <div class="main" style="width:1920px;">
        <div class="mainlefthot">
            <img id="slide-img-11" src="{$config_siteurl}statics/cu/images/index/culterconter.gif" class="slide" alt="" style="width:1920px;" />
        </div>
       <div class="mainhotright"><img src="{$config_siteurl}statics/cu/images/index/f6.jpg" width="426" height="440" /></div>
    </div> -->
    <!-- <div class="clr1"><img src="{$config_siteurl}statics/cu/images/index/cultureall.jpg"  /></div>
    <div class="content">
        <div class="hotleft" style="float:left">
            <div style="width: 576;height:auto;">
            <div  style="float: left;" >
                <img src="{$config_siteurl}statics/cu/images/index/culturleft.jpg"  / >
            </div>
            <div  style="float: left;" >
                <a href="{:U('Pubservice/Index/index')}" target="_blank" >
                 <img src="{$config_siteurl}statics/cu/images/index/public.gif" />

            </a>
        </div>
        </div>
        <div style="width: 576;height:auto;">
            <div  style="float: left;width:576px;" >
                 <img src="{$config_siteurl}statics/cu/images/index/service.gif"/>
            </div>
        </div>
        </div>

        <div class="hot" style="float:left">
            <div style="width:275px;height:414px;">
               <a ><img src="{$config_siteurl}statics/cu/images/index/resoureleft.gif" /></a>
            </div>
            <div style="width:275px;">
                <a href="/industry" target="_blank" >
               <img src="{$config_siteurl}statics/cu/images/index/industryleft.gif" />
           </a>
            </div>

        </div>
        <div class="hotright" style="float:left;">
            <div style="height:287px;">
                <a href="{:U('Content/Resoursemanage/index')}">
              <img src="{$config_siteurl}statics/cu/images/index/releft.gif" />
          </a>
            </div>
            <div style="height:282px;">
              <img src="{$config_siteurl}statics/cu/images/index/inup.gif" />
            </div>
            <div>
              <img src="{$config_siteurl}statics/cu/images/index/indown.gif" />
            </div>
            </div>

        </div>  -->



    <!-- <div class="clr"></div>
    <div class="boar" style="clear :left;margin-top:45px;">
        <div style="height:40px;"></div>
        <div style="margin-left:780px;height:20px;">
         <a href="#" style="color:#b9b9b9;">关于我们|</a>
        <a href="#" style="color:#b9b9b9;">网站邮箱|</a>
        <a href="#" style="color:#b9b9b9;">网站地图|</a>
        <a href="#" style="color:#b9b9b9;">友情链接 |</a>
        <a href="#" style="color:#b9b9b9;">本网声明|</a>
    </div> -->
       <!--  <a href="#">中国文化市场网</a> ·
        <a href="#">中国文化产业网</a> ·
        <a href="#">国家数字文化网</a> ·
        <a href="#">山西演艺网</a> ·
        <a href="#">山西省图书馆</a> ·
        <a href="#">山西省非物质文化遗产保护网</a> ·
        <a href="#">中国城市文化网</a> ·
        <a href="#">中国文化报社</a>·
        <a href="#">艺术中国</a> ·
        <a href="#">中国文化信息网</a> -->

    <!-- <div class="foot1" style="margin-left:180px;height:20px;color:#b9b9b9;">© 2005－2015 Shanxi Yunpingtai.com, All Rights Reserved
        <a href="#" style="color:#b9b9b9;">中国文化市场网</a> ·
        <a href="#" style="color:#b9b9b9;">中国文化产业网</a> ·
        <a href="#" style="color:#b9b9b9;">国家数字文化网</a> ·
        <a href="#" style="color:#b9b9b9;">山西演艺网</a> ·
        <a href="#" style="color:#b9b9b9;">山西省图书馆</a> ·
        <a href="#" style="color:#b9b9b9;">山西省非物质文化遗产保护网</a> ·
        <a href="#" style="color:#b9b9b9;">中国城市文化网</a> ·
        <a href="#" style="color:#b9b9b9;">中国文化报社</a>·
        <a href="#" style="color:#b9b9b9;">艺术中国</a> ·
        <a href="#" style="color:#b9b9b9;">中国文化信息网</a>

    </div>
    </div>
</div> -->
<!-- <script>
    $(document).ready(function(){
        var height = $(window).height();
        console.log($("#footer").outerHeight(true));
        $(".content").css({"height":height-$("#top").outerHeight(true)-$("#footer").outerHeight(true)});
        $(".content").css({"min-height":height-$("#top").outerHeight(true)-$("#footer").outerHeight(true)});
    });
</script> -->
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
        content: '{:U("Content/Index/zonecloud")}' 
        });
    }
</script>
</body>
</html>