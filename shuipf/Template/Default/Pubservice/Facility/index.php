<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<!--<meta name="viewport" content="width=device-width, initial-scale=1">-->
		<meta name= "viewport" content= "width=device-width" initial-scale="1" minimum-scale="1" maximum-scale="1">
		<!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
		<title>公共文化设施</title>
		<template file="Pubservice/Common/_cssjs"/>
		<!--分类选择插件-->
		<link rel="stylesheet" href="{$config_siteurl}statics/cu/css/pub-volunteer.css" />
		<script type="text/javascript" src="{$config_siteurl}statics/cu/js/category_select.js"></script>
		<!--百度地图JS API-->
		<script type="text/javascript" src="http://api.map.baidu.com/api?v=2.0&ak=YUYIzLKGEcKdyyat23Aw4H9LByDx4voy"></script>
		<script type="text/javascript" src="http://api.map.baidu.com/library/CityList/1.2/src/CityList_min.js"></script>
		<script type="text/javascript" src="http://api.map.baidu.com/library/SearchInfoWindow/1.5/src/SearchInfoWindow_min.js"></script>
	</head>
	<body>
		<div class="wrap">
			<template file="Pubservice/Common/_head"/>
			<div class="stepBar">
				<div class="ggwh_Content">
					 <div id="nav" style="height:45px !important;">
                <div class="container">
                    <ul>
                        <li>
                            <a href="{$config_siteurl}" class="home_src">首页</a>
                        </li>
                        <li>
                            <span>></span>
                        </li>
                        <li>
                            <a href="">公共文化设施</a>
                        </li>
                    </ul>
                    <form action="" method="get" target="_blank">
								<input type="hidden" name="m" value="search"/>
								<input type="hidden" name="g" value="Pubservice"/>
								<input type="hidden" name="a" value="index"/>
                        <div class="searbox">
                            <input type="text" placeholder="输入您要搜索的关键词" value=""  name="kw"/>
                            <input type="submit" id="button" value="" class="ggwh_SearchBtn" style="border: none;float:right;width:40px;right:0px !important"><i style="color:#962626" class="fa fa-search"></i>
                        </div>

                    </form>
                </div>
            
			</div>
