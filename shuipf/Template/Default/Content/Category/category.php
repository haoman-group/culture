<extend name="shuipf/Template/Default/Content/common/_layout.php" />
<block name="after_styles">
    <link rel="stylesheet" href="{$config_siteurl}statics/ci/css/information_category.css" />
    <link type="text/css" rel="stylesheet" href="{$config_siteurl}statics/ci/css/carousel.css">
    <script type="text/javascript" src="{$config_siteurl}statics/ci/js/jquery.js"></script>
    <script type="text/javascript" src="{$config_siteurl}statics/ci/js/carousel.js"></script>
    <style>
        .order-num1,.order-num2,.order-num3,.order-num4,.order-num5,.order-num6{
             width: 20px;height: 20px;line-height: 20px;text-align: center;float: left;color:white;}
        .order-num1 { background:#ED4A5A;}
        .order-num2{background:#FDBD2D;}
        .order-num3{background:#93CF56;}
        .order-num4,.order-num5,.order-num6{background:#43BFF1;}
    </style>

</block>
<block name="content">
    <div class="newsindex content">

        <div class=" searbox newsindex_searbox hasdrop">
            <form id="search_form" method="post" action="#">
                <em class="searcate">全部</em>
                <ul class="ulsearcate" >
                    <li>全部</li>
                    <li>新闻</li>
                    <li>视频</li>
                    <li>图片</li>
                    <li>论坛</li>
                    <li>服务</li>
                </ul>
                <div class="inpbox">
                    <input type="text" class="inpsear" placeholder="" value="" id="b">
                </div>
                <a class="searchdeep" >搜索|高级搜索</a>
                <input  type="button" class="btnsear" onclick="text()" >
                <div style="clear: both"></div>
            </form>
        </div>

        <div style="clear: both"></div>
        <div class="search-login clearfix">
            <!--                左侧图片位置-->
            <div class="left-img">
                <img src="{$config_siteurl}statics/ci/images/news_index_ban.png" alt="">
            </div>

            <!--                右侧登录搜索-->
            <div class="notice-news">
                <div class="pictitbox">
                    <img src="{$config_siteurl}statics/ci/images/news_index_tit_notice1.jpg">
                    <a style="font-size: 16px;" href="__ROOT__{:getCategory(7,'url')}" class="more">更多&gt;&gt;</a>
                </div>
                <div class="commend－news">
                    <ul>

                        <content action = "lists" catid = "7" order = "id DESC" num= "6" page = "$page">

                            <ul class="local">
                                <volist name="data" id="vo">

                                    <li class="notice-news-content"><a  href=".{$vo.url}">{$vo.title|str_cut=###,13}</a></li>
                                    <span class="fabutime">{$vo.inputtime|date="m-d",###}</span>
                                </volist>
                            </ul>

                        </content>

                    </ul>
                </div>

            </div>

                <div class="login-register">
                    <form action="{:U('Member/Public/doLogin')}" id="form" method="post">

                    <div  class="member-login" style="color: red">
                        <img src="./statics/images/login-logo1.png" alt="">
                    </div>
                    <if condition = "$uid">
                        <p style="font-size: 18px;margin-top: 15px;padding-left: 20px;line-height: 30px;">
                        您好，{$username}!<br/>
                        欢迎来到产业服务平台
                        </p>
                        <div class="btns">
                            <input type="button" value="退出" class="logout" onclick="window.location.href = '{:U('Member/Index/logout')}'">

                        </div>

                    <else />
                    <div class="login-password" >
                        <div class="login-pic">
                            <img src="{$config_siteurl}statics/images/shouye-login.jpg" alt="" style="display: block;margin-top: 5px;margin-left:3px">
                        </div>
                        <input type="text" value="" name="loginName">
                    </div>
                    <div class="login-password-1" >
                        <div class="login-pic">
                            <img src="{$config_siteurl}statics/images/shouye-register.jpg" alt="" style="display: block;margin-left:2px">
                        </div>
                        <input type="text" value="" class="zzjs_net" name="password">
                    </div>
                    <div class = "login-code">
                        <input class="yzm" type="text" value="" name="vCode" /><img src='{:U("Api/Checkcode/index","type=userlogin&code_len=4&font_size=18&width=80&height=30&font_color=&background=")}' alt="验证码" id="authCode" onclick="changeAuthCode()"/>
                    </div>
                    <div class="btns">
                        <input type="button" value="登录" class="log" onclick="$('#form').submit();">
                        <input type="button"  value="注册" class="log-reg">
                    </div>
                    </if>
                    </form>
                </div>

        </div>
        <!-- 第二部分 -->
        <div class="second">

            <div class="second-news">
                <div class="industry-logo">
                    <img src="{$config_siteurl}statics/default/images/shouye/zixun33.jpg" alt="">
                    <span class="more-news"><a style="font-size: 16px;" href=".{:getCategory(2,'url')}">更多>></a></span>
                </div>
                <content action = "lists" catid = "2" order = "id DESC" num= "7" >
                    <div class="news-content">
                        <div class="content-img">
                            <img src="{$vo.thumb}" alt="" style="width: 276px;height: 182px">
                        </div>
                        <div class="content-list">
                            <ul>
                                <!-- 产业要闻 -->




                                <volist name="data" id="vo">



                                    <li class="list-news">
                                        <a href=".{$vo.url}">{$vo.title|str_cut=###,22}</a>

                                    </li>
                                    <span class="inputtime">{$vo.inputtime|date="Y-m-d",###}</span>

                                </volist>



                            </ul>

                        </div>


                    </div>
                </content>
            </div>
            <div class="second-center">
                <div class="news-video">
                    <img src="{$config_siteurl}statics/default/images/shouye/zixun44.jpg" alt="">
                    <span class="more-news"><a style="font-size: 16px;" href=".{:getCategory(5,'url')}">更多>></a></span>

                </div>
                <div class="video-img" video-img>


                    <content action = "lists" catid = "5" order = "id DESC" num= "1" page = "$page">
                        <volist name="data" id="vo">
                    <a href=".{:getCategory(5,'url')}">
                        <img src="{$vo.thumb}" alt="" width="325" height="190">
                    </a>
                        </volist>
                    </content>
                </div>
            </div>

        </div>
        <!-- 第三部分 -->
        <!--  -->
        <div class="third">
            <div class="photo-news">
                <div class="industry-logo">
                    <img src="{$config_siteurl}statics/default/images/shouye/zixun66.jpg" alt="" style="margin-top: 10px;margin-left: 5px;">
                    <span class="more-news"><a style="font-size: 16px;" href=".{:getCategory(4,'url')}">更多>></a></span>
                </div>
                <div class="photo-news-list" >
            <div class="J_Poster poster-main" data-setting='{
	"width":770,
	"height":300,
	"posterWidth":426,
	"posterHeight":300,
	"scale":0.8,
	"autoPlay":true,
	"delay":4000,
	"speed":600
}'>
	<div class="poster-btn poster-prev-btn"></div>
	<ul class="poster-list">
        <content action = "lists" catid = "4" order = "id DESC" num= "4">
            <volist name="data" id="vo">
                <li class="poster-item">
                    <a href=".{$vo.url}">
                        <img style="width: 100%;height: 100%;" src="{$vo.thumb}" >
                        <span >{$vo.title|str_cut=###,10}</span>
                    </a>
                </li>

            </volist>
        </content>


	</ul>
	<div class="poster-btn poster-next-btn"></div>
</div>



                </div>


            </div>
            <div class="hot-topic">

                <div class="news-video" style="margin-top: 0;">
                    <img src="{$config_siteurl}statics/default/images/shouye/hottopic12.jpg" alt="">
                    <span class="more-news"><a style="font-size: 16px;" href=".{:getCategory(6,'url')}">更多>></a></span>

                </div>
                <ul class="hot-topic-img">

                    <content action = "lists" catid = "6" order = "id DESC" num= "3">
                        <volist name="data" id="vo">
                            <li>
                                <a href=".{$vo.url}">
                                    <img src=".{$vo.thumb}" width="340" height="101" alt="">
                                    <span >{$vo.title|str_cut=###,10}</span>

                                </a>

                            </li>
                        </volist>
                    </content>




                </ul>

            </div>


        </div>
        <!--            第四部分-->
        <div class="fourth">

            <div class="sort-news">
                <content action = "lists" catid = "2" order = "id DESC" num= "5">
                    <div class="industry-research">
                        <div class="research-title">
                            <!--                            <img src="{$config_siteurl}statics/default/images/shouye/zixun15.jpg" alt="">-->
                            <h3 style="width: 125px;height: 64px;color: #900;font-family:'Microsoft Yahei';line-height: 70px;display: inline-block;">产业研究</h3>
                            <span ><a style="font-size: 16px;" href=".{:getCategory(9,'url')}">更多>></a></span>
                        </div>
                        <ul >
                            <content action = "lists" catid = "9" order = "id DESC" num= "4">
                                <volist name="data" id="vo">
                                 <li class="chanye-news">
                                      <a href=".{$vo.url}">{$vo.title|str_cut=###,20}</a>

                                 </li>
                                </volist>
                            </content>
                        </ul>

                    </div>
                </content>
                <div class="industry-case">
                    <content action = "lists" catid = "10" order = "id DESC" num= "4">
                        <div class="industry-research">
                            <div class="research-title">
                                <!--                            <img src="{$config_siteurl}statics/default/images/shouye/zixun15.jpg" alt="">-->
                                <h3 style="width: 125px;height: 64px;color: #900;font-family:'Microsoft Yahei';line-height: 70px;display: inline-block;">产业案例</h3>
                                <span ><a style="font-size: 16px;" href=".{:getCategory(10,'url')}">更多>></a></span>
                            </div>
                            <ul >
                                <content action = "lists" catid = "10" order = "id DESC" num= "4">
                                    <volist name="data" id="vo">
                                        <li class="chanye-news">
                                            <a href=".{$vo.url}">{$vo.title|str_cut=###,20}</a>

                                        </li>
                                    </volist>
                                </content>
                            </ul>

                        </div>
                    </content>
                </div>
                <div class="industry-forum">
                    <div class="discuss">
                        <!--                            <img src="{$config_siteurl}statics/default/images/shouye/zixun15.jpg" alt="">-->

                        <h3 style="width: 125px;height: 64px;color: #900;font-family:'Microsoft Yahei';line-height: 70px;display: inline-block;">地市动态</h3>
<!--                        <span><a href="">更多>></a></span>-->


                        <span><a style="font-size: 16px;" href=".{:getCategory(3,'url')}">更多>></a></span>

                    </div>
                    <div class="new-left" >
                        <ul>
                            <content action = "lists" catid = "3" order = "id DESC" num= "4">
                                <volist name="data" id="vo">
                                    <li class="chanye-news">
                                        <a href=".{$vo.url}">{$vo.title|str_cut=###,20}</a>

                                    </li>
                                </volist>
                            </content>
                        </ul>

                    </div>
                    <div class="news-right">
                        <ul>

                            <content action = "lists" catid = "3" order = "id DESC" num= "4">
                                <volist name="data" id="vo">
                                    <li class="chanye-news">
                                        <a href=".{$vo.url}">{$vo.title|str_cut=###,20}</a>

                                    </li>
                                </volist>
                            </content>
                        </ul>
                    </div>
                </div>
            </div>

            <!--                又-->
            <div class="news-report">
                <div class="research-title1">
                    <!--                        <img src="{$config_siteurl}statics/default/images/shouye/zixun17.jpg" alt="">-->
                    <h3 style="color:#900;">专题报道</h3>
                    <span><a style="font-size: 16px;" href=".{:getCategory(6,'url')}">更多>></a></span>
                </div>
                <div class="news-cover">


                    <content action = "lists" catid = "3" order = "id DESC" num= "6">
                        <volist name="data" id="vo">

                                <div class="list-li">

<!--                                            <span class="order-num{$i}">{$i}</span>-->
<!--                                            <p><a href="{$vo.url}">{$vo.title|str_cut=###,18}</a></p>-->


                                    <li style="display: block;"><span class="order-num{$i}">{$i}</span><a href=".{$vo.url}" class="titlenum">{$vo.title|str_cut=###,18}</a></li>

                                       <if condition="$i eq 1">
                                           <content action = "lists" catid = "3" order = "id DESC" num= "1">
                                                 <volist name="data" id="vo" >
                                                      <a href="{$vo.url}"><img src="{$vo.thumb}" alt="" style="width: 326px;height: 102px;margin-top: 10px"></a>

                                                 </volist>
                                           </content>
                                       </if> 

                                </div>

                        </volist>
                    </content>


                </div>
            </div>


        </div>

        <!--            第四部分-->
        <!--            第五部分-->
        <div class="fixth">
            <div class="resources-logo">
                <img src="{$config_siteurl}statics/default/images/shouye/zixun99.jpg" alt="">

                <span class="more-news" style="margin-top: 30px;margin-right: 20px"><a style="font-size: 16px;" href=".{:getCategory(11,'url')}">更多>></a></span>


            </div>
            <div class="resources-news">


                <div class="resources-list">
                    <div class="resources-img">

                        <a href="{:U('Resource/special_culture',array('catid'=>47))}"><img src="{$config_siteurl}statics/default/images/shouye/zixun10.jpg" alt=""></a>
                    </div>
                    <div class="caption">
                        <h3><a href="{:U('Resource/special_culture',array('catid'=>47))}">【特色文化】</a></h3>

                           <content action = "lists" catid = "47" order = "id DESC" num= "1">
                               <volist name="data" id="vo">
                                   <p style="line-height:26px;">
                                       {$vo.description|str_cut=###,57}

                                   </p>
                               </volist>
                           </content>

                    </div>

                </div>
                <div class="resources-list">
                    <div class="resources-img">

                        <a href="{:U('Resource/special_culture',array('catid'=>48))}"><img src="{$config_siteurl}statics/ci/images/news/wenwu.jpg" alt=""></a>
                    </div>
                    <div class="caption">
                        <h3><a href="{:U('Resource/special_culture',array('catid'=>48))}">【文化遗产】</a></h3>
                        <content action = "lists" catid = "48" order = "id DESC" num= "1">
                            <volist name="data" id="vo">
                                <p style="line-height:26px;">
                                    {$vo.description|str_cut=###,57}

                                </p>
                            </volist>
                        </content>
                    </div>

                </div>
                <div class="resources-list">
                    <div class="resources-img">

                        <a href="{:U('Resource/special_culture',array('catid'=>51))}"><img src="{$config_siteurl}statics/ci/images/news/minjian.jpg" alt=""></a>
                    </div>
                    <div class="caption">
                        <h3><a href="{:U('Resource/special_culture',array('catid'=>51))}">【民间文化】</a></h3>
                        <content action = "lists" catid = "51" order = "id DESC" num= "1">
                            <volist name="data" id="vo">
                                <p style="line-height:26px;">
                                    {$vo.description|str_cut=###,57}

                                </p>
                            </volist>
                        </content>
                    </div>

                </div>
                <div class="resources-list">
                    <div class="resources-img">

                        <a href="{:U('Resource/special_culture',array('catid'=>50))}"><img src="{$config_siteurl}statics/ci/images/news/gujian.jpg" alt=""></a>
                    </div>
                    <div class="caption">
                        <h3><a href="{:U('Resource/special_culture',array('catid'=>50))}">【文物古建】</a></h3>
                        <content action = "lists" catid = "50" order = "id DESC" num= "1">
                            <volist name="data" id="vo">
                                <p style="line-height:26px;">
                                    {$vo.description|str_cut=###,57}

                                </p>
                            </volist>
                        </content>
                    </div>

                </div>
                <div class="resources-list">
                    <div class="resources-img">

                        <a href="{:U('Resource/special_culture',array('catid'=>49))}"><img src="{$config_siteurl}statics/ci/images/news/fengjing.jpg" alt=""></a>
                    </div>
                    <div class="caption">
                        <h3><a href="{:U('Resource/special_culture',array('catid'=>49))}">【园区基地】</a></h3>
                        <content action = "lists" catid = "49" order = "id DESC" num= "1">
                            <volist name="data" id="vo">
                                <p style="line-height:26px;">
                                    {$vo.description|str_cut=###,57}

                                </p>
                            </volist>
                        </content>
                    </div>

                </div>
                <div class="resources-list">
                    <div class="resources-img">

                        <a href="{:U('Resource/special_culture',array('catid'=>52))}"><img src="{$config_siteurl}statics/ci/images/news/changguan.jpg" alt=""></a>
                    </div>
                    <div class="caption">
                        <h3><a href="{:U('Resource/special_culture',array('catid'=>52))}">【文化场馆】</a></h3>
                        <content action = "lists" catid = "52" order = "id DESC" num= "1">
                            <volist name="data" id="vo">
                                <p style="line-height:26px;">
                                    {$vo.description|str_cut=###,57}

                                </p>
                            </volist>
                        </content>
                    </div>

                </div>


            </div>

        </div>




    </div>
    <!--            第五部分-->
    <!--            最后-->

    <div class="sixth" style="margin-top: 20px;">
        <div class="resources-logo">
            <img src="{$config_siteurl}statics/default/images/shouye/conpany11.jpg" alt="">

            <span class="more-news" style="margin-right: 20px;"><a href=".{:getCategory(8,'url')}" style="font-size: 16px;">更多>></a></span>


        </div>
        <div class="company-img">
            <get table="links" termsid="3" visible="1" order="id DESC" num="5" page="$page">
                <volist name="data" id="vo">
                    <a href=".{$vo.url}"><img src=".{$vo.image}" alt=""></a>
                </volist>
            </get>
        </div>

    </div>

    <!--      最后-->




</block>
<block name="after_scripts">
<!--轮播-->
    <script type="text/javascript">
        $(function(){
            Carousel.init($(".J_Poster"));
        });
//        搜索
        function text(){
            var value = document.getElementById("b").value;
            window.location.href='{:U("Content/Search/index")}&key='+value;
        }

	</script>

</block>
