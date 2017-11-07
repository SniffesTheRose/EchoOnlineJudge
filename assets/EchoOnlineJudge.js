// JavaScript Document

$(document).ready(function(e) {
	var width = $(window).width() - 140;
	$("div.Title").width(width);
	$("#Title_Banner").width(width);
	$("#Secound_Title_Banner").width(width);
	$("div.main").width(width - 200);
	
	$("div.main").animate({top:'+=30px'}, 0);
	$("div.main").animate({
		top:'-=30px',
		opacity:'1'
	}, 500);
});

$(window).resize(function(){
	var width = $(window).width() - 140;
	$("div.Title").width(width);
	$("#Title_Banner").width(width);
	$("#Secound_Title_Banner").width(width);
	$("div.main").width(width - 200);
});


function GetQueryString(name) {
     var reg = new RegExp("(^|&)"+ name +"=([^&]*)(&|$)");
     var r = window.location.search.substr(1).match(reg);
     if (r != null)
	 	return unescape(r[2]);
	return null;
}

function setCookie(name, value, expiredays) {
	var exdate = new Date();
	exdate.setDate(exdate.getDate() + expiredays);
	document.cookie = name + "=" + escape(value) + ((expiredays == null) ? "" : ";expires=" + exdate.toGMTString());
}

function getCookie(c_name) {
	if (document.cookie.length > 0) {
		c_start = document.cookie.indexOf(c_name + "=");
		if (c_start != -1) {
			c_start = c_start + c_name.length + 1;
			c_end = document.cookie.indexOf(";", c_start);
			if (c_end == -1)
				c_end = document.cookie.length;
			return unescape(document.cookie.substring(c_start, c_end));
		} 
	}
	
	return ""
}

String.prototype.startWith=function(str){ 
	var reg = new RegExp("^" + str); 
	return reg.test(this); 
}  

String.prototype.endWith=function(str){
	var reg = new RegExp(str + "$");
	return reg.test(this);
}

function GetXmlHttpObject() {
	var xmlHttp=null;
	
	try {
		xmlHttp=new XMLHttpRequest();
	} catch (e) {
		try {
			xmlHttp=new ActiveXObject("Msxml2.XMLHTTP");
		} catch (e) {
			xmlHttp=new ActiveXObject("Microsoft.XMLHTTP");
		}
	}
	
	return xmlHttp;
}