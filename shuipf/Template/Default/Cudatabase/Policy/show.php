<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<template file="Cudatabase/Common/_cssjs"/>
</head>
<style>
	.policy-show{width: 80%;margin: 30px auto;}
	.policy-show h5{font-size: 40px;line-height: 50px;}
	.policy-show span{padding: 0px; text-indent:0em;}
	.policy-show .txt p{margin:0px;}
	/* .policy-show .txt{text-align: left;text-indent: 2em;font-size: 16px;line-height: 30px;} */
	
</style>
<body>
<template file="Cudatabase/Common/_head"/>
<div class="all">
 	 <div class="ht1"><a href="javascript:history.go(-1)">{$data.dramaname}</a></div>    
    <div class="search-content" style="background: none;position: relative;">
    	<div class="policy-show"  style="word-wrap:break-word" >
    		<h5 style="font-size:24px;text-align:center">{$data.publish_name}</h5>
    		<p class="title">
    			<span>文号：{$data.publish_order}</span>
    			<span>发布机构：{$data.publish_agency}</span>
    			<span>主题词：{$data.publish_topword}</span>
    			<span>发布时间：{$data.publish_date}</span>
    		</p>
    		<div class="txt" style="" >{$data.publish_content}</div>
    	</div>
		<!-- <table class="policy-show">
			<tr><th>名称：</th><td>{$data.publish_name}</td></tr>
			<tr><th>文号：</th><td>{$data.publish_order}</td></tr>
			<tr><th>发布机构：</th><td>{$data.publish_agency}</td></tr>
			<tr><th>发布时间：</th><td>{$data.publish_date}</td></tr>
			<tr><th>主题词：</th><td>{$data.publish_topword}</td></tr>
			<tr><th>内容：</th><td>{$data.publish_content}</td></tr>
		</table> -->
    </div>
<div class="clr"></div>
</div>
<div class="clr"></div>
<template file="Cudatabase/Common/_foot"/>

</body>
</html>
