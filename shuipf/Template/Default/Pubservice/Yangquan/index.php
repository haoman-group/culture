<!DOCTYPE html>
<html lang="zh-CN">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
	<title><?= $cityname=='全省'?'山西':$cityname;?>文化云</title>
	<template file="Pubservice/Common/_cssjs"/>
	
	<style>
		.indexMap {
			position: absolute;
			visibility: hidden;
			width: 100%;
		}
		.colm {
			width: 100%;
			/* overflow: hidden; */
		}
		.colm a { position: relative; left: 50%; margin-left: -960px; }
		.position-video-list li{
			width:145px;
			height:30px;
			border:3px solid #962626;
			line-height:24px;
			text-align:center;
			margin:10px 0 0 10px;
			text-decoration:none;
			color:#fff;
			font-size:16px;
			border-radius:10px 10px 10px 10px;
			/* opacity:0.5; */
		}
		.position-video-list li a{
			color:black;
		}
		/*.pull-left{text-overflow:ellipsis;overflow:hidden;white-space:nowrap;width:300px;}*/
	</style>
	<script type="text/javascript" src="{$config_siteurl}statics/cu/swiper/swiper.min.js"></script>
	<!-- <<link rel="stylesheet" href="{$config_siteurl}statics/cu/swiper/swiper.css"> -->
