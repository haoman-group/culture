$(function(){
	var i = $('.presentation_left img').size();
	var c =0;
	function run (){
		c++;
		c= (c==i)?0:c;
		$('.presentation_left .show_banner img').eq(c).css({'display':'block'}).siblings('.presentation_left .show_banner img').css({'display':'none'});
	}
	// alert(i);
	timer = setInterval(run,5000);
})