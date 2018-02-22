<!DOCTYPE html>
<html lang="zh-CN">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<template file="Pubservice/Common/_cssjs"/>
	<style>
        h1{
            margin:60px 0 0  10px ;
            text-align:center;
        }
		/*.pull-left{text-overflow:ellipsis;overflow:hidden;white-space:nowrap;width:300px;}*/
	</style>
	<script type="text/javascript" src="{$config_siteurl}statics/cu/swiper/swiper.min.js"></script>
	<!-- <<link rel="stylesheet" href="{$config_siteurl}statics/cu/swiper/swiper.css"> -->
</head>
<body class="homebg">
<!-- <div class="colm"><a href="/Festival"><img src="{$config_siteurl}statics/cu/festival/images/index/001.png" alt=""></a></div> -->
<div class="wrap">
		<!-- swiper 轮播容器 -->
			
                <h1>默认样式</h1>
				<!-- swiper 默认样式 -->
				<div class="swiper-wrap" style="width:1190px;margin:20px auto 20px auto;">
				<div class="swiper-container swiper-style-default" style="height:355px;">
					<div class="swiper-wrapper" style="margin:auto;">
						<for start="0" end="5">
							<div class="swiper-slide"  align="center">
								<if condition="isset($slideData[$i])">
									<img src="{$slideData[$i]['pub_slide']}" style="text-align:center;vertical-align:middle" >
								<else/>
									<img src="statics/cu/images/images/ggindexban{$i+1}.jpg" style="text-align:center;vertical-align:middle" >
								</if>
							</div>
						</for>
					</div>
					<!-- 导航按钮 -->
					<div class="swiper-button-prev"></div>
					<div class="swiper-button-next"></div>
					<!-- 滚动条 -->
					<div class="swiper-pagination" style="margin-right:45%;"></div>
				</div>
				<script>
					var swiper = new Swiper('.swiper-style-default',{
						nextButton: '.swiper-button-next',
						prevButton: '.swiper-button-prev',
						pagination: '.swiper-pagination',
						paginationClickable:true,
						spaceBetween: 5,
						loop:true,
						autoplay:5000,
					});
				</script>
				</div>
				<!-- swiper 默认样式 结束-->
			
                <h1>方块切换</h1>
				<!-- swiper 方块切换-->
				<div class="swiper-wrap" style="width:1190px;margin:20px auto 20px auto;">
				<div class="swiper-container swiper-container-effect-cube" style="height:355px;">
					<div class="swiper-wrapper">
						<for start="0" end="5">
							<if condition="isset($slideData[$i])">
								<div class="swiper-slide" style="background-image:url({$slideData[$i]['pub_slide']});background-repeat:no-repeat;background-position:center;" ></div>
							<else/>
								<div class="swiper-slide" style="background-image:url(/statics/cu/images/images/ggindexban{$i+1}.jpg);background-repeat:no-repeat;background-position:center;"></div>
							</if>
						</for>
					</div>
					<div class="swiper-pagination" style="margin-right:45%;"></div>
				</div>
				<script>
				var swiper = new Swiper('.swiper-container-effect-cube', {
					pagination: '.swiper-pagination',
					effect: 'cube',
					paginationClickable:true,
					grabCursor: true,
					loop:true,
					autoplay:5000,
					cube: {
						shadow: true,
						slideShadows: true,
						shadowOffset: 20,
						shadowScale: 0.94
					}
				});
				</script>
				</div>
				<!-- swiper 方块切换 结束-->

                <h1>全屏居中自动贴合</h1>
				<!-- swiper 全屏居中自动贴合  -->
				<div class="swiper-wrap" style="width:auto;margin:20px auto 20px auto;">
				<div class="swiper-container swiper-container-centered-auto">
					<div class="swiper-wrapper">
						<for start="0" end="5">
							<div class="swiper-slide"  align="center" style="width:868px;height:355px;">
								<if condition="isset($slideData[$i])">
									<img src="{$slideData[$i]['pub_slide']}" style="margin:0 auto" >
								<else/>
									<img src="statics/cu/images/images/ggindexban{$i+1}.jpg" style="margin:0 auto" >
								</if>
							</div>
						</for>
					</div>
					<!-- Add Pagination -->
					<div class="swiper-pagination" style="margin-right:45%;"></div>
				</div>
				<script>
				var swiper = new Swiper('.swiper-container-centered-auto', {
					pagination: '.swiper-pagination',
					slidesPerView: 'auto',
					centeredSlides: true,
					paginationClickable: true,
					spaceBetween: 30,
					loop:true,
					autoplay:5000,
					paginationClickable:true,
				});
				</script>
				</div>
				<!-- swiper 全屏居中自动贴合  结束-->
            
                <h1>3D覆盖流效果</h1>
				<!-- swiper 3D覆盖流效果  -->
				<div class="swiper-wrap" style="width:auto;margin:20px auto 20px auto;">
				<div class="swiper-container swiper-container-effect-coverflow" style="height:355px;">
					<div class="swiper-wrapper">
						<for start="0" end="5">
							<if condition="isset($slideData[$i])">
								<div class="swiper-slide" style="width:868px;background-image:url({$slideData[$i]['pub_slide']});background-repeat:no-repeat;background-position:center center ;" ></div>
							<else/>
								<div class="swiper-slide" style="width:868px;background-image:url(/statics/cu/images/images/ggindexban{$i+1}.jpg);background-repeat:no-repeat;background-position:center center ;" ></div>
							</if>
						</for>
					</div>
					<!-- Add Pagination -->
					<div class="swiper-pagination" style="margin-right:45%;"></div>
				</div>
				<script>
				var swiper = new Swiper('.swiper-container-effect-coverflow', {
					pagination: '.swiper-pagination',
					paginationClickable: true,
					effect: 'coverflow',
					grabCursor: true,
					centeredSlides: true,
					slidesPerView: 'auto',
					coverflow: {
						rotate: 50,
						stretch: 0,
						depth: 100,
						modifier: 1,
						slideShadows : true
					},
					loop:true,
					autoplay:5000,
					paginationClickable:true,
				});
				</script>
				</div>
				<!-- swiper 3D覆盖流效果  结束-->
			
		<!-- swiper 轮播容器 结束-->



			<!-- 原始公共轮播块 -->
            
            <h1>默认效果</h1>
			<div class="layslidewrap" >

				<ul class="d_img">
					<li class="d_pos3"><a target="_blank" href="<if condition="$slideData['0']['pub_slide'] neq '' ">{$slideData['0']['picture_url']}<else/>###</if>"><img src="<?=!empty($slideData[0]['pub_slide'])?thumb($slideData[0]['pub_slide'],868,355,1):$config_siteurl.'statics/cu/images/images/ggindexban1.jpg';?>" alt="" /></a></li>
					<li class="d_pos2"><a target="_blank" href="<if condition="$slideData['1']['pub_slide'] neq '' ">{$slideData['1']['picture_url']}<else/>###</if>"><img src="<?=!empty($slideData[1]['pub_slide'])?thumb($slideData[1]['pub_slide'],868,355,1):$config_siteurl.'statics/cu/images/images/ggindexban2.jpg';?>" alt=""/></a></li>
					<li class="d_pos1"><a target="_blank" href="<if condition="$slideData['2']['pub_slide'] neq '' ">{$slideData['2']['picture_url']}<else/>###</if>"><img src="<?=!empty($slideData[2]['pub_slide'])?thumb($slideData[2]['pub_slide'],868,355,1):$config_siteurl.'statics/cu/images/images/ggindexban3.jpg';?>" alt=""/></a></li>
					<li class="d_pos4"><a target="_blank" href="<if condition="$slideData['3']['pub_slide'] neq '' ">{$slideData['3']['picture_url']}<else/>###</if>"><img src="<?=!empty($slideData[3]['pub_slide'])?thumb($slideData[3]['pub_slide'],868,355,1):$config_siteurl.'statics/cu/images/images/ggindexban4.jpg';?>" alt=""/></a></li>
					<li class="d_pos5"><a target="_blank" href="<if condition="$slideData['4']['pub_slide'] neq '' ">{$slideData['4']['picture_url']}<else/>###</if>"><img src="<?=!empty($slideData[4]['pub_slide'])?thumb($slideData[4]['pub_slide'],868,355,1):$config_siteurl.'statics/cu/images/images/ggindexban5.jpg';?>" alt=""/></a></li>
				</ul>
				<ul class="d_menu"></ul>
				<p class="d_prev"><img src="{$config_siteurl}statics/cu/images/images/pubbanarrl.png" alt=""><i></i></p>
				<p class="d_next"><img src="{$config_siteurl}statics/cu/images/images/pubbanarrr.png" alt=""><i></i></p>
			</div>
			<!-- 原始公共轮播块 结束-->
</div>
</body>
</html>