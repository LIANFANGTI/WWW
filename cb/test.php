<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>排版系统TEST</title>
</head>

<body>
<?php
 $bm=array(40,10,15,30,20,10,5,7,25,10,10);
 $bmname=array("部门1","部门2","部门3","部门4","部门5","部门6","部门7","部门8","部门9","部门10","部门11",);
 echo "<table border='1' width='100%'>";
 echo"<tr align='center'>";
 echo"<td>周日</td><td>周一</td><td>周二</td><td>周三</td><td>周四</td><td>周五</td>";
 echo "<tr>";
 echo"</table>";
 for($i=1;$i<=count($bm);$i++){
	 echo $i;
	 }
?>
</body>
</html>