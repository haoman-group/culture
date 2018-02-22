<?php if (!defined('SHUIPF_VERSION')) exit(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>照片排序 - {$Config.sitename}</title>
<template file="Member/Public/global_js.php"/>
<script type="text/javascript" src="{$model_extresdir}js/common.js"></script>
<link href="/favicon.ico" rel="shortcut icon">
<link type="text/css" href="{$model_extresdir}css/core.css" rel="stylesheet" />
<link rel="stylesheet" type="text/css" href="{$model_extresdir}css/common.css" />
<link type="text/css" href="{$model_extresdir}css/user.css" rel="stylesheet" media="all" />
</head>
<body>
<template file="Member/Public/homeHeader.php"/>
<div class="user">
  <div class="user_center">
    <template file="Member/Public/homeUserMenu.php"/>
    <div class="user_main">
      <div class="uMain_content">
        <div class="main_nav">
          <ul>
            <li class="me"> <a class="on" href="{:U("Album/album")}">我的照片</a> </li>
            <li class="fond"> <a href="album?a=album&i=praise">喜欢的照片</a> </li>
            <li class="friend"> <a href="album?a=album&i=following">好友的照片</a> </li>
          </ul>
          <div class="action"> <a href="{:U("Album/imageadd")}">上传照片</a> </div>
        </div>
        <div class="main_nav2">
          <ul>
             <li><a href="{:U("Album/album")}">照片列表</a></li>
			 <li class="current"><a href="{:U("Album/homeshow")}">首页显示</a></li>
			 <li><a href="{:U("Album/listorder")}">重新排序</a></li>
          </ul>
          <div id="tooltip" class="refresh"> <a id="refresh" class="eda" type="0" cid="4" href="help/" title="查看帮助" target="_blank"> </a> </div>
        </div>
        <div class="minHeight500">
           <if condition=" !$album && !$homealbum ">
            <div class="nothing">暂时还没有照片啊！</div>
           <else/>
          <div class="imageSort">
              <div id="imageSort1" class="sortable ui-sortable">
              <volist name="homealbum" id="vo">
              <img id="{$vo.id}" class="imgfile" src="{$vo.thumb}" uid="{$uid}" height="80" width="80" onerror="jQuery(function(){libs.imageError(this);}, this)">
              </volist>
              </div>
              <div class="space_sort_utton"><span class="button-main"><span>
                <button id="saveButton">保存结果</button>
                </span></span></div>
              <div id="imageSort2" class="sortable ui-sortable">
              <volist name="album" id="vo">
              <img id="{$vo.id}" class="imgfile" src="{$vo.thumb}" uid="{$uid}" height="80" width="80" onerror="jQuery(function(){libs.imageError(this);}, this)">
              </volist>
              </div>
            </div>
           </if>
        </div>
      </div>
    </div>
  </div>
<template file="Member/Public/homeFooter.php"/>
</div>
<script type="text/javascript" src="{$model_extresdir}js/album.js"></script>
<script type="text/javascript" src="{$model_extresdir}js/jquery.ui.custom.min.js"></script> 
<script type="text/javascript"> albumLib.imageSpaceSortInit();</script>
</body>
</html>