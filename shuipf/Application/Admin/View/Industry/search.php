<?php if (!defined('SHUIPF_VERSION')) exit(); ?>
<Admintemplate file="Common/Head"/>
<style type="text/css">
    .table_list tr,.table_list th,.table_list td{padding: 0;}
    .table_list th,.table_list td{padding: 3px 10px;}
    .table_list td{padding-left: 5px;}
    select.cid{margin-left: 10px;}    
</style>
<body class="J_scroll_fixed">
<div class="wrap J_check_wrap">
    <Admintemplate file="Common/Nav"/>
    <div class="h_a">搜索</div>
    <div class="table_list">
        <div class="table_full">
            <table cellpadding="2" cellspacing="1" class="table_form" width="100%">
                <tr>
                    <th width="147">类目：</th>
                    <td>
                        <div id="category" style="display:inline-block;">
                            <select id="parentItems" name="art_cid" onchange="getChildListAndSetValue(this)">
                                <option value='0'>--请选择--</option>
                                <volist name="result" id="ca">
                                    <option value="{$ca['cid']}">{$ca['name']}</option>
                                </volist>
                            </select>
                            <div id="childItems" style="display:inline-block;"></div>
                        </div>
                    </td>
                </tr>
                <tr name="selectshow">
                    <th width="147">所属地区：</th>
                    <td>
                        <select id="area" class="select_area">
                        <!--<option>省属</option>-->
                        </select>
                    </td>
                </tr>
            </table>
            <!--企业名录-->
            <form class="J_ajaxForm" action="{:U('search')}" method="get">
                <input type="hidden" name="g" value="Admin">
                <input type="hidden" name="m" value="Industry">
                <input type="hidden" name="a" value="search">
                <input type="hidden" name="art_cid" value="">
                <input type="hidden" name="search" value="1">
                <input type="hidden" style="opacity: 0; width: 0px;" name="area" class="area" value="{$data.area}"/>
                <table cellpadding="2" cellspacing="1" class="table_form" width="100%">
                    <tr>
                        <th width="147">单位名称：</th>
                        <td>
                            <input class="input" type="text" name="com_name" value="{$Think.get.com_name}"/>
                        </td>
                    </tr>
                    <tr>
                        <th width="147">加入企业注册时间：</th>
                        <td>
                            <input type="date" class="input" name="start_time" size="20"
                                   value={$data.start_time}>--<input type="date" class="input" name="end_time" size="20"
                                   value={$data.end_time}>
                        </td>
                    </tr>
                     <tr>
                        <th width="147">联系方式：</th>
                        <td>
                            <input class="input" type="text" name="com_phone" value="{$Think.get.com_phone}"/>
                        </td>
                    </tr>
                    <tr>
                        <th width="147">规模：</th>
                        <td>
                            <!--<input type="text" class="input" name="scale" size="20"
                                   value={$data.scale}>-->
                                   <select name="scale">
                                   <option value="all">全部</option>
                                   <option value="大型">大型</option>
                                   <option value="中型">中型</option>
                                   <option value="小型">小型</option>
                                   <option value="微小型">微小型</option>
                                   </select>
                        </td>
                    </tr>
                </table>
                <div style="margin: 10px 0 0;">
                    <button class="btn">搜索</button>
                    <a style="margin-left:4px;" href="{:U('search')}" class="btn">清除条件</a>
                </div>
            </form>

            <!--产业项目-->
            <form class="J_ajaxForm" action="{:U('search')}" method="get" data-cid="120" hidden>
                <input type="hidden" name="g" value="Admin">
                <input type="hidden" name="m" value="Industry">
                <input type="hidden" name="a" value="search">
                <input type="hidden" name="art_cid" value="">
                <input type="hidden" name="search" value="1">
                <input type="hidden" style="opacity: 0; width: 0px;" name="area" class="area" value="{$data.area}"/>
                <table cellpadding="2" cellspacing="1" class="table_form" width="100%">
                    <tr>
                        <th width="147">实施单位名称：</th>
                        <td>
                            <input class="input" type="text" name="com_name" value="{$Think.get.com_name}"/>
                        </td>
                    </tr>
                    <tr>
                        <th width="147">名称：</th>
                        <td>
                            <input class="input" type="text" name="title" value="{$Think.get.title}"/>
                        </td>
                    </tr>
                     <tr>
                        <th width="147">联系方式：</th>
                        <td>
                            <input class="input" type="text" name="com_phone" value="{$Think.get.com_phone}"/>
                        </td>
                    </tr>
                     <tr>
                        <th width="147">投资总额：</th>
                        <td>
                            
                        <select name="inv_totlemoney">
                        <option value="all">全部</option>
                        <option value="100万以下">100万以下</option>
                        <option  value="100万-1000万">100万-1000万</option>
                        <option  value="1000万-5000万">1000万-5000万</option>
                        <option  value="5000万-1亿">5000万-1亿</option>
                        <option  value="1亿-10亿">1亿-10亿</option>
                        <option  value="10亿以上">10亿以上</option>
                        </select>
                        </td>
                    </tr>
                </table>
                <div style="margin: 10px 0 0;">
                    <button class="btn">搜索</button>
                    <a style="margin-left:4px;" href="{:U('search')}" class="btn">清除条件</a>
                </div>
            </form>

          <!--文化产品-->
            <form class="J_ajaxForm" action="{:U('search')}" method="get" data-cid="121" hidden>
                <input type="hidden" name="g" value="Admin">
                <input type="hidden" name="m" value="Industry">
                <input type="hidden" name="a" value="search">
                <input type="hidden" name="art_cid" value="">
                <input type="hidden" name="search" value="1">
                <input type="hidden" style="opacity: 0; width: 0px;" name="area" class="area" value="{$data.area}"/>
                <table cellpadding="2" cellspacing="1" class="table_form" width="100%">
                    <tr>
                        <th width="147">产品名称：</th>
                        <td>
                            <input class="input" type="text" name="title" value="{$Think.get.title}"/>
                        </td>
                    </tr>
                    
                     <tr>
                        <th width="147">联系方式：</th>
                        <td>
                            <input class="input" type="text" name="com_phone" value="{$Think.get.com_phone}"/>
                        </td>
                    </tr>
                </table>
                <div style="margin: 10px 0 0;">
                    <button class="btn">搜索</button>
                    <a style="margin-left:4px;" href="{:U('search')}" class="btn">清除条件</a>
                </div>
            </form>


            <!--园区基地 -->
            <form class="J_ajaxForm" action="{:U('search')}" method="get" data-cid="122" hidden>
                <input type="hidden" name="g" value="Admin">
                <input type="hidden" name="m" value="Industry">
                <input type="hidden" name="a" value="search">
                <input type="hidden" name="art_cid" value="">
                <input type="hidden" name="search" value="1">
                <input type="hidden" style="opacity: 0; width: 0px;" name="area" class="area" value="{$data.area}"/>
                <table cellpadding="2" cellspacing="1" class="table_form" width="100%">
                    <tr>
                        <th width="147">名称：</th>
                        <td>
                            <input class="input" type="text" name="title" value="{$Think.get.title}"/>
                        </td>
                    </tr>
                    <tr>
                        <th width="147">联系电话：</th>
                        <td>
                            <input class="input" type="text" name="com_phone" value="{$Think.get.com_phone}"/>
                        </td>
                    </tr>
                    <tr>
                        <th width="147">级别：</th>
                        <td>
                            <input class="input" type="text" name="level" value="{$Think.get.level}"/>
                        </td>
                    </tr>
                </table>
                <div style="margin: 10px 0 0;">
                    <button class="btn" type="submit">搜索</button>
                    <a style="margin-left:4px;" href="{:U('search')}" class="btn">清除条件</a>
                </div>
            </form>
        </div>
    </div>

    <div class="table_list table_lists">
        <table width="100%" cellspacing="0">
                <thead>
                <tr>
                     <td align="center">序号</td>
                <td align="center">名称</td>
                <td align="center">类目</td>
                <td align="center">分类</td>
                <td align="center">地区</td>
                <td align="center">作者</td>
                <td align="center">时间</td>
                <td align="center">是否推荐至公共服务平台</td>
                <td align="center">操作</td>
               
                </tr>
                </thead>
                <tbody>
                <volist name="data['list']" id="vo">
                    <tr>
                        <td align="center">{$vo.id}</td>
                    <td align="center">{$vo.title}{$vo.com_name}</td>
                    <td align="center">{$vo.parentcategoryname}</td>
                    <td align="center">{$vo.categoryname}</td>
                    <td align="center">{$vo.area_display}</td>
                    <td align="center">{$vo.author}</td>
                    <td align="center">{$vo.updatetime}</td>
                     <td align="center"><?=$vo['if_resources']=='1'?'是':'否'?></td>
                        <td style="text-align:center"><a href="{:U('show',array('id'=>$vo['id']))}">查看</a></td>
                    </tr>
                </volist>
                </tbody>
        </table>
        <div class="p10 page">
            <div class="pages"> {$pageinfo.page}</div>
        </div>
    </div>
