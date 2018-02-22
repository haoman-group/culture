<extend name="shuipf/Template/Default/Phone/Common/_layout.php" />
<block name="style">
    <style>
        .my-am-nav{margin-top:0px;}
        .my-am-nav a {font-size:13px;}
        .am-active {font-weight:bold;}
        .am-breadcrumb{margin:0 0 0 0;}
        .am-list{margin-top:0px;}
        .am-header-title{line-height:49px;}
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
							 <img src="{$config_siteurl}statics/img/forum_01.jpg"  class="img-responsive" >	
							</div>
					</div>		
				</div>	
			</div>
               
</div>
</div>

<div class="container">
<div class="row" style="margin-top:20px;">
      <div class="col-xs-4 col-sm-4" >
           <img src="{$config_siteurl}statics/phone/image/category1.png" class="img-responsive">
        </div>
        <div class="col-xs-4 col-sm-4 divider-title-wrap text-center">
            <p><a href="{:U('Industry/createlist',array('type'=>'new'))}" style="color:#fff;">新帖速递</a></p>
        </div>
        <div class="col-xs-4 col-sm-4 "  >
           <img src="{$config_siteurl}statics/phone/image/category2.png" class="img-responsive">
        </div>
					
  </div>
  </div>
  <div class="container">
   <div class="row" style="margin-top:5px;">
<volist name="news" id="vo">
<div class="col-xs-12 col-sm-4"  >
<p> <a href="{:U('Industry/createshow',['id'=>$vo['id']])}" style="font-size:16px;color:#666;" class="recom1">{$key+1}.{$vo.title}</a></p>
</div>
</volist>  	
  </div>
  </div>
<!--优惠信息-->
<div class="container">
<div class="row" style="margin-top:20px;">
      <div class="col-xs-4 col-sm-4" >
           <img src="{$config_siteurl}statics/phone/image/category1.png" class="img-responsive">
        </div>
        <div class="col-xs-4 col-sm-4 divider-title-wrap text-center">
            <p><a href="{:U('Industry/createlist',array('type'=>'hot'))}" style="color:#fff;">热帖</a></p>
        </div>
        <div class="col-xs-4 col-sm-4 "  >
           <img src="{$config_siteurl}statics/phone/image/category2.png" class="img-responsive">
        </div>
					
  </div>
  </div>
  <div class="container">
   <div class="row" style="margin-top:5px;">
<volist name="hot" id="h">
<div class="col-xs-12 col-sm-4"  >
<p> <a href="{:U('Industry/createshow',['id'=>$h['id']])}" style="font-size:16px;color:#666;" class="recom1">{$key+1}.{$h.title}</a></p>
</div>
</volist>  	
  </div>
  </div>

 
<div class="container">
<div class="row" style="margin-top:20px;">
      <div class="col-xs-4 col-sm-4" >
           <img src="{$config_siteurl}statics/phone/image/category1.png" class="img-responsive">
        </div>
        <div class="col-xs-4 col-sm-4 divider-title-wrap text-center">
            <p>发帖</p>
        </div>
        <div class="col-xs-4 col-sm-4 "  >
           <img src="{$config_siteurl}statics/phone/image/category2.png" class="img-responsive">
        </div>
					
  </div>
  </div>
    
  </div>
 
  <div class="container">
 <form role="form" action="{:U('Phone/Industry/addcreate')}" method="post">
	<div class="form-group" style="margin-top:20px;">
    
		<label for="name">标题:</label>
		<input type="text" class="form-control"   name="title">
        <input type="hidden" class="form-control"   name="userid" value="{$userid}">
	</div>

    <div class="form-group" style="margin-top:20px;">
    
		<label for="name">内容:</label>
		<textarea class="form-control" rows="3" name="content"></textarea>
	</div> 
	<button type="submit" class="btn btn-default">提交</button>
</form>
  </div>
</block>