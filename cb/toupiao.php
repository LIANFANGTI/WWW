<!doctype html>
<html>
<head>
<meta charset='utf-8'>
<title>无标题文档</title>
<style >
.div{
	}
</style>
</head>

<body>
<div style='width:100%; font-size:50px;' >
<h1>记录一下</h1>
<h3>6.14日同学会，上午真人cs<br>
，下午在学校弄完后开毕业晚会。</h3>
<?php 
$line=mysql_connect('qdm16147017.my3w.com','qdm16147017','19981102aa');
//$line=mysql_connect('localhost','root','root');
	 if($line){
mysql_select_db('qdm16147017_db',$line) or die( '错误'.mysql_error());
//""
		 mysql_query("SET NAMES 'utf8'");//SQL读取中文乱码解决
		 $sql=mysql_query("select * from toupiao ");
			 $rows=mysql_num_rows($sql);     //行读取 
			 $cols=mysql_num_fields($sql);
			 while($row=mysql_fetch_array($sql)){
				 $name[]=$row["name1"];
				 $option[]=$row["option1"];
			   }
	 }
			 for(i=1;i<count($option);i++){
				 
				 }
echo "<form name='FORM' id='FORM'  method='post' action='up.php' >";
echo "名字：<input type='text' name='name' style='background-color:#fff; border-radius:180px; height:55px; width:400px;font-size:50px;'><br><br>";

echo "<label><div style='background-color:yellow; height:70px; font-size:50px;border-radius:100px; border:#000 ridge;'  ><input type='radio' name='option' value='cs'>去cs</div></label><br>";

echo "<label><div style='background-color:yellow; height:70px; font-size:50px;border-radius:100px; border:#000 ridge;'  ><input type='radio' name='option' value='晚会'> 要去晚会</div></label><br>";

echo "<label><div style='background-color:yellow; height:70px; font-size:50px;border-radius:100px;border:#000 ridge;'  ><input type='radio' name='option' value='两者'>两者都去</div></label></br>";

echo"<label><div style='background-color:yellow; height:70px; font-size:50px;border-radius:100px;border:#000 ridge;'  ><input type='radio' name='option' value='都不'>两个都去不了</div></label><br>";

echo"<div style='background-color:red; height:70px; font-size:50px;border-radius:100px; text-align:center;' onClick='check()'>提交</div> <br>";
echo "<p>注：真人CS人数不到20这活动就取消，毕业晚会酒桌订在翡翠大酒店。实习生不用交钱，高复的同学需要交钱</p><input type='text'  name='gettype' value='tp'style='display:none;'></form>";
?>
</div>
<script>
var option1
option1=false
function check(){
 var name=document.getElementsByName('name').item(0).value
 var option=document.getElementsByName('option')
 for(i=0;i<option.length;i++){
	 if(option.item(i).checked){
		 	option1=true
		 }
	 }


if(name!=''&&option1){
	document.getElementById('FORM').submit();
	alert('提交成功')
	}else if(name==''){
	alert('请输入名字')	
	}else if(!option1){
	alert('请选择')	
	}
	
	}
</script>
</body>
</html>








