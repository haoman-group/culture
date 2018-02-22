<?php if (!defined('SHUIPF_VERSION')) exit(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="description" content="查看{$userinfo.username}世界的照片，了解{$userinfo.username}世界喜欢的新闻资讯，与他一起交流，分享关注{$userinfo.username}世界的照片信息。" />
<meta name="keywords" content="{$userinfo.username}世界的照片" />
<title>{$userinfo.username}的照片 - {$Config.sitename}</title>
<link href="/favicon.ico" rel="shortcut icon">
<template file="Member/Public/global_js.php"/>
<script type="text/javascript" src="{$model_extresdir}js/common.js"></script>
<link type="text/css" href="{$model_extresdir}css/core.css" rel="stylesheet" />
<link type="text/css" href="{$model_extresdir}css/common.css" rel="stylesheet" />
<link type="text/css" href="{$model_extresdir}css/space.css" rel="stylesheet" />
<link type="text/css" id="skin" href="{$model_extresdir}theme/{$themeName}/style.css" rel="stylesheet" />
</head>
<body>
<php>
if($ismyhome){
	$my = '我';
}else {
	$my = '他/她';
}
</php>
<template file="Member/Home/topNav.php"/>
<div class="spaceMain">
  <div class="mainTop"></div>
  <div class="mainCenter">
    <div class="publicLeft">
      <div class="stageBox">
        <div class="stageBoxTop"><span></span></div>
        <div class="stageBoxCenter  min_space_height">
          <div class="spaceMTitle2">
            <p>{$my}的照片墙 » </p>
            <em>查看照片</em></div>
          <div class="title_per"></div>
          <div>
            <div class="imageShowList" id="imagesSlide">
              <div class="images_slide" >
                <div class="images_slide_nav"><a class="prev" href="<if condition=" $pre ">{$pre}<else/>javascript:;</if>">上一张</a><a class="next" href="<if condition=" $next ">{$next}<else/>javascript:;</if>">下一张</a></div>
                <div class="images_slide_wrap">
                  <ul class="images_slide_list">
                  <volist name="daohang" id="vo">
                    <li pid="{$vo.id}">
                        <a href="{:UM('Home/album',array('userid'=>$userinfo['userid'],'id'=>$vo['id']))}" >
                           <img <if condition=" $id eq $vo['id'] ">class="select"</if>  src="{$vo.thumb}" height="70" width="70" onerror="$call(function(){libs.imageError(this);}, this)"/>
                        </a>
                    </li>
                   </volist>
                  </ul>
                </div>
              </div>
            </div>
            <div class="imageShow">
              <div class="pic">
                 <a href="javascript:;"><img id="imgItem" right="<if condition=" $next ">{$next}<else/>javascript:;</if>" left="<if condition=" $pre ">{$pre}<else/>javascript:;</if>" src="{$info.src}" onerror="$call(function(){libs.imageError(this);}, this)" title="点击查看上一张"/></a>
              </div>
              <div id="nameInfo" class="nameInfo">
                  <span class="lquotes"></span>
                   <if condition=" $info['remark'] ">{$info.remark}<else/>米有说明哦~</if>
                  <span id="name" class="rquotes"></span>
              </div>
              <div class="imageInfo">
                <div class="imgpraise">
                <if condition="$islove ">
                   <div id="praise"><a class="praiseImg" num="{$info.love}" onclick="$call(function(){ albumLib.cancelPraiseInit({$uid}, {$id})});" onmouseover="$('#praiseCount').html('-1');" onmouseout="$('#praiseCount').html({$info.love});" title="取消喜欢"> </a></div>
                <else/>
                   <div id="praise"><a class="praiseImg" num="{$info.love}" onclick="$call(function(){ albumLib.picPraiseInit({$uid}, {$id})});" onmouseover="$('#praiseCount').html('+1');" onmouseout="$('#praiseCount').html('{$info.love}');" title="喜欢就点一下"></a></div>
                </if>
                  <div class="praiseDiv fl"><span id="praiseCount" class="praiseCount">{$info.love}</span><i></i></div>
                </div>
                <div id="praiseNum" type="hidden" num="{$info.love}"></div>
                <a id="imageClick">查看原图</a>
                <div id="create_time" class="create_time">上传于 {$info.uploadtime|format_date} ({$info['size']/1000} KB)</div>
                <input id="showType" type="hidden" value="1">
                <input id="filePath" type="hidden" value="{$info.src}">
                <div class="picName" pNum="" type="hidden"></div>
              </div>
              <div class="imageInfo">
              <if condition=" $ismyhome && $uid ">
                  <a title="删除此照片" pid="{$id}" uid="{$uid}" class="delete">[删除]</a>
                  <a class="explain" uid="{$uid}" pid="{$id}">[编辑说明]</a>
              </if>
              </div>
              <div class="clear"></div>
              <div id="imageNameInputBox" style="display: none;">
                <div class="imageNameInputBox">
                  <div class="iNI_input">
                    <textarea id="imageNameContent"></textarea>
                  </div>
                  <div class="iNI_button"><span class="button-main"><span>
                    <button class="sends" uid="{$uid}" pid="{$id}" type="button">确认</button>
                    </span></span></div>
                  <div class="iNI_cancel"><a href="javascript:;" id="cencel">取消</a></div>
                  <div id="iNI_message" class="iNI_message"></div>
                </div>
              </div>
            </div>
            <div class="img_comments" style="display: block">
              <div class="comments_input">
                <div id="replayUser" class="replayUser" style="display: none;"></div>
                <div id="replayUserDel" class="addd" title="取消对此人的回复"  style="display: none;"></div>
                <div class="inputBox">
                  <div id="note" class="note" contenteditable="true" name="note"></div>
                </div>
                <div class="sW_button"><span class="button-main"><span>
                  <button id="submitBtn" uid="{$userinfo.userid}" pid="{$id}" type="button">评论</button>
                  </span></span></div>
                <div id="sW_message" class="wCI_message"></div>
                <div id="emot_note" class="emot" to="note" style="display:none"></div>
              </div>
            </div>
            <div id="picComment" class="picComment">
              <div id="comments_list" class="comments_list">
                <ul id="commentList" style="overflow: hidden;">
                  <volist name="comment" id="vo">
                  <li id="comment" class="hover" style="_zoom:1;">
                    <div class="pic"><a target="_blank" href="{:UM('Home/index',array('userid'=>$vo['userid']))}" class="user_card" uid="{$vo['userid']}"><img class="avatar-20" src="{:U('Api/Avatar/index',array('uid'=>$vo['userid'],'size'=>45))}" onerror="this.src='{$model_extresdir}images/noavatar.jpg'"/></a></div>
                    <div class="txt">
                      <p>
                          <span class="name"><a target="_blank" class="user_card" href="{:UM('Home/index',array('userid'=>$vo['userid']))}" uid="{$vo['userid']}">{$vo.username}：</a></span>
                          <span class="content_id">{$vo.content}</span>
                          <span class="time">{$vo.datetime|format_date}</span>
                          <if condition="$uid && $uid neq $vo['userid'] ">
                          <a id="comment" class="reply" authorId="{$vo.userid}" nickname="{$vo.username}">回复</a>
                          </if>
                      </p>
                    </div>
                    <if condition="$uid && $ismyhome ">
                    <span cid="{$vo.id}" pid="{$id}" uid="{$vo.userid}" class="del" title="删除"></span>
                    </if>
                  </li>
                  </volist>
                  <div class="page">{$Page}</div>
                </ul>
              </div>
              <if condition="$lovelog ">
              <div class="Q_whoLiked">
                <div class="hd">
                  <h2>这些人喜欢过</h2>
                </div>
                <div class="bd">
                  <ul class="avatarList clearfix">
                  <volist name="lovelog" id="vo">
                    <li >
                      <div class="avatar"><a href="{:UM('Home/index',array('userid'=>$vo['userid']))}" class="user_card" target="_blank" uid="{$vo.userid}"><img class="avatar" width="48" height="48" src="{:U('Api/Avatar/index',array('uid'=>$vo['userid'],'size'=>45))}" onerror="this.src='{$model_extresdir}images/noavatar.jpg'"/></a></div>
                    </li>
                  </volist>
                  </ul>
                </div>
              </div>
              </if>
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
<script type="text/javascript" src="{$model_extresdir}js/album.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		albumLib.imageDetailInit();
		albumLib.imageDelInit(); 
		albumLib.imageNameModifyInit(); 
		albumLib.replayUserInit();
		albumLib.replayUserCancelInit();
		albumLib.imageCommentDelInit();
	});
</script>
</body>
</html>