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

<div id="nav">
    <div class="container">
        <ul>
            <li>
                <a href="{:U('/')}" >首页</a>
            </li>
            <li><span>></span></li>
            <li>
                <a href="{:U('Industrymem/Index/index')}">会员中心</a>
            </li>
            <li><span>></span></li>
            <li>
                <block name="bread_crumbs"><a href="javascript:;">会员中心</a></block>
            </li>
        </ul>

    </div>
</div>
<div class="content memcontent">
    <div class="row">
        <template file="Industrymem/common/_sidebar.php"/>
        <block name="content"></block>
    </div>
</div>

<block name="before_scripts"></block>

<block name="scripts">
   <script type="text/javascript" src="{$config_siteurl}statics/ci/js/jquery.min.js"></script>
        <script type="text/javascript" src="{$config_siteurl}statics/ci/js/swiper.min.js"></script>
        <script type="text/javascript" src="{$config_siteurl}statics/ci/js/topMenu.js" ></script>
        <script type="text/javascript" src="{$config_siteurl}statics/ci/js/common.js" ></script>
        <script src="{$config_siteurl}statics/cu/layer/layer.js"></script>
</block>

<block name="after_scripts">

</block>
</body>
</html>
