<!DOCTYPE html>
<html lang="zh-cn">

	<head>
	<template file="Pubservice/Common/_cssjs"/>
	<link rel="stylesheet" href="{$config_siteurl}statics/cu/css/pub-resource.css" />
	<style>
	.ulresocelllist75{ overflow: hidden; font-size: 16px;}
	.ulresocelllist75 li{ float: left; width: 280px; height:60px; position: relative; margin-bottom: 10px; margin-right: 24px;}
	.ulresocelllist75 li img{ display: block; width: 100%; height: 314px;}
	.ulresocelllist75 li strong{ height: 60px; transition: all 0.5s; width: 100%; bottom: 0; position: absolute; background: rgba(0,0,0,0.6);left: 0; font-weight: normal; color: #fff; line-height: 60px; color: #fff; font-size: 22px; text-align: center;}
	.ulresocelllist75 li section{ position: absolute; transition: bottom 0.2s; opacity: 0; width: 100%; top: 0; bottom: 0; padding: 30px; color: #fff; line-height: 25px; background: rgba(0,0,0,0.5);}
	.ulresocelllist75 li a:hover strong{  background: #962626;}
	.ulresocelllist75 li:nth-of-type(4n){ margin-right: 0;}
	</style>
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
								<a class="on" href="###">代表性项目</a>
								<a class=""   href="###">代表性传承人</a>
						</if>
					</volist>
				</div>
				<div class="ulsreso">
						<ul class="ulresocelllist75" >
							<volist  name="data['category']" id="vo">
							<li>
								<a href="{:U('immparent',array('cid'=>$vo['cid'],'re_represen'=>'1'))}">
									<strong>{$vo.name}</strong>
								</a>
							</li>
							</volist>
						</ul>
						<ul class="ulresocelllist75" >
							<volist  name="data['category']" id="vo">
							<li>
								<a href="{:U('immparent',array('cid'=>$vo['cid'],'re_represen'=>'2'))}">
									<strong>{$vo.name}</strong>
								</a>
							</li>
							</volist>
						</ul>
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