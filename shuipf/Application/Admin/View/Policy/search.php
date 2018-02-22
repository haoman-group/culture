<?php if (!defined('SHUIPF_VERSION')) exit(); ?>
<Admintemplate file="Common/Head"/>
<style type="text/css">
    .table_list tr,.table_list th,.table_list td{padding: 0;}
    .table_list th,.table_list td{padding: 3px 10px;}
    .table_list td{padding-left: 5px;}
    select.cid{margin-left: 10px;}    
</style>
<body class="J_scroll_fixed">
<div class="nav">
    <ul class="cc">
        <li class="current"><a href="{:U('search')}" >文化政策</a></li>
        
  </ul>
</div>
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
          </table>
          <form class="J_ajaxForm" action="" method="get">
                <input type="hidden" name="g" value="Admin">
                <input type="hidden" name="m" value="Policy">
                <input type="hidden" name="a" value="search">
                <input type="hidden" name="art_cid" value="">
                <input type="hidden" name="search" value="1">
              <table cellpadding="2" cellspacing="1" class="table_form" width="100%">
                  <tr>
                      <th width="147">发布时间：</th>
                      <td>
                          <input type="text" name="start_time" class="input length_2 J_date" value="{$Think.get.start_time}" style="width:80px;">
                          -
                          <input type="text" class="input length_2 J_date" name="end_time" value="{$Think.get.end_time}" style="width:80px;">
                      </td>
                  </tr>
                  <tr>
                      <th width="147">发布机构：</th>
                      <td>
                          <input class="input" type="text" name="publish_agency" value="{$Think.get.publish_agency}" />
                      </td>
                  </tr>
                  <tr>
                      <th width="147">发布名称：</th>
                      <td>
                          <input class="input" type="text" name="publish_name" value="{$Think.get.publish_name}" />
                      </td>
                  </tr>
                  <tr>
                      <th width="147">发布文号：</th>
                      <td>
                          <input class="input" type="text" name="publish_order" value="{$Think.get.publish_order}" />
                      </td>
                  </tr>
                  <tr>
                      <th width="147">主题词：</th>
                      <td>
                          <input  class="input"  type="text" name="publish_topword" value="{$Think.get.publish_topword}" />
                      </td>
                  </tr>
              </table>
              <div style="margin: 10px 0 0;">
                  <button class="btn">搜索</button>
                  <a style="margin-left:4px;" href="{:U('Admin/Policy/search')}" class="btn">清除条件</a>
                  <!-- <a style="margin-left:4px;" href="{:U('search')}" class="btn">清除条件</a> -->
              </div>
          </form>
      </div>
  </div>
  <!-- <form  action="" method="get" >
  <input type="hidden" name="g" value="admin">
  <input type="hidden" name="m" value="Policy">
  <input type="hidden" name="a" value="search">
   <input type="hidden" name="search" value="1">
    <div class="search_type cc mb10">
      <div class="mb10"> <span class="mr20"> 发布时间：
        <input type="text" name="start_time" class="input length_2 J_date" value="{$Think.get.start_time}" style="width:80px;">
        -
        <input type="text" class="input length_2 J_date" name="end_time" value="{$Think.get.end_time}" style="width:80px;">
        <span>发布机构:</span><input class="input" type="text" name="publish_agency" value="{$Think.get.publish_agency}">
        <span>发布名称:</span><input class="input" type="text" name="publish_name" value="{$Think.get.publish_name}">
        <span>发布文号:</span><input class="input" type="text" name="publish_order" value="{$Think.get.publish_order}">
        <span>主题词:</span><input  class="input"  type="text" name="publish_topword" value="{$Think.get.publish_topword}">
        <span class="mr20">类目：</span>
              <div id="category" style="display:inline-block;">
                  <select id="parentItems" name="art_cid" onchange="getchildlist(this)">
                      <option value='0'>请选择</option>
                      <volist name="result" id="ca">
                        <option value="{$ca['cid']}">{$ca['name']}</option>
                      </volist>
                  </select>
                  <div id="childItems" style="display:inline-block;"></div>
              </div>
        <button class="btn">搜索</button>
        </span> </div>
    </div>
  </form> -->
 
     <div class="table_list table_lists">
      <table width="100%" cellspacing="0">
        <thead>
          <tr>
            <td  align="left" width="20"><input type="checkbox" class="J_check_all" data-direction="x" data-checklist="J_check_x"></td>
            
            <td align="left">发布ID</td>
            <td align="left">类别</td>
            <td align="left">发布机构</td>
            <td align="left">发布时间</td>
            <td align="left">名称</td>
            <td align="left">文号</td>
            <td align="left">主题词</td>
            <!--<td align="left">内容</td>-->
            <td align="left">操作</td>
          </tr>
        </thead>
        <tbody>
          <volist name="data" id="vo">
            <tr>
              <td style="text-align:center"><input type="checkbox"></td>
             <td style="text-align:center">{$vo.id}</td>
              <td style="text-align:center">{$vo.categoryname}</td>
             <td style="text-align:center">{$vo.publish_agency}</td>
             <td style="text-align:center">{$vo.publish_date}</td>
             <td style="text-align:center">{$vo.publish_name}</td>
             <td style="text-align:center">{$vo.publish_order}</td>
             <td style="text-align:center">{$vo.publish_topword}</td>
             <!--<td style="text-align:center">{$vo.publish_content}</td>-->
             <td style="text-align:center"><a href="{:U('show',array('id'=>$vo['id']))}">查看</a></td>
            </tr>
          </volist>
        </tbody>
      </table>
      <div class="p10 page">
        <div class="pages"> {$Page} </div>
      </div>
    </div>
