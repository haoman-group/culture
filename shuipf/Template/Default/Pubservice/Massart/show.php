<!DOCTYPE html>
<html>

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <!--<meta name="viewport" content="width=device-width, initial-scale=1">-->
        <meta name= "viewport" content= "width=device-width" initial-scale="1" minimum-scale="1" maximum-scale="1">
        <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
        <title>{$data.title}-{$cateName}-群众文艺</title>
        <template file="Pubservice/Common/_cssjs"/>
        <link rel="stylesheet" href="{$config_siteurl}statics/cu/css/base.css" />
        <link rel="stylesheet" href="{$config_siteurl}statics/js/viewer/viewer.min.css"/>
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
        .images-viewer li{
             float:left; 
        }
        .images-viewer li img{
            width:100px;
            height:100px;
            overflow:hidden;
            margin:2px;
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
                            <a href="{:U('lists',['cate'=>$data['category']])}">{$cateName}</a>
                        </li>
                        <li>
                            <span>></span>
                        </li>
                        <li>
                            <a href="###">{$data.title}</a>
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
                <div class="title" style="text-align:center;margin:10px 0 50px 0;">
                    <h3>{$data.title}</h3>
                </div>
                <div  class="stag-all" style="width:100%;clear:both;" >
                    <notempty name="data['video']"> 
                    <div id="youkuplayer" style="width:1190px;height:666px;;margin:0 0 50px 0;" data-type="{$data.video}"></div>
                    <script type="text/javascript" src="http://player.youku.com/jsapi"></script>
                    <script type="text/javascript">
                        player = new YKU.Player('youkuplayer',{
                            styleid: '0',
                            client_id: '{:C('YOUKU_CLIENT_ID')}',
                            vid: '{$data.video}',
                            newPlayer: true
                        });
                    </script>
                    </notempty>
                    <notempty name="data['images']">
                    <?php $images = unserialize($data['images']);?>
                    <div>
                        <ul class="images-viewer">
                            <volist name="images" id="im">
                            <li><img src="{:thumb($im,200)}" alt="" data-origin-src="{$im}"></li>
                            </volist>
                        </ul>
                    </div>
                    </notempty>
                    <notempty name="data['content']">
                        <div style="clear:both;padding-top:20px;">
                        <p style="word-break:break-all;text-indent:2em;margin:10px;">{$data.content}</p>
                        </div>
                    </notempty>
                   
                    <!-- <img src="{$config_siteurl}statics/cu/images/massart/010.jpg" width="100%" height="100%" alt=""> -->
                </div>
                <div class="stag-all" style="clear:both;">
                    <div class="stag-nav clearfix">
                        <span>相关推荐</span>
                    </div>
                    <div class="stag-con" style="padding-bottom: 20px;">
                        <ul class="clearfix">
                            <volist name="position" id="po">
                            <li>
                                <a href="{:U('show',['id'=>$po['id']])}"><img src="{:thumb($po['cover'],283,184)}" alt=""><i>第{$po.session}届</i></a>
                                <h6>{$po.title}</h6>
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
                            </li> -->
                        </ul>
                    </div>
                </div>
            </div>
            <template file="Pubservice/Common/_foot"/>
        </div>
        <script type="text/javascript" src="{$config_siteurl}statics/js/viewer/viewer.min.js"></script>
        <script>
            $('.images-viewer').viewer({url:"data-origin-src"});            
        </script>
    </body>

</html>
