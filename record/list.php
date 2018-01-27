<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php include "../include.php" ?>
<link href="assets/list.css" rel="stylesheet" />
<title>评测记录</title>
</head>

<body>
	<?php include "../BaseInclude.php" ?>
    
    <div class="main">
			<?php
                $con = mysql_connect("localhost","root","qdc010325");
                
                if (!$con) {
                    echo "Error1: ";
                    die('Could not connect: ' . mysql_error());
                }
                
                mysql_select_db("Echo_Online_Judge", $con);
                
                $result = mysql_query("select ID,User,Problem,Result,Score,SubmissionTime from submit order by ID desc limit 0,10");
                    
                while ($data = mysql_fetch_array($result)) {
					mysql_select_db("Echo_Online_Judge", $con);
					$Problem_Query = mysql_query("select Subject from problem where ID=" . $data["Problem"]);
					$problem_data = mysql_fetch_array($Problem_Query);
					
					mysql_select_db("Echo", $con);
					$User_Quert = mysql_query("select Name from users where ID=" . $data["User"]);
					$user_data = mysql_fetch_array($User_Quert);
					
					if ($data["Result"] == "1") {
						$html = "Accepted";
						$color = "(51,255,0)";
					} else if ($data["Result"] == '2') {
						$html = "Unaccepted";
						$color = "(255,51,0)";
					} else if ($data["Result"] == '3') {
						$html = "Compile Error";
						$color = "(241,196,15)";
					}
					
                    echo "<div class=\"Container_for_List\">
						<a style=\"color:#337ab7\" href=\"../Users/User.php?id=" . $data["User"] . "\"><img style=\"display:inline-block; left:20px;\" width=\"70px\" class=\"img-circle\" src=\"" . UserImage($data["User"]) . "\" /></a>
						<div class=\"Basic_Information\" style=\"line-height:30px;\">
							<a style=\"text-decoration:none;\" href=\"../problem/result.php?id=" . $data["ID"] . "\">
								<span class=\"badge\" style=\"background-color:rgb" . $color . "; font-size:15px\">" . $html . "</span>
								<p style=\"color:rgb" . $color . "; font-weight:bold;\"> " . $data["Score"] . "</p>
							</a>
						</div>
						
						<div class=\"Basic_Information\">
							<a style=\"text-decoration:none;\" href=\"../problem/problem.php?id=" . $data["Problem"] . "\"><p>P" . $data["Problem"] . " " . $problem_data["Subject"] . "</p></a>
							<p style=\"font-size:13px; color:#7f7f7f\">提交自 <a style=\"color:#337ab7\" href=\"../Users/User.php?id=" . $data["User"] . "\">" . $user_data["Name"] . "</a> 于 " . $data["SubmissionTime"] . "</p>
						</div>
						
						</div>";
                }
            ?>
		</div>
    </div>
    
    <?php include "..\FooterInclude.php" ?>
</body>
</html>