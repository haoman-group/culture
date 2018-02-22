<!DOCTYPE html>
<html>

	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<!--<meta name="viewport" content="width=device-width, initial-scale=1">-->
			<meta name= "viewport" content= "width=device-width" initial-scale="1" minimum-scale="1" maximum-scale="1">
		<!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
		<title>文化志愿者</title>

		<template file="Pubservice/Common/_cssjs"/>
		<link rel="stylesheet" href="{$config_siteurl}statics/cu/css/pub-volunteer.css" />		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
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
						<a href="{:U('Pubservice/Volunteer/index')}">文化志愿者协会</a>&nbsp;&nbsp;&nbsp;&nbsp;>&nbsp;&nbsp;&nbsp;&nbsp; {$data['title']}
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
							<a href="">介绍</a>
						</li>
						<li>
							<a href="#">培训须知</a>
						</li>
						<!--<li>
							<a href="#">协会章程</a>
						</li>
						<li>
							<a href="#">管理办法</a>
						</li>
						<li class="last-item">
							<a href="#">办公室</a>
						</li>-->
					</ul>
				</div>
				<div class="xmgsDetailRight pull-right introduce">
					<div class="top">
						<span>介绍</span>
					</div>
					<div class="xmgsDetailRMain" style="padding: 0px;">
						<!-- <img src="{$config_siteurl}statics/cu/images/public-service/whzyz_content01.jpg"> -->
						<h1>{$data['title']}</h1>
						<dl>
							
							<dd class="txt" style="word-wrap:break-word;">{$data['content']}</dd>
							
						</dl>
					</div>
				</div>
				<div class="xmgsDetailRight pull-right" hidden>
					<div class="top">
						<span>培训须知</span>
					</div>
					<div class="xmgsDetailRMain" style="padding: 0px;">
						<!-- <img src="{$config_siteurl}statics/cu/images/public-service/whzyz_content01.jpg"> -->
						<dd class="txt" style="word-wrap:break-word;margin-top:50px;margin-left:50px;text-indent:2em;">{$data['notice']}</dd>
					</div>
				</div>
				<div class="xmgsDetailRight pull-right rule" hidden>
					<div class="top">
						<span>协会章程</span>
					</div>
					<div class="xmgsDetailRMain" style="padding: 0px;">
						<!-- <img src="{$config_siteurl}statics/cu/images/public-service/whzyz_content1-3.jpg"> -->
						<h1>山西文化志愿者协会章程</h1>
						<dl>
							<dt>第一章 总则</dt>
							<dd>第一条 山西文化志愿者协会（Shanxi Culture Volunteers Association，英文缩写SCVA）是由志愿从事文化公益活动与社会文化事业的各界人士组成的全省性社会团体。</dd>
							<dd>第二条 本协会是由山西省各市、县（区）文化志愿者组织和个人自愿结成的非营利性社会组织。本协会通过组织和指导全省文化志愿服务活动，为社会提供公益性文化志愿服务，自觉传播先进文化，践行志愿精神，促进文化交流，推动社会主义精神文明建设，为丰富广大群众精神文化活动、提高公共文化服务水平做出贡献。</dd>
							<dd>第三条 本协会奉行"帮助他人 完善自己 服务社会 传播文明"的宗旨，遵守宪法、法律、法规和国家政策，遵守社会道德风尚。</dd>
							<dd>第四条 本协会接受山西省文化厅和山西省民政厅的业务指导和监督管理。</dd>
							<dd>第五条 本协会住所在山西省群众艺术馆（太原市迎泽区侯家巷20号）。</dd>
							<dt>第二章 业务范围</dt>
							<dd>第六条 本协会的业务范围：</dd>
							<dd>（一）传播先进文化，促进社会文明与进步，为构建和谐、幸福山西创造良好的社会环境；</dd>
							<dd>（二）为城乡发展、社区建设、扶贫开发、抢险救灾、旅游发展、社会弱势群体以及大型文化活动等公益事业提供文化志愿服务；</dd>
							<dd>（三）组织文化志愿者深入基层农村、社区、学校、企业、军营、残疾人等弱势群体开展教学、辅导、演出、培训等公益性文化服务；</dd>
							<dd>（四）规划、组织文化志愿服务活动，协调、指导全省各市县（区）文化志愿者组织开展工作；</dd>
							<dd>（五）开展文化志愿者培训；</dd>
							<dd>（六）开展与全国各地文化志愿者组织和团体的交流。</dd>
							<dt>第三章 会员</dt>
							<dd>第七条 本协会由团体会员和个人会员组成。</dd>
							<dd>第八条 凡依法成立的各级文化志愿者组织，志愿者人数在10人以上，承认本协会章程并提出入会申请。经理事会审查通过，即可成为本协会团体会员。</dd>
							<dd>第九条 文化志愿者的基本条件：</dd>
							<dd>（一）具有奉献精神；</dd>
							<dd>（二）在音乐、舞蹈、戏剧、曲艺、书法、美术、摄影等方面有一定专业特长和艺术水平，或具备与所参加的文化志愿者服务项目及活动相适应的基本素质；</dd>
							<dd>（三）遵守法律、法规以及志愿组织的章程和其他管理制度；</dd>
							<dd>（四）自愿为公共文化工作服务，具有较高的社会责任感和事业心；</dd>
							<dd>（五）身体健康，户籍不限，能坚持正常工作，年龄在18----65周岁之间（特殊情况除外）；</dd>
							<dd>第十条 会员入会的程序是：</dd>
							<dd>（一）本人填写并提交山西省文化志愿者登记表；</dd>
							<dd>（二）经理事会审查通过；</dd>
						</dl>、
						<ol class="page">
							<li>每页<span>10</span>条</li>
							<li>共<span>4</span>页</li>
							<li><a href="">上一页</a></li>
							<li><a href="">1</a></li>
							<li class="on"><a href="">2</a></li>
							<li><a href="">3</a></li>
							<li><a href="">4</a></li>
							<li><a href="">下一页</a></li>
						</ol>
					</div>
				</div>
				<div class="xmgsDetailRight pull-right method" hidden>
					<div class="top">
						<span>管理办法</span>
					</div>
					<div class="xmgsDetailRMain" style="padding: 0px;">
						<!-- <img src="{$config_siteurl}statics/cu/images/public-service/whzyz_content1-4.jpg"> -->
						<h1>山西文化志愿者管理办法</h1>
						<dl>
							<dt>一、目的宗旨</dt>
							<dd>指导和推动山西省文化志愿者队伍的建设管理，建立一支有一定规模、具有较高素质的文化志愿者队伍，提高公共文化服务能力，促进山西省现代公共文化服务的建立和完善。引导文化志愿者自愿参与、义务工作、提升自我、服务社会，在全社会营造"传递爱心、传播文明"的氛围，共同促进社会和谐与进步。</dd>
							<dt>二、主要原则</dt>
							<dd>1.坚持依法组件、科学管理的原则 ；</dd>
							<dd>2.坚持自愿参与、义务服务的原则；</dd>
							<dd>3.坚持统一指导协调、分级管理的原则；</dd>
							<dd>4.坚持公益服务、就近服务的原则。</dd>
							<dt>一、目的宗旨</dt>
							<dd>指导和推动山西省文化志愿者队伍的建设管理，建立一支有一定规模、具有较高素质的文化志愿者队伍，提高公共文化服务能力，促进山西省现代公共文化服务的建立和完善。引导文化志愿者自愿参与、义务工作、提升自我、服务社会，在全社会营造"传递爱心、传播文明"的氛围，共同促进社会和谐与进步。</dd>
							<dt>二、主要原则</dt>
							<dd>1.坚持依法组件、科学管理的原则 ；</dd>
							<dd>2.坚持自愿参与、义务服务的原则；</dd>
							<dd>3.坚持统一指导协调、分级管理的原则；</dd>
							<dd>4.坚持公益服务、就近服务的原则。</dd>
							<dt>一、目的宗旨</dt>
							<dd>指导和推动山西省文化志愿者队伍的建设管理，建立一支有一定规模、具有较高素质的文化志愿者队伍，提高公共文化服务能力，促进山西省现代公共文化服务的建立和完善。引导文化志愿者自愿参与、义务工作、提升自我、服务社会，在全社会营造"传递爱心、传播文明"的氛围，共同促进社会和谐与进步。</dd>
							<dt>二、主要原则</dt>
							<dd>1.坚持依法组件、科学管理的原则 ；</dd>
							<dd>2.坚持自愿参与、义务服务的原则；</dd>
							<dd>3.坚持统一指导协调、分级管理的原则；</dd>
							<dd>4.坚持公益服务、就近服务的原则。</dd>
						</dl>、
						<ol class="page">
							<li>每页<span>10</span>条</li>
							<li>共<span>4</span>页</li>
							<li><a href="">上一页</a></li>
							<li><a href="">1</a></li>
							<li class="on"><a href="">2</a></li>
							<li><a href="">3</a></li>
							<li><a href="">4</a></li>
							<li><a href="">下一页</a></li>
						</ol>
					</div>
				</div>
				<div class="xmgsDetailRight pull-right office" hidden>
					<div class="top">
						<span>办公室</span>
					</div>
					<div class="xmgsDetailRMain" style="padding: 0px;">
						<!-- <img src="{$config_siteurl}statics/cu/images/public-service/whzyz_content1-5.jpg"> -->
						<h1>山西文化志愿者办公室</h1>
						<dl>
							<dd>指导和推动山西省文化志愿者队伍的建设管理，建立一支有一定规模、具有较高素质的文化志愿者队伍，提高公共文化服务能力，促进山西省现代公共文化服务的建立和完善。引导文化志愿者自愿参与、义务工作、提升自我、服务社会，在全社会营造"传递爱心、传播文明"的氛围，共同促进社会和谐与进步。</dd>
							<dt>一、目的宗旨</dt>
							<dd>指导和推动山西省文化志愿者队伍的建设管理，建立一支有一定规模、具有较高素质的文化志愿者队伍，提高公共文化服务能力，促进山西省现代公共文化服务的建立和完善。引导文化志愿者自愿参与、义务工作、提升自我、服务社会，在全社会营造"传递爱心、传播文明"的氛围，共同促进社会和谐与进步。</dd>
							<dt>二、主要原则</dt>
							<dd>1.坚持依法组件、科学管理的原则 ；</dd>
							<dd>2.坚持自愿参与、义务服务的原则；</dd>
							<dd>3.坚持统一指导协调、分级管理的原则；</dd>
							<dd>4.坚持公益服务、就近服务的原则。</dd>
							<dt>一、目的宗旨</dt>
							<dd>指导和推动山西省文化志愿者队伍的建设管理，建立一支有一定规模、具有较高素质的文化志愿者队伍，提高公共文化服务能力，促进山西省现代公共文化服务的建立和完善。引导文化志愿者自愿参与、义务工作、提升自我、服务社会，在全社会营造"传递爱心、传播文明"的氛围，共同促进社会和谐与进步。</dd>
							<dt>二、主要原则</dt>
							<dd>1.坚持依法组件、科学管理的原则 ；</dd>
							<dd>2.坚持自愿参与、义务服务的原则；</dd>
							<dd>3.坚持统一指导协调、分级管理的原则；</dd>
							<dd>4.坚持公益服务、就近服务的原则。</dd>
							<dt>一、目的宗旨</dt>
							<dd>指导和推动山西省文化志愿者队伍的建设管理，建立一支有一定规模、具有较高素质的文化志愿者队伍，提高公共文化服务能力，促进山西省现代公共文化服务的建立和完善。引导文化志愿者自愿参与、义务工作、提升自我、服务社会，在全社会营造"传递爱心、传播文明"的氛围，共同促进社会和谐与进步。</dd>
							<dt>二、主要原则</dt>
							<dd>1.坚持依法组件、科学管理的原则 ；</dd>
							<dd>2.坚持自愿参与、义务服务的原则；</dd>
							<dd>3.坚持统一指导协调、分级管理的原则；</dd>
							<dd>4.坚持公益服务、就近服务的原则。</dd>
						</dl>、
						<ol class="page">
							<li>每页<span>10</span>条</li>
							<li>共<span>4</span>页</li>
							<li><a href="">上一页</a></li>
							<li><a href="">1</a></li>
							<li class="on"><a href="">2</a></li>
							<li><a href="">3</a></li>
							<li><a href="">4</a></li>
							<li><a href="">下一页</a></li>
						</ol>
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
	</body>

</html>