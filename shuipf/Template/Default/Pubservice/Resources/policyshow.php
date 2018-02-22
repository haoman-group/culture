<!DOCTYPE html>
<html lang="zh-cn">
<head>
<template file="Pubservice/Common/_cssjs"/>
</head>
<style>
	.row-img img{width: 100%;height: 180px;}
</style>
	<link rel="stylesheet" href="{$config_siteurl}statics/cu/css/pub-resource.css" />
<body>
<template file="Pubservice/Common/_head"/>
<div class="wrap">    
    <div class="ggwh_Content" style="background: none;position: relative;margin: 50px auto 20px;height: auto;">
	<div class="ht1"> {$breadcrumb}</div>
		<div class="container-fluid">
			<div class="row">
				<notempty name="data.video">
					<div class="col-md-7" style="float:left;">
						<div class="embed-responsive embed-responsive-4by3">
							<div id="youkuplayer" style="width:580px;height:500px" data-type="{$data.video_title}"></div>
						</div>
					</div>
				</notempty>
				<div class="col-md-12" style="float:left;">
					<div class="resocon">
						<notempty name="data.publish_name"><h3 style="margin-top: 0;">{$data.publish_name}</h3></notempty>
						<notempty name="data.publish_agency"><p>发布机构：{$data.publish_agency}</p></notempty>
						<notempty name="data.publish_date"><p>发布时间：{$data.publish_date}</p></notempty>
						<notempty name="data.publish_order"><p>发布文号：{$data.publish_order}</p></notempty>
						<notempty name="data.publish_content">
							
							<div class="txtcon">{$data.publish_content }</div>
						</notempty>
					</div>
				</div>
			</div>
		</div>
		
    </div>
	<div class="clr"></div>
</div>
<div class="clr"></div>
<template file="Pubservice/Common/_foot"/>
</body>
</html>
<script type="text/javascript" src="http://player.youku.com/jsapi"></script>
<if condition="$data['video'] neq ''">
	<script type="text/javascript">
		player = new YKU.Player('youkuplayer',{
			styleid: '0',
			client_id: '{:C('YOUKU_CLIENT_ID')}',
			vid: '{$data.video}',
			newPlayer: true
		});
	</script>
</if>

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
