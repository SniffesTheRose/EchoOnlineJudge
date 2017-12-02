<?php
	$submit_id = $_GET["submit_id"];
	$point_id = $_GET["point_id"];
	
	$con = mysql_connect("localhost","root","qdc010325");
	
	if (!$con) {
		echo "Error1: ";
		die('Could not connect: ' . mysql_error());
	}
	
	mysql_select_db("echo_online_judge", $con);
	
	if ($point_id == 0) {
		$result = mysql_query("select Problem,Result from submit where ID = " . $submit_id);
		
		if (!$result || mysql_num_rows($result) != 1)
			echo "Couldn't find the data";
		else {
			$query = mysql_fetch_array($result);
			
			if ($query["Result"] == 3)
				echo 0;
			else {
				mysql_select_db("echo_online_judge_problem_information", $con);
				$result = mysql_query("select count(*) from problem_information_" . $query["Problem"]);
			
				if (!$result || mysql_num_rows($result) != 1)
					echo "Couldn't find the data";
				else {
					$query = mysql_fetch_array($result);
					echo $query["count(*)"];
				}
			}
		}
	} else {
		mysql_select_db("echo_online_judge_test_results", $con);
		$result = mysql_query("select value,score,maxmemory,timeconsum from test_results_" . $submit_id . " where id = " . $point_id);
		
		if (!$result || mysql_num_rows($result) != 1)
			echo "Couldn't find the data";
		else {
			$query = mysql_fetch_array($result);
			echo $query["value"] . "&" . $query["score"] .  "&" . $query["maxmemory"] .  "&" . $query["timeconsum"];
		}
	}
?>