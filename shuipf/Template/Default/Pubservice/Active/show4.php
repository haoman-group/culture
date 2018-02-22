
    <div class="ggwh_Content">
        <div class="zlTsgDetailMain">
            <div class="left zlNews">
                <h2>{$data.content_title}</h2>{$data.publish_content}
                <p class="noindent">主办单位：{$data.host_unit}</p>
                <p class="noindent">活动地点：{$data.act_address}</p>
                <p class="noindent">活动时间：{$data.act_time}</p>
                <p class="noindent">咨询电话：{$data.contacts_tel}</p>
                <br>
                <p class="noindent">参加方式：</p>
                <p class="noindent">1、电话预约0351-4452125</p>
                <p class="noindent">2、可至山西省图书馆现场预约</p>
                <p class="noindent">3、登录“文化公共服务平台”，进入“文化活动”栏目订票；每人限定3张。（电话及现场预约限额40人，网上订票预约限额40人，满额为止）</p>
                <br>
                <p class="noindent text-red">友情提示：</p>
                <p class="noindent text-red">1.是否成功订票及取票验证码，请以网站“个人中心”——“活动预约”中信息为准；</p>
                <p class="noindent text-red">2.订票成功后未验票入场满3次，取消当年预约资格；</p>
                <p class="noindent text-red">3.退票时间截止至活动前一天（活动当天不可退票）</p>
                             <eq name="data['if_bespeak']" value="1">
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
                    </eq>
                    <!--<a href="{:U('live',array('id'=>$vo['id']))}" class="livebtn" target="_blank">观看直播</a>-->
                    <template file="Pubservice/Common/_bshare"/>    
            </div>
            <div class="right">
                <div class="tj">
                    <h3 class="pull-left">为您推荐</h3>
                    <!-- <a class="change">换一换</a> -->
                </div>
                <volist name="data['review']" id="vo">
                    <div class="tjDiv">
                        <a href="{:U('show',array('id'=>$vo['id']))}">
                            <img src="{$vo['image']}" class="img-responsive">
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
        
       <template file="Pubservice/Common/checklogin"/>
       <script>
        function checkname(){
                alert('后台管理员预约请先注册');
            }
       </script>