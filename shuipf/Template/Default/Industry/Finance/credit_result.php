<extend name="shuipf/Template/Default/Industry/common/_layout.php" />
<block name='after_styles'>
	<link rel="stylesheet" href="{$config_siteurl}statics/ci/css/base.css" />
	<style type="text/css">
		#content .comment dl dt{
			width: 535px;
		}
		#content .comment dl dd{
			width: 535px;
		}
		#content .comment dl:nth-of-type(2n){
			margin-left: 24px;
		}
		#content .comment dl:nth-of-type(2n+1){
			margin-left: 2px;
		}
		#content .comment dl:nth-of-type(1){
			
		}
		
	</style>
</block>
<block name='content'>
	<div id="nav">
		<div class="container">
			<ul>
				<li>
					<a href="{:U('Industry/Index/index')}" class="home_src" style="color:#900;">首页</a>
				</li>
				<li><span>></span></li>
				<li>
					<a href="{:U('Industry/Index/lists',array('catid'=>21))}">金融服务</a>
				</li>
				<li><span>></span></li>
				<li>
					<a href="javascript:;" class="href_tail" style="color:#900;">企业诚信评价</a>
				</li>
			</ul>
			<!--<form action="">
				<input type="text" placeholder="输入你要搜索的关键字" />
				<input type="submit" value="搜索" />
			</form>-->
		</div>
	</div>
		<div id="content">
			<div class="container">
				<div class="comment clearfix">
					<h5>企业诚信评价结果</h5>
					
						<dl>
							<a href="{:U('Industry/Finance/company_list',array('level'=>5))}">	
							<dt>五星级企业</dt>
							<dd>在四星基础上填写上年度可抵押物资产总额，上年度资产负债率。此评价系统星级晋升必须满足前一星级能够达成，若未达成则保持其之前星级不变。每年度3-6月进行信息重置，系统提前通过邮箱通知企业进行信息重置。电脑根据重置信息予以重新评定星级，逾期不予填写的系统自动删除。（后台数据保留）</dd>
							</a>
						</dl>
					
						
					<dl>
						<a href="{:U('Industry/Finance/company_list',array('level'=>4))}">
						<dt>四星级企业</dt>
						<dd>在三星基础上填写上年度年产值、上年度销售总额，上年度纳税总额，上年度资产总额；此评价系统星级晋升必须满足前一星级能够达成，若未达成则保持其之前星级不变。每年度3-6月进行信息重置，系统提前通过邮箱通知企业进行信息重置。电脑根据重置信息予以重新评定星级，逾期不予填写的系统自动删除。（后台数据保留）</dd>
						</a>
					</dl>
					
						
						
					<dl>
						<a href="{:U('Industry/Finance/company_list',array('level'=>3))}">
						<dt>三星级企业</dt>
						<dd>在二星基础上填写企业职工人数、是否缴纳社会保险、缴纳社会保险人数、企业上年度水电费总额。此评价系统星级晋升必须满足前一星级能够达成，若未达成则保持其之前星级不变。每年度3-6月进行信息重置，系统提前通过邮箱通知企业进行信息重置。电脑根据重置信息予以重新评定星级，逾期不予填写的系统自动删除。（后台数据保留）</dd>
						</a>
					</dl>
					
						
					<dl>
						<a href="{:U('Industry/Finance/company_list',array('level'=>2))}">
						<dt>二星级企业</dt>
						<dd>填写企业名称、企业法人代表,联系方式，上传企业营业执照和税务登记证。五项内容均为必填写项，信息填写不完整不予评级。此评价系统星级晋升必须满足前一星级能够达成，若未达成则保持其之前星级不变。每年度3-6月进行信息重置，系统提前通过邮箱通知企业进行信息重置。电脑根据重置信息予以重新评定星级，逾期不予填写的系统自动删除。（后台数据保留）</dd>
						</a>
					</dl>
					
					
				</div>
			</div>
		</div>
		<ul class="side-right">
			<li>
				<a href="#"><img src="../images/service.png" alt="客服热线"></a>
			</li>
			<li>
				<a href="#"><img src="../images/return.png" alt="返回顶部"></a>
			</li>
		</ul>
	</block>	
	