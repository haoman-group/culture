<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <template file="Cudatabase/Common/_cssjs" />
</head>
<style>
    .policy-show {
        width: 80%;
        margin: 30px auto;
        text-align: center;
    }
    
    .policy-show h5 {
        font-size: 40px;
        line-height: 50px;
    }
    
    .policy-show span {
        padding: 0 10px;
    }
    
    .policy-show .txt {
        text-align: left;
        text-indent: 2em;
        font-size: 16px;
        line-height: 30px;
    }
    
    table {
        border: 1px solid #E1E1E1;
    }
    
    thead th {
        background-color: #B8DFFF !important;
    }
    
    thead th {
        border: none !important;
        font-size: 16px;
    }
    
    thead th,
    tbody tr td {
        text-align: center;
    }
    
    tr td a {
        color: #268BE0;
    }
    
    tfoot tr td {
        padding: 0px !important;
        background-color: #F6F6F6;
    }
    
    tr:nth-child(odd) {
        background-color: #F6F6F6;
    }
    
    tr:nth-child(even) {
        background-color: #F0F0F0;
    }
    
    .tb-db thead th:last-child {
        width: 40%;
    }
    
    .tb-tj tbody tr td span {
        color: red;
    }
    
    .sjkTb tbody tr td img {
        width: 18px;
    }
    
    .sjkTb thead th {
        background-color: #438FB1 !important;
        color: white;
    }
    
    .sjkTb tr:nth-child(odd) {
        background-color: #D1D1D1;
    }
    
    .sjkTb tr:nth-child(even) {
        background-color: #F2F2F2;
    }
</style>

