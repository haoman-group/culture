<extend name="shuipf/Template/Default/Industry/common/_layout.php" />
<block name="after_styles">
    <link rel="stylesheet" href="{$config_siteurl}statics/css/finance.css">
    <link rel="stylesheet" href="{$config_siteurl}statics/css/pic.css">
    <link rel="stylesheet" href="{$config_siteurl}statics/css/swiper.css">
    <link rel="stylesheet" href="{$config_siteurl}statics/css/list_news_video.css">
    <link rel="stylesheet" href="{$config_siteurl}statics/ci/css/page_common.css" />
    <style>
        .title {border-bottom: 1px solid #ccc;line-height: 50px;}
        .title li {display: inline-block;font-size: 16px;color: #bfbfbf;padding: 0 6px;}
        .title li a {display: block;color: #3d3d3d;background: width: 165px;height: 34px;line-height: 34px;box-sizing: border-box;text-align: center;}
        .analysis {border: none;background: #fff;padding: 20px 0;clear: both;}
        .analysis h1 {font-weight: normal;color: #2058c2;padding-bottom: 5px;margin-top: 20px;}
        .analysis .anaul .anaimg {width: 283px;height: 214px;box-sizing: border-box;padding: 0;}
        .anaimg h5 {font-size: 14px;color: #242424;font-weight: normal;text-align: center;line-height: 30px;margin-top: 18px;}
        .analysis .anaul {padding-left: 0;}
        .analysis .anaul li {margin: 20px 0 0 41px;}
        .analysis .anaul li:nth-of-type(4n+1) {margin-left: 0;}
        .analysis .anaul h5 {line-height: 26px;font-size: 20px;font-weight: 500;margin-top: 10px;}
        .analysis .anaul p {font-size: 14px;color: #242424;text-align: left;line-height: 24px;margin: 10px 0;width: 269px;box-sizing: border-box;}
        hr {margin-bottom: 15px;}
        .anaul span{margin-top: 15px; font-size: 14px;font-family: "Microsoft Yahei";float: left;}
    </style>
</block>
<block name="content">
    <?php
    $arr = array("inputtime_desc","views_desc");
    $order =  (in_array($_GET['sort'],$arr))?str_replace("_"," ",$_GET['sort']):"id desc";?>
    <div id="nav">

        <div class="container">
            <ul>
                <li>
                    <a href="{:U('Industry/Index/index')}" class="home_src" style="color:#900;">首页</a>
                </li>
                <li><span>></span></li>
                <li>
                    <a href="{:U('Industry/Index/lists',array('catid'=>1))}">资讯中心</a>
                </li>
                <li><span>></span></li>
                <li>
                    <a href="javascript:;" style="color: #900;">{:getCategory($catid,'catname')}</a>
                </li>
            </ul>
            <form action="">
                <input type="text" placeholder="输入你要搜索的关键字" value="" id="b" />
                <input class="search_btn" type="button" value="搜索" onclick="text()" />
            </form>
        </div>
    </div>

    <div id="content">
        <div class="container clearfix">
            <div class="clearfix">
                <content action = "lists" num = "1" catid = "5" order = "id desc">
                    <volist name="data" id="vo">
                        <div class="left audio-newsl">
                            <div class="pic-title" style="width: 785px;padding-left: 0;">

                            	<span style="color: #900;font-weight: 700;font-size: 20px;">&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;</span>
                                <h5>{$vo.title|str_cut=###,10,''}</h5>
                                <span>{$vo.inputtime|date="Y-m-d",###} <i>●</i> 来源：山西文化厅 <i>●</i> 作者：李某某 <i>●</i> {:hits($catid,$vo['id'])}次浏览</span>
                            </div>
                            <div class="swiper-container audio-container">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide">
                                        <a href=".{$vo.url}"><img src="{:thumb($vo['thumb'],785,590,1)}" alt="" style="width: 785px;height: 590px"></a>
                                        <!-- <iframe height=498 width=510 src='http://player.youku.com/embed/XMzcxNTM0MTU2' frameborder=0 'allowfullscreen'></iframe> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </volist>
                </content>
                    <!-- 如果需要分页器 -->
                    <div class="swiper-pagination"></div>

                    <!-- 如果需要导航按钮 -->
                    <!-- <div class="swiper-button-prev"></div> -->
                    <!-- <div class="swiper-button-next"></div> -->

                    <!-- 如果需要滚动条 -->
                    <!-- <div class="swiper-scrollbar"></div> -->

                </position>
                <div class="right audio-newsr right_hot_video">
                    <h5 style="background:#f5f5f5 url({$config_siteurl}statics/ci/img/audio.png) no-repeat 65px center;width: 377px;margin-left: -67px;">热点视频排行</h5>
                    <ul>
                        <content action= "hits" catid = "$catid" order = "views desc" num ="2">
                            <volist name="data" id="vo" >
                                <li style="height: 283px;width: 377px;margin-left: -67px;margin-bottom: 23px;">
                                    <a href=".{$vo.url}"><img src="{:thumb($vo['thumb'],377,283,1)}" alt="" style="width: 377px;height: 283px;"></a>
                                    <div class="hot_video_title">
                                        <div class="hot_video_order">{$i}</div>
                                        <div class="title_opacity"></div>
                                        <p>{$vo.title|str_cut=###,10}<span>{$views}</span></p>
                                    </div>
                                </li>
                            </volist>
                        </content>
                    </ul>
                </div>
            </div>

    <div class="analysis analysis_1">

        <div class="title_div">
            <ul>
            	
            		<p style="color: #900;float: left;margin-right: 36px;font-size: 20px;font-weight: 700;">|</p>
            	
                <li class="video_list">
                	<!--<span >|</span>-->
                    <a href=".{:getCategory($catid,'url')}">视频列表</a>
                </li>
                <li><a href=".{:getCategory($catid,'url')}&sort=inputtime_desc">最新</a><span class="pic"></span></li>
                <li>综合<span class="pic"></span></li>
                <li><a href=".{:getCategory($catid,'url')}&sort=views_desc">人气浏览</a><span class="pic"></span></li>
                <li><a href=".{:getCategory($catid,'url')}&sort=inputtime_desc">时间</a><span class="pic"></span></li>
            </ul>
        </div>
        <ul class="anaul">

            <content action = "lists" num = "8" catid = "$catid" order = "$order" page = "$page">
                <volist name = "data" id ='value'>
                    <if condition="$value.posid eq 0">
                        <li>
                            <a href=".{$value.url}">
                                <div class="anaimg">
                                    <img src="{:thumb($value['thumb'],283,214,1)}" style="width: 283px;height: 214px">
                                    <span>{$value.title|str_cut=###,10,''}</span>
                                    <span class="video_browse" style="float: right;"> 浏览{:hits($catid,$value['id'])}次</span>
                                </div>

                            </a>
                        </li>
                    </if>
                </volist>
            </content>
        </ul>
        <div class="page_div">
            {$pages}
        </div>
    </div>
    </div>
    </div>

</block>
<block name="after_scripts">
	<script type="text/javascript" >
	function text(){
		var value = document.getElementById("b").value;
		window.location.href='{:U("Content/Search/index")}&key='+value;
	}
	</script>
</block>