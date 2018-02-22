<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <title>山西艺术节</title>
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
             <!--<img class="logo" src="{$config_siteurl}statics/cu/festival/images/icon/logo.png" alt="山西艺术节"> -->
            
            
        </div>
    </div>
   
    <div class="content">
        <div class="container">
            <div class="recommend-img">
                <div class="recommend-txt">
                    <h4>{$data['title']}</h4>
                </div>
            </div>
            <p style="">
                {$data['content']}
            </p>  
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
