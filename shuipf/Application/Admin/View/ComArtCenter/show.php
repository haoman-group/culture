<?php if (!defined('SHUIPF_VERSION')) exit(); ?>
<Admintemplate file="Common/Head"/>
<body>
<div class="wrap" >
    <if condition="$_GET['showtype'] neq '' || $_GET['type'] neq ''">
        <Admintemplate file="Common/actionNav"/>
        <else/>
        <Admintemplate file="Common/Nav"/>
    </if>
    <div style="padding:30px;">
    <div class="tab pignose-tab-wrapper pignose-tab-wrapper-root" style="height: 482px;min-height: 470px;">
        <ul class="pignose-tab-group">
            <li class="pignose-tab-list">
                <a href="###" class="pignose-tab-btn">文化馆基本概况</a>
                <div class="pignose-tab-container">
                    <form action="" method="post">
                        <dl class="logdata">
                            <dt>所属地区</dt><dd><input type="text" name="area_display" value="{$data.area_display}" disabled="disabled"/></dd>
                            <input type="hidden" name="area" class="area" value="{$data.area}">
                            <dt>名称</dt><dd><input type="text" name="cac_name" value="{$data.cac_name}" disabled="disabled"/></dd>
                            <dt>地址</dt><dd><input type="text" name="cac_addr" value="{$data.cac_addr}" disabled="disabled"/></dd>
                            <dt>法人代表</dt><dd><input type="text" name="cac_legalpre" value="{$data.cac_legalpre}" disabled="disabled"/></dd>
                            <dt>联系电话</dt><dd><input type="text" name="cac_tel" value="{$data.cac_tel}" disabled="disabled"/></dd>
                            <dt>馆社建筑面积</dt><dd><input type="text" name="cac_area" value="{$data.cac_area}" disabled="disabled" /></dd>
                            <dt>室外活动场地使用面积</dt><dd><input type="text" name="cac_outdoorarea" value="{$data.cac_outdoorarea}" disabled="disabled" /></dd>
                            <dt>群众文化活动房使用面积</dt><dd><input type="text" name="cac_pocularea" value="{$data.cac_pocularea}" disabled="disabled"/></dd>
                            <dt>宣传橱窗、栏长度</dt><dd><input type="text" name="cac_propagatelen" value="{$data.cac_propagatelen}" disabled="disabled"/></dd>
                            <dt>电子阅览室面积</dt><dd><input type="text" name="  cac_elearea" value="{$data. cac_elearea}" disabled="disabled"/></dd>
                            <dt>电子阅览室坐席数</dt><dd><input type="text" name="cac_elesitnum" value="{$data.cac_elesitnum}" disabled="disabled" /></dd>
                            <dt>服务区是否提供无线网络覆盖</dt><dd><input type="radio" name="cac_iswireless" disabled="disabled" value=1 <eq name="data.cac_iswireless" value="1">checked</eq> /><label for="yes">是</label> <input type="radio" name="cac_iswireless"  value=2 <eq name="data.cac_iswireless" value="2">checked</eq> /><label for="no">否</label></dd>
                            <dt>宽带接入</dt><dd><input type="text" name="cac_bandwidth" value="{$data.cac_bandwidth}" disabled="disabled"/><span>（Mbps）</span></dd>
                            <dt>存储容量</dt><dd><input type="text" name="storage" value="{$data.storage}"disabled="disabled"><span>（TB）</span></dd>
                            <dt>级别</dt><dd><select name="level" disabled="disabled" ><option value="国家级" <if condition="$data.level eq '国家级'"> selected</if> >国家级</option>
                                 <option value="省级"<if condition="$data.level eq '省级'"> selected</if>>省级</option>
                                 <option value="市级"<if condition="$data.level eq '市级'"> selected</if>>市级</option>
                                 <option value="县级"<if condition="$data.level eq '县级'"> selected</if>>县级</option>
                        </select></dd>
                        </dl>
                        <div class="btn_wrap_pd">             
                            <!--<input type="submit"  class="btn btn_submit mr10 J_ajax_submit_btn" value="提交">-->
                        </div>
                        <input type="hidden" name="id_cac" value="{$data.id_cac}"> 
                        <input type="hidden" name="master" value="yes">
                        <input type="hidden" name="idx" value="1">
                    </form>
                </div>
            </li>
             <li class="pignose-tab-list">
                <a href="###" class="pignose-tab-btn">经费投入情况</a>
                <div class="pignose-tab-container table_list">
                    <div class="btn-box">
                        <!--<input type="submit" value="添加" class='btn btn_submit btn_add' data-type="addFund" data-idcac="{$data.id_cac}" />-->
                    </div>
                    <div class="table-box">
                        <table>
                            <thead>
                                <tr>
                                    <th>序号</th>
                                    <th>政府拨款总额（万元）</th>
                                    <th>财政拨款是否列入预算（万元）</th>
                                    <th>免费开放经费补助金额（万元）</th>
                                    <th>专项业务活动经费</th>
                                    <!--<th>操作</th>-->
                                </tr>
                            </thead>
                            <tbody>
                            <volist name="data['CacFund']" id="vo">
                                <tr>
                                    <td>{$vo.id_cac_fund}</td>
                                    <td>{$vo.fund_totle}</td>
                                    <td>{$vo.isbudget}</td>
                                    <td>{$vo.fund_free}</td>
                                    <td>{$vo.fund_major}</td>
                                    <!--<td><a href="###" class="btn_sub_edit" data-type="Fund" data-id="{$vo.id_cac_fund}"  data-idcac="{$data.id_cac}">[修改]</a>&nbsp;|&nbsp;
                                        <a href="{:U('Admin/ComArtCenter/subDel', array('id'=>$vo['id_cac_fund'],'type'=>'Fund'))}">[删除]</a>
                                    </td>-->
                                </tr>
                            </volist>
                            </tbody>
                             
                        </table>
                    </div>                    
                </div>
            </li>
           <!--  <li class="pignose-tab-list">
                <a href="###" class="pignose-tab-btn">图书报刊资源配置情况</a>
                <div class="pignose-tab-container">
                    <form action="{:U('Admin/Library/add')}" method="post"  name="myform" class="J_ajaxForm">
                        <label for="">总藏量</label><input type="text" name="num_totle" value="{$data.num_totle}"> <label for="">（万册、件）</label>
                        <label for="">电子文献藏量</label><input type="text" name="num_e_doc" value="{$data.num_e_doc}"> <label for="">（种）</label>
                        <label for="">电子图书藏量</label><input type="text" name="num_e_book" value="{$data.num_e_book}"> <label for="">（种）</label>
                        <label for="">电子期刊藏量</label><input type="text" name="num_e_periodical" value="{$data.num_e_periodical}"> <label for="">（种）</label>
                        <label for="">图书年入藏量</label><input type="text" name="num_collect_book" value="{$data.num_collect_book}"> <label for="">（万种）</label>
                        <label for="">报刊年入藏量</label><input type="text" name="num_collect_periodical" value="{$data.num_collect_periodical}"> <label for="">（种）</label>
                        <label for="">试听文献年入藏量</label><input type="text" name="num_collect_audio" value="{$data.num_collect_audio}"> <label for="">（种）</label>
                        <label for="">数字资源总量</label><input type="text" name="num_digit_totle" value="{$data.num_digit_totle}"> <label for="">（TB）</label>
                        <label for="">自建数字资源总量</label><input type="text" name="num_digit_self" value="{$data.num_digit_self}"> <label for="">（TB）</label>
                        <div class="">
                            <div class="btn_wrap_pd">             
                                <button class="btn btn_submit mr10 J_ajax_submit_btn" type="submit">提交</button>
                            </div>
                        </div>
                        <input type="hidden" name="id_lib" value="{$data.id_lib}"> 
                    </form>
                </div>
            </li> -->
           
            <li class="pignose-tab-list">
                <a href="###" class="pignose-tab-btn">文化馆人才队伍建设情况</a>
                <div class="pignose-tab-container table_list">
                    <div class="btn-box">
                        <!--<input type="submit" value="添加" class='btn btn_submit btn_add' data-type="addTalent" data-idcac="{$data.id_cac}" />-->
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
                                    <!--<th>操作</th>-->
                                </tr>
                            </thead>
                            <tbody>
                                
                            <volist name="data['CacTalent']" id="vo">
                                <tr>
                                    <td>{$vo.id_cac_tal}</td>
                                    <td>{$vo.tal_name}</td>
                                    <td><!-- {$vo.tal_sex} --><if condition="$vo.tal_sex eq 1"> 男<else/> 女</if></td>
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
                                    <!--<td><a href="###" class="btn_sub_edit" data-type="Talent" data-id="{$vo.id_cac_tal}"  data-idcac="{$data.id_cac}">[修改]</a>&nbsp;|&nbsp;
                                        <a href="{:U('Admin/ComArtCenter/subDel', array('id'=>$vo['id_cac_tal'],'type'=>'Talent'))}">[删除]</a>
                                    </td>-->
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
                    <form action="{:U('Admin/ComArtCenter/add')}" method="post"  name="myform" class="J_ajaxForm">
                        <dl class="logdata">
                            <dt>每周对外开放时间</dt><dd><input type="text" name="sev_opentime" value="{$data.sev_opentime}" disabled="disabled"/><span>（小时）</span></dd>
                            <dt>是否错时开放</dt><dd><input type="radio" name="sev_crosstime"  value=1  disabled="disabled" <eq name="data.sev_crosstime" value="1">checked</eq> /><label for="yes">是</label> <input type="radio" name="sev_crosstime"  value=2 <eq name="data.sev_crosstime" value="2">checked</eq> /><label for="no">否</label></dd>
                            <dt>不定期特色文化服务项目</dt><dd><input type="text" name="sev_noregcul" value="{$data.sev_noregcul}"disabled="disabled" /><span>（项）</span></dd>
                            <dt>常设免费服务项目</dt><dd><input type="text" name="sev_lastingfree" value="{$data.sev_lastingfree}" disabled="disabled"/><span>（项）</span></dd>
                            <dt>年外出服务人次</dt><dd><input type="text" name="sev_yearoutnum" value="{$data.sev_yearoutnum}" disabled="disabled"/></dd>
                            <dt>人均年到馆次数</dt><dd><input type="text" name="sev_yearavenum" value="{$data.sev_yearavenum}" disabled="disabled"/></dd>
                            <dt>无障碍设施</dt><dd><input type="text" name="sev_accessibility" value="{$data.sev_accessibility}" disabled="disabled"/></dd>
                        </dl>
                        <div class="btn_wrap_pd">             
                            <!--<input type="submit"  class="btn btn_submit mr10 J_ajax_submit_btn" value="提交">-->
                        </div>
                        <input type="hidden" name="id" value="{$data.id}"> 
                        <input type="hidden" name="area" class="area" value="{$data.area}">
                    </form>
                </div>
            </li>

             <li class="pignose-tab-list">
                <a href="###" class="pignose-tab-btn">服务活动</a>
                <div class="pignose-tab-container table_list">
                    <div class="btn-box">
                        <!--<input type="submit" value="添加" class='btn btn_submit btn_add' data-type="addAct" data-idcac="{$data.id_cac}" />-->
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
                                    <th>收益人数</th>                                
                                    <!--<th>操作</th>-->
                                </tr>
                            </thead>
                            <tbody>                                
                            <volist name="data['CacAct']" id="vo">
                                <tr>
                                    <td>{$vo.id_cac_act}</td>
                                    <td>{$vo.act_object}</td>
                                    <td>{$vo.act_name}</td>
                                    <td>{$vo.act_content}</td>
                                    <td>{$vo.act_time}</td>
                                    <td>{$vo.act_addr}</td>
                                    <td>{$vo.act_pernum}</td>
                                    <!--<td><a href="###" class="btn_sub_edit" data-type="Act" data-id="{$vo.id_cac_act}"  data-idcac="{$data.id_cac}">[修改]</a>&nbsp;|&nbsp;
                                        <a href="{:U('Admin/ComArtCenter/subDel', array('id'=>$vo['id_cac_act'],'type'=>'Act'))}">[删除]</a>
                                    </td>-->
                                </tr>
                            </volist>
                            </tbody>
                        </table>
                    </div>                    
                </div>
            </li>
           <!--  <li class="pignose-tab-list"><a href="###" class="pignose-tab-btn">服务活动</a><div class="pignose-tab-container"></div></li> -->
            <li class="pignose-tab-list">
                <a href="###" class="pignose-tab-btn">数字化建设</a>
                <div class="pignose-tab-container">
                    <form action="{:U('Admin/ComArtCenter/add')}" method="post"  name="myform" class="J_ajaxForm">
                        <dl class="logdata">
                            <dt>官方网站</dt><dd><input type="text" name="dig_website" value="{$data.dig_website}" disabled="disabled"/><span></span></dd>
                            <dt>微信公众号</dt><dd><input type="text" name="dig_wechat" value="{$data.dig_wechat}" disabled="disabled"/></dd>
                            <dt>网上服务项目</dt><dd><input type="text" name="dig_webserver" value="{$data.dig_webserver}" disabled="disabled" /><span>（项）</span></dd>
                            <dt>年网站访问量</dt><dd><input type="text" name="dig_PV" value="{$data.dig_PV}" disabled="disabled"/><span>（万次/年）</span></dd>
                            <dt>特色文化数字资源</dt><dd><input type="text" name="dig_resources" value="{$data.dig_resources}" disabled="disabled" /></dd>
                            <dt>公共电子阅览室终端数量</dt><dd><input type="text" name="dig_terminalnum" value="{$data.dig_terminalnum}" disabled="disabled" /><span>（项）</span></dd>
                        </dl>
                        <div class="btn_wrap_pd">             
                            <!--<input type="submit"  class="btn btn_submit mr10 J_ajax_submit_btn" value="提交">-->
                        </div>
                        <input type="hidden" name="id_cac" value="{$data.id_cac}"> 
                        <input type="hidden" name="area" class="area" value="{$data.area}">
                    </form>
                </div>
            </li> 
            <li class="pignose-tab-list">
                <a href="###" class="pignose-tab-btn">馆办活动</a>
                <div class="pignose-tab-container table_list">
                    <div class="btn-box">
                        <!--<input type="submit" value="添加" class='btn btn_submit btn_add' data-type="addOfficeact" data-idcac="{$data.id_cac}" />-->
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
                                    <!--<th>操作</th>-->
                                </tr>
                            </thead>
                            <tbody>                                
                            <volist name="data['CacOfficeact']" id="vo">
                                <tr>
                                    <td>{$vo.id_cac_officeact}</td>
                                    <td>{$vo.officeact_catalog}</td>
                                    <td>{$vo.officeact_name}</td>
                                    <td>{$vo.officeact_joinnum}</td>
                                    <td>{$vo.officeact_time}</td>
                                    <td>{$vo.officeact_addr}</td>
                                    <td>{$vo.officeact_content}</td>
                                    <!--<td><a href="###" class="btn_sub_edit" data-type="Officeact" data-id="{$vo.id_cac_officeact}"  data-idcac="{$data.id_cac}">[修改]</a>&nbsp;|&nbsp;
                                        <a href="{:U('Admin/ComArtCenter/subDel', array('id'=>$vo['id_cac_officeact'],'type'=>'Officeact'))}">[删除]</a>
                                    </td>-->
                                </tr>
                            </volist>
                            </tbody>
                        </table>
                    </div>                    
                </div>
            </li>
           <li class="pignose-tab-list">
                <a href="###" class="pignose-tab-btn">志援者队伍建设</a>
                <div class="pignose-tab-container table_list">
                    <div class="btn-box">
                        <!--<input type="submit" value="添加" class='btn btn_submit btn_add' data-type="addVolunteer" data-idcac="{$data.id_cac}" />-->
                    </div>
                    <div class="table-box">
                        <table>
                            <thead>
                                <tr>
                                    <th>序号</th>
                                    <th>姓名</th>
                                    <th>性别</th>
                                    <th>名族</th>
                                    <th>出生日期</th>
                                    <th>政治面貌</th>
                                    <th>毕业学校</th>
                                     <th>工作单位</th>
                                    <th>教育程度</th>
                                    <th>专长</th>
                                    <!--<th>操作</th>-->
                                </tr>
                            </thead>
                            <tbody>                                
                            <volist name="data['CacVolunteer']" id="vo">
                                <tr>
                                    <td>{$vo.id_cac_vol}</td>
                                    <td>{$vo.vol_name}</td>
                                    <td><if condition="$vo.vol_sex eq 1"> 男<else/> 女</if></td>
                                    <td>{$vo.vol_nation}</td>
                                    <td>{$vo.vol_birthday}</td>
                                    <td>{$vo.vol_polstatus}</td>
                                    <td>{$vo.vol_schooltag}</td>
                                    <td>{$vo.vol_workunit}</td>
                                    <td>{$vo.vol_level}</td>
                                    <td>{$vo.vol_expertise}</td>
                                    <!--<td><a href="###" class="btn_sub_edit" data-type="Volunteer" data-id="{$vo.id_cac_vol}"  data-idcac="{$data.id_cac}">[修改]</a>&nbsp;|&nbsp;
                                        <a href="{:U('Admin/ComArtCenter/subDel', array('id'=>$vo['id_cac_vol'],'type'=>'Volunteer'))}">[删除]</a>
                                    </td>-->
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
                        <!--<input type="submit" value="添加" class='btn btn_submit btn_add' data-type="addVolact" data-idcac="{$data.id_cac}" />-->
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
                                    <th>参加活动人数</th>
                                    <th>活动受益人数</th>                        
                                    <!--<th>操作</th>-->
                                </tr>
                            </thead>
                            <tbody>                                
                            <volist name="data['CacVolact']" id="vo">
                                <tr>
                                    <td>{$vo.id_cac_volact}</td>
                                    <td>{$vo.volact_title}</td>
                                    <td>{$vo.volact_joinname}</td>
                                    <td>{$vo.volact_time}</td>
                                    <td>{$vo.volact_addr}</td>
                                    <td>{$vo.volact_joinnum}</td>
                                    <td>{$vo.volact_profitnum}</td>                                   
                                    <!--<td><a href="###" class="btn_sub_edit" data-type="Volact" data-id="{$vo.id_cac_volact}"  data-idcac="{$data.id_cac}">[修改]</a>&nbsp;|&nbsp;
                                        <a href="{:U('Admin/ComArtCenter/subDel', array('id'=>$vo['id_cac_volact'],'type'=>'Volact'))}">[删除]</a>
                                    </td>-->
                                </tr>
                            </volist>
                            </tbody>
                        </table>
                    </div>                    
                </div>
            </li>            
             <li class="pignose-tab-list">
                <a href="###" class="pignose-tab-btn">基本文化培训基地</a>
                <div class="pignose-tab-container table_list">
                    <div class="btn-box">
                        <!--<input type="submit" value="添加" class='btn btn_submit btn_add' data-type="addTrainbase" data-idcac="{$data.id_cac}" />-->
                    </div>
                    <div class="table-box">
                        <table>
                            <thead>
                                <tr>
                                    <th>序号</th>
                                    <th>地点</th>
                                    <th>几点面积</th>
                                    <th>可容纳培训人数</th>
                                    <th>年举办培训次数</th>                       
                                    <!--<th>操作</th>-->
                                </tr>
                            </thead>
                            <tbody>                                
                            <volist name="data['CacTrainbase']" id="vo">
                                <tr>
                                    <td>{$vo.id_cac_tb}</td>
                                    <td>{$vo.tb_addr}</td>
                                    <td>{$vo.tb_area}</td>
                                    <td>{$vo.tb_includenum}</td>
                                    <td>{$vo.tb_yearnum}</td>                                   
                                    <!--<td><a href="###" class="btn_sub_edit" data-type="Trainbase" data-id="{$vo.id_cac_tb}"  data-idcac="{$data.id_cac}">[修改]</a>&nbsp;|&nbsp;
                                        <a href="{:U('Admin/ComArtCenter/subDel', array('id'=>$vo['id_cac_tb'],'type'=>'Trainbase'))}">[删除]</a>
                                    </td>-->
                                </tr>
                            </volist>
                            </tbody>
                        </table>
                    </div>                    
                </div>
            </li>
            <li class="pignose-tab-list">
                <a href="###" class="pignose-tab-btn">辅导培训活动</a>
                <div class="pignose-tab-container table_list">
                    <div class="btn-box">
                        <!--<input type="submit" value="添加" class='btn btn_submit btn_add' data-type="addTrainact" data-idcac="{$data.id_cac}" />-->
                    </div>
                    <div class="table-box">
                        <table>
                            <thead>
                                <tr>
                                    <th>序号</th>
                                    <th>目录</th>
                                    <th>培训名称</th>
                                    <th>主要内容</th>
                                    <th>培训时间</th>
                                    <th>活动地点</th>
                                    <th>收益人数</th>
                                    <th>活动开展频率</th>                        
                                    <!--<th>操作</th>-->
                                </tr>
                            </thead>
                            <tbody>                                
                            <volist name="data['CacTrainact']" id="vo">
                                <tr>
                                    <td>{$vo.id_cac_ta}</td>
                                    <td>{$vo.ta_traintype}</td>
                                    <td>{$vo.ta_name}</td>
                                    <td>{$vo.ta_content}</td>
                                    <td>{$vo.ta_time}</td>
                                    <td>{$vo.ta_addr}</td>
                                    <td>{$vo.ta_profitnum}</td>
                                    <td>{$vo.ta_frequency}</td>                                   
                                    <!--<td><a href="###" class="btn_sub_edit" data-type="Trainact" data-id="{$vo.id_cac_ta}"  data-idcac="{$data.id_cac}">[修改]</a>&nbsp;|&nbsp;
                                        <a href="{:U('Admin/ComArtCenter/subDel', array('id'=>$vo['id_cac_ta'],'type'=>'Trainact'))}">[删除]</a>
                                    </td>-->
                                </tr>
                            </volist>
                            </tbody>
                        </table>
                    </div>                    
                </div>
            </li>
            <li class="pignose-tab-list">
                <a href="###" class="pignose-tab-btn">群众文艺辅导资料</a>
                <div class="pignose-tab-container table_list">
                    <div class="btn-box">
                        <!--<input type="submit" value="添加" class='btn btn_submit btn_add' data-type="addComculter" data-idcac="{$data.id_cac}" />-->
                    </div>
                    <div class="table-box">
                        <table>
                            <thead>
                                <tr>
                                    <th>序号</th>
                                    <th>刊物名称</th>
                                    <th>发行量</th>
                                    <th>发行范围</th>                       
                                    <!--<th>操作</th>-->
                                </tr>
                            </thead>
                            <tbody>                                
                            <volist name="data['CacComculter']" id="vo">
                                <tr>
                                    <td>{$vo.id_cac_cc}</td>
                                    <td>{$vo.cc_name}</td>
                                    <td>{$vo.cc_publishnum}</td>
                                    <td>{$vo.cc_publishrang}</td>                                   
                                    <!--<td><a href="###" class="btn_sub_edit" data-type="Comculter" data-id="{$vo.id_cac_cc}"  data-idcac="{$data.id_cac}">[修改]</a>&nbsp;|&nbsp;
                                        <a href="{:U('Admin/ComArtCenter/subDel', array('id'=>$vo['id_cac_cc'],'type'=>'Comculter'))}">[删除]</a>
                                    </td>-->
                                </tr>
                            </volist>
                            </tbody>
                        </table>
                    </div> 

                </div>
            </li>
            <li class="pignose-tab-list">
                <a href="###" class="pignose-tab-btn">馆站位置</a>
                <div class="pignose-tab-container">
                    <form action="{:U('Admin/Library/add')}" method="post"  name="myform" class="J_ajaxForm">
                        <div class="text-center" id="baiduMap" style="width:1199px;height:450px;padding: 20px 0px;margin-bottom: 20px;"> </div>
                        <dl class="logdata">      
                            
                            <dt>经度坐标位置：</dt><dd><input type="text" name="point_lng" id="point_lng" value="{$data.point_lng}" class="number-check" disabled="disabled" /><span></span></dd> 
                            <dt>纬度坐标位置：</dt><dd><input type="text" name="point_lat" id="point_lat" value="{$data.point_lat}" class="number-check" disabled="disabled"/><span></span></dd>
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
                            <dd style="margin: 20px 0;"><textarea name="abstract" class="input_txt">{$data.abstract}</textarea></dd> 
                            <dt></dt>
                            <dd><script type="text/plain" id="publish_content" name="publish_content">{$data.publish_content}</script>
                                <?php echo Form::editor('publish_content','full','Cudatabase'); ?></dd>
        
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
    <form method="post" class="tq-check-form" >
        <input type="hidden" name="g" value="admin">
        <input type="hidden" name="m" value="audit">
        <input type="hidden" name="a" value="add">   
        <h5 style="margin-top:100px;">审核状态</h5>
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
        
        <input type="submit" class="btn btn_submit mr10 J_ajax_submit_btn" value="提交" />
        
    </form>
    
