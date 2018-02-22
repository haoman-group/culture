<extend name="shuipf/Template/Default/Industry/common/_layout.php" />
<block name="after_styles">
    <link rel="stylesheet" href="{$config_siteurl}statics/ci/css/news.css" />
    <link rel="stylesheet" href="{$config_siteurl}statics/ci/css/page_common.css" />
    <link rel="stylesheet" href="{$config_siteurl}statics/css/list_news_industry.css" />
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
                    <a href=".{:getCategory(1,'url')}">资讯中心</a>
                </li>
                <li><span>></span></li>
                <li>
                    <a href="javascript:;" style="color: #900;">{:getCategory($catid,'catname')}</a>
                </li>
            </ul>
            <form action="">
                <input type="text" placeholder="输入你要搜索的关键字" value="" id="b" />
                <input class="search_btn" type="button" value="搜索" onclick="text()" />
            </form>
        </div>
    </div>
    <div id="content">
        <div class="container" style="margin-top: 0">
            <div class="notis localdynamic clearfix">
                <div class="left notis-left" style="width: 766px;">
                    <div class="special_content_left newsbox">
                        <content action = "lists" catid = "$catid" order = "id DESC" num= "25" page = "$page">
                            <h2 class="hotspot-title" style="color: #900;"><span>|&nbsp;{:getCategory($catid,'catname')}</span></h2>
                            <ul class="local">
                                <volist name="data" id="vo">
                                    <li><a href=".{$vo.url}"><em>●</em>{$vo.title|str_cut=###,40}</a><span>{$vo.inputtime|date="Y-m-d",###}</span></li>
                                </volist>
                            </ul>

                        </content>
                        <div class="pagebox">
                            {$pages}
                        </div>

                    </div>

                </div>
                <div class="right notis-right">
                    <div class="newsbox">
                        <h2><span style="color: #900;">|&nbsp;动态排行</span></h2>
                        <ul class="rtrankul">
                            <content action ="hits" catid="$catid" order="views DESC" num="7">
                                <volist name = "data" id = "vo">
                                    <if condition = "($i lt 4)">
                                        <li class="on"><span>{$i}</span><a href=".{$vo.url}" style="color:#696b76; ">{$vo.title|str_cut=###,23,''}</a></li>
                                        <else />
                                        <li><span style="background: #C9C9C9">{$i}</span><a href=".{$vo.url}" style="color:#696b76;" >{$vo.title|str_cut=###,23,''}</a></li>
                                    </if>
                                </volist>
                            </content>

                        </ul>
                    </div>
                    <!-- <div class="newsbox" style="margin-top: 20px;">
                        
                        <h2><span style="color: #900;">|&nbsp;我的创意</span></h2>
                        <ul class="rtrankul">
                        <ul class="rtrankul">
                            <content action ="hits" catid="$catid" order="views DESC" num="13">
                                <volist name = "data" id = "vo">
                                    <if condition = "($i lt 4)">
                                        <li class="on"><span>{$i}</span><a href=".{$vo.url}" style="color:#696b76;">{$vo.title|str_cut=###,23,''}</a></li>
                                        <else />
                                        <li><span  style="background: #C9C9C9">{$i}</span><a href=".{$vo.url}" style="color:#696b76;">{$vo.title|str_cut=###,23,''}</a></li>
                                    </if>
                                </volist>
                            </content>

                        </ul>
                    </div> -->


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
