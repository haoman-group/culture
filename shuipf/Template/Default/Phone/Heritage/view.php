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

 <div class="container">

   <div class="row" style="margin-top:5px;">
       
        <div class="col-xs-12 col-md12" style="margin-top:10px;padding-left:15px;" >
                 <h2 style="text-align:center;"><if condition="$_GET['type'] eq 'content' ">历史起源<elseif condition="$_GET['type'] eq 'process' "/>制作工艺 <elseif condition="$_GET['type'] eq 'theme' "/>主题特色
            <elseif condition="$_GET['type'] eq 'heritage' "/>非遗传人<else/>非遗纵横</if></h2>
           <h3 style="text-align:center;margin-top:30px;"> {$data['title']}</h3>
           <span style="word-break:break-all;text-indent:2em;"><if condition="$_GET['type'] eq 'content' ">{$data['content']}<elseif condition="$_GET['type'] eq 'process' "/>{$data['process']} <elseif condition="$_GET['type'] eq 'theme' "/>{$data['theme']}
            <elseif condition="$_GET['type'] eq 'heritage' "/>{$data['heritage']}<else/>{$data['intangible']}</if></span>
                </div>

          
           

   
                                
  </div>
  </div>
  <script src="{$config_siteurl}statics/cu/Heritage/js/jquery-1.10.1.min.js"></script>
<script type="text/javascript" src="{$config_siteurl}statics/cu/layer/layer.js"></script>

    <script>
        var imgs = document.getElementsByTagName('img');

        for(var i in imgs)
        {   
            var img = imgs[i];
            $('img').addClass('img-responsive');
           
        }
    </script>
    </block>