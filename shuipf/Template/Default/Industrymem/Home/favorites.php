<?php if (!defined('SHUIPF_VERSION')) exit(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="description" content="查看{$userinfo.username}分享的资讯，了解{$userinfo.username}喜欢的新闻资讯，与他一起交流，分享关注{$userinfo.username}分享的信息资讯。" />
<meta name="keywords" content="{$userinfo.username}分享的新闻资讯" />
<title>{$userinfo.username}的收藏 - {$Config.sitename}</title>
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
	$my = $userinfo['username'];
}
</php>
<template file="Member/Home/topNav.php"/>
<div class="spaceMain">
  <div class="mainTop"></div>
  <div class="mainCenter">
    <div class="publicLeft">
      <div class="stageBox">
        <div class="stageBoxTop"><span></span></div>
        <div class="stageBoxCenter  min_space_height">
          <div class="spaceMTitle2">
            <p>{$my}的收藏</p>
            <if condition=" $ismyhome ">
            <span class="management"><a href="{:U('Favorite/index')}">管理</a></span>
            </if>
            <ul>
              <li class="current"><a href="javascript:;;">全部类型</a><b></b></li>
            </ul>
          </div>
          <div class="title_per"></div>
          <div class="danceFavoritesList"><!--有内容-->
            <form method="post" id="list">
            <if condition=" $favorite ">
              <ul class="share_list">
                  <li class="title">
                    <div class="song">标题</div>
                    <div class="time">收藏时间</div>
                  </li>
                  <volist name="favorite" id="vo">
                  <li <?php if( $i%2 == 0){ ?>class="c2"<?php } ?>>
                    <div class="song">
                      <div class="aleft"><a target="p" class="mname" href="{$vo.url}">{$vo.fid}.&nbsp;&nbsp;{$vo.title}</a></div>
                    </div>
                    <div class="time">{$vo.inputtime|format_date}</div>
                  </li>
                  </volist>
                </ul>
              <div class="page">
                  {$Page}
               </div>
            <else/>
            	<div class="nothing_recommend">还没有任何收藏。</div>
            </if>
            </form>
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
<script type="text/javascript" src="{$model_extresdir}js/dance.js"></script>
</body>
</html>