</if>
</div>
 <Admintemplate file="Common/Audittable"/>
</body>
<link rel="stylesheet" href="{$config_siteurl}statics/cu/pignose/css/pignose.tab.min.css"/>
<link rel="stylesheet" href="{$config_siteurl}statics/cu/pignose/css/pignose.cu.css"/>
<script src="{$config_siteurl}statics/cu/js/Comm/Audit.js"></script>
<script type="text/javascript" src="{$config_siteurl}statics/cu/pignose/js/pignose.tab.js"></script>
<script type="text/javascript" src="{$config_siteurl}statics/cu/layer/layer.js"></script>
<script type="text/javascript" src="http://api.map.baidu.com/api?v=2.0&ak=YUYIzLKGEcKdyyat23Aw4H9LByDx4voy"></script>  
<!--百度地图API  地区边界用-->
<script type="text/javascript" src="http://api.map.baidu.com/library/AreaRestriction/1.2/src/AreaRestriction_min.js"></script>
<script>
$(function() {
        //百度地图
        var map = new BMap.Map("baiduMap"); // 创建Map实例
        //根据IP 显示当前城市
        function displayLocalCity(result){
            var cityName = result.name;
            if(cityName == 'undefined' || cityName=='null' || cityName ==''){
                cityName= '太原';  //默认为太原
            }
            map.setCenter(cityName);
            map.centerAndZoom(cityName, 12);
        }
        var myCity = new BMap.LocalCity();
        myCity.get(displayLocalCity);
        //设置显示范围 为山西省内  坐标移出省外自动跳回  
        var b = new BMap.Bounds(new BMap.Point(109.884727,34.424947),new BMap.Point(115.210744,41.144106)); //创建一个包含所有给定点坐标的矩形区域,原型Bounds(minX:Number, minY:Number, maxX:Number, maxY:Number)
        try {   
            BMapLib.AreaRestriction.setBounds(map, b);
        } catch (e) {
            alert(e);
        }
        var point_lng = {$data.point_lng|default=0};
        var point_lat = {$data.point_lat|default=0};
        if(point_lng != 0 && point_lat != 0){
            var point = new BMap.Point(point_lng,point_lat); //创建一个地理坐标点。
            //创建地图上一个图像标注。
            var marker = new BMap.Marker(point);
            //给图像标注添加点击事件 
            // marker.addEventListener("click",attribute);    
            // 将标注添加到地图中
            map.addOverlay(marker);
        }

        //开启鼠标滚轮
        map.enableScrollWheelZoom(true);
        //map.addEventListener("click", showInfo); //添加地图点击事件
        
        //点击事件回调函数，填充经纬度
        function showInfo(e){
            //清楚所有覆盖物
            map.clearOverlays();
            //生成当前坐标
            var marker = new BMap.Marker(new BMap.Point(e.point.lng,e.point.lat));    
            // 将标注添加到地图中
            map.addOverlay(marker);
            //填充form表单
            $("#point_lng").val(e.point.lng);
            $("#point_lat").val(e.point.lat);
        }
    });
