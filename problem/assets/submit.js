// JavaScript Document

var xmlHttp = null;	
var editor = null;
var sub_flag = false;

$(document).ready(function(e) {
	editor = CodeMirror.fromTextArea(document.getElementById("code"), {
		lineNumbers: true,
		
		mode:"text/x-c++src",
		
		//缩进空格数
		indentUnit:4,
		
		//tab替换
		indentWithTabs:true,
		
		//代码折叠
		lineWrapping:true,
		foldGutter: true,
		gutters:["CodeMirror-linenumbers", "CodeMirror-foldgutter"],
		
		//括号匹配
		matchBrackets:true,
		
		extraKeys: {"Ctrl-Space": "autocomplete"}
	});  
	
	editor.setSize("suto", "300px");
	
	$(".CodeMirror-scroll").hover(function(){
		$(this).get(0).style.cursor = "text";
	});
	
	$("#submit").click(function() {
		
		if (sub_flag)
			return;
		
		sub_flag = true;
		document.getElementById("submit").disabled = true;
		var postData = "user=" + encodeURIComponent(getCookie("UserID")) + "&pid=" + encodeURIComponent(GetQueryString("id")) + "&code=" + encodeURIComponent(editor.getValue());

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