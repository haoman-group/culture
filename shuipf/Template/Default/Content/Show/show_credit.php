<extend name="shuipf/Template/Default/Industry/common/_layout.php" />
<block name='after_styles'>
    <link rel="stylesheet" type="text/css" href="{$Config_siteurl}statics/ci/css/finance.css"/>
    <style>
        .finsprodintro{ font-size: 14px;  line-height: 40px;}
        .finsprodlt{ margin:0px 0px 16px 32px;}
        .ulfinsprodlt{ margin-bottom: 20px; border: 1px solid #e4e4e4; width: 256px; font-size: 14px;}
        .ulfinsprodlt li{ line-height: 40px; border-bottom: 1px dashed #eee; text-indent: 50px; position: relative;}
        .ulfinsprodlt li:before{ position: absolute; width: 4px; height: 4px; border-radius: 4px; content: ""; background:#275aba; left: 30px; top: 18px;}
        .ulfinsprodlt li:last-child{ border-bottom: none;}
        .finsprodlt img{ display: block;}
    </style>
</block>
<block name='content'>

    <div id="search">
        <div class="container clearfix">
            <p class="tips">欢迎关注山西文化产业微信公众号：2356982455</p>
            <form action="">
                <input type="text" placeholder="输入你要搜索的关键字" value="" id="b">
                <input class="search_btn" type="button" value="搜索" onclick="text()">
            </form>
        </div>
    </div>
    <div id="content">
        <div class="container clearfix">
                    <?php 
                        $imgarr = array(
                                "statics/ci/images/finsprod1.jpg","statics/ci/images/finsprod2.jpg"
                            );
                    ?>
            <div class="finan_l">
                <h2 style="padding-bottom: 0px;">信贷专区 </h2>
                <div class="finsprodlt">
                    <content action="category" catid="35" order="listorder ASC" >
                        <volist name="data" id="v1">
                            <img src="{$Config_siteurl}{$imgarr[$i-1]}">
                            <ul class="ulfinsprodlt">
                                <eq name="v1[child]" value="0">
                                    <content action="lists" catid="$v1[catid]" order="catid ASC" >
                                        <volist name = "data" id = "vo">
                                            <li>
                                                <a href=".{$vo.url}">{$vo.title|str_cut=###,14}</a>
                                            </li>
                                        </volist>
                                    </content>
                                </eq>
                    </ul>
                        </volist>
                    </content>
<!--                    <img src="{$Config_siteurl}statics/images/finsprod2.jpg">-->
                </div>


            </div>
            </content>
            <div class="finan_r">
                <div class="rcon">
                    <div class="rcontop">
                        {:getCategory($catid,"catname")}<span>（每个金融产品的详细介绍，有关银行的地址，电话等信息）</span>
                    </div>
                    <div class="finsprodintro">
                        {$content}
                    </div>
                </div>

            </div>

        </div>

    </div>
    <ul class="side-right">
        <li><a href="#"><img src="{$Config_siteurl}statics/images/service.png" alt="客服热线"></a></li>
        <li><a href="#"><img src="{$Config_siteurl}statics/images/return.png" alt="返回顶部"></a></li>
    </ul>
</block>
<block name="after_scripts">
	<script type="text/javascript" >
	function text(){
		var value = document.getElementById("b").value;
//		alert(value);
		window.location.href='{:U("Content/Search/index")}&key='+value;
	}
	</script>
</block>