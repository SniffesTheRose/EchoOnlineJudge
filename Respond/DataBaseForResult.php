<?php
	$id = $_GET["id"];
	$type = $_GET["type"];
			
	$con = mysql_connect("localhost","root","qdc010325");
	
	if (!$con) {
		echo "Error1: ";
		die('Could not connect: ' . mysql_error());
	}
	
	mysql_select_db("echo_online_judge", $con);
	
	$result = mysql_query("select " . $type . " from submit where SubmitID='" . $id . "'");
	
	if (!$result)
		echo "Couldn't find the data";
	else {
		$query = mysql_fetch_array($result);
		echo $query[$type];
	}
?>