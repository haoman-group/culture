<!DOCTYPE html>
<html lang="zh-CN">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
	<title>表演类活动-山西艺术节</title>
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
			<div class="stag-title">
				<h6>{$category['englishname']}</h6>
				<h4>{$category['name']}</h4>
			</div>
			<div class="stag-excellent">
			<dl>

				<dt><a  target="_blank" href="{:U('Stageshow/show',array('id'=>$data['0']['id']))}"><img src="{:thumb($data[0]['image'],508,306,1)}" alt="" style="width:508px;height:306px;"></a></dt>
 	
					<dd>
 	
						<h4><span>共{$num}集</span></h4>
 	
						<p style="word-wrap:break-word"><?php echo  mb_strcut($data[0]['content'],0,175)?>...<span class="time"></span></p>
 	
						<!--<div class="time">时间：{$data[0]['periodical_date']}</div>-->
 	                    
						<ul class="clearfix" style="margin-top:15px;">
						<volist name="data" id="vo" offset="1" length="3">
							<li>
								<a  target="_blank" href="{:U('Stageshow/show',array('id'=>$vo['id']))}"><img src="{:thumb($vo['image'],178,93,1)}" alt="" style="width:178px;height:93px;"></a>
								<h6>{$vo['title']}<notempty name="vo['deputy_title']">《{$vo['deputy_title']}》</notempty></h6>
							</li>
							</volist>
							<!--<li>
								<a  target="_blank" href="javascript:void(0)"><img src="{$config_siteurl}statics/cu/festival/images/stage/02.png" alt=""><i>2017-08-03期</i></a>
								<h6>花鼓灯《家乡的红绣球》</h6>
							</li>
							<li>
								<a  target="_blank" href="javascript:void(0)"><img src="{$config_siteurl}statics/cu/festival/images/stage/02.png" alt=""><i>2017-08-03期</i></a>
								<h6>花鼓灯《家乡的红绣球》</h6>
 	
							</li>-->
 	
						</ul>
 	                   
					</dd>
 	
				</dl>
				<div class="stag-all">
					<div class="stag-nav clearfix">
						<span>剧场</span>
						<!--<select name="" id="">
							<option value="2017">2017</option>
							<option value="2017">2016</option>
							<option value="2017">2015</option>
							<option value="2017">2014</option>
						</select>-->
						<ul class="clearfix">
							<li <if condition="$_GET['address'] eq '' "> class="active" </if>><a  target="_blank" href="{:U('Stageshow/index')}">全部</a></li>
							<li <if condition="$_GET['address'] eq 'sx' "> class="active" </if>><a  target="_blank" href="{:U('Stageshow/index',array('address'=>'sx'))}" >山西大剧院</a></li>
							<li <if condition="$_GET['address'] eq 'qn' "> class="active" </if>><a  target="_blank" href="{:U('Stageshow/index',array('address'=>'qn'))}" >青年宫演艺中心</a></li>
							<li <if condition="$_GET['address'] eq 'xg' ">  class="active" </if>><a  target="_blank" href="{:U('Stageshow/index',array('address'=>'xg'))}" >星光剧场</a></li>
							<li <if condition="$_GET['address'] eq 'ty' ">  class="active" </if>><a  target="_blank" href="{:U('Stageshow/index',array('address'=>'ty'))}" >太原工人文化宫</a></li>
							<li <if condition="$_GET['address'] eq 'jy' ">  class="active" </if>><a  target="_blank" href="{:U('Stageshow/index',array('address'=>'jy'))}">山西大剧院小剧场</a></li>
							
						</ul>
					</div>
					<div class="stag-con">
						<ul class="clearfix">
						<volist name="voide" id="void">
							<li>
								<a  target="_blank" href="{:U('Stageshow/show',array('id'=>$void['id']))}"><img src="{:thumb($void['image'],283,184,1)}" alt="" style="width:283px;height:184px;"></a>
								<h6>{$void['title']} <notempty name="void['deputy_title']">《{$void['deputy_title']}》</notempty></h6>
							</li>
							</volist>
							<!--<li>
								<a  target="_blank" href="javascript:void(0)"><img src="{$config_siteurl}statics/cu/festival/images/stage/02.png" alt=""><i>2017-08-03期</i></a>
								<h6>花鼓灯《家乡的红绣球》</h6>
							</li>-->
							<!--<li>
								<a  target="_blank" href="javascript:void(0)"><img src="{$config_siteurl}statics/cu/festival/images/stage/02.png" alt=""><i>2017-08-03期</i></a>
								<h6>花鼓灯《家乡的红绣球》</h6>
							</li>
							<li>
								<a  target="_blank" href="javascript:void(0)"><img src="{$config_siteurl}statics/cu/festival/images/stage/02.png" alt=""><i>2017-08-03期</i></a>
								<h6>花鼓灯《家乡的红绣球》</h6>
							</li>
							<li>
								<a  target="_blank" href="javascript:void(0)"><img src="{$config_siteurl}statics/cu/festival/images/stage/02.png" alt=""><i>2017-08-03期</i></a>
								<h6>花鼓灯《家乡的红绣球》</h6>
							</li>
							<li>
								<a  target="_blank" href="javascript:void(0)"><img src="{$config_siteurl}statics/cu/festival/images/stage/02.png" alt=""><i>2017-08-03期</i></a>
								<h6>花鼓灯《家乡的红绣球》</h6>
							</li>
							<li>
								<a  target="_blank" href="javascript:void(0)"><img src="{$config_siteurl}statics/cu/festival/images/stage/02.png" alt=""><i>2017-08-03期</i></a>
								<h6>花鼓灯《家乡的红绣球》</h6>
							</li>
							<li>
								<a  target="_blank" href="javascript:void(0)"><img src="{$config_siteurl}statics/cu/festival/images/stage/02.png" alt=""><i>2017-08-03期</i></a>
								<h6>花鼓灯《家乡的红绣球》</h6>
							</li>
							<li>
								<a  target="_blank" href="javascript:void(0)"><img src="{$config_siteurl}statics/cu/festival/images/stage/02.png" alt=""><i>2017-08-03期</i></a>
								<h6>花鼓灯《家乡的红绣球》</h6>
							</li>
							<li>
								<a  target="_blank" href="javascript:void(0)"><img src="{$config_siteurl}statics/cu/festival/images/stage/02.png" alt=""><i>2017-08-03期</i></a>
								<h6>花鼓灯《家乡的红绣球》</h6>
							</li>
							<li>
								<a  target="_blank" href="javascript:void(0)"><img src="{$config_siteurl}statics/cu/festival/images/stage/02.png" alt=""><i>2017-08-03期</i></a>
								<h6>花鼓灯《家乡的红绣球》</h6>
							</li>
							<li>
								<a  target="_blank" href="javascript:void(0)"><img src="{$config_siteurl}statics/cu/festival/images/stage/02.png" alt=""><i>2017-08-03期</i></a>
								<h6>花鼓灯《家乡的红绣球》</h6>
							</li>
							<li>
								<a  target="_blank" href="javascript:void(0)"><img src="{$config_siteurl}statics/cu/festival/images/stage/02.png" alt=""><i>2017-08-03期</i></a>
								<h6>花鼓灯《家乡的红绣球》</h6>
							</li>
							<li>
								<a  target="_blank" href="javascript:void(0)"><img src="{$config_siteurl}statics/cu/festival/images/stage/02.png" alt=""><i>2017-08-03期</i></a>
								<h6>花鼓灯《家乡的红绣球》</h6>
							</li>
							<li>
								<a  target="_blank" href="javascript:void(0)"><img src="{$config_siteurl}statics/cu/festival/images/stage/02.png" alt=""><i>2017-08-03期</i></a>
								<h6>花鼓灯《家乡的红绣球》</h6>
							</li>
							<li>
								<a  target="_blank" href="javascript:void(0)"><img src="{$config_siteurl}statics/cu/festival/images/stage/02.png" alt=""><i>2017-08-03期</i></a>
								<h6>花鼓灯《家乡的红绣球》</h6>
							</li>-->
						</ul>
					</div>
					<div class="page">
						<div class="page">
		                {$pageinfo.page}
			             </div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<template file="Pubservice/Common/_foot"/>
