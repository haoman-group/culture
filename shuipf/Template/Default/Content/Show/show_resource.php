<extend name="shuipf/Template/Default/Industry/common/_layout.php" />
<block name="after_styles">
	<link rel="stylesheet" href="{$config_siteurl}statics/ci/css//show_resource.css" />
</block>

<block name="content">
	<div id="nav" class="hotspot-nav">
        <div class="container">
            <ul>
                <li><a href="{:U('Industry/Index/index')}" class="home_src">首页</a></li>
                <li><span>></span></li>
                <li><a href=".{:getCategory(1,'url')}">资讯中心</a></li>
                <li><span>></span></li>
                <li><a href=."{:getCategory($catid,'url')}">{:getCategory($catid,'catname')} </a></li>
                <li><span>></span></li>
                <li><a href="javascript:;" style="color: #2058c2;">{$title|str_cut=###,30}</a></li>
            </ul>
            <form action="">
				<input type="text" placeholder="输入你要搜索的关键字" />
				<input type="submit" value="搜索" />
			</form>
        </div>
    </div>
		<div id="content">
			<div class="container list-container clearfix">
				<div class="special_content_left">
					<!--<div class="hotspot-left-title hotspot-title">-->
					<h2 class="hotspot-title" ><span>|&nbsp;{$title|str_cut=###,30}</span></h2>
					<!--</div>-->
					<ul class="hotspot-left-middle">
						<li><a href="{:U('Content/Index/shows',array('catid'=>$catid,'id'=>$vo['id']))}"><em>●</em>{$title|str_cut=###,30}</a></li>
					</ul>
				</div>
			</div>
		</div>
</block>