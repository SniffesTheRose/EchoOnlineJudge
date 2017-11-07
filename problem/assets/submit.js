// JavaScript Document

var xmlHttp = null;	
var editor = null;
var sub_flag = false;

$(document).ready(function(e) {
	editor = CodeMirror.fromTextArea(document.getElementById("code"), {
		lineNumbers: true,
		theme: "eclipse",
		
		//代码折叠
		lineWrapping:true,
		foldGutter: true,
		gutters:["CodeMirror-linenumbers", "CodeMirror-foldgutter"],
		
		//括号匹配
		matchBrackets:true,
		
		extraKeys: {"Ctrl-Space": "autocomplete"}
	});
	
	$(".CodeMirror-scroll").hover(function(){
		$(this).get(0).style.cursor = "text";
	});
	
	$("button").click(function() {
		if (sub_flag)
			return;
		
		sub_flag = true;
		var postData = "user=" + getCookie("UserID") + "&pid=" + $("button").eq(0).attr("id") + "&code=" + editor.getValue();

		xmlHttp = GetXmlHttpObject();	
		xmlHttp.open('post','/Respond/DataBaseForSubmit.php?rand='+Math.random(),true);
		xmlHttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
		xmlHttp.onreadystatechange=stateChanged;
		xmlHttp.send(postData);
	});
});

function stateChanged() {
	if (xmlHttp.readyState == 4 || xmlHttp.readyState == "complete") {
		var ret = xmlHttp.responseText;
		javascript:window.location = 'result.php?id=' + ret;
	}
}