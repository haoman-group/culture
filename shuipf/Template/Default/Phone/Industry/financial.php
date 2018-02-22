<extend name="shuipf/Template/Default/Phone/Common/_layout.php" />
<!-- 产业服务平台页面 -->
<block name="content">
<!-- 顶部菜单导航 -->
<template file="Phone/Industry/_nav.php"/>

<!-- 图 -->
<!--<img src="/statics/ci/images/industry_logo1.jpg" class="am-img-responsive" alt=""/>

<!-- 2图 -->
<!--<div class="am-g am-g-collapse" style="margin:2px 0 2px 0;">
<a href="http://xmsbpt.sx-ci.cn:9002/">
    <div class="am-u-sm-6">
        <img src="/statics/ci/images/industry_pingtai1.png" class="am-img-responsive" alt=""/>
    </div>
    </a>
    <div class="am-u-sm-6">
        <img src="/statics/ci/images/industry_fabu22.png" class="am-img-responsive" alt=""/>
    </div>
</div>-->

<!-- 项目展示 -->
<ul data-am-widget="gallery" class="am-gallery am-avg-sm-2 am-avg-md-3 am-avg-lg-4 am-gallery-default" >
   
      <li style="float:none;">
        <div class="am-gallery-item">
          
               <a href="#"><img src="{$config_siteurl}statics/ci/images/yinhang_dai.jpg" alt="佛教用品店"></a>
               
        </div>
      </li> 
       <li style="float:none;">
        <div class="am-gallery-item">
          
               <a href="#"><img src="{$config_siteurl}statics/ci/images/agent_r.jpg" alt="佛教用品店"></a>
               
        </div>
      </li> 
       <li style="float:none;">
        <div class="am-gallery-item">
          
               <a href="#"><img src="{$config_siteurl}statics/ci/images/agent_transfer.jpg" alt="佛教用品店"></a>
               
        </div>
      </li> 
       <li style="float:none;">
        <div class="am-gallery-item">
          
               <a href="#"><img src="{$config_siteurl}statics/ci/images/agent_other.jpg" alt="佛教用品店"></a>
               
        </div>
      </li> 
      
       
   
</ul>
</block>