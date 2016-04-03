
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="css/bootstrap.min.css" />
		<link rel="stylesheet" href="css/Bcenter.css" />
		<link href="//netdna.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet">
		<title>POST数据请求测试页面</title>
	</head>
    <body>
		<?php
			//phpinfo();
			require_once '../lib/fun.php';
			$appid="wx5f16b8499bb0405e";
			$secret="d2677e79f8f58139f1d9b9cae3524316";
			$url="https://api.weixin.qq.com/sns/oauth2/access_token?appid=".$appid."&secret=".$secret."&code=".$code."&grant_type=authorization_code";
			$bcode=curl($url);
			echo "access_token:".$bcode["access_token"];
	   ?>
	   123
	</body>
</html>