<?php if (!defined('SHUIPF_VERSION')) exit(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>关注的说说 - {$Config.sitename}</title>
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
            <li class="me_microblog"> <a href="{:U('Miniblog/miniblog')}">我的说说</a> </li>
            <li class="friend_microblog"> <a class="on" href="{:U('Miniblog/following')}">好友们在说</a> </li>
          </ul>
          <div class="action"> <a href="{:U('Miniblog/miniblog')}">发表说说</a> </div>
        </div>
        <div class="main">
          <div id="tooltip" class="refresh"><a id="refresh" class="eda" type="0" cid="4" href="javascript:;" title="查看帮助" ></a></div>
        </div>
        <div class="minHeight500">
          <div class="miniblogList" id="miniblogList">
            <if condition=" !$following ">
            <div class="nothing">您的好友还没有任何动静~囧</div>
            </if>
            <ul>
            <volist name="following" id="vo">
              <li>
                <div class="avatar"><a href="{:UM('Home/index',array('userid'=>$vo['userid']))}" target="_blank" class="user_card" uid="{$vo.userid}"><img class="avatar-42"  src="{:U('Api/Avatar/index',array('uid'=>$vo['userid'],'size'=>48))}" onerror="this.src='{$model_extresdir}images/noavatar.jpg'"/></a></div>
                <div class="content">
                  <div class="text"><a target="_blank" href="{:UM('Home/index',array('userid'=>$vo['userid']))}" class="<if condition=" $vo['isonline'] ">online_icon</if> user_card" uid="{$vo.userid}">{$vo.username}</a> ：{$vo.content}</div>
                  <div class="info">
                     <span class="action"><a target="_blank" href="{:UM('Home/miniblog',array('userid'=>$vo['userid'],'id'=>$vo['id'] ))}">评论[{$vo.plsum}]</a></span>
                     <span class="update_time">发表于：{$vo.datetime|format_date}</span>
                  </div>
                </div>
              </li>
            </volist>
            </ul>
            <div class="page">
              {$Page}
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
<template file="Member/Public/homeFooter.php"/>
</div>
<script type="text/javascript" src="{$model_extresdir}js/card.js"></script>
</body>
</html>