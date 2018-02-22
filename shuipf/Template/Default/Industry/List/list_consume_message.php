<extend name="shuipf/Template/Default/Industry/common/_layout.php" />
<block name="after_styles">
	<link rel="stylesheet" href="{$config_siteurl}statics/ci/css/card.css" />
	<link rel="stylesheet" href="{$config_siteurl}statics/ci/css/list_consume_message.css" />

</block>
<block name="content">
	<!--头部导航-->
	<div id="nav">
		<div class="container">
			<ul>
				<li>
					<a href="{:U('Industry/Index/index')}" class="home_src" style="color:#900;">首页</a>
				</li>
				<li><span>></span></li>
				<li>
					<a href="{:U('Industry/Index/lists',array('catid'=>16))}">消费服务</a>
				</li>
				<li><span>></span></li>
				<li>
					<a href="javascript:;" style="color: #900;">消费资讯</a>
				</li>
			</ul>
			<!--<form action="">
				<input type="text" placeholder="输入你要搜索的关键字" value="" id="b" />
				<input type="button" value="搜索" class="search_btn" onclick="text()" />
			</form>-->
		</div>
	</div>
	<!--内容-->
	<div id="content">
			<div class="content_main">
				<div class="content_main_title">
					<h2 style="color:#900;">|&nbsp;消费资讯</h2>
				</div>
				
				
				<div class="content_main_list">
					<content action="lists" catid="$catid" order="id DESC" num="40" page='$page'>
					<ul class="clearfix">
						<volist name="data" id="vo">
						<li><a href="{:U('Content/Index/shows',array('catid'=>$catid,'id'=>$vo['id']))}"><em>●</em>{$vo.title|str_cut=###,25}</a><span>{$vo.inputtime|date ="Y-m-d",###}</span></li>
						</volist>
					</ul>
					</content>	
					<div class="pagebox">
                		{$pages}
            		</div>	
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