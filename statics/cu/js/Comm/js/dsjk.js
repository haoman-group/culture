// $(function() {
// 	$(".active2").show();
// 	$(".menu-head").click(function() {
// 		$(this).parent().siblings("li").find(".menu-content").slideUp()
// 		$(this).parent().find('.menu-content').removeClass("menu_chioce");
// 		$(".menu_chioce").slideUp();
// 		$(this).parent().find(".menu-content").slideToggle();
// 		$(this).parent().find('.menu-content').addClass("menu_chioce");
// 		$(".menu-head i").attr("class", "icon pull-right glyphicon glyphicon-menu-down")
// 		$(this).find("i").attr("class", "icon pull-right glyphicon glyphicon-menu-right")
// 	})
// })

$(function() {
    //展开当前菜单
    $(".active4 dd").show();
    $(".active4 dt").find("i").removeClass("glyphicon-menu-right").addClass("glyphicon-menu-down");
    //菜单的点击事件

    $(".left-sidebar dt").click(function() {
        // console.log($(this).siblings("dd:visible").length);
        var ddlength = $(this).siblings("dd:visible").length;
        // console.log(ddlength);
        if(ddlength !== 0){
            // console.log($(this).find("i"));
            $(this).find("i").removeClass("glyphicon-menu-down").addClass("glyphicon-menu-right");
            // console.log($(this).find("i"));
        }else{
            // console.log($(this).find("i"));
            $(this).find("i").removeClass("glyphicon-menu-right").addClass("glyphicon-menu-down");
            // console.log($(this).find("i"));
        }
        $(this).parent().siblings("dl").find("dd").slideUp();
        $(this).parent().siblings("dl").find("dt").find("i").removeClass("glyphicon-menu-down").addClass("glyphicon-menu-right");
        $(this).parent().find('dd').removeClass("menu_chioce");
        $(".menu_chioce").slideUp();
        $(this).parent().find("dd").slideToggle();
        // $(this).parent().find('dd').addClass("menu_chioce active3");
        // $(".left-sidebar dt i").attr("class", "pull-right glyphicon glyphicon-menu-right");
        // $(this).parent().find("i").attr("class", "pull-right glyphicon glyphicon-menu-down");
        // $(this).ToggleClass('');
        
    })


})