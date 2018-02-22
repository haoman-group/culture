<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <title>媒体报道-山西艺术节</title>
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
            <h1 class="logo-text">媒体报道<span>List details</span></h1>
        </div>
    </div>
    <div class="content">
        <div class="container">
            <div class="recommend-tit">
                <span>List details</span><br>媒体报道
            </div>
            <div class="recommend-lists">
                <ul>
                <volist name="data" id="vo">
                    <li>
                        <a  target="_blank" href="{:U('Recommend/show',array('id'=>$vo['id']))}"><img src="{:thumb($vo['image'],100,88,1)}" alt="" style="width:100px;height:88px;"></a>
                        <a  target="_blank" href="{$vo.url}" style="font-size:25px; margin-left:20px;">{$vo['title']}</a>
                        <p style="margin:10px 0 0 0;"><span>{$vo.updatetime} 来源:{$vo.source} </span></p>
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
