require.config({
    baseUrl:"/statics/js",
    paths:{
        "Turn":"turn.min"
    },
	shim:{
		"Turn":{
			deps: ['jquery']
		}
	}
})
requirejs(['jquery','Turn'],function($,Turn){
	//参数设置
   	$("#flipbook").turn({
		acceleration:true,		//是否开启硬件加速，触摸屏设备必须开启，默认true
		direction:"ltr",		//定义翻书的方向, 默认为ltr,即从左向右，或者相反的rtl。
		display:"single",		//定义单页或者双页显示。可选 single,默认double。
		duration:600,			//翻页过度时间。
		gradients:true,			//开启或关闭翻页的渐变和阴影效果
		elevation: 0,			//翻页时的高度
		page:1,					//初始化时的页码
		pages:15,				//页面总数，默认为$("#flipbook").children().length , 如果页面超过实际页数，请使用addPage方法动态添加。
		turnCorners:"bl,br",	//翻页角度设置，可能的值：bl,br 或 tl,tr 或 bl,tr(b=bottom,t=top,l=left,r=right)
		width: '100%',				//宽度
		height: '700px',			//高度
		autoCenter: true, 		//自动居中，控制 margin-left属性，默认false
		when:{}   				//设置自定义监听事件
	});
	//属性值 返回当前的参数设置的值
	$("#flipbook").turn("animating");	
	// $("#flipbook").turn("direction");
	$("#flipbook").turn("display");
	// $("#flipbook").turn("disabled");
	$("#flipbook").turn("page");
	var pages = $("#flipbook").turn("pages");
	console.log(pages);
	$("#flipbook").turn("size"); 	//同时返回width和height两个属性
	$("#flipbook").turn("view");	//获取当前显示内容
	// $("#flipbook").turn("zoom");	//获取缩放比例

	//绑定键盘方向键进行翻页
	$(window).bind('keydown', function(e){	
		if (e.keyCode==37)
			$('#flipbook').turn('previous');
		else if (e.keyCode==39)
			$('#flipbook').turn('next');
			
	});
})