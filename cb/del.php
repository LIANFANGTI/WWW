<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>删除</title>
</head>

<body onLoad="load()">



<?php
				    $getid=$_GET['id'];
	    			$gettype=$_GET['type'];
					echo $getid."<br>";
					echo $gettype;
					switch($gettype){
						case "topic":
						 $sql3= "delete   from topic where id=".$getid.";";
						break;
						case "con":
						 $sql3= "delete   from content where id=".$getid.";";
						break;
						}
					
			
$line=mysql_connect('qdm16147017.my3w.com','qdm16147017','19981102aa');
//$line=mysql_connect('localhost','root','root');
					if($line){
mysql_select_db('qdm16147017_db',$line) or die( '错误'.mysql_error());
//""
						$sql=mysql_query($sql3);
						if($sql){
								echo "<script>alert('成功删除')</script>";
								echo "<script>window.close()</script>";
							}else{
								echo "<br>".mysql_error();
							}
					
					}
				
				
				?>
</body>
</html>