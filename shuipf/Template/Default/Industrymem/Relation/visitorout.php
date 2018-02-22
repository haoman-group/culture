<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>谁看过我 - {$Config.sitename}</title>
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
            <li class="attention"> <a href="{:U('Relation/following')}">我的关注</a> </li>
            <li class="fans"> <a href="{:U('Relation/fans')}">我的粉丝</a> </li>
            <li class="visitor"> <a class="on" href="{:U('Relation/visitorin')}">访问脚印</a> </li>
          </ul>
        </div>
        <div class="main_nav2">
          <ul>
            <li> <a href="{:U('Relation/visitorin')}">谁看过我</a> </li>
            <li class="current"> <a href="{:U('Relation/visitorout')}">我看过谁</a> </li>
          </ul>
          <div id="tooltip" class="refresh"> <a id="refresh" class="eda" type="0" cid="4" href="javascript:;" title="查看帮助"> </a> </div>
        </div>
        <div class="minHeight500"> 
          <!--有内容-->
          <div class="relation_userlist">
            <ul>
              <volist name="visitors" id="vo">
              <li>
                <div class="avatar"> <a target="_blank" href="{:UM('Home/index',array('userid'=>$vo['byuserid']))}" class="user_card" uid="{$vo.byuserid}"> <img class="avatar-80" src="{:U('Api/Avatar/index',array('uid'=>$vo['byuserid'],'size'=>90))}" onerror="this.src='{$model_extresdir}images/noavatar.jpg'"/> </a> </div>
                <ul class="info">
                  <li> <a  class="<if condition=" $vo['isonline'] ">online_icon</if> user_card" target="_blank" href="{:UM('Home/index',array('userid'=>$vo['byuserid']))}" uid="{$vo.userid}">{$vo.byusername}</a> </li>
                  <li>粉丝<strong>{$userList[$vo['byuserid']]['fans']}</strong>人</li>
                  <li>关注时间：{$vo.datetime|format_date}</li>
                  <li class="action"> 
                  <if condition=" $vo['guanzhu'] ">
                   <a onclick="jQuery(function(){ fans.fansDel({$vo.userid}, '{$userList[$vo['userid']]['username']}', 1)});" class="attention mutual" href="javascript:;"></a>
                  <else />
                  <a onclick="jQuery(function(){ fans.fansAdd({$vo.userid}, '{$userList[$vo['userid']]['username']}', 1)});" class="attention" href="javascript:;"></a>
                  </if>
                  </li>
                </ul>
              </li>
             </volist>
            </ul>
          </div>
          <div class="page">
            {$Page}
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