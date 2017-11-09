<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php include "G:/EchoOnlineJudge/include.php" ?>
<link href="assets/result.css" rel="stylesheet" type="text/css" />
<script src="../highlight/highlight.pack.js"></script>
<script src="assets/result.js"></script>
<link href="../highlight/styles/vs.css" rel="stylesheet" type="text/css" />
<script src="../highlight/highlight.pack.js"></script>
<title>查看提交</title>
</head>

<body>
	<?php include "G:/EchoOnlineJudge/BaseInclude.php" ?>
    
    <div class="main">
    	<div class="Container" style="text-align:left; padding-left:30px;">
        	<b><p id="Evaluator" class="Title3"> 正在分配评测任务 </p></b>
            <br />
            <div id="Result" style="font-size:17px"></div>
            <br />
            <div id="Information" style="font-size:15px">用时：I Don't Know </div>
            <br /><br /><br />
            <b><p class="Title3">查看代码:</p></b>
            <br />
            <pre style="margin-right:30px"><code id="code"></code></pre>
        </div>
    </div>
    
	<?php include "G:\EchoOnlineJudge\FooterInclude.php" ?>
    
</body>
</html>