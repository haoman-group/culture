<?php if (!defined('SHUIPF_VERSION')) exit(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>全部通知 - {$Config.sitename}</title>
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
            <li class="inform"> <a class="on" href="{:U('Message/notification')}">我的通知</a> </li>
          </ul>
        </div>
        <div class="main_nav2">
          <ul>
            <li  <if condition=" $type eq '' ">class="current"</if>> <a href="{:U('Message/notification')}">全部通知</a> </li>
            <li <if condition=" $type eq 'dance' ">class="current"</if>> <a href="{:U('Message/notification',array('type'=>'dance') )}">资讯</a> </li>
            <li <if condition=" $type eq 'miniblog' ">class="current"</if>> <a href="{:U('Message/notification',array('type'=>'miniblog') )}">说说</a> </li>
            <li <if condition=" $type eq 'album' ">class="current"</if>> <a href="{:U('Message/notification',array('type'=>'album') )}">图片</a> </li>
            <li <if condition=" $type eq 'wall' ">class="current"</if>> <a href="{:U('Message/notification',array('type'=>'wall') )}">留言</a> </li>
            <li <if condition=" $type eq 'message' ">class="current"</if>> <a href="{:U('Message/notification',array('type'=>'message') )}">私信</a> </li>
            <li <if condition=" $type eq 'fans' ">class="current"</if>> <a href="{:U('Message/notification',array('type'=>'fans') )}">关注</a> </li>
            <li <if condition=" $type eq 'account' ">class="current"</if>> <a href="{:U('Message/notification',array('type'=>'account') )}">账户</a> </li>
          </ul>
          <div id="tooltip" class="refresh"> <a id="refresh" class="eda" type="0" cid="4" href="help/" title="查看帮助" target="_blank"> </a> </div>
        </div>
        <div id="notification" class="minHeight500">
          <div class="Ignore02"> <span id="delall" onclick="messageLib.notificationAllDel({$uid}, '', '', 'delall');"> 清空全部通知 </span> <span class="no">|&nbsp;|</span> <span id="delall2" onclick="messageLib.notificationAllDel({$uid}, '', 'month', 'delall2');"> 删除一个月前通知 </span> </div>
          <if condition=" empty($data) ">
          <div class="nothing">暂未收到任何通知!</div>
          </if>
          <div class="notification">
            <ul>
            <volist name="data" id="vo">
              <php>
              $extend_params = $vo['extend_params']?unserialize($vo['extend_params']):array();
              </php>
              <switch name="vo.typeid" >
              <case value="1">
              <li> 
                     <span class="icon_mini_fans"></span> 
                     <span class="content"> 
                        <a href="{:UM('Home/index',array('userid'=>$extend_params['userid']))}" target="_blank" class="user_card" uid="{$extend_params.userid}">{$extend_params.username}</a> 关注了您&nbsp;
                        <a href="{:UM('Home/index',array('userid'=>$extend_params['userid']))}"  target="_blank">立即查看</a>&nbsp; 
                     <if condition=" $vo['is_read'] eq 0 ">
                         <img src="{$model_extresdir}images/icon/new.gif">
                     </if>
                     </span> 
                     <span id="{$vo.nid}" class="ndel"  title="删除"></span> 
                     <span class="mtime">{$vo.datetime|format_date}</span> 
              </li>
              </case>
              <case value="3">
              <li> 
              		<span class="icon_mini_praise"></span> 
                    <span class="content"> 
                         <a href="{:UM('Home/index',array('userid'=>$extend_params['userid']))}" target="_blank" class="user_card" uid="{$extend_params.userid}">{$extend_params.username}</a> 赞了你一下&nbsp;
                         <a href="{:UM('Home/index',array('userid'=>$extend_params['userid']))}" target="_blank">查看更多</a>&nbsp; 
                    <if condition=" $vo['is_read'] eq 0 ">
                         <img src="{$model_extresdir}images/icon/new.gif">
                     </if>
                    </span> 
                    <span id="{$vo.nid}" class="ndel"  title="删除"></span> 
                    <span class="mtime">{$vo.datetime|format_date}</span> 
              </li>
              </case>
              <case value="2|9">
              <li>
                     <switch name="extend_params.type" >
                     	<case value="comment">
                         <span class="icon_mini_account"></span> 
                         <span class="content"> 
                             <a href="javascript:;">系统提示：</a> 您的《<a href="{$extend_params.article.url}" target="_blank">{$extend_params.article.title}</a>》 被 [<a href="{:UM('Home/index',array('userid'=>$extend_params['userid']))}" target="_blank">{$extend_params.username}</a>] 进行了评论&nbsp;<a href="{$extend_params.article.url}" target="_blank">查看详情</a>&nbsp; 
                         <if condition=" $vo['is_read'] eq 0 ">
                             <img src="{$model_extresdir}images/icon/new.gif">
                         </if>
                         </span> 
                        </case>
                        <case value="comment_reply">
                         <span class="icon_mini_account"></span> 
                         <span class="content"> 
                             <a href="javascript:;">系统提示：</a> 您在《<a href="{$extend_params.article.url}" target="_blank">{$extend_params.article.title}</a>》 的评论被 [<a href="{:UM('Home/index',array('userid'=>$extend_params['userid']))}" target="_blank">{$extend_params.username}</a>] 进行了回复&nbsp;<a href="{$extend_params.article.url}" target="_blank">查看详情</a>&nbsp; 
                         <if condition=" $vo['is_read'] eq 0 ">
                             <img src="{$model_extresdir}images/icon/new.gif">
                         </if>
                         </span> 
                        </case>
                     </switch>
                     <span id="{$vo.nid}" class="ndel"  title="删除"></span> 
                     <span class="mtime">{$vo.datetime|format_date}</span> 
              </li>
              </case>
              <case value="4">
              <li> 
                     <span class="icon_mini_wall"></span> 
                     <span class="content"> 
                         <a href="{:UM('Home/index',array('userid'=>$extend_params['authoruid']))}" target="_blank" class="user_card" uid="{$extend_params['authoruid']}">{$extend_params.author}</a> 
                         <switch name="extend_params.type" >
                             <case value="1">
                             给 <strong>您</strong> 留言拉
                             </case>
                             <case value="2">
                             回复了 <strong>您</strong> 留言板上的留言
                             </case>
                             <case value="3">
                             评论了 <strong>您</strong> 给 <if condition=" $username eq $extend_params['username'] "><strong>您</strong><else/><strong>{$extend_params.username}</strong></if> 的留言
                             </case>
                             <case value="4">
                              评论了 <strong>您</strong> 给 <if condition=" $username eq $extend_params['username'] "><strong>您</strong><else/><strong>{$extend_params.username}</strong></if> 的留言
                             </case>
                             <case value="5">
                              评论了 <strong>您</strong> 给 <if condition=" $username eq $extend_params['username'] "><strong>您</strong><else/><strong>{$extend_params.username}</strong></if> 的留言中的回复
                             </case>
                             <case value="6">
                              评论了 <if condition=" $username eq $extend_params['username'] "><strong>您</strong><else/><strong>{$extend_params.username}</strong></if> 的回复
                             </case>
                             <case value="7">
                              评论了 <strong>您</strong> 给 <if condition=" $username eq $extend_params['username'] "><strong>您</strong><else/><strong>{$extend_params.username}</strong></if> 的留言
                             </case>
                         </switch>
                         <a href="{:UM('Home/wall',array('userid'=>$extend_params['userid'],'id'=>$extend_params['wid']))}" target="_blank">查看详情</a>&nbsp; 
                     <if condition=" $vo['is_read'] eq 0 ">
                         <img src="{$model_extresdir}images/icon/new.gif">
                     </if>
                     </span> 
                     <span id="{$vo.nid}" class="ndel"  title="删除"></span> 
                     <span class="mtime">{$vo.datetime|format_date}</span> 
              </li>
              </case>
              <case value="6">
              <li> 
                     <span class="icon_mini_miniblog"></span> 
                     <span class="content"> 
                        <a href="{:UM('Home/index',array('userid'=>$extend_params['authoruid']))}" target="_blank" class="user_card" uid="{$extend_params['authoruid']}">{$extend_params.author}</a>
                        <switch name="extend_params.type" >
                             <case value="1">
                             评论了 <strong>您</strong> 的说说
                             </case>
                             <case value="2">
                             评论了 <strong>您</strong> 在说说中的回复
                             </case>
                             <case value="3">
                             评论了 <strong>您</strong> 在 <if condition=" $username eq $extend_params['username'] "><strong>您</strong><else/><strong>{$extend_params.username}</strong></if> 说说中的回复
                             </case>
                             <case value="4">
                             评论了 <strong>{$extend_params.atusername}</strong> 在 <strong>您</strong> 说说的回复
                             </case>
                        </switch>
                        <a href="{:UM('Home/miniblog',array('userid'=>$extend_params['userid'],'id'=>$extend_params['id']))}"  target="_blank">立即查看</a>&nbsp; 
                     <if condition=" $vo['is_read'] eq 0 ">
                         <img src="{$model_extresdir}images/icon/new.gif">
                     </if>
                     </span> 
                     <span id="{$vo.nid}" class="ndel"  title="删除"></span> 
                     <span class="mtime">{$vo.datetime|format_date}</span> 
              </li>
              </case>
              <case value="8">
              <li> 
                     <if condition=" $extend_params['type'] eq 'love'">
                     <span class="icon_mini_praise"></span>
                     <else/>
                     <span class="icon_mini_album"></span> 
                     </if>
                     <span class="content"> 
                        <if condition=" $extend_params['type'] eq 'love'">
                        <a href="{:UM('Home/index',array('userid'=>$extend_params['userid']))}" target="_blank" class="user_card" uid="{$extend_params['userid']}">{$extend_params.username}</a> 把您的照片编号为 <strong>{$extend_params.albumid}</strong> 的照片标记为喜欢
                        &nbsp;<a href="{:UM('Home/album',array('userid'=>$extend_params['albumuserid'],'id'=>$extend_params['albumid']))}"  target="_blank">立即查看</a>&nbsp; 
                        <else/>
                            <a href="{:UM('Home/index',array('userid'=>$extend_params['authoruid']))}" target="_blank" class="user_card" uid="{$extend_params['authoruid']}">{$extend_params.author}</a>
                            <switch name="extend_params.type" >
                                 <case value="1">
                                 评论了 <strong>您</strong> 的照片
                                 </case>
                                 <case value="2">
                                 评论了 <strong>您</strong> 在照片中的回复
                                 </case>
                                 <case value="3">
                                 评论了 <strong>您</strong> 在 <if condition=" $username eq $extend_params['username'] "><strong>您</strong><else/><strong>{$extend_params.username}</strong></if> 照片中的评论
                                 </case>
                                 <case value="4">
                                 评论了 <strong>{$extend_params.atusername}</strong> 在 <strong>您</strong> 照片的评论
                                 </case>
                            </switch>
                            &nbsp;<a href="{:UM('Home/album',array('userid'=>$extend_params['userid'],'id'=>$extend_params['id']))}"  target="_blank">立即查看</a>&nbsp; 
                        </if>
                     <if condition=" $vo['is_read'] eq 0 ">
                         <img src="{$model_extresdir}images/icon/new.gif">
                     </if>
                     </span> 
                     <span id="{$vo.nid}" class="ndel"  title="删除"></span> 
                     <span class="mtime">{$vo.datetime|format_date}</span> 
              </li>
              </case>
              <case value="10">
              <li> 
                     <span class="icon_mini_fans"></span> 
                     <span class="content"> 
                        <a href="{:UM('Home/index',array('userid'=>$extend_params['userid']))}" target="_blank" class="user_card" uid="{$extend_params.userid}">{$extend_params.username}</a> 给您发了一个私信&nbsp;
                        <a href="{:U('Msg/msginfo',array('id'=>$extend_params['msgid']))}"  target="_blank">立即查看</a>&nbsp; 
                     <if condition=" $vo['is_read'] eq 0 ">
                         <img src="{$model_extresdir}images/icon/new.gif">
                     </if>
                     </span> 
                     <span id="{$vo.nid}" class="ndel"  title="删除"></span> 
                     <span class="mtime">{$vo.datetime|format_date}</span> 
              </li>
              </case>
              </switch>
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
<script type="text/javascript" src="{$model_extresdir}js/message.js"></script> 
<script type="text/javascript" src="{$model_extresdir}js/card.js"></script>
<script type="text/javascript">
		messageLib.notificationDelInit(); 
</script>
</body>
</html>