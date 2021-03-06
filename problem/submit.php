<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php include "../include.php" ?>

<link rel="stylesheet" href="../CodeMirror/lib/codemirror.css" />
<link rel="stylesheet" href="../CodeMirror/lib/util/simple-hint.css" />

<script src="../CodeMirror/lib/codemirror.js"></script>
<script src="../CodeMirror/lib/util/simple-hint.js"></script>
<script src="../CodeMirror/lib/util/javascript-hint.js"></script>
<script src="../CodeMirror/mode/javascript/javascript.js"></script>
<script src="assets/submit.js"></script>

<!--括号匹配-->
<script src="../CodeMirror/addon/edit/matchbrackets.js"></script>

<!--自动补全-->
<link rel="stylesheet" href="../CodeMirror/addon/hint/show-hint.css" />
<script src="../CodeMirror/addon/hint/show-hint.js"></script>
<script src="../CodeMirror/addon/hint/anyword-hint.js"></script>

<!--语言-->
<script src="../CodeMirror/mode/clike/clike.js"></script>

<title>提交代码</title>
</head>

<body>

	<?php include "../BaseInclude.php" ?>
    
	<div class="main">
		<textarea id="code" name="code" style="height:300px;"></textarea>
    </div>
    
    <div class="main" style="text-align:center">
		<button id="submit" type="button" class="btn btn-info" style="font-size:20px; margin-top:20px; margin-right:40px; background-color:rgb(15,224,186)">递交我的代码</button>
    </div>
    
	<?php include "..\FooterInclude.php" ?>
    
</body>
</html>