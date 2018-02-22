<extend name="shuipf/Template/Default/Industry/common/_layout.php" />
<block name="after_styles">
    <link rel="stylesheet" href="{$config_siteurl}statics/ci/css/recommend.css">
    <link rel="stylesheet" href="{$config_siteurl}statics/ci/css/page_common.css" />
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
                <li><a href="{:U('Industry/Index/index')}" class="home_src" style="color:#900">首页</a></li>
                <li><span>></span></li>
                <li><a href="{:U('Industry/index')}">产业项目</a></li>
                <li><span>></span></li>
                <li><a href="#" style="color: #900;">项目展示</a></li>
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

<!--        kaishi-->
        <div class="search-term" >

            <a href=""><div class="search-way">高级检索</div></a>
            <!-- <a href=""><div class="search-way1">模糊检索</div></a> -->
        </div>
            <div class="container clearfix">
                <div class="brandattr"  >
                    <dl class="brandl">
                        <dt>区&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;域：</dt>
                        <?php

                        $obj = D("Content/IndustryIssue");
                        $data =$obj->where(array('status'=>1))->select();
                        $method = I('method');
                        $cate =I('cate');

                        ?>
                        <dd class="ddd">

                            <a href="javascript:;" <empty name="area">class="bluea"</empty>  onclick="filter('area','不限',0)">不限</a>
                            <volist name='region' id='vo'>
                                <a href="javascript:;" <eq name="area" value="$vo">class="bluea"</eq> onclick="filter('area','{$vo}',{$i})">{$vo}</a>
                            </volist>
                           
                        </dd>



                    </dl>
                    <dl class="brandl">
                        <dt>项目类别：</dt>
                        <dd>
                            <a href="javascript:;" <empty name="type">class="bluea"</empty> style=""    onclick="filter('type','不限',0)">不限</a>
                            <volist name='category' id='vo'>
                                 <a href="javascript:;" <eq name="type" value="$vo">class="bluea"</eq>  style="margin-left: 10px"   onclick="filter('type','{$vo}',{$i})">{$vo}</a>
                            </volist>
                        </dd>  
                        
                    </dl>
                    <dl class="brandl">
                        <dt>投资规模：</dt>
                        <dd>
                            <a href="javascript:;" <empty name="scale">class="bluea"</empty>  onclick="filter('scale','不限',0)">不限</a>
                            <a href="javascript:;" <eq name="scale" value="100万以下">class="bluea"</eq>  onclick="filter('scale','100万以下',1)">100万以下</a>
                            <a href="javascript:;" <eq name="scale" value="100-1000万">class="bluea"</eq> onclick="filter('scale','100-1000万',2)">100-1000万</a>
                            <a href="javascript:;" <eq name="scale" value="1000-5000万">class="bluea"</eq> onclick="filter('scale','1000-5000万',3)">1000-5000万</a>
                            <a href="javascript:;" <eq name="scale" value="1亿-10亿">class="bluea"</eq> onclick="filter('scale','1亿-10亿',4)">1亿-10亿</a>
                            <a href="javascript:;" <eq name="scale" value="10亿以上">class="bluea"</eq> onclick="filter('scale','10亿以上',5)">10亿以上</a>


                        </dd>
                    </dl>
                    <dl class="brandl">
                        <dt>项目阶段：</dt>
                        <dd>

                            <a href="javascript:;" <empty name="stage">class="bluea"</empty>  onclick="filter('stage','不限',0)">不限</a>
                            <volist name='stagedata' id='vo'>
                                <a href="javascript:;" <eq name="stage" value="$vo">class="bluea"</eq> onclick="filter('stage','{$vo}',{$i})">{$vo}</a>
                            </volist>
                            
                            <!-- <a href="javascript:;" <eq name="stage" value="建设实施">class="bluea"</eq> onclick="filter('stage','建设实施',2)">建设实施</a>
                            <a href="javascript:;" <eq name="stage" value="竣工达产">class="bluea"</eq> onclick="filter('stage','竣工达产',3)">竣工达产</a>
                            <a href="javascript:;" <eq name="stage" value="项目续建">class="bluea"</eq> onclick="filter('stage','项目续建',4)">项目续建</a> -->
                        </dd>
                    </dl>
                </div>
                <form method="post">
                    <input type="hidden" name="area" id="area" value="<if condition='$area'>{$area}<else />不限</if>" />
                    <input type="hidden" name="type" id="type" value="<if condition='$type'>{$type}<else />不限</if>" />
                    <input type="hidden" name="scale" id="scale" value="<if condition='$scale'>{$scale}<else />不限</if>" />
                    <input type="hidden" name="stage" id="stage" value="<if condition='$stage'>{$stage}<else />不限</if>" />
                    <input type="hidden" name="stage_id" value="<if condition='$stage_id'>{$stage_id}<else />0</if>">
                    <input type="hidden" name="scale_id" value="<if condition='$scale_id'>{$scale_id}<else />0</if>">
                    <input type="hidden" name="type_id" value="<if condition='$type_id'>{$type_id}<else />0</if>">
                    <input type="hidden" name="area_id" value="<if condition='$area_id'>{$area_id}<else />0</if>">
                </form>

                <div class="list-content" style="padding-bottom: 20px;" >
