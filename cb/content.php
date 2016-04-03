<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Content</title>
 <link href="css.css" rel="stylesheet" type="text/css">
</head>

<body>
 <a name="top"></a>
<!--
<div id="title"><a href="index.php"><img  id="logo" src="./img/logo .jpg"/></a></div>

   <div class="tools">

      <div id="clock">1234</div>

      <div id="date">2015年<br>4月31日<br>星期四</div>

      <div  id="set1" onClick="night()"><img id="sun"src="./img/sun.jpg"></div>

      <div class="set" id="set2" onClick="display('set')">设置</div>

   </div>

   

   <div id="conset">

      <div class="cs" onClick="">

        <img  class="cspic" src="./img/color_set.jpg">

      </div>

      <div class="cs" id="yej" onClick="night()"><img class="cspic" src="./img/moon.jpg"></div>

      <a href="Add.php"><div class="cs">加</div></a>

      <div class="cs" onClick="password()">管</div> 

      <div class="cs">关</div>

      <div class="cs">关</div>

      <div class="cs">关</div>

   </div> -->
<?php

	
$line=mysql_connect('qdm16147017.my3w.com','qdm16147017','19981102aa');
//$line=mysql_connect('localhost','root','root');
	 if($line){
mysql_select_db('qdm16147017_db',$line) or die( '错误'.mysql_error());
//""
		 
		 $sql3="SELECT unit,count(*) from content group by unit order by ps;";  //SQL语句
		 mysql_query("SET NAMES 'utf8'");//SQL读取中文乱码解决
		 $sql=mysql_query($sql3);        //SQL执行		
	     $rows=mysql_num_rows($sql);     //行读取 
		 $cols=mysql_num_fields($sql);
		 while($row=mysql_fetch_array($sql)){
			 $unit[]=$row["unit"];
			 $count2[]=$row["count(*)"];
		   }
		   $count1= count($unit);
		   echo "<table width='100%' border='1'>";
		   
				 for($i=0;$i<$count1;$i++){
						 unset($id);unset($unit2);unset($title);unset($content);			 	
						
						 $sql2=mysql_query("select * from content where unit='".$unit[$i]."'" );
                         $rows2=mysql_num_rows($sql2);
						 $cols2=mysql_num_fields($sql2);
						 while($row=mysql_fetch_array($sql2)){
						   $id[]=$row["id"];
						   $unit2[]=$row["unit"];
						   $title[]=$row["title"];
						   $content[]=$row["content"];
						  }
						  	
						   echo "<div  class='ba2' onclick='display(".$i.")'>".$unit[$i]."</div>";
						 for($j=0;$j<$count2[$i];$j++){
                            echo "<div class='".$i."' style=' background:#fff;width:100%;float:left;font-size:60px; padding:50px 0px 50px 35px;border-bottom-color:black;border-bottom-width:2px;border-bottom-style:solid;'> ".$title[$j]."<a href='#' style='float:right; margin:0px 60px 0px 0px;'><b color='red'>删除</b></a><a href='ed2.php?id=".$id[$j]."' style='float:right;margin:0px 60px 0px 0px;''><b color='blue'>编辑</b></a></div>";
								}
					 }
			 echo"</table>";
	}
?>
<script>
	var mod = new Array(100)
	for(i=0;i<mod.length;i++){
		mod[i]=1
		}
	function display(a){
	mod[a]++
	//alert(a)
	 cn=document.getElementsByClassName(a)
	 leng=cn.length
	 for(i=0;i<leng;i++){
			 if( mod[a]%2==0){
			 	cn.item(i).style.display="none"
				
			 }else{
				cn.item(i).style.display="block"
				 
				 }
		 }
	
    }
		
</script>
</body>
</html>