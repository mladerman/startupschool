$(document).ready(function(){
	
	
	var math = function (){
		var half = $(window).height()/2,
			pos = half-(375/2);
		return pos;
	}
	$("#container").css('top',''+math()+'px');
	$(window).resize(function () {
		$("#container").css('top',''+math()+'px');
	});
	
	//reset
	$(".color_bar").css('left','-30px');
	$(".info_paine").css('left','-500px');
	var time = 500;
	
	$("#00").animate({
		left:'0'
	},time,function(){
		//next frame
		$("#01").animate({
			left:'30'
		},time,function(){
			//next frame
			$("#02").animate({
				left:'60'
			},time,function(){
				//next frame
				$("#03").animate({
					left:'90'
				},time,function(){
					//next frame
					$("#04").animate({
						left:'590'
					},time,function(){
						//next frame

					});
				});
			});
		});
	});
});