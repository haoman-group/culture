<!DOCTYPE html>
<html>

	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<!--<meta name="viewport" content="width=device-width, initial-scale=1">-->
		 <meta name= "viewport" content= "width=device-width" initial-scale="1" minimum-scale="1" maximum-scale="1">
		<!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
		<title>基本服务项目公示</title>
		<template file="Pubservice/Common/_cssjs"/>
	</head>

	<body>
		<div class="wrap">
			<template file="Pubservice/Common/_head"/>
			<div class="stepBar">
				<div class="ggwh_Content">
					<div class="stepBarMain">
						<a href="{$config_siteurl}" class="link">首页</a>&nbsp;&nbsp;&nbsp;&nbsp;>&nbsp;&nbsp;&nbsp;&nbsp;
						<a class="link2" href="{:U('Pubservice/Facility/index',array('city'=>'太原','type'=>'图书馆'))}">公共文化设施</a>&nbsp;&nbsp;&nbsp;&nbsp;>&nbsp;&nbsp;&nbsp;&nbsp;{$data.project_title}
					</div>
				</div>
			</div>
			<div class="ggwh_Content" style="margin-top: 30px;">
				<div class="xmgsDetailLeft pull-left">
					<div class="top">
						<h3>目录</h3>
					</div>
					<div class="tab-wrapper pignose-tab-wrapper pignose-tab-wrapper-root">
					<ul class=" pignose-tab-group ggwh_ZxList" style="padding: 5px;position: static">
						<volist name="data['Content']" id ="vo">
						<li class="<if condition='$key eq 0'>active</if> pignose-tab-list ggwh_left_list" >
							<a href="#" class="pignose-tab-btn <if condition='$key eq 0'>active</if>">{$vo.content_title}</a>
							<div class="xmgsDetailRight pull-right pignose-tab-container <if condition='$key eq 0'>active</if>" style="padding: 0;left: 25%;">
								<div class="top1">
									<span>{$vo.content_title}</span>
								</div>
								<div class="xmgsDetailRMain">
									<h3 class="text-center">{$vo.content_title}</h3>
									{$vo.content}
								</div>
							</div>
						</li>
						</volist>
					</ul>
					</div>
				</div>
				<!---->
			</div>
			<template file="Pubservice/Common/_foot"/>
		</div>
	</body>
	<script>

	//<![CDATA[
	$(function() {
		$('.tab-wrapper').pignoseTab({
			animation: true,
			children: '.tab-wrapper'
		});

		// This use for DEMO page tab component.
		// $('.menu .item').tab();
	});
	//]]>
	
	</script>
<link rel="stylesheet" href="{$config_siteurl}statics/cu/pignose/css/pignose.tab.min.css"/>
<link rel="stylesheet" href="{$config_siteurl}statics/cu/pignose/css/pignose.cu.css"/>
<script type="text/javascript" src="{$config_siteurl}statics/cu/pignose/js/pignose.tab.js"></script>
</html>