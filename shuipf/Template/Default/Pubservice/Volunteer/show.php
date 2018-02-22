<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<!--<meta name="viewport" content="width=device-width, initial-scale=1">-->
		 <meta name= "viewport" content= "width=device-width" initial-scale="1" minimum-scale="1" maximum-scale="1">
		<!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
		<title>文化志愿者</title>

		<template file="Pubservice/Common/_cssjs"/>
		<link rel="stylesheet" href="{$config_siteurl}statics/cu/css/base.css" />
        <link rel="stylesheet" href="{$config_siteurl}statics/cu/css/pub-volunteer.css" />
		<style>
		.xmgsDetailRMain dl dd{text-indent:25px;margin:5px;}
		</style>
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
						<a href="{$config_siteurl}" class="link">首页</a>&nbsp;&nbsp;&nbsp;&nbsp;>&nbsp;&nbsp;&nbsp;&nbsp;
						<a href="{:U('Pubservice/Volunteer/index')}">文化志愿者</a>&nbsp;&nbsp;&nbsp;&nbsp;>&nbsp;&nbsp;&nbsp;&nbsp;
						<a href="###">招募信息</a>&nbsp;&nbsp;&nbsp;&nbsp;>&nbsp;&nbsp;&nbsp;&nbsp; 
						<a href="###">{$data.title}</a>&nbsp;&nbsp;&nbsp;&nbsp;>&nbsp;&nbsp;&nbsp;&nbsp; 
					</div>
				</div>
			</div>
			<div class="ggwh_Content" style="margin-top: 30px;">
				<div class="xmgsDetailLeft pull-left">
					<div class="top">
						<h3>目录</h3>
					</div>
					<ul class="ggwh_ZxList" style="padding: 5px;">
						<li class="active">
							<a href="#">招募简介</a>
						</li>
						<li>
							<a href="#">招募要求</a>
						</li>
						<li>
							<a href="{:U('Pubservice/Volunteer/recruit',['id'=>$data['id']])}"><h4>我要报名</h4></a>
						</li>
					</ul>
				</div>
				<div class="xmgsDetailRight pull-right activity-live">
					<div class="top">
						<span>{$data.title}</span>
					</div>
					<div class="xmgsDetailRMain" style="padding: 0px;">
						<!-- <img src="{$config_siteurl}statics/cu/images/public-service/whzyz_content03.jpg"> -->
						<h1>{$data.title}</h1>
						<p>{$data.intro}</p>
						<p>联系方式：{$data.contact}</p>
						<volist name="data['pic']" id="vo">
						<p><img src="{$vo}" alt=""></p>
						</volist>
					</div>
				</div>
				<div class="xmgsDetailRight pull-right" hidden>
					<div class="top">
						<span>招募要求</span>
					</div>
					<div class="xmgsDetailRMain">
						<dl>
							<dt>要求：{$data.condition}</dt>
							
							<dt>需求人数：{$data.totle}</dt>
							<!--<dd>{$data.totle}</dd>-->
							<dt>服务地点：{$data.addr}</dt>
							<!--<dd>{$data.addr}</dd>-->
							<dt>服务时间：{$data.time}</dt>
							<!--<dd>{$data.time}</dd>-->
						</dl>
					</div>
				</div>
				
			</div>
			<hr style="margin-top: 60px;" />
			<template file="Pubservice/Common/_foot"/>
		</div>
		<script type="text/javascript" src="{$config_siteurl}statics/cu/jquery/jquery.min.js"></script>
		<script type="text/javascript">
			$(document).ready(function(){
				$(".ggwh_ZxList li").find("a").on("click",function(){
					var index = $(this).parent("li").index();
					$(this).parent("li").addClass("active").siblings("li").removeClass("active");
					$(".xmgsDetailRight").eq(index).show().siblings(".xmgsDetailRight").hide();
				})
			})
		</script>
	</body>

</html>