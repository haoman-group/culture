<extend name="shuipf/Template/Default/Industry/common/_layout.php" />
<block name="after_styles">
    <link rel="stylesheet" href="{$config_siteurl}statics/ci/css/category_consume.css">
    <link rel="stylesheet" href="{$config_siteurl}statics/ci//css/card.css"/>
    <script type="text/javascript" src="{$config_siteurl}statics/ci//js/jquery.min.js"></script>
    <script type="text/javascript" src="{$config_siteurl}statics/ci//js/swiper.min.js"></script>
    <style type="text/css">
        * {
            padding: 0px;
            margin: 0px;
        }

        a {
            text-decoration: none;
        }

        ul {
            list-style: outside none none;
        }

        .slider, .slider-panel img, .slider-extra {
            width: 390px;
            height: 230px;
        }

        .slider {
            text-align: center;
            margin: 0px auto;
            position: relative;
        }

        .slider-panel, .slider-nav, .slider-pre, .slider-next {
            position: absolute;
            z-index: 8;
        }

        .slider-panel {
            position: absolute;
        }

        .slider-panel img {
            border: none;
        }

        .slider-extra {
            position: relative;
        }

        .slider-nav {
            margin-left: -41px;
            position: absolute;
            left: 50%;
            bottom: 14px;
        }

        .slider-nav li {
            background: #3e3e3e;
            border-radius: 50%;
            color: #fff;
            cursor: pointer;
            margin: 0 2px;
            overflow: hidden;
            text-align: center;
            display: inline-block;
            height: 18px;
            line-height: 18px;
            width: 18px;
        }

        .slider-nav .slider-item-selected {
            background: blue;
        }

        .slider-page a {
            background: rgba(0, 0, 0, 0.2);
            filter: progid:DXImageTransform.Microsoft.gradient(startColorstr=#33000000, endColorstr=#33000000);
            color: #fff;
            text-align: center;
            display: block;
            font-family: "simsun";
            font-size: 22px;
            width: 28px;
            height: 62px;
            line-height: 62px;
            margin-top: -31px;
            position: absolute;
            top: 50%;
        }

        .slider-page a:HOVER {
            background: rgba(0, 0, 0, 0.4);
            filter: progid:DXImageTransform.Microsoft.gradient(startColorstr=#66000000, endColorstr=#66000000);
        }

        .slider-next {
            left: 100%;
            margin-left: -28px;
        }
    </style>
</block>
<block name="content">
    <!--头部导航-->
    <div class="cardban">
        <img src="{$config_siteurl}statics/ci/images/cardban.jpg" style="width: 1200px;margin: 0 auto;">
    </div>
    <div id="search">
        <div class="container clearfix">
            <p class="tips">欢迎关注山西文化产业微信公众号：2356982455</p>
            <!--<form action="">
                <input type="text" placeholder="输入你要搜索的关键字" value="" id="b"/>
                <input class="search_btn" type="button" value="搜索" onclick="text()"/>
            </form>-->
        </div>
    </div>
    <!--内容-->
    <div id="content">

        <div class="container cardcon clearfix">
            <aside class="cardlt">

                <div class="cardcell">
                    <div class="consumer tit" style="color: #900;width:334px;text-align: center;">
                        山西文消卡介绍与使用说明
                    </div>

                    <div class="cardindexintro">
                        <p>
                            为更好地促进山西地区消费者多层次、多样化的文化消费，现启动发放山西惠民卡（简称文消卡），持卡者在加盟商户参与文化活动可享受优惠，并参与积分抽奖。文消卡加盟商户覆盖全市6区，包括各类书店、影院、剧院、教育培训、旅游景区、电子商务、动漫网游、文化娱乐、艺术品生产和交易、图书馆、博物馆、美术馆及其他提供文化产品和服务的文化企事业单位。
                        </p>
                        <p>
                            文消卡作为政府、企业、消费者齐力打造的省城文化消费“新名片”，旨在文化企业和消费者之间构建起综合有效、便捷优惠的文化产品供需对接服务网络新体系，以培养文化消费理念、引领文化消费意愿、激励文化消费行为，力求在丰富市民精神文化生活的同时，打造山西文化惠民的亮点和品牌。文消卡将充分体现惠民、惠企两大特性，开创多方共赢、互惠互利的新局面，用创新理念和实际优惠，引导民众的文化消费认知和意识提升到一个新高度；用奖励支持、品牌宣传等优惠条件，激励更多文化企业商家积极参与、抢占更广阔的文化市场。
                        </p>
                    </div>
                </div>
                <!--  <div class="cardcell">
                     <ul class="ulcardcontact clearfix">
                         <li>
                             <img src="{$config_siteurl}statics/ci/images/cardtel.png">
                             客服热线：0351-25555555
                         </li>
                         <li>
                             <img src="{$config_siteurl}statics/ci/images/cardwx.png">
                             订阅微信：sxwenhua78
                         </li>
                         <img src="{$config_siteurl}statics/ci/images/timg.jpg" height="40" style="height: 62px;display: block;float: right;margin-top: -22px;" />
                     </ul>

                 </div>
      -->
            </aside>
            <article class="cardrt">

                <div class="cardcell clearfix" style="margin-bottom: 20px;">
                    <div class="consumer tit" style="color: red">
                        <!-- <img src="{$config_siteurl}statics/ci/images/consumer1.png" alt=""> -->
                        <dl class="finance_tit clearfix">
                            <dt>C</dt>
                            <dd>
                                <span><i>onsumer</i> information</span>
                                <strong>消费资讯</strong>
                            </dd>
                        </dl>
                        <a href="{:U('Industry/Index/lists',array('catid'=>17))}">更多>></a>
                    </div>
                    <!--<div class="tit">热门信息</div>-->
                    <div class="cardsublt" style="margin-top: 0px;height: 230px;">
                        <div class="slider">
                            <ul class="slider-main">


                                <position action="position" posid="5" num="3" order="id desc">

                                    <volist name="data" id="vo">
                                        <li class="slider-panel" style="">
                                            <!--                                        <a href="#"><img alt="" title="" src="{$vo.thumb}"></a>-->
                                            <a href="{:U('Content/Index/shows',array('id'=>$vo['id'],'catid'=>$vo['catid']))}"><img
                                                        src="{:thumb($vo['data']['thumb'],390,230)}"
                                                        style="width: 390px;height: 230px;"></a>
                                        </li>
                                    </volist>
                                </position>

                            </ul>
                            <div class="slider-extra">
                                <ul class="slider-nav">
                                    <li class="slider-item">1</li>
                                    <li class="slider-item">2</li>
                                    <li class="slider-item">3</li>

                                </ul>

                            </div>
                        </div>
                    </div>

                    <div class="cardsubrt">
                        <ul class="ulguanzhu">
                            <position action="position" posid="5">
                                <volist name="data" id="vo">
                                    <li>
                                        <a href="{:U('Content/Index/shows',array('id'=>$vo['id'],'catid'=>$vo['catid']))}"><em>[{$i}]{$vo.data.id}</em>{$vo.data.title|str_cut=###,16}</a>
                                    </li>
                                </volist>
                            </position>
                        </ul>
                    </div>
                </div>

                <div class="cardcell clearfix">

                    <div class="consumer tit" style="color: red">
                        <!-- <img src="{$config_siteurl}statics/ci/images/preferential1.png" alt=""> -->
                        <dl class="finance_tit clearfix">
                            <dt>P</dt>
                            <dd>
                                <span><i>referential</i> information</span>
                                <strong>优惠信息</strong>
                            </dd>
                        </dl>

                        <a href="{:U('Industry/Index/lists',array('catid'=>18))}">更多>></a>
                    </div>

                    <div class="cardsublt">
                        <div class="cardsubtit">热门信息</div>

                        <div class="cardre clearfix">
                            <content action="lists" catid="18" order="views DESC" num="5" page='$page'>
                                <volist name="data" id="v">
                                    <eq name="i" value="1">
                                        <img style="width:130px;height:140px;" src="{:thumb($v['thumb'],130,140)}"
                                             class="pic">
                                    </eq>
                                </volist>
                                <ul>
                                    <volist name="data" id="vo">
                                        <li>
                                            <a href="{:U('Content/Index/shows',array('id'=>$v['id'],'catid'=>$v['catid']))}">{$vo.title|str_cut=###,15}</a>
                                        </li>
                                    </volist>
                                </ul>
                            </content>
                        </div>
                    </div>
                    <div class="cardsubrt">
                        <div class="cardsubtit">其他信息</div>
                        <ul class="ulelsere">
                            <content action="lists" catid="18" order="id desc" num="2" page='$page'>
                                <volist name="data" id="v">
                                    <li>
                                        <a href=".{$v.url}"><img src="{:thumb($v['thumb'],140,65)}"
                                                                 style="width: 140px;height: 65px;"></a>
                                        <p>
                                            <em>[{$i}]</em>
                                            <a href="{:U('Content/Index/shows',array('id'=>$v['id'],'catid'=>$v['catid']))}">{$v.title|str_cut=###,35}</a>
                                        </p>
                                    </li>
                                </volist>
                            </content>
                        </ul>
                    </div>
                </div>
                <!-- <div class="cardcell">
                    <div class="consumer tit" style="color: red">
                        <img src="{$config_siteurl}statics/ci/images/merchants1.png" alt="">
                        <a href="{:U('Industry/Consume/consume')}">更多>></a>
                    </div>
                    <ul class="ulcardlogos clearfix" style="width: 800px;">
                        <?php
                        //$data = M('business_alliance')->order('id desc')->limit(12)->select();
                        //foreach ($data as $k => $v) {
                            ?>
                            <li>
                                <a href="{:U('Industry/Detail/index', array('id'=>$v['id']))}"><img
                                            src="{:thumb($v['photo'],160,45)}"
                                            style="width: 160px;height: 48px;"> </a>
                                <div class="name"><a href="{:U('Industry/Detail/index')}">{$v.name}</a> </div>
                            </li>
                            <?php
                        //}
                        ?>
                    </ul>
                </div> -->
                <div class="cardcell">
                    <div class="consumer tit" style="color: red">
                        <!-- <img src="{$config_siteurl}statics/ci/images/merchants1.png" alt=""> -->
                        <dl class="finance_tit clearfix">
                            <dt>P</dt>
                            <dd>
                                <span><i>referential</i> products</span>
                                <strong>优惠产品</strong>
                            </dd>
                        </dl>
                        <a href="{:U('Industry/Consume/consume')}">更多>></a>
                    </div>
                    <ul class="discountPro clearfix">
                        <li>
                            <div class="img">
                                <a href="###"><img src="{$config_siteurl}statics/ci/images/pro1.jpg" alt=""></a>
                            </div>
                            <div class="desc">
                                <h5>带着文惠券去看电影吧</h5>
                                <p>春风十里——不如看场电影 ! 有什么能比周末的午后，和朋友一...</p>
                                <span>2017-05-17</span>
                            </div>
                        </li>
                        <li>
                            <div class="img">
                                <a href="###"><img src="{$config_siteurl}statics/ci/images/pro2.jpg" alt=""></a>
                            </div>
                            <div class="desc">
                                <h5>带着文惠券去看电影吧</h5>
                                <p>春风十里——不如看场电影 ! 有什么能比周末的午后，和朋友一...</p>
                                <span>2017-05-17</span>
                            </div>
                        </li>
                        <li>
                            <div class="img">
                                <a href="###"><img src="{$config_siteurl}statics/ci/images/pro3.jpg" alt=""></a>
                            </div>
                            <div class="desc">
                                <h5>带着文惠券去看电影吧</h5>
                                <p>春风十里——不如看场电影 ! 有什么能比周末的午后，和朋友一...</p>
                                <span>2017-05-17</span>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="cardcell">
                    <div class="consumer tit" style="color: red">
                        <!-- <img src="{$config_siteurl}statics/ci/images/merchants1.png" alt=""> -->
                        <dl class="finance_tit clearfix">
                            <dt>W</dt>
                            <dd>
                                <span><i>onderful</i> activities</span>
                                <strong>精彩活动</strong>
                            </dd>
                        </dl>
                        <a href="{:U('Industry/Consume/consume')}">更多>></a>
                    </div>
                    <ul class="wonderfulAct clearfix">
                        <li>
                            <div class="img">
                                <a href="###"><img src="{$config_siteurl}statics/ci/images/pro1.jpg" alt=""></a>
                            </div>
                            <div class="desc">
                                <h5>带着文惠券去看电影吧</h5>
                                <strong>进行中</strong>
                                <span>2017-05-27 ~2017-08-20</span>
                            </div>
                        </li>
                        <li>
                            <div class="img">
                                <a href="###"><img src="{$config_siteurl}statics/ci/images/pro1.jpg" alt=""></a>
                            </div>
                            <div class="desc">
                                <h5>【报名】《重返·狼群》看一匹狼如何从城市回   到故乡见面会</h5>
                                <strong>6月8日开播</strong>
                                <!-- <span>2017-05-27 ~2017-08-20</span> -->
                            </div>
                        </li>
                    </ul>
                </div>
            </article>

        </div>
    </div>
</block>
<block name="after_scripts">
    <script type="text/javascript">
        function text() {
            var value = document.getElementById("b").value;
            window.location.href = '{:U("Content/Search/index")}&key=' + value;
        }
    </script>
    <script type="text/javascript">
        $(document).ready(function () {
            var length,
                currentIndex = 0,
                interval,
                hasStarted = false, //是否已经开始轮播
                t = 3000; //轮播时间间隔
            length = $('.slider-panel').length;
            //将除了第一张图片隐藏
            $('.slider-panel:not(:first)').hide();
            //将第一个slider-item设为激活状态
            $('.slider-item:first').addClass('slider-item-selected');
            //隐藏向前、向后翻按钮
            $('.slider-page').hide();
            //鼠标上悬时显示向前、向后翻按钮,停止滑动，鼠标离开时隐藏向前、向后翻按钮，开始滑动
            $('.slider-panel, .slider-pre, .slider-next').hover(function () {
                stop();
                $('.slider-page').show();
            }, function () {
                $('.slider-page').hide();
                start();
            });
            $('.slider-item').hover(function (e) {
                stop();
                var preIndex = $(".slider-item").filter(".slider-item-selected").index();
                currentIndex = $(this).index();
                play(preIndex, currentIndex);
            }, function () {
                start();
            });
            $('.slider-pre').unbind('click');
            $('.slider-pre').bind('click', function () {
                pre();
            });
            $('.slider-next').unbind('click');
            $('.slider-next').bind('click', function () {
                next();
            });
            /**
             * 向前翻页
             */
            function pre() {
                var preIndex = currentIndex;
                currentIndex = (--currentIndex + length) % length;
                play(preIndex, currentIndex);
            }

            /**
             * 向后翻页
             */
            function next() {
                var preIndex = currentIndex;
                currentIndex = ++currentIndex % length;
                play(preIndex, currentIndex);
            }

            /**
             * 从preIndex页翻到currentIndex页
             * preIndex 整数，翻页的起始页
             * currentIndex 整数，翻到的那页
             */
            function play(preIndex, currentIndex) {
                $('.slider-panel').eq(preIndex).fadeOut(500)
                    .parent().children().eq(currentIndex).fadeIn(1000);
                $('.slider-item').removeClass('slider-item-selected');
                $('.slider-item').eq(currentIndex).addClass('slider-item-selected');
            }

            /**
             * 开始轮播
             */
            function start() {
                if (!hasStarted) {
                    hasStarted = true;
                    interval = setInterval(next, t);
                }
            }

            /**
             * 停止轮播
             */
            function stop() {
                clearInterval(interval);
                hasStarted = false;
            }

            //开始轮播
            start();
        });
    </script>
</block>
