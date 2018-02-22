<!DOCTYPE html>
<html lang="zh-CN">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0,user-scalable=no">

	<!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
	<title>山西文化云</title>
	
	<link rel="stylesheet" type="text/css" href="{$config_siteurl}statics/phone/css/index.css" />
    <link rel="stylesheet" href="{$config_siteurl}statics/cu/swiper/swiper.css">
    <link rel="stylesheet" href="{$config_siteurl}statics/cu/bootstrap/bootstrap.min.css">
    <link href="https://cdn.bootcss.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet">
	<script type="text/javascript" src="{$config_siteurl}statics/cu/jquery/jquery.min.js"></script>
	<script type="text/javascript" src="{$config_siteurl}statics/cu/bootstrap/bootstrap.min.js"></script>
	<script type="text/javascript" src="{$config_siteurl}statics/cu/swiper/swiper.min.js"></script>
    <style>
        .navbar-swiper img{
            height:100%;
            width:100%;
            overflow:hidden;
            /* float:left; */
        }
        .navbar-swiper div p{
            font-size:20px;
            font-weight:700;
            text-align:left;
            padding-left:15px;
            color:grey;
            line-height:100px;

        }
        .divider-title-wrap{
            padding-left:0px;
            padding-right:0px;
            margin-top:-10px;
        }
        .divider-title-wrap p {
            display: inline-block;
            font-size:1.15em;
            background-color :#962626;
            color:#fff;
            border-radius:5px;
            border:0.4rem double #fff;
            padding:1px 20px 1px 20px;
            box-sizing:border-box;
        }
        .news-title{
            font-size:1.1em;
            color:black;
        }
        .row{margin:0;}
.col-lg-1,.col-lg-10,.col-lg-11,.col-lg-12,.col-lg-2,.col-lg-3,.col-lg-4,.col-lg-5,.col-lg-6,.col-lg-7,.col-lg-8,.col-lg-9,.col-md-1,.col-md-10,.col-md-11,.col-md-12,.col-md-2,.col-md-3,.col-md-4,.col-md-5,.col-md-6,.col-md-7,.col-md-8,.col-md-9,.col-sm-1,.col-sm-10,.col-sm-11,.col-sm-12,.col-sm-2,.col-sm-3,.col-sm-4,.col-sm-5,.col-sm-6,.col-sm-7,.col-sm-8,.col-sm-9,.col-xs-1,.col-xs-10,.col-xs-11,.col-xs-12,.col-xs-2,.col-xs-3,.col-xs-4,.col-xs-5,.col-xs-6,.col-xs-7,.col-xs-8,.col-xs-9{padding:0;}
/* Fuck 15px for iPhone Over */

    </style>
