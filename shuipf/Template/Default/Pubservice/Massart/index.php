<!DOCTYPE html>
<html>

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <!--<meta name="viewport" content="width=device-width, initial-scale=1">-->
        <meta name= "viewport" content= "width=device-width" initial-scale="1" minimum-scale="1" maximum-scale="1">
        <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
        <title>群众文艺</title>
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
                            <a href="">群众文艺</a>
                        </li>
                    </ul>
                    <form action="" method="get" target="_blank">
                                <input type="hidden" name="m" value="search"/>
                                <input type="hidden" name="g" value="Pubservice"/>
                                <input type="hidden" name="a" value="index"/>
                        <div class="searbox">
                            <input type="text" placeholder="输入您要搜索的关键词" value=""  name="kw"/>
                            <input type="submit" id="button" value="" class="ggwh_SearchBtn" style="border: none;float:right;width:40px;right:0px !important"><i style="color:#962626" class="fa fa-search"></i>
                        </div>

                    </form>
                </div>
            </div>
            <div class="massart-f1">
                <div class="ggwh_Content">
                    <div class="massart-title clearfix">
                        <h4><img src="{$config_siteurl}statics/cu/images/massart/001.png" alt="">群星奖</h4>
                        <a href="{:U('lists',['cate'=>'star'])}">更多>> </a>
                    </div>
                    <div class="content">
                        <div class="f1-left">
                             <div class="pc-slide">
                                <div class="view">
                                    <div class="swiper-container">
                                        <div class="swiper-wrapper">
                                            <!-- <div class="swiper-slide">
                                                <a href="#"><img src="{$config_siteurl}statics/cu/images/massart/001.jpg" alt=""></a>
                                                <div class="desc">
                                                    <span>查看详情</span>
                                                    <h4>第十六届山西省曲艺类视频合集</h4>
                                                    <p>山西长治市艺术曲艺类”潞安鼓书《好婆婆》”</p>
                                                </div>
                                            </div> -->
                                            <!-- <div class="swiper-slide">
                                                <a href="#"><img src="{$config_siteurl}statics/cu/images/massart/001.jpg" alt=""></a>
                                            </div>
                                            <div class="swiper-slide">
                                                <a href="#"><img src="{$config_siteurl}statics/cu/images/massart/001.jpg" alt=""></a>
                                            </div>
                                            <div class="swiper-slide">
                                                <a href="#"><img src="{$config_siteurl}statics/cu/images/massart/001.jpg" alt=""></a>
                                            </div>
                                            <div class="swiper-slide">
                                                <a href="#"><img src="{$config_siteurl}statics/cu/images/massart/001.jpg" alt=""></a>
                                            </div> -->
                                            <volist name="star_slide" id="ss">
                                            <div class="swiper-slide">
                                                <a href="{:U('show',['id'=>$ss['id']])}" title="{$ss.title}">
                                                    <img src="{:thumb($ss['cover'],910,410,1)}" alt="{$ss.title}">
                                                    <div class="desc">
                                                        <span>查看详情</span>
                                                        <h4>{$ss.deputy_title}</h4>
                                                        <p>{$ss.title}</p>
                                                    </div>
                                                </a>
                                            </div>
                                            </volist>
                                        </div>
                                        <div class="swiper-pagination" style="bottom: 20px;"></div>
                                    </div>
                                </div>
                                <div class="preview">
                                    <div class="swiper-container">
                                        <div class="swiper-wrapper">
                                            <!-- <div class="swiper-slide active-nav">
                                                <img src="{$config_siteurl}statics/cu/images/massart/001.jpg" width="135" height="76" alt="">
                                            </div>
                                            <div class="swiper-slide">
                                                <img src="{$config_siteurl}statics/cu/images/massart/001.jpg" width="135" height="76" alt="">
                                            </div>
                                            <div class="swiper-slide">
                                                <img src="{$config_siteurl}statics/cu/images/massart/001.jpg" width="135" height="76" alt="">
                                            </div>
                                            <div class="swiper-slide">
                                                <img src="{$config_siteurl}statics/cu/images/massart/001.jpg" width="135" height="76" alt="">
                                            </div>
                                            <div class="swiper-slide">
                                                <img src="{$config_siteurl}statics/cu/images/massart/001.jpg" width="135" height="76" alt="">
                                            </div> -->
                                            <volist name="star_slide" id="ss1">
                                            <div class="swiper-slide slide6">
                                                <img src="{:thumb($ss1['cover'],135,76,1)}" width="135" height="76" alt="">
                                            </div>
                                            </volist>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <script>
                            var viewSwiper = new Swiper('.view .swiper-container', {
                                pagination : '.swiper-pagination',
                                paginationType : 'custom',
                                paginationCustomRender: function (swiper, current, total) {
                                    return '第' + current + '个 / 共' + total + '个';
                                },
                                onSlideChangeStart: function() {
                                    updateNavPosition()
                                }
                            })
                            var previewSwiper = new Swiper('.preview .swiper-container', {
                                visibilityFullFit: true,
                                slidesPerView: '4',
                                onClick: function(swiper) {
                                    viewSwiper.slideTo(previewSwiper.clickedIndex,300, true)
                                }
                            })

                            function updateNavPosition() {
                                $('.preview .active-nav').removeClass('active-nav')
                                var activeNav = $('.preview .swiper-slide').eq(viewSwiper.activeIndex).addClass('active-nav')
                                if (!activeNav.hasClass('swiper-slide-visible')) {
                                    if (activeNav.index() > previewSwiper.activeIndex) {
                                        var thumbsPerNav = Math.floor(previewSwiper.width / activeNav.width()) - 1
                                        previewSwiper.slideTo(activeNav.index() - thumbsPerNav)
                                    } else {
                                        previewSwiper.slideTo(activeNav.index())
                                    }
                                }
                            }
                            </script>
                        </div>
                        <div class="f1-right">
                            <div class="swiper-container swiper-container-horizontal">
                                <div class="swiper-wrapper" style="width:260px;margin:auto;">
                                    <volist name="star_list" id="sl">
                                        <div class="swiper-slide" style="margin-left:-3.5px;">第{$key}届</div>
                                    </volist>
                                    <!-- <div class="swiper-slide">首届</div>
                                    <div class="swiper-slide">第15届</div>
                                    <div class="swiper-slide">第16届</div>
                                    <div class="swiper-slide">第17届</div>
                                    <div class="swiper-slide">第18届</div>
                                    <div class="swiper-slide">第19届</div>
                                    <div class="swiper-slide">第20届</div>
                                    <div class="swiper-slide">第21届</div> -->
                                </div>
                                <!-- Add Pagination -->
                                <!-- <div class="swiper-pagination"></div> -->
                                <div class="swiper-button-prev swiper-button-white" style="width: 25px; height: 12px;margin-top: -6px;left: 4px;"></div>
                                <div class="swiper-button-next swiper-button-white" style="width: 25px; height: 12px;margin-top: -6px;right: 4px;"></div>
                            </div>
                            <script>
                                var swiper = new Swiper('.f1-right .swiper-container', {
                                    // pagination: '.swiper-pagination',
                                    slidesPerView: 4,
                                    // paginationClickable: true,
                                    spaceBetween: 0,
                                    prevButton:'.swiper-button-prev',
                                    nextButton:'.swiper-button-next',
                                });
                            </script>
                            <ul>
                                <volist name="star_list[14]" id="sl2" offset='0' length='6'>
                                <li>
                                    <a href="{:U('show',['id'=>$sl2['id']])}" title="{$sl2.title}">
                                        <h5>{$i}.{$sl2.title}</h5>
                                        <p>{$sl2.deputy_title}......</p>
                                    </a>
                                </li>
                                </volist>
                                <!-- <li>
                                    <a href="javascript:void(0)">
                                        <h5>2.独唱《E-mail飞出山沟沟》</h5>
                                        <p>农民歌唱家王飞歌曲燃爆全场......</p>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)">
                                        <h5>3.独唱《E-mail飞出山沟沟》</h5>
                                        <p>农民歌唱家王飞歌曲燃爆全场......</p>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)">
                                        <h5>4.独唱《E-mail飞出山沟沟》</h5>
                                        <p>农民歌唱家王飞歌曲燃爆全场......</p>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)">
                                        <h5>5.独唱《E-mail飞出山沟沟》</h5>
                                        <p>农民歌唱家王飞歌曲燃爆全场......</p>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)">
                                        <h5>6.独唱《E-mail飞出山沟沟》</h5>
                                        <p>农民歌唱家王飞歌曲燃爆全场......</p>
                                    </a>
                                </li> -->
                            </ul>
                            <div class="more"><a href="{:U('lists',['cate'=>'star'])}">更多</a></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="massart-f2">
                <div class="ggwh_Content">
                    <div class="massart-title clearfix">
                        <h4><img src="{$config_siteurl}statics/cu/images/massart/002.png" alt="">农民工歌手展演</h4>
                        <a href="{:U('Pubservice/Massart/lists',['cate'=>'star'])}">更多>> </a>
                    </div>
                    <div class="content">
                        <ul class="clearfix">
                            <li>
                                <dl>
                                    <dt>F</dt>
                                    <dd>
                                        <h4>第一届</h4>
                                        <span>isrt</span>
                                    </dd>
                                </dl>
                                <div class="list">
                                    <a class="img" href="{:U('show',['id'=>$worker_sing['0']['id']])}" title="{$worker_sing['0']['title']}">
                                        <img src="{:thumb($worker_sing['0']['cover'],347,209)}" alt="" />
                                        
                                        <p><?php echo mb_strcut($worker_sing['0']['title'],0,20);?>...<i>06：00</i></p>
                                    </a>
                                    <div class="text">
                                        <h5><?php echo mb_strcut($worker_sing['0']['content'],0,30);?>...</h5>
                                        <p>
                                            <label for="">{$worker_sing['0']['address']}</label>|
                                            <span>{$worker_sing['0']['hits']}人看过</span>
                                            <a href="javascript:void(0)" class="share"><img src="{$config_siteurl}statics/cu/images/massart/010.png" alt=""></a>
                                        </p>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <dl>
                                    <dt>S</dt>
                                    <dd>
                                        <h4>第二届</h4>
                                        <span>econd</span>
                                    </dd>
                                </dl>
                                <div class="list">
                                    <a class="img" href="{:U('show',['id'=>$worker_sing['1']['id']])}" title="{$worker_sing['1']['title']}">
                                        <img src="{:thumb($worker_sing['1']['cover'],347,209)}" alt="">
                                        <p><?php echo mb_strcut($worker_sing['1']['title'],0,20);?>...<i>06：00</i></p>
                                    </a>
                                    <div class="text">
                                        <h5><?php echo mb_strcut($worker_sing['1']['content'],0,30);?>...</h5>
                                        <p>
                                            <label for="">{$worker_sing['1']['address']}</label>|
                                            <span>{$worker_sing['1']['hits']}人看过</span>
                                            <a href="javascript:void(0)" class="share"><img src="{$config_siteurl}statics/cu/images/massart/010.png" alt=""></a>
                                        </p>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <dl>
                                    <dt>T</dt>
                                    <dd>
                                        <h4>第三届</h4>
                                        <span>hird</span>
                                    </dd>
                                </dl>
                                <div class="list">
                                    <a class="img" href="{:U('show',['id'=>$worker_sing['2']['id']])}" title="{$worker_sing['2']['title']}">
                                        <img src="{:thumb($worker_sing['2']['cover'],347,209)}" alt="">
                                        <p><?php echo mb_strcut($worker_sing['2']['title'],0,20);?>...<i>06：00</i></p>
                                    </a>
                                    <div class="text">
                                        <h5><?php echo mb_strcut($worker_sing['2']['content'],0,30);?>...</h5>
                                        <p>
                                            <label for="">{$worker_sing['2']['address']}</label>|
                                            <span>{$worker_sing['2']['hits']}人看过</span>
                                            <a href="javascript:void(0)" class="share"><img src="{$config_siteurl}statics/cu/images/massart/010.png" alt=""></a>
                                        </p>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="massart-f3">
                <div class="ggwh_Content">
                    <div class="massart-title clearfix">
                        <h4><img src="{$config_siteurl}statics/cu/images/massart/003.png" alt="">广场舞展演</h4>
                        <a href="javascript:void(0)">更多>> </a>
                    </div>
                    <div class="content">
                        <div class="f3-nav">
                            <ul class="clearfix">
                                <li class="active">
                                    <a href="javascript:void(0)">山西省首届<br>广场舞</a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)">山西省第二届<br>广场舞</a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)">山西省第三届<br>广场舞</a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)">山西省第四届<br>广场舞</a>
                                </li>
                            </ul>
                        </div>
                        <div class="items">
                            <div class="item" style="display: block;">
                                <dl class="clearfix">

                                    <dt>
                                        <a href="{:U('show',['id'=>$dance[0]['id']])}" title="{$dance[0]['title']}">
                                            <img src="{:thumb($dance[0]['cover'],465,314,1)}" alt="">
                                        </a>
                                        <p>{$dance[0]['title']}</p>
                                    </dt>
                                    <dd>
                                        <ul class="clearfix">
                                            <volist name="dance" id="da"  offset="1">
                                            <li>
                                                <a href="{:U('show',['id'=>$da['id']])}" title="{$da['title']}">
                                                    <img src="{:thumb($da['cover'],252,157,1)}" >
                                                </a>
                                            </li>
                                            </volist>
                                            <!-- <li>
                                                <a href="javascript:void(0)">
                                                    <img src="{$config_siteurl}statics/cu/images/massart/004.jpg" alt="">
                                                </a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0)">
                                                    <img src="{$config_siteurl}statics/cu/images/massart/004.jpg" alt="">
                                                </a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0)">
                                                    <img src="{$config_siteurl}statics/cu/images/massart/004.jpg" alt="">
                                                </a>
                                            </li> -->
                                        </ul>
                                    </dd>
                                </dl>
                            </div>
                            <div class="item">
                                <dl class="clearfix">
                                    <dt>
                                        <a href="javascript:void(0)">
                                            <img src="{$config_siteurl}statics/cu/images/massart/003.jpg" alt="">
                                        </a>
                                        <p>山西省首届大同赛区 广场舞</p>
                                    </dt>
                                    <dd>
                                        <ul class="clearfix">
                                            <li>
                                                <a href="javascript:void(0)">
                                                    <img src="{$config_siteurl}statics/cu/images/massart/004.jpg" alt="">
                                                </a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0)">
                                                    <img src="{$config_siteurl}statics/cu/images/massart/004.jpg" alt="">
                                                </a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0)">
                                                    <img src="{$config_siteurl}statics/cu/images/massart/004.jpg" alt="">
                                                </a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0)">
                                                    <img src="{$config_siteurl}statics/cu/images/massart/004.jpg" alt="">
                                                </a>
                                            </li>
                                        </ul>
                                    </dd>
                                </dl>
                            </div>
                            <div class="item">
                                <dl class="clearfix">
                                    <dt>
                                        <a href="javascript:void(0)">
                                            <img src="{$config_siteurl}statics/cu/images/massart/003.jpg" alt="">
                                        </a>
                                        <p>山西省首届大同赛区 广场舞</p>
                                    </dt>
                                    <dd>
                                        <ul class="clearfix">
                                            <li>
                                                <a href="javascript:void(0)">
                                                    <img src="{$config_siteurl}statics/cu/images/massart/004.jpg" alt="">
                                                </a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0)">
                                                    <img src="{$config_siteurl}statics/cu/images/massart/004.jpg" alt="">
                                                </a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0)">
                                                    <img src="{$config_siteurl}statics/cu/images/massart/004.jpg" alt="">
                                                </a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0)">
                                                    <img src="{$config_siteurl}statics/cu/images/massart/004.jpg" alt="">
                                                </a>
                                            </li>
                                        </ul>
                                    </dd>
                                </dl>
                            </div>
                            <div class="item">
                                <dl class="clearfix">
                                    <dt>
                                        <a href="javascript:void(0)">
                                            <img src="{$config_siteurl}statics/cu/images/massart/003.jpg" alt="">
                                        </a>
                                        <p>山西省首届大同赛区 广场舞</p>
                                    </dt>
                                    <dd>
                                        <ul class="clearfix">
                                            <li>
                                                <a href="javascript:void(0)">
                                                    <img src="{$config_siteurl}statics/cu/images/massart/004.jpg" alt="">
                                                </a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0)">
                                                    <img src="{$config_siteurl}statics/cu/images/massart/004.jpg" alt="">
                                                </a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0)">
                                                    <img src="{$config_siteurl}statics/cu/images/massart/004.jpg" alt="">
                                                </a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0)">
                                                    <img src="{$config_siteurl}statics/cu/images/massart/004.jpg" alt="">
                                                </a>
                                            </li>
                                        </ul>
                                    </dd>
                                </dl>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="massart-f4">
                <div class="ggwh_Content">
                    <div class="tit">
                        <img src="{$config_siteurl}statics/cu/images/massart/004.png" alt="">
                        网络 · 摄影展演
                    </div>
                    <div class="content">
                        <div class="layslidewrap">
                            <ul class="d_img" style="width: 970px;">
                                <li class="d_pos2" style="left: 0px; z-index: 2; top: 40px; width: 411px; height: 228px; opacity: 1;overflow: hidden;box-shadow: 0 0 29px 11px rgba(13,4,9,0.14)">
                                    <a href="{:U('show',['id'=>$photography[0]['id']])}" title="{$photography[0]['title']}">
                                        <img src="{:thumb($photography[0]['cover'],470,264,1)}" alt="">
                                    </a>
                                    <div class="img-txt">
                                        <h5>{$photography[0]['title']}</h5>
                                        <p>{$photography[0]['deputy_title']}</p>
                                    </div>
                                </li>
                                <li class="d_pos4" style="left: 250px; z-index: 3; top: 20px; width: 470px; height: 392px; opacity: 1;overflow: hidden;box-shadow: 0 0 29px 11px rgba(13,4,9,0.14)">
                                    <a href="{:U('show',['id'=>$photography[1]['id']])}" title="{$photography[1]['title']}">
                                        <img src="{:thumb($photography[1]['cover'],470,264,1)}" alt="">
                                        <div class="img-txt">
                                            <h5>{$photography[1]['title']}</h5>
                                            <p>{$photography[1]['deputy_title']}</p>
                                        </div>
                                    </a>
                                </li>
                                <li class="d_pos5" style="right: 0px; z-index: 2; top: 40px; width: 411px; height: 228px; opacity: 1;overflow: hidden;box-shadow: 0 0 29px 11px rgba(13,4,9,0.14)">
                                    <a href="{:U('show',['id'=>$photography[2]['id']])}" title="{$photography[2]['title']}">
                                        <img src="{:thumb($photography[2]['cover'],470,264,1)}" alt="">
                                        <div class="img-txt">
                                            <h5>{$photography[2]['title']}</h5>
                                            <p>{$photography[2]['deputy_title']}</p>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                            <ul class="d_menu">
                                <li class=""></li>
                                <li class="d_select"></li>
                                <li class=""></li>
                            </ul>
                            <p class="d_prev" style="margin-left: -558px;"><img src="{$config_siteurl}statics/cu/images/massart/prev.png" alt=""></p>
                            <p class="d_next" style="margin-left: 523px;"><img src="{$config_siteurl}statics/cu/images/massart/next.png" alt=""></p>
                        </div>
                        <div class="img-j">
                            <dl class="clearfix">
                                <dt>
                                    <h2>历届图集</h2>
                                    <a class="tab" href="javascript:void(0)">动物</a>
                                    <a class="tab" href="javascript:void(0)">人文</a>
                                    <a class="tab" href="javascript:void(0)">自然</a>
                                    <p>摄影家的能力是把日常生活中稍纵即逝的平凡事物转化为不朽的视觉图像</p>
                                    <a href="{:U('lists',['cate'=>'photography'])}" class="more">更多>></a>
                                </dt>
                                <dd>
                                    <ul class="clearfix">
                                        <volist name="photography" id="pgr" offset="3" length="4">
                                        <li>
                                            <a href="{:U('show',['id'=>$pgr['id']])}" title="{$pgr.title}">
                                                <img src="{:thumb($pgr['cover'],227,178)}" alt="" style="width:227px;height:178px;">
                                                <p><?php  echo  mb_substr($pgr['title'],0,11); ?></p>
                                            </a>
                                        </li>
                                        </volist>
                                        <!-- <li>
                                            <a href="javascript:void(0)">
                                                <img src="{$config_siteurl}statics/cu/images/massart/009.jpg" alt="">
                                                <p>第二届”视觉”杯动物世界 摄影展演</p>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0)">
                                                <img src="{$config_siteurl}statics/cu/images/massart/009.jpg" alt="">
                                                <p>第二届”视觉”杯动物世界 摄影展演</p>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0)">
                                                <img src="{$config_siteurl}statics/cu/images/massart/009.jpg" alt="">
                                                <p>第二届”视觉”杯动物世界 摄影展演</p>
                                            </a>
                                        </li> -->
                                    </ul>
                                </dd>
                            </dl>
                        </div>
                    </div>
                </div>
            </div>
            <div class="massart-f5">
                <div class="ggwh_Content">
                    <div class="tit">
                        <img src="{$config_siteurl}statics/cu/images/massart/005.png" alt="">
                        民俗版 · 展板
                    </div>
                    <div class="content">
                        <dl class="clearfix">
                            <dt>
                                <h4 class="clearfix">
                                    <span>“太行故事”民俗版画展</span>
                                    <a href="{:U('lists',['cate'=>'custom'])}">更多</a>
                                </h4>
                                <div class="tag">
                                    <a href="javascript:void(0)">太行故事</a>
                                    <a href="javascript:void(0)">版画</a>
                                    <a href="javascript:void(0)">民俗</a>
                                    <a href="javascript:void(0)">晋南</a>
                                    <a href="javascript:void(0)">人物</a>
                                    <a href="javascript:void(0)">图集展板</a>
                                </div>
                                <div class="tag-img">
                                    <a href="javascript:void(0)"><img src="{$config_siteurl}statics/cu/images/massart/007.png" alt=""></a>
                                    <a href="javascript:void(0)"><img src="{$config_siteurl}statics/cu/images/massart/008.png" alt=""></a>
                                    <span>《太行故事》</span>
                                </div>
                            </dt>
                            <dd>
                                <!--<a href="javascript:void(0)">
                                    <img src="{$config_siteurl}statics/cu/images/massart/006.jpg" alt="">
                                    <h5>民俗版 太行故事民俗画展</h5>
                                    <p><span>《太行故事》</span><i>365人看过</i></p>
                                </a>-->
                                <volist name="custom" id="custom">
                                <a href="{:U('show',['id'=>$custom['id']])}" title="{$custom['title']}">
                                    <img src="{:thumb($custom['cover'],384,225)}" alt="">
                                    <h5>民俗版 {$custom['deputy_title']}</h5>
                                    <p><span>{$custom['title']}</span><i>{$custom['hits']}人看过</i></p>
                                </a>
                                </volist>
                            </dd>
                        </dl>
                    </div>
                </div>
            </div>
            <div class="massart-f6">
                <div class="ggwh_Content">
                    <div class="massart-title clearfix">
                        <h4><img src="{$config_siteurl}statics/cu/images/massart/006.png" alt="">文化惠民专场</h4>
                        <a href="{:U('lists',['cate'=>'culture'])}">更多>> </a>
                    </div>
                    <div class="content clearfix">
                        <div class="left">
                            <a href="{:U('show',['id'=>$culture[0]['id']])}" title="{$culture[0]['title']}">
                                <img src="{$culture[0]['cover']}" alt="">
                            </a>
                        </div>
                        <div class="center">
                            <div class="f6-nav">
                                <ul class="clearfix huimin-list ">
                                    <li id="all"      class="active"><a href="javascript:void(0)">全部</a></li>
                                    <li id="video"   ><a href="javascript:void(0)">视频</a></li>
                                    <li id="activty" ><a href="javascript:void(0)">活动</a></li>
                                    <li id="picture" ><a href="javascript:void(0)">图片</a></li>
                                </ul>
                            </div>
                            <div class="all huimin-wrap" style="">
                                <dl class="clearfix">
                                    <dt>
                                        <strong><?php echo  date('d',$culture[0]['addtime']) ?></strong>
                                        <span><?php echo  date('Y-m',$culture[0]['addtime']) ?></span>
                                    </dt>
                                    <dd>
                                        <h5><?php echo mb_strcut($culture[0]['title'],0,20);?>...</h5>
                                        <p><?php echo mb_strcut($culture[0]['content'],0,70);?>...</p>
                                    </dd>
                                </dl>
                                <div class="img-list clearfix">
                                <volist name="culture" id="cu" offset="1" length="2">
                                    <a href="{:U('show',['id'=>$cu['id']])}" title="{$cu['title']}">
                                        <img src="{:thumb($cu['cover'],226,120)}" alt="" style="width:226;height:120;">
                                        <h6><?php echo mb_strcut($cu['title'],0,20); ?>...</h6>
                                        <p><?php echo mb_strcut($cu['content'],0,20); ?>...</p>
                                    </a>
                                    </volist>
                                    <!--<a href="javascript:void(0)">
                                        <img src="{$config_siteurl}statics/cu/images/massart/005.jpg" alt="">
                                        <h6>农民工歌手展演</h6>
                                        <p>“江山寻绛”精品书法展</p>
                                    </a>-->
                                </div>
                            </div>
                            <div class="video  huimin-wrap"  style="display:none">
                                <dl class="clearfix">
                                    <dt>
                                        <strong><?php echo  date('d',$culture_video[0]['addtime']) ?></strong>
                                        <span><?php echo  date('Y-m',$culture_video[0]['addtime']) ?></span>
                                    </dt>
                                    <dd>
                                        <h5><?php echo mb_strcut($culture_video[0]['title'],0,20);?>...</h5>
                                        <p><?php echo mb_strcut($culture_video[0]['content'],0,70);?>...</p>
                                    </dd>
                                </dl>
                                <div class="img-list clearfix">
                                <volist name="culture_video" id="cu">
                                    <a href="{:U('show',['id'=>$cu['id']])}" title="{$cu['title']}">
                                        <img src="{:thumb($cu['cover'],226,120)}" alt="" style="width:226;height:120;">
                                        <h6><?php echo mb_strcut($cu['title'],0,20); ?>...</h6>
                                        <p><?php echo mb_strcut($cu['content'],0,20); ?>...</p>
                                    </a>
                                    </volist>
                                </div>
                            </div>

                            <div class="activty huimin-wrap"  style="display:none">
                                <dl class="clearfix">
                                    <dt>
                                        <strong><?php echo  date('d',$culture[0]['addtime']) ?></strong>
                                        <span><?php echo  date('Y-m',$culture[0]['addtime']) ?></span>
                                    </dt>
                                    <dd>
                                        <h5><?php echo mb_strcut($culture[0]['title'],0,20);?>...</h5>
                                        <p><?php echo mb_strcut($culture[0]['content'],0,70);?>...</p>
                                    </dd>
                                </dl>
                                <div class="img-list clearfix">
                                <volist name="culture" id="cu" offset="1" length="2">
                                    <a href="{:U('show',['id'=>$cu['id']])}" title="{$cu['title']}">
                                        <img src="{:thumb($cu['cover'],226,120)}" alt="" style="width:226;height:120;">
                                        <h6><?php echo mb_strcut($cu['title'],0,20); ?>...</h6>
                                        <p><?php echo mb_strcut($cu['content'],0,20); ?>...</p>
                                    </a>
                                    </volist>
                                </div>
                            </div>

                            <div class="picture huimin-wrap"  style="display:none">
                                <dl class="clearfix">
                                    <dt>
                                    <strong><?php echo  date('d',$culture_picture[0]['addtime']) ?></strong>
                                        <span><?php echo  date('Y-m',$culture_picture[0]['addtime']) ?></span>
                                    </dt>
                                    <dd>
                                        <h5><?php echo mb_strcut($culture_picture[0]['title'],0,20);?>...</h5>
                                        <p><?php echo mb_strcut($culture_picture[0]['content'],0,70);?>...</p>
                                    </dd>
                                </dl>
                                <div class="img-list clearfix">
                                <volist name="culture_picture" id="cu">
                                    <a href="{:U('show',['id'=>$cu['id']])}" title="{$cu['title']}">
                                        <img src="{:thumb($cu['cover'],226,120)}" alt="" style="width:226;height:120;">
                                        <h6><?php echo mb_strcut($cu['title'],0,20); ?>...</h6>
                                        <p><?php echo mb_strcut($cu['content'],0,20); ?>...</p>
                                    </a>
                                    </volist>
                                </div>
                            </div>
                        </div>
                        <div class="right">
                        <volist name="culture" id="cul" offset="3" length="2">
                            <a href="{:U('show',['id'=>$cul['id']])}" title="{$cul['title']}">
                                <img src="{:thumb($cul['cover'],260,136)}" alt="">
                            </a>
                            </volist>
                            <!--<a href="javascript:void(0)">
                                <img src="{$config_siteurl}statics/cu/images/massart/005.jpg" alt="">
                            </a>-->
                        </div>
                    </div>
                </div>
            </div>
            <template file="Pubservice/Common/_foot"/>
        </div>
        <script type="text/javascript">
            $(document).ready(function(){
                $('.layslidewrap').DB_rotateRollingBanner({
                    key:"c37080",
                    num: 3,
                    moveSpeed:200,
                    autoRollingTime:500000
                });
                $(".f3-nav>ul").find("li a").on("click",function(){
                    var index = $(this).parent().index();
                    $(this).parent().addClass("active").siblings().removeClass("active");
                    $(".items>.item").eq(index).show().siblings().hide();
                });
            });

            $('.huimin-list').on('click','li',function(){
                var id = $(this).attr('id');
                $(this).addClass('active').siblings().removeClass('active');
                $('.'+id).show().siblings(".huimin-wrap").hide();
                // $('.'+class).show().siblings().hide();
            })
        </script>
    </body>

</html>
