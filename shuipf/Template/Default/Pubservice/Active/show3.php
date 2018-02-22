<div class="ggwh_Content" style="margin-top: 20px;">
    <div class="applyContent">
        <a class="suggest text-red" href="javascript:$('#suggest').modal();">我要建议</a>
        <div style="overflow: hidden;">
            <h2 class="pull-left">{$data.subtitle}</h2>
            <span style="margin-left: 50px;line-height: 80px;">截止人数:{$data.acceptance}/
                <span class="text-red"><if condition="$data['num'] neq '' ">{$data['num']}<else/>0</if></span></span>
        </div>
        <table class="table applyTable">
            <tr>
                <td colspan="3">培训名称：{$data.training_title}</td>
            </tr>
            <tr>
                <td>开课时间：{$data.start_time}</td>
                <td>培训地点：{$data.training_addr}</td>
                <td>授课教师：{$data.lecturer}</td>
            </tr>
            <tr>
                <td>结束时间：{$data.end_time}</td>
                <td>课程时长：{$data.duration}</td>
            </tr>
            <tr>
                <td>参与方式：{$data.participation_mode}</td>
                <td>联系人：{$data.contacts}</td>
                <td>联系电话：{$data.contacts_tel}</td>
            </tr>
        </table>
        {$data.publish_content}
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
    </div>
    <h4>往期回顾</h4>
    <hr style="border-color: #93262B;" />
    <div class="applyBanner" style="position: relative;">
        <div class="swiper-container">
            <div class="swiper-wrapper">
                <volist name="data['review']" id="vo">
                    <div class="swiper-slide swiper-slide-active" style="width: 167.4px; height: 149px; margin-right: 10px;">
                        <a href="{:U('show',array('id'=>$vo['id']))}">
                            <img src="{$vo['image']}">
                            <p>{$vo.content_title}</p>
                        </a>
                    </div>
                </volist>
            </div>
        </div>
        <!-- Add Arrows -->
        <div class="swiper-button-next swiper-button-white"></div>
        <div class="swiper-button-prev swiper-button-white"></div>
    </div>
    <template file="Pubservice/Common/comment"/>
</div>



<template file="Pubservice/Common/checklogin"/>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script type="text/javascript" src="../jquery/jquery.min.js"></script>
<!-- <script type="text/javascript" src="../jquery/jquery.form.js"></script> -->
<script type="text/javascript" src="../bootstrap/bootstrap.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script type="text/javascript" src="../swiper/swiper.min.js"></script>
<script type="text/javascript" src="../js/suggest.js"></script>
<script type="text/javascript" src="../js/sinaFaceAndEffec.js" ></script>
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
    })
     function checkname(){
                alert('后台管理员预约请先注册');
            }
</script>