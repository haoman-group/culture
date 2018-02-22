<extend name="shuipf/Template/Default/Industry/common/_layout.php" />
<block name="after_styles">
	<link rel="stylesheet" href="{$config_siteurl}statics/ci/css/card.css" />

</block>
<block name="content">
	<div id="nav">
		<div class="container">
			<ul>
				<li>
					<a href="{$config_siteurl}">首页</a>
				</li>
				<li><span>></span></li>
				<li>
					<a href=".{:getCategory(16,'url')}">消费服务</a>
				</li>
				<li><span>></span></li>
				<li>
					<a href="javascript:;">优惠信息</a>
				</li>
			</ul>
			<form action="">
				<input type="text" placeholder="输入你要搜索的关键字" value="" id="b" />
				<input type="button" value="搜索" class="search_btn" onclick="text()" />
			</form>
		</div>
	</div>
		<div id="content">
			<div class="container clearfix">
				<div class="listbox clearfix">
					<div class="listlf">
						<div class="tit clearfix">
							<h5>优惠信息</h5>
							<ul>
								<li class="on"><a href="#">综合</a></li>
								<li><a href="#">按热门<img src="{$config_siteurl}statics/ci/images/down.png" alt=""></a></li>
								<li><a href="#">按演出时间<img src="{$config_siteurl}statics/ci/images/down.png" alt=""></a></li>
							</ul>
						</div>
						<div class="txt">
							<content action="lists" catid="$catid" order="id DESC" num="4" page='$page'>
								<volist name="data" id="vo">
									<dl class="clearfix">
										<dt><a href=".{$vo.url}"><img src="{:thumb($vo['thumb'],133,178)}" alt="党的女儿" style="width: 133px;height: 178px;" /></a></dt>
										<dd>
											<a href=".{$vo.url}"><h5>{$vo.title|str_cut=###,30}</h5></a>
											<p>{$vo.description|str_cut=###,50}</p>
											<p>时间：{$vo.inputtime|date="Y-m-d",###}  场馆：山西剧院</p>
											<p>票价：350元</p>
											<p>状态：售票中</p>
											<div class="btn">
												<a href=".{$vo.url}"><input type="button" value="立即购买" /></a>
												<input type="button" value="添加收藏" />
											</div>
										</dd>
									</dl>
								</volist>
							</content>
						</div>						
					</div>
					<div class="listrg">
						<h5>热门信息</h5>
						<content action="lists" catid="$catid" order="id DESC" num="2" page='$page'>
							<volist name="data" id="vo">
								<a href="#">
									<img src="{:thumb($vo['thumb'],227,304)}" alt="非请莫入" style="width: 227px;height: 304px;" />
								</a>
							</volist>
						</content>
					</div>					
				</div>
				<div class="pagebox">
                    	{$pages}
            	</div>
			</div>
		</div>		
</block>
<block name="after_scripts">
	<script type="text/javascript" >
	function text(){
		var value = document.getElementById("b").value;
		window.location.href='{:U("Content/Search/index")}&key='+value;
	}
	</script>
</block>