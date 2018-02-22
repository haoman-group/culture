<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>个人中心 - {$Config.sitename}</title>
<template file="Member/Public/global_js.php"/>
<script type="text/javascript" src="{$model_extresdir}js/common.js"></script>
<script type="text/javascript" src="{$config_siteurl}statics/js/swfobject.js"></script>
<script type="text/javascript" src="{$model_extresdir}js/fullAvatarEditor.js"></script>
<link href="/favicon.ico" rel="shortcut icon">
<link type="text/css" href="{$model_extresdir}css/core.css" rel="stylesheet" />
<link type="text/css" href="{$model_extresdir}css/common.css" rel="stylesheet" />
<link type="text/css" href="{$model_extresdir}css/user.css" rel="stylesheet" media="all" />
<link href="{$config_siteurl}statics/cu/css/css/dsjk.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="{$config_siteurl}statics/cu/css/base.css" />
<style>
.container{
    width:1190px;
    margin-left:20% ;
}
.name{
  width:300px !important;
}
.info{
  font-size:14px;
  margin-top:2px;
  padding-top:2px;

}
</style>
</head>
<body style="background: #fff;">
<template file="Member/Public/_header"/>
<div class="user">
  <div class="user_center">
    <template file="Member/Public/homeUserMenu.php"/>
    <div class="user_main">
      <div class="uMain_content">
        <div class="main_nav">
          <ul>
            <li class="modify"> <a class="on" href="{:U('Member/User/profile')}">个人中心</a> </li>
            <li class="modify"> <a class="on" href="{:U('Pubservice/Index/index')}">返回首页</a> </li>
          </ul>
        </div>
        <div class="main_nav2">
          <ul id="aa">
            <li  <if condition="ACTION_NAME eq 'mycard' ">class="current"</if>  id="mycard">  <a href="{:U('Member/Reader/mycard')}"><span>读者信息</span></a> </li>
            <if condition="$if_bind eq true">
              <li  <if condition="ACTION_NAME eq 'remove' ">class="current"</if>  id="remove">  <a href="javascript:removeconfirm()"><span>我要解绑</span></a> </li>
            <else/>
              <li  <if condition="ACTION_NAME eq 'bind' ">class="current"</if>  id="bind">      <a href="{:U('Member/Reader/bind')}"><span>我要绑定</span></a> </li>
            </if>
          </ul>
          <div id="tooltip" class=""> <a id="refresh" class="eda" type="0" cid="4" href="###" title="查看帮助" target="_blank"> </a> </div>
        </div>
        <div class="minHeight500"> 
          <!--修改基本资料-->
          <form id="doprofile" action="" method="post">
          <div id="modifyProfile" class="profile">
            <div class="title">
              <div class="name">我的读者信息</div>
            </div>
            <if condition="$if_bind eq true">
            <ul>
              <li>
                <div class="name">读者证状态：</div><div class='info'><?=$info->rdcfstate ==1 ? '正常':'异常';?></div>
              </li>
              <li>
                <div class="name">读者证号码：</div><div class='info'>{$info->rdid}</div>
              </li>
              <li>
                <div class="name">读者姓名：</div><div class='info'>{$info->rdName}</div>
              </li>
              <li>
                <div class="name">开户馆：</div><div class='info'>{$info->rdLib}</div>
              </li>
              <li>
                <div class="name">证启用日期：</div><div class='info'>{$info->startDate|mb_substr=###,0,10}</div>
              </li>
              <li>
                <div class="name">证终止日期：</div><div class='info'>{$info->endDate|mb_substr=###,0,10}</div>
              </li>
              <li>
                <div class="name">积分：</div><div class='info'>{$info->rdScore}</div>
              </li>
              <li>
                <div class="name">押金总额：</div><div class='info'>{$info->rdDeposit}元</div>
			        </li>
              <li>
                <div class="name">专项押金：</div><div class='info'>{$info->rdDebt}元</div>
              </li>
              <li>
                <div class="name">借阅次数：</div><div class='info'>{$info->rdTotalLoanCount}次</div>
              </li>
            </ul>
            <else/>
             <span style="color:red;font-size:16px;"> 暂未绑定，请点击绑定读者证进行绑定！</span>
            </if>
          </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<script>
function removeconfirm()
{
  var r=confirm("是否确定解绑？")
  if (r==true)
  {
    window.location.href="{:U('Member/Reader/remove')}"
  }
}
</script>
<template file="Pubservice/Common/_foot"/>
</body>
</html>