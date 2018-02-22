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
				<div class="ht"> {$breadcrumb}</div>
				<div class="right-main">

						<div class="right-main1 fyR">	
							<div class="fyTabT"><a class="fyTab choose">国家级</a>|<a class="fyTab">省级</a>|<a class="fyTab">市级</a>|<a class="fyTab">县级</a></div>
							<div class="fyTabValue choose">
							<volist name="menu[1]['child']" id="wo">
							<div class="right-infor">
								<div class="right-inforT xj">
									<div class="right-inforT1 x{$key}"><a href="{:U('lists',array('type'=>$key))}">{$wo.name}</a><span class="pull-right right-inforT1R">{$wo['num1']}</span></div>
								</div>
								<div class="right-inforC">
									<ul>
										<if condition="$wo['name'] eq '图书馆'">
										<volist name="info['lib']" id="vo">

										<if condition="$vo.level eq '国家级'"><li><a href="{:U('libshow',array('id'=>$vo['id'],'type'=>1))}">{$vo.name}</a></li></if>
										</volist><else/>
											<volist name="info['com']" id="vo">
										<if condition="$vo.level eq '国家级'"><li><a href="{:U('comshow',array('id'=>$vo['id'],'type'=>1))}">{$vo.cac_name}</a></li></if>									


								        </volist>
								    </if>
									</ul>

									<div class="clearfix"></div>
								</div>
							</div>
                              </volist>
											
						</div>

                         <div class="fyTabValue">
							<volist name="menu[1]['child']" id="wo">
							<div class="right-infor">
								<div class="right-inforT xj">
									<div class="right-inforT1 x{$key}"><a href="{:U('lists',array('type'=>$key))}">{$wo.name}</a><span class="pull-right right-inforT1R">{$wo['num2']}</span></div>
								</div>
								<div class="right-inforC">
									<ul>
										<if condition="$wo['name'] eq '图书馆'">
										<volist name="info['lib']" id="vo">

										<if condition="$vo.level eq '省级'"><li><a href="{:U('libshow',array('id'=>$vo['id'],'type'=>2))}">{$vo.name}</a></li></if>
										</volist><else/>
											<volist name="info['com']" id="vo">
										<if condition="$vo.level eq '省级'"><li><a href="{:U('comshow',array('id'=>$vo['id'],'type'=>2))}">{$vo.cac_name}</a></li></if>									

				

								        </volist>
								    </if>
									</ul>

									<div class="clearfix"></div>
								</div>
							</div>
                              </volist>

							<!-- <div class="right-infor">
								<div class="right-inforT yy">
									<div class="right-inforT1 x1"><a href="dsjk-QygList.html">群艺馆</a><span class="pull-right right-inforT1R">36</span></div>
								</div>
								<div class="right-inforC">
									<ul>
										<volist name="info['com']" id="vo">
										<if condition="$vo.level eq '市级'"><li><a href="{:U('comshow',array('id'=>$vo['id']))}">{$vo.name}</a></li></if>
										</volist>
									</ul>
									<div class="clearfix"></div>
								</div>
							</div>	 -->					
						</div>

						<div class="fyTabValue">
							<volist name="menu[1]['child']" id="wo">
							<div class="right-infor">
								<div class="right-inforT xj">
									<div class="right-inforT1 x{$key}"><a href="{:U('lists',array('type'=>$key))}">{$wo.name}</a><span class="pull-right right-inforT1R">{$wo['num3']}</span></div>
								</div>
								<div class="right-inforC">
									<ul>
										<if condition="$wo['name'] eq '图书馆'">
										<volist name="info['lib']" id="vo">

										<if condition="$vo.level eq '市级'"><li><a href="{:U('libshow',array('id'=>$vo['id'],'type'=>3))}">{$vo.name}</a></li></if>
										</volist><else/>
											<volist name="info['com']" id="vo">
										<if condition="$vo.level eq '市级'"><li><a href="{:U('comshow',array('id'=>$vo['id'],'type'=>3))}">{$vo.cac_name}</a></li></if>									

				

								        </volist>
								    </if>
									</ul>

									<div class="clearfix"></div>
								</div>
							</div>
                              </volist>

							<!-- <div class="right-infor">
								<div class="right-inforT yy">
									<div class="right-inforT1 x1"><a href="dsjk-QygList.html">群艺馆</a><span class="pull-right right-inforT1R">36</span></div>
								</div>
								<div class="right-inforC">
									<ul>
										<volist name="info['com']" id="vo">
										<if condition="$vo.level eq '市级'"><li><a href="{:U('comshow',array('id'=>$vo['id']))}">{$vo.name}</a></li></if>
										</volist>
									</ul>
									<div class="clearfix"></div>
								</div>
							</div>	 -->					
						</div>
						<div class="fyTabValue">
							<volist name="menu[1]['child']" id="wo">
							<div class="right-infor">
								<div class="right-inforT xj">
									<div class="right-inforT1 x{$key}"><a href="{:U('lists',array('type'=>$key))}">{$wo.name}</a><span class="pull-right right-inforT1R">{$wo['num4']}</span></div>
								</div>
								<div class="right-inforC">
									<ul>
										<if condition="$wo['name'] eq '图书馆'">
										<volist name="info['lib']" id="vo">

										<if condition="$vo.level eq '县级'"><li><a href="{:U('libshow',array('id'=>$vo['id'],'type'=>4))}">{$vo.name}</a></li></if>
										</volist><else/>
											<volist name="info['com']" id="vo">
										<if condition="$vo.level eq '县级'"><li><a href="{:U('comshow',array('id'=>$vo['id'],'type'=>4))}">{$vo.cac_name}</a></li></if>									
								        </volist>
								    </if>
									</ul>

									<div class="clearfix"></div>
								</div>
							</div>
                              </volist>

							<!-- <div class="right-infor">
								<div class="right-inforT yy">
									<div class="right-inforT1 x1"><a href="dsjk-QygList.html">群艺馆</a><span class="pull-right right-inforT1R">66</span></div>
								</div>
								<div class="right-inforC">
									<ul>
										<volist name="info['com']" id="vo">
										<if condition="$vo.level eq '县级'"><li><a href="{:U('comshow',array('id'=>$vo['id']))}">{$vo.name}</a></li></if>
										</volist>
																				
									</ul>
									<div class="clearfix"></div>
								</div>
							</div>		 -->		
						</div>
						
						</div>
						<template file="Cudatabase/Common/_area"/>
					
					<div class="clearfix"></div>					
				</div>
			</div>
		</div>
		<div class="clr"></div>
		<template file="Cudatabase/Common/_foot"/>
		<script type="text/javascript" src="{$config_siteurl}statics/cu/js/Comm/js/jquery.min.js"></script>
		<!--<script type="text/javascript" src="{$config_siteurl}statics/cu/js/Comm/js/dsjk.js"></script>-->
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