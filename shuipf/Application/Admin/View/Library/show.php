<?php if (!defined('SHUIPF_VERSION')) exit(); ?>
<Admintemplate file="Common/Head"/>
<body>
<div class="wrap" >

    <if condition="$_GET['showtype'] neq '' || $_GET['type'] neq ''">
        <Admintemplate file="Common/actionNav"/>
        <else/>
        <Admintemplate file="Common/Nav"/>
    </if>
    <div style="padding: 30px;">
        <div class="tab pignose-tab-wrapper pignose-tab-wrapper-root" style="height: 482px;min-height: 470px;">
            <ul class="pignose-tab-group">
                <li class="pignose-tab-list">
                    <a href="javascript:void(0)" class="pignose-tab-btn">图书馆基本概况</a>
                    <div class="pignose-tab-container">
                        <form action="{:U('Admin/Library/add')}" method="post">
                            <dl class="logdata">
                                <dt>所属地区</dt>
                                <dd><input type="text" name="area_display" value="{$data.area_display}"
                                           disabled="disabled"></dd>
                                <input type="hidden" name="area" class="area" value="{$data.area}">
                                <dt>名称</dt>
                                <dd><input type="text" name="name" value="{$data.name}" disabled="disabled"></dd>
                                <dt>地址</dt>
                                <dd><input type="text" name="addr" value="{$data.addr}" disabled="disabled"></dd>
                                <dt>法人代表</dt>
                                <dd><input type="text" name="legal_person" value="{$data.legal_person}"
                                           disabled="disabled"></dd>
                                <dt>联系电话</dt>
                                <dd><input type="text" name="telephone" value="{$data.telephone}" disabled="disabled">
                                </dd>
                                <dt>馆社建筑面积</dt>
                                <dd><input type="text" name="covered_area" value="{$data.covered_area}"
                                           disabled="disabled"></dd>
                                <dt>占地面积</dt>
                                <dd><input type="text" name="floor_area" value="{$data.floor_area}" disabled="disabled">
                                </dd>
                                <dt>书库面积</dt>
                                <dd><input type="text" name="book_area" value="{$data.book_area}" disabled="disabled">
                                </dd>
                                <dt>阅览室面积</dt>
                                <dd><input type="text" name="readroom_area" value="{$data.readroom_area}"
                                           disabled="disabled"></dd>
                                <dt>阅览室坐席数</dt>
                                <dd><input type="text" name="readroom_seat_num" value="{$data.readroom_seat_num}"
                                           disabled="disabled"></dd>
                                <dt>少儿阅览坐席数</dt>
                                <dd><input type="text" name="chilreadroom_seat_num"
                                           value="{$data.chilreadroom_seat_num}" disabled="disabled"></dd>
                                <dt>报告厅面积</dt>
                                <dd><input type="text" name="reportroom_area" value="{$data.reportroom_area}"
                                           disabled="disabled"></dd>
                                <dt>报告厅坐席数</dt>
                                <dd><input type="text" name="reportroom_seat_num" value="{$data.reportroom_seat_num}"
                                           disabled="disabled"></dd>
                                <dt>电子阅览室面积</dt>
                                <dd><input type="text" name="ereadroom_area" value="{$data.ereadroom_area}"
                                           disabled="disabled"></dd>
                                <dt>电子阅览室坐席数</dt>
                                <dd><input type="text" name="ereadroom_seat_num" value="{$data.ereadroom_seat_num}"
                                           disabled="disabled"></dd>
                                <dt>计算机总数</dt>
                                <dd><input type="text" name="computer_num" value="{$data.computer_num}"
                                           disabled="disabled"></dd>
                                <dt>供读者使用的计算机数量</dt>
                                <dd><input type="text" name="reader_user_num" value="{$data.reader_user_num}"
                                           disabled="disabled"></dd>
                                <dt>读者服务区是否提供无线网络覆盖</dt>
                                <dd><input type="radio" id="yes" name="have_wifi" disabled="disabled" value=1
                                    <eq name="data.have_wifi" value="1">checked</eq>
                                    /><label for="yes">是</label> <input type="radio" id="no" name="have_wifi" value=2
                                    <eq name="data.have_wifi" value="2">checked</eq>
                                    /><label for="no">否</label></dd>
                                <dt>计算机信息节点</dt>
                                <dd><input type="text" name="computer_info_node" value="{$data.computer_info_node}"
                                           disabled="disabled"></dd>
                                <dt>宽带接入</dt>
                                <dd><input type="text" name="bandwidth" value="{$data.bandwidth}"
                                           disabled="disabled"><span>（Mbps）</span></dd>
                                <dt>存储容量</dt>
                                <dd><input type="text" name="storage" value="{$data.storage}" disabled="disabled"><span>（TB）</span>
                                </dd>
                                <dt>级别</dt>
                                <dd><select name="level" disabled="disabled">
                                        <option value="国家级"
                                        <if condition="$data.level eq '国家级'"> selected</if>
                                        >国家级</option>
                                        <option value="省级"
                                        <if condition="$data.level eq '省级'"> selected</if>
                                        >省级</option>
                                        <option value="市级"
                                        <if condition="$data.level eq '市级'"> selected</if>
                                        >市级</option>
                                        <option value="县级"
                                        <if condition="$data.level eq '县级'"> selected</if>
                                        >县级</option>
                                    </select></dd>
                            </dl>
                            <div class="btn_wrap_pd">
                                <!--<input type="submit"  class="btn btn_submit mr10 J_ajax_submit_btn" value="提交">-->
                            </div>
                            <input type="hidden" name="id_lib" value="{$data.id_lib}">
                            <input type="hidden" name="master" value="yes">
                            <input type="hidden" name="idx" value="1">
                        </form>
                    </div>
                </li>
                <li class="pignose-tab-list">
                    <a href="###" class="pignose-tab-btn">图书报刊资源配置情况</a>
                    <div class="pignose-tab-container">
                        <form action="{:U('Admin/Library/add')}" method="post" name="myform" class="J_ajaxForm">
                            <input type="hidden" name="area" class="area" value="{$data.area}">
                            <dl class="logdata">
                                <dt>总藏量</dt>
                                <dd><input type="text" name="num_totle" value="{$data.num_totle}"
                                           disabled="disabled"><span>（万册、件）</span></dd>
                                <dt>电子文献藏量</dt>
                                <dd><input type="text" name="num_e_doc" value="{$data.num_e_doc}"
                                           disabled="disabled"><span>（种）</span></dd>
                                <dt>电子图书藏量</dt>
                                <dd><input type="text" name="num_e_book" value="{$data.num_e_book}" disabled="disabled"><span>（种）</span>
                                </dd>
                                <dt>电子期刊藏量</dt>
                                <dd><input type="text" name="num_e_periodical" value="{$data.num_e_periodical}"
                                           disabled="disabled"><span>（种）</span></dd>
                                <dt>图书年入藏量</dt>
                                <dd><input type="text" name="num_collect_book" value="{$data.num_collect_book}"
                                           disabled="disabled"><span>（万种）</span></dd>
                                <dt>报刊年入藏量</dt>
                                <dd><input type="text" name="num_collect_periodical"
                                           value="{$data.num_collect_periodical}" disabled="disabled"><span>（种）</span>
                                </dd>
                                <dt>试听文献年入藏量</dt>
                                <dd><input type="text" name="num_collect_audio" value="{$data.num_collect_audio}"
                                           disabled="disabled"><span>（种）</span></dd>
                                <dt>数字资源总量</dt>
                                <dd><input type="text" name="num_digit_totle" value="{$data.num_digit_totle}"
                                           disabled="disabled"><span>（TB）</span></dd>
                                <dt>自建数字资源总量</dt>
                                <dd><input type="text" name="num_digit_self" value="{$data.num_digit_self}"
                                           disabled="disabled"><span>（TB）</span></dd>
                            </dl>
                            <div class="btn_wrap_pd">
                                <!--<input type="submit" value="提交" class="btn btn_submit mr10 J_ajax_submit_btn" />-->
                            </div>
                            <input type="hidden" name="id_lib" value="{$data.id_lib}">
                        </form>
                    </div>
                </li>
                <li class="pignose-tab-list">
                    <a href="###" class="pignose-tab-btn">经费投入情况</a>
                    <div class="pignose-tab-container table_list">
                        <div class="btn-box">
                            <!--<input type="submit" value="添加" class='btn btn_submit btn_add' data-type="addFund" data-idlib="{$data.id_lib}" />-->
                        </div>
                        <div class="table-box">
                            <table>
                                <thead>
                                <tr>
                                    <th>序号</th>
                                    <th>政府拨款总额（万元）</th>
                                    <th>新增藏量购置费（万元）</th>
                                    <th>免费开放本地经费（万元）</th>
                                    <th>电子资源购置费</th>
                                </tr>
                                </thead>
                                <tbody>
                                <volist name="data['Lib_Fund']" id="vo">
                                    <tr>
                                        <td>{$vo.id_lib_fund}</td>
                                        <td>{$vo.fund_totle}</td>
                                        <td>{$vo.fund_new}</td>
                                        <td>{$vo.fund_free}</td>
                                        <td>{$vo.fund_ele}</td>
                                    </tr>
                                </volist>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </li>
                <li class="pignose-tab-list">
                    <a href="###" class="pignose-tab-btn">图书馆人才队伍建设情况</a>
                    <div class="pignose-tab-container table_list">
                        <div class="btn-box">
                            <!--<input type="submit" value="添加" class='btn btn_submit btn_add' data-type="addTalent" data-idlib="{$data.id_lib}" />-->
                        </div>
                        <div class="table-box">
                            <table>
                                <thead>
                                <tr>
                                    <th>序号</th>
                                    <th>姓名</th>
                                    <th>性别</th>
                                    <th>民族</th>
                                    <th>出生日期</th>
                                    <th>政治面貌</th>
                                    <th>入党时间</th>
                                    <th>毕业院校</th>
                                    <th>毕业时间</th>
                                    <th>所学专业</th>
                                    <th>学历</th>
                                    <th>学位</th>
                                    <th>职称(中/高级)</th>
                                    <th>岗位培训学时</th>
                                    <th>获奖情况</th>
                                    <th>是否业务人员</th>
                                    <th>人员身份</th>
                                </tr>
                                </thead>
                                <tbody>
                                <volist name="data['Lib_Talent']" id="vo">
                                    <tr>
                                        <td>{$vo.id_lib_tal}</td>
                                        <td>{$vo.tal_name}</td>
                                        <td>{$vo.tal_sex}</td>
                                        <td>{$vo.tal_nation}</td>
                                        <td>{$vo.tal_birthday}</td>
                                        <td>{$vo.tal_pol_status}</td>
                                        <td>{$vo.tal_join_date}</td>
                                        <td>{$vo.tal_schooltag}</td>
                                        <td>{$vo.tal_graduate_date}</td>
                                        <td>{$vo.tal_major}</td>
                                        <td>{$vo.tal_edu_bg}</td>
                                        <td>{$vo.tal_edu_degree}</td>
                                        <td>{$vo.tal_position}</td>
                                        <td>{$vo.tal_train_hours}</td>
                                        <td>{$vo.tal_rewards}</td>
                                        <td>{$vo.tal_if_business}</td>
                                        <td>{$vo.tal_identity}</td>
                                    </tr>
                                </volist>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </li>
                <li class="pignose-tab-list">
                    <a href="###" class="pignose-tab-btn">服务工作</a>
                    <div class="pignose-tab-container">
                        <form action="{:U('Admin/Library/add')}" method="post" name="myform" class="J_ajaxForm">
                            <dl class="logdata">
                                <dt>基础服务项目</dt>
                                <dd><input type="text" name="ser_name" value="{$data.ser_name}"
                                           disabled="disabled"/><span>（项）</span></dd>
                                <dt>每周开馆时间</dt>
                                <dd><input type="text" name="ser_hours" value="{$data.ser_hours}"
                                           disabled="disabled"/><span>（小时）</span></dd>
                                <dt>是否错时开放</dt>
                                <dd><input type="radio" id="yes" name="ser_interleaved" disabled="disabled" value=1
                                    <eq name="data.ser_interleaved" value="1">checked</eq>
                                    /><label for="yes">是</label> <input type="radio" id="no" name="ser_interleaved"
                                                                        value=2
                                    <eq name="data.ser_interleaved" value="2">checked</eq>
                                    /><label for="no">否</label></dd>
                                <dt>书看文献年外借册次</dt>
                                <dd><input type="text" name="ser_borrow_num" value="{$data.ser_borrow_num}"
                                           disabled="disabled"/><span>（万册次）</span></dd>
                                <dt>年总流通人次</dt>
                                <dd><input type="text" name="ser_people_count" value="{$data.ser_people_count}"
                                           disabled="disabled"/><span>（千人次）</span></dd>
                                <dt>流动服务点书刊借阅册次</dt>
                                <dd><input type="text" name="ser_nodeborrow_num" value="{$data.ser_nodeborrow_num}"
                                           disabled="disabled"/><span>（千册次）</span></dd>
                                <dt>人均年到馆次数</dt>
                                <dd><input type="text" name="ser_avg_visit" value="{$data.ser_avg_visit}"
                                           disabled="disabled"/><span>（年流通总人次/持证读者数量）</span></dd>
                                <dt>无障碍设施</dt>
                                <dd><input type="text" name="ser_accessible" value="{$data.ser_accessible}"
                                           disabled="disabled"/><span></span></dd>
                                <dt>盲文图书藏量</dt>
                                <dd><input type="text" name="ser_braille_num" value="{$data.ser_braille_num}"
                                           disabled="disabled"/><span>（册）</span></dd>
                            </dl>
                            <div class="btn_wrap_pd">
                                <!--<input type="submit" value="提交" class="btn btn_submit mr10 J_ajax_submit_btn" />-->
                            </div>
                            <input type="hidden" name="id_lib" value="{$data.id_lib}">
                            <input type="hidden" name="area" class="area" value="{$data.area}">
                        </form>
                    </div>
                </li>
                <li class="pignose-tab-list">
                    <a href="###" class="pignose-tab-btn">服务活动</a>
                    <div class="pignose-tab-container table_list">
                        <div class="btn-box">
                            <!--<input type="submit" value="添加" class='btn btn_submit btn_add' data-type="addServer" data-idlib="{$data.id_lib}" />-->
                        </div>
                        <div class="table-box">
                            <table>
                                <thead>
                                <tr>
                                    <th>序号</th>
                                    <th>活动对象</th>
                                    <th>活动名称</th>
                                    <th>主要内容</th>
                                    <th>活动时间</th>
                                    <th>活动地点</th>
                                    <th>受益人数</th>
                                </tr>
                                </thead>
                                <tbody>
                                <volist name="data['Lib_Server']" id="vo">
                                    <tr>
                                        <td>{$vo.id_lib_ser}</td>
                                        <td>{$vo.ser_object}</td>
                                        <td>{$vo.ser_title}</td>
                                        <td>{$vo.ser_content}</td>
                                        <td>{$vo.ser_date}</td>
                                        <td>{$vo.ser_location}</td>
                                        <td>{$vo.ser_benefit_num}</td>
                                    </tr>
                                </volist>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </li>
                <li class="pignose-tab-list">
                    <a href="###" class="pignose-tab-btn">数字化建设</a>
                    <div class="pignose-tab-container">
                        <form action="{:U('Admin/Library/add')}" method="post" name="myform" class="J_ajaxForm">
                            <dl class="logdata">
                                <dt>官方网站</dt>
                                <dd><input type="text" name="dig_website" value="{$data.dig_website}"
                                           disabled="disabled"/><span></span></dd>
                                <dt>App</dt>
                                <dd><input type="text" name="dig_app" value="{$data.dig_app}"
                                           disabled="disabled"/><span></span></dd>
                                <dt>博客</dt>
                                <dd><input type="text" name="dig_blog" value="{$data.dig_blog}" disabled="disabled"/>
                                </dd>
                                <dt>微博</dt>
                                <dd><input type="text" name="dig_weibo" value="{$data.dig_weibo}" disabled="disabled"/>
                                </dd>
                                <dt>空间</dt>
                                <dd><input type="text" name="dig_zone" value="{$data.dig_zone}" disabled="disabled"/>
                                </dd>
                                <dt>社区</dt>
                                <dd><input type="text" name="dig_community" value="{$data.dig_community}"
                                           disabled="disabled"/></dd>
                                <dt>微信公众号</dt>
                                <dd><input type="text" name="dig_wechat" value="{$data.dig_wechat}"
                                           disabled="disabled"/></dd>
                                <dt>网上服务项目</dt>
                                <dd><input type="text" name="dig_webserver" value="{$data.dig_webserver}"
                                           disabled="disabled"/><span>（项）</span></dd>
                                <dt>年网站访问量</dt>
                                <dd><input type="text" name="dig_PV" value="{$data.dig_PV}" disabled="disabled"/><span>（万次/年）</span>
                                </dd>
                                <dt>可远程访问的数字资源</dt>
                                <dd><input type="text" name="dig_remote_num" value="{$data.dig_remote_num}"
                                           disabled="disabled"/><span>（TB）</span></dd>
                                <dt>是否建有文化信息资源共享工程站点</dt>
                                <dd><input type="radio" name="dig_ifshare" disabled="disabled" value=1
                                    <eq name="data.dig_ifshare" value="1">checked</eq>
                                    /><label for="yes">是</label> <input type="radio" name="dig_ifshare" value=2
                                    <eq name="data.dig_ifshare" value="2">checked</eq>
                                    /><label for="no">否</label></dd>
                                <dt>文化信息资源共享工程经费投入</dt>
                                <dd><input type="text" name="dig_share_fund" value="{$data.dig_share_fund}"
                                           disabled="disabled"/><span>（万元/年）</span></dd>
                                <dt>数字图书馆推广工程经费投入</dt>
                                <dd><input type="text" name="dig_expand_fund" value="{$data.dig_expand_funddig_PV}"
                                           disabled="disabled"/><span>（万元/年）</span></dd>
                                <dt>公共电子阅览室终端是否统一安装管理软件</dt>
                                <dd><input type="radio" name="dig_havemanager" disabled="disabled" value=1
                                    <eq name="data.dig_havemanager" value="1">checked</eq>
                                    /><label for="yes">是</label> <input type="radio" name="dig_havemanager" value=2
                                    <eq name="data.dig_havemanager" value="2">checked</eq>
                                    /><label for="no">否</label></dd>
                                <dt>公共电子阅览室终端数量</dt>
                                <dd><input type="text" name="dig_share_fund" value="{$data.dig_computer_num}"
                                           disabled="disabled"/><span>（台）</span></dd>

                            </dl>
                            <div class="btn_wrap_pd">
                                <!--<input type="submit" value="提交" class="btn btn_submit mr10 J_ajax_submit_btn" />-->
                            </div>
                            <input type="hidden" name="id_lib" value="{$data.id_lib}">
                            <input type="hidden" name="area" class="area" value="{$data.area}">
                        </form>
                    </div>
                </li>
                <li class="pignose-tab-list">
                    <a href="###" class="pignose-tab-btn">社会教育活动</a>
                    <div class="pignose-tab-container table_list">
                        <div class="btn-box">
                            <!--<input type="submit" value="添加" class='btn btn_submit btn_add' data-type="addEducationAct" data-idlib="{$data.id_lib}" />-->
                        </div>
                        <div class="table-box">
                            <table>
                                <thead>
                                <tr>
                                    <th>序号</th>
                                    <th>目录</th>
                                    <th>活动名称</th>
                                    <th>参加人数</th>
                                    <th>活动时间</th>
                                    <th>活动地点</th>
                                    <th>主要内容</th>
                                </tr>
                                </thead>
                                <tbody>
                                <volist name="data['Lib_EducationAct']" id="vo">
                                    <tr>
                                        <td>{$vo.id_lib_eact}</td>
                                        <td>{$vo.eact_catelog}</td>
                                        <td>{$vo.eact_title}</td>
                                        <td>{$vo.eact_join_num}</td>
                                        <td>{$vo.eact_date}</td>
                                        <td>{$vo.eact_location}</td>
                                        <td>{$vo.eact_content}</td>

                                    </tr>
                                </volist>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </li>
                <li class="pignose-tab-list">
                    <a href="###" class="pignose-tab-btn">志愿者队伍建设</a>
                    <div class="pignose-tab-container table_list">
                        <div class="btn-box">
                            <!--<input type="submit" value="添加" class='btn btn_submit btn_add' data-type="addVolunteer" data-idlib="{$data.id_lib}" />-->
                        </div>
                        <div class="table-box">
                            <table>
                                <thead>
                                <tr>
                                    <th>序号</th>
                                    <th>姓名</th>
                                    <th>性别</th>
                                    <th>民族</th>
                                    <th>出生日期</th>
                                    <th>政治面貌</th>
                                    <th>毕业院校</th>
                                    <th>毕业时间</th>
                                    <th>所学专业</th>
                                    <th>学历</th>
                                    <th>学位</th>
                                    <th>加入志愿者日期</th>
                                    <th>工作单位</th>
                                    <th>教育程度</th>
                                    <th>专长</th>
                                </tr>
                                </thead>
                                <tbody>
                                <volist name="data['Lib_Volunteer']" id="vo">
                                    <tr>
                                        <td>{$vo.id_lib_vol}</td>
                                        <td>{$vo.vol_name}</td>
                                        <td>{$vo.vol_sex}</td>
                                        <td>{$vo.vol_nation}</td>
                                        <td>{$vo.vol_birthday}</td>
                                        <td>{$vo.vol_pol_status}</td>
                                        <td>{$vo.vol_schooltag}</td>
                                        <td>{$vo.vol_graduate_date}</td>
                                        <td>{$vo.vol_major}</td>
                                        <td>{$vo.vol_edu_bg}</td>
                                        <td>{$vo.vol_edu_degree}</td>
                                        <td>{$vo.vol_begin_date}</td>
                                        <td>{$vo.vol_company}</td>
                                        <td>{$vo.vol_degree}</td>
                                        <td>{$vo.vol_speciality}</td>
                                    </tr>
                                </volist>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </li>
                <li class="pignose-tab-list">
                    <a href="###" class="pignose-tab-btn">志愿服务活动</a>
                    <div class="pignose-tab-container table_list">
                        <div class="btn-box">
                            <!--<input type="submit" value="添加" class='btn btn_submit btn_add' data-type="addVolunteerAct" data-idlib="{$data.id_lib}" />-->
                        </div>
                        <div class="table-box">
                            <table>
                                <thead>
                                <tr>
                                    <th>序号</th>
                                    <th>活动名称</th>
                                    <th>参加活动志愿者姓名</th>
                                    <th>活动时间</th>
                                    <th>活动地点</th>
                                </tr>
                                </thead>
                                <tbody>
                                <volist name="data['Lib_VolunteerAct']" id="vo">
                                    <tr>
                                        <td>{$vo.id_lib_vact}</td>
                                        <td>{$vo.vact_title}</td>
                                        <td>{$vo.vact_names}</td>
                                        <td>{$vo.vact_date}</td>
                                        <td>{$vo.vact_location}</td>
                                    </tr>
                                </volist>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </li>
                <li class="pignose-tab-list">
                    <a href="###" class="pignose-tab-btn">上级表彰</a>
                    <div class="pignose-tab-container table_list">
                        <div class="btn-box">
                            <!--<input type="submit" value="添加" class='btn btn_submit btn_add' data-type="addCommend" data-idlib="{$data.id_lib}" />-->
                        </div>
                        <div class="table-box">
                            <table>
                                <thead>
                                <tr>
                                    <th>序号</th>
                                    <th>获奖内容</th>
                                    <th>获奖单位</th>
                                    <th>表彰类型</th>
                                    <th>表彰时间</th>
                                </tr>
                                </thead>
                                <tbody>
                                <volist name="data['Lib_Commend']" id="vo">
                                    <tr>
                                        <td>{$vo.id_lib_comm}</td>
                                        <td>{$vo.comm_content}</td>
                                        <td>{$vo.comm_entity}</td>
                                        <td>{$vo.comm_type}</td>
                                        <td>{$vo.comm_date}</td>
                                    </tr>
                                </volist>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </li>
                <li class="pignose-tab-list">
                    <a href="###" class="pignose-tab-btn">古籍保护管理</a>
                    <div class="pignose-tab-container">
                        <form action="{:U('Admin/Library/add')}" method="post" name="myform" class="J_ajaxForm">
                            <dl class="logdata">
                                <dt>古籍数量</dt>
                                <dd><input type="text" name="anc_totle" value="{$data.anc_totle}"
                                           disabled="disabled"/><span></span></dd>
                                <dt>经费投入每周开馆时间</dt>
                                <dd><input type="text" name="anc_fund" value="{$data.anc_fund}"
                                           disabled="disabled"/><span></span></dd>
                                <dt>古籍保护宣传活动次数</dt>
                                <dd><input type="text" name="anc_activity_num" value="{$data.anc_activity_num}"
                                           disabled="disabled"/><span></span></dd>
                            </dl>
                            <div class="btn_wrap_pd">
                                <!--<input type="submit" value="提交" class="btn btn_submit mr10 J_ajax_submit_btn" />-->
                            </div>
                            <input type="hidden" name="id_lib" value="{$data.id_lib}">
                            <input type="hidden" name="area" class="area" value="{$data.area}">
                        </form>
                    </div>
                </li>
                <li class="pignose-tab-list">
                    <a href="###" class="pignose-tab-btn">馆站位置</a>
                    <div class="pignose-tab-container">
                        <form action="{:U('Admin/Library/add')}" method="post" name="myform" class="J_ajaxForm">
                            <div class="text-center" id="baiduMap"
                                 style="width:1199px;height:450px;padding: 20px 0px;margin-bottom: 20px;"></div>
                            <dl class="logdata">

                                <dt>经度坐标位置：</dt>
                                <dd><input type="text" name="point_lng" id="point_lng" value="{$data.point_lng}"
                                           class="number-check" disabled="disabled"/><span></span></dd>
                                <dt>纬度坐标位置：</dt>
                                <dd><input type="text" name="point_lat" id="point_lat" value="{$data.point_lat}"
                                           class="number-check" disabled="disabled"/><span></span></dd>
                            </dl>


                            <input type="hidden" name="id" value="{$data.id}">
                            <input type="hidden" name="area" class="area" value="{$data.area}">
                        </form>
                    </div>
                </li>
                <li class="pignose-tab-list">
                    <a href="###" class="pignose-tab-btn">具体详情</a>

                    <div class="pignose-tab-container">


                       <dl>
                            <dt style="font-size: 14px;font-weight: 700;margin-bottom: 10px;">图片:</dt>
                            <dd>
                               
                                <ul class="img jsaddimgul" id="drama_picture">
                                    <for start="0" end="$maxPicNum">
                                        <if condition="$picture_urls[$i] neq ''">
                                            <li class=''>
                                                <input type="hidden" name="drama_picture_url[]" value="{$picture_urls[$i]}">
                                                <img src="{$picture_urls[$i]}" style="width:100px;height:100px;">
                                                <!-- <div class="operate"><span class="sl"></span><span class="sr"></span><a href="javascript:void(0)" class="tupian"></a></div> -->
                                            </li>
                                        <else/>
                                            <li class="noimg"></li>
                                        </if>
                                    </for>
                                </ul>
                                        
                            </dd>
                        </dl>
                        <dl>
                            <dt style="font-size: 14px;font-weight: 700;">简介:</dt>
                            <dd style="margin: 20px 0;"><textarea name="abstract" class="input_txt" disabled="true">{$data.abstract}</textarea>
                            </dd>
                            <dt></dt>
                            <dd>
                                <script type="text/plain" id="publish_content" name="publish_content">
                                        {$data.publish_content}

                                </script>
                                <if condition="$_GET['type'] neq ''">
                                    <?php echo Form::editor('publish_content', 'full', 'Cudatabase', 'true'); ?>
                                    <else/>
                                    <?php echo Form::editor('publish_content', 'full', 'Cudatabase'); ?>
                                </if>
                            </dd>
                        </dl>
                        <!--  <div class="btn_wrap_pd">
                             <input type="submit" value="提交" class="btn btn_submit mr10 J_ajax_submit_btn" />
                         </div> -->
                        <input type="hidden" name="id" value="{$data.id}">
                        <input type="hidden" name="area" class="area" value="{$data.area}">

                    </div>
                </li>
            </ul>
        </div>
    </div>
    <!-- 审核状态显示 -->
    <if condition="$_GET['type'] neq ''">
        <form method="post" class="tq-check-form" style="margin-top:50px;">
            <input type="hidden" name="g" value="admin">
            <input type="hidden" name="m" value="audit">
            <input type="hidden" name="a" value="add">
            <h5 style="margin-top:120px;">审核状态</h5>
        <div class="select-box" style="margin-top:30px;">
                <span class="select-span">请选择</span>
                 <select name="auditstatus" id="" class="audit" dir="center">
                                   <option value="请选择">请选择</option>
                                   <option value="40">驳回</option>
                                   <option value="35">审核通过</option>
                        
                                </select>
            </div>

            <div class="reason" hidden>
                <h6>驳回原因</h6>
                <input type="hidden" name="category" value="<?php echo $_GET['type'] ?>">
                <input type="hidden" name="cid" value="{$data.id}">
                <input type="hidden" name="type" value="<?php echo $_GET['type'] ?>">
                <textarea name="reason" placeholder="请输入驳回原因"></textarea>
            </div>

            <input type="submit" class="btn btn_submit mr10 J_ajax_submit_btn" value="提交"/>

        </form>
    </if>
   
