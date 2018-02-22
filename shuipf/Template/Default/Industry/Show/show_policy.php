<extend name="shuipf/Template/Default/Industry/common/_layout.php" />

<block name="after_styles">
    <link rel="stylesheet" href="{$config_siteurl}statics/ci/css/policy.css" />
</block>
<block name="content">

    <div id="nav">
        <div class="container">
            <ul>
                <li><a href="{:U('Industry/Index/index')}" class="home_src">首页</a></li>
                <li><span>></span></li>
                <li><a href="#">政策法规</a></li>
                <!-- <li><span>></span></li> -->
                <!-- <li><a href="#">发布系统</a></li> -->
            </ul>
            <form action="">
                <span>信息搜索</span>
                <input type="text" placeholder="输入你要搜索的关键字" />
                <select name="" id="">
                    <option value="全部">全部</option>
                    <option value="全部">全部</option>
                </select>
                <button>搜索</button>
                <a href="#">高级搜索</a>
                <!-- <a href="index.html">返回首页</a> -->
            </form>
        </div>
    </div>

    <div id="content">
        <div class="container industry clearfix">
            <div class="industry-left">
                <h2><img src="{$config_siteurl}statics/images/policy.png" alt="个人中心" style="top: 0;left: 0;" /></h2>
                <ul>
                    <li><a href="#"><span>●</span>综合文化政策</a></li>
                    <!-- <li style="background: #f1f1f1;"><a href="#"><span>&nbsp;&nbsp;&nbsp;&nbsp;●</span>政策法规</a></li> -->
                    <li><a href="#"><span>&nbsp;&nbsp;&nbsp;&nbsp;●</span>国际政策法规</a></li>
                    <li><a href="#"><span>&nbsp;&nbsp;&nbsp;&nbsp;●</span>国外政策法规</a></li>
                    <li style="background: #f1f1f1;"><a href="#"><span>&nbsp;&nbsp;&nbsp;&nbsp;●</span>国家政策法规</a></li>
                    <li><a href="#">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;国家法律</a></li>
                    <li><a href="#">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;行政法规</a></li>
                    <li><a href="#">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;规章</a></li>
                    <li><a href="#">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;规范性文件</a></li>
                    <li><a href="#">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;发展规划</a></li>
                    <li><a href="#" style="color: #bd1514;"><span>●</span>文化产业政策</a></li>
                    <li><a href="#">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;本省政策法规</a></li>
                    <li><a href="#">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;外省政策法规</a></li>
                    <li><a href="#" style="color: #bd1514;"><span>●</span>政策解读</a></li>
                    <!-- <li><a href="#">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;政策解读</a></li> -->
                </ul>
            </div>
            <div class="industry-right">
                111
            </div>
        </div>
    </div>
</block>
