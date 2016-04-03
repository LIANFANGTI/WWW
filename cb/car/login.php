<!DOCTYPE html>
<html>
<head>
<title>登陆</title>
<link href="css/style.css" rel='stylesheet' type='text/css' />
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="App Sign in Form,Login Forms,Sign up Forms,Registration Forms,News latter Forms,Elements"./>
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
</script>
<!--webfonts-->
<link href='http://fonts.useso.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
<!--//webfonts-->
</head>
<body>
	<h1 style="font-family:'黑体';">ZIDIANCHEFAN</h1>
		<div class="app-cam">
			<div class="cam"><img src="images/cam.png" class="img-responsive" alt="" /></div>
			<form>
				<input type="text" class="text"  name="user" value="E-mail address" onfocus="this.value = '';clsmsg()"  >
                
                
				<input type="password" value="Password"  name="pwd" onfocus="this.value = '';clsmsg()" >
				<div class="submit"><input type="button" onclick="check()" value="Sign in" ></div>
				<div class="clear"></div>
                <div id="msg" style="color:#FFF; font-family:'黑体';"></div>
				<div class="buttons">
					<ul>
						<li onClick="alert('功能开发中')"><a href="#" class="hvr-sweep-to-right">用QQ账号登陆</a></li>
						<li onClick="alert('功能开发中')")><a href="#" class="hvr-sweep-to-left">微信账号登陆</a></li>
						<div class="clear"></div>
					</ul>
				</div>

				<div class="new">
					<p><a href="#">忘记密码 ?</a></p>
					<p class="sign">第一次访问 ?<a href="#"> 立即注册</a></p>
					<div class="clear"></div>
				</div>
			</form>
		</div>
	<!--start-copyright-->
   		<div class="copy-right">
				<p>Copyright &copy; 2015.Company name All rights reserved.<a target="_blank" href="">&#x7F51;&#x9875;&#x6A21;&#x677F;</a> - More Templates <a href="#" target="_blank" title="">LFTT</a></p>
		</div>
	<!--//end-copyright-->
    <script>
		function clsmsg(){
			document.getElementById("msg").innerHTML=""	
		}
		function check(){
			var user=document.getElementsByName("user").item(0).value
			var pwd=document.getElementsByName("pwd").item(0).value
			if(user!=""&&pwd!=""){
				ajax()
			}else {
				document.getElementById("msg").innerHTML="用户名或密码不能为空"
			}
		}
function ajax(){
	 //alert(1);
	 var user=document.getElementsByName("user").item(0).value;
	 var pwd=document.getElementsByName("pwd").item(0).value;
	 var xmlh=new XMLHttpRequest();
	 xmlh.open("POST","log.php?user="+user+"&pwd="+pwd+"",true);
	 xmlh.send(null);
	 xmlh.onreadystatechange=function(){
  		if (xmlh.readyState==4 && xmlh.status==200){
    		//alert("返回值："+xmlh.responseText);
			document.getElementById("msg").innerHTML=xmlh.responseText;
			var backstr=xmlh.responseText
			if(backstr.indexOf("成功") > 0){ window.location.href="index.php"}
    	}else{
			//alert("错代："+xmlh.readyState+"\nstaus="+xmlh.status)
		}
  	}

	 }
	 
		
    </script>
</body>
</html>