</head>
<body>
<div class="container" style="margin-top:0px;padding-left:0px;padding-right:5px;">
    <!-- 首页顶部导航 -->
    <div class="row" >
        <div class="col-xs-3 col-md-3">
            <img src="{$config_siteurl}statics/cu/images/icon/logo.png" class="img-responsive">
        </div>
        <div class="col-xs-8 col-md-8">
            <div class="input-group " style="margin-top:15px;">
                <form action="/Phone/News/search" method="get">
                    <input type="text" class="form-control input " name="keywords" placeholder="输入您要搜索的关键词" style="border-radius:20px 0 0 20px;width:70%;">
                    
                    <button type="submit"  class="input-group-addon btn btn-primary"  style="height:34px;width:45px;border-radius:0 15px   15px 0;color:#962626;font-size:14px;">搜索</button>
                </form>
            </div>
        </div>
        <div class="col-xs-1 col-md-1" style="float:right;margin-top:15px;">
            <a href="/Phone/User/profile"><i class="fa fa-user fa-2x pull-right" style=""></i></a>
        </div>
    </div>
    <!-- 首页顶部导航 结束-->
	<!-- 轮播（Carousel）导航 -->
    <div class="container">
	<div class="row" style="margin-top:10px;">
        <div class="swiper-wrap"  >
				<div class="swiper-container swiper-container-centered">
					<div class="swiper-wrapper navbar-swiper" style="margin-top:2px ;margin-bottom:2px;">
						  <for start="0" end="5">
                          <if condition="isset($carousel[$i]['pub_slide'])">
							<div class="swiper-slide col-xs-12 "  style="height:165px;">
									<a href="{$carousel[$i]['picture_wap_url']}"><img src="{$carousel[$i]['pub_slide']}"  class="center-block"></a>	
							</div>
                            <else/>
                            <div class="swiper-slide col-xs-12 "  style="height:165px;">
							 <img src="{$config_siteurl}statics/cu/images/images/ggindexban{$i+1}.jpg"  class="center-block">	
							</div>
                            </if>
                            </for>
						
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
<div class="container">
<div class="row" style="margin-top:15px;">
        <div class="col-xs-1 col-md-1 " style="padding-left:15px;"> 
        </div>

        <div class="col-xs-2 col-md-2 " style="padding-left:15px;" >
        <a href="{:U('Active/lists')}">
           <img src="{$config_siteurl}statics/phone/image/active1.jpg" class="img-responsive">
            <div class=" text-center " style="margin-top:15px;padding:0;">
            <p style="color:black;">文化活动</p>
            
        </div>
        </a>
        </div>

        <div class="col-xs-2 col-md-2" style="padding-left:15px;" >
        <a href="{:U('Facility/index')}">
           <img src="{$config_siteurl}statics/phone/image/active2.jpg" class="img-responsive">

       
           <div class=" text-center " style="margin-top:15px;padding:0;">
            <p style="color:black;">文化设施</p>
        </div>
        </a>
           
        </div>

        <div class="col-xs-2 col-md-2" style="padding-left:15px;" >
         <a href="/Phone/Resource/lists">
           <img src="{$config_siteurl}statics/phone/image/active3.jpg" class="img-responsive">

        
           <div class=" text-center " style="margin-top:15px;padding:0;">
            <p style="color:black;">资源展馆</p>
        </div>
        </a>
        </div>

        <div class="col-xs-2 col-md-2" style="padding-left:15px;">
         <a href="{:U('Volunteer/lists')}">
           <img src="{$config_siteurl}statics/phone/image/active4.jpg" class="img-responsive">

           <div class=" text-center " style="margin-top:15px;padding:0;">
            <p style="color:black;">文化志愿</p>
        </div>
        </a>
        </div>
        <div class="col-xs-2 col-md-2"  style="padding-left:15px;">
         <a href="/Phone/Industry/index">
           <img src="{$config_siteurl}statics/phone/image/active5.png" class="img-responsive">
           <div class=" text-center " style="margin-top:15px;padding:0;">
            <p style="color:black;">产业服务</p>
        </div>
        </a>
        </div>
        
    </div>
