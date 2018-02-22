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
    <?php
        function find_parentid($catid,$parentid){
            static $id;
            $id = $catid;
            if($parentid!= 21){	
                $data = D('CategoryMore')->where(array('catid'=> $parentid ))->find();
                $id = $data['catid'];
                find_parentid($data['catid'],$data['parentid']);
            }
            return $id;
        }
        $parent_catid = find_parentid($catid,$parentid);
    ?>
	<div id="search">
	    <div class="container clearfix">
	        <p class="tips">欢迎关注山西文化产业微信公众号：2356982455</p>
	        <!--<form action="">
	            <input type="text" placeholder="输入你要搜索的关键字" value="" id="b">
	            <input class="search_btn" type="button" value="搜索" onclick="text()">
	        </form>-->
	    </div>
	</div>
	<div id="content">
    <div class="container clearfix">

        <div class="finan_l">
            <h2 style="padding-bottom: 0px;"><img src="{$Config_siteurl}statics/images/demo2302.png" style="padding-bottom: 15px;"> </h2>
            <div class="finsprodlt">
            <?php 
                        $imgarr = array(
                                "statics/ci/images/finsprod1.jpg","statics/ci/images/finsprod2.jpg"
                            );
                    ?>
                <content action="category" catid="$parent_catid" order="listorder ASC" >
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
            </div>
	

        </div>
        </content>
        <div class="finan_r">
            <div class="rcon">
                <div class="rcontop">
                   <img src="{$Config_siteurl}statics/images/demo2307.png" style="padding-bottom: 15px;">
                </div>
                <div class="finsprodintro">
                    <?php
                            $model = D('news');
                            $newsdatamodel = D('news_data');
                            $data = $model->join('cu_news_data ON cu_news.id = cu_news_data.id')->where(array('catid'=>36))->order('cu_news.id desc')->limit(1)->find();
                            echo $data['content'];
                        ?>
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
		window.location.href='{:U("Content/Search/index")}&key='+value;
	}
	</script>
</block>