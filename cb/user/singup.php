<!doctype html>
<html>
<head>
<meta charset="utf-8">
    <title>注册</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link href="../css.css" rel="stylesheet" type="text/css">
    <script src="../js/js.js" type="text/javascript"></script>
</head>
<body>
	<div id="title"><a href="../index.php"><img  id="logo" src="../img/logo .jpg"/></a></div>
    <form name='FORM' id='FORM'  method='post' action='../up.php?type=singup' >
    <div style="margin:30px 0px 0px 60px;">
    
         <div  style="width:auto; height:auto; font-size:50px; margin:80px 10px 20px 0px; color:#f9bf15;">
            邮箱账号：<input type="text" name="user"  onKeyDown="keydown('user')" style="width:650px; height:80px; font-size:60px; border-style:none; border-bottom-style:solid; border-color:#F9C">
         </div>  
         
         <div  style="width:auto; height:auto; font-size:50px; margin:100px 10px 20px 0px; color:#f9bf15;">
            密码：<input type="password" name="pwd"  onKeyDown="keydown('pwd')" style="width:650px; height:80px; font-size:60px; border-style:none; border-bottom-style:solid; border-color:#F9C">
         </div>
         
         <div  style="width:auto; height:auto; font-size:50px; margin:100px 10px 20px 0px; color:#f9bf15;">
            确认密码：<input type="password" name="pwdok"  onKeyDown="keydown('pwd')" style="width:650px; height:80px; font-size:60px; border-style:none; border-bottom-style:solid; border-color:#F9C">
         </div>
         <div   align="center"  onClick="check()" style="width:auto; height:auto; font-size:80px; margin:100px 10px 20px 0px; color:#f9bf15;">
         ok
         </div>
         

                  
         
         <input type="text"  name="gettype" value="singup" style="display:none; ">
    </div>  
</form>




<script>
function check(){
		var use=document.getElementsByName("user").item(0).value
		var pwd=document.getElementsByName("pwd").item(0).value
		var pwdok=document.getElementsByName("pwdok").item(0).value
		
		if(use!=""&&use.indexOf('@')!=-1&&pwd!=""&&pwd==pwdok&&pwd.length>=6){
			submit()		
		}else if(pwd==""){
				alert("密码不能为空")	
				document.getElementsByName("pwd").item(0).style.borderColor="red"
				document.getElementsByName("pwd").item(0).style.borderStyle="double"
				
		}else if(pwdok!=pwd){
				alert("两次密码不一致")	
				document.getElementsByName("pwdok").item(0).style.borderColor="red"
				document.getElementsByName("pwdok").item(0).style.borderStyle="double"
				document.getElementsByName("pwd").item(0).style.borderColor="red"
				document.getElementsByName("pwd").item(0).style.borderStyle="double"				
			
		}else if(pwd.length < 6){
			alert("密码长度不能少于6位")
			document.getElementsByName("pwd").item(0).style.borderColor="red"
			document.getElementsByName("pwd").item(0).style.borderStyle="double"	
		}else{
			alert("请输入正确的邮箱格式")	
			document.getElementsByName("user").item(0).style.borderColor="red"
			document.getElementsByName("user").item(0).style.borderStyle="double"
			}
      // alert(str.indexOf('@.'))
	}
</script>
</body>
</html>