</div>
<script src="{$config_siteurl}statics/js/common.js?v"></script>
<script src="{$config_siteurl}statics/js/content_addtop.js"></script>
<script>
    $(function(){
        $("form").find("button.btn").on("click",function(){
            var _this = $(this).parents("form");
            $.ajax({
                type: 'GET',
                url: "{:U('search')}",
                dataType: 'json',
                data: _this.serialize(),
                success: function(result){
                    if(result.status == 1){
                        var list = '',title='';
                        console.log(result.data.list);
                        if(!!result.data.list){
                            $.each(result.data.list,function(i,v){
                                title = '<tr>'+
                                            '<td align="center" width="20"><input type="checkbox" class="J_check_all" data-direction="x" data-checklist="J_check_x"></td>'+
                                            '<td align="center">发布ID</td>'+
                                            '<td align="center">类别</td>'+
                                            '<td align="center">发布机构</td>'+
                                            '<td align="center">发布时间</td>'+
                                            '<td align="center">名称</td>'+
                                            '<td align="center">文号</td>'+
                                            '<td align="center">主题词</td>'+
                                            '<td align="center">操作</td>'+
                                        '</tr>';
                                            
                                list += '<tr>'+
                                            '<td align="center"><input type="checkbox"></td>'+
                                            '<td align="center">'+v.id+'</td>'+
                                            '<td align="center">'+v.categoryname+'</td>'+
                                            '<td align="center">'+v.publish_agency+'</td>'+
                                            '<td align="center">'+v.publish_date+'</td>'+
                                            '<td align="center">'+v.publish_name+'</td>'+
                                            '<td align="center">'+v.publish_order+'</td>'+
                                            '<td align="center">'+v.publish_topword+'</td>'+
                                            '<td align="center"><a href="/index.php?g=Admin&m=Policy&a=show&id='+v.id+'">查看</a></td>'+
                                        '</tr>';                                

                            })
                        }else{

                                   list += '<span style="color:red">'+
                                               
                                                '没有相关数据'+
                                                
                                                
                                            '</span>'; 
                                
                        }
                        
                        $(".table_lists").find("thead").html(title);
                        $(".table_lists").find("tbody").html(list);
                        $(".page").find(".pages").html(result.data.pageinfo.page);
                    }
                    
                }
            })
            return false;
        })
        // $("form:first").find("button.btn").trigger("click");
    })
</script>
</body>
</html>