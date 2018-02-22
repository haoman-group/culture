<?php if (!defined('SHUIPF_VERSION')) exit(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>我的留言 - {$Config.sitename}</title>
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
            <li class="message"><a class="on" href="{:U('Wall/index')}">我的留言</a></li>
          </ul>
        </div>
        <div class="main">
          <div id="tooltip" class="refresh"><a id="refresh" class="eda" type="0" cid="4" href="help/" title="查看帮助" target="_blank"></a></div>
        </div>
        <div id="wall_content" class="minHeight500">
          <if condition=" !$wall ">
            <div class="nothing">囧啊```还木有人留言啊- -! 您来留个言吧。</div>
            <else/>
            <volist name="wall" id="vo">
              <div class="wallLine">
                <div class="wallItem">
                  <div class="arrow"><s></s></div>
                  <div class="wI_avatar"><a name="{$vo.author}" href="{:UM('Home/index',array('userid'=>$vo['authoruid']))}" class="user_card"><img width="48" height="48" src="{:U('Api/Avatar/index',array('uid'=>$vo['authoruid'],'size'=>48))}" onerror="this.src='{$model_extresdir}images/noavatar.jpg'"/></a></div>
                  <div class="wI_content">
                    <div class="wI_top"> <span class="nickname"><a href="{:UM('Home/index',array('userid'=>$vo['authoruid']))}" class="user_card">{$vo.author}</a></span> <span class="info">留言：</span>
                      <span id="del-w{$vo.wid}" class="del" title="删除" onclick="jQuery(function(){ wallLib.doDelWall({$uid}, {$vo.wid}, 0, 0)});" ></span>
                      <span class="others"> <span class="createTime">{$vo.datetime|format_date}</span>
                      <span><a class="reply" onclick="jQuery(function(){ wallLib.replyWall({$vo.wid}, 0, 0, 0, {$vo.authoruid})});" href="javascript:;">回复</a></span> 
                      </span> </div>
                    <div class="wI_text">{$vo.content}</div>
                  </div>
                </div>
                <div id="wallComment{$vo.wid}">
                  <volist name="vo.replylist" id="rvo">
                    <div class="wallComment">
                      <div class="wallCommentItem">
                        <div class="wC_avatar"><a href="{$rvo.author}" class="user_card"><img class="avatar-38" width="48" height="48" src="{:U('Api/Avatar/index',array('uid'=>$rvo['authoruid'],'size'=>48))}" onerror="this.src='{$model_extresdir}images/noavatar.jpg'"/></a></div>
                        <div class="wC_top"> <span class="nickname"><a href="{:UM('Home/index',array('userid'=>$rvo['authoruid']))}" class="user_card">{$rvo.author}</a></span>
                          <span id="del-c{$rvo.wid}" class="del" title="删除" onclick="jQuery(function(){ wallLib.doDelWall({$uid}, {$rvo.wid}, {$rvo.wid}, 0)});"></span>
                          <span class="others"> <span class="createTime">{$rvo.datetime|format_date}</span>
                          <if condition=" $rvo['authoruid'] neq $uid && $uid "> 
                          <span><a class="reply" onclick="jQuery(function(){ wallLib.replyWall({$vo.wid}, {$vo.wid}, {$rvo.authoruid}, '{$rvo.author}', 0)});"  href="javascript:;">回复</a></span> 
                          </if>
                          </span> </div>
                        <div class="wC_text">{$rvo.content}</div>
                      </div>
                    </div>
                    <div id="exp"></div>
                  </volist>
                </div>
                <if condition=" $uid ">
                  <div id="wallCommentInputBox{$vo.wid}" class="wallCommentInputBox" style="display:none;">
                    <div id="replayUser_{$vo.wid}" class="replayUser" style="display: none;"></div>
                    <div id="replayUserDel_{$vo.wid}" onclick="jQuery(function(){ wallLib.delReplayUser({$vo.wid})});" class="delReplayUser" title="取消对此人的回复" style="display:none;"></div>
                    <div class="wCI_input">
                      <div id="wallCommentInput{$vo.wid}" contenteditable="true" class="wallCommentInput" name="wallCommentInput"></div>
                    </div>
                    <div class="wCI_button"><span class="button-main"><span>
                      <button type="submit" id="wallcontSubmit" class="confirm" onclick="jQuery(function(){ wallLib.confirmWall({$vo.wid}, {$uid})});">确认</button>
                      </span></span></div>
                    <div class="wCI_cancel"><a  href="javascript:;" class="cancel" onclick="jQuery(function(){ wallLib.cancelWall({$vo.wid})});">取消</a></div>
                    <div id="wCI_message{$vo.wid}" class="wCI_message"></div>
                    <div class="emot" id="emot_wallCommentInput{$vo.wid}" style="display:none"></div>
                  </div>
                </if>
              </div>
            </volist>
          </if>
          <div class="page" id="page">
            {$Page}
          </div>
        </div>
      </div>
    </div>
  </div>
<template file="Member/Public/homeFooter.php"/>
</div>
<script type="text/javascript" src="{$model_extresdir}js/card.js"></script>
<script type="text/javascript" src="{$model_extresdir}js/wall.js"></script>
<script type="text/javascript" src="{$model_extresdir}js/jquery.emotEditor.js"></script>
</body>
</html>