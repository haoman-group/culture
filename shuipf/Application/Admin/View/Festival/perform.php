<?php if (!defined('SHUIPF_VERSION')) exit(); ?>
<Admintemplate file="Common/Head"/>
<body>
<div class="wrap">
    <!-- <Admintemplate file="Common/Nav"/> -->
    
    <div class="nav">
    <ul class="cc" style="width:100%">
        <li class="current"><a href="{:U('perform')}">表演类活动</a></li>
         
        <li class="adminbtnbox">
            <input type="button" value="网络API数据导入" class='btn  btnlistlan btnlistgrey'  data-type="importapi" />
            <input type="button" value="硬件设备数据导入" class='btn  btnlistlan btnlistgrey'  />
            <input type="button" value="语音录入" class='btn  btnlistlan btnlistgrey'   />
          <input type="button" value="Excel数据导入" class='btn btnlistlan btnlistgrey' data-type="import"  style="margin-right: 20px;"  />

          <a class="lib_add" href="{:U('performadd')}">添加</a></li>
    </ul>
    </div>
    <div class="h_a">搜索</div>
    <div class="table_list">
        <div class="table_full">
            <form class="J_ajaxForm" action="{:U('perform')}" method="get">
            <input type="hidden" name="g" value="Admin">
            <input type="hidden" name="m" value="Festival">
            <input type="hidden" name="a" value="perform">
           
            <table cellpadding="2" cellspacing="1" class="table_form" width="">
                <tr>
                    <th >类目：</th>
                    <td>
                        <div id="category" style="display:inline-block;">
                            <select name="categorytype">
                               <option value="all">全部</option>
                                <volist name="category" id="vo">
                                    <if condition="$key EGT 10 && $key ELT 19">
                                        <option value="{$key}" <if condition="$Think.get.categorytype eq $key"> selected="selected" </if>>{$vo}</option>
                                    </if>
                                </volist>

                            </select>
                            
                        </div>
                    </td>
                    <th>标题:</th>
                    <td><input type="text" name="title" value="{$Think.get.title}" class="input"></td>
                    <td>
                      <button class="btn btn_submit mr10 J_ajax_submit_btn" >搜索</button>
                      <a style="" href="{:U('perform')}" class="btn">清除条件</a>
                    </td>
                </tr>
            </table>
            </form>
        </div>
    </div>
    <div class="table_list">
     
      <table width="100%" cellspacing="0">
        <thead>
          <tr>
            <td  align="center" width="25">选择</td>
            <td align="center">序号</td>
            <td align="center" width='120'>标题</td>
            <td align="center">分类</td> 
            <td align="center">活动时间</td>
            <td align="center">活动地点</td>
            <td align="center">上传者</td>
            <td align="center">操作</td>
          </tr>
        </thead>
        <tbody>
         
         
          <volist name="data" id="vo">
            <tr>
             <td  align="center" width="20"><input type="checkbox" name="if_position[]" value="{$vo.id}" class="J_check_all" data-direction="x" data-checklist="J_check_x" ></td>
              <td align="center">{$vo.id}</td>
              <td align="center">{$vo.title}/{$vo.deputy_title}</td>
              <td align="center">{$vo.categoryname}</td> 
              <td align="center">{$vo.start_date|default=""|date="Y-m-d",###}-{$vo.end_date|default=""|date="Y-m-d",###}</td>
              <td align="center">{$vo.site}</td>
              <td align="center">{$vo.username}</td>
              
              <td align="center"><a href="{:U('Admin/Festival/performedit', array('id'=>$vo['id']))}">[修改]</a>&nbsp;|&nbsp;<a href="{:U('Admin/Festival/performdelete', array('id'=>$vo['id']))}">[删除]</a></td>
            </tr>
          </volist>
        </tbody>
      </table>
    
      <div class="p10">
        <div class="pages">{$pageinfo.page} </div>
      </div>
    </div>
</div>
</body>
<script type="text/javascript" src="{$config_siteurl}statics/cu/layer/layer.js"></script>
<script>
 $('input.btnlistlan').on('click',function(){
        var type = $(this).data('type');

     if($(this).hasClass("btnlistgrey")){
         layer.msg("功能暂未开放")
     }
     else{
         var index = layer.open({
             type: 2,
             title: '添加',
             shadeClose: true,
             shade: 0.8,
             area: ['40%', '40%'],
             content: '/Admin/Art/'+type
         });
     }
       

    });
</script>
</html>