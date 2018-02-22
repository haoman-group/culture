<!DOCTYPE html>
<html lang="zh-cn">

	<head>
		<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<!--<meta name="viewport" content="width=device-width, initial-scale=1">-->
	<meta name= "viewport" content= "width=device-width" initial-scale="1" minimum-scale="1" maximum-scale="1">
	<!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
	<title>公共文化</title>
	<template file="Pubservice/Common/_cssjs"/>
	<link rel="stylesheet" href="{$config_siteurl}statics/cu/css/pub-volunteer.css" />
	<link rel="stylesheet" href="{$config_siteurl}statics/cu/css/pub-resource.css" />
    <style>
		.indexMap {
			position: absolute;
			visibility: hidden;
			width: 100%;
		}
	</style>
	</head>

	<body>
		<div class="wrap">
			<template file="Pubservice/Common/_head"/>
			<div id="nav" style="height:45px !important;">
                <div class="container">
                    <ul>
                        <li>
                            <a href="/Pubservice" class="home_src">首页</a>
                        </li>
                        <li>
                            <span>></span>
                        </li>
                        <li>
                            <a href="">数字文化资源</a>
                        </li>
                        

                    </ul>
                    <form action="" method="get" target="_blank">
								<input type="hidden" name="m" value="search"/>
								<input type="hidden" name="g" value="Pubservice"/>
								<input type="hidden" name="a" value="index"/>
                        <div class="searbox">
                            <input type="text" placeholder="输入您要搜索的关键词" value=""  name="kw"/>
                            <input type="submit" id="button" value="" class="ggwh_SearchBtn" style="border: none;float:right;width:40px;right:0px !important"><i style="color:#962626" class="fa fa-search"></i>
                        </div>

                    </form>
                </div>
            </div>
			<div class="ggwh_Content">

				<div class="resoindexswiperbox">

					<div class="swiper-container gallery-thumbs">
						<div class="swiper-wrapper">
							<volist name="data" id="vo" key="k">
								<div class="swiper-slide <if condition='$k eq 3'>on <else /></if>" >
								<img src="data:image/gif;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAADUlEQVQImWNgYGBgAAAABQABh6FO1AAAAABJRU5ErkJggg==">
									<h6>{$vo.name}</h6>
								</div>

							</volist>


						</div>
					</div>
					<div class="swiper-container gallery-top">
						<div class="swiper-wrapper">

							<volist name="data" id="vo">
								<div class="swiper-slide" >
									<dl>

										<volist name="vo['child']" id="wo">

											<dd>
												<a href="{:U('lists',array('cid'=>$wo['cid']))}">
												<div class="img"><img src="{:thumb($wo['picture'],78,78,1)}" alt=""></div>
												<p class="title">{$wo.name}</p>
												</a>
											</dd>
										</volist>
									</dl>

								</div>
							</volist>

						</div>
						<!-- Add Arrows -->
						<div class="swiper-button-next swiper-button-white"></div>
						<div class="swiper-button-prev swiper-button-white"></div>
					</div>


				</div>



			</div>
			<template file="Pubservice/Common/_foot"/>
		</div>
	</body>
<script>
	var galleryTop = new Swiper('.gallery-top', {
		nextButton: '.swiper-button-next',
		prevButton: '.swiper-button-prev',
		spaceBetween: 10,
		// autoplay: 4000
	});
	var galleryThumbs = new Swiper('.gallery-thumbs', {
		spaceBetween: 10,
		centeredSlides: true,
		slidesPerView: 'auto',
		touchRatio: 0.2,
		slideToClickedSlide: true
	});
	galleryTop.params.control = galleryThumbs;
	galleryThumbs.params.control = galleryTop;
</script>
</html>