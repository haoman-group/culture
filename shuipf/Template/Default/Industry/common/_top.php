<div id="top">
    <div class="container clearfix">
        <ul class="left">
            <li><a href="{$config_siteurl}">网站首页</a></li>
            <li><span> | </span></li>
            <li><a href="javascript:addFav();" rel="sidebar" >收藏本站</a></li>
        </ul>
        <ul class="right">
            <empty name="uid">
                <li><a href="{:U('Industry/Public/login')}">登录</a></li>
                <li><span> | </span></li>
                <li><a href="{:U('Industry/Public/register')}">注册</a></li>
                <li><span> | </span></li>
                <li><a href="{:U('Industry/Public/register',['company'=>1])}">企业注册</a></li>
             <else/>
                <li><a href="{:U('Industrymem/Index/index')}">{$username}</a></li>
                <li><span> | </span></li>
                <li><a href="{:U('Industry/Public/logout')}">退出</a></li>
            </empty>
        </ul>
    </div>
</div>