<!--                    获取数据-->
                    <if condition='$select eq 1'>
                    <ul class="recommend_tj">
                        <li class="recommend_li">
                          <h3>项目类别</h3>
                          <p>占比分析</p>
                          <div id="myChart" style="width: 270px;height:310px;position:absolute; top:70px;left: 10;"></div>    
                        </li>
                        <li class="recommend_li">
                            <h3>项目阶段</h3>
                            <p>占比分析</p>
                            <div id="bie" style="width: 280px;height: 320px"></div>
                        </li>
                        <li class="recommend_li">
                            <h3>投资规模</h3>
                            <p>占比分析</p>   
                            <div id="pie_j" style="width: 280px;height: 305px;position:absolute; top:50px;left: 10;"></div> 
                        </li>
                        <li class="recommend_li">
                            <h3>区&nbsp;&nbsp;&nbsp;&nbsp;域</h3>
                            <p>占比分析</p> 
                            <div id="huan_q" style="width: 280px;height: 320px"></div>   
                        </li>
                    </ul>
                    </if>
                    <foreach name="resdata" item="vo">
                        <div class="in-list" style="margin-top: 20px;">

                            <div class="timg">

                                <a href="{:U('Industry/Industry/detail',array('id'=>$vo['id']))}"><img class="img1" src="{:thumb($vo['pthumb'],270,204)}" alt="" style="width:270px;height: 204px; "></a>

                            </div>
                            <div class="tcontent" style="margin: 15px 16px;">
                                <a href="{:U('Industry/Industry/detail',array('id'=>$vo['id']))}">项目名称：{$vo.pname|str_cut=###,10}</a></span><br>


                                <p style="font-size: 13px;margin-left: 0px;color: #c2c2c2;padding-top: 5px;">行业：{$vo.categoryname|str_cut=###,8}&nbsp;地区：{$vo.region}</p>


                                <p style="font-size: 13px;color: #c2c2c2;padding-top: 5px;">投资总额：{$vo.plimit}万</a></p>
                            </div>
                        </div>

                    </foreach>





                </div>
<!--        jieshu-->
    </div>
        <div class="pagebox">
            {$page}
        </div>
</block>


<block name="after_scripts">
    <script>
        function filter(type,msg,num){
              
                $('input[name='+type+']').val(msg);
                
                
                $('input[name='+ type+'_id]').val(num);

                var area = $('input[name=area]').val();
                var type= $('input[name=type]').val();
                var scale = $('input[name=scale]').val();
                var stage = $('input[name=stage]').val();
                var data = $('form').serialize();

                //拼网址
                var url = "{:U('Industry/Industry/recommend')}&area="+area+"&type="+type+"&scale="+scale+"&stage="+stage;
                // alert(url);
                // $.post('{:U("Content/Industry/recommend")}', data, function(data) {
                //     /*optional stuff to do after success */
                    
                // },'json');
                // alert(url);
                window.location.href = url;
               
            }
        // $(function(){
        //     $
        // })
    </script>
    <script type="text/javascript" >
    function text(){
        var value = document.getElementById("b").value;
        window.location.href='{:U("Content/Search/index")}&key='+value;
    }
    </script>
    <script src="{$Config_siteurl}statics/ci/js/echarts.js"></script>
    <script src="{$Config_siteurl}statics/ci/js/recommend.js"></script>
    <script>
        var biedata = {$biedata};
        var count = {$count};
        var bardata = {$bardata};
        var quyudata = {$quyudata};
        var gmdata = {$gmdata};
        barimg('myChart',bardata,count);
        bieimg('bie',biedata);
        huanimg('huan_q',quyudata);
        pie_jimg('pie_j',gmdata);
    </script>
    <!--  -->
</block>
