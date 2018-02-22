<?php if (!defined('SHUIPF_VERSION')) exit(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="description" content="查看{$userinfo.username}的个人留言空间，了解{$userinfo.username}喜欢的新闻资讯，与他一起交流，分享关注{$userinfo.username}的人留言空间信息。" />
<meta name="keywords" content="{$userinfo.username}的留言板" />
<title>{$userinfo.username}的留言空间 - {$Config.sitename}</title>
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
          <div class="spaceWall">
            <div class="wallConsole">
              <div class="wallTitle"><span>留言板</span></div>
              <div class="title_per"></div>
              <div class="sW_box">
                <div class="sW_input">
                  <div contenteditable="true" id="wallContent" class="wallContent" name="wallContent"></div>
                </div>
                <div class="sW_button"><span class="button-main"><span>
                  <button type="button" id="wallSubmit" onclick="$call(function(){ wallLib.wallAddInit({$userinfo.userid}, '')});">留言</button>
                  </span></span></div>
                <div id="sW_message" class="wCI_message"></div>
                <div id="emot_wallContent" class="emot" to="wallContent" style="display:none"></div>
              </div>
            </div>
            <div id="wall_content" class="wall_content minHeight150">
              <if condition=" !$wall ">
             <div class="nothing">囧啊```还木有人留言啊- -! 您来留个言吧。</div>
             <else/>
             <volist name="wall" id="vo">
              <div class="wallLine">
                <div class="wallItem">
                  <div class="arrow"><s></s></div>
                  <div class="wI_avatar"><a name="{$vo.author}" href="{:UM('Home/index',array('userid'=>$vo['authoruid']))}" class="user_card" uid="{$vo['authoruid']}"><img width="48" height="48" src="{:U('Api/Avatar/index',array('uid'=>$vo['authoruid'],'size'=>48))}" onerror="this.src='{$model_extresdir}images/noavatar.jpg'"/></a></div>
                  <div class="wI_content">
                    <div class="wI_top">
                        <span class="nickname"><a href="{:UM('Home/index',array('userid'=>$vo['authoruid']))}" class="user_card" uid="{$vo['authoruid']}">{$vo.author}</a></span>
                        <span class="info">留言：</span>
                        <if condition=" $ismyhome ">
                        <span id="del-w{$vo.wid}" class="del" title="删除" onclick="jQuery(function(){ wallLib.doDelWall({$userinfo.userid}, {$vo.wid}, 0, 0)});" ></span>
                        </if>
                        <span class="others">
                            <span class="createTime">{$vo.datetime|format_date}</span>
                            <if condition=" $uid ">
                            <span><a class="reply" onclick="jQuery(function(){ wallLib.replyWall({$vo.wid}, 0, 0, 0, {$vo.authoruid})});" href="javascript:;">回复</a></span>
                            </if>
                        </span>
                    </div>
                    <div class="wI_text">{$vo.content}</div>
                  </div>
                </div>
                <div id="wallComment{$vo.wid}">
                  <volist name="vo.replylist" id="rvo">
                  <div class="wallComment">
                    <div class="wallCommentItem">
                      <div class="wC_avatar"><a href="{$rvo.author}" class="user_card" uid="{$rvo['authoruid']}"><img class="avatar-38" width="48" height="48" src="{:U('Api/Avatar/index',array('uid'=>$rvo['authoruid'],'size'=>48))}" onerror="this.src='{$model_extresdir}images/noavatar.jpg'"/></a></div>
                      <div class="wC_top">
                          <span class="nickname"><a href="{:UM('Home/index',array('userid'=>$rvo['authoruid']))}" class="user_card" uid="{$rvo['authoruid']}">{$rvo.author}</a></span>
                          <if condition=" $ismyhome ">
                          <span id="del-c{$rvo.wid}" class="del" title="删除" onclick="jQuery(function(){ wallLib.doDelWall({$userinfo.userid}, {$rvo.wid}, {$rvo.wid}, 0)});"></span>
                          </if>
                          <span class="others">
                             <span class="createTime">{$rvo.datetime|format_date}</span>
                             <if condition=" $rvo['authoruid'] neq $uid && $uid ">
                             <span><a class="reply" onclick="jQuery(function(){ wallLib.replyWall({$vo.wid}, {$vo.wid}, {$rvo.authoruid}, '{$rvo.author}', 0)});"  href="javascript:;">回复</a></span>
                             </if>
                          </span>
                      </div>
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
                    <button type="submit" id="wallcontSubmit" class="confirm" onclick="jQuery(function(){ wallLib.confirmWall({$vo.wid}, {$userinfo.userid})});">确认</button>
                    </span></span></div>
                  <div class="wCI_cancel"><a  href="javascript:;" class="cancel" onclick="jQuery(function(){ wallLib.cancelWall({$vo.wid})});">取消</a></div>
                  <div id="wCI_message{$vo.wid}" class="wCI_message"></div>
                  <div class="emot" id="emot_wallCommentInput{$vo.wid}" style="display:none"></div>
                </div>
                </if>
              </div>
              </volist>
             </if>
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
<script type="text/javascript" src="{$model_extresdir}js/jquery.emotEditor.js"></script>
<script type="text/javascript" src="{$model_extresdir}js/wall.js"></script>
<script type="text/javascript">
	libs.spaceInit();
	$("#wallContent").elastic({maxHeight:130});
	$("#wallContent").emotEditor({allowed:300, charCount:true, emot:true, newLine:true});
</script>
</body>
</html>