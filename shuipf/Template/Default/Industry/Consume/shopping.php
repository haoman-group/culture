<extend name="shuipf/Template/Default/Industry/common/_layout.php" />
<block name="after_styles">
	<link rel="stylesheet" href="{$config_siteurl}statics/ci/css/card.css" />
	<link rel="stylesheet" href="{$config_siteurl}statics/ci/css/list_consume_message.css" />
	<link rel="stylesheet" href="{$config_siteurl}statics/ci/css/show_buy.css" />
	<script type="text/javascript" src="{$config_siteurl}statics/ci/js/jquery.min.js"></script>
	<style type="text/css">
		.goods_share img{
			margin-right: 8px;
		}
	</style>
</block>

<block name="content">

	<!--头部导航-->
	<div id="nav">
		<div class="container">
			<ul>
				<li>
					<a href="{:U('Industry/Index/index')}">首页</a>
				</li>
				<li><span>></span></li>
				<li>
					<a href="{:U('Industry/Index/lists',array('catid'=>16))}">消费服务</a>
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

							<form action="/index.php?m=Consume&a=orderbuy" method="post" id="formbuy">
							<div class="maintit"><strong style="color: #333;">{$data.title|str_cut=###,30}</strong></div>
							<div class="cardparas clearfix" style="position: relative;">
								<div class="prodimg shdbox" style="width: 248px;height: 330px;">
									<img src="{$data.thumb}" style="width: 248px;height: 280px;"/>
									 <div class="goods_share" style="color: #313131;font-size: 16px;margin-top: 8px;width: 270px;">分享到：
	            <a style="width: 35px;height: 35px;" href="" class="sina"><img style="width: 35px;height: 35px;" src="{$Config_siteurl}statics/img/weibo.png" alt="微博"></a>
	            <a style="width: 35px;height: 35px;" href="" class="wx"><img style="width: 35px;height: 35px;" src="{$Config_siteurl}statics/img/weixin.png" alt="微信"></a>
	            <a style="width: 35px;height: 35px;" href="" class="douban"><img style="width: 35px;height: 35px;" src="{$Config_siteurl}statics/img/douban.png" alt="豆瓣">
	            </a><a style="width: 35px;height: 35px;" href="" class="doudou"><img style="width: 35px;height: 35px;" src="{$Config_siteurl}statics/img/doudou.png" alt="豆豆"></a>
	        </div>
								</div>
								<dl class="dlspecific">
									<dt>时　　间</dt>
									<dd>
										<?php echo date('Y.m.d')?>-<?php echo date("Y.m.d",strtotime("+3 day"));?>
									</dd>
									<dt>场　　馆</dt>
									<dd >
										{$data.address}
									</dd>
									</dd>
									<dt>参演演员</dt>
									<dd>
										<volist name="person" id="vo">{$vo}&nbsp;&nbsp;</volist>
									</dd>
									<dt>联系电话</dt>
									<dd>
										{$data.tel}
									</dd>
								</dl>
								<ul>
<!--									<div class="time">-->
<!--										<p>价格</p>-->
<!--										<li class="liprice">￥<strong>20.00</strong></li>-->
<!--									</div>-->
									<div class="time changci">
										<p>日期场次</p>
										
											
										<li>
											<volist name="time" id="vo">
												
											<span>{$vo}</span>
											<!--<span>2016-09-30周五 19:30</span>-->
											</volist>

										</li>
										
									</div>

									<div class="time choseprice">
										<p style="min-height: 60px;">选择价格</p>
										<li>
										<volist name="d" id="v">
												<span>
													{$v}
												</span>


										</volist>
										</li>

									</div>
									<div class="time">
										<p>选择数量</p>
										<li class="opnuminps">
											<input value="-" type="button" class="btnopnum">
											<input type="text" value="1" class="inptxt inpnum">
											<input type="button" value="+" class="btnopnum">
										</li>
									</div>
									<div class="time btntime">
										<p>&nbsp;</p>
										<li>
											<a href="" class="btnbuy">
												立即购买
											</a>
										</li>
									</div>
								</ul>

								</form>

							</div>
							<div class="cardhuitit">
								<strong>线下优惠细则</strong>
								<span>持文消卡9折优惠</span>
							</div>

							<dl class="dlcardinfo" style="overflow: auto;">
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
                                		<ul style="width: 850px;">
                                			<volist name="content" id="vo">
                                				<li><img style="height: 215px;width: 255px;float: left; margin-right: 18px;padding-bottom: 18px;" src="{$vo}"/></li>
                                			</volist>
                                		</ul>
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
								<foreach name="guess" item="vo" >
									<li>
										<div class="tit">
											<a href="{:U('Industry/Consume/shopping',array('id'=>$vo['id']))}">{$vo.title}</a>
										</div>
										<div class="ulstars">
											<div class="li"></div>
											<div class="li"></div>
											<div class="li"></div>
											<div class="li"></div>
											<div class="li"></div>
											<p style="width: 60%;"></p>
										</div>
										<a href="{:U('Industry/Consume/shopping',array('id'=>$vo['id']))}"><img src="{:thumb($vo['thumb'],264,148)}"></a>
									</li>
								</foreach>
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


		  $(".cardparas ul li span").click(function(){
			  $(this).addClass("on").siblings().removeClass("on");
		  });

		  $(".opnuminps .btnopnum").click(function(){
			  var num = $(this).siblings(".inptxt").val();
			  num =parseInt(num);
			  num = num+ ($(this).val() === "+"?-1:1)*-1;
			  if(num<1) {num=1;}
			  $(this).siblings(".inptxt").val(num);
		  })

		  $(".btnbuy").click(function(){
			  if($(".changci .on").length === 0){
				  alert("请选择场次!");return false;
			  }
			  if($(".choseprice .on").length === 0){
				  alert("请选择价格!");return false;
			  }
			  if(isNaN($(".inptxt").val())){
				  alert("请填写数量!");return false;
			  }

			  $("#formbuy").submit();
			  return false;

		  })

	  });
	</script>

</block>