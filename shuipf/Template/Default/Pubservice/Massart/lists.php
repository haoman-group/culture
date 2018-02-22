<!DOCTYPE html>
<html>

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <!--<meta name="viewport" content="width=device-width, initial-scale=1">-->
         <meta name= "viewport" content= "width=device-width" initial-scale="1" minimum-scale="1" maximum-scale="1">
        <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
        <title>{$cateName}-群众文艺</title>
        <template file="Pubservice/Common/_cssjs"/>
        <link rel="stylesheet" href="{$config_siteurl}statics/cu/css/base.css" />

        <link rel="stylesheet" href="{$config_siteurl}statics/cu/css/pub-volunteer.css" />
        <!-- <link rel="stylesheet" href="{$config_siteurl}statics/cu/swiper/idangerous.swiper.css" /> -->
        <!--分类选择插件-->
        <script type="text/javascript" src="{$config_siteurl}statics/cu/js/category_select.js"></script>
        <!-- <script type="text/javascript" src="{$config_siteurl}statics/cu/swiper/idangerous.swiper.min.js"></script> -->
        <script src="{$config_siteurl}statics/cu/js/layerslide1.js"></script>
        <style>
        .whhd_PxList .whhd_PxListItem{
            min-height:270px;
        }
        .whhd_PxList .whhd_PxListItem .firstPage{
            height:160px;
            min-height:160px;
        }
        .whhd_PxList .whhd_PxListItem button{
            margin:0 auto;display:block;width:150px;
        }
        </style>
        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
      <script src="//cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="//cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    </head>

    <body>
        <div class="wrap">
            <template file="Pubservice/Common/_head"/>
            <div id="nav">
                <div class="container">
                    <ul>
                        <li>
                            <a href="{$config_siteurl}" class="home_src">首页</a>
                        </li>
                        <li>
                            <span>></span>
                        </li>
                        <li>
                            <a href="{:U('index')}">群众文艺</a>
                        </li>
                        <li>
                            <span>></span>
                        </li>
                        <li>
                            <a href="###">{$cateName}</a>
                        </li>
                    </ul>
                    <form action="" method="get" target="_blank">
                        <input type="hidden" name="m" value="search"/>
                        <input type="hidden" name="g" value="Pubservice"/>
                        <input type="hidden" name="a" value="index"/>
                        <div class="searbox">
                            <input type="text" placeholder="输入您要搜索的关键词" value=""  name="kw"/>
                            <input type="submit" id="button" value="" class="ggwh_SearchBtn" style="border: none;float:right;width:40px;right:0px !important">
                            <i style="color:#962626" class="fa fa-search"></i>
                        </div>
                    </form>
                </div>
            </div>
            <div class="ggwh_Content">
                <div class="stag-all">
                    <div class="stag-nav clearfix">
                        <span>全部剧集</span>
                        <ul class="clearfix">
                            <li class=<?php echo isset($_GET['session'])?'':'active';?>><a href="{:U('lists',['cate'=>$cate])}">全部</a></li>
                            <volist name="sessions" id="se">
                            <li class="<?php echo $_GET['session'] == $se?'active':'';?>"><a href="{:U('lists',['cate'=>$cate,'session'=>$se])}">第{$se}届</a></li>
                            </volist>
                        </ul>
                    </div>
                    <div class="stag-con">
                        <ul class="clearfix">
                            <volist name="data" id="vo">
                            <li>
                                <a href="{:U('show',['id'=>$vo['id']])}"><img src="{:thumb($vo['cover'],283,184)}" alt=""><i>第{$vo.session}届</i></a>
                                <h6>{$vo.title}</h6>
                            </li>
                            </volist>
                            <!-- <li>
                                <a href="javascript:void(0)"><img src="{$config_siteurl}statics/cu/festival/images/stage/02.png" alt=""><i>第十四届</i></a>
                                <h6>绛州鼓乐《杨门女将》</h6>
                            </li>
                            <li>
                                <a href="javascript:void(0)"><img src="{$config_siteurl}statics/cu/festival/images/stage/02.png" alt=""><i>第十四届</i></a>
                                <h6>绛州鼓乐《杨门女将》</h6>
                            </li>
                            <li>
                                <a href="javascript:void(0)"><img src="{$config_siteurl}statics/cu/festival/images/stage/02.png" alt=""><i>第十四届</i></a>
                                <h6>绛州鼓乐《杨门女将》</h6>
                            </li>
                            <li>
                                <a href="javascript:void(0)"><img src="{$config_siteurl}statics/cu/festival/images/stage/02.png" alt=""><i>第十四届</i></a>
                                <h6>绛州鼓乐《杨门女将》</h6>
                            </li>
                            <li>
                                <a href="javascript:void(0)"><img src="{$config_siteurl}statics/cu/festival/images/stage/02.png" alt=""><i>第十四届</i></a>
                                <h6>绛州鼓乐《杨门女将》</h6>
                            </li>
                            <li>
                                <a href="javascript:void(0)"><img src="{$config_siteurl}statics/cu/festival/images/stage/02.png" alt=""><i>第十四届</i></a>
                                <h6>绛州鼓乐《杨门女将》</h6>
                            </li>
                            <li>
                                <a href="javascript:void(0)"><img src="{$config_siteurl}statics/cu/festival/images/stage/02.png" alt=""><i>第十四届</i></a>
                                <h6>绛州鼓乐《杨门女将》</h6>
                            </li>
                            <li>
                                <a href="javascript:void(0)"><img src="{$config_siteurl}statics/cu/festival/images/stage/02.png" alt=""><i>第十四届</i></a>
                                <h6>绛州鼓乐《杨门女将》</h6>
                            </li>
                            <li>
                                <a href="javascript:void(0)"><img src="{$config_siteurl}statics/cu/festival/images/stage/02.png" alt=""><i>第十四届</i></a>
                                <h6>绛州鼓乐《杨门女将》</h6>
                            </li>
                            <li>
                                <a href="javascript:void(0)"><img src="{$config_siteurl}statics/cu/festival/images/stage/02.png" alt=""><i>第十四届</i></a>
                                <h6>绛州鼓乐《杨门女将》</h6>
                            </li>
                            <li>
                                <a href="javascript:void(0)"><img src="{$config_siteurl}statics/cu/festival/images/stage/02.png" alt=""><i>第十四届</i></a>
                                <h6>绛州鼓乐《杨门女将》</h6>
                            </li>
                            <li>
                                <a href="javascript:void(0)"><img src="{$config_siteurl}statics/cu/festival/images/stage/02.png" alt=""><i>第十四届</i></a>
                                <h6>绛州鼓乐《杨门女将》</h6>
                            </li>
                            <li>
                                <a href="javascript:void(0)"><img src="{$config_siteurl}statics/cu/festival/images/stage/02.png" alt=""><i>第十四届</i></a>
                                <h6>绛州鼓乐《杨门女将》</h6>
                            </li>
                            <li>
                                <a href="javascript:void(0)"><img src="{$config_siteurl}statics/cu/festival/images/stage/02.png" alt=""><i>第十四届</i></a>
                                <h6>绛州鼓乐《杨门女将》</h6>
                            </li>
                            <li>
                                <a href="javascript:void(0)"><img src="{$config_siteurl}statics/cu/festival/images/stage/02.png" alt=""><i>第十四届</i></a>
                                <h6>绛州鼓乐《杨门女将》</h6>
                            </li> -->
                        </ul>
                    </div>
                    <div class="page">
                        {$page}
                    </div>
                    <div class="stag-nav clearfix">
                        <span>其他图集</span>
                        <ul class="clearfix">
                            <!-- <li class="active"><a href="javascript:void(0)">全部</a></li>
                            <li><a href="javascript:void(0)">第十四届</a></li>
                            <li><a href="javascript:void(0)">第十五届</a></li>
                            <li><a href="javascript:void(0)">第十六届</a></li>
                            <li><a href="javascript:void(0)">第十七届</a></li> -->
                        </ul>
                    </div>
                    <div class="stag-img">
                        <div class="swiper-container swiper-container-horizontal" style="width: 1108px">
                            <div class="swiper-wrapper">
                                <volist name="position" id="po">
                                <div class="swiper-slide">
                                    <a href="{:U('show',['id'=>$po['id']])}">
                                        <img src="{:thumb($po['cover'],270,184)}" alt="">
                                        <p><span>{$po.title}</span><i>第{$po.session}届</i></p>
                                    </a>
                                </div>
                                </volist>
                                <!-- <div class="swiper-slide">
                                    <a href="javascript:void(0)">
                                        <img src="{$config_siteurl}statics/cu/festival/images/stage/02.png" alt="">
                                        <p><span>曲艺-鼓曲神韵</span><i>第十五届</i></p>
                                    </a>
                                </div>
                                <div class="swiper-slide">
                                    <a href="javascript:void(0)">
                                        <img src="{$config_siteurl}statics/cu/festival/images/stage/02.png" alt="">
                                        <p><span>曲艺-鼓曲神韵</span><i>第十五届</i></p>
                                    </a>
                                </div>
                                <div class="swiper-slide">
                                    <a href="javascript:void(0)">
                                        <img src="{$config_siteurl}statics/cu/festival/images/stage/02.png" alt="">
                                        <p><span>曲艺-鼓曲神韵</span><i>第十五届</i></p>
                                    </a>
                                </div>
                                <div class="swiper-slide">
                                    <a href="javascript:void(0)">
                                        <img src="{$config_siteurl}statics/cu/festival/images/stage/02.png" alt="">
                                        <p><span>曲艺-鼓曲神韵</span><i>第十五届</i></p>
                                    </a>
                                </div>
                                <div class="swiper-slide">
                                    <a href="javascript:void(0)">
                                        <img src="{$config_siteurl}statics/cu/festival/images/stage/02.png" alt="">
                                        <p><span>曲艺-鼓曲神韵</span><i>第十五届</i></p>
                                    </a>
                                </div>
                                <div class="swiper-slide">
                                    <a href="javascript:void(0)">
                                        <img src="{$config_siteurl}statics/cu/festival/images/stage/02.png" alt="">
                                        <p><span>曲艺-鼓曲神韵</span><i>第十五届</i></p>
                                    </a>
                                </div>
                                <div class="swiper-slide">
                                    <a href="javascript:void(0)">
                                        <img src="{$config_siteurl}statics/cu/festival/images/stage/02.png" alt="">
                                        <p><span>曲艺-鼓曲神韵</span><i>第十五届</i></p>
                                    </a>
                                </div>
                                <div class="swiper-slide">
                                    <a href="javascript:void(0)">
                                        <img src="{$config_siteurl}statics/cu/festival/images/stage/02.png" alt="">
                                        <p><span>曲艺-鼓曲神韵</span><i>第十五届</i></p>
                                    </a>
                                </div>
                                <div class="swiper-slide">
                                    <a href="javascript:void(0)">
                                        <img src="{$config_siteurl}statics/cu/festival/images/stage/02.png" alt="">
                                        <p><span>曲艺-鼓曲神韵</span><i>第十五届</i></p>
                                    </a>
                                </div>
                                <div class="swiper-slide">
                                    <a href="javascript:void(0)">
                                        <img src="{$config_siteurl}statics/cu/festival/images/stage/02.png" alt="">
                                        <p><span>曲艺-鼓曲神韵</span><i>第十五届</i></p>
                                    </a>
                                </div> -->
                            </div>
                            <!-- Add Pagination -->
                            <!-- <div class="swiper-pagination"></div> -->
                        </div>
                        <div class="swiper-button-prev" style="width: 17px; height: 24px;margin-top: -12px;background-image: url({$config_siteurl}statics/cu/images/massart/014.png);background-size: 17px 24px;"></div>
                        <div class="swiper-button-next" style="width: 17px; height: 24px;margin-top: -12px;background-image: url({$config_siteurl}statics/cu/images/massart/013.png);background-size: 17px 24px;"></div>
                    </div>
                    <script>
                        var swiper = new Swiper('.swiper-container', {
                            // pagination: '.swiper-pagination',
                            slidesPerView: 4,
                            // paginationClickable: true,
                            spaceBetween: 0,
                            prevButton:'.swiper-button-prev',
                            nextButton:'.swiper-button-next',
                        });
                    </script>
                </div>
            </div>
            <template file="Pubservice/Common/_foot"/>
        </div>
    </body>

</html>
