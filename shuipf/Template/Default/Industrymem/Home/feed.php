<?php if (!defined('SHUIPF_VERSION')) exit(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="description" content="查看{$userinfo.username}的最近动态，了解{$userinfo.username}喜欢的新闻资讯，与他一起交流，分享关注{$userinfo.username}的最近动态信息。" />
<meta name="keywords" content="{$userinfo.username}的动态" />
<title>{$userinfo.username}的最近动态 - {$Config.sitename}</title>
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
        <div class="stageBoxCenter min_space_height">
          <div class="spaceMTitle2">
            <p>{$my}的最近动态</p>
            <ul>
              <li class="current"><a href="{:UM('Home/feed',array('userid'=>$userinfo['userid']))}">全部动态</a><b></b></li>
              <li><a href="{:UM('Home/miniblog',array('userid'=>$userinfo['userid']))}">随便说说</a><b></b></li>
            </ul>
          </div>
          <div class="title_per"></div>
          <div class="feedItem"><!--有内容-->
            <if condition=" !$feed ">
            <div class="nothing_feed">最近没有动态哦-.-!</div>
            <else/>
            <ul>
              <volist name="feed" id="vo">
              <php> $params = unserialize($vo['params']); </php>
              <li>
                <div class="time"><em>{$vo.datetime|date="Y",###}</em>{$vo.datetime|date="m/d",###}</div>
                <i class="square"></i>
                <div class="feedContent">
                <switch name="vo.typeid" >
                    <case value="1">
                        <a href="javascript:;" style="float:left;"><img width="16" height="16" class="feedIcon"  src="{$model_extresdir}images/icon/icon_mini_dance.gif" /></a>
                        <a href="{:UM('Home/index',array('userid'=>$vo['userid']))}" target="_blank" class="user_card" uid="{$vo.userid}">{$vo.username}</a> 分享了新的资讯&nbsp;&nbsp;
                        <span class="createTime">({$vo.datetime|format_date})</span>
                        <volist name="params" id="rs">
                        <div class="detail">分享的《{$rs.title}》通过审核&nbsp;&nbsp;<a class="look" href="{$rs.url}" target="p">查看</a></div>
                        </volist>
                    </case>
                    <case value="2">
                        <a href="javascript:;" style="float:left;"><img width="16" height="16" class="feedIcon"  src="{$model_extresdir}images/icon/icon_mini_miniblog.gif" /></a>
                        <a href="{:UM('Home/index',array('userid'=>$vo['userid']))}" target="_blank" class="user_card" uid="{$vo.userid}">{$vo.username}</a> 更新了动态&nbsp;&nbsp;
                        <span class="createTime">({$vo.datetime|format_date})</span>
                        <div class="detail">
                            <strong>{$vo.username}</strong> 喜欢了 <a href="{:UM('Home/index',array('userid'=>$params['byuserid']))}" target="_blank" class="user_card" uid="{$params.byuserid}"  style="float:none;margin-left:0">{$params.byusername}</a> 相册编号ID为 {$params.picid} 的照片
                            &nbsp;&nbsp;<a class="look" href="{:UM('Home/album',array('userid'=>$params['byuserid'],'id'=>$params['picid']))}" target="_blank">查看照片</a>
                            <br/><a href="{:UM('Home/album',array('userid'=>$params['byuserid'],'id'=>$params['picid']))}" target="_blank"><img onerror="$call(function(){libs.imageError(this);}, this)" src="{$params.thumb}" width="80" height="80" class="summaryimg"></a>
                        </div>
                    </case>
                    <case value="4">
                        <a href="javascript:;" style="float:left;"><img width="16" height="16" class="feedIcon"  src="{$model_extresdir}images/icon/icon_mini_miniblog.gif" /></a>
                        <a href="{:UM('Home/index',array('userid'=>$vo['userid']))}" target="_blank" class="user_card" uid="{$vo.userid}">{$vo.username}</a> 更新了说说&nbsp;&nbsp;
                        <span class="createTime">({$vo.datetime|format_date})</span>
                        <div class="detail">{$params.content}&nbsp;&nbsp;<a class="look" href="{:UM('Home/miniblog',array('userid'=>$vo['userid'],'id'=>$vo['relevance']))}" target="_blank">评论</a></div>
                    </case>
                    <case value="5">
                        <a href="javascript:;" style="float:left;"><img width="16" height="16" class="feedIcon"  src="{$model_extresdir}images/icon/icon_mini_album.gif" /></a>
                        <a href="{:UM('Home/index',array('userid'=>$vo['userid']))}" target="_blank" class="user_card" uid="{$vo.userid}">{$vo.username}</a> 更新了照片墙&nbsp;&nbsp;
                        <span class="createTime">({$vo.datetime|format_date})</span>
                        <div class="detail">
                              <volist name="params" id="rs">
                              <a href="{:UM('Home/album',array('userid'=>$vo['userid'],'id'=>$rs['id']))}" target="_blank"><img onerror="$call(function(){libs.imageError(this);}, this)" src="{$rs.thumb}" width="80" height="80"  class="summaryimg"></a>
                              </volist>
                        </div>
                    </case>
                </switch>
                </div>
              </li>
              </volist>
            </ul>
            </if>
            <div class="page">
              {$Page}
            </div>
            <!--没内容--></div>
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
</body>
</html>