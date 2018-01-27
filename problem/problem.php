<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php include "../include.php" ?>
<link href="assets/problem.css" rel="stylesheet" type="text/css" />
<script src="assets/problem.js"></script>
<?php
	$con = mysql_connect("localhost","root","qdc010325");
	
	if (!$con) {
		echo "Error1: ";
		die('Could not connect: ' . mysql_error());
	}
	
	mysql_select_db("Echo_Online_Judge", $con);
	$result = mysql_query("select Subject from problem where id = " . $_GET["id"]);
	$data = mysql_fetch_array($result);
	
	echo "<title>" . $data["Subject"] . "</title>"
?>
</head>

<body>

	<?php include "../BaseInclude.php" ?>
    
    <div class="Title">
		<img id="Secound_Title_Banner" class="img-rounded" src="../assets/Second_Title_Banner.png" width="100%" />
        <?php
			$con = mysql_connect("localhost","root","qdc010325");
	
			if (!$con) {
				echo "Error1: ";
				die('Could not connect: ' . mysql_error());
			}
			
			mysql_select_db("Echo_Online_Judge", $con);
			$result = mysql_query("select Subject from problem where id = " . $_GET["id"]);
			$data = mysql_fetch_array($result);
			
        	echo "<p class=\"ProblemTitle\"> P" . $_GET["id"] . " " . $data["Subject"] . " </p>";
		?>
	</div>
    
    <div class="main">
    	<div class="Container">
        	<div class="row clearfix">
                <div class="col-md-4 column">
                    <?php
                        $con = mysql_connect("localhost","root","qdc010325");
                
                        if (!$con) {
                            echo "Error1: ";
                            die('Could not connect: ' . mysql_error());
                        }
                        
                        mysql_select_db("Echo_Online_Judge", $con);
                        $result = mysql_query("select Pass,Total from problem where id = " . $_GET["id"]);
                        $data = mysql_fetch_array($result);
                    
                        echo "<div class=\"col-md-6 column\">
                            <p class=\"DescribeTitle\">" . $data["Pass"] . "</p>
                            <p>提交</p>
                        </div>
                        <div class=\"col-md-6 column\">
                            <p class=\"DescribeTitle\">"  . $data["Total"]. "</p>
                            <p>通过</p>
                        </div>"
                    ?>
                </div>
                <div class="col-md-8 column">
                    <div class="row clearfix" style="padding-bottom:20px">
                        <div class="col-md-6 column">
                            <p class="DescribeText">来源：坐享脐橙</p>
                        </div>
                        <div class="col-md-6 column">
                            <p class="DescribeText">标签：无</p>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-md-6 column">
                            <p class="DescribeText">难度：入门难度</p>
                        </div>
                        <div class="col-md-6 column">
                            <p class="DescribeText">时间限制</p>
                        </div>
                    </div>
                </div>
        	</div>
        </div>
        <div class="Container" style="text-align:left; padding-left:50px; padding-right:50px">
        	<?php
				$con = mysql_connect("localhost","root","qdc010325");
			
				if (!$con) {
					echo "Error1: ";
					die('Could not connect: ' . mysql_error());
				}
				
				mysql_select_db("Echo_Online_Judge", $con);
				$result = mysql_query("select Context, Description, InputFormat, OutputFormat, _Range, _Explain from problem where id = " . $_GET["id"]);
				$data = mysql_fetch_array($result);
				
				$Parsedown = new Parsedown();
				$flag = false;
				
				if ($data["Context"] != null) {
					$flag = true;
					
					echo "<p class=\"Title3\"  style=\"font-weight:bold\">题目背景</p>";
					echo $Parsedown->text($data["Context"]);
				}
				
				if ($data["Description"] != null) {
					if (flag) {
						echo "<br />";
						echo "<br />";
					}
					echo "<p class=\"Title3\"  style=\"font-weight:bold\">题目描述</p>";
					echo $Parsedown->text($data["Description"]);
				}
				
				$flag = false;
				
				for ($i = 1; $i <= 5; $i++) {
					$_result = mysql_query("select SampleInput" . $i .",SampleOutput" . $i . " from problem where id = " . $_GET["id"]);
					$_data = mysql_fetch_array($_result);
					
					if ($_data["SampleInput" . $i] != null && $_data["SampleOutput" . $i] != null) {
						if (!$flag) {
							echo "<br />";
							echo "<br />";
							echo "<p class=\"Title3\"  style=\"font-weight:bold\">输入输出样例</p>";
							$flag = true;
						}
						
						echo "<br />";
						
						echo
							"<div class=\"row clearfix\">
								<div class=\"col-md-6 column\">
									<p class=\"Title4\" style=\"font-weight:bold\">输入样例#" . $i . "</p>
									<pre>" .
									$_data["SampleInput" . $i]
								. "</pre>
								</div>
								<div class=\"col-md-6 column\">
									<p class=\"Title4\" style=\"font-weight:bold\">输出样例#" . $i . "</p>
									<pre>" .
									$_data["SampleOutput" . $i]
								. "</pre>
								</div>
							</div>";
					}
				}
				
				if ($data["InputFormat"] != null || $data["OutputFormat"] != null) {
					echo "<br />";
					echo "<br />";
					echo "<p class=\"Title3\"  style=\"font-weight:bold\">输入输出格式</p>";
					
					if ($data["InputFormat"] != null) {
						echo "<br />";
						echo "<p class=\"Title4\"  style=\"font-weight:bold\">输入格式</p>";
						echo $Parsedown->text($data["InputFormat"]);
					}
					
					if ($data["OutputFormat"] != null) {
						echo "<br />";
						echo "<p class=\"Title4\"  style=\"font-weight:bold\">输出格式</p>";
						echo $Parsedown->text($data["OutputFormat"]);
					}
				}
				
				if ($data["_Range"] != null) {
					echo "<br />";
					echo "<br />";
					echo "<p class=\"Title3\"  style=\"font-weight:bold\">数据范围</p>";
					echo $Parsedown->text($data["_Range"]);
				}
				
				if ($data["_Explain"] != null) {
					echo "<br />";
					echo "<br />";
					echo "<p class=\"Title3\"  style=\"font-weight:bold\">说明</p>";
					echo $Parsedown->text($data["_Explain"]);
				}
			?>
        </div>
        <div class="Container" style="padding:0">
            <div class="bottom_button" onclick="JumpToSubmit()" onmouseover="Enter(1)" onmouseout="Leave(1)">
                <div class="line" id="Button_Line1"></div>
                <div class="text_button Title4" id="Button1">递交</div>
            </div>
            <div class="bottom_button" onmouseover="Enter(2)" onmouseout="Leave(2)">
                <div class="line" id="Button_Line2"></div>
                <div class="text_button Title4" id="Button2">讨论</div>
            </div>
            <div class="bottom_button" onmouseover="Enter(3)" onmouseout="Leave(3)">
                <div class="line" id="Button_Line3"></div>
                <div class="text_button Title4" id="Button3">题解</div>
            </div>
            <div class="bottom_button" onmouseover="Enter(4)" onmouseout="Leave(4)">
                <div class="line" id="Button_Line4"></div>
                <div class="text_button Title4" id="Button4">评测记录</div>
            </div>
        </div>
    </div>
    
	<?php include "..\FooterInclude.php" ?>
    
</body>
</html>