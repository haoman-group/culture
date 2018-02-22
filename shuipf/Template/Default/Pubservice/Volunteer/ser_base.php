<!DOCTYPE html>
<html>

	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
		<title>文化志愿者</title>

		<template file="Pubservice/Common/_cssjs"/>
		<link rel="stylesheet" href="{$config_siteurl}statics/cu/css/pub-volunteer.css" />
		<!--分类选择插件-->
		<script type="text/javascript" src="{$config_siteurl}statics/cu/js/category_select.js"></script>
		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
      <script src="//cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="//cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
	</head>

	<body>
		<div class="wrap">
			<template file="Pubservice/Common/_head"/>
			<div class="stepBar">
				<div class="ggwh_Content">
					<div class="stepBarMain">
						<a href="{$config_siteurl}" class="link">首页</a>&nbsp;&nbsp;&nbsp;&nbsp;>&nbsp;&nbsp;&nbsp;&nbsp;
						<a href="{:U('Pubservice/Volunteer/index')}">文化志愿者</a>&nbsp;&nbsp;&nbsp;&nbsp;>&nbsp;&nbsp;&nbsp;&nbsp;文化志愿者服务基地

						<div class="col-md-4  pull-right">
							<form action="" method="get" target="_blank">
								<input type="hidden" name="m" value="search"/>
								<input type="hidden" name="g" value="Pubservice"/>
								<input type="hidden" name="a" value="index"/>
								<div class="searbox">
									<input type="text" placeholder="输入您要搜索的关键词" value=""  name="kw"/>
									<input type="submit" id="button" value="" class="ggwh_SearchBtn" style="border: none;float:right;width:40px;right:0px !important"><i  style="color:#962626" class="fa fa-search"></i>
								</div>

							</form>
						</div>

						<div class="col-md-4  pull-right  mhSearch" style="margin-top: 10px;">
							<div class="col-md-4">
								<select class="form-control">
									<option>搜索类别</option>
								</select>
							</div>
							<div class="col-md-8" style="position: relative;">
								<input class="form-control ggwh_Search" placeholder="输入您要搜索的关键词" />
								<a href="#" class="ggwh_SearchBtn"></a>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="ggwh_Content">
				<div class="whhdCategory" style="margin-bottom: 25px;">
					<div class="col-md-3">
						<a href="{:U('Pubservice/Volunteer/index')}" class="whhdCategoryList">文化志愿者协会</a>
					</div>
					<div class="col-md-3">
						<a href="{:U('Pubservice/Volunteer/ser_activity')}" class="whhdCategoryList">文化志愿者服务活动</a>
					</div>
					<div class="col-md-3">
						<a href="{:U('Pubservice/Volunteer/ser_base')}" class="whhdCategoryList active">文化志愿者服务基地</a>
					</div>
					<div class="col-md-3 filtertogglebox">
						<a class="filtertogglebtn">显示筛选<i></i></a>
					</div>
				</div>
				<div  class="filterparas filterfold">
					<div class="sx">
						<div class="pull-left ggwh_SelectName" >市级：</div>
						<div class="a-box">
							<a href="{:U('Pubservice/Volunteer/ser_base')}" class="on">全部</a>
							<volist name="cateinfo['city']" id="ci"><a rel="{$ci.name}" class="sx_child" href="javascript:;" name="city">{$ci.name}市</a></volist>
						</div>
					</div>
					<div class="sx">
						<div class="pull-left ggwh_SelectName" >县级：</div>
						<div class="a-box">
							<a  href="{:U('Pubservice/Volunteer/ser_base')}" class="on">全部</a>
							<volist name="cateinfo['county']" id="co"><a rel="{$co.name}" class="sx_child" href="javascript:;" name="county">{$co.name}</a></volist>
						</div>
					</div>
					<div class="sx">
						<div class="pull-left ggwh_SelectName" >馆站：</div>
						<div class="a-box">
							<a  href="{:U('Pubservice/Volunteer/ser_base')}" class="on">全部</a>
							<volist name="cateinfo['type']" id="ty"><a rel="{$ty}" class="sx_child" href="javascript:;" name="type">{$ty}</a></volist>
						</div>
					</div>
				</div>
				<div class="row whhd_PxList">
					<div class="col-md-3">
						<div class="whhd_PxListItem">
							<img src="{$config_siteurl}statics/cu/images/public-service/whzyz_img01.jpg" alt="" />
							<h5>山西志愿者服务基地</h5>
							<div>
								<label for="">简介：</label>
								<p class="substr">村民不论男女老少都聚集村，广男女老少都男女老少都聚集村聚，男女老少都聚集村集村场活动中心，由全县50余名文艺志愿者组织的一组</p>
								<a href="{:U('Pubservice/Volunteer/show3')}">报名>></a>
							</div>
							
						</div>
					</div>
					<div class="col-md-3">
						<div class="whhd_PxListItem">
							<img src="{$config_siteurl}statics/cu/images/public-service/whzyz_img01.jpg" alt="" />
							<h5>山西志愿者服务基地</h5>
							<div>
								<label for="">简介：</label>
								<p class="substr">村民不论男女老少都聚集村，广男女老少都男女老少都聚集村聚，男女老少都聚集村集村场活动中心，由全县50余名文艺志愿者组织的一组</p>
								<a href="{:U('Pubservice/Volunteer/show3')}">报名>></a>
							</div>
							
						</div>
					</div>
					<div class="col-md-3">
						<div class="whhd_PxListItem">
							<img src="{$config_siteurl}statics/cu/images/public-service/whzyz_img01.jpg" alt="" />
							<h5>山西志愿者服务基地</h5>
							<div>
								<label for="">简介：</label>
								<p class="substr">村民不论男女老少都聚集村，广男女老少都男女老少都聚集村聚，男女老少都聚集村集村场活动中心，由全县50余名文艺志愿者组织的一组</p>
								<a href="{:U('Pubservice/Volunteer/show3')}">报名>></a>
							</div>
							
						</div>
					</div>
					<div class="col-md-3">
						<div class="whhd_PxListItem">
							<img src="{$config_siteurl}statics/cu/images/public-service/whzyz_img01.jpg" alt="" />
							<h5>山西志愿者服务基地</h5>
							<div>
								<label for="">简介：</label>
								<p class="substr">村民不论男女老少都聚集村，广男女老少都男女老少都聚集村聚，男女老少都聚集村集村场活动中心，由全县50余名文艺志愿者组织的一组</p>
								<a href="{:U('Pubservice/Volunteer/show3')}">报名>></a>
							</div>
							
						</div>
					</div>

					<div class="col-md-3">
						<div class="whhd_PxListItem">
							<img src="{$config_siteurl}statics/cu/images/public-service/whzyz_img01.jpg" alt="" />
							<h5>山西志愿者服务基地</h5>
							<div>
								<label for="">简介：</label>
								<p class="substr">村民不论男女老少都聚集村，广男女老少都男女老少都聚集村聚，男女老少都聚集村集村场活动中心，由全县50余名文艺志愿者组织的一组</p>
								<a href="{:U('Pubservice/Volunteer/show3')}">报名>></a>
							</div>
							
						</div>
					</div>
					<div class="col-md-3">
						<div class="whhd_PxListItem">
							<img src="{$config_siteurl}statics/cu/images/public-service/whzyz_img01.jpg" alt="" />
							<h5>山西志愿者服务基地</h5>
							<div>
								<label for="">简介：</label>
								<p class="substr">村民不论男女老少都聚集村，广男女老少都男女老少都聚集村聚，男女老少都聚集村集村场活动中心，由全县50余名文艺志愿者组织的一组</p>
								<a href="{:U('Pubservice/Volunteer/show3')}">报名>></a>
							</div>
							
						</div>
					</div>
					<div class="col-md-3">
						<div class="whhd_PxListItem">
							<img src="{$config_siteurl}statics/cu/images/public-service/whzyz_img01.jpg" alt="" />
							<h5>山西志愿者服务基地</h5>
							<div>
								<label for="">简介：</label>
								<p class="substr">村民不论男女老少都聚集村，广男女老少都男女老少都聚集村聚，男女老少都聚集村集村场活动中心，由全县50余名文艺志愿者组织的一组</p>
								<a href="{:U('Pubservice/Volunteer/show3')}">报名>></a>
							</div>
							
						</div>
					</div>
					<div class="col-md-3">
						<div class="whhd_PxListItem">
							<img src="{$config_siteurl}statics/cu/images/public-service/whzyz_img01.jpg" alt="" />
							<h5>山西志愿者服务基地</h5>
							<div>
								<label for="">简介：</label>
								<p class="substr">村民不论男女老少都聚集村，广男女老少都男女老少都聚集村聚，男女老少都聚集村集村场活动中心，由全县50余名文艺志愿者组织的一组</p>
								<a href="{:U('Pubservice/Volunteer/show3')}">报名>></a>
							</div>
							
						</div>
					</div>
				</div>

				<div class="ggwh_page">每页10条 共32页
					<a>上一页</a>
					<a>1</a>
					<a class="choose">2</a>
					<a>3</a>
					<a>4</a>
					<a>下一页</a>
				</div>
				<hr />
			</div>
			<template file="Pubservice/Common/_foot"/>
		</div>
		<script type="text/javascript">
		$('.sx').sx({
			nuv:".zj",//筛选结果
			zi:"sx_child",//所有筛选范围内的子类
			qingchu:'.qcqb',//清除全部
			over:'on'//选中状态样式名称
		});

		$(document).ready(function(){
			var str = $(".substr").text().substr(0,37) + '...';
			$(".substr").text(str);

			$(".filtertogglebtn").click(function(){
				$(this).toggleClass("filtertogglebtnon");
				$(".filterparas").toggleClass("filterfold");
			})
		})
		</script>
	</body>

</html>