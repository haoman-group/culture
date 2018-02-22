<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name= "viewport" content= "width=device-width" initial-scale="1" minimum-scale="1" maximum-scale="1">
	<title>文化活动</title>
	<template file="Pubservice/Common/_cssjs"/>
	<link rel="stylesheet" href="{$config_siteurl}statics/cu/css/pub-volunteer.css" />
	<link rel="stylesheet" href="{$config_siteurl}statics/cu/css/pub-active.css" />
	<script type="text/javascript" src="{$config_siteurl}statics/cu/js/category_select.js"></script>		
</head>
<body>
	<div class="wrap">
		<template file="Pubservice/Common/_head"/>
		 <div id="nav" style="height:45px !important;">
                <div class="container"  >
                    <ul>
                        <li>
                            <a href="{$config_siteurl}" class="home_src">首页</a>
                        </li>
                        <li>
                            <span>></span>
                        </li>
                        <li>
                            <a href="">公共文化活动</a>
                        </li>                        
                    </ul>
                    <form action="" method="get" target="_blank">
						<input type="hidden" name="m" value="Active"/>
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
           
			<div class="whhdCategory ">
				<volist name="active_type" id="vo">
				<div class="col-md-1 col-xs-1">
					<a href="{:U('Pubservice/Active/index',array('catid'=>$vo['cid']))}" <if condition="($_GET['catid'] eq $vo['cid'])">class="whhdCategoryList active"<else/>class="whhdCategoryList" </if>>{$vo.name}</a>
				</div>
				</volist>
				<div class="col-md-4 col-xs-4 filtertogglebox">
					<a class="filtertogglebtn">显示筛选<i></i></a>
				</div>
			</div>
			

			<div style="margin-top: 20px;" class="filterparas filterfold">
				<div class="sx">
					<div class="pull-left ggwh_SelectName" >市级：</div>
					<div class="a-box">
						<a href="{:U('Pubservice/Active/index')}" class="on">全部</a>
						<volist name="cateinfo['city']" id="ci"><a rel="{$ci.name}" class="sx_child" href="javascript:;" name="city">{$ci.name}<if condition="$ci['name'] eq '省属'"><else/>市</if></a></volist>
					</div>
				</div>
				<div class="sx">
					<div class="pull-left ggwh_SelectName" >县级：</div>
					<div class="a-box">
						<a  href="{:U('Pubservice/Active/index')}" class="on">全部</a>
						<volist name="cateinfo['county']" id="co"><a rel="{$co.name}" class="sx_child" href="javascript:;" name="county">{$co.name}</a></volist>
					</div>
				</div>
				<div class="clearfix"></div>
				<!--<div class="sx">
					<div class="pull-left ggwh_SelectName" >展馆：</div>
					<div class="a-box">
						<a  href="{:U('Pubservice/Active/index')}" class="on">全部</a>
						<volist name="category" id="ci"><a rel="{$ci.cid}" class="sx_child" href="javascript:;" name="categoryid">{$ci.name}</a>
						</volist>
					</div>
				</div>


				<div class="sx">
					<div class="pull-left ggwh_SelectName" >类型：</div>
					<div class="a-box">
						<a  href="{:U('Pubservice/Active/index')}" class="on">全部</a>
						<volist name="categoryname" id="co"><a rel="{$co.cid}" class="sx_child" href="javascript:;" name="type">{$co.name}</a></volist>
					</div>
				</div>-->
				<div class="clearfix"></div>
			</div>

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
				<span class="pull-right"><a href="#">申请培训</a></span>
				<div class="clearfix"></div>
			</div>
			<div class="row whhd_PxList">
				<volist name="data" id="vo">
				<div class="col-md-3 col-xs-6">
					<div class="whhd_PxListItem center-block">
						<if condition="($vo['art_cid'] eq 228) and ($vo['type'] eq 1)">
							<div class="train">官办团体</div>
						<elseif condition="($vo['art_cid'] eq 228) and ($vo['type'] eq 2)"/>
							<div class="chair">社会团体</div>
						<else/>
						</if>
						<a href="{:U('show', array('id'=>$vo['id'],'tablename'=>active))}"><img src="{:thumb($vo['image'],258,176,1)}" class="img-responsive " /></a>
						<h5>{$vo.content_title}</h5>
						<p style="overflow:hidden;">活动地点：<if condition="$vo['act_address'] neq '' ">{$vo.act_address}<else/>暂无信息</if></p>
						<p >活动时间：<if condition="$vo['act_time'] neq '' ">{$vo.act_time}<else/>暂无信息</if></p>
						<p style="overflow:hidden;">内容简介：<if condition="$vo['abstract'] neq '' ">{$vo.abstract|strip_tags|mb_strcut=###,0,23,'utf-8'}<else/>暂无信息</if></p>
						<if condition="$vo['if_bespeak'] eq 1">
							<p>剩余名额：<?=((int)$vo['acceptance'] - (int)$vo['bespeak_num'])?>(人)</p>
							<a href="{:U('show', array('id'=>$vo['id'],'tablename'=>active))}" class="signUp">预&nbsp;&nbsp;约</a>
						<else/>
							<p>&nbsp;&nbsp;</p>
							<a href="{:U('show', array('id'=>$vo['id'],'tablename'=>active))}" class="signUp">无需预约</a>
						</if>
					</div>
				</div>
				</volist>
			</div>
			<div class="page">
				{$pageinfo.page}
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
			// console.log($(".intro"));
			$.each($(".intro"),function(i,v){
				// console.log($(v));
				str = $(v).text().length > 40 ? $(v).text().substr(0,40) + '...' : $(v).text();
				$(v).text(str);
			})

			$(".filtertogglebtn").click(function(){
				$(this).toggleClass("filtertogglebtnon");
				$(".filterparas").toggleClass("filterfold");
			})
		})
	</script>
</body>
</html>