<extend name="shuipf/Template/Default/Industry/common/_layout.php" />
<block name="after_styles">
    <link rel="stylesheet" href="{$config_siteurl}statics/ci/css/card.css"/>
    <link rel="stylesheet" href="{$config_siteurl}statics/ci/css/list_consume_alliance.css"/>
</block>
<block name="content">
    <!--头部导航-->
    <div id="nav">
        <div class="container">
            <ul>
                <li>
                    <a href="{:U('Industry/Index/index')}" class="home_src" style="color: #900;">首页</a>
                </li>
                <li><span>></span></li>
                <li>
                    <a href="{:U('Industry/Index/lists',array('catid'=>16))}">消费服务</a>
                </li>
                <li><span>></span></li>
                <li>
                    <a href="javascript:;" style="color: #900;">商家联盟</a>
                </li>
            </ul>
            <!--<form id="form">
                <input id="b" name="content" type="text" placeholder="输入你要搜索的关键字" value=""/>
                <input class="search_btn" type="button" value="搜索" id="a" onclick="text()" onsubmit="return text()"/>
            </form>-->
        </div>
    </div>
    <!--内容-->
    <div id="content">
        <div class="content_main">
            <div class="main_top">
                <div class="main_top_up">
                    <div class="up_left">
                        <div class="join" style="color:#900;">
                            我要加入
                        </div>
                        <div class="apply">
                            <a href="{:U('Industry/Business/index')}">申请</a>
                        </div>
                    </div>
                    <div class="brandattr">
                        <div style="overflow: hidden;">
                            <dl class="brandl">
                                <dt>地区：</dt>
                                <dd>
                                    <div style="float: left;height: 42px;"><a style="width: 63px;text-align: center;"
                                                                              href="javascript:;"
                                        <empty name="method">class="bluea"</empty>
                                        onclick="filter('method','不限')">不限</a></div>
                                    <a href="javascript:;"
                                    <eq name="method" value="太原市">class="bluea"</eq>
                                    onclick="filter('method','太原市')">太原市</a>
                                    <a href="javascript:;"
                                    <eq name="method" value="朔州市">class="bluea"</eq>
                                    onclick="filter('method','朔州市')">朔州市</a>
                                    <a href="javascript:;"
                                    <eq name="method" value="忻州市">class="bluea"</eq>
                                    onclick="filter('method','忻州市')">忻州市</a>
                                    <a href="javascript:;"
                                    <eq name="method" value="阳泉市">class="bluea"</eq>
                                    onclick="filter('method','阳泉市')">阳泉市</a>
                                    <a href="javascript:;"
                                    <eq name="method" value="大同市">class="bluea"</eq>
                                    onclick="filter('method','大同市')">大同市</a>
                                    <a href="javascript:;"
                                    <eq name="method" value="晋中市">class="bluea"</eq>
                                    onclick="filter('method','晋中市')">晋中市</a>
                                    <a href="javascript:;"
                                    <eq name="method" value="吕梁市">class="bluea"</eq>
                                    onclick="filter('method','吕梁市')">吕梁市</a>
                                    <a href="javascript:;"
                                    <eq name="method" value="临汾市">class="bluea"</eq>
                                    onclick="filter('method','临汾市')">临汾市</a>
                                    <a href="javascript:;"
                                    <eq name="method" value="晋城市">class="bluea"</eq>
                                    onclick="filter('method','晋城市')">晋城市</a>
                                    <a href="javascript:;"
                                    <eq name="method" value="运城市">class="bluea"</eq>
                                    onclick="filter('method','运城市')">运城市</a>
                                    <a href="javascript:;"
                                    <eq name="method" value="长治市">class="bluea"</eq>
                                    onclick="filter('method','长治市')">长治市</a>
                                    <a href="javascript:;"
                                    <eq name="method" value="其他">class="bluea"</eq>
                                    onclick="filter('method','其他')">其他</a>

                                </dd>
                            </dl>
                        </div>
                        <div style="overflow: hidden;width: 1000px;" id="">


                            <dl class="brandl" style="width: 900px;">
                                <dt>行业：</dt>
                                <dd>

                                    <div style="height: 42px;float: left;"><a style="width: 63px;text-align: center;"
                                                                              href="javascript:;"
                                        <empty name="money">class="bluea screen"</empty>
                                        onclick="filter('money','不限')">不限</a></div>
                                    <a style="margin-left: 5px;" id="screen" href="javascript:;"
                                    <eq name="money" value="新闻出版发行服务">class="bluea screen"</eq>
                                    onclick="filter('money','新闻出版发行服务')">新闻出版发行服务</a>
                                    <a id="screen" href="javascript:;"
                                    <eq name="money" value="广播电视电影服务">class="bluea screen"</eq>
                                    onclick="filter('money','广播电视电影服务')">广播电视电影服务</a>

                                    <a id="screen" href="javascript:;"
                                    <eq name="money" value="文化艺术服务">class="bluea screen"</eq>
                                    onclick="filter('money','文化艺术服务')">文化艺术服务</a>
                                    <a id="screen" href="javascript:;"
                                    <eq name="money" value="文化信息传输服务">class="bluea screen"</eq>
                                    onclick="filter('money','文化信息传输服务')">文化信息传输服务</a>
                                    <a id="screen" href="javascript:;"
                                    <eq name="money" value="文化创意和设计服务">class="bluea screen"</eq>
                                    onclick="filter('money','文化创意和设计服务')">文化创意和设计服务</a>
                                    <a style="margin-left: 5px;" id="screen" href="javascript:;"
                                    <eq name="money" value="文化休闲娱乐服务">class="bluea screen"</eq>
                                    onclick="filter('money','文化休闲娱乐服务')">文化休闲娱乐服务</a>
                                    <a id="screen" href="javascript:;"
                                    <eq name="money" value="工艺美术品的生产">class="bluea screen"</eq>
                                    onclick="filter('money','工艺美术品的生产')">工艺美术品的生产</a>
                                    <a id="screen" href="javascript:;"
                                    <eq name="money" value="文化产品生产的辅助生产">class="bluea screen"</eq>
                                    onclick="filter('money','文化产品生产的辅助生产')">文化产品生产的辅助生产</a>
                                    <a id="screen" href="javascript:;"
                                    <eq name="money" value="文化产品的生产">class="bluea screen"</eq>
                                    onclick="filter('money','文化产品的生产')">文化产品的生产</a>
                                    <a id="screen" href="javascript:;"
                                    <eq name="money" value="文化专业设备服务">class="bluea screen"</eq>
                                    onclick="filter('money','文化专业设备服务')">文化专业设备服务</a>

                                </dd>
                            </dl>
                        </div>
                    </div>
                    <input type="hidden" name="method" value="<if condition='$method'>{$method}<else />不限</if>">
                    <input type="hidden" name="money" value="<if condition='$money'>{$money}<else />不限</if>">
                    <!--<input type="hidden" name="type" value="<if condition='$type'>{$type}<else />不限</if>">-->
                </div>
                <div class="main_top_down">
                    <div class="down_left">
                        <div class="down_left_title" style="color:#900;">
                            商家联盟平台介绍
                        </div>
                        <div class="down_left_content">
                            山西文化创意产业联盟商家平台的建立是全面贯彻落实省委省政府"促进文化和旅游、金融、科技融合发展"的战略部署，推进我省文化创意产业优化升级发展的创新举措。该平台旨在联合我省文创企业商家，汇聚有特色、有创意的文创产品推出山西文消卡会员制，为企业打通生产供应、销售环节，畅通新媒体营销渠道，引领实现全新文化体验式消费，打造文化消费新名片，构建综合有效、便捷优惠的文创产品供需对接服务网络体系。既是为企业提供的一个面向广大消费群体的宣传促销平台，也是为企业和消费者搭建的一个强大的资源整合和共享平台；既是"惠民"良机，也是"惠企"商机。加盟商户将覆盖全省11个地市，包括各类书店、影院、剧院、旅游景区、文化娱乐场所及其他提供文化产品和服务的文化企事业单位。
                        </div>
                    </div>
                    <div class="down_right">
                        <ul>
                            <volist name="data" id="vo">
                                <li style="padding: 23px;">
                                    <a href="{:U('Industry/Industry/detail',array('id'=>$vo['id']))}">
                                        <img src="{:thumb($vo['photo'],220,60)}" alt=""
                                             style="width: 220px;height: 60px;"/>
                                        <h5>{$vo.name|str_cut=###,20}</h5>
                                    </a>
                                    <span>
											地址：{$vo.adress|str_cut=###,35}
										</span>
                                </li>
                            </volist>
                            <!--<content action="lists" catid="$catid" order="id DESC" num="6" page='$page'>
                                <volist name="data" id="vo">-->

                            <!--</volist>
                        </content>-->
                        </ul>
                        <div class="pagebox">
                            {$page}
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</block>
<block name="after_scripts">
    <script type="text/javascript">
        function text() {
            var value = document.getElementById("b").value;
            window.location.href = '{:U("Content/Search/index")}&key=' + value;
        }
    </script>
</block>
<block name="after_scripts">
    <script type="text/javascript">
        function filter(type, msg) {
            $('input[name=' + type + ']').val(msg);
            // $('input[name='+ type+'_id]').val(num);
            var money = $('input[name=money]').val();
            var type = $('input[name=type]').val();
            var method = $('input[name=method]').val();
            // var data = $('form').serialize();
            //拼网址
            var url = "{:U('Industry/Consume/consume')}&method=" + method + "&money=" + money;
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