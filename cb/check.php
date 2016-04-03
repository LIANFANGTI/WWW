<!doctype html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>测验结果</title>
<link href="css.css" rel="stylesheet" type="text/css">
</head>

<body>

<div id="title"><a href="index.php"><img  id="logo" src="./img/logo .jpg"/></a></div>
<?php
$line=mysql_connect('qdm16147017.my3w.com','qdm16147017','19981102aa');
//$line=mysql_connect('localhost','root','root');
	 if($line){
mysql_select_db('qdm16147017_db',$line) or die( '错误'.mysql_error());
//""
		$sql3="SELECT * FROM topic";
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
		 $trued=0; $count=0;
		 
		 $out="";
          }
		 // echo "c".$tid[0];
		  $long= count($tid);
		  echo "<table border='1' bordercolor='#3399CC' width='99.5%'>";
		  echo "<tr align='center'><td width='20%'>题号</td><td width='40%'>你的答案</td><td width='40%'>正确答案</td></tr>";
		  	for($i=0;$i<$long;$i++){
				 $count=$count+1;
				 $answer[]=$_POST['c'.$tid[$i]];
				 
				 if($answer[$i]==$ttrued[$i]){
					 $trued=$trued+1;
					 echo "<tr align='center'><td>".$count."</td><td width='200px'>". $answer[$i]."   <b color='#0f0'>√</b></td><td>".$ttrued[$i]."</td></tr>";
				 }else{
				 echo "<tr align='center'><td>".$count."</td><td width='200px'>". $answer[$i]."   <b color='red'>×</b></td><td>".$ttrued[$i]."</td></tr>";				 
				 }
				 
				
				}
			echo "</table>";
				echo "<h1>得分:<b color='red' >".intval($trued/$count * 100) ."</b></h1><br>共".$count."道题目<br>答对了".$trued."道<br>正确率".number_format($trued/$count * 100,2) ."%";
		 
		 
		 
		//  echo $long;
	 }
	 /*
$content = $_POST['content'];
 $trued = $_POST['trued'];
 $case1 = $_POST['opt1'];
 $case2 = $_POST['opt2'];
 $case3 = $_POST['opt3'];
 $case4 = $_POST['opt4'];
 $danyuan = $_POST['danyuan'];
 $type = $_POST['type'];
 $gettype = $_POST['gettype'];
 */
 
?>
</body>
</html>