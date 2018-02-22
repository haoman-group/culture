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
		<link rel="stylesheet" href="{$config_siteurl}statics/cu/css/pub-volunteer.css" />
		<link rel="stylesheet" href="{$config_siteurl}statics/cu/css/base.css" />
		<!--分类选择插件-->
		<script type="text/javascript" src="{$config_siteurl}statics/cu/js/category_select.js"></script>
	</head>

	<body>
		<div class="wrap">
			<template file="Pubservice/Common/_head"/>
				<div id="nav">
					<div class="container">
						<ul>
							<li>
								<a href="{$config_siteurl}" class="home_src">首页</a>
							</li>
							<li><span>></span></li>
							<li>
								<a href="javascript:;">基本项目服务公示</a>
							</li>

						</ul>
						<form action="" method="get" target="_blank">
								<input type="hidden" name="m" value="search"/>
								<input type="hidden" name="g" value="Pubservice"/>
								<input type="hidden" name="a" value="index"/>
							<div class="searbox">
								<input type="text" placeholder="" value="" name="kw"/>
								<input type="submit" id="button" value="" class="ggwh_SearchBtn" style="border: none;float:right;width:40px;right:0px !important"><i style="color:#962626" class="fa fa-search"></i>
							</div>

						</form>
					</div>
				</div>



				<div class="ggwh_Content" style="margin-top: 25px;">
					<div class=" filtertogglebox" style=" text-align: right; padding-bottom: 10px;">
						<a class="filtertogglebtn">显示筛选<i></i></a>
					</div>
					<div class=" filterparas filterfold">
						<div class="sx">
							<div class="pull-left ggwh_SelectName" >市级：</div>
							<div class="a-box">
								<a href="{:U('Pubservice/Baseservices/index')}" class="on">全部</a>
								<volist name="cateinfo['city']" id="ci"><a rel="{$ci.name}" class="sx_child" href="javascript:;" name="city">{$ci.name}市</a></volist>
							</div>
						</div>
						<div class="sx">
							<div class="pull-left ggwh_SelectName" >县级：</div>
							<div class="a-box">
								<a  href="{:U('Pubservice/Baseservices/index')}" class="on">全部</a>
								<volist name="cateinfo['county']" id="co"><a rel="{$co.name}" class="sx_child" href="javascript:;" name="county">{$co.name}</a></volist>
							</div>
						</div>
						<div class="sx">
							<div class="pull-left ggwh_SelectName" >馆站：</div>
							<div class="a-box">
								<a  href="{:U('Pubservice/Baseservices/index')}" class="on">全部</a>
								<volist name="cateinfo['type']" id="ty"><a rel="{$ty}" class="sx_child" href="javascript:;" name="type">{$ty}</a></volist>
							</div>
						</div>
					</div>
				</div>

			<div class="ggwh_Content" style="margin-top: 25px;">

				<div class="whhdCategory2">
					<div class="pull-left ggwh_SelectName">排序：</div>
					<ul class="pull-left ggwh_SelectUl">
						<li class="choose">
							<a href="#"><span>全部</span></a>
						</li>
						<li>
							<a href="#"><span>好评</span><span class="icon-arrow-down"></span></a>
						</li>
						<li>
							<a href="#"><span>发布时间</span><span class="icon-arrow-down"></span></a>
						</li>
						<li>
							<a href="#"><span>参与方式</span></a>
						</li>
					</ul>
					<div class="clearfix"></div>
				</div>
				<div class="abc">
				<!-- 文化志愿者协会 -->
					<div class="row ggwh_Xmgs_List dis_one" style="margin-top: 30px;">
						<volist name="pageinfo['data']" id="vo">
							<div class="col-md-3 " style="height: 366px;">
								<div class="ggwh_Xmgs_ListItem">
									<img src="{$vo.cover}" />
									<h4>{$vo.project_title}</h4>
									<p>开馆时间1：{$vo.business_hours}</p>
									<p class="indent">{$vo.closing_hours}</p>
									<p>更新时间1：<?php $date = new Datetime($vo['updatetime']);echo $date->format('Y-m-d');?></p>
									<a class="check" href="{:U('Pubservice/Baseservices/show',array('id'=>$vo['id']))}">查看详情1 >></a>
								</div>

							</div>
						</volist>
					</div>
					<!-- 文化志愿者服务活动 -->
					<div class="row ggwh_Xmgs_List dis_none" style="margin-top: 30px;">
						<volist name="pageinfo['data']" id="vo">
							<div class="col-md-3 " style="height: 366px;">
								<div class="ggwh_Xmgs_ListItem">
									<img src="{$vo.cover}" />
									<h4>{$vo.project_title}</h4>
									<p>开馆时间2：{$vo.business_hours}</p>
									<p class="indent">{$vo.closing_hours}</p>
									<p>更新时间2：<?php $date = new Datetime($vo['updatetime']);echo $date->format('Y-m-d');?></p>
									<a class="check" href="{:U('Pubservice/Baseservices/show',array('id'=>$vo['id']))}">查看详情2 >></a>
								</div>

							</div>
						</volist>
					</div>
					<!-- 文化志愿者服务基地 -->
					<div class="row ggwh_Xmgs_List dis_none" style="margin-top: 30px;">
						<volist name="pageinfo['data']" id="vo">
							<div class="col-md-3 " style="height: 366px;">
								<div class="ggwh_Xmgs_ListItem">
									<img src="{$vo.cover}" />
									<h4>{$vo.project_title}</h4>
									<p>开馆时间3：{$vo.business_hours}</p>
									<p class="indent">{$vo.closing_hours}</p>
									<p>更新时间3：<?php $date = new Datetime($vo['updatetime']);echo $date->format('Y-m-d');?></p>
									<a class="check" href="{:U('Pubservice/Baseservices/show',array('id'=>$vo['id']))}">查看详情3 >></a>
								</div>

							</div>
						</volist>
					</div>

				</div>




				<div class="ggwh_page">{$pageinfo.page}</div>
				<!--<div class="ggwh_page">每页10条 共32页
					<a>上一页</a>
					<a>1</a>
					<a class="choose">2</a>
					<a>3</a>
					<a>4</a>
					<a>下一页</a>
				</div>-->
				<!-- <hr /> -->
			</div>
			
		<template file="Pubservice/Common/_foot"/>
		</div>
	</body>
<script type="text/javascript">
$('.sx').sx({
	nuv:".zj",//筛选结果
	zi:"sx_child",//所有筛选范围内的子类
	qingchu:'.qcqb',//清除全部
	over:'on'//选中状态样式名称
});
$('.content_top ul li p').click(function(){
	$(this).addClass('span_color').siblings().removeClass();
	$('.abc .ggwh_Xmgs_List').eq($(this).index()).show().siblings('.abc .ggwh_Xmgs_List').hide();
})

	$(function(){
		$(".filtertogglebtn").click(function(){
			$(this).toggleClass("filtertogglebtnon");
			$(".filterparas").toggleClass("filterfold");
		})
	})
</script>
</html>