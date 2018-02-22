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
        <link href="{$config_siteurl}statics/js/artDialog/skins/default.css" rel="stylesheet" />
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
						<a href="{:U('Pubservice/Volunteer/index')}">文化志愿者</a>&nbsp;&nbsp;&nbsp;&nbsp;>&nbsp;&nbsp;&nbsp;&nbsp;
						<a href="{:U('Pubservice/Volunteer/index')}">志愿者招募</a>&nbsp;&nbsp;&nbsp;&nbsp;>&nbsp;&nbsp;&nbsp;&nbsp;
						<a href="{:U('Pubservice/Volunteer/index')}">{$data.title}</a>
					</div>
				</div>
			</div>
			<!-- 表单内容 -->
			<div class="ggwh_Content recruit_content" style="margin-top: 30px;padding-bottom: 20px">
			<form action="{:U('recruit')}" method="post">
			<input type="hidden" name="volunteer_recruit_id" value="{$data.id}">
			<!-- 第一部分开始 -->
			<div style="width: 1150px;margin:0 auto;border-bottom: 1px dashed #c8c8c8">
				<div class="r_content_list">
					<h5>第一部分&nbsp;&nbsp;个人信息</h5>
						<div class="form_content">
							<dl>
								<dt>姓名</dt>
								<dd catid="1"><input type="text" name="name"></dd>

								<dt>性别</dt>
								<dd>
									<label  style="margin-right: 80px"><input name="gender" type="radio" value="男" />男 </label> 
									<label><input name="gender" type="radio" value="女" />女 </label>
								</dd>

								<dt>国籍</dt>
								<dd style="width: 156px" catid="3"><input type="text" name="nationality" style="width: 125px"></dd>
								<dt style="width: 50px">民族</dt>
								<dd style="width: 245px" catid="2"><input type="text" name="nation" style="width: 125px"></dd>

								<dt>出生年月</dt>
								<dd catid="1"><input type="text" name="birthday"></dd>

								<dt>政治面貌</dt>
								<dd>
									<select catid="1" name="political_status">
									<volist name="political_status_array" id="psa">
										<option value="{$key}">{$psa}</option>
									</volist>
									</select>
								</dd>

								<dt>身份证类型</dt>
								<dd>
								<volist name="idcard_type_array" id="ita">
									<label><input name="idcard_type" type="radio" value="{$key}" />{$ita} </label> 
								</volist>
								</dd>

								<dt>证件号码</dt>
								<dd catid="1"><input type="text" name="idcard_no"></dd>	

								<dt>学历</dt>
								<dd style="width: 250px;padding-bottom:154px">
									<select name="education">
									<volist name="education_array" id="ea">
										<option value="{$key}">{$ea}</option>
									</volist>
									</select>
								</dd>
								
								<dt>毕业院校</dt>
								<dd style="width: 20px"><input type="text" name="university"></dd>
								<dt>专业</dt>
								<dd style="width: 20px"><input type="text" name="major"></dd>
								<dt>学位</dt>
								<dd style="width: 20px"><input type="text" name="degree"></dd>

								<dt>工作单位</dt>
								<dd>
									<volist name="unit_type_array" id="uta">
										<label><input name="unit_type" type="radio" value="{$key}" />{$uta}</label> 
									</volist>
								</dd>	

								<dt style="width: 170px;margin-left: -50px">上传个人一寸免冠照片</dt>
								<dd class="">
									<Form function="images" parameter="photo,photo,'',content"/>
								</dd>
								
							<!--<p class="">(20kb之内,JPG格式,不限底色)</p>		-->

							
							</dl>
						
						</div>
					</div>
				</div>
				<!-- 第一部分结束 -->
				<!-- 第二部分开始 -->
				<div style="width: 1150px;margin:0 auto;border-bottom: 1px dashed #c8c8c8;overflow: hidden;padding-bottom: 20px ">
				<div class="r_content_list">
					<h5>第二部分&nbsp;&nbsp;文化志愿服务情况</h5>
					
					<div class="form_content">
						
							<dl>
								<dt>所属组织</dt>
								<dd>
									<!--<input type="text" name="" style="float: left">-->
									<select name="organization" id="">
										<volist name="organization_array" id="oa">
											<optgroup label="{$key}">
											<volist name="oa" id="ooa">
												<option value="{$ooa}">{$ooa}</option>
											</volist>
											</optgroup>
										</volist>
									</select>
									<span>(系统设定选择项,按照省-市选择逐级选择)</span>
								</dd>
								<p style="margin-top: 0;display: block">备注:所属组织为在文化厅注册备案过的支援服务组织</p>
								<p class="efgh" style="display: block">第一级组织为山西省+11个城市,各区/县志愿者服务组织直接为二级志愿服务组织</p>
								<dt>志愿爱好</dt>
								<dd style="height: 160px">
									<volist name="hobby_array" id="ha">
									<label><input name="hobby[]" type="checkbox" value="{$key}" />{$ha}</label>
									</volist>
									<!--<label><input name="Fruit" type="checkbox" value="" />读书沙龙 </label>
									<label><input name="Fruit" type="checkbox" value="" />心理咨询 </label>
									<label><input name="Fruit" type="checkbox" value="" />法律援助 </label>
									<label><input name="Fruit" type="checkbox" value="" />策划宣传 </label>
									<label><input name="Fruit" type="checkbox" value="" />爱心沙溢 </label>
									<label><input name="Fruit" type="checkbox" value="" />引导接待 </label>
									<label style="margin-right: 50px"><input name="Fruit" type="checkbox" value="" />翻译 </label>
									<label><input name="Fruit" type="checkbox" value="" />摄影摄像 </label>
									<label><input name="Fruit" type="checkbox" value="" />视频拍摄 </label>
									<label style="margin-right: 150px"><input name="Fruit" type="checkbox" value="" />应急救护 </label>
									<label><input name="Fruit" type="checkbox" value="" />其他 </label>-->
									<span style="width: 200px;float: left;margin-top: -40px">(最少一选项、最多三选项)</span>
									<!--<input type="text" name="">-->
								</dd>


								<dt style="width: 200px;margin-left:-80px">是否具备相关志愿服务技能</dt>
								<dd>
									<label  style="margin-right: 80px; "><input name="have_skill" type="radio" value="是" />是 </label> 
									<label><input name="have_skill" type="radio" value="否" />否 </label>
								</dd>								

								<dt style="width: 240px;margin-left: -120px">与所报服务项目所匹配的个人特长</dt>
								<dd catid="1"><input type="text" name="specialty"></dd>
								
								<dt>可提供服务时间</dt>
								<dd>
									<volist name="server_time_array" id="sta">
									<label><input name="server_time" type="radio" value="{$key}" />{$sta} </label> 
									</volist>
								</dd>									

																	


							</dl>
						
					</div>
					</div>
				</div>
				<!-- 第二部分结束 -->
				<!-- 第三部分开始 -->
				<div style="width: 1150px;margin:0 auto;overflow: hidden;padding-bottom: 20px ">
				<div class="r_content_list">
					<h5>第三部分&nbsp;&nbsp;志愿服务承诺书</h5>
					
					<div class="form_content">
						
						<dl>
							<dt>志愿服务承诺书</dt>
							<dd style="text-align:left;width: 508px;height: 410px;padding:15px;border:1px solid #eeeeee;margin-left:133px;margin-top: -25px">
								    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;我愿意成为一名光荣的文化志愿者。我承诺：尽己所能，不记报酬，帮助他人，服务社会。践行志愿精神，传播先进文化，为建设团结互助、平等友爱、共同前进的美好和谐社会贡献力量。志愿者是崇高而光荣的，在志愿服务活动中，我承诺：
								<br>1.认真履行志愿服务承诺。
								<br>2.我自愿加入山西省文化志愿者队，为服务队内组织的各项活动提供服务及参与相关活动。
								<br>3.我同意在志愿服务过程中遵守国家的各项法律法规、山西省文化志愿者服务队以及相关服务组织的各项规章制度。
								<br>4.我愿意在要求的服务时间以及所提供的服务岗位上，为服务对象进行安全、规范、有序的志愿服务。
								<br>5.我同意在志愿服务过程中能够确保自身安全，对自己的行为负责。
								<br>6.我将妥善保管好山西省文化志愿者服务队中的可利用资源，对服务对象的信息予以保密。
								<br>7.我承诺在服务过程中，不向服务对象收取报酬和谋取其它利益，在服务期间进行赢利性活动或宣传；不以志愿者或山西省文化志愿者平台的名义组织和参与违背志愿服务精神、损害志愿者形象的活动。
								<br>8.我愿意根据安排进行志愿服务，并于注册之日起开始服务，按规定准时参加，确保无故缺席率为零。
							</dd>

							<dt></dt>
							<dd style="margin-top: 0">
								<label><input name="if_commitment" type="checkbox" value="是"  id="if_commitment" checked/>我已阅读并同意《志愿服务协议》 </label>
							</dd>
						</dl>
						
					</div>


					</div>
				</div>			
				<!-- 第三部分结束			 -->
					<button class="xiayibu" type="submit">下一步</button>
					</form>
						</div>

