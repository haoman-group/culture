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
	<style>
	
	</style>
	<link rel="stylesheet" href="{$config_siteurl}statics/cu/font/font-awesome.css" />
	<link rel="stylesheet" href="{$config_siteurl}statics/cu/festival/css/index.css" />
	<script type="text/javascript" src="{$config_siteurl}statics/cu/jquery/jquery.min.js"></script>
	<script type="text/javascript" src="{$config_siteurl}statics/cu/bootstrap/bootstrap.min.js"></script>
	<script type="text/javascript" src="{$config_siteurl}statics/cu/swiper/swiper.min.js"></script>
	<script type="text/javascript" src="{$config_siteurl}statics/cu/festival/js/index.js"></script>
</head>
<body>

<div class="container-fluid">
	<a  target="_blank" href="{:U('Recommend/show',['id'=>$notic['id']])}" >
	<div class="fes-banner">
		<div class="container text-center">
			<div id="xuanchuan" class="fes-video" style="width:760px;height:453px;" data-type="{$data.title}">
				<video style="width:760px;height:453px;"  autoplay="autoplay" controls="controls" src="{$config_siteurl}statics/video/Propaganda.mp4">
					<source src="" type="video/mp4" >视频</source>
				</video>
			</div>
			<!-- <h3>山西艺术节特别报道：永不落幕的人民艺术节</h3>
			<h4>开/幕/式/时/间 8/月/18/日-9/月/26/日  </h4> -->
			<!-- <p>7月25日，从首届山西艺术节新闻发布会上获悉，由中共山西省委宣传部、山西省文化厅、中共太原市委和太原市人民政府主办，中共山西省高等院校工作委员会、山西广播电视台、山西日报报业集团、协办的首届山西艺术节，将于8月18日至9月26日在太原举办。</p> -->
		</div>
	</div>
	</a>
	<div class="fes-nav" id="1f">
		<div class="nav">
			<div class="container">
				<ul class="row">
					<li class="col-md-2"><a  target="_blank" href="/Festival">首页</a></li>
					<li class="col-md-2"><a  target="_blank" href="{:U('Festival/Stageshow/index',['cid'=>11])}">舞台演出</a></li>
					<li class="col-md-2"><a  target="_blank" href="{:U('Festival/Themeact/index')}">主题活动</a></li>
					<li class="col-md-2"><a  target="_blank" href="{:U('Festival/Exhibition/index')}">精彩展览</a></li>
					<li class="col-md-2"><a  target="_blank" href="{:U('Recommend/index',array('cid'=>301))}">通知公告</a></li>
					<li class="col-md-2"><a  target="_blank" href="http://www.pw789.com/show/?order=hot">票务院线</a></li>
				</ul>
			</div>
		</div>
		<div class="fes-gg container clearfix">
			<div class="left">
				<h4>通知公告<span>Recommended boutique</span></h4>
				<!-- <p>为贯彻落实习近平总书记系列重要讲话精神和省委“一个指引、两手硬”重大思路和要求，全面展示近年来我省艺术创作成果，丰富人民群众精神文化生活，喜迎党的十九大胜利召开。定于2017年8月18日至9月26日举办首届山西艺术节，艺术节期间举办系列展览活动，现将有关通知发布，请按要求做好相关工作。</p> -->
				<ul>
				<li><a  target="_blank" href="{:U('Festival/Index/calendar')}">1.&nbsp;&nbsp;&nbsp;山西艺术节-日程安排通告</a></li>
				<volist name="message" id="me">
					<li><a  target="_blank" href="{:U('Festival/Recommend/show',array('id'=>$me['id']))}">{$key+2}.&nbsp;&nbsp;&nbsp;<?php echo mb_strcut($me['title'],0,60);?>。</a></li>
					</volist>
					<!--<li><a  target="_blank" href="#">2.文化部关于11届艺术节优秀美术作品...</a></li>
					<li><a  target="_blank" href="#">3.文化部关于11届艺术节优秀</a></li>
					<li><a  target="_blank" href="#">4.文化部关于11届艺术节优秀</a></li>-->
				</ul>
				<!-- <img src="{$config_siteurl}statics/cu/festival/images/index/01.jpg" alt=""> -->
			</div>
			<div class="right">
				<h4><span>直播入口</span>  <a  target="_blank" href="{:U('Festival/Live/index')}" style="margin-left:60%;color:#b89056;">More+</a></h4>
				
				<!-- <a  target="_blank" href="javascript:void(0)" class="buy-ticket"><img src="{$config_siteurl}statics/cu/festival/images/index/zhibo.png" alt="" style="box-shadow: 0 0 8px 6px rgba(153,153,153,0.35)"></a> -->
				<dl class="clearfix">
					<dt>
						<a  target="_blank" href="{:U('Festival/Live/detail',['id'=>$live[0]['id']])}">
							<img src="<?php echo empty($live[0]['image'])?($config_siteurl.'statics/cu/festival/images/index/01.jpg'):thumb($live[0]['image'],280,155,1);?>" alt="">
							<div class="top">
								<i><img src="{$config_siteurl}statics/cu/festival/images/index/logo.png" alt=""></i>
								<h5>{$live[0]['title']|default='鼓舞山西——锣鼓艺术展演'}</h5>
								<span>{$live[0]['periodical_date']|default='2017-08-25'}</span>
							</div>
							<!-- <p class="bottom">526人正在观看</p> -->
							<div class="live">● 直播</div>
						</a>
						<a  target="_blank" href="{:U('Festival/Live/detail',['id'=>$live[0]['id']])}" style="display: none;">
							<img src="<?php echo empty($live[0]['image'])?($config_siteurl.'statics/cu/festival/images/index/01.jpg'):thumb($live[0]['image'],280,155,1);?>" alt="">
							<div class="top">
								<i><img src="{$config_siteurl}statics/cu/festival/images/index/logo.png" alt=""></i>
								<h5>{$live[0]['title']|default='鼓舞山西——锣鼓艺术展演'}</h5>
								<span>{$live[0]['periodical_date']|default='2017-08-25'}</span>
							</div>
							<!-- <p class="bottom">526人正在观看</p> -->
							<div class="live">● 直播</div>
						</a>
					</dt>
					<dd>
						<a  target="_blank" href="{:U('Festival/Live/detail',['id'=>$live[1]['id']])}" class="cur">
							<img src="<?php echo empty($live[1]['image'])?($config_siteurl.'statics/cu/festival/images/index/012.jpg'):thumb($live[1]['image'],162,74,1);?>" alt="">
							<div class="top">
								<h5>{$live[1]['title']|default='舞动三晋——广场舞展演'}</h5>
								<!-- <span>08-20</span> -->
							</div></a>
						<a  target="_blank" href="{:U('Festival/Live/detail',['id'=>$live[2]['id']])}">
							<img src="<?php echo empty($live[2]['image'])?($config_siteurl.'statics/cu/festival/images/index/013.jpg'):thumb($live[2]['image'],162,74,1);?>" alt="">
							<div class="top">
								<h5>{$live[2]['title']|default='舞动三晋——广场舞展演'}</h5>
								<!-- <span>2017-08-20</span> -->
							</div>
						</a>
					</dd>
				</dl>
			</div>
		</div>
		<div class="container">
			<dl class="recommend">
				<dt>
					<div class="swiper-container">
						<div class="swiper-wrapper">
							<volist name="spare" id="vo">
							<div class="swiper-slide"><img src="{:thumb($vo['image'],542,421,1)}" alt="" style="width:542px;height:421px;"><p>{$vo['title']}</p></div>
							</volist>
						</div>
						<!-- 如果需要分页器 -->
						<div class="swiper-pagination"></div>

						<!-- 如果需要导航按钮 -->
						<!--<div class="swiper-button-prev"></div>
						<div class="swiper-button-next"></div>						-->
					</div>
					<script>
						var mySwiper = new Swiper ('.swiper-container', {
							autoplay: 5000,
							direction: 'horizontal',
							loop: true,
							paginationClickable :true,

							// 如果需要分页器
							pagination: '.swiper-pagination',

							// 如果需要前进后退按钮
							// nextButton: '.swiper-button-next',
							// prevButton: '.swiper-button-prev',
						})
					</script>
				</dt>

				<dd>

					<volist name="spare" id="v1">
					<div class="list">

						<h4><?php echo  mb_strcut($v1['title'],0,80)?></h4>
						<p style="word-wrap:break-word"><?php echo  mb_strcut(strip_tags($v1['content']),0,255)?></p>
						<!-- </a> -->
						<a  target="_blank" href="{:U('Festival/Recommend/show',array('id'=>$v1['id']))}">More+</a>
					</div>
					</volist>
				</dd>
			</dl>
		</div>
	</div>
	<div class="media container" id="2f">
		<div class="media-box">
			<div class="media-left">
				<dl>
					<dt><img src="{$config_siteurl}statics/cu/festival/images/index/02.png" alt=""></dt>
					<dd>
						<ul>
							<volist name="media" id="v2">
							<li><a  target="_blank" href="{$v2['url']}"><i>●</i>{$v2['title']} </a></li>
							</volist>
						</ul>
					</dd>
					<dt></dt>
					<dd><a target="_blank" href="{:U('Festival/Index/media')}" class="media-more">More+</a></dd>
				</dl>
			</div>
			<div class="media-right">
				<h4>在线购票窗口 <a  target="_blank" href="http://www.pw789.com/show/?order=hot">More+</a></h4>
				<a  target="_blank" href="http://www.pw789.com/show/?order=hot" class="buy-ticket"><img src="{$config_siteurl}statics/cu/festival/images/index/buy.png" alt=""></a>
			</div>
			<!-- <div class="media-right" style="width: 132px; margin-right: 24px;">
				<h4>直播入口</h4>
				<a  target="_blank" href="javascript:void(0)" class="buy-ticket"><img src="{$config_siteurl}statics/cu/festival/images/index/zhibo.png" alt="" style="box-shadow: 0 0 8px 6px rgba(153,153,153,0.35)"></a>
			</div> -->
		</div>
	</div>
	<div class="by-activity" id="3f">
		<div class="container">
			<div class="title">
				<h4>表演类活动<span>Recommended boutique</span></h4>
				<a  target="_blank" href="{:U('Festival/Stageshow/index')}">More+</a>
			</div>
			<div class="content">
				<ul class="by-top clearfix">



						<volist name="perform" id="vo" offset="0" length="3">
						<li>

						<h5><a  target="_blank" href="{:U('Stageshow/index',array('cid'=>$key))}">{$vo['categoryname']}</a></h5>
						<volist name="vo['son']" id="v1" offset="0" length="1">
						<a  target="_blank" href="{:U('Stageshow/show',array('id'=>$v1['id']))}">

							<img src="{:thumb($v1['image'],338,220,1)}" alt="">
								 <i>表演</i>

						</a>
 							<h6>{$v1['title']}</h6>
 	                    </volist>
						<volist name="vo['son']" id="v2"  offset="1" length="5">
						<dl >
						<dt><a  target="_blank" href="{:U('Stageshow/show',array('id'=>$v2['id']))}" style="margin-top:-8px;">{$v2['title']}</a></dt>

							

						</dl>
						</volist>
 	                    </volist>
				</ul>
				<ul class="by-bottom clearfix">
						<volist name="perform" id="v3" offset="3" length="2">
					<li>

					<h5><a  target="_blank" href="{:U('Stageshow/index',array('cid'=>$key))}">{$v3['categoryname']}</a></h5>
					<volist name="v3['son']" id="v4" offset="0" length="1">
					<a  target="_blank" href="{:U('Stageshow/show',array('id'=>$v4['id']))}">
						<img src="{:thumb($v4['image'],338,220,1)}" alt="">
						<i>表演</i>
						</a>
					<h6>{$v4['title']}</h6>
					</volist>
					 <volist name="v3['son']" id="v5"  offset="1" length="4">
						<dl class="clearfix">
						<dt><a  target="_blank" href="{:U('Stageshow/show',array('id'=>$v5['id']))}" style="margin-top:-8px;">{$v5['title']}</a></dt>
						
						</dl>
						</volist>

						<!--<dl class="clearfix">
							<dt>花鼓灯《家乡的红绣球》</dt>
							<dd>2017-08-03期</dd>
						</dl>
						<dl class="clearfix">
							<dt>花鼓灯《家乡的红绣球》</dt>

							<dd>2017-08-03期</dd>
 							</dl>-->

					</li>
					</volist>
					<!--<li>
						<h5>{$perform[4]['categoryname']}</h5>
						<a  target="_blank" href="javascript:void(0)">
							<div id="youkuplayer" style="width:339px;height:220px" data-type="{$perform[4]['0']['video']}"></div>
							<i>表演</i><time>{$perform[4]['0']['periodical_date']}</time>
						</a>
						<h6>{$perform[4]['0']['host_title']}《{$perform[4]['0']['deputy_title']}》</h6>
						<dl class="clearfix">
							<dt>{$perform[4]['1']['host_title']}《{$perform[4]['1']['deputy_title']}》</dt>
							<dd>{$perform[4]['1']['periodical_date']}</dd>
						</dl>
						<dl class="clearfix">
							<dt>{$perform[4]['2']['host_title']}《{$perform[4]['2']['deputy_title']}》</dt>
							<dd>{$perform[4]['2']['periodical_date']}</dd>
						</dl>
						<dl class="clearfix">
							<dt>{$perform[4]['3']['host_title']}《{$perform[4]['3']['deputy_title']}》</dt>
							<dd>{$perform[4]['3']['periodical_date']}</dd>
						</dl>
					</li>-->
				</ul>
			</div>
		</div>
	</div>
	<div class="zl-activity" id="4f">
		<div class="container">
			<div class="title">
				<h4>精彩展览<span>Recommended boutique</span></h4>
				<a  target="_blank" href="{:U('Exhibition/index')}">More+</a>
			</div>
			<div class="content">
				<div class="zl-top clearfix">
					<div class="zl-left" style="width:200px;">
						<dl>
							<volist name="exhibition" id="v6">
							<dt><a  target="_blank" href="{:U('Festival/Recommend/show',array('id'=>$v6['id']))}">{$v6['title']}</a></dt>
							<dd>
								<?php
									if(!empty($v6['start_date'])){
										echo date("Y-m-d",$v6['start_date']);
									}
									if(!empty($v6['end_date'])){
										echo "-".date("Y-m-d",$v6['end_date']);
									}
								?>
							</dd>
							</volist>
							
						</dl>
					
					</div>
						<img src="{:thumb($config_siteurl.'statics/images/why.JPG',250,213,1)}" style="width:250px;height:213px;margin-top:10px;">
					<div class="zl-right">
						<dl>
							<dt>
								<a  target="_blank" href="{:U('Festival/Recommend/show',array('id'=>$exhibition[0]['id']))}"><img src="{:thumb($exhibition[0]['image'],337,213,1)}" alt=""></a>
								
							</dt>
							<dd>
								<h5> {$exhibition[0]['title']} </h5>
								<p style="word-wrap:break-word"><?php echo  mb_strcut(strip_tags($exhibition[0]['content']),0,200)?></p>
							</dd>
						</dl>
					</div>
				</div>
				<div class="zl-bottom" id="5f">
					<div class="tit">首届三晋艺术节活动</div>
					<a  target="_blank" href="{:U('Themeact/index')}">
					<div class="theme">
						<h5>主题性活动</h5>
						<span>Thematic activities</span>
						<h6>山西省阳泉市平定武迓...</h6>
						<p>万里长城第九关——娘子关乃历代兵家必争之地，坐落在山西省平定县境内。原名苇泽关。唐初，烽火连天战乱不断，唐高祖李渊派其三女儿平...</p>
					</div>
					</a>
					<img src="{$config_siteurl}statics/cu/festival/images/index/08.png" alt="">
				</div>
				
			</div>
		</div>
	</div>

	<div class="by-activity" id="6f" style="margin-top:70px;height:auto;">
		<div class="container">
			<div class="title">
				<h4>演出活动新闻简报<span>News briefing</span></h4>
				<a  target="_blank" href="{:U('briefinglist')}">More+</a>
			</div>
			<volist name="briefing" id="br"  >
			<div class="content" >
				<div class="bre" style="margin-top:15px;width:360px;height:270px;float:left;background:#ffffff;margin-left:30px;">
				<a href="{:U('show',array('id'=>$br['id']))}"  style="color:black;" class="bref">
				<h2 style="font-size:24px;margin-left:15px;">第&nbsp;&nbsp;{$br['issue']}&nbsp;&nbsp;期</h2>
				<span style="font-size:16px;color:#a6a5a5;margin-left:15px;">演出组简报</span>
				<hr / style="width:330px;-webkit-margin-before: 0.5em;-webkit-margin-after: 0.5em;-webkit-margin-start: auto;-webkit-margin-end: auto;border-style: inset;border-width: 1px;">
				<p style="font-size:22px;width:330px;margin:auto;">{$br['title']|mb_strcut=###,0,82}..</p>
				<p style="font-size:19px;color:#a6a5a5;width:330px;margin:auto;"><?php echo mb_strcut(strip_tags($br['content']),0,180);?>...<span style="color:#b58c51;"> 【详情】</span></p>	
				</a>		
				</div>
				
				
			</div>
		</volist>
			
			
			

			
		</div>
	</div>

	<div class="by-activity" id="7f" style="height:auto;">
		<div class="container">
			<div class="title">
				<h4>演出论坛<span>Performance Forum</span></h4>
				<a  target="_blank" href="{:U('interpretlist')}">More+</a>
			</div>
			<div class="right" style="float:left;width:45%;">
				<volist name="interpret" id="in" offset="0" length="4">
					<li style="color:#b58c51;font-size:18px;"><a  target="_blank" href="{:U('interpretshow',array('id'=>$in['id']))}" style="color:black;">{$in['title']|mb_strcut=###,0,66}<span style="margin-left:20px;color:#b58c51;">>>>详情</span></a></li>
				</volist>
			</div>
			<div class="left" style="float:left;width:45%;margin-left:5%;">
				<volist name="interpret" id="in" offset="4" lenght="4">
					<li style="color:#b58c51;font-size:18px;"><a  target="_blank" href="{:U('interpretshow',array('id'=>$in['id']))}" style="color:black;">{$in['title']|mb_strcut=###,0,66}<span  style="margin-left:20px;color:#b58c51;">>>>详情</span></a></li>
				</volist>
			</div>			
		</div>
	</div>
	
	<div class="right-nav" style="height:450px;background: url(statics/cu/festival/images/index/navbar9.png) no-repeat center;">
		<ul>
			<li><a href="#1f">精品推荐</a></li>
			<li><a href="http://www.pw789.com/show/?order=hot">在线购票</a></li>
			<li><a href="#3f">表演类活动</a></li>
			<li><a href="#4f">展览性活动</a></li>
			<li><a href="#5f">主题性活动</a></li>
			<li><a href="#6f">新闻简报</a></li>
			<li><a href="#7f">演出论坛</a></li>
			<li><a href="#" style="line-height:60px;">回到顶部</a></li>
		</ul>
	</div>
</div>
<template file="Pubservice/Common/_foot"/>
</body>
</html>
<script type="text/javascript" src="http://player.youku.com/jsapi"></script>
 <volist name="perform" id="wo">
	<if condition="$wo['son']['0']['voide'] neq  '' ">
	<script type="text/javascript">
		player = new YKU.Player('youkuplayer',{
			styleid: '0',
			client_id: '{:C('YOUKU_CLIENT_ID')}',
			vid: '{$wo['son']['0']['voide']}',
			newPlayer: true
		});
	</script>
	</if>
</volist>
<script>
	$(document).ready(function(){
		$(".fes-nav .fes-gg .right dl dd a").mouseover(function(){
			var index = $(this).index();
			$(this).addClass("cur").siblings().removeClass("cur");
			$(".fes-nav .fes-gg .right dl dt a").eq(index).show().siblings().hide();
		});
	})
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


</script>
