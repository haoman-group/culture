<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>文化大数据库</title>
<template file="Cudatabase/Common/_cssjs"/>
<style>
th{
	width:100px;
}

</style>
</head>

<body>
<template file="Cudatabase/Common/_head"/>
<div class="all">
 	 <div class="ht1"> <a href="javascript:history.go(-1)">{$data.dramaname}</a></div>    
    <div class="search-content" style="background: none;position: relative;">
		<table>
			<notempty name="data.title"><tr><th>名称：</th><td>{$data.title}</td></tr></notempty>  	      
			<notempty name="data.intro"><tr><th>项目简介：</th><td>{$data.intro}</td></tr></notempty>  	      
			<notempty name="data.support"><tr><th>项目配套：</th><td>{$data.support}</td></tr></notempty>  	    
			<notempty name="data.com_name"><tr><th>企业名称：</th><td>{$data.com_name}</td></tr></notempty>  	      
			<notempty name="data.com_property"><tr><th>单位性质：</th><td>{$data.com_property}</td></tr></notempty>     
			<notempty name="data.com_leader"><tr><th>负责人：</th><td>{$data.com_leader}</td></tr></notempty>     
			<notempty name="data.com_phone"><tr><th>联系方式：</th><td>{$data.com_phone}</td></tr></notempty>  	  
			<notempty name="data.com_addr"><tr><th>联系地址：</th><td>{$data.com_addr}</td></tr></notempty>  	    
			<notempty name="data.com_product"><tr><th>产品：</th><td>{$data.com_product}</td></tr></notempty>      
			<notempty name="data.com_mode"><tr><th>经营模式：</th><td>{$data.com_mode}</td></tr></notempty>  	    
			<notempty name="data.inv_totle"><tr><th>招商投资总额：</th><td>{$data.inv_totle}</td></tr></notempty>  	 
			<notempty name="data.inv_financing"><tr><th>融资总额：</th><td>{$data.inv_financing}</td></tr></notempty>    
			<notempty name="data.inv_years"><tr><th>投资年限：</th><td>{$data.inv_years}</td></tr></notempty>  	  
			<notempty name="data.inv_type"><tr><th>合作方式：</th><td>{$data.inv_type}</td></tr></notempty>  	    
			<notempty name="data.inv_use"><tr><th>资金用途：</th><td>{$data.inv_use}</td></tr></notempty>  	    
			<notempty name="data.sponsor"><tr><th>主办者：</th><td>{$data.sponsor}</td></tr></notempty>  	    
			<notempty name="data.undertaker"><tr><th>承办者：</th><td>{$data.undertaker}</td></tr></notempty>  	
			<notempty name="data.pavilion"><tr><th>参展展馆：</th><td>{$data.pavilion}</td></tr></notempty>  	    
			<notempty name="data.opentime"><tr><th>开始时间：</th><td>{$data.opentime}</td></tr></notempty>  	    
			<notempty name="data.completetime"><tr><th>竣工时间：</th><td>{$data.completetime}</td></tr></notempty>  	
			<notempty name="data.addr"><tr><th>地址：</th><td>{$data.addr}</td></tr></notempty>  	          
			<notempty name="data.total_area"><tr><th>总面积：</th><td>{$data.total_area}</td></tr></notempty>  	
			<notempty name="data.boutique"><tr><th>馆藏精品：</th><td>{$data.boutique}</td></tr></notempty>  	    
			<notempty name="data.specification"><tr><th>规格：</th><td>{$data.specification}</td></tr></notempty>  
			<notempty name="data.level"><tr><th>级别：</th><td>{$data.level}</td></tr></notempty>
			<!-- <notempty name="data.area"><tr><th>所属地区：</th><td>{$data.area}</td></tr></notempty>  	         -->
			<notempty name="data.area_display"><tr><th>地区：</th><td>{$data.area_display}</td></tr></notempty>
			<notempty name="data.acrobatics_picture_url">
				<tr>
				<div class="row ow-img" id="imgList">
					<td></td>
					<td id="imger"></td>
				</div>
				</tr>
			</notempty>
		</table>
    </div>
<div class="clr"></div>
</div>
<div class="clr"></div>
<template file="Cudatabase/Common/_foot"/>

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
	$("#imger").on('click','img',function(){
		var src = $(this).attr('src');
		  
				
		var index = layer.open({
			type:1,
			title:false,
			shadeClose:true,
			content:"<img style='width:100%;height:100%' src="+src+">"
		})
		layer.style(index, {
			width: 'auto',
			top:'40px'
			});     
	})

	$(function(){
		var img = "{$data.acrobatics_picture_url}".split(',');
		// console.log(img);
		$.each(img,function(i,v){
			// console.log(i);
			$("#imger").append('<div class="col-md-2">'+
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