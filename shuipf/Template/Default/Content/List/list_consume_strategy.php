<extend name="shuipf/Template/Default/Industry/common/_layout.php" />
<block name="after_styles">
	<link rel="stylesheet" href="{$config_siteurl}statics/ci/css/card.css" />
	<link rel="stylesheet" href="{$config_siteurl}statics/ci/css/list_consume_message.css" />
</block>
<block name="content">
	<div id="nav">
		<div class="container">
			<ul>
				<li>
					<a href="{$config_siteurl}" class="home_src" style="color:#900;">首页</a>
				</li>
				<li><span>></span></li>
				<li>
					<a href=".{:getCategory(16,'url')}">消费服务</a>
				</li>
				<li><span>></span></li>
				<li>
					<a href="javascript:;" style="color: #900;">优惠信息</a>
				</li>
			</ul>
			<form action="">
				<input type="text" placeholder="输入你要搜索的关键字" value="" id="b" />
				<input type="button" value="搜索" class="search_btn" onclick="text()" />
			</form>
		</div>
	</div>

	<div id="content">
			<div class="content_consume">
				<div class="content_main consume_hot">
					<div class="content_main_title">
						<h2 style="color:#900;">|&nbsp;热门信息</h2>
					</div>
					
					
					<div class="content_main_list">
						<content action="lists" catid="$catid" order="views DESC" num="40" page='$page'>
						<ul class="clearfix">
							<volist name="data" id="vo">
							<li><a href=".{$vo.url}"><em>●</em>{$vo.title|str_cut=###,22}</a></li>
							</volist>
						</ul>
						</content>	
						
					</div>	
				</div>
				<div class="content_main other_message">
					<div class="content_main_title">
						<h2 style="color:#900;">|&nbsp;其他信息</h2>
					</div>
					
					
					<div class="content_main_list">
						<content action="lists" catid="$catid" order="id DESC" num="20" >
						<ul class="clearfix">
							<volist name="data" id="vo">
							<li><a href=".{$vo.url}"><em>●</em>{$vo.title|str_cut=###,20}</a></li>
							</volist>
						</ul>
						</content>	
						
					</div>	
				</div>
				<p style="clear: both;"></p>
				<div class="pagebox">
	                		{$pages}
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