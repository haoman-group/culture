<?php if (!defined('SHUIPF_VERSION')) exit(); ?>
<Admintemplate file="Common/Head"/>
<body class="J_scroll_fixed">
<div class="wrap J_check_wrap">
  <div class="nav">
  	<ul class="cc">
  		<li class="current">
  			<a href="javascript:;">商品列表</a>
  		</li>
  	</ul>
  </div>	
  <form class="J_ajaxForm" action="{:U('Menu/index')}" method="post">
    <div class="table_list">
      <table width="100%">
        <colgroup>
        <col width="80">
        <col width="100">
        <col>
        <col width="80">
        <col width="200">
        </colgroup>
        <thead>
          <tr>
            
            <td>ID</td>
            <td>商品名称</td>
            <td>联系电话</td>
            <td>商品价格</td>
            <td>商品图片</td>
            <td>管理操作</td>
          </tr>
        </thead>
         <volist name="data" id="vo">
          <tr>
            
            <td style="text-align:center;">{$vo.id}</td>
            <td style="text-align:center;">{$vo.title}</td>
            <td style="text-align:center;">{$vo.tel}</td>
            <td style="text-align:center;">{$vo.price}</td>
            
            <td style="text-align:center;"><img src="{$vo.thumb}" style="height: 50px;width: 150px;" /></td>
            <td style="text-align:center;">
            	<a href="{:U('Goods/check',array('id' => $vo['id']))}">查看</a>
            	<a href="{:U('Goods/edit',array('id' => $vo['id']))}">编辑</a>
            	<a href="{:U('Goods/del',array('id' => $vo['id']))}" onclick="del()">删除</a>	
            </td>
          </tr>
        </volist>  
      </table>
      <div class="p10"><div class="pages"> {$page} </div> </div>
     
    </div>
    <div class="btn_wrap">
      <div class="btn_wrap_pd">             
        <button class="btn btn_submit mr10 J_ajax_submit_btn" type="submit">排序</button>
      </div>
    </div>
  </form>
</div>
<script src="{$config_siteurl}statics/js/common.js?v"></script>
<script>
function del(){
if(confirm("确定要删除吗？")){
alert('删除成功！');
return true;
}else{
return false;
}
}
</script>
</body>
</html>