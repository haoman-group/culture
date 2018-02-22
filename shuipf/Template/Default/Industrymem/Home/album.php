<?php if (!defined('SHUIPF_VERSION')) exit(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="description" content="查看{$userinfo.username}的照片墙，了解{$userinfo.username}喜欢的新闻资讯，与他一起交流，分享关注{$userinfo.username}的照片墙信息。" />
<meta name="keywords" content="{$userinfo.username}的照片墙" />
<title>{$userinfo.username}的照片墙 - {$Config.sitename}</title>
<link href="/favicon.ico" rel="shortcut icon">
<template file="Member/Public/global_js.php"/>
<script type="text/javascript" src="{$model_extresdir}js/common.js"></script>
<link type="text/css" href="{$model_extresdir}css/core.css" rel="stylesheet" />
<link type="text/css" href="{$model_extresdir}css/common.css" rel="stylesheet" />
<link type="text/css" href="{$model_extresdir}css/space.css" rel="stylesheet" />
<link type="text/css" id="skin" href="{$model_extresdir}theme/{$themeName}/style.css" rel="stylesheet" />
</head>
<body>
<php>
if($ismyhome){
	$my = '我';
}else {
	$my = '他/她';
}
</php>
<template file="Member/Home/topNav.php"/>
<div class="spaceMain">
  <div class="mainTop"></div>
  <div class="mainCenter">
    <div class="albumContent">
      <div class="stageBox">
        <div class="stageBoxTop"><span></span></div>
        <div class="stageBoxCenter  min_space_height">
          <div class="albumTitle">
            <p>{$my}的照片墙</p>
            <if condition=" $ismyhome && $uid ">
            <span class="management"><a href="{:U('Album/album')}">管理</a></span>
            </if>
           </div>
          <div class="title_per on" ></div>
          <div class="spaceAlbumList">
            <if condition=" !$album ">
            <div class="nothing_album" style="width: 880px;">还没有上传的照片哦！</div>
            <else/>
            <ul id="spaceAlbumList">
              <volist name="album" id="vo">
              <li class="imageBlock masonry-brick" >
                  <div class="box" onmouseover="albumLib.showInit({$vo.id});" onmouseout="albumLib.hideInit();">
                  <div class="act">
                      <div class="imgpraise" style="display: none; " id="imgpraise{$vo.id}"><a class="praiseImg" id="praise" onclick="albumLib.doImagePraise({$userinfo.userid},{$vo.id}, {$vo.love}, {$vo.plsum});" href="javascript:;">喜欢</a></div>
                  </div>
                  <a href="{:UM('Home/album',array('userid'=>$userinfo['userid'],'id'=>$vo['id']))}" name="{$vo.filename}" target="_blank"><img src="{$vo.thumb}" width="{$vo.thumb_width}" height="{$vo.thumb_height}"></a>
                  <div class="info">
                      <span id="praiseCount{$vo.id}">{$vo.love}人喜欢</span>
                      <span id="replyNum{$vo.id}" class="last">{$vo.plsum}人评论</span>
                  </div>
                  <div class="end_line"></div>
                  </div>
              </li>
              </volist>
            </ul>
            </if>
            <div id="imgLoading" class="album_loading"></div>
            <div class="page" >
              {$Page}
            </div>
          </div>
        </div>
        <div class="stageBoxBottom"><span></span></div>
      </div>
    </div>
  </div>
  <div class="mainBottom"></div>
</div>
<template file="Member/Home/footer.php"/>
<script type="text/javascript" src="{$model_extresdir}js/jquery.waterfall.js"></script>
<script type="text/javascript" src="{$model_extresdir}js/album.js"></script>
<script type="text/javascript">
		imgLoaded.init('#spaceAlbumList', {$userinfo.userid}, {$pages});
		libs.spaceInit();
</script>
</body>
</html>