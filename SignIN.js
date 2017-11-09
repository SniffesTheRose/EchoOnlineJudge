// JavaScript Document

var UserName;

var xmlHttp = null;

function Submit() {
	var Name, Password;
	Name = $("#name").val();
	Password = $("#password").val();
	xmlHttp = GetXmlHttpObject();	
	var url = "Respond/DataBaseForSignIN.php";
	url += "?name=" + encodeURIComponent(Name);
	url += "&password=" + encodeURIComponent(Password);
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
			window.location = "index.php";
		} else
			alert(ret);
	}
}