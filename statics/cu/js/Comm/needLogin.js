;$(document).ready(function(){
	// $.ajax({
	// 	type: "POST",
	// 	url: "Api/UserController/checklogin",
	// 	data: "",
	// 	dataType: "json",
	// 	success: function(result){
	// 		console.log(result.data);
	// 	}
	// })
	// $(".needlogin").click(function(e){
	// 	if($.cookie ){
	// 		if (!!$.cookie("gs1_spf_userid")){
	// 			return true;
	// 		}
	// 		else{
	// 			if(typeof(layer)!="undefined"){
	// 				layer.open({
	// 					type:2,
	// 					title: false,
	// 					closeBtn: 1,
	// 					scrollbar: false,
	// 					area: ['360px','380px'],
	// 					shadeClose: true,
	// 					content: ["/Member/Buyer/loginpop","no"],
	// 					end: function(){
	// 						if(!!$.cookie("gs1_spf_userid")){
	// 							e.target.click();
	// 						}
	// 					}
	// 				});
	// 				e.stopImmediatePropagation();
	// 				return false;
	// 			}
	// 			else{
	// 				window.location = "/member/buyer/login";
	// 				return false;
	// 			}
	// 		}
	// 	}
	// 	else{
	// 		return true;
	// 	}
	// });


	$(".zonecloud").click(function(){
		layer.open({
			type: 2,
			title: false,
			closeBtn: 1
		});
	})
})