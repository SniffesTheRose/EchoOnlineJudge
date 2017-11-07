// JavaScript Document

var xmlHttp;
var url;
var color;

$(document).ready(function(e) {
	url = '../Respond/DataBaseForResult.php?id=' + GetQueryString("id") + '&type=Evaluator&rand=';
	xmlHttp = GetXmlHttpObject();	
	xmlHttp.onreadystatechange = Evaluator;
	xmlHttp.open("GET", url + Math.random(), true);
	xmlHttp.send(null);
});

function sent() {
	xmlHttp.open("GET", url + Math.random(), true);
	xmlHttp.send(null);
}

function Evaluator() {
	if (xmlHttp.readyState == 4 || xmlHttp.readyState == "complete") {
		var ret = xmlHttp.responseText;
		
		if (ret == "Couldn't find the data" || ret == '')
			setTimeout(sent, 500);
		else {
			document.getElementById("Evaluator").innerHTML = "任务分配至 " + ret + " 评测集群";
			url = '../Respond/DataBaseForResult.php?id=' + GetQueryString("id") + '&type=Result&rand=';
			xmlHttp.onreadystatechange = Result;
			xmlHttp.open("GET", url + Math.random(), true);
			xmlHttp.send(null);
		}
	}
}

function Result() {
	if (xmlHttp.readyState == 4 || xmlHttp.readyState == "complete") {
		var ret = xmlHttp.responseText;
		
		if (ret == "Couldn't find the data" || ret == '')
			setTimeout(sent, 500);
		else {
			var html = '';
			if (ret == "1") {
				html = "Accepted";
				color = "(51,255,0)";
			} else if (ret == '2') {
				html = "Wrong Answer";
				color = "(255,51,0)";
			}
			
			document.getElementById("Result").innerHTML = "<span class=\"badge\" style=\"background-color:rgb" + color + "; font-size:15px\">" + html + "</span>";
			
			url = '../Respond/DataBaseForResult.php?id=' + GetQueryString("id") + '&type=Score&rand=';
			xmlHttp.onreadystatechange = Score;
			xmlHttp.open("GET", url + Math.random(), true);
			xmlHttp.send(null);
		}
	}
}

function Score() {
	if (xmlHttp.readyState == 4 || xmlHttp.readyState == "complete") {
		var ret = xmlHttp.responseText;
		
		if (ret == "Couldn't find the data" || ret == '')
			setTimeout(sent, 500);
		else {
			document.getElementById("Result").innerHTML = document.getElementById("Result").innerHTML + "\n <b style=\"color:rgb" + color + "\">" + ret + "</b>";
		}
	}
}