<?php if (!defined('SHUIPF_VERSION')) exit(); ?>
<Admintemplate file="Common/Head"/>
<body>
<div class="wrap">
    <div class="nav">
      <ul class="cc" style="width:100%">
          <li class="current"><a href="{:U('live')}">艺术节直播安排</a></li>
          <li class="adminbtnbox"><a class="lib_add" href="{:U('liveadd')}">添加</a></li>
      </ul>
    </div>
    <div class="table_list">
     
      <table width="100%" cellspacing="0">
        <thead>
          <tr>
            <td align="center">序号</td>
            <td align="center">标题</td>
            <td align="center">链接</td>
            <td align="center">直播时间</td>
            <td align="center">是否显示</td>
            <td align="center">上传者</td>
            
            <td align="center">操作</td>
          </tr>
        </thead>
        <tbody>
        
          <volist name="data" id="vo">
            <tr>
              <td align="center">{$vo.id}</td>
              <td align="center">{$vo.title}</td>
              <td align="center">{$vo.url}</td>
              <td align="center">{$vo.periodical_date}</td>
              <td align="center">{$vo.position}</td>
              <td align="center">{$vo.username}</td> 
              <td align="center"><a href="{:U('Admin/Festival/liveedit', array('id'=>$vo['id']))}">[修改]</a>&nbsp;|&nbsp;<a href="{:U('Admin/Festival/livedelete', array('id'=>$vo['id']))}">[删除]</a></td>
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