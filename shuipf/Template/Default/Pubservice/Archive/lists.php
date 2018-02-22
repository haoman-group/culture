<!DOCTYPE html>
<html>

	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
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
                            <a href="{:U('index')}">艺术档案馆</a>
                        </li>
                        <li>
                            <span>></span>
                        </li>
                        <li>
                            <a href="###">{$categoryname}</a>
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
				<volist name="category" id="vo">
					<div class="col-md-3" style="width:20%;">
						<a href="{:U('Pubservice/Archive/lists',array('category'=>$key))}" <if condition="($_GET['category'] eq $key)  "> class="whhdCategoryList active" <else/> class="whhdCategoryList " </if>>{$vo}募</a>
					</div>
                     </volist>
					<!--<div class="col-md-3 filtertogglebox">
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
				</div>-->
				<div class="row whhd_PxList" style="width:1190px;">
					<volist name="data" id="vo">
					<div class="col-md-3">
						<div class="whhd_PxListItem" style="min-height:273px;">
							<a class="img" href="{:U('Pubservice/Archive/show',['id'=>$vo['id']])}">
								<img src="<?= thumb($vo['image']['0'],255,170)?>" alt="" />
								<i>{$vo.updatetime|date="Y.n.j",###}</i>
							</a>
							
							<div style="height:50px;">
								<label for="">档案简介：</label>
								<p style="display:block;">
								<span class="substr"><?php echo mb_strcut($vo['intro'],0,50);?></span>
								
								</p>
								
							</div>		
							<a style="display:block;float:right;color:#93262b;" href="{:U('Pubservice/Archive/show',['id'=>$vo['id']])}">查看详情>></a>					
						</div>
					</div>
					</volist>
				</div>

				<div class="page">
				{$pageinfo.page}
				</div>
				<hr />
			</div>
			
		</div>
		<template file="Pubservice/Common/_foot"/>
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