</div>
</div>
<div class="container">
<div class="row" style="margin-top:10px;background-color:#f1efef;">
        <div class="swiper-wrap"  >
				<div class="swiper-container swiper-container-centered-auto">
					<div class="swiper-wrapper navbar-swiper" style="margin-top:5px ;margin-bottom:5px;">
						
							<div class="swiper-slide col-xs-12 col-sm-4"  style="height:100px;">
                            <a href="{:U('Electronics/index')}">
									<img src="{$config_siteurl}statics/cu/images/public-service/journals.png"  >
                                    <div class="col-sm-3 text-center " style="padding:0;">
                                       <p>电子期刊</p>
                                       </div>
								</a>
							</div>
                            <div class="swiper-slide col-xs-12 col-sm-4"  style="height:100px;">
                            <a href="{:U('Mass/lists')}">
									<img src="{$config_siteurl}statics/cu/images/public-service/venue.png"  >
                                    <div class="col-sm-3 text-center " style="padding:0;">
                                       <p>群众文艺</p>
                                       </div>
                                        </a>
							</div>
                            <div class="swiper-slide col-xs-12 col-sm-4"   style="height:100px;">
                            <a href="http://lib.sx.cn/">
									<img src="{$config_siteurl}statics/cu/images/public-service/library.png"  >
                                    <div class="col-sm-3 text-center " style="padding:0;">
                                       <p>数字图书馆</p>
                                       </div>
                                        </a>
							</div>
                            <div class="swiper-slide col-xs-12 col-sm-4"  style="height:100px;">
                            <a href="{:U('Appreciate/lists')}">
									<img src="{$config_siteurl}statics/cu/images/public-service/Art.png"  >
								    
                                    <div class="col-sm-3 text-center " style="padding:0;">
                                       <p>艺术品鉴赏</p>
                                       </div>
                                        </a>
							</div>
                            <div class="swiper-slide col-xs-12 col-sm-4"  style="height:100px;">
                            <a href="/Phone/Index/wenxiao">
									<img src="{$config_siteurl}statics/cu/images/public-service/card.png"  >
								    
                                    <div class="col-sm-3 text-center " style="padding:0;">
                                       <p>文消卡</p>
                                       </div>
                                        </a>
							</div>
                            <div class="swiper-slide col-xs-12 col-sm-4"   style="height:100px;">
                            <a href="/Phone/Resource/lists/cid/5">
									<img src="{$config_siteurl}statics/cu/images/public-service/policy.png"  >
								    <div class="col-sm-3 text-center " style="padding:0;">
                                       <p>政策法规</p>
                                       </div>
                                       </a>
							</div>
						
					</div>	
				</div>
				<script>
				var swiper = new Swiper('.swiper-container-centered-auto', {
					pagination: '.swiper-pagination',
					slidesPerView: 'auto',
					centeredSlides: true,
					paginationClickable: true,
					spaceBetween: 30,
                    slidesPerView: 2,
					loop:true,
					autoplay:5000,
					paginationClickable:true,
				});
				</script>
				</div>
               
</div>
</div>
<!--最新咨询-->
<div class="container">
    <div class="row" style="margin-top:30px;">
      <div class="col-xs-4 col-sm-4" >
           <img src="{$config_siteurl}statics/phone/image/category1.png" class="img-responsive">
        </div>
        <div class="col-xs-4 col-sm-4 divider-title-wrap text-center">
           <a href="{:U('News/lists')}"> <p>最新资讯</p></a>
        </div>
        <div class="col-xs-4 col-sm-4 "  >
           <img src="{$config_siteurl}statics/phone/image/category2.png" class="img-responsive">
        </div>
					
  </div>
