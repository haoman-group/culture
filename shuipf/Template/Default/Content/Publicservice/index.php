<!DOCTYPE html>
<html lang="zh-CN">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
	<title>公共文化</title>
	<link rel="stylesheet" href="{$config_siteurl}statics/cu/bootstrap//bootstrap.min.css" />
	<link rel="stylesheet" href="{$config_siteurl}statics/cu/swiper/swiper.css" />
	<link rel="stylesheet" href="{$config_siteurl}statics/cu/pignose/css/pignose.tab.min.css" />
	<link rel="stylesheet" href="{$config_siteurl}statics/cu/font/sinaFaceAndEffec.css" />
	<link rel="stylesheet" href="{$config_siteurl}statics/cu/css/public-service.css" />
	<link rel="stylesheet" href="{$config_siteurl}statics/cu/font/font-awesome.css" />
	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
	<script src="//cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	<script src="//cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
	<![endif]-->
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
	<header class="header">
		<div class="headerTop">
			<!-- <script type="text/javascript">document.write('<iframe src="http://218.26.115.226:81/index.php?m=member&c=index&a=mini&forward='+encodeURIComponent(location.href)+'&siteid=1" allowTransparency="true"  width="100%" frameborder="0" scrolling="no"></iframe>')</script> -->
			<!--<div class="ggwh_Content"><span class="pull-left"><a href="#">网站首页</a><span class="gang">|</span>
						<a href="#">收藏本站</a><span style="margin-left: 20px;"><i style="color: #93262A;margin-right: 3px;" class="glyphicon glyphicon-map-marker"></i>太原</span>
						</span><span class="pull-right"><a href="index.php?m=member&c=index&a=login">登录</a><span class="gang">|</span>
						<a href="index.php?m=member&c=index&a=register&siteid=1">注册</a>
						</span>
				<div class="clearfix"></div>
			</div>-->
			<div class="ggwh_Content"><span class="pull-left"><a href="#">网站首页</a><span class="gang">|</span>
						<a href="#">收藏本站</a><span style="margin-left: 20px;"><!-- <i style="color: #93262A;margin-right: 3px;" class="glyphicon glyphicon-map-marker"></i>太原 --></span>
						</span><span class="pull-right"><a href="../common/login.html">登录</a><span class="gang">|</span>
						<a href="../common/register.html">注册</a>
						</span>
				<div class="clearfix"></div>
			</div>

		</div>
		<div class="ggwh_Header">
			<div class="ggwh_Logo">
				<a href="../index.html"><img src="{$config_siteurl}statics/cu/images/public-service/logo.png" /></a>
			</div>
			<div class="nav">
				<ul>
					<li>						
						<a href="activity.html" id="catid_10">文化活动</a>						
						<p style="width: 75px" class="smallFont">Cultural Activity</p>
					</li>
					<li>						
						<a href="facility.html" id="catid_14">文化设施</a>						
						<p style="width: 80px" class="smallFont">Cultural Facilities</p>
					</li>
					<li>					
						<a href="resourse.html" id="catid_192">文化资源展馆</a>
						<p style="width: 130px" class="smallFont">Cultural Resources Pavilion</p>
					</li>
					<li>					
						<a href="landmark.html" id="catid_105">文化地标</a>
						<p style="width:88px" class="smallFont">Cultural Landmark</p>
					</li>
					<li>					
						<a href="volunteer.html" id="catid_101">文化志愿者</a>						
						<p style="width:90px" class="smallFont">Cultural volunteers</p>
					</li>
					<li class="last-item">						
						<a href="publicity.html" id="catid_67">基本服务项目公示</a>						
						<p style="width:80px" class="smallFont">Basic public services</p>
					</li>
				</ul>
				<div class="cls"></div>
			</div>
		</div>
	</header>
			<div class="ggwh_Banner">
				<!-- Swiper -->
				<div class="swiper-container">
					<div class="swiper-wrapper">
						<div class="swiper-slide" style="background-image: url({$config_siteurl}statics/cu/images/public-service/ggfwBanner1.jpg);"></div>
						<div class="swiper-slide" style="background-image: url({$config_siteurl}statics/cu/images/public-service/banner2.jpg);"></div>
						<div class="swiper-slide" style="background-image: url({$config_siteurl}statics/cu/images/public-service/banner3.jpg);"></div>
					</div>
					<!-- Add Pagination -->
					<div class="swiper-pagination"></div>
					<!-- Add Arrows -->
					<div class="swiper-button-next"></div>
					<div class="swiper-button-prev"></div>
				</div>

				<div class="ggwh_Content">
					<div class="subMenu a">
						<div class="innerBox" style="background-image: url({$config_siteurl}statics/cu/images/public-service/fe.png);background-size: cover;">
							<div class="subInnerBox">
								<div class="title">分类目录</div>
								<a href="">老年大学</a><span class="ml10 mr10">/</span>
								<a href="">少儿培训</a><span class="ml10 mr10">/</span>
								<a href="">基层辅导</a><span class="ml10 mr10">/</span>
								<a href="">群文讲座</a>

								<div class="title recommend">推荐</div>
								 <p class="h32">
									<a href="" id="catid_10">税务管理与策划</a>
								</p>
								<p class="h32">
									<a href="" id="catid_10">传统文化与幸福人生</a>
								</p>
								<p class="h32">
									<a href="" id="catid_10">太原市老年大学</a>
								</p>
							</div>
						</div>
					</div>
					<div class="subMenu b">
						<div class="innerBox" style="background-image: url({$config_siteurl}statics/cu/images/public-service/be.png);background-size: cover;">
							<div class="subInnerBox">
								<div class="title">分类目录</div>
								<a href="">图书馆</a><span class="ml10 mr10">/</span>
								<a href="">群艺馆</a><span class="ml10 mr10">/</span>
								<a href="">博物馆</a><span class="ml10 mr10">/</span>
								<a href="">美术馆</a><span class="ml10 mr10">/</span>
								<a href="">科技馆</a><span class="ml10 mr10">/</span>
								<a href="">体育馆</a>

								<div class="title recommend">推荐</div>
								 <p class="h32">
									<a href="" id="catid_10">“弘扬红色经典，传承清廉家风”剪纸艺术作品展</a>
								</p>
								<p class="h32">
									<a href="" id="catid_10">“格桑花开”老西藏书画摄影作品展</a>
								</p>
								<p class="h32">
									<a href="" id="catid_10">话和画—当代艺术新锐推荐展</a>
								</p>
							</div>
						</div>
					</div>
					<div class="subMenu c">
						<div class="innerBox" style="background-image: url({$config_siteurl}statics/cu/images/public-service/mobile.png);background-size: cover;">
							<div class="subInnerBox">
								<div class="title">分类目录</div>
								<a href="">文化惠民</a><span class="ml10 mr10">/</span>
								<a href="">群文赛事</a><span class="ml10 mr10">/</span>
								<a href="">品牌活动</a>
								<div class="title recommend">推荐</div>
								<p class="h32">
									<a href="" id="catid_10">送戏下乡 温暖民心</a>
								</p>
								<p class="h32">
									<a href="" id="catid_10">山西省第十七届“群星奖”比赛</a>
								</p>
								<p class="h32">
									<a href="" id="catid_10">书画中国梦·第二届“梦想杯”书画大赛</a>
								</p>
							</div>
						</div>
					</div>
					<div class="subMenu d">
						<div class="innerBox" style="background-image: url({$config_siteurl}statics/cu/images/public-service/data.png);background-size: cover;">
							<div class="subInnerBox">
								<div class="title">分类目录</div>
								<a href="">省群艺馆</a><span class="ml10 mr10">/</span>
								<a href="">市群艺馆</a><span class="ml10 mr10">/</span>
								<a href="">县群艺馆</a><span class="ml10 mr10">/</span>
								<a href="">社会团队</a>
								<div class="title recommend">推荐</div>
								<p class="h32">
									<a href="" id="catid_10">山西省群众艺术馆艺术团</a>
								</p>
								<p class="h32">
									<a href="" id="catid_10">山西省群众文化学会戏友专业委员会</a>
								</p>
								<p class="h32">
									<a href="" id="catid_10">山西省合唱协会</a>
								</p>
							</div>
						</div>
					</div>

					<div class="bannerMenuBg" style="opacity: 0.6;"></div>
					<div class="bannerMenuContent">
						<div class="item" data-id="a">
							<div class="box">
								<a href="content1.html" target="_blank" >
									<p class="group">辅导培训</p>
								</a>
								<p class="detail">
									<a href="content11.html" target="_blank">群文讲座</a>
									<a href="content1.html" target="_blank">老年大学</a>
									<a href="content1.html" target="_blank" class="last-item">少儿培训</a>
								</p>
							</div>

						</div>
						<div class="item" data-id="b">
							<div class="box">
								<a href="content2.html" target="_blank" >
									<p class="group">文化展览</p>
								</a>
								<p class="detail">
									<a href="content2.html" target="_blank">图书馆</a>
									<a href="content2.html" target="_blank">群艺馆</a>
									<a href="content2.html" target="_blank" class="last-item">博物馆</a>
								</p>
							</div>

						</div>
						<div class="item" data-id="c">
							<div class="box">
								<a href="content3.html" target="_blank">
									<p class="group">群文活动</p>
								</a>
								<p class="detail">
									<a href="content3.html" target="_blank">文化惠民</a>
									<a href="content3.html" target="_blank">群文赛事</a>
									<a href="content3.html" class="last-item" target="_blank">品牌活动</a>
								</p>
							</div>
						</div>
						<div class="item" data-id="d">
							<div class="box">
								<a href="content4" target="_blank">
									<p class="group">社会团体</p>
								</a>
								<p class="detail">
									<a href="content4" target="_blank">省群艺馆</a>
									<a href="content4" target="_blank">市群艺馆</a>
									<a href="content4" class="last-item" target="_blank">县群艺馆</a>
								</p>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="ggwh_Content" style="padding:20px 0px;">
				<div class="row">
					<div class="col-md-4 ggwh_SearchRm">
						<div class="col-md-3">
							<h4>热门搜索：</h4>
						</div>
						<div class="col-md-8" style="white-space:nowrap;">
							<a href="#">晋剧</a>
							<a href="#">山西特色</a>
							<a href="#">晋祠</a>
							<a href="#">五台山</a>
						</div>
					</div>
					<div class="col-md-8" style="position: relative;">
						<form action="" method="get" target="_blank">
						<input type="hidden" name="m" value="search"/>
						<input type="hidden" name="c" value="index"/>
						<input type="hidden" name="a" value="init"/>
						<input type="hidden" name="typeid" value="" id="typeid"/>
						<input type="hidden" name="siteid" value="1" id="siteid"/>
						<input class="form-control ggwh_Search"  name="q" id="q" placeholder="输入您要搜索的关键词" />
						<input type="submit" id="button" href="ggwh_SearchList.html" value="" class="ggwh_SearchBtn" style="border: none;"></input>
						</form>
					</div>
				</div>
			</div>
			<div class="ggwh_Content">
				<div class="content1Left pull-left">
					<div class="tab">
						<ul>
							<li>
								<a href="#">演出</a>
								<div>									 
									<div class="row ggwh_Yc">
										<div class="col-md-3 ggwh_YcImg">
											<a href="content1.html"><img src="{$config_siteurl}statics/cu/images/public-service/20161009081950585.jpg" /></a>
										</div>
										<div class="col-md-5 ggwh_YcMain">
											<h4>山西校园首届“赶集网杯”大学生模特大赛</h4>
											<p>活动时间：2016-10-09 20:18:00</p>
											<p>活动地点：文化体育服务中心三楼多功能厅</p>
										</div>
										<div class="col-md-3 col-md-offset-1 ggwh_YcBtn">
											<a href="content1.html">预定</a>
										</div>
									</div>									
									<div class="row ggwh_Yc">
										<div class="col-md-3 ggwh_YcImg">
											<a href="content1.html"><img src="{$config_siteurl}statics/cu/images/public-service/20161010102526102.jpg" /></a>
										</div>
										<div class="col-md-5 ggwh_YcMain">
											<h4>匈牙利巴尔托克-贝拉男声合唱团音乐会</h4>
											<p>活动时间：2016-10-10 10:24:00</p>
											<p>活动地点：文化体育服务中心三楼多功能厅</p>
										</div>
										<div class="col-md-3 col-md-offset-1 ggwh_YcBtn">
											<a href="content1.html">预定</a>
										</div>
									</div>									
									<div class="row ggwh_Yc">
										<div class="col-md-3 ggwh_YcImg">
											<a href="content1.html"><img src="{$config_siteurl}statics/cu/images/public-service/20161009082139132.jpg" /></a>
										</div>
										<div class="col-md-5 ggwh_YcMain">
											<h4> 桌面木偶剧《这头小狼心太软》-午场</h4>
											<p>活动时间：2016-10-09 20:20:00</p>
											<p>活动地点：文化体育服务中心三楼多功能厅</p>
										</div>
										<div class="col-md-3 col-md-offset-1 ggwh_YcBtn">
											<a href="content1.html">预定</a>
										</div>
									</div>
								</div>
							</li>
							<li>
								<a href="#">讲座</a>
								<div>
									<div class="row ggwh_Yc">
										<div class="col-md-3 ggwh_YcImg">
											<a href="content1.html"><img src="{$config_siteurl}statics/cu/images/public-service/20161011032957865.jpg" /></a>
										</div>
										<div class="col-md-5 ggwh_YcMain">
											<h4>税务管理与策划</h4>
											<p>活动时间：2016-09-26 00:00:00</p>
											<p>活动地点：山西省图书馆文苑厅</p>
										</div>
										<div class="col-md-3 col-md-offset-1 ggwh_YcBtn">
											<a href="content1.html">预定</a>
										</div>
									</div>									
									<div class="row ggwh_Yc">
										<div class="col-md-3 ggwh_YcImg">
											<a href="content1.html"><img src="{$config_siteurl}statics/cu/images/public-service/20161011033036745.jpg" /></a>
										</div>
										<div class="col-md-5 ggwh_YcMain">
											<h4>传统文化与幸福人生</h4>
											<p>活动时间：2016-10-11 14:00:00</p>
											<p>活动地点：山西省图书馆多功能厅</p>
										</div>
										<div class="col-md-3 col-md-offset-1 ggwh_YcBtn">
											<a href="content1.html">预定</a>
										</div>
									</div>									
									<div class="row ggwh_Yc">
										<div class="col-md-3 ggwh_YcImg">
											<a href="content1.html"><img src="{$config_siteurl}statics/cu/images/public-service/20160928023247525.jpg" /></a>
										</div>
										<div class="col-md-5 ggwh_YcMain">
											<h4>太原市老年大学</h4>
											<p>活动时间：2016-09-28 16:00:00</p>
											<p>活动地点：太原市老年大学</p>
										</div>
										<div class="col-md-3 col-md-offset-1 ggwh_YcBtn">
											<a href="content1.html">预定</a>
										</div>
									</div>									 
								</div>
							</li>
							<li>
								<a href="#">展览</a>
								<div>									 
									<div class="row ggwh_Yc">
										<div class="col-md-3 ggwh_YcImg">
											<a href="content1.html"><img src="{$config_siteurl}statics/cu/images/public-service/20160929024843703.jpg" /></a>
										</div>
										<div class="col-md-5 ggwh_YcMain">
											<h4>“弘扬红色经典，传承清廉家风”剪纸艺术作品展</h4>
											<p>活动时间：2016-09-17 09:00:00</p>
											<p>活动地点：山西省图书馆第二展厅</p>
										</div>
										<div class="col-md-3 col-md-offset-1 ggwh_YcBtn">
											<a href="content1.html">订票</a>
										</div>
									</div>									
									<div class="row ggwh_Yc">
										<div class="col-md-3 ggwh_YcImg">
											<a href="content1.html"><img src="{$config_siteurl}statics/cu/images/public-service/20160929033627737.jpg" /></a>
										</div>
										<div class="col-md-5 ggwh_YcMain">
											<h4>“格桑花开”老西藏书画摄影作品展</h4>
											<p>活动时间：2016-09-23 09:00:00</p>
											<p>活动地点：山西文体中心B2楼书画苑（古猗园路737号）</p>
										</div>
										<div class="col-md-3 col-md-offset-1 ggwh_YcBtn">
											<a href="content1.html">免票</a>
										</div>
									</div>									
									<div class="row ggwh_Yc">
										<div class="col-md-3 ggwh_YcImg">
											<a href="content1.html"><img src="{$config_siteurl}statics/cu/images/public-service/20161013114510684.jpg" /></a>
										</div>
										<div class="col-md-5 ggwh_YcMain">
											<h4>“祖国好 家乡美”第八届网络摄影大赛优秀作品展</h4>
											<p>活动时间：2016-09-22 09:00:00</p>
											<p>活动地点：山西省群众艺术馆</p>
										</div>
										<div class="col-md-3 col-md-offset-1 ggwh_YcBtn">
											<a href="content1.html">免票</a>
										</div>
									</div>

								</div>
							</li>
							<a href="" class="pull-right ggwh_More">
								MORE+
							</a>

						</ul>
					</div>
				</div>
				<div class="content1Right pull-right">
					<div class="top">
						<h3>最新推荐</h3>
					</div>
					<div class="ggwh_Tj">
						<ul class="ggwh_TjUl">
							<li>
								<a href="#">
									<img src="{$config_siteurl}statics/cu/images/public-service/ggwh_Tj1.jpg" />
									<div class="txt">
										<h5>舞蹈</h5>
										<p>Dance</p>
									</div>
								</a>
							</li>
							<li class="last-item">
								<a href="#">
									<img src="{$config_siteurl}statics/cu/images/public-service/ggwh_Tj2.jpg" />
									<div class="txt">
										<h5>戏剧</h5>
										<p>Drama</p>
									</div>
								</a>
							</li>
							<li>
								<a href="#">
									<img src="{$config_siteurl}statics/cu/images/public-service/ggwh_Tj3.jpg" />
									<div class="txt">
										<h5>电影</h5>
										<p>Movie</p>
									</div>
								</a>
							</li>
							<li class="last-item">
								<a href="#">
									<img src="{$config_siteurl}statics/cu/images/public-service/ggwh_Tj4.jpg" />
									<div class="txt">
										<h5>音乐</h5>
										<p>Music</p>
									</div>
								</a>
							</li>
							<li>
								<a href="#">
									<img src="{$config_siteurl}statics/cu/images/public-service/ggwh_Tj5.jpg" />
									<div class="txt">
										<h5>鉴赏</h5>
										<p>Appreciate</p>
									</div>
								</a>
							</li>
							<li class="last-item">
								<a href="#">
									<img src="{$config_siteurl}statics/cu/images/public-service/ggwh_Tj6.jpg" />
									<div class="txt">
										<h5>图书</h5>
										<p>Book</p>
									</div>
								</a>
							</li>
							<li>
								<a href="#">
									<img src="{$config_siteurl}statics/cu/images/public-service/ggwh_Tj7.jpg" />
									<div class="txt">
										<h5>美术</h5>
										<p>Art</p>
									</div>
								</a>
							</li>
							<li class="last-item">
								<a href="#">
									<img src="{$config_siteurl}statics/cu/images/public-service/ggwh_Tj8.jpg" />
									<div class="txt">
										<h5>其他</h5>
										<p>Other</p>
									</div>
								</a>
							</li>
						</ul>

					</div>
				</div>
			</div>
			<div class="ggwh_Content" style="margin-top: 30px">
				<div class="ggwh_Dw">
					<div class="top">
						<h3>活动定位</h3>
					</div>
					<div class="row" style="padding: 15px 0px;">
						<div class="col-md-5 ggwh_DwMain">
							<div class="tab">
								<ul>
									<li>
										<a class="hdBtn" href="#">正在进行的活动</a>
										<div>
											<ul class="ggwh_HdList">
												<li class="ggwh_HdListItem" data-position = "112.569031,37.851639">
													<a data-src = "" class="pull-left">山西外语歌曲大赛</a><span class="pull-right text-gray">时长：5小时</span>
												</li>
								              	<li class="ggwh_HdListItem" data-position = "112.593705,37.80769">
													<a data-src = "" class="pull-left">山西省摄影大赛</a><span class="pull-right text-gray">时长：6小时</span>
												</li>
								            </ul>
										</div>
									</li>
									<li>
										<a class="hdBtn" href="#">即将进行的活动</a>
										<div>
											<ul class="ggwh_HdList">
												<li class="ggwh_HdListItem" data-position = "112.529578,37.864093">
													<a data-src = "" class="pull-left">山西省首届“赶集网杯”高校模特大赛</a><span class="pull-right text-gray">时长：4小时</span>
												</li>
								                <li class="ggwh_HdListItem" data-position = "112.592995,37.80216">
													<a data-src = "" class="pull-left">中医名人堂专题讲座</a><span class="pull-right text-gray">时长：小时</span>
												</li>
								            </ul>
										</div>
									</li>
									<li>
										<a class="hdBtn" href="#">我的周边活动</a>
										<div>
											<ul class="ggwh_HdList">
												<li class="ggwh_HdListItem" data-position = "112.529578,37.864093">
													<a data-src = "" class="pull-left">高校微电影大赛</a><span class="pull-right text-gray">时长：3小时</span>
												</li>
								                <li class="ggwh_HdListItem" data-position="112.539813,37.904654">
													<a data-src = "" class="pull-left">森呼吸，一起跑！ ——2016万科太原小镇公益马拉松</a><span class="pull-right text-gray">时长：3.5小时</span>
												</li>
								            </ul>
										</div>
									</li>
								</ul>
							</div>
						</div>
						<div class="col-md-7" style="padding-left: 0px;position: relative;height: 450px;">
							<!--<img class="indexMap" src="http://218.26.115.226:81/statics/images/../diy/ggwh/img/ggwh_Map1.jpg" style="visibility: visible;" />
				<img class="indexMap" src="http://218.26.115.226:81/statics/images/../diy/ggwh/img/ggwh_Map2.jpg" />
				<img class="indexMap" src="http://218.26.115.226:81/statics/images/../diy/ggwh/img/ggwh_Map3.jpg" />-->
							<div id="baiduMap" style="height:450px;">

							</div>
						</div>

					</div>
				</div>
			</div>
			<div class="ggwh_Content" style="margin-top: 30px">
				<div class="content2Left pull-left">
					<div class="top">
						<h3>文化设施</h3>
						<!--<a href="ggwh_Cgyd.html" class="pull-right ggwh_YdBtn">
				场馆预订
			</a>-->
					</div>
					<div class="ggwh_CgydLb">
						<div class="swiper-container gallery-top">
							<div class="swiper-wrapper">
								<div class="swiper-slide" style="background-image:url({$config_siteurl}statics/cu/images/public-service/a1.jpg)"></div>
								<div class="swiper-slide" style="background-image:url({$config_siteurl}statics/cu/images/public-service/a2.jpg)"></div>
								<div class="swiper-slide" style="background-image:url({$config_siteurl}statics/cu/images/public-service/a3.jpg)"></div>
								<div class="swiper-slide" style="background-image:url({$config_siteurl}statics/cu/images/public-service/a4.jpg)"></div>
								<div class="swiper-slide" style="background-image:url({$config_siteurl}statics/cu/images/public-service/a3.jpg)"></div>
							</div>
							<!-- Add Arrows -->
							<div class="swiper-button-next swiper-button-white"></div>
							<div class="swiper-button-prev swiper-button-white"></div>
						</div>
						<div class="swiper-container gallery-thumbs">
							<div class="swiper-wrapper">
								<div class="swiper-slide" style="background-image: url({$config_siteurl}statics/cu/images/public-service/ax1.jpg)"></div>
								<div class="swiper-slide" style="background-image:url({$config_siteurl}statics/cu/images/public-service/ax2.jpg)"></div>
								<div class="swiper-slide" style="background-image:url({$config_siteurl}statics/cu/images/public-service/ax3.jpg)"></div>
								<div class="swiper-slide" style="background-image:url({$config_siteurl}statics/cu/images/public-service/ax4.jpg)"></div>
								<div class="swiper-slide" style="background-image:url({$config_siteurl}statics/cu/images/public-service/ax3.jpg)"></div>
							</div>
						</div>
					</div>
				</div>
				<div class="content2Right pull-right">
					<div class="top">
						<h3>最新资讯</h3>
						<!--<a href="#" class="pull-right ggwh_More">
				MORE+
			</a>-->
					</div>
					<div class="ggwh_ZxContent">
						 	<a href="content1.html" class="ggwh_ZxImg">
							<img src="{$config_siteurl}statics/cu/images/public-service/20161010081030724.jpg" />
							<div class="txt">
								<h4>影院7月影讯</h4></div>
						    </a>						 						
						<ul class="ggwh_ZxList">
							<li>
								<a href="content1.html">影院7月影讯</a>
							</li>
							<li>
								<a href="content1.html">全国“三农”媒体聚焦山西产业融合</a>
							</li>
							<li>
								<a href="content1.html">山西传统文化“点睛”美丽乡村</a>
							</li>
							<li>
								<a href="content1.html">天下女人国际论坛山西分论坛将开启</a>
							</li>
							<li>
								<a href="content1.html">我省举办首期青年创业训练营</a>
							</li>						 							
						</ul>
					</div>
				</div>
			</div>
			<footer>
				&copy; 2005-2015 Shanxi Yunpingtai.com,All Right Reserved&nbsp;&nbsp;|&nbsp;&nbsp;
				<a href="#">关于我们</a>&nbsp;&nbsp;|&nbsp;&nbsp;
				<a href="#">网站邮箱</a>&nbsp;&nbsp;|&nbsp;&nbsp;
				<a href="#">网站地图</a>&nbsp;&nbsp;|&nbsp;&nbsp;
				<a href="#">友情链接</a>&nbsp;&nbsp;|&nbsp;&nbsp;
				<a href="#">本网声明</a>
			</footer>		
		</div>
		<div class="modal fade" role="dialog" id="login" aria-labelledby="gridSystemModalLabel">
			<div class="modal-dialog" role="document" style="margin-top: 15%;">
				<div class="modal-content" style="width: 525px;height: 350px;">
					<div class="modal-header" style="background-color: #93262B;">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color: #fff;"><span aria-hidden="true" style="color: #fff;">&times;</span></button>
						<h4 class="modal-title" id="gridSystemModalLabel" style="color: #fff;">文化公共服务平台</h4>
					</div>
					<div class="modal-body">
						<div class="container-fluid">
							<form>
								<div class="row">
									<div class="col-md-12" style="margin-bottom: 20px;">
										<div class="input-group margin-bottom-sm">
											<span class="input-group-addon"><i class="fa fa-envelope-o fa-fw"></i></span>
											<input class="form-control input-lg" type="text" placeholder="邮箱/手机号" value="68956686@qq.com">
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-12" style="margin-bottom: 20px;">
										<div class="input-group">
											<span class="input-group-addon"><i class="fa fa-key fa-fw"></i></span>
											<input class="form-control input-lg" type="password" placeholder="密码" value="11111111">
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-9" style="margin-bottom: 10px;">
										<label>
											<input type="checkbox" checked="checked"> 记住账号
										</label>
									</div>
									<div class="col-md-3" style="margin-bottom: 10px;">
										<label>
											<a href="#">登陆遇到问题</a>
										</label>
									</div>
								</div>
								<button type="button" class="btn btn-primary  btn-lg btn-block" style="margin-bottom: 20px;" onclick="javascript:location.href='ggwh-indexLogin.html'">登录</button>
								<div class="row">
									<div class="col-md-12" style="margin-bottom: 10px;">
										<div class="pull-right">
											<label>
											<a href="#">立即注册</a>
											</label>
										</div>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
				<!-- /.modal-content -->
			</div>
			<!-- /.modal-dialog -->
		</div>
		<!-- /.modal -->
		
        
		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
		<script type="text/javascript" src="{$config_siteurl}statics/cu/jquery/jquery.min.js"></script>
		<!-- Include all compiled plugins (below), or include individual files as needed -->
		<script type="text/javascript" src="{$config_siteurl}statics/cu/bootstrap/bootstrap.min.js"></script>
		<!--<script type="text/javascript" src="js/topNav.js"></script>-->
		<script type="text/javascript" src="{$config_siteurl}statics/cu/swiper/swiper.min.js"></script>
		<script type="text/javascript" src="{$config_siteurl}statics/cu/pignose/js/pignose.tab.min.js"></script>
		<script type="text/javascript" src="http://api.map.baidu.com/api?v=2.0&ak=YUYIzLKGEcKdyyat23Aw4H9LByDx4voy"></script>
		<script>
			var swiper = new Swiper('.ggwh_Banner .swiper-container', {
				pagination: '.swiper-pagination',
				nextButton: '.swiper-button-next',
				prevButton: '.swiper-button-prev',
				paginationClickable: true,
				spaceBetween: 30,
				centeredSlides: true,
				autoplay: 5000,
				speed: 800,
				effect: 'fade',
				autoplayDisableOnInteraction: false,
				loop: true
			});

			var galleryTop = new Swiper('.ggwh_CgydLb .gallery-top', {
				nextButton: '.swiper-button-next',
				prevButton: '.swiper-button-prev',
				spaceBetween: 10,
				loop: true,
				loopedSlides: 5 //looped slides should be the same
			});
			var galleryThumbs = new Swiper('.ggwh_CgydLb .gallery-thumbs', {
				spaceBetween: 10,
				slidesPerView: 6,
				touchRatio: 0.2,
				loop: true,
				loopedSlides: 5, //looped slides should be the same
				slideToClickedSlide: true
			});
			galleryTop.params.control = galleryThumbs;
			galleryThumbs.params.control = galleryTop;
		</script>
		<script type="text/javascript">
			$(function() {
				$('.tab').pignoseTab({
					animation: true,
					children: '.tab'
				});

				$(".ggwh_TjUl li").hover(function() {
					$(this).find(".txt").stop().animate({
						height: "116"
					}, 400);
					$(this).find(".txt h5").stop().animate({
						paddingTop: "30px"
					}, 400);

				}, function() {
					$(this).find(".txt").stop().animate({
						height: "30px"
					}, 400);
					$(this).find(".txt h5").stop().animate({
						paddingTop: "0px"
					}, 400);
				});

				$(".bannerMenuContent .item").mouseover(function() {
					$(".subMenu").hide();
					var a = $(this).attr("data-id");
					$("." + a).show();
				});
				$(".bannerMenuContent .item , .subMenu").mouseleave(function() {

					$(".subMenu").hide()
				});
				$(".subMenu").mouseover(function() {
					$(".subMenu").hide(), $(this).show()
				});
				
				
				
				//百度地图
				
				map = new BMap.Map("baiduMap"); // 创建Map实例

				map.centerAndZoom('太原', 12);

				var navigationControl = new BMap.NavigationControl({
					// 靠左上角位置
					anchor: BMAP_ANCHOR_TOP_LEFT,
					// LARGE类型
					type: BMAP_NAVIGATION_CONTROL_LARGE,
					// 启用显示定位
					enableGeolocation: true
				});
				map.addControl(navigationControl);

				map.enableScrollWheelZoom(true);
				
               $(".hdBtn").click(function(){
               	map.clearOverlays();  
				var list= $(this).next("div").find(".ggwh_HdList").find(".ggwh_HdListItem");
				for(var i=0;i<list.length;i++){
					var title=$(list[i]).find("a").html();
					var url=$(list[i]).find("a").attr("data-src");
					var content = "<h4 style='margin:0 0 5px 0;padding:0.2em 0'>" + title +"</h4>" +
						"<a style='display: inline;' href='" + url +"'>详情<a>"
					var poi=list[i].getAttribute("data-position").split(",")
					var point = new BMap.Point(poi[0], poi[1]);

					var marker = new BMap.Marker(point);  // 创建标注
					
					map.addOverlay(marker);  // 将标注添加到地图中
					
					addClickHandler(content,marker);
				}
			})
				$(".hdBtn")[0].click();
				
				$(".ggwh_HdListItem").click(function(){
					
					var title= $(this).find("a").html();
					var url=$(this).find("a").attr("data-src")
					var content = "<h4 style='margin:0 0 5px 0;padding:0.2em 0'>" + title +"</h4>" +
						"<a style='display: inline;' href='" + url +"'>详情<a>"
					map.clearOverlays();  
					
					var poi=$(this).attr("data-position").split(",");
					
					var point = new BMap.Point(poi[0], poi[1]);

					var marker = new BMap.Marker(point);  // 创建标注
					
					map.addOverlay(marker);  // 将标注添加到地图中
					
					addClickHandler(content,marker);
					$(".ggwh_HdListItem").removeClass("active");
					$(this).toggleClass("active");
				})
			});
					function addClickHandler(content,marker){
		marker.addEventListener("click",function(e){
			openInfo(content,e)}
		);
	}
	function openInfo(content,e){
		var p = e.target;
		var point = new BMap.Point(p.getPosition().lng, p.getPosition().lat);
		var infoWindow = new BMap.InfoWindow(content);  // 创建信息窗口对象 
		map.openInfoWindow(infoWindow,point); //开启信息窗口
	}	 
		</script>

</body>
</html>