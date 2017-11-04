<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php include "Include.php" ?>
<script src="SignUP.js"></script>
<title>Echo Sign UP</title>
</head>

<body>

<?php
	include "BaseInclude.php";
?>

<div class="main">
    <div class="Container">
  		<p class="Title1">创建你的 Echo 账号</p>
        <img class="Title1" src="assets/Title_Black.png" class="TitlePosition"/>
    </div>
    
    <div class="Container" style="text-align:left">
    	<form class="form-group" style="padding-top:40px; padding-bottom:60px; padding-left:10%">
            <label style="padding-top:20px; padding-bottom:10px">用户名</label>
            <input type="text" class="form-control" id="name" placeholder="请输入用户名" style="width:80%">
            <label style="padding-top:20px; padding-bottom:10px">密码</label>
            <input type="password" class="form-control" id="password" placeholder="请输入密码" style="width:80%">
            <label style="padding-top:20px; padding-bottom:10px">再次输入密码</label>
            <input type="password" class="form-control" id="repassword" placeholder="请再次输入密码" style="width:80%">
            <div id="EmailDiv" class="form-group">
                <label style="padding-top:20px; padding-bottom:10px">邮箱</label>
                <input type="text" class="form-control" id="email" placeholder="请输入邮箱" style="width:80%"  onkeyup="Email(this.value)">
            </div>
            <div style="width:80%; text-align:center;">
            	<button type="button" class="btn btn-info" style="font-size:20px; margin-top:20px;" onclick="Submit()">注册</button>
            </div>
        </form>
    </div>
</div>

</body>
</html>