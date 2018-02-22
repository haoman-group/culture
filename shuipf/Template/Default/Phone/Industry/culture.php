<extend name="shuipf/Template/Default/Phone/Common/_layout.php" />
<block name="style">
    <style>
        .my-am-nav{margin-top:0px;}
        .my-am-nav a {font-size:13px;}
        .am-active {font-weight:bold;}
        .am-breadcrumb{margin:0 0 0 0;}
        .am-list{margin-top:0px;}
        .am-header-title{line-height:49px;}
     .credit_finance{
    color: #4d4d4d;
    font-size: 12px;
    font-weight: normal;
    margin: 10px;
    padding-bottom: 10px;
    border-bottom: 1px solid #900;
    height: 40px;
    line-height: 40px 
     } 
     .finance_tit clearfix{
    zoom: 1;
    position: relative;
    overflow: hidden;
    display: block;
    float:left;  
     }  
   .apply{
    width: 35px;
    height: 20px;
    text-align: center;
    line-height: 20px;
    color: #fff;
    margin-top: -45px;
    font-size: 8px;
    border-radius: 5px;
    float: right;
    background: -webkit-gradient(linear, 0% 0%, 0% 100%,from(#5b94f0), to(#2b60bf));
    background: -ms-linear-gradient(top, #5b94f0, #2b60bf);
    background: -moz-linear-gradient(top,#5b94f0,#2b60bf);
    background: -webkit-linear-gradient(top, #900, #900);
    background: -o-linear-gradient(top, #5b94f0, #2b60bf);  
   }  
    </style>
    <link rel="stylesheet" href="{$config_siteurl}statics/cu/swiper/swiper.css"> 
    <link rel="stylesheet" href="{$config_siteurl}statics/cu/bootstrap/bootstrap.min.css">
    <link href="https://cdn.bootcss.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet">
	<script type="text/javascript" src="{$config_siteurl}statics/cu/jquery/jquery.min.js"></script>
	<script type="text/javascript" src="{$config_siteurl}statics/cu/bootstrap/bootstrap.min.js"></script>
	<script type="text/javascript" src="{$config_siteurl}statics/cu/swiper/swiper.min.js"></script> 
</block>
<block name="content">
<!-- 顶部菜单导航 -->
<template file="Phone/Industry/_nav.php"/>

<!-- 首页轮播 -->
  <div class="container">
	<div class="row" >
        <div class="swiper-wrap"  >
				<div class="swiper-container swiper-container-centered">
					<div class="swiper-wrapper navbar-swiper" style="margin-top:2px ;margin-bottom:2px;">
						  
                            <div class="swiper-slide col-xs-12 "  >
							 <img src="{$config_siteurl}statics/images/banner-1.jpg"  class="img-responsive" >	
							</div>
					</div>		
				</div>	
			</div>
               
</div>
</div>

<div class="container">
<div class="row" style="margin-top:20px;">
     
        <div class="col-xs-6 col-sm-6" style="border: 1px solid #d8d8d8;">
            <h2 class="credit_finance" >
			<dl  class="finance_tit clearfix">
			<dt style="float: left;font-size: 40px;line-height: 45px;color: #990000;font-weight: normal;margin-right: 5px">C</dt>
			<dd>
			<span style="display: block;font-size: 8px;color: #4d4d4d;line-height: 12px;margin: 0;"><i>redit</i> evaluation</span>
			<strong style="display: block;font-size: 12px;color: #990000;line-height: 25px;font-weight: normal;">诚信评价</strong>
			</dd>
			</dl>
		<a href="{:U('Phone/Business/index')}" class="apply">申请</a>
		</h2>

        <ul class="col-xs-12 col-sm-12">
            <li style="list-style-type:none;">
             <p style="font-size:14px;border-bottom:1px solid #d8d8d8;line-height: 25px;" >五星级企业</p>
             <span style="font-size:8px;color: #808080;">四星基础上填写上年度可抵押物资产总额，上年度资产负债率</span>
            </li> 
             <li style="list-style-type:none;">
             <p style="font-size:14px;border-bottom:1px solid #d8d8d8;line-height: 25px;" >四星级企业</p>
             <span style="font-size:8px;color: #808080;">三星基础上填写上年度年产值、上年度销售总额，上年度纳税总额，上年度资产总额</span>
            </li> 

          <li style="list-style-type:none;">
             <p style="font-size:14px;border-bottom:1px solid #d8d8d8;line-height: 25px;" >三星级企业</p>
             <span style="font-size:8px;color: #808080;">在二星级基础上填写企业职工人数、是否缴纳社会保险、缴纳社会保险人数、企业上年度水电费总额。</span>
            </li>  
             <li style="list-style-type:none;">
             <p style="font-size:14px;border-bottom:1px solid #d8d8d8;line-height: 25px;" >二星级企业</p>
             <span style="font-size:8px;color: #808080;">填写企业名称、企业法人代表,联系方式，上传企业营业执照和税务登记证。五项内容均为必填写项，信息填写不完整不予评级。</span>
            </li>  

             <li style="list-style-type:none;">
             <p style="font-size:14px;line-height:25px;float:right;margin-top:15px;" ><a href="{:U('Industry/credit_result')}">更多>></a></p>
           
            </li>    
        </ul>
        </div>
        
     <div class="col-xs-6 col-sm-6" style="border: 1px solid #d8d8d8;height:100px;">
            <h2 class="credit_finance" >
            <a href="{:U('Industry/financial')}">
			<dl  class="finance_tit clearfix">
			<dt style="float: left;font-size: 40px;line-height: 45px;color: #990000;font-weight: normal;margin-right: 5px">B</dt>
			<dd>
			<span style="display: block;font-size: 8px;color: #4d4d4d;line-height: 12px;margin: 0;"><i>ank</i> information</span>
			<strong style="display: block;font-size: 12px;color: #990000;line-height: 25px;font-weight: normal;">银行资讯</strong>
			</dd>
			</dl>
		   </a>
		</h2>
        </div>  


    <div class="col-xs-6 col-sm-6" style="border: 1px solid #d8d8d8;margin-top:5px;height:100px;">
            <h2 class="credit_finance" >
             <a href="{:U('Industry/financial')}">
			<dl  class="finance_tit clearfix">
			<dt style="float: left;font-size: 40px;line-height: 45px;color: #990000;font-weight: normal;margin-right: 5px;">C</dt>
			<dd>
			<span style="display: block;font-size: 8px;color: #4d4d4d;line-height: 12px;margin: 0;"><i>ulture</i>bank</span>
			<strong style="display: block;font-size: 12px;color: #990000;line-height: 25px;font-weight: normal;">文化银行</strong>
			</dd>
			</dl>
		 </a>
		</h2>
        </div>
        
    <div class="col-xs-6 col-sm-6" style="border: 1px solid #d8d8d8;margin-top:5px;height:100px;">
            <h2 class="credit_finance" >
             <a href="{:U('Industry/prefecture')}">
			<dl  class="finance_tit clearfix">
			<dt style="float: left;font-size: 40px;line-height: 45px;color: #990000;font-weight: normal;margin-right: 5px">C</dt>
			<dd>
			<span style="display: block;font-size: 8px;color: #4d4d4d;line-height: 12px;margin: 0;"><i>redit</i>products</span>
			<strong style="display: block;font-size: 12px;color: #990000;line-height: 25px;font-weight: normal;">信贷产品</strong>
			</dd>
			</dl>
		 </a>
		</h2>
         <ul class="col-xs-7 col-sm-7">
            <li style="list-style-type:none;">
             <p style="font-size:6px;border-bottom:1px solid #d8d8d8;" >融资单位</p>
            
            </li> 

        </ul>
        <ul class="col-xs-5 col-sm-5">
            <li style="list-style-type:none;">
             <p style="font-size:6px;border-bottom:1px solid #d8d8d8;" >保险</p>
            </li> 

        </ul>
        </div>
         <div class="col-xs-6 col-sm-6" style="border: 1px solid #d8d8d8;margin-top:5px;height:100px;">
            <h2 class="credit_finance" >
             <a href="{:U('Industry/financial')}">
			<dl  class="finance_tit clearfix">
			<dt style="float: left;font-size: 40px;line-height: 45px;color: #990000;font-weight: normal;margin-right: 5px">I</dt>
			<dd>
			<span style="display: block;font-size: 8px;color: #4d4d4d;line-height: 12px;margin: 0;"><i>ndustry</i>fund</span>
			<strong style="display: block;font-size: 12px;color: #990000;line-height: 25px;font-weight: normal;">产业基金</strong>
			</dd>
			</dl>
		  </a>
		</h2>
        </div>
         <div class="col-xs-6 col-sm-6" style="border: 1px solid #d8d8d8;margin-top:5px;height:100px;">
            <h2 class="credit_finance" >
             <a href="{:U('Industry/financial')}">
			<dl  class="finance_tit clearfix">
			<dt style="float: left;font-size: 40px;line-height: 45px;color: #990000;font-weight: normal;margin-right: 5px">I</dt>
			<dd>
			<span style="display: block;font-size: 8px;color: #4d4d4d;line-height: 12px;margin: 0;"><i>ndustry</i>evaluation</span>
			<strong style="display: block;font-size: 12px;color: #990000;line-height: 25px;font-weight: normal;">产业评估</strong>
			</dd>
			</dl>
		 </a>
		</h2>
        </div>

        <div class="col-xs-6 col-sm-6" style="border: 1px solid #d8d8d8;margin-top:5px;height:100px;">
            <h2 class="credit_finance" >
             <a href="{:U('Industry/financial')}">
			<dl  class="finance_tit clearfix">
			<dt style="float: left;font-size: 40px;line-height: 45px;color: #990000;font-weight: normal;margin-right: 5px">E</dt>
			<dd>
			<span style="display: block;font-size: 8px;color: #4d4d4d;line-height: 12px;margin: 0;"><i>nterprise</i>fund</span>
			<strong style="display: block;font-size: 12px;color: #990000;line-height: 25px;font-weight: normal;">企业基金</strong>
			</dd>
			</dl>
		</a>
		</h2>
        </div>     			
  </div>
  </div>
  
</block>