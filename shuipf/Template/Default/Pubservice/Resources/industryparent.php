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
					<volist  name="data['category']" id="vo">
					<li>
               			<!-- <img src="{$vo.picture}"  />
               			{$vo.name}
               			{$vo.description}
               			<a href="{:U('showlists',array('cid'=>$vo['cid']))}">查看详情</a> -->
						   <?php
						   		$imagesArray = explode(',',$vo['acrobatics_picture_url']);
						   ?>
           				<dl class="clearfix">
           					<!--<if condition="$vo['acrobatics_picture_url'] neq '' "><dt><img src="{$imagesArray[0]}" alt="{$vo.re_projectname}"></dt></if>
           					<dd>
							   <if condition="$vo['com_name'] neq '' ">
           						<h5>{$vo.com_name}</h5>
								   <a href="{:U('industryshow',array('id'=>$vo['id']))}">查看详情</a>
								   <else/>
								   <h5>{$vo.title}</h5>
           						 <p><span>简介：</span>{$vo.intro}</p> 
           						<a href="{:U('industryshow',array('id'=>$vo['id']))}">查看详情</a>
								   </if>
           					</dd>-->
							  <if condition="$vo['com_name'] neq '' "> <a href="{:U('industryshow',array('id'=>$vo['id']))}" style="color:black;" title="{$vo['com_name']}"><dt style="width:600px;"><h4><?php echo mb_strcut($vo['com_name'],0,95);?></h4></dt></a>
							  <else/>
							  <a href="{:U('industryshow',array('id'=>$vo['id']))}" style="color:black;" title="{$vo['title']}"><dt style="width:600px;"><h4><?php echo mb_strcut($vo['title'],0,95);?></h4></dt></a>
							  </if>
           					<dd style="float:right;">
           						
           						<!-- <p><span>简介：</span>{$vo.description}</p> -->
           						<a href="{:U('industryshow',array('id'=>$vo['id']))}">查看详情</a>
           					</dd>
           				</dl>
          			</li>
       				</volist>
           		</ul>
				</div>
			
			</div>
			<div class="page">
				{$pageinfo.page}
			</div>
			<template file="Pubservice/Common/_foot"/>
		</div>
	</body>

</html>