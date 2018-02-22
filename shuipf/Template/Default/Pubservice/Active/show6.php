<div class="ggwh_Content" style="margin-top: 30px;">
    <div class="xmgsDetailLeft pull-left">
        <div class="top">
            <h3>目录</h3>
        </div>
        <ul class="ggwh_ZxList" style="padding: 5px;">
            <li class="active">
                <a data-src="js">结果公示</a>
            </li>
            <li>
                <a data-src="xqtz">赛事现场</a>                      
            </li>
            <li>
                <a data-src="bm">报&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;名</a>
            </li>
        </ul>
    </div>
    <div class="xmgsDetailRight pull-right js" style="display: block;">
        <div class="top">
            <span>结果公示</span>
        </div>
        <div class="xmgsDetailRMain">
            <h3 class="text-center">{$data.content_title}</h3> 
            <div style="margin-top: 20px;">
                <span style="color: #969696;">主讲人：</span>
                {$data.lecturer}
                <span style="color: #969696;margin-left: 65px;">开讲时间：</span>
                {$data.start_time}
            </div>
            <dl>
            <if condition="$data.art_cid eq 205">
                <dt>舞蹈门类:</dt><dd><span>{$data.dance_winning}</span></dd>
                <dt>曲艺门类:</dt><dd><span>{$data.art_winning}</span></dd>
                <dt>戏剧门类:</dt><dd><span>{$data.theatre_winning}</span></dd>
                <dt>音乐门类:</dt><dd><span>{$data.music_winning}</span></dd>
            </if>
            <if condition="$data.art_cid eq 206">
                <dt>书法门类:</dt><dd><span>{$data.dance_winning}</span></dd>
                <dt>美术门类:</dt><dd><span>{$data.art_winning}</span></dd>
                <dt>水墨门类:</dt><dd><span>{$data.theatre_winning}</span></dd>
                <dt>毛笔门类:</dt><dd><span>{$data.music_winning}</span></dd>
            </if>
            </dl>
        </div>
    </div>
    <div class="xmgsDetailRight pull-right xqtz" style="display: none;">
        <div class="top">
            <span>赛事现场</span>
        </div>
        <div class="xmgsDetailRMain">
            <h3 class="text-center">{$data.content_title}</h3> 
            <div style="margin-top: 20px;">
                <span style="color: #969696;">主讲人：</span>
                {$data.lecturer}
                <span style="color: #969696;margin-left: 65px;">开讲时间：</span>
                {$data.start_time}
            </div>
            {$data.voide}
            </br>
            {$data.publish_content}
        </div>
    </div>
    <div class="xmgsDetailRight pull-right bm" style="display: none;">
        <div class="top">
            <span>预约</span>
        </div>
        <div class="xmgsDetailRMain" style="padding: 0px;">
            <div class="applyContent" style="border: none;">
                <a class="suggest text-red" href="javascript:$('#suggest').modal();">我要建议</a>
                <div style="overflow: hidden;">
                    <h2 class="pull-left">{$data.content_title}</h2>
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
                 <eq name="data['if_bespeak']" value="1">
                <div style="margin: 40px 0px;">
                    <if condition="($data['acceptance'] - $data['num']) gt '0' ">
                        <if condition="($username eq '') and ($userInfo['username'] eq '')">
                            <a class="applyBtn" href="javascript:volid(0);" data-toggle="modal" data-target="#login">预约</a>
                            <elseif condition="$userInfo['username'] neq ''" />
                            <a class="applyBtn"  onclick="checkname()">预约</a>
                        <else/>
                            <a class="applyBtn"  href="{:U('Pubservice/Facility/bespeak',array('tab_cid'=>$data['id'],'area'=>$data['area'],'tablename'=>'active'))}">预约</a>
                        </if>
                    <else/>
                
                        <a class="applyBtn"  disabled="disabled">预约已满</a>
                    </if>
                    <!--<a href="{:U('live',array('id'=>$vo['id']))}" class="livebtn" target="_blank">观看直播</a>-->
                   
                </div>
                
                </eq>
                <template file="Pubservice/Common/_bshare"/>
                <h4>往期回顾</h4>
                <hr style="border-color: #93262B;">
                <div class="applyBanner">
                    <div class="swiper-container swiper-container-horizontal">
                        <div class="swiper-wrapper">
                            <volist name="data['review']" id="vo">
                                <div class="swiper-slide swiper-slide-active" style="width: 167.4px;height: 149px; margin-right: 10px;">
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
    <div class="clearfix"></div>
    <template file="Pubservice/Common/comment"/>
</div>
<template file="Pubservice/Common/checklogin"/>
 
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
      function checkname(){
                alert('后台管理员预约请先注册');
            }
 </script>