

<extend name="shuipf/Template/Default/Industry/common/_layout.php" />
<block name="after_styles">

    <link rel="stylesheet" href="{$config_siteurl}statics/ci/css/index.css">
	<link rel="stylesheet" href="{$config_siteurl}statics/ci/css/information_category.css">
    <link rel="stylesheet" href="{$config_siteurl}statics/ci/css/product-style.css">
    <script src="{$config_siteurl}statics/ci/js/jquery.js"></script>
    <script type="text/javascript" src="{$config_siteurl}statics/cu/swiper/swiper.min.js"></script>
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
            width: 1200px;
            height: 390px;
        }
        .slider {
            text-align: center;
            margin: 0px auto 10px;
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
            margin-left: -51px;
            position: absolute;
            left: 50%;
            bottom: 4px;
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
        .slider-page a{
            background: rgba(0, 0, 0, 0.2);
            filter: progid:DXImageTransform.Microsoft.gradient(startColorstr=#33000000,endColorstr=#33000000);
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
            filter: progid:DXImageTransform.Microsoft.gradient(startColorstr=#66000000,endColorstr=#66000000);
        }
        .slider-next {
            left: 100%;
            margin-left: -28px;
        }
        .recom1:hover{
            font-weight:600;
        }
       
    </style>

</block>
<block name="content">
    <div class="index_Banner">
        <div class="swiper-container">
            <!--<div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <div class="slider">
                                <ul class="slider-main">
                                <!--<position action="position" posid="2" num="3">-->
                                    <!--<volist name="images" id="vo">
                                    <li class="slider-panel">-->
<!--                                        <a href="#"><img alt="" title="" src="{$vo.thumb}"></a>-->
                                         <!--<a href=""><img src="{$vo}" style="width: 1400px;height: 400px;"></a>
                                       
                                    </li>
                                    </volist>-->
                                     <!--</position>-->

                                <!--</ul>
                                <div class="slider-extra">
                                    <ul class="slider-nav">
                                        <li class="slider-item"></li>
                                        <li class="slider-item"></li>
                                        <li class="slider-item"></li>

                                    </ul>
                                   
                                </div>
                            </div>
                        </div>

               
            </div>-->
            	<div class="swiper-wrap" style="width:1190px;margin:20px auto 20px auto;">
				<div class="swiper-container swiper-style-default" style="height:355px;">
					<div class="swiper-wrapper" style="margin:auto;">
						<for start="0" end="3">
							<div class="swiper-slide"  align="center">
								
									<a href="###">
										<img src="{$images[$i]}" style="text-align:center;vertical-align:middle" >
									</a>
							</div>
						</for>
					</div>
					<!-- 导航按钮 -->
					<div class="swiper-button-prev"></div>
					<div class="swiper-button-next"></div>
					<!-- 滚动条 -->
					<div class="swiper-pagination" style="margin-right:45%;"></div>
				</div>
				<script>
					var swiper = new Swiper('.swiper-style-default',{
						nextButton: '.swiper-button-next',
						prevButton: '.swiper-button-prev',
						pagination: '.swiper-pagination',
						paginationClickable:true,
						spaceBetween: 5,
						loop:true,
						autoplay:5000,
					});
				</script>
				</div>
            <!-- Add Pagination -->
            <div class="swiper-pagination"></div>
        </div>
    </div>
    <div class="index_Search">
        <div class="content" >
            <div class="row">
                <div class="col-md-8">
                    <div class=" searbox indexsearbox hasdrop">
                        <form id="search_form" method="post" action="{:U('Industry/Index/search')}">
                            <em class="searcate">搜索</em>
                           <!-- <ul class="ulsearcate" style="width:150px;" >-->
                                <!--<li value="all">全部</li>
                                <volist name="category" id="vo">
                                <li  value="{$vo['catid']}">{$vo['catname']}</li>
                                </volist>-->
                                <!--<li>新闻</li>
                                <li>视频</li>
                                <li>图片</li>
                                <li>论坛</li>
                                <li>服务</li>-->
                            <!--</ul>-->
                            <div class="inpbox"><input type="text" class="inpsear" placeholder="" value=""  name="keywords"></div>
<!--                            <a class="searchdeep">搜索|高级搜索</a>-->

                            <input type="submit" class="btnsear"  >
                        </form>
                    </div>
                </div>

                <div class="col-md-4 index_SearchRm" >
                    欢迎关注山西文化产业微信公众号 : 2356982455
                </div>
            </div>

        </div>


    </div>


    <div class="content">

<!--        <div class="industry-news" >-->
<!---->
<!--            <div class="left-img" >-->
<!--                -->
<!--                <a href="{$vo.data.url}"><img  class="img-logo" src="{$vo.data.thumb}" alt=""></a>-->
<!--            </div>-->
<!---->
<!--            <div class="tuijianwei-news">-->
<!--                <div class="indursty-logo">-->
<!--                    <img src="{$config_siteurl}statics/images/industry-logo1.png" alt="">-->
<!--                    <a href=".{:getCategory(2,'url')}">更多>></a>-->
<!--                </div>-->
<!--                <div class="commend-news">-->
<!--                    <ul>-->
<!--                        <position action="position" posid="1" >-->
<!---->
<!--                            -->
<!---->
<!--                            <volist name="data" id="vo" num="6">-->
<!---->
<!---->
<!---->
<!--                                    <li>-->
<!--                                        <a href=".{$vo.data.url}">{$vo.data.title|str_cut=###,22}</a>-->
<!--                                        <span class="datetime">{$vo.data.inputtime|date="Y-m-d",###}</span>-->
<!--                                    </li>-->
<!---->
<!--                                </a>-->
<!--                            </volist>-->
<!--                        </position>-->
<!---->
<!---->
<!---->
<!---->
<!--                    </ul>-->
<!--                </div>-->
<!--            </div>-->
<!--            -->
<!--        </div>-->

<!--<form action="{:U('Member/Public/doLogin')}" id="form" method="post">-->
<!--                <div class="login-register">-->
<!---->
<!--                    <div  class="member-login">-->
<!--                        <img src="{$config_siteurl}statics/images/login-logo1.png" alt="">-->
<!--                    </div>-->
<!--                    <if condition = "$uid">-->
<!--                        <p style="font-size: 18px;margin-top: 15px;padding-left: 20px;line-height: 30px;">-->
<!--                        您好，{$username}!<br/>-->
<!--                        欢迎来到产业服务平台-->
<!--                        </p>-->
<!--                        <div class="btns">-->
<!--                            <input type="button" value="退出" class="logout" onclick="window.location.href = '{:U('Member/Index/logout')}'">-->
<!--                            -->
<!--                        </div>-->
<!--                        -->
<!--                    <else />-->
<!--                        <div class="login-password" >-->
<!--                        <div class="login-pic">-->
<!--                            <img src="{$config_siteurl}statics/images/shouye-login.jpg" alt="" style="display: block;margin-top: 5px;margin-left:3px">-->
<!--                        </div>-->
<!--                        <input type="text" value="" name="loginName">-->
<!--                        </div>-->
<!--                        <div class="login-password-1" >-->
<!--                            <div class="login-pic">-->
<!--                                <img src="{$config_siteurl}statics/images/shouye-register.jpg" alt="" style="display: block;margin-left:2px">-->
<!--                            </div>-->
<!--                            <input type="password" value="" class="zzjs_net" name="password">-->
<!--                        </div>-->
<!--                        <div class = "login-code">-->
<!--                            <input class="yzm" type="text" value="" name="vCode" /><img src='{:U("Api/Checkcode/index","type=userlogin&code_len=4&font_size=18&width=80&height=30&font_color=&background=")}' alt="验证码" id="authCode" onclick="changeAuthCode()"/>-->
<!--                        </div>-->
<!--                        <div class="btns">-->
<!--                            <input  type="button" value="登录" class="btnl" onclick="$('#form').submit();">-->
<!--                            <input   type="button"  value="注册" class="btnr" onclick="window.location.href = '{:U("Member/Index/register")}'">-->
<!--                        </div>-->
<!--                    </if>-->
<!--                    -->
<!---->
<!--                </div>-->
<!--                </form>-->

        <!--        <img src="{$config_siteurl}statics/ci/img/indexContent1.jpg" usemap="#Map2" />-->
        <map name="Map2">
            <area shape="rect" coords="841,40,895,64" href="news/list.html">
        </map>
        <div class="row index_Select">
            <div class="col-md-3 col-xs-4 index_SelectItem">
                <a href="{:U('Industry/Index/policylist')}">
                    <p class="lg">政策法规查询系统</p>
                    <p class="sm">Policies and Regulations Query System</p>
<!--                    <p class="sm">Policies and Regulations Query </p>-->
                </a>
            </div>
            <div class="col-md-3 col-xs-4 index_SelectItem">
                <a href=".{:U('Industry/Industry/index')}">
                    <p class="lg">产业项目服务平台</p>
                    <p class="sm">Service platform for industrial projects</p>
                </a>
            </div>
            <div class="col-md-3 col-xs-4 index_SelectItem">
                <a href="{:U('Industry/Index/lists',array('catid'=>21))}">
                    <p class="lg">文化金融服务</p>
                    <p class="sm">Culture Financial Services</p>
                </a>
            </div>
            <div style="width: 260px;height: 170px;float: right;margin-top: 20px">

                <a href="http://xmsbpt.sx-ci.cn:9002/"><img src="{$config_siteurl}statics/ci/images/pingtai.jpg" alt=""></a>
                <a href="http://t.qq.com/sxswhcyfzzx" style="margin-top: 15px;display: block"><img src="{$config_siteurl}statics/ci/images/center1.jpg" alt=""></a>

            </div>
            <div class="col-md-3 col-xs-4 index_SelectItem">
                <a href="{:U('Industry/Index/lists',array('catid'=>16))}">
                    <p class="lg">文化消费服务平台</p>
                    <p class="sm">Culture Consumer Services Platform</p>
                </a>
            </div>

        </div>

        <!--文化产品展示 开始-->
            <div class="culture-product clearfix">
            <h5><img style="margin-left: -20px;" src="{$config_siteurl}statics/ci/images/culpro1.png" alt="文化产品展示馆">
            <!-- <a href="{:U('Industry/Product/index')}">更多>></a> -->
            </h5>
            <?php 
                $product_data = M('IndustryProduct')->order('id')->getField('id,title,image,url');
            ?>
            <div class="cul-pro" style="margin-top: 30px;border: 1px solid #c2c2c2;">
                <volist name='product_data' id="vo">
                <if condition='$vo["id"]==1'>
                <div class="cul-left" style="position: relative;" >
                        <div style="position: relative;top: 0px;left:0;z-index: 10;">
                            <a href="{$vo.url}"><img src="{$config_siteurl}statics/default/images/shouye/no1.png" alt=""></a>
                        </div>
                        <div style="position: relative;top: -136px;">
                            <a href="{$vo.url}"><img class="" src="{$vo.image}" alt="" style="width: 580px;height: 439px;"></a>
                        </div>
                        <p style="position: relative;top: -197px;z-index: 10;opacity: 0.9">{$vo.title}</p>
                </div>
                <else />
                <div style="overflow: hidden;float: left;width:288px;height:221px">
                    <div class="cul-pro-right" style="position: absolute;width:288px;height:218px;float: left">
                        <a href="{$vo.url}"><img style="" src="{$vo.image|default=''}" alt=""></a>
                        <p style="position: relative;top: -42px;">{$vo.title}</p>
                    </div>
                </div>
                </if>
                </volist>
                <!-- <div class="left-triangle">
                    <p><</p>
                </div> -->
            </div>


            <!-- <div class="right-triangle" style="">
                <p>></p>
            </div> -->

            </div>

        </div>
    <!--文化产品展示 结束-->
            <div class="ulcisypro">
                <li>

                </li>
            </div>




        </div>




    </div>
    
    
    <!--        -->
    <div style="position: relative; width: 1200px;margin: 0 auto;">


        <img src="{$config_siteurl}statics/images/aaa.png"  style="margin-top: 20px;width: 100%;" />
        <a href="{:U('Industry/Forum/index')}" style="display: block;position: absolute;left: 612px;top: 75px;"><img src="{$config_siteurl}statics/ci/images/news/bbslogo1.jpg" alt=""></a>

        <a href="{:U('Industry/Index/lists',array('catid'=>10))}" style="display: block;position: absolute;left: 612px;top: 185px;"><img src="{$config_siteurl}statics/images/Case.jpg" alt=""></a>
        <a href="{:U('Industry/Index/lists',array('catid'=>9))}" style="display: block;position: absolute;left: 900px;top: 75px;"><img src="{$config_siteurl}statics/images/Research.jpg" alt=""></a>
        <a href="{:U('Industry/Index/lists',array('catid'=>6))}" style="display: block;position: absolute;left: 900px;top: 185px;"><img src="{$config_siteurl}statics/images/Subjects.png" alt=""></a>
    </div>
    </div>
     <div class="sixth" style="margin-top: 20px;">
        <div class="resources-logo">
            <img src="{$config_siteurl}statics/default/images/shouye/conpany11.jpg" alt="">
            
        </div>
        <div class="company-img" style="height:100px;">
            <get table="links" termsid="3" visible="1" order="id DESC" num="5" page="$page">
            <?php
            $data = null;
            $data = D('Admin/Industry')->where(['art_cid'=>[['EGT','132'],['ELT','141']],'isdelete'=>'0'])->limit(12)->select();
            ?>
                <volist name="data" id="vo">
                
                <if condition="($key eq 3) or ($key eq 7) or ($key eq 11) ">
                 <p style="margin-top:10px;float:left;"> <a href="{:U('Pubservice/Resources/industryshow',['id'=>$vo['id']])}" style="font-size:16px;color:#666;" class="recom1">{$vo.com_name}</a></p>
               <else/>
                <p style="margin-top:10px;float:left;"> <a href="{:U('Pubservice/Resources/industryshow',['id'=>$vo['id']])}" style="font-size:16px;color:#666;" class="recom1">{$vo.com_name}</a><span style="margin-left:15px;">|</span></p>
               </if>
                </volist>
            </get>
        </div>

    </div>
</block>
<block name="after_scripts">

    <script>
        $(function(){
            var swiper = new Swiper('.index_Banner .swiper-container', {
                pagination: '.swiper-pagination',
                nextButton: '.swiper-button-next',
                prevButton: '.swiper-button-prev',
                slidesPerView: 1,
                autoplay: 5000,
                paginationClickable: true,
                spaceBetween: 30,
                loop: true
            });

            var mySwiper = new Swiper('.culpro-container',{
                prevButton:'.swiper-button-prev',
                nextButton:'.swiper-button-next',
            })

        });

        $(function(){
            $(".top_menuItem").eq(0).addClass("choose");

            $(".publish").on("click",function(){
                layer.msg('请先登录',{
                    end: function(){
                        window.location.href = 'reg_login/login-personal-pub.html';
                    }
                });
                return false;
            });
        });
    </script>
</block>
<script type="text/javascript" >

        var i=true;
	function text(){
		var value = document.getElementById("b").value;
		window.location.href='{:U("Content/Search/policy")}&key='+value;
	}
    $(".searcate").click(function () {
        if(i){
            $(".searbox .searcate").addClass("active");
            i=false;
        }else{
            $(".searbox .searcate").removeClass("active");
            i=true;
        }


    })
        $("body").click(function () {
            if(!i){
                $(".searbox .searcate").removeClass("active");
                i=true;
            }
        })
	</script>
<block name="after_scripts">
	
    <script type="text/javascript">
        $(document).ready(function() {
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
            $('.slider-panel, .slider-pre, .slider-next').hover(function() {
                stop();
                $('.slider-page').show();
            }, function() {
                $('.slider-page').hide();
                start();
            });
            $('.slider-item').hover(function(e) {
                stop();
                var preIndex = $(".slider-item").filter(".slider-item-selected").index();
                currentIndex = $(this).index();
                play(preIndex, currentIndex);
            }, function() {
                start();
            });
            $('.slider-pre').unbind('click');
            $('.slider-pre').bind('click', function() {
                pre();
            });
            $('.slider-next').unbind('click');
            $('.slider-next').bind('click', function() {
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
                if(!hasStarted) {
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
