<extend name="./shuipf/Template/Default/Industry/common/_layout.php"/>
<block name="after_styles">
    <link rel="stylesheet" href="{$config_siteurl}statics/ci/css/finance.css">
    <link rel="stylesheet" href="{$config_siteurl}statics/ci/css/product_area.css">
    <style>
       /*#content .container .area-map .right .areanames{display: none}*/
       #content .container .area-map .right .areanames:first-child{display: block;}
    </style>
     <style>
        .brandattr{border: none;border-top: 1px solid #4480df;}
        .brandattr .brandl{margin-bottom: 0;}
        /*.brandattr .brandl .bluea{margin: 0 40px 0 0;}*/
        .brandattr .brandl dt{line-height: 35px;}
        .brandattr .brandl dd{margin-left: 0px;line-height: 30px}
        .brandattr .brandl dd a{font-size: 14px;color: #14191e;}
        .analysis{border: none;}
        .analysis .anaul .anaimg{width: 269px;height: 246px;box-sizing: border-box;}
        .anaimg h5{font-size: 14px;color: #242424;font-weight: normal;text-align: center;line-height: 30px;margin-top: 18px;}
        .analysis .anaul li{margin: 10px 9px;}
        .analysis .anaul p{font-size: 14px;color: #242424;text-align: left;line-height: 24px;margin: 5px 0 15px;width: 269px;padding: 0 5px;box-sizing: border-box;}
        .page{padding: 50px;text-align: center;}
        .page li{display: inline-block;font-size: 12px;color: #333;margin: 0 4px;}
        .page li a{display: block;font-size: 12px;color: #333;padding: 8px 10px;border: 1px solid #ccc;}
        .page li.on a{background: #3398db;color: #fff;}
        hr{margin-bottom: 15px;}
        #allmap{width:650px;height:405px;border: 1px solid #4E87E1;display: inline-block;}
        /*#allmap .anchorBL img{display: none}*/
        #allmap .anchorBL{display: none}
        #allmap .anchorTR{display: none}



    </style>
</block>
<block name="after_scripts">
    <script type='text/javascript'>
        // $(".test a").click(function(event) {
        //     $(this).addClass('bluea').siblings('a').removeClass('bluea')
        //     var i = $(this).index();
        //     $('.areanames').eq(i).css({display:'block'}).siblings('.areanames').css({
        //        display:'none'
        //     });
        // });
        
    
    </script>

    <script type="text/javascript" src="http://api.map.baidu.com/api?v=2.0&ak=ApgGlsDjVKCX7aVVeLzCEG78zS7kGCmc"></script>
    <script type="text/javascript">
    var minZ = 10;
    var maxZ = 16;
    var cp = 13;


    // 百度地图API功能
    // alert(minZ)
    var map = new BMap.Map("allmap",{minZoom:minZ,maxZoom:maxZ,enableMapClick:false});    // 创建Map实例
    // var tpye_id = 11;
    // var lng = '{$lng}';
    // var lat = '{$lat}';
    // map.centerAndZoom(new BMap.Point(lng, lat), cp);  // 初始化地图,设置中心点坐标和地图级别
    map.addControl(new BMap.MapTypeControl());   //添加地图类型控件
    // map.setCurrentCity("天津");          // 设置地图显示的城市 此项是必须设置的
    var city = "{$citydata['name']}{$region['name']}";
    // var cp = 12;
    map.centerAndZoom(city,cp);
    map.enableScrollWheelZoom(true); 
    // var cp = 13
    $('.area_scroll_add').click(function(event) {
        /* Act on the event */
        (cp<maxZ)?(cp++) : (cp=maxZ);
        // alert(cp)
        map.centerAndZoom(city,cp);
    
    });
    $('.area_scroll_del').click(function(event) {
        /* Act on the event */
        (cp>minZ)?(cp--):(cp=minZ);
        map.centerAndZoom(city,cp);
                
    });
        //拖动事件
    $(document).ready(function(){
        $(".area_scroll_btn").mousedown(function(e)//e鼠标事件
    {
    

    var btn_offset = $(this).offset();//DIV在页面的位置
    var scroll_offset = $(this).parent('.area_scroll').offset();
    var initX = btn_offset.top - scroll_offset.top;//获得DIV初始高度
    // alert(initX)
    // var y = e.pageY - offset.top;//获得鼠标指针离DIV元素上边界的距离
    var y = e.pageY;
    $(document).bind("mousemove",function(ev)//绑定鼠标的移动事件，因为光标在DIV元素外面也要有效果，所以要用doucment的事件，而不用DIV元素的事件
    {
    $(".area_scroll_btn").stop();//加上这个之后

    // var _x = ev.pageX - x;//获得X轴方向移动的值
    // var _y = offset.top-ev.pageY;//获得Y轴方向移动的值
    var _y = ev.pageY - y;
    l = initX+_y;
    if(l<5){
        l=5
    }
    if(l>310){
        l=310
    }
    cp = Math.round(maxZ-((maxZ-minZ)/305)*(l-5));

    $(".area_scroll_btn").animate({top:l+"px"},10);
    });

    });

    $(document).mouseup(function()
    {
    $(".area_scroll_btn").css("cursor","default");
    $(this).unbind("mousemove");
    map.centerAndZoom(city,cp);
    })
    }) 

    
    // map.enableScrollWheelZoom(true);     //开启鼠标滚轮缩放
</script>
</block>
<block name="content">
    
   <div id="nav">
        <div class="container">
            <ul>
                <li>
                    <a href="{$config_siteurl}" class="home_src" style="color:#900;">首页</a>
                </li>
                <li><span>&gt;</span></li>
                <li>
                    <a href="{:U('Industry/Product/index')}">产品展示</a>
                </li>
                <li><span>&gt;</span></li>
                <li>
                    <a href="{:U('Industry/Product/area')}">地市馆</a>
                </li>
                <if condition = "$region eq null"> 
                    <li><span>&gt;</span></li>
                    <li>
                        <a href="javascript:;" class="href_tail" style="color:#900;">{$citydata.name}</a>
                    </li>
                <else />
                    <li><span>&gt;</span></li>
                    <li>
                        <a href="{:U('Industry/Product/area',array('city'=>$vo['area_id']))}" >{$citydata.name}</a>
                    </li>
                    <li><span>&gt;</span></li>
                    <li>
                        <a href="javascript:;" class="href_tail">{$region.name}</a>
                    </li>
                </if>
            </ul>
            <form action="">
                <input type="text" placeholder="输入你要搜索的关键字" />
                <input type="submit" value="搜索" />
            </form>
        </div>
    </div>
    
    <div id="content">
        <div class="container clearfix">
            <div class="brandattr">
                <dl class="brandl">
                    
                    <dd class="test">
                         <foreach name= 'address' item='vo'>
                             <if condition = "$vo['name'] eq $citydata['name']">
                                 <a href="{:U('Industry/Product/area',array('city'=>$vo['area_id']))}" class="bluea">{$vo.name}</a>
                             <else />
                                <a href="{:U('Industry/Product/area',array('city'=>$vo['area_id']))}">{$vo.name}</a>
                             </if>
                        </foreach>
                    
                       
                    </dd>
                </dl>            
            </div>
           
            <div class="area-map clearfix" style="margin: 0;">
                <!--<div class="map left">
                    
                    <div id="allmap"></div>


                    <div class="area_right">
                        <div class="area_scroll">
                            <div class="area_scroll_btn"></div>
                        </div>

                        <div class="area_scroll_del"></div>
                        <div class="area_scroll_add"></div>
                    </div>

                </div>-->
                <div class="desc right" style="width: 1200px;">
                    <foreach name="address" item="vo">
                    <if condition="$vo['name'] eq $citydata['name']">
                        <div class="areanames clearfix" style="display: block">
                        <foreach name='vo["city"]' item='value'>
                            
                            <a href="{:U('Industry/Product/area',array('city'=>$value['area_id']))}">{$value.name}</a>
                        </foreach>
                        </div>
                    <else />
                        <div class="areanames clearfix" style="display: none">
                        <foreach name='vo["city"]' item='value'>
                            
                            <a href="{:U('Industry/Product/area',array('city'=>$value['area_id']))}" >{$value.name}</a>
                        </foreach>
                        </div>
                    </if>
                        
                    </foreach>
                       <!--  <a href="{:U('Industry/Product/area',array('city'=>'杏花岭区'))}">杏花岭区</a>
                        <a href="{:U('Industry/Product/area',array('city'=>'万柏林区'))}">万柏林区</a>
                        <a href="{:U('Industry/Product/area',array('city'=>'迎泽区'))}">迎泽区</a>
                        <a href="{:U('Industry/Product/area',array('city'=>'尖草坪区'))}">尖草坪区</a>
                        <a href="{:U('Industry/Product/area',array('city'=>'晋源区'))}">晋源区</a>
                        <a href="{:U('Industry/Product/area',array('city'=>'清徐县'))}">清徐县</a>
                        <a href="{:U('Industry/Product/area',array('city'=>'娄烦县'))}">娄烦县</a>
                        <a href="{:U('Industry/Product/area',array('city'=>'古交市'))}">古交市</a>
                        <a href="{:U('Industry/Product/area',array('city'=>'阳曲县'))}">阳曲县</a> -->
                    
                </div>
            </div>
            <div class="prodlistbox">
                <h6><strong style="font-weight: 400;"><if condition = "$region eq null">{$citydata.name}<else />{$region.name}</if></strong></h6>
                <ul class="ulcell">
                	<foreach name="data" item = "vo">
                		<li>
	                        <div class="anaimg">
	                            <a href="{:U('Industry/Product/show',array('pid'=>$vo['id']))}">
	                                <img src=".{$vo[thumb][0]}">
	                            </a>
	                            <h5><a href="">{$vo.p_name|str_cut=###,10}</a></h5>
	                        </div>
	                        <!-- <p>{$vo.p_describe|str_cut=###,20}</p> -->
	                    </li>
                	</foreach>
                    
                    
                </ul>
                
                <div class="pagebox">
                    {$page}
                </div>
            </div>
        </div>
    </div>

</block>