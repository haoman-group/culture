<!DOCTYPE html>
<html>

	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<!--<meta name="viewport" content="width=device-width, initial-scale=1">-->
		<meta name= "viewport" content= "width=device-width" initial-scale="1" minimum-scale="1" maximum-scale="1">
		<!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
		<title>艺术品鉴赏</title>

		<template file="Pubservice/Common/_cssjs"/>
		<link rel="stylesheet" href="{$config_siteurl}statics/cu/css/pub-volunteer.css" />
		<link rel="stylesheet" href="{$config_siteurl}statics/cu/css/pub-volunteer_recruit.css" />
		<link rel="stylesheet" href="{$config_siteurl}statics/cu/css/recruit_show.css" />
		<link rel="stylesheet" href="{$config_siteurl}statics/cu/css/appreciate_index.css" /> 
		<link rel="stylesheet" href="{$config_siteurl}statics/js/viewer/viewer.min.css"/>
		<style>
		a:hover {color: inherit ;}
		a:link,a:visited {color: #666;text-decoration: none;}
		a img {border: 0;}
		a:link {text-decoration: none;}
		a:visited {text-decoration: none;}
		a:hover {text-decoration: none !important;}
		a:active {text-decoration: none;}
		.back_dd a:visited {text-decoration: none;color:#FFF;}
		</style>
		<script language="Javascript"> 
			document.oncontextmenu=new Function("event.returnValue=false"); 
			document.onselectstart=new Function("event.returnValue=false"); 
		</script> 
				<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
      <script src="//cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="//cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
	</head>

	<body>
		<div class="wrap">
			<template file="Pubservice/Common/_head"/>
			<div class="stepBar">
				<div class="ggwh_Content">
					<div class="stepBarMain">
						<a href="{:U('Pubservice/Index/index')}" class="link">首页</a>&nbsp;&nbsp;&nbsp;&nbsp;>&nbsp;&nbsp;&nbsp;&nbsp;
						<a href="{:U('Pubservice/Appreciate/index')}">艺术品鉴赏</a>
						<!--&nbsp;&nbsp;&nbsp;&nbsp;>&nbsp;&nbsp;&nbsp;&nbsp;-->
						<!--<a href="">参观预约</a>-->
					</div>
				</div>
			</div>
			<!-- 表单内容 -->
			<div class="shaixuan">
				<dl>
					<dt><span style="letter-spacing:1em;">类</span>别&nbsp;:</dt>
					<dd <empty name="Think.get.cid">class="back_dd" style="color:#FFF;" </empty>><a href="{:U('index')}">全部</a></dd>
					<volist name="category" id="ca">
					<dd  <if condition="$ca['cid'] eq $_GET['cid']">class="back_dd" style="color:#FFF;"</if>><a href="{:U('index',['cid'=>$ca['cid']])}">{$ca.name}</a></dd>
					</volist>
					<!--<dd>玉器</dd>
					<dd>竹刻</dd>-->
					<!--<dd class="back_dd">青铜</dd>
					<dd>书法</dd>
					<dd>瓷器</dd>
					<dd>绘画</dd>
					<dd>科举</dd>-->
					<br>
					<!--<dt>专题展&nbsp;:</dt>

					<dd>全部</dd>
					<dd>科举博物馆字画展</dd>
					<dd>张碧寒字画展</dd>
					<dd>历代书画展</dd>
					<dd>韩天衡精品印章展</dd>
					<dd>其他</dd>
					-->
				</dl>
			</div>	
			<div class="ggwh_Content recruit_content recruit_show_content" style="margin-top: 30px;padding-bottom: 20px">
				<ul class="itemlist">
					<volist name="data" id="vo">
					<?php $images = explode(",",$vo['image']);?>
					<li class="item">
						<div style="height:230px" class="viewer">
						<volist name="images" id="img">
							<img data-original="{$img}" alt="" <if condition="$key eq 0">style="display: block" src="{:thumb($img,270,230)}"<else/>style="display: none" src=""</if> >
						</volist>
						</div>
						<h5>{$vo.title}</h5>
						<p>{$vo.introduction|mb_substr=###,0,12,'utf-8'}</p>
					</li>
					</volist>
				</ul>
	
			</div><div class="page">
				{$page}
			</div>
			<hr style="margin-top: 60px;" />
			<template file="Pubservice/Common/_foot"/>
		</div>
		<script type="text/javascript" src="{$config_siteurl}statics/cu/jquery/jquery.min.js"></script>
		<script type="text/javascript" src="{$config_siteurl}statics/js/viewer/viewer.min.js"></script>
		<script type="text/javascript">
			$(document).ready(function(){
				$(".ggwh_ZxList li").find("a").on("click",function(){
					var index = $(this).parent("li").index();
					$(this).parent("li").addClass("active").siblings("li").removeClass("active");
					$(".xmgsDetailRight").eq(index).show().siblings(".xmgsDetailRight").hide();
				})
			})
		</script>
		<script type="text/javascript">
			$('.viewer').viewer({url:"data-original"});
		</script>		
	</body>

</html>