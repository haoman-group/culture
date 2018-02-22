<?php if (!defined('SHUIPF_VERSION')) exit(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="description" content="查看空间主题，了解{$userinfo.username}喜欢的新闻资讯，与他一起交流，分享关注空间主题信息。" />
<meta name="keywords" content="空间主题" />
<title>空间主题 - {$Config.sitename}</title>
<link href="/favicon.ico" rel="shortcut icon">
<template file="Member/Public/global_js.php"/>
<script type="text/javascript" src="{$model_extresdir}js/common.js"></script>
<link type="text/css" href="{$model_extresdir}css/core.css" rel="stylesheet" />
<link type="text/css" href="{$model_extresdir}css/common.css" rel="stylesheet" />
<link type="text/css" href="{$model_extresdir}css/space.css" rel="stylesheet" />
<link type="text/css" id="skin" href="{$model_extresdir}theme/{$themeName}/style.css" rel="stylesheet" />
</head>
<body>
<template file="Member/Home/topNav.php"/>
<div class="spaceMain">
  <div class="mainTop"></div>
  <div class="mainCenter">
    <div class="publicLeft">
      <div class="stageBox">
        <div class="stageBoxTop"><span></span></div>
        <div class="stageBoxCenter">
          <div class="minHeight940">
            <div class="spaceMTitle2">
              <p>装扮皮肤</p>
              <ul>
                <li class="current"><a href="javascript:;">装扮商城</a><b></b></li>
              </ul>
            </div>
            <div class="title_per"></div>
            <div class="headerNav" style="display:none;">
              <div class="nav_item"><span>颜色:</span>
                <ul class="navTab">
                  <li class="current"><a href="space?a=skin">全部</a></li>
                  <li ><a href="space?a=skin&classId=1">黑色酷炫</a></li>
                  <li ><a href="space?a=skin&classId=2">粉色浪漫</a></li>
                  <li ><a href="space?a=skin&classId=3">蓝色经典</a></li>
                  <li ><a href="space?a=skin&classId=4">黄色温馨</a></li>
                  <li ><a href="space?a=skin&classId=50">绿色清新</a></li>
                </ul>
              </div>
            </div>
            <div class="homeSkin_list">
              <div class="homeSkin_list_header">
                <h4 class="list_headerName">全部</h4>
                <p class="order"> 排序： <a <if condition="$orderby eq 0 ">class="bold"</if> href="{:UM('Home/skin')}">最新上架</a> &nbsp;<span>|</span>&nbsp; <a <if condition="$orderby eq 1 ">class="bold"</if>  href="{:UM('Home/skin',array('order'=>1) )}">超高人气</a></p>
              </div>
              <ul class="homeSkin_list_body">
                <volist name="theme" id="vo">
                <li class="ornament ornament-hovered ">
                  <div class="ornament-content" skinId="{$vo.id}" skinPath="{$vo.themedir}"><img class="previewImg" title="{$vo.theme} " skinId="{$vo.id}" src="{$model_extresdir}theme/{$vo.themedir}/thumb.jpg" onerror="$call(function(){libs.imageError(this);}, this)"/><span class="ornament-status status-new"></span><span class="click-preview" skinPath="{$vo.themedir}" id="on{$vo.id}">点击预览</span></div>
                  <div class="ornament-name" ><span>{$vo.theme}</span></div>
                </li>
                </volist>
              </ul>
              <div class="page">
                <div class="acButton"><span class="button2-main"><span>
                  <button id="change" type="button" uid="{$userinfo.userid}" BskinPath="{$themeName}">保存主题</button>
                  </span></span><span class="button2-main"><span>
                  <button id="default" type="button" uid="{$userinfo.userid}" BskinPath="{$themeName}">恢复默认</button>
                  </span></span></div>
              </div>
              <div class="page" >{$Page}</div>
            </div>
          </div>
        </div>
        <div class="stageBoxBottom"><span></span></div>
      </div>
    </div>
    <div class="publicRight">
      <template file="Member/Home/publicRight.php"/>
    </div>
  </div>
  <div class="mainBottom"></div>
</div>
<template file="Member/Home/footer.php"/>
<script type="text/javascript" src="{$model_extresdir}js/skin.js"></script>
<script type="text/javascript">skinLib.skinUpdate();</script>
</body>
</html>