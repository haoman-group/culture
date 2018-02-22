<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>我的产品 - {$Config.sitename}</title>
<template file="Member/Public/global_js.php"/>
<script type="text/javascript" src="{$model_extresdir}js/common.js"></script>
<script type="text/javascript" src="{$config_siteurl}statics/js/swfobject.js"></script>
<script type="text/javascript" src="{$model_extresdir}js/fullAvatarEditor.js"></script>
<link href="/favicon.ico" rel="shortcut icon">
<link type="text/css" href="{$model_extresdir}css/core.css" rel="stylesheet" />
<link type="text/css" href="{$model_extresdir}css/common.css" rel="stylesheet" />
<link type="text/css" href="{$model_extresdir}css/user.css" rel="stylesheet" media="all" />
<link href="{$config_siteurl}statics/cu/css/css/dsjk.css" rel="stylesheet" type="text/css" />
</head>
<body style="background: #fff;">
<?php
    if($source_page == 'database-register'){
        echo '<div class="top">
                <div class="top1">
                    <div class="logo">
                        <a href="/cudatabase"><img src="/statics/cu/images/images/sjk/logo.png" width="258" height="140" /></a>
                    </div>
                </div>
            </div>';
    }
?>
<div class="user">
  <div class="user_center" style="margin: 80px 0;background:  rgba(21,101,138,0.4);">
    <template file="Member/Public/homeUserMenu.php"/>
    <div class="user_main">
      <div class="uMain_content">
        <div class="main_nav">
          <ul>
            <li class="modify"> <a class="on" href="{:U('Member/Product/add')}">新增产品</a></li>
             <li class="modify"> <a class="on" href="{:U('Pubservice/Index/index')}">返回首页</a> </li>
           
            <li >
          </ul>
        </div>
        
        <div class="minHeight500"> 
          <table>
            <tr>
              <th width="300">序号</th>
              <th width="300">名称</th>
              <th width="300">类别</th>
              <th width="300">区域</th>
              <th width="300">价格</th>
              <th width="300">厂家</th>
              <th width="300">联系方式</th>
              <th width="300">时间</th>
              <th width="300">操作</th>
              
            </tr>
             <volist name="data" id="vo">
            <tr>
            
              <td style="text-align:center">{$vo.id}</td>
              <td style="text-align:center"><if condition="$vo['p_name'] neq ''">{$vo.p_name}<else/>无</if></td>
              <td style="text-align:center"><if condition="$vo['type'] neq ''">{$vo.type}<else/>无</if></td>
              <td style="text-align:center"><if condition="$vo['region'] neq ''">{$vo.region}<else/>无</if></td>
              <td style="text-align:center"><if condition="$vo['price'] neq ''">{$vo.price}<else/>无</if></td>
              <td style="text-align:center"><if condition="$vo['manufacturer'] neq ''">{$vo.manufacturer}<else/>无</if></td>
              <td style="text-align:center"><if condition="$vo['phone'] neq ''">{$vo.phone}<else/>无</if></td>
              <td style="text-align:center">{$vo.inputtime|date="m-d H:i:s",###}</td>
              <td style="text-align:center"><a href="{:U('edit',array('id'=>$vo['id']))}">修改</a>|<a href="{:U('delete',array('id'=>$vo['id']))}">删除</a></td>
             
             
            </tr>
          </volist>
          </table>
          
          
          
          <!--修改密码-->
         
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
</body>
</html>