<body>
    <template file="Cudatabase/Common/_head" />
    <div class="all">
      
      <if condition="$_GET['type'] eq  '1'"><div class="ht1"> <a href="{:U('Cudatabase/Index/menu',array('cid'=>43,'rootcid'=>2))}">公共文化</a> - <a href="{:U('lists',array('type'=>0))}">图书馆(国家级)</a></div></if>
      <if condition="$_GET['type'] eq  '2' "><div class="ht1"> <a href="{:U('Cudatabase/Index/menu',array('cid'=>43,'rootcid'=>2))}">公共文化</a> - <a href="{:U('lists',array('type'=>0))}">图书馆(省级)</a></div></if>
      <if condition="$_GET['type'] eq  '3' "><div class="ht1"> <a href="{:U('Cudatabase/Index/menu',array('cid'=>43,'rootcid'=>2))}">公共文化</a> - <a href="{:U('lists',array('type'=>0))}">图书馆(市级)</a></div></if>
       <if condition="$_GET['type'] eq  '4' "><div class="ht1"> <a href="{:U('Cudatabase/Index/menu',array('cid'=>43,'rootcid'=>2))}">公共文化</a> - <a href="{:U('lists',array('type'=>0))}">图书馆(县级)</a></div></if>
        <div class="search-content" style="background: none;position: relative;">

            <div class="container-fluid">
                <div class="row">

                    <div class="col-md-12">
                        <div class="center-block" style="margin: auto;width: 100%;padding-top: 10px;padding-bottom: 10px;">
                            <h3 class="text-center">山西省图书馆概况</h3>
                            <table class="table table-striped table-responsive table-bordered">
                                <caption>
                                    基本情况</caption>
                                <thead>
                                    <tr>
                                        <th width="50px">
                                            序号</th>
                                        <th width="100px">
                                            名称</th>
                                        <th width="100px">
                                            地址</th>
                                        <th width="100px">
                                            法人代表</th>
                                        <th width="100px">
                                            联系电话</th>
                                        <th width="120px">
                                            馆舍建筑面积</th>
                                        <th width="100px">
                                            占地面积</th>
                                        <th width="100px">
                                            书库面积</th>
                                        <th width="100px">
                                            阅览室面积</th>
                                        <th width="100px">
                                            阅览坐席数</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>{$data.id}</td>
                                        <td>{$data.name}</td>
                                        <td>{$data.addr}</td>
                                        <td>{$data.legal_person}</td>
                                        <td>{$data.telephone}</td>
                                        <td>{$data.covered_area}</td>
                                        <td>{$data.floor_area}</td>
                                        <td>{$data.book_area}</td>
                                        <td>{$data.readroom_area}</td>
                                        <td>{$data.readroom_seat_num}</td>
                                    </tr>
                                    <tr>
                                        <td colspan="10" style="text-align: left;">备注：1.计算机信息节点是指在本馆区域内能与局域网或互联网连接的计算机网络接口（包括无线网络接口）；</td>
                                    </tr>
                                    <tr>
                                        <td colspan="10" style="text-align: left;">2.存储容量指专用存储设备容量，不含普通服务器、微机硬盘容量</td>
                                    </tr>
                                </tbody>
                            </table>
                            <table class="table table-striped table-responsive table-bordered">
                                <thead>
                                    <tr>
                                        <th width="100px">
                                            少儿阅览座席数</th>
                                        <th width="100px">
                                            报告厅面积</th>
                                        <th width="100px">
                                            报告厅座席数</th>
                                        <th width="100px">
                                            电子阅览室面积</th>
                                        <th width="100px">
                                            电子阅览室座席数</th>
                                        <th width="100px">
                                            计算机总数</th>
                                        <th width="100px">
                                            供读者使用的计算机数量</th>
                                        <th width="100px">
                                            读者服务区是否提供无线网络覆盖（是/否）</th>
                                        <th width="100px">
                                            计算机信息节点</th>
                                        <th width="100px">
                                            宽带接入(Mbps)</th>
                                        <th width="100px">
                                            存储容量(TB)</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>{$data.chilreadroom_seat_num}</td>
                                        <td>{$data.reportroom_area}</td>
                                        <td>{$data.reportroom_seat_num}</td>
                                        <td>{$data.ereadroom_area}</td>
                                        <td>{$data.ereadroom_seat_num}</td>
                                        <td>{$data.computer_num}</td>
                                        <td>{$data.reader_user_num}</td>
                                        <td><if condition="$data['have_wifi'] eq 1">是<else/>否</if></td>
                                        <td>{$data.computer_info_node}</td>
                                        <td>{$data.bandwidth}</td>
                                        <td>{$data.storage}</td>
                                    </tr>
                                </tbody>
                            </table>
                            <table class="table table-striped table-responsive table-bordered">
                                <caption>
                                    图书报刊资源配置情况</caption>
                                <thead>
                                    <tr>
                                        <th width="50px">
                                            序号</th>
                                        <th width="100px">
                                            总藏量（万册、件）</th>
                                        <th width="100px">
                                            电子文献藏量（种）</th>
                                        <th width="100px">
                                            电子图书藏量（种）</th>
                                        <th width="100px">
                                            电子期刊藏量（种）</th>
                                        <th width="120px">
                                            图书年入藏量（万种）</th>
                                        <th width="100px">
                                            报刊年入藏量（种）</th>
                                        <th width="100px">
                                            视听文献年入藏量（种）</th>
                                        <th width="100px">
                                            数字资源总量(TB)</th>
                                        <th width="100px">
                                            自建数字资源总量(TB)</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>{$data.id}</td>
                                        <td>{$data.num_totle}</td>
                                        <td>{$data.num_e_doc}</td>
                                        <td>{$data.num_e_book}</td>
                                        <td>{$data.num_e_periodical}</td>
                                        <td>{$data.num_collect_book}</td>
                                        <td>{$data.num_collect_periodical}</td>
                                        <td>{$data.num_collect_audio}</td>
                                        <td>{$data.num_digit_totle}</td>
                                        <td>{$data.num_digit_self}</td>
                                    </tr>
                                    <tr>
                                        <td colspan="10" style="text-align: left;">备注：1.数字资源总量包含有关数字文化工程资源量，含自建和外购并存储在本地的数字资源量； 2.自建数字资源要求提供目录明细</td>
                                    </tr>
                                </tbody>
                            </table>
                            <table class="table table-striped table-responsive table-bordered">
                                <caption>
                                    经费投入情况</caption>
                                <thead >
                                    <tr style="width:990px;">
                                        <th width="50px">
                                            序号</th>
                                        <th style="width:230px">
                                            财政拨款总额（万元）</th>
                                        <th style="width:230px">
                                            新增藏量购置费（万元）</th>
                                        <th style="width:230px">
                                            免费开放本地经费（万元）</th>
                                        <th style="width:450px">
                                            电子资源购置费</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <volist name="data['Lib_Fund']" id="vo">
                                    <tr>
                                        <td>{$vo.id}</td>
                                        <td>{$vo.fund_totle}（列入预算）</td>
                                        <td>{$vo.fund_new}（列入预算）</td>
                                        <td>{$vo.fund_free}</td>
                                        <td>{$vo.fund_ele}</td>
                                    </tr>
                                </volist>
                                    <tr>
                                        <td colspan="5" style="text-align: left;">备注：财政拨款总额与新增藏量购置费要求注明 是否列入预算</td>
                                    </tr>
                                </tbody>
                            </table>
                            <table class="table table-striped table-responsive table-bordered">
                                <caption>
                                    图书馆人才队伍建设情况</caption>
                                <thead>
                                    <tr>
                                        <th width="50px">
                                            序号</th>
                                        <th width="50px">
                                            姓名</th>
                                        <th width="50px">
                                            性别</th>
                                        <th width="50px">
                                            民族</th>
                                        <th width="50px">
                                            出生日期</th>
                                        <th width="50px">
                                            政治面貌</th>
                                        <th width="50px">
                                            入党时间</th>
                                        <th width="50px">
                                            毕业院校</th>
                                        <th width="50px">
                                            毕业时间</th>
                                        <th width="50px">
                                            所学专业</th>
                                        <th width="50px">
                                            学历</th>
                                        <th width="50px">
                                            学位</th>
                                        <th width="50px">
                                            职称</th>
                                        <th width="50px">
                                            岗位培训学时</th>
                                        <th width="50px">
                                            获奖情况</th>
                                        <th width="50px">
                                            是否业务人员</th>
                                        <th width="50px">
                                            人员身份</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <volist name="data['Lib_Talent']" id="vo" >
                                    <tr>
                                        <td>{$vo.id}</td>
                                        <td>{$vo.tal_name}</td>
                                        <td><if condition="$vo['tal_sex'] eq 1">男<else/>女</if></td>
                                        <td>{$vo.tal_nation}</td>
                                        <td>{$vo.tal_birthday}</td>
                                        <td>{$vo.tal_pol_status}</td>
                                        <td>{$vo.tal_join_date}</td>
                                        <td>{$vo.tal_schooltag}</td>
                                        <td>{$vo.tal_graduate_date}</td>
                                        <td>{$vo.tal_major}</td>
                                        <td>{$vo.tal_edu_bg}</td>
                                        <td>{$vo.tal_edu_degree}</td>
                                        <td><if condition="$vo['tal_position'] eq 1">中级<else/>高级</if></td>
                                        <td>{$vo.tal_train_hours}</td>
                                        <td>{$vo.tal_rewards}</td>
                                        <td><if condition="$vo['tal_if_business'] eq 1">是<else/>否</if></td>
                                        <td>{$vo.tal_identity}</td>
                                    </tr>
                                </tbody>
                            </table>
                            <table class="table table-striped table-responsive table-bordered">
                                <caption>
                                    服务工作</caption>
                                <thead>
                                    <tr>
                                        <th width="50px">
                                            序号</th>
                                        <th>
                                            基础服务项目（项）</th>
                                        <th>
                                            每周开馆时间（小时）</th>
                                        <th>
                                            是否错时开放</th>
                                        <th>
                                            书刊文献年外借册次（万册次）</th>
                                        <th>
                                            年总流通人次（千人次）</th>
                                        <th>
                                            流动服务点书刊借阅册次（千册次）</th>
                                        <th>
                                            人均年到馆次数（年流通总人次/持证读者数量）</th>
                                        <th>
                                            无障碍设施</th>
                                        <th>
                                            盲文图书藏量（册）</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>{$data.id}</td>
                                        <td>{$data.ser_name}</td>
                                        <td>{$data.ser_hours}</td>
                                        <td><if condition="$data['ser_interleaved'] eq 1">是<else/>否</if></td>
                                        <td>{$data.ser_borrow_num}</td>
                                        <td>{$data.ser_people_count}</td>
                                        <td>{$data.ser_nodeborrow_num}</td>
                                        <td>{$data.ser_avg_visit}</td>
                                        <td>{$data.ser_accessible}</td>
                                        <td>{$data.ser_braille_num}</td>
                                    </tr>
                                    <tr>
                                        <td colspan="10" style="text-align: left">备注：1.流动服务点含流动图书车、馆外自助借阅机等<br> 2.持证读者指通过各种证件（身份证、市民证、社保卡等）接受过图书馆服务（含到馆服务和非到 馆服务）的读者<br> 3.无障碍设施包括轮椅、通道、音频设备等；如无无障碍设施直接填写“无”
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <table class="table table-striped table-responsive table-bordered">
                                <caption>
                                    服务活动</caption>
                                <thead>
                                    <tr>
                                        <th width="50px">
                                            序号</th>
                                        <th>
                                            目录</th>
                                        <th>
                                            活动名称</th>
                                        <th>
                                            主要内容</th>
                                        <th>
                                            活动时间</th>
                                        <th>
                                            活动地点</th>
                                        <th>
                                            受益人数</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <volist name="data['Lib_Server']" id="vo">
                                    <tr>
                                        <td>{$vo.id}</td>
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
                            <table class="table table-striped table-responsive table-bordered">
                                <caption>
                                    数字化建设</caption>
                                <thead>
                                    <tr >
                                        <th width="30px">
                                            序号</th>
                                        <th th width="40px;">
                                            官方网站</th>
                                        <th width="40px">
                                            APP</th>
                                        <th width="30px">
                                            博客</th>
                                        <th width="30px">
                                            微博</th>
                                        <th width="30px">
                                            空间</th>
                                        <th width="30px">
                                            社区</th>
                                        <th  width="40px">
                                            微信公众号</th>
                                        <th width="80px">
                                            网上服务项目（项）</th>
                                        <th width="60px">
                                            年网站访问量（万次/年）</th>
                                        <th width="60px">
                                            可远程访问的数字资源量（TB）</th>
                                        <th width="60px">
                                            是否建有文化信息资源共享工程站点</th>
                                        <th width="60px">
                                            文化信息资源共享工程经费投入（万元/年）</th>
                                        <th width="60px">
                                            数字图书馆推广工程经费投入（万元/年）</th>
                                        <th width="60px">
                                            公共电子阅览室终端是否统一安装管理软件</th>
                                        <th>
                                            公共电子阅览室终端数量（台）</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>{$data.id}</td>
                                        <td>{$data.dig_website}</td>
                                        <td>{$data.dig_app}</td>
                                        <td>{$data.dig_blog}</td>
                                        <td>{$data.dig_weibo}</td>
                                        <td>{$data.dig_zone}</td>
                                        <td>{$data.dig_community}</td>
                                         <td>{$data.dig_wechat}</td>
                                        <td>{$data.dig_webserver}</td>
                                        <td>{$data.dig_PV}</td>
                                        <td>{$data.dig_remote_num}</td>
                                        <td><if condition="$data['dig_ifshare'] eq 1">是<else/>否</if></td>
                                        <td>{$data.dig_share_fund}</td>
                                        <td>{$data.dig_expand_fund}</td>
                                       
                                        <td><if condition="$data['dig_havemanager'] eq 1">是<else/>否</if></td>
                                        <td>{$data.dig_computer_num}</td>
                                    </tr>
                                </tbody>
                            </table>
                            <table class="table table-striped table-responsive table-bordered">
                                <caption>
                                    社会教育活动</caption>
                                <thead>
                                    <tr>
                                        <th width="50px">
                                            序号</th>
                                        <th width="150px">
                                            目录</th>
                                        <th width="150px">
                                            活动名称</th>
                                        <th width="150px">
                                            参加人数</th>
                                        <th width="150px">
                                            活动时间</th>
                                        <th width="150px">
                                            活动地点</th>
                                        <th>
                                            主要内容</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <volist name="data['Lib_EducationAct']" id="vo">
                                    <tr>
                                        <td>{$vo.id}</td>
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
                            <table class="table table-striped table-responsive table-bordered">
                                <caption>
                                    志愿者队伍建设</caption>
                                <thead>
                                    <tr>
                                        <th width="50px">
                                            序号</th>
                                        <th  width="80px">
                                            姓名</th>
                                        <th width="80px">
                                            性别</th>
                                        <th width="80px">
                                            民族</th>
                                        <th width="80px">
                                            出生日期</th>
                                        <th width="50px">
                                            政治面貌</th>
                                        
                                        <th width="50px">
                                            毕业院校</th>
                                        <th width="100px">
                                            毕业时间</th>
                                        <th width="100px">
                                            所学专业</th>
                                        <th width="50px">
                                            学历</th>
                                        <th width="50px">
                                            学位</th>
                                        <th width="50px">
                                            加入志愿者日期</th>
                                            <th width="50px">
                                                工作单位</th>
                                            <th width="50px">
                                                教育程度</th>
                                            <th>
                                                专长</th>    
                                    </tr>
                                </thead>
                                <tbody>
                                    <volist name="data['Lib_Volunteer']" id="vo">
                                    <tr>
                                        <td>{$vo.id}</td>
                                        <td>{$vo.vol_name}</td>
                                        <td><if condition="$data['vol_sex'] eq 1">男<else/>女</if></td>
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
                            <table class="table table-striped table-responsive table-bordered">
                                <caption>
                                    志愿服务活动</caption>
                                <thead>
                                    <tr>
                                        <th width="50px">
                                            序号</th>
                                        <th width="150px">
                                            活动名称</th>
                                        <th width="250px">
                                            参加活动志愿者姓名</th>
                                        <th width="150px">
                                            活动时间</th>
                                        <th>
                                            活动地点</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <volist name="data['Lib_VolunteerAct']" id="vo">
                                    <tr>
                                        <td>{$vo.id}</td>
                                        <td>{$vo.vact_title}</td>
                                        <td>{$vo.vact_names}</td>
                                        <td>{$vo.vact_date}</td>
                                        <td>{$vo.vact_location}</td>
                                    </tr>
                                </volist>
                                </tbody>
                            </table>
                            <table class="table table-striped table-responsive table-bordered">
                                <caption>
                                    上级表彰</caption>
                                <thead>
                                    <tr>
                                        <th width="50px">
                                            序号</th>
                                        <th>
                                            获奖内容</th>
                                        <th>
                                            表彰单位</th>
                                        <th>
                                            表彰类别</th>
                                        <th>
                                            表彰时间</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <volist name="data['Lib_Commend']" id="vo">
                                    <tr>
                                        <td>{$vo.id}</td>
                                        <td>{$vo.comm_content}</td>
                                        <td>{$vo.comm_entity}</td>
                                        <td>{$vo.comm_type}</td>
                                        <td>{$vo.comm_date}</td>
                                    </tr>
                                </volist>
                                    <tr>
                                        <td colspan="5" style="text-align: left">备注：表彰类别包括国家级、省级、市级等</td>
                                    </tr>
                                </tbody>
                            </table>
                            <table class="table table-striped table-responsive table-bordered">
                                <caption>
                                    古籍保护管理</caption>
                                <thead>
                                    <tr>
                                        <th width="50px">
                                            序号</th>
                                        <th>
                                            古籍数量</th>
                                        <th>
                                            经费投入</th>
                                        <th>
                                            古籍保护宣传活动次数</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>{$data.id}</td>
                                        <td>{$data.anc_totle}</td>
                                        <td>{$data.anc_fund}</td>
                                        <td>{$data.anc_activity_num}</td>
                                    </tr>
                                    <tr>
                                        <td colspan="4" style="text-align: left">备注：古籍保护宣传活动要求提供活动 名称、时间、地点、主要内容， 并附活动照片</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>


                    </div>

                </div>






            </div>
            <div class="clr"></div>
        </div>
    </div>

    </div>
    <div class="clr"></div>
    </div>
    <div class="clr"></div>
    <template file="Cudatabase/Common/_foot" />

</body>

</html>