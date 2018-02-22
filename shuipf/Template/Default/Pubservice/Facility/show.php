<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<!--<meta name="viewport" content="width=device-width, initial-scale=1">-->
		 <meta name= "viewport" content= "width=device-width" initial-scale="1" minimum-scale="1" maximum-scale="1">
		<!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
		<title>公共文化设施</title>
		<template file="Pubservice/Common/_cssjs"/>
		<!--分类选择插件-->
		<script type="text/javascript" src="{$config_siteurl}statics/cu/js/category_select.js"></script>
		<!--百度地图JS API-->
		<script type="text/javascript" src="http://api.map.baidu.com/api?v=2.0&ak=YUYIzLKGEcKdyyat23Aw4H9LByDx4voy"></script>
		<script type="text/javascript" src="http://api.map.baidu.com/library/CityList/1.2/src/CityList_min.js"></script>
		<script type="text/javascript" src="http://api.map.baidu.com/library/SearchInfoWindow/1.5/src/SearchInfoWindow_min.js"></script>
	</head>
	<body>
		<div class="wrap">
			<template file="Pubservice/Common/_head"/>
			<div class="ggwh_Content" style="padding:20px;border: 1px solid #E4E4E4;margin-top: 20px;">
				<div>
				<!--<if condition="$_GET['tablename'] eq 'Library' ">
				<span>图片:</span><img src="{$data['picture']}"></br>
				<span>地址:</span>{$data['addr']}</br>
				<span>馆内布局:</span>{$data['computer_layout']}</br>
				<span>服务项目:</span>{$data['ser_name']}</br>
				<span>开放时间:</span>{$data['anc_fund']}</br>
				<span>入馆须知:</span>{$data['computer_notice']}</br>
				<span>办证须知:</span>{$data['computer_permit']}</br>
				<span>官方网址:</span>{$data['dig_website']}</br>
				<span>联系方式:</span>{$data['telephone']}</br>
				<else/>
				<span>图片:</span><img src="{$data['picture']}"></br>
				<span>地址:</span>{$data['cac_addr']}</br>
				<span>馆内布局:</span>{$data['computer_layout']}</br>
				<span>服务项目:</span>{$data['sev_lastingfree']}</br>
				<span>开放时间:</span>{$data['sev_opentime']}</br>
				<span>入馆须知:</span>{$data['computer_notice']}</br>
				<span>官方网址:</span>{$data['dig_website']}</br>
				<span>联系方式:</span>{$data['cac_tel']}</br>
				</if>-->
					<div style="overflow: hidden;"><span class="contentTitle1  title-text" style="float: left;">{$data.cac_name}</span>
						<!-- <a style="float: left;padding: 5px 0px 0px 5px;"><img src="../images/tsgIn.png"></a> -->
						<!--<a class="zxyy pull-right" href="{:U('Pubservice/Facility/bespeak',array('tab_cid'=>$data['id'],'area'=>$data['area'],'tablename'=>$_GET['tablename']))}">在线预约</a>-->
					</div>
					<div class="clearfix"></div>
					{$data.publish_content}
					<!-- <div style="margin-top: 10px;">
						<div style="float: left;width: 800px;">
							<p class="contentMainP">山西省图书馆是国家举办的公益性图书馆，是山西省文献信息资源和数字资源的收藏与生产、交流与服务、协作协调与业务研究的中心，具有保 存人类文化遗产、开展社会教育、传递科学情报、开发智力资源、文化休闲娱乐等职能，为山西省社会公众和党政机关、科研教育和生产单位提供阅 读和咨询服务。新馆在汾河西畔的长风商务区正式开馆。
							</p>

						</div>
						<div style="float: right;"><img src="../images/sxtsg1.png"></div>
					</div>
					<div class="clearfix"></div>
					<div style="margin-top: 40px;">
						<table class="basicInfo" style="width: 100%;">
							<tr>
								<td class="basicInfo-item name">展馆名称</td>
								<td class="basicInfo-item value">山西省图书馆新馆</td>
								<td class="basicInfo-item name">总投资</td>
								<td class="basicInfo-item value">3.5亿元</td>
							</tr>
							<tr>
								<td class="basicInfo-item name">地理位置</td>
								<td class="basicInfo-item value">汾河西畔的长风商务区</td>
								<td class="basicInfo-item name">藏书量</td>
								<td class="basicInfo-item value">700万册</td>
							</tr>
							<tr>
								<td class="basicInfo-item name">建筑面积</td>
								<td class="basicInfo-item value">5万平方米</td>
								<td class="basicInfo-item name">布置理念</td>
								<td class="basicInfo-item value">有空间必有书架，有书架必有书籍</td>
							</tr>
							<tr>
								<td class="basicInfo-item name"></td>
								<td class="basicInfo-item value"></td>
								<td class="basicInfo-item name">目标</td>
								<td class="basicInfo-item value">”终生学校“ &nbsp; &nbsp; &nbsp; &nbsp;”城市书房“</td>
							</tr>
						</table>
					</div>
					<div style="margin-top: 30px;">
						<h2 class="title-text">历史沿革</h2>
						<hr style="margin-top: 5px;margin-bottom: 10px;" />
						<p class="contentMainP">山西省图书馆的前身是1919年10月9日成立的“山西教育图书博物馆”，其后先后使用过“山西公立图书馆（附设博物馆）”、“山西省立民众教育馆”、“太原博物馆”等名称。</p>
						<p class="contentMainP">1950年改名为“山西省图书博物馆”，1953年8月又改为“山西省博物馆（设图书部）”。</p>
						<p class="contentMainP">1957年3月成立了“山西省图书馆筹备处”，与博物馆分离。</p>
						<p class="contentMainP">1960年8月28日，山西省图书馆新馆落成，正式开馆。</p>
						<p class="contentMainP">1984年又建设东阅览楼一座。</p>
						<p class="contentMainP">2013年7月2日新馆在汾河西畔的长风商务区正式开馆。建筑面积5万平方米，馆内藏书量增加到700万册，馆内适合公众阅览的席位有3000个，各类阅览室27个，设置了6个多种功能厅室，3个休闲阅 读区，有37台适合视障人群读书使用的专用设备，其中有自动转换盲文的电脑、有读书机、有针对弱视群体的幻灯机等。该馆可用数字资源主要包括：电子图书114万册，电子期刊约2万种，电子报纸约700 多种，学位论文约272万篇，会议论文约372万篇，视频资料约6565小时。
						</p>

					</div>
					<div style="margin-top: 30px;">
						<h2 class="title-text">馆藏规模</h2>
						<hr style="margin-top: 5px;margin-bottom: 10px;" />
						<div>
							<div style="width:650px;float: left;">
								<p class="contentMainP">山西省图书馆由文源馆和长风馆组成。文源馆位于解放南路文源巷1号，总建筑面积1.8万平方米，主体建筑中心四层、 两翼三层，风格古朴、厚重、典雅，曾被列为全国图书馆建筑典范之一。文源馆包括山西省少年儿童图书馆和山西省古籍 保护中心。长风馆作为山西省图书馆的主馆区，位于太原市长风商务区“文化岛”，是“十一五”时期全省大型公共文化 设施建设项目之一，占地面积60亩，建筑面积5万平方米，设计藏书量700万册，有各类阅览室27个，可容纳3000人同时 阅览，还有视听室、报告厅、多功能厅、展厅以及可供读者选择的专题阅览区、数字多媒体体验区、休闲阅读区等，是省 城的十大建筑之一，已成为省城的文化新地标。
								</p>

							</div>
							<div style="float: right;"><img src="../images/sxtsg2.png"></div>
						</div>
					</div>
					<div class="clearfix"></div>
					<div style="margin-top: 30px;">
						<h2 class="title-text">场馆管理</h2>
						<hr style="margin-top: 5px;margin-bottom:10px;" />
						<h3 class="title-text" style="margin-bottom: 10px;">人员配置</h3>
						<p class="contentMainP">现有编制170人，男职工63人，女职工107人。其中大学本科以上学历的职工70人，大专学历的职工52人，大专以上人数占总人数的73.9%。</p>
						<p class="contentMainP">现有高级职称23人，中级职称57人。</p>
						<p class="contentMainP">现有业务部室13个，分别是：采编部、借阅部、报刊部、特藏部、地方文献部、信息咨询部、少儿部、声像缩微部、自动化网络部、培训辅导部、数字化工作室、读者工作部、学术委员会；管理部门 4个：办公室、行财科、保卫科和物业中心；另外，省图书馆学会办公室也附设于我馆。
						</p>
						<h3 class="title-text" style="margin-bottom: 10px;">部门简介</h3>
						<p class="contentMainP"><b>采编部</b></p>
						<p class="contentMainP">位于主楼一层西侧，是图书馆的基础业务部门，主要负责全馆普通中外文图书文献及声像资料的采选和订购，并进行标引、编目，建立书目数据库，为读者查询和借阅提供科学、实用的检索工具，并 进行新书推荐，以利于读者及时了解和利用馆藏新书。
						</p>
						<p class="contentMainP"><b>借阅部</b></p>
						<p class="contentMainP">本馆主要的对外服务部门之一，设有五个开架借阅室，为持证读者提供图书阅览和外借服务，同时为有关读者提供预约借书与送书上门等特殊服务。还与国家图书馆等建立了馆际互借协作关系，为山 西省政治、经济、文化和科研建设提供文献保证。
						</p>
						<p class="contentMainP"><b>报刊部</b></p>
						<p class="contentMainP">收藏有解放前至今的中外文报纸、期刊，设有期刊阅览室(主楼二层东侧，社科现刊、普通期刊过刊)、报纸阅览室（主楼二层西侧）、期刊综合阅览室（主楼三层东侧，自科现刊、港台刊、外文刊、 复本过刊、读者自习），可提供报刊阅览、复本过期期刊外借、文献复制等服务。
						</p>
						<p class="contentMainP"><b>古籍部</b></p>
						<p class="contentMainP">管理本馆馆藏古籍的业务部门，收藏有线装古籍、金石拓片、舆图字画等，负责古籍文献的修复、保护、收藏、阅览与咨询等服务。</p>
						<p class="contentMainP">下设古籍阅览室（东楼六层）、古籍文献陈列室（东楼七层）。</p>
						<p class="contentMainP"><b>少儿部</b></p>
						<p class="contentMainP">位于图书馆院东圆楼，设有中学生、小学生、低幼阅览（活动）室、少儿视听室。藏有少儿图书、期刊、报纸、视听资料等，向少年儿童及婴幼儿家长提供借阅服务。坚持“以书育人、服务第一”的 宗旨，长期开展少儿英语、思维训练、阅读与写作、语言艺术、书法、美术、音乐、舞蹈、图书馆阅读与利用指导等素质教育培训活动，成为少年儿童的第二课堂，同时为广大小读者提供参与社会实践的 机会。
						</p>
						<p class="contentMainP"><b>典藏部</b></p>
						<p class="contentMainP">本馆典藏综合性业务部门，收藏有馆中的中文图书保存本、工具书、画册、盲文图书、声像缩微资料等，负责文献的保护、典藏、阅览与咨询，提供文献复制服务、声像缩微资料的阅览服务，并负责 盲人借阅工作（提供盲人计算机、收录机、盲文书刊等）。
						</p>
						<p class="contentMainP">下设中文图书保存本阅览室（东楼二层）、工具书及画册阅览室(东楼一层)、盲人阅读区(东楼一层)等。</p>
						<p class="contentMainP"><b>培训部</b></p>
						<p class="contentMainP">主要承担北京大学成人教育学院和武汉大学成人教育学院山西省函授站和山西职工图书馆业务函授学校的招生、教学组织和管理工作及适应社会需要的各类社会培训教育工作。</p>
						<p class="contentMainP"><b>地方文献部</b></p>
						<p class="contentMainP">位于东楼三层，藏有山西地方文献、地方期刊、地方报纸，以及各种统计资料、票证、地图等特种文献，从政治、经济、文化等各个方面揭示了山西数千年的历史文化，设有山西地方文献阅览室为 读者提供咨询、阅览服务。长期向各界人士广泛征集地方文献资料。
						</p>
						<p class="contentMainP"><b>信息咨询部</b></p>
						<p class="contentMainP">主要承担文献检索、目录咨询、课题咨询及开发任务。通过搜集、整理、开发文献及其它媒体信息，为包括各级党政机关、科研生产部门在内的各类读者提供一般咨询、专题咨询与信息产品开发等 多种服务。下设总咨询台（主楼二层）、数字阅览室（东楼一层）和科技文献检索室（人大报刊复印资料、专利、标准、中外文检索刊物、工具书），藏有各种中外文大型检索刊物和专利、标准文献供 读者开架使用（主楼三层）。
						</p>
						<p class="contentMainP"><b>读者工作部</b></p>
						<p class="contentMainP">负责全馆各种类型、各种形式的宣传活动；负责图书馆服务宣传周活动；举办“文源讲坛”各类讲座；组织各种读者活动；负责全馆借阅证的办理；收集和整理读者意见，召开读者座谈会；接待省 内来宾等活动。设有办证台（主楼一层东侧）、多功能厅（主楼三层西侧）、展览厅（主楼二层）。
						</p>
						<p class="contentMainP"><b>协作协调部</b></p>
						<p class="contentMainP">主要负责省图书馆学会秘书处和共享工程省中心的日常工作，负责送书下乡的具体工作，进行全省图书馆事业建设的协作协调与调查研究、辅导、交流，实施全省文化信息资源共享工程的建设、管 理与技术培训和维护。
						</p>
						<p class="contentMainP"><b>数字化工作室</b></p>
						<p class="contentMainP">主要负责山西省图书馆网站、三晋文化信息网、山西省图书馆少儿网的管理、全馆数字资源的规划、生产制作、视频资料的制作加工（东楼八层）及文献资料的缩微拍摄加工（东楼四层）等工作。 同时，对外提供网页设计制作、网上信息发布、文字录入、排版、制版、扫描、光盘刻录等文献信息数字化服务。
						</p>
						<p class="contentMainP"><b>自动化网络部</b></p>
						<p class="contentMainP">位于东楼八层，主要负责全馆自动化、网络化工作的统一规划和管理，计算机系统的日常维护，有关课题项目的软件开发及推广工作，全馆有关人员自动化管理知识和技能的培训与指导，以及计算机 社会培训的教学及管理工作和全省图书馆自动化的普及工作、全国文化信息资源共享中心山西省中心相关技术工作。
						</p>
					</div>
					<div style="margin-top: 30px;">
						<h2 class="title-text">服务内容</h2>
						<hr style="margin-top: 5px;margin-bottom: 10px;" />
						<div style="width: 343px;height: 120px;float: right;padding:0px 10px 0px 10px;">
							<a><img src="../images/sxtsg3.png"></a>
						</div>
						<p class="contentMainP">山西省图书馆提供多样化的服务。传统服务有阅览、外借、文献复制、视听文献服务、馆际互借、公益讲座、公益展览、社会培训等，现代服 务有数字资源服务、电子阅报、移动图书馆服务、网络信息服务等，特色服务有古籍修复、参考咨询、视障服务等，基本涵盖了现代图书馆的服务 功能，形成传统服务与数字服务相融合的现代化服务新格局。
						</p>
					</div>
					<div class="clearfix"></div>
					<div style="margin-top: 30px;">
						<h2 class="title-text">主要作用</h2>
						<hr style="margin-top: 5px;margin-bottom: 10px;" />
						<p class="contentMainP">山西省图书馆是中国文化信息资源共享工程省级分中心，承担着山西省文化信息资源共享工程网点建设、日常管理、资源保障、技术支撑工作。</p>
						<p class="contentMainP">山西省图书馆是全省古籍保护工作中心，承担着组织全省实施古籍保护的普查鉴定、定级登记、申报和建立数据库、保护修复工作。</p>
						<p class="contentMainP">山西省图书馆是贫困地区流动读书工程的实施单位，承担着工程的日常建设和管理任务，为构建和谐社会和社会主义新农村建设，推动全省公共图书馆服务体系建设。</p>
					</div>
					<div style="margin-top: 30px;">
						<h2 class="title-text">服务指南</h2>
						<hr style="margin-top: 5px;margin-bottom: 10px;" />
						<p class="contentMainP">1、读者办证自愿，退证自由。</p>
						<p class="contentMainP">2、读者须遵守馆内各项规章制度。</p>
						<p class="contentMainP">3、读者持读者证可在山西省图书馆指定范围内借阅文献（特殊文献按《晋价费字29号文件》规定办理）。</p>
						<p class="contentMainP">4、在符合山西省图书馆有关规定的前提下，可以委托办理图书代借代还。</p>
						<p class="contentMainP">5、读者证如有遗失，请及时向山西省图书馆馆办证台挂失，未办理挂失手续引起的一切后果，由读者本人负责。挂失并还清所借图书、交付相关费用后方可重新办理新证。</p>
						<p class="contentMainP">6、请爱护读者证，避免磨损、折断或恶意读卡、自行变更相关信息等，若由此导致读者证无法使用，责任由持证者承担。</p>
					</div>
				</div>
				<div class="clearfix"></div> -->
			</div>
			<!-- <a href="{:U('Pubservice/Facility/bespeak',array('tab_cid'=>$data['id'],'area'=>$data['area'],'tablename'=>$_GET['tablename']))}">在线预约</a>
			{$data.publish_content} -->
			
		</div>
		<br>
		<template file="Pubservice/Common/_foot"/>
	</body>

</html>