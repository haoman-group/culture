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
<link href="{$config_siteurl}statics/cu/css/public-service.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="{$config_siteurl}statics/cu/css/base.css" />
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
            <li class="modify"> <a class="on" href="###">我的预约</a></li>
             <li class="modify"> <a class="on" href="{:U('Pubservice/Index/index')}">返回首页</a> </li>
           
            <li >
          </ul>
        </div>
        
        <div class="minHeight500"> 
          <table width="100%" cellspacing="0" >
            <tr style="height:60px;line-height:40px;background-color:#f1f0ef;">
              <th align="center" style="font-size:16px;">预约(报名)序号</th>
              <th align="center" style="font-size:16px;">类别</th>
              <th align="center" style="font-size:16px;">预约时间</th>
              <th align="center" style="font-size:16px;">预约名称</th>
              <th align="center" style="font-size:16px;">操作</th>
            </tr>
             <volist name="data" id="vo">
            <tr style="height:40px;line-height:40px;background-color: #FFFFFF;">
              <td style="text-align:center;font-size:16px;" >{$vo.id}</td>
              <td style="text-align:center;font-size:16px;"><if condition="$vo['style'] eq '1'">个人<else/>团队</if></td>
              <td style="text-align:center;font-size:16px;">{$vo['addtime']}</td>
              <td style="text-align:center;font-size:16px;"><if condition="$vo['show']['content_title'] neq ''">{$vo['show']['content_title']}<else/>无</if></td>
              <td style="text-align:center;font-size:16px;"><a href="{:U('bedit',array('id'=>$vo['id'],'style'=>$vo['style']))}" style="color:#266aae">[修改]</a>&nbsp;|&nbsp;<a href="{:U('delete',array('id'=>$vo['id']))}" style="color:#266aae">[删除]</a></td>
             
             
            </tr>
          </volist>
          </table>
          
          
          
          <!--修改密码-->
         
       <div class="page">
				{$pageinfo.page}
			</div>
       
        </div>
         
      </div>
    </div>
  </div>
  
</div>
<?php
    if($source_page == 'database-register'){
        echo '<div class="footer">© 2005－2015 Shanxi Yunpingtai.com, All Rights Reserved    |   关于我们   |   网站邮箱   |   网站地图   |  友情链接  |  本网声明  |  </div>';
    }
?>
<script type="text/javascript" src="{$config_siteurl}statics/js/wind.js"></script>
<script type="text/javascript" src="{$config_siteurl}statics/js/common.js"></script>
<script type="text/javascript" src="{$model_extresdir}js/profile.js"></script> 
<script type="text/javascript" src="{$config_siteurl}statics/js/ajaxForm.js"></script>
<script type="text/javascript">
profile.init();
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
		    $.tipMessage("头像已经修改，刷新后可见最新头像！", 0, 3000);
        } else {
			alert(msg.content.msg);
		}
        break;
    }
}
</script>
<template file="Pubservice/Common/_foot"/>
</body>
</html>