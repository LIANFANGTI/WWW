<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>loading...</title>
</head>

<body>
<?php
 $getid=$_GET['id'];
 $gettype=$_GET['type'];
   if($gettype=="head"){
		if ((($_FILES["file"]["type"] == "image/jpg")|| ($_FILES["file"]["type"] == "image/jpeg")|| ($_FILES["file"]["type"] == "image/pjpeg")||($_FILES["file"]["type"] == "image/png"))&& ($_FILES["file"]["size"] < 2000000)){
					if ($_FILES["file"]["error"] > 0){
						echo "Return Code: " . $_FILES["file"]["error"] . "<br />";
					 }else{
						if (file_exists("../img/hd/" . $_FILES["file"]["name"])){
						  echo "<script>alert('请勿频繁上传')<script>";
						 }else{
						  move_uploaded_file($_FILES["file"]["tmp_name"],"../img/hd/"  .$getid."-".date("ymdhi").".jpg");
$line=mysql_connect('qdm16147017.my3w.com','qdm16147017','19981102aa');
//$line=mysql_connect('localhost','root','root');
							 if($line){
mysql_select_db('qdm16147017_db',$line) or die( '错误'.mysql_error()); 
//""
								mysql_query("SET NAMES 'utf8'");
								$sql=mysql_query("update user set head='../img/hd/" .$getid."-".date("ymdhi").".jpg' where id=".$getid.";");
										 if($sql){
											 echo "<script>alert('上传成功');location.replace('../user/homepage.php?id=".$getid."')</script>";
										 }else{
											 echo "<br>".mysql_error();
											}
							 }
						  
						  
						 }
					}
		  }else{
		  echo "<script> alert('无效文件');location.replace('../user/homepage.php?id=".$getid."')</script>";
		 }
		 
		 
  }else if($gettype=="back"){
	  
	  
		if ((($_FILES["file2"]["type"] == "image/jpg")|| ($_FILES["file2"]["type"] == "image/jpeg")|| ($_FILES["file2"]["type"] == "image/pjpeg")||($_FILES["file2"]["type"] == "image/png"))&& ($_FILES["file2"]["size"] < 2000000)){
					if ($_FILES["file2"]["error"] > 0){
						echo "Return Code: " . $_FILES["file"]["error"] . "<br />";
					 }else{
						if (file_exists("../img/back/" . $_FILES["file2"]["name"])){
						  echo "<script>alert('请勿频繁上传')<script>";
						 }else{
						  move_uploaded_file($_FILES["file2"]["tmp_name"],"../img/back/"  .$getid."-".date("ymdhi").".jpg");
$line=mysql_connect('qdm16147017.my3w.com','qdm16147017','19981102aa');
//$line=mysql_connect('localhost','root','root');
							 if($line){
mysql_select_db('qdm16147017_db',$line) or die( '错误'.mysql_error()); 
//""
								mysql_query("SET NAMES 'utf8'");
								$sql=mysql_query("update user set backimg='../img/back/" .$getid."-".date("ymdhi").".jpg' where id=".$getid.";");
										 if($sql){
											 echo "<script>alert('上传成功');location.replace('../user/homepage.php?id=".$getid."')</script>";
										 }else{
											 echo "<br>".mysql_error();
											}
							 }
						  
						  
						 }
					}
		  }else{
		  echo "<script> alert('无效文件');location.replace('../user/homepage.php?id=".$getid."')</script>";
		 }	  
	  	  
}else if($gettype=="bgcolor"){
	     $getcolor = $_POST['bgcolor'];
$line=mysql_connect('qdm16147017.my3w.com','qdm16147017','19981102aa');
//$line=mysql_connect('localhost','root','root');
		if($line){
mysql_select_db('qdm16147017_db',$line) or die( '错误'.mysql_error()); 
//""
			mysql_query("SET NAMES 'utf8'");
			$sql=mysql_query("update user set bgcolor='".$getcolor."' where id=".$getid.";");
			if($sql){
				 echo "<script>alert('更改成功');location.replace('../user/homepage.php?id=".$getid."')</script>";
			}else{
				 echo "<br>".mysql_error();
			}
		}
	}
?>
</body>
</html>
