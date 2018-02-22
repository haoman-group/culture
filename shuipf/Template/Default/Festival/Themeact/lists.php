<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <title>主题性活动-山西艺术节</title>
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
            <h1 class="logo-text">列表详情<span>List details</span></h1>
        </div>
    </div>
    <div class="content">
        <div class="container">
            <div class="recommend-tit">
                <span>List details</span><br>{$name}
            </div>
            <div class="recommend-lists">
                <ul>
                <volist name="data" id="vo">
                    <li>
                        <dl class="clearfix">
                            <dt><a href="{:U('Recommend/show',array('id'=>$vo['id']))}"><img src="{:thumb($vo['image'],313,188,1)}" alt="" style="width:313px;height:188px;"></a></dt>
                            <dd>
                               <a href="{:U('Recommend/show',array('id'=>$vo['id']))}"> <h6>{$vo['title']}</h6></a>
                                <p><p style="word-wrap:break-word;text-indent:2em;"><?php echo  mb_strcut(strip_tags($vo['content']),0,230)?>...</p></p>
                                <span>{$vo.addtime} 来源:{$vo['source']}</span>
                                <!-- <a class="btn" href="javascript:void(0)"><img src="{$config_siteurl}statics/cu/festival/images/recommend/02.png" alt=""></a>
                                <a class="btn" href="javascript:void(0)"><img src="{$config_siteurl}statics/cu/festival/images/recommend/03.png" alt=""></a> -->
                            </dd>
                        </dl>
                    </li>
                    </volist>
                    <!--<li>
                        <dl class="clearfix">
                            <dt><a href="javascript:void(0)"><img src="{$config_siteurl}statics/cu/festival/images/recommend/01.jpg" alt=""></a></dt>
                            <dd>
                                <h6>舞剧《汉颂》亮相山西 精彩演绎中国汉文化</h6>
                                <p>据了解，舞剧《汉颂》将汉中历史与自然山水风采以及地域风情融汇贯通以散点式结构，选取体现汉中人文精粹、自然风貌、昭示汉文化精神的据了解，舞剧《汉颂》将汉中历史与自然山水风采以及地域风情融汇贯通以散点式结构，选取体现汉中人文精粹、自然风貌、昭示汉</p>
                                <span>来源:山西传媒</span>
                                <a class="btn" href="javascript:void(0)"><img src="{$config_siteurl}statics/cu/festival/images/recommend/02.png" alt=""></a>
                                <a class="btn" href="javascript:void(0)"><img src="{$config_siteurl}statics/cu/festival/images/recommend/03.png" alt=""></a>
                            </dd>
                        </dl>
                    </li>-->
                    <!--<li>
                        <dl class="clearfix">
                            <dt><a href="javascript:void(0)"><img src="{$config_siteurl}statics/cu/festival/images/recommend/01.jpg" alt=""></a></dt>
                            <dd>
                                <h6>舞剧《汉颂》亮相山西 精彩演绎中国汉文化</h6>
                                <p>据了解，舞剧《汉颂》将汉中历史与自然山水风采以及地域风情融汇贯通以散点式结构，选取体现汉中人文精粹、自然风貌、昭示汉文化精神的据了解，舞剧《汉颂》将汉中历史与自然山水风采以及地域风情融汇贯通以散点式结构，选取体现汉中人文精粹、自然风貌、昭示汉</p>
                                <span>来源:山西传媒</span>
                                <a class="btn" href="javascript:void(0)"><img src="{$config_siteurl}statics/cu/festival/images/recommend/02.png" alt=""></a>
                                <a class="btn" href="javascript:void(0)"><img src="{$config_siteurl}statics/cu/festival/images/recommend/03.png" alt=""></a>
                            </dd>
                        </dl>
                    </li>-->
                    <!--<li>
                        <dl class="clearfix">
                            <dt><a href="javascript:void(0)"><img src="{$config_siteurl}statics/cu/festival/images/recommend/01.jpg" alt=""></a></dt>
                            <dd>
                                <h6>舞剧《汉颂》亮相山西 精彩演绎中国汉文化</h6>
                                <p>据了解，舞剧《汉颂》将汉中历史与自然山水风采以及地域风情融汇贯通以散点式结构，选取体现汉中人文精粹、自然风貌、昭示汉文化精神的据了解，舞剧《汉颂》将汉中历史与自然山水风采以及地域风情融汇贯通以散点式结构，选取体现汉中人文精粹、自然风貌、昭示汉</p>
                                <span>来源:山西传媒</span>
                                <a class="btn" href="javascript:void(0)"><img src="{$config_siteurl}statics/cu/festival/images/recommend/02.png" alt=""></a>
                                <a class="btn" href="javascript:void(0)"><img src="{$config_siteurl}statics/cu/festival/images/recommend/03.png" alt=""></a>
                            </dd>
                        </dl>
                    </li>-->
                    <!--<li>
                        <dl class="clearfix">
                            <dt><a href="javascript:void(0)"><img src="{$config_siteurl}statics/cu/festival/images/recommend/01.jpg" alt=""></a></dt>
                            <dd>
                                <h6>舞剧《汉颂》亮相山西 精彩演绎中国汉文化</h6>
                                <p>据了解，舞剧《汉颂》将汉中历史与自然山水风采以及地域风情融汇贯通以散点式结构，选取体现汉中人文精粹、自然风貌、昭示汉文化精神的据了解，舞剧《汉颂》将汉中历史与自然山水风采以及地域风情融汇贯通以散点式结构，选取体现汉中人文精粹、自然风貌、昭示汉</p>
                                <span>来源:山西传媒</span>
                                <a class="btn" href="javascript:void(0)"><img src="{$config_siteurl}statics/cu/festival/images/recommend/02.png" alt=""></a>
                                <a class="btn" href="javascript:void(0)"><img src="{$config_siteurl}statics/cu/festival/images/recommend/03.png" alt=""></a>
                            </dd>
                        </dl>
                    </li>-->
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