</div>
<div class="container">
   <div class="row" style="margin-top:30px;">
      <div class="col-xs-4 col-md-4" >
      <if condition="$newest[0]['image'][0] neq '' ">
       <a href="{:U('News/detail',array('id'=>$newest[0]['id']))}"><img src="{$newest[0]['image'][0]}" class="img-responsive"></a>
      <else/>
       <img src="{$config_siteurl}statics/phone/image/zxzx1.png" class="img-responsive">
      </if>
          
        </div>
       <div class="col-xs-4 col-md-4" >
           <if condition="$newest[0]['image'][1] neq '' ">
        <a href="{:U('News/detail',array('id'=>$newest[0]['id']))}"><img src="$newest[0]['image'][1]" class="img-responsive"></a>
      <else/>
       <img src="{$config_siteurl}statics/phone/image/zxzx2.png" class="img-responsive">
      </if>
        </div>
        <div class="col-xs-4 col-md-4 "  >
          <if condition="$newest[0]['image'][2] neq '' ">
        <a href="{:U('News/detail',array('id'=>$newest[0]['id']))}"><img src="$newest[0]['image'][2]" class="img-responsive"></a>
      <else/>
       <img src="{$config_siteurl}statics/phone/image/zxzx3.png" class="img-responsive">
      </if>
        </div>
	     <div class="col-sm-12 col-xs-12 text-left inner text-muted"style="margin-top:10px;">
          <a href="{:U('News/detail',array('id'=>$newest[0]['id']))}">
            <p class="news-title" style="color:black;">{$newest[0]['title']}</p>
             <p style="color:black;"><span style="border: 2px solid #b82727;border-radius:5px;font-size:9px;">最新</span>&nbsp;&nbsp;&nbsp#{$newest[0]['upload_unit']|default="山西文化云"}/{$newest[0]['addtime']|date="Y-m-d",###}</p>
        </a>
        </div>
        <for start="1" end="4">
        <if condition="isset($newest[$i])">
        <div class="col-sm-8 col-xs-8 text-left inner text-muted"style="margin-top:10px;">
         <a href="{:U('News/detail',array('id'=>$newest[$i]['id']))}">
            <p class="col-sm-12 col-xs-12 news-title" style="line-height:20px;">{$newest[$i]['title']}</p>
             <p style="color:black;"><span style="border: 2px solid #b82727;border-radius:5px;font-size:9px;">最新</span>&nbsp;&nbsp;&nbsp#{$newest[$i]['upload_unit']|default="山西文化云"}/{$newest[$i]['addtime']|date="Y-m-d",###}</p>
            <!--<img src="{$config_siteurl}statics/phone/image/zxzx4.png" class="img-responsive col-sm-4 col-xs-4">-->
            </a>
        </div>
        <div class="col-sm-4 col-xs-4 text-left inner text-muted"style="margin-top:10px;">
           <if condition="$newest[$i]['cover'] neq '' ">
             <img src="{$newest[$i]['cover']}" class="img-responsive">
             <else/>
             <img src="{$config_siteurl}statics/phone/image/zxzx{$i}.png" class="img-responsive">
             </if>
           
             
        </div>
        <else/>
        <div class="col-sm-8 col-xs-8 text-left inner text-muted"style="margin-top:10px;">
            <p class="col-sm-12 col-xs-12" style="line-height:20px;">晋风晋韵文化展为2017阿斯塔斯世博会山西活动周增光添彩</p>
             <p><span style="border: 2px solid #b82727;border-radius:5px;font-size:9px;">最新</span>&nbsp;&nbsp;&nbsp#山西文化云/2017-09-08</p>
            <!--<img src="{$config_siteurl}statics/phone/image/zxzx4.png" class="img-responsive col-sm-4 col-xs-4">-->
             
        </div>
        <div class="col-sm-4 col-xs-4 text-left inner text-muted"style="margin-top:10px;">
             <img src="{$config_siteurl}statics/phone/image/zxzx4.png" class="img-responsive">
           
             
        </div>
        </if>	
        </for>
        
      
        	
        		
  </div> 
  </div>
  <!--文化活动-->
  <div class="container">
    <div class="row" style="margin-top:30px;">
      <div class="col-xs-4 col-sm-4" >
           <img src="{$config_siteurl}statics/phone/image/category1.png" class="img-responsive">
        </div>
        <div class="col-xs-4 col-sm-4 divider-title-wrap text-center">
           <a href="{:U('Active/lists')}"> <p >文化活动</p></a>
        </div>
        <div class="col-xs-4 col-sm-4 "  >
           <img src="{$config_siteurl}statics/phone/image/category2.png" class="img-responsive">
        </div>
					
  </div>
 </div>
 <div class="container">
   <div class="row" style="margin-top:30px;">
         <for start="0" end="4">
        <if condition="$actives[$i]">
      	 <div class="col-xs-6 col-sm-6" style="height:200px;" >
	        <if condition="$actives[$i]['image'] neq  '' ">
            <a href="{:U('Active/detail', array('id'=>$actives[$i]['id']))}">
                <img src="{:thumb($actives[$i]['image'],0,186,1)}" class="img-responsive" style="height:150px;" />
                </a>
            <else/>
                <img src="{$config_siteurl}statics/phone/image/whhd{$i+1}.png" class="img-responsive" />	
            </if>				    
            <div class="col-sm-12 text-left" style="margin-top:10px;padding:0px;">
           <a href="{:U('Active/detail', array('id'=>$actives[$i]['id']))}" title="$actives[$i]['content_title']"> <p class="col-sm-12 col-xs-12" style="line-height:20px;color:black;"> <?php echo mb_substr($actives[$i]['content_title'],0,20) ?></p></a>
            <!-- <p>举行</p> -->
        </div>
		</div>
        <else/>
        <div class="col-xs-6 col-sm-6"  >
	      <img src="{$config_siteurl}statics/phone/image/whhd1.png" class="img-responsive" />					    
        <div class="col-sm-12 text-left" style="margin-top:20px;padding:0px;">
          <p class="col-sm-12 col-xs-12" style="line-height:20px;">全国第十七届"群星奖"</p>
             <p>2017-08-08太原举行</p>
        </div>
		</div>
        </if>
        </for>
        <!--<div class="col-xs-6 col-sm-6"  >
	      <img src="{$config_siteurl}statics/phone/image/whhd2.png" class="img-responsive" />					    
        <div class="col-sm-12  text-left" style="margin-top:20px;padding:0px;">
          <p class="col-sm-12 col-xs-12" style="line-height:20px;">全国第十七届"群星奖"</p>
             <p>2017-08-08太原举行</p>
        </div>
		</div>
        <div class="col-xs-6 col-sm-6"  >
	      <img src="{$config_siteurl}statics/phone/image/whhd3.png" class="img-responsive" />					    
        <div class="col-sm-12 text-left" style="margin-top:20px;padding:0px;">
          <p class="col-sm-12 col-xs-12" style="line-height:20px;">全国第十七届"群星奖"</p>
             <p>2017-08-08太原举行</p>
        </div>
		</div>
        <div class="col-xs-6 col-sm-6"  >
	      <img src="{$config_siteurl}statics/phone/image/whhd4.png" class="img-responsive" />					    
        <div class="col-sm-12  text-left" style="margin-top:20px;padding:0px;">
          <p class="col-sm-12 col-xs-12" style="line-height:20px;">全国第十七届"群星奖"</p>
             <p>2017-08-08太原举行</p>
        </div>
		</div>-->
        		
  </div>  
  </div>
  <!--艺术档案馆-->
  <div class="container">
  <div class="row" style="margin-top:30px;">
      <div class="col-xs-4 col-sm-4" >
           <img src="{$config_siteurl}statics/phone/image/category1.png" class="img-responsive">
        </div>
        <div class="col-xs-4 col-sm-4  divider-title-wrap text-center">
            <a href="{:U('Archive/lists')}"><p style="font-size:15px;">艺术档案馆</p></a>
        </div>
        <div class="col-xs-4 col-sm-4 "  >
           <img src="{$config_siteurl}statics/phone/image/category2.png" class="img-responsive">
        </div>
					
  </div>
  </div>
  <div class="container">
  <div class="row" style="margin-top:30px;">
        <div class="swiper-wrap" >
				<div class="swiper-container swiper-container-centered-auto">
					<div class="swiper-wrapper" >
                        <for start='0' end='3'>
                            
							<div class="swiper-slide col-xs-12 col-sm-12" style="height:240px;">
                           
                                <if condition="$archive[$i]['images'] neq '' ">
                                 <a href="{:U('Archive/detail',['id'=>$archive[$i]['id']])}" >
                                 <img src="{$archive[$i]['images']}" class="img-responsive"  style="height:240px;" />
                                 <else/>
                                   <img src="$config_siteurlstatics/cu/images/index/da.png" class="img-responsive" style="height:240px;" />
                                 </if>
                                 
                                <div class="col-sm-12  text-left" style="margin-top:20px;padding:0px;">
                                <p class="col-sm-12 col-xs-12" style="margin:10px 0 0 10px;line-height:20px;color:#fff;font-size:25px;">{$archive[$i]['title']}</p>
                                </div>		
                           </a>
                            </div>
                            
                        </for>
