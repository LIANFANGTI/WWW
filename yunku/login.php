<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

<title>云库登陆</title>
<link href="./login/style_log.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="./login/style.css">
<link rel="stylesheet" type="text/css" href="./login/userpanel.css">
<link rel="stylesheet" type="text/css" href="./login/jquery.ui.all.css">
<link rel="icon" href="images/favicon.ico" type="images/x-icon" id="page_favicon" />
<script src="../zdcar2/js/jquery-1.10.2.js"></script>
<script src="js/login.js"></script>

<meta property="qc:admins" content="1443161027622123326375731765060454" />
<style>

</style>
</head>

<body class="login" mycollectionplug="bind">
	<div class="login_m">
	<div class="login_logo"><img src="./login/logo.png" width="196" height="46"></div>
	<div class="login-option">
		<div class="login-op-left">
    		<img class="login-op-logo" src="images/logo2.png" width="30px" height="30px";>
			<div class="login-op-lable">云库账号登录</div>
    	</div>
    	<div class="login-op-right">
    		<a href="QQlogin/qqlogin.php"> <img class="login-op-logo"  src="images/qq.png"/></a>
    		<div class="login-op-lable" onclick="window.location.href='QQlogin/qqlogin.php'">QQ登录</div>
    	</div>
	</div>
	<div class="login_boder">
		<div class="login_padding" id="login_model">
            <div id="yun" >
                <h2>账号：</h2>
                <label>
                <input type="text" id="user" class="txt_input txt_input2"  onfocus="cls()" onblur="check(this)" placeholder="输入您的用户名" value="">
                </label>
                <h2>密码：</h2>
                <label>
                <input type="password" name="pwd" id="pwd" class="txt_input" onfocus="cls()"  placeholder="请输入您的密码"  value="">
                </label>
                <p class="forgot">
                    <a id="iforget" href="signup.php">注册账号</a>
                    <a id="iforget" href="javascript:void(0);">忘记密码了?</a>
                </p>
                <div class="rem_sub">
                    <div class="rem_sub_l">
                        <input type="checkbox" name="checkbox" id="save_me">
                        <label for="checkbox">记住账号</label>
                    </div>
 			    </div>   
 		 </div>
	 </div>
    
      <b style="color:red; " id="msg"></b>
     <div id="forget_model" class="login_padding" style="display:none">
		<br>
		<h1>忘记密码</h1>
  		<br>
   		<div class="forget_model_h2">(请输入您的注册邮箱，系统会自动重置用户密码，并将其发送给用户的注册邮箱地址.)</div>
    	<label><input type="text" id="usrmail" class="txt_input txt_input2"></label>
		<div class="rem_sub">
  		<div class="rem_sub_l">
   	</div>
   
    <label>
     <input type="submit" class="sub_buttons" name="button" id="Retrievenow" value="Retrieve now" style="opacity: 0.7;">
	<input type="submit" class="sub_button" name="button" id="denglou" value="Return" style="opacity: 0.7;">　　
    </label>
  </div>
  
</div>





<!--login_padding  Sign up end-->
</div>
<div class="login-option-bt">

	<div class="login-op-lable-2" onclick="login()">登录</div>
</div>
</div><!--login_m end-->
 <br> <br>



</body></html>