<?php if (!defined('SHUIPF_VERSION')) exit(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
<meta name="Keywords" content="在线成员 "/>
<meta name="description" content="在线成员 "/>
<title>在线成员  - {$Config.sitename}</title>
<template file="Member/Public/global_js.php"/>
<script type="text/javascript" src="{$model_extresdir}js/common.js"></script>
<link rel="shortcut icon" href="/favicon.ico" />
<link type="text/css" href="{$model_extresdir}css/core.css" rel="stylesheet" />
<link type="text/css" href="{$model_extresdir}css/common.css" rel="stylesheet" />
<link type="text/css" href="{$model_extresdir}css/user.css" rel="stylesheet" media="all" />
<link type="text/css" href="{$model_extresdir}css/site.css" rel="stylesheet" media="all" />
</head>
<body>
<template file="Member/Public/homeHeader.php"/>
<div class="member_content" style="margin: 5px auto;">
  <div class="title">
    <div class="name">在线会员</div>
    <div class="number">共有<span>{$count}</span>位在线</div>
    <div class="right">
      <form id="searchForm" onSubmit="relation.userSearch();return false;">
        <div class="keywords"><span>昵称关键字:</span>
          <input id="keyword" type="text" value="" style="width:120px" size="10" name="keyword">
        </div>
        <input class="search"  type="submit" value="">
        </input>
      </form>
    </div>
    <ul class="sort">
      <li class="current"><span><a href="{:U('User/online')}">在线会员</a></span></li>
      <li><span><a href="{:U('User/search')}">会员搜索</a></span></li>
    </ul>
  </div>
  <div class="box">
    <if condition=" empty($online) ">
    <div class="nothing">没有相关记录</div>
    </if>
    <ul>
      <volist name="online" id="vo">
      <li><a title="{$vo.username}"  href="{:UM('Home/index',array('userid'=>$vo['userid']))}" target="_blank" class="user_card" uid="{$vo.userid}"><img src="{:U('Api/Avatar/index',array('uid'=>$vo['userid'],'size'=>90))}" onerror="this.src='{$model_extresdir}images/noavatar.jpg'"></a>
        <div class="box_list"><a title="{$vo.username}" href="{:UM('Home/index',array('userid'=>$vo['userid']))}" class="user_card" target="_blank" uid="{$vo.userid}"><span class="name">{$vo.username}</span></a>
          <p><a   href="{:UM('Home/index',array('userid'=>$vo['userid']))}" target="_blank" >关注{$vo.attention}人、</a><a  href="{:UM('Home/fans',array('userid'=>$vo['userid']))}" target="_blank" >粉丝{$vo.fans}人、</a><a  href="{:UM('Home/index',array('userid'=>$vo['userid']))}" target="_blank" >分享{$vo.share}</a></p>
          <p>&nbsp;</p>
          <a onclick="fans.fansAdd({$vo.userid}, '{$vo.username}', 1);" class="attention" href="javascript:;"></a></div>
      </li>
      </volist>
    </ul>
  </div>
  <div class="page"><div class="pages">{$Page}</div></div>
</div>
<div class="bottom">
  <template file="Member/Public/homeFooter.php"/>
</div>
<script type="text/javascript" src="http://static92cc.db-cache.com/space/js/relation.js"></script>
<script type="text/javascript"> 
	nav.init();
	nav.userMenu();
	relation.init();
	select.init('sex');
	select.init('province');
</script>
<script type="text/javascript" src="{$model_extresdir}js/card.js"></script>
</body>
</html>