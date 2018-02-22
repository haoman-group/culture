<?php if (!defined('SHUIPF_VERSION')) exit(); ?>
<Admintemplate file="Common/Head"/>
<body>
<div class="wrap">
    <!-- <Admintemplate file="Common/Nav"/> -->
    <div class="nav">
    <ul class="cc">
        <li class="current"><a href="{:U('lists')}">文章管理</a></li>
        <li ><a class="lib_add" href="{:U('add',array('parent_id'=>$_GET['id']))}">添加</a></li>
  </ul>
</div>
    <div class="table_list">
     
      <table width="100%" cellspacing="0">
        <thead>
          <tr>
            <td  align="center" width="20"><input type="checkbox" class="J_check_all" data-direction="x" data-checklist="J_check_x"></td>
            <td align="center">序号</td>
             <td align="center">主标题</td>
            <td align="center">主讲人</td> 
            <td align="center">开课时间</td>
            <td align="center">上传时间</td>

            <td align="center">操作</td>
          </tr>
        </thead>
        <tbody>
          <volist name="data" id="vo">
            <tr>
             <td  align="center" width="20"><input type="checkbox" class="J_check_all" data-direction="x" data-checklist="J_check_x"></td>
              <td align="center">{$vo.id}</td>
              <td align="center">{$vo.subtitle}</td>
              <td align="center">{$vo.lecturer}</td>
              <td align="center">{$vo.start_time}</td> 
              <td align="center">{$vo.addtime}</td>
              <td align="center"><a href="{:U('Admin/Article/edit', array('id'=>$vo['id']))}">[修改]</a>&nbsp;|&nbsp;<a href="{:U('Admin/Article/delete', array('id'=>$vo['id'],'parent_id'=>$vo['parent_id']))}">[删除]</a></td>
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
</html>