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
           					
           					<dt style="width:600px;">
           						<a href="{:U('policyshow',array('id'=>$vo['id']))}" title="{$vo.publish_name}" style="color:black;"><h5><?php echo mb_strcut($vo['publish_name'],0,95);?></h5></a>
           						<p><span><if condition="$vo['publish_agency'] neq ''">{$vo.publish_agency}<else/>暂无信息</if>：</span><if condition="$vo['publish_topword'] neq '' ">{$vo.publish_topword}<else/>暂无信息</if></p>
           						
           					</dt>
							   <dd style="float:right;">
							   <a href="{:U('policyshow',array('id'=>$vo['id']))}">查看详情</a>
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
           					
           					<dd>
           						<h5>{$vo1.title}</h5>
           						<p><span>简介：</span>{$vo1.introduction}</p>
           						<a href="{:U('show',array('id'=>$vo1['id']))}">查看详情</a>
           					</dd>
           				</dl>
           			</li>
       				</volist>
   					</if>
           		</ul>
				</div>
			<div class="page">
				{$pageinfo.page}
			</div>
			</div>
			<template file="Pubservice/Common/_foot"/>
		</div>
	</body>

</html>