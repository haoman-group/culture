<extend name="shuipf/Template/Default/Industry/common/_layout.php" />
<block name="after_styles">

    <link rel="stylesheet" href="{$config_siteurl}statics/ci/css/category_project.css">

    <!--    <link rel="stylesheet" href="{$config_siteurl}statics/ci/css/finance.css">-->


</block>

<block name="content">

    <!--<div class="search-area" >
        <form id="search_form" method="post" action="#">
            <ul class="search-point" >
                <li class="search-category"  style="text-align: center;">全部&nbsp</li>

            </ul>
            <input type="text" class="search-box" placeholder="" value="" id="b">
            <input class="search-submit" type="button" value="搜索|高级搜索">
            <span class="search-icon" onclick="text()"><img src="{$config_siteurl}statics/images/spring.png" alt=""></span>

        </form>
    </div>-->
    <!--        kaishi-->
    <!--    项目内容-->
    <div class="in-content" style="width: 1200px;overflow: hidden;margin: 0 auto">
        <div style="border: 1px solid #c2c2c2;margin-top: 20px;width: 100%;display:block;">
            <a href="{:U('Industry/Industry/recommend')}"><img style="width:100%; height:100%;" src="{$config_siteurl}statics/ci/images/industry_logo1.jpg" alt=""></a>
        </div>
<!--        <div style="float: left;margin-top: 20px;"><a href="http://xmsbpt.sx-ci.cn:9002/"><img src="{$config_siteurl}statics/ci/images/industry_pingtai.jpg" alt=""></a></div>-->
<!--        <div style="float: right;margin-top: 20px;"><a href="{:U('Industry/Industry/add_personal')}"><img src="{$config_siteurl}statics/ci/images/industry_fabu2.jpg" alt=""></a></div>-->

<!--        <div style="width: 300px;float: right;display: block">-->
<!--            <form action="{:U('Member/Public/doLogin')}" id="form" method="post">-->
<!--                <div class="login-register">-->
<!---->
<!--                    <div  class="member-login" style="color: red">-->
<!--                        <img src="{$config_siteurl}statics/images/login-logo1.png" alt="">-->
<!--                    </div>-->
<!--                    <if condition = "$uid">-->
<!--                        <p style="font-size: 18px;margin-top: 15px;padding-left: 20px;line-height: 30px;">-->
<!--                            您好，{$username}!<br/>-->
<!--                            欢迎来到产业服务平台-->
<!--                        </p>-->
<!--                        <div class="btns"style="margin-left: 90px;margin-top: 50px">-->
<!--                            <input type="button" value="退出" class="logout" onclick="window.location.href = '{:U('Member/Index/logout')}'">-->
<!---->
<!--                        </div>-->
<!---->
<!--                        <else />-->
<!--                        <div class="login-password" >-->
<!--                            <div class="login-pic">-->
<!--                                <img src="{$config_siteurl}statics/images/shouye-login.jpg" alt="" style="display: block;margin-top: 5px;margin-left:3px">-->
<!--                            </div>-->
<!--                            <input type="text" value="" name="loginName">-->
<!--                        </div>-->
<!--                        <div class="login-password-1" >-->
<!--                            <div class="login-pic">-->
<!--                                <img src="{$config_siteurl}statics/images/shouye-register.jpg" alt="" style="display: block;margin-left:2px">-->
<!--                            </div>-->
<!--                            <input type="password" value="" class="zzjs_net" name="password">-->
<!--                        </div>-->
<!--                        <div class="btns">-->
<!--                            <input type="button" value="登录" class="log" onclick="$('#form').submit();">-->
<!--                            <input type="button"  value="注册" class="log-reg" onclick="window.location.href = '{:U("Member/Index/register")}'">-->
<!--                        </div>-->
<!--                    </if>-->
<!--                </div>-->
<!--            </form>-->
<!--        </div>-->
        <div style="float: left;margin-top: 20px;"><a href="http://xmsbpt.sx-ci.cn:9002/"><img src="{$config_siteurl}statics/ci/images/industry_pingtai1.png" alt=""></a></div>
        <div style="float: right;margin-top: 20px;"><a href="{:U('Industry/Industry/add_personal')}"><img src="{$config_siteurl}statics/ci/images/industry_fabu22.png" alt=""></a></div>



        <!--       产业图标-->
        <div class="list-content" style="display: inline-block;" >
            <div class="project-present" >
            <span><img src="{$config_siteurl}statics/default/images/shouye/industry144.png" alt=""></span>
                    <p><a style="font-size: 16px;" href="{:U('Industry/Industry/obj_display')}">更多>></a></p>
        </div>
        <!--        产业图标-->
            <?php

        $obj = D("Content/IndustryIssue");
            $data =$obj->where(array('status'=>1))->limit(16)->order('id desc')->select();
            foreach ($data as $key => $value) {
                 $data[$key]['categoryname']=M('industry_category')->where(array('id'=>$value['pcategory']))->getField('categoryname');
            }
            
        ?>
        <foreach name="data" item="vo">
            <div class="in-list" style="height: 290px;">
               
                <img src="{:thumb($vo['pthumb'],260,150,1)}" style="width:260px;height:150px;margin:8px;">
                <!--<div class="timg1">
                    <a href="{:U('Industry/Industry/detail_conpany',array('id'=>$vo['id']))}"><img class="img1" src="" alt="{$vo.title}" style="width:270px;height: 202px; "></a>
                </div>-->
                <div class="tcontent" style="margin-left: 22px;padding-top: 5px;">
                     <a href="{:U('Industry/Industry/detail_conpany',array('id'=>$vo['id']))}">项目名称：{$vo.pname|str_cut=###,10}</a></span><br>
<!--                    <p style="font-size: 13px;"><a href="{:U('Industry/Industry/detail_conpany',array('id'=>$vo['id']))}" style="color:#CACACA;font-size: 13px; ">行业：{$vo.pcategory}</a></p>-->
                   <p style="font-size: 13px;margin-left: 0px;padding-top: 3px;">行业：{$vo.categoryname|str_cut=###,7}&nbsp;地区：山西省</p>

                    <p style="font-size: 13px;margin-left: 0px;padding-top: 3px;">投资总额：{$vo.plimit}万</a></p>
                </div>
            </div>
        </foreach>
        <!--            内容-->
    </div>
    <!--                登录-->


    <!--        登录-->
    </div>




    <!--    项目内容-->
    <!--    jieshu-->
</block>
<block name="after_scripts">
    <script type="text/javascript">
        $(function(){

        })
    </script>

    <!--    主要内容-->



</block>
<block name="after_scripts">
    <script type="text/javascript" >
    function text(){
        var value = document.getElementById("b").value;
        window.location.href='{:U("Industry/Search/index")}&key='+value;
    }
    </script>
</block>
