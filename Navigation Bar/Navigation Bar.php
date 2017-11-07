<?php	
	$File = "/UserData/User_Sculpture_Not_Found.png";
	
	if (isset($_COOKIE["UserID"]))
		$File = UserImage($_COOKIE["UserID"]);

	echo "<div id=\"Left_Naviqation\" class=\"Left_Naviqation na\">
		<div class=\"Left_Profile_Container\">
			<div class=\"Left_Profile_Image_Container\">
				<img width=\"70px\" class=\"img-circle\" src=\"" . $File . "\" />
				<span class=\"badge badge-info Badge_Point\">1</span>
			</div>
			<div class=\"row clearfix Left_Profile_Text\">";
	
	if (isset($_COOKIE["UserName"]))
	echo "<div class=\"col-md-12 column\">" . urldecode($_COOKIE["UserName"]) . "</div>";
	else
		echo "<div class=\"col-md-2 column\">
				</div>
				<div class=\"col-md-4 column\">
					<a href=\"/SignIN.php\">登陆</a>
				</div>
				<div class=\"col-md-4 column\">
					<a href=\"SignUP.php\">注册</a>
				</div>
				<div class=\"col-md-2 column\">
				</div>";
	
	echo"</div>
		</div>
		
		<div class=\"Left_Naviqation_Container\">
			<div class=\"Left_Naviqation_Label\">
				<span class=\"glyphicon glyphicon-home\" style=\"color: rgb(200, 165, 49); font-size: 50px;\"></span>
			</div>
			<a href=\"/index.php\">
				<p class=\"Left_Naviqation_Label_Text\" style=\"top:10px\">回到主页</p>
			</a>
		</div>
		<div class=\"Left_Naviqation_Container\">
			<a href=\"/problem/list.php\">
				<div class=\"Left_Naviqation_Label\" style=\"top:10px\">
					<span class=\"glyphicon glyphicon-list-alt\" style=\"color: rgb(255, 140, 60); font-size: 50px;\"></span>
				</div>
				<p href=\"/problem/list.php\" class=\"Left_Naviqation_Label_Text\" style=\"top:10px\">题目列表</p>
			</a>
		</div>
		<div class=\"Left_Naviqation_Container\">
			<div class=\"Left_Naviqation_Label\" style=\"top:10px\">
				<span class=\"glyphicon glyphicon-share-alt\" style=\"color: rgb(255, 140, 60); font-size: 50px;\"></span>
			</div>
			<p class=\"Left_Naviqation_Label_Text\" style=\"top:10px\">测评记录</p>
		</div>
		<div class=\"Left_Naviqation_Container\">
			<div class=\"Left_Naviqation_Label\" style=\"top:10px\">
				<span class=\"glyphicon glyphicon-star\" style=\"color: rgb(255, 140, 60); font-size: 50px;\"></span>
			</div>
			<p class=\"Left_Naviqation_Label_Text\" style=\"top:10px\">团队</p>
		</div>
		<div class=\"Left_Naviqation_Container\">
			<div class=\"Left_Naviqation_Label\" style=\"top:10px\">
				<span class=\"glyphicon glyphicon-search\" style=\"color: rgb(255, 140, 60); font-size: 50px;\"></span>
			</div>
			<p class=\"Left_Naviqation_Label_Text\" style=\"top:10px\">比赛</p>
		</div>
	</div>";
	
	function UserImage($UserId) {
		if (file_exists("G:/EchoOnlineJudge/UserData/" . $UserId . "/HeadSculpture.png"))
			return "/UserData/" . $UserId . "/HeadSculpture.png";
		else if (file_exists("G:/EchoOnlineJudge/UserData/" . $UserId . "/HeadSculpture.jpg"))
			return "/UserData/" . $UserId . "/HeadSculpture.jpg";
		else
			return "/UserData/User_Sculpture_Not_Found.png";
	}
?>