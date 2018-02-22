<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>文化大数据库</title>
<!-- <template file="Cudatabase/Common/_cssjs"/> -->
<link rel="stylesheet" type="text/css" href="{$config_siteurl}statics/cu/css/base.css" />

<link href="{$config_siteurl}statics/cu/css/css/dsjk.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="{$config_siteurl}statics/cu/jquery/jquery.min.js"></script>
<script type="text/javascript" src="{$config_siteurl}statics/cu/layer/layer.js"></script>
<style>
	* {
	margin: 0;
}
html, body {
	height: 100%;
}

.footer1, .push {
	height: 100px; /* .push 要跟 .footer 的高度一样  */
	margin-top: 183px;
}
.container{
    width:1190px;
    margin-left:20% ;
}
</style>
</head>

<body>
<template file="Member/Public/_header"/>
<div class="wrapper">
    <!-- <div class="top">
    	<div class="top1">
            <div class="logo">
                <a href="/cudatabase"><img src="{$config_siteurl}statics/cu/images/images/sjk/logo.png" width="258" height="140" /></a>
            </div>
        </div>
    </div> -->
    

    <div class="all" style="width: 1190px;margin: 0 auto;min-height:720px">
    	<div class="login-left"></div>
    	<form action="{:U('Cudatabase/Public/doLogin')}" method="post" class="login-right">
            <div class="login-right-box">
                <h5>文化大数据库登录</h5>
                <input type="text" name="username" id="username" class="text01" value="" placeholder="请输入用户名"/>
                <input type="password" name="password" id="userPsd" class="text01" value="" placeholder="请输入密码"/>
                <div class="login-set clearfix" style="text-align:left;font-size:13px;">
                    <i style="padding-left:10px;"><span style="color:red;font-weight:bold;">*</span>仅允许管理员登陆</i>
                    <!-- <span><input type="checkbox" id="auto" /><label for="auto">下次自动登录</label></span> -->
                    <!-- <select name="type"> -->
                    	<!-- <option value="admin" selected>管理员</option>"normal" -->
                    <!-- </select> -->
                    <input type="hidden" name="type" value="admin">
                </div>
                <div class="login-button">
                    <p style="color:red">{$error_msg}</p>
                    <input type="submit" value="登&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;录" />
                </div>
            </div>
        </form>
    </div>

    <!-- <div class="push"></div> -->
</div>
<div class="clr"></div>
<template file="Pubservice/Common/_foot"/>
</body>
</html>
