<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <title>山西艺术节</title>
    <base href="/statics/wap/">
    <link rel="stylesheet" href="./css/dc.css">
    <!-- <link rel="stylesheet" href="/statics/bootstrap/css/bootstrap.min.css"> -->
    <link rel="stylesheet" href="/statics/extres/bootstrap-calendar/css/calendar.css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="{$config_siteurl}statics/cu/swiper/swiper.css" />
    
    <style>
        .notic{
            position:absolute;
            margin:-8.8% 10% 0 28% ;
        }
        .notic a{
            margin-left:10px;
        }
        .swiper-container {
            width: 100%;
            padding-top: 80px;
            padding-bottom: 28px;
            background:url('images/002.jpg') no-repeat center top;
        }
        .swiper-slide {
            background-position: center;
            background-size: cover;
            width: 300px;
            height: 205px;
            /* border: 1px ridge  #b58c51; */
        
        }
        .swiper-slide span {
            display:block;
            background-color:#fff;
        }
        .swiper-slide span h5{
            font-size: .14rem; color: #333; font-weight: bold; padding-left: 0.15rem; padding-top: .05rem;
        }
        .swiper-slide span p{
            font-size: .1rem; color: #666; padding-left: 0.15rem; 
        }
        .swiper-button-prev{background-image:url("data:image/svg+xml;charset=utf-8,%3Csvg%20xmlns%3D'http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg'%20viewBox%3D'0%200%2027%2044'%3E%3Cpath%20d%3D'M0%2C22L22%2C0l2.1%2C2.1L4.2%2C22l19.9%2C19.9L22%2C44L0%2C22L0%2C22L0%2C22z'%20fill%3D'%23b58c51'%2F%3E%3C%2Fsvg%3E");}
        .swiper-button-next{background-image:url("data:image/svg+xml;charset=utf-8,%3Csvg%20xmlns%3D'http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg'%20viewBox%3D'0%200%2027%2044'%3E%3Cpath%20d%3D'M27%2C22L27%2C22L5%2C44l-2.1-2.1L22.8%2C22L2.9%2C2.1L5%2C0L27%2C22L27%2C22z'%20fill%3D'%23b58c51'%2F%3E%3C%2Fsvg%3E");}

    </style>
</head>
<body class="artday">

