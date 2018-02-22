<!DOCTYPE html>
<html lang="zh-cn">

	<head>
	<template file="Pubservice/Common/_cssjs"/>
	<link rel="stylesheet" href="{$config_siteurl}statics/cu/css/pub-resource.css" />
	</head>

	<body>
		<div class="wrap">
				<template file="Pubservice/Common/_head"/>
			<div class="ggwh_Content">
				
				<div class="text-center" style="margin-bottom: 70px;">
					<img src="{$config_siteurl}statics/cu/images/img/zyzgBanner.jpg" />
				</div>
				<!-- <div class="text-center">
               <img src="{$data.picture}"  />
               {$data.name}
               {$data.description}
				</div> -->
				<div class="hotNews">
					<dl class="clearfix">
						<dt><img src="{$data.picture}" alt="{$data.name}"  /></dt>
						<dd>
							<h5>{$data.name}</h5>
							<p>{$data.description}</p>
						</dd>
					</dl>
				</div>
				<div class="title" style="padding-left: 20px;">{$data.name}推荐</div>
				<div>
					<ul class="lists">
						<volist  name="lists" id="vo">
						<li>
	               			<!-- <img src="{$vo.picture}" />
	               			{$vo.title}
	               			{$vo.introduction}
	               			<a href="{:U('show',array('id'=>$vo['id']))}">查看详情</a> -->
	               			<dl class="clearfix">

	               				<dt><img src="{$vo['image'][0]}" alt="{$vo.name}"></dt>


	               				<dd>
	               					<h5>{$vo['title']}</h5>
	               					<p><span>简介：</span>{$vo.introduction}</p>
	               					<a href="{:U('show',array('id'=>$vo['id']))}">查看详情</a>
	               				</dd>
	               			</dl>
	           			</li>
	       				</volist>
	           		</ul>
				</div>
			
			</div>
			<template file="Pubservice/Common/_foot"/>
		</div>
	</body>

</html>