<!DOCTYPE html>
<html lang="zh-CN">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
	<title>主题性活动-山西艺术节</title>
	<link rel="stylesheet" type="text/css" href="{$config_siteurl}statics/cu/css/base.css" />
	<link rel="stylesheet" href="{$config_siteurl}statics/cu/bootstrap/bootstrap.min.css" />
	<link rel="stylesheet" href="{$config_siteurl}statics/cu/swiper/swiper.css" />
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
	        <h1 class="logo-text">主题性活动<span>Thematic activity</span></h1>
	    </div>
	</div>
	<div class="themeact-header">
		<div class="container">
			<div class="swiper-container">
				<div class="swiper-wrapper">
				<volist name="message" id="mg">
					<div class="swiper-slide">
						<div class="theme">
							<h5>主题性活动</h5>
							<span>Thematic activities</span>
							<a target="_blank" href="{:U('Recommend/show',array('id'=>$mg['id']))}">
							<h6><?php echo mb_strcut($mg['title'],0,45)?></h6>
							<p style="word-wrap:break-word;text-indent:2em;"><?php echo  mb_strcut(strip_tags($mg['content']),0,250)?>...</p>
							</a>
						</div>
						<a target="_blank" href="{:U('Recommend/show',array('id'=>$mg['id']))}"><img src="{:thumb($mg['image'],883,355,1)}" alt="" style="width:883px;heigth:355px;"></a>
					</div>
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
					effect: 'fade',
					paginationClickable :true,

					// 如果需要分页器
					pagination: '.swiper-pagination',

					// 如果需要前进后退按钮
					// nextButton: '.swiper-button-next',
					// prevButton: '.swiper-button-prev',
				})
			</script>
		</div>
	</div>
	<div class="content">
		<div class="artweek" id="1f">
			<div class="tit">
				<div class="container clearfix">
					<h1>各市文化艺术周<br><span>Cultural Arts Week</span></h1>
					<a  target="_blank" href="{:U('lists',array('cid'=>21))}">More+</a>
				</div>
			</div>
			<div class="container">
				<div class="list">
					<ul class="clearfix">
					<volist name="cultural_arts" id="vo">
						<li>
							<a  target="_blank" href="{:U('Recommend/show',array('id'=>$vo['id']))}">
								<img src="{:thumb($vo['image'],263,397,1)}" alt="">
								<div class="shadow">
									<h5 style="word-wrap:break-word;">{$vo['title']}</h5>
									<p><?php echo  mb_strcut(strip_tags($vo['content']),0,125);?></p>
								</div>
							</a>
						</li>
						</volist>
					</ul>
				</div>
			</div>
		</div>
		<div class="culweek" id="2f">
			<div class="container">
				<div class="tit">
					<span>Campus Culture Week</span>
					<h5>校园文化周</h5>
					<a  target="_blank" href="{:U('lists',array('cid'=>22))}">More+</a>
				</div>
				<div class="list">
					<ul class="clearfix">
						<li>
						<volist name="culture_week" id="week" offset="0" length="1">

							<a  target="_blank" href="{:U('Recommend/show',array('id'=>$week['id']))}"><i>●</i>{$week['title']}</a>

							</volist>

							<a  target="_blank" href="{:U('Recommend/show',array('id'=>$culture_week['0']['id']))}"><img src="{:thumb($culture_week[0]['image'],550,450,1)}" alt="" style="width:550px;height:450px;"></a>
						</li>
						<li>
							<a  target="_blank" href="{:U('Recommend/show',array('id'=>$culture_week['1']['id']))}"><img src="{:thumb($culture_week[1]['image'],550,450,1)}" alt="" style="width:550px;height:450px;"></a>
							<volist name="culture_week" id="weekid" offset="1" length="1">
							<a  target="_blank" href="{:U('Themeact/show',array('id'=>$weekid['id']))}"><i>●</i>{$weekid['title']}</a>
							</volist>
						</li>
					</ul>
				</div>
			</div>
		</div>
		<div class="staraward" id="3f">
			<div class="container">
				<div class="tit clearfix">
					<h1>“群星奖”<br><span>Star Award</span></h1>
					 <a  target="_blank" href="{:U('lists',array('cid'=>23))}">More+</a> 
				</div>
				<div class="content1 clearfix">
					<div class="left">
						<img src="{$config_siteurl}statics/cu/festival/images/theme/04.jpg" alt="">
						<dl>
							<dt>承办单位：</dt>
							<dd>山西省文化馆、各市文化局</dd>
							<dt>协办单位：</dt>
							<dd>各市群众艺术馆</dd>
							<dt>展演时间：</dt>
							<dd>2017年8月23日至24日</dd>
							<dt>报到时间：</dt>
							<dd>8月22日下午6点前</dd>
							<dt>展演地点：</dt>
							<dd>太原市长风商务区广场</dd>
						</dl>
						<!-- <img src="{$config_siteurl}statics/cu/festival/images/theme/04.jpg" alt=""> -->
					</div>
					<div class="right">
						<img src="{$config_siteurl}statics/cu/festival/images/theme/05.jpg" alt="">
						<dl>
							<dt>第十八届“群星奖”选拔赛</dt>
							<dd>&nbsp;&nbsp;&nbsp;&nbsp;“群星奖”是文化部为繁荣群众文艺创作、推出优秀群众文艺作品、促进群众文化事业繁荣发展、提升全民文化艺术素养、激发全民族文化创造活力而设立的国家文化艺术政府奖。 为广大人民群众展示艺术才华、实现艺术理想，搭建了国家平台。</dd>
						</dl>
						<ul>
							<volist name="star_award" id="star">
								<li><a  target="_blank" href="{:U('Recommend/show',array('id'=>$star['id']))}"><i>●</i>{$star['title']}<span>>>>详情</span></a></li>
							</volist >
						</ul>
					</div>
					<div class="right" style="width:100%;">
						<dl>
							<dt>山西省历届“群星奖”获奖作品展演  <a  target="_blank" href="{:U('lists',array('cid'=>28))}" style="margin-left:27%;color:#b58c51;font-size:20px;">More+</a> </dt>	
						</dl>
						<ul>
							<volist name="art" id="art">
								<li><a  target="_blank" href="{:U('Recommend/show',array('id'=>$art['id']))}"><i>●</i>{$art['title']}<span>>>>详情</span></a></li>
							</volist >
						</ul>
					</div>
					</div>
			</div>
		</div>
		<div class="singing" id="4f">
			<div class="container clearfix">
				<div class="nm">
					<div class="tit clearfix">
						<h1>唱响山西——农民工歌手展演<br><span>Sing the Shanxi migrant workers singing contest </span></h1>
						<a  target="_blank" href="{:U('lists',array('cid'=>24))}">More+</a>
					</div>
					<div class="content clearfix">
					<a  target="_blank" href="{:U('Recommend/show',array('id'=>$singing_contest['id']))}">
						<img src="{:thumb($singing_contest['image'],227,473,1)}" alt="" style="width:277px;height:473px;">
						<p style="word-wrap:break-word;text-indent:2em;"><?php echo strip_tags(mb_strcut($singing_contest['content'],0,650));?>...</p>
						</a>
					</div>
				</div>
				<div class="gc">
					<div class="tit clearfix">
						<h1>舞动三晋——广场舞展演<br><span>Dancing Shanxi square dance contest</span></h1>
						<a  target="_blank" href="{:U('lists',array('cid'=>25))}">More+</a>
					</div>
					<div class="content">
					<a  target="_blank" href="{:U('Recommend/show',array('id'=>$dance_contest['id']))}">
						<img src="{:thumb($dance_contest['image'],572,307,1)}" alt="" style="width:572px;height:307px;">
						<p style="word-wrap:break-word;text-indent:2em;"><?php echo  strip_tags(mb_strcut($dance_contest['content'],0,255));?></p>
						</a>
					</div>
				</div>
			</div>
		</div>
		<div class="drum" id="6f">
			<div class="container clearfix">
				<div class="tit clearfix">
					<h1>鼓舞山西——锣鼓艺术展演<br><span>Inspired Shanxi Drum Art Invitational Tournament </span></h1>
					<a  target="_blank" href="{:U('lists',array('cid'=>26))}">More+</a>
				</div>
				<div class="content">
					<ul class="clearfix">
					<volist name="art_invitational" id="artvo">
						<li>
						 <a  target="_blank" href="{:U('Recommend/show',array('id'=>$artvo['id']))}">	<img src="{:thumb($artvo['image'],583,307,1)}" alt="" style="width:583.09px;height:307px;">
							<p style="word-wrap:break-word;"><?php echo mb_strcut(strip_tags($artvo['content']),0,155);?>...</p>
							</a>
						</li>
						</volist>
						<!--<li>
							<img src="{$config_siteurl}statics/cu/festival/images/theme/08.jpg" alt="">
							<p>“舞动山西·山西省首届社区广场舞大赛”在太原市万柏林区体育馆举行复赛，来自全省各地的广场舞团队展开激烈角逐。本届大赛由省社区文化促进会、山西省钰岫实业总公司、三晋都市报社等共同主办，共吸引了100多支广场舞团队参赛。</p>
						</li>-->
					</ul>
				</div>
			</div>
		</div>
      <div class="drum" id="7f">
			<div class="container clearfix">
				<div class="tit clearfix">
					<h1>文化艺术高峰论坛<br><span>Summit Forum on culture and art </span></h1>
					<a  target="_blank" href="{:U('lists',array('cid'=>27))}">More+</a>
				</div>
				<div class="content">
					<ul class="clearfix">
					<volist name="art_forum" id="forum">
						<li>
						 <a  target="_blank" href="{:U('Recommend/show',array('id'=>$forum['id']))}">	<img src="{:thumb($forum['image'],583,307,1)}" alt="" style="width:583.09px;height:307px;">
							<p style="word-wrap:break-word;"><?php echo mb_strcut(strip_tags($forum['content']),0,200);?>...</p>
							</a>
						</li>
						</volist>
						<!--<li>
							<img src="{$config_siteurl}statics/cu/festival/images/theme/08.jpg" alt="">
							<p>“舞动山西·山西省首届社区广场舞大赛”在太原市万柏林区体育馆举行复赛，来自全省各地的广场舞团队展开激烈角逐。本届大赛由省社区文化促进会、山西省钰岫实业总公司、三晋都市报社等共同主办，共吸引了100多支广场舞团队参赛。</p>
						</li>-->
					</ul>
				</div>
			</div>
		</div>
</div>
<div class="right-nav" style="top:22%;height:460px;background: url(statics/cu/festival/images/index/navbar9.png) no-repeat center;">
		<ul>
			<li><a href="#1f">市艺术周</a></li>
			<li><a href="#2f">校园文化周</a></li>
			<li><a href="#3f">群星奖</a></li>
			<li><a href="#4f">唱响山西</a></li>
			<li><a href="#4f">舞动三晋</a></li>
			<li><a href="#6f">鼓舞山西</a></li>
			<li><a href="#7f">高峰论坛</a></li>
			<li><a href="#" style="line-height:60px;">回到顶部</a></li>
		</ul>
	</div>
<template file="Pubservice/Common/_foot"/>
</body>
</html>
