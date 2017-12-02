<?php
	if (isset($_GET["type"])) {
		$con = mysql_connect("localhost","root","qdc010325");
	
		if (!$con) {
			echo "Error1: ";
			die('Could not connect: ' . mysql_error());
		}
		
		mysql_select_db("Echo", $con);
		
		mysql_query("update users set sign=\"" . $_POST["sign"] . "\" where id='" . $_GET["id"] . "'");
		
		echo "<script>";  
		echo "window.location = \"../Users/User.php?id=" . $_GET["id"] . "\"";  
		echo "</script>"; 
		
		return;
	}

	if ($_FILES["image"]["error"] > 0)
		echo "Error: " . $_FILES["image"]["error"] . "<br />";
	else {
		if ($_FILES["image"]["size"] > 100000) {
			echo "头像大小应小于 100kb";
			return;
		}
		
		if (!isset($_GET["id"])) {
			echo "尚未登陆";
			return;
		}
		
		$filename = "../UserData/" . $_GET["id"] . "/HeadSculpture.";
		
		if (file_exists($filename . "png"))
			unlink ($filename . "png");
		
		if (file_exists($filename . "jpg"))
			unlink ($filename . "jpg");
		
		$type = explode(".", $_FILES["image"]["name"]);
		
		move_uploaded_file($_FILES["image"]["tmp_name"], $filename . $type[count($type) - 1]);

		echo 1;
	}
?>