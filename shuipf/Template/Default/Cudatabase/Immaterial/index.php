<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>文化大数据库</title>
		<template file="Cudatabase/Common/_cssjs"/>
	</head>

	<body>
		<template file="Cudatabase/Common/_head"/>
		<if condition="$_GET['cid'] eq 75">
			<div class="all" style="width: 1190px;margin: 0 auto">
			<template file="Cudatabase/Common/_left"/>
			<div class="right-c">
				<div class="ht"> {$breadcrumb}</div>
				<div class="right-main">

						<div class="right-main1 fyR">	
							<div class="fyTabT"><a class="fyTab choose">国家级</a>|<a class="fyTab">省级</a>|<a class="fyTab">市级</a>|<a class="fyTab">县级</a></div>
							<div class="fyTabValue choose">
								<!-- 国家级 -->
						<volist name="data" id="vo">
							<div class="right-infor">
								<div class="right-inforT x{$key}">
									<div class="right-inforT1 x{$key}">{$vo.name}<span class="pull-right right-inforT1R">{$vo.level1}</span></div>
								</div>
								<div class="right-inforC">
									<ul>
										<li><a href="{:U('lists',array('represen'=>1,'cid'=>$vo['cid'],'level'=>"国家级"))}">代表性项目</a>（{$vo.representone}）</li>
										<li><a href="{:U('lists',array('represen'=>2,'cid'=>$vo['cid'],'level'=>"国家级"))}">代表性传承人</a>（{$vo.representtwo}）</li>											
									</ul>
									<div class="clearfix"></div>
								</div>
							</div>
						</volist>

						</div>
						<!-- 省级 -->
						<div class="fyTabValue">
							<volist name="data" id="vo">
							<div class="right-infor">
								<div class="right-inforT x{$key}">
									<div class="right-inforT1 x{$key}">{$vo.name}<span class="pull-right right-inforT1R">{$vo.level2}</span></div>
								</div>
								<div class="right-inforC">
									<ul>
										<li><a href="{:U('lists',array('represen'=>1,'cid'=>$vo['cid'],'level'=>"省级"))}">代表性项目</a>（{$vo.representone}）</li>
										<li><a href="{:U('lists',array('represen'=>2,'cid'=>$vo['cid'],'level'=>"省级"))}">代表性传承人</a>（{$vo.representtwo}）</li>										
									</ul>
									<div class="clearfix"></div>
								</div>
							</div>
						</volist>

                            <!-- 市级 -->
							<!-- <volist name="data" id="vo">
							<div class="right-infor">
								<div class="right-inforT x{$key}">
									<div class="right-inforT1 x{$key}">{$vo.name}<span class="pull-right right-inforT1R">{$vo.levelthree}</span></div>
								</div>
								<div class="right-inforC">
									<ul>
										<li><a href="{:U('lists')}">代表性项目</a>（40）</li>
										<li><a href="{:U('lists')}">代表性传承人</a>（16）</li>										
									</ul>
									<div class="clearfix"></div>
								</div>
							</div>
						</volist> -->

						</div>
						<!-- 县级 -->
						<div class="fyTabValue">
							<volist name="data" id="vo">
							<div class="right-infor">
								<div class="right-inforT x{$key}">
									<div class="right-inforT1 x{$key}">{$vo.name}<span class="pull-right right-inforT1R">{$vo.level3}</span></div>
								</div>
								<div class="right-inforC">
									<ul>
										<li><a href="{:U('lists',array('represen'=>1,'cid'=>$vo['cid'],'level'=>"市级"))}">代表性项目</a>（{$vo.representone}）</li>
										<li><a href="{:U('lists',array('represen'=>2,'cid'=>$vo['cid'],'level'=>"市级"))}">代表性传承人</a>（{$vo.representtwo}）</li>										
									</ul>
									<div class="clearfix"></div>
								</div>
							</div>
						</volist>
							
						</div>
						<div class="fyTabValue">
							<volist name="data" id="vo">
							<div class="right-infor">
								<div class="right-inforT x{$key}">
									<div class="right-inforT1 x{$key}">{$vo.name}<span class="pull-right right-inforT1R">{$vo.level4}</span></div>
								</div>
								<div class="right-inforC">
									<ul>
										<li><a href="{:U('lists',array('represen'=>1,'cid'=>$vo['cid'],'level'=>"县级"))}">代表性项目</a>（{$vo.representone}）</li>
										<li><a href="{:U('lists',array('represen'=>2,'cid'=>$vo['cid'],'level'=>"县级"))}">代表性传承人</a>（{$vo.representtwo}）</li>											
									</ul>
									<div class="clearfix"></div>
								</div>
							</div>
						</volist>
						</div>
						</div>
						<template file="Cudatabase/Common/_area"/>
					
					<div class="clearfix"></div>					
				</div>
			</div>
		</div>
	<else/>
		<div class="all">
			<template file="Cudatabase/Common/_left"/>
			<div class="right-c">
				<div class="ht">{$breadcrumb}</div>
				<div class="right-main">
					<div>
						<div class="right-main1">
							<volist name="data" id="vo">
							<div class="right-infor">
								<div class="right-inforT x{$key}">
								<if condition="$vo['is_parent'] eq '1'">
									<a href="{:U('index',array('cid'=>$vo['cid']))}"><div class="right-inforT1 x{$key}">{$vo.name}<span class="pull-right right-inforT1R">{$vo.totle}</span></div></a>
								<else/>
									<a href="{:U('lists',array('cid'=>$vo['cid'],'level'=>$vo['name']))}"><div class="right-inforT1 x{$key}">{$vo.name}<span class="pull-right right-inforT1R">{$vo.totle}</span></div></a>
								</if>
								</div>
								<div class="right-inforC">

									<div class="clearfix"></div>
								</div>
							</div>
						</volist>
							</div>

						</div>
						<template file="Cudatabase/Common/_area"/>
					</div>
					<div class="clearfix"></div>

				</div>
			</div>
		</div>
	</if>
	
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