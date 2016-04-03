
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<link href="css.css" rel="stylesheet" type="text/css">
<title>Content</title>
</head>

<body>
<div id="title"><a href="index.php"><img  id="logo" src="./img/logo .jpg"/></a></div>
<?php
    $getid=$_GET['id'];
	//echo "获取id：".$getid;
$line=mysql_connect('qdm16147017.my3w.com','qdm16147017','19981102aa');
//$line=mysql_connect('localhost','root','root');
 if($line){
mysql_select_db('qdm16147017_db',$line) or die( '错误'.mysql_error());
//""
	 $sql3="SELECT * from content where id=".$getid.";";  //SQL语句
     mysql_query("SET NAMES 'utf8'");//SQL读取中文乱码解决
	 $sql=mysql_query($sql3);        //SQL执行		
	 $rows=mysql_num_rows($sql);     //行读取 
	 $cols=mysql_num_fields($sql);
	 while($row=mysql_fetch_array($sql)){
	   $id[]=$row["id"];
	   $unit[]=$row["unit"];
	   $title[]=$row["title"];
	   $content[]=$row["content"];
	  }
	  
	echo "<div class='d1'><h1>".$title[0]."</h1><br>".$content[0]."<div class='ba' onclick='window.close()'>BACK↩</div></div>";
	
		 
 }
?>
</body>
</html>