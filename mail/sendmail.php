<?php
require_once 'email.class.php';
//require 'email.class.php';
  $mail = new MySendMail();

$mail->setServer("smtp.qq.com", "1021684623@qq.com", "qrgszfumginubegj", 465, true); //����smtp������������������SSL����
$mail->setFrom("1021684623@qq.com"); //���÷�����
$mail->setReceiver("1341391426@qq.com"); //�����ռ��ˣ�����ռ��ˣ����ö��
 //$mail->setCc("XXXX"); //���ó��ͣ�������ͣ����ö��
 //$mail->setBcc("XXXXX"); //�������ܳ��ͣ�������ܳ��ͣ����ö��
 //$mail->addAttachment("XXXX"); //��Ӹ�����������������ö��
 $mail->setMail("From YunKu Checkcode", "Welcome to Yunku you code is 45624 <a href='www.zduber.com'>Click Here to Yunku</a>"); //�����ʼ����⡢����
 $mail->sendMail(); //����
 echo "֧�����ģ�";
?>