</div>
 
</body>
<Admintemplate file="Common/Audittable"/>
<link rel="stylesheet" href="{$config_siteurl}statics/cu/pignose/css/pignose.tab.min.css"/>
<link rel="stylesheet" href="{$config_siteurl}statics/cu/pignose/css/pignose.cu.css"/>
<script type="text/javascript" src="{$config_siteurl}statics/cu/pignose/js/pignose.tab.js"></script>
<script type="text/javascript" src="{$config_siteurl}statics/cu/layer/layer.js"></script>
<!--百度地图JS API-->
<script type="text/javascript" src="http://api.map.baidu.com/api?v=2.0&ak=YUYIzLKGEcKdyyat23Aw4H9LByDx4voy"></script>
<!--百度地图API  地区边界用-->
<script type="text/javascript"
        src="http://api.map.baidu.com/library/AreaRestriction/1.2/src/AreaRestriction_min.js"></script>
<script>
    $(function () {
        //百度地图
        var map = new BMap.Map("baiduMap"); // 创建Map实例
        //根据IP 显示当前城市
        function displayLocalCity(result) {
            var cityName = result.name;
            if (cityName == 'undefined' || cityName == 'null' || cityName == '') {
                cityName = '太原';  //默认为太原
            }
            map.setCenter(cityName);
            map.centerAndZoom(cityName, 12);
        }

        var myCity = new BMap.LocalCity();
        myCity.get(displayLocalCity);
        //设置显示范围 为山西省内  坐标移出省外自动跳回  
        var b = new BMap.Bounds(new BMap.Point(109.884727, 34.424947), new BMap.Point(115.210744, 41.144106)); //创建一个包含所有给定点坐标的矩形区域,原型Bounds(minX:Number, minY:Number, maxX:Number, maxY:Number)
        try {
            BMapLib.AreaRestriction.setBounds(map, b);
        } catch (e) {
            alert(e);
        }
        var point_lng = {$data.point_lng|default= 0};
        var point_lat = {$data.point_lat|default=0};
        if (point_lng != 0 && point_lat != 0) {
            var point = new BMap.Point(point_lng, point_lat); //创建一个地理坐标点。
            //创建地图上一个图像标注。
            var marker = new BMap.Marker(point);
            //给图像标注添加点击事件 
            // marker.addEventListener("click",attribute);    
            // 将标注添加到地图中
            map.addOverlay(marker);
        }

        //开启鼠标滚轮
        map.enableScrollWheelZoom(true);
        // map.addEventListener("click", showInfo); //添加地图点击事件

        //点击事件回调函数，填充经纬度
        function showInfo(e) {
            //清楚所有覆盖物
            map.clearOverlays();
            //生成当前坐标
            var marker = new BMap.Marker(new BMap.Point(e.point.lng, e.point.lat));
            // 将标注添加到地图中
            map.addOverlay(marker);
            //填充form表单
            $("#point_lng").val(e.point.lng);
            $("#point_lat").val(e.point.lat);
        }
    });
    // pignose 初始化
    $(function () {
        // var activeIdx = <?=empty($_GET['activeIdx']) ? 0 : $_GET['activeIdx'];?>;
        $('.tab').pignoseTab({
            animation: true,
            children: '.tab',
            active: true,
            cookieName: 'libraryIdx'
        });
    });
    //layer iframe 层
    $('input.btn_add').on('click', function () {
        var type = $(this).data('type');
        var idlib = $(this).data('idlib');
        if (idlib == '' || idlib == 'null' || idlib == 'undefined') {
            layer.msg('请先添加图书馆基本概况！');
            return false;
        }
        var index = layer.open({
            type: 2,
            title: '添加',
            shadeClose: true,
            shade: 0.8,
            area: ['80%', '80%'],
            content: '/Admin/Library/subAdd?type=' + type + '&idlib=' + idlib
        });
    });
    //layer iframe 层
    $('a.btn_sub_edit').on('click', function () {
        var activeIdx = $
        var type = $(this).data('type');
        var id = $(this).data('id');
        var idlib = $(this).data('idlib');
        layer.open({
            type: 2,
            title: '修改',
            shadeClose: true,
            shade: 0.8,
            area: ['80%', '80%'],
            content: '/Admin/Library/subEdit?type=' + type + '&id=' + id + '&idlib=' + idlib + 'activeIdx' + activeIdx
        });
    });
    // 审核状态显示
    $(".audit").on("change", function () {
        var getSelectVal = $(".select-box option:selected").text();
        $(".select-box .select-span").text(getSelectVal);
        var audit = $(this).val();
        if (audit == 40) {
            $(".reason").show();
        } else {
            $(".reason").hide();
        }
    });
