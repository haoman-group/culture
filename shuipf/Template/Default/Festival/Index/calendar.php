<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <title>日程安排山西艺术节</title>
    <link rel="stylesheet" type="text/css" href="{$config_siteurl}statics/cu/css/base.css" />
    <link rel="stylesheet" href="{$config_siteurl}statics/cu/bootstrap/bootstrap.min.css" />
    <link rel="stylesheet" href="{$config_siteurl}statics/cu/swiper/swiper.css" />
    <link rel="stylesheet" href="{$config_siteurl}statics/cu/font/font-awesome.css" />
    <link rel="stylesheet" href="{$config_siteurl}statics/cu/festival/css/index.css" />
    <script type="text/javascript" src="{$config_siteurl}statics/cu/jquery/jquery.min.js"></script>
    <script type="text/javascript" src="{$config_siteurl}statics/cu/bootstrap/bootstrap.min.js"></script>
    <script type="text/javascript" src="{$config_siteurl}statics/cu/swiper/swiper.min.js"></script>
    <script type="text/javascript" src="{$config_siteurl}statics/cu/festival/js/index.js"></script>
    <style>
        table {border:2px solid #000;margin:80px 0 50px 0;}
        table th{border:1px solid #000;}
        table td{border:1px solid #000;}
    </style>
</head>
<body>
<div class="container-fluid">
    <div class="header">
        <div class="container">
            <!-- <img class="logo" src="{$config_siteurl}statics/cu/festival/images/icon/logo.png" alt="山西艺术节"> -->
            <h1 class="logo-text">日程安排<span>Event display</span></h1>
        </div>
    </div>
    <div class="content">
        <div class="container">
            <div class="recommend-img">
                <div class="recommend-txt">
                    <h4>山西艺术节日程安排</h4>
                    <!-- <span style="margin-top:20px;">{$data['addtime']}   来源：{$data['source']}   浏览：{$data['hits']}次</span> -->
                    <span style="margin-top:-27px;"><if condition="$data.start_date neq ''">活动时间:2017-8-16 至 2017-09-26 </if> </span>
                    
                </div>
            </div>
            <table>
                <thead>
                    <tr>
                        <th style="width:100px;"></th>
                        <volist name="sites" id="si">
                        <th style="">{$si}</th>
                        </volist>
                    </tr>
                </thead>
                <tbody>
                    <volist name="data" id="vo">
                        <tr>
                            <td>{$key|date="Y-m-d",###}</td>
                            <volist name="sites" id="sss">
                             <td>
                                <volist name="vo" id="voo">
                                   <if condition="$voo['site'] eq $sss">{$voo.title}</if>
                                </volist>
                            </td>
                            </volist>
                        </tr>
                    </volist>
                </tbody>
            </table>
                
            <div class="bshare-custom icon-medium-plus" style="text-align: right;"><a title="分享到" href="http://www.bShare.cn/" id="bshare-shareto" class="bshare-more">分享到</a><a title="分享到新浪微博" class="bshare-sinaminiblog"></a><a title="分享到微信" class="bshare-weixin"></a><a title="分享到QQ好友" class="bshare-qqim"></a><a title="分享到QQ空间" class="bshare-qzone"></a><a title="分享到腾讯微博" class="bshare-qqmb"></a><a title="更多平台" class="bshare-more bshare-more-icon more-style-addthis"></a><span class="BSHARE_COUNT bshare-share-count">0</span></div><script type="text/javascript" charset="utf-8" src="http://static.bshare.cn/b/buttonLite.js#style=-1&amp;uuid=&amp;pophcol=2&amp;lang=zh"></script><script type="text/javascript" charset="utf-8" src="http://static.bshare.cn/b/bshareC0.js"></script>
        </div>
    </div>
</div>
<template file="Pubservice/Common/_foot"/>
</body>
</html>
<if condition ="$data['vodie']  neq '' ">
<script type="text/javascript" src="{$config_siteurl}statics/js/viewer/viewer.min.js"></script>
        <script>
            $('.images-viewer').viewer({url:"data-origin-src"});            
        </script>
</if>
