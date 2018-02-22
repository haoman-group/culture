<extend name="shuipf/Template/Default/Industry/common/_layout.php" />
<block name="after_styles">
	<link rel="stylesheet" href="{$config_siteurl}statics/ci/css/card.css" />
	<link rel="stylesheet" href="{$config_siteurl}statics/ci/css/list_consume_message.css" />

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
					<a href="{:U('Industry/Finance/credit_result')}">评价结果</a>
				</li>
				<li><span>></span></li>
				<li>
					<a href="javascript:;" style="color: #900;">消费资讯</a>
				</li>
			</ul>
			<form action="">
				<input type="text" placeholder="输入你要搜索的关键字" />
				<input type="submit" value="搜索" />
			</form>
		</div>
	</div>
	<!--内容-->
	<div id="content">
			<div class="content_main">
				<div class="content_main_title">
					<h2 style="color:#900">|&nbsp;<if condition='$_GET["level"]==2'>二星企业<elseif condition='$_GET["level"]==3'/>三星企业<elseif condition='$_GET["level"]==4'/>四星企业<else/>五星企业</if></h2>
				</div>
				<div class="content_main_pic">
					<ul>
						<volist name='data' id="vo" >
							<if condition = "$i lt 3">
							<li>
								<a href="{:U('Industry/Finance/company_profile')}">
								<img src="{:thumb($vo['tax'],260,165)}" alt="" style="height: 165px;width: 260px;" />
								<span>11111</span>
								</a>
							</li>
							</if>
						</volist>				
					</ul>
				</div>
				
				<div class="content_main_list">
					
					<ul class="clearfix" style="width: auto;">
						<volist name='data' id="vo" >
							<if condition = "$i gt 3">
							<li style="clear: both; width: 100%;"><a href="{$vo.url}"><em>●</em>111111</a></li>
							</if>
						</volist>
					</ul>
					
					<div class="pagebox">
                		{$page}
            		</div>	
				</div>	
			</div>
			
	</div>
</block>