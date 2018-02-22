<extend name="shuipf/Template/Default/Industry/common/_layout.php" />
<block name="after_styles">
	<link rel="stylesheet" href="{$config_siteurl}statics/ci/css/card.css" />
	<link rel="stylesheet" href="{$config_siteurl}statics/ci/css/list_consume_alliance.css" />
</block>
<block name="content">
	<!--头部导航-->
	<div id="nav">
		<div class="container">
			<ul>
				<li>
					<a href="{:U('Industry/Index/index')}" class="home_src" style="color:#900;">首页</a>
				</li>
				<li><span>></span></li>
				<li>
					<a href="{:U('Industry/Index/lists',array('catid'=>16))}">消费服务</a>
				</li>
				<li><span>></span></li>
				<li>
					<a href="javascript:;" style="color:#900;">商家联盟</a>
				</li>
			</ul>
			<form id="form">
				<input id="b" name="content" type="text" placeholder="输入你要搜索的关键字" value=""/>
				<input class="search_btn" type="button" value="搜索" id="a" onclick="text()" onsubmit="return text()"/>
			</form>
		</div>
	</div>
	<!--内容-->
	<div id="content">
		<div class="content_main">
			<div class="main_top">
				<div class="main_top_up">
					<div class="up_left">
						<div class="join">
							我要加入
						</div>
						<div class="apply">
							<a href="{:U('Industry/Business/index')}">申请</a>
						</div>
					</div>
					
		<div class="brandattr">
            <dl class="brandl">
                <dt>地区：</dt>
                <dd>
                    <a href="javascript:;" <empty name="method">class="bluea"</empty> onclick="filter('method','不限')">不限</a>
                    <a href="javascript:;" <eq name="method" value="太原市">class="bluea"</eq> onclick="filter('method','太原市')">太原市</a>
                    <a href="javascript:;"<eq name="method" value="朔州市">class="bluea"</eq> onclick="filter('method','朔州市')">朔州市</a>
                    <a href="javascript:;"<eq name="method" value="忻州市">class="bluea"</eq> onclick="filter('method','忻州市')">忻州市</a>
                    <a href="javascript:;"<eq name="method" value="阳泉市">class="bluea"</eq> onclick="filter('method','阳泉市')">阳泉市</a>
                    <a href="javascript:;"<eq name="method" value="大同市">class="bluea"</eq> onclick="filter('method','大同市')">大同市</a>
                    <a href="javascript:;"<eq name="method" value="晋中市">class="bluea"</eq> onclick="filter('method','晋中市')">晋中市</a>
                    <a href="javascript:;"<eq name="method" value="吕梁市">class="bluea"</eq> onclick="filter('method','吕梁市')">吕梁市</a>
                    <a href="javascript:;"<eq name="method" value="临汾市">class="bluea"</eq> onclick="filter('method','临汾市')">临汾市</a>
                    <a href="javascript:;"<eq name="method" value="晋城市">class="bluea"</eq> onclick="filter('method','晋城市')">晋城市</a>
                    <a href="javascript:;"<eq name="method" value="运城市">class="bluea"</eq> onclick="filter('method','运城市')">运城市</a>
                    <a href="javascript:;"<eq name="method" value="长治市">class="bluea"</eq> onclick="filter('method','长治市')">长治市</a>
                    <a href="javascript:;"<eq name="method" value="其他">class="bluea"</eq> onclick="filter('method','其他')">其他</a>

                </dd>
            </dl>
            <dl class="brandl">
                <dt>行业：</dt>
                <dd>

                    <a href="javascript:;" <empty name="money">class="bluea"</empty> onclick="filter('money','不限')">不限</a>
                    <a href="javascript:;" <eq name="money" value="图书">class="bluea"</eq> onclick="filter('money','图书')">图书</a>
                    <a href="javascript:;" <eq name="money" value="演艺">class="bluea"</eq> onclick="filter('money','演艺')">演艺</a>
                    <a href="javascript:;" <eq name="money" value="影视">class="bluea"</eq> onclick="filter('money','影视')">影视</a>
                    <a href="javascript:;" <eq name="money" value="旅游">class="bluea"</eq> onclick="filter('money','旅游')">旅游</a>
                    <a href="javascript:;" <eq name="money" value="动漫">class="bluea"</eq> onclick="filter('money','动漫')">动漫</a>
					<a href="javascript:;" <eq name="money" value="产品">class="bluea"</eq> onclick="filter('money','产品')">产品</a>
					<a href="javascript:;" <eq name="money" value="其他">class="bluea"</eq> onclick="filter('money','其他')">其他</a>
                </dd>
            </dl>
        </div>
        <input type="hidden" name="method" value="<if condition='$method'>{$method}<else />不限</if>">
        <input type="hidden" name="money" value="<if condition='$money'>{$money}<else />不限</if>">
        <!--<input type="hidden" name="type" value="<if condition='$type'>{$type}<else />不限</if>">-->
				</div>
				<div class="main_top_down">
					<div class="down_left">
						<div class="down_left_title">
							商家联盟平台介绍
						</div>
						<div class="down_left_content">
							  夜里很肃静，肃静得连喘气的声音都能听得见，满屋的香象被墙隔着，看得见却摸不着，仿佛距离就在咫尺，却难以突破，心里难痒得要命，却始终突破不了自己。香就象在头顶飘荡，还象被香吸引，不约而同的往她的房间看去，那美叫他止不住的想，仿佛在看到她那一刻，心早已被融化，就象融化成她的样子，无法收起来一样。
							  他只有在那里徘徊，心象长草般的难受。所有的原始冲动都叫他控制，他想到要冲进去，可是他的思想在控制着他，他潜意识的规劝自己，不要那么的鲁莽，因为他太爱她，他不能做对不起她的事情，越是这样的想，他就越是控制不了自己，就象难耐的要命，心里说不出的煎熬。
						</div>
					</div>
					<div class="down_right">
						<ul>
							<?php 
							$count=M('business_alliance')->where(array('pass'=>1))->order('id desc')->count();
							$data=M('business_alliance')->where(array('pass'=>1))->order('id desc')->limit(6)->select();
