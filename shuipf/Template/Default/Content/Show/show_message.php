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
                <li><a href="{:getCategory(1,'url')}">资讯中心</a></li>
                <li><span>></span></li>
                <li><a href="{:getCategory($catid,'url')}">{:getCategory($catid,'catname')} </a></li>
                <li><span>></span></li>
                <li><a href="javascript:;" style="color: #900;">{$title|str_cut=###,30}</a></li>
            </ul>
            <!--<form action="">
				<input type="text" placeholder="输入你要搜索的关键字" />
				<input type="submit" value="搜索" />
			</form>-->
        </div>
    </div>
	<!--内容详情页-->
	
	<div id="content">
		<div class="content_title">
			<div class="title_main">
				<h3>{$title|str_cut=###,20}</h2>
				<span>{$inputtime|date = "Y-m-d H:i:s",###}来源：山西新闻网</span>
				<p>浏览：{$views}人</p>
			</div>
		</div>
		<div class="content_main">
			<!-- <div class="content_pic"> -->
				<!-- <img src="{:thumb($thumb,600,370)}" style="width: 600px;height: 370px;display:block;margin: 0 auto;"/>
				<span>{$description|str_cut=###,50}</span> -->
			<!-- </div> -->
			<div class="content_article">
				{$content}
			</div>
		</div>
		<div class="left_content_bottom">
	        <div>分享：
	            <a href="" class="sina"><img src="{$Config_siteurl}statics/img/weibo.png" alt="微博"></a>
	            <a href="" class="wx"><img src="{$Config_siteurl}statics/img/weixin.png" alt="微信"></a>
	            <a href="" class="douban"><img src="{$Config_siteurl}statics/img/douban.png" alt="豆瓣">
	            </a><a href="" class="doudou"><img src="{$Config_siteurl}statics/img/doudou.png" alt="豆豆"></a>
	        </div>
       </div>
	</div>
	<div id="photos">
		<div class="photos_title">
			<h2 class="hotspot-title" style="color:#900;"><span>|&nbsp;其他资讯</span></h2>
		</div>
		<div class="resource">
			<ul class="clearfix">
				<content action="lists" catid="17" order="id DESC" num="4" page='$page'>
					<volist name="data" id="vo">
						<li>
							<!-- <a href="{:U('Content/Index/shows',array('catid'=>$catid,'id'=>$vo['id']))}"><img src="{:thumb($vo['thumb'],250,172)}" style="width:250px;height:172px"></a> -->
							<a href="{:U('Content/Index/shows',array('catid'=>$catid,'id'=>$vo['id']))}"><h1>{$title}</h1></a>
						</li>
				</volist>
				</content>
			</ul>
		</div>
	</div>
</block>