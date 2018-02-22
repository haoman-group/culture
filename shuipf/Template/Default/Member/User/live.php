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
  <div class="user_center">
    <template file="Member/Public/homeUserMenu.php"/>
    <div class="user_main">
      <div class="uMain_content">
        <div class="main_nav">
          <ul>
            <li class="modify"> <a class="on" href="###">个人中心</a> </li>
            <li class="modify"> <a class="on" href="{:U('Pubservice/Index/index')}">返回首页</a> </li>
          </ul>
        </div>
            <button class="btn" style="margin-left:15px;" onclick="javascript:start()" >开始直播</button>
            <button class="btn stop" onclick="javascript:stop()" style="display:none;" >关闭直播</button>
            <script src="//nos.netease.com/vod163/nePublisher.min.js"></script>
            <div id="live-content" style="margin:15px;">
                <div id="my-publisher"></div>
            </div>
            <script>
                var myPublisher = new nePublisher(
                'my-publisher', // String 必选 推流器容器id
                {   // Object 可选 推流初始化videoOptions参数
                    videoWidth: 640,    // Number 可选 推流分辨率 宽度 default 640
                    videoHeight: 480,   // Number 可选 推流分辨率 高度 default 480
                    fps: 15,            // Number 可选 推流帧率 default 15
                    bitrate: 600,       // Number 可选 推流码率 default 600
                    video: true,       // Boolean 可选 是否推流视频 default true
                    audio: true       // Boolean 可选 是否推流音频 default true
                }, { // Object 可选 推流初始化flashOptions参数
                    previewWindowWidth: 660,    // Number 可选 预览窗口宽度 default 862
                    previewWindowHeight: 486,   // Number 可选 预览窗口高度 default 446
                    wmode: 'transparent',       // String 可选 flash显示模式 default transparent
                    quality: 'high',            // String 可选 flash质量 default high
                    allowScriptAccess: 'always' // String 可选 flash跨域允许 default always
                }, function() {
                    /*
                        function 可选 初始化成功的回调函数
                        可在该回调中调用getCameraList和getMicroPhoneList方法获取 摄像头和麦克风列表*/
                        cameraList = this.getCameraList();
                        console.log(cameraList);
                        microPhoneList = this.getMicroPhoneList();
                        console.log(microPhoneList);
                    
                }, function(code, desc) {
                    /*
                        function 可选 初始化失败后的回调函数
                        @param code 错误代码
                        @param desc 错误信息
                        判断是否有错误代码传入检查初始化时是否发生错误
                        若有错误可进行相应的错误提示
                    */
            });
            </script>
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
<script>
    function start(){
        // $('#live-content').show();
        $(".stop").show();
        // $("#live-content").toggle();
        myPublisher.startPublish(
        'rtmp://p5677e48b.live.126.net/live/130f941c77f14df78ce3d0e48923e578?wsSecret=5712b7f3bd9ffb31602b7fd1e1e9d2f8&wsTime=1495505966', // String 必选 要推流的频道地址
        { // Object 可选 推流参数
            videoWidth: 640,    // Number 可选 推流分辨率 宽度 default 640
            videoHeight: 480,   // Number 可选 推流分辨率 高度 default 480
            fps: 15,            // Number 可选 推流帧率 default 15
            bitrate: 600,       // Number 可选 推流码率 default 600
            video: true,       // Boolean 可选 是否推流视频 default true
            audio: true       // Boolean 可选 是否推流音频 default true
        }, function(code, desc) {
            /*
                function 可选 推流过程中发生错误进行回调
                @param code 错误代码
                @param desc 错误信息
                判断是否有错误代码传入推流过程中是否发生错误
                若有错误可进行相应的错误提示
            */
            alert('发生错误:'+desc+"-"+code);
        });
    }
    function stop(){
        $(".stop").hide();
        // $("#live-content").toggle();
        myPublisher.stopPublish();
        window.location.reload();
        // $('#live-content').hide();
    }
</script>
</body>
</html>