</div>
<script src="{$config_siteurl}statics/js/common.js?v"></script>
<script src="{$config_siteurl}statics/js/content_addtop.js"></script>
<script>
    // $(function(){
    //     $("form").find("button.btn").on("click",function(){
    //         var _this = $(this).parents("form");
    //         $.ajax({
    //             type: 'GET',
    //             url: "{:U('search')}",
    //             dataType: 'json',
    //             data: _this.serialize(),
    //             success: function(result){
    //                 if(result.status == 1){
    //                     var list = '',tit = '';
    //                     console.log(result.data);
    //                     if(!!result.data.list){
    //                         $.each(result.data.list,function(i,v){
    //                             var area_display = v.area_display == '' ? '无' : v.area_display;
    //                             var level = v.level == '' ? '无' : v.level;
    //                             var com_name = v.com_name == '' ? '无' : v.com_name;
    //                             var com_property = v.com_property == '' ? '无' : v.com_property;
    //                             var com_leader = v.com_leader == '' ? '无' : v.com_leader;
    //                             var com_phone = v.com_phone == '' ? '无' : v.com_phone;
    //                             var com_addr = v.com_addr == '' ? '无' : v.com_addr;
    //                             var com_product = v.com_product == '' ? '无' : v.com_product;
    //                             var com_mode = v.com_mode == '' ? '无' : v.com_mode;
    //                             var intro = v.intro == '' ? '无' : v.intro;
    //                             var author = v.author == '' ? '无' : v.author;
    //                             var me_list = v.me_list == '' ? '无' : v.me_list;
    //                             var me_more = v.me_more == '' ? '无' : v.me_more;
    //                             var support = v.support == '' ? '无' : v.support;
    //                             var inv_totle = v.inv_totle == '' ? '无' : v.inv_totle;
    //                             var inv_financing = v.inv_financing == '' ? '无' : v.inv_financing;
    //                             var inv_type = v.inv_type == '' ? '无' : v.inv_type;
    //                             var inv_years = v.inv_years == '' ? '无' : v.inv_years;
    //                             var specification = v.specification == '' ? '无' : v.specification;
    //                             var inv_use = v.inv_use == '' ? '无' : v.inv_use;
    //                             var title = v.title == '' ? '无' : v.title;
    //                             var sponsor = v.sponsor == '' ? '无' : v.sponsor;
    //                             var undertaker = v.undertaker == '' ? '无' : v.undertaker;
    //                             var completetime = v.completetime == '' ? '无' : v.completetime;
    //                             var boutique = v.boutique == '' ? '无' : v.boutique;
    //                             var pavilion = v.pavilion == '' ? '无' : v.pavilion;
    //                             var opentime = v.opentime == '' ? '无' : v.opentime;
    //                             var total_area = v.total_area == '' ? '无' : v.total_area;
    //                             var re_birth = v.re_birth == '0' ? '无' : v.re_birth;
    //                             var prot_projects = v.prot_projects == '0' ? '无' : v.prot_projects;
    //                             var re_sex = v.re_sex == '1' ? '男' : '女';
    //                             if(v.art_cid == ('132' || '133' || '134' || '135' || '136' || '137' || '138' || '139' || '140' || '141' || '165')){      
    //                                 tit = '<tr>'+
    //                                             '<td align="left" width="20"><input type="checkbox" class="J_check_all" data-direction="x" data-checklist="J_check_x"></td>'+
    //                                             '<td align="left">发布ID</td>'+
    //                                             '<td align="left">发布时间</td>'+
    //                                             '<td align="left">所属地区</td>'+
    //                                             '<td align="left">单位名称</td>'+
    //                                             '<td align="left">单位性质</td>'+
    //                                             '<td align="left">负责人</td>'+
    //                                             '<td align="left">联系方式</td>'+
    //                                             '<td align="left">通信地址</td>'+
    //                                             '<td align="left">经营产品</td>'+
    //                                             '<td align="left">经营模式</td>'+
    //                                             '<td align="left">简介</td>'+
    //                                             '<td align="left">上传者</td>'+
    //                                             '<td align="left">操作</td>'+
    //                                         '</tr>';         
    //                                 list += '<tr>'+
    //                                             '<td align="center"><input type="checkbox"></td>'+
    //                                             '<td align="center">'+v.id+'</td>'+
    //                                             '<td align="center">'+v.addtime+'</td>'+
    //                                             '<td align="center">'+area_display+'</td>'+
    //                                             '<td align="center">'+com_name+'</td>'+
    //                                             '<td align="center">'+com_property+'</td>'+
    //                                             '<td align="center">'+com_leader+'</td>'+
    //                                             '<td align="center">'+com_phone+'</td>'+
    //                                             '<td align="center">'+com_addr+'</td>'+
    //                                             '<td align="center">'+com_product+'</td>'+
    //                                             '<td align="center">'+com_mode+'</td>'+
    //                                             '<td align="center">'+intro+'</td>'+
    //                                             '<td align="center">'+author+'</td>'+
    //                                             '<td align="center"><a href="/index.php?g=Admin&m=Industry&a=show&id='+v.id+'">查看</a></td>'+
    //                                         '</tr>';
    //                             }else if(v.art_cid == ('142' || '143' || '144' || '145' || '146' || '147' || '148' || '149' || '150' || '151')){
    //                                 tit = '<tr>'+
    //                                             '<td align="left" width="20"><input type="checkbox" class="J_check_all" data-direction="x" data-checklist="J_check_x"></td>'+
    //                                             '<td align="left">发布ID</td>'+
    //                                             '<td align="left">发布时间</td>'+
    //                                             '<td align="left">所属地区</td>'+
    //                                             '<td align="left">项目名称</td>'+
    //                                             '<td align="left">项目简介</td>'+
    //                                             '<td align="left">项目配套</td>'+
    //                                             '<td align="left">单位名称</td>'+
    //                                             '<td align="left">单位性质</td>'+
    //                                             '<td align="left">负责人</td>'+
    //                                             '<td align="left">联系方式</td>'+
    //                                             '<td align="left">通信地址</td>'+
    //                                             '<td align="left">投资总额</td>'+
    //                                             '<td align="left">融资总额</td>'+
    //                                             '<td align="left">投资年限</td>'+
    //                                             '<td align="left">合作方式</td>'+
    //                                             '<td align="left">资金用途</td>'+
    //                                             '<td align="left">上传者</td>'+
    //                                             '<td align="left">操作</td>'+
    //                                         '</tr>';
                                                
    //                                 list += '<tr>'+
    //                                             '<td align="center"><input type="checkbox"></td>'+
    //                                             '<td align="center">'+v.id+'</td>'+
    //                                             '<td align="center">'+v.addtime+'</td>'+
    //                                             '<td align="center">'+area_display+'</td>'+
    //                                             '<td align="center">'+title+'</td>'+
    //                                             '<td align="center">'+intro+'</td>'+
    //                                             '<td align="center">'+support+'</td>'+
    //                                             '<td align="center">'+com_name+'</td>'+
    //                                             '<td align="center">'+com_property+'</td>'+
    //                                             '<td align="center">'+com_leader+'</td>'+
    //                                             '<td align="center">'+com_phone+'</td>'+
    //                                             '<td align="center">'+com_addr+'</td>'+
    //                                             '<td align="center">'+inv_totle+'</td>'+
    //                                             '<td align="center">'+inv_financing+'</td>'+
    //                                             '<td align="center">'+inv_years+'</td>'+
    //                                             '<td align="center">'+inv_type+'</td>'+
    //                                             '<td align="center">'+inv_use+'</td>'+
    //                                             '<td align="center">'+author+'</td>'+
    //                                             '<td align="center"><a href="/index.php?g=Admin&m=Industry&a=show&id='+v.id+'">查看</a></td>'+
    //                                         '</tr>';
    //                             }else if(v.art_cid == ('152' || '153' || '154' || '155' || '156' || '157' || '158' || '159' || '160' || '161')){
    //                                 tit = '<tr>'+
    //                                             '<td align="left" width="20"><input type="checkbox" class="J_check_all" data-direction="x" data-checklist="J_check_x"></td>'+
    //                                             '<td align="left">发布ID</td>'+
    //                                             '<td align="left">发布时间</td>'+
    //                                             '<td align="left">所属地区</td>'+
    //                                             '<td align="left">产品名称</td>'+
    //                                             '<td align="left">类别</td>'+
    //                                             '<td align="left">规格</td>'+
    //                                             '<td align="left">生产企业</td>'+
    //                                             '<td align="left">联系方式</td>'+
    //                                             '<td align="left">产品详情</td>'+
    //                                             '<td align="left">上传者</td>'+
    //                                             '<td align="left">操作</td>'+
    //                                         '</tr>';
                                                
    //                                 list += '<tr>'+
    //                                             '<td align="center"><input type="checkbox"></td>'+
    //                                             '<td align="center">'+v.id+'</td>'+
    //                                             '<td align="center">'+v.addtime+'</td>'+
    //                                             '<td align="center">'+area_display+'</td>'+
    //                                             '<td align="center">'+title+'</td>'+
    //                                             '<td align="center">'+com_property+'</td>'+
    //                                             '<td align="center">'+specification+'</td>'+
    //                                             '<td align="center">'+com_name+'</td>'+
    //                                             '<td align="center">'+com_phone+'</td>'+
    //                                             '<td align="center">'+com_product+'</td>'+
    //                                             '<td align="center">'+author+'</td>'+
    //                                             '<td align="center"><a href="/index.php?g=Admin&m=Industry&a=show&id='+v.id+'">查看</a></td>'+
    //                                         '</tr>';
    //                             }else if(v.art_cid == ('162' || '163')){
    //                                 tit = '<tr>'+
    //                                             '<td align="left" width="20"><input type="checkbox" class="J_check_all" data-direction="x" data-checklist="J_check_x"></td>'+
    //                                             '<td align="left">发布ID</td>'+
    //                                             '<td align="left">发布时间</td>'+
    //                                             '<td align="left">所属地区</td>'+
    //                                             '<td align="left">项目名称</td>'+
    //                                             '<td align="left">级别</td>'+
    //                                             '<td align="left">基本概况</td>'+
    //                                             '<td align="left">上传者</td>'+
    //                                             '<td align="left">操作</td>'+
    //                                         '</tr>';
                                                
    //                                 list += '<tr>'+
    //                                             '<td align="center"><input type="checkbox"></td>'+
    //                                             '<td align="center">'+v.id+'</td>'+
    //                                             '<td align="center">'+v.addtime+'</td>'+
    //                                             '<td align="center">'+area_display+'</td>'+
    //                                             '<td align="center">'+title+'</td>'+
    //                                             '<td align="center">'+level+'</td>'+
    //                                             '<td align="center">'+intro+'</td>'+
    //                                             '<td align="center">'+author+'</td>'+
    //                                             '<td align="center"><a href="/index.php?g=Admin&m=Industry&a=show&id='+v.id+'">查看</a></td>'+
    //                                         '</tr>';
    //                             }else if(v.art_cid == ('167' || '168' || '169' || '170' || '171' || '173')){
    //                                 tit = '<tr>'+
    //                                             '<td align="left" width="20"><input type="checkbox" class="J_check_all" data-direction="x" data-checklist="J_check_x"></td>'+
    //                                             '<td align="left">发布ID</td>'+
    //                                             '<td align="left">发布时间</td>'+
    //                                             '<td align="left">所属地区</td>'+
    //                                             '<td align="left">活动名称</td>'+
    //                                             '<td align="left">主办者</td>'+
    //                                             '<td align="left">承办者</td>'+
    //                                             '<td align="left">参展会馆</td>'+
    //                                             '<td align="left">展会时间</td>'+
    //                                             '<td align="left">地点</td>'+
    //                                             '<td align="left">简介</td>'+
    //                                             '<td align="left">上传者</td>'+
    //                                             '<td align="left">操作</td>'+
    //                                         '</tr>';
                                                
    //                                 list += '<tr>'+
    //                                             '<td align="center"><input type="checkbox"></td>'+
    //                                             '<td align="center">'+v.id+'</td>'+
    //                                             '<td align="center">'+v.addtime+'</td>'+
    //                                             '<td align="center">'+area_display+'</td>'+
    //                                             '<td align="center">'+title+'</td>'+
    //                                             '<td align="center">'+sponsor+'</td>'+
    //                                             '<td align="center">'+undertaker+'</td>'+
    //                                             '<td align="center">'+pavilion+'</td>'+
    //                                             '<td align="center">'+opentime+'</td>'+
    //                                             '<td align="center">'+addr+'</td>'+
    //                                             '<td align="center">'+intro+'</td>'+
    //                                             '<td align="center">'+author+'</td>'+
    //                                             '<td align="center"><a href="/index.php?g=Admin&m=Industry&a=show&id='+v.id+'">查看</a></td>'+
    //                                         '</tr>';
    //                             }else if(v.art_cid == '166'){
    //                                 tit = '<tr>'+
    //                                             '<td align="left" width="20"><input type="checkbox" class="J_check_all" data-direction="x" data-checklist="J_check_x"></td>'+
    //                                             '<td align="left">发布ID</td>'+
    //                                             '<td align="left">发布时间</td>'+
    //                                             '<td align="left">所属地区</td>'+
    //                                             '<td align="left">名称</td>'+
    //                                             '<td align="left">地点</td>'+
    //                                             '<td align="left">竣工时间</td>'+
    //                                             '<td align="left">开放时间</td>'+
    //                                             '<td align="left">馆藏精品</td>'+
    //                                             '<td align="left">总建筑面积</td>'+
    //                                             '<td align="left">简介</td>'+
    //                                             '<td align="left">上传者</td>'+
    //                                             '<td align="left">操作</td>'+
    //                                         '</tr>';
                                                
    //                                 list += '<tr>'+
    //                                             '<td align="center"><input type="checkbox"></td>'+
    //                                             '<td align="center">'+v.id+'</td>'+
    //                                             '<td align="center">'+v.addtime+'</td>'+
    //                                             '<td align="center">'+area_display+'</td>'+
    //                                             '<td align="center">'+title+'</td>'+
    //                                             '<td align="center">'+addr+'</td>'+
    //                                             '<td align="center">'+completetime+'</td>'+
    //                                             '<td align="center">'+opentime+'</td>'+
    //                                             '<td align="center">'+boutique+'</td>'+
    //                                             '<td align="center">'+total_area+'</td>'+
    //                                             '<td align="center">'+intro+'</td>'+
    //                                             '<td align="center">'+author+'</td>'+
    //                                             '<td align="center"><a href="/index.php?g=Admin&m=Industry&a=show&id='+v.id+'">查看</a></td>'+
    //                                         '</tr>';
    //                             }else{
    //                                 tit = '<tr>'+
    //                                             '<td align="left" width="20"><input type="checkbox" class="J_check_all" data-direction="x" data-checklist="J_check_x"></td>'+
    //                                             '<td align="left">发布ID</td>'+
    //                                             '<td align="left">发布时间</td>'+
    //                                             '<td align="left">名称</td>'+
    //                                             '<td align="left">所属地区</td>'+
    //                                             '<td align="left">联系电话</td>'+
    //                                             '<td align="left">简介</td>'+
    //                                             '<td align="left">上传者</td>'+
    //                                             '<td align="left">操作</td>'+
    //                                         '</tr>';
                                                
    //                                 list += '<tr>'+
    //                                             '<td align="center"><input type="checkbox"></td>'+
    //                                             '<td align="center">'+v.id+'</td>'+
    //                                             '<td align="center">'+v.addtime+'</td>'+
    //                                             '<td align="center">'+area_display+'</td>'+
    //                                             '<td align="center">'+com_phone+'</td>'+
    //                                             '<td align="center">'+intro+'</td>'+
    //                                             '<td align="center">'+author+'</td>'+
    //                                             '<td align="center"><a href="/index.php?g=Admin&m=Industry&a=show&id='+v.id+'">查看</a></td>'+
    //                                         '</tr>';
    //                             }

    //                         })
    //                     }else{

    //                                list += '<span style="color:red">'+
                                               
    //                                             '没有相关数据'+
                                                
                                                
    //                                         '</span>'; 
                                
    //                     }
    //                     // console.log(tit);
    //                     $(".table_lists").find("thead").html(tit);
    //                     $(".table_lists").find("tbody").html(list);
    //                     $(".page").find(".pages").html(result.data.pageinfo.page);
    //                 }
                    
    //             }
    //         })
    //         return false;
    //     })
    //     // $("form:first").find("button.btn").trigger("click");
    // })
</script>
</body>

</html>
