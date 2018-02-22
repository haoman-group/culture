<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>文化大数据库</title>
<template file="Cudatabase/Common/_cssjs"/>
</head>

<body>
<template file="Cudatabase/Common/_head"/>
<div class="all" style="width: 1190px;margin: 0 auto">
	<template file="Cudatabase/Common/_left"/>
    <div class="right-c">
    	<div class="ht"> {$breadcrumb} </div>
        <div class="right-main">
        	<div>
        		<div class="right-main1">
					<volist name="data" id="vo">
        			<div class="right-infor">
        				<div class="right-inforT xj">
							<if condition="$vo['is_parent'] eq '1'">
								 <a href="{:U('index',array('cid'=>$vo['cid']))}"><div class="right-inforT1 x{$key}">{$vo.name}<span class="pull-right right-inforT1R" >({$vo.total_num})</span></div></a> 
							 <else/>
								 <a href="{:U('lists',array('cid'=>$vo['cid']))}"><div class="right-inforT1 x{$key}">{$vo.name}<span class="pull-right right-inforT1R" >({$vo.total_num})</span></div></a> 
							 </if>
        				</div>
        				<div class="right-inforC">
                			<div class="clearfix"></div>
        				</div>
        			</div>
        			</volist>
        		</div>
				<template file="Cudatabase/Common/_chart"/>
        	</div>
        	
        </div>
    </div>
</div>
<div class="clr"></div>
<template file="Cudatabase/Common/_foot"/>
</body>
</html>
