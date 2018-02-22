<?php if (!defined('SHUIPF_VERSION')) exit(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>上传新照片 - {$Config.sitename}</title>
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
            <li class="me"> <a href="{:U("Album/album")}">我的照片</a> </li>
            <li class="fond"> <a href="album?a=album&i=praise">喜欢的照片</a> </li>
            <li class="friend"> <a href="album?a=album&i=following">好友的照片</a> </li>
          </ul>
          <div class="action"> <a href="{:U("Album/imageadd")}">上传照片</a> </div>
        </div>
        <div class="main">
          <div id="tooltip" class="refresh"> <a id="refresh" class="eda" type="0" cid="4" href="help/" title="查看帮助" target="_blank"> </a> </div>
        </div>
        <div class="minHeight500">
          <div class="imageUp_Title"> 上传照片<span>(您总共可以上传{$upphotomax}张照片，已上传{$photosum}张照片。)</span> </div>
          <div class="imageUpNote">禁止上传与您无关的照片，您上传的每张图片都会审核，发现上传违法图片将封账号处理，谢谢合作！</div>
          <div class="imageUp_uploadWrap">
            <div id="upButton" class="btn-upload">
              <input id="file_upload" width="100" type="file" height="32" name="file_upload" style="display: none;">
            </div>
            <div id="uploadfileQueue" class="uploadifyQueue"></div>
            <div id="uploadInfo">请选择您要上传的图片，然后点击上传按钮即可上传图片！</div>
            <div class="btn-group"> <a href="javascript:$('#file_upload').uploadify('upload','*')" class="btn">上传</a> <a href="javascript:$('#file_upload').uploadify('cancel','*')" class="btn">取消上传</a> <a href="javascript:$('#file_upload').uploadify('stop','*')" class="btn">暂停上传</a> </div>
          </div>
        </div>
      </div>
    </div>
  </div>
<template file="Member/Public/homeFooter.php"/>
</div>
<script type="text/javascript" src="{$model_extresdir}js/album.js"></script>
<script type="text/javascript" src="{$model_extresdir}js/uploadify/jquery.uploadify.js"></script> 
<script type="text/javascript">
albumLib.imageAddInit();
var upstatus = true;
$(document).ready(function () {
    $("#file_upload").uploadify({
        'swf': _config['domainStatic'] + 'js/uploadify/uploadify.swf',
        'buttonImage': _config['domainStatic'] + 'js/uploadify/upbutton.gif',
        'cancelImage': _config['domainStatic'] + 'js/uploadify/cancel.png',
        'uploader': _config['domainSite'] + 'index.php?g=Member&m=Public&a=uploadalbum',
        'width': '100',
        'height': '32',
        'auto': false,
        'debug': false,
        'formData': {
            'key': '{$key}'
        },
        'queueID': 'uploadfileQueue',
        'fileTypeExts': '*.jpg;*.jpge;*.gif;*.png', //允许文件上传类型,和fileDesc一起使用.
        //'fileTypeDesc'	: '支持的格式 (*.jpg;*.jpge;*.gif;*.png)',  //显示的文件类型内容,在浏览对话框的出现.
        'fileSizeLimit': 10 * 1024 * 1024, //上传大小限制
        'queueSizeLimit': 25, //一次上传图片最大数量限制
        'removeTimeout': 2,
        'successTimeout': 0,
        'multi': true,
        'onUploadStart': function (file) { //上传开始时触发（每个文件触发一次）
            $('#uploadInfo').html('正在准备上传 ' + file.name + ' 请稍后！');
        },
        'onUploadSuccess': function (file, data, response) { //上传完成时触发（每个文件触发一次）
		    data = jQuery.parseJSON(data);
            if (data['error'] == 10005) {
                $('#file_upload').uploadify('cancel', '*');
                alert('您的照片墙已满!');
				upstatus = false;
            } else if (data['error'] == 10011) {
                $.tipMessage('没有文件！', 1, 2000);
                $('#file_upload').uploadify('cancel', '*');
				upstatus = false;
            } else if (data['error'] == 20001) {
                $.tipMessage('用户未登录！', 1, 2000);
                $('#file_upload').uploadify('cancel', '*');
				upstatus = false;
            }else if (data['error'] == 10000) {
				upstatus = true;
			}else{
				$('#file_upload').uploadify('stop','*');
				$.tipMessage(data['info'], 1, 2000);
				upstatus = false;
			}
        },
        'onQueueComplete': function (data) { //当队列中的所有文件全部完成上传时触发
			if(upstatus){
				$.tipMessage('图片上传完毕！', 0, 2000);
			}
            $('#uploadInfo').html('成功上传的文件数: ' + data.uploadsSuccessful + ' - 上传出错的文件数: ' + data.uploadsErrored);
        }
    });
});
</script> 
<script type="text/javascript" src="{$config_siteurl}statics/js/swfobject.js"></script>
</body>
</html>