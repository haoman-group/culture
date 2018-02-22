<!DOCTYPE html>
<html lang="zh-cn">

	<head>
		<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
	<title>公共文化</title>
	<template file="Pubservice/Common/_cssjs"/>
	<link rel="stylesheet" href="{$config_siteurl}statics/cu/css/pub-volunteer.css" />
	<link rel="stylesheet" href="{$config_siteurl}statics/cu/css/pub-resource.css" />
    <style>
		.indexMap {
			position: absolute;
			visibility: hidden;
			width: 100%;
		}
	</style>
	</head>

	<body>
		<div class="wrap">
			<template file="Pubservice/Common/_head"/>
			<div class="ggwh_Content">

				

				<div class="text-center" style="margin-bottom: 70px;">
					<img src="{$config_siteurl}statics/cu/images/img/zyzgBanner.jpg" />
				</div>
				<div class="source-index">
					<volist name="data" id="vo">
						<dl>
							<dt>{$vo.name}</dt>
                         <volist name="vo['child']" id="wo">

                           <dd>
                           	<if condition="($wo['parent_cid'] eq 2) or ($wo['parent_cid'] eq 6)">
                           		<a href="{:U('lists',array('cid'=>$wo['cid']))}">
                           			<else/>
                           			<a href="###">
                           		</if>
                           			<div class="img"><img src="{$wo.picture}" alt=""></div>
                           			<p class="title">{$wo.name}</p>
                           		</a>
                           	</dd>
                         </volist>
						</dl>
					</volist>
				</div>

			</div>
			<template file="Pubservice/Common/_foot"/>
		</div>
	</body>

</html>