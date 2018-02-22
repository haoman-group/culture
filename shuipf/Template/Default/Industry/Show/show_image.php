<extend name="shuipf/Template/Default/Industry/common/_layout.php" />
<block name="after_styles">
    <link rel="stylesheet" href="{$config_siteurl}statics/ci/css/show_image.css" />
    <style>
        .jiathis_style_32x32{
            width: 300px;
            margin-left: 850px;
            margin-top: -10px;
        }


        .jiathis_style_32x32 strong{
            font-size: 14px;
            font-family: "Microsoft Yahei";
            text-align: center;
            line-height: 32px;
            float: left;
        }
        .title_main p{
            line-height: 0;
        }


    </style>
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
                <li><a href=".{:getCategory($catid,'url')}" style="color: #900;">{:getCategory($catid,'catname')} </a></li>
<!--                <li><span>></span></li>-->
<!--                <li><a href="javascript:;" class="href_tail">{$title|str_cut=###,30}</a></li>-->
            </ul>
            <form action="" style="margin-top:2px;">
				<input type="text" placeholder="输入你要搜索的关键字" />
				<input type="submit" value="搜索" />
			</form>
        </div>
    </div>
	<!--内容详情页-->
	
	<div id="content">
		<div class="content_title">
			<div class="title_main">
				<h3>{$title|str_cut=###,20}</h2>
				<span>陕西省政府门户网站 www.shanxi.gov.com {$inputtime|date = "Y-m-d H:i:s",###}来源：山西新闻网</span>
				<p>浏览：{$views}人</p>
    			</div>
		</div>
		<div class="content_main">
			<div class="content_pic">
				<img src="{:thumb($thumb,600,370)}" style="width: 600px;height: 370px;display:block;margin: 0 auto;"/>
				<span>{$description|str_cut=###,50}</span>
			</div>
			<div class="content_article">
				{$content}
			</div>
		</div>
		<div class="left_content_bottom">
            <div class="newsshowshare">
                <!-- JiaThis Button BEGIN -->
                <div class="jiathis_style_32x32 ">
                    <strong >分享:</strong>
                    <a class="jiathis_button_tsina"></a>
                    <a class="jiathis_button_weixin"></a>
                    <a class="jiathis_button_douban"></a>
                    <a class="jiathis_button_tqq"></a>

<!--                    <a href="http://www.jiathis.com/share" class="jiathis jiathis_txt jtico jtico_jiathis" target="_blank"></a>-->
<!--                    <a class="jiathis_counter_style"></a>-->
                </div>
                <script>
                    var jiathis_config={
                        url:window.location.href,
                        summary:"",
                        title:document.querySelector(".left_content_title h2").innerHTML+"-产业服务平台",
                        pic:document.querySelectorAll(".left_content_div img").length>0?document.querySelectorAll(".left_content_div img")[0].attr("src"):"/statics/ci/images/logo.png",
                        hideMore:false
                    }
                </script>
                <script type="text/javascript" src="http://v3.jiathis.com/code/jia.js" charset="utf-8"></script>
                <!-- JiaThis Button END -->
            </div>
       </div>
	</div>
<!--	<div id="photos">-->
<!--		<div class="photos_title">-->
<!--			<h2 class="hotspot-title"><span>|&nbsp;产业要闻</span></h2>-->
<!--		</div>-->
<!--		<div class="resource">-->
<!--			<ul class="clearfix">-->
<!--				<content action="lists" catid="2" order="id DESC" num="4" page='$page'>-->
<!--					<volist name="data" id="vo">-->
<!--						<li>-->
<!--							<a href="{$vo.url}"><img src="{:thumb($vo['thumb'],250,172)}" style="width:250px;height:172px"></a>-->
<!--							<a href="{$vo.url}"><h1>{$inputtime|date = "Y-m-d H:i:s",###}</h1></a>-->
<!--						</li>-->
<!--				</volist>-->
<!--				</content>-->
<!--			</ul>-->
<!--		</div>-->
<!--	</div>-->
</block>
