// JavaScript Document

var xmlHttp;

var url;

var color;

var number;

var now_number;

var MaxMemory = 0;
var totTime = 0;

$(document).ready(function(e) {
	url = '../Respond/DataBaseForResult.php?id=' + GetQueryString("id") + '&type=Code&rand=';
	xmlHttp = GetXmlHttpObject();	
	xmlHttp.onreadystatechange = Code;
	xmlHttp.open("GET", url + Math.random(), true);
	xmlHttp.send(null);
});

function MouseOver(id) {
	$("#AnimationArea_Left_" + id).stop().animate({left:'-90px'});
	$("#AnimationArea_Right_" + id).stop().animate({left:'0px'});
}

function MouseOut(id) {
	$("#AnimationArea_Left_" + id).stop().animate({left:'0px'});
	$("#AnimationArea_Right_" + id).stop().animate({left:'90px'});
}

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
			url = '../Respond/DataBaseForResult.php?id=' + GetQueryString("id") + '&type=Compilation_Information&rand=';
			xmlHttp.onreadystatechange = Compilation;
			xmlHttp.open("GET", url + Math.random(), true);
			xmlHttp.send(null);
		}
	}
}

function Compilation() {
	if (xmlHttp.readyState == 4 || xmlHttp.readyState == "complete") {
		var ret = xmlHttp.responseText;
		
		if (ret == "Couldn't find the data" || ret == '')
			setTimeout(sent, 500);
		else {
			document.getElementById("CompilationInformation").innerHTML = "<b><p class=\"Title4\">编译信息:</p></b><pre>" + (ret == "null" ? "无编译信息" : ret) + "</pre><br /><br />";
			url = '../Respond/DataBaseForResultQuery.php?submit_id=' + GetQueryString("id") + '&point_id=0&rand=';
			xmlHttp.onreadystatechange = TestPointNumber;
			xmlHttp.open("GET", url + Math.random(), true);
			xmlHttp.send(null);
		}
	}
}

function TestPointNumber() {
	if (xmlHttp.readyState == 4 || xmlHttp.readyState == "complete") {
		var ret = xmlHttp.responseText;
		
		if (ret == "Couldn't find the data" || ret == '')
			setTimeout(sent, 500);
		else {
			if (ret == 0) {
				document.getElementById("EvaluationInformation").innerHTML = "评测用时 " + (totTime) + "s<br />最大内存 " + (MaxMemory) + "MB";
				
				url = '../Respond/DataBaseForResult.php?id=' + GetQueryString("id") + '&type=Result&rand=';
				xmlHttp.onreadystatechange = Result;
				xmlHttp.open("GET", url + Math.random(), true);
				xmlHttp.send(null);
				return;
			}
			
			var HTML = "";
			
			for (var i = 1; i <= ret; i++)
				HTML += "<div id=\"point_" + i + "\" class=\"resultSpace\" style=\"background-color:rgb(52,152,219); color:rgb(255,255,255)\" onmouseover=\"MouseOver(" + i + ")\" onmouseout=\"MouseOut(" + i + ")\"><small> #" + i + "</small><div id=\"AnimationArea_Left_" + i + "\" class=\"AnimationArea_Left\" 	><b><p id=\"" + i + "_title\" class=\"Title3\" style=\"text-align:center; line-height:50px\">Judging</p></b></div><div id=\"AnimationArea_Right_" + i + "\" class=\"AnimationArea_Right\"></div></div></div>\n";
			
			HTML += "<br /><br /><br />";
			
			document.getElementById("resultPlace").innerHTML = HTML;
			
			now_number = 1;
			number = ret;
			
			url = '../Respond/DataBaseForResultQuery.php?submit_id=' + GetQueryString("id") + '&point_id=1&rand=';
			xmlHttp.onreadystatechange = ScoreQuery;
			xmlHttp.open("GET", url + Math.random(), true);
			xmlHttp.send(null);
		}
	}
}

function ScoreQuery() {
	if (xmlHttp.readyState == 4 || xmlHttp.readyState == "complete") {
		var ret = xmlHttp.responseText;
		
		if (ret == "Couldn't find the data" || ret == '')
			setTimeout(sent, 100);
		else {
			var Arr = ret.split("&");
			
			switch (Arr[0]) {
				case "1":
					document.getElementById("point_" + now_number).style.backgroundColor = "rgb(94,185,94)";
					document.getElementById(now_number + "_title").innerHTML = "AC";
					
					if (Arr[2] - 0 > MaxMemory - 0)
						MaxMemory = Arr[2];
					totTime += Arr[3] - 0;
					
					break;
				case "2":
					document.getElementById("point_" + now_number).style.backgroundColor = "rgb(231,76,60)";
					document.getElementById(now_number + "_title").innerHTML = "WA";
					break;
				case "3":
					document.getElementById("point_" + now_number).style.backgroundColor = "rgb(46,70,140)";
					document.getElementById(now_number + "_title").innerHTML = "TLE";
					break;
				case "4":
					document.getElementById("point_" + now_number).style.backgroundColor = "rgb(153,102,153)";
					document.getElementById(now_number + "_title").innerHTML = "MLE";
					break;
				case "5":
					document.getElementById("point_" + now_number).style.backgroundColor = "rgb(142,68,173)";
					document.getElementById(now_number + "_title").innerHTML = "RE";
					break;
				default:
					document.getElementById("point_" + now_number).style.backgroundColor = "rgb(204,204,0)";
					document.getElementById(now_number + "_title").innerHTML = "UKE";
			}
			
			document.getElementById("AnimationArea_Right_" + now_number).innerHTML = "测试点信息<br />" + (Arr[2] / 1024) + "KB<br />" + Arr[3] + "ms";
			
			now_number++;
			
			if (now_number > number) {
				document.getElementById("EvaluationInformation").innerHTML = "评测用时: " + (totTime / 1000) + " s<br />最大内存: " + (MaxMemory / 1024 / 1024) + " MB";
				
				url = '../Respond/DataBaseForResult.php?id=' + GetQueryString("id") + '&type=Result&rand=';
				xmlHttp.onreadystatechange = Result;
				xmlHttp.open("GET", url + Math.random(), true);
				xmlHttp.send(null);
			} else {				
				url = '../Respond/DataBaseForResultQuery.php?submit_id=' + GetQueryString("id") + '&point_id=' + now_number + '&rand=';
				xmlHttp.onreadystatechange = ScoreQuery;
				xmlHttp.open("GET", url + Math.random(), true);
				xmlHttp.send(null);
			}
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
				html = "Unaccepted";
				color = "(255,51,0)";
			} else if (ret == '3') {
				html = "Compile Error";
				color = "(241,196,15)";
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

function Code() {
	if (xmlHttp.readyState == 4 || xmlHttp.readyState == "complete") {
		var ret = xmlHttp.responseText;

		if (ret == "Couldn't find the data" || ret == '')
			setTimeout(sent, 500);
		else {
			document.getElementById("code").innerHTML = stringToEntity(ret);
			
			hljs.initHighlighting.called = false;
			hljs.initHighlighting();
			
			url = '../Respond/DataBaseForResult.php?id=' + GetQueryString("id") + '&type=Evaluator&rand=';
			xmlHttp.onreadystatechange = Evaluator;
			xmlHttp.open("GET", url + Math.random(), true);
			xmlHttp.send(null);
		}
	}
}