<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>文化大数据库</title>
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
       <if condition="$_GET['type'] eq  '1'"><div class="ht1"> <a href="{:U('Cudatabase/Index/menu',array('cid'=>44,'rootcid'=>2))}">公共文化</a> - <a href="{:U('lists',array('type'=>1))}">群艺馆(国家级)</a></div></if>
      <if condition="$_GET['type'] eq  '2' "><div class="ht1"> <a href="{:U('Cudatabase/Index/menu',array('cid'=>44,'rootcid'=>2))}">公共文化</a> - <a href="{:U('lists',array('type'=>1))}">群艺馆(省级)</a></div></if>
      <if condition="$_GET['type'] eq  '3' "><div class="ht1"> <a href="{:U('Cudatabase/Index/menu',array('cid'=>44,'rootcid'=>2))}">公共文化</a> - <a href="{:U('lists',array('type'=>1))}">群艺馆(市级)</a></div></if>
      <if condition="$_GET['type'] eq  '4' "><div class="ht1"> <a href="{:U('Cudatabase/Index/menu',array('cid'=>44,'rootcid'=>2))}">公共文化</a> - <a href="{:U('lists',array('type'=>1))}">群艺馆(县级)</a></div></if>
        <div class="search-content" style="background: none;position: relative;">
            <div class="container-fluid">
                <div class="row">

                    <div class="col-md-12">
                        <div class="center-block" style="margin: auto;width: 100%;padding-top: 10px;padding-bottom: 10px;">
                            <h3 class="text-center">{$data.cac_name}</h3>
                            <div style="">
                                <!--<p style="text-indent: 20px;line-height:25px;">山西省群众艺术馆是省文化厅下属正处级一类事业单位，国家一级文化馆。</p>
                                <h4>一、 单位的性质和任务</h4>
                                <p style="text-indent: 20px;line-height:25px;">山西省群众艺术馆成立于1956年6月,是国家设立的全民所有制文化事业机构，担负着指导全省群众文化工作的职能，是组织、指导群众文化艺术活动，培训业余文艺骨干及研究群众文化艺术的文化事业单位。具体的工作任务是：组织辅导培训文化馆、站业务干部，指导文化馆、站业务工作;组织全省群众性文化艺术活动，侧重组织具有导向性、示范性、试验性、探索性的文化活动;组织、策划群众文艺创作。开展群众性文艺创作;组织、开展群众文化理论研究，编辑出版群众文化刊物;搜集、整理、保护民族民间文化艺术遗产，建立群众文化艺术档案;开展对外群众文化艺术交流活动。特别还担负着省里交办的重大艺术活动的组织以及文化惠民下基层演出、重大节假日庆典活动等。</p>
                                <h4>二、 机构设置和人员构成</h4>
                                <p style="text-indent: 20px;line-height:25px;">山西省群众艺术馆目前馆舍面积6612 m2；现有编制82人，目前在职职工73人，其中业务人员66人。馆内下设11个部室，分别为办公室、行政科、老干科、人事部、社会活动部、调查研究部、业务指导部、艺术创作中心、公共服务部、老年大学、艺术教育培训中心。专业人员中具有高级职称21人，中级职称31人，业务人员主要门类配备齐全，包括音乐、舞蹈、戏剧、曲艺、美术、摄影、书法、网络管理、理论研究、民族民间艺术等10个门类。</p>
                                <h4>三、 公共文化服务</h4>
                                <p style="text-indent: 20px;line-height:25px;">作为公益性文化事业单位，山西省群众艺术馆始终把最大限度地满足人民群众的基本文化需求放在首位，在组织精品创作，承办重大艺术活动，引进培养优秀艺术人才，培训辅导群文骨干队伍，推动基层群众文化建设，活跃群众文化生活等方面发挥了龙头和主力军的作用。</p>
                                <p style="text-indent: 20px;line-height:25px;">根据国家财政部、文化部联合发布的《关于推进全国美术馆公共图书馆文化馆（站）免费开放工作的意见》要求，馆内活动设施、厅室实行免费对外开放。馆内常设多项免费服务项目，主要有：社会文化老年大学，主要针对老年人，为老年人提供书法、美术、声乐、合唱、戏剧、琵琶、舞蹈等活动和培训；少儿公益艺术培训，主要为少年儿童提供书法、美术、声乐、舞蹈、琵琶、电子琴等活动和艺术培训；数字阅览，提供网络信息服务、数字资料查询、网络基础培训；艺术长廊，主要展出包括馆藏各类优秀艺术作品、职工摄影作品等；报刊阅览提供各种报纸、期刊；艺术视听，提供各类艺术资料欣赏、
                                    优秀影片欣赏、卡拉-OK；民族民间艺术展示宣传我省民族民间艺术，展示民族民间艺术精品，平均每天免费开放时间达8-10小时，充分保证群众来馆进行文化活动的时间，并给每位公众提供优质、高效的服务，满足人民群众对文化艺术的需要、丰富群众文化生活。
                                </p>
                                <p style="text-indent: 20px;line-height:25px;">常年举办多项大型文化活动，其中连续开展三年以上、覆盖全省、影响广泛、群众喜爱、参与面广的文化活动达到8 项，形成了我省具有特色的品牌活动和项目，这些品牌活动项目是：“文化惠民在三晋”公益活动、“群星奖”全省选拔赛、“春雨工程”山西文化志愿者边疆行系列活动、山西省网络摄影大赛、山西省农民工歌手大赛、“手牵手”公益性少儿粉笔画大赛、中国少儿卡拉OK电视大赛山西选拔赛等，受到群众的热烈欢迎。其中多项内容获得国家及省级奖项。</p>
                                <p style="text-indent: 20px;line-height:25px;">馆办文艺团体队6个，包括戏友社、京剧社、说唱艺术社、民乐团、合唱团、舞蹈队等；社会文化老年大学一所（经政府批准的示范性学历教育老年大学——山西省社会文化老年大学）。通过馆办团队每年举办各类文化惠民演出120余场，年惠及人数每年约20万人。</p>
                                <p style="text-indent: 20px;line-height:25px;">“群艺网”——山西省群众艺术馆门户网站，注册域名为hppt://www.sxsqyg.cn，是山西省群众文化工作的重要服务窗口和宣传阵地。网站建立于2006年，以“让公共文化服务触手可及”、“以文化人、以德润心、以文惠民”为宗旨,是山西省较早成立的反映山西群众文化发展和公共文化服务体系建设的文化公益网站。</p>-->
                            </div>
                            <table class="table table-striped table-responsive table-bordered">
                                <caption>
                                    设施建设</caption>
                                <thead>
                                    <tr>
                                        <th width="50px">
                                            序号</th>
                                        <th width="100px">
                                            地址</th>
                                        <th>
                                            法人代表</th>
                                        <th width="100px">
                                            联系方式</th>
                                        <th width="100px">
                                            馆舍建筑面积</th>
                                        <th width="120px">
                                            室外活动场地使用面积</th>
                                        <th>
                                            群众文化活动房使用面积</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>{$data.id|default='-'}</td>
                                        <td>{$data.cac_addr|default='-'}</td>
                                        <td>{$data.cac_legalpre|default='-'}</td>
                                        <td>{$data.cac_tel|default='-'}</td>
                                        <td>{$data.cac_area|default='-'}</td>
                                        <td>{$data.cac_outdoorarea|default='-'}</td>
                                        <td>{$data.cac_pocularea|default='-'}</td>
                                    </tr>
                                </tbody>
                            </table>
                            <table class="table table-striped table-responsive table-bordered">
                                <thead>
                                    <tr>
                                        <th width="150px">
                                            宣传橱窗、栏长度</th>
                                        <th width="150px">
                                            电子阅览室面积</th>
                                        <th width="150px">
                                            电子阅览室座席</th>
                                        <th width="150px">
                                            是否提供无线网络覆盖</th>
                                        <th >
                                            宽带接入（Mbps）</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>{$data.cac_propagatelen|default='-'}</td>
                                        <td>{$data.cac_elearea|default='-'}</td>
                                        <td>{$data.cac_elesitnum|default='-'}</td>
                                        <td>{$data['cac_iswireless']==1?'有':'无'}</td>
                                        <td>{$data.cac_bandwidth|default='-'}</td>
                                    </tr>
                                </tbody>
                            </table>
                            <table class="table table-striped table-responsive table-bordered">
                                <caption>
                                    经费拨款</caption>
                                <thead>
                                    <tr>
                                        <th width="200px">
                                            财政拨款总额</th>
                                        <th width="200px">
                                            财政拨款是否列入预算</th>
                                        <th width="200px">
                                            免费开放经费补助金额</th>
                                        <th >
                                            专项业务活动经费</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <volist name="data['CacFund']" id="cf">
                                    <tr>
                                        <td>{$cf.fund_totle|default='-'}</td>
                                        <td>{$cf['isbudget'] == 1?'是':'否'}</td>
                                        <td>{$cf.fund_free|default='-'}</td>
                                        <td>{$cf.fund_major|default='-'}</td>
                                    </tr>
                                    </volist>
                                </tbody>
                            </table>
                            <table class="table table-striped table-responsive table-bordered">
                                <caption>
                                    队伍建设</caption>
                                <thead>
                                    <tr>
                                        <th width="300px">
                                            从业人员姓名</th>
                                        <th width="300px">
                                            从业人员性别</th>
                                        <th width="300px">
                                            学历</th>
                                        <th >
                                            职称</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <volist name="data['CacTalent']" id="ct">
                                    <tr>
                                        <td>{$ct.tal_name}</td>
                                        <td>{$ct['tal_sex']==1?'男':'女'}</td>
                                        <td>{$ct.tal_edu_bg}</td>
                                        <td>{$ct['tal_position']==2?'高级':'中级'}</td>
                                    </tr>
                                    </volist>
                                </tbody>
                            </table>
                            <table class="table table-striped table-responsive table-bordered">
                                <caption>
                                    免费开放服务</caption>
                                <thead>
                                    <tr>
                                        <th width="100px">
                                            每周对公众提供服务的开放时长</th>
                                        <th width="100px">
                                            是否错时开放</th>
                                        <th width="80px">
                                            常设免费服务项目</th>
                                        <th width="80px">
                                            不定期特色文化服务项目</th>
                                        <th width="80px">
                                            人均年到馆次数（下一步要有）</th>
                                        <th width="80px">
                                            年外出服务人次</th>
                                        <th width="80px">
                                            无障碍设施</th>
                                        <th width="80px">
                                            {$data.CacAct_Count.0.act_object}（次数、受益人数）</th>
                                        <th width="80px">
                                            {$data.CacAct_Count.1.act_object}（次数、受益人数）</th>
                                        <th width="80px">
                                            {$data.CacAct_Count.2.act_object}（次数、受益人数）</th>
                                        <th >
                                            {$data.CacAct_Count.3.act_object}（次数、受益人数）</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>{$data.sev_opentime}</td>
                                        <td>{$data['sev_crosstime']==1?'是':'否'}</td>
                                        <td>{$data.sev_lastingfree}</td>
                                        <td>{$data.sev_noregcul}</td>
                                        <td>{$data.sev_yearavenum}</td>
                                        <td>{$data.sev_yearoutnum}</td>
                                        <td>{$data.sev_accessibility}</td>
                                        <td>{$data.CacAct_Count.0.count}/ {$data.CacAct_Count.0.pernum}</td>
                                        <td>{$data.CacAct_Count.1.count}/ {$data.CacAct_Count.1.pernum}</td>
                                        <td>{$data.CacAct_Count.2.count}/ {$data.CacAct_Count.2.pernum}</td>
                                        <td>{$data.CacAct_Count.3.count}/ {$data.CacAct_Count.3.pernum}</td>
                                    </tr>
                                </tbody>
                            </table>
                            <table class="table table-striped table-responsive table-bordered">
                                <caption>
                                    志愿服务建设</caption>
                                <thead>
                                    <tr>
                                        <th width="100px">
                                            志愿者活动</th>
                                        <th width="100px">
                                            志愿者人员</th>
                                        <th>
                                            时间</th>
                                        <!--<th width="100px">
                                            项目</th>
                                        <th width="100px">
                                            内容</th>-->
                                        <th width="120px">
                                            参加人数</th>
                                        <th>
                                            受益人数</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <volist name="data['CacVolact']" id="cva">
                                    <tr>
                                        <td>{$cva.volact_title|default='-'}</td>
                                        <td>{$cva.volact_joinname|default='-'}</td>
                                        <td>{$cva.volact_time|default='-'}</td>
                                        <!--<td>{$cva.|default='-'}</td>
                                        <td>{$cva.}</|default='-'td>-->
                                        <td>{$cva.volact_joinnum|default='-'}</td>
                                        <td>{$cva.volact_profitnum|default='-'}</td>
                                    </tr>
                                    </volist>
                                </tbody>
                            </table>
                            <table class="table table-striped table-responsive table-bordered">
                                <caption>
                                    馆办活动</caption>
                                <thead>
                                     <tr>
                                        <th width="100px">
                                            序号</th>
                                        <th width="100px">
                                            目录</th>
                                        <th width="100px">
                                           活动名称</th>
                                        <th width="100px">
                                            参加人数</th>
                                        <th width="100px">
                                            活动时间</th>
                                        <th width="100px">
                                            活动地点</th>
                                        <th >
                                            主要内容</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    <volist name="$data['CacOfficeact']" id="Off">
                                    <tr>
                                        <td>{$Off.id_cac_officeact|default='-'}</td>
                                        <td>{$Off.officeact_catalog}</td>
                                        <td>{$Off.officeact_name|default='-'}</td>
                                        <td>{$Off.officeact_joinnum|default='-'}</td>
                                        <td>{$Off.officeact_time|default='-'}</td>
                                        <td>{$Off.officeact_addr|default='-'}</td>
                                        <td>{$Off.officeact_content|default='-'}</td>
                                    </tr>
                                </volist>
                                </tbody>
                            </table>
                            <table class="table table-striped table-responsive table-bordered">
                                <caption>
                                    基层文化辅导培训基地</caption>
                                <thead>
                                    <tr>
                                        <th width="120px">
                                            序号</th>
                                        <th width="120px">
                                            地点</th>
                                        <th width="120px">
                                            基地面积</th>
                                        <th  width="150px">
                                            可容纳培训人数</th>
                                        <th>
                                            年举办培训次数</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <volist name="data['CacTrainbase']" id="ctb"></volist>
                                    <tr>
                                        <td>{$ctb.id_cac_tb|default='-'}</td>
                                        <td>{$ctb.tb_addr|default='-'}</td>
                                        <td>{$ctb.tb_area|default='-'}</td>
                                        <td>{$ctb.tb_includenum|default='-'}</td>
                                        <td>{$ctb.tb_yearnum|default='-'}</td>
                                    </tr>
                                </tbody>
                            </table>
                            <table class="table table-striped table-responsive table-bordered">
                                <caption>
                                    辅导培训活动</caption>
                                <thead>
                                    <tr>
                                        <th width="50px">
                                            序号</th>
                                        <th width="120px">
                                            目录 </th>
                                        <th width="120px">
                                            名称 </th>
                                        <th width="120px">
                                            内容 </th>
                                        <th width="120px">
                                            活动地点</th>
                                        <th width="120px">
                                            收益人数</th>
                                        <th >
                                            活动开展频率 </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <volist name="data['CacTrainact']" id="cta"></volist>
                                    <tr>
                                        <td>{$cta.id_cac_ta|default='-'}</td>
                                        <td>{$cta.ta_traintype|default='-'}</td>
                                        <td>{$cta.ta_name|default='-'}</td>
                                        <td>{$cta.ta_content|default='-'}</td>
                                        <td>{$cta.ta_addr|default='-'}</td>
                                        <td>{$cta.ta_profitnum|default='-'}</td>
                                        <td>{$cta.ta_frequency|default='-'}</td>
                                    </tr>
                                    </volist>
                                </tbody>
                            </table>
                            <table class="table table-striped table-responsive table-bordered">
                                <caption>
                                    群众文艺辅导资料</caption>
                                <thead>
                                    <tr>
                                        <th width="200px">
                                            序号</th>
                                        <th width="200px">
                                            刊物名称</th>
                                        <th width="200px">
                                            发行量</th>
                                        <th >
                                            发行范围</th>
                                    </tr>
                                </thead>
                                <tbody>
                                 <volist name="data['Cac_Comculter']" id="ccu"></volist>
                                    <tr>
                                        <td>{$ccu.id_cac_cc|default='-'}</td>
                                        <td>{$ccu.cc_name|default='-'}</td>
                                        <td>{$ccu.cc_publishnum|default='-'}</td>
                                        <td>{$ccu.cc_publishrang|default='-'}</td>
                                    </tr>
                                    </volist>
                                </tbody>
                            </table>
                            <table class="table table-striped table-responsive table-bordered">
                                <caption>
                                    数字化服务</caption>
                                <thead>
                                    <tr>
                                        <th width="150px">
                                            官方网站（网址）</th>
                                        <th width="150px">
                                            微信、公众号建设</th>
                                        <th width="150px">
                                            网上服务项目</th>
                                        <th width="120px">
                                            年网站访问量</th>
                                        <th width="150px">
                                            特色文化数字资源</th>
                                        <th >
                                            公共电子阅览室终端数量</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>{$data.dig_website|default='-'}</td>
                                        <td>{$data.dig_wechat|default='-'}</td>
                                        <td>{$data.dig_webserver|default='-'}</td>
                                        <td>{$data.dig_pv|default='-'}</td>
                                        <td>{$data.dig_resources|default='-'}</td>
                                        <td>{$data.dig_terminalnum|default='-'}</td>
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
    <div class="clr"></div>
    <template file="Cudatabase/Common/_foot" />
</body>

</html>