</body>
</html>
<script type="text/javascript" src="http://player.youku.com/jsapi"></script>
 <volist name="data" id="wo">
	<if condition="$wo['voide'] neq  '' ">
	<script type="text/javascript">
		player = new YKU.Player('youkuplayer',{
			styleid: '0',
			client_id: '{:C('YOUKU_CLIENT_ID')}',
			vid: '{$wo['voide']}',
			newPlayer: true
		});
	</script>
	</if>
</volist>

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
	$("#imgList").on('click','img',function(){
		var src = $(this).attr('src');
		layer.open({
			type:1,
			title:false,
			shadeClose:true,
			content:"<img style='width:100%;height:100%' src="+src+">"
		})
	})

	$(function(){
		var img = "{$data.image}".split(',');
		// console.log(img);
		$.each(img,function(i,v){
			// console.log(i);
			$("#imgList").append('<div class="col-md-2">'+
					'<div class="">'+
						'<img src="'+v+'" class="img-responsive" alt="剧照1">'+
					'</div>'+
				'</div>	');
		});
	});

	$(document).ready(function(){
	var youkuplayer=$(".youkuplayer").attr("data-type");
	if(youkuplayer == undefined){
		$(".col-md-12").css("width","100%");
		
	}else{
		
	$(".col-md-12").css("width","40%");	
	
	}
});
	
</script>
