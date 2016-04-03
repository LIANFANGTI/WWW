<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>内容管理</title>
<link href="css.css" rel="stylesheet" type="text/css">
</head>

<body>
<div id="title"><a href="index.php"><img  id="logo" src="./img/logo .jpg"/></a></div>

<div id="m1" class="ba" onClick="this.style.display='none';m2.style.display='block';timu.style.display='none';con.style.display='block'">题目管理</div>
<div id="m2" class="ba" onClick="this.style.display='none';timu.style.display='block';m1.style.display='block';con.style.display='none'">目录管理</div>
<?php
    
$getuser=$_GET['user'];
echo"<div id='timu' style='display:none;'>";

     if($getuser!="admin"){
          echo "<script>location.replace('index.php')
                     alert('请输入管理密码')
               </script>";

       }
$line=mysql_connect('qdm16147017.my3w.com','qdm16147017','19981102aa');
//$line=mysql_connect('localhost','root','root');
 	 if($line){
		//echo "版本信息".mysql_get_client_info();
		//echo "<br>链接类型".mysql_get_host_info();
		//echo "<br>协议版本".mysql_get_proto_info();
		//echo "<br>工作状态".mysql_stat();
		mysql_select_db('qdm16147017_db',$line) or die( '错误'.mysql_error());
mysql_select_db('qdm16147017_db',$line) or die( '错误'.mysql_error());
//""
		$sql3="SELECT * FROM topic";

		if(!empty($_POST['sub'])){
			$a=$_POST['text'];
            echo "<script>aler('".$a."')</script>";
		}
	    mysql_query("SET NAMES 'utf8'");
		$sql=mysql_query($sql3);
	    $rows=mysql_num_rows($sql);
		$cols=mysql_num_fields($sql);
		$i=0;
		while($row=mysql_fetch_array($sql)){
   		 $tid[]=$row["id"];       //获取ID
		 $ttype[]=$row["type"];    //类型
		 $ttrued[]=$row["trued"]; //正确答案
		 $tcontent[]=$row["content"];//内容
		 $tcase1[]=$row["case1"];//A
		 $tcase2[]=$row["case2"];//B
		 $tcase3[]=$row["case3"];//C
		 $tcase4[]=$row["case4"];//D
		 
          }
		 
		  $long= count($tid);
		 
		  for($i=0;$i<$long;$i++){
			$j=$i+1;
			 echo "<div class='ba3'>";
			 $out="<b>". $j."、".$tcontent[$i]."</b><br>";
			 echo $out."";
		     echo "<a href='ed.php?id=".$tid[$i]."'><div class='to'>修改</div></a><a hef='del.php?id=".$tid[$i]."&type=topic'><div class='to' onclick='del(".$tid[$i].")' >删除</div></a></div>";
		  }
		  echo "</div>";

		  //echo $out."</div>";
		  
//+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
	echo "<div id='con' style='display:none;'>";	  
		 mysql_query("SET NAMES 'utf8'");//SQL读取中文乱码解决
		 $sql4=mysql_query("SELECT unit,count(*) from content group by unit order by ps;");        //SQL执行		
	     $rows4=mysql_num_rows($sql4);     //行读取 
		 $cols4=mysql_num_fields($sql4);
		 while($row=mysql_fetch_array($sql4)){
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
						  	
						   echo "<div  class='gml1' onclick='display(".$i.")'>".$unit[$i]."</div>";
						 for($j=0;$j<$count2[$i];$j++){
                            echo "<div class='".$i."' style=' background:#fff;width:100%;float:left;font-size:60px; padding:50px 0px 50px 35px;border-bottom-color:black;border-bottom-width:2px;border-bottom-style:solid;display:none;'> ".$title[$j]."<a href='javascript:var yn=confirm(\"确定删除？\");if(yn){window.open(\"del.php?id=".$id[$j]."&type=con\");this.style.display=\"none\"}' style='float:right; margin:0px 60px 0px 0px;'><b color='red'>删除</b></a><a href='ed2.php?id=".$id[$j]."' style='float:right;margin:0px 60px 0px 0px;''><b color='blue'>编辑</b></a></div>";
								}
							echo "<div onClick='window.open(\"add2.php?unit=".$unit[$i]."\");'  class='".$i."' style=' background:#fff;width:100%;float:left;font-size:40px; padding:50px 0px 50px 35px;border-bottom-color:black;border-bottom-width:2px;border-bottom-style:solid;text-align:center; display:none;'>添加</div>";
			echo "</div>";
					}
		 

	 }
	 
	 
	 
	 
	 
	 
	 
	 
  ?>
<script>
	function del(a){
		alert(a)
		
		}
		
var mod = new Array(100)
	for(i=0;i<mod.length;i++){
		mod[i]=0
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