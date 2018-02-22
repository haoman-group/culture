<!DOCTYPE html>
<html>

	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
		<title>文化志愿者</title>

		<template file="Pubservice/Common/_cssjs"/>
		<link rel="stylesheet" href="{$config_siteurl}statics/cu/css/pub-volunteer.css" />
		<link rel="stylesheet" href="{$config_siteurl}statics/cu/css/pub-volunteer_recruit.css" />
		<link rel="stylesheet" href="{$config_siteurl}statics/cu/css/recruit_show.css" />


				<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
      <script src="//cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="//cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
	</head>

	<body>
		<div class="wrap">
			<template file="Pubservice/Common/_head"/>
			<div class="stepBar">
				<div class="ggwh_Content">
					<div class="stepBarMain">
						<a href="{$config_siteurl}" class="link">首页</a>&nbsp;&nbsp;&nbsp;&nbsp;>&nbsp;&nbsp;&nbsp;&nbsp;
						<a href="{:U('Pubservice/Volunteer/index')}">文化志愿者服务</a>&nbsp;&nbsp;&nbsp;&nbsp;>&nbsp;&nbsp;&nbsp;&nbsp;
						<a href="">志愿者招募注册信息</a>
					</div>
				</div>
			</div>
			<!-- 表单内容 -->
			<div class="ggwh_Content recruit_content recruit_show_content" style="margin-top: 30px;padding-bottom: 20px">
				<h3>山西文化志愿者注册信息登记表</h3>
				<div class="show_biaoge">
					<p>志愿者编号&nbsp;:&nbsp;{$data.id}</p>
					<table>
						<!-- 表格第一部分 -->
							<tr>
								<td class="hebing" rowspan="7">个人信息</td>
								<td style="width: 173px">姓名</td>
								<td style="width: 137px">{$data.name}</td>
								<td style="width: 153px">性别</td>
								<td style="width: 129px">{$data.gender}</td>
								<td rowspan="4" colspan="2">
								<img src="{$data.photo}" alt="" style="width:180px;height:210px;">
								</td>

							</tr>
							<tr>
								<td>国籍</td>
								<td colspan="3">{$data.nationality}</td>
							</tr>
							<tr>
								<td>民族</td>
								<td>{$data.nation}</td>
								<td>出生年月</td>
								<td>{$data.birthday}</td>
							</tr>							
							<tr>
								<td>政治面貌</td>
								<td  colspan="3">{$political_status_array[$data[political_status]]}</td>
								
							</tr>							
							<tr>
								<td>身份证件类型</td>
								<td>{$idcard_type_array[$data[idcard_type]]}</td>
								<td>身份证号</td>
								<td colspan="3">{$data.idcard_no}</td>
							</tr>							
							<tr>
								<td>学历</td>
								<td>{$education_array[$data[education]]}</td>
								<td>学位<p>(学校专业)</p></td>
								<td colspan="3">{$data.major}{$data.degree}</td>
							</tr>							
							<tr>
								<td>毕业院校</td>
								<td>{$data.university}</td>
								<td>工作单位</td>
								<td colspan="3">{$unit_type_array[$data[unit_type]]}</td>
							</tr>
<!-- 表格第二部分 -->
							<tr>
								<td class="hebing" rowspan="4">文化志愿服务情况</td>
								<td>所属组织</td>
								<td colspan="2">{$data.organization}</td>
								<td>志愿爱好</td>
								<td colspan="3">
								<?php
								$hobby = unserialize($data['hobby']);
								foreach($hobby as $index=>$item){
									$hobby[$index] = $hobby_array[$item];
								}
								echo implode(',',$hobby);
								?>
								</td>
							</tr>
							<tr>
								<td style="height: 85px" colspan="2">是否具备相关志愿<p>服务技能</p></td>
								<td colspan="5">{$data.have_skill}</td>
							</tr>							
							<tr>
								<td style="height: 130px" colspan="2">与所报项目所匹配的<p>个人特长</p></td>
								<td style="height: 130px" colspan="5">{$data.specialty}</td>
							</tr>							
							<tr>
								<td  colspan="2">可提供志愿服务时间</td>
								<td  colspan="5">{$server_time_array[$data[server_time]]}</td>
							</tr>
							<!-- 第三部分							 -->
							<tr>
								<td style="height: 364px" class="hebing">承诺书</td>
								<td colspan="6" style="padding:0 15px;text-align: left">
								我愿意成为一名光荣的文化志愿者。我承诺:尽己所能,不计报酬,帮助他人我愿意成为一名光荣的文化志愿者。我承诺:尽己所能,不计报酬,帮助他人我愿意成为一名光荣的文化志愿者。我承诺:尽己所能,不计报酬,帮助他人我愿意成为一名光荣的文化志愿者。我承诺:尽己所能,不计报酬,帮助他人我愿意成为一名光荣的文化志愿者。我承诺:尽己所能,不计报酬,帮助他人我愿意成为一名光荣的文化志愿者。我承诺:尽己所能,不计报酬,帮助他人我愿意成为一名光荣的文化志愿者。我承诺:尽己所能,不计报酬,帮助他人我愿意成为一名光荣的文化志愿者。我承诺:尽己所能,不计报酬,帮助他人我愿意成为一名光荣的文化志愿者。我承诺:尽己所能,不计报酬,帮助他人我愿意成为一名光荣的文化志愿者。我承诺:尽己所能,不计报酬,帮助他人我愿意成为一名光荣的文化志愿者。我承诺:尽己所能,不计报酬,帮助他人我愿意成为一名光荣的文化志愿者。我承诺:尽己所能,不计报酬,帮助他人我愿意成为一名光荣的文化志愿者。我承诺:尽己所能,不计报酬,帮助他人我愿意成为一名光荣的文化志愿者。
								</td>
							</tr>
							



						
					</table>
				</div>	
			</div>

<!-- 底部活动推荐 -->
		<div class="bot_list">
			<h5 class="huodong">活动推荐</h5>
			<ul>
				<volist name="position" id="vo">
				<li>
					<img src=<?=$vo['image']?$vo['image']:"http://dummyimage.com/800x600/4d494d/686a82.gif&text=placeholder+image"?>>
					<h5>{$vo.content_title}</h5>
					<p>活动时间&nbsp;:&nbsp;{$vo.act_time}</p>
					<p>活动地点&nbsp;:&nbsp;{$vo.act_address}</p>
					<a href="{:U('Pubservice/Active/show', array('id'=>$vo['id'],'tablename'=>active))}">预约</a>
				</li>
				</volist>		
			</ul>
		</div>	








			<hr style="margin-top: 60px;" />
			<template file="Pubservice/Common/_foot"/>
		</div>
		<script type="text/javascript" src="{$config_siteurl}statics/cu/jquery/jquery.min.js"></script>
		<script type="text/javascript">
			$(document).ready(function(){
				$(".ggwh_ZxList li").find("a").on("click",function(){
					var index = $(this).parent("li").index();
					$(this).parent("li").addClass("active").siblings("li").removeClass("active");
					$(".xmgsDetailRight").eq(index).show().siblings(".xmgsDetailRight").hide();
				})
			})
		</script>
	</body>

</html>
