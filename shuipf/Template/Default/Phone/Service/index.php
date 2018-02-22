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
<ul class="my-am-nav am-nav am-nav-tabs am-nav-justify">
    <li class="am-dropdown" data-am-dropdown>
        <a class="am-dropdown-toggle" data-am-dropdown-toggle href="javascript:;">产业项目<span class="am-icon-caret-down"></span></a>
        <ul class="am-dropdown-content">
            <li class=""><a href="###">项目展示</a></li>
            <li class=""><a href="###">供需展示</a></li>
            <li class=""><a href="###">山西文化产业公共服务平台</a></li>
        </ul>
    </li>
    <li class="am-dropdown" data-am-dropdown>
        <a class=" "   href="javascript:;">产品展示</span></a>
        <ul class="am-dropdown-content">
            <li class=""><a href="###"></a></li>
            <li class=""><a href="###"></a></li>
            <li class=""><a href="###"></a></li>
        </ul>
    </li>
    <li class="am-dropdown" data-am-dropdown>
        <a class="am-dropdown-toggle" data-am-dropdown-toggle href="javascript:;">金融服务<span class="am-icon-caret-down"></span></a>
        <ul class="am-dropdown-content">
            <li class=""><a href="###">金融代理</a></li>
            <li class=""><a href="###">信贷专区</a></li>
            <li class=""><a href="###">企业诚信评价</a></li>
            <li class=""><a href="###">文化银行</a></li>
            <li class=""><a href="###">企业基金</a></li>
        </ul>
    </li>
    <li class="am-dropdown" data-am-dropdown>
        <a class="am-dropdown-toggle" data-am-dropdown-toggle href="javascript:;">消费服务<span class="am-icon-caret-down"></span></a>
        <ul class="am-dropdown-content">
            <li class=""><a href="###">消费资讯</a></li>
            <li class=""><a href="###">优惠信息</a></li>
            <li class=""><a href="###">商家联盟</a></li>
        </ul>
    </li>
</ul>
  <div class="container" >
  	<img src="{$config_siteurl}statics/ci/images/industry_logo1.jpg" class="img-responsive" alt="Cinque Terre"  height="236" width="100%;">
      </div>

<!--两个分类-->
<div class="container" style="margin-top:15px;">
<div class="row">
<div class="col-xs-6 col-md-2 " >
  <a href="http://xmsbpt.sx-ci.cn:9002/"><img src="{$config_siteurl}statics/ci/images/industry_pingtai1.png" alt="" class="img-responsive" /></a>
  </div>    
  <div class="col-xs-6 col-md-2 " >
   <a href="{:U('Industry/Industry/add_personal')}"><img src="{$config_siteurl}statics/ci/images/industry_fabu22.png" alt="" class="img-responsive" /></a>
  </div>
  </div>
  </div>
  <!--项目展示-->
  <div class="container" style="margin-top:15px;">
<div class="row">
<h5 style="border-bottom: 1px solid #900;"><span>项目展示</span><span style="float:right;">更多>></span></h5>    
  </div>
  </div>
  <div class="container" style="margin-top:15px;">
<div class="row">
<volist name="data" id="vo">
   <div class="col-xs-6 col-sm-4"  >
                    <a href="" style="color:black;">
                    <img src="{:thumb($vo['pthumb'],0,108,1)}" class="img-responsive"  style="height:108px;" />
                    <div class="col-sm-12  text-left" style="margin-top:20px;padding:0px;">
                        <p class="col-sm-12 col-xs-12" style="line-height:20px;">
                           项目名称: <?php echo mb_substr($vo['pname'],0,5) ?>
                        </p>
                         <p class="col-sm-12 col-xs-12" style="line-height:20px;">
                           行业: {$vo.categoryname|str_cut=###,7}
                        </p>
                         <p class="col-sm-12 col-xs-12" style="line-height:20px;">
                           投资总额:{$vo.plimit}万
                        </p>    
                    </div>
                    </a>
                </div>
                </volist>
  </div> 
  </div>
  </div>
</block>