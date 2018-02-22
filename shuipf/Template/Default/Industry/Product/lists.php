<extend name="./shuipf/Template/Default/Industry/common/_layout.php"/>
<block name="after_styles">
    <link rel="stylesheet" href="{$config_siteurl}statics/ci/css/finance.css">
</block>
<block name="after_scripts">

</block>
<block name="content">
       
    <div id="nav">
        <div class="container">
            <ul>
                <li>
                    <a href="{:U('Industry/Index/index')}" class="home_src" style="color:#900;">首页</a>
                </li>
                <li><span>&gt;</span></li>
                <li>
                    <a href="{:U('Industry/Product/index')}">产品展示</a>
                </li>
                <li><span>&gt;</span></li>
                <li>
                    <a href=".{:getCategory(1,'url')}" class="href_tail" style="color:#900;">{$type}</a>
                </li>
                
            </ul>
            <form action="">
                <input type="text" placeholder="输入你要搜索的关键字" />
                <input type="submit" value="搜索" />
            </form>
        </div>
    </div>

       <div id="content">
        <div class="container clearfix">
            
            <div class="prodlistbox">
                <ul class="ulcell">
                <volist name='data' id='vo'>
                    <li>
                        <div class="anaimg">
                            <a href="{:U('Industry/Product/show',array('pid'=>$vo['id']))}">
                                <img src=".{$vo[thumb][0]}">
                            </a>
                            <h5><a href="">{$vo.p_name}</a></h5>
                        </div>
                    </li>
                </volist>   
                </ul>
                <div class="pagebox">
                    {$page}
                </div>
            </div>
        </div>
    </div>

</block>