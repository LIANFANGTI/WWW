<!doctype html>
<html>
<head>
<meta charset="utf-8">
<link href="css.css" rel="stylesheet" type="text/css">
<title>Add</title>
</head>

<body>

<div id="title"><a href="index.php"><img  id="logo" src="./img/logo .jpg"/></a></div>

<div class="d2">

	<form name="FORM" id="FORM"  method="post" action="up.php" >


        <fieldset>

        	<legend>所属单元:</legend>
<?php
     $getunit=$_GET['unit'];
	 //echo $getunit;
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
		    echo"   <select  name='danyuan' id='dan' style='width:800px; font-size:40px;height:70px;'>";
					echo"<option value='请选择'  selected='selected'>请选择</option>";
		   for($i=0;$i<count($unit);$i++){
			   if($getunit==$unit[$i]){
				   echo "<option value='".$unit[$i]."' selected='selected' >".$unit[$i]."</option>";
				   }
			    echo "<option value='".$unit[$i]."'>".$unit[$i]."</option>";
			   }
		   echo "</select><a href='javascript:add()'><u>添加</u></a></fieldset>";
	 }
	 ?>
        <fieldset>
        	<legend>内容：</legend>
		 标题：<input type="text" class="opti" name="title">
       	 <textarea id="text1" rows="10" cols="30" name="content" style="font-size:50px;"></textarea>
		温馨提示：请手动加HTML格式
        </fieldset> 
       <input type='text'  name='gettype' value='add2' style='display:none;'>
      </form>
     <div class="ba2" onClick="check()">提交</div>
</div>
<script>
function add(){
	addstr=prompt("请输入新项目内容")
	var selectObj=document.getElementById("dan");  
    //alert(selectObj.length);
	if(addstr!=null){
		    selectObj.options[selectObj.length] = new Option(addstr, addstr,true,true);  		
		}  
	}
function check(){
		 var type="选择题"
		 var trued
		 var casen=[]
		 var content
		 var ps="无"
		 var msgbox="",counterror=0,countcase,yesorno="no"
//单元选择
if(document.FORM.danyuan.value=="请选择"){
		counterror=counterror+1
		msgbox=msgbox+counterror+"、请选择项目\n"
	}
//content内容赋值
		if(document.FORM.content.value==""){
			counterror=counterror+1
				msgbox=msgbox+counterror+"、请输入内容\n"
			}else{
				var content=document.FORM.content.value	
				}
//titile内容
		if(document.FORM.title.value==""){
			counterror=counterror+1
				msgbox=msgbox+counterror+"、请输入标题\n"
			}else{
				var content=document.FORM.title.value	
				}

	if(msgbox==""){
		alert("提交成功")
		submit()		
  }else{
	  		  alert("出现以下错误\n"+msgbox)
		}
}
 function submit(){
		  	document.getElementById("FORM").submit()
		    } 

</script>
</body>
</html>