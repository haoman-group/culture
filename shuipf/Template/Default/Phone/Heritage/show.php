<extend name="shuipf/Template/Default/Phone/Common/_layout.php" />
<block name="style">
    <style>
        .my-am-nav{margin-top:0px;}
        .my-am-nav a {font-size:13px;}
        .am-active {font-weight:bold;}
        .am-breadcrumb{margin:0 0 0 0;}
        .am-list{margin-top:0px;}
        .am-header-title{line-height:49px;}
        .view-name{text-align:center;color:#962626;font-size:15px;}
        .col-xs-4,
        .col-md-4,
        .col-xs-6{
            padding-right:1px !important;
            padding-left:1px !important;
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
 <div class="container">
   <div class="row" style="">
      
                <div class="col-xs-12 col-md-12" style="padding:0 0 0 0 !important;" >
                    <div class="video-left">
                        <div class="">
							<div id="youkuplayer" class="col-xs-12 col-md-12" style="height:200px;padding:0 0 0 0 !important;" data-type="{$data.video}"></div>
						</div>
				</div>
                 <div class="col-xs-12 col-md-12" style="margin-top:15px;padding:0px;text-indent:2em;font-size:16px;" >
                    <span>{$data['intro']}</span>
				</div>
                </div>
       
  </div>
  </div>

 <div class="container">

   <div class="row" style="margin-top:5px;">
       
                <div class="col-xs-4 col-md-4" style="margin-top:10px;" >
                    <a href="{:U('view',['id'=>$data['id'],'type'=>'content'])}" style="color:black;">
                    <img src="{$config_siteurl}statics/cu/Heritage/images/show-2.jpg" alt="" class="img-responsive" >
                    <span class="col-xs-12 col-md-4 view-name">历史起源</span>
                    </a>
                </div>

          <div class="col-xs-4 col-md-4" style="margin-top:10px;" >
                    <a href="{:U('view',['id'=>$data['id'],'type'=>'process'])}" style="color:black;">
                    <img src="{$config_siteurl}statics/cu/Heritage/images/show-3.jpg" alt="" class="img-responsive" >
                    <span class="col-xs-12 col-md-4 view-name">制作工艺</span>
                    </a>
                </div>
           <div class="col-xs-4 col-md-4" style="margin-top:10px;" >
                    <a href="{:U('view',['id'=>$data['id'],'type'=>'them'])}" style="color:black;">
                    <img src="{$config_siteurl}statics/cu/Heritage/images/show-4.jpg" alt="" class="img-responsive" >
                    <span class="col-xs-12 col-md-4 view-name">主题特色</span>
                    </a>
                </div>

     <div class="col-xs-6 col-md-4" style="margin-top:10px;" >
                    <a href="{:U('view',['id'=>$data['id'],'type'=>'heritage'])}" style="color:black;">
                    <img src="{$config_siteurl}statics/cu/Heritage/images/show-5.jpg" alt="" class="img-responsive" >
                    <span class="col-xs-12 col-md-4 view-name">非遗传人</span>
                    </a>
                </div>
     <div class="col-xs-6 col-md-4" style="margin-top:10px;" >
                    <a href="{:U('view',['id'=>$data['id'],'type'=>'intangible'])}" style="color:black;">
                    <img src="{$config_siteurl}statics/cu/Heritage/images/show-6.jpg" alt="" class="img-responsive" >
                    <span class="col-xs-12 col-md-4 view-name">非遗纵横</span>
                    </a>
                </div>                             
  </div>
  </div>
  <script src="{$config_siteurl}statics/cu/Heritage/js/jquery-1.10.1.min.js"></script>
<script type="text/javascript" src="{$config_siteurl}statics/cu/layer/layer.js"></script>

    <if condition="$data['video'] neq '' ">
<script type="text/javascript" src="http://player.youku.com/jsapi"></script>

	<script type="text/javascript">
		player = new YKU.Player('youkuplayer',{
			styleid: '0',
			client_id: '{:C('YOUKU_CLIENT_ID')}',
			vid: '{$data.video}',
			newPlayer: true
		});
	</script>
    </if>
    </block>