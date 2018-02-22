<?php if (!defined('SHUIPF_VERSION')) exit(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>我的关注 - {$Config.sitename}</title>
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
            <li class="attention"> <a class="on" href="{:U('Relation/following')}">我的关注</a> </li>
            <li class="fans"> <a href="{:U('Relation/fans')}">我的粉丝</a> </li>
            <li class="visitor"> <a href="{:U('Relation/visitorin')}">访问脚印</a> </li>
          </ul>
        </div>
        <div class="main">
          <div id="tooltip" class="refresh"> <a id="refresh" class="eda" type="0" cid="4"  title="查看帮助"> </a> </div>
        </div>
        <div class="minHeight500">
          <div class="friendList">
            <div id="followingGroupName" class="friendListHead">
              <ul class="screen">
                <li <if condition=" !$cid ">class="on"</if>><a href="{:U('Relation/following')}"><span>全部</span></a></li>
                <li <if condition=" $cid == 3 ">class="on"</if>><a href="{:U('Relation/following', array('cid' => 3) )}"><span>相互关注</span></a></li>
                <li <if condition=" $cid == 2 ">class="on"</if>><a href="{:U('Relation/following', array('cid' => 2) )}"><span>悄悄关注</span></a></li>
                <li <if condition=" $cid == 1 ">class="on"</if>><a href="{:U('Relation/following', array('cid' => 1) )}"><span>未分组</span></a></li>
                <if condition=" $friendsGroupInfo ">
                <li <if condition=" $cid == 4 ">class="on"</if>><a href="{:U('Relation/following', array('cid' => 4,'gid'=>$gid) )}"><span>{$friendsGroupInfo.name}</span></a></li>
                </if>
                <li  style="display: none;" ><a href="relation?a=following&cid=4&fgid=0"><span>全部关注</span></a></li>
                <li><a href="javascript:;" class="set_menu"><span>更多<b></b></span></a>
                  <div class="m_set_list more_list" style="display: none;" id="followingGroupList">
                    <div class="list">
                    <volist name="friendsGroup" id="vo">
                      <a class="list_clo" href="{:U('Relation/following', array('cid' => 4 ,'gid'=>$vo['gid']) )}">{$vo.name}</a>
                    </volist>
                    </div>
                    <div class="add"> <a onclick="$(function(){$('#friendGroupAdd').show();$('#addGroup1').hide()});" href="javascript:;" id="addGroup1">添加分组</a> </div>
                    <div class="create" id="friendGroupAdd" style="display: none;">
                      <input id="addfgName" class="seh_v" type="text" value="">
                      <span class="button2-main"> <span>
                      <button id="add" bskinpath="t2" uid="{$uid}" type="button">创建</button>
                      </span> </span> </div>
                  </div>
                </li>
              </ul>
              <div class="box">
                <div class="number" id="number" nid="{$friendsCount}">该组共有{$friendsCount}人</div>
                <if condition=" $friendsGroupInfo ">
                <span id="modify">
					<a class="change" id="change" href="javascript:;" onclick="jQuery(function(){ relation.change( {$friendsGroupInfo.gid}, '{$friendsGroupInfo.name}')});">修改分组名称</a>
					<a class="deletion" id="deletion" title="删除" onclick="jQuery(function(){ fans.followingGroupDel( {$friendsGroupInfo.gid}, 2, '{$friendsGroupInfo.name}')});" href="javascript:;">删除该分组</a>
				</span>
                </if>
              </div>
            </div>
            <div id="followingList" class="followingList">
            <if condition=" !$friends ">
            <div class="nothing">您还没有关注的用户，赶快去关注吧 o(∩_∩)o ！</div>
            </if>
              <ul>
              <volist name="friends" id="vo">
                <li>
                  <div class="icon"><a target="_blank" href="{:UM('Home/index',array('userid'=>$vo['fuserid']))}" class="user_card" uid="{$vo.fuserid}"><img class="avatar-58" src="{:U('Api/Avatar/index',array('uid'=>$vo['fuserid'],'size'=>45))}" onerror="this.src='{$model_extresdir}images/noavatar.jpg'"/></a></div>
                  <div class="info">
                    <div class="name"> <a  class="user_card"  target="_blank" href="{:UM('Home/index',array('userid'=>$vo['fuserid']))}" uid="{$vo.fuserid}">{$vo.fusername}<if condition=" $vo['atquietly'] ">【悄悄】</if></a> </div>
                    <div class="group" onclick="jQuery(function(){ relation.group({$vo.groupid}, {$vo.fuserid}, '{$vo.fusername}')});" > <a id="group_{$vo.fuserid}" title="更换分组" href="javascript:;"><if condition=" !$friendsGroup[$vo['groupid']]['name'] ">未分组</if>{$friendsGroup[$vo['groupid']]['name']}</a> </div>
                  </div>
                  <a class="del" title="解除好友" href="javascript:;"  onclick="jQuery(function(){ relation.delFollowing(0, {$vo.fuserid}, '{$vo.fusername}', 0, {$uid}, '', 0, 1, 1)});" ></a> 
                 </li>
               </volist>
              </ul>
              <div class="page">{$Page}</div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
<template file="Member/Public/homeFooter.php"/>
</div>
<script type="text/javascript" src="{$model_extresdir}js/relation.js"></script> 
<script type="text/javascript">relation.init();</script>
<script type="text/javascript" src="{$model_extresdir}js/card.js"></script>

</body>
</html>