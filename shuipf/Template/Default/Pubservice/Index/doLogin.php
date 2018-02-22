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
    

    <div class="all" style="width: 1190px;margin: 0 auto;min-height:720px;">
    	<div class="login-left"></div>
    	<form action="" method="post" class="login-right">
            <div class="login-right-box">
                 <if condition="$_GET['type'] eq 'database-register' ">
                    <h5>文化大数据库登录</h5>
                    <else/>
                    <h5>公共服务登录平台</h5>
                </if>

                <input type="text" name="username" id="username" class="text01" value="" placeholder="请输入用户名" />
                <input type="password" name="password" id="userPsd" class="text01" value="" placeholder="请输入密码"/>
                
                <div class="login-set clearfix">
                        <!-- <span><input type="checkbox" id="auto" /><label for="auto">下次自动登录</label></span> -->
                    <div class="check" style="width:80%;margin-top:10px;margin-left:17%;">
                        <input name="type" id="normal-user" type="radio" value="normal" style="height:15px;width:15%;margin-left:-35%;" checked="checked" />
                        <label for="normal-user">普通用户</label>
                        <input name="type" id="library-user" type="radio" value="binding" style="height:15px;width:15%;"/>
                        <label for="library-user">图书馆卡号用户</label>  
                    </div>
                    <!--<select name="type">
                    	<option value="admin">管理员</option>
                        <option value="normal" selected>普通用户</option>
                        <option value="binding" >图书馆卡号用户</option>
                    </select>-->
                    
                    
                    <!-- <a href="{:U('Member/User/profile')}">修改资料</a>| -->
                </div>
                <div class="login-button">
                    <p style="color:red">{$error_msg}</p>
                    <input type="submit" value="登&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;录" />
                </div>
                <a class="reg-link" href="{:U('Member/Index/register',array('type'=>$_GET['type']))}"><span style="">没有账号？</span>&nbsp;立即注册!</a>
            </div>
        </form>
    </div>

    <!-- <div class="push"></div> -->
</div>
<div class="clr"></div>
<template file="Pubservice/Common/_foot"/>
</body>
</html>