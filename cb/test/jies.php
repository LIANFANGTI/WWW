<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>PHP表单接收页面</title>
</head>


<body>
	<script type="text/jscript">
        alert("提交成功");
    </script>
<?php
	 	$name = $_POST['name'];
		$tel= $_POST['tel'];
		$bir= $_POST['bir'];
	 	  echo "名字:".$name."<br>";
		  echo "手机：".$tel."<br>";
		  echo "生日：".$bir."<br>";
?>
</body>
</html>