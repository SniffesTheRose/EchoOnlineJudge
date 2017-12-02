<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php include "../include.php" ?>
<link href="assets/result.css" rel="stylesheet" type="text/css" />
<script src="../highlight/highlight.pack.js"></script>
<script src="assets/result.js"></script>
<link href="../highlight/styles/vs.css" rel="stylesheet" type="text/css" />
<script src="../highlight/highlight.pack.js"></script>
<title>查看提交</title>
</head>

<body>
	<?php include "../BaseInclude.php" ?>
    
    <div class="main">
    	<div class="Container" style="text-align:left; padding-left:30px; padding-right:30px;">
            <b><p id="Evaluator" class="Title3"> 正在分配评测任务 </p></b>
            <br />
            <div id="Result" style="font-size:17px"></div>
            <br />
            <div id="EvaluationInformation" style="font-size:15px"><br /><br /><br /></div>
            <br />
            <div id="CompilationInformation"></div>
            <div class="UserInformation">
            <?php
				$con = mysql_connect("localhost","root","qdc010325");
				
				if (!$con)
					die('Could not connect: ' . mysql_error());
				
				mysql_select_db("echo_online_judge", $con);
				
				$result = mysql_query("select Problem,User,SubmissionTime from submit where ID=" . $_GET["id"]);
				
				$information = mysql_fetch_array($result);
				echo "<img style=\"top:25px; left:20px;\" id=\"user\" width=\"100px\" class=\"img-circle\" src=\"" . UserImage($information["User"]) . "\" />";
				
				mysql_select_db("echo", $con);
				$result2 = mysql_query("select ID,Name from users where ID=" . $information["User"]);
				$information2 = mysql_fetch_array($result2);
				
				mysql_close($con);
			?>
            	<div class="SubmitInformationArae Title3"><b>
                	<?php
						echo "<a href=\"problem.php?id=" . $information["Problem"] . "\">P " . $information["Problem"] . "<br /></a>";
						echo "<a href=\"../Users/User.php?id=" . $information2["ID"] . "\">" . $information2["Name"] . "</a><br />";
						echo $information["SubmissionTime"];
					?>
                </b></div>
            </div>
            <div id="resultPlace"></div>
            <b><p class="Title3">查看代码:</p></b>
            <br />
            <pre><code id="code"></code></pre>
        </div>
    </div>
    
	<?php include "..\FooterInclude.php" ?>
    
</body>
</html>