<!DOCTYPE html>
<html lang="zh-cn">
<head>
<template file="Cudatabase/Common/_cssjs"/>
</head>
<style>
	.row-img img{width: 100%;height: 180px;}
</style>
<body>
<template file="Cudatabase/Common/_head"/>
<div class="all">
 	 <div class="ht1"><a href="javascript:history.go(-1)">{$data.dramaname}</a></div>    
    <div class="search-content" style="background: none;position: relative;margin: 50px 0 20px;height: auto;">
		<!-- <table>
			<notempty name="data.unit"><tr><th> 表演单位：</th><td>{$data.unit}</td></tr></notempty>	       	     
			<notempty name="data.region"><tr><th> 流布区域：</th><td>{$data.region}</td></tr></notempty>	       	     
			<notempty name="data.troupe"><tr><th> 剧团：</th><td>{$data.troupe}</td></tr></notempty>	       	     
			<notempty name="data.image"><tr><th> 显示图片地：</th><td>{$data.image}</td></tr></notempty>	       	     
			<notempty name="data.video"><tr><th> 显示视频信息：</th><td>{$data.video}</td></tr></notempty>	       	     
			<notempty name="data.awards"><tr><th> 获奖情况：</th><td>{$data.awards}</td></tr></notempty>	       	     
			<notempty name="data.example"><tr><th>     代表作：</th><td>{$data.example}</td></tr></notempty>	   	     
			<notempty name="data.agency"><tr><th> 机构：</th><td>{$data.agency}</td></tr></notempty>	       	     
			<notempty name="data.figures"><tr><th>     代表人物：</th><td>{$data.figures}</td></tr></notempty>	   	     
			<notempty name="data.audio"><tr><th> 音频：</th><td>{$data.audio}</td></tr></notempty>	       	     
			<notempty name="data.band"><tr><th> 乐团：</th><td>{$data.band}</td></tr></notempty>	       	     
			<notempty name="data.performer"><tr><th> 表演者：</th><td>{$data.performer}</td></tr></notempty>	   	 
			<notempty name="data.introduction"><tr><th>简介 ：</th><td>{$data.introduction}</td></tr></notempty>	
			<notempty name="data.area"><tr><th>所属地区：</th><td>{$data.area}</td></tr></notempty>	 	 		 	 
			<notempty name="data.area_display"><tr><th>  显示地区信息：</th><td>{$data.area_display}</td></tr></notempty>   
			<notempty name="data.authorname"><tr><th>作者 ：</th><td>{$data.authorname}</td></tr></notempty>			
			<notempty name="data.technique"><tr><th>技法 ：</th><td>{$data.technique}</td></tr></notempty>			
			<notempty name="data.theme"><tr><th>	题材：</th><td>{$data.theme}</td></tr></notempty>                
			<notempty name="data.category"><tr><th>类别：</th><td>{$data.category}</td></tr></notempty>	 		 
			<notempty name="data.artist"><tr><th>  艺术家：</th><td>{$data.artist}</td></tr></notempty>               	 
			<notempty name="data.drama"><tr><th>  艺术种类：</th><td>{$data.drama}</td></tr></notempty>                 
			<notempty name="data.auditstatus"><tr><th>  审核：</th><td>{$data.auditstatus}</td></tr></notempty>     
			<notempty name="data.video_title"><tr><th>  显示视频标题信息：</th><td>{$data.video_title}</td></tr></notempty>
		</table> -->
		<div class="container-fluid">
			<div class="row">
				<notempty name="data.video">
					<div class="col-md-7">
						<!-- <h1>{$data.video_title}</h1> -->
						<div class="embed-responsive embed-responsive-4by3">
							<div id="youkuplayer" style="width:580px;height:500px"></div>
						</div>
					</div>
				</notempty>
				<div class="col-md-5">
					<div>
						<notempty name="data.video_title"><h3 style="margin-top: 0;">{$data.video_title}</h3></notempty>
						<notempty name="data.authorname"><p>导演：{$data.authorname}</p></notempty>
						<notempty name="data.technique"><p>技法：{$data.technique}</p></notempty>
						<notempty name="data.performer"><p>主演：{$data.performer}</p></notempty>
						<notempty name="data.unit"><p>表演单位：{$data.unit}</p></notempty>
						<notempty name="data.category"><p>类型：{$data.category}</p></notempty>
						<notempty name="data.theme"><p>题材：{$data.theme}</p></notempty>
						<notempty name="data.artist"><p>艺术家：{$data.artist}</p></notempty>
						<notempty name="data.dramaname"><p>艺术种类：{$data.dramaname}</p></notempty>
						<notempty name="data.troupe"><p>剧团：{$data.troupe}</p></notempty>
						<notempty name="data.awards"><p>获奖情况：{$data.awards}</p></notempty>
						<notempty name="data.example"><p>代表作：{$data.example}</p></notempty>
						<notempty name="data.figures"><p>代表人物：{$data.figures}</p></notempty>
						<notempty name="data.audio"><p>音频：{$data.audio}</p></notempty>
						<notempty name="data.band"><p>乐团：{$data.band}</p></notempty>
						<notempty name="data.agency"><p>机构：{$data.agency}</p></notempty>
						<!-- <notempty name="data.area"><p>所属地区：{$data.area}</p></notempty> -->
						<notempty name="data.area_display"><p>地区信息：{$data.area_display}</p></notempty>
						<notempty name="data.region"><p>流布区域：{$data.region}</p></notempty>
						<notempty name="data.introduction"><p>剧本介绍：</p></notempty>
						<notempty name="data.introduction"><p style="text-indent: 2em;line-height:25px;">{$data.introduction}</p></notempty>
					</div>
				</div>
			</div>
			<notempty name="data.image">
				<div class="row row-img">
					<h1 style="padding-left: 15px;margin: 40px 0 20px;">图片</h1>
				</div>
			</notempty>

			<div class="newsshowshare">
				<!-- JiaThis Button BEGIN -->
				<div class="jiathis_style_32x32 ">
					<strong>分享:</strong>
					<a class="jiathis_button_tsina"></a>
					<a class="jiathis_button_weixin"></a>
					<a class="jiathis_button_douban"></a>
					<a class="jiathis_button_tqq"></a>

					<a href="http://www.jiathis.com/share" class="jiathis jiathis_txt jtico jtico_jiathis" target="_blank"></a>
					<a class="jiathis_counter_style"></a>
				</div>
				<script>
					var jiathis_config={
						url:window.location.href,
						summary:"",
						title:document.querySelector("h3").innerHTML+"-山西文化产业网",
						pic:document.querySelectorAll(".thumbnail img").length>0?document.querySelectorAll(".thumbnail img")[0].attr("src"):"/statics/cu/images/icon/logo.png",
						hideMore:false
					}
				</script>
				<script type="text/javascript" src="http://v3.jiathis.com/code/jia.js" charset="utf-8"></script>
				<!-- JiaThis Button END -->
			</div>
		</div>
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
