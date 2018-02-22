<extend name="./shuipf/Template/Default/Industry/common/_layout.php"/>
<block name="after_styles">
    <link rel="stylesheet" href="{$config_siteurl}statics/ci/css/detail.css">
    <link rel="stylesheet" href="{$config_siteurl}statics/ci/css/finance.css">
    <link rel="stylesheet" href="{$config_siteurl}statics/ci/css/product-show.css">
    <style>
        .detail-shop{padding: 19px 0;border-bottom: 1px solid #ccc;}
        .detail-shop li{display: inline-block;font-size: 14px;padding: 0 7px;}
        .analysis{border: none;background: #fff;padding: 20px 0;}
        .analysis h1{font-weight: normal;color: #a92107;line-height: 56px;background: #f5f5f5;padding-left: 25px;}
        .analysis .anaul .anaimg{width: 249px;height: 213px;box-sizing: border-box;padding: 15px;text-align: center;}
        .anaimg h5{font-size: 14px;color: #242424;font-weight: normal;text-align: center;line-height: 30px;margin-top: 10px;}
        .analysis .anaul{padding-left: 0;padding: 0 20px;}
        .analysis .anaul li{margin: 33px 0 0 22px;width: auto}
        .analysis .anaul li:first-child{margin-left: 0}
        .analysis .anaul li .anaimg  img{width: 271px;height: 202px;}
        .analysis .anaul li .anaimg{padding: 0;width: 273px;height: auto}
        .analysis .anaul li .anaimg h5{line-height: 71px;background: #EEEEEE;margin-top: 0}
        .jiathis_style{bottom: 5px;left: 150px;position: absolute;display: none;}

        .presentation_left .show_banner img{display: none}
        .presentation_left .show_banner img:nth-child(1){display: block;}
    </style>
</block>

<block name="content">
<div id="content" style="padding-bottom: 0">
    <div class="container clearfix">
        <div>
            <img src="{$config_siteurl}statics/images/product-show/detail-banner.jpg" alt="">
        </div>
        <!-- <div class="show_c_info">
            <img src="{$config_siteurl}statics/ci/images/show_title.jpg" alt="">
            <span>{$data.company}</span>
            <ul>
                <li>资询留言</li>
                <li>来访路线</li>
                <li>联系方式</li>
            </ul>
        </div> -->
        <ul class="detail-shop" style="background: #F5F5F5;">
            <li><a href="{:U('Industry/Product/index')}" style="co lor:#900;">首页</a></li>
            <li><span>></span></li>
            <li><a href="{:U('Industry/Product/index')}">产品展示</a></li>
            <li><span>></span></li>
            <li><a href="#">{$data.categoryname}</a></li>
            <li><span>></span></li>
            <notempty name='$data["typename"]'>
                <li><a href="#">{$data.typename}</a></li>
                <li><span>></span></li>
            </notempty>
            <li><a href="#" style="color:#900;">{$data.p_name}</a></li>
        </ul>
        <div style="padding: 28px 0;border: 1px solid #DCDCDC;border-top: none;">
            <div class="presentation_left">
                <div class="show_banner">
                    <volist name='data.thumb' id="vo">
                        <img src="{$vo}"/>
                    </volist>
                </div>
                <p>
                    
                  <span> <a href="javascript:;" class="fenxiang"><img src="{$config_siteurl}statics/ci/images/fenxiang.jpg" alt="">分享</a>
                  </span>

                  <span><a href="javascript:;" class="follow"><img src="{$config_siteurl}statics/ci/images/shoucang.jpg" alt="">收藏<input type="hidden" name="pid" value='{$data["id"]}'></a></span>
                  
                </p>
                <div class="jiathis_style" >
                    
                    <a class="jiathis_button_tsina"></a>
                    <a class="jiathis_button_weixin"></a>
                    <a class="jiathis_button_douban"></a>
                    <a class="jiathis_button_tqq"></a>

                    <!-- <a href="http://www.jiathis.com/share" class="jiathis jiathis_txt jtico jtico_jiathis" target="_blank"></a> -->
                    <!-- <a class="jiathis_counter_style"></a> -->
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
            </div>
            <div class="prestentation_right">
                <h5>{$data.p_name} 
                    <eq name='data.tourism' value='1'>{$data.type}</eq>
                    {$data.brandname}&nbsp;&nbsp;{$data.categoryname}&nbsp;&nbsp;{$data.typename}
                </h5>
                <dl>
                    <dt>价格</dt>
                    <dd>{$data.price}</dd>
                    <dt>促销价格</dt>
                    <dd style="color:#900;"><h5>{$data.price}</h5></dd>
                    <dt>产地</dt>
                    <dd>{$data.province}&nbsp;&nbsp;{$data.city}&nbsp;&nbsp;{$data.region}</dd>
                    <dt>生产厂家</dt>
                    <dd>{$data.manufacturer}</dd>
                    <dt>联系方式</dt>
                    <dd>{$data.phone}</dd>
                </dl>
                <a class="btn">支付</a>
                <ul>
                    <li>产品描述</li>
                    <div style="height: 95px;overflow: hidden;"><?php echo  html_entity_decode($data['p_describe'], ENT_QUOTES, 'UTF-8')?></div>
                </ul>
            </div>
        </div>
        <div class="analysis">
            <h1>猜你喜欢</h1>
            <ul class="anaul">
                <volist name='likedata' id='vo'>
                    <li>
                        <div class="anaimg">
                            <a href="{:U('Industry/Product/show',array('pid'=>$vo['id']))}">
                                <img src=".{$vo[thumb][0]}">
                            </a>
                            <h5>{$vo.p_name|str_cut=###,10}</h5>
                        </div>
                    </li>
                </volist>          
            </ul>
        </div>
    </div>    
</div>


</block>
<block name="after_scripts">
   <script type="text/javascript" src="{$Config_siteurl}statics/ci/js/show_page.js"></script>
   
    <script type="text/javascript">
        $(function(){
            $('.follow').click(function(event) {
                var uid = {$uid};

                /* Act on the event */
                if(checked_login(uid)){
                   var pid = $(this).parents('span').find('input[name=pid]').val();
                   
                    $.post('{:U("Industry/Product/follow")}', {pid: pid,uid:uid}, function(data) {
                        alert(data.message);

                    },"json");
                }
                
            });

            //分享
            $('.fenxiang').click(function(event) {
                /* Act on the event */
                $('.jiathis_style').css({"display":"block"});
            });
        })
    </script>
    

</block>
