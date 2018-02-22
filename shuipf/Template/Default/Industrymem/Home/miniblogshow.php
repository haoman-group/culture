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
<template file="Member/Home/topNav.php"/>
<div class="spaceMain">
  <div class="mainTop"></div>
  <div class="mainCenter">
    <div class="publicLeft">
      <div class="stageBox">
        <div class="stageBoxTop"><span></span></div>
        <div class="stageBoxCenter min_space_height">
          <div class="spaceMTitle2">
            <p>{$userinfo.username}的说说</p>
            <ul>
              <li><a href="{:UM('Home/feed',array('userid'=>$userinfo['userid']))}">全部动态</a><b></b></li>
              <li class="current"><a href="{:UM('Home/miniblog',array('userid'=>$userinfo['userid']))}">随便说说</a><b></b></li>
            </ul>
          </div>
          <div class="title_per"></div>
          <div class="miniblogShow">
            <ul>
              <li>
                <input id="showType" type="hidden" value="1">
                <div class="avatar"><a href="{:UM('Home/index',array('userid'=>$info['userid']))}" target="_blank" ><img class="avatar-42" src="{:U('Api/Avatar/index',array('uid'=>$info['userid'],'size'=>180))}" onerror="this.src='{$model_extresdir}images/noavatar.jpg'"/></a></div>
                <div class="content">
                  <div class="text" uid="{$userinfo['userid']}"><a href="{:UM('Home/index',array('userid'=>$userinfo['userid']))}"  style="float:left;margin-right:3px;">{$userinfo.username}</a> ：{$info.content}</div>
                  <div class="info">
                      <span class="time">发表于:{$info.datetime|format_date}</span>
                      <if condition=" $ismyhome && $uid ">
                      <span id="{$info.id}" class="del" title="删除" bid="{$info.id}" uid="{$info.userid}"></span>
                      </if>
                      <span id="replyNum" class="action">评论[{$info.plsum}]</span>
                  </div>
                </div>
              </li>
            </ul>
            <div class="miniblogComment">
              <div class="arrow"></div>
              <div class="topBox"></div>
              <div class="centerBox">
                <div id="replayUser" class="replayUser"></div>
                <div id="replayUserDel" class="dells" title="取消对此人的回复"></div>
                <div class="inputBox">
                  <input id="bid" type="hidden" value="{$info.id}" name="bid">
                  <input id="uid" type="hidden" value="{$uid}" name="uid">
                  <div class="avatar"><img class="avatar-34" src="{:U('Api/Avatar/index',array('uid'=>$uid,'size'=>45))}" onerror="this.src='{$model_extresdir}images/noavatar.jpg'"/></div>
                  <div class="note">
                    <textarea id="note" name="note" style="overflow-y: hidden;" ></textarea>
                  </div>
                  <button id="send" uid="{$uid}" class="send">发表</button>
                </div>
                <div id="miniblogCommentList" class="miniblogCommentList">
                  <volist name="comment" id="vo">
                  <li>
                    <div class="avatar"><a href="{:UM('Home/index',array('userid'=>$vo['userid']))}" target="_blank" class="user_card" uid="{$vo['userid']}"><img class="avatar-34" src="{:U('Api/Avatar/index',array('uid'=>$vo['userid'],'size'=>45))}" onerror="this.src='{$model_extresdir}images/noavatar.jpg'"></a></div>
                    <div class="content">
                      <div class="note"><a href="{:UM('Home/index',array('userid'=>$vo['userid']))}" class="user_card" uid="{$vo['userid']}">{$vo.username}</a> ：{$vo.content}</div>
                      <div class="time">发表于:{$vo.datetime|format_date}</div>
                      <div class="replay">
                          <if condition=" $uid && $uid neq $vo['userid'] ">
                          <a id="comment" class="comment" authorid="{$vo.userid}" nickname="{$vo.username}" cid="{$vo.id}">回复</a>
                          </if>
                          <if condition=" $ismyhome && $uid ">
                          <span></span><span cid="{$vo.id}" class="dell" title="删除"></span>
                          </if>
                      </div>
                    </div>
                  </li>
                  </volist>
                  <div id="nums" type="hidden" num="{$info.plsum}"></div>
                </div>
              </div>
              <div class="bottomBox"></div>
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
<script type="text/javascript">
		miniblogLib.miniblogDelInit(".info");
		miniblogLib.commentDelInit();
		miniblogLib.commentAddInit();
		miniblogLib.replayUserInit();
		miniblogLib.replayUserDelInit();
</script>
</body>
</html>