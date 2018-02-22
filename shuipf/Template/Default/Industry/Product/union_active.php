<extend name="shuipf/Template/Default/Industry/common/_layout.php" />
<block name="after_styles">
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
                    <a href="{:U('Industry/Product/index')}">产品展示</a>
                </li>
                <li><span>></span></li>
                <li>
                    <a href="javascript:;" style="color: #900;" >联盟活动</a>
                </li>
            </ul>
            <form action="">
                <input type="text" placeholder="输入你要搜索的关键字" value="" id="b" />
                <input class="search_btn" type="button" value="搜索" onclick="text()" />
            </form>
        </div>
    </div>
    <div id="content">
        <div class="container clearfix">
            <div class="level32" style="background: none;border: none;padding: 0;">
                <h5 style="background: #e2ebf2;border-left: none;color: #900;height: 52px;font-size: 20px;padding-left: 20px;line-height: 52px;"><b>|</b>&nbsp;&nbsp;联盟活动</h5>
                <ul style="border: 1px solid #eeeeee;padding: 20px;padding-top: 5px;">
                    
                        <volist name="data" id="vo">
                            <li style="margin-top: 0px;">
                                <a href=""><h5 style="color: #900;font-size: 14px;background: none;border: none;padding: none;padding-left:20px;height: 20px;line-height: 20px;margin-top: 10px;">{$i}.{$vo.active_name|str_cut=###,25}</h5></a>
                                <dl class="clearfix" style="position: relative;padding: 20px;">

                                    <dt><a href=""><img src="{:thumb($vo['active_thumb'],330,195,1)}" alt="" style="width:330px;height:195px"></a></dt>
                                    <dd>
                                        <h1 style="margin: 0 0 10px;">{$vo.active_name}</h1>
                                        <p>{$vo.description}</p>
                                        <p><?php echo  html_entity_decode($vo['content'], ENT_QUOTES, 'UTF-8')?></p>
                                        <!-- <a href="{:U('Industry/Product/show',array('pid'=>$vo['id']))}" style="position: absolute;bottom: 20px;right: 20px;">更多>></a> -->
                                    </dd>
                                </dl>
                            </li>

                        </volist>
                    <div class="pagebox">
                {$page}
            </div>
            </ul>
            
            </div>
        </div>
    </div>
</block>
<block name="after_scripts">
	<script type="text/javascript" >
	function text(){
		var value = document.getElementById("b").value;
		window.location.href='{:U("Industry/Search/index")}&key='+value;
	}
	</script>
</block>