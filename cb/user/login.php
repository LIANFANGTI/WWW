<!doctype html>
<html>
<head>
    <title>登陆</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link href="../css.css" rel="stylesheet" type="text/css">
<script src="../js/js.js" type="text/javascript"></script>
</head>
<body>
	<?php
	
			
			if($_GET['action'] == "logout"){
				@session_start();
				unset($_SESSION['logined']);
				echo "<script>alert('注销成功');location.replace('login.php?action=login')</script>";
				exit;
				}
	
	?>
	<div id="title"><a href="../index.php"><img  id="logo" src="../img/logo .jpg"/></a></div>
    <div align="center">
    	<img src="../img/emoj_1.png" width="577" height="529"  alt="" style="margin:50px 50px;" onclick="check()"/>
    </div>
<form name='FORM' id='FORM'  method='post' action='../up.php' align="center" >
    <div style="margin:30px 0px 0px 60px;">
         <div  class="text1">账号：<input type="text" name="user"  onKeyDown="keydown('user')" class="text1_a"></div>  
         <div  class="text1">密码：<input type="password" name="pwd"  onKeyDown="keydown('pwd')" class="text1_a"></div>
         <input type="text"  name="gettype" value="login" style="display:none; "></div>  
</form>
<div style="margin:50px 10px 20px 0px; ">
 <div  calss="caption1"><a href="singup.php">注册</a></div>
 <div  calss="caption1"><a href="javascript:alert('你是猪啊')">忘记密码</a></div>
 </div>
</body>
<script>
function check(){
		var use=document.getElementsByName("user").item(0).value
		var pwd=document.getElementsByName("pwd").item(0).value
		if(use!=""&&use.indexOf('@')!=-1&&pwd!=""){
			submit()		
			}else if(pwd==""){
				alert("密码不能为空")	
				document.getElementsByName("pwd").item(0).style.borderColor="red"
				document.getElementsByName("pwd").item(0).style.borderStyle="double"
				
		}else{
			alert("请输入正确的邮箱格式")	
			document.getElementsByName("user").item(0).style.borderColor="red"
			document.getElementsByName("user").item(0).style.borderStyle="double"
			}
      // alert(str.indexOf('@.'))
	}
		
		
function keydown(a){
	//alert(event.keyCode)
		if(a=="user"){	
			if(event.keyCode==13){
				document.getElementsByName("pwd").item(0).focus()
				}
		}else if(a=="pwd"){
			if(event.keyCode==13){
				check()
				}			
			}
	
 }
</script>
</html>
