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
					<a href="{:U('Industry/Index/index')}" style="color:#900;">首页</a>
				</li>
				<li><span>></span></li>
				<li>
					<a href=".{:getCategory(1,'url')}" style="color:#900;">购买订单</a>
				</li>

			</ul>

		</div>
	</div>
	<!--内容-->
	<div id="content">
			<div class="container clearfix confirmorder">
				<form id="form" action="/index.php?m=Consume&a=orderpay" method="post">
					<h5><span>确认收货地址</span><a class="manage" href="/index.php?g=Member&m=Buyerservice&a=address">管理收货地址</a></h5>

					<div class="address">
						<div class="ul">
							<input type="hidden" name="addrid" value="{$addrlist.0.id}">
							<volist name="addrlist" id="vo">
								<a data-addrid="{$vo.id}"  <eq name="vo.default" value="1" >class="on"</eq> href="javascript:void(0)">
								<ul>
									<li>
										<em>{$vo.name}</em>（收）<span class="aaddredit btnaddr"  >修改本地址</span>
									</li>
									<li>{$vo.area}</li>
									<li>{$vo.address}（{$vo.name}   收）</li>
									<li>{$vo.phone}</li>
								</ul>
								</a>
							</volist>
							<a data-addrid="" class="addnew btnaddr" href="javascript:void(0)">
								<span>+</span>
								添加新地址
							</a>
						</div>
					</div>

					<h5>确认订单信息</h5>
						<dl class="orderconfirminfo">
							<dt>商品名称：</dt>
							<dd>
								<a href="/index.php?m=Consume&a=shopping&id=7">大型经典京剧现代戏-《党的儿女》</a>
							</dd>
							<dt>选择：</dt>
							<dd class="buytypes">
								<span>场次：2016年12月22日 13:00</span><span>价格：￥180.00</span>
							</dd>
							<dt>数量：</dt>
							<dd>
								2
							</dd>
							<dt>总价：</dt>
							<dd>
								￥360.00
							</dd>

						</dl>

					<div class="btnsubbox">
						<a href="javascript:history.back();" class="return">返回</a>
						<a href="javascript:$('#form').submit()" class="btnsubmorder">提交订单</a>
					</div>
				</form>



			</div>
		</div>

	<div class="tempbox" id="tempbox" style="display: none;">
		<a data-addrid="" >
			<ul>
				<li>
					<em></em>（收）<span class="aaddredit btnaddr"  >修改本地址</span>
				</li>
				<li></li>
				<li></li>
				<li></li>
			</ul>
		</a>
	</div>
	<script>
	  $(function(){
	      $(".top_menuItem").eq(6).addClass("choose");



	  });
	  $(function(){
		  function getnew(){
			  if(!!$(".address .ul").find("input[name='addrid']").val()){
				  $(".pay #address").find("span").html($(".address .ul").find("a[class='on']").find("li:eq(1)").html() + $(".address .ul").find("a[class='on']").find("li:eq(2)").html());
				  $(".pay #name_phone").find("span").html($(".address .ul").find("a[class='on']").find("li:eq(0)").find("em").html() + $(".address .ul").find("a[class='on']").find("li:eq(3)").html());
			  }
		  }
		  getnew();
		  $(".address").on("click",".ul>a:not('.addnew')",function(){
			  $(this).addClass("on").siblings("a").removeClass("on");
			  $("[name='addrid']").val($(this).attr("data-addrid"));
			  getnew();
		  })
		  $(".address").on("click",".btnaddr",function(){
			  var addrid= $(this).closest("a").attr("data-addrid");
			  layer.open({
				  type:2,
				  title: false,
				  closeBtn: 0,
				  scrollbar: false,
				  area: ['700px','460px'],
				  shadeClose: true,
				  content: "index.php?m=Consume&a=addAddr&id="+addrid+"&fnparent=freshaddr",
			  });

		  })
		  $(".btnsubmorder").click(function(){
			  if($(".address .on").length === 0){
				  layer.msg("请选择收货地址");
				  return false;
			  }
		  })
	  })

	  function freshaddr(objaddr){
		  console.log(objaddr);
		  if(!!objaddr.id){
			  var addrid = objaddr.id;
			  var $a = $("[data-addrid = '"+addrid+"']");
			  $a.find("li").eq(0).find("em").html(objaddr.name);
			  $a.find("li").eq(1).html(objaddr.province+objaddr.city+objaddr.block);
			  $a.find("li").eq(2).html(objaddr.address+" ("+objaddr.name+"收)");
			  $a.find("li").eq(3).html(objaddr.phone);
			  $a.addClass("on").siblings().removeClass("on");
			  $("[name='addrid']").val(addrid);
		  }
		  else{
			  $a= $("#tempbox a").clone().attr("data-addrid",objaddr.newid).addClass("on");
			  $a.find("li").eq(0).find("em").html(objaddr.name);
			  $a.find("li").eq(1).html(objaddr.province+objaddr.city+objaddr.block);
			  $a.find("li").eq(2).html(objaddr.address+" ("+objaddr.name+"收)");
			  $a.find("li").eq(3).html(objaddr.phone);
			  $a.prependTo(".address .ul").siblings().removeClass("on");
			  $("[name='addrid']").val(objaddr.newid);
			  $a.trigger("click");
		  }
	  }

	</script>

</block>