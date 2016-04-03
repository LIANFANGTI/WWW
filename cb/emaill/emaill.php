<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>邮箱验证测试页面</title>
</head>

<body>
<?php 
send_mail("1021684623@qq.com", "1341391426@qq.com", "测试邮件", "测试邮件"); 

function send_mail($from, $to, $subject, $message) 
{ 
 if ($from == "") 
 { 
 $from = ' <webmaster@s135.com>';//发件人地址 
} 
 $headers = 'MIME-Version: 1.0' . "\r\n"; 
 $headers .= 'Content-type: text/html; charset=gb2312' . "\r\n"; 
 $headers .= 'From: ' . $from . "\r\n"; 
 mail($to, $subject, $message, $headers); 
} 
?> 
</body>
</html>