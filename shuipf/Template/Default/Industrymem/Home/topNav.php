<?php if (!defined('SHUIPF_VERSION')) exit(); ?>
<div class="top" id="top">
  <div class="topNav">
    <ul>
      <li class="logo"><a target="list" href="{$Config.siteurl}"></a></li>
      <li><a target="list" href="{$Config.siteurl}">首页</a></li>
    </ul>
    <if condition=" $uid ">
    <div class="user">
      <div class="face"><img class="avatar" width="20" height="20" src="{:U('Api/Avatar/index',array('uid'=>$uid,'size'=>48))}" onerror="this.src='{$model_extresdir}images/noavatar.jpg'"/></div>
      <div class="info"><a class="nickname" href="{:UM('Home/index',array('userid'=>$uid))}"  title="个人主页">{$username}</a><a href="{:U('Index/home')}">个人中心</a><span id="feedTips" class="feedTips" style="display:none;" title="您的好友有新的动态!"></span><a href="{:U('Message/notification')}" >通知</a><span id="msgTips" class="msgTips" style="display:none;" title="您有新的消息!"></span>
        <div class="set_list"><a class="set_menu icon share " id="userInfo" href="javascript:;" title="我的分享">分享</a>
          <div class="m_set_list" style="display: none;" id="uploadList"><em></em>
              <a class="list"  href="{:U('Share/add')}"><b class="dan"></b>添加分享</a>
              <a class="list"  href="{:U('Share/index')}"><b class="share"></b>我分享的</a>
              <a class="list"  href="{:U('Share/index',array('type'=>'check'))}"><b class="audit"></b>已审核的</a>
              <a class="list"  href="{:U('Share/index',array('type'=>'checking'))}"><b class="audit"></b>审核中的</a>
          </div>
        </div>
        <div class="set_list"><a class="set_menu icon song " id="userInfo" href="{:U('Favorite/index')}" title="我的收藏">收藏</a></div>
        <div class="set_list"><a class= "set_menu icon set" href="{:U('User/profile')}">设置</a>
          <div class="m_set_list" style="display: none;"><em></em>
              <a class="list"  href="{:U('User/profile')}"><b class="setup"></b>个人设置 </a>
              <a class="list"  href="{:U('User/profile',array('type'=>'avatar'))}"><b class="avatar"></b>修改头像 </a>
              <a class="list"  href="{:UM('Home/skin',array('userid'=>$uid))}"><b class="skin"></b>空间换肤 </a>
              <a class="list" href="{:U('Industrymem/Index/logout')}"><b class="exit"></b>退出登录 </a>
          </div>
        </div>
      </div>
    </div>
    <else/>
    <div class="user"><div class="face"><img class="avatar" width="20" height="20" src="{$model_extresdir}images/noavatar.jpg"></div><div class="info"><em>欢迎您登录！</em><a href="{:U('Index/index')}" >会员空间</a><a href="{:U('Index/login')}" onclick="return libs.login();">登 录</a><a href="{:U('Index/register')}">注 册</a></div></div>
    </if>
  </div>
</div>
<template file="Member/Home/nav.php"/>