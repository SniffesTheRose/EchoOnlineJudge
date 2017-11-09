<?php
	$name = $_GET["name"];
	$password = $_GET["password"];
	$email = $_GET["email"];
	$type = $_GET["type"];
	
	$encode = mb_detect_encoding($name, array("ASCII", "UTF-8", "GB2312", "GBK", "BIG5"));
	
	if ($encode != "UTF-8")
		$name = iconv($encode, "utf-8", $name);  
	
	$con = mysql_connect("localhost","root","qdc010325");
	
	if (!$con) {
		echo "Error1: ";
		die('Could not connect: ' . mysql_error());
	}
	
	mysql_select_db("Echo", $con);
	
	$result1 = mysql_query("select *from users where Name='" . $name . "'");
	$result2 = mysql_query("select *from users where Email='" . $email . "'");
	
	
	if (mysql_num_rows($result1) >= 1) {
		echo "Error2: ";
		die('The UserName has been registered');
	} else if (mysql_num_rows($result2) >= 1) {
		echo "Error2: ";
		die('The Email has been registered');
	} else {
		if ($type == 1) {
			$redis = new Redis();
			$redis->connect("localhost", "6379");
			$key = rand(1000000, 9999999);
			$redis->set("New_User_" . $name, $key);
			require_once('../PHPMailer/class.phpmailer.php');
			$mail = new PHPMailer();
			$mail->isSMTP();
			$mail->CharSet = 'UTF-8';
			$mail->Host = "smtp.oier.space";
			$mail->SMTPAuth = true;
			$mail->Username = "echo@oier.space";
			$mail->Password = "Qdc010325";
			$mail->From = "echo@oier.space";
			$mail->FromName = "Echo账户注册";
			$mail->AddAddress($email, "用户 " . $name . " 注册账号");
			$mail->Subject = "注册密钥";
			$mail->Body = "感谢注册Echo Online Judge\t\n您的密钥是" . $key;
			
			if(!$mail->Send())
				die("Unknown error");
			else
				echo "use a key to pass the request";
		} else if ($type ==  2) {
			$redis = new Redis();
			$redis->connect("localhost", "6379");
			$key = $redis->get("New_User_" . $name);
			
			if ($key == $_GET["key"]) {
				mysql_query("INSERT INTO users (Name, Password, CreateDate, Email) VALUES ('" . $name . "', '" . $password . "', '"  . date("Y-m-d"). "', '" . $email . "')");
				$ID = mysql_insert_id();
				mkdir ("G:/EchoOnlineJudge/UserData/" . $ID);
				$redis->del("New_User_" . $name);
				echo "Pass id=" . $ID;
			} else {
				echo "Incorrect key";
			}
		}
	}
	
	mysql_close($con);
?>