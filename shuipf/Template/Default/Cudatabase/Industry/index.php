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
        					<a href="{:U('lists',array('cid'=>$vo['cid']))}"><div class="right-inforT1 x{$key}">{$vo.name}<span class="pull-right right-inforT1R" >({$vo.total_num})</span></div></a>
        				</div>
        				<div class="right-inforC">
						<notempty name="vo.child">
        						<ul>
								<volist name="vo['child']" id='voo'>
									<li><a href="{:U('lists',array('cid'=>$voo['cid']))}">{$voo.name}</a>（{$voo.total_num}）</li>
								</volist>
								</ul>
								</notempty>
                			<div class="clearfix"></div>
        				</div>
        			</div>
        			</volist>
        		</div>
				<template file="Cudatabase/Common/_area"/>
        	</div>

			<div class="clearfix"></div>
			<template file="Cudatabase/Common/_chart"/>
			</div>
        </div>
    </div>
</div>
		<div class="clr"></div>
		<template file="Cudatabase/Common/_foot"/>
		<script>
			var tabT=document.getElementsByClassName("fyTab");
			var tabV=document.getElementsByClassName("fyTabValue");
			for(var i=0;i<tabT.length;i++){
				tabT[i].setAttribute("onclick","select("+i+")")
			}
			
			function select(index){
				for(var i=0;i<tabV.length;i++){
					if(index==i){
						tabT[i].classList.add("choose");
						tabV[i].classList.add("choose");
						
					}
					else{
						tabT[i].classList.remove("choose");
						tabV[i].classList.remove("choose");
					}
				}
			}
		</script>
	</body>

</html>
