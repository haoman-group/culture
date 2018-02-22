<extend name="./shuipf/Template/Default/Industry/common/_layout.php"/>
<block name="after_styles">

    <link rel="stylesheet" href="{$config_siteurl}statics/ci/css/finance.css">
    <link rel="stylesheet" href="{$config_siteurl}statics/ci/css/product_week.css">
    <link href="{$config_siteurl}statics/ci/css/css/jquery-ui-1.10.1.css" rel="stylesheet">
    <link rel="stylesheet" href="{$config_siteurl}statics/ci/css/css/vigo.datepicker.css">
    <style>
        #content .ui-datepicker table{width: 260px;float: none}
        #content .ui-datepicker table td{padding:0;}
        #content .ui-datepicker{width: 0}
        #content .ll-skin-vigo .ui-datepicker-header{width: 260px}
        #content table td {border:none;border-bottom: 1px solid #e4e4e4;font-size: 10px}
        #content .ui-widget-content{border:none;}
        #content table tr{height: 20px;font-size: 10px}
        .ll-skin-vigo td .ui-state-default{padding:0;}
        .ll-skin-vigo .ui-datepicker-header{background: #6cb9f1;}
        #content table thead tr{background: #6cb9f1;}
         #content table tbody {background: #fff;}
    </style>
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
                nextButton: '.swiper-button-next',
                prevButton: '.swiper-button-prev',

                // 如果需要滚动条
                // scrollbar: '.swiper-scrollbar',

            })
        });

    </script>
    <!-- <script src="http://www.jq22.com/jquery/jquery-1.10.2.js"></script> -->
    <script src="http://www.jq22.com/jquery/jquery-ui-1.11.0.js"></script>
    <script>

        $(function() {  
            $( ".datepicker" ).datepicker({
                inline: true,
                showOtherMonths: true
            });
        });
        $(function(){

            $('.ui-state-active').parents('tr').css({'background':"#e1ad86"})
        })
        $(function(){
            $(".ui-state-default").click(function(event) {
                /* Act on the event */
                // var i = $(this).parent("tr").index();
                // alert(i)
            });
        })
    </script>
</block>
<block name="content">
    <div id="nav">
    <div class="container">
        <ul>
            <li><a href="{:U('Industry/Index/index')}" class="home_src" style="color:#900;">首页</a></li>
            <li><span>></span></li>
            <li><a href="{:U('Industry/Product/index')}">产品展示</a></li>
            <li><span>></span></li>
            <li><a href="javascript:;" style="color: #900;">一周一品</a></li>
        </ul>
    </div>
</div>
    <div id="content">
        <div class="container clearfix">
            <hr color="#4480df" />
            <div class="week_p_dis">
                <div class="week_dis_left">
                    <h3>{$data.p_name} <a href=""></a></h3>
                    <ul>
                        <li>产地：{$data.province}省{$data.city}</li>
                        <li style="color:#900;">售价：{$data.price}</li>
                        <li style="width: 300px">产品尺寸：</li>
                        <li>联系方式：{$data.phone}</li>
                        <li style="width: 500px">生产厂家：{$data.manufacturer}</li>
                        
                        <li>产品描述：<?php echo  html_entity_decode($data['p_describe'], ENT_QUOTES, 'UTF-8')?></li>
                        
                        
                        <p style="clear: both"></p>
                    </ul>
                </div>
                <div class="week_dis_right">
                    <div class="datepicker ll-skin-vigo"></div>

                </div>
                <p style="clear: both"></p>
            </div>
            <div>
                <div class="swiper-container pic-container" style="text-align: center;margin-top: 100px;">
                    <div class="swiper-wrapper">
                    <volist name='data.thumb' id ='vo'>
                        <div class="swiper-slide">
                            <img src="{$vo}" alt="">
                        </div>
                    </volist>  
                    </div>
                    <!-- 如果需要分页器 -->
                    <!-- <div class="swiper-pagination"></div> -->

                    <!-- 如果需要导航按钮 -->
                    <div class="swiper-button-prev"></div>
                    <div class="swiper-button-next"></div>

                    <!-- 如果需要滚动条 -->
                    <!-- <div class="swiper-scrollbar"></div> -->
                </div>
                <!-- <img src="{$config_siteurl}statics/ci/images/product-show/show1.jpg" alt=""> -->
            </div>
            <div>
                <img src="{$config_siteurl}statics/ci/images/product-show/show3.jpg" alt="">
            </div>
        </div>
    </div>

</block>