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
           				<dl class="clearfix">
           					<a href="{:U('immshow',array('id'=>$vo['id']))}" style="color:black;" title="{$vo['re_projectname']}"><dt style="width:600px;"><h4><?php echo mb_strcut($vo['re_projectname'],0,95);?></h4></dt></a>
           					<dd style="float:right;">
           						
           						<!-- <p><span>简介：</span>{$vo.description}</p> -->
           						<a href="{:U('immshow',array('id'=>$vo['id']))}">查看详情</a>
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