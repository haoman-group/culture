    <extend name="shuipf/Template/Default/Industry/common/_layout.php" />
    <block name="after_styles">
        <link rel="stylesheet" href="{$Config_siteurl}statics/css/resource.css">
    </block>
    <block name="content">
        <div id="banner">
            <img src="{$config_siteurl}statics/images/news/list3-banner.jpg">
        </div>
        <div id="search">
            <div class="container clearfix">
                <p class="tips">欢迎关注山西文化产业微信公众号：2356982455</p>
                <form action="">
                    <input type="text" placeholder="输入你要搜索的关键字" value="" id="b">
                    <input class="search_btn" type="button" value="搜索"  onclick="text()">
                </form>
            </div>
        </div>
        <div id="nav">
            <div class="container">
                <ul>
                    <li><a href="{:U('Industry/Index/index')}" class="home_src" style="color:#900;">首页</a></li>
                    <li><span>></span></li>
                    <li><a href=".{:getCategory(1,'url')}">资讯中心</a></li>
                    <li><span>></span></li>
                    <li><a href="javascript:;" style="color: #900;">文化资源</a></li>
                </ul>
            </div>
        </div>
        <div id="content">
            <div class="container clearfix">
                <div class="img-title" >

                    <div class="zy_content" >
                        <div class="zy_img" >
                            <a href="{:U('Resource/special_culture',array('catid'=>47))}"><img src="{$config_siteurl}statics/ci/images/news/special_culture.jpg" alt=""></a>
                        </div>
                            <p>【特色文化】</p>

                    </div>
                    <div class="zy_content" >
                        <div class="zy_img" >
                            <a href="{:U('Resource/special_culture',array('catid'=>48))}"><img src="{$config_siteurl}statics/ci/images/news/wh_yc.jpg" alt=""></a>
                        </div>
                        <p>【文化遗产】</p>

                    </div>
                    <div class="zy_content" >
                        <div class="zy_img" >
                            <a href="{:U('Resource/special_culture',array('catid'=>51))}"><img src="{$config_siteurl}statics/ci/images/news/mj_wh.jpg" alt=""></a>
                        </div>
                        <p>【民间文化】</p>

                    </div>
                    <div class="zy_content" >
                        <div class="zy_img" >
                            <a href="{:U('Resource/special_culture',array('catid'=>50))}"><img src="{$config_siteurl}statics/ci/images/news/ww_gj.jpg" alt=""></a>
                        </div>
                        <p>【文物古建】</p>

                    </div>
                    <div class="zy_content" >
                        <div class="zy_img" >
                            <a href="{:U('Resource/special_culture',array('catid'=>49))}"><img src="{$config_siteurl}statics/ci/images/news/fj_ms.jpg" alt=""></a>
                        </div>
                        <p>【园区基地】</p>

                    </div>
                    <div class="zy_content" >
                        <div class="zy_img" >
                            <a href="{:U('Resource/special_culture',array('catid'=>52))}"><img src="{$config_siteurl}statics/ci/images/news/wh_cg.jpg" alt=""></a>
                        </div>
                        <p>【文化场馆】</p>

                    </div>

                </div>


            </div>



            </div>
        </div>


    </block>
    <block name="after_scripts">
        <script type="text/javascript" >
            function text(){
                var value = document.getElementById("b").value;
                window.location.href='{:U("Content/Search/index")}&key='+value;
            }
        </script>
    </block>