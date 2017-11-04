<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php include "G:/Echo Online Judge/include.php" ?>
<title>查看提交</title>
<link href="../assets/Welcome.css" rel="stylesheet" type="text/css" />
</head>

<body>
	<?php include "G:/Echo Online Judge/BaseInclude.php" ?>
    
    <div class="main">
        <div class="content">
            <?php
                $con = mysql_connect("localhost","root","qdc010325");
            
                if (!$con) {
                    echo "Error1: ";
                    die('Could not connect: ' . mysql_error());
                }
                
                mysql_select_db("echo_online_judge", $con);
                
                while (true) {
                    $result = mysql_query("select Result,Score from submit where SubmitID='" . $_GET["id"] . "'");
        
                    $data = mysql_fetch_array($result);
                    
                    if(isset($data["Result"]) && isset($data["Score"])) {
                        echo "评测结果  " . $data["Result"] . "     得分 " . $data["Score"] . "\n";
                        break;
                    }
                    
                    sleep(0.01);
                }
            ?>
        </div>
    </div>
</body>
</html>