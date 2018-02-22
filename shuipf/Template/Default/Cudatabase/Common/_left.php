<div class="left-c" >
	<div style="border-bottom: 1px solid #aca8a8;"><img src="{$config_siteurl}statics/cu/images/images/sjk/leftpp.gif"/></div>
	<div class="left-sidebar">
        <volist name="menu" id="vo" offset="0" length='5'>
            <dl  class="y{$key+1} <if condition='$_GET[rootcid] eq $vo[cid]'> active4</if>">
                <dt>{$vo.name}({$vo.total_num})<i class="pull-right glyphicon glyphicon-menu-right"></i></dt>
                <volist name="vo['child']" id="voo">
                <dd <if condition="$_GET['cid'] eq $voo['cid']">class="active3"</if>>
                    <a href="{:U('Cudatabase/Index/menu',array('cid'=>$voo['cid'],'rootcid'=>$vo['cid']))}" title="{$voo.name}({$voo.total_num})">{$voo.name}({$voo.total_num})
                        <if condition="$_GET['cid'] eq $voo['cid']"><img src="{$config_siteurl}statics/cu/images/images/sjk/dsjk-left8.png" class="pull-right"/></if>
                    </a>
                </dd>
                </volist>
                
                <if condition="$vo['cid'] eq 2">
                    <dd><a href="###">图书馆资源(0)</a></dd>
                    <dd><a href="{:U('Pubservice/Massart/index')}">文化馆资源({$massart_totle|default="0"})</a></dd>
                </if>
            </dl>
        </volist>
       <dl class="y2">
           <dt>数据中心<i class="pull-right glyphicon glyphicon-menu-right"></i></dt>
            <!-- <dd><a target="_blank" href="{:U('Cudatabase/Analys/apiindex',array('cid'=>7))}">数据互通</a> </dd> -->
           <!-- <dd><a href="{:U('Cudatabase/Analys/index',array('cid'=>7))}" target="_blank">数据分析</a> </dd> -->
           <!-- <dd class="subdd"><a target="_blank" href="{:U('Cudatabase/Analys/analysis',array('cid'=>7, 'datatype'=>'click'))}">点击量</a> </dd> -->
           <!-- <dd class="subdd"><a target="_blank" href="{:U('Cudatabase/Analys/analysis',array('cid'=>7, 'datatype'=>'download'))}">下载量</a> </dd> -->
           <!-- <dd class="subdd"><a target="_blank" href="{:U('Cudatabase/Analys/act',array('cid'=>7))}">文化活动分析</a> </dd> -->
           <dd><a href="{:U('Cudatabase/Analys/tongji')}" target="_blank">流量统计</a> </dd>
       </dl>
	</div>
</div>