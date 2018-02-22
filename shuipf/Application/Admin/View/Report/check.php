<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
<title>添加新文章 - 系统后台 - {$Config.sitename} - by LvyeCMS</title>
<Admintemplate file="Admin/Common/Cssjs"/>
<style type="text/css">
.col-auto {
	overflow: hidden;
	_zoom: 1;
	_float: left;
	border: 1px solid #c2d1d8;
}
.col-right {
	float: right;
	width: 210px;
	overflow: hidden;
	margin-left: 6px;
	border: 1px solid #c2d1d8;
}

body fieldset {
	border: 1px solid #D8D8D8;
	padding: 10px;
	background-color: #FFF;
}
body fieldset legend {
    background-color: #F9F9F9;
    border: 1px solid #D8D8D8;
    font-weight: 700;
    padding: 3px 8px;
}
.list-dot{ padding-bottom:10px}
.list-dot li,.list-dot-othors li{padding:5px 0; border-bottom:1px dotted #c6dde0; font-family:"宋体"; color:#bbb; position:relative;_height:22px}
.list-dot li span,.list-dot-othors li span{color:#004499}
.list-dot li a.close span,.list-dot-othors li a.close span{display:none}
.list-dot li a.close,.list-dot-othors li a.close{ background: url("{$config_siteurl}statics/images/cross.png") no-repeat left 3px; display:block; width:16px; height:16px;position: absolute;outline:none;right:5px; bottom:5px}
.list-dot li a.close:hover,.list-dot-othors li a.close:hover{background-position: left -46px}
.list-dot-othors li{float:left;width:24%;overflow:hidden;}
</style>
</head>
<body class="J_scroll_fixed">
<div class="wrap J_check_wrap">
  <form name="myform" id="myform" action="{:U("add")}" method="post" class="J_ajaxForms" enctype="multipart/form-data">
  <div class="col-right">
    <div class="table_full">
      <table width="100%">
      	
	  </table>
	</div>
	</form>
	
	</div>
	<div class="col-auto">
    <div class="h_a">产业项目申报</div>
    <div class="table_full">
      <table width="100%">
      	<tr><td>产品名称</td><td>{$data.pname}</td></tr>
      	<tr><td>单位名称</td><td>{$data.uname}</td></tr>
     
      	<tr><td>单位性质</td><td>{$data.uquality}</td></tr>
      	<tr><td>注册资本</td><td>{$data.capital}</td></tr>
      	<tr><td>成立时间</td><td>{$data.ctime}</td></tr>
      	<tr><td>法定代表人</td><td>{$data.representative}</td></tr>
      	<tr><td>联系电话</td><td>{$data.tphone}</td></tr>
      	<tr><td>注册地址</td><td>{$data.paddress}</td></tr>
      	<tr><td>经营范围</td><td>{$data.scope}</td></tr>
      	<tr><td>产品介绍</td><td>{$data.presention}</td></tr>
      	<tr><td>单位审核意见</td><td><img src="{$data.uoption}"/ style="height: 50px;width: 150px;"></td></tr>
      	<tr><td>专家评审意见</td><td><img src="{$data.expert}"/ style="height: 50px;width: 150px;"></td></tr>
      	<tr><td>办公室意见</td><td><img src="{$data.ooption}"/ style="height: 50px;width: 150px;"></td></tr>
      	<tr><td>申报时间</td><td>{$data.inputtime|date="Y-m-d",###}</td></tr>
      	<td>
           	<!--<a href="{:U('Goods/edit',array('id' => $data['id']))}">编辑</a>-->
           	<!--<a href="{:U('Goods/del',array('id' => $data['id']))}" onclick="del()">删除</a>-->
        </td>
      </table>
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