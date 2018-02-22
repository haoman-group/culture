<extend name="./shuipf/Template/Default/Industry/common/_layout.php"/>
<block name="after_styles">

    <link rel="stylesheet" href="{$config_siteurl}statics/ci/css/finance.css">
    <link rel="stylesheet" href="{$config_siteurl}statics/ci/css/product-show.css">
    <style>

        .page{padding: 50px;text-align: right;}
        .page li{display: inline-block;font-size: 12px;color: #333;margin: 0 4px;}
        .page li a{display: block;font-size: 12px;color: #333;padding: 8px 10px;border: 1px solid #ccc;}
        .page li.on a{background: #3398db;color: #fff;}
        hr{margin-bottom: 15px;}
    </style>
</block>
<block name="after_scripts">

</block>
<block name="content">
<div id="nav">
    <div class="container">
        <ul>
            <li><a href="{:U('Industry/Index/index')}" class="home_src" style="color:#900;">首页</a></li>
            <li><span>></span></li>
            <li><a href="{:U('Industry/Product/index')}">产品展示</a></li>
            <li><span>></span></li>
            <li><a href="javascript:;" style="color: #900;">旅游馆</a></li>
        </ul>
    </div>
</div>
    <div id="content">
        <div class="container clearfix">
            <div class='travel_top'>
                <div class="travel_t_left">
                   <form class="search" action="{:U('Industry/Product/search')}" method="post">
                        <input type="text" placeholder="输入你要搜索的关键字" name = 'keywords' style="width: 1040px;"/>
                        <a href="javascript:;">搜索</a>|
                        <a href="javascript:;">高级搜索</a>
                        <input type="submit" value="搜索" />
                    </form> 
                    <div class="travel_t_cate">
                        <ul style="width: 1300px;">
                            <li><a href="{:U('Industry/Product/lists',array('type'=>'佛教用品'))}"><img src="{$config_siteurl}statics/ci/images/fojiao.png" alt=""></a></li>
                            <li><a href="{:U('Industry/Product/lists',array('type'=>'太行特产购'))}"><img src="{$config_siteurl}statics/ci/images/taihang.png" alt=""></a></li>
                            <li><a href="{:U('Industry/Product/lists',array('type'=>'黄河风情街'))}"><img src="{$config_siteurl}statics/ci/images/huanghe.png" alt=""></a></li>
                            <li><a href="{:U('Industry/Product/lists',array('type'=>'寻根觅祖祠'))}"><img src="{$config_siteurl}statics/ci/images/xungen.png" alt=""></a></li>
                            <li><a href="{:U('Industry/Product/lists',array('type'=>'晋商文化馆'))}"><img src="{$config_siteurl}statics/ci/images/jinshang.png" alt=""></a></li>
                            <li><a href="{:U('Industry/Product/lists',array('type'=>'红色纪念馆'))}"><img src="{$config_siteurl}statics/ci/images/hongse.png" alt=""></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="travel">
                <dl class="clearfix">
                    <dt>
                        <a href="{:U('Industry/Product/lists',array('type'=>'佛教用品'))}"><img src="{$config_siteurl}statics/ci/images/product-show/travel_fj.png" alt="佛教用品店"></a>
                   
                    </dt>
                    <dd>
                    	
                        <ul class="clearfix">
                        	<volist name = "fjdata" id='vo'>
		                            <li>
		                                <a href="{:U('Industry/Product/show',array('pid'=>$vo['id']))}"><img src=".{:thumb($vo['thumb'][0],212,160)}" alt=""></a>
		                                <h5>{$vo.p_name}</h5>
		                            </li>
	                        <!--{$data}-->
                            </volist>
                            
                        </ul>
                    </dd>
                </dl>
                <dl class="clearfix">
                    <dt>
                          <a href="{:U('Industry/Product/lists',array('type'=>'黄河风情街'))}"><img src="{$config_siteurl}statics/ci/images/product-show/travel_hh.png" alt=""></a>
                          
                    </dt>
                    <dd>
                        <ul class="clearfix">
                        	<volist name = "hh_data" id='vo'>
                            <li>
                                 <a href="{:U('Industry/Product/show',array('pid'=>$vo['id']))}"><img src=".{:thumb($vo['thumb'][0],212,160)}" alt=""></a>
                                        <h5>{$vo.p_name}</h5>
                            </li>
                            </volist>
                        </ul>
                    </dd>
                </dl>
                <dl class="clearfix">
                    <dt>
                          <a href="{:U('Industry/Product/lists',array('type'=>'晋商文化馆'))}"><img  src="{$config_siteurl}statics/ci/images/product-show/travel_js.png" alt=""></a>
                                        
                    </dt>
                    <dd>
                        <ul class="clearfix">
                        	<volist name = "js_data" id='v2'>
                            <li>
                                  <a href="{:U('Industry/Product/show',array('pid'=>$v2['id']))}"><img src=".{:thumb($v2['thumb'][0],191,183)}" alt=""></a>
                                        <h5>{$v2.p_name}</h5>
                            </li>
                            </volist>
                        </ul>
                    </dd>
                </dl>
                <dl class="clearfix">
                    <dt>
                         <a href="{:U('Industry/Product/lists',array('type'=>'太行特产购'))}"><img src="{$config_siteurl}statics/ci/images/product-show/travel_th.png" alt=""></a>
                                        
                    </dt>
                    <dd>
                        <ul class="clearfix">
                        	<volist name = "th_data" id='vo'>
                            <li>
                                 <a href="{:U('Industry/Product/show',array('pid'=>$vo['id']))}"><img src=".{:thumb($vo['thumb'][0],191,183)}" alt=""></a>
                                        <h5>{$vo.p_name}</h5>
                            </li>
                           </volist>
                        </ul>
                    </dd>
                </dl>
                <dl class="clearfix">
                    <dt>
                         <a href="{:U('Industry/Product/lists',array('type'=>'寻根觅祖祠'))}"><img src="{$config_siteurl}statics/ci/images/product-show/travel_xg.png" alt=""></a>
                                      
                    </dt>
                    <dd>
                        <ul class="clearfix">
                        	<volist name = "xg_data" id='vo'>
                            <li>
                                  <a href="{:U('Industry/Product/show',array('pid'=>$vo['id']))}"><img src=".{:thumb($vo['thumb'][0],191,183)}" alt=""></a>
                                        <h5>{$vo.p_name}</h5>
                            </li>
                           </volist>
                        </ul>
                    </dd>
                </dl>
                <dl class="clearfix">
                    <dt>
                          <a href="{:U('Industry/Product/lists',array('type'=>'红色纪念品'))}"><img src="{$config_siteurl}statics/ci/images/product-show/travel_hs.png" alt=""></a>
                                       
                    </dt>
                    <dd>
                        <ul class="clearfix">
                        	<volist name = "hs_data" id='vo'>
                            <li>
                                  <a href="{:U('Industry/Product/show',array('pid'=>$vo['id']))}"><img src=".{:thumb($vo['thumb'][0],191,183)}" alt=""></a>
                                        <h5>{$vo.p_name}</h5>
                            </li>
                            </volist>
                        </ul>
                    </dd>
                </dl>
            </div>

        </div>
    </div>


</block>