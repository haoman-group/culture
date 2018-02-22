<extend name="./shuipf/Template/Default/Industry/common/_layout.php"/>
<block name="after_styles">
    <link rel="stylesheet" href="{$config_siteurl}statics/ci/css/product-show.css">
    <link rel="stylesheet" href="{$config_siteurl}statics/css/table.css">
    <style >
        .container .title{width: 100%}
        .container .title h3{width: 200px,display:inline-block;color:#900;}
        .side-lefts p{width: 200px;height: 35px;line-height: 20px;color:#4782DC;font-size: 18px;font-family: "Microsoft Yahei", "微软雅黑"; }
    </style>
</block>
<block name="after_scripts">
    <script type="text/javascript">
        var dd = document.querySelectorAll(".side-lefts dd");
        for(var i = 0;i < dd.length;i ++){
            dd[i].onmouseover = function(){
                this.querySelector(".hidden").style.display = 'block';
            };
            dd[i].onmouseout = function(){
                this.querySelector(".hidden").style.display = 'none';
            };
        }
    </script>
    <script type="text/javascript" src="{$config_siteurl}statics/ci/js/layer/layer.js"></script>
        
    
    <script>
        $(function(){
            $(".top_menuItem").eq(4).addClass("choose");
            var uid = {$uid};
            
            $(".publish").on("click",function(){
                if(checked_login(uid)){
                    window.location.href="{:U('Industry/Product/add')}";
                }
            })
            
            
        });

    </script>
    <script>
        $(function(){
            $('.follow').click(function(event) {
                var uid = {$uid};
                /* Act on the event */
                if(checked_login(uid)){
                   var pid = $(this).parents('dd').find('input[name=pid]').val();
                    $.post('{:U("Industry/Product/follow")}', {pid: pid}, function(data) {
                        alert(data.message);

                    },"json");
                }
                
            });
        })
        // $(function(){
        //     $('.search').submit(function(event) {
        //         /* Act on the event */
        //         var data = $(this).serialize();
        //         // alert(data);
        //         $.post('{:U("Industry/Product/search")}', data, function(data) {
        //             /*optional stuff to do after success */
        //         },'json');
        //         return false;
        //     });
        // })
    </script>
    <script type="text/javascript">
        $(".search .submit").click(function(event) {
            /* Act on the event */
            var keywords = $('input[name=keywords]').val();
            window.location.href = "{:U('Industry/Product/search')}&keywords=" + keywords;
            return false;
        });
    </script>
    <script type="text/javascript">
        $('.dishi .ds_ul li').click(function(){
            $(this).addClass("on").siblings('.dishi .ds_ul li').removeClass("on");
            $('.di_shi_guan').eq($(this).index()).show().siblings('.di_shi_guan').hide();
            $('.di_shi_guan').eq($(this).index()).find('.ds_map img').eq($(this).index()).show().siblings('.ds_map img').hide();
            // $('.ds_map img').eq($(this).index()).show()
            var area = $(this).find('input[name=area]').val();
            var url = "{:U('Industry/Product/area')}&city="+area;
            $(".dishi .dsgd").attr('href',url);

        })
        $('.dishi .ly_ul li').click(function(event) {
            $(this).addClass("on").siblings('.ly_ul li').removeClass("on");
            $('.ly_tab').eq($(this).index()).show().siblings('.ly_tab').hide();
            // alert();
            var type = $(this).find('input[name=type]').val();

            var urls = "{:U('Industry/Product/lists')}&type="+type;
            // alert(urls);
            $(".dishi .lygd").attr('href',urls)
        });
        
    </script>

</block>
<block name="content">
    <div class="content-box container" style="margin-top: 40px;">

        <div id="" style="width: 890px;float: left;">

            <div class="side-lefts">
                <p style="color:#900;">产品展示馆&nbsp-&nbsp网上文博会</p>
                <div>
                    <dl>
                        <dt><a href="{:U('Industry/Product/subject')}" style="color:#900 ">主题馆</a></dt>
                        <volist name='category' id='v'>
                            <dd>
                                <volist name="v" id= "vo">
                                    <if condition = '$i eq 1'>
                                        <a href="{:U('Industry/Product/subject',array('category'=>$vo['c_name']))}">{$vo.c_name}</a>
                                    <else />
                                        |<a href="{:U('Industry/Product/subject',array('category'=>$vo['c_name']))}">{$vo.c_name}</a>
                                    </if>
                                </volist>
                                <div class="hidden_table">
                                    <div class="table_left">
                                    <volist name="v" id= "vo">
                                        <ul>
                                            <div class="table_title">
                                                <h5><span>|&nbsp;</span>{$vo.c_name}<a href="{:U('Industry/Product/subject',array('category'=>$vo['c_name']))}">更多>></a></h5>
                                            </div>
                                            <volist name='vo.type' id='value'>
                                               <a href="{:U('Industry/Product/subject',array('category'=>$vo['c_name'],'type'=>$value['typename']))}"> <li>{$value.typename}</li></a>
                                            </volist>
                                        </ul>
                                    </volist>
                                    </div>
                                    <div class="table_right">
                                        <ul>
                                            <div class="right_title">
                                                <h5>猜你喜欢</h5>
                                            </div>
                                            <div class="right_pic">
                                                <volist name='likedata' id='vo'>
                                                <li>
                                                    <a href="{:U('Industry/Product/show',array('pid'=>$vo['id']))}"><img src=".{:thumb($vo['thumb'][0])}"/></a>
                                                    <a href="{:U('Industry/Product/show',array('pid'=>$vo['id']))}">{$vo.p_name|str_cut=###,7}</a>
                                                </li>
                                                </volist>
                                            </div>
                                            
                                        </ul>
                                    </div>
                                </div>
                            </dd>
                        </volist>
                    </dl>
                    <dl>
                        <dt><a href="{:U('Industry/Product/area')}" style="color:#900 ">地市馆</a></dt>
                        <volist name='addressdata' id="v">
                            <dd>
                            <volist name="v" id='vo'>
                            <if condition = '$i eq 1'>
                                <a href="{:U('Industry/Product/area',array('city'=>'4,'.$vo['id']))}">{$vo.name}</a>
                            <else />
                                 <a href="{:U('Industry/Product/area',array('city'=>'4,'.$vo['id']))}">|{$vo.name}</a>
                            </if>
                            </volist>
                             <div class="hidden_table">
                                    <div class="table_left">
                                    <volist name="v" id= "vo">
                                        <ul>
                                            <div class="table_title">
                                                <h5><span>|&nbsp;</span>{$vo.name}<a href="{:U('Industry/Product/area',array('city'=>'4,'.$vo['id']))}">更多>></a></h5>
                                            </div>
                                            <volist name="vo['city']" id='value'>
                                            <a href="{:U('Industry/Product/area',array('city'=>'4,'.$vo['id'].','.$value['id']))}"><li>{$value.name}</li></a>
                                            </volist>
                                        </ul>
                                    </volist>
                                    </div>
                                    <div class="table_right">
                                        <ul>
                                            <div class="right_title">
                                                <h5>猜你喜欢</h5>
                                            </div>
                                            <div class="right_pic">
                                                <volist name='likedata' id='vo'>
                                                <li>
                                                    <img src=".{:thumb($vo['thumb'][0])}"/>
                                                    <a href="">{$vo.p_name|str_cut=###,7}</a>
                                                </li>
                                                </volist>
                                            </div>
                                        </ul>
                                    </div>
                                </div>   
                            </dd>
                        </volist>
                         
                    </dl>
                    <dl>
                        <dt><a href="{:U('Industry/Product/travel')}" style="color:#900 ">旅游馆</a></dt>
                        <dd>
                            <a href="{:U('Industry/Product/lists',array('type'=>'佛教用品店'))}">佛教用品店</a>|<a href="{:U('Industry/Product/lists',array('type'=>'黄河风情街'))}">黄河风情街</a>
                            <div class="hidden_table">
                                    <div class="table_left">
                                    
                                        <ul>
                                            <div class="table_title">
                                                <h5><span>|&nbsp;</span>佛教用品店<a href="{:U('Industry/Product/lists',array('type'=>'佛教用品店'))}">更多>></a></h5>
                                            </div>
                                            
                                           
                                            
                                        </ul>
                                         <ul>
                                            <div class="table_title">
                                                <h5><span>|&nbsp;</span>黄河风情街<a href="{:U('Industry/Product/lists',array('type'=>'黄河风情街'))}">更多>></a></h5>
                                            </div>
                                            
                                           
                                            
                                        </ul>
                                    
                                    </div>
                                    <div class="table_right">
                                        <ul>
                                            <div class="right_title">
                                                <h5>猜你喜欢</h5>
                                            </div>
                                            <div class="right_pic">
                                                <volist name='likedata' id='vo'>
                                                <li>
                                                    <img src=".{:thumb($vo['thumb'][0])}"/>
                                                    <a href="">{$vo.p_name|str_cut=###,7}</a>
                                                </li>
                                                </volist>
                                                
                                            </div>
                                            
                                        </ul>
                                    </div>
                                </div>
                            <!-- <img src="{$config_siteurl}statics/ci/images/product-show/hidden.jpg" alt="隐藏内容" class="hidden" hidden /> -->
                        </dd>
                        <dd>
                            <a href="{:U('Industry/Product/lists',array('type'=>'晋商文化馆'))}">晋商文化馆</a>|<a href="{:U('Industry/Product/lists',array('type'=>'太行特产购'))}">太行特产购</a>
                            <!-- <img src="{$config_siteurl}statics/ci/images/product-show/hidden.jpg" alt="隐藏内容" class="hidden" hidden /> -->
                            <div class="hidden_table">
                                    <div class="table_left">
                                    
                                        <ul>
                                            <div class="table_title">
                                                <h5><span>|&nbsp;</span>晋商文化馆<a href="{:U('Industry/Product/lists',array('type'=>'晋商文化馆'))}">更多>></a></h5>
                                            </div>
                                           
                                        </ul>
                                        <ul>
                                            <div class="table_title">
                                                <h5><span>|&nbsp;</span>太行特产购<a href="{:U('Industry/Product/lists',array('type'=>'太行特产购'))}">更多>></a></h5>
                                            </div>
                                           
                                        </ul>
                                    
                                    </div>
                                    <div class="table_right">
                                        <ul>
                                            <div class="right_title">
                                                <h5>猜你喜欢</h5>
                                            </div>
                                            <div class="right_pic">
                                                <volist name='likedata' id='vo'>
                                                <li>
                                                    <img src=".{:thumb($vo['thumb'][0])}"/>
                                                    <a href="">{$vo.p_name|str_cut=###,7}</a>
                                                </li>
                                                </volist>
                                                
                                            </div>
                                            
                                        </ul>
                                    </div>
                                </div>
                        </dd>
                        <dd>
                            <a href="{:U('Industry/Product/lists',array('type'=>'寻根觅祖祠'))}">寻根觅祖祠</a>|<a href="{:U('Industry/Product/lists',array('type'=>'红色纪念品'))}">红色纪念品</a>

                            <div class="hidden_table">
                                    <div class="table_left">
                                    
                                        <ul>
                                            <div class="table_title">
                                                <h5><span>|&nbsp;</span>寻根觅祖祠<a href="{:U('Industry/Product/lists',array('type'=>'寻根觅祖祠'))}">更多>></a></h5>
                                            </div>
                                          
                                        </ul>
                                        
                                        <ul>
                                            <div class="table_title">
                                                <h5><span>|&nbsp;</span>红色纪念品<a href="{:U('Industry/Product/lists',array('type'=>'红色纪念品'))}">更多>></a></h5>
                                            </div>
                                          
                                        </ul>
                                    </div>
                                    <div class="table_right">
                                        <ul>
                                            <div class="right_title">
                                                <h5>猜你喜欢</h5>
                                            </div>
                                            <div class="right_pic">
                                                <volist name='likedata' id='vo'>
                                                <li>
                                                    <img src=".{:thumb($vo['thumb'][0])}"/>
                                                    <a href="">{$vo.p_name|str_cut=###,7}</a>
                                                </li>
                                                </volist>
                                                
                                            </div>
                                            
                                        </ul>
                                    </div>
                                </div>
                            <!-- <img src="{$config_siteurl}statics/ci/images/product-show/hidden.jpg" alt="隐藏内容" class="hidden" hidden /> -->
                        </dd>
                    </dl>
                    <!--<dl>
                        <dt>国际馆</dt>
                        <dd>
                            <a href="">毛里求斯馆</a>
                            <img src="{$config_siteurl}statics/ci/images/product-show/hidden.jpg" alt="隐藏内容" class="hidden" hidden />
                        </dd>
                    </dl>-->

                </div>
            </div>
            <div class="content">
                <div>
                    <form class="search" >
                        <input type="text" placeholder="输入你要搜索的关键字" name = 'keywords'/>
                        <a href="javascript:;">搜索</a>|
                        <a href="javascript:;">高级搜索</a>
                        <input type="submit" value="搜索" class="submit" />
                    </form>
                    <div class="banner">
                        <img src="{$config_siteurl}statics/ci/images/product-show/banner1.jpg" alt="金牡丹" />
                    </div>
                    <ul class="promid_cate_ul">
                        <li>
                        <a href="{:U('Industry/Product/week')}">
                            <h3>一周一品</h3>
                            <p>山西是中华民族和文化重要的发祥地之一<br/>其历史从旧石器时代发端</p>
                            </a>
                        </li>
                        <li>
                        <a href="{:U('Product/lists',array('type'=>'sx_make'))}">
                            <h3>山西质造</h3>
                            <p>山西是中华民族和文化重要的发祥地之一<br/>其历史从旧石器时代发端</p>
                            </a>
                        </li>
                        <li>
                        <a href="{:U('Product/lists',array('type'=>'special_market'))}">
                            <h3>特价超市</h3>
                            <p>山西是中华民族和文化重要的发祥地之一<br/>其历史从旧石器时代发端</p>
                            </a>
                        </li>
                        <li>
                        <a href="{:U('Industry/Product/union_active')}">
                            <h3>联盟活动</h3>
                            <p>山西是中华民族和文化重要的发祥地之一<br/>其历史从旧石器时代发端</p>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="left_bottom" style="float: left;width: 920px;margin-top: 14px;">
            	<ul class="left_bottom_ul promid_cate_ul" >
                        <li>
                        <a href="{:U('Industry/Product/subject')}">
                            <!--<img src="{$config_siteurl}statics/ci/images/zhutiguan.jpg" alt="">-->
                            <div class="hover">
                            </div>
                           	<p>主题馆</p>
                        </a>
                        
                        </li>
                        <li>
                        <a href="{:U('Industry/Product/area')}">
                            <!--<img src="{$config_siteurl}statics/ci/images/dishiguan.jpg" alt="">-->
                            <div class="hover">
                            </div>
                            <p>地市馆</p></a>
                        </li>
                        <li><a href="{:U('Industry/Product/travel')}">
                            <!--<img src="{$config_siteurl}statics/ci/images/lvyouguan.jpg" alt="">-->
                             <div class="hover">
                            </div>
                            <p>旅游馆</p></a>
                        </li>
                    </ul>
            </div>
            
         </div>    
            <div class="side-rights">
                <div>
                	<input type="button" name="" id="" value="" class="publish add_product"/>
                   <!-- <a href="javascript:;" class="publish add_product"><h5>产品发布</h5></a>-->
                    <dl>
                        <dt><span>关注排行</span></dt>
                        <volist name='follow' id='vo'>
                            <dd>
                                <a href="{:U('Industry/Product/show',array('pid'=>$vo['id']))}"><img src=".{:thumb($vo['thumb'][0],80,80)}" alt="" /></a>
                                <p>{$vo.p_name|str_cut=###,10} </p>
                                <p class="star"><span><img src="{$config_siteurl}statics/ci/images/product-show/star.png" alt="关注"></span>
                                <input type="hidden" name="pid" value="{$vo.id}"><i class="follow">关注</i></p>
                            </dd>
                        </volist>
                    </dl>
                </div>
            </div>
        

    </div>
    <div class="container culture" style="margin-top: 8px;height: 263px;">
	        <div class="title dishi"> 
	            <h3>地市馆</h3>
	            <ul class="ds_ul">

	                <!-- <li class="on">{$address[0].name}</li> -->
	                 
	                <volist name = 'address' id = "vo">
	                    <li <if condition='$i eq 1'>class='on'</if>>{$vo.name}
                            <input type="hidden" name="area" value="{$vo.parent_id},{$vo.id}">
                        </li>
	                </volist>

	            </ul>
                <a href="{:U('Industry/Product/area')}" class="gengduo dsgd">更多>></a>
	        </div>
            <volist name='t_data' id='vo'>

	        <div class="ds_show di_shi_guan <if condition='$i eq 1'>ds_show_one</if>">
                <div class="ds_map" style="width: 202px;height: 205px;position: relative;display: inline-block;float: left">
    	            <img src="{$config_siteurl}statics/ci/images/map/jincheng.jpg" alt="">
                    <img src="{$config_siteurl}statics/ci/images/map/suozhou.jpg" alt="">
                    <img src="{$config_siteurl}statics/ci/images/map/jinzhong.jpg" alt="">
                    <img src="{$config_siteurl}statics/ci/images/map/yuncheng.jpg" alt="">
                    <img src="{$config_siteurl}statics/ci/images/map/yangquan.jpg" alt="">
                    <img src="{$config_siteurl}statics/ci/images/map/lvliang.jpg" alt="">
                    <img src="{$config_siteurl}statics/ci/images/map/datong.jpg" alt="">
                    <img src="{$config_siteurl}statics/ci/images/map/changzhi.jpg" alt="">
                    <img src="{$config_siteurl}statics/ci/images/map/xizhou.jpg" alt="">
                    <img src="{$config_siteurl}statics/ci/images/map/linfen.jpg" alt="">
                    <img src="{$config_siteurl}statics/ci/images/map/taiyuan.jpg" alt="">
                </div>
	            <ul>
	                <volist name='vo[0]' id='value'>
	                <li>
	                    <a href="{:U('Industry/Product/show',array('pid'=>$value[id]))}">
	                        <img src=".{$value['thumb'][0]}" alt="">
	                        <h5>{$value.p_name|str_cut=###,10}</h5>
	                    </a>
	                    
	                </li>
	               </volist>
	
	            </ul>
	        </div>
            </volist> 
	        
    </div>
    <div class="culture container">
        <div class="title dishi">
           <h3>旅游馆</h3>
           <ul class="ly_ul">
            <volist name = 'type' id='vo'>
                <li <if condition='$i eq 1'>class='on'</if>>
                    {$vo}
                    <input type="hidden" name="type" value="{$vo}">
                </li>
            </volist>
        </ul> 
        <a href="{:U('Industry/Product/lists',array('type'=>'佛教用品店'))}" class="lygd gengduo">更多>></a>
        </div>
        <volist name = 'travelData' id='value'>
            <ul class="culture-list clearfix ly_tab">
                <volist name="value" id="vo">
                        <li>
                            <a href="{:U('Industry/Product/show',array('pid'=>$vo[id]))}"><img src=".{:thumb($vo['thumb'][0],207,169)}" style="width: 220px;height: 165px;"  alt=""></a>
                            <h5>{$vo.p_name|str_cut=###,10}</h5>
                        </li>
                </volist>    
            </ul>
        </volist> 
    </div>
    <!--<div class="maoli container culture">
        <div class="title dishi"> 
            <h3>国际馆</h3>
            <ul>
                <li>毛里求斯馆</li>
            </ul>
        </div>
        <div><img src="{$config_siteurl}statics/ci/images/product-show/shop20.jpg" alt="毛里求斯馆"></div>
    </div>-->

</block>
