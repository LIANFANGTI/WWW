﻿
<!DOCTYPE html>
<html>
<head>
		<meta charset="utf-8">
		<link href="css/signupstyle.css" rel='stylesheet' type='text/css' />
        <script src="js/singup.js"></script>
        <script src="js/jquery.min.js"></script>
		<meta name="viewport" content="width=device-width, initial-scale=1">
			<meta property="qc:admins" content="1443161027622123326375731765060454" />
		<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
			<link rel="icon" href="images/favicon.ico" type="images/x-icon" id="page_favicon" />
		<title>注册/登陆</title>
</head>
 
<body onLoad="onload()">
	<div class="main">
				 <!-----start-main---->
				 <div class="inset">
				 	<div class="social-icons">
		    			 <div class="span"><a href="login.php"><img src="images/yk.png" alt=""/><i>云库登陆 </i><div class="clear"></div></a></div>	
    					 <div class="span1"><a href="QQlogin/qqlogin.php"><img src="images/qq.png" alt=""/><i>QQ登陆</i><div class="clear"></div></a></div>
    					 <div class="clear"></div>
    					
					</div>
				 </div>	
                 <?php 
				 	isset($_POST["cp"])?$cp=$_POST["cp"]:$cp="";
					isset($_POST["name"])?$name=$_POST["name"]:$name="";
					isset($_POST["tel"])?$tel=$_POST["tel"]:$tel="";
				  echo $cp.$name.$tel;
				 ?>
				 <form>
                 <input type="hidden" value="" id="ky" />
                 <input type="hidden" value="" id="openid"/>
                 <input type="hidden" value="" id="aurl" />
                 <input type="hidden" value="" id="hd" />
							<div class="lable">
                             <input type="text" class="text"  style="float:left;width:40%;" onFocus="cls()" placeholder="姓名"  onBlur="check(this)" id="name" value="<?php echo $name; ?>">
		                     <input type="text" class="text" onFocus="cls()" style="float:right; width:40%;" placeholder="公司名称" onBlur="check(this)" id="cp" value="<?php echo $cp; ?>">
		                    </div>
		                    <div class="clear"> </div>
		                    <div class="lable-2">
		                    <input type="text" class="text" onFocus="cls()" placeholder="手机号码"  onBlur="checkphone(this);ckuser()" id="tel" value="<?php echo $tel; ?>">
		                     <input type="password" class="text" onFocus="cls()" placeholder="输入您的密码" onBlur="check(this)" id="pwd">
                             <input type="password" class="text" onFocus="cls()" placeholder="确认您的密码" onBlur="checkpwd()" id="pwd1">
							</div>
							<div class="clear"> </div>
                             <h3 id="print" style="color:#F33;">&nbsp;</h3>
							 <h3>创建这个账户，您同意我们的 <span><a href="#">条款和协议</a></span></h3>
								 <div class="submit">
									<input type="button" onclick="singup()" value="创建账号" >
								</div>
									<div class="clear"> </div>
							 </form>
		<!-----//end-main---->
		</div>
		 <!-----start-copyright---->
   					<div class="copy-right">
   						<p></p>
					</div>
				<!-----//end-copyright---->
	 
</body>
</html>