<extend name="shuipf/Template/Default/Content/common/_layout.php" />
<block name="after_styles">
	<link rel="stylesheet" href="{$Config_siteurl}statics/css/finance.css">
	<style>
		#banner.agent_banner{width: 1200px;margin: 0 auto}
	</style>
</block>
<block name="content">
	<div id="banner" class ='agent_banner'>
		<img src="{$Config_siteurl}statics/images/banner-1.jpg" />
	</div>
	<div id="search">
			<div class="container clearfix">
				<p class="tips">欢迎关注山西文化产业微信公众号：2356982455</p>
				<form action="">
					<input type="text" placeholder="输入你要搜索的关键字" value="" id="b">
					<input class="search_btn" type="button" value="搜索"  onclick="text()">
				</form>
			</div>
		</div>
		<div id="nav">
			<div class="container">
				<ul>
					<li>
						<a href="{$config_siteurl}" class="home_src" style="color:#900;">首页</a>
					</li>
					<li><span>></span></li>
					<li>
						<a href="javascript:;" class="href_tail" style="color:#900;">金融服务</a>
					</li>
				</ul>
			</div>
		</div>
		<div id="content">
			<div class="container clearfix">
				<div class="finan_l">
					<h2 class="credit_finance" ><a href="{:getCategory(24,'url')}" class="apply">申请</a> </h2>
					<!-- <p class="explain"></p> -->
					<ul class="finlul">
						<li>
							<div class="star_enterprise">
								<span class="allstar">
                        <span class="colourstar" style="width:100%"></span>
								</span>
								<span class="enterprise">五星级企业</span>
							</div>
							<!-- <p>1.平台企业诚信评价规则及填写说明</p>
							<p>2.平台企业诚信评价规则及填写说明</p>
							<p>3.平台企业诚信评价范德萨范德萨分地方撒规则及填写说明</p> -->
							<p style="height: auto;line-height: 22px;margin-top: 12px;">四星基础上填写上年度可抵押物资产总额，上年度资产负债率。</p>
						</li>
						<li>
							<div class="star_enterprise">
								<span class="allstar">
                        <span class="colourstar" style="width:70%"></span>
								</span>
								<span class="enterprise">四星级企业</span>
							</div>
							<!-- <p>1.平台企业诚信评价规则及填写说明</p>
							<p>2.平台企业诚信评价规则及填写说明</p>
							<p>3.平台企业诚信评价范德萨范德萨分地方撒规则及填写说明</p> -->
							<p style="height: auto;line-height: 22px;margin-top: 12px;">三星基础上填写上年度年产值、上年度销售总额，上年度纳税总额，上年度资产总额</p>
						</li>
						<li>
							<div class="star_enterprise">
								<span class="allstar">
                        <span class="colourstar" style="width:50%"></span>
								</span>
								<span class="enterprise">三星级企业</span>
							</div>
							<!-- <p>1.平台企业诚信评价规则及填写说明</p>
							<p>2.平台企业诚信评价规则及填写说明</p>
							<p>3.平台企业诚信评价规则及填写说明</p> -->
							<p style="height: auto;line-height: 22px;margin-top: 12px;">在二星级基础上填写企业职工人数、是否缴纳社会保险、缴纳社会保险人数、企业上年
度水电费总额。</p>
						</li>
						<li>
							<div class="star_enterprise">
								<span class="allstar">
                        <span class="colourstar" style="width:35%"></span>
								</span>
								<span class="enterprise">二星级企业</span>
							</div>
							<!-- <p>1.平台企业诚信评价规则及填写说明</p> -->
							<!-- <p>2.平台企业诚信评价规则及填写说明</p> -->
							<p style="height: auto;line-height: 22px;margin-top: 12px;">填写企业名称、企业法人代表,联系方式，上传企业营业执照和税务登记证。五项内容均
为必填写项，信息填写不完整不予评级。</p>
						</li>



					</ul>
					<a class="more" href="{:U('Content/Finance/credit_result')}">更多 >> </a>
				</div>
				<div class="finan_r">
					<div class="rcon">
						<div class="rcontop">
							<span hidden>(技融资库最新发布)</span>
							<a class="more" href="{:U('Content/Finance/index')}">更多 >> </a>
						</div>
						<ul class="agentul">
							<?php
//								$agent = D('Content/IndustryAgent');
//								$agent_data = $agent->join('cu_industry_issue ON cu_finance_agent.objid = cu_industry_issue.id')
//												->order('inputtime DESC')
//												->field('cu_industry_issue.id,pname,pthumb,pbriefing')
//												->limit(4)
//												->select();

							?>
							<foreach name = 'agent_data' item = "vo">
								<li>
									<a href="#">
										<img src="{:thumb($vo['pthumb'],170,150)}" style="width: 170px;height: 150px;">
										<h3>{$vo.pname}</h3>
										<p>{$vo.pbriefing}</p>
										<!-- <p>投资总额:4200.00万</p> -->
									</a>
								</li>
							</foreach>

						</ul>
					</div>
					<div class="rcon">
						<div class="rcontop xindai">

							<a class="more" href="{:getCategory(35,'url')}">更多 >> </a>
						</div>
						<div class="cre credit_l">
							<h4>金融产品</h4>
							<content action='lists' catid='36' order = "id DESC" num='3'>


							<ul>
								<volist name = "data" id = "vo">
									<li>
										<a href="#">
											<img src=".{:thumb($vo['thumb'],107,103)}" style="width: 107px;height: 103px;">
											 <p>{$vo.title|str_cut=###,4}</p>
										</a>
									</li>
								</volist>


							</ul>
							</content>
						</div>
						<div class="cre credit_r">
							<h4>信贷政策</h4>
							<content action='lists' catid='36' order = "id DESC" num='4'>
								<ul>
									<volist name='data' id='vo'>
										<li>
											<a href="#">
												<span class="spanlist">【 {$i} 】</span> {$vo.title|str_cut=###,15}
											</a>
										</li>
									</volist>
								</ul>
							</content>
						</div>
					</div>
				</div>
				<div class="yinhang">
					<p class="titp w_bank"></p>

						<get table="links" termsid="2" visible="1" order="id DESC" num="5">
							<volist name="data" id='vo'>
								<a href="#"><img src=".{$vo.image}" style="height: 60px;"></a>
							</volist>
						</get>

					<!-- <a href="#"><img src="{$Config_siteurl}statics/images/yinhang2.jpg"></a> -->
					<!-- <a href="#"><img src="{$Config_siteurl}statics/images/yinhang3.jpg"></a> -->
					<!-- <a href="#"><img src="{$Config_siteurl}statics/images/yinhang4.jpg"></a> -->
				</div>
				<div class="yinhang">
					<p class="titp"></p>
					<get table="links" termsid="1" visible="1" order="id DESC" num="3">
						<volist name = "data" id="vo">
							<a href="{$vo.url}">
								<div class="fund"><img src=".{:thumb($vo['image'],258,44,1)}" alt="" ></div>
								<P>{$vo.name|str_cut=###,20}</P>
							</a>
						</volist>

					</get>
				</div>
			</div>
		</div>
		<ul class="side-right">
			<li>
				<a href="#"><img src="{$Config_siteurl}statics/images/service.png" alt="客服热线"></a>
			</li>
			<li>
				<a href="#"><img src="{$Config_siteurl}statics/images/return.png" alt="返回顶部"></a>
			</li>
		</ul>

</block>
<block name="after_scripts">
	<script type="text/javascript" >
	function text(){
		var value = document.getElementById("b").value;
		window.location.href='{:U("Content/Search/index")}&key='+value;
	}
	</script>
</block>
