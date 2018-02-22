<extend name="shuipf/Template/Default/Industry/common/_layout.php" />
<block name="after_styles">
    <link rel="stylesheet" href="{$config_siteurl}statics/css/news.css" />
    <link rel="stylesheet" href="{$config_siteurl}statics/css/list_news_industry.css" />
</block>

<block name="content">
    <div id="nav">

        <div class="container">
            <ul>
                <li><a href="{$config_siteurl}" class="home_src">首页</a></li>
                <li><span>></span></li>
                <li><a href=".{:getCategory(1,'url')}">资讯中心</a></li>
                <li><span>></span></li>
                <li><a href="{:getCategory($catid,'url')}" style="color: #2058C2;">{:getCategory($catid,'catname')} </a></li>
                <!--                <li><span>></span></li>-->
                <!--                <li><a href="javascript:;" style="color: #2058c2;">{$title}</a></li>-->
            </ul>
            <form action="" style="margin-top:2px;">
                <input type="text" placeholder="输入你要搜索的关键字" value="" id="b" />
                <input class="search_btn" type="button" value="搜索" onclick="text()" />
            </form>
        </div>
    </div>
    <div id="content">
        <div class="container list-container clearfix">

            <div class="special_content_left">
                <!--<div class="hotspot-left-title hotspot-title">-->
                <h2 class="hotspot-title"><span>|&nbsp;产业要闻</span></h2>
                <!--</div>-->
                <ul class="hotspot-left-middle">
                    <content action="lists" catid="$catid" order="id DESC" num="22" page="$page">
                        <volist name="data" id="vo">
                            <li><a href=".{$vo.url}"><em>●</em>{$vo.title|str_cut=###,43}</a><span>{$vo.inputtime|date ="Y-m-d",###}</span></li>
                        </volist>
                    </content>

                </ul>
                <div class="pagebox">
                    {$pages}
                </div>
            </div>
            <div class="special_content_right">
                <h2><span>图片新闻</span></h2>
                <content action="lists" catid="7" order="weekviews DESC" num="3" page='$page'>
                    <volist name="data" id="vo">
                        <div class="pic-news">
                            <a href=""><img src="{$vo.thumb,376,181}" alt="" style="width: 376px;height: 181px;margin-bottom: 10px;"></a><br>
                            <span>{$vo.title|str_cut=###,18}</span>
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