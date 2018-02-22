<!DOCTYPE html>
<html>

	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
		<title>文化志愿者</title>

		<link rel="stylesheet" href="{$config_siteurl}statics/cu/bootstrap//bootstrap.min.css" />
		<link rel="stylesheet" href="{$config_siteurl}statics/cu/pignose/css/pignose.tab.min.css" />
		<link rel="stylesheet" href="{$config_siteurl}statics/cu/css/pub-volunteer.css" />
		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
      <script src="//cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="//cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style>
    	.form-control.error{border-color: red;outline-color: transparent;}
    	label.error{color: red;}
    </style>
	</head>

	<body>
		<div class="wrap">
			<template file="Pubservice/Common/_head"/>
			<div class="stepBar">
				<div class="ggwh_Content">
					<div class="stepBarMain">
						<a href="{$config_siteurl}" class="link">首页</a>&nbsp;&nbsp;&nbsp;&nbsp;>&nbsp;&nbsp;&nbsp;&nbsp;
						<a href="{:U('Pubservice/Volunteer/index')}">文化志愿者</a>&nbsp;&nbsp;&nbsp;&nbsp;>&nbsp;&nbsp;&nbsp;&nbsp;
						<a href="{:U('Pubservice/Volunteer/ser_activity')}">文化志愿者服务活动</a>&nbsp;&nbsp;&nbsp;&nbsp;>&nbsp;&nbsp;&nbsp;&nbsp; 山西首个"欢乐天使"志愿者服务活动

					</div>
				</div>
			</div>
			<div class="ggwh_Content" style="margin-top: 30px;">
				<div class="xmgsDetailLeft pull-left">
					<div class="top">
						<h3>目录</h3>
					</div>
					<ul class="ggwh_ZxList" style="padding: 5px;">
						<li class="active">
							<a href="#">活动通告</a>
						</li>
						<li>
							<a href="#">招募报名</a>
						</li>
						<li class="last-item">
							<a href="#">志愿者活动现场</a>
						</li>

					</ul>
				</div>
				<div class="xmgsDetailRight pull-right">
					<div class="top">
						<span>活动通告</span>
					</div>
					<div class="xmgsDetailRMain">
						<ul>
							<li>
								<a href="#">“悦”享阅读，从图书馆出发——省图志愿者招募啦 <span class="pull-right">2016-07-12</span></a>
							</li>

							<li class="last-item">
								<a href="#">又是佳节时，我们需要你！<span class="pull-right">2016-07-08</span></a>
							</li>

							<li class="last-item">
								<a href="#">山西省少儿图书馆端午节志愿者招募通知<span class="pull-right">2016-07-08</span></a>
							</li>

						</ul>

					</div>
				</div>
				<div class="xmgsDetailRight pull-right" hidden>
					<div class="top">
						<span>招募报名</span>
					</div>
					<div class="xmgsDetailRMain">
						<h2 class="text-center" style="margin-top: 0px;margin-bottom: 30px;">山西省图书馆志愿者报名表</h2>
						<p style="text-indent: 2em;line-height: 30px;">你好！感谢您对山西省图书馆志愿者的关注，我们欢迎您的加入，为了我们能够及时联系到您，请认真填写一下资料，收到报名信息后，我们将于5个工作日之内联系您，并尽快安排面试时间， 请保持电话畅通或者及时查看电子邮件。
						</p>
						<hr />
						<form class="form-horizontal J_ajaxForm">
							<div class="form-group">
								<div class="col-md-3"></div>
								<label class="col-md-1 control-label">姓&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;名：</label>
								<div class="col-md-4">
									<input class="form-control" type="text" />
								</div>

							</div><br />
							<div class="form-group">
								<div class="col-md-3"></div>
								<label class="col-md-1 control-label">性&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;别：</label>
								<div class="col-md-4">
									<select class="form-control">
										<option>男</option>
										<option>女</option>
									</select>
								</div>

							</div><br />
							<div class="form-group">
								<div class="col-md-3"></div>
								<label class="col-md-1 control-label">出生年月：</label>
								<div class="col-md-4">
									<input class="form-control" type="date" />
								</div>

							</div><br />
							<div class="form-group">
								<div class="col-md-3"></div>
								<label class="col-md-1 control-label">学校与专业：</label>
								<div class="col-md-2">
									<input class="form-control" type="text" placeholder="学校" />
								</div>
								<div class="col-md-2">
									<input class="form-control" type="text" placeholder="专业" />
								</div>

							</div>
							<br />
							<div class="form-group">
								<div class="col-md-3"></div>
								<label class="col-md-1 control-label">手机号码：</label>
								<div class="col-md-4">
									<input class="form-control" type="text" name="phone" />
								</div>

							</div><br />
							<div class="form-group">
								<div class="col-md-3"></div>
								<label class="col-md-1 control-label">邮&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;箱：</label>
								<div class="col-md-4">
									<input class="form-control" type="text" name="email" />
								</div>

							</div>
							<br />
							<div class="form-group">
								<div class="col-md-3"></div>
								<label class="col-md-1 control-label">家庭住址：</label>
								<div class="col-md-4">
									<input class="form-control" type="text" />
								</div>

							</div>
							<div class="form-group" style="margin-top: 40px;">
								<div class="col-md-3"></div>
								<div class="col-md-1"></div>
								<div class="col-md-4" style="text-align: center;">
									<a class="zyzBmBtn">提交报名</a>
								</div>
							</div>
						</form>

					</div>
				</div>
				<div class="xmgsDetailRight pull-right activity-live" hidden>
					<div class="top">
						<span>志愿者活动现场</span>
					</div>
					<div class="xmgsDetailRMain" style="padding: 0px;">
						<!-- <img src="{$config_siteurl}statics/cu/images/public-service/whzyz_content02.jpg"> -->
						<h1>山西首个"欢乐天使"志愿者服务活动现场</h1>
						<img src="{$config_siteurl}statics/cu/images/public-service/whzyz_content002.jpg" alt="">
						<p> 山西首个"欢乐天使"志愿者服务活动 山西首个"欢乐天使"志愿者服务活动 山西首个"欢乐天使"志愿者服务活动 山西首个"欢乐天使"志愿者服务活动 山西首个"欢乐天使"志愿者服务活动 山西首个"欢乐天使"志愿者服务活动 山西首个"欢乐天使"志愿者服务活动 山西首个"欢乐天使"志愿者服务活动 山西首个"欢乐天使"志愿者服务活动 山西首个"欢乐天使"志愿者服务活动 山西首个"欢乐天使"志愿者服务活动</p>
						<p> 山西首个"欢乐天使"志愿者服务活动 山西首个"欢乐天使"志愿者服务活动 山西首个"欢乐天使"志愿者服务活动 山西首个"欢乐天使"志愿者服务活动 山西首个"欢乐天使"志愿者服务活动 山西首个"欢乐天使"志愿者服务活动 山西首个"欢乐天使"志愿者服务活动 山西首个"欢乐天使"志愿者服务活动 山西首个"欢乐天使"志愿者服务活动 山西首个"欢乐天使"志愿者服务活动 山西首个"欢乐天使"志愿者服务活动</p>
						<p> 山西首个"欢乐天使"志愿者服务活动 山西首个"欢乐天使"志愿者服务活动 山西首个"欢乐天使"志愿者服务活动 山西首个"欢乐天使"志愿者服务活动 山西首个"欢乐天使"志愿者服务活动 山西首个"欢乐天使"志愿者服务活动 山西首个"欢乐天使"志愿者服务活动 山西首个"欢乐天使"志愿者服务活动 山西首个"欢乐天使"志愿者服务活动 山西首个"欢乐天使"志愿者服务活动 山西首个"欢乐天使"志愿者服务活动</p>
					</div>
				</div>
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
		<!-- <script src="{$config_siteurl}statics/js/jquery.js"></script> -->
		<script src="{$config_siteurl}statics/js/validate.js"></script>
		<script src="{$config_siteurl}statics/js/ajaxForm.js"></script>
		<script>
		$(document).ready(function(){
		        var this1 = $('form.J_ajaxForm');
		            this1.validate({
		                rules : {
		                    phone: {
		                        telphone: true
		                    },
		                    email: {
		                    	email: true
		                    }
		                } 
		            })
		        
		})
		    
		</script>
	</body>

</html>