<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title></title>
</head>

<body>
<?php
	$user=$_GET["user"];
	$pwd=$_GET["pwd"];
	//$line=mysql_connect('qdm16147017.my3w.com','qdm16147017','19981102aa');
	$line=mysql_connect('121.196.226.94','root','root');
	 if($line){
			mysql_select_db('zckj_db',$line) or die( '错误'.mysql_error());
			mysql_query("SET NAMES 'utf8'");//SQL读取中文乱码解决
			$sql=mysql_query("select * from user");
			$rows=mysql_num_rows($sql);     //行读取 
			$cols=mysql_num_fields($sql); //列读取
			$cha=0;
			while($row=mysql_fetch_array($sql)){
				$user_name[]=$row["user"];
				if($user==$row["user"]&&$pwd==$row["password"]){$cha=1;break;}
		    }
		    if($cha){
				echo"登录成功";
				session_start();
				$_SESSION['user']=$user_name[0];
				echo"<script>location.relace('index.php')</script>";
			}else{
				echo"用户名或密码错误";
			}
	 }
?>
</body>
</html>