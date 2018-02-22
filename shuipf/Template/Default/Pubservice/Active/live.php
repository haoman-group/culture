<!DOCTYPE html>
<!-- saved from url=(0028)http://e.vhall.com/208236821 -->
<html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <script type="text/javascript">
(function(window){
    var xmlHttpRequest;
    /**
     * @param  {String}  errorMessage   错误信息
     * @param  {String}  scriptURI      出错的文件
     * @param  {Long}    lineNumber     出错代码的行号
     * @param  {Long}    columnNumber   出错代码的列号
     * @param  {Object}  errorObj       错误的详细信息，Anything
     */
    window.onerror = function(errorMessage, scriptURI, lineNumber,columnNumber,errorObj) { 
        // TODO
        var log_url = 'http://report.logs.vhall.com:5200/?type=js&';
        if(errorMessage) {
            if(errorMessage.indexOf('not defined') > -1){
                log_url += 'importance=p1';
            } else {
                log_url += 'importance=p2';
            }
            log_url += '&errorMessage=' + encodeURIComponent(errorMessage);
        }
        if(scriptURI) {
            log_url += '&scriptURI=' + encodeURIComponent(scriptURI);
        }
        if(lineNumber) {
            log_url += '&lineNumber=' + encodeURIComponent(lineNumber);
        }
        if(columnNumber) {
            log_url += '&columnNumber=' + encodeURIComponent(columnNumber);
        }
        if(errorObj) {
            log_url += '&errorObj=' + encodeURIComponent(errorObj);
        }

        log_url += '&log_url=' + encodeURIComponent(location.href);
        sendLog(log_url);
       
    };

    function sendLog (url) {
        var img = new Image();
        img.src = url;
    }
})(window);
var console = console || {
    log: function() {
        return false;
    }
};
</script>
    
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta http-equiv="x-dns-prefetch-control" content="on">
    <meta name="renderer" content="webkit">
    <meta name="description" content="{$data.abstract}">
    <link rel="dns-prefetch" href="http://cnstatic01.e.vhall.com/3rdlibs">
    <link rel="dns-prefetch" href="http://cnstatic01.e.vhall.com/static">
    <link rel="stylesheet" href="{$config_siteurl}statics/cu/css/public-service.css" />
    <link rel="stylesheet" href="{$config_siteurl}statics/cu/bootstrap//bootstrap.min.css" />
    <link rel="stylesheet" href="{$config_siteurl}statics/cu/css/base.css" />

    <title>{$data.content_title}直播频道</title>
    <meta name="keywords" content="{$data.content_title}直播">
    <link rel="stylesheet" href="{$config_siteurl}statics/live/join.css">
    <link href="{$config_siteurl}statics/live/jiathis_share.css" rel="stylesheet" type="text/css">
    <template file="Pubservice/Common/_cssjs"/>
