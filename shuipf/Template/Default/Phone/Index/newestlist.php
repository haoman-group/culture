<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0,user-scalable=no">

	<!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
	<title>山西文化云</title>
	
	<link rel="stylesheet" type="text/css" href="{$config_siteurl}statics/phone/css/index.css" />
    <link rel="stylesheet" href="{$config_siteurl}statics/cu/swiper/swiper.css">
    <link rel="stylesheet" href="{$config_siteurl}statics/cu/bootstrap/bootstrap.min.css">
    <link href="https://cdn.bootcss.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet">
	<style>
		.panel-nav{
			background-color:#93262a !important;
		}
	</style>
	<script type="text/javascript" src="{$config_siteurl}statics/cu/jquery/jquery.min.js"></script>
	<script type="text/javascript" src="{$config_siteurl}statics/cu/bootstrap/bootstrap.min.js"></script>
	<script type="text/javascript" src="{$config_siteurl}statics/cu/swiper/swiper.min.js"></script>
</head>
<body>

<div class="panel-group" >
	<div class="panel panel-default panel-nav" >
		<div class="panel-heading">
			<h4 class="panel-title">
				<a href="{:U('/Phone/Index/index/')}" >
					 <i class="fa fa-home fa-1x pull-left" style=""></i>主页
				</a>
				<a href="javascript:history.back(-1)" >
					 <i class="fa fa-reply fa-1x pull-right" style="">返回</i>
				</a>
				
			</h4>
		</div>
	</div>
	<volist name="category" id="vo">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h4 class="panel-title">
				<a data-toggle="collapse" data-parent="#accordion" 
				   href="#{$key}">
					{$vo['name']}
				</a>
			</h4>
		</div>
		<div id="{$key}" class="panel-collapse collapse " >
			<div class="panel-body">
				<ul class="nav nav-tabs">
					<volist name="vo['data']" id="wo">
                   <li style="float:none;"><a href="{:U('/Phone/Index/newestshow',array('id'=>$wo['id']))}" style="color:black"><span style="font-size:18px;">{$key+1}:</span>{$wo['title']}</a></li>
				 </volist>
              </ul>
			</div>
		</div>
	</div>
	</volist>
</div>

</body>
</html>