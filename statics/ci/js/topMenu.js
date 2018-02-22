
// top部分统一布局
//$(function(){
//	$("body").append(
//		'<div id="footer">'+
//  		'<div class="container">'+
//      		'<ul class="clearfix">'+
//          		'<li><a href="#">关于我们</a></li><span>|</span>'+
//          		'<li><a href="#">联系我们</a></li><span>|</span>'+
//          		'<li><a href="#">免费申明</a></li><span>|</span>'+
//          		'<li><a href="#">广告服务</a></li><span>|</span>'+
//          		'<li><a href="#">邮箱</a></li><span>|</span>'+
//          		'<li><a href="#">管理登录</a></li>'+
//      		'</ul>'+
//      		'<p>12321 | 12300 | 12818 | 网络违法犯罪举报网站 | 违法与不良信息举报中心</p>'+
//      		'<p>总访问量：1532846人次 总浏览量：5672745人次 开始统计日期：2009-09-19</p>'+
//      		'<p>ICP备案号：晋ICP备10201904号</p>'+
//      		'<p>主管：中共山西省委宣传部 山西省文化厅</p>'+
//      		'<p>主办：山西省文化产业发展中心</p>'+
//      		'<p>地址：中国-太原市桃园北路50号新闻大楼二层（邮编：030002）</p>'+
//      		'<p>电话：0351-4084258</p>'+
//      		'<p>邮编：sxwhcyw@163.com</p>'+
//  		'</div>'+
//		'</div>'
//		);
//
//		$("head").append(
//			'<link rel="Shortcut Icon" href="/culture_industry/favicon.ico" />'
//		);
//
//		
// 
//});
//检查用户是否登录
function checked_login(uid){
       if (!uid) {
       	layer.msg('请先登录',{
        end: function(){
            window.location.href = "/index.php?g=Industry&m=Public&a=login";
        	}
    	});
    	return false;
       }else{
       	return true;
       }
}

$(function() {
	$(".top_menuItemDiv").hide();
	$(".top_menuItem").hover(function() {
		$(this).find(".top_menuItemDiv").stop(true, true);
		$(this).find(".top_menuItemDiv").slideDown();
		$(this).find(".top_menuItemA").addClass("active")

	}, function() {
		$(this).find(".top_menuItemDiv").stop(true, true);
		$(this).find(".top_menuItemDiv").slideUp();
		$(this).find(".top_menuItemA").removeClass("active")
	});
})