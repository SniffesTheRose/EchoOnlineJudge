<?php
	$name = $_GET["name"];
	$password = $_GET["password"];
	$email = $_GET["email"];
	$encode = mb_detect_encoding($name, array("ASCII", "UTF-8", "GB2312", "GBK", "BIG5"));
	
	if ($encode != "UTF-8")
		$name = iconv($encode, "utf-8", $name);  
	
	$con = mysql_connect("localhost","root","qdc010325");
	
	if (!$con) {
		echo "Error1: ";
		die('Could not connect: ' . mysql_error());
	}
	
	mysql_select_db("Echo", $con);
	
	$result1 = mysql_query("select *from users where Name='" . $name . "'");
	$result2 = mysql_query("select *from users where Email='" . $email . "'");
	
	
	if (mysql_num_rows($result1) >= 1) {
		echo "Error2: ";
		die('The UserName has been registered');
	} else if (mysql_num_rows($result2) >= 1) {
		echo "Error2: ";
		die('The Email has been registered');
	} else {
		mysql_query("INSERT INTO users (Name, Password, CreateDate, Email) VALUES ('" . $name . "', '" . $password . "', '"  . date("Y-m-d"). "', '" . $email . "')");
		$ID = mysql_insert_id();
		echo "Pass id=" . $ID;
		mkdir ("G:/EchoOnlineJudge/UserData/" . $ID);
	}
	
	mysql_close($con);
?>