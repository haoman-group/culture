<script type="text/javascript" src="{$config_siteurl}statics/cu/layer/layer.js"></script>
<script>
    $(function(){
        $(".menuadiv a").hover(
            function(){
            $(".yunindexbanbox img").eq($(".menuadiv a").index(this)).show().siblings().hide();
            $(this).siblings().removeClass('on');
        },function(){
            $(this).addClass('on');
        })
    })
    function citylist(){
        layer.open({
        title:'请选择地区',
        shadeClose:true,
        area: ['810px', '520px'],
        type: 2, 
        content: "/Pubservice/Index/zonecloud"
        });
    }
</script>
<header class="header">
	<template file="Pubservice/Common/_top"/>
	<div class="ggwh_Header">
		<div class="ggwh_Logo">
<!--			<a href="/Pubservice"><img src="{$config_siteurl}statics/cu/images/icon/pubsLogo.png" /></a>-->
			<a href="/Pubservice"><img src="{$config_siteurl}statics//cu/images/icon/logo.png"  /></a>
			<!-- <a href="/Pubservice"><strong>文化公共服务</strong></a> -->
		</div>
		<div class="nav">
			<ul>
				<li <if condition="CONTROLLER_NAME eq 'Active'">class="active"</if>>
					<a href="{:U('Pubservice/Active/index')}" id="catid_10">公共文化活动</a>						
					<!-- <p style="width: 75px" class="smallFont">Cultural Activity</p> -->
				</li>
				<li <if condition="CONTROLLER_NAME eq 'Facility'">class="active"</if>>						
					<a href="{:U('Pubservice/Facility/index',array('city'=>$cityname,'type'=>'图书馆'))}" id="catid_14">公共文化设施</a>
					<!-- <p style="width: 80px" class="smallFont">Cultural Facilities</p> -->
				</li>
				<li <if condition="CONTROLLER_NAME eq 'Resources'">class="active"</if>>					
					<a href="{:U('Pubservice/Resources/index')}" id="catid_192">数字文化资源</a>
					<!-- <p style="width: 130px" class="smallFont">Cultural Resources Pavilion</p> -->
				</li>
				<!--<li <if condition="CONTROLLER_NAME eq 'Landmark'">class="active"</if>>					-->
					<!--<a href="{:U('Pubservice/Landmark/index')}" id="catid_105">文化地标</a>-->
					<!-- <p style="width:88px" class="smallFont">Cultural Landmark</p> -->
				<!--</li>-->
				<li <if condition="CONTROLLER_NAME eq 'Volunteer'">class="active"</if>>					
					<a href="{:U('Pubservice/Volunteer/index')}" id="catid_101">文化志愿服务</a>						
					<!-- <p style="width:90px" class="smallFont">Cultural volunteers</p> -->
				</li>
				<!--<li class="last-item <if condition='CONTROLLER_NAME eq Baseservices'>active</if>">						-->
					<!--<a href="{:U('Pubservice/Baseservices/index')}" id="catid_67">基本服务项目公示</a>						-->
					<!-- <p style="width:80px" class="smallFont">Basic public services</p> -->
				<!--</li>-->
				<li class="last-item <if condition='CONTROLLER_NAME eq Baseservices'>active</if>">						
					<a href="{:U('Industry/Index/index')}" id="catid_67">文化产业服务</a>						
					 <!--<p style="width:80px" class="smallFont">Basic public services</p> -->
				</li>
			</ul>
			<div class="cls"></div>
		</div>
	</div>
</header>