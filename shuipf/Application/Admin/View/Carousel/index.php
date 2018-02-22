<?php if (!defined('SHUIPF_VERSION')) exit(); ?>
<Admintemplate file="Common/Head"/>
<body class="J_scroll_fixed">
<div class="wrap J_check_wrap">
  <div class="nav">
    <ul class="cc" style="width:100%">
        <li  class="current"><a href="{:U('index')}">轮播设置</a></li>

        <li class="adminbtnbox">
        <a class="lib_add" href="{:U('show')}">添加</a>
        </li>
  </ul>
</div>
  
    <div class="table_list">
      <table width="100%" cellspacing="0">
        <thead>
          <tr>
            <!--<td align="center" width="30">ID</td>-->
            <td align="center" width="50">序号</td>
            <td align="center" width="60">地区名称</td>
            <td align="center" width="120">操作</td>
          </tr>
        </thead>
        <tbody>
          <volist name="data" id="vo">
            <tr>
              <td align="center">{$vo.id}</td>
              <td align="center">{$vo.areaname}</td>
              <td align="center">
            
                  <a href="{:U('show',['author_id'=>$vo['author_id']])}">修改</a>&nbsp;&nbsp;&nbsp;|
            
                &nbsp;&nbsp;&nbsp;<a href="{:U('delete',['id'=>$vo['id']])}">删除</a></td>
            </tr>
          </volist>
        </tbody>
      </table>
     <div class="p10">
            <div class="pages"> {$pageinfo.page}</div>
        </div>
    </div>
</div>
<script src="{$config_siteurl}statics/js/common.js"></script>
</body>
</html>