<extend name="shuipf/Template/Default/Industry/common/_layout.php" />

<block name="after_styles">
    <link rel="stylesheet" href="{$config_siteurl}statics/ci/css/news.css" />
</block>
<block name="content">
    <div id="content">
        <div class="container">
            <div class="notis localdynamic clearfix">
                <div class="left notis-left">
                    <content action = "lists" catid = "$catid" order = "id DESC" num= "15" page = "$page">
                       <h5>产业案例</h5>
                        <ul class="local">

                                <li><a href=".{$vo.url}"><em>●</em>桑皮造纸：古老工艺让文化“遗产”变成文化“财产”</a><span>2016-12-22</span></li>
                                <li><a href=".{$vo.url}"><em>●</em>桑皮造纸：古老工艺让文化“遗产”变成文化“财产”</a><span>2016-12-22</span></li>
                                <li><a href=".{$vo.url}"><em>●</em>桑皮造纸：古老工艺让文化“遗产”变成文化“财产”</a><span>2016-12-22</span></li>
                                <li><a href=".{$vo.url}"><em>●</em>桑皮造纸：古老工艺让文化“遗产”变成文化“财产”</a><span>2016-12-22</span></li>
                                <li><a href=".{$vo.url}"><em>●</em>桑皮造纸：古老工艺让文化“遗产”变成文化“财产”</a><span>2016-12-22</span></li>
                        </ul>

                        <ul class="page">
                            <li>每页10条 共32页</li>
                            <li><a href="#">上一页</a></li>
                            <li><a href="#">1</a></li>
                            <li class="on"><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#">4</a></li>
                            <li><a href="#">下一页</a></li>
                        </ul>


                    </content>
                </div>
                <div class="right notis-right">
                    <h5>动态排行</h5>
                    <ul>
                    	<content action ="hits" catid="2" order="views DESC" num="10">
                    		<volist name = "data" id = "vo">


                                    <li><span>1</span><a href=".{$vo.url}">但是多福多寿</a></li>

                            </volist>
                        </content>
                        
                    </ul>
                </div>
            </div>

        </div>
    </div>
</block>
