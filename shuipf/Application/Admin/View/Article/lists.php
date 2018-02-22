<?php if (!defined('SHUIPF_VERSION')) exit(); ?>
<Admintemplate file="Common/Head"/>
<body>
<div class="wrap">
    <!-- <Admintemplate file="Common/Nav"/> -->
    <div class="nav">
    <ul class="cc">
        <li class="current"><a href="">文章管理</a></li>
  </ul>
</div>
    <div class="table_list">
     
      <table width="100%" cellspacing="0">
        <thead>
          <tr>
            <td  align="center" width="20"><input type="checkbox" class="J_check_all" data-direction="x" data-checklist="J_check_x"></td>
            <td align="center">序号</td>
             <td align="center">主标题</td>
            <td align="center">上传时间</td> 
            <td align="center">馆站</td>
            <td align="center">类型</td>
            <td align="center">操作</td>
          </tr>
        </thead>
        <tbody>
          <volist name="data" id="vo">
            <tr>
             <td  align="center" width="20"><input type="checkbox" class="J_check_all" data-direction="x" data-checklist="J_check_x"></td>
              <td align="center">{$vo.id}</td>
              <td align="center">{$vo.content_title}</td>
              <td align="center">{$vo.addtime}</td>
              <td align="center">{$vo.activecategory}</td> 
              <td align="center">{$vo.category}</td>
              <td align="center"><a href="{:U('Admin/Article/articlelists', array('parent_id'=>$vo['id']))}">[查看]</a></td>
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