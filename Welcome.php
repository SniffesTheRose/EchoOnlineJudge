<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php include "Include.php" ?>
<title>WelCome to Echo</title>
<link href="assets/Welcome.css" rel="stylesheet" type="text/css" />
<link href="assets/EchoOnlineJudge.css" rel="stylesheet" type="text/css" />
</head>

<?php
	include "Parsedown.php";
?>

<body>

<video id="video-background" autoplay="" loop="" muted="" poster="assets/Welcome_Page_Background.jpg">
    <source src="assets/lighthouse.mp4" type="video/mp4">
</video>

<section class="main">
    <div class="content">
        <p class="Title1" style="color:rgb(255,255,255)"><?php echo $_GET["name"] ?> ，欢迎来到 Echo</p>
    	<br />
        <br />
        <br />
        <div style="padding-left:50px; padding-right:50px">
        	<p id="title1" class="Title2" style="color:rgb(255,255,255);">感谢您注册 Echo Online Judge</p>
            <br />
            <p id="title2" class="Title3" style="color:rgb(255,255,255);">Echo Online Judge 是一个便捷的在线评测网站，您可以随时随地的提交您的代码。<br />代码的正确与否全部都由我们在线的分布式测评机为您评测</p>
            <br />
            <p id="title3" class="Title3" style="color:rgb(255,255,255);">当您提交您的代码之后，我们的服务器会将您的代码放入等待评测队列<br />评测队列中的代码会由我们的评测及取出并编译运行和比较答案，最后的结果将会在比较答案之后返回给您</p>
        </div>
        
        <button type="button" id="subscribe-button" class="btn btn-info" style="font-size:20px; margin-top:20px; background-color:rgb(15,224,186);" onclick="javascript:window.location = 'index.php'">开启我的 OI 之旅</button>
    </div>
</section>

</body>
</html>