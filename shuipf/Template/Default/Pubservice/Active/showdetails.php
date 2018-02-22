<html>
<head>
    <meta charset="UTF-8">
    <title>文化活动</title>
    <template file="Pubservice/Common/_cssjs"/>
    <link rel="stylesheet" href="{$config_siteurl}statics/cu/css/public-service.css">
    <script type="text/javascript" src="{$config_siteurl}statics/cu/js/category_select.js"></script>
</head>
<body>
<div class="wrap">
<template file="Pubservice/Common/_head"/>
    <div class="stepBar">
        <div class="ggwh_Content">
            <div class="stepBarMain">
                <a href="{$config_siteurl}" class="link">首页</a>&nbsp;&nbsp;&nbsp;&nbsp;>&nbsp;&nbsp;&nbsp;&nbsp;文化活动                    
            </div>
        </div>
    </div>
    <div class="ggwh_Content" style="margin-top: 30px;">
        <div class="xmgsDetailLeft pull-left">
            <div class="top">
                <h3>目录</h3>
            </div>
            <ul class="ggwh_ZxList" style="padding: 5px;">
                <li class="active">
                    <a href="{:U('show',array('id'=>$data['parent_id']))}" data-src="js">团对介绍</a>
                </li>
                <li>
                    <a data-src="xqtz">团队活动</a>                      
                </li>
            </ul>
        </div>
        <div class="xmgsDetailRight pull-right xqtz" style="display: none;">
            <div class="xmgsDetailRMain">
                <div class="top">
                    <span>团队活动</span>
                </div>
                <div class="xmgsDetailRMain" style="padding: 0px;">
                    <div class="applyContent">
                        <a class="suggest text-red" href="javascript:$('#suggest').modal();">我要建议</a>
                        <div style="overflow: hidden;">
                            <h2 class="pull-left">太原市老年大学</h2>
                            <span style="margin-left: 50px;line-height: 80px;">截止人数:{$data.acceptance}/<span class="text-red"><if condition="$data['num'] neq '' ">{$data['num']}<else/>0</if></span></span>
                        </div>
                        <table class="table applyTable">
                            <tr>
                                <td>参与方式:{$data.participation_mode}</td>
                                <td>联系人：{$data.contacts}</td>
                                <td>联系电话：{$data.contacts_tel}</td>
                            </tr>
                            <tr>
                                <td>培训名称：{$data.training_title}</td>
                                <td>培训地点：{$data.training_addr}</td>
                                <td>授课教师：{$data.lecturer}</td>
                            </tr>
                            <tr>
                                <td>开课时间：{$data.start_time}</td>
                                <td>课程时长：{$data.duration}</td>
                            </tr>
                            <tr>
                                <td>结束时间：{$data.end_time}</td>
                            </tr>
                        </table>
                         <div style="margin: 40px 0px;">
                            <if condition="($data['acceptance'] - $data['num']) gt '0' ">
                            <if condition="($username eq '') and ($userInfo['username'] eq '')">
                            <a class="applyBtn" href="javascript:volid(0);" data-toggle="modal" data-target="#login">预约</a>
                            <else/>
                            <a class="applyBtn"  href="{:U('Pubservice/Facility/bespeak',array('tab_cid'=>$data['id'],'area'=>$data['area'],'tablename'=>'active'))}">预约</a>
                        </if>
                        <else/>
                        <a class="applyBtn"  disabled="disabled">预约已满</a>
                    </if>
                        </div>
                        <h4>往期回顾</h4>
                        <hr style="border-color: #93262B;">
                        <div class="applyBanner">
                            <div class="swiper-container swiper-container-horizontal">
                                <div class="swiper-wrapper">
                                    <volist name="data['review']" id="vo">
                                        <div class="swiper-slide swiper-slide-active" style="width: 167.4px; margin-right: 10px;">
                                            <a href="{:U('show',array('id'=>$vo['id']))}">
                                                <img src="{$vo.image}">
                                                <p>{$vo.training_title}</p>
                                            </a>
                                        </div>
                                    </volist>
                                </div>
                                <div class="swiper-button-next swiper-button-white"></div>
                                <div class="swiper-button-prev swiper-button-white swiper-button-disabled"></div>
                            </div>
                            {$data.publish_content}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> 
 <template file="Pubservice/Common/checklogin"/>
<template file="Pubservice/Common/_foot"/>
</body>
</html>
<script>
 var swiper = new Swiper('.applyBanner .swiper-container', {
     nextButton: '.applyBanner .swiper-button-next',
     prevButton: '.applyBanner .swiper-button-prev',
     slidesPerView: 5,
     paginationClickable: true,
     spaceBetween: 10
 });
 $(function() {
     $("#catid_10").parent().addClass("active");
     // 绑定表情
     $('#smile').SinaEmotion($('#text'));
     $(".xmgsDetailRight").hide();
     $(".xmgsDetailRight.js").show();
     $(".ggwh_ZxList li a").click(function(){
         var className=$(this).attr("data-src");
         if(className){
         $(".xmgsDetailRight").hide();
         $(".xmgsDetailRight."+className+"").show(); 
         $(this).parents("ul").find("li").removeClass("active");
         $(this).parent().addClass('active');
         }                   
     });
     $("#jxxc").click(function(){
         $(".xmgsDetailRight").hide();
         $(".xmgsDetailRight.xcmain").show();    
     })
 })
</script>


