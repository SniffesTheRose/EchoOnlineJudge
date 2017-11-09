// JavaScript Document

$(document).ready(function(){
	var win = $(window).height();
	var height = $("#Left_Naviqation").height();
	
	document.getElementById("Left_Naviqation").style.top = (win - height) / 2 + "px";
	
	$("div.Left_Naviqation").mouseenter(function() {
		$("div.Left_Profile_Text").stop().animate({opacity:'1'});
		$("p.Left_Naviqation_Label_Text").stop().animate({opacity:'1'});
		$("#user").stop().animate({
			top:"-15px",
			width:"80px"
		});
		$("#badge").stop().animate({
			top:"-95px",
			left:"38px"
		});
	});
	
	$("div.Left_Naviqation").mouseleave(function() {
		$("div.Left_Profile_Text").stop().animate({opacity:'0'});
		$("p.Left_Naviqation_Label_Text").stop().animate({opacity:'0'});
		$("#user").stop().animate({
			top:"0px",
			width:"55px"
		});
		$("#badge").stop().animate({
			top:"-60px",
			left:"20px"
		});
	});
	
	$(window).resize(function(){
		var win = $(window).height();
		
		document.getElementById("Left_Naviqation").style.top = (win - height) / 2 + "px";
	});
});