<div class="dccon">
    <header class="holiheard">
        <!-- <a class="aback"></a> -->
        <h5>山西艺术节</h5>
    </header>
    <a href="{:U('detail',['id'=>$notic['id']])}"><img class="arthead" src="images/artdayhead.jpg"></a>
    <ul class="artnav">
        <a href="http://www.pw789.com/show/?order=hot"><img src="images/artnav1.png"></a>
        <a href="{:U('Festival/Wap/themeact')}"><img src="images/artnav2.png"></a>
        <a href="{:U('Festival/Wap/exhibition')}"><img src="images/artnav3.png"></a>
        <a href="{:U('Festival/Wap/perform')}"><img src="images/artnav4.png"></a>
    </ul>
    <div class="recommend">
        <div class="title clearfix">
            <h4>精品推荐<br><span>Products recommended</span></h4>
            <!-- <a href="javascript:void(0)">More+</a> -->
        </div>

        <!-- <div class="img">
            <a href="{:U('detail',['id'=>$position[0]['id']])}">
                <img src="{:thumb($position[0]['image'],360,160,1)}" alt="">
                <h5>{$position[0]['title']}</h5>
                <p>精彩展览#{$position[0]['deputy_title']}</p>
            </a>
        </div> -->
        <div class="list">
            <div class="ul">
                <div class="li" style="float:left">
                    <a href="{:U('detail',['id'=>$position[0]['id']])}">
                        <img src="{:thumb($position[0]['image'],170,100,1)}" alt="">
                        <p>{$position[0]['title']}</p>
                    </a>
                </div>
                <div class="li"  style="float:left">
                    <a href="{:U('detail',['id'=>$position[1]['id']])}">
                        <img src="{:thumb($position[1]['image'],170,100,1)}" alt="">
                        <p>{$position[1]['title']}</p>
                    </a>
                </div>
                <div class="li" style="float:left">
                    <a href="{:U('detail',['id'=>$position[2]['id']])}">
                        <img src="{:thumb($position[2]['image'],170,100,1)}" alt="">
                        <p>{$position[2]['title']}</p>
                    </a>
                </div>
                <div class="li"  style="float:left">
                    <a href="{:U('detail',['id'=>$position[3]['id']])}">
                        <img src="{:thumb($position[3]['image'],170,100,1)}" alt="">
                        <p>{$position[3]['title']}</p>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="artshow" style="clear:both">
        <!-- <img class="rightimg" src="images/artshowimg.jpg"> -->
        <!-- <img class="" src="images/hehe.jpg" style="margin-bottom:20px;margin-top:-10px;"> -->

        <div class="box">

            <ul class="rightul clearfloat">
                <img src="images/artshowtitle2.png">
                <volist name="media" id="me">
                    <li>
                        <em class="tip"></em><a href="{$me.url}">{$me.title|mb_strcut=###,0,60}</a>
                    </li>
                </volist>
            </ul>
            <!-- <img class="leftimg" src="images/artshowimgtxt.jpg"> -->
        </div>
    </div>

    <!-- 主题性活动 -->
    <a href="{:U('themeact')}"><img src="images/artshow1.jpg"></a>
    <!-- 主题性活动 End-->

    <!-- 在线票务 -->
    <a href="http://www.pw789.com/show/?order=hot"><img src="images/artshow2.jpg"></a>
    <!-- 在线票务 End-->

    <!-- 直播内容 -->
    <div class="swiper-container">
        <div class="swiper-wrapper" style="">
            <div class="swiper-slide">
                <a href="{:U('live',['id'=>$live[0]['id']])}"><img src="<?php echo empty($live[0]['image'])?'./images/zhibo/001.png':thumb($live[0]['image'],300,163,1);?>" alt="">
                    <span class="text">
                        <h5>{$live[0]['title']|default='鼓舞山西——锣鼓艺术展演'}</h5>
                        <p>{$live[0]['periodical_date']|default='2017-08-25'}</p>
                    </span>
                </a>
            </div>
            <div class="swiper-slide">
                <a href="{:U('live',['id'=>$live[1]['id']])}"><img src="<?php echo empty($live[1]['image'])?'./images/zhibo/002.png':thumb($live[1]['image'],300,163,1);?>" alt="">
                    <span class="text">
                        <h5>{$live[1]['title']|default='舞动三晋——广场舞展演'}</h5>
                        <p>{$live[1]['periodical_date']|default='2017-08-25'}</p>
                    </span>
                </a>
            </div>
            <div class="swiper-slide">
                <a href="{:U('live',['id'=>$live[2]['id']])}"><img src="<?php echo empty($live[2]['image'])?'./images/zhibo/003.png':thumb($live[2]['image'],300,163,1);?>" alt="">
                    <span class="text">
                        <h5>{$live[2]['title']|default='舞动三晋——广场舞展演'}</h5>
                        <p>{$live[2]['periodical_date']|default='2017-08-25'}</p>
                    </span>
                </a>
            </div>
        </div>
        <!-- 如果需要分页器 -->
        <div class="swiper-pagination"></div>
        
        <!-- 如果需要导航按钮 -->
        <div class="swiper-button-prev"></div>
        <div class="swiper-button-next"></div>
        
        <!-- 如果需要滚动条 -->
        <!-- <div class="swiper-scrollbar"></div> -->
    </div>

    <!-- 直播内容 End-->

    <!-- 日历事件 -->
     <div class="page-header">
		<div class="pull-right form-inline">
			<div class="btn-group">
				<button class="btn btn-primary btn-prev" data-calendar-nav="prev"><< </button>
				<button class="btn" data-calendar-nav="today">活动日历</button>
				<button class="btn btn-primary btn-next" data-calendar-nav="next"> >></button>
			</div>
		</div>
	  </div>
      <div class="cal1" id="calendar"></div>
     <!-- 日历事件 End-->

    <!-- 展览类活动 -->
    <dl class="artul artul1">
        <h4>
            <a href="{:U('exhibition')}"><img src="images/artultitle1.png"></a>
            <a href="{:U('exhibition')}">More+</a>
        </h4>
        <ul>
            <li style="width:100%;">
                <div class="ulbox" style="width:100%;">
                    <volist name="exhibition" id="ex">        
                        <div class="li" style="width:48%;padding-left:5px;margin-top:10px;float:left;">
                           <a href="{:U('detail',['id'=>$ex['id']])}"  >
                            <img src="{:thumb($ex['image'],170,145,1)}" style="width:170px;height:145px;">
                           <if condition="strlen($ex['title']) egt 30">
                            <p><span class="title" style="color:black;"><?php echo  mb_strcut($ex['title'],0,30)?>...</span></p>
                            <else/>
                             <p><span class="title" style="color:black;">{$ex['title']}</span></p>
                            </if>
                        </a>
                        </div>
                    </volist>
                    </div>
            </li>
        </ul>
    </dl>
    <!-- 展览类活动 End-->

    <!-- 表演类活动 -->
    <ul class="artul artul2">
        <h4>
            <a href="{:U('perform')}"><img src="images/artultitle2.png"></a>
            <a href="{:U('perform')}">More+</a>
        </h4>
        <volist name="perform" id="pe">
        <li>
            <div class="head">
                <div class="box">
                    <!-- <img src="images/artul2head.png"> -->
                    <p><span class="title">{$key}</span></p>
                </div>
                <a href="{:U('perform')}">More+</a>
            </div>
            <div class="ul" style="width:100%;">
                <div class="ulbox" style="width:100%;">
                    <volist name="pe" id="p">
                         
                        <div class="li" style="width:45%;padding-left:5px;margin-top:10px;">
                          <a href="{:U('perform',['id'=>$p['id']])}" >
                            <img src="{:thumb($p['image'],170,145,1)}" style="width:170px;height:145px;">
                           <if condition="strlen($p['title']) egt 30">
                            <p><span class="title"><?php echo  mb_strcut($p['title'],0,30)?>...</span></p>
                            <else/>
                             <p><span class="title">{$p['title']}</span></p>
                            </if>
                        </a>
                        </div>
                        
                    </volist>
                </div>

            </div>
        </li>
        </volist>
    </ul>
    <!-- 表演类活动 End -->
    <!-- 演出活动新闻简报 -->
        <dl class="artul artul1">
        <h4>
            <a href="{:U('more',['type'=>'Briefing'])}"><img src="images/briefing.png"></a>
            <a href="{:U('more',['type'=>'Briefing'])}">More+</a>
        </h4>
        <ul>
            <li style="width:100%;">
                <div class="ulbox" style="width:100%;">
                    <volist name="briefing" id="ex">
                        <div class="li" style="margin:1.15em 1.15em 1.15em 0;">
                            <a href="{:U('detail',['type'=>'Briefing','id'=>$ex['id']])}"  >
                                <p style="font-size:14px;line-height:16px;"><span class="title" style="color:black;"><?php echo  mb_strcut($ex['title'],0,70)?></span><span style="margin-left:5px;color: #cda873;font-size:11px;">More+</span></p>
                            </a>
                        </div>
                    </volist>
                </div>
            </li>
        </ul>
    </dl>
    <!-- 演出活动新闻简报 End-->
    <!-- 演出论坛 -->
    <dl class="artul artul1">
        <h4>
            <a href="{:U('more',['type'=>'Interpret'])}"><img src="images/forum.png"></a>
            <a href="{:U('more',['type'=>'Interpret'])}">More+</a>
        </h4>
        <ul>
            <li style="width:100%;">
                <div class="ulbox" style="width:100%;">
                    <volist name="interpret" id="ex">
                        <div class="li" style="margin:1.15em 1.15em 1.15em 0;">
                            <a href="{:U('detail',['type'=>'Interpret','id'=>$ex['id']])}"  >
                                <p style="font-size:14px;line-height:16px;"><span class="title" style="color:black;"><?php echo  mb_strcut($ex['title'],0,70)?></span><span style="margin-left:5px;color: #cda873;font-size:11px;">More+</span></p>
                            </a>
                        </div>
                    </volist>
                </div>
            </li>
        </ul>
    </dl>
    <!-- 演出论坛 End-->
    <footer>
        <img src="/statics/wap/images/headerimg.jpg" alt="">
    </footer>

</div>


<script src="./js/jquery.min.js"></script>
<script src="./js/swiper-3.4.0.jquery.min.js"></script>
<script src="./js/dccommon.js"></script>
<script src="./js/self/shopprods.js"></script>

<script src="https://cdn.bootcss.com/underscore.js/1.8.3/underscore-min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script type="text/javascript" src="/statics/extres/bootstrap-calendar/js/language/zh-CN.js"></script>
<script type="text/javascript" src="/statics/extres/bootstrap-calendar/js/calendar.js"></script>
<!--<script type="text/javascript" src="./js/jquery.fancybox.pack.js"></script>-->
<script type="text/javascript" src="{$config_siteurl}statics/cu/swiper/swiper.min.js"></script>
	<script type="text/javascript">
        var swiper = new Swiper('.swiper-container', {
            initialSlide:0,
            loop:true,
            prevButton:'.swiper-button-prev',
            nextButton:'.swiper-button-next',
            autoplay: 5000,
            pagination: '.swiper-pagination',
            effect: 'coverflow',
            grabCursor: true,
            centeredSlides: true,
            slidesPerView: 'auto',
            coverflow: {
                rotate: 50,
                stretch: 0,
                depth: 100,
                modifier: 1,
                slideShadows : true
            }
        });
		var calendar = $("#calendar").calendar(
			{
                display_week_numbers: false,
                weekbox: false,
                // stop_cycling:true,
                language:"zh-CN",
				tmpl_path: "/statics/extres/bootstrap-calendar/tmpls/",
                // events_source: '/statics/extres/bootstrap-calendar/events_source.json',
                events_source:"{:U('Api/Calendar/index')}",
                onAfterEventsLoad: function(events) {
                    if(!events) {
                        return;
                    }
                    // console.log(events);
                    var list = $('#eventlist');
                    list.html('');
                    $.each(events, function(key, val) {
                        $(document.createElement('li'))
                            .html('<a href="' + val.url + '">' + val.title + '</a>')
                            .appendTo(list);
                    });
                }
            });
        $('.btn-group button[data-calendar-nav]').each(function() {
            var $this = $(this);
            $this.click(function() {
                calendar.navigate($this.data('calendar-nav'));
            });
        });
        $('.btn-group button[data-calendar-view]').each(function() {
                return false;
	});
	</script>
</body>
</html>