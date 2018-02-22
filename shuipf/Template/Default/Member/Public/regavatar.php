<?php if (!defined('SHUIPF_VERSION')) exit(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
<title>添加头像 - {$Config.sitename}</title>
<template file="Member/Public/global_js.php"/>
<script type="text/javascript" src="{$config_siteurl}statics/js/swfobject.js"></script>
<script type="text/javascript" src="{$model_extresdir}js/common.js"></script>
<script type="text/javascript" src="{$model_extresdir}js/fullAvatarEditor.js"></script>
<link rel="shortcut icon" href="/favicon.ico" />
<link rel="stylesheet" type="text/css" href="{$config_siteurl}statics/cu/css/base.css" />
<link rel="stylesheet" type="text/css" href="{$model_extresdir}css/common.css" />
<link rel="stylesheet" type="text/css" href="{$model_extresdir}css/passport.css" />
<link href="{$config_siteurl}statics/cu/css/css/dsjk.css" rel="stylesheet" type="text/css" />
<style>
.container{
    width:1190px;
    margin-left:20% ;
}
</style>
</head>
<body style="background: #fff;">

<template file="Member/Public/_header"/>

<!--修改头像-->
<div id="modifyAvatar" class="profile" style="float: none;">
  <div class="title">会员登录</div>
  <div class="avatar_box" style="margin: 20px 0 40px">
    <div class="avatarTitle" style="margin-bottom: 20px;"> 当前头像<span style="padding-left: 415px;">设置头像</span> </div>
    <div class="myAvatar" style="margin-left: 0;"> <img class="avatar-160" id="my-avatar" width="160" height="160" src="{:U('Api/Avatar/index',array('uid'=>$uid,'size'=>180))}" onerror="this.src='{$model_extresdir}images/noavatar.jpg'"/> </div>
    <div class="myAvatarUpload">
    	<div id="myContent"></div>
        {$user_avatar}
    </div>
    <!--<input type="hidden" name="type" value={$_GET['type']}>-->
    <div class="style" id="next"> <a href="{:U("Member/Index/home")}" id="next">下一步</a> <a href="{:U("Pubservice/Index/index")}" id="back" style="float:left;">返回首页</a> </div>
  </div>
</div>
<?php
    if($_GET['type'] == 'database-register'){
        echo '<div class="footer">© 2005－2015 Shanxi Yunpingtai.com, All Rights Reserved    |   关于我们   |   网站邮箱   |   网站地图   |  友情链接  |  本网声明  |  </div>';
    }
?>
<script type="text/javascript">
//头像上传回调
function fullAvatarCallback(msg) {
    switch (msg.code) {
    case 1:
        
        break;
    case 2:
        
        break;
    case 3:
        if (msg.type == 0) {
            
        } else if (msg.type == 1) {
            alert("摄像头已准备就绪但用户未允许使用！");
        } else {
            alert("摄像头被占用！");
        }
        break;
    case 4:
        alert("图像文件过大！");
        break;
    case 5:
        if (msg.type == 0) {
            $('#my-avatar').attr('src',"{:U('Api/Avatar/index',array('uid'=>$uid,'size'=>180))}");
        } else {
			alert(msg.content.msg);
		}
        break;
    }
}
</script>
</body>
</html>