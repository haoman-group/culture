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
                                <volist name="category" id="ca">
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
                        <select id="area" class="select_area" ></select>
                    </td>
                </tr>
          </table>
          
          <form class="J_ajaxForm" action="{:U('search')}" method="get" data-cid="75"  data-represen="1"  >
            <input type="hidden" name="art_cid" value="">
                <input type="hidden" name="g" value="admin">
                <input type="hidden" name="m" value="Immaterial">
                <input type="hidden" name="a" value="search">
                <input type="hidden" name="search" value="1">
               <!--  <input type="hidden" name="parent_cid" value="75"> -->
              <table cellpadding="2" cellspacing="1" class="table_form" width="100%">
                  <tr id="provincelevelselect" >
                            <th width="147">省级批次:</th>
                            <td>                                   
                                <select name="level" id="provincelevelselect">
                                    <option value="">--无--</option>
                                    <option value="省级第一批">第一批</option>
                                    <option value="省级第二批">第二批</option>
                                    <option value="省级第三批">第三批</option>
                                    <option value="省级第四批">第四批</option>
                                    <option value="省级第五批">第五批</option>
                                </select>
                            </td>
                        </tr>  
                        <tr id="nationallevelselect" >
                            <th width="147">国家级批次:</th>
                            <td>                                   
                                <select name="national_level" id="nationallevelselect">
                                    <option value="">--无--</option>
                                    <option value="国家级第一批">第一批</option>
                                    <option value="国家级第二批">第二批</option>
                                    <option value="国家级第三批">第三批</option>
                                    <option value="国家级第四批">第四批</option>
                                </select>
                            </td>
                        </tr>   
                   <tr>
                      <th width="147">代表性：</th>
                      <td>
                      <select name="re_represen" class="represen"  value="{$Think.get.re_represen}">
                         <option value="0">请选择</option>
                     <option value="1">代表性项目</option>
                     <option value="2">代表性继承人</option>
                    </select>
                      </td>
                  </tr>
                  <tr>
                      <th width="147">项目名称：</th>
                      <td>
                          <input class="input" type="text" name="re_projectname" value="{$Think.get.re_projectname}" />
                      </td>
                  </tr>
              </table>
              <div style="margin: 10px 0 0;">
                  <button class="btn" onclick="check(this.form)">搜索</button>
                  <a style="margin-left:4px;" href="{:U('search')}" class="btn">清除条件</a>
               
              </div>
          </form>
  
   <!--基础设施-->
          <form class="J_ajaxForm" action="{:U('search')}" method="get" data-cid="231"  data-represen="1"  hidden>
            <input type="hidden" name="art_cid" value="">
                <input type="hidden" name="g" value="admin">
                <input type="hidden" name="m" value="Immaterial">
                <input type="hidden" name="a" value="search">
                <input type="hidden" name="search" value="1">
               <!--  <input type="hidden" name="parent_cid" value="75"> -->
              <table cellpadding="2" cellspacing="1" class="table_form" width="100%">
                  
                  <tr>
                      <th width="147">项目名称：</th>
                      <td>
                          <input class="input" type="text" name="re_projectname" value="{$Think.get.re_projectname}" />
                      </td>
                  </tr>
              </table>
              <div style="margin: 10px 0 0;">
                  <button class="btn" onclick="check(this.form)">搜索</button>
                  <a style="margin-left:4px;" href="{:U('search')}" class="btn">清除条件</a>
               
              </div>
          </form>
      <!--宣传展示-->
           <form class="J_ajaxForm" action="{:U('search')}" method="get" data-cid="232"  data-represen="1"  hidden>
            <input type="hidden" name="art_cid" value="">
                <input type="hidden" name="g" value="admin">
                <input type="hidden" name="m" value="Immaterial">
                <input type="hidden" name="a" value="search">
                <input type="hidden" name="search" value="1">
               <!--  <input type="hidden" name="parent_cid" value="75"> -->
              <table cellpadding="2" cellspacing="1" class="table_form" width="100%">
                  
                  <tr>
                      <th width="147">项目名称：</th>
                      <td>
                          <input class="input" type="text" name="re_projectname" value="{$Think.get.re_projectname}" />
                      </td>
                  </tr>
              </table>
              <div style="margin: 10px 0 0;">
                  <button class="btn" onclick="check(this.form)">搜索</button>
                  <a style="margin-left:4px;" href="{:U('search')}" class="btn">清除条件</a>
               
              </div>
          </form>
        <!--保护措施-->
           <form class="J_ajaxForm" action="{:U('search')}" method="get" data-cid="241"  data-represen="1" hidden >
            <input type="hidden" name="art_cid" value="">
                <input type="hidden" name="g" value="admin">
                <input type="hidden" name="m" value="Immaterial">
                <input type="hidden" name="a" value="search">
                <input type="hidden" name="search" value="1">
               <!--  <input type="hidden" name="parent_cid" value="75"> -->
              <table cellpadding="2" cellspacing="1" class="table_form" width="100%">
                  
                  <tr>
                      <th width="147">项目名称：</th>
                      <td>
                          <input class="input" type="text" name="re_projectname" value="{$Think.get.re_projectname}" />
                      </td>
                  </tr>
              </table>
              <div style="margin: 10px 0 0;">
                  <button class="btn" onclick="check(this.form)">搜索</button>
                  <a style="margin-left:4px;" href="{:U('search')}" class="btn">清除条件</a>
               
              </div>
          </form>
          

      

        
          
            

         

          
      </div>
  </div>
  <!-- <form  action="" method="get" >
   <input type="hidden" name="g" value="admin">
   <input type="hidden" name="m" value="Immaterial">
   <input type="hidden" name="a" value="search">
   <input type="hidden" name="search" value="1">
    <div class="search_type cc mb10">

      <div class="mb10"> 
       <table cellpadding="2" cellspacing="1" class="table_form" width="100%">
                        <tr>
                            <th width="147">类目：</th>
                            <td>
                                <div id="category" style="display:inline-block;">
                                    <select id="parentItems" name="art_cid" onchange="getchildlist(this)">
                                    <option value='0'>请选择</option>
                                    <volist name="category" id="ca">
                                        <option value="{$ca['cid']}">{$ca['name']}</option>
                                    </volist>
                                </select>
                                    <div id="childItems" style="display:inline-block;"></div>
                                </div>
                            </td>
                        </tr>
                    </table>

        <span class="mr20"> 发布时间：
        <input type="text" name="start_time" class="input length_2 J_date" value="{$Think.get.start_time}" style="width:80px;">
        -
        <input type="text" class="input length_2 J_date" name="end_time" value="{$Think.get.end_time}" style="width:80px;">
        
        <span>所属地区:</span><input class="input" type="text" name="area" value="{$Think.get.area}">
       <span>上传者:</span><input class="input" type="text" name="com_phone" value="{$Think.get.com_phone}">
       
        <button class="btn">搜索</button>
        </span> </div>
    </div>
  </form> -->
