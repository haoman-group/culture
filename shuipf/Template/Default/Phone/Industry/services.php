<extend name="shuipf/Template/Default/Phone/Common/_layout.php" />
<!-- 产业服务平台页面 -->
<block name="content">
<!-- 顶部菜单导航 -->
<template file="Phone/Industry/_nav.php"/>

<!-- 图 -->
<img src="/statics/ci/images/industry_logo1.jpg" class="am-img-responsive" alt=""/>

<!-- 2图 -->
<div class="am-g am-g-collapse" style="margin:2px 0 2px 0;">
<a href="http://xmsbpt.sx-ci.cn:9002/">
    <div class="am-u-sm-6">
        <img src="/statics/ci/images/industry_pingtai1.png" class="am-img-responsive" alt=""/>
    </div>
    </a>
    <a href="{:U('addindustry')}">
    <div class="am-u-sm-6">
        <img src="/statics/ci/images/industry_fabu22.png" class="am-img-responsive" alt=""/>
    </div>
    </a>
</div>

<!-- 项目展示 -->
<ul data-am-widget="gallery" class="am-gallery am-avg-sm-2 am-avg-md-3 am-avg-lg-4 am-gallery-default" >
    <volist name="data" id="vo">
      <li>
        <div class="am-gallery-item">
            <a href="{:U('show',['id'=>$vo['id']])}" class="">
              <img src="{$vo.pthumb|default='/statics/images/nopic.jpg'}"  alt="{$vo.name}{$vo.cac_name}{$vo.title}"/>
                <h3 class="am-gallery-title">项目名称：{$vo.pname}</h3>
                <div class="am-gallery-desc">行业：{$vo.categoryname}<br>地区：山西省 <br>投资总额：{$vo.plimit}万</div>
            </a>
        </div>
      </li>  
    </volist>
</ul>
</block>