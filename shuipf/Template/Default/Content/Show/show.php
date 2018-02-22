<extend name="shuipf/Template/Default/Industry/common/_layout.php" />
<block name="after_styles">

    <link rel="stylesheet" href="{$config_siteurl}statics/ci/css/news.css" />
    <link rel="stylesheet" href="{$config_siteurl}statics/ci/css/show.css" />
    <style>
        .localdynamic  .article-right {
            width: 418px;
            /*height: 388px;*/
            border:1px solid #ccc;
        }
        .localdynamic .article-right h5{
            width: 360px;
            height: 62px;
            margin: 0 auto;
            text-align: center;
            line-height: 62px;
            background: rgba(0, 0, 0, 0) url("{$Config_siteurl}statics/img/audio.png") no-repeat scroll 80px center;
            border-bottom:1px solid #ccc;
            font-size: 20px;
        }
        .localdynamic .article-right ul li{
            line-height: 28px;
            width: 360px;
            margin: 0 auto;
        }
        .localdynamic .article-right ul li span{
            text-indent: 0px;
            text-align: center;
        }
        .left_relate_article{
            width: 750px;
            height:100px;
            /*float: left;*/
        }
        .left_relate_article h5{
            width: 750px;
            font-size:18px;
            line-height: 30px;
            padding-top: 15px;
            text-indent: 10px;
            margin-bottom: 0;
            text-align: left;
        }
        .left_relate_article li{
            float: left;
            width: 315px;
            font-size: 14px;
            line-height: 21px;
            color: #7E7F89;
            text-indent: 5px;
        }
        .left_relate_article li:nth-of-type(odd){
            margin-right: 100px;
        }
        .left_relate_article li:nth-of-type(even){
        }
        .left_relate_article li em{
            color: #4480DF;
            font-size: 12px;
            font-style: normal;
            margin-right: 7px;
            position: relative;
            top: -2px;
        }
        .newsbox{
            float: right;
            margin-right: 30px;
            margin-top: 20px;
            width: 33%;
        }

    </style>
</block>
<block name="content">
<!--    <div id="banner">-->
<!--        <img src="{$Config_siteurl}statics/images/news/article-banner.jpg">-->
<!--    </div>-->
    <div id="nav" class="hotspot-nav">
        <div class="container">
            <ul>
                <li><a href="{:U('Industry/Index/index')}" class="home_src" style="color:#900;">首页</a></li>
                <li><span>></span></li>
                <li><a href=".{:getCategory(1,'url')}">资讯中心</a></li>
                <li><span>></span></li>
                <li><a href=".{:getCategory($catid,'url')}" style="color: #900;">{:getCategory($catid,'catname')} </a></li>
