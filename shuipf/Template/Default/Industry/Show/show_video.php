<extend name="shuipf/Template/Default/Industry/common/_layout.php" />
<block name="after_styles">
    <link rel="stylesheet" href="{$config_siteurl}statics/ci/css/pic.css" />
    <style type="text/css">
        iframe{width: 1015px;height: 545px;margin-left: 80px;}
        .newsshowshare{ padding: 0px 20px 25px ;overflow:hidden;}
        .newsshowshare strong{ float: left; line-height: 32px; font-size: 14px; margin-right: 10px;}
        .newsshowshare .jiathis_style_32x32{ float: right; width: 200px; overflow: hidden; height: 32px;margin-right: 65px;margin-top: 10px}
    </style>
</block>
<block name="content">
    <div id="nav">
        <div class="container">
            <ul>
                <li>
                    <a href="{:U('Industry/Index/index')}" class="home_src">首页</a>
                </li>
                <li><span>></span></li>
                <li>
                    <a href=".{:getCategory(1,'url')}">资讯中心</a>
                </li>
                <li><span>></span></li>
                <li>
                    <a href="javascript:;">图片新闻</a>
                </li>
                <li><span>></span></li>
                <li>
                    <a href="javascript:;" style="color: #2058c2;">{$title}</a>
                </li>

            </ul>
            <form action="">
                <input type="text" placeholder="输入你要搜索的关键字" value="" id="b" />
                <input class="search_btn" type="button" value="搜索" onclick="text()" />
            </form>
        </div>
    </div>
    <div id="content">
        <div class="container">


                <div class="pic-title">
                    <h5>{$title}</h5>
                    <span>{$inputtime} <i>●</i> 来源：山西文化厅 <i>●</i> 作者：李某某 <i>●</i>{$views}次浏览</span>

                </div>
                <div class="swiper-container pic-container">
<!--                    <div class="swiper-wrapper">-->
<!--                        <volist name="data" id="vo">-->
<!--                            <div class="swiper-slide">-->
<!--                                <a href="{$vo.data.url}"><img src="{:thumb($vo['data']['thumb'],1082,700,1)}" alt="" style="width: 1096px;height: 700px;"></a>-->
<!--                                <p>{$vo.data.title|str_cut=###,10}</p>-->
<!--                            </div>-->
<!--                        </volist>-->
<!--                    </div>-->

                    <!-- 如果需要分页器 -->
                    <div class="swiper-pagination"></div>

                    <!-- 如果需要导航按钮 -->
<!--                    <div class="swiper-button-prev" style="left: 28px;background-image: none;top: 45%;"><img src="{$config_siteurl}statics/ci/images/left.png"/></div>-->
<!--                    <div class="swiper-button-next" style="right: 38px;background-image: none;top: 45%;"><img src="{$config_siteurl}statics/ci/images/right.png"/></div>-->
                    <!-- 如果需要滚动条 -->
                    <!-- <div class="swiper-scrollbar"></div> -->
                </div>

            <div class="fenxiang" style="height: 10px;">
                <!-- <span>分享：</span>
                <a href="#"><img src="{$config_siteurl}statics/img/weibo.png" alt=""></a>
                <a href="#"><img src="{$config_siteurl}statics/img/weixin.png" alt=""></a>
                <a href="#"><img src="{$config_siteurl}statics/img/douban.png" alt=""></a>
                <a href="#"><img src="{$config_siteurl}statics/img/doudou.png" alt=""></a> -->
            </div>

            <ul class="anaul clearfix">
                {$vurl}
            </ul>
<!--            <div class="pagebox">-->
<!--                {$pages}-->
<!--            </div>-->

            <div class="newsshowshare">
                <!-- JiaThis Button BEGIN -->
                <div class="jiathis_style_32x32 ">
                    <strong>分享:</strong>
                    <a class="jiathis_button_tsina"></a>
                    <a class="jiathis_button_weixin"></a>
                    <a class="jiathis_button_douban"></a>
                    <a class="jiathis_button_tqq"></a>

<!--                    <a href="http://www.jiathis.com/share" class="jiathis jiathis_txt jtico jtico_jiathis" target="_blank"></a>-->
<!--                    <a class="jiathis_counter_style"></a>-->
                </div>
                <script>
                    var jiathis_config={
                        url:window.location.href,
                        summary:"",
                        title:document.querySelector(".left_content_title h2").innerHTML+"-产业服务平台",
                        pic:document.querySelectorAll(".left_content_div img").length>0?document.querySelectorAll(".left_content_div img")[0].attr("src"):"/statics/ci/images/logo.png",
                        hideMore:false
                    }
                </script>
                <script type="text/javascript" src="http://v3.jiathis.com/code/jia.js" charset="utf-8"></script>
                <!-- JiaThis Button END -->
            </div>

        </div>
        </div>



    </div>
    </div>

</block>
<block name="after_scripts">
    <script>
        $(function(){
            var mySwiper = new Swiper ('.swiper-container', {
                direction: 'horizontal',
                loop: true,

                // 如果需要分页器
                pagination: '.swiper-pagination',
                paginationType: 'fraction',

                // 如果需要前进后退按钮
//                nextButton: '.swiper-button-next',
//                prevButton: '.swiper-button-prev',

                // 如果需要滚动条
                // scrollbar: '.swiper-scrollbar',

            })
        });
    </script>


    <script type="text/javascript" >
        function text(){
            var value = document.getElementById("b").value;
            window.location.href='{:U("Content/Search/index")}&key='+value;
        }
    </script>
</block>
