<?php
	setcookie("UserName", "", time() - 3600);
	setcookie("UserID", "", time() - 3600);
	echo "<script>";  
	echo "window.location = \"/index.php\"";  
	echo "</script>"; 
?>