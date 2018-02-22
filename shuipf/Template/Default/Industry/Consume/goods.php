<extend name="shuipf/Template/Default/Industry/common/_layout.php" />
<block name="after_styles">
	<link rel="stylesheet" href="{$config_siteurl}statics/ci/css/card.css" />

</block>
<block name="content">
	<div id="nav">
		<div class="container">
			<ul>
				<li>
					<a href="{:U('Industry/Index/index')}" style="color:#900;">首页</a>
				</li>
				<li><span>></span></li>
				<li>
					<a href="{:U('Industry/Index/lists',array('catid'=>16))}">消费服务</a>
				</li>
				<li><span>></span></li>
				<li>
					<a href="javascript:;" style="color:#900;">优惠信息</a>
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
							
								<volist name="data" id="vo">
									<dl class="clearfix" style="border-bottom: none ;float: left;padding-right: 69px;">
										<dt><a href="{:U('Industry/Consume/shopping',array('id'=>$vo['id']))}"><img src=".{:thumb($vo['thumb'],133,178)}" alt="党的女儿" style="width: 133px;height: 178px;" /></a></dt>
										<dd>
											<!--<a href="{:U('Industry/Consume/shopping',array('id'=>$vo['id']))}">-->
												<h5 style="line-height: 23px;height: 23px;">{$vo.title|str_cut=###,30}</h5>
											<!--</a>-->
											<p>{$vo.content|str_cut=###,15}</p>
											<p>时间：{$vo.time|date="Y-m-d",###}  场馆：山西剧院</p>
											<p>票价：<?php $price=explode("/",$vo['price']); echo $price['0']  ?>元</p>
											<p>状态：{$vo.status}</p>
											<div class="btn" style="margin-left: -12px;">
												<a href="{:U('Industry/Consume/shopping',array('id'=>$vo['id']))}"><input type="button" value="立即购买" /></a>
												<if condition = "$vo['follow'] eq 1">
													<input type="button" class='goods_follow' value="已收藏" />
												<else />
													<input type="button" class='goods_follow' value="添加收藏" />
												</if>
												<input type="hidden" name="good_id" value="{$vo['id']}">
											</div>
										</dd>
									</dl>
								</volist>
							
						</div>						
					</div>
					<div class="listrg">
						<h5>其他信息</h5>
						
							<volist name="a" id="vo">
								<a href="{:U('Industry/Consume/shopping',array('id'=>$vo['id']))}">
									<img src=".{:thumb($vo['thumb'],227,304)}" alt="" style="width: 227px;height: 304px;" />
								</a>
							</volist>
						
					</div>					
				</div>
				<div class="pagebox">
                    	{$page}
            	</div>
			</div>
		</div>		
</block>
<block name="after_scripts">
<script type="text/javascript" src="{$config_siteurl}statics/ci/js/layer/layer.js"></script>
	<script type="text/javascript" >
	function text(){
		var value = document.getElementById("b").value;
		window.location.href='{:U("Content/Search/index")}&key='+value;
	}
	</script>
	<script type="text/javascript">
		$(function (){
			$('.goods_follow').click(function(event) {
				/* Act on the event */
				var good_id = $(this).parent('div').find('input[name=good_id]').val();
				// alert(good_id);
				var obj = $(this);
				$.post('{:U("Content/Consume/goods_follow")}', {'good_id': good_id}, function(data) {
					//取消成功
					if(data.status==2){
						layer.msg(data.message,{
				        end: function(){
				           	obj.val('添加收藏')
				        	}
				    	});
					}else if(data.status==1){
						layer.msg(data.message,{
				        end: function(){
				           	obj.val('已收藏')
				        	}
				    	});
					}else if(data.status==3){
                        layer.msg(data.message,{
                            end: function(){
                            	window.location.href = "{:U('Member/Index/login')}";
                            }
                        });
                    }else{
                    	layer.msg(data.message,{
                            end: function(){

                            }
                        });
                    }
					
					/*optional stuff to do after success */
				},'json');
			});
		})
	</script>
</block>