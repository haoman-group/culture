<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>个人中心 - {$Config.sitename}</title>
<link href="/favicon.ico" rel="shortcut icon">
<link type="text/css" href="{$model_extresdir}css/core.css" rel="stylesheet" />
<link type="text/css" href="{$model_extresdir}css/common.css" rel="stylesheet" />
<link type="text/css" href="{$model_extresdir}css/user.css" rel="stylesheet" media="all" />
<link href="{$config_siteurl}statics/cu/css/css/dsjk.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="{$config_siteurl}statics/cu/css/base.css" />
<style>
.container{
    width:1190px;
    margin-left:20% ;
}
</style>
</head>
<body style="background: #fff;">
<template file="Member/Public/_header"/>
<div class="user">
  <div class="user_center">
    <template file="Member/Public/homeUserMenu.php"/>
    <div class="user_main">
      <div class="uMain_content">
        <div class="main_nav">
          <ul>
            <li class="modify"> <a class="on" href="{:U('Member/User/profile')}">个人中心</a> </li>
            <li class="modify"> <a class="on" href="{:U('Pubservice/Index/index')}">返回首页</a> </li>
          </ul>
        </div>
        <div class="main_nav2">
          <ul id="aa">
            <li  <if condition="ACTION_NAME eq 'mycard' ">class="current"</if>  id="mycard">  <a href="{:U('Member/Reader/mycard')}"><span>读者信息</span></a> </li>
            <li  <if condition="ACTION_NAME eq 'bind' ">class="current"</if>  id="bind">      <a href="{:U('Member/Reader/bind')}"><span>我要绑定</span></a> </li>
          </ul>
          <div id="tooltip" class=""> <a id="refresh" class="eda" type="0" cid="4" href="###" title="查看帮助" target="_blank"> </a> </div>
        </div>
        <div class="minHeight500"> 
          <!--修改基本资料-->
          <form id="" action="{:U('Member/Reader/bind')}" method="post">
          <div id="modifyProfile" class="profile">
            <div class="title">
              <div class="name">绑定山西省图书馆读者证</div>
            </div>
            <ul>
              <li>
                <div class="name"><span>*</span>读者证号码：</div>
                <div class="input92cc"> <input id="rnickname" class="input" type="text" value="" name="rdid" style="width:200px;" placeholder="请输入读者证号码"> </div>
                <div id="mrdid" class="input_msg"></div>
              </li>
              <li>
                <div class="name"><span>*</span>读者证密码：</div>
                <div class="input92cc"><input id="remail" class="input" type="password" value="" name="password" style="width:200px;" placeholder="请输入读者证账户密码"></div>
			        	<div id="mpassword" class="input_msg"></div>
			        </li>
              <li>
                <div class="name"></div>
                <div>
                  <span class="button-main">
                    <span>
                      <button id="" type="submit">绑定</button>
                    </span>
                  </span>
                </div>
              </li>
            </ul>
          </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<template file="Pubservice/Common/_foot"/>
</body>
</html>