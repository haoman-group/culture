<extend name="shuipf/Template/Default/Industry/common/_layout.php" />
<block name="after_styles">
	<link rel="stylesheet" href="{$config_siteurl}statics/css/news.css" />
	<link rel="stylesheet" href="{$config_siteurl}statics/ci/css/page_common.css" />
	<link rel="stylesheet" href="{$config_siteurl}statics/css/list_news_industry.css" />
</block>
<block name="content">
	<div id="nav">
			<div class="container">
				<ul>
					<li>
						<a href="{:U('Industry/Index/index')}" class="home_src">首页</a>
					</li>
					<li><span>></span></li>
					<li>
						<a href="{:U('Industry/Index/lists',array('catid'=>1))}">资讯中心</a>
					</li>
					<li><span>></span></li>
					<li>
						<a href="#" style="color: #2058c2;">通知通告</a>
					</li>
				</ul>
				<form action="">
					<input type="text" placeholder="输入你要搜索的关键字" />
					<input type="submit" value="搜索" />
				</form>
			</div>
		</div>
		<div id="content">
			<div class="container">
				<div class="notis clearfix notify_div">
					<div class="left notis-left">
						<h2><span style="color: #2058c2;">|&nbsp;通知通告</span></h2>
						<ul>
							<content action="lists" catid="$catid" order="id DESC" num="26" page="$page">
								<volist name = 'data' id='vo'>
							    	<li><a href="{:U('Content/Index/shows',array('catid'=>$catid,'id'=>$vo['id']))}"><em>■</em>{$vo.title|str_cut=###,30}</a><span>{$vo.inputtime|date="Y-m-d",###}</span></li>
							    </volist>
							</content>
						</ul>
						<div class="page_div">
							{$pages}
						</div>
					</div>
					<div class="right notis-right">
						
						<h2><span style="color: #2058c2;">|&nbsp;图片新闻</span></h2>
						<ul>
							<volist name = 'data' id='vo'>
								<if condition="$vo['thumb'] && $i lt 4">
									<li>
										<a href="{:U('Content/Index/shows',array('catid'=>$catid,'id'=>$vo['id']))}"><img src="{:thumb($vo['thumb'],309,184,1)}" alt=""></a>
										<p>{$vo.title|str_cut=###,18}</p>
									</li> 	
								</if>
							</volist>
						</ul>
					</div>
				</div>
				
			</div>
		</div>		
</block>	