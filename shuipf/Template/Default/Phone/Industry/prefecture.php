<extend name="shuipf/Template/Default/Phone/Common/_layout.php" />
<!-- 产业服务平台页面 -->
<block name="content">
<!-- 顶部菜单导航 -->
<template file="Phone/Industry/_nav.php"/>

<ul class="my-am-nav am-nav am-nav-tabs am-nav-justify">
  <li class="<?= ($_GET['catid'] == '36' || empty($_GET['catid']))?'am-active':''?>"><a href="{:U('Industry/prefecture',['catid'=>'36'])}">经融产品</a></li>
  <li class="<?=$_GET['catid'] == '37'?'am-active':''?>"><a href="{:U('Industry/prefecture',['catid'=>'37'])}">信贷政策</a></li>
  
</ul>
 <ul data-am-widget="gallery" class="am-gallery am-avg-sm-2 am-avg-md-3 am-avg-lg-4 am-gallery-default" >
    <volist name="data" id="vo">
      <li>
        <div class="am-gallery-item">
            <a href="{:U('detail',['type'=>$_GET['type'],'id'=>$vo['id']])}" class="">
              <img src="{$vo.thumb|default='/statics/images/nopic.jpg'}"  alt="{$vo.name}{$vo.cac_name}{$vo.title}"/>
                <h3 class="am-gallery-title">{$vo.name}{$vo.cac_name}{$vo.title}</h3>
                <div class="am-gallery-desc">{$vo.addr}{$vo.cac_addr}{$vo.display_area}</div>
            </a>
        </div>
      </li>  
    </volist>
    </ul>
</block>