<!-- 默认列表 -->
     <div class="table_list table_lists">
      <table width="100%" cellspacing="0" >
       <thead>
          <tr>
           
            <td align="left">序号</td>
            <td align="left">名称</td>
            <td align="left">分类</td>
            <td align="left">地区</td>
            <!--<td align="left">
              <select name="" id="author_select">
                <option value="mine"  ><a href="{:U('/admin/Immaterial/index',['author'=>'mine'])}">我的</a></option>
                <option value="all" <if condition="$_GET['author'] eq 'all'">selected</if>><a href="{:U('/admin/Immaterial/index',['author'=>'all'])}">全部</a></option>
              </select>
            </td>-->
            <td align="left">级别</td>
            <td align="left">审核</td>
            <td align="center">是否推荐至公共服务平台</td>
            <td align="left">操作</td>
          </tr>
        </thead>
        <tbody>
        <volist name="data['list']" id="vo">
            <tr>    
              <td align="left" style="text-align:center">{$vo.id}</td>
              <td align="left" style="text-align:center">{$vo.re_projectname}</td>
              <td align="left" style="text-align:center">{$vo.categoryname}</td>
              <td align="left" style="text-align:center">{$vo.area_display}</td>
              <!--<td align="left" style="text-align:center">{$vo.author}</td>-->
              <td align="left" style="text-align:center">{$vo.level}/{$vo.national_level}</td>
              <td align="left" style="text-align:center">{$AuditStatus[$vo[auditstatus]]}</td>
               <td align="center"><?=$vo['if_resources']=='1'?'是':'否'?></td>
             <td style="text-align:center"><a href="{:U('show',array('id'=>$vo['id']))}">查看</a></td>
            </tr>
           </volist>
        </tbody>
      </table>
     <div class="p10">
        <div class="pages">{$pageinfo.page} </div>
      </div>
    </div>


  <!--  代表性项目 -->
    
    <!-- <div class="table_list"  <if condition="$data['0']['parent_artcid'] eq 75 and $data['0']['re_represen'] eq 1 ">style="display:block"<else/>style="display:none"</if>>
      <table width="100%" cellspacing="0">
        <thead>
          <tr>
            <td  align="left" width="20"><input type="checkbox" class="J_check_all" data-direction="x" data-checklist="J_check_x"></td>
            
            <td align="left">发布ID</td>
            <td align="left">项目编号</td>
            <td align="left">项目简介</td>
            <td align="left">申报地区或单位</td>
            <td align="left">入选本级名录时间</td>
            <td align="left">入选本级名录批次</td>
            <td align="left">项目保护单位</td>
            <td align="left">操作</td>
          </tr>
        </thead>
        <tbody>
        <volist name="lists" id="vo">
            <tr>
              <td><input type="checkbox"></td>
             <td style="text-align:center">{$vo.id}</td>
             <td style="text-align:center">{$vo.re_itemnum}</td>
             <td style="text-align:center">{$vo.re_introduction}</td>
             <td style="text-align:center"><if condition="$vo.re_unit eq ''">无<else/>{$vo.re_unit}</if></td>
             <td style="text-align:center"><if condition="$vo.re_directorytime eq '0'">无<else/>{$vo.re_directorytime}</if></td>
             <td style="text-align:center"><if condition="$vo.re_batch eq ''">无<else/>{$vo.re_batch}</if></td>
             <td style="text-align:center"><if condition="$vo.re_protectunit eq ''">无<else/>{$vo.re_protectunit}</if></td>
             <td style="text-align:center"><a href="{:U('show',array('id'=>$vo['id']))}">查看</a></td>
            </tr>
           </volist>
        </tbody>
      </table>
      <div class="p10">
        <div class="pages"> {$Page} </div>
      </div>
    </div> -->

    <!--代表性传承人 -->
    
    <!-- <div class="table_list"  <if condition="$data['0']['parent_artcid'] eq 75 and $data['0']['re_represen'] eq 2 ">style="display:block"<else/>style="display:none"</if>>
      <table width="100%" cellspacing="0">
        <thead>
          <tr>
            <td  align="left" width="20"><input type="checkbox" class="J_check_all" data-direction="x" data-checklist="J_check_x"></td>
            
            <td align="left">发布ID</td>
            <td align="left">姓名</td>
            <td align="left">性别</td>
            <td align="left">民族</td>
            <td align="left">出生年月</td>
            <td align="left">当选省级代表性传承人时间</td>
            <td align="left">当选省级代表性传承人批次</td>
            <td align="left">所在单位/主要开展传承活动地区</td>
            <td align="left">操作</td>
          </tr>
        </thead>
        <tbody>
        <volist name="lists" id="vo">
            <tr>
              <td><input type="checkbox"></td>
             <td style="text-align:center">{$vo.id}</td>
             <td style="text-align:center">{$vo.re_name}</td>
             <td style="text-align:center"><if condition="$vo.re_sex eq 1">男<else/>女</if></td>
             <td style="text-align:center"><if condition="$vo.re_nation eq ''">无<else/>{$vo.re_nation}</if></td>
             <td style="text-align:center"><if condition="$vo.re_birth eq '0'">无<else/>{$vo.re_birth}</if></td>
             <td style="text-align:center"><if condition="$vo.re_directorytime eq ''">无<else/>{$vo.re_directorytime}</if></td>
             <td style="text-align:center"><if condition="$vo.re_batch eq ''">无<else/>{$vo.re_batch}</if></td>
             <td style="text-align:center"><if condition="$vo.re_belongunit eq ''">无<else/>{$vo.re_belongunit}</if></td>
             <td style="text-align:center"><a href="{:U('show',array('id'=>$vo['id']))}">查看</a></td>
            </tr>
           </volist>
        </tbody>
      </table>
      <div class="p10">
        <div class="pages"> {$Page} </div>
      </div>
    </div> -->

    <!-- 文化生态保护 国家级 -->

    <!-- <div class="table_list"  <if condition="$data['0']['parent_artcid'] eq 76 and $data['0']['level'] eq '国家级' ">style="display:block"<else/>style="display:none"</if>>
      <table width="100%" cellspacing="0">
        <thead>
          <tr>
            <td  align="left" width="20"><input type="checkbox" class="J_check_all" data-direction="x" data-checklist="J_check_x"></td>
            
            <td align="left">发布ID</td>
            <td align="left">国家级文化生态保护区总体概况</td>
            <td align="left">晋中文化生态保护区简介</td>
            <td align="left">总体规划及实施细则</td>
            <td align="left">相关制度办法</td>
            <td align="left">课题研究、保护区内国家级非遗代表性项目</td>
            <td align="left">综合传习中心</td>
            <td align="left">操作</td>
          </tr>
        </thead>
        <tbody>
        <volist name="lists" id="vo">
            <tr>
              <td><input type="checkbox"></td>
             <td style="text-align:center">{$vo.id}</td>
             <td style="text-align:center">{$vo.prot_survey}</td>
             <td style="text-align:center">{$vo.prot_introduction}</td>
             <td style="text-align:center"><if condition="$vo.prot_rule eq ''">无<else/>{$vo.prot_rule}</if></td>
             <td style="text-align:center"><if condition="$vo.prot_method eq '0'">无<else/>{$vo.prot_method}</if></td>
             <td style="text-align:center"><if condition="$vo.prot_topic eq ''">无<else/>{$vo.prot_topic}</if></td>
             <td style="text-align:center"><if condition="$vo.prot_center eq ''">无<else/>{$vo.prot_center}</if></td>
             <td style="text-align:center"><a href="{:U('show',array('id'=>$vo['id']))}">查看</a></td>
            </tr>
           </volist>
        </tbody>
      </table>
      <div class="p10">
        <div class="pages"> {$Page} </div>
      </div>
    </div> -->

   <!-- 文化生态保护 省级 -->
    <!-- <div class="table_list"  <if condition="$data['0']['parent_artcid'] eq 76 and $data['0']['level'] eq '省级' ">style="display:block"<else/>style="display:none"</if>>
      <table width="100%" cellspacing="0">
        <thead>
          <tr>
            <td  align="left" width="20"><input type="checkbox" class="J_check_all" data-direction="x" data-checklist="J_check_x"></td>
            
            <td align="left">发布ID</td>
            <td align="left">保护区简介</td>
            <td align="left">相关制度办法</td>
            <td align="left">课题研究</td>
            <td align="left">保护区内非遗代表性项目</td>
            <td align="left">综合传习中心</td>
            <td align="left">操作</td>
          </tr>
        </thead>
        <tbody>
        <volist name="lists" id="vo">
            <tr>
              <td><input type="checkbox"></td>
             <td style="text-align:center">{$vo.id}</td>
             <td style="text-align:center">{$vo.prot_introduction}</td>
             <td style="text-align:center">{$vo.prot_method}</td>
             <td style="text-align:center"><if condition="$vo.prot_topic eq ''">无<else/>{$vo.prot_topic}</if></td>
             <td style="text-align:center"><if condition="$vo.prot_projects eq '0'">无<else/>{$vo.prot_projects}</if></td>
             <td style="text-align:center"><if condition="$vo.prot_center eq ''">无<else/>{$vo.prot_center}</if></td>
             <td style="text-align:center"><a href="{:U('show',array('id'=>$vo['id']))}">查看</a></td>
            </tr>
           </volist>
        </tbody>
      </table>
      <div class="p10">
        <div class="pages"> {$Page} </div>
      </div>
    </div> -->

    <!-- 生产性保护示范基地 -->
    <!-- <div class="table_list"  <if condition="$data['0']['parent_artcid'] eq 77  ">style="display:block"<else/>style="display:none"</if>>
      <table width="100%" cellspacing="0">
        <thead>
          <tr>
            <td  align="left" width="20"><input type="checkbox" class="J_check_all" data-direction="x" data-checklist="J_check_x"></td>
            
            <td align="left">发布ID</td>
            <td align="left">基地简介</td>
            <td align="left">成立时间</td>
            <td align="left">所属地区</td>
            <td align="left">基地名称</td>
            <td align="left">级别</td>
            <td align="left">操作</td>
          </tr>
        </thead>
        <tbody>
        <volist name="lists" id="vo">
            <tr>
              <td><input type="checkbox"></td>
             <td style="text-align:center">{$vo.id}</td>
             <td style="text-align:center">{$vo.ba_introduction}</td>
             <td style="text-align:center">{$vo.ba_creattime}</td>
             <td style="text-align:center"><if condition="$vo.area_display eq ''">无<else/>{$vo.area_display}</if></td>
             <td style="text-align:center"><if condition="$vo.ba_name eq ''">无<else/>{$vo.ba_name}</if></td>
             <td style="text-align:center"><if condition="$vo.level eq ''">无<else/>{$vo.level}</if></td>
             <td><a href="{:U('show',array('id'=>$vo['id']))}">查看</a></td>
            </tr>
           </volist>
        </tbody>
      </table>
      <div class="p10">
        <div class="pages"> {$Page} </div>
      </div>
    </div> -->

    <!-- 乡村文化记忆工程 试点工作 -->

    <!-- <div class="table_list"  <if condition="$data['0']['parent_artcid'] eq 114  ">style="display:block"<else/>style="display:none"</if>>
      <table width="100%" cellspacing="0">
        <thead>
          <tr>
            <td  align="left" width="20"><input type="checkbox" class="J_check_all" data-direction="x" data-checklist="J_check_x"></td>
            
            <td align="left">发布ID</td>
            <td align="left">工作方案</td>
            <td align="left">工作手册</td>
            <td align="left">试点乡镇名单</td>
            <td align="left">其他</td>
            
            <td align="left">操作</td>
          </tr>
        </thead>
        <tbody>
        <volist name="lists" id="vo">
            <tr>
              <td><input type="checkbox"></td>
             <td style="text-align:center">{$vo.id}</td>
             <td style="text-align:center">{$vo.me_plan}</td>
             <td style="text-align:center">{$vo.me_manual}</td>
             <td style="text-align:center"><if condition="$vo.me_list eq ''">无<else/>{$vo.me_list}</if></td>
             <td style="text-align:center"><if condition="$vo.me_more eq '0'">无<else/>{$vo.me_more}</if></td>
             <td><a href="{:U('show',array('id'=>$vo['id']))}">查看</a></td>
            </tr>
           </volist>
        </tbody>
      </table>
      <div class="p10">
        <div class="pages"> {$Page} </div>
      </div>
    </div> -->
    <!--乡村文化记忆工程 典型经验交流 -->

    <!-- <div class="table_list"  <if condition="$data['0']['parent_artcid'] eq 115  ">style="display:block"<else/>style="display:none"</if>>
      <table width="100%" cellspacing="0">
        <thead>
          <tr>
            <td  align="left" width="20"><input type="checkbox" class="J_check_all" data-direction="x" data-checklist="J_check_x"></td>
            
            <td align="left">发布ID</td>
            <td align="left">典型乡镇</td>
            <td align="left">经验交流</td>
            <td align="left">操作</td>
          </tr>
        </thead>
        <tbody>
        <volist name="lists" id="vo">
            <tr>
              <td><input type="checkbox"></td>
             <td style="text-align:center">{$vo.id}</td>
             <td style="text-align:center">{$vo.me_typical}</td>
             <td style="text-align:center">{$vo.me_exchange}</td>
             <td style="text-align:center"><a href="{:U('show',array('id'=>$vo['id']))}">查看</a></td>
            </tr>
           </volist>
        </tbody>
      </table>
      <div class="p10">
        <div class="pages"> {$Page} </div>
      </div>
    </div> -->

    <!--乡村文化记忆工程 宣传推广活动 -->

    <!-- <div class="table_list"  <if condition="$data['0']['parent_artcid'] eq 116  ">style="display:block"<else/>style="display:none"</if>>
      <table width="100%" cellspacing="0">
        <thead>
          <tr>
            <td  align="left" width="20"><input type="checkbox" class="J_check_all" data-direction="x" data-checklist="J_check_x"></td>
            
            <td align="left">发布ID</td>
            <td align="left">媒体报道</td>
             <td align="left">操作</td>

            
          </tr>
        </thead>
        <tbody>
        <volist name="lists" id="vo">
            <tr>
              <td><input type="checkbox"></td>
             <td style="text-align:center">{$vo.id}</td>
             <td style="text-align:center">{$vo.me_media}</td>      
             <td style="text-align:center"><a href="{:U('show',array('id'=>$vo['id']))}">查看</a></td>
            </tr>
           </volist>
        </tbody>
      </table>
      <div class="p10">
        <div class="pages"> {$Page} </div>
      </div>
    </div> -->
    <!-- 非遗展示  展示传习点-->
    <!-- <div class="table_list"  <if condition="$data['0']['parent_artcid'] eq 117  ">style="display:block"<else/>style="display:none"</if>>
      <table width="100%" cellspacing="0">
        <thead>
          <tr>
            <td  align="left" width="20"><input type="checkbox" class="J_check_all" data-direction="x" data-checklist="J_check_x"></td>
            
            <td align="left">发布ID</td>
            <td align="left">名称</td>
            <td align="left">建设年代</td>
            <td align="left">基本情况</td>
            <td align="left">展示内容</td>
            <td align="left">重点非遗项目</td>
             <td align="left">操作</td>
            
          </tr>
        </thead>
        <tbody>
        <volist name="lists" id="vo">
            <tr>
              <td><input type="checkbox"></td>
             <td style="text-align:center">{$vo.id}</td>
             <td style="text-align:center">{$vo.sh_name}</td>
             <td style="text-align:center">{$vo.sh_building}</td>
             <td style="text-align:center">{$vo.sh_situation}</td>
             <td style="text-align:center">{$vo.sh_content}</td>
             <td style="text-align:center">{$vo.sh_key}</td>
             <td style="text-align:center"><a href="{:U('show',array('id'=>$vo['id']))}">查看</a></td>
            </tr>
           </volist>
        </tbody>
      </table>
      <div class="p10">
        <div class="pages"> {$Page} </div>
      </div>
    </div> -->

    <!--非遗展示 展示活动 -->
    <!-- <div class="table_list"  <if condition="$data['0']['parent_artcid'] eq 118  ">style="display:block"<else/>style="display:none"</if>>
      <table width="100%" cellspacing="0">
        <thead>
          <tr>
            <td  align="left" width="20"><input type="checkbox" class="J_check_all" data-direction="x" data-checklist="J_check_x"></td>
            
            <td align="left">发布ID</td>
            <td align="left">名称</td>
            
            <td align="left">活动化内容</td>
             <td align="left">操作</td>
            
          </tr>
        </thead>
        <tbody>
        <volist name="lists" id="vo">
            <tr>
              <td><input type="checkbox"></td>
             <td style="text-align:center">{$vo.id}</td>
             <td style="text-align:center">{$vo.sh_name}</td>
             <td style="text-align:center">{$vo.sh_actcontent}</td>
             <td style="text-align:center"><a href="{:U('show',array('id'=>$vo['id']))}">查看</a></td>
            </tr>
           </volist>
        </tbody>
      </table>
      <div class="p10">
        <div class="pages"> {$Page} </div>
      </div>
    </div> -->

