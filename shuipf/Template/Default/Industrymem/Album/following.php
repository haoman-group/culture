<?php if (!defined('SHUIPF_VERSION')) exit(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>关注的照片 - {$Config.sitename}</title>
<template file="Member/Public/global_js.php"/>
<script type="text/javascript" src="{$model_extresdir}js/common.js"></script>
<link href="/favicon.ico" rel="shortcut icon">
<link type="text/css" href="{$model_extresdir}css/core.css" rel="stylesheet" />
<link rel="stylesheet" type="text/css" href="{$model_extresdir}css/common.css" />
<link type="text/css" href="{$model_extresdir}css/user.css" rel="stylesheet" media="all" />
</head>
<body>
<template file="Member/Public/homeHeader.php"/>
<div class="user">
  <div class="user_center">
    <template file="Member/Public/homeUserMenu.php"/>
    <div class="user_main">
      <div class="uMain_content">
        <div class="main_nav">
          <ul>
            <li class="me"><a href="{:U("Album/album")}">我的照片</a></li>
            <li class="fond"><a href="{:U("Album/praise")}">喜欢的照片</a></li>
            <li class="friend"><a class="on" href="{:U("Album/following")}">好友的照片</a></li>
          </ul>
          <div class="action"><a href="{:U("Album/imageadd")}">上传照片</a></div>
        </div>
        <div class="main">
          <div id="tooltip" class="refresh"><a id="refresh" class="eda" type="0" cid="4" href="javascript:;;" title="查看帮助"> </a></div>
        </div>
        <ul id="imageList" class="image_following masonry">
          <if condition=" empty($following) ">
          <div class="nothing">您的好友暂时还没有照片啊！</div>
          </if>
          <volist name="following" id="vo">
          <li class="imageBlock masonry-brick">
            <div class="box">
              <a href="{:UM('Home/album',array('userid'=>$vo['userid'],'id'=>$vo['id']))}" name="{$vo.filename}" target="_blank"><img src="{$vo.thumb}" width="{$vo.thumb_width}" height="{$vo.thumb_height}"></a>
              <div class="name">
                <a class="fb_f" target="_blank" href="{:UM('Home/index',array('userid'=>$vo['userid']))}">{$vo.username}</a>
                <span>{$vo.uploadtime|format_date}</span>
              </div>
              <div class="info"><span id="praiseCount{$vo.id}">{$vo.love}人喜欢</span><span id="replyNum{$vo.id}" class="last">{$vo.plsum}人评论</span></div>
            </div>
          </li>
          </volist>
        </ul>
        <div id="imgLoading" class="album_loading"></div>
        <div class="page" >
              {$Page}
        </div>
      </div>
    </div>
  </div>
<template file="Member/Public/homeFooter.php"/>
</div>
<script type="text/javascript" src="{$model_extresdir}js/jquery.waterfall.js"></script>
<script type="text/javascript">
var imgLoaded = {
    uid: 0,
    page: 1,
	load:false,
    init: function (obj, page) {
	    imgLoaded.page = page;
        $(obj).waterfall({
			columnCount:3,
			isResizable:false, // 自适应浏览器宽度, 默认false
			isAnimated:true, // 元素动画, 默认false
			Duration:500,// 动画时间
			Easing:'swing',// 动画效果, 配合 jQuery Easing Plugin 使用
			endFn:function(){
				imgLoaded.load = true;
			}
		});
		$(window).scroll(function () {
			if(imgLoaded.load == false){
				return false;
			}
		   var winH = $(window).height();
		   var pageH = $(document).height(); //页面总高度   
		   var scrollT = $(window).scrollTop(); //滚动条top   
		   var scrollWeizi = (pageH-winH-scrollT)/winH;
		   if(scrollWeizi<0.03){
				imgLoaded.page ++;
				imgLoaded.load = false;
				$.ajax({
					type: "GET",
					dataType:'json',
					//async:false,
					url: _config['domainSite']+'index.php?g=Member&m=Album&a=following&page='+imgLoaded.page,
					success: function(data){
						if( data.totalpages < imgLoaded.page ){
							imgLoaded.load = false;
							$.tipMessage('已经没有新的照片！', 1, 2000);
							return ;
						}
						var html = '';
						$.each(data.data,function(i,v){
							html += '<li class="imageBlock masonry-brick">\
											<div class="box">\
											  <a href="'+v.url+'" name="'+v.filename+'" target="_blank"><img src="'+v.thumb+'" width="'+v.thumb_width+'" height="'+v.thumb_height+'"></a>\
											  <div class="name">\
												<a class="fb_f" target="_blank" href="'+v.home+'">'+v.username+'</a>\
												<span>'+v.uploadtime+'</span>\
												<div class="clear"></div>\
											  </div>\
											  <div class="info">\
											     <span id="praiseCount'+v.id+'">'+v.love+'人喜欢</span><span id="replyNum'+v.id+'" class="last">'+v.plsum+'人评论</span>\
											  </div>\
											</div>\
										  </li>';
						});
						$(obj).append(html).waterfall({
                            isAnimated:true,
							endFn:function(){
								imgLoaded.load = true;
							}
						});
					}
				});
		   }
		});   
    }
}
	imgLoaded.init('#imageList', {$pages});
	libs.spaceInit();
</script>
</body>
</html>