<extend name="shuipf/Template/Default/Industry/common/_layout.php" />
<block name="after_styles">
	<link rel="stylesheet" href="{$config_siteurl}statics/ci/css//show_resource.css" />
</block>

<block name="content">
	<div id="nav" class="hotspot-nav">
        <div class="container">
            <ul>
                <li><a href="{$config_siteurl}">首页</a></li>
                <li><span>></span></li>
                <li><a href="{:getCategory(1,'url')}">资讯中心</a></li>
                <li><span>></span></li>
                <li><a href="{:U('Industry/Forum/index')}">我的创意</a></li>
                <li><span>></span></li>
                <li><a href="javascript:;" style="color: #2058c2;">往期公告 </a></li>
                <!-- <li><span>></span></li>
                <li>{$title|str_cut=###,30}</li> -->
            </ul>
        </div>
    </div>
		<div id="content">
			<div class="container list-container clearfix">
				<div class="special_content_left">
					
					<!--<div class="hotspot-left-title hotspot-title">-->
					<h2 class="hotspot-title" ><span>往期公告</span></h2>
					<!--</div>-->
					<ul class="hotspot-left-middle">
					<content action = "lists" catid = "97" order = "id DESC" num= "25" page='$page'>
						<volist name="data" id="vo">
						<li><a href="{:U('Industry/Index/shows',array('id'=>$vo['id'],'catid'=>9))}"><em>●</em>{$vo.title|str_cut=###,70}</a></li>
						</volist>
					</content>
					</ul>
					<div class="pagebox">
                		{$page}
            		</div>		
				</div>
			</div>
		</div>
</block>