// pignose 初始化
$(function() {
    // console.log(document.cookie);
  $('.tab').pignoseTab({
    animation: true,
    children: '.tab',
    active:true,
    cookieName:'ComArtCenterIdx'
  });
});
//layer iframe 层
$('input.btn_add').on('click',function(){
    var type = $(this).data('type');
    var idcac = $(this).data('idcac');
    if(idcac =='' || idcac =='null' || idcac =='undefined'){
        layer.msg('请先添加图书馆基本概况！');
        return false;
    }
    layer.open({
        type: 2,
        title: '添加',
        shadeClose: true,
        shade: 0.8,
        area: ['80%', '80%'],
        content: '/Admin/ComArtCenter/subAdd?type='+type+'&idcac='+idcac
    });
});

$('a.btn_sub_edit').on('click',function(){
    var type = $(this).data('type');
    var id = $(this).data('id');
   
    var idcac = $(this).data('idcac');
    layer.open({
        type: 2,
        title: '修改',
        shadeClose: true,
        shade: 0.8,
        area: ['80%', '80%'],
        content: '/Admin/ComArtCenter/subEdit?type='+type+'&id='+id+'&idcac='+idcac
    });
});

// 审核状态显示
$(".audit").on("change",function(){
    var getSelectVal = $(".select-box option:selected").text();
    $(".select-box .select-span").text(getSelectVal);
    var audit = $(this).val();
    if(audit == 40){
        $(".reason").show();
    }else{
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
   
   


</script>
<script src="{$config_siteurl}statics/js/common.js?v"></script>
<script src="{$config_siteurl}statics/js/uploadfile.js?v"></script>
</html>