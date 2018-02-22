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
				
<!--				<div class="text-center" style="margin-bottom: 70px;">-->
<!--					<img src="{$config_siteurl}statics/cu/images/img/zyzgBanner.jpg" />-->
<!--				</div>-->
				<!-- <div class="text-center">
	               <img src="{$data.picture}" alt="{$data.name}"  />
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

				<div class="resocatetit">
					<!--<a class="on">戏曲</a>-->
					<volist  name="data['category']" id="vo">
							<if condition="$vo['is_parent'] eq '1'">
								<a class="<if condition='$key eq 0'>on</if>" href="{:U('immlists',array('cid'=>$vo['cid']))}" style="width:550px;">{$vo.name}</a>
							<else/>
								<a class="<if condition='$key eq 0'>on</if>" href="{:U('immparent',array('cid'=>$vo['cid']))}" style="width:550px;">{$vo.name}</a>
							</if>
						</if>
					</volist>

				</div>
			</div>
			<template file="Pubservice/Common/_foot"/>
		</div>
	</body>

<script>
	$(document).ready(function(){
	$(".ulsreso ul:first").show().siblings().hide();
});
	$(".resocatetit a").click(function(){
		$(this).addClass("on").siblings().removeClass("on");
		$(".ulsreso ul").eq($(this).index()).show().siblings().hide();
	})
</script>
</html>