<!--                <li><span>></span></li>-->
<!--                <li><a href="javascript:;" style="color: #2058c2;">{$title}</a></li>-->
            </ul>
        </div>
    </div>
    <div id="content" style="overflow: hidden;">

        <div class="container clearfix localdynamic ">
            <div class="hotspot-left">
                <?php
                	$where = "id=".$id;
                ?>
                <content action="lists" catid="$catid" num="1" where="$where">
                	{$data[0].inputtime}
                    <foreach name="data" item="v">
		                <div class = "left_div">
		                    <div class="left_content_title">
		
		                                <h2>{$v.title}</h2>
		                                <p>{$v.inputtime|date = "Y-m-d H:i:s",###} 浏览：{:hits($catid,$id)}次</p>
		                    </div>
		                    <div class="left_content_div"><if condition="$content neq '' ">{$content}<else/>{$contents}</if></div>

                            <div class="newsshowshare">
                                <!-- JiaThis Button BEGIN -->
                                <div class="jiathis_style_32x32 ">
                                    <strong>分享:</strong>
                                    <a class="jiathis_button_tsina"></a>
                                    <a class="jiathis_button_weixin"></a>
                                    <a class="jiathis_button_douban"></a>
                                    <a class="jiathis_button_tqq"></a>

                                    <a href="http://www.jiathis.com/share" class="jiathis jiathis_txt jtico jtico_jiathis" target="_blank"></a>
                                    <a class="jiathis_counter_style"></a>
                                </div>
                                <script>
                                    var jiathis_config={
                                        url:window.location.href,
                                        summary:"",
                                        title:document.querySelector(".left_content_title h2").innerHTML+"-产业服务平台",
                                        pic:document.querySelectorAll(".left_content_div img").length>0?document.querySelectorAll(".left_content_div img")[0].attr("src"):"/statics/ci/images/logo.png",
                                        hideMore:false
                                    }
                                </script>
                                <script type="text/javascript" src="http://v3.jiathis.com/code/jia.js" charset="utf-8"></script>
                                <!-- JiaThis Button END -->
                            </div>

                        </div>

		                <!--相关文章-->
		                <div class="left_relate_article">
		                    <h5 style="color:#900;">相关文章</h5>
		                    <ul>
		                        <tags action="lists" tag="$v['tags']" num="4" order="updatetime DESC">
		                            <?php $arr = array();?>
		                            <volist name = "data" id = "vo">
		                                <if condition ="!( in_array( $vo['id'] , $arr ) )">
		                                    <?php $arr[]=$vo['id']?>
		                                    <li><em>●</em><a href="{$vo.url}">{$vo.title|str_cut=###,15}</a></li>
		                                </if>
		                            </volist>
		                        </tags>
		                    </ul>
		                </div>
                	</foreach>
                </content>
            </div>

            <div class="hotspot-right right  notis-right article-right">
                <h5 style="color:#900;">热点新闻排行</h5>
                <ul style="padding-top: 20px;padding-bottom: 15px;">
                    <content action="hits" catid="$catid" order="weekviews DESC" num="10">
                        <volist name="data" id="vo">
                            <if condition="$i lt 4">
                                <li class="on"><span style="margin-right: 16px;">{$i}</span><a href="{:U('Content/Index/shows',array('catid'=>$catid,'id'=>$vo['id']))}" style="font-size: 16px;color: #696b76;">{$vo.title|str_cut=###,15}</a><p style="float:right;padding-right: 15px;background: url('{$config_siteurl}statics/ci/images/sheng.png') no-repeat 42px 8px;">13213</p></li>
                                <else/>
                                <li><span style="margin-right: 16px;">{$i}</span><a href="{:U('Content/Index/shows',array('catid'=>$catid,'id'=>$vo['id']))}" style="font-size: 16px;color: #696b76;">{$vo.title|str_cut=###,15}</a><p style="float:right;padding-right: 15px;background: url('{$config_siteurl}statics/ci/images/sheng.png') no-repeat 42px 8px;">13213</p></li>
                            </if>
                        </volist>
                    </content>
                </ul>

            </div>
           <!--  <div class="newsbox" style="width: 416px;margin-right: 0;">
                <h5 style="color:#900;">我的创意</h5>
                <ul class="rtrankul">
                    <content action ="hits" catid="$catid" order="views DESC" num="13">
                        <volist name = "data" id = "vo">
                            <if condition = "($i lt 4)">
                                <li class="on"><span>{$i}</span><a href=".{$vo.url}">{$vo.title|str_cut=###,23,''}</a></li>
                                <else />
                                <li><span  style="background: #C9C9C9">{$i}</span><a href=".{$vo.url}">{$vo.title|str_cut=###,23,''}</a></li>
                            </if>
                        </volist>
                    </content>

                </ul>
            </div> -->



        </div>

    </div>
</block>
<block name="after_scripts">
    <script type="text/javascript">
        $(function(){
            //点击
            $.get("{$Config.siteurl}api.php?m=Hits&catid={$catid}&id={$id}", function (data) {
                $("#hits").html(data.views);
            }, "json");
        });
    </script>
</block>
