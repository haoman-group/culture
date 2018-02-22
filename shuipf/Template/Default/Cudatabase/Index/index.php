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
	<template file="Cudatabase/Common/_left"/>
    <div class="right-c">
    	<div class="ht" style="color:#FFF;"> {$breadcrumb}</div>
        <div class="right-main">
        	<div>
        		<div class="right-main1" style="width:900px">
                    <volist name="data" id="vo">
        			<div class="right-infor">
        				<div class="right-inforT x{$key}">
        					<div class="right-inforT1 x{$key}">{$vo.name}<span class="pull-right right-inforT1R" >{$vo.total_num}</span></div>
        				</div>
        				<div class="right-inforC">
        					<ul>
                                <volist name="vo['child']" id="wo">
                                  <li style="width:135px;"><a href="{:U('lists',array('cid'=>$wo['cid']))}">{$wo.name}</a>（{$wo.total_num}）</li>
                                </volist>
                            </ul>
                            <div class="clearfix"></div>
        				</div>
        			</div>
                </volist>
        		</div>
        	<template file="Cudatabase/Common/_chart"/>
        	</div>
        	<div class="clearfix"></div>
			<!-- <template file="Cudatabase/Common/_chart"/> -->
        	</div>
        </div>
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
