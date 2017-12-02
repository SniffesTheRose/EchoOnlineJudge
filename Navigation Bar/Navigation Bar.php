<?php	
	$UserImageFile = "/UserData/User_Sculpture_Not_Found.png";
	
	if (isset($_COOKIE["UserID"]))
		$UserImageFile = UserImage($_COOKIE["UserID"]);

	if (isset($_COOKIE["UserID"]))
		echo "<a href=\"../Users/User.php?id=" . $_COOKIE["UserID"] . "\">";

	echo "<div id=\"Left_Naviqation\" class=\"Left_Naviqation na\">
		<div class=\"Left_Profile_Container\">
			<div class=\"Left_Profile_Image_Container\">
				<img id=\"user\" width=\"55px\" class=\"img-circle\" src=\"" . $UserImageFile . "\" />
				<span id=\"badge\" class=\"badge badge-info Badge_Point\">1</span>
				<a href=\"../Users/Settings.php\"><span class=\"badge badge-info settings\"><i class=\"fa fa-cog\"></i></span></a>
			</div>
			<div class=\"row clearfix Left_Profile_Text\">";
	
	if (isset($_COOKIE["UserName"]))
		echo "<div class=\"col-md-12 column\">" . urldecode($_COOKIE["UserName"]) . "</div>";
	else
		echo "<div class=\"col-md-12 column\" style=\"padding-left:15px; padding-right:15px;\">
				<div class=\"col-md-6 column\" style=\"padding:0\">
					<a href=\"/SignIN.php\">
						<i id=\"icon1\" class=\"fa fa-sign-in\" aria-hidden=\"true\" style=\"display:none \"></i>
						登陆
					</a>
				</div>
				<div class=\"col-md-6 column\" style=\"padding:0\">
					<a href=\"SignUP.php\">
						<i id=\"icon2\" class=\"fa fa-user-plus\" aria-hidden=\"true\" style=\"display:none \"></i>
						注册
					</a>
				</div>
			</div>";
	
	if (isset($_COOKIE["UserID"]))
		echo "</a>";
	
	echo"</div>
		</div>
		
		<div class=\"Left_Naviqation_Container\">
			<a href=\"/index.php\">
				<div class=\"Left_Naviqation_Label\">
					<i class=\"fa fa-home\" aria-hidden=\"true\" style=\"font-size:30px\"></i>
				</div>
				<p class=\"Left_Naviqation_Label_Text\" style=\"top:3px\">回到主页</p>
			</a>
		</div>
		<div class=\"Left_Naviqation_Container\">
			<a href=\"/problem/list.php\">
				<div class=\"Left_Naviqation_Label\" style=\"top:10px\">
					<i class=\"fa fa-list\" aria-hidden=\"true\" style=\"font-size:27px\"></i>
				</div>
				<p class=\"Left_Naviqation_Label_Text\" style=\"top:10px\">题目列表</p>
			</a>
		</div>
		<div class=\"Left_Naviqation_Container\">
			<div class=\"Left_Naviqation_Label\" style=\"top:10px\">
				<i class=\"fa fa-history\" aria-hidden=\"true\" style=\"font-size:30px\"></i>
			</div>
			<p class=\"Left_Naviqation_Label_Text\" style=\"top:10px\">测评记录</p>
		</div>
		<div class=\"Left_Naviqation_Container\">
			<div class=\"Left_Naviqation_Label\" style=\"top:10px\">
				<i class=\"fa fa-users\" aria-hidden=\"true\" style=\"font-size:27px\"></i>
			</div>
			<p class=\"Left_Naviqation_Label_Text\" style=\"top:10px\">团队</p>
		</div>
		<div class=\"Left_Naviqation_Container\">
			<div class=\"Left_Naviqation_Label\" style=\"top:10px\">
				<i class=\"fa fa-gamepad\" aria-hidden=\"true\" style=\"font-size:30px\"></i>
			</div>
			<p class=\"Left_Naviqation_Label_Text\" style=\"top:10px\">比赛</p>
		</div>
	</div>";
	
	function UserImage($UserId) {
		if (file_exists("G:/EchoOnlineJudge/UserData/" . $UserId . "/HeadSculpture.png"))
			return "\UserData/" . $UserId . "/HeadSculpture.png";
		else if (file_exists("G:/EchoOnlineJudge/UserData/" . $UserId . "/HeadSculpture.jpg"))
			return "\UserData/" . $UserId . "/HeadSculpture.jpg";
		else
			return "\UserData/User_Sculpture_Not_Found.png";
	}
?>