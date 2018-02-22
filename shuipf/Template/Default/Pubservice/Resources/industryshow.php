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
				<div class="col-md-12" >
					<div class="resocon" >
						
						<h2 style="margin-top: 0;text-align:center">{$data.title}</h2>
						
						<div class="resoconright" style="margin-top:25px;">
						<notempty name="data.intro"><p >项目简介：{$data.intro}</p></notempty>
						<notempty name="data.support"><p>项目配套：{$data.support}</p></notempty>
						<notempty name="data.com_name"><p>企业名称：{$data.com_name}</p></notempty>
						<notempty name="data.com_property"><p>单位性质：{$data.com_property}</p></notempty>
						<notempty name="data.com_leader"><p>负责人：{$data.com_leader}</p></notempty>
						<notempty name="data.com_phone"><p>联系电话：{$data.com_phone}</p></notempty>
						<notempty name="data.com_addr"><p>联系地址：{$data.com_addr}</p></notempty>
						<notempty name="data.com_product"><p>经营产品：{$data.com_product}</p></notempty>
						<notempty name="data.com_mode"><p>经营模式：{$data.com_mode}</p></notempty>
						<notempty name="data.com_mode"><p>经营模式：{$data.inv_totlemoney}</p></notempty>
						<notempty name="data.inv_totlemoney"><p>招商投资总额：{$data.inv_totlemoney}</p></notempty>
						<notempty name="data.inv_financing"><p>融资总额：{$data.inv_financing}</p></notempty>
						<notempty name="data.inv_years"><p>投资年限：{$data.inv_years}</p></notempty>
						<notempty name="data.inv_type"><p>合作方式：{$data.inv_type}</p></notempty>
						<notempty name="data.inv_use"><p>资金用途：{$data.inv_use}</p></notempty>
						<notempty name="data.sponsor"><p>主办者：{$data.sponsor}</p></notempty>
						<notempty name="data.undertaker"><p>承办者：{$data.undertaker}</p></notempty>
						<notempty name="data.pavilion"><p>参展展馆：{$data.pavilion}</p></notempty>
						<notempty name="data.opentime"><p>开始时间：{$data.opentime}</p></notempty>
						<notempty name="data.completetime"><p>竣工时间：{$completetime.addr}</p></notempty>
						<notempty name="data.addr"><p>地址：{$data.addr}</p></notempty>
						<notempty name="data.total_area"><p>总面积：{$data.total_area}</p></notempty>
						<notempty name="data.boutique"><p>馆藏精品：{$data.boutique}</p></notempty>
						<notempty name="data.specification"><p>规格：{$data.specification}</p></notempty>
						<notempty name="data.level"><p>级别：{$data.level}</p></notempty>
						<notempty name="data.area"><p>所属地区：{$data.area_display}</p></notempty>
						<notempty name="data.join_date"><p>加入企业注册时间：{$data.join_date}</p></notempty>
						<notempty name="data.person_num"><p>人数：{$data.person_num}</p></notempty>
						<notempty name="data.scale"><p>规模：{$data.scale}</p></notempty>
						<notempty name="data.output_value"><p>年产值（统计）：{$data.output_value}</p></notempty>
						<notempty name="data.survey"><p>项目概况：{$data.survey}</p></notempty>
                        </div>
                       <div class="resoconleft" >
							<notempty name="data.acrobatics_picture_url">
								<volist name="data['acrobatics_picture_url']" id="img">

									<img src="{$img}" style="width:15%;height:150px;margin-left:1%;">
								</volist>
							</notempty>
						</div>
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
	$("#imgList").on('click','img',function(){
		var src = $(this).attr('src');
		layer.open({
			type:1,
			title:false,
			shadeClose:true,
			content:"<img style='width:100%;height:100%' src="+src+">"
		})
	})
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
