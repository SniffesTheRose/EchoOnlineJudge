<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php include "../include.php" ?>
<?php
	$con = mysql_connect("localhost","root","qdc010325");
	
	if (!$con) {
		echo "Error1: ";
		die('Could not connect: ' . mysql_error());
	}
	
	mysql_select_db("echo", $con);
	
	$result = mysql_query("select Name,Sign from users where ID = " . $_COOKIE["UserID"]);

	$query = mysql_fetch_array($result);
?>
<link href="assets/User.css" rel="stylesheet" type="text/css" />
<link href="https://cdn.bootcss.com/bootstrap-fileinput/4.4.6/css/fileinput.css" rel="stylesheet">
<script src="https://cdn.bootcss.com/bootstrap-fileinput/4.4.6/js/fileinput.js"></script>
<script src="https://cdn.bootcss.com/bootstrap-fileinput/4.3.1/js/fileinput_locale_zh.js"></script>
<script src="assets/Settings.js"></script>
<title><?php echo $_COOKIE["UserName"] ?> 用户设置</title>
</head>

<body>
<?php include "..\Parsedown.php"; include "..\Navigation Bar\Navigation Bar.php"; ?>

<?php
	function upload() {
		return 1;
	}
?>
	<div class="Title">
	    <div class="HeadPic">
        	<img class="img-circle Pic" src="<?php echo UserImage($_COOKIE["UserID"]) ?>" />
        </div>
        <b><p class="NamePos Title2"><?php echo $query["Name"]; ?></p></b>
		<img id="Title_Banner" class="img-rounded Filter" src="/assets/Title_Banner.png" width="100%"/>
	</div>";
    
    <div class="main">
    	<div class="Container" style="padding-left:30px; padding-right:30px; text-align:left">
        	<form action="\Respond/UploadForUserImage.php?type=SUBMIT&id=<?php echo $_COOKIE["UserID"] ?>" method="post" enctype="multipart/form-data">
                <label>上传头像:</label>
                <br /><br />
                <input id="image_upload" type="file" name="image" class="projectfile"/>
                <br /><br /><br />
                <label>个性签名</label>
                <br /><br />
                <textarea class="form-control" rows="10" name="sign"><?php echo $query["Sign"] ?></textarea>
                <br /><br />
                <button type="submit" class="btn btn-default">提交更改</button>
            </form>
        </div>
    </div>
<?php include "..\FooterInclude.php" ?>
</body>
</html>