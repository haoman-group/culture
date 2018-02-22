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
    <article class="index_article">
        <div class="container">
            <div class="index_center">
                <div class="lead">
                    <div class="tit">
                        <p>山西省省级非物质文化遗产名录公示名单主要包括民间文学，民间音乐，民间舞蹈，戏剧，曲艺等多个方面。现已公布两批，共计754项。</p>
                        <span>中文名：山西省非物质文化遗产名录</span>
                        <span>名&nbsp;&nbsp;&nbsp;单：共计754项 </span>
                        <span>地&nbsp;&nbsp;&nbsp;区：山西省 </span>
                        <span>内&nbsp;&nbsp;&nbsp;容：非物质文化遗产名录</span>
                    </div>
                    <div class="case">
                        <div class="swiper-container">
                            <div class="swiper-wrapper">
                                <!-- <volist name="lists" id="vo" offset='0' length='4'>
                                    <div class="swiper-slide">
                                        <div class="lead_img">
                                            <img src="{:thumb($vo['cover'],1156,400,1)}" alt="">
                                            <div class="bottom">{$vo.title}。</div>
                                        </div>
                                    </div>
                                </volist> -->
                                <div class="swiper-slide">
                                    <div class="lead_img">
                                        <img src="{$config_siteurl}statics/cu/Heritage/images/index-s11.jpg" alt="">
                                        <div class="bottom">郭杜林晋式月饼制作技艺。</div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="lead_img">
                                        <img src="{$config_siteurl}statics/cu/Heritage/images/index-s2.jpg" alt="">
                                        <div class="bottom">老陈醋酿制技艺。</div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="lead_img">
                                        <img src="{$config_siteurl}statics/cu/Heritage/images/index-s3.jpg" alt="">
                                        <div class="bottom">平遥纱阁戏人。</div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="lead_img">
                                        <img src="{$config_siteurl}statics/cu/Heritage/images/index-s4.jpg" alt="">
                                        <div class="bottom">平定黑釉刻花陶瓷制作工艺 阳泉市平定县。</div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiperpage">

                            </div>
                        </div>
                    </div>
                    <div class="lead_box">
                        <div class="top">
                            <p>导语</p>
                            <span style="">INTRODUCTION</span>
                        </div>
                    </div>
                    <div class="more"><a href="" target="_blank">MORE</a></div>
                </div>
                <div class="period">
                    <a href="{:U('show',['id'=>$position['id']])}" target="_blank"><img src="{:thumb($position['cover'],630,470,1)}" alt=""></a>
                    <div class="right">
                        <a href="{:U('show',['id'=>$position['id']])}" target="_blank">
                        <div class="tit"><a href="{:U('show',['id'=>$position['id']])}" target="_blank">{$position.title}</a></div>
                        <div class="textbox" style="height:380px;">
                            <!--{$position.intro}-->
                            <?php echo mb_substr($position['intro'],0,255); ?>
                        </div>
                        </a>
                    </div>
                </div>
                <div class="lunbo">
                    <div class="swiper-container">
                        <div class="swiper-wrapper">
                        <volist name="lists" id="vo">
                            <div class="swiper-slide">
                                <div class="title">
                                    <div class="box">
                                        <div class="title_img"><a href="{:U('Pubservice/Heritage/show',['id'=>$vo['id']])}" target="_blank"><img src="{:thumb($vo['cover'],260,270,1)}" alt="{$vo['cover']}"></a></div>
                                        <div class="tit"><a href="{:U('Pubservice/Heritage/show',['id'=>$vo['id']])}" target="_blank" title="{$vo['title']}"> <?php echo mb_substr($vo['title'],0,10); ?></a></div>
                                        <div class="textbox"><a href="{:U('Pubservice/Heritage/show',['id'=>$vo['id']])}" target="_blank"><?php echo  mb_strcut(strip_tags($vo['intro']),0,95)?>...</a></div>
                                    </div>
                                </div>
                            </div>
                        </volist>
                        </div>
                    </div>
                    <a class="arrow-left" href="#"></a>
                    <a class="arrow-right" href="#"></a>
                </div>
            </div>
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