//							var_dump($data);die;
								foreach ($data as $k => $v) {
							?>	
							<li>
										<a href="{:U('Industry/Detail/index')}">
											<img src=".{:thumb($v['photo'],220,60)}" alt="" style="width: 220px;height: 60px;" />
											<h5>{$v.name|str_cut=###,20}</h5>
										</a>
										<span>
											地址：{$v.adress}
										</span>
									</li>
							<?php	
								}
							?>
							<!--<content action="lists" catid="$catid" order="id DESC" num="6" page='$page'>
								<volist name="data" id="vo">-->
									
								<!--</volist>
							</content>-->
						</ul>
					</div>
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
<block name="after_scripts">
	<script type="text/javascript">
		function filter(type,msg){
                $('input[name='+type+']').val(msg);
                // $('input[name='+ type+'_id]').val(num);
                var money = $('input[name=money]').val();
                var type= $('input[name=type]').val();
                var method = $('input[name=method]').val();
                // var data = $('form').serialize();
                //拼网址
                var url = "{:U('Industry/Finance/consume')}&method="+method+"&type="+type+"&money="+money;
                window.location.href = url;
        }
	</script>
</block>
<!--<div class="container clearfix">
				<div class="lianmeng">
					<ul class="clearfix">
						<content action="lists" catid="$catid" order="id DESC" num="24" page='$page'>
							<volist name="data" id="vo">
						<li>
							<a href="yuda.html">
								<img src="{:thumb($vo['thumb'],181,45)}" alt="{$vo.title|str_cut=###,8}" style="width: 181px;height: 45px;" />
								<h5>{$vo.title|str_cut=###,8}</h5>
							</a>
						</li>
						</volist>
						</content>
					</ul>
				</div>
			</div>-->