<?php if (!defined('SHUIPF_VERSION')) exit(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>我的照片 - {$Config.sitename}</title>
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
            <li class="fond"> <a href="{:U("Album/praise")}">喜欢的照片</a> </li>
            <li class="friend"> <a href="{:U("Album/following")}">好友的照片</a> </li>
          </ul>
          <div class="action"> <a href="{:U("Album/imageadd")}">上传照片</a> </div>
        </div>
        <div class="main_nav2">
          <ul>
             <li class="current"><a href="{:U("Album/album")}">照片列表</a></li>
			 <li><a href="{:U("Album/homeshow")}">首页显示</a></li>
			 <li><a href="{:U("Album/listorder")}">重新排序</a></li>
		  </ul>
          <div id="tooltip" class="refresh"> <a id="refresh" class="eda" type="0" cid="4" href="javascript:;;" title="查看帮助"> </a> </div>
        </div>
        <div id="imageList" class="minHeight500">
            <if condition=" !$album ">
            <div class="nothing">暂时还没有照片啊！</div>
            <else/>
            <form id="list">
            <div class="image_me">
              <ul>
              <volist name="album" id="vo">
                <li>
                  <div class="pic" id="row{$vo.id}"> <a href="{:UM('Home/album',array('userid'=>$uid,'id'=>$vo['id']))}" name="{$vo.filename}" target="_blank"> <img class="avatar" src="{$vo.thumb}" height="80" width="80" onerror="jQuery(function(){libs.imageError(this);}, this)"> </a> </div>
                  <div class="option"> <span>
                    <input id="validate{$vo.id}" type="checkbox" value="select" pid="{$vo.id}">
                    </span>
                    <label for="validate{$vo.id}">选择</label>
                    <label style="color:#FF0000;" class="delete" for="delete{$vo.id}" pid="{$vo.id}" uid="{$uid}" title="删除此照片">删除</label>
                  </div>
                </li>
              </volist>
              </ul>
            </div>
            <div class="page"> <span class="button2-main"> <span>
              <button id="selectAll" type="button">全选</button>
              </span> </span> <span class="button2-main"> <span>
              <button id="selectOther" type="button">反选</button>
              </span> </span> <span class="button-main"> <span>
              <button id="delButton" type="button">批量删除</button>
              </span> </span>
              <div class="pages">
              </div>
            </div>
          </form>
            </if>
        </div>
      </div>
    </div>
  </div>
<template file="Member/Public/homeFooter.php"/>
</div>
<script type="text/javascript" src="{$model_extresdir}js/album.js"></script> 
<script type="text/javascript">
albumLib.imagesBatchDelInit(); 
albumLib.imageDelInit();
</script>
</body>
</html>