<body class="widescreen-1600"><link href="{$config_siteurl}statics/live/jiathis_share.css" rel="stylesheet" type="text/css"><iframe frameborder="0" style="position: absolute; display: none; opacity: 0;" src="{$config_siteurl}statics/live/saved_resource.html"></iframe><div class="jiathis_style" style="position: absolute; z-index: 1000000000; display: none; top: 50%; left: 50%; overflow: auto;"></div><div class="jiathis_style" style="position: absolute; z-index: 1000000000; display: none; overflow: auto;"></div><iframe frameborder="0" src="{$config_siteurl}statics/live/jiathis_utility.html" style="display: none;"></iframe>
<template file="Pubservice/Common/_head"/>
        
        <section class="watch-container">
        <div class="watch-header inner-center">
        <h3>{$data.content_title}<span class="tag-webinar-type">{$data.subtitle}</span>
                <div class="fr watch-pv">{$data.host_unitunit}</div>
            </h3>
        <div class="clearfix block-userinfo">
        <div class="fl">播主：<span><a class="v-blue" target="_blank" href="http://e.vhall.com/user/home/12371268">{$username}</a></span>&nbsp;&nbsp;&nbsp;&nbsp;</div>
        <div class="fl">直播时间：{$data.start_time}</div>
        <div class="fr head-r-toolbar share-toolbar" style="margin-right:0;">
           <div>
           <div class="bshare-custom">
               <a title="分享到新浪微博" class="bshare-sinaminiblog"></a><a title="分享到微信" class="bshare-weixin"></a><a title="分享到腾讯微博" class="bshare-qqmb"></a><a title="分享到QQ好友" class="bshare-qqim"></a><a title="分享到百度空间" class="bshare-baiduhi"></a><a title="分享到网易微博" class="bshare-neteasemb"></a><a title="分享到QQ空间" class="bshare-qzone"></a><a title="更多平台" class="bshare-more bshare-more-icon more-style-addthis"></a><span class="BSHARE_COUNT bshare-share-count">0</span>
           </div>
               <script type="text/javascript" charset="utf-8" src="http://static.bshare.cn/b/buttonLite.js#style=-1&amp;uuid=&amp;pophcol=1&amp;lang=zh"></script>
               <script type="text/javascript" charset="utf-8" src="http://static.bshare.cn/b/bshareC0.js"></script>
           </div>
            <div class="live-share-popbox">
                <span class="live-share-popbox-angluar"></span>
                <em></em>
                <!--<div>-->
                    <!--<div class="live-share-popbox-scan">-->
                        <!--<span>手机扫码观看</span>
                        <img src="{$config_siteurl}statics/live/qr.png">-->
                    <!--</div>-->
                    <!--<div class="live-share-popbox-share-to">
                        <span>分享至</span>
                        <ul>
                            <li>
                                <a class="jiathis_button_weixin" href="javascript:;" title="分享到微信"><span class="jiathis_txt jiathis_separator jtico jtico_weixin"><img src="{$config_siteurl}statics/live/live-share-wechat.png"></span></a>
                            </li>
                            <li>
                                <a class="jiathis_button_tsina" href="javascript:;" title="分享到新浪微博"><span class="jiathis_txt jiathis_separator jtico jtico_tsina"><img src="{$config_siteurl}statics/live/live-share-weibo.png"></span></a>
                            </li>
                            <li>
                                <a class="jiathis_button_qzone" href="javascript:;" title="分享到QQ空间"><span class="jiathis_txt jiathis_separator jtico jtico_qzone"><img src="{$config_siteurl}statics/live/live-share-qq.png"></span></a>
                            </li>
                        </ul>
                    </div>-->
                <!--</div>-->
                <div class="live-share-popbox-share-link">
                    <div class="bshare-custom"><a title="分享到新浪微博" class="bshare-sinaminiblog"></a><a title="分享到微信" class="bshare-weixin"></a><a title="分享到腾讯微博" class="bshare-qqmb"></a><a title="分享到QQ好友" class="bshare-qqim"></a><a title="分享到百度空间" class="bshare-baiduhi"></a><a title="分享到网易微博" class="bshare-neteasemb"></a><a title="分享到QQ空间" class="bshare-qzone"></a><a title="更多平台" class="bshare-more bshare-more-icon more-style-addthis"></a><span class="BSHARE_COUNT bshare-share-count">0</span></div><script type="text/javascript" charset="utf-8" src="http://static.bshare.cn/b/buttonLite.js#style=-1&amp;uuid=&amp;pophcol=1&amp;lang=zh"></script><script type="text/javascript" charset="utf-8" src="http://static.bshare.cn/b/bshareC0.js"></script>
                        </div>
                    </div>
                </div>
            </div>
        </div>        
            <div class="watch-body inner-center">
            <div class="td watch-banner" style="">
                 <link href="//nos.netease.com/vod163/nep.min.css" rel="stylesheet">
                    
                    <video style="width:884px;height:630px;white-space:nowrap;float:left;" id="my-video" class="video-js " x-webkit-airplay="allow" webkit-playsinline controls poster="poster.png" preload="auto" width="640" height="360" data-setup="{}">
                        <source src="rtmp://v5677e48b.live.126.net/live/130f941c77f14df78ce3d0e48923e578" type="rtmp/flv">
                    </video>
                    <script src="//nos.netease.com/vod163/nep.min.js"></script>
                                <!--<img class="flash-video" src="{$config_siteurl}statics/live/51605e00da935f1315387087a4145d36.jpg" alt="TEDxSuzhou正念分享会“须臾现你”">             </div>-->
            <div class="td watch-timeago" style="height:630px;">
                                <h4 class="tac">距离直播开始还有</h4>
                <div class="timeRunner clearfix" data-enddate="2017-04-27 18:50:00" data-startdate="2017-04-22 17:47:10">
                    <li class="fl">
                        <p class="days" id="t_d">00</p>
                        <p class="time-ref">天</p>
                    </li>
                    <li class="fl">
                        <p class="hours" id="t_h">00</p>
                        <p class="time-ref">小时</p>
                    </li>
                    <li class="fl">
                        <p class="minutes" id="t_m">00</p>
                        <p class="time-ref">分钟</p>
                    </li>
                    <li class="fl">
                        <p class="seconds" id="t_s">00</p>
                        <p class="time-ref">秒</p>
                    </li>
                </div>
                <div class="tac ft18">已有&nbsp;<span class="error" id="total-regCount">{$data['totle_num']==0?2:$data['totle_num']}</span>&nbsp;人预约</div>
                                <div class="tac join-timeago-footer">
                                                            <p class="webinar-ref">免费活动</p>
                                    </div>
            </div>
        </div>
    </section>
    <section class="area-bottom-section">
        <div class="area-bottom inner-center clearfix">
            <div class="desc-area area-section">
                <div class="h3"><span>活动简介</span></div>
                <div class="desc" id="introduction" data-template-name="/webinar/introduction">
                    {$data.publish_content}
                </div>
            </div>                    
            <div class="desc-area area-section">
            <div class="h3"><span>评论</span></div>
                <template file="Pubservice/Common/comment"/>
            </div>
        </div>
    </section>
    <template file="Pubservice/Common/_foot"/>
<script>

function GetRTime(){
    var EndTime= new Date('<?=$data['start_time']?>');
    var NowTime = new Date();
    var t =EndTime.getTime() - NowTime.getTime();
    var d=0;
    var h=0;
    var m=0;
    var s=0;
    if(t>=0){
      d=Math.floor(t/1000/60/60/24);
      h=Math.floor(t/1000/60/60%24);
      m=Math.floor(t/1000/60%60);
      s=Math.floor(t/1000%60);
    }


    document.getElementById("t_d").innerHTML = d;
    document.getElementById("t_h").innerHTML = h;
    document.getElementById("t_m").innerHTML = m ;
    document.getElementById("t_s").innerHTML = s ;
  }
  setInterval(GetRTime,0)
</script>
 
