<!doctype html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>检测练习</title>
<link href="css.css" rel="stylesheet" type="text/css">
</head>

<body onload="load()">

<div id="title1"><a href="index.php"><img  id="logo" src="./img/logo .jpg"/></a></div>

   <div class="tools">
      <div id="countdown"></div>
      <div id="data"></div>
   </div>
 
 
<div class="ba3" >.</div>

<?php

$line=mysql_connect('qdm16147017.my3w.com','qdm16147017','19981102aa');
//$line=mysql_connect('localhost','root','root');
	 if($line){
		//echo "版本信息".mysql_get_client_info();
		//echo "<br>链接类型".mysql_get_host_info();
		//echo "<br>协议版本".mysql_get_proto_info();
		//echo "<br>工作状态".mysql_stat();
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
		 $out="";
          }
		 
		  $long= count($tid);

echo "<div id='ba4' onclick='fuzhi(".$long.")'>点击开始</div>";
echo "<script>fuzhi(".$long.")</script>";

		   echo "<div id='ba5'><form name='FORM' id='FORM'  method='post' action='check.php' >";
	
for($i=0;$i<$long;$i++){
 
	    $radioa="<br><label><div onClick='this.style.background=\"#778\";o2.style.background=\"\";o3.style.background=\"\";o4.style.background=\"\"' id='o1'><input type='radio'   name='c".$tid[$i]."' value='A'  class='radio'>A、".$tcase1[$i]."</br></div></label>";
		
		$radiob="<br><label><div onClick='this.style.background=\"blue\";o1.style.background=\"\";o3.style.background=\"\";o4.style.background=\"\"' id='o2'><input type='radio'   name='c".$tid[$i]."' value='B'  class='radio'>B、".$tcase2[$i]."</br></div></label>";
		
		$radioc="<br><label><div onClick='this.style.background=\"blue\";o1.style.background=\"\";o2.style.background=\"\";o4.style.background=\"\"' id='o3'><input type='radio'   name='c".$tid[$i]."' value='C'  class='radio'>C、".$tcase3[$i]."</br></div></label>";
		$radiod="<br><label><div onClick='this.style.background=\"blue\";o1.style.background=\"\";o2.style.background=\"\";o3.style.background=\"\"' id='o4'><input type='radio'   name='c".$tid[$i]."' value='D'  class='radio'>D、".$tcase4[$i]."</br></div></label>";
		$j=$i+1;
	    $out=$out ."<b>". $j."、".$tcontent[$i]."</b><br>".$radioa.$radiob.$radioc.$radiod."<hr color='black'>";
		
		  }
		  echo "<input type='button' value='123' width='100' height='100' onClick='aa()'>";
 function next1(){
	 echo "nex函数";
	 }
	 
	 function aa()
{
  echo "<script>alert('dfs')</script>";
}
	
		  echo $out."<input type='text'  name='gettype' value='ceshi' style='display:none;'><div class='ba2' onclick='next1()'>提交答案</div><br></form></div>";
	 }

	
   ?>
   
<script>
//var ztime=parseInt(prompt("输入秒",""))

var ztime
function fuzhi(a){
 ztime=a * 15 	
var h1=Math.floor(ztime / 3600) 
var m1=Math.floor((ztime - 3600 *h1 )/60) 
var s1=Math.floor(ztime - m1 * 60 - h1 * 3600) 
var atime=ct(h1)+":"+ct(m1)+":"+ct(s1)
alert(atime)
data.innerHTML="共<b color='red'>"+a+"</b>道题<br>总时间为"+atime+"</div>"

stime(a)

}
function stime(a){
var h=Math.floor(ztime / 3600) 
var m=Math.floor((ztime - 3600 *h )/60) 
var s=Math.floor(ztime - m * 60 - h * 3600) 
//alert("ztime值:"+ztime+"  h:"+h+"   m:"+m +"s:"+s)
countdown.innerHTML=ct(h)+":"+ct(m)+":"+ct(s)
document.title=ct(h)+":"+ct(m)+":"+ct(s)
ztime=ztime -1

t=setTimeout('stime(0)',100+6)
if(ztime<0){
   clearTimeout(t)
   alert("时间到\n自动交卷中...")
   submit(1)
	}
 

}
 
function ct(i)

{

if (i<10) {
    i="0" + i
   }
    return i
}
function submit(a){
        if(a==1){
      document.getElementById("FORM").submit();
       }else{
				if(confirm('是否提交？')){
				document.getElementById("FORM").submit();
			}else{}
			    } 
  }
</script>
</body>
</html>