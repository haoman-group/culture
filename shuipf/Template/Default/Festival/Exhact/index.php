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
</head>
<body>
<div class="container-fluid">
    <div class="header">
        <div class="container">
            <!-- <img class="logo" src="{$config_siteurl}statics/cu/festival/images/icon/logo.png" alt="山西艺术节"> -->
            <h1 class="logo-text">精彩展览<span>The exhibition activities </span></h1>
        </div>
    </div>
    <div class="content">
        <div class="container">
            <div class="exh-title">
                <h6>The exhibition activities </h6>
                <h4>精彩展览</h4>
            </div>
            <div class="exh-lists">
            <volist name="data" id="vo">
                <dl class="clearfix">
                    <dt>
                        
                            <h4>{$vo['category']}</h4>

                            <volist name="vo['son']" id="son" offset="0" length="1">
                            <a href="{:U('festival/Recommend/show',array('id'=>$son['id']))}">
                            <img src="{:thumb($son['image'],390,240,1)}" alt="">
                            <p><?php echo mb_strcut($son['content'],0,100);?>...  </p>
                            </a>
                            </volist>
                        
                    </dt>
                    <dd>
                        <ul class="clearfix">
                        <volist name="vo['son']" id="s" offset="1" lenght="6">
                            <li>
                                <a href="{:U('festival/Recommend/show',array('id'=>$s['id']))}">
                                    <img src="{:thumb($s['image'],232,124,1)}" alt="">
                                </a>
                                <h6><?php echo mb_strcut($s['title'],0,20);?><span>山西网</span></h6>
                                <p>"<?php echo mb_strcut($s['title'],0,20);?>"精品书法展</p>
                            </li>
                          </volist>
                           
                         
                          
                          
                        </ul>
                    </dd>
                </dl>
                </volist>
                <!--<dl class="clearfix">
                    <dt>
                        <a href="javascript:void(0)">
                            <h4>时代华章——首届山西艺术节美术作品展</h4>
                            <img src="{$config_siteurl}statics/cu/festival/images/exh/01.jpg" alt="">
                            <p>为充分展示近年来我国美术创作的丰硕成果，彰显中华民族文化的鲜...  </p>
                        </a>
                    </dt>
                    <dd>
                        <ul class="clearfix">
                            <li>
                                <a href="javascript:void(0)">
                                    <img src="{$config_siteurl}statics/cu/festival/images/exh/02.jpg" alt="">
                                </a>
                                <h6>刘正成书法展<span>山西网</span></h6>
                                <p>“江山寻绛”精品书法展</p>
                            </li>
                            <li>
                                <a href="javascript:void(0)">
                                    <img src="{$config_siteurl}statics/cu/festival/images/exh/02.jpg" alt="">
                                </a>
                                <h6>刘正成书法展<span>山西网</span></h6>
                                <p>“江山寻绛”精品书法展</p>
                            </li>
                            <li>
                                <a href="javascript:void(0)">
                                    <img src="{$config_siteurl}statics/cu/festival/images/exh/02.jpg" alt="">
                                </a>
                                <h6>刘正成书法展<span>山西网</span></h6>
                                <p>“江山寻绛”精品书法展</p>
                            </li>
                            <li>
                                <a href="javascript:void(0)">
                                    <img src="{$config_siteurl}statics/cu/festival/images/exh/02.jpg" alt="">
                                </a>
                                <h6>刘正成书法展<span>山西网</span></h6>
                                <p>“江山寻绛”精品书法展</p>
                            </li>
                            <li>
                                <a href="javascript:void(0)">
                                    <img src="{$config_siteurl}statics/cu/festival/images/exh/02.jpg" alt="">
                                </a>
                                <h6>刘正成书法展<span>山西网</span></h6>
                                <p>“江山寻绛”精品书法展</p>
                            </li>
                            <li>
                                <a href="javascript:void(0)">
                                    <img src="{$config_siteurl}statics/cu/festival/images/exh/02.jpg" alt="">
                                </a>
                                <h6>刘正成书法展<span>山西网</span></h6>
                                <p>“江山寻绛”精品书法展</p>
                            </li>
                        </ul>
                    </dd>
                </dl>-->
                <!--<dl class="clearfix">
                    <dt>
                        <a href="javascript:void(0)">
                            <h4>时代华章——首届山西艺术节美术作品展</h4>
                            <img src="{$config_siteurl}statics/cu/festival/images/exh/01.jpg" alt="">
                            <p>为充分展示近年来我国美术创作的丰硕成果，彰显中华民族文化的鲜...  </p>
                        </a>
                    </dt>
                    <dd>
                        <ul class="clearfix">
                            <li>
                                <a href="javascript:void(0)">
                                    <img src="{$config_siteurl}statics/cu/festival/images/exh/02.jpg" alt="">
                                </a>
                                <h6>刘正成书法展<span>山西网</span></h6>
                                <p>“江山寻绛”精品书法展</p>
                            </li>
                            <li>
                                <a href="javascript:void(0)">
                                    <img src="{$config_siteurl}statics/cu/festival/images/exh/02.jpg" alt="">
                                </a>
                                <h6>刘正成书法展<span>山西网</span></h6>
                                <p>“江山寻绛”精品书法展</p>
                            </li>
                            <li>
                                <a href="javascript:void(0)">
                                    <img src="{$config_siteurl}statics/cu/festival/images/exh/02.jpg" alt="">
                                </a>
                                <h6>刘正成书法展<span>山西网</span></h6>
                                <p>“江山寻绛”精品书法展</p>
                            </li>
                            <li>
                                <a href="javascript:void(0)">
                                    <img src="{$config_siteurl}statics/cu/festival/images/exh/02.jpg" alt="">
                                </a>
                                <h6>刘正成书法展<span>山西网</span></h6>
                                <p>“江山寻绛”精品书法展</p>
                            </li>
                            <li>
                                <a href="javascript:void(0)">
                                    <img src="{$config_siteurl}statics/cu/festival/images/exh/02.jpg" alt="">
                                </a>
                                <h6>刘正成书法展<span>山西网</span></h6>
                                <p>“江山寻绛”精品书法展</p>
                            </li>
                            <li>
                                <a href="javascript:void(0)">
                                    <img src="{$config_siteurl}statics/cu/festival/images/exh/02.jpg" alt="">
                                </a>
                                <h6>刘正成书法展<span>山西网</span></h6>
                                <p>“江山寻绛”精品书法展</p>
                            </li>
                        </ul>
                    </dd>
                </dl>-->
                <!--<dl class="clearfix">
                    <dt>
                        <a href="javascript:void(0)">
                            <h4>时代华章——首届山西艺术节美术作品展</h4>
                            <img src="{$config_siteurl}statics/cu/festival/images/exh/01.jpg" alt="">
                            <p>为充分展示近年来我国美术创作的丰硕成果，彰显中华民族文化的鲜...  </p>
                        </a>
                    </dt>
                    <dd>
                        <ul class="clearfix">
                            <li>
                                <a href="javascript:void(0)">
                                    <img src="{$config_siteurl}statics/cu/festival/images/exh/02.jpg" alt="">
                                </a>
                                <h6>刘正成书法展<span>山西网</span></h6>
                                <p>“江山寻绛”精品书法展</p>
                            </li>
                            <li>
                                <a href="javascript:void(0)">
                                    <img src="{$config_siteurl}statics/cu/festival/images/exh/02.jpg" alt="">
                                </a>
                                <h6>刘正成书法展<span>山西网</span></h6>
                                <p>“江山寻绛”精品书法展</p>
                            </li>
                            <li>
                                <a href="javascript:void(0)">
                                    <img src="{$config_siteurl}statics/cu/festival/images/exh/02.jpg" alt="">
                                </a>
                                <h6>刘正成书法展<span>山西网</span></h6>
                                <p>“江山寻绛”精品书法展</p>
                            </li>
                            <li>
                                <a href="javascript:void(0)">
                                    <img src="{$config_siteurl}statics/cu/festival/images/exh/02.jpg" alt="">
                                </a>
                                <h6>刘正成书法展<span>山西网</span></h6>
                                <p>“江山寻绛”精品书法展</p>
                            </li>
                            <li>
                                <a href="javascript:void(0)">
                                    <img src="{$config_siteurl}statics/cu/festival/images/exh/02.jpg" alt="">
                                </a>
                                <h6>刘正成书法展<span>山西网</span></h6>
                                <p>“江山寻绛”精品书法展</p>
                            </li>
                            <li>
                                <a href="javascript:void(0)">
                                    <img src="{$config_siteurl}statics/cu/festival/images/exh/02.jpg" alt="">
                                </a>
                                <h6>刘正成书法展<span>山西网</span></h6>
                                <p>“江山寻绛”精品书法展</p>
                            </li>
                        </ul>
                    </dd>
                </dl>-->
                <!--<dl class="clearfix">
                    <dt>
                        <a href="javascript:void(0)">
                            <h4>时代华章——首届山西艺术节美术作品展</h4>
                            <img src="{$config_siteurl}statics/cu/festival/images/exh/01.jpg" alt="">
                            <p>为充分展示近年来我国美术创作的丰硕成果，彰显中华民族文化的鲜...  </p>
                        </a>
                    </dt>
                    <dd>
                        <ul class="clearfix">
                            <li>
                                <a href="javascript:void(0)">
                                    <img src="{$config_siteurl}statics/cu/festival/images/exh/02.jpg" alt="">
                                </a>
                                <h6>刘正成书法展<span>山西网</span></h6>
                                <p>“江山寻绛”精品书法展</p>
                            </li>
                            <li>
                                <a href="javascript:void(0)">
                                    <img src="{$config_siteurl}statics/cu/festival/images/exh/02.jpg" alt="">
                                </a>
                                <h6>刘正成书法展<span>山西网</span></h6>
                                <p>“江山寻绛”精品书法展</p>
                            </li>
                            <li>
                                <a href="javascript:void(0)">
                                    <img src="{$config_siteurl}statics/cu/festival/images/exh/02.jpg" alt="">
                                </a>
                                <h6>刘正成书法展<span>山西网</span></h6>
                                <p>“江山寻绛”精品书法展</p>
                            </li>
                            <li>
                                <a href="javascript:void(0)">
                                    <img src="{$config_siteurl}statics/cu/festival/images/exh/02.jpg" alt="">
                                </a>
                                <h6>刘正成书法展<span>山西网</span></h6>
                                <p>“江山寻绛”精品书法展</p>
                            </li>
                            <li>
                                <a href="javascript:void(0)">
                                    <img src="{$config_siteurl}statics/cu/festival/images/exh/02.jpg" alt="">
                                </a>
                                <h6>刘正成书法展<span>山西网</span></h6>
                                <p>“江山寻绛”精品书法展</p>
                            </li>
                            <li>
                                <a href="javascript:void(0)">
                                    <img src="{$config_siteurl}statics/cu/festival/images/exh/02.jpg" alt="">
                                </a>
                                <h6>刘正成书法展<span>山西网</span></h6>
                                <p>“江山寻绛”精品书法展</p>
                            </li>
                        </ul>
                    </dd>
                </dl>-->
                <!--<dl class="clearfix">
                    <dt>
                        <a href="javascript:void(0)">
                            <h4>时代华章——首届山西艺术节美术作品展</h4>
                            <img src="{$config_siteurl}statics/cu/festival/images/exh/01.jpg" alt="">
                            <p>为充分展示近年来我国美术创作的丰硕成果，彰显中华民族文化的鲜...  </p>
                        </a>
                    </dt>
                    <dd>
                        <ul class="clearfix">
                            <li>
                                <a href="javascript:void(0)">
                                    <img src="{$config_siteurl}statics/cu/festival/images/exh/02.jpg" alt="">
                                </a>
                                <h6>刘正成书法展<span>山西网</span></h6>
                                <p>“江山寻绛”精品书法展</p>
                            </li>
                            <li>
                                <a href="javascript:void(0)">
                                    <img src="{$config_siteurl}statics/cu/festival/images/exh/02.jpg" alt="">
                                </a>
                                <h6>刘正成书法展<span>山西网</span></h6>
                                <p>“江山寻绛”精品书法展</p>
                            </li>
                            <li>
                                <a href="javascript:void(0)">
                                    <img src="{$config_siteurl}statics/cu/festival/images/exh/02.jpg" alt="">
                                </a>
                                <h6>刘正成书法展<span>山西网</span></h6>
                                <p>“江山寻绛”精品书法展</p>
                            </li>
                            <li>
                                <a href="javascript:void(0)">
                                    <img src="{$config_siteurl}statics/cu/festival/images/exh/02.jpg" alt="">
                                </a>
                                <h6>刘正成书法展<span>山西网</span></h6>
                                <p>“江山寻绛”精品书法展</p>
                            </li>
                            <li>
                                <a href="javascript:void(0)">
                                    <img src="{$config_siteurl}statics/cu/festival/images/exh/02.jpg" alt="">
                                </a>
                                <h6>刘正成书法展<span>山西网</span></h6>
                                <p>“江山寻绛”精品书法展</p>
                            </li>
                            <li>
                                <a href="javascript:void(0)">
                                    <img src="{$config_siteurl}statics/cu/festival/images/exh/02.jpg" alt="">
                                </a>
                                <h6>刘正成书法展<span>山西网</span></h6>
                                <p>“江山寻绛”精品书法展</p>
                            </li>
                        </ul>
                    </dd>
                </dl>-->
            </div>
        </div>
    </div>
</div>
<template file="Pubservice/Common/_foot"/>
</body>
</html>
