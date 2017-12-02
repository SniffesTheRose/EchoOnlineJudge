<?php
	$User = $_POST["user"];
	$Pid = $_POST["pid"];
	$Code = $_POST["code"];
	
	$encode = mb_detect_encoding($Code, array("ASCII", "UTF-8", "GB2312", "GBK", "BIG5"));
	
	if ($encode != "UTF-8")
		$Code = iconv($encode, "utf-8", $Code);
		
	$con = mysql_connect("localhost", "root", "qdc010325");
	
	if (!$con) {
		echo "Error1: ";
		die('Could not connect: ' . mysql_error());
	}
	
	mysql_select_db("echo_online_judge", $con);
	
	mysql_query("INSERT INTO submit (User, Problem, Code, SubmissionTime) VALUES ('" . $User . "', '" . $Pid . "', \""  . $Code. "\", '" . date("Y-m-d H:i:s") . "')");
	
	$ID = mysql_insert_id();
	
	$redis = new Redis();
	$redis->connect("localhost", "6379");
	$redis->rPush("Task", $ID);
	
	echo $ID;
?>