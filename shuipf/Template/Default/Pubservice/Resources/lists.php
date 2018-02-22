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
						<if condition="$data['cid'] eq '43'">
							<a class="<if condition='$key eq 0'>on</if>" href="{:U('Facility/show',array('id'=>$vo['id'],'tablename'=>'Library'))}">{$vo.name}</a>
						<elseif condition="$data['cid'] eq '44'"/>
							<a class="<if condition='$key eq 0'>on</if>" href="{:U('Facility/show',array('id'=>$vo['id'],'tablename'=>'Comartcenter'))}">{$vo.cac_name}</a>
						<elseif condition="$data['cid'] eq '346'"/>
							<a class="<if condition='$key eq 0'>on</if>" href="{:U('Resources/theatreshow',array('id'=>$vo['id']))}">{$vo.title}</a>
						<else/>
							<a class="<if condition='$key eq 0'>on</if>" href=<empty name="vo['child']">"{:U('parentlists',array('cid'=>$vo['cid']))}"<else/>{:U('lists',array('cid'=>$vo['cid']))}</empty>>{$vo.name}</a>
						</if>
					</volist>

				</div>
				<!--<div class="title" style="padding-left: 20px;"><if condition="($data['name'] eq '图书馆' ) or ($data['name'] eq '群艺馆' ) ">{$data.name}推荐<else/>{$data.name}分类</if></div>-->
				<!-- <div class="ulsreso">
					<volist  name="data['category']" id="vo">
						<ul class="ulresocelllist" >
							<volist name="vo['child']" id="voo">
							<li>
								<a href="{:U('parentlists',array('cid'=>$voo['cid']))}">
									<img src="{$voo.picture}">
									<section><if condition="($voo['tabname'] eq 'Comartcenter' ) or ($voo['tabname'] eq 'Library' )">{$voo.abstract}<else/>{$voo.description}</if></section>
									<strong>{$voo.name}</strong>
								</a>
							</li>
							</volist>
						</ul>
					</volist>
				</div>		 -->
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