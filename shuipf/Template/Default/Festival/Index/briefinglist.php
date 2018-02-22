<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <title>列表详情-山西艺术节</title>
    <link rel="stylesheet" type="text/css" href="{$config_siteurl}statics/cu/css/base.css" />
    <link rel="stylesheet" href="{$config_siteurl}statics/cu/bootstrap/bootstrap.min.css" />
    <link rel="stylesheet" href="{$config_siteurl}statics/cu/swiper/swiper.css" />
    <link rel="stylesheet" href="{$config_siteurl}statics/cu/css/public-service.css" />
    <link rel="stylesheet" href="{$config_siteurl}statics/cu/font/font-awesome.css" />
    <link rel="stylesheet" href="{$config_siteurl}statics/cu/festival/css/index.css" />
    <script type="text/javascript" src="{$config_siteurl}statics/cu/jquery/jquery.min.js"></script>
    <script type="text/javascript" src="{$config_siteurl}statics/cu/bootstrap/bootstrap.min.js"></script>
    <script type="text/javascript" src="{$config_siteurl}statics/cu/swiper/swiper.min.js"></script>
    <script type="text/javascript" src="{$config_siteurl}statics/cu/festival/js/index.js"></script>
</head>
<body>
<div class="container-fluid">
    <div class="header">
        <div class="container">
            <!-- <img class="logo" src="{$config_siteurl}statics/cu/festival/images/icon/logo.png" alt="山西艺术节"> -->
            <h1 class="logo-text">演出活动新闻简报<span>List details</span></h1>
        </div>
    </div>
    <div class="content">
        <div class="container">
            <div class="recommend-tit">
                <span>List details</span><br>
                演出活动新闻简报
            </div>
            <div class="recommend-lists">
                <ul>
                <volist name="data" id="vo">
                    <li>
                        <dl class="clearfix">
                            <dt style="width:15px;height:auto;">{$key+1}</dt>
                            <dd style="margin-left:20px;">
                               <a  target="_blank" href="{:U('briefingshow',array('id'=>$vo['id']))}"> <h6>{$vo['title']}</h6></a>   
                                <!-- <a class="btn" href="javascript:void(0)"><img src="{$config_siteurl}statics/cu/festival/images/recommend/02.png" alt=""></a>
                                <a class="btn" href="javascript:void(0)"><img src="{$config_siteurl}statics/cu/festival/images/recommend/03.png" alt=""></a> -->
                            </dd>
                        </dl>
                    </li>
                    </volist>
                </ul>
            </div>
        </div>
    </div>
    <div class="page">
		{$pageinfo.page}
	</div>
</div>
<template file="Pubservice/Common/_foot"/>
</body>
</html>
