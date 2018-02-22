<extend name="shuipf/Template/Default/Industry/common/_layout.php" />
 <block name="after_styles">
 	<link rel="stylesheet" href="{$config_siteurl}statics/ci/css/news.css" />
	<link rel="stylesheet" href="{$config_siteurl}statics/ci/css/finance.css" />
	<link rel="stylesheet" href="{$config_siteurl}statics/ci/css/pic.css" />
 </block>

<block name="content">
	<div id="banner">
			<img src="{$config_siteurl}statics/images/news/list3-banner.jpg">
		</div>
		<div id="nav">
			<div class="container">
				<ul>
					<li>
						<a href="{$config_siteurl}" class="home_src" style="color:#900;">首页</a>
					</li>
					<li><span>></span></li>
					<li>
						<a href=".{:getCategory(1,'url')}">资讯中心</a>
					</li>
					<li><span>></span></li>
					<li>
						<a href="javascript:;" style="color:#900;">文化资源</a>
					</li>
				</ul>
				<form action="">
					<input type="text" placeholder="输入你要搜索的关键字" value="" id="b"/>
					<input class="search_btn" type="button" value="搜索" onclick="text()" />
				</form>
			</div>
		</div>
		<div id="content">
			<div class="container clearfix">
				<div class="resource">
					<h5>资讯中心 | 文化资源</h5>
					<ul class="clearfix">
						<content action="lists" catid="$catid" order="id DESC" num="6">
							<volist name="data" id="vo">
								<li>
									<a href=".{$vo.url}"><img src="{:thumb($vo['thumb'],291,194,1)}" alt="{$vo.title}" style="width:291px;height:194px"></a>
									<a href=".{$vo.url}"><h1>{$vo.title|str_cut=###,8,''}</h1></a>
								</li>
						  	</volist>
						</content>
					</ul>
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
	
