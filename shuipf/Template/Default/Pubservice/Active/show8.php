

    <div class="ggwh_Content">
        <div class="zlTsgDetailMain">
            <div class="left zlNews">
                <h2>{$data.content_title}</h2>
               
                <!--<p class="noindent">主办单位：{$data.host_unit}</p>-->
                <p class="noindent">活动地点：<if condition="$data['act_address'] neq '' ">{$data.act_address}<else/>暂无信息</if></p>
                <p class="noindent">活动时间：<if condition="$data['act_time'] neq '' ">{$data.act_time}<else/>暂无信息</if></p>
                <p class="noindent">联系方式：<if condition="$data['contacts'] neq '' ">{$data.contacts}:{$data.contacts_tel}<else/>暂无信息</if></p>
                {$data.abstract}
                <eq name="data['if_bespeak']" value="1">
                <div style="margin: 40px 0px;">
                    <if condition="($data['acceptance'] - $data['num']) gt '0' ">
                        <if condition="($username eq '') and ($userInfo['username'] eq '')">
                            <a class="applyBtn" href="javascript:volid(0);" data-toggle="modal" data-target="#login">预约</a>
                        <elseif condition="($username eq '') and $userInfo['username'] neq ''" />
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
            <div class="right">
                <div class="tj">
                    <h3 class="pull-left">为您推荐</h3>
                    <!-- <a class="change">换一换</a> -->
                </div>
                <volist name="data['review']" id="vo">
                <div class="tjDiv">
                   <a href="{:U('show',array('id'=>$vo['id']))}" style="color:black;">
                    <img src="{:thumb($vo['image'],60,60)}" class="img-responsive" style="width:60px;height:60px;">
                    <h4>{$vo.content_title}</h4>
                    <p>时间：<if condition="$vo['act_time'] neq '' ">{$vo.act_time}<else/>暂无信息</if></p>
                    <p style="overflow:hidden;">地址：<if condition="$vo['act_address'] neq '' ">{$vo.act_address}<else/>暂无信息</if></p>
                  </a>
                </div>
               </volist>
            </div>
        </div>
     <template file="Pubservice/Common/comment"/>
    </div>
    <div class="ggwh_Content" style="padding: 30px 0px">
    <!--  <span>{$data.subtitle}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{$data.acceptance}</span></br> -->
    <!-- {$data.publish_content} -->
      <template file="Pubservice/Common/checklogin"/>
    </div>
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
        });
        function checkname(){
            alert('后台用户无法预约注册');
        }
    </script>