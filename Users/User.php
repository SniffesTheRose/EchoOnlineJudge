<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php include "../include.php" ?>
<script src="https://code.highcharts.com/highcharts.src.js"></script>
<script src="assets/User.js"></script>
<?php
	$con = mysql_connect("localhost","root","qdc010325");
	
	if (!$con) {
		echo "Error1: ";
		die('Could not connect: ' . mysql_error());
	}
	
	mysql_select_db("echo", $con);
	
	$result = mysql_query("select Name,Sign from users where ID = " . $_GET["id"]);

	$query = mysql_fetch_array($result);
?>
<title><?php echo $query["Name"] ?></title>
<link href="assets/User.css" rel="stylesheet" type="text/css" />
</head>

<body>
	<?php include "..\Parsedown.php"; include "..\Navigation Bar\Navigation Bar.php"; ?>
    
	<div class="Title">
	    <div class="HeadPic">
        	<img class="img-circle Pic" src="<?php echo UserImage($_GET["id"]) ?>" />
        </div>
        <b><p class="NamePos Title2"><?php echo $query["Name"]; ?></p></b>
		<img id="Title_Banner" class="img-rounded Filter" src="/assets/Title_Banner.png" width="100%"/>
	</div>";
    
    <div class="main">
    	<div class="Container" style="padding-left:30px; padding-right:30px; text-align:left">
        	<p class="Title3">签名</p>
            <br />
			<?php
            	$Parsedown = new Parsedown();
				echo $Parsedown->text($query["Sign"]);
			?>
        </div>
    </div>
    
    <div class="main">
    	<div id="container" style="min-width:400px;height:400px"></div>
    </div>

    <?php include "..\FooterInclude.php" ?>
</body>
</html>