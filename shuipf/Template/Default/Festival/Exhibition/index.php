<!DOCTYPE html>
<html lang="zh-CN">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
	<title>精彩展览-山西艺术节</title>
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
	        <h1 class="logo-text">精彩展览<span>Recommended boutique</span></h1>
	    </div>
	</div>
	<div class="themeact-header">
		<div class="container">
			<div class="swiper-container">
				<div class="swiper-wrapper">
				<volist name="message" id="mg">
					<div class="swiper-slide">
						<div class="theme">
							<h5>精彩展览</h5>
							<span>Thematic activities</span>
							<a  target="_blank" href="{:U('Recommend/show',array('id'=>$mg['id']))}">
							<h6><?php echo mb_strcut($mg['title'],0,45)?></h6>
							<p style="word-wrap:break-word:text-indent:2em;"><?php echo  mb_strcut(strip_tags($mg['content']),0,250)?>...</p>
							</a>
						</div>
						<a  target="_blank" href="{:U('Recommend/show',array('id'=>$mg['id']))}">
						<img src="{:thumb($mg['image'],883,355,1)}" alt="" style="width:883px;heigth:355px;">
						</a>
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
					<h1>时代华章——首届山西艺术节美术作品展<br><span>Exhibition of Fine Arts</span></h1>
					<a  target="_blank" href="{:U('Recommend/index',array('cid'=>201))}">More+</a>
				</div>
			</div>
			<div class="container">
				<div class="list">
					<ul class="clearfix">
					<volist name="exhibition" id="vo">
						<li>
							<a  target="_blank" href="{:U('Recommend/show',array('id'=>$vo['id']))}">
								<img src="{:thumb($vo['image'],263,397,1)}" alt="">
								<div class="shadow">
									<h5>{$vo['title']}</h5>
									<p><?php echo mb_strcut($vo['content'],0,125);?></p>
								</div>
							</a>
						</li>
						</volist>
					</ul>
				</div>
			</div>
		</div>
		<div class="culweek"  id="2f">
			<div class="container">
				<div class="tit">
					<span>Painting paintings exhibition</span>
					<h5>翰逸神飞——山西画院藏画精品展</h5>
					<a  target="_blank" href="{:U('Recommend/index',array('cid'=>202))}">More+</a>
				</div>
				<div class="list">
					<ul class="clearfix">
						<li>
						<volist name="painting" id="week" offset="0" length="5">
							<a  target="_blank" href="{:U('Recommend/show',array('id'=>$week['id']))}"><i>●</i>{$week['title']}</a>
							
							</volist>
							
							<a  target="_blank" href="{:U('Recommend/show',array('id'=>$painting['5']['id']))}"><img src="{:thumb($painting[5]['image'],500,100,1)}" alt="" style="width:500px;height:100px;"></a>
						</li>
						<li>
							<a  target="_blank" href="{:U('Recommend/show',array('id'=>$painting['6']['id']))}"><img src="{:thumb($painting[6]['image'],500,100,1)}" alt="" style="width:500px;height:100px;"></a>
							<volist name="painting" id="weekid" offset="7" length="5">
							<a  target="_blank" href="{:U('Recommend/show',array('id'=>$weekid['id']))}"><i>●</i>{$weekid['title']}</a>
							
							</volist>
							<!--<a  target="_blank" href="javascript:void(0)"><i>●</i>山投集团高新建设开发有限公司举办第三届职工文化艺术节</a>
							<a  target="_blank" href="javascript:void(0)"><i>●</i>中铝山西企业举办企业文化艺术节</a>
							<a  target="_blank" href="javascript:void(0)"><i>●</i>山投集团高新建设开发有限公司举办第三届职工文化艺术节</a>
							<a  target="_blank" href="javascript:void(0)"><i>●</i>中铝山西企业举办企业文化艺术节</a>-->
						</li>
					</ul>
				</div>
			</div>
		</div>

		<div class="drum"  id="3f">
			<div class="container clearfix">
				<div class="tit clearfix">
					<h1>塑说三晋——首届山西艺术节雕塑作品展<br><span>Sculpture Exhibition</span></h1>
					<a  target="_blank" href="{:U('Recommend/index',array('cid'=>203))}">More+</a>
				</div>
				<div class="content">
					<ul class="clearfix">
					<volist name="sculpture" id="mu">
						<li>
						<a  target="_blank" href="{:U('Recommend/show',array('id'=>$mu['id']))}">
							<img src="{:thumb($mu['image'],583.09,307,1)}" alt="" style="width:583.09px;height:307px;">
							<p style="word-wrap:break-word"><?php echo mb_strcut($mu['content'],0,255);?></p>
							</a>
						</li>
						</volist>
					</ul>
				</div>
			</div>
		</div>

		<div class="singing"  id="4f">
			<div class="container clearfix">
				<div class="nm">
					<div class="tit clearfix">
						<h1>“翰墨三晋”--书法篆刻作品展<br><span>Shanxi calligraphy -- calligraphy exhibition </span></h1>
						<a  target="_blank" href="{:U('Recommend/index',array('cid'=>204))}">More+</a>
					</div>
					<div class="content clearfix">
					<a  target="_blank" href="{:U('Recommend/show',array('id'=>$calligraphy['id']))}">
						<img src="{:thumb($calligraphy['image'],277,473,1)}" alt="" style="width:277px;height:473px;">
						<p style="word-wrap:break-word"><?php echo mb_strcut($calligraphy['content'],0,255);?></p>
						</a>
					</div>
				</div>
				<div class="gc">
					<div class="tit clearfix">
						<h1 style="font-size:22px;">人说山西好风光——百位书法名家书法作品邀请展<br><span>Invitational  of calligraphy works by hundreds </span></h1>
						<a  target="_blank" href="{:U('Recommend/index',array('cid'=>205))}">More+</a>
					</div>
					<div class="content">
					<a  target="_blank" href="{:U('Recommend/show',array('id'=>$invitational['id']))}">
						<img src="{:thumb($invitational['image'],572,307,1)}" alt="" style="width:572px;height:307px;">
						<p style="word-wrap:break-word"><?php echo mb_strcut($invitational['content'],0,255);?></p>
						</a>
					</div>
				</div>
			</div>
		</div>
		<div class="drum"  id="6f">
			<div class="container clearfix">
				<div class="tit clearfix">
					<h1>壮美山西——首届山西艺术节网络摄影展<br><span>"Magnificent Shanxi -- online photography exhibition of the first Shanxi Art Festival </span></h1>
					<a  target="_blank" href="{:U('Recommend/index',array('cid'=>206))}">More+</a>
				</div>
				<div class="content">
					<ul class="clearfix">
					<volist name="photography" id="artvo">
						<li>
						<a  target="_blank" href="{:U('Recommend/show',array('id'=>$artvo['id']))}">
							<img src="{:thumb($artvo['image'],583.09,307,1)}" alt="" style="width:583.09px;height:307px;">
							<p style="word-wrap:break-word"><?php echo mb_strcut($artvo['content'],0,255);?></p>
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
		
		<div class="drum"  id="7f">
			<div class="container clearfix">
				<div class="tit clearfix">
					<h1>粉墨传神——首届山西艺术节舞台艺术摄影作品展<br><span>Exhibition of stage photography art </span></h1>
					<a  target="_blank" href="{:U('Recommend/index',array('cid'=>207))}">More+</a>
				</div>
				<div class="content">
					<ul class="clearfix">
					<volist name="stage" id="st">
						<li>
						<a  target="_blank" href="{:U('Recommend/show',array('id'=>$stage['id']))}">
							<img src="{:thumb($st['image'],583.09,307,1)}" alt="" style="width:583.09px;height:307px;">
							<p style="word-wrap:break-word"><?php echo mb_strcut($st['content'],0,255);?></p>
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


		<div class="artweek"  id="8f">
			<div class="tit">
				<div class="container clearfix">
					<h1>古韵拾遗——首届山西艺术节非物质文化遗产展<br><span>Intangible cultural heritage performance</span></h1>
					<a  target="_blank" href="{:U('Recommend/index',array('cid'=>209))}">More+</a>
				</div>
			</div>
			<div class="container">
				<div class="list">
					<ul class="clearfix">
					<volist name="immaterial" id="im">
						<li>
							<a  target="_blank" href="{:U('Recommend/show',array('id'=>$im['id']))}">
								<img src="{:thumb($im['image'],263,397,1)}" alt="">
								<div class="shadow">
									<h5>{$im['title']}</h5>
									<p><?php echo mb_strcut($im['content'],0,125);?></p>
								</div>
							</a>
						</li>
						</volist>
					
					</ul>
				</div>
			</div>
		</div>
		<div class="artweek"  id="9f">
			<div class="tit">
				<div class="container clearfix">
					<h1 style="font-size:22px;">梦从这里出发——山西省高校学生优秀美术作品展<br><span>Fine art exhibition of graduation season </span></h1>
					<a  target="_blank" href="{:U('Recommend/index',array('cid'=>210))}">More+</a>
				</div>
			</div>
			<div class="container">
				<div class="list">
					<ul class="clearfix">
					<volist name="graduation" id="wo1">
						<li>
							<a  target="_blank" href="{:U('Recommend/show',array('id'=>$wo1['id']))}">
								<img src="{:thumb($wo1['image'],263,387,1)}" alt="">
								<div class="shadow">
									<h5>{$wo1['title']}</h5>
									<p><?php echo mb_strcut($wo1['content'],0,125);?></p>
								</div>
							</a>
						</li>
					</volist>
					</ul>
				</div>
			</div>
		</div>

		<div class="drum"  id="10f">
			<div class="container clearfix">
				<div class="tit clearfix">
					<h1>千年丹青——山西古代壁画掇英展<br><span>Shanxi ancient murals and EXCELL </span></h1>
					<a  target="_blank" href="{:U('Recommend/index',array('cid'=>212))}">More+</a>
				</div>
				<div class="content">
					<ul class="clearfix">
					<volist name="murals" id="mu">
						<li>
						<a  target="_blank" href="{:U('Recommend/show',array('id'=>$mu['id']))}">
							<img src="{:thumb($mu['image'],583.09,307)}" alt="" style="width:583.09px;height:307px;">
							<p style="word-wrap:break-word"><?php echo mb_strcut($mu['content'],0,255);?></p>
							</a>
						</li>
						</volist>
					</ul>
				</div>
			</div>
		</div>
		<div class="artweek" id="11f">
			<div class="tit">
				<div class="container clearfix">
					<h1>“艺术山西”--艺术作品展<br><span>Art Shanxi -- Exhibition of art works</span></h1>
					<a  target="_blank" href="{:U('Recommend/index',array('cid'=>213))}">More+</a>
				</div>
			</div>
			<div class="container">
				<div class="list">
					<ul class="clearfix">
					<volist name="works" id="wo">
						<li>
							<a  target="_blank" href="{:U('Recommend/show',array('id'=>$wo['id']))}">
								<img src="{:thumb($wo['image'],263,387,1)}" alt="">
								<div class="shadow">
									<h5>{$wo['title']}</h5>
									<p><?php echo mb_strcut($wo['content'],0,125);?></p>
								</div>
							</a>
						</li>
						</volist>
					</ul>
				</div>
			</div>
		</div>
		<div class="drum" id="12f">
			<div class="container clearfix" >
				<div class="tit clearfix">
					<h1>风情山西——首届山西艺术节民俗民居美术摄影展<br><span>The first Shanxi Art Festival folk folk art photography exhibition </span></h1>
					<a  target="_blank" href="{:U('Recommend/index',array('cid'=>214))}">More+</a>
				</div>
				<div class="content">
					<ul class="clearfix">
					<volist name="fine" id="fi">
						<li>
						<a  target="_blank" href="{:U('Recommend/show',array('id'=>$fi['id']))}">
							<img src="{:thumb($fi['image'],583.09,307)}" alt="" style="width:583.09px;height:307px;">
							<p style="word-wrap:break-word"><?php echo mb_strcut($fi['content'],0,255);?></p>
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
</div>
<div class="right-nav" style="top:12%;height:660px;background: url(statics/cu/festival/images/index/navbar13.png) no-repeat center;">
		<ul>
			<li><a href="#1f">时代华章</a></li>
			<li><a href="#2f">翰逸神飞</a></li>
			<li><a href="#3f">塑说三晋</a></li>
			<li><a href="#4f">翰墨三晋</a></li>
			<li><a href="#4f">山西好风光</a></li>
			<li><a href="#6f">壮美山西</a></li>
			<li><a href="#7f">粉墨传神</a></li>
			<li><a href="#8f">古韵拾遗</a></li>
			<li><a href="#9f">梦从这里</a></li>
			<li><a href="#10f">千年丹青</a></li>
			<li><a href="#11f">艺术山西</a></li>
			<li><a href="#12f">风情山西</a></li>
			<li><a href="#" style="line-height:60px;">回到顶部</a></li>
		</ul>
	</div>
<template file="Pubservice/Common/_foot"/>
</body>
</html>
