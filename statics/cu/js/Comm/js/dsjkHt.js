document.write("<script language=\'javascript\' src='\js\/cookie.js \'><\/script>");



$(function() {
	var userName = getCookie("name");
	console.log(userName);
	switch(userName) {
		case "test001":
			$(".subLi").hide();
			$(".test001").show();
			break;
		case "test002":
			$(".subLi").hide();
			$(".test002").show();
			break;
		case "test003":
			$(".subLi").hide();
			$(".test003").show();
			break;
		case "test004":
			$(".subLi").hide();
			$(".test004").show();
			break;
		case "test005":
			$(".subLi").hide();
			$(".test005").show();
			break;
		case "test000":
			break;
	}
	$(".userName").html(userName)
})

document.writeln("<div class=\"alertDiv\">");
document.writeln("<div class=\"title\">消息<button type=\"button\" class=\"close\"><span>&times;</span><span class=\"sr-only\">Close</span></button></div>");
document.writeln("<div class=\"main\">");
document.writeln("您有<span class=\"text-red\">1</span>个文件需要审核，<a href=\"dsjkht-index.html\" class=\"text-red\">点击查看</a>");
document.writeln("</div>");
document.writeln("</div>")
$(function(){
	$(".alertDiv").animate({bottom:"0px"},800);
	$(".alertDiv .close").click(function(){
		$(".alertDiv").animate({bottom:"-225px"},800);
	})
})