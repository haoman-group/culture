<?php if (!defined('SHUIPF_VERSION')) exit(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="description" content="查看{$userinfo.username}的个人空间，了解{$userinfo.username}，与他一起交流，分享关注{$userinfo.username}的个人空间信息。" />
<meta name="keywords" content="{$userinfo.username}的个人空间" />
<title>{$userinfo.username}的个人空间 - {$Config.sitename}</title>
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
    <div class="indexLeft">
      <div class="stageBox">
        <div class="stageBoxTop"><span></span></div>
        <div class="stageBoxCenter padding7">
          <div class="stageBoxCenterContent">
            <div class="user_info">
              <h3><span class="nickname">{$userinfo.username}</span><span class="text"><a href="{:UM('Home/index',array('userid'=>$userinfo['userid']))}">{:UM('Home/index',array('userid'=>$userinfo['userid']))}</a></span></h3>
              <div class="lc"><img width="160" height="160" src="{:U('Api/Avatar/index',array('uid'=>$userinfo['userid'],'size'=>180))}" onerror="this.src='{$model_extresdir}images/noavatar.jpg'"/>
                <div class="online_state">
                <if condition=" $isonline ">
                    <span class="online">当前在线</span>
                <else/>
                    <span class="offline">当前离线</span>
                </if>
                </div>
              </div>
              <div class="rc">
                <div class="content">
                  {:tag('view_member_show_medal',$userinfo)}
                  <div class="">最新说说</div>
                  <div class="content">
                    <if condition=" empty($weibo) ">还没有任何说说~~<else />{$weibo.content}</if>
                    <if condition=" !empty($weibo) ">
                    <div style="width:400px;"><span class="action"><a href="{:UM('Home/miniblog',array('id'=>$weibo['id']))}" target="_blank">评论[{$weibo.plsum}]</a></span> <span class="time">发表于:{$weibo.datetime|date='Y年m月d日',###}</span> </div>
                    </if>
                  </div>
                </div>
                <div class="bottom">
                  <div class="praise"><a class="praise_num" title="赞我一下" onclick="jQuery(function(){ user.praiseUser({$userinfo.userid}, '{$userinfo.username}', 0, 0, {$userinfo.praise}, 0)});"></a>
                    <div class="praiseDiv fl">
                      <div id="praiseCount1" class="praiseCount"><span id="praiseCount">{$userinfo.praise}</span></div>
                      <div class="epilog"></div>
                    </div>
                  </div>
                  <if condition=" $uid ">
                      <?php if( false == $ismyhome ){ ?>
                          <if condition=" $isfans ">
                              <div class="and" id="fans">
                              <a onclick="jQuery(function(){ fans.fansDel({$userinfo.userid}, '{$userinfo.username}')});" class="attention already" href="javascript:;"></a>
                              </div>
                          <else/>
                              <div class="and" id="fans">
                              <a onclick="jQuery(function(){ fans.fansAdd({$userinfo.userid}, '{$userinfo.username}')});" class="attention" href="javascript:;"></a>
                              </div>
                          </if>
                          <div class="and"><a class="private" onclick="jQuery(function(){ message.msgSendInit({$userinfo.userid}, {$uid})});" title="发送私信"></a></div>
                      <?php } ?>
                  <else/>
                      <div class="and" id="fans">
                      <a onclick="jQuery(function(){ fans.fansAdd({$userinfo.userid}, '{$userinfo.username}')});" class="attention" href="javascript:;"></a>
                      </div>
                      <div class="and"><a class="private" onclick="jQuery(function(){ message.msgSendInit({$userinfo.userid},'', '0')});" title="发送私信"></a></div>
                  </if>
                </div>
              </div>
            </div>
            <if condition="$albumHome ">
            <div class="spaceAlbum">
              <ul>
                <volist name="albumHome" id="vo">
                <li <if condition="$i eq 6 ">class="right"</if>><a target="_blank" href="{:UM('Home/album',array('userid'=>$userinfo['userid'],'id'=>$vo['id']))}"><img onerror="jQuery(function(){libs.imageError(this);}, this)" src="{$vo.thumb}" width="76" height="76"/></a></li>
                </volist>
              </ul>
            </div>
            </if>
          </div>
        </div>
        <div class="stageBoxBottom"><span></span></div>
      </div>
      <div class="blank13"></div>
      <div class="stageBox">
        <div class="stageBoxTop"><span></span></div>
        <div class="stageBoxCenter">
          <div class="spaceMTitle">
            <p>{$my}的分享</p>
          </div>
          <div class="title_per"></div>
          <div id="list" class="spaceMusic minHeight100">
            <if condition=" $share ">
            <ul class="post_list">
                <li class="title">
                  <div class="song">标题</div>
                  <div class="class">类别</div>
                  <div class="time">分享时间</div>
                </li>
                <volist name="share" id="vo">
                <li>
                  <div class="song">
                    <div class="aleft"><a target="p" class="mname" href="{$vo.url}">{$vo.title}</a></div>
                  </div>
                  <div class="class">{:getCategory($vo['catid'],'catname')}</div>
                  <div class="time">{$vo.inputtime|format_date}</div>
                </li>
                </volist>
              </ul>
              <div>
                <div class="play_button">
                    <a class="select_more" title="更多分享" target="_blank" href="{:UM('Home/share',array('userid'=>$userinfo['userid']))}">更多</a>
                </div>
              </div>
            <else/>
            <div class="nothing">{$my}还没有任何分享</div>
            </if>
          </div>
          <div class="spaceWall">
            <div class="wallConsole">
              <div class="wallTitle"><span>留言板</span></div>
              <div class="title_per"></div>
              <div class="sW_box">
                <div class="sW_input">
                  <div contenteditable="true" id="wallContent" class="wallContent" name="wallContent"></div>
                </div>
                <div class="sW_button"><span class="button-main"><span>
                  <button type="button" id="wallSubmit" onclick="jQuery(function(){ wallLib.wallAddInit({$userinfo.userid}) });">留言</button>
                  </span></span></div>
                <div id="sW_message" class="wCI_message"></div>
                <div id="emot_wallContent" class="emot" style="display:none"></div>
              </div>
            </div>
            <div id="wall_content" class="wall_index wall_content minHeight150">
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
                             <if condition=" $rvo['authoruid'] neq $vo['authoruid'] && $uid ">
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
            </div>
          </div>
        </div>
        <div class="stageBoxBottom"><span></span></div>
      </div>
    </div>
    <div class="indexRight">
      {:tag('view_member_home_indexright',$userinfo)}
      <div class="sFriendTitle">个人介绍</div>
      <div class="introduction">
        <div class="SA"><em>◆</em><span>◆</span></div>
        <div class="middle"><if condition="$userinfo['about'] ">{$userinfo.about}<else/>暂无介绍...</if></div>
      </div>
      <if condition=" $visitors ">
      <div class="sFriendTitle">最近访客</div>
      <ul class="sFriend">
        <volist name="visitors" id="vo">
        <li>
          <div class="friendAvatar"><a href="{:UM('Home/index',array('userid'=>$vo['userid']))}" class="user_card" uid="{$vo['userid']}"><img width="48" height="48" src="{:U('Api/Avatar/index',array('uid'=>$vo['userid'],'size'=>48))}" onerror="this.src='{$model_extresdir}images/noavatar.jpg'"/></a></div>
          <div class="friendInfo"><span><a title="{$vo.username}" href="{:UM('Home/index',array('userid'=>$vo['userid']))}" class="<if condition=" $vo['isonline'] ">online_icon</if> user_card" uid="{$vo['userid']}">{$vo.username}</a></span>
            <p>{$vo.datetime|format_date}</p>
          </div>
        </li>
        </volist>
      </ul>
      </if>
      <if condition=" $friends ">
      <div class="sFriendTitle">{$my}关注的人<span>[{$friendsCount}]</span></div>
      <ul class="sFriend no">
        <volist name="friends" id="vo">
        <li>
          <div class="friendAvatar"><a href="{:UM('Home/index',array('userid'=>$vo['fuserid']))}" class="user_card" uid="{$vo['fuserid']}"><img width="48" height="48"src="{:U('Api/Avatar/index',array('uid'=>$vo['fuserid'],'size'=>48))}" onerror="this.src='{$model_extresdir}images/noavatar.jpg'"/></a></div>
          <div class="friendInfo"><span><a title="{$vo.fusername}" href="{:UM('Home/index',array('userid'=>$vo['fuserid']))}"  class="<if condition=" $vo['isonline'] ">online_icon</if> user_card" uid="{$vo['fuserid']}">{$vo.fusername}</a></span>
            <p></p>
          </div>
        </li>
        </volist>
      </ul>
      <div class="sMore"><a href="{:UM('Home/following',array('userid'=>$userinfo['userid']))}">查看更多»</a></div>
      </if>
    </div>
  </div>
  <div class="mainBottom"></div>
</div>
<template file="Member/Home/footer.php"/>
<script type="text/javascript" src="{$model_extresdir}js/wall.js"></script>
<script type="text/javascript" src="{$model_extresdir}js/jquery.emotEditor.js"></script>
<script type="text/javascript">
//滚动到顶部
libs.spaceHomeInit();
//加载被赞次数
libs.praise(0, 0, {$userinfo.praise});
</script>
</body>
</html>