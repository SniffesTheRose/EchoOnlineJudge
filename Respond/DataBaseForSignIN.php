<?php
	$name = $_GET["name"];
	$password = $_GET["password"];
	$encode = mb_detect_encoding($name, array("ASCII", "UTF-8", "GB2312", "GBK", "BIG5"));
	
	if ($encode != "UTF-8")
		$name = iconv($encode, "utf-8", $name);  

	$con = mysql_connect("localhost","root","qdc010325");
	
	if (!$con) {
		echo "Error1: ";
		die('Could not connect: ' . mysql_error());
	}
	
	mysql_select_db("Echo", $con);
	
	$result = mysql_query("select ID from users where Name='" . $name . "' && Password='" . $password . "'");
	
	if (mysql_num_rows($result) == 0)
		echo "User Not Found";
	else {
		$id = mysql_fetch_array($result);
		echo "Pass id=" . $id['ID'];
	}
	
	mysql_close($con);
?>