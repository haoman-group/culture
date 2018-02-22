<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>送戏下乡</title>
	<template file="Pubservice/Common/_cssjs"/>
	<link rel="stylesheet" href="{$config_siteurl}statics/cu/css/pub-volunteer.css" />
	<link rel="stylesheet" href="{$config_siteurl}statics/cu/css/pub-active.css" />
	<script type="text/javascript" src="{$config_siteurl}statics/cu/js/category_select.js"></script>

	<script type="text/javascript" src="{$config_siteurl}statics/cu/layer/layer.js"></script>
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
                            <a href="">送戏下乡流程图</a>
                        </li>


                        

                    </ul>

                </div>
		 </div>

		<div class="oagallery" >
			<img src="{$config_siteurl}statics/cu/images/index/xiaxiang1.jpg">
			<img src="{$config_siteurl}statics/cu/images/index/xiaxiang2.jpg">
			<img src="{$config_siteurl}statics/cu/images/index/xiaxiang3.jpg">
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
			console.log($(".intro"));
			$.each($(".intro"),function(i,v){
				console.log($(v));
				str = $(v).text().length > 40 ? $(v).text().substr(0,40) + '...' : $(v).text();
				$(v).text(str);
			})
			// str = $(".intro").text().length > 40 ? $(".intro").text().substr(0,40) + '...' : $(".intro").text();
			// $(".intro").text(str);


			$(".filtertogglebtn").click(function(){
				$(this).toggleClass("filtertogglebtnon");
				$(".filterparas").toggleClass("filterfold");
			})


			$(".oagallery img").click(function(){
				layer.photos({
					photos: {"status":1,"msg":"","title":"11","id":8,"start":0,"data":[{"alt":"layer","pid":109,"src":"/statics/cu/images/index/xiaxiang1.jpg","thumb":""},{"alt":"layer","pid":109,"src":"/statics/cu/images/index/xiaxiang2.jpg","thumb":""},{"alt":"layer","pid":109,"src":"/statics/cu/images/index/xiaxiang3.jpg","thumb":""}]}

				});
			})
		})
	</script>
</body>
</html>