<!DOCTYPE html>
<html>

	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<!--<meta name="viewport" content="width=device-width, initial-scale=1">-->
		<meta name= "viewport" content= "width=device-width" initial-scale="1" minimum-scale="1" maximum-scale="1">
		<!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
		<title>文化志愿者</title>
		<template file="Pubservice/Common/_cssjs"/>
        <link rel="stylesheet" href="{$config_siteurl}statics/cu/css/base.css" />
		
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
            <div id="nav">
                <div class="container">
                    <ul>
                        <li>
                            <a href="{$config_siteurl}" class="home_src">首页</a>
                        </li>
                        <li>
                            <span>></span>
                        </li>
                        <li>
                            <a href="">文化志愿者</a>
                        </li>
                        <li>
                            <span>></span>
                        </li>
                        <li>
                            <a href="">文化志愿者招募</a>
                        </li>

                    </ul>
                    <form action="" method="get" target="_blank">
								<input type="hidden" name="m" value="search"/>
								<input type="hidden" name="g" value="Pubservice"/>
								<input type="hidden" name="a" value="index"/>
                        <div class="searbox">
                            <input type="text" placeholder="输入您要搜索的关键词" value=""  name="kw"/>
                            <input type="submit" id="button" value="" class="ggwh_SearchBtn" style="border: none;float:right;width:40px;right:0px !important"><i style="color:#962626" class="fa fa-search"></i>
                        </div>

                    </form>
                </div>
            </div>
			<div class="ggwh_Content">
				<div class="whhdCategory" style="margin-bottom: 25px;">
					<div class="col-md-3 col-xs-5">
						<a href="{:U('Pubservice/Volunteer/index')}" class="whhdCategoryList active">文化志愿者招募</a>
					</div>
					<div class="col-md-3 col-xs-5">
						<a href="{:U('Pubservice/Volunteer/ser_activity')}" class="whhdCategoryList">文化志愿者培训</a>
					</div>
					<div class="col-md-3">
						<!-- <a href="{:U('Pubservice/Volunteer/ser_base')}" class="whhdCategoryList">文化志愿者服务基地</a> -->
					</div>
					<div class="col-md-3 col-xs-2 filtertogglebox">
						<a class="filtertogglebtn">显示筛选<i></i></a>
					</div>
				</div>
				<div  class="filterparas filterfold">
					<div class="sx">
						<div class="pull-left ggwh_SelectName" >市级：</div>
						<div class="a-box">
							<a href="{:U('Pubservice/Volunteer/ser_activity')}" class="on">全部</a>
							<volist name="cateinfo['city']" id="ci"><a rel="{$ci.name}" class="sx_child" href="javascript:;" name="city">{$ci.name}<if condition="$ci['name'] eq '省属'"><else/>市</if></a></volist>
						</div>
					</div>
					<div class="sx">
						<div class="pull-left ggwh_SelectName" >县级：</div>
						<div class="a-box">
							<a  href="{:U('Pubservice/Volunteer/ser_activity')}" class="on">全部</a>
							<volist name="cateinfo['county']" id="co"><a rel="{$co.name}" class="sx_child" href="javascript:;" name="county">{$co.name}</a></volist>
						</div>
					</div>
					<div class="sx">
						<div class="pull-left ggwh_SelectName" >馆站：</div>
						<div class="a-box">
							<a  href="{:U('Pubservice/Volunteer/ser_activity')}" class="on">全部</a>
							<volist name="cateinfo['type']" id="ty"><a rel="{$ty}" class="sx_child" href="javascript:;" name="type">{$ty}</a></volist>
						</div>
					</div>
				</div>
				<div class="row whhd_PxList">
					<volist name="data" id="vo">
					<div class="col-md-3 col-xs-6">
						<div class="whhd_PxListItem">
							<a class="img" href="#">
								<img src="<?= $vo['pic']['0']?$vo['pic']['0']:$config_siteurl.'statics/cu/images/public-service/whzyz_img01.jpg'?>" alt="" />
								<i>{$vo.update_time|date="Y.n.j",###}</i>
							</a>
							<h5><label for="" title='{$vo.title}'>{$vo.title}</label><span>（{$vo.yet}/{$vo.totle}人）</span></h5>
							<div>
								<label for="">简介：</label>
								<p>
								<span class="substr">{$vo.intro}</span>
								<a href="{:U('Pubservice/Volunteer/show',['id'=>$vo['id']])}">报名>></a>
								</p>
								<label for="">要求：</label>
								<p>{$vo.condition}</p>
								<label for="">地点：</label>
								<p>{$vo.addr}</p>
								<label for="">联系方式：</label>
								<p>{$vo.contact}</p>
							</div>							
						</div>
					</div>
					</volist>
				</div>

				<div class="page">
				{$page}
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
			$(".substr").each(function(){
				var str = $(this).text().substr(0,22) + '...';
				$(this).text(str);
			})


			$(".filtertogglebtn").click(function(){
				$(this).toggleClass("filtertogglebtnon");
				$(".filterparas").toggleClass("filterfold");
			})
		})
		</script>
	</body>

</html>