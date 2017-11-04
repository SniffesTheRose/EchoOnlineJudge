// JavaScript Document

var xmlHttp = null;

var UserName;

function Email(str) {
	if (str.search(/^\w+((-\w+)|(\.\w+))*\@[A-Za-z0-9]+((\.|-)[A-Za-z0-9]+)*\.[A-Za-z0-9]+$/) == -1)
		$("#EmailDiv").attr("class", "form-group has-error");
	else
		$("#EmailDiv").attr("class", "form-group");
}

function Submit() {
	var Name, Password, Email;
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
	url += "?name=" + Name;
	url += "&password=" + Password;
	url += "&email=" + Email;
	url += "&sid=" + Math.random();

	UserName = Name;

	xmlHttp.onreadystatechange=stateChanged;
	xmlHttp.open("GET", url, true);
	xmlHttp.send(null);
}

function stateChanged() {
	if (xmlHttp.readyState == 4 || xmlHttp.readyState == "complete") {
		var ret = xmlHttp.responseText;

		if(ret.startWith("Pass")) {
			var UserID = ret.substr(ret.indexOf("=") + 1);
			setCookie("UserName", encodeURI(UserName), 7);
			setCookie("UserID", UserID, 7);
			window.location = "Welcome.php?name=" + UserName;
		} else
			alert(ret);
	}
}