<!--			<div class="text-center" style="padding: 20px 0px;">-->
<!--				<img src="{$config_siteurl}statics/cu/images/img/whssBanner.jpg" />-->
<!--			</div>	-->
			<a name= "index" id="index" href="#index"></a>
			<div class="ggwh_Content" style="margin-top: 25px;">
				<div class="sx">
					<div class="pull-left ggwh_SelectName" >市级：</div>
					<div class="a-box">
						<a href="{:U('Pubservice/Facility/index')}" class="<?php if(empty($_GET['city']) ||$_GET['city'] =='全省'){echo 'on';}?>">全部</a>
						<volist name="cateinfo['city']" id="ci">
							<if condition="$ci['name'] neq '省属'">
								<!-- <a rel="{$ci.name}" class="sx_child" href="javascript:;" name="city">{$ci.name}市</a> -->
								<a href="{:U('Pubservice/Facility/index',['city'=>$ci['name']])}" class="sx_child <?php if($ci['name'] == $_GET['city']){echo "on";}?>"  href="javascript:;" name="city">{$ci.name}市</a>
							</if>
						</volist>
					</div>					
				</div>
				<!-- <div class="sx">
					<div class="pull-left ggwh_SelectName" >县级：</div>
					<div class="a-box">
						<a  href="{:U('Pubservice/Facility/index',array('city'=>$_GET['city']))}" class="on">全部</a>
						<volist name="cateinfo['county']" id="co"><a rel="{$co.name}" class="sx_child" href="javascript:;" name="county">{$co.name}</a></volist>			</div>
				</div> -->
				<div class="sx">
					<div class="pull-left ggwh_SelectName" >馆站：</div>
					<div class="a-box">
						<a  href="{:U('Pubservice/Facility/index',['city'=>$_GET['city']])}" class="<?php if(empty($_GET['type'])){echo 'on';}?>">全部</a>
						<volist name="cateinfo['type']" id="ty">
							<a href="{:U('Pubservice/Facility/index',['city'=>$_GET['city'],'type'=>$ty])}" class="sx_child <?php if($ty == $_GET['type']){echo "on";}?>" href="javascript:;" name="type">{$ty}</a>
						</volist>
						<!--<a  href="{:U('Pubservice/Facility/index',array('city'=>$_GET['city'],'country'=>$_GET['country'],'type'=>'文化站'))}" name="type"
						
						<if condition="$_GET['type'] eq '文化站' ">class="on"</if>>文化站</a>-->
					</div>
				</div>
			</div>
				<div class="toggle-list-map">
				<ul id="tab-nav">
					<li><a href="#t_1" style="margin-right:20px;font-size:16px;"><i style="color:#962626;" class="fa fa-list"></i>列表</a></li>
					<li><a href="#t_2" style="margin-right:20px;font-size:16px;"><i style="color:#962626" class="fa fa-map"></i>地图</a></li>
				</ul>
				</div>
				<div class="clearfix"></div>
				<hr />
				<div id="tab-content">
					<div class="baiduMaps" id="t_2">
						<div class="text-center" id="baiduMap">
							<!--<img src="{$config_siteurl}statics/cu/images/img/whssMap.jpg" />-->						
						</div>
						<div class="tips" <empty name="data">hidden</empty>>
							<volist name="data" id="vo">
							<div class="detail" <neq name="key" value='0'>hidden</neq>>
								<h5>{$vo.name}</h5>
								<p>{$vo.abstract}</p>
							</div>
							</volist>
							<div class="list swiper-container">
								<div class="swiper-wrapper">
								<ul class="swiper-slide" style="height: auto">
									<volist name="data" id="vo">
									<li data-listid="{$i}">
										<h5><a href="{:U('Pubservice/Facility/show',array('id'=>$vo['id'],'tablename'=>$vo['tablename']))}">{$vo.name}</a></h5>
										<p><span>地址：</span>{$vo.addr}</p>
									</li>
									</volist>
								</ul>
								</div>
								<div class="swiper-scrollbar"></div>
							</div>
							
						</div>
					</div>
					<div class="dataList"  id="t_1">
							<div class="list swiper-container">
								<div class="swiper-wrapper">
								<ul class="swiper-slide" style="height: auto">
									<volist name="data" id="vo">
									<li class="col-md-3" data-listid="{$i}"style="float:left;width:30%;border-radius:2px;padding:10px;box-shadow: 1px 1px 5px 1px rgba(0, 0, 0, 0.3);margin-left:2%;margin-top:15px;">
										<h5 style="text-align:center"><a href="{:U('Pubservice/Facility/show',array('id'=>$vo['id'],'tablename'=>$vo['tablename']))}">{$vo.name}</a></h5>
										<p style="text-align:center;height:40px;"><span>地址：</span>{$vo.addr}</p>
										<h5 style="color:#93262B;margin-left:90%;"><a href="{:U('Pubservice/Facility/show',array('id'=>$vo['id'],'tablename'=>$vo['tablename']))}" style="color:#93262B;">详情</a></h5>
									</li>
									</volist>
								</ul>
								</div>
								<div class="swiper-scrollbar"></div>
							</div>
					</div>
				</div>
			</div>
			<hr />

			<div class="gg_culture_active">
				<div class="gg_culture_act_box">
					<div class="culture_act_title">
						<div class="title_name">
							<p class="title_en">Base Services</p>
							<p><a href="###" style="color:#93262a;">基本服务项目公示</a></p>
							<div class="gg_xhx"></div>
						</div>
						<div class="culture_title_right">
							<!--<a class="sls" onClick="exchange(this)" data-type="speak">演讲</a><span class="gg_xx">/</span>
							<a class="sls" onClick="exchange(this)" data-type="lecture">讲座</a><span class="gg_xx">/</span>
							<a class="sls" onClick="exchange(this)" data-type="show">展览</a>-->
						</div>
					</div>

			<div class="ggwh_Content" style="margin-top: 25px;">

				<div class="whhdCategory2">
					<div class="pull-left ggwh_SelectName">排序：</div>
					<ul class="pull-left ggwh_SelectUl">
						<li class="choose">
							<a href="#"><span>全部</span></a>
						</li>
						<li>
							<a href="#"><span>好评</span><span class="icon-arrow-down"></span></a>
						</li>
						<li>
							<a href="#"><span>发布时间</span><span class="icon-arrow-down"></span></a>
						</li>
						<li>
							<a href="#"><span>参与方式</span></a>
						</li>
					</ul>
					<div class="clearfix"></div>
				</div>
				<div class="abc">
				<!-- 文化志愿者协会 -->
					<div class="row ggwh_Xmgs_List dis_one" style="margin-top: 30px;width:1190px;">
						<volist name="pageinfo['data']" id="vo">
							<div class="col-md-3 col-xs-6" style="height:366px;">
								<div class="ggwh_Xmgs_ListItem" style="height:350px;">
									<img src="{$vo.cover}" />
									<h4>{$vo.project_title}</h4>
									<p>开馆时间：{$vo.business_hours}</p>
									<p class="indent"></p>
									<p>闭关时间：{$vo.closing_hours}</p>
									<a class="check" href="{:U('Pubservice/Baseservices/show',array('id'=>$vo['id']))}" style="float:right;color:#93262a;">查看详情 >></a>
								</div>

							</div>
						</volist>
					</div>
				</div>
				<div class="ggwh_page">{$pageinfo.page}</div>
			</div>



				</div>
			</div>
			<template file="Pubservice/Common/_foot"/>
			<template file="Pubservice/Common/checklogin"/>
		</div>
		<script>
			// var mySwiper = new Swiper('.swiper-container',{
			// 		scrollbar: '.swiper-scrollbar',
			// 		direction: 'vertical'
			// 	});

			var swiper = new Swiper('.swiper-container', {
			    scrollbar: '.swiper-scrollbar',
			    direction: 'vertical',
			    slidesPerView: 'auto',
			    mousewheelControl: true,
			    freeMode: true
			});
			 
		</script>
	</body>
