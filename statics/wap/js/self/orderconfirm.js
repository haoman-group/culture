$(document).ready(function(){
	



	$(".uladdform .hassub").click(function(){
		$("#"+$(this).attr("data-selpage")).addClass("subselpageon");
	})

	$(".subselpage h5 .back").on("click",function(){
		$(this).parent().parent().removeClass("subselpageon");
	})

	$("[data-role='subseldatas'] li").on("click",function(){

		var $subselpage= $(this).closest(".subselpage");
		var $lidatafor = $("[data-selpage='"+$subselpage.attr("id")+"']");
		$lidatafor.find("input:hidden").val($(this).attr("data-text")).siblings("label").html($(this).attr("data-text"));
		$subselpage.removeClass("subselpageon");
	})

	$(".selpnotice .tags span a").on("click",function(){
		if(!$(this).hasClass("on")){
			$(this).addClass("on").siblings().removeClass("on");
		}
		else{
			$(this).removeClass("on");
		}
	})

	$(".selpnotice .tags>a").on("click",function(){
		if(!$(this).hasClass("on")){
			$(this).addClass("on");
		}
		else{
			$(this).removeClass("on");
		}
	})

	$(".selpnotice .btn").on("click",function(){
		var nstr="";
		var nar=[];
		$(".selpnotice .tags .on").each(function(i,v){
			nar.push($(v).html());
		})
		if($(".selpnotice .noticearea").val().length>0){
			nar.push($(".selpnotice .noticearea").val());
		}
		nstr = nar.join(",");
		$("[data-selpage='selpnotice']").find("input:hidden").val(nstr).siblings("label").html(nstr);
		$(".selpnotice").removeClass("subselpageon");
	})
	
})