<!--                             
                            <div class="swiper-slide col-xs-12 col-sm-4" style="height:240px;">
									<img src="{$config_siteurl}statics/phone/image/ysdag1.png" class="img-responsive" >
                                    <div class="col-sm-12  text-left" style="margin-top:20px;padding:0px;">
                               <p class="col-sm-12 col-xs-12" style="line-height:20px;color:#fff;">艺术盛会 人名的节日</p>
                              
                               </div>
							</div>
                            <div class="swiper-slide col-xs-12 col-sm-4" style="height:240px;">
									<img src="{$config_siteurl}statics/phone/image/ysdag1.png"  class="img-responsive">
                                     <div class="col-sm-12  text-left" style="margin-top:20px;padding:0px;">
                               <p class="col-sm-12 col-xs-12" style="line-height:20px;color:#fff;">艺术盛会 人名的节日</p>
                              
                               </div>
							</div>
                            <div class="swiper-slide col-xs-12 col-sm-4">
									<img src="{$config_siteurl}statics/phone/image/ysdag1.png" class="img-responsive" >
								    
                                    <div class="col-sm-12  text-left" style="margin-top:20px;padding:0px;">
                               <p class="col-sm-12 col-xs-12" style="line-height:20px;color:#fff;">艺术盛会 人名的节日</p>
                              
                               </div>
							</div>
						 -->
					</div>
					
					
				</div>
				<script>
				var swiper = new Swiper('.swiper-container-centered-auto', {
					pagination: '.swiper-pagination',
					slidesPerView: 'auto',
					centeredSlides: true,
					paginationClickable: true,
					spaceBetween: 30,
					loop:true,
					autoplay:5000,
					paginationClickable:true,
				});
				</script>
				</div>
               
