<?php if (!defined('SHUIPF_VERSION')) exit(); ?>
<Admintemplate file="Common/Head"/>
<body>
<div class="wrap">
    <!-- <Admintemplate file="Common/Nav"/> -->
    
    <div class="nav">
    <ul class="cc" style="width:100%">
        <li class="current"><a href="{:U('position')}">精品推荐</a></li>
    </ul>
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
            <td align="center">上传时间</td>
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
              <td align="center">{$vo.categoryname}</td>
              <td align="center">{$vo.start_date|default=""|date="Y-m-d",###}-{$vo.end_date||default=""|date="Y-m-d",###}</td>
              <td align="center">{$vo.site}</td>
              <td align="center">{$vo.addtime}</td>
              <td align="center">{$vo.username}</td> 
              <td align="center">{$vo.source}</td>
              <td align="center">{$vo.editer}</td>
              <td align="center"><a href="{:U('Admin/Festival/position', array('id'=>$vo['id']))}">[取消推荐]</a></td>
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
</html>