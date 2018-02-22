<extend name="shuipf/Template/Default/Industry/common/_layout.php" />
<block name="after_styles">
	<link rel="stylesheet" href="{$config_siteurl}statics/ci/css/card.css" />
	<link rel="stylesheet" href="{$config_siteurl}statics/ci/css/list_consume_message.css" />
	<link rel="stylesheet" href="{$config_siteurl}statics/ci/css/show_buy.css" />
	<script type="text/javascript" src="{$config_siteurl}statics/ci/js/jquery.min.js"></script>
</block>
<block name="content">
	<!--头部导航-->
	<div id="nav">
		<div class="container">
			<ul>
				<li>
					<a href="{:U('Industry/Index/index')}" class="home_src">首页</a>
				</li>
				<li><span>></span></li>
				<li>
					<a href=".{:getCategory(16,'url')}">消费服务</a>
				</li>
				<li><span>></span></li>
				<li>
					<a href="javascript:;">消费资讯</a>
				</li>
				<li><span>></span></li>
                <li>{$title|str_cut=###,30}</li>
			</ul>
			<form action="">
				<input type="text" placeholder="输入你要搜索的关键字" />
				<input type="submit" value="搜索" />
			</form>
		</div>
	</div>
	<!--内容-->
	<div id="content">
			<div class="container clearfix">
				<div class="clearfix cardshowcon">
					<div class="cardshowlt">
						<div class="cshowmain">
							<div class="maintit"><strong style="color: #333;">{$title|str_cut=###,30}</strong></div>
							<div class="cardparas clearfix">
								<div class="prodimg shdbox" style="width: 248px;height: 330px;">
									<img src="" style="width: 248px;height: 280px;"/>
								</div>
								<dl class="dlspecific">
									<dt>时　　间</dt>
									<dd>
										{$inputtime|date="Y.m.d",###}
									</dd>
									<dt>场　　馆</dt>
									<dd >
										山西矩管
									</dd>
									</dd>
									<dt>参演演员</dt>
									<dd>
										张一楠 刘丰盛 田义井
									</dd>
									<dt>联系电话</dt>
									<dd>
										15512401635
									</dd>
								</dl>
								<ul>
									<div class="time">
										<p>日期长次</p>
										<li>
											<span>2016-09-30</span>
											<span>周五 19:30</span>
										</li>
										<li>
											<span>2016-09-30</span>
											<span>周五 19:30</span>
										</li>
									</div>
									<div class="time">
										<p style="min-height: 60px;">选择价格</p>
										<li>
											<p>280</p>
										</li>
										<li>
										</li>
										<li>
											<p>280</p>
										</li>
										<li>
										</li>
										<li>
											<p>280</p>
										</li>
										<li>
										</li>
									</div>
								</ul>
								<a href="" class="buy" style="margin-left: 165px;width: 92px;height: 38px;background: blue;float: left;font-size: 20px;line-height: 38px;text-align: center;color: white;">
									立即购买
								</a>
							</div>
							<div class="cardhuitit">
								<strong>线下优惠细则</strong>
								<span>持文消卡9折优惠</span>
							</div>

							<dl class="dlcardinfo">
								<dt>
		                            <a class="on" href="#">演出信息</a>
		                            <a href="#">交通路线</a>
		                            <a href="#">剧组图片</a>
		                            <a href="#">付款方式</a>
                        		</dt>
								<dd>
									<cite>
                                		<h5> 剧情简介：</h5>
                                		<!-- <p>正在建设中</p> -->
                                		<!-- <h5>项目简介:</h5> -->
                                		<p>现代京剧《党的女儿》以江西为故事发生地，描写红军长征期间、白色恐怖下的普通共产党员在极其艰险的环境下建立基层党组织，坚持顽强斗争，讴歌了年轻的基层女共产党员为了完成革命任务坚守革命信仰而献身的精神。</p>
                                		<p>著名导演杨小青主持创作，导演由杨小青、徐孟珂担任，唱腔设计邱小波，音乐总监张顺翔，作曲汪珅，舞美设计孙大庆，灯光设计周正平，可谓大腕云集。一批国家京剧院新生代优秀青年演员付佳、郭霄、查思娜、郭凡嘉、田磊、李博、王越、胡滨以及小演员布尼王茜等青春荟萃，此外剧组还邀请了党史、京剧界的专家坐镇把关。</p>
                            		</cite>
								</dd>
								<dd hidden>
									<cite>
                                		<h5> 交通路线：</h5>
                                		<img src="{$config_siteurl}statics/ci/images/map1.jpg" alt="">
                                		<img src="{$config_siteurl}statics/ci/images/map2.jpg" alt="">
                            		</cite>
								</dd>
								<dd hidden>
									<cite>
                                		<h5> 剧组图片：</h5>
                                		<img src="{$config_siteurl}statics/ci/images/image1.jpg" alt="">
                            		</cite>
								</dd>
								<dd hidden>
									<cite>
                                		<h5> 付款方式：</h5>
                                		<p style="font-size: 14px;color: #5d5d5e;">&nbsp;&nbsp;支持多家网上银行、支付平台（支付宝、快钱、银联、微信支付等）在线支付 </p>
                                		<img src="{$config_siteurl}statics/ci/images/images2.jpg" alt="">
                            		</cite>
								</dd>
							</dl>
						</div>
					</div>
					<div class="cardshowrt">
						<div class="mapbox shdbox">
							<img src="{$config_siteurl}statics/ci/images/tmpmap.jpg">
						</div>

						<div class="rtbox shdbox">
							<div class="maintit"><strong>猜你喜欢</strong></div>
							<ul class="ulguess">
								<li>
									<div class="tit">
										<a href="">中山公园音乐堂</a>
									</div>
									<div class="ulstars">
										<div class="li"></div>
										<div class="li"></div>
										<div class="li"></div>
										<div class="li"></div>
										<div class="li"></div>
										<p style="width: 60%;"></p>
									</div>
									<img src="{$config_siteurl}statics/ci/images/tmppicguess.jpg">
								</li>
								<li>
									<div class="tit">
										<a href="">中山公园音乐堂</a>
									</div>
									<div class="ulstars">
										<div class="li"></div>
										<div class="li"></div>
										<div class="li"></div>
										<div class="li"></div>
										<div class="li"></div>
										<p style="width: 60%;"></p>
									</div>
									<img src="{$config_siteurl}statics/ci/images/tmppicguess.jpg">
								</li>
								<li>
									<div class="tit">
										<a href="">中山公园音乐堂</a>
									</div>
									<div class="ulstars">
										<div class="li"></div>
										<div class="li"></div>
										<div class="li"></div>
										<div class="li"></div>
										<div class="li"></div>
										<p style="width: 60%;"></p>
									</div>
									<img src="{$config_siteurl}statics/ci/images/tmppicguess.jpg">
								</li>

							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>	
	<script>
	  $(function(){
	      $(".top_menuItem").eq(6).addClass("choose");

	      $(".dlcardinfo dt").find("a").on("click",function(){
	      	$(this).addClass("on").siblings("a").removeClass("on");
	      	var index = $(this).index();
	      	$(".dlcardinfo").find("dd").eq(index).show().siblings("dd").hide();
	      	return false;
	      });

	      $(".publish").on("click",function(){
            layer.msg('请先登录',{
                end: function(){
                    window.location.href = '{$config_siteurl}statics/ci/reg_login/login-personal-pub.html';
                }
            });
            return false;
        });
	  });
	</script>

</block>