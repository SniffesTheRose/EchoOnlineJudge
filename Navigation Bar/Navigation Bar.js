// JavaScript Document

$(document).ready(function(){
	var win = $(window).height();
	var height = $("#Left_Naviqation").height();
	
	document.getElementById("Left_Naviqation").style.top = (win - height) / 2 + "px";
	
	$("div.Left_Naviqation").mouseenter(function() {
		$("div.Left_Profile_Text").fadeIn(300);
		$("p.Left_Naviqation_Label_Text").fadeIn(300);
	});
	
	$("div.Left_Naviqation").mouseleave(function() {
		$("div.Left_Profile_Text").stop();
		$("p.Left_Naviqation_Label_Text").stop();
		
		$("div.Left_Profile_Text").fadeOut(300);
		$("p.Left_Naviqation_Label_Text").fadeOut(300);
	});
	
	$(window).resize(function(){
		var win = $(window).height();
		
		document.getElementById("Left_Naviqation").style.top = (win - height) / 2 + "px";
	});
});