</div>
</div>
<!--最新推荐-->
<div class="container">
<div class="row" style="margin-top:30px;">
      <div class="col-xs-4 col-sm-4" >
           <img src="{$config_siteurl}statics/phone/image/category1.png" class="img-responsive">
        </div>
        <div class="col-xs-4 col-sm-4 divider-title-wrap text-center">
            <p>最新推荐</p>
        </div>
        <div class="col-xs-4 col-sm-4 "  >
           <img src="{$config_siteurl}statics/phone/image/category2.png" class="img-responsive">
        </div>		
  </div>	
 </div>
 <div class="container">
   <div class="row" style="margin-top:30px;">
      	<div class="col-xs-6 col-sm-6"  style="height:240px;">
            <a href="{$recommend[0]['url']}">
                <img src="{:thumb($recommend[0]['image'],0,240,1)}" class="img-responsive" />
            </a>
		</div>
        <div class="col-xs-6 col-sm-6"  >
            <article class="post featured" style="height:295px;">
				<header class="major">
                    <a href="{$recommend[0]['url']}">
                    <span class="date"><strong>{$recommend[0]['title']}</strong></span>						
                    <p style="text-indent:2em;line-height:20px;"><?php echo mb_substr($recommend[0]['content'],0,125) ?>...</p>
                    </a>
				</header>
			</article>
        </div>
        
		<for staart="1" end="3">
            <div class="col-xs-4 col-sm-4" style="margin-top:10px;height:197px;" >
                <a href="{$recommend[$i]['url']}">
                <img src="{:thumb($recommend[$i]['image'],0,147,1)}" class="img-responsive"  style="height:147px;" />
                <div class="col-sm-12  text-left" style="margin-top:20px;padding:0px;">
                    <p class="col-sm-12 col-xs-12" style="line-height:20px;overflow:hidden;"><?php echo mb_substr($recommend[$i]['title'],0,10) ?></p>
                </div>
                </a>
            </div>
        </for>	
  </div>
  </div>
  <!--产品推荐-->
  <div class="container">
  <div class="row" style="margin-top:30px;">
      <div class="col-xs-4 col-sm-4" >
           <img src="{$config_siteurl}statics/phone/image/category1.png" class="img-responsive">
        </div>
        <div class="col-xs-4 col-sm-4 divider-title-wrap text-center">
            <p>产品推荐</p>
        </div>
        <div class="col-xs-4 col-sm-4 "  >
           <img src="{$config_siteurl}statics/phone/image/category2.png" class="img-responsive">
        </div>
					
  </div>
  </div>
  <div class="container">
   <div class="row" style="margin-top:30px;">
         
      	 <div class="col-xs-12 col-sm-12"  >
	      <img src="{$config_siteurl}statics/phone/image/cptj1.png" class="img-responsive"  />					    
		</div>
         <for start="0" end="3">
                <div class="col-xs-4 col-sm-4" style="margin-top:10px;height:189px;" >
                    <a href="<?php echo c(CU_ID)?>search/q/{$product[$i]['keyword']}">
                    <img src="{:thumb($product[$i]['image'],0,108,1)}" class="img-responsive"  style="height:108px;" />
                    <div class="col-sm-12  text-left" style="margin-top:20px;padding:0px;">
                        <p class="col-sm-12 col-xs-12" style="line-height:20px;">
                            <?php echo mb_substr($product[$i]['title'],0,5) ?>
                        </p>    
                    </div>
                    </a>
                </div>
        </for>	
  </div>
  </div>
  <!--山西戏曲-->
  <div class="container">
  <div class="row" style="margin-top:30px;">
      <div class="col-xs-4 col-sm-4" >
           <img src="{$config_siteurl}statics/phone/image/category1.png" class="img-responsive">
        </div>
        <div class="col-xs-4 col-sm-4 divider-title-wrap text-center">
            <a href="{:U('Art/lists')}"> <p >山西戏曲</p></a>
        </div>
        <div class="col-xs-4 col-sm-4 "  >
           <img src="{$config_siteurl}statics/phone/image/category2.png" class="img-responsive">
        </div>
					
  </div>
  </div>
  <div class="container">
  <div class="row" style="margin-top:20px;">
         
      	 <div class="col-xs-12 col-sm-12"  >
            <if condition="$opera[0] neq  '' ">
                <div class="col-xs-6 col-md-6" style="padding-left:0px;" >
                    <a href="{:U('Art/lists',['cid'=>$opera[0]['cid']])}">
                        <img src="{:thumb($opera[0]['picture'],203,145,1)}" class="img-responsive" style="height:145px;" />
                        <div>
                            <p style="text-align:center;font-size:14px;">《{$opera[0]['name']}》</p>
                        </div>
                    </a>
          	    </div>	
             <else/>
                <div class="col-xs-6 col-md-6" style="padding-left:0px;" >
	            <img src="{$config_siteurl}statics/phone/image/sxxq1.png" class="img-responsive" style="height:145px;" />
          	    </div>	
            </if> 

            <if condition="$opera[1] neq  '' ">
                <div class="col-xs-6 col-md-6"  style="padding-left:20px;padding-right:0px;">
                    <a href="{:U('Art/lists',['cid'=>$opera[1]['cid']])}">
                        <img src="{:thumb($opera[1]['picture'],0,145,1)}" class="img-responsive"  style="height:145px;" />	
                        <div>
                            <p style="text-align:center;font-size:14px;">《{$opera[1]['name']}》</p>
                        </div>
                    </a>
		        </div>
            <else/>
                <div class="col-xs-6 col-md-6"  style="padding-left:20px;padding-right:0px;">
	                <img src="{$config_siteurl}statics/phone/image/sxxq2.png" class="img-responsive"  style="height:145px;" />					    
		        </div>
            </if>			    
		</div>
        <for start="2" end="5">
        <if condition="isset($opera[$i])">
            <div class="col-xs-4 col-md-4" style="margin-top:10px;" >
                <a href="{:U('Art/lists',['cid'=>$opera[$i]['cid']])}">
                    <img src="{:thumb($opera[$i]['picture'],0,117,0)}" class="img-responsive"  style="height:117px;" />				    
                    <div>
                        <p style="text-align:center;font-size:14px;">《{$opera[$i]['name']}》</p>
                    </div>
                </a>
		    </div>
        <else/>
            <div class="col-xs-4 col-md-4" style="margin-top:10px;" >
	            <img src="{$config_siteurl}statics/phone/image/sxxq3.png" class="img-responsive" />					    
		    </div>
        </if>
        </for>		
  </div>
</div>   
</div>  

 <script> 
 $(document).ready(function(){ 
 $('#myCarousel').carousel({interval:5000});//每隔5秒自动轮播 
 }); 
 </script>
</body>
</html>