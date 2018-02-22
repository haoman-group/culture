<!--企业推荐-->
<extend name="shuipf/Template/Default/Industry/common/_layout.php" />
<block name="after_styles">
	<link rel="stylesheet" href="{$config_siteurl}statics/ci/css/pic.css" />
    <link rel="stylesheet" href="{$config_siteurl}statics/ci/css/news.css" />
</block>
<block name="content">
	<div id="nav">
		<div class="container">
			<ul>
				<li>
					<a href="{:U('Industry/Index/index')}" class="home_src" style="color:#900;">首页</a>
				</li>
				<li><span>></span></li>
				<li>
					<a href="{:U('Industry/Index/lists',array('catid'=>1))}">资讯中心</a>
				</li>
				<li><span>></span></li>
				<li>
					<a href="javascript:;" style="color: #900;">企业推荐</a>
				</li>
			</ul>
			<form action="">
				<input type="text" placeholder="输入你要搜索的关键字" value="" id="b" />
				<input class="search_btn" type="button" value="搜索" onclick="text()"/>
			</form>
		</div>
	</div>
    <div id="content">
        <div class="container">
            <div class="notis localdynamic clearfix">
                <div class="left notis-left">
                    <div class="newsbox" style="width: 1200px;border: none;border: 1px solid #eeeeee;">
                        <h5><b>|</b>&nbsp; {:getCategory($catid,'catname')}</h5>
                            <ul class="clearfix" style="width: 1230px;">
                                <get table="links" termsid="3" visible="1" order="id DESC" num="45" page="$page">
                                    <volist name="data" id="vo">
                                        <li style="width: 207.5px;height: 80px;margin:0px;margin-right: 30px;margin-bottom: 20px;">
                                            <a href=".{$vo.url}"><img style="margin-top: 15px;width: 170px;height: 50px;" src="{:thumb($vo['image'],170,50,1)}" alt="" ></a>

                                        </li>
                                    </volist>
                                 </get>
                               
                            </ul>
                             <div class="pagebox">
                            		{$pages}
                        	</div>
<!--                        </div>-->


                        
                    </div>

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