<?php
require_once 'email.class.php';
//require 'email.class.php';
  $mail = new MySendMail();

$mail->setServer("smtp.qq.com", "1021684623@qq.com", "qrgszfumginubegj", 465, true); //设置smtp服务器，到服务器的SSL连接
$mail->setFrom("1021684623@qq.com"); //设置发件人
$mail->setReceiver("1341391426@qq.com"); //设置收件人，多个收件人，调用多次
 //$mail->setCc("XXXX"); //设置抄送，多个抄送，调用多次
 //$mail->setBcc("XXXXX"); //设置秘密抄送，多个秘密抄送，调用多次
 //$mail->addAttachment("XXXX"); //添加附件，多个附件，调用多次
 $mail->setMail("From YunKu Checkcode", "Welcome to Yunku you code is 45624 <a href='www.zduber.com'>Click Here to Yunku</a>"); //设置邮件主题、内容
 $mail->sendMail(); //发送
 echo "支持中文？";
?>