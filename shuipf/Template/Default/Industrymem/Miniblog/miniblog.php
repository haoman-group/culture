<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php if (!defined('SHUIPF_VERSION')) exit(); ?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>我的说说 - {$Config.sitename}</title>
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
            <li class="me_microblog"> <a class="on" href="{:U('Miniblog/miniblog')}">我的说说</a> </li>
            <li class="friend_microblog"> <a href="{:U('Miniblog/following')}">好友们在说</a> </li>
          </ul>
          <div class="action"> <a href="{:U('Miniblog/miniblog')}">发表说说</a> </div>
        </div>
        <div class="main">
          <div id="tooltip" class="refresh"> <a id="refresh" class="eda" type="0" cid="4" href="help/" title="查看帮助" target="_blank"> </a> </div>
        </div>
        <div class="minHeight500">
          <div class="miniblogBox">
            <form>
              <div class="note">
                <div id="note" contenteditable="true" class="miniblogInput" name="note"></div>
              </div>
              <div class="action">
                <div id="emot_note" class="emot" to="note" style="display:none"></div>
                <div class="button"> <span class="button-main"> <span>
                  <button id="send">发表</button>
                  </span> </span> </div>
                <div id="miniblogMessage" class="miniblogMessage"></div>
              </div>
            </form>
          </div>
          <div class="miniblogList" id="miniblogList">
            <ul>
            <volist name="weibo" id="vo">
              <li>
                <div class="time"> <em>{$vo.datetime|date="Y",###}</em> {$vo.datetime|date="m/d",###} </div>
                <div class="content">
                  <div class="text"> <a target="_blank" href="{:UM('Home/index',array('userid'=>$uid))}">您说</a><span>：{$vo.content}</span> </div>
                  <div class="info"> 
                      <span class="action"> <a target="_blank" href="{:UM('Home/miniblog',array('userid'=>$uid,'id'=>$vo['id'] ))}">评论[{$vo.plsum}]</a> </span> 
                      <span class="update_time">发表于：{$vo.datetime|format_date}</span> 
                      <span id="{$vo.id}" class="del" bid="{$vo.id}" title="删除" uid="{$uid}"></span> 
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
<script type="text/javascript" src="{$model_extresdir}js/jquery.emotEditor.js"></script>
<script type="text/javascript" src="{$model_extresdir}js/miniblog.js"></script> 
<script type="text/javascript"> 
		miniblogLib.miniblogDelInit("#miniblogList"); 
		miniblogLib.miniblogAddInit();
</script>
</body>
</html>