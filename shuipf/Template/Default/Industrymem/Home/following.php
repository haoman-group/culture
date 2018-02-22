<?php if (!defined('SHUIPF_VERSION')) exit(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="description" content="查看{$userinfo.username}关注的人，了解{$userinfo.username}喜欢的资讯信息，与他一起交流，分享关注{$userinfo.username}关注的人信息。" />
<meta name="keywords" content="{$userinfo.username}关注的人" />
<title>{$userinfo.username}关注的人 - {$Config.sitename}</title>
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
    <div class="publicLeft">
      <div class="stageBox">
        <div class="stageBoxTop"><span></span></div>
        <div class="stageBoxCenter min_space_height">
          <div id="danceList">
            <div class="spaceMTitle2">
              <p>{$my}的关系</p>
              <ul>
                <li class="current"><a href="{:UM('Home/following',array('userid'=>$userinfo['userid']))}">{$my}关注的人</a><b></b></li>
                <li><a href="{:UM('Home/fans',array('userid'=>$userinfo['userid']))}">{$my}的粉丝团</a><b></b></li>
                <if condition="$uid && $ismyhome ">
                <li class="management"><a href="{:U('Relation/following')}">管理</a></li>
                </if>
              </ul>
            </div>
            <div class="title_per"></div>
            <div class="fansList"><!--有内容-->
              <if condition=" empty($friends) ">
              <div class="nothing_fans">没关注任何人啊！</div>
              </if>
              <ul>
                <volist name="friends" id="vo">
                <li>
                  <div class="avatar"><a href="{:UM('Home/index',array('userid'=>$vo['fuserid']))}" class="user_card" uid="{$vo['fuserid']}"><img class="avatar-80" width="80" height="80" src="{:U('Api/Avatar/index',array('uid'=>$vo['fuserid'],'size'=>90))}" onerror="this.src='{$model_extresdir}images/noavatar.jpg'"/></a></div>
                  <ul class="info">
                    <li><a class="<if condition=" $vo['isonline'] ">online_icon</if> user_card" uid="{$vo['fuserid']}"   title="ahu" href="{:UM('Home/index',array('userid'=>$vo['fuserid']))}">{$vo.fusername}</a></li>
                    <li>关注<strong>{$vo.fattention}</strong>人 、 粉丝<strong>{$vo.ffans}</strong>人</li>
                    <li class="describes"></li>
                    <li  class="action" id="fans">
                    <if condition="$vo['isfans'] && $vo['at'] eq 2">
                    	<a onclick="$call(function(){ fans.fansDel({$vo.fuserid}, '{$vo.fusername}', 1)});" class="attention mutual" href="javascript:;"></a>
                    </if>
                    <if condition="$vo['isfans'] && $vo['at'] eq 1">
                        <a onclick="$call(function(){ fans.fansDel({$vo.fuserid}, '{$vo.fusername}', 1)});" class="attention already" href="javascript:;"></a>
                    </if>
                    <if condition=" !$vo['isfans'] || !$uid">
                        <a onclick="$call(function(){ fans.fansAdd({$vo.fuserid}, '{$vo.fusername}', 1)});" class="attention" href="javascript:;"></a>
                    </if>
                    </li>
                  </ul>
                </li>
                </volist>
              </ul>
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
</body>
</html>