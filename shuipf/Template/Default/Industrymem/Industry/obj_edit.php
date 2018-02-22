<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <block name="title">
        <title>产业服务平台</title>
    </block>
    <block name="before_styles"></block>

    <block name="styles">
        <link rel="stylesheet" href="{$config_siteurl}statics/bootstrap/css/bootstrap.min.css" />
        <link rel="stylesheet" href="{$config_siteurl}statics/ci/css/swiper.css" />
        <link rel="stylesheet" href="{$config_siteurl}statics/ci/css/style.css" />
        <link rel="stylesheet" href="{$config_siteurl}statics/ci/css/base.css" />
        <link rel="stylesheet" href="{$config_siteurl}statics/ci/css/member.css" />
    </block>

    <block name="after_styles"></block>
</head>
<body>

<block name="top">
    <template file="Industry/common/_top.php"/>
</block>

<block name="header">
    <template file="Industry/common/_header.php"/>
</block>
<div class="content memcontent">
    <div class="row">
        <!--<template file="Industrymem/common/_sidebar.php"/>-->
        <block name="content"></block>
    </div>
</div>

<block name="before_scripts"></block>

<block name="scripts">
   <script type="text/javascript" src="{$config_siteurl}statics/ci/js/jquery.min.js"></script>
        <script type="text/javascript" src="{$config_siteurl}statics/ci/js/swiper.min.js"></script>
        <script type="text/javascript" src="{$config_siteurl}statics/ci/js/topMenu.js" ></script>
        <script type="text/javascript" src="{$config_siteurl}statics/ci/js/common.js" ></script>
        <script type="text/javascript" src="{$config_siteurl}statics/cu/bootstrap/bootstrap/js/bootstrap.min.js"></script>
        <script src="{$config_siteurl}statics/cu/layer/layer.js"></script>
        <script src="{$config_siteurl}statics/js/wind.js"></script>
        <script type="text/javascript" src="{$Config_siteurl}statics/js/content_addtop.js"></script>
        <script src="{$config_siteurl}statics/cu/layer/layer.js"></script>
</block>

<block name="after_scripts">

</block>
</body>
</html>
<block name="after_styles">

    <link href="{$config_siteurl}statics/js/artDialog/skins/default.css" rel="stylesheet" />
</block>
<block name="content">
    <div id="nav">
        <div class="container">
            <ul>
                <li><a href="../index.html">首页</a></li>
                <li><span>></span></li>
                <li><a href="index.html">产业项目</a></li>
                <li><span>></span></li>
                <li><a href="#">发布系统</a></li>
            </ul>
        </div>
    </div>
    <div id="content">
        <div class="container industry clearfix">
            <div class="industry-left">
                <h2></h2>
                <ul>
                    <li><a href="#"><span>●</span>发布系统</a></li>
                </ul>
            </div>
            <div class="industry-right">
                <h5><span>发布系统</span></h5>


                <form  method="post">

                    <dl class="clearfix">
<!--                        <dt>企业名称：</dt><dd><input type="text" value="深圳波西房地产开发公司" placeholder="" name="cname"></dd>-->
                        <dt>项目名称：</dt><dd><input type="text" value="{$data.pname}" placeholder="" name="pname"></dd>
                        <dt>项目类别：</dt>
                        <dd>
                            <select name="pcategory" id="" >
                               <option value="0">请选择</option>
                                 <volist name="industry_category" id="vo">
                                    <option value="{$vo.id}" <if condition="$data['pcategory'] eq $vo['id']"> selected="selected" </if>>{$vo.categoryname}</option>
                                </volist>
                            </select>
                        </dd>
                        <dt>项目投资总额：</dt><dd><input type="text" value="{$data.plimit}万" name="plimit"><i>(万元)</i></dd>
                        <dt>项目负责人：</dt><dd><input type="text" value="{$data.pleader}" name="pleader"></dd>
                        <dt>联系电话：</dt><dd><input type="text" value="{$data.contactnum}" name="contactnum"></dd>
                        <dt>项目所在地：</dt><dd><input type="text" value="{$data.plocation}" name="plocation"></dd>
                        <dt>项目简介：</dt><dd><input type="text" value="{$data.pbriefing}" name="pbriefing"></dd>
                        <dt>项目阶段：</dt>
                        <dd>
                            <select name="pstage" id="" >
                               <option value="0">请选择</option>
                                <volist name="industry_stage" id="vo">
                                    <option value="{$vo.sid}" <if condition="$data['pstage'] eq $vo['sid']"> selected="selected" </if>>{$vo.stagename}</option>
                                </volist>
                            </select>
                        </dd>
                        <dt>项目前景：</dt><dd><textarea name="prospect" id="" cols="30" rows="10" value = "{$data.prospect}">{$data.prospect}</textarea></dd>
                        <dt>项目图片：</dt><dd class=""><Form function="images" parameter="pthumb,pthumb,'',content"/><span>*（ 双击看图）</span></dd>
                        <dt>进入投融资项目库：</dt><dd><input type="radio" id="yes" name="pfinancing" value="1" <if condition="$data['pfinancing'] eq 1">checked="checked"</if>/><label for="yes">是</label><input type="radio" id="no" name="pfinancing" value="0" <if condition="$data['pfinancing'] eq 0">checked="checked"</if>/><label for="no">否</label></dd>
                        <input type="hidden" name="id" value="{$data.id}">
                        <input type="hidden" name='uid' value="{$uid}">
                        <dd class="btn"><a href="javascript:;" class="add";>确定</a><a href="">取消</a></dd>
                    </dl>


                </form>


            </div>
        </div>
    </div>

</block>
<block name="after_scripts">
    <script type="text/javascript">
        //全局变量
        var GV = {
            DIMAUB: "{$config_siteurl}",
            JS_ROOT: "{$config_siteurl}statics/js/"
        };
    </script>
    <script type="text/javascript" src="{$config_siteurl}statics/ci/js/layer/layer.js"></script>
    <script>
        var uid = {$uid};
        checked_login(uid);
    </script>
    <script src="{$config_siteurl}statics/js/wind.js"></script>
    <script src="{$config_siteurl}statics/js/common.js?v"></script>
    <script type="text/javascript">
        $(function(){
            $('.add').click(function(){
                var data = $('form').serialize();
                $.post("{:U('Industry/Industry/edit_obj')}",data,function(data){
                    if(data.status==1){
                        Wind.use("artDialog", function () {
                         art.dialog({
                            id: "succeed",
                            icon: "succeed",
                            fixed: true,
                            lock: true,
                            background: "#CCCCCC",
                            opacity: 0,
                            content: data.message,
                            button:[{
                                name: '确定',
                                callback:function(){
                                   
                                },
                                focus: true
                            }]
                         })
                      })
                    }else{
                        alert(data.message)
                    }
                },"json")

            })
        })
    </script>

</block>

