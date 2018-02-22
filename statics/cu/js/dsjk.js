

$(function() {
	$(".active2").show();
	$(".menu-head").click(function() {
		$(this).parent().siblings("li").find(".menu-content").slideUp()
		$(this).parent().find('.menu-content').removeClass("menu_chioce");
		$(".menu_chioce").slideUp();
		$(this).parent().find(".menu-content").slideToggle();
		$(this).parent().find('.menu-content').addClass("menu_chioce");
		$(".menu-head i").attr("class", "icon pull-right glyphicon glyphicon-menu-down")
		$(this).find("i").attr("class", "icon pull-right glyphicon glyphicon-menu-right")
	})
})

$(function() {

	$(".active4 dd").show();
	$(".left-sidebar dt").click(function() {
		$(this).parent().siblings("dl").find("dd").slideUp()
		$(this).parent().find('dd').removeClass("menu_chioce");
		$(".menu_chioce").slideUp();
		$(this).parent().find("dd").slideToggle();
		$(this).parent().find('dd').addClass("menu_chioce");
		$(".left-sidebar dt i").attr("class", "pull-right glyphicon glyphicon-menu-right");
		$(this).parent().find("i").attr("class", "pull-right glyphicon glyphicon-menu-down");
	})
})



