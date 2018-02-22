<extend name="shuipf/Template/Default/Industry/common/_layout.php" />
<block name="after_styles">
<link rel="stylesheet" href="{$Config_siteurl}statics/ci/css/card.css" />
<style type="text/css">
    .lianmeng{
    	background: none;
    }
	.lianmeng .clearfix li .fund{
		border: 1px solid #f0f0f0;
		padding: 15px;
		width: 270px;
		height: 250px;
	}
	.lianmeng .ul_border{
		padding-bottom: 23.5px;
		border: 1px solid #f0f0f0;
	}
	.lianmeng .clearfix li{
		margin: 23.5px 0 0 23.5px;
	}
	.lianmeng .clearfix li .fund p{
		width: 240px;
		height: 60px;
		font-size: 16px;
		color: #808080;
		text-align: left;
		margin-top: 30px;
		line-height: 28px;
	}
</style>
</block>
<block name="content">
<div id="nav">
		<div class="container">
				<ul>
					<li>
						<a href="{:U('Industry/Index/index')}" class="home_src" style="color:#900">首页</a>
					</li>
					<li><span>></span></li>
					<li>
						<a href="{:U('Industry/Index/lists',array('catid'=>21))}">金融服务</a>
					</li>
					<li><span>></span></li>
					<li>
						<a href="javascript:;" class="href_tail" style="color:#900">企业基金</a>
						
					</li>
				</ul>
			</div>
		</div>
		<div id="content">
			<div class="container clearfix">
				<div class="lianmeng">
					 <h5 style="background: #e2ebf2;border-left: none;color: #900;height: 52px;font-size: 20px;padding-left: 20px;line-height: 52px;"><b>|</b>&nbsp;&nbsp;企业基金</h5>
					<ul class="clearfix ul_border">
					<get table="links" termsid="1" visible="1" order="id DESC" num="4" page="$page">
						<volist name="data" id='vo'>
							<li>
								<a class="fund" href="{$vo.url}">
									<img style="width: 240px;height: 48px;" src=".{:thumb($vo['image'],240,48)}" alt="{$vo.name}" />
									<h5 style="margin-top: 20px;overflow: hidden;text-overflow:ellipsis;white-space: nowrap;">{$vo.name}</h5>
									<p style="display: -webkit-box;-webkit-box-orient: vertical;-webkit-line-clamp: 2;overflow: hidden;">地址：{$vo.description}</p>
								</a>
							</li>
						</volist>
					</get>
					</ul>
				</div>
			</div>
		</div>		
</block>