<extend name="shuipf/Template/Default/Industry/common/_layout.php" />
<block name="after_styles">
    <link rel="stylesheet" href="{$config_siteurl}statics/ci/css/show_image.css" />
</block>
<block name="content">
	<!--导航栏-->
    <div id="nav" class="hotspot-nav">
        <div class="container">
            <ul>
                <li><a href="{:U('Industry/Index/index')}" class="home_src" style="color:#900;">首页</a></li>
                <li><span>></span></li>
                <li><a href=".{:getCategory(1,'url')}">资讯中心</a></li>
                <li><span>></span></li>
                <li><a href=".{:getCategory($catid,'url')}">{:getCategory($catid,'catname')} </a></li>
                <li><span>></span></li>
                <li><a href="javascript:;" style="color: #900;">{$title|str_cut=###,30}</a></li>
            </ul>
            <form action="">
				<input type="text" placeholder="输入你要搜索的关键字" />
				<input type="submit" value="搜索" />
			</form>
        </div>
    </div>
	<!--内容详情页-->
	
	<div id="content">
		<div class="content_title">
			<div class="title_main">
				<h3>{$data['title']|str_cut=###,20}</h2>
				<span>发帖人:{$data['username']}     发帖时间: {$iaddtime}  浏览次数:{$data['click_num']}</span>
				
			</div>
		</div>
		<div class="content_main">
			
				
			<div class="content_article">
				{$data['content']}
			</div>
		</div>
		
	</div>
	<!--<div id="photos">
		<div class="photos_title">
			<h2 class="hotspot-title" style="color:#900;"><span>|&nbsp;其他资讯</span></h2>
		</div>
		<div class="resource">
			<ul class="clearfix">
				
					<volist name="message" id="vo">
						<li>
							
							<a href="{:U('show',array('id'=>$vo['id']))}"><h1>{$vo['title']|str_cut=###,15}</h1></a>
						</li>
				</volist>
				
			</ul>
		</div>
	</div>-->
</block>