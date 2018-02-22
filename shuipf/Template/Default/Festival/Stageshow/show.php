<!DOCTYPE html>
<html lang="zh-CN">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
	<title>山西艺术节</title>
	<link rel="stylesheet" type="text/css" href="{$config_siteurl}statics/cu/css/base.css" />
	<link rel="stylesheet" href="{$config_siteurl}statics/cu/bootstrap/bootstrap.min.css" />
	<link rel="stylesheet" href="{$config_siteurl}statics/cu/swiper/swiper.css" />
	 <link rel="stylesheet" href="{$config_siteurl}statics/cu/css/public-service.css" />
	<link rel="stylesheet" href="{$config_siteurl}statics/cu/font/font-awesome.css" />
	<link rel="stylesheet" href="{$config_siteurl}statics/cu/festival/css/index.css" />
	<script type="text/javascript" src="{$config_siteurl}statics/cu/jquery/jquery.min.js"></script>
	<script type="text/javascript" src="{$config_siteurl}statics/cu/bootstrap/bootstrap.min.js"></script>
	<script type="text/javascript" src="{$config_siteurl}statics/cu/swiper/swiper.min.js"></script>
	<script type="text/javascript" src="{$config_siteurl}statics/cu/festival/js/index.js"></script>
</head>
<body>
<div class="container-fluid">
	<div class="header">
		<div class="container">
			<!-- <img class="logo" src="{$config_siteurl}statics/cu/festival/images/icon/logo.png" alt="山西艺术节"> -->
			<h1 class="logo-text">表演类活动<span>Performance class activities</span></h1>
		</div>
	</div>
	<div class="content">
		<div class="container">
			<div class="video clearfix">
				<if condition="$data['voide'] neq '' ">
				<div class="video-left">
					
					<!--<iframe height=666 width=880 src='http://player.youku.com/embed/{$data['voide']}' frameborder=0 'allowfullscreen'></iframe>-->
					<div class="embed-responsive embed-responsive-4by3">
							<div id="youkuplayer" style="width:880px;height:666px" data-type="{$data.voide}"></div>
						</div>
				</div>
				<else/>
				<img src="{:thumb($data['image'],880,666,1)}" style="width:880px;height:666px">
				</if>
				<div class="video-right">
					<div class="tit">
						<h4>{$data['title']}<if condition="$data['deputy_title'] neq ''">《{$data['deputy_title']}》</if></h4>
						<h6 style="color:#fff">活动时间:{$data.start_date|default=""|date="Y-m-d",###}-{$data.end_date||default=""|date="Y-m-d",###}</h6>
						<h6 style="color:#fff">活动地点:{$data.site}</h6>
						<!--<span><br>共{$count}期</span>-->
					</div>
					<div class="video-month">
						<div class="prograss">
							<p></p>
						</div>
						<div class="swiper-container swiper-container-horizontal" style="padding: 10px 0 15px;">
					        <div class="swiper-wrapper">
					            <div class="swiper-slide">8月</div>
					            <div class="swiper-slide">7月</div>
					            <div class="swiper-slide">6月</div>
					            <div class="swiper-slide">5月</div>
					            <div class="swiper-slide">4月</div>
					            <div class="swiper-slide">3月</div>
					            <div class="swiper-slide">2月</div>
					            <div class="swiper-slide">1月</div>
					        </div>
					        <!-- Add Pagination -->
        					<!-- <div class="swiper-pagination"></div> -->
        					<div class="swiper-button-prev swiper-button-white" style="width: 25px; height: 12px;margin-top: -9px;left: 4px;"></div>
        					<div class="swiper-button-next swiper-button-white" style="width: 25px; height: 12px;margin-top: -9px;right: 4px;"></div>
					    </div>
					    <script>
					        var swiper = new Swiper('.swiper-container', {
					            // pagination: '.swiper-pagination',
					            slidesPerView: 5,
					            // paginationClickable: true,
					            spaceBetween: 0,
					            prevButton:'.swiper-button-prev',
								nextButton:'.swiper-button-next',
					        });
					    </script>
					</div>
					<volist name="voide" id="vo" offset="0" length="2">
					<div class="video-list">
						<a href="{:U('Stageshow/show',array('id'=>$vo['id']))}">
							<img src="{:thumb($vo['image'],266,140,1)}" alt="" style="width:266px;height:140px;">
							<span>{$vo['periodical_date']}期</span>
						</a>
						<p>{$vo['title']}<if condition="$vo['deputy_title'] neq ''">《{$vo['deputy_title']}》</if>
                        <i>{$vo['hits']}</i></p>
					</div>
					</volist>
					<!--<div class="video-list">
						<a href="javascript:void(0)">
							<img src="{$config_siteurl}statics/cu/festival/images/stage/01.jpg" alt="">
							<span>2017-08-03期</span>
						</a>
						<p>花鼓灯《家乡的红绣球》<i>2万</i></p>
					</div>-->
					<ul>
					<volist name="voide" id="void" offset="2" length="3">
						<li class="active"><a href="{:U('Stageshow/show',array('id'=>$void['id']))}"><span>●</span>{$void['title']}<if condition="$void['deputy_title'] neq ''">《{$void['deputy_title']}》</if></a></li>
						</volist>
						<!--<li><a href="javascript:void(0)"><span>●</span>花鼓灯《家乡的红绣球》</a></li>
						<li><a href="javascript:void(0)"><span>●</span>花鼓灯《家乡的红绣球》</a></li>-->
					</ul>
				</div>
			</div>
			<div style="margin-top:25px;width:1190px;">

				<p style="word-wrap:break-word;text-indent:2em;">{$data['content']}</p>
			</div>
			<div class="stag-all">
				<div class="stag-nav clearfix">
					<span>更多精彩</span>
				</div>
				<div class="stag-con">
					<ul class="clearfix">
					<volist name="data['images']" id="mg" offset="1">
					  <if condition="$key eq 1">
						<li style="width:210px;">
							<a href="{:U('Stageshow/show',array('id'=>$data['id']))}"><img src="{:thumb($mg,200,100,1)}" alt=""><i></i></a>
							<h6>{$data['title']}<if condition="$data['deputy_title'] neq ''">《{$data['deputy_title']}》</if></h6>
						</li>
						
						<else/>
						<li style="width:210px;margin-left:15px;">
							<a href="{:U('Stageshow/show',array('id'=>$data['id']))}"><img src="{:thumb($mg,200,100,1)}" alt=""><i></i></a>
							<h6>{$data['title']}<if condition="$data['deputy_title'] neq ''">《{$data['deputy_title']}》</if></h6>
						</li>
						</if>
						</volist>
						<!--<li>
							<a href="javascript:void(0)"><img src="{$config_siteurl}statics/cu/festival/images/stage/02.png" alt=""><i>2017-08-03期</i></a>
							<h6>花鼓灯《家乡的红绣球》</h6>
						</li>
						<li>
							<a href="javascript:void(0)"><img src="{$config_siteurl}statics/cu/festival/images/stage/02.png" alt=""><i>2017-08-03期</i></a>
							<h6>花鼓灯《家乡的红绣球》</h6>
						</li>
						<li>
							<a href="javascript:void(0)"><img src="{$config_siteurl}statics/cu/festival/images/stage/02.png" alt=""><i>2017-08-03期</i></a>
							<h6>花鼓灯《家乡的红绣球》</h6>
						</li>
						<li>
							<a href="javascript:void(0)"><img src="{$config_siteurl}statics/cu/festival/images/stage/02.png" alt=""><i>2017-08-03期</i></a>
							<h6>花鼓灯《家乡的红绣球》</h6>
						</li>
						<li>
							<a href="javascript:void(0)"><img src="{$config_siteurl}statics/cu/festival/images/stage/02.png" alt=""><i>2017-08-03期</i></a>
							<h6>花鼓灯《家乡的红绣球》</h6>
						</li>
						<li>
							<a href="javascript:void(0)"><img src="{$config_siteurl}statics/cu/festival/images/stage/02.png" alt=""><i>2017-08-03期</i></a>
							<h6>花鼓灯《家乡的红绣球》</h6>
						</li>
						<li>
							<a href="javascript:void(0)"><img src="{$config_siteurl}statics/cu/festival/images/stage/02.png" alt=""><i>2017-08-03期</i></a>
							<h6>花鼓灯《家乡的红绣球》</h6>
						</li>-->
					</ul>
				</div>
			</div>
		</div>
	</div>
	<div class="page">
	 {$pageinfo.page}
</div>
</div>
<template file="Pubservice/Common/_foot"/>
</body>
</html>
<if condition ="$data['voide']  neq '' ">
<script type="text/javascript" src="http://player.youku.com/jsapi"></script>

	<script type="text/javascript">
		player = new YKU.Player('youkuplayer',{
			styleid: '0',
			client_id: '{:C('YOUKU_CLIENT_ID')}',
			vid: '{$data.voide}',
			newPlayer: true
		});
	</script>


<script>
   window.onload = function(){

        var h = window.innerHeight
                || document.documentElement.innerHeight
                || document.body.innerHeight;;

        var h1 = $('html').height();

        var fh = $('#wh-footer').height();

        // console.log(h +' '+h1+' '+fh);

        if(h1 > h){

            $('#wh-footer').css('top',h1+'px');

        }else{

            $('#wh-footer').css('top',h-(fh+20)+'px');

        }

    }
</script>

<script type="text/javascript">
	$(function(){
		var img = "{$data.image}".split(',');
		// console.log(img);
		$.each(img,function(i,v){
			// console.log(i);
			$(".row-img").append('<div class="col-md-2">'+
					'<div class="thumbnail">'+
						'<img src="'+v+'" class="img-responsive" alt="剧照1">'+
					'</div>'+
				'</div>	');
		});
	});
</script>
<script>
	$(document).ready(function(){
	var youkuplayer=$("#youkuplayer").attr("data-type");
	if(youkuplayer == undefined){
		$(".col-md-12").css("width","100%");
	}else{
		
	$(".col-md-12").css("width","40%");	
	}
});
	
</script>
</if>