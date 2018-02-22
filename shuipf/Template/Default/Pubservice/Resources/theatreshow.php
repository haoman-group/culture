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
	<div class="ht1"><a href="{:U('Index/index')}">首页</a> ><a href="{:U('Resources/index')}"> 数字文化资源</a>><a href="{:U('Resources/lists',array('cid'=>346))}">剧院</a>>{$data.title}</div> 
		<div class="container-fluid">
			<div class="row">
			
					<div class="col-md-7" style="float:left;margin-top:25px;width:100%;">
						<div >
							<h2 style="text-align:center">{$data['title']}</h2>
                            <p style="font-size:12px;text-align:center">上传单位:{$data['unit']}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;上传时间:{$data['addtime']}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
                            <p style="margin-top:30px;">{$data['publish_content']}</p>
						</div>
					</div>
			
				


			</div>
			
				<div class="row ow-img" id="imgList1">
					<h1 style="padding-left: 15px;margin: 40px 0 20px;">图片</h1>
                    <volist name="data['drama_picture_url']" id="vo" >
                            <img src="{$vo}" style="width:200px;heigth:200px;margin-left:10px;">
                            </volist>
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
	var youkuplayer=$("#youkuplayer").attr("data-type");
	if(youkuplayer == undefined){
		$(".col-md-12").css("width","100%");
	}else{
		
	$(".col-md-12").css("width","40%");	
	}
});
	
</script>
