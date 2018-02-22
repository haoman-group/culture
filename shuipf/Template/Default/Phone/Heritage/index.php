<extend name="shuipf/Template/Default/Phone/Common/_layout.php" />
<block name="style">
    <style>
        .my-am-nav{margin-top:0px;}
        .my-am-nav a {font-size:13px;}
        .am-active {font-weight:bold;}
        .am-breadcrumb{margin:0 0 0 0;}
        .am-list{margin-top:0px;}
        .am-header-title{line-height:49px;}
        .swiper-span-intro{
            color:#962626;
            padding-left:10px;
            font-size:17px;
        }
        .swiper-slide{padding:0 0 0 0 !important;}
    </style>
    <link rel="stylesheet" href="{$config_siteurl}statics/cu/swiper/swiper.css"> 
    <link rel="stylesheet" href="{$config_siteurl}statics/cu/bootstrap/bootstrap.min.css">
    <link href="https://cdn.bootcss.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet">
	<script type="text/javascript" src="{$config_siteurl}statics/cu/jquery/jquery.min.js"></script>
	<script type="text/javascript" src="{$config_siteurl}statics/cu/bootstrap/bootstrap.min.js"></script>
	<script type="text/javascript" src="{$config_siteurl}statics/cu/swiper/swiper.min.js"></script> 
</block>
<block name="content">


<!-- 首页轮播 -->
  <div class="container">
	<div class="row" >
        <div class="swiper-wrap"  >
				<div class="swiper-container swiper-container-centered">
					<div class="swiper-wrapper navbar-swiper" style="margin-top:0px ;margin-bottom:2px;">
						  
                            <div class="swiper-slide col-xs-12 "  style="height:165px;">
							    <img src="{$config_siteurl}statics/cu/Heritage/images/index-s11.jpg"  class="img-responsive">
                                <span class="swiper-span-intro">郭杜林晋式月饼制作技艺</span>      
							</div>
                      <div class="swiper-slide col-xs-12 "  style="height:165px;">
                             <img src="{$config_siteurl}statics/cu/Heritage/images/index-s2.jpg"  class="img-responsive">
                             <span  class="swiper-span-intro">老陈醋酿制技艺</span>      	
							</div>
                      <div class="swiper-slide col-xs-12 "  style="height:165px;">
                             <img src="{$config_siteurl}statics/cu/Heritage/images/index-s3.jpg"  class="img-responsive">	
                             <span  class="swiper-span-intro">平遥纱阁戏人</span>      
							</div>            
						<div class="swiper-slide col-xs-12 "  style="height:165px;">
                             <img src="{$config_siteurl}statics/cu/Heritage/images/index-s4.jpg"  class="img-responsive">	
                             <span  class="swiper-span-intro">平定黑釉刻花陶瓷制作工艺 阳泉市平定县</span>      
                            </div>   
                            
                    </div>	
                    <div class="swiper-pagination" style="text-align:right;"></div>
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

<div class="container">
<div class="row" style="margin-top:5px;">
<div class="col-xs-12 col-md-12" style="padding-left:5px;padding-right:5px;" >
<div class="col-xs-2 col-md-2" style="border:1px solid black;height:110px;background-color: #962626;">
  <h4 style="display:table-cell;vertical-align:middle;text-align:center;height:110px;color:#fff;">导语</h4>
</div>

<div class="col-xs-10 col-md-10" >
  <span style="text-align:center;font-size:8px;">山西省省级非物质文化遗产名录公示名单主要包括民间文学，民间音乐，民间舞蹈，戏剧，曲艺等多个方面。现已公布两批，共计754项。</span>
 <p style="font-size:8px;margin-top:4px;color:#a6a6a6;">中文名：山西省非物质文化遗产名录&nbsp;&nbsp;&nbsp;&nbsp; 名   单：共计754项</p>
 <p style="font-size:8px;color:#a6a6a6;">地   区：山西省&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  内   容：非物质文化遗产名录</p>
</div>
</div>

       	
  </div>
  </div>
  
 <div class="container">
   <div class="row" style="margin-top:5px;">
        <volist name="lists" id="vo" >
                <div class="col-xs-6 col-md-4" style="padding-left:5px;padding-right:5px;height:260px;" >
                    <a href="{:U('show',array('id'=>$vo['id']))}" style="color:black;">
                    <img src="{$vo['cover']}" class="img-responsive"  style="height:108px;width:100%;text-align:center;" />
                    <div class="col-sm-12  text-left" style="margin-top:10px;padding:0px;">
                        <p class="col-sm-12 col-xs-12" style="line-height:20px;font-size:14px;padding:0 0 0 0;">
                            《<?php echo $vo['title'] ?>》
                        </p> 
                        <span style="margin-top:10px; color:#999;font-size:13px;">
                         <?php echo mb_substr($vo['intro'],0,56) ?>...<span style="font-size:10px;color:#962626;">更多</span>
                        </span>   
                    </div>
                    </a>
                </div>
        </volist>	
  </div>
  </div>
<!-- 底部静态内容 -->

<!-- 底部静态内容 结束-->
</block>