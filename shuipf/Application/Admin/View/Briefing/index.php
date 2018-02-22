<?php if (!defined('SHUIPF_VERSION')) exit(); ?>
<Admintemplate file="Common/Head"/>
<body>
<div class="wrap">
    <!-- <Admintemplate file="Common/Nav"/> -->
    
    <div class="nav">
    <ul class="cc" style="width:100%">
        <li class="current"><a href="{:U('index')}">演出活动新闻简报</a></li>
        <li class="adminbtnbox">
          <a class="lib_add" href="{:U('add')}">添加</a>
        </li>
    </ul>
    </div>
     <div class="h_a">搜索</div>
    <div class="table_list">
        <div class="table_full">
            <form class="J_ajaxForm" action="{:U('index')}" method="get">
            <input type="hidden" name="g" value="Admin">
            <input type="hidden" name="m" value="Briefing">
            <input type="hidden" name="a" value="index">
            <input type="hidden" name="art_cid" value="">
            <table cellpadding="2" cellspacing="1" class="table_form" width="">
                <tr>
                <th>标题:</th>
                    <td>
                     <input type="text" name="title" value="{$Think.get.title}" class="input">
                    </td>
                    <td>
                      <button class="btn btn_submit mr10 J_ajax_submit_btn" >搜索</button>
                      <a style="" href="{:U('index')}" class="btn">清除条件</a>
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
            
            <td align="center">序号</td>
            <td align="center">排序</td>
            <td align="center">标题</td>
           
           
            <td align="center">作者</td>
            <td align="center">时间</td>
           
            <td align="center">操作</td>
          </tr>
        </thead>
        <tbody>
        <form action="" method="post">  
          <input type="hidden" name="g" value="Admin">
          <input type="hidden" name="m" value="Briefing">
          <input type="hidden" name="a" value="position">
          <volist name="data" id="vo">
            <tr>
             
              <td align="center">{$vo.id}<input type="hidden" class="input" name="id[]" value="{$vo['id']}"  style="width:25px;"></td>
              <td align="center"><input type="text" class="input" name="position[]" value="{$vo['position']}"  style="width:25px;"></td>
              <td align="center">{$vo.title}</td>
              
              <td align="center">{$vo.author}</td>
              <td align="center">{$vo.updatetime}</td>
             
              <td align="center"><a href="{:U('edit', array('id'=>$vo['id']))}">[修改]</a>&nbsp;|&nbsp;<a href="{:U('delete', array('id'=>$vo['id']))}">[删除]</a></td>
            </tr>
          </volist>
        </tbody>
        
      </table>
      <input type="submit" value="排序">
      </form>
      <div class="p10">
        <div class="pages"> {$pageinfo.page} </div>
      </div>
    </div>
</div>
</body>
</html>