$(document).ready(function(){
	
	var fk,companyId,companyName;
	var curTagId,curTagName;
	
	var strMap;
	var map = {};
	var totalNum = 0,totalPrice = 0;
	
	
	
	
	//显示购物车
	strMap = sessionStorage.getItem('map')
	if(strMap&&strMap.length>0){
		map = JSON.parse(strMap);
		if(strMap.length>2){
			$(".prodshowfooter").addClass("hascartfooter");
		}
		freshShopCart();
	}
	
	//根据缓存数据更新购物车
	function freshShopCart(){
		totalNum = 0;
		totalPrice = 0;
		for(var prop in map){
		    if(map.hasOwnProperty(prop)){
		    	var item = map[prop];
	    		totalNum += item.num;
		    	totalPrice += item.price * item.num;
		    }
		}
		totalPrice=totalPrice.toFixed(2);
		if(totalNum >0){
			$(".prodshowfooter").hasClass("hascartfooter")||$(".dcfooter").addClass("hascartfooter");
		}
		else{
			$(".prodshowfooter").hasClass("hascartfooter")&&$(".dcfooter").removeClass("hascartfooter");
		}
		
		$(".dcfooter strong i").html(totalNum);
		$(".dcfooter span").html("￥"+totalPrice);
		sessionStorage.setItem('map', JSON.stringify(map));
	}
	
	
	
	if($(".prodshowcon").length >0){
	    var prodshowSwiper= new Swiper(".swiper-container",{
	        autoplay : 3000,
	        speed : 800,
	        loop : true,
	        pagination : '.swiper-pagination'
	    })
	}
	
	//点餐栏上或者购物车栏上点击+-号
	$(".dccon").on("click","cite strong",function(e){
        var $cite = $(this).parent();
		var id = $cite.data("id");
		var name = $cite.data("name");
		var price = $cite.data("price");

		if($(this).index()>1){//点击+号
			if(map[id]==null){
				var item = {};
				item.id = id;
				item.name = name;
				item.price = price;
				item.num = 1;
				map[id] = item;
				$(this).parent().addClass("on");
			}else{
				var item = map[id];
				item.num = item.num +1;
			}
			$(this).siblings("span").html(item.num);
			$($('.bdrt [data-id="'+id+'"]')[0]).siblings("span").html(item.num);
			freshShopCart();
		}
		else{
			if(map[id]!=null){
				var item = map[id];
				if(item.num>0){
					item.num = item.num -1;
					$(this).siblings("span").html(item.num);
					$($('.bdrt [data-id="'+id+'"]')[0]).siblings("span").html(item.num);
					if(item.num==0){
						$(this).parent().removeClass("on");
						$($('.bdrt [data-id="'+id+'"]')[0]).parent().removeClass("on");
						delete map[id];
					}else{
						
					}
					freshShopCart();
				}
			}
		}

		e.stopPropagation();
	    e.preventDefault();
	    return false;
	});
	
	//显示购物车
	$(".dcfooter strong").on("click",function(){
		
		var arr=[];
		
		for(var prop in map){
		    if(map.hasOwnProperty(prop)){
		    	var item = map[prop];
		    	
		    	arr.push('<li>');
		    	arr.push('<div class="name">');
		    	arr.push('<strong>'+item.name+'</strong>');
		    	arr.push('</div>');
		    	arr.push('<div class="price">￥'+item.price+'</div>');
		    	arr.push('<cite class="on" data-id="'+item.id+'" data-name="'+item.name+'" data-price="'+item.price+'" ><strong ></strong><span>'+item.num+'</span><strong></strong></cite>');
		    	arr.push('</li>');
		    	arr.push('');
		    	arr.push('');
		    }
		}
		$("#ul_dishes").html(arr.join(""));
	
	    $(".popcart").toggleClass("popcarton");
	    if($(".popcart").hasClass("popcarton")){
	        $(".zhe").show().animate({"opacity":0.3},400);
	    }
	    else{
	        $(".zhe").animate({"opacity":0},400,function(){
	            $(".zhe").hide();
	        });
	    }
	});
	
	//清空购物车
	$(".aclearcart").on("click",function(){
		map = {};
		freshShopCart();
		$("#ul_dishes").html("");
		
		$.each($("cite span"),function(i,v){
			$(this).html("0");
			$(this).parent().removeClass("on");
		});
		$(".popcart").removeClass("popcarton");
		$(".zhe").animate({"opacity":0},400,function(){
            $(".zhe").hide();
        });
		$(".prodshowfooter").removeClass("hascartfooter");
	});
	
	//立即点单
	$(".foottoorder button").click(function(){
		sessionStorage.setItem('map', JSON.stringify(map));
		document.location = "orderconfirm.html";
	});
	
	//进店
	$(".toshop").click(function(){
		document.location = 'http://test.ruitaowang.com/wap/detail_business.html?companyId='+companyId;
	});
})

function showDetail(){
	document.location = 'prodshow.html';
}



$(window).scroll(function () {
    //已经滚动到上面的页面高度
    var scrollTop = $(this).scrollTop();
    //页面高度
    var scrollHeight = $(document).height();
    //浏览器窗口高度
    var windowHeight = $(this).height();
    //此处是滚动条到底部时候触发的事件，在这里写要加载的数据，或者是拉动滚动条的操作
    if (scrollHeight-scrollTop - windowHeight<100) {
        //dishes();
    }
});

var _hmt = _hmt || [];
(function() {
  var hm = document.createElement("script");
  hm.src = "https://hm.baidu.com/hm.js?84e5b4a1e302ec72e0c37601fa5ae08a";
  var s = document.getElementsByTagName("script")[0]; 
  s.parentNode.insertBefore(hm, s);
})();