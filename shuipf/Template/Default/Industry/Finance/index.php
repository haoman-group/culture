<extend name="shuipf/Template/Default/Industry/common/_layout.php" />
<block name="after_styles">
	<link rel="stylesheet" href="{$config_siteurl}statics/ci/css/finance.css">
	<link rel="stylesheet" href="{$config_siteurl}statics/ci/css/product-show.css">
    <style>
        .agent dl dd li img.agent_img{width: 236px;height: 177px;padding:17px;border:1px solid #ececec;}
        .agent dl dd li{width: 237px;margin-left: 15px;height: 265px}
        .agent dl dd{width: 757px}
        .agent dl dd li .allp{padding: 0 17px 17px 17px;background: #f5f5f5;}
        .agent dl dd li .allp .entryname{line-height: 26px;font-size: 12px}
        .agent dl dd li .allp p{line-height: 24px;font-size: 12px;background: #f5f5f5;}
        #content .clearfix h6{margin-bottom: 20px}
    </style>
</block>
<block name="content">
	<div id="content">
    <div class="container clearfix">
        <!-- <div class="brandattr">
            <dl class="brandl">
                <dt>合作方式：</dt>
                <dd>
                	

                    <a href="javascript:;" <empty name="method">class="bluea"</empty> onclick="filter('method','不限')">不限</a>
                    <a href="javascript:;" <eq name="method" value="银行贷款">class="bluea"</eq> onclick="filter('method','银行贷款')">银行贷款</a>
                    <a href="javascript:;"<eq name="method" value="融资">class="bluea"</eq> onclick="filter('method','融资')">融资</a>
                    <a href="javascript:;"<eq name="method" value="物权转让">class="bluea"</eq> onclick="filter('method','物权转让')">物权转让</a>
                    <a href="javascript:;"<eq name="method" value="其他">class="bluea"</eq> onclick="filter('method','其他')">其他</a>


                </dd>
            </dl>
            <dl class="brandl">
                <dt>资金需求额：</dt>
                <dd>

                    <a href="javascript:;" <empty name="money">class="bluea"</empty> onclick="filter('money','不限')">不限</a>
                    <a href="javascript:;" <eq name="money" value="10万以下">class="bluea"</eq> onclick="filter('money','10万以下')">10万以下</a>
                    <a href="javascript:;" <eq name="money" value="10万-50万">class="bluea"</eq> onclick="filter('money','10万-50万')">10万-50万</a>
                    <a href="javascript:;" <eq name="money" value="50万-100万">class="bluea"</eq> onclick="filter('money','50万-100万')">50万-100万</a>
                    <a href="javascript:;" <eq name="money" value="100万-1000万">class="bluea"</eq> onclick="filter('money','100万-1000万')">100万-1000万</a>
                    <a href="javascript:;" <eq name="money" value="1000万以上">class="bluea"</eq> onclick="filter('money','1000万以上')">1000万以上</a>

                </dd>
            </dl>
            <dl class="brandl">
                <dt>项目类型：</dt>
                <dd>

                    <a href="javascript:;" <empty name="type">class="bluea"</empty> onclick="filter('type','不限')">不限</a>
                    <a href="javascript:;" <eq name="type" value="新闻出版发行服务">class="bluea"</eq> onclick="filter('type','新闻出版发行服务')">新闻出版发行服务</a>
                    <a href="javascript:;" <eq name="type" value="广播电视电影服务">class="bluea"</eq> onclick="filter('type','广播电视电影服务')">广播电视电影服务</a>
                    <a href="javascript:;" <eq name="type" value="文化艺术服务">class="bluea"</eq> onclick="filter('type','文化艺术服务')">文化艺术服务</a>


                </dd>
            </dl>
        </div> -->
       <!--  <input type="hidden" name="method" value="<if condition='$method'>{$method}<else />不限</if>">
        <input type="hidden" name="money" value="<if condition='$money'>{$money}<else />不限</if>">
        <input type="hidden" name="type" value="<if condition='$type'>{$type}<else />不限</if>"> -->
        <h6><strong style="color:#900">金融代理</strong></h6>
            <!-- <h3>数据分析结果：共（<span>{$count}</span>）个项目</h3> -->
            <div class ='travel agent'>
                <dl class="clearfix" >
                    <dt style="height: auto;padding-bottom: 18px">
                        <a href="#"><img src="{$config_siteurl}statics/ci/images/yinhang_dai.jpg" alt="佛教用品店"></a>
                   
                    </dt>
                    <dd>
                        
                        <ul class="clearfix">
                            <volist name = "data.bank" id='vo'>
                            
                                    <li>
                                        <a href="{:U('Industry/Product/show',array('pid'=>$vo['id']))}"><img class='agent_img' src="{:thumb($vo['pthumb'],232,165)}" alt=""></a>
                                        <div class="allp">
                                            <div class="entryname">项目名称：{$vo.pname|str_cut=###,10}</div>
                                            <p>行业： {$vo.categoryname|str_cut=###,4} 地区： {$vo.region}</p>
                                            <p>投资总额：{$vo.plimit}万</p>
                                        </div>
                                    </li>
                            
                            </volist>
                            
                        </ul>
                    </dd>
                </dl>
                <dl class="clearfix" >
                    <dt style="height: auto;padding-bottom: 18px">
                        <a href="#"><img src="{$config_siteurl}statics/ci/images/agent_r.jpg" alt="佛教用品店"></a>
                   
                    </dt>
                    <dd>
                        
                        <ul class="clearfix">
                            <volist name = "data.rz" id='vo'>
                           
                                    <li>
                                        <a href="{:U('Industry/Product/show',array('pid'=>$vo['id']))}"><img class='agent_img' src="{:thumb($vo['pthumb'],232,165)}" alt=""></a>
                                        <div class="allp">
                                            <div class="entryname">项目名称：{$vo.pname|str_cut=###,10}</div>
                                            <p>行业： {$vo.categoryname|str_cut=###,4} 地区： {$vo.region}</p>
                                            <p>投资总额：{$vo.plimit}万</p>
                                        </div>
                                    </li>
                            
                            </volist>
                            
                        </ul>
                    </dd>
                </dl>
                <dl class="clearfix">
                    <dt style="height: auto;padding-bottom: 18px">
                        <a href="#"><img src="{$config_siteurl}statics/ci/images/agent_transfer.jpg" alt="wq"></a>
                   
                    </dt>
                    <dd>
                        
                        <ul class="clearfix">
                            <volist name = "data.wq" id='vo'>
                            
                            
                                    <li>
                                        <a href="#"><img class='agent_img' src="{:thumb($vo['pthumb'],232,165)}" alt=""></a>
                                        <div class="allp">
                                            <div class="entryname">项目名称：{$vo.pname|str_cut=###,10}</div>
                                            <p>行业： {$vo.categoryname|str_cut=###,4} 地区： {$vo.region}</p>
                                            <p>投资总额：{$vo.plimit}万</p>
                                        </div>
                                    </li>
                          
                            </volist>
                            
                        </ul>
                    </dd>
                </dl>
                <dl class="clearfix" >
                    <dt style="height: auto;padding-bottom: 18px">
                        <a href="#"><img src="{$config_siteurl}statics/ci/images/agent_other.jpg" alt="佛教用品店"></a>
                   
                    </dt>
                    <dd>
                        
                        <ul class="clearfix">
                            <volist name = "data.other" id='vo'>
                           
                                    <li>
                                        <a href="{:U('Industry/Product/show',array('pid'=>$vo['id']))}"><img class='agent_img' src="{:thumb($vo['pthumb'],232,165)}" alt=""></a>
                                        <div class="allp">
                                            <div class="entryname">项目名称：{$vo.pname|str_cut=###,10}</div>
                                            <p>行业： {$vo.categoryname|str_cut=###,4} 地区： {$vo.region}</p>
                                            <p>投资总额：{$vo.plimit}万</p>
                                        </div>
                                    </li>
                           
                            </volist>
                            
                        </ul>
                    </dd>
                </dl>
            </div>
           <!--  <ul class="anaul">
            	<foreach name="data" item="vo">
            		 <li>
	                    <div class="anaimg" style="padding: 0;">
	                        <a href="{:U('Industry/Finance/agent_content',array('id'=>$vo['id']))}">
	                            <img src="{:thumb($vo['pthumb'],232,165)}">
	                        </a>
	                        <span class="posspan spirit1"></span>
	                    </div>
	                    <div class="allp">
	                        <div class="entryname">项目名称：{$vo.pname|str_cut=###,10}</div>
	                        <p>行业： {$vo.pcategory} 地区： 山西省</p>
	                        <p>投资总额：{$vo.plimit}万</p>
	                    </div>
	                </li>
            	</foreach>
               
                
            </ul> -->
        </div>
    
</div>
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
                var url = "{:U('Industry/Finance/index')}&method="+method+"&type="+type+"&money="+money;
                
                window.location.href = url;
        }
	</script>
</block>
