<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php include "G:/Echo Online Judge/include.php" ?>
<link href="assets/list.css" rel="stylesheet" />
<title>题目列表</title>
<link href="../assets/EchoOnlineJudge.css" rel="stylesheet" type="text/css" />
</head>

<body>
	
	<?php include "G:\Echo Online Judge\BaseInclude.php" ?>
    
    <div class="main">
		<?php
            $page = 1;
            
            if (isset($_GET["page"]))
                $page = $_GET["page"];
            
            $con = mysql_connect("localhost","root","qdc010325");
        
            if (!$con) {
                echo "Error1: ";
                die('Could not connect: ' . mysql_error());
            }
            
            mysql_select_db("Echo_Online_Judge", $con);
            
            $result = mysql_query("select ID,Subject from problem limit " . (($page - 1) * 40) . "," . ($page * 40));
			
			while ($data = mysql_fetch_array($result)) {
				echo "	<div class=\"row clearfix Container_for_Problem\">
							<div class=\"col-md-2 column\"> 
								<h3> P " . $data["ID"] . "</h3>
							</div>
							<a href=\"problem.php?id=" . $data["ID"] . "\">
								<div class=\"col-md-10 column\">
									<h3>" . $data["Subject"] . "</h3>
								</div>
							</a>
						</div>";
			}
        ?>
    </div>
</body>
</html>