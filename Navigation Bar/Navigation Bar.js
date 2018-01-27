// JavaScript Document
$(document).ready(function(){
	var win = $(window).height();
	var height = $("#Left_Naviqation").height();
	
	document.getElementById("Left_Naviqation").style.top = (win - height) / 2 + "px";
	
	$("div.Left_Profile_Image_Container").mouseenter(function(e) {
		$("#user").stop().animate({
			top:"-15px",
			left:"-30px",
			width:"80px"
		});
		$("#badge").stop().animate({
			top:"-93px",
			left:"10.5px"
		});
        $("span.settings").stop().animate({
			opacity:'1',
			left:"110px"
		});
    });
	
	$("div.Left_Profile_Image_Container").mouseleave(function(e) {
		$("#user").stop().animate({
			top:"-15px",
			left:"-7.5px",
			width:"80px"
		});
		$("#badge").stop().animate({
			top:"-93px",
			left:"33px"
		});
        $("span.settings").stop().animate({
			opacity:'0',
			left:"40px"
		});
    });
	
	$("div.Left_Naviqation").mouseenter(function() {
		$("div.Left_Profile_Text").stop().animate({opacity:'1'});
		$("p.Left_Naviqation_Label_Text").stop().animate({opacity:'1'});
		$("#icon1").stop().fadeIn();
		$("#icon2").stop().fadeIn();
		$("#user").stop().animate({
			top:"-15px",
			left:"-7.5px",
			width:"80px"
		});
		$("#badge").stop().animate({
			top:"-93px",
			left:"33px"
		});
		$("span.settings").stop().animate({
			opacity:'0',
			left:"40px"
		});
	});
	
	$("div.Left_Naviqation").mouseleave(function() {
		$("div.Left_Profile_Text").stop().animate({opacity:'0'});
		$("p.Left_Naviqation_Label_Text").stop().animate({opacity:'0'});
		$("#icon1").stop().fadeOut(0);
		$("#icon2").stop().fadeOut(0);
		$("#user").stop().animate({
			top:"0px",
			left:"0px",
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