</head>
<body class="homebg">
<!-- <div class="colm"><a href="/Festival"><img src="{$config_siteurl}statics/cu/festival/images/index/001.png" alt=""></a></div> -->
<div class="wrap">
	<template file="Pubservice/Common/_head"/>
		<!-- swiper 轮播容器 -->
			

				<!-- swiper 默认样式 -->
				<if condition="$slide_style eq 'style-standard'">
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
			

				<elseif condition="$slide_style eq 'style-effect-cube'"/>
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

				<elseif condition="$slide_style eq 'style-centered-auto'"/>
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
			
				<elseif condition="$slide_style eq 'style-effect-coverflow'"/>
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



			<else/>
			<!-- 原始公共轮播块 -->
			
			<div class="layslidewrap" >

				<ul class="d_img">
					<li class="d_pos1"><a target="_blank" href="<if condition="$slideData['2']['pub_slide'] neq '' ">{$slideData['2']['picture_url']}<else/>###</if>"><img src="<?=!empty($slideData[2]['pub_slide'])?thumb($slideData[2]['pub_slide'],868,355,1):$config_siteurl.'statics/cu/images/images/ggindexban3.jpg';?>" alt="" /></a></li>
					<li class="d_pos2"><a target="_blank" href="<if condition="$slideData['1']['pub_slide'] neq '' ">{$slideData['1']['picture_url']}<else/>###</if>"><img src="<?=!empty($slideData[1]['pub_slide'])?thumb($slideData[1]['pub_slide'],868,355,1):$config_siteurl.'statics/cu/images/images/ggindexban2.jpg';?>" alt=""/></a></li>
					<li class="d_pos3"><a target="_blank" href="<if condition="$slideData['0']['pub_slide'] neq '' ">{$slideData['0']['picture_url']}<else/>###</if>"><img src="<?=!empty($slideData[0]['pub_slide'])?thumb($slideData[0]['pub_slide'],868,355,1):$config_siteurl.'statics/cu/images/images/ggindexban1.jpg';?>" alt=""/></a></li>
					<li class="d_pos4"><a target="_blank" href="<if condition="$slideData['3']['pub_slide'] neq '' ">{$slideData['3']['picture_url']}<else/>###</if>"><img src="<?=!empty($slideData[3]['pub_slide'])?thumb($slideData[3]['pub_slide'],868,355,1):$config_siteurl.'statics/cu/images/images/ggindexban4.jpg';?>" alt=""/></a></li>
					<li class="d_pos5"><a target="_blank" href="<if condition="$slideData['4']['pub_slide'] neq '' ">{$slideData['4']['picture_url']}<else/>###</if>"><img src="<?=!empty($slideData[4]['pub_slide'])?thumb($slideData[4]['pub_slide'],868,355,1):$config_siteurl.'statics/cu/images/images/ggindexban5.jpg';?>" alt=""/></a></li>
				</ul>
				<ul class="d_menu"></ul>
				<p class="d_prev"><img src="{$config_siteurl}statics/cu/images/images/pubbanarrl.png" alt=""><i></i></p>
				<p class="d_next"><img src="{$config_siteurl}statics/cu/images/images/pubbanarrr.png" alt=""><i></i></p>
			</div>
			<!-- 原始公共轮播块 结束-->
			</if>

			<!-- 搜索栏-->
            <div style="background:#FFF;">
			<div class="ggwh_Content" style="padding:20px 0px;">
				<div class="row">
					<div class="col-md-4 ggwh_SearchRm">
						<div class="col-md-3">
							<h4>热门搜索：</h4>
						</div>
						<div class="col-md-8" style="white-space:nowrap;">
							<a href="{:U('Festival/index')}">艺术节</a>
							<a href="{:U('Pubservice/Massart/index')}">群众文艺</a>
							<a href="{:U('Festival/Themeact/index')}">主题性活动</a>
							<a href="{:U('Pubservice/Archive/index')}">艺术档案馆</a>
						</div>
					</div>
					<div class="col-md-8" style="position: relative;width:360px;float:right;margin-top:8px;">
						<form action="" method="get" target="_blank">
						<input type="hidden" name="m" value="search"/>
						<input type="hidden" name="g" value="Pubservice"/>
						<input type="hidden" name="a" value="index"/>
						<input class="form-control ggwh_Search"  name="kw" id="q" placeholder="输入您要搜索的关键词" style="height:40px;"/>
						<input type="submit" id="button" value="" class="ggwh_SearchBtn" style="border: none;height:40px;">
						</form>
					</div>
				</div>
			</div>
			</div>
			<!-- 搜索栏 结束-->

			<!-- 快速导航 -->
			<if condition="in_array('fastlink',$modules)">
            <div class="fastlink">
				<div class="ggwh_Content clearfix" style="width: 1190px">
					<a href="{:U('Pubservice/Ejournals/index')}" style="background: url({$config_siteurl}statics/cu/images/public-service/journals.png) no-repeat center">
						<h5>文化电子期刊</h5>
						<h6>Culture of electronic journals</h6>
					</a>
					<a href="{:U('Pubservice/Massart/index')}" style="background: url({$config_siteurl}statics/cu/images/public-service/venue.png) no-repeat center">
						<h5>群众文艺</h5>
						<h6>The Mass Literature</h6>
					</a>
					<a href="http://lib.sx.cn/" style="background: url({$config_siteurl}statics/cu/images/public-service/library.png) no-repeat center">
						<h5>数字图书馆</h5>
						<h6>Digital library</h6>
					</a>
					<!-- <a href="http://www.whjd.sh.cn/digital/jdbwgIndex.do"> -->
					<!--<a href="http://www.whjd.sh.cn/digital/jdbwgIndex.do"> -->
					<a href="{:U('Pubservice/Appreciate/index')}" style="background: url({$config_siteurl}statics/cu/images/public-service/Art.png) no-repeat center">
						<h5>艺术品鉴赏</h5>
						<h6>Art appreciation</h6>
					</a>
					<a href="http://www.sx-cc.com/index.php?g=Industry&a=lists&catid=16" style="background: url({$config_siteurl}statics/cu/images/public-service/card.png) no-repeat center">
						<h5>文消卡</h5>
						<h6>Wen Xiao card</h6>
					</a>
					<a href="{:U('Industry/Index/policylist')}" style="background: url({$config_siteurl}statics/cu/images/public-service/policy.png) no-repeat center">
						<h5>政策法规</h5>
						<h6>Policies and Regulations</h6>
					</a>
				</div>

			</div>
			</if>
			<!-- 快速导航 结束-->
			</div>
			<!-- 文化活动 -->
			<if condition="in_array('activities',$modules)">
			<div class="gg_culture_active">
				<div class="gg_culture_act_box">
					<div class="culture_act_title">
						<div class="title_name">
							<p class="title_en">Cultural activities</p>
							<p><a href="{:U('Active/index')}" style="color:#93262a;">文化活动</a></p>
							<div class="gg_xhx"></div>
						</div>
						<div class="culture_title_right">
							<a class="sls" onClick="exchange(this)" data-type="lecture">展览</a><span class="gg_xx">/</span>
							<a class="sls" onClick="exchange(this)" data-type="speak">活动</a><span class="gg_xx">/</span>
							<a class="sls" onClick="exchange(this)" data-type="show">讲座</a>
						</div>
					</div>

					<ul class="culture_act_list" data-type="speak" style="display:none;">
						<volist name="speak" id="vo">
							<li>
								<img src="{:thumb($vo['image'],200,200)}">
								<h3>{$vo['content_title']}</h3>
								<p class="culture_act_p">活动时间：<if condition="$vo['act_time'] neq '' ">{$vo.act_time}<else/>暂无信息</if></p>
								<p class="culture_act_p" style="height:36px;overflow:hidden;">活动地点：<if condition="$vo['act_address'] neq '' ">{$vo['act_address']}<else/>暂无信息</if></p>
								<if condition="$vo['if_bespeak'] eq '1'">
								<a href="{:U('Pubservice/Active/show', array('id'=>$vo['id'],'tablename'=>active))}">预约</a>
								<else/>
								<a href="{:U('Pubservice/Active/show', array('id'=>$vo['id'],'tablename'=>active))}" >查看详情</a>
								</if>
							</li>
							</volist>
					</ul>

					<ul class="culture_act_list"  data-type="lecture" style="display:block">
							<volist name="lecture" id="vo" >
							<li>
								<img src="{:thumb($vo['image'],200,200)}">
								<h3>{$vo['content_title']}</h3>
								<p class="culture_act_p">活动时间：<if condition="$vo['act_time'] neq '' ">{$vo.act_time}<else/>暂无信息</if></p>
								<p class="culture_act_p" style="height:36px;overflow:hidden;">活动地点：<if condition="$vo['act_address'] neq '' ">{$vo['act_address']}<else/>暂无信息</if></p>
								<if condition="$vo['if_bespeak'] eq '1'">
								<a href="{:U('Pubservice/Active/show', array('id'=>$vo['id'],'tablename'=>active))}">预约</a>
								<else/>
								<a href="{:U('Pubservice/Active/show', array('id'=>$vo['id'],'tablename'=>active))}">查看详情</a>
								</if>
							</li>
							</volist>
					</ul>

					<ul class="culture_act_list" data-type="show" style="display:none">
							<volist name="show" id="vo" >
							<li>
								<img src="{:thumb($vo['image'],200,200)}">
								<h3>{$vo['content_title']}</h3>
								<p class="culture_act_p">活动时间：<if condition="$vo['act_time'] neq '' ">{$vo.act_time}<else/>暂无信息</if></p>
								<p class="culture_act_p" style="height:36px;overflow:hidden;">活动地点：<if condition="$vo['act_address'] neq '' ">{$vo['act_address']}<else/>暂无信息</if></p>
								<if condition="$vo['if_bespeak'] eq '1'">
								<a href="{:U('Pubservice/Active/show', array('id'=>$vo['id'],'tablename'=>active))}">预约</a>
								<else/>
								<a href="{:U('Pubservice/Active/show', array('id'=>$vo['id'],'tablename'=>active))}" class="lookAt">查看详情</a>
								</if>
							</li>
							</volist>
					</ul>

				</div>
			</div>
			</if>
			<!-- 文化活动 结束 -->
            <!--新闻出版-->
				<if condition="in_array('publications',$modules)">
			<div class="gg_zuixin">
			
				<div class="gg_zuixin_box">
					
					<div class="gg_zuixin_left" style="height:643px;">
						<div class="culture_act_title">
							<div class="title_name tj_tu">
								<p class="title_en">Press and Publications</p>
								<p>新闻出版</p>
								<div class="gg_xhx"></div>
							</div>
						</div>
						<div class="zx_left_con" style="height:auto;">
							<a href="###" style="color: #1b1b2b;"><li style="list-style-type:none;border-bottom:0;float:left;margin-left:30px;margin-top:50px;width:170px;height:100px;"><img src="{$config_siteurl}statics/cu/images/xinwen1.jpg" style="width:170px;height:100px;" />
							</br>				
							<span>省督导组来我市...</span>
							
							</li>
							</a>
							<a href="###" style="color: #1b1b2b;"><li style="list-style-type:none;border-bottom:0;float:left;margin-left:30px;margin-top:50px;width:170px;height:100px;"><img src="{$config_siteurl}statics/cu/images/xinwen2.jpg" style="width:170px;height:100px;" />
							</br>
							<span>我局和市教育局联合...</span></li>
							</a>
							<a href="###" style="color: #1b1b2b;"><li style="list-style-type:none;border-bottom:0;float:left;margin-left:30px;margin-top:50px;width:170px;height:100px;"><img src="{$config_siteurl}statics/cu/images/xinwen3.jpg" style="width:170px;height:100px;" />
							</br>
							<span>“扫黄打非”工作...</span>
							</li>
							</a>
							<a href="###" style="color: #1b1b2b;"><li style="list-style-type:none;border-bottom:0;float:left;margin-left:30px;margin-top:50px;width:170px;height:100px;"><img src="{$config_siteurl}statics/cu/images/xinwen4.jpg" style="width:170px;height:100px;" />
							</br>
							<span>省“扫黄打非”...</span></li>
							</a>
							<a href="###" style="color: #1b1b2b;"><li style="list-style-type:none;border-bottom:0;float:left;margin-left:30px;margin-top:50px;width:170px;height:100px;"><img src="{$config_siteurl}statics/cu/images/xinwen5.jpg" style="width:170px;height:100px;" />
							</br>	
							<span>我市召开“扫黄...</span></li>
							</a>
							<a href="###" style="color: #1b1b2b;"><li style="list-style-type:none;border-bottom:0;float:left;margin-left:30px;margin-top:50px;width:170px;height:100px;"><img src="{$config_siteurl}statics/cu/images/xinwen6.png" style="width:170px;height:100px;" />
							</br>	
							<span>我局开展印刷...</span></li>
							</a>
							
							
						</div>
					</div>
					
					<div class="gg_zuixin_right">
						<div class="culture_act_title">
							<div class="title_name xz_tu">
								<p class="title_en">Broadcast film and Television</p>
								<p>广播影视</p>
								<div class="gg_xhx"></div>
							</div>

						</div>
						<div class="zxtj_images" style="height:250px;">
							<div class="swiper-container">
							  <div class="swiper-wrapper" >
							 
							 
							 <div class="swiper-slide1" style="float:left;width:100%;">	
								 <a href="###">
							    		<img src="{$config_siteurl}statics/cu/images/xinwen.png" width="100%" height="100%"  class="zxtj_one">
							     </a>
								</div>
								
								<div style="float:left;margin-left:5%;">
									<a href="###" style="color: #1b1b2b;">	
							     <span style="margin-left:20%;">我局对影院进行突击检查</span>
								 <p style="text-indent:2em;line-height:35px;"> 为进一步规范我市影院经营秩序，7月18日，市文化局李曜雷副局长带队对我市各影院进行了突击检查。此次检查以影院映前广告、公益广告播放情况和安全等工作为重点，共抽查了恒大影城、西城影院和九达国际影城三家影院。经检查，各影院经营情况正常，中国梦公益广告均按要求播放，未发现较大安全隐患....</p>		
							    </a>
								</div>
								
							  </div>
							 
							</div>
						
						</div>
						<div class="zxtj_content">
							<!-- <h3>舞蹈</h3>
							<p>舞蹈是一种表演艺术，使用身体来完成各种优雅或高难度的动作，一般有音乐伴奏，以有节奏的动作为主要表现手段的艺术形式。它一般借助音乐，也借助其他的道具。舞蹈本身有多元的社会意义及作用，包括运动、社交/求偶、祭祀、礼仪等。在人类文明起源前，舞蹈在仪式，礼仪，庆典和娱乐方面都十分重要。中国在五千年以前就已经出现了舞蹈，它产生于奴隶社会，发展到秦汉之际已形成一定特色。</p> -->
							<ul>
							
								<li><a href="###">“迎接党的十九大 共圆小康中国梦”主题放映活动如火如荼</a></li>
								<li><a href="###">我局对影院进行突击检查</a></li>
								<li><a href="###">我市开展非法卫星电视接收设施专项整治行动</a></li>
								<li><a href="###">我局组织开展“迎接党的十九大 共圆小康中国梦”主题放映活动</a></li>
								<li><a href="###">市文化局开展影院安全工作检查</a></li>
								
							</ul>
							
						</div>
					</div>
					
				</div>
				
			</div>
			</if>
			<!-- 1号广告位 -->
			<div class="colm"><a href="/Festival"><img src="{$config_siteurl}statics/cu/festival/images/index/003.png" alt=""></a></div>
			<!-- 1号广告位 结束-->

			<!-- 活动定位 -->
			<if condition="in_array('location',$modules)">
			<div class="gg_active_dingwei">
				<div class="gg_active_dingwei_box">
					<div class="culture_act_title">
						<div class="title_name dw_tu">
							<p class="title_en">Activity location</p>
							<p>活动定位</p>
							<div class="gg_xhx"></div>
						</div>
					</div>
					<div class="gg_dw_content">
						<div class="gg_dw_left">
							<div class="tab">
								<ul>
									<li>
										<a class="hdBtn" href="#">正在进行的活动</a>
										<div>
											<ul class="ggwh_HdList">
												<volist name="nowshow" id="vo" offset="0" length='6'>
												<li class="ggwh_HdListItem" >

													<span class="pull-left text-gray" data-position="{$vo['point_lng']},{$vo['point_lat']}" data-src="{:U('Pubservice/Active/show', array('id'=>$vo['id'],'tablename'=>active))}" style="text-overflow:ellipsis;overflow:hidden;width:320px">{$vo['content_title']}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
													<a target="_blank" href= "{:U('Pubservice/Active/show', array('id'=>$vo['id'],'tablename'=>active))}" class="pull-left" data-position="{$vo['point_lng']},{$vo['point_lat']}" data-title="{$vo['content_title']}" >详情>></a><span class="pull-right text-gray">时长：{$vo['duration']}</span>
												</li>
											   </volist>
								            </ul>
										</div>
									</li>
									<li>
										<a class="hdBtn" href="#">即将进行的活动</a>
										<div>
											<ul class="ggwh_HdList">

												<volist name="comshow" id="vo" offset="0" length='6'>
												<li class="ggwh_HdListItem" >

												<span class="pull-left text-gray" data-position="{$vo['point_lng']},{$vo['point_lat']}" data-src="{:U('Pubservice/Active/show', array('id'=>$vo['id'],'tablename'=>active))}" style="text-overflow:ellipsis;overflow:hidden;width:320px"> {$vo['content_title']}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
													<a target="_blank" href= "{:U('Pubservice/Active/show', array('id'=>$vo['id'],'tablename'=>active))}" class="pull-left" data-position="{$vo['point_lng']},{$vo['point_lat']}" data-title="{$vo['content_title']}">详情>></a><span class="pull-right text-gray">时长：{$vo['duration']}</span>

												</li>
											   </volist>

								            </ul>
										</div>
									</li>
									<li>
										<a class="hdBtn local-active" href="#" >我的周边活动</a>
										<div>
											<ul class="ggwh_HdList">

											<volist name="periphery" id="vo" offset="0" length='6'>
												<li class="ggwh_HdListItem" >

												<span class="pull-left text-gray" data-position="{$vo['point_lng']},{$vo['point_lat']}" data-src="{:U('Pubservice/Active/show', array('id'=>$vo['id'],'tablename'=>active))}" style="text-overflow:ellipsis;overflow:hidden;width:320px">{$vo['content_title']}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
												<a target="_blank" href= "{:U('Pubservice/Active/show', array('id'=>$vo['id'],'tablename'=>active))}" class="pull-left" data-position="{$vo['point_lng']},{$vo['point_lat']}" data-title="{$vo['content_title']}">详情>></a><span class="pull-right text-gray">时长：{$vo['duration']}</span>
												</li>
											   </volist>

								            </ul>
										</div>
									</li>
								</ul>
							</div>
						</div>
						<div class="gg_dw_right" style="width: 685px">
							<div id="baiduMap" style="height:460px;">

							</div>
						</div>
						</div>

					</div>
				</div>
			</div>
			</if>
			<!-- 活动定位 结束 -->

			<!--艺术档案馆-->
			<if condition="in_array('archive',$modules)">
			<div class="pp_dangan">
				<div class="ggwh_Content">
					<div class="culture_act_title">
						<div class="title_name cptjtit">
							<p class="title_en">ART ARCHIVE</p>
							<p><a href="{:U('Pubservice/Archive/index')}" style="color:#93262a;">艺术档案馆</a></p>
							<div class="gg_xhx"></div>
						</div>
					</div>
					 <ul class="clearfix">
					 	<for start='0' end="4">
					 	<li>
					 		<a href="{:U('Pubservice/Archive/index',['id'=>$archive_data[$i]['id']])}">
					 			<div class="img">
								 	<?php
									 $images = unserialize($archive_data[$i]['images']);
									 if($images && is_array($images) && $images[0]){
										 echo '<img src="'.thumb($images[0],282,197).'" alt="">';
									 }else{
										 echo '<img src="'.$config_siteurl.'statics/cu/images/index/da.png" alt="">';
									 }
									 ?>
								</div>
					 			<p class="title">{$archive_data[$i]['title']|default='山西校园首届“赶集网杯”大 学生模特...'}</p>
								 <span>{$archive_data[$i]['intro']}</span>
					 		</a>
					 	</li>
						 </for>
					 </ul>
				</div>
			</div>
			</if>
			<!--艺术档案馆 结束-->

			<!-- 最新推荐 和 最新资讯 -->
			<if condition="in_array('news',$modules)">
			<div class="gg_zuixin">
				<div class="gg_zuixin_box">
					<div class="gg_zuixin_left">
						<div class="culture_act_title">
							<div class="title_name tj_tu">
								<p class="title_en">THE LATEST RECOMMENDED</p>
								<p>最新推荐</p>
								<div class="gg_xhx"></div>
							</div>
						</div>
						<div class="zx_left_con">
							<div class="zx_ph_first">
								<a href="{:U('Pubservice/Index/jump',array('id'=>$groom[0]['id']))}"><img src="{:thumb($groom[0]['image'],205,260,1)}" class="zx_first_img" /></a>
								<div class="zx_l_c">
									<h3>{$groom[0]['title']}</h3>
									<p>上映时间：{$groom[0]['scree_time']}</p>
									<p class="zx_l_gkr">{$groom[0]['click_num']}人想看</p>
									<p class="zx_l_zw">{$groom[0]['content']}</p>
								</div>
							</div>
							<div class="zx_t_t">
								<a href="{:U('Pubservice/Index/jump',array('id'=>$groom[1]['id']))}">
								<img src="{:thumb($groom[1]['image'],205,142,1)}" />
								 <p class="zx_tt_title">{$groom[1]['title']}</p>
								<p>{$groom[1]['click_num']}人想看</p> 
								</a>
							</div>
							<div class="zx_t_t zx_three_li">
								<a href="{:U('Pubservice/Index/jump',array('id'=>$groom[2]['id']))}">
								<img src="{:thumb($groom[2]['image'],205,142,1)}">
								 <p class="zx_tt_title">{$groom[2]['title']}</p>
								<p>{$groom[2]['click_num']}人想看</p> 
								</a>
							</div>
							<div style="clear: both;"></div>
							<!-- <ul>
							<volist name="groom" id="vo" offset="3" length='4'>
								<li>
									<a href="{:U('Pubservice/Index/jump',array('id'=>$vo['id']))}">{$vo['title']} <span>{$vo['click_num']}人想看</span></a>
								</li>
								</volist>
							</ul> -->
						</div>
					</div>
					<div class="gg_zuixin_right" >
						<div class="culture_act_title">
							<div class="title_name xz_tu">
								<p class="title_en">THE LATEST INFORMATION</p>
								<p>最新资讯</p>
								<div class="gg_xhx"></div>
							</div>

						</div>
						<div class="zxtj_images" >
							<div class="swiper-container">
							  <div class="swiper-wrapper">
							 
							  <volist name="picture" id="vo" >
							    <div class="swiper-slide">
							    	<a href="{:U('Pubservice/Content/show',array('id'=>$vo['id']))}" style="margin-top: 0;">
							    		<img src="{$vo['image']['0']}" width="100%" height="100%" style="height:100% !important" class="zxtj_one">
							    		<p class="desc"><span>【{$vo['news_name']}】{$vo['title']}</span></p>
							    	</a>
							    </div>
								</volist>
							  </div>
							  <div class="swiper-pagination"></div>
							</div>
							<script>
							var mySwiper = new Swiper('.zxtj_images .swiper-container', {
								autoplay: 5000,//可选选项，自动滑动
								pagination : '.swiper-pagination',
								paginationClickable :true,
							})
							</script>
						</div>
						<div class="zxtj_content">
							<!-- <h3>舞蹈</h3>
							<p>舞蹈是一种表演艺术，使用身体来完成各种优雅或高难度的动作，一般有音乐伴奏，以有节奏的动作为主要表现手段的艺术形式。它一般借助音乐，也借助其他的道具。舞蹈本身有多元的社会意义及作用，包括运动、社交/求偶、祭祀、礼仪等。在人类文明起源前，舞蹈在仪式，礼仪，庆典和娱乐方面都十分重要。中国在五千年以前就已经出现了舞蹈，它产生于奴隶社会，发展到秦汉之际已形成一定特色。</p> -->
							<ul>
							<volist name="newest" id="wo" offset="0" length="5">
								<li><a href="{:U('Pubservice/Content/show',array('id'=>$wo['id']))}"><strong>【{$wo['news_name']}】</strong>{$wo.addtime|date="Y-m-d",###}&nbsp;{$wo['title']}</a></li>
								</volist>
							</ul>
							<a href="{:U('Pubservice/Content/lists')}" class="more">MORE+</a>
						</div>
					</div>
				</div>
			</div>
			</if>
			<!-- 最新推荐 和 最新资讯 结束-->

			
			<!-- 产品推荐 -->		
			<if condition="in_array('product',$modules)">		
			<div class="gg_cptj" style="display: block;">
				<div class="ggwh_Content">
					<div class="culture_act_title">
						<div class="title_name cptjtit">
							<p class="title_en">PRODUCT RECOMMENDATION</p>
							<p><a href="/index.php?g=Pubservice&amp;m=Facility&amp;a=Index" style="color:#93262a;">产品推荐</a></p>
							<div class="gg_xhx"></div>
						</div>
					</div>
					<div class="conbox" id="div1">
						<div class="slidelt"  width="323px;">
							<div class="acates">
								<volist name="tpshopcate" id="vo">
                                 <a href="<?php echo c(CU_ID)?>goodsList/id/{$vo['id']}" >{$vo['name']}</a>
								</volist>
							</div>
							<!-- <img src="{$config_siteurl}statics/cu/images/index/pp_protuijiandatu.jpg"> -->
							<div class="swiper-container">
							  <div class="swiper-wrapper">
							    <div class="swiper-slide" width="323px;height:401px;">
							    	<a href="<?php echo c(CU_ID)?>search/q/{$categoryup[0]['keyword']}">
							    		<if condition="$categoryup[0]['image'] neq '' "><img src="{:thumb($categoryup[0]['image'],323,401,1)}" style="width:323px;height:401px;"><else/>
										<img src="{$config_siteurl}statics/cu/images/index/pp_protuijiandatu.jpg" >
										</if>
							    	</a>
							    </div>
							    <div class="swiper-slide" width="323px;height:401px;">
							    	<a href="<?php echo c(CU_ID)?>search/q/{$categoryup[1]['keyword']}">
							    		<!--<img src="{$config_siteurl}statics/cu/images/index/pp_protuijiandatu.jpg">-->
										<if condition="$categoryup[1]['image'] neq '' "><img src="{:thumb($categoryup[1]['image'],323,401,1)}" style="width:323px;height:401px;"><else/>
										<img src="{$config_siteurl}statics/cu/images/index/pp_protuijiandatu.jpg" >
										</if>

							    	</a>
							    </div>
							    <div class="swiper-slide" width="323px;height:401px;">
							    	<a href="<?php echo c(CU_ID)?>search/q/{$categoryup[2]['keyword']}">
							    		<!--<img src="{$config_siteurl}statics/cu/images/index/pp_protuijiandatu.jpg">-->
										<if condition="$categoryup[2]['image'] neq '' "><img src="{:thumb($categoryup[2]['image'],323,401,1)}" style="width:323px;height:401px;"><else/>
										<img src="{$config_siteurl}statics/cu/images/index/pp_protuijiandatu.jpg" style="width:323px;heigth:401px;">
										</if>

							    	</a>
							    </div>
							  </div>
							  <div class="swiper-pagination"></div>
							</div>
							<script>
							var mySwiper = new Swiper('.slidelt .swiper-container', {
								autoplay: 5000,//可选选项，自动滑动
								pagination : '.swiper-pagination',
								paginationClickable :true,
							})
							</script>
						</div>
						<div class="slidemid">
							<ul>
								<volist name="categorycenter" id="vo1" >
								<li >
									<a href="<?php echo c(CU_ID)?>search/q/{$vo1['keyword']}"><img src="{:thumb($vo1['image'],144,200,1)}" alt="" class="proimg" style="height:200px;"></a>
									<a href="<?php echo c(CU_ID)?>search/q/{$vo1['keyword']}">
										<div class="proname">{$vo1['title']}</div>
									</a>
								</li>
								</volist>
							</ul>
						</div>
						<div class="slidert">
							<ul class="ulpro">
								<volist name="categoryright"  id="wo">
								<li style="height:171px;border: 1px solid #d2d2d2;">
									<a href="{$wo['url']}"><img src="{:thumb($wo['image'],124,124,1)}" class="proimg"> </a>
									<div class="rtdiv">
										<div class="price">{$wo['title']}</div>
										<a class="proname">{$wo['keyword']}</a>
										
										<a class="atosee" href="{$wo['url']}" >去看看&nbsp;&gt;</a>
									</div>
								</li>
								</volist>
							</ul>
							<!--<img src="{$config_siteurl}statics/cu/images/index/tempprologos.jpg">-->
						</div>
					</div>
				</div>
			</div>
			</if>
			<!-- 产品推荐 结束-->
			


			<!-- 文化设施 废弃-->
			<div class="gg_wh_ss" style="display: none;">
				<div class="ggwh_ss_box">
					<div class="culture_act_title">
						<div class="title_name ss_tu">
							<p class="title_en">Cultural facilities</p>
							<p><a href="{:U('Facility/Index')}"style="color:#93262a;">文化设施</a></p>
							<div class="gg_xhx"></div>
						</div>
						<div class="culture_title_right">
							<a href="{:U('Facility/index')}">MORE+</a>

						</div>

					</div>
					<ul class="ggwh_ss_list">
						<volist name="service" id="vo" offset="0" length='6'>

						<li>
							<a href="{:U('Pubservice/Facility/show',array('id'=>$vo['id'],'tablename'=>$vo['tablename']))}">
							<img src="{$vo['picture']}">
							<h4><if condition="$vo['name'] neq '' ">{$vo['name']}<else/>{$vo['cac_name']}</if></h4>
							</a>
						</li>

						</volist>

					</ul>
				</div>
			</div>
			<!-- 文化设施结束 -->

			<!-- 1号广告位 -->
			<div class="colm"><a href="/Festival"><img src="{$config_siteurl}statics/cu/festival/images/index/002.png" alt=""></a></div>
			<!-- 1号广告位 结束-->


			<!--山西戏曲-->
			<if condition="in_array('shanxiopera',$modules)">	
			<div class="pp_xiqu">
				<div class="ggwh_Content">
					<div class="culture_act_title">
						<div class="title_name cpxqtit">
							<p class="title_en">SHANXI OPERA</p>
							<p><a href="###" style="color:#93262a;">山西戏曲</a></p>
							<div class="gg_xhx"></div>
						</div>
					</div>
					<div class="swiper-content">
						<div class="swiper-container swiper-container-xiqu">
						    <div class="swiper-wrapper">
						        <div class="swiper-slide">
						        	<ul class="clearfix">
										<volist name="opera_data" id="od" offset='0' length="4">
						        		<li>
						        			<a href="{:U('Pubservice/Resources/showlists',['cid'=>$od['cid']])}">
						        				<div class="img"><img src="{:thumb($od['picture'],200,200,1)}" alt="" /></div>
						        				<p class="title">{$od.name}</p>
						        			</a>
						        		</li>
										</volist>
						        	</ul>
						        </div>
						        <div class="swiper-slide">
						        	<ul class="clearfix">
										<volist name="opera_data" id="od" offset='4' length="4">
						        		<li>
						        			<a href="{:U('Pubservice/Resources/showlists',['cid'=>$od['cid']])}">
						        				<div class="img"><img src="{:thumb($od['picture'],200,200,1)}" alt=""></div>
						        				<p class="title">{$od.name}</p>
						        			</a>
						        		</li>
										</volist>
						        	</ul>
						        </div>
						        <div class="swiper-slide">
						        	<ul class="clearfix">
										<volist name="opera_data" id="od" offset='8' length="4">
						        		<li>
						        			<a href="{:U('Pubservice/Resources/showlists',['cid'=>$od['cid']])}">
						        				<div class="img"><img src="{:thumb($od['picture'],200,200,1)}" alt=""></div>
						        				<p class="title">{$od.name}</p>
						        			</a>
						        		</li>
										</volist>
						        	</ul>
						        </div>
						    </div>
						    <div class="swiper-button-prev"></div>
						    <div class="swiper-button-next"></div>
						</div>
						<script language="javascript">
							var mySwiper = new Swiper('.swiper-container-xiqu',{
								prevButton:'.swiper-button-prev',
								nextButton:'.swiper-button-next',
							})
						</script>
					</div>
				</div>
			</div>
			</if>
			<!--山西戏曲 结束-->

			<!-- 市县文化云 -->
			<if condition="in_array('cityculture',$modules)">	
			<div class="gg_wh_zone">
			    <div class="ggwh_ss_box">
			        <div class="culture_act_title">
						<div class="title_name ss_zone">
							<p class="title_en">LOCAL CULTURAL</p>
							<p><a href="###"style="color:#93262a;">市县文化云</a></p>
							<div class="gg_xhx"></div>
						</div>
						<div class="culture_title_right">
						</div>
					</div>
                   <div class="pubzonelinks">
				   <volist name="local_culture" id="vo">
					   <cite>
					   		<notempty name="vo['sub_domain']">
						   	<a href="http://{$vo.sub_domain}.sx-cc.com">{$vo.name}文化云</a>
							<else/>
							<a href="###">{$vo.name}文化云</a>
							</notempty>
						   	<p>
							   <volist name="vo['country']" id="voo">
								<notempty name="voo['sub_domain']">
										<a style="color:#A27A7A;font-weight:bold;" href="http://{$voo.sub_domain}.sx-cc.com">{$voo.name}</a>
									<else/>
										<a href="###">{$voo.name}</a>                            
									</notempty>
							   </volist>
						   	</p>
					   </cite>

				   </volist>
                   </div>
                </div>
			</div>
			</if>
			
			<!-- 市县文化云 结束-->

			<!-- 悬浮导航栏 -->
			<div style="position: fixed; right: 50%; margin-right: -770px; bottom: 0; z-index: 99999;    margin-bottom: 125px; ">
				<a href="javascript:festivalVideo()"><img src="{$config_siteurl}statics/cu/festival/images/index/00.png" alt=""></a>
				<ul class="position-video-list">
					<li><a href="javascript:festivalVideo()">山西艺术节宣传</a></li>
					<li><a href="javascript:cultureVideo()">文化云平台宣传</a></li>
					<li><a target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin=3407728304&site=www.sx-cc.com&menu=yes"><i class="fa fa-qq" style="margin-right:6px;"></i>QQ客服</a></li>
					<li><a href="javascript:void(0)"><i class="fa fa-phone" style="margin-right:6px;"></i>客服电话</a></li>
				</ul>
			</div>
			<!-- 悬浮导航栏 结束-->
			<template file="Pubservice/Common/_foot"/>
		</div>
		<!-- /.modal -->
		 <template file="Pubservice/Common/checklogin"/>

		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
		<script type="text/javascript" src="{$config_siteurl}statics/cu/jquery/jquery.min.js"></script>
		<!-- Include all compiled plugins (below), or include individual files as needed -->
		<script type="text/javascript" src="{$config_siteurl}statics/cu/bootstrap/bootstrap.min.js"></script>
		<!--<script type="text/javascript" src="js/topNav.js"></script>-->
		
		<script type="text/javascript" src="{$config_siteurl}statics/cu/pignose/js/pignose.tab.min.js"></script>
		<script type="text/javascript" src="{$config_siteurl}statics/cu/js/Comm/needLogin.js"></script>
		<script type="text/javascript" src="http://api.map.baidu.com/api?v=2.0&ak=YUYIzLKGEcKdyyat23Aw4H9LByDx4voy"></script>
		<script src="{$config_siteurl}statics/cu/js/layerslide.js"></script>

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

				map.centerAndZoom('<?= $cityname=="全省"?"太原":$cityname;?>', 12);

				var navigationControl = new BMap.NavigationControl({
					// 靠左上角位置
					anchor: BMAP_ANCHOR_TOP_LEFT,
					// LARGE类型
					type: BMAP_NAVIGATION_CONTROL_LARGE,
					// 启用显示定位
					enableGeolocation: true
				});
				map.addControl(navigationControl);

				//map.enableScrollWheelZoom(true);

               $(".hdBtn").click(function(){
               	map.clearOverlays();
				var list= $(this).next("div").find(".ggwh_HdList").find(".ggwh_HdListItem");
				for(var i=0;i<list.length;i++){
					var title=$(list[i]).find("a").attr('data-title');
					var url=$(list[i]).find("a:first").attr("href");
					var content = "<h4 style='margin:0 0 5px 0;padding:0.2em 0'>" + title +"</h4>" +
						"<a style='display: inline;' href='" + url +"'>详情<a>";
                    //console.log($(list[i]).find('a'));
					var poi=$(list[i]).find('a:first').attr("data-position").split(",")
					var point = new BMap.Point(poi[0], poi[1]);

					var marker = new BMap.Marker(point);  // 创建标注

					map.addOverlay(marker);  // 将标注添加到地图中

					addClickHandler(content,marker);
				}
			})
				$(".hdBtn")[0].click();

				$(".ggwh_HdListItem").click(function(){

					var title= $(this).find("span").html();
					var url=$(this).find("span").attr("data-src")
					var content = "<h4 style='margin:0 0 5px 0;padding:0.2em 0'>" + title +"</h4>" +
						"<a style='display: inline;' href='" + url +"'>详情<a>"
					map.clearOverlays();
					var poi=$(this).find('span').attr("data-position").split(",");
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


	function checkname(){
		alert('后台登录者不能预约需要重新前台注册');
	}

	function exchange(object){

		var type=$(object).attr("data-type");
		$(".culture_act_list").each(function(index,ele){
             if($(ele).attr("data-type") == type ){
				 $(ele).show();
			 }else{
				 $(ele).hide();
			 }
		});


		}


		</script>
<script type="text/javascript">
	$(function(){
		$('.layslidewrap').DB_rotateRollingBanner({
			key:"c37080",
			moveSpeed:200,
			autoRollingTime:5000
		});
	});
	$('.local-active').on('click',function(){
		var geolocation = new BMap.Geolocation();
		geolocation.getCurrentPosition(function(r){
			if(this.getStatus() == BMAP_STATUS_SUCCESS){
				var mk = new BMap.Marker(r.point);
				map.addOverlay(mk);
				map.panTo(r.point);
				var circle = new BMap.Circle(r.point,2000,{fillColor:"blue", strokeWeight: 1 ,fillOpacity: 0.3, strokeOpacity: 0.3});
    			map.addOverlay(circle);
    			var local =  new BMap.LocalSearch(map, {renderOptions: {map: map, autoViewport: false}});
    			local.searchNearby('活动',r.point,2000);
				// alert('您的位置：'+r.point.lng+','+r.point.lat);
			}
			else {
				// alert('failed'+this.getStatus());
			}
		},{enableHighAccuracy: true})
	});
</script>
<script>
	function festivalVideo(){
		layer.open({
			title:'山西首届文化艺术节宣传视频',
			shadeClose:true,
			type: 2,
			area: ['700px', '437px'],
			content: '{:U("Pubservice/Index/video?type=festival")}',
			scrollbar:false,
		});
	}
	function cultureVideo(){
		layer.open({
			title:'山西文化云宣传视频',
			shade:[0.8, '#393D49'],
			anim:1,
			shadeClose:true,
			type: 2,
			area: ['900px', '438px'],
			content: '{:U("Pubservice/Index/video?type=culture")}',
			scrollbar:false,
		});
	}
	$(function(){
		if(!localStorage.justonce){
			cultureVideo();
			localStorage.justonce="culture";
		}
	});
</script>
</body>
</html>