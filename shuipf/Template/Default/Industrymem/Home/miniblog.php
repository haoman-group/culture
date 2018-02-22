<?php if (!defined('SHUIPF_VERSION')) exit(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="description" content="查看{$userinfo.username}的说说，了解{$userinfo.username}喜欢的新闻资讯，与他一起交流，分享关注{$userinfo.username}的说说信息。" />
<meta name="keywords" content="{$userinfo.username}的说说" />
<title>{$userinfo.username}的说说 - {$Config.sitename}</title>
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
          <div class="stageBoxCenterContent">
            <div class="spaceMTitle2">
              <p>{$my}的说说</p>
              <if condition=" $ismyhome && $uid ">
              <span class="management"><a href="{:U('Miniblog/miniblog')}">管理</a></span>
              </if>
              <ul>
                <li><a href="{:UM('Home/feed',array('userid'=>$userinfo['userid']))}">全部动态</a><b></b></li>
                <li class="current"><a href="{:UM('Home/miniblog',array('userid'=>$userinfo['userid']))}">随便说说</a><b></b></li>
              </ul>
              <input id="kernelType" type="hidden" value="1" />
              <input id="showType" type="hidden" value="1" />
            </div>
            <div class="title_per"></div>
            <div id="miniblogList" class="miniblogList">
              <if condition=" !$weibo ">
              <div class="nothing_miniblog">还没有发表说说哦!</div>
              <else/>
              <ul>
                <volist name="weibo" id="vo">
                <li>
                  <div class="time"><em>{$vo.datetime|date="Y",###}</em> {$vo.datetime|date="m/d",###}</div>
                  <div class="content">
                    <div class="text"><a target="_blank" href="{:UM('Home/index',array('userid'=>$userinfo['userid']))}" style="float:left;margin-right:3px;">{$userinfo.username}</a><span>：{$vo.content}</span></div>
                    <div class="info">
                        <span class="action"><a target="_blank" href="{:UM('Home/miniblog',array('userid'=>$userinfo['userid'],'id'=>$vo['id'] ))}">评论[{$vo.plsum}]</a></span>
                        <span class="update_time">发表于：{$vo.datetime|format_date}</span>
                        <if condition=" $ismyhome && $uid ">
                        <span id="{$vo.id}" class="del" bid="{$vo.id}" title="删除" uid="{$uid}"></span>
                        </if>
                    </div>
                  </div>
                </li>
                </volist>
              </ul>
              </if>
              <div class="page">
                {$Page}
              </div>
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
<script type="text/javascript" src="{$model_extresdir}js/miniblog.js"></script>
<script type="text/javascript">miniblogLib.miniblogDelInit("#miniblogList");</script>
</body>
</html>