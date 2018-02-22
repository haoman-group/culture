<?php if (!defined('SHUIPF_VERSION')) exit(); ?>
<Admintemplate file="Common/Head"/>
<body class="J_scroll_fixed">
<div class="wrap J_check_wrap">
  <div class="nav">
  	<ul class="cc">
  		<li class="current">
  			<a href="javascript:;">商家列表</a>
  		</li>
  		<!--<li class="current">
  			<a href="{:U('Business/add')}">添加</a>
  		</li>-->
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
            <td>排序</td>
            <td>ID</td>
            <td>商家名称</td>
            <td>注册资本</td>
            <td>企业类型</td>
            <td>加盟时间</td>
            <td>管理操作</td>
          </tr>
        </thead>
         <volist name="data" id="vo">
          <tr>
            <td></td>
            <td>{$vo.id}</td>
            <td>{$vo.name}</td>
            <td>{$vo.registered}</td>
            <td>{$vo.company_type}</td>
            <td>{$vo.time|date='Y.m.d',###}</td>
            <td>
	            		<a href="javascript:;" style="color: red;">审核已通过</a>
            			<a href="{:U('Businesspass/check',array('id' => $vo['id']))}">查看</a>
            			<a href="{:U('Businesspass/delete',array('id' => $vo['id']))}">删除</a>
            </td>
            
          </tr>
        </volist>  
      </table>
      <div class="p10"><div class="pages"> {$Page} </div> </div>
     
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