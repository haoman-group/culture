<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>文化大数据库</title>
 <template file="Cudatabase/Common/_cssjs"/>
</head>
<body>  
    <template file="Cudatabase/Common/_head"/>
<!-- <div class="userinfo">
	<div class="user-c">欢迎 <span class="style01">test001</span> 登录文化大数据库！  <a href="dsjk-login.html">[退出]</a><a href="dsjkht-index.html">[进入后台]</a></div>
</div> -->
<div class="all" style="width: 1190px;margin: 0 auto">
    <div class="row openapilink">
        <div class="col-md-4 mod-process">
            <h3 class="mod-title">接入指南</h3>
            <ul class="list">
                <li><a href="" target="_blank" data-spm-anchor-id="a219a.7386781.3.2">接入指南</a></li>
                <li><a href="" target="_blank" data-spm-anchor-id="a219a.7386781.3.3">API权限申请指南</a></li>
                <li><a href="" target="_blank" data-spm-anchor-id="a219a.7386781.3.4">应用环境说明</a></li>
                <li><a href="" target="_blank" data-spm-anchor-id="a219a.7386781.3.5">开发异常排查说明</a></li>
                <li><a href="" target="_blank" data-spm-anchor-id="a219a.7386781.3.6">更多&gt;&gt;</a></li>
            </ul>
        </div>
        <div class="col-md-4 mod-doc">
            <h3 class="mod-title">基础技术</h3>
            <ul class="list">
                <li><a href="" target="_blank" data-spm-anchor-id="a219a.7386781.3.7">API协议</a></li>
                <li><a href="" target="_blank" data-spm-anchor-id="a219a.7386781.3.8">用户授权</a></li>
                <li><a href="" target="_blank" data-spm-anchor-id="a219a.7386781.3.9">SDK使用</a></li>
                <li><a href="" target="_blank" data-spm-anchor-id="a219a.7386781.3.10">消息服务</a></li>
                <li><a href="" target="_blank" data-spm-anchor-id="a219a.7386781.3.11">更多&gt;&gt;</a></li>
            </ul>
        </div>
        <div class="col-md-4 mod-rule mod-last">
            <h3 class="mod-title">数据共享</h3>
            <ul class="list">
                <li><a href="" target="_blank" data-spm-anchor-id="a219a.7386781.3.12">数据共享规则</a></li>
                <li><a href="" target="_blank" data-spm-anchor-id="a219a.7386781.3.13">应用运营规则</a></li>
                <li><a href="" target="_blank" data-spm-anchor-id="a219a.7386781.3.16">更多&gt;&gt;</a></li>
            </ul>
        </div>
    </div>

    <div class="apiiconrow">
        <h3 class="mod-title">开放数据</h3>
        <ul class="row icon-list">
            <li class="col-md-2"><a href="" target="_blank" data-spm-anchor-id="a219a.7386781.3.17"><i class="iconfont iconfont1" ></i> <br>文化艺术</a>
            </li> <li class="col-md-2"><a href="" target="_blank" data-spm-anchor-id="a219a.7386781.3.18"><i class="iconfont iconfont1" ></i> <br>公共艺术</a>
            </li>
            <li class="col-md-2"><a href="" target="_blank" data-spm-anchor-id="a219a.7386781.3.19"><i class="iconfont iconfont1" ></i> <br>非物质文化遗产</a>
            </li>
            <li class="col-md-2"><a href="" target="_blank" data-spm-anchor-id="a219a.7386781.3.20"><i class="iconfont iconfont1" ></i> <br>文化产业</a>
            </li>
            <li class="col-md-2"><a href="" target="_blank" data-spm-anchor-id="a219a.7386781.3.21"><i class="iconfont iconfont1" ></i> <br>文化政策</a>
            </li>

        </ul>
    </div>


    <div class="apiiconrow">
        <h3 class="mod-title">常用工具</h3>
        <ul class="row icon-list ulapitoolicon">
            <li class="col-md-2"><a href="" target="_blank" data-spm-anchor-id="a219a.7386781.3.17"><i class="iconfont iconfont1" ></i> <br>API测试工具</a>
            </li> <li class="col-md-2"><a href="" target="_blank" data-spm-anchor-id="a219a.7386781.3.18"><i class="iconfont iconfont1" ></i> <br>用户授权工具</a>
            </li>
            <li class="col-md-2"><a href="" target="_blank" data-spm-anchor-id="a219a.7386781.3.19"><i class="iconfont iconfont1" ></i> <br>速查手册</a>
            </li>
            <li class="col-md-2"><a href="" target="_blank" data-spm-anchor-id="a219a.7386781.3.21"><i class="iconfont iconfont1" ></i> <br>身份变更</a>
            </li>

        </ul>
    </div>
</div>
<div class="clr"></div>
<template file="Cudatabase/Common/_foot"/>
<script src="http://cdn.bootcss.com/jquery-cookie/1.4.1/jquery.cookie.js"></script>
<script type="text/javascript">
    (function($){
        var login_type = <?=$login_type?>;
        // console.log(login_type);
        if(login_type == 1){
            if( !$.cookie("message")){
                layer.open({
                    type: 1,
                    title: '消息',
                    shade: 0,
                    area: ['340px', '222px'],
                    offset: 'rb',
                    skin: 'message',
                    shift: 2,
                    content: '<div class="layer-tips">您有<span><?=$gtasks?></span>个文件需要审核，<a href="/admin">点击查看</a></div>',
                    success:function(){
                        var date = new Date();
                        date.setTime(date.getTime() + (30 * 60 * 1000));
                        $.cookie("message","info",{path:"/",expires: date});
                        // console.log(date);
                    }
                });   
            }
        }
    })(jQuery)
</script>
</body>
</html>
