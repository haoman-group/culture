<?php if (!defined('SHUIPF_VERSION')) exit(); ?>
<Admintemplate file="Common/Head"/>
<body>
<div class="wrap">
    <!-- <Admintemplate file="Common/Nav"/> -->
    
    <div class="nav">
    <ul class="cc" style="width:100%">
        <li class="current"><a href="{:U('index')}">演出论坛</a></li>
         
        

          <a class="lib_add" href="{:U('add')}">添加</a></li>
    </ul>
    </div>
     <div class="h_a">搜索</div>
    <div class="table_list">
        <div class="table_full">
            <form class="J_ajaxForm" action="{:U('index')}" method="get">
            <input type="hidden" name="g" value="Admin">
            <input type="hidden" name="m" value="Interpret">
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
            <td align="center">标题</td>
            <td align="center">上传者</td>
            <td align="center">上传单位</td>
            <td align="center">单位</td>
            <td align="center">作者</td>
            <td align="center">时间</td>
            <td align="center">操作</td>
          </tr>
        </thead>
        <tbody>
        <form> 
          
          <volist name="data" id="vo">
            <tr>  
              <td align="center">{$vo.id}</td>
              <td align="center">{$vo.title}</td>
              <td align="center">{$vo.author}</td>
              <td align="center">{$vo.unit}</td>
              <td align="center">{$vo.photographyer}</td>
              <td align="center">{$vo.intro}</td>
              <td align="center">{$vo.updatetime}</td>
             
              <td align="center"><a href="{:U('edit', array('id'=>$vo['id']))}">[修改]</a>&nbsp;|&nbsp;<a href="{:U('delete', array('id'=>$vo['id']))}">[删除]</a></td>
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