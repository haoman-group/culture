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
				
				<!--<div class="text-center" style="margin-bottom: 70px;">
					<img src="{$config_siteurl}statics/cu/images/img/zyzgBanner.jpg" />
				</div>-->
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
				<div class="title" style="padding-left: 20px;">{$data.name}展示</div>
				<div>
				<ul class="lists">
					<if condition="$data['category'] neq '' ">
					<volist  name="data['category']" id="vo">
					<li>
               			<!-- <img src="{$vo.picture}"  />
               			{$vo.name}
               			{$vo.description}
               			<a href="{:U('showlists',array('cid'=>$vo['cid']))}">查看详情</a> -->
           				<dl class="clearfix">
           					<dt><img src="{$data['picture'][0]}" alt="{$vo.name}"></dt>
           					<dd>
           						<h5><if condition="$vo['name'] neq '' ">{$vo.name}<else/>暂无信息</if></h5>
           						<p><span>简介：</span>{$vo.description}</p>
           						<a href="{:U('showlists',array('cid'=>$vo['cid']))}">查看详情</a>
           					</dd>
           				</dl>
          			</li>
       				</volist>
       				<else/>
       				<volist  name="data['category1']" id="vo1">
					<li>
               			<!-- <img src="{$vo.picture}"  />
               			{$vo.title}
               			{$vo.description}
               			<a href="{:U('show',array('id'=>$vo['id']))}">查看详情</a> -->
               			<dl class="clearfix">
           					<dt><img src="{$vo1['image']['0']}" alt="{$vo1.title}"></dt>
           					<dd>
           						<h5><if condition="$vo1['title'] neq '' ">{$vo1.title}<else/>暂无信息</if></h5>
           						<p><span>简介：</span>{$vo1.introduction}</p>
           						<a href="{:U('show',array('id'=>$vo1['id']))}">查看详情</a>
           					</dd>
           				</dl>
           			</li>
       				</volist>
   					</if>
           		</ul>
				</div>
			
			</div>
			<template file="Pubservice/Common/_foot"/>
		</div>
	</body>

</html>