<extend name="shuipf/Template/Default/Industry/common/_layout.php" />
<block name="after_styles">

    <style>
        .proh{line-height: 50px;font-size: 20px;color: #4d4d4d;font-weight: normal;border-bottom: 1px solid #2058c2;text-indent: 10px;}
        .profile{padding: 30px 16px 90px;background: #f5f5f5;margin-top: 10px;}
        .profile h1{font-weight: normal;font-size: 24px;color: #2e2e32;line-height: 54px;text-align: center;margin: 0 0 30px 0;}
        .profile p{font-size: 18px;color: #2e2e32;line-height: 40px;text-indent: 2em;}
    </style>
</block>
<block name="content">
    <div id="nav">
        <div class="container">
            <ul>
                <li><a href="{:U('Industry/Index/index')}" class="home_src" style="color:#900;">首页</a></li>
                <li><span>></span></li>
                <li><a href="{:U('Industry/index')}">产业项目</a></li>
                <li><span>></span></li>
                <li><a href="#" style="color: #900;">平台概况</a></li>
                <!-- <li><span>></span></li> -->
                <!-- <li><a href="#">国际邮快件综合服务平台</a></li> -->
            </ul>
            <form action="">
                <input type="text" placeholder="输入你要搜索的关键字" value="" id="b" />
                <input class="search_btn" type="button" value="搜索" onclick="text()" />
            </form>
        </div>
    </div>
    <div id="content">
        <div class="container clearfix">
            <h5 class="proh" style="border: none;background: #E2EBF1;">平台概况</h5>
            <div class="profile">
                <h1>山西文化产业项目服务平台简介</h1>
                <p>文化产业项目是文化产业的载体与关键，是发展文化产业的重要抓手，决定着文化产业的规模与质量。为准确掌握项目信息，推动项目展示与交易，将文化资源优势通过项目转化为产业优势，山西省文化产业发展中心从项目扶持、产业发展的需求出发，组织建设了山西省文化产业项目服务平台。</p>
                <p>平台目前已搭载项目展示、项目发布、项目申报、项目检索等系统，汇集海量优质文化产业项目，集智能检索、多维展示于一体，配套提供文化企业信用评级、文化产业项目金融服务、文化消费服务等功能，有效满足文化产业各类主体的使用需求。</p>
            </div>
        </div>
    </div>

</block>
<script>
    $(function(){
        $(".top_menuItem").eq(3).addClass("choose");

        $(".publish").on("click",function(){
            layer.msg('请先登录',{
                end: function(){
                    window.location.href = '../reg_login/login-personal-pub.html';
                }
            });
            return false;
        });
    });
</script>
<block name="after_scripts">
	<script type="text/javascript" >
	function text(){
		var value = document.getElementById("b").value;
		window.location.href='{:U("Content/Search/index")}&key='+value;
	}
	</script>
</block>

