// JavaScript Document

var xmlHttp = null;

var UserName;

var Name, Password, Email;
$(document).ready(function(e) {
	$("#submit").click(function() {
		var key = $("#key").val();
		
		url = "Respond/DataBaseForSignUP.php";
		url += "?name=" + encodeURIComponent(Name);
		url += "&password=" + encodeURIComponent(Password);
		url += "&email=" + encodeURIComponent(Email);
		url += "&key=" + key;
		url += "&type=2";
		url += "&sid=" + Math.random();
		
		xmlHttp.onreadystatechange=stateChanged;
		xmlHttp.open("GET", url, true);
		xmlHttp.send(null);
	}); 
});

function Email(str) {
	if (str.search(/^\w+((-\w+)|(\.\w+))*\@[A-Za-z0-9]+((\.|-)[A-Za-z0-9]+)*\.[A-Za-z0-9]+$/) == -1)
		$("#EmailDiv").attr("class", "form-group has-error");
	else
		$("#EmailDiv").attr("class", "form-group");
}

function Submit() {
	Name = $("#name").val();
	Password = $("#password").val();
	Email = $("#email").val();
	
	if (Name == '' || Password == '' || Email == '') {
		alert ("输入不允许为空");
		return;
	}
	
	if ($("#repassword").val() != Password){
		alert ("密码不匹配");
		return;
	}
	
	if ($("#EmailDiv").hasClass("has-error")) {
		alert ("不符合要求的邮箱格式");
		return;
	}
	
	xmlHttp = GetXmlHttpObject();	
	var url = "Respond/DataBaseForSignUP.php";
	url += "?name=" + encodeURIComponent(Name);
	url += "&password=" + encodeURIComponent(Password);
	url += "&email=" + encodeURIComponent(Email);
	url += "&type=1";
	url += "&sid=" + Math.random();

	UserName = Name;

	xmlHttp.onreadystatechange=stateChanged;
	xmlHttp.open("GET", url, true);
	xmlHttp.send(null);
}

function stateChanged() {
	if (xmlHttp.readyState == 4 || xmlHttp.readyState == "complete") {
		var ret = xmlHttp.responseText;

		if (ret == "use a key to pass the request")
			$("#show").click();
		else if(ret.startWith("Pass")) {
			var UserID = ret.substr(ret.indexOf("=") + 1);
			setCookie("UserName", encodeURI(UserName), 7);
			setCookie("UserID", UserID, 7);
			window.location = "Welcome.php?name=" + encodeURIComponent(UserName);
		} else if (ret == "Incorrect key") {
			$("#show").click();
			document.getElementById("myModalLabel").innerHTML = "错误的验证码"
		} else
			alert(ret);
	}
}