<?php if (!defined('SHUIPF_VERSION')) exit(); ?>
<Admintemplate file="Common/Head"/>
<body>
<div class="wrap">
    <!-- <Admintemplate file="Common/Nav"/> -->
    
    <div class="nav">
    <ul class="cc" style="width:100%">
        <li class="current"><a href="{:U('exhibition')}">展览类活动</a></li>
         
        <li class="adminbtnbox">
            <input type="button" value="网络API数据导入" class='btn  btnlistlan btnlistgrey'  data-type="importapi" />
            <input type="button" value="硬件设备数据导入" class='btn  btnlistlan btnlistgrey'  />
            <input type="button" value="语音录入" class='btn  btnlistlan btnlistgrey'   />
          <input type="button" value="Excel数据导入" class='btn btnlistlan btnlistgrey' data-type="import"  style="margin-right: 20px;"  />

          <a class="lib_add" href="{:U('noticadd')}">添加</a></li>
    </ul>
    </div>
    
    
    <div class="table_list">
     
      <table width="100%" cellspacing="0">
        <thead>
          <tr>
            <td  align="center" width="25">选择</td>
            <td align="center">序号</td>
            <td align="center" width='120'>标题</td>
            
            <td align="center">上传时间</td>
            <!-- <td align="center">艺术团</td>
            <td align="center">所获奖项</td>
            <td align="center">主要表演者</td>-->
            <td align="center">上传者</td>
            <td align="center">来源</td>
            <td align="center">编辑</td>
           
            <td align="center">操作</td>
          </tr>
        </thead>
        <tbody>
        
          <volist name="data" id="vo">
            <tr>
             <td  align="center" width="20"><input type="checkbox" name="if_position[]" value="{$vo.id}" class="J_check_all" data-direction="x" data-checklist="J_check_x" ></td>
              <td align="center">{$vo.id}</td>
              <td align="center">{$vo.title}</td>
              <td align="center">{$vo.addtime}</td>
              <td align="center">{$vo.username}</td> 
              <td align="center">{$vo.source}</td>
              <td align="center">{$vo.editer}</td>
              <td align="center"><a href="{:U('Admin/Festival/noticedit', array('id'=>$vo['id']))}">[修改]</a>&nbsp;|&nbsp;<a href="{:U('Admin/Festival/noticdelete', array('id'=>$vo['id']))}">[删除]</a></td>
            </tr>
          </volist>
        </tbody>
      </table>
     
      
      <div class="p10">
        <div class="pages"> {$pageinfo.page} </div>
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