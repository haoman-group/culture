<extend name="shuipf/Template/Default/Industry/common/_layout.php" />
<block name="after_styles">
	<link rel="stylesheet" href="{$config_siteurl}statics/ci/css/pic.css" />
	<style type="text/css">
		/*.video_title{*/
            /*width: 60%;*/
            /*display: inline-block;*/
            /*float: left;*/
            /*overflow: hidden;*/
            /*text-overflow: ellipsis;*/
            /*white-space: nowrap;*/
        /*}*/
        /*.video_browse{*/
            /*width:30%;*/
            /*display: inline-block;*/
            /*float: left;*/
            /*text-align: auto;*/
        /*}*/
	</style>
</block>
<block name="content">		
	<div id="nav">
		<div class="container">
			<ul>
				<li>
					<a href="{:U('Industry/Index/index')}" class="home_src" style="color:#900;">首页</a>
				</li>
				<li><span>></span></li>
				<li>
					<a href="{:U('Industry/Index/lists',array('catid'=>1))}">资讯中心</a>
				</li>
				<li><span>></span></li>
				<li>
					<a href="javascript:;" style="color: #900;">图片新闻</a>
				</li>
			</ul>
			<form action="">
				<input type="text" placeholder="输入你要搜索的关键字" value="" id="b" />
				<input class="search_btn" type="button" value="搜索" onclick="text()" />
			</form>
		</div>
	</div>
	<div id="content">
		<div class="container">
			<position action="position" posid="4">
				
				<div class="pic-title">
					<h5>【文博图刊】流影"文博</h5>
					<span>2016-09-27  <i>●</i> 来源：山西文化厅 <i>●</i> 作者：李某某 <i>●</i> 23365次浏览</span>
				</div>
				<div class="swiper-container pic-container">
				    <div class="swiper-wrapper">
				    	<volist name="data" id="vo">
					        <div class="swiper-slide">
					        	<a href=".{$vo.data.url}"><img src="{:thumb($vo['data']['thumb'],1082,700,1)}" alt="" style="width: 1096px;height: 700px;"></a>
					        	<p>{$vo.data.title|str_cut=###,10}</p>
					        </div>
				        </volist>
				    </div>
				   
				    <!-- 如果需要分页器 -->
				    <div class="swiper-pagination"></div>
				    
				    <!-- 如果需要导航按钮 -->
				    <div class="swiper-button-prev" style="left: 28px;background-image: none;top: 45%;"><img src="{$config_siteurl}statics/ci/images/left.png"/></div>
				    <div class="swiper-button-next" style="right: 38px;background-image: none;top: 45%;"><img src="{$config_siteurl}statics/ci/images/right.png"/></div>
				    <!-- 如果需要滚动条 -->
				    <!-- <div class="swiper-scrollbar"></div> -->
				</div>
			</position>
			<div class="fenxiang" style="height: 10px;">
				<!-- <span>分享：</span>	
				<a href="#"><img src="{$config_siteurl}statics/img/weibo.png" alt=""></a>
				<a href="#"><img src="{$config_siteurl}statics/img/weixin.png" alt=""></a>
				<a href="#"><img src="{$config_siteurl}statics/img/douban.png" alt=""></a>
				<a href="#"><img src="{$config_siteurl}statics/img/doudou.png" alt=""></a> -->
			</div>
			<div class="pic-title">
				<h5>新闻图集</h5>
				<?php
    $arr = array("inputtime_desc","views_desc");
    $order =  (in_array($_GET['sort'],$arr))?str_replace("_"," ",$_GET['sort']):"id desc";?>
				<ul>

					<li class="on"><a href=".{:getCategory($catid,'url')}&sort=inputtime_desc" >最新</a></li>
					<li><a href="javascript:;">综合</a></li>
					<li><a href=".{:getCategory($catid,'url')}&sort=views_desc">人气浏览</a></li>
					<li><a href=".{:getCategory($catid,'url')}&sort=inputtime_desc">时间</a></li>

				</ul>
			</div>
			<ul class="anaul clearfix">
				<content action="lists" catid="$catid" order="$order" num="8" page='$page'>
					<volist name="data" id="vo">
						<li>
							<div class="anaimg">
								<a href=".{$vo.url}">
									    <img src="{:thumb($vo['thumb'],283,214)}" style="width:283px;height:214px">
								</a>
							</div>
							<span>{$vo.title|str_cut=###,10}</span>

<!--								<span class="video_title">{$vo.description|str_cut=###,7}</span>-->
                                  <span class="video_browse" style="float: right;width: 100px;"><img src="{$config_siteurl}statics/ci/images/news/eyeslogo.jpg" alt=""> 浏览{$vo.views}次</span>




						</li>
					 </volist>
				</content>
			</ul>
			<div class="pagebox">
                    	{$pages}
            </div>
			
		</div>
	</div>

</block>
<block name="after_scripts">
<script>
$(function(){
	var mySwiper = new Swiper ('.swiper-container', {
	  direction: 'horizontal',
	  loop: true,
	  
	  // 如果需要分页器
	  pagination: '.swiper-pagination',
	  paginationType: 'fraction',
	  
	  // 如果需要前进后退按钮
	  nextButton: '.swiper-button-next',
	  prevButton: '.swiper-button-prev',
	  
	  // 如果需要滚动条
	  // scrollbar: '.swiper-scrollbar',

	})
});       
</script>


<script type="text/javascript" >
	function text(){
		var value = document.getElementById("b").value;
		window.location.href='{:U("Content/Search/index")}&key='+value;
	}
</script>
</block>