// JavaScript Document
function Enter(id) {
	$("#Button_Line" + id).css("background-color", "rgb(70,144,208)");
	$("#Button" + id).css("background-color", "rgb(244,244,244)");
};

function Leave(id) {
	$("#Button_Line" + id).css("background-color", "rgb(255,255,255)");
	$("#Button" + id).css("background-color", "rgb(255,255,255)");
};