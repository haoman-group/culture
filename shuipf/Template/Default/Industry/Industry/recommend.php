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
                <li><a href="{:U('Industry/Index/index')}" class="home_src" style="color:#900;">首页</a></li>
                <li><span>></span></li>
                <li><a href="{:U('Industry/index')}">产业项目</a></li>
                <li><span>></span></li>
                <li><a href="#" style="color: #900;">重点项目推荐</a></li>
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
        
            <div class="container clearfix">
                
                <div class="list-content" style="padding-bottom: 20px;" >
<!--                    获取数据-->
                   
                    <foreach name="resdata" item="vo">
                        <div class="in-list" style="margin-top: 20px;">

                            <div class="timg">

                                <a href="{:U('Industry/Industry/detail',array('id'=>$vo['id']))}"><img class="img1" src=".{:thumb($vo['pthumb'],270,204)}" alt="" style="width:270px;height: 204px; "></a>

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
        barimg('myChart');
        bieimg('bie');
        huanimg('huan_q');
        pie_jimg('pie_j');
    </script>
    <!--  -->
</block>
