<extend name="shuipf/Template/Default/Industry/common/_layout.php" />
<block name="after_styles">
	<link rel="stylesheet" href="{$config_siteurl}statics/css/news.css" />
	<link rel="stylesheet" href="{$config_siteurl}statics/css/list_news_industry.css" />
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
						<a href="javascript:;" style="color: #900;">产业要闻</a>
					</li>
				</ul>
				<form action="">
					<input type="text" placeholder="输入你要搜索的关键字" value="" id="b" />
					<input class="search_btn" type="button" value="搜索" onclick="text()" />
				</form>
			</div>

		</div>
    <!--<div  style="margin-left: 35px;">
        <!--<img src="{$config_siteurl}statics/ci/images/news/news_logo.jpg" alt="">-->
    <!--</div>-->

		<div id="content">
			<div class="container list-container clearfix">
				
				<div class="special_content_left">
					<!--<div class="hotspot-left-title hotspot-title">-->
						<h2 class="hotspot-title" style="color: #900;"><span>|&nbsp;产业要闻</span></h2>
					<!--</div>-->
						<ul class="hotspot-left-middle">
							<content action="lists" catid="$catid" order="id DESC" num="17" page="$page">
								<volist name="data" id="vo">
							    	<li><a href=".{$vo.url}"><em style="background: #900;">●</em>{$vo.title|str_cut=###,43}</a><span>{$vo.inputtime|date ="Y-m-d",###}</span></li>
							    </volist>
							</content>
							
						</ul>
						<div class="pagebox">

                    	{$pages}
            			</div>
				</div>
				<div class="special_content_right">
						<h2><span style="color: #900;">|&nbsp;热点排行</span></h2>
						<content action="lists" catid="$catid" order="weekviews DESC" num="4" page='$page'>
							<volist name="data" id="vo">
								<div class="right_matter">
									<a href=".{$vo.url}"><h5 style="font-size: 16px;font-family: 'Microsoft Yahei';margin-left: 38px;">{$vo.title|str_cut=###,15,''}</h5></a>
									<div class="main_part">
										<div class="main_part_image">
											<a href=".{$vo.url}"><img src="{:thumb($vo['thumb'],80,80,1)}" alt="" style="height:80px;width:80px" /></a>
										</div>
										<div class="main_part_content" style="font-size: 16px;font-family: 'Microsoft Yahei';color:#86868F;line-height: 200%;">
											<p>{$vo.description|str_cut=###,47}</p>
										</div>
									</div>
								</div>
							</volist>
						</content>
				</div>

			</div>
		</div>
</block>
<block name="after_scripts">
	<script type="text/javascript" >
	function text(){
		var value = document.getElementById("b").value;
		window.location.href='{:U("Content/Search/index")}&key='+value;
	}
	</script>
</block>