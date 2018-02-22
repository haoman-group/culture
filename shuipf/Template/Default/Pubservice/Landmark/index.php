<!DOCTYPE html>
<html>

	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
		<title>文化地标</title>
		<template file="Pubservice/Common/_cssjs"/>
		<link rel="stylesheet" href="{$config_siteurl}statics/cu/css/pub-volunteer.css" />
	</head>

	<body>
		<div class="wrap">
			<template file="Pubservice/Common/_head"/>
			<div id="nav" style="height:45px !important;">
                <div class="container">
                    <ul>
                        <li>
                            <a href="{$config_siteurl}" class="home_src">首页</a>
                        </li>
                        <li>
                            <span>></span>
                        </li>
                        <li>
                            <a href="">文化地标</a>
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
			<div class="ggwh_Content text-center" style="padding: 30px 0px">
				<!--<img src="{$config_siteurl}statics/cu/images/img/ggwh_Whdb.jpg" usemap="#Map" />
				<map name="Map">
              <area shape="rect" coords="997,201,1087,224" href="ggwh_WhdbDetail1.html">
              <area shape="rect" coords="505,497,604,524" href="ggwh_WhdbDetail2.html">
              <area shape="rect" coords="987,819,1089,845" href="ggwh_WhdbDetail3.html">
            </map>-->
            
<!--				<volist name="lists" id="vo">-->
<!--					<dl class="landmark clearfix">-->
<!--						<dt><img src="{$vo.cover}" alt=""></dt>-->
<!--						<dd>-->
<!--							<h5>{$vo.title}</h5>-->
<!--							<p>{$vo.introduction}</p>-->
<!--							<a href="{:U('show',array('id'=>$vo['id']))}">查看详情>></a>-->
<!--						</dd>-->
<!--					</dl>-->
<!--				</volist>-->


				<ul class="uldibiao">
					<volist name="lists" id="vo" key="k">
						<li <if condition="$k eq 1">class="on fl"</if> <if condition="$k eq 3">class="on fl"</if> <if condition="$k eq 2">class="fr"</if> <if condition="$k eq 4">class="fr"</if> >
							<a href="{:U('show',array('id'=>$vo['id']))}">
								<div class="cell">
									<img src="{$vo.cover}">
									<div class="conbox">
										<h5>{$vo.title}</h5>
										<p>{$vo.introduction}</p>
										<div class="seemore">查看详情>></div>
									</div>
									<div class="zhe">
										{$vo.title}
									</div>
								</div>
							</a>
						</li>
					</volist>
				</ul>

			</div>
			<hr />
			<template file="Pubservice/Common/_foot"/>
		</div>
		<script type="text/javascript">
			window.onload = function(){
				var landDl = document.querySelectorAll(".landmark");
				for(var i = 0;i < landDl.length;i ++){
					var landp = landDl[i].querySelector("dd p");
					landp.innerHTML = landp.innerHTML.substr(0,100) + '...';
				}
			}

			$(function(){

				$(".uldibiao li").hover(function(){

					if(!$(this).hasClass("on")){
						if($(this).hasClass("fl")){
							$(this).addClass("on");
							$(this).next().removeClass("on");
						}
						if($(this).hasClass("fr")){
							$(this).addClass("on");
							$(this).prev().removeClass("on");
						}
					}
				})
			})
		</script>
	</body>

</html>