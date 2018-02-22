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
            <li class="letter"><a class="on" href="{:U('Msg/msg')}"><span>我的私信</span></a></li>
          </ul>
        </div>
        <div class="main_nav2">
          <ul>
            <li <if condition=" !$new ">class="current"</if>><a href="{:U('Msg/msg')}">全部私信</a></li>
            <li <if condition=" $new eq 1 ">class="current"</if>><a href="{:U('Msg/msg','new=1')}">未读私信</a></li>
          </ul>
          <div id="tooltip" class="refresh"><a id="refresh" class="eda" type="0" cid="4" href="javascript:;;" title="查看帮助"></a></div>
        </div>
        <div id="msg" class="minHeight500">
          <if condition=" !$msg ">
          <div class="nothing">暂未收到任何私信!</div>
          <else/>
        <!--有内容-->
          <div class="msgIgnore"><span class="name">全部私信列表</span><span class="delAll" fromUid="944533">清空所有私信</span></div>
          <div class="msgList">
            <ul>
              <volist name="msg" id="vo">
              <li>
                <div class="icon">
                    <a target="_blank" href="{:UM('Home/index',array('userid'=>$vo['answerid']['userid']))}" class="user_card" uid="{$vo['senduid']}">
                    	<img class="avatar-58" title="{$vo['answerid']['username']}" src="{:U('Api/Avatar/index',array('uid'=>$vo['answerid']['userid'],'size'=>45))}" onerror="this.src='{$model_extresdir}images/noavatar.jpg'"/>
                    </a>
                </div>
                <div class="pm">
                  <div class="h">
                    <div class="f">
                      <p><a target="_blank" href="{:UM('Home/index',array('userid'=>$vo['answerid']['userid']))}" class="user_card"  uid="{$$vo['answerid']['userid']}">与 <font color="#000000">{$vo['answerid']['username']}</font> 的对话</a><span class="mtime">{$vo.datetime|format_date}</span></p>
                      <div class="c">{$vo.note}<if condition=" $vo['is_read'] "><div class="nore">(已经阅读)</div><else/><div class="no">(还未读)</div></if>
                        <p><a target="_blank" href="{:U('Msg/msginfo',array('id'=>$vo['id']))}">查看详情</a></p>
                      </div>
                      <a class="del" type="0" msgid="{$vo.id}" href="javascript:;;">删除</a></div>
                  </div>
                </div>
              </li>
              </volist>
            </ul>
          </div>
          </if>
          <div class="page">
            {$Page}
          </div>
        </div>
      </div>
    </div>
  </div>
<template file="Member/Public/homeFooter.php"/>
</div>
<script type="text/javascript" src="{$model_extresdir}js/message.js"></script>
<script type="text/javascript">
	messageLib.msgDelInit();
	messageLib.msgAllDelInit();	
	messageLib.msgIgnoreInit();	
</script>
</body>
</html>