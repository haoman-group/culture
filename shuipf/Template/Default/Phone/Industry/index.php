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
						  
                            <div class="swiper-slide col-xs-12 "  style="height:165px;">
							 <img src="{$config_siteurl}statics/img/1111.jpg"  class="img-responsive">	
							</div>
                      <div class="swiper-slide col-xs-12 "  style="height:165px;">
							 <img src="{$config_siteurl}statics/img/333.jpg"  class="img-responsive">	
							</div>
                      <div class="swiper-slide col-xs-12 "  style="height:165px;">
							 <img src="{$config_siteurl}statics/img/22222.jpg"  class="img-responsive">	
							</div>            
						
					</div>
					
					
				</div>
				<script>
				var swiper = new Swiper('.swiper-container-centered', {
					pagination: '.swiper-pagination',
					slidesPerView: 'auto',
					centeredSlides: true,
					paginationClickable: true,
					spaceBetween: 30,
                    slidesPerView: 1,
					loop:true,
					autoplay:3000,
					paginationClickable:true,
				});
				</script>
				</div>
               
</div>
</div>
<!-- 轮播 结束-->

<!-- 导航 -->

<div class="container">
<div class="row" >
        <div class="col-xs-3 col-md-3 " >
        <a href="{:U('Policy/lists')}">
           <img src="{$config_siteurl}statics/ci/img/indexSeect1.png" class="img-responsive">
            <div class=" text-center " style="margin-top:15px;padding:0;">
            <p style="color:black;">政策法规</p>  
        </div>
        </a>
        </div>
        <div class="col-xs-3 col-md-3"  >
        <a href="/Phone/Industry/services">
           <img src="{$config_siteurl}statics/ci/img/indexSeect2.png" class="img-responsive">
           <div class=" text-center " style="margin-top:15px;padding:0;">
            <p style="color:black;">产业服务</p>
        </div>
        </a>   
        </div>
        <div class="col-xs-3 col-md-3"  >
         <a href="{:U('Phone/Industry/culture')}">
           <img src="{$config_siteurl}statics/ci/img/indexSeect3.png" class="img-responsive">
           <div class=" text-center " style="margin-top:15px;padding:0;">
            <p style="color:black;">文化金融</p>
        </div>
        </a>
        </div>
        <div class="col-xs-3 col-md-3" >
         <a href="{:U('Phone/Consume/index')}">
           <img src="{$config_siteurl}statics/ci/img/indexSeect4.png" class="img-responsive">
           <div class=" text-center " style="margin-top:15px;padding:0;">
            <p style="color:black;">文化消费</p>
        </div>
        </a>
        </div>
        
        
    </div>
</div>
</div>
<!-- 导航 结束-->

<!-- 产品展示馆 -->
<div class="container">
<div class="row" style="margin-top:20px;">
      <div class="col-xs-4 col-sm-4" >
           <img src="{$config_siteurl}statics/phone/image/category1.png" class="img-responsive">
        </div>
        <div class="col-xs-4 col-sm-4 divider-title-wrap text-center">
            <p>产品展示</p>
        </div>
        <div class="col-xs-4 col-sm-4 "  >
           <img src="{$config_siteurl}statics/phone/image/category2.png" class="img-responsive">
        </div>
					
  </div>
  </div>
  <div class="container">
   <div class="row" style="margin-top:5px;">
         
      	 <div class="col-xs-12 col-sd-2"  >
	      <img src="{$product_data[1]['image']}" class="img-responsive"  style="width:100%;"  />					    
		</div>
         <for start="2" end="5">
                <div class="col-xs-4 col-md-4" style="margin-top:10px;height:189px;padding-left:15px;" >
                    <a href="<?php echo c(CU_ID)?>search/q/{$product_data[$i]['keyword']}">
                    <img src="{:thumb($product_data[$i]['image'],0,108,1)}" class="img-responsive"  style="height:108px;" />
                    <div class="col-sm-12  text-left" style="margin-top:20px;padding:0px;">
                        <p class="col-sm-12 col-xs-12" style="line-height:20px;">
                            <?php echo mb_substr($product_data[$i]['title'],0,5) ?>
                        </p>    
                    </div>
                    </a>
                </div>
        </for>	
  </div>
  </div>
<!-- 产品展示馆 结束-->
<div class="container">
   <div class="row" style="margin-top:5px;">
         
      	 
         
                <div class="col-xs-6 col-md-6" style="margin-top:10px;height:100px;" >
                    <a href="{:U('Phone/Industry/create')}">
                    <img src="{$config_siteurl}statics/ci/images/news/bbslogo1.jpg" class="img-responsive"  style="height:60px;" />
                    
                    </a>
                </div>
                 <div class="col-xs-6 col-md-6" style="margin-top:10px;height:100px;" >
                    <a href="{:U('Case/lists',array('cid'=>9))}">
                    <img src="{$config_siteurl}statics/images/Case.jpg" class="img-responsive"  style="height:60px;" />
                    
                    </a>
                </div>
                <div class="col-xs-6 col-md-6" style="margin-top:5px;height:100px;" >
                    <a href="{:U('Research/lists',array('cid'=>10))}">
                    <img src="{$config_siteurl}statics/images/Research.jpg" class="img-responsive"  style="height:60px;" />
                    
                    </a>
                </div>
                 <div class="col-xs-6 col-md-6" style="margin-top:5px;height:100px;" >
                    <a href="{:U('Subject/lists',array('cid'=>6))}">
                    <img src="{$config_siteurl}statics/images/Subjects.png" class="img-responsive"  style="height:60px;" />
                    
                    </a>
                </div>
        	
  </div>
  </div>
<!-- 底部静态内容 -->
<div class="container">
<div class="row" style="margin-top:20px;">
      <div class="col-xs-4 col-sm-4" >
           <img src="{$config_siteurl}statics/phone/image/category1.png" class="img-responsive">
        </div>
        <div class="col-xs-4 col-sm-4 divider-title-wrap text-center">
            <p>企业推荐</p>
        </div>
        <div class="col-xs-4 col-sm-4 "  >
           <img src="{$config_siteurl}statics/phone/image/category2.png" class="img-responsive">
        </div>
					
  </div>
  <div class="container">
   <div class="row" style="margin-top:5px;">
         
      	
         
               
                    <volist name="data" id="vo">
                 <div class="col-xs-12 col-sm-4"  >
                 <p style="margin-top:10px;float:left;"> <a href="{:U('Resources/industryshow',['id'=>$vo['id']])}" style="font-size:16px;color:#666;" class="recom1">{$key+1}.{$vo.com_name}</a></p>
               </div>
                </volist>
                
        	
  </div>
  </div>
<!-- 底部静态内容 结束-->
</block>