<script type="text/javascript">
	// $('.sx').sx({
	// 	nuv:".zj",//筛选结果
	// 	zi:"sx_child",//所有筛选范围内的子类
	// 	qingchu:'.qcqb',//清除全部
	// 	over:'on'//选中状态样式名称
	// });
	$(function() {
		//百度地图
		var map = new BMap.Map("baiduMap"); // 创建Map实例
		//根据IP 显示当前城市
		function displayLocalCity(result){
			map.setCenter('<?= (empty($_GET['city']) || $_GET['city'] == '全省')?"太原":$_GET['city'];?>');
			map.centerAndZoom('<?= (empty($_GET['city']) || $_GET['city'] == '全省')?"太原":$_GET['city'];?>', 12);
		}
		var myCity = new BMap.LocalCity();
		myCity.get(displayLocalCity);
		//设置地图中心和地图级别(初始化的尺寸)

		//设置地图属性
		//map.enableScrollWheelZoom(true);     //开启鼠标滚轮
        var top_right_navigation = new BMap.NavigationControl({anchor: BMAP_ANCHOR_TOP_RIGHT});  //右上角，添加默认缩放平移控件
        map.addControl(top_right_navigation);
		//获取后台地址数据
		var point_data = <?=JSON_encode($data)?>;
		if(point_data != null){
		//将所有坐标显示在地图上
		for(var i = 0;i<point_data.length;i++){
			//设置特定点位置(文化设施)
			var point = new BMap.Point(point_data[i]['point_lng'],point_data[i]['point_lat']);
			//创建地图上一个图像标注。
			var marker = new BMap.Marker(point);
			var markerContent = "<h4 style='margin:0 0 5px 0;padding:0.2em 0'>" + point_data[i]['name'] + "</h4>";
			markerContent += "<p style='margin:0;line-height:1.5;font-size:13px;text-indent:2em'>" + point_data[i]['abstract'] + "</p>";
			// 设置标注的title
            marker.setTitle(point_data[i]['name']);
            // 设置标注的点击事件
            addInfo(markerContent, marker);
			// 将标注添加到地图中
			map.addOverlay(marker);
		}
		}
		$(".list li").find("h5").on("click",function(){
			var index = $(this).parents("li").index();
			$(this).parents("li").addClass("active").siblings("li").removeClass("active");
			$(".detail").eq(index).show().siblings(".detail").hide();
		})

	});
	// 标注添加点击动作
    function addInfo(txt,marker){
        var infoWindow = new BMap.InfoWindow(txt);
        marker.addEventListener("click", function() {
            this.openInfoWindow(infoWindow);
        });
    }
	//标注点击事件
	function attribute(e){
		console.log(e);
	}

	function checkname(){
		alert('后台登录者不能预约需要重新前台注册');
	}

</script>
</html>