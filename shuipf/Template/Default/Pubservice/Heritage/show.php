<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="{$config_siteurl}statics/cu/css/base.css" />
	<link rel="stylesheet" href="{$config_siteurl}statics/cu/css/public-service.css" />
    <link rel="stylesheet" href="{$config_siteurl}statics/cu/Heritage/css/common.css">
    <link rel="stylesheet" href="https://cdn.bootcss.com/font-awesome/4.7.0/css/font-awesome.css">
      <link rel="stylesheet" href="{$config_siteurl}statics/cu/bootstrap/bootstrap.min.css" />
    <link rel="stylesheet" href="{$config_siteurl}statics/cu/Heritage/css/common.css">
    <title>山西文化云</title>
</head>
<body>
    <div class="wap">
    <header>
        <template file="Pubservice/Common/_top"/>
    </header>
    <article class="show_article" style="background: url('<?= empty($data['background'])?'/statics/cu/Heritage/images/showbg1.jpg':$data['background']?>') no-repeat 0 0;">
        <div class="container">
            <div class="show_center">
                <div class="info">
                    <div class="info_left">
                       <div class="video clearfix" style="height:480px;width:856px;">
				<if condition="$data['video'] neq '' ">
				<div class="video-left">
					
					<!--<iframe height=666 width=880 src='http://player.youku.com/embed/{$data['voide']}' frameborder=0 'allowfullscreen'></iframe>-->
                        <!-- <div class="embed-responsive embed-responsive-4by3"> -->
                        <div class="">
							<div id="youkuplayer" style="width:856px;height:480px" data-type="{$data.video}"></div>
						</div>
				</div>
				<else/>
				    <!-- <img src="{$config_siteurl}statics/cu/Heritage/images/index-2.jpg" style="width:856px;height:480px"> -->
				</if>
				
			</div>
                    </div>
                    <div class="info_right" style="height:480px;overflow:auto;">
                        <div class="tit">
                            <p>{$data.title} <span style="background-color:red;color:#fff;font-size:12px;padding:0 5px 0 5px;line-height:13px;border-radius:2px;">第{$data.id}期</span></p>
                            <span style="font-size:14px;">{$data.updatetime|date="Y-m-d",###}发布</span>
                        </div>
                        <div class="textbox" style='min-height:405px;'>
                            {$data.intro}
                        </div>
                    </div>
                </div>
                <div><img src="{$config_siteurl}statics/cu/Heritage/images/show-1.jpg" alt=""></div>
                <div class="div_cell">
                    <ul class="ul_cell_small clearfix">
                        <li><a href="{:U('view',['id'=>$data['id'],'type'=>'content'])}" target="_blank"><img src="{$config_siteurl}statics/cu/Heritage/images/show-2.jpg" alt=""><span>历史起源</span></a></li>
                        <li><a href="{:U('view',['id'=>$data['id'],'type'=>'process'])}" target="_blank"><img src="{$config_siteurl}statics/cu/Heritage/images/show-3.jpg" alt=""><span>制作工艺</span></a></li>
                        <li><a href="{:U('view',['id'=>$data['id'],'type'=>'theme'])}" target="_blank"><img src="{$config_siteurl}statics/cu/Heritage/images/show-4.jpg" alt=""><span>主题特色</span></a></li>
                    </ul>
                    <ul class="ul_cell_big clearfix">
                        <li><a href="{:U('view',['id'=>$data['id'],'type'=>'heritage'])}" target="_blank"><img src="{$config_siteurl}statics/cu/Heritage/images/show-5.jpg" alt=""><span>非遗传人</span></a></li>
                        <li><a href="{:U('view',['id'=>$data['id'],'type'=>'intangible'])}" target="_blank"><img src="{$config_siteurl}statics/cu/Heritage/images/show-6.jpg" alt=""><span>非遗纵横<!--/非遗万象--></span></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </article>
    <template file="Pubservice/Common/_foot"/>
			<template file="Pubservice/Common/checklogin"/>
    </div>
</body>
</html>
<script src="{$config_siteurl}statics/cu/Heritage/js/jquery-1.10.1.min.js"></script>
<script type="text/javascript" src="{$config_siteurl}statics/cu/layer/layer.js"></script>
<script>
    $(function(){
        $(".menuadiv a").hover(
            function(){
            $(".yunindexbanbox img").eq($(".menuadiv a").index(this)).show().siblings().hide();
            $(this).siblings().removeClass('on');
        },function(){
            $(this).addClass('on');
        })
    })
    function citylist(){
        layer.open({
        title:'请选择地区',
        shadeClose:true,
        area: ['810px', '520px'],
        type: 2, 
        content: "/Pubservice/Index/zonecloud"
        });
    }
</script>
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
