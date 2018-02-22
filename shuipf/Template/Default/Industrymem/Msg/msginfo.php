<?php if (!defined('SHUIPF_VERSION')) exit(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>消息列表 - {$Config.sitename}</title>
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
            <li class="letter"><a href="{:U('Msg/msg')}"><span>我的私信</span></a></li>
            <li class="particular"><a class="on" href="#"><span>查看详情</span></a></li>
          </ul>
        </div>
        <div id="msg" class="minHeight500">
          <div class="msgIgnore"><span class="name">与 <strong>{$answerInfo.username}</strong> 的私信对话</span><span class="reMessage" msgid="{$info.id}">删除本对话</span></div>
          <div class="msgList">
            <ul>
            <volist name="list" id="vo">
              <li id="msg-{$vo.id}">
                <div class="icon">
                    <a target="_blank" href="{:UM('Home/index',array('userid'=>$vo['senduid']))}" class="user_card">
                    	<img class="avatar-58" title="addds" src="{:U('Api/Avatar/index',array('uid'=>$vo['senduid'],'size'=>45))}" onerror="this.src='{$model_extresdir}images/noavatar.jpg'"/>
                    </a>
                </div>
                <div class="pm">
                  <div class="h">
                    <div class="f">
                      <p><a target="_blank" href="{:UM('Home/index',array('userid'=>$vo['senduid']))}"  class="user_card">{$vo.sendname}</a><span class="mtime">{$vo.addtime|format_date}</span><a href="javascript:;;"><span class="del" msgid="{$vo.id}">删除</span></a></p>
                      <div class="c">{$vo.note}
                      <if condition=" $vo['is_read'] ">
                      <div class="nore">(已经阅读)</div>
                      <else/>
                      <div class="no">(还未读)</div>
                      </if>
                      </div>
                    </div>
                  </div>
                </div>
              </li>
              </volist>
              <li>
                <div class="icon"><a target="_blank" href="{:UM('Home/index',array('userid'=>$uid))}"><img class="avatar-58" title="{$username}" src="{:U('Api/Avatar/index',array('uid'=>$uid,'size'=>45))}" onerror="this.src='{$model_extresdir}images/noavatar.jpg'"></a></div>
                <div class="pm">
                  <div class="h">
                    <div class="f">
                      <div class="c">
                        <div edit="editor_fnote" class="messageSend" contenteditable="true"></div>
                        <div id="fnote" contenteditable="false" class="messageSend" name="fnote" style="display: none; "></div>
                        <div id="emot_fnote" class="emot" to="fnote" style="display:none"></div>
                        <span class="button-main"><span>
                        <button class="reMsg" type="button" touid="{$answerid}">回复</button>
                        </span></span>
                        <div style="position: absolute; display: none; word-wrap: break-word; word-break: break-all; font-weight: 400; width: 495px; font-family: 微软雅黑; line-height: normal; font-size: 12px; padding: 5px; "></div>
                      </div>
                    </div>
                  </div>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
<template file="Member/Public/homeFooter.php"/>
</div>
<script type="text/javascript" src="{$model_extresdir}js/jquery.emotEditor.js"></script>
<script type="text/javascript" src="{$model_extresdir}js/message.js"></script>
<script type="text/javascript">
	messageLib.reMsgDelInit(); 
	messageLib.msgAddInit();
	messageLib.reMsgOneDelInit();
</script>
</body>
</html>