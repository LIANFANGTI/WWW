<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>...</title>
</head>

<body>
<?php
	@session_start();
	session_destroy();
	echo"<script>location.replace('index.php')</script>";
?>
</body>
</html>