<extend name="shuipf/Template/Default/Phone/Common/_layout.php" />
<block name="style">
    <style>
        .my-am-nav{margin-top:0px;}
        .my-am-nav a {font-size:13px;}
        .am-active {font-weight:bold;}
        .am-breadcrumb{margin:0 0 0 0;}
        .am-list{margin-top:0px;}
        .am-header-title{line-height:49px;}
        select{

    height: 20px;
   
    padding: 6px 12px;
    font-size: 14px;
    color: #555;
    line-height: 34px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: content-box;  
        }
        .address{
    
    max-width: 100%;
    margin-bottom: 5px;
    font-weight: 700;
        }  
    </style>
    <link rel="stylesheet" href="{$config_siteurl}statics/cu/swiper/swiper.css"> 
    <link rel="stylesheet" href="{$config_siteurl}statics/js/artDialog/skins/default.css"> 
    <link rel="stylesheet" href="{$config_siteurl}statics/cu/bootstrap/bootstrap.min.css">
    <link href="https://cdn.bootcss.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet">
	<script type="text/javascript" src="{$config_siteurl}statics/cu/jquery/jquery.min.js"></script>
	<script type="text/javascript" src="{$config_siteurl}statics/cu/bootstrap/bootstrap.min.js"></script>
	<script type="text/javascript" src="{$config_siteurl}statics/cu/swiper/swiper.min.js"></script> 
    <script src="{$config_siteurl}statics/cu/js/Comm/Category.js"></script>
<script type="text/javascript" src="{$config_siteurl}statics/js/linkagesel/linkagesel-min.js"></script>

</block>
<block name="content">
<!-- 顶部菜单导航 -->
<template file="Phone/Industry/_nav.php"/>

<!-- 首页轮播 -->
  <div class="container">
  <div class="col-xs-12 col-sm-12" style="border-bottom: 1px solid #900 ">
   <h5 style="margin-top:20px;">企业诚信评价结果</h5>
   </div>
</div>

<div class="container" style="margin-top:15px;">
  <div class="col-xs-6 col-sm-6"  style="border:1px solid #808080;height:330px; " >
<dl>
<a href="{:U('Industry/company_list',array('level'=>5))}" >	
<dt style="color:black;">五星级企业</dt>
<dd style="color:#808080;">在四星基础上填写上年度可抵押物资产总额，上年度资产负债率。此评价系统星级晋升必须满足前一星级能够达成，若未达成则保持其之前星级不变。每年度3-6月进行信息重置，系统提前通过邮箱通知企业进行信息重置。电脑根据重置信息予以重新评定星级，逾期不予填写的系统自动删除。（后台数据保留）</dd>
</a>
</dl>
   
   </div>

  <div class="col-xs-6 col-sm-6"  style="border:1px solid #808080;height:330px; " >
<dl>
<a href="{:U('Industry/company_list',array('level'=>4))}" >	
<dt style="color:black;">四星级企业</dt>
<dd style="color:#808080;">在三星基础上填写上年度年产值、上年度销售总额，上年度纳税总额，上年度资产总额；此评价系统星级晋升必须满足前一星级能够达成，若未达成则保持其之前星级不变。每年度3-6月进行信息重置，系统提前通过邮箱通知企业进行信息重置。电脑根据重置信息予以重新评定星级，逾期不予填写的系统自动删除。（后台数据保留）</dd>
</a>
</dl>
   
   </div>
   <div class="col-xs-6 col-sm-6"  style="border:1px solid #808080;height:330px;margin-top:5px; " >
<dl>
<a href="{:U('Industry/company_list',array('level'=>3))}" >	
<dt style="color:black;">三星级企业</dt>
<dd style="color:#808080;">在二星基础上填写企业职工人数、是否缴纳社会保险、缴纳社会保险人数、企业上年度水电费总额。此评价系统星级晋升必须满足前一星级能够达成，若未达成则保持其之前星级不变。每年度3-6月进行信息重置，系统提前通过邮箱通知企业进行信息重置。电脑根据重置信息予以重新评定星级，逾期不予填写的系统自动删除。（后台数据保留）</dd>
</a>
</dl>
   
   </div>

     <div class="col-xs-6 col-sm-6"  style="border:1px solid #808080;height:330px;;margin-top:5px; " >
<dl>
<a href="{:U('Industry/company_list',array('level'=>2))}" >	
<dt style="color:black;">二星级企业</dt>
<dd style="color:#808080;">填写企业名称、企业法人代表,联系方式，上传企业营业执照和税务登记证。五项内容均为必填写项，信息填写不完整不予评级。此评价系统星级晋升必须满足前一星级能够达成，若未达成则保持其之前星级不变。每年度3-6月进行信息重置，系统提前通过邮箱通知企业进行信息重置。电脑根据重置信息予以重新评定星级，逾期不予填写的系统自动删除。（后台数据保留）</dd>
</a>
</dl>
   
   </div>    
</div>

</block>