</div>
<script src="{$config_siteurl}statics/js/common.js?v"></script>
<script src="{$config_siteurl}statics/js/content_addtop.js"></script>
<script>
 function gettype(obj) {
     var val = obj.value;
    // var type=$(".J_ajaxForm").attr('data-represen');
    // alert(type);
    if(val == 1){
     $("form[data-represen=" +1 + "]").show().siblings("form").hide().end().find(".represen").find("option[value="+val+"]").attr("selected","selected");
    }else{
      $("form[data-represen=" +2 + "]").show().siblings("form").hide().end().find(".represen").find("option[value="+val+"]").attr("selected","selected");
    }
     
 }

 function getlevel(obj){
   var level=obj.value;
     
    
    if(level == '国家级'){
     $("form[data-level=" +'国家级' + "]").show().siblings("form").hide();
    }else{
      $("form[data-level=" +'省级'+ "]").show().siblings("form").hide();
    }


 }


function check(form) { 
     //console.log(form.re_represen.value);

          if(form.re_represen.value=='0') {
                alert("请选择代表性!");
                form.re_represen.focus();
                return false;
           }
       
         return true;
         }
function checklevel(form) { 
     console.log(form.level.value);

          if(form.level.value=='0') {
                alert("请选择级别!");
                form.level.focus();
                return false;
           }
       
         return true;
         }       

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
    //                     var list = '',title='';
    //                     console.log(result.data);
    //                     if(!!result.data.list){
    //                         $.each(result.data.list,function(i,v){
    //                             // console.log(v.parent_artcid);
    //                             // var cid = v.art_cid;
    //                             var re_unit = v.re_unit == '' ? '无' : v.re_unit;
    //                             var re_directorytime = v.re_directorytime == '' ? '无' : v.re_directorytime;
    //                             var re_batch = v.re_batch == '' ? '无' : v.re_batch;
    //                             var re_protectunit = v.re_protectunit == '' ? '无' : v.re_protectunit;
    //                             var re_nation = v.re_nation == '' ? '无' : v.re_nation;
    //                             var re_belongunit = v.re_belongunit == '' ? '无' : v.re_belongunit;
    //                             var prot_rule = v.prot_rule == '' ? '无' : v.prot_rule;
    //                             var prot_method = v.prot_method == '' ? '无' : v.prot_method;
    //                             var prot_topic = v.prot_topic == '' ? '无' : v.prot_topic;
    //                             var prot_center = v.prot_center == '' ? '无' : v.prot_center;
    //                             var area_display = v.area_display == '' ? '无' : v.area_display;
    //                             var ba_name = v.ba_name == '' ? '无' : v.ba_name;
    //                             var level = v.level == '' ? '无' : v.level;
    //                             var me_list = v.me_list == '' ? '无' : v.me_list;
    //                             var me_more = v.me_more == '' ? '无' : v.me_more;
    //                             var re_birth = v.re_birth == '0' ? '无' : v.re_birth;
    //                             var prot_projects = v.prot_projects == '0' ? '无' : v.prot_projects;
    //                             var re_sex = v.re_sex == '1' ? '男' : '女';
    //                             if(v.parent_artcid == '75' && v.re_represen == '1'){                                   
                                    
    //                                 title = '<tr>'+
    //                                             '<td align="left" width="20"><input type="checkbox" class="J_check_all" data-direction="x" data-checklist="J_check_x"></td>'+
    //                                             '<td align="left">发布ID</td>'+
    //                                             '<td align="left">项目编号</td>'+
    //                                             '<td align="left">项目简介</td>'+
    //                                             '<td align="left">申报地区或单位</td>'+
    //                                             '<td align="left">入选本级名录时间</td>'+
    //                                             '<td align="left">入选本级名录批次</td>'+
    //                                             '<td align="left">项目保护单位</td>'+
    //                                             '<td align="left">操作</td>'+
    //                                         '</tr>';
                                                
    //                                 list += '<tr>'+
    //                                             '<td align="center"><input type="checkbox"></td>'+
    //                                             '<td align="center">'+v.id+'</td>'+
    //                                             '<td align="center">'+v.re_itemnum+'</td>'+
    //                                             '<td align="center">'+v.re_introduction+'</td>'+
    //                                             '<td align="center">'+re_unit+'</td>'+
    //                                             '<td align="center">'+re_directorytime+'</td>'+
    //                                             '<td align="center">'+re_batch+'</td>'+
    //                                             '<td align="center">'+re_protectunit+'</td>'+
    //                                             '<td align="center"><a href="/index.php?g=Admin&m=Immaterial&a=show&id='+v.id+'">查看</a></td>'+
    //                                         '</tr>';
    //                             }else if(v.parent_artcid == '75' && v.re_represen == '2'){
    //                                 title = '<tr>'+
    //                                             '<td align="left" width="20"><input type="checkbox" class="J_check_all" data-direction="x" data-checklist="J_check_x"></td>'+
    //                                             '<td align="left">发布ID</td>'+
    //                                             '<td align="left">姓名</td>'+
    //                                             '<td align="left">性别</td>'+
    //                                             '<td align="left">民族</td>'+
    //                                             '<td align="left">出生年月</td>'+
    //                                             '<td align="left">当选省级代表性传承人时间</td>'+
    //                                             '<td align="left">当选省级代表性传承人批次</td>'+
    //                                             '<td align="left">所在单位/主要开展传承活动地区</td>'+
    //                                             '<td align="left">操作</td>'+
    //                                         '</tr>';
                                                
    //                                 list += '<tr>'+
    //                                             '<td align="center"><input type="checkbox"></td>'+
    //                                             '<td align="center">'+v.id+'</td>'+
    //                                             '<td align="center">'+v.re_name+'</td>'+
    //                                             '<td align="center">'+re_sex+'</td>'+
    //                                             '<td align="center">'+re_nation+'</td>'+
    //                                             '<td align="center">'+re_birth+'</td>'+
    //                                             '<td align="center">'+re_directorytime+'</td>'+
    //                                             '<td align="center">'+re_batch+'</td>'+
    //                                             '<td align="center">'+re_belongunit+'</td>'+
    //                                             '<td align="center"><a href="/index.php?g=Admin&m=Immaterial&a=show&id='+v.id+'">查看</a></td>'+
    //                                         '</tr>';
    //                             }else if(v.parent_artcid == '76' && v.level == '国家级'){
    //                                 title = '<tr>'+
    //                                             '<td align="left" width="20"><input type="checkbox" class="J_check_all" data-direction="x" data-checklist="J_check_x"></td>'+
    //                                             '<td align="left">发布ID</td>'+
    //                                             '<td align="left">国家级文化生态保护区总体概况</td>'+
    //                                             '<td align="left">晋中文化生态保护区简介</td>'+
    //                                             '<td align="left">总体规划及实施细则</td>'+
    //                                             '<td align="left">相关制度办法</td>'+
    //                                             '<td align="left">课题研究、保护区内国家级非遗代表性项目</td>'+
    //                                             '<td align="left">综合传习中心</td>'+
    //                                             '<td align="left">操作</td>'+
    //                                         '</tr>';
                                                
    //                                 list += '<tr>'+
    //                                             '<td align="center"><input type="checkbox"></td>'+
    //                                             '<td align="center">'+v.id+'</td>'+
    //                                             '<td align="center">'+v.prot_survey+'</td>'+
    //                                             '<td align="center">'+v.prot_introduction+'</td>'+
    //                                             '<td align="center">'+prot_rule+'</td>'+
    //                                             '<td align="center">'+prot_method+'</td>'+
    //                                             '<td align="center">'+prot_topic+'</td>'+
    //                                             '<td align="center">'+prot_center+'</td>'+
    //                                             '<td align="center"><a href="/index.php?g=Admin&m=Immaterial&a=show&id='+v.id+'">查看</a></td>'+
    //                                         '</tr>';
    //                             }else if(v.parent_artcid == '76' && v.level == '省级'){
    //                                 title = '<tr>'+
    //                                             '<td align="left" width="20"><input type="checkbox" class="J_check_all" data-direction="x" data-checklist="J_check_x"></td>'+
    //                                             '<td align="left">发布ID</td>'+
    //                                             '<td align="left">保护区简介</td>'+
    //                                             '<td align="left">相关制度办法</td>'+
    //                                             '<td align="left">课题研究</td>'+
    //                                             '<td align="left">保护区内非遗代表性项目</td>'+
    //                                             '<td align="left">综合传习中心</td>'+
    //                                             '<td align="left">操作</td>'+
    //                                         '</tr>';
                                                
    //                                 list += '<tr>'+
    //                                             '<td align="center"><input type="checkbox"></td>'+
    //                                             '<td align="center">'+v.id+'</td>'+
    //                                             '<td align="center">'+v.prot_introduction+'</td>'+
    //                                             '<td align="center">'+v.prot_method+'</td>'+
    //                                             '<td align="center">'+prot_topic+'</td>'+
    //                                             '<td align="center">'+prot_projects+'</td>'+
    //                                             '<td align="center">'+prot_center+'</td>'+
    //                                             '<td align="center"><a href="/index.php?g=Admin&m=Immaterial&a=show&id='+v.id+'">查看</a></td>'+
    //                                         '</tr>';
    //                             }else if(v.parent_artcid == '77'){
    //                                 title = '<tr>'+
    //                                             '<td align="left" width="20"><input type="checkbox" class="J_check_all" data-direction="x" data-checklist="J_check_x"></td>'+
    //                                             '<td align="left">发布ID</td>'+
    //                                             '<td align="left">基地简介</td>'+
    //                                             '<td align="left">成立时间</td>'+
    //                                             '<td align="left">所属地区</td>'+
    //                                             '<td align="left">基地名称</td>'+
    //                                             '<td align="left">级别</td>'+
    //                                             '<td align="left">操作</td>'+
    //                                         '</tr>';
                                                
    //                                 list += '<tr>'+
    //                                             '<td align="center"><input type="checkbox"></td>'+
    //                                             '<td align="center">'+v.id+'</td>'+
    //                                             '<td align="center">'+v.ba_introduction+'</td>'+
    //                                             '<td align="center">'+v.ba_creattime+'</td>'+
    //                                             '<td align="center">'+area_display+'</td>'+
    //                                             '<td align="center">'+ba_name+'</td>'+
    //                                             '<td align="center">'+level+'</td>'+
    //                                             '<td align="center"><a href="/index.php?g=Admin&m=Immaterial&a=show&id='+v.id+'">查看</a></td>'+
    //                                         '</tr>';
    //                             }else if(v.parent_artcid == '114'){
    //                                 title = '<tr>'+
    //                                             '<td align="left" width="20"><input type="checkbox" class="J_check_all" data-direction="x" data-checklist="J_check_x"></td>'+
    //                                             '<td align="left">发布ID</td>'+
    //                                             '<td align="left">工作方案</td>'+
    //                                             '<td align="left">工作手册</td>'+
    //                                             '<td align="left">试点乡镇名单</td>'+
    //                                             '<td align="left">其他</td>'+
    //                                             '<td align="left">操作</td>'+
    //                                         '</tr>';
                                                
    //                                 list += '<tr>'+
    //                                             '<td align="center"><input type="checkbox"></td>'+
    //                                             '<td align="center">'+v.id+'</td>'+
    //                                             '<td align="center">'+v.me_plan+'</td>'+
    //                                             '<td align="center">'+v.me_manual+'</td>'+
    //                                             '<td align="center">'+me_list+'</td>'+
    //                                             '<td align="center">'+me_more+'</td>'+
    //                                             '<td align="center"><a href="/index.php?g=Admin&m=Immaterial&a=show&id='+v.id+'">查看</a></td>'+
    //                                         '</tr>';
    //                             }else if(v.parent_artcid == '115'){
    //                                 title = '<tr>'+
    //                                             '<td align="left" width="20"><input type="checkbox" class="J_check_all" data-direction="x" data-checklist="J_check_x"></td>'+
    //                                             '<td align="left">发布ID</td>'+
    //                                             '<td align="left">典型乡镇</td>'+
    //                                             '<td align="left">经验交流</td>'+
    //                                             '<td align="left">操作</td>'+
    //                                         '</tr>';
                                                
    //                                 list += '<tr>'+
    //                                             '<td align="center"><input type="checkbox"></td>'+
    //                                             '<td align="center">'+v.id+'</td>'+
    //                                             '<td align="center">'+v.me_typical+'</td>'+
    //                                             '<td align="center">'+v.me_exchange+'</td>'+
    //                                             '<td align="center"><a href="/index.php?g=Admin&m=Immaterial&a=show&id='+v.id+'">查看</a></td>'+
    //                                         '</tr>';
    //                             }else if(v.parent_artcid == '116'){
    //                                 title = '<tr>'+
    //                                             '<td align="left" width="20"><input type="checkbox" class="J_check_all" data-direction="x" data-checklist="J_check_x"></td>'+
    //                                             '<td align="left">发布ID</td>'+
    //                                             '<td align="left">媒体报道</td>'+
    //                                             '<td align="left">操作</td>'+
    //                                         '</tr>';
                                                
    //                                 list += '<tr>'+
    //                                             '<td align="center"><input type="checkbox"></td>'+
    //                                             '<td align="center">'+v.id+'</td>'+
    //                                             '<td align="center">'+v.me_media+'</td>'+
    //                                             '<td align="center"><a href="/index.php?g=Admin&m=Immaterial&a=show&id='+v.id+'">查看</a></td>'+
    //                                         '</tr>';
    //                             }else if(v.parent_artcid == '117'){
    //                                 title = '<tr>'+
    //                                             '<td align="left" width="20"><input type="checkbox" class="J_check_all" data-direction="x" data-checklist="J_check_x"></td>'+
    //                                             '<td align="left">发布ID</td>'+
    //                                             '<td align="left">名称</td>'+
    //                                             '<td align="left">建设年代</td>'+
    //                                             '<td align="left">基本情况</td>'+
    //                                             '<td align="left">展示内容</td>'+
    //                                             '<td align="left">重点非遗项目</td>'+
    //                                             '<td align="left">操作</td>'+
    //                                         '</tr>';
                                                
    //                                 list += '<tr>'+
    //                                             '<td align="center"><input type="checkbox"></td>'+
    //                                             '<td align="center">'+v.id+'</td>'+
    //                                             '<td align="center">'+v.sh_name+'</td>'+
    //                                             '<td align="center">'+v.sh_building+'</td>'+
    //                                             '<td align="center">'+v.sh_situation+'</td>'+
    //                                             '<td align="center">'+v.sh_content+'</td>'+
    //                                             '<td align="center">'+v.sh_key+'</td>'+
    //                                             '<td align="center"><a href="/index.php?g=Admin&m=Immaterial&a=show&id='+v.id+'">查看</a></td>'+
    //                                         '</tr>';
    //                             }else if(v.parent_artcid == '117'){
    //                                 title = '<tr>'+
    //                                             '<td align="left" width="20"><input type="checkbox" class="J_check_all" data-direction="x" data-checklist="J_check_x"></td>'+
    //                                             '<td align="left">发布ID</td>'+
    //                                             '<td align="left">名称</td>'+
    //                                             '<td align="left">活动化内容</td>'+
    //                                             '<td align="left">操作</td>'+
    //                                         '</tr>';
                                                
    //                                 list += '<tr>'+
    //                                             '<td align="center"><input type="checkbox"></td>'+
    //                                             '<td align="center">'+v.id+'</td>'+
    //                                             '<td align="center">'+v.sh_name+'</td>'+
    //                                             '<td align="center">'+v.sh_actcontent+'</td>'+
    //                                             '<td align="center"><a href="/index.php?g=Admin&m=Immaterial&a=show&id='+v.id+'">查看</a></td>'+
    //                                         '</tr>';
    //                             }

    //                         })
    //                     }else{

    //                                list += '<span style="color:red">'+
                                               
    //                                             '没有相关数据'+
                                                
                                                
    //                                         '</span>'; 
                                
    //                     }
                        
    //                     $(".table_lists").find("thead").html(title);
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