<!-- 底部活动推荐 -->
		<div class="bot_list">
			<h5 class="huodong">活动推荐</h5>
			<ul>
				<volist name="position" id="vo">
				<li>
					<img src=<?=$vo['image']?$vo['image']:"http://dummyimage.com/800x600/4d494d/686a82.gif&text=placeholder+image"?>>
					<h5><?php echo mb_substr($vo['content_title'],0,10); ?>...</h5>
					<p>活动时间&nbsp;:&nbsp;{$vo.act_time}</p>
					<p>活动地点&nbsp;:&nbsp;{$vo.act_address}</p>
					<a href="{:U('Pubservice/Active/show', array('id'=>$vo['id'],'tablename'=>active))}">预约</a>
				</li>
				</volist>
				<!--<li>
					<img src="http://dummyimage.com/800x600/4d494d/686a82.gif&text=placeholder+image">
					<h5>山西校园首届"赶集网杯"大学生模特...</h5>
					<p>活动时间&nbsp;:&nbsp;2016-7-20 17:31</p>
					<p>活动地点&nbsp;:&nbsp;徐行镇文化体育服务中心三楼多功能厅</p>
					<a href="">预定</a>
				</li>				
				<li>
					<img src="http://dummyimage.com/800x600/4d494d/686a82.gif&text=placeholder+image">
					<h5>山西校园首届"赶集网杯"大学生模特...</h5>
					<p>活动时间&nbsp;:&nbsp;2016-7-20 17:31</p>
					<p>活动地点&nbsp;:&nbsp;徐行镇文化体育服务中心三楼多功能厅</p>
					<a href="">预定</a>
				</li>				
				<li>
					<img src="http://dummyimage.com/800x600/4d494d/686a82.gif&text=placeholder+image">
					<h5>山西校园首届"赶集网杯"大学生模特...</h5>
					<p>活动时间&nbsp;:&nbsp;2016-7-20 17:31</p>
					<p>活动地点&nbsp;:&nbsp;徐行镇文化体育服务中心三楼多功能厅</p>
					<a href="">预定</a>
				</li>				-->
			</ul>
		</div>
		<hr style="margin-top: 60px;" />
		<template file="Pubservice/Common/_foot"/>
		</div>
		<script>
		//全局变量
var GV = {
    DIMAUB: "{$config_siteurl}",
	JS_ROOT: "{$config_siteurl}statics/js/"
};</script>
		<script type="text/javascript" src="{$config_siteurl}statics/cu/jquery/jquery.min.js"></script>
		<script src="{$config_siteurl}statics/js/wind.js"></script>
		<script type="text/javascript" src="{$Config_siteurl}statics/js/content_addtop.js"></script>
		<script type="text/javascript">
		$("#if_commitment").click(function(){
			$('.xiayibu').toggle();
		})
		</script>
	</body>

</html>
