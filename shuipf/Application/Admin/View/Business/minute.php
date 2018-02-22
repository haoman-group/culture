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
    <div class="h_a">信息发布</div>
    <div class="table_full">
      <table width="100%">
      	<tr><td>企业名称</td><td>{$data.name}</td></tr>
      	<tr><td>注册资本</td><td>{$data.registered}</td></tr>
      	<tr><td>注册时间</td><td>{$data.time|date='Y-m-d',###}</td></tr>
      	<tr><td>企业logo</td><td><img src="{$data.photo}" style="width: 100px;height: 30px;"/></td></tr>
      	<tr><td>企业地址</td><td>{$data.adress}</td></tr>
      	<tr><td>法人代表</td><td>{$data.legal_person}</td></tr>
      	<tr><td>联系人</td><td>{$data.linkman}</td></tr>
      	<tr><td>联系电话</td><td>{$data.telephone}</td></tr>
      	<tr><td>联系邮箱</td><td>{$data.email}</td></tr>
      	<tr><td>年营业额</td><td>{$data.turnover}</td></tr>
      	<tr><td>企业类型</td><td>{$data.company_type}</td></tr>
      	<tr><td>所属行业</td><td>{$data.industry}</td></tr>
      	<tr><td>经营范围</td><td>{$data.range}</td></tr>
      	<tr><td>企业概况</td><td>{$data.survey}</td></tr>
      	<tr><td>产品介绍</td><td>{$data.introduce}</td></tr>
      	<td>
      		<if condition="($data.pass eq 1)">
      			<a href="javascript:;">已通过审核</a>
      		<elseif condition="$data.pass eq 0"/>
           		<a href="{:U('Business/pass',array('id' => $data['id']))}">通过审核</a>
           		<a href="{:U('Business/nein',array('id' => $data['id']))}">不通过</a>
           	<else />
           	 	<a href="javascript:;">未通过审核</a>
           	</if>
        </td>
      </table>
    </div>	