</script>
<script type="text/javascript">
    <?php
    $alowexts = "jpg|jpeg|gif|bmp|png";
    $thumb_ext = ",";
    $watermark_setting = 0;
    $module = "Content";
    $catid = "0";
    $authkey = upload_key("$maxPicNum,$alowexts,1,$thumb_ext,$watermark_setting");
    ?>
    function upfile(id) {
        flashupload(id + '_images', '图片上传', id, submit_pic, '{$maxPicNum},{$alowexts},1,{$thumb_ext},{$watermark_setting}', '{$module}', '{$catid}', '{$authkey}');
    }

    function submit_pic(uploadid, returnid) {
        var d = uploadid.iframe.contentWindow;
        var in_content = d.$("#att-status").html().substring(1);
        var contents = in_content.split('|');
        if (contents == '') return true;
        $.each(contents, function (i, n) {
            var str = "<input type='hidden' name='" + returnid + "_url[]' value='" + n +
                "'><img src='" + n + "'><div class='operate'><span class='sl'></span>" +
                "<span class='sr'></span><a href=\"javascript:void(0)\" class='tupian' ></a></div>";
            $('#' + returnid).find(".noimg:first").html(str);
            $('#' + returnid).find(".noimg:first").removeClass("noimg");
        });
    }

    /*图片移动*/
    $(".jsaddimgul").on("click", "li span", function () {
        var $ul1 = $(this).parent().parent();
        if ($(this).hasClass("sl")) {
            var $ul2 = $(this).parent().parent().prev("li");
        }
        else {
            var $ul2 = $(this).parent().parent().next("li");
        }
        var ulhtml1 = $ul1.html();
        var ulhtml2 = $ul2.html();
        $ul1.html(ulhtml2);
        $ul2.html(ulhtml1);
        if ($ul2.hasClass("noimg")) {
            $ul2.removeClass("noimg");
            $ul1.addClass("noimg");
        }
    })
    $(".jsaddimgul").on("click", "li a", function () {
        var $li = $(this).parent().parent();
        $li.addClass("noimg");
        $li.empty();
    })
    <?php
    $authkey_video = upload_key("$maxVideoNum,$alowexts,1,$thumb_ext,$watermark_setting");
    $allowexts_audio = "mp3|wav";
    $authkey_audio = upload_key("$maxAudioNum,$allowexts_audio,1,$thumb_ext,$watermark_setting");
    ?>
    function upvideo(id) {
        videoupload(id + '_upload', '视频上传', id, submit_video, '{$maxVideoNum},{$alowexts},1,{$thumb_ext},{$watermark_setting}', '{$module}', '{$catid}', '{$authkey_video}');
    }

    function upaudio(id) {
        audioupload(id + '_upload', '音频上传', id, submit_audio, '{$maxAudioNum},{$allowexts_audio},1,{$thumb_ext},{$watermark_setting}', '{$module}', '{$catid}', '{$authkey_audio}');
    }

    function submit_video(uploadid, returnid) {
        var d = uploadid.iframe.contentWindow;
        var video_id = d.$("#video-id").html();
        var video_title = d.$("#video-title").html();
        // console.log(video_id);
        video_html = '<li><input type="text" class="input" name="' + returnid + '[]" size="20" value="' + video_id + '" hidden /></li>';
        video_html += '<li><input type="text" class="input input-video" name="' + returnid + '_title[]" size="20" value="' + video_title + '" readonly="readonly" /><span>审核中...</span></li>';
        //只能上传一个视频,如果需要改变上传限制,所有视频的show页面都必须进行修改
        $('#' + returnid).html(video_html);

    }

    function submit_audio(uploadid, returnid) {
        var d = uploadid.iframe.contentWindow;
        var audio_id = d.$("#audio-id").html();
        var audio_title = d.$("#audio-title").html();
        audio_html = '<li><input type="text" class="input" name="' + returnid + '[]" size="20" value="' + audio_id + '" hidden /></li>';
        audio_html += '<li><input type="text" class="input input-video" name="' + returnid + '_title[]" size="20" value="' + audio_title + '" readonly="readonly" /><span>审核中...</span></li>';
        //只能上传一个音频,如果需要改变上传限制,所有音频的show页面都必须进行修改
        $('#' + returnid).html(audio_html);
    }


</script>
<script src="{$config_siteurl}statics/js/common.js?v"></script>
<script src="{$config_siteurl}statics/js/uploadfile.js?v"></script>
</html>