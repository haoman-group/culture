<extend name="shuipf/Template/Default/Industry/common/_layout.php" />
<block name="after_styles">
	<link rel="stylesheet" href="{$config_siteurl}statics/ci/css/card.css" />
	<link rel="stylesheet" href="{$config_siteurl}statics/ci/js/layer/skin/default/layer.css" />
	<link rel="stylesheet" href="{$config_siteurl}statics/ci/css/list_consume_message.css" />
	<link rel="stylesheet" href="{$config_siteurl}statics/ci/css/show_buy.css" />
	<script type="text/javascript" src="{$config_siteurl}statics/ci/js/jquery.min.js"></script>
	<script type="text/javascript" src="{$config_siteurl}statics/ci/js/layer/layer.js"></script>
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
					<a href=".{:getCategory(1,'url')}">订单支付</a>
				</li>
			</ul>

		</div>
	</div>
	<!--内容-->
	<div id="content">
		<div class="container clearfix confirmorder">

			<form action="/Buyer/Cart/pay.html" method="post">

				<div class="submit_success">
					<div class="clearfix">
						<div class="sub_suc_left">
							<h5>订单已提交！去付款~</h5>

							<p>请在下单后<span class="lefttime">6</span>小时内完成支付，超时后将取消订单</p>

							<p>收货信息：</p>



						</div>
						<div class="sub_suc_right">
							<p>订单总额：<span>360.00元</span></p>
						</div>
					</div>
					<dl class="dlpaygoods">
						<dt><strong>订单号:</strong><span>{$vo.order_sn}</span>    <strong>小计:</strong><span>{$vo['order_amount']}</span>元</dt>
						<volist name="vo[order_goods]" id="voo">
							<dd>
								<span><a href="{:U('Shop/Product/show',array('id'=>$voo['goods_id']))}" target="_blank">{$voo.goods_name}</a> </span>
								<span>{$voo.goods_num}</span>
								<span>{$voo.goods_pay_price}</span>
							</dd>
						</volist>
						<dd>买家留言: {$vo.order_common.order_message}</dd>
					</dl>

				</div>

				<div class="pay_method">
					<h5>请选择支付方式</h5>
					<h6>支付平台</h6>
					<div data-code="ALI_WEB" class="btntopay">
						<img src="/statics/ci/images/addr/zhi.jpg" alt=""><a href="javascript:void(0)">选择支付宝付款</a>
					</div>
					<div data-code="WX_NATIVE" class="btntopay">
						<img src="/statics/ci/images/addr/wei.jpg" alt=""><a href="javascript:void(0)">微信支付</a>
					</div>
					<div data-code="UN_WEB" class="btntopay">
						<img src="/statics/ci/images/addr/unionpay.png" alt=""><a href="javascript:void(0)">银联支付</a>
					</div>

					<input type="hidden" name="payment_code" value="ALI_WEB">
					<!-- <span>请输入支付密码</span> <input type="password" value=""> -->
					<input type="hidden" name="pay_sn" value="800540910072221451">
					<!-- 支付类型，线下支付 -->
					<input type="text" name="pay_type" value="0" hidden="">

				</div>

			</form>


		</div>
	</div>


	<script>
		$(function(){
			$(".btntopay").click(function(){
				$("[name='payment_code']").val($(this).attr("data-code"));
				$("form").submit();
			})
		})
	</script>

</block>