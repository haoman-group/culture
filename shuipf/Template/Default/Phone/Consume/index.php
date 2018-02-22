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
							 <img src="{$config_siteurl}statics/ci/images/cardban.jpg"  class="img-responsive" >	
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
            <p>消费资讯</p>
        </div>
        <div class="col-xs-4 col-sm-4 "  >
           <img src="{$config_siteurl}statics/phone/image/category2.png" class="img-responsive">
        </div>
					
  </div>
  </div>
  <div class="container">
   <div class="row" style="margin-top:5px;">
         
      	 <div class="col-xs-6 col-sd-2"  >
	      <img src="{$custom[0]['thumb']}" class="img-responsive"  style="width:100%;"  />					    
		</div>
         <for start="1" end="4">
                    <a href="{:U('show',array('id'=>$custom[$i]['id']))}">
                        <p class="col-sm-6 col-xs-6" style="line-height:20px;">
                           {$i} <?php echo mb_substr($custom[$i]['title'],0,18) ?>
                        </p>    
                   
                    </a>
                
        </for>	
  </div>
  </div>
<!--优惠信息-->
<div class="container">
<div class="row" style="margin-top:20px;">
      <div class="col-xs-4 col-sm-4" >
           <img src="{$config_siteurl}statics/phone/image/category1.png" class="img-responsive">
        </div>
        <div class="col-xs-4 col-sm-4 divider-title-wrap text-center">
            <p>优惠信息</p>
        </div>
        <div class="col-xs-4 col-sm-4 "  >
           <img src="{$config_siteurl}statics/phone/image/category2.png" class="img-responsive">
        </div>
					
  </div>
  </div>
  <div class="container">
   <div class="row" style="margin-top:5px;">
         
      	 <div class="col-xs-6 col-sd-2"  >
	     <h5  style="text-align:center;">热门信息</h5>
         <for start="0" end="4">
                    <a href="{:U('show',array('id'=>$discount[$i]['id']))}">
                        <p class="col-sm-12 col-xs-12" style="line-height:20px;">
                           {$i+1} <?php echo mb_substr($discount[$i]['title'],0,18) ?>
                        </p>    
                   
                    </a>
                
        </for>						    
		</div>

         <div class="col-xs-6 col-sd-2"  >
	     <h5  style="text-align:center;">其他信息</h5>
         <for start="4" end="8">
                    <a href="{:U('show',array('id'=>$discount[$i]['id']))}">
                        <p class="col-sm-12 col-xs-12" style="line-height:20px;">
                           {$i-3} <?php echo mb_substr($discount[$i]['title'],0,18) ?>
                        </p>    
                   
                    </a>
                
        </for>						    
		</div>
         
  </div>
  </div>

  <!--优惠产品-->
  <div class="container">
<div class="row" style="margin-top:20px;">
      <div class="col-xs-4 col-sm-4" >
           <img src="{$config_siteurl}statics/phone/image/category1.png" class="img-responsive">
        </div>
        <div class="col-xs-4 col-sm-4 divider-title-wrap text-center">
            <p>优惠产品</p>
        </div>
        <div class="col-xs-4 col-sm-4 "  >
           <img src="{$config_siteurl}statics/phone/image/category2.png" class="img-responsive">
        </div>
					
  </div>
  </div>
  <div class="container">
   <div class="row" style="margin-top:5px;">
         
      	 <div class="col-xs-4 col-sd-2"  >
	       <img src="{$config_siteurl}statics/ci/images/pro1.jpg" class="img-responsive">
           <h5>带着文惠券去看...</h5>
           <p>春风十里——不如看场电影 ! 有什么能比周末的午后，和...</p>
           <h5>2017-11-27</h5>
        				    
		</div>

         <div class="col-xs-4 col-sd-2"  >
	       <img src="{$config_siteurl}statics/ci/images/pro2.jpg" class="img-responsive">
           <h5>带着文惠券去看...</h5>
           <p>春风十里——不如看场电影 ! 有什么能比周末的午后，和...</p>
           <h5>2017-11-27</h5>
        				    
        				    
		</div>
         <div class="col-xs-4 col-sd-2"  >
	       <img src="{$config_siteurl}statics/ci/images/pro3.jpg" class="img-responsive">
        	<h5>带着文惠券去看...</h5>
           <p>春风十里——不如看场电影 ! 有什么能比周末的午后，和...</p>
           <h5>2017-11-27</h5>
        				    			    
		</div> 
         
  </div>
  </div>
</block>