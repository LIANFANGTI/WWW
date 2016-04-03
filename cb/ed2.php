
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<link href="css.css" rel="stylesheet" type="text/css">
<title>编辑</title>
</head>

<body>
<div id="title"><a href="index.php"><img  id="logo" src="./img/logo .jpg"/></a></div>
<?php
    $getid=$_GET['id'];
	echo "获取id：".$getid;
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
	 $sql2=mysql_query("select unit,count(*) from content group by unit order by ps");
	 $rows=mysql_num_rows($sql2);$cols=mysql_num_fields($sql2);
	 while($row=mysql_fetch_array($sql2)){
	 	  $count2[]=$row["count(*)"];
		  $unit2[]=$row["unit"];
	 	  }
	echo "<div class='d2'><form name='FORM' id='FORM'  method='post' action='up.php' > <fieldset><legend>所属单元:</legend>";
    echo "<select  name='danyuan' id='dan' style='width:800px; font-size:40px;height:70px;'>";
	echo"<option value='请选择' >请选择</option>";
	for($i=0;$i<count($unit2);$i++){
		if($unit[0]==$unit2[$i]){
			 echo "<option value='".$unit[0]."' selected='selected' >".$unit[0]."</option>";
			}else{
			  echo "<option value='".$unit2[$i]."'>".$unit2[$i]."</option>";
			}		
		}  
	echo "</select>" ;     	
	
	echo "</fieldset><fieldset><legend>内容:</legend>";
    echo "标题：<input type='text' class='opti' name='title' value='".$title[0]."'>";
    echo "<textarea id='text1' rows='10' cols='30' name='content' style='font-size:50px;'>".$content[0]."</textarea><br>温馨提示：请手动加HTML格式";
	
	//echo "<div class='d1'><h1>".$title[0]."</h1><br>".$content[0]."<a href='index.php#top'><div class='ba' >BACK↩</div></a></div>";
	echo "</fieldset>";
	echo "<input type='text'  name='gettype' value='ed2' style='display:none;'>";
	echo "<input type='text'  name='getid' value='".$getid."' style='display:none;'>";
	echo "<div class='ba2' onclick='submit()' >SAVE</div>";
    echo "</form></div>";
 }
?>

<script>
 	function submit(a,b,c){
		 document.getElementById("FORM").submit()
		    } 
</script>
</body>
</html>