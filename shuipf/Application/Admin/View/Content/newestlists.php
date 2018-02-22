<?php if (!defined('SHUIPF_VERSION')) exit(); ?>
<Admintemplate file="Common/Head"/>
<body>
<div class="wrap">
    <!-- <Admintemplate file="Common/Nav"/> -->
    <div class="nav">
    <ul class="cc" style="width:100%">
        <li class="current"><a href="###">最新资讯</a></li>
         
        <li class="adminbtnbox">
            <input type="button" value="网络API数据导入" class='btn  btnlistlan btnlistgrey'  data-type="importapi" />
            <input type="button" value="硬件设备数据导入" class='btn  btnlistlan btnlistgrey'  />
            <input type="button" value="语音录入" class='btn  btnlistlan btnlistgrey'   />
          <input type="button" value="Excel数据导入" class='btn btnlistlan btnlistgrey' data-type="import"  style="margin-right: 20px;"  />

          <a class="lib_add" href="{:U('newestadd')}">添加</a></li>
    </ul>
    </div>
    <div class="table_list">
     
      <table width="100%" cellspacing="0">
        <thead>
          <tr>
            <td  align="center" width="20"><input type="checkbox" class="J_check_all" data-direction="x" data-checklist="J_check_x"></td>
            <td align="center">序号</td>
            <td align="center">分类</td> 
             <td align="center">标题</td>
            <td align="center">上传单位</td>
            <!-- <td align="center">艺术团</td>
            <td align="center">所获奖项</td>
            <td align="center">主要表演者</td>-->
           
            <td align="center">上传时间</td>
            <td align="center">发布时间</td>
            <td align="center">操作</td>
          </tr>
        </thead>
        <tbody>
          <volist name="data" id="vo">
            <tr>
             <td  align="center" width="20"><input type="checkbox" class="J_check_all" data-direction="x" data-checklist="J_check_x"></td>
              <td align="center">{$vo.id}</td>
              <td align="center">{$vo.categoryname}</td>
              <td align="center">{$vo.title}</td> 
              <td align="center">{$vo.upload_unit}</td>
              <td align="center"><?php echo date("Y-m-d H:i:s",$vo['addtime']) ?></td>
              <td align="center">
              <?php
                if($vo['post_time'] <= date('Y-m-d H:i:s')|| empty($vo['post_time']) )
                  echo '已发布';
                else
                  echo '未发布['.$vo['post_time'].']';
              ?>
              </td>
              <td align="center"><a href="{:U('Admin/Content/newestedit', array('id'=>$vo['id']))}">[修改]</a>&nbsp;|&nbsp;<a href="{:U('Admin/Content/newestdelete', array('id'=>$vo['id']))}">[删除]</a></td>
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