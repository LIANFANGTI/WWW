<!doctype html>
<?php 
$getid=$_GET['id'];
@session_start();
	if(!isset($_SESSION['logined'])){
			echo "<script>location.replace('login.php')</script>";
		}else if($_SESSION['logined']!=$getid){
			echo "<script>location.replace('homepage.php?id=".$_SESSION['logined']."')</script>";
		}
?>
<html>
<head>
	<title>个人主页</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link href="../css.css" rel="stylesheet" type="text/css">
    <script src="../js/js.js" type="text/javascript"></script>
    
		<style type="text/css">
         .body{
			
			 -moz-background-size:100% 100%; /* 老版本的 Firefox */
			 background-size:100% 100%;
			 background-repeat:no-repeat;
			 }

		
    </style>
</head>
<body>

<?php 
$getid=$_GET['id'];
$line=mysql_connect('qdm16147017.my3w.com','qdm16147017','19981102aa');
//$line=mysql_connect('localhost','root','root');
  if($line){
mysql_select_db('qdm16147017_db',$line) or die( '错误'.mysql_error()); 


	mysql_query("SET NAMES 'utf8'");
	$sql=mysql_query("select * from user where id=".$getid.";");
		while($row=mysql_fetch_array($sql)){
   		 $id[]=$row["id"];       //获取ID
		 $user[]=$row["user"];    //类型
		 $head[]=$row["head"];
		 $back[]=$row["backimg"];
		 $name[]=$row["name"];
		 $type[]=$row["type"]; //正确答案
		 $lv[]=$row["lv"];//内容
		 $qq[]=$row["qq"];//A
		 $mail[]=$row["mail"];//B
		 $phone[]=$row["phone"];//C
		 $birth[]=$row["birth"];//D
		 $bgcolor[]=$row["bgcolor"];
		 $exp[]=$row["exp"];
		 $lvstar="";
        }	
	for($i=1;$i<=$lv[0];$i++){$lvstar=$lvstar."★";}
	
	echo "<div style='height:auto; width:100%; background-color:".$bgcolor[0]."; display:none;'  id='set'>";
    echo "<div class='imgtest2' onClick='selectfile()'><img src='".$head[0]."'/ ></div>";
    echo "<div class='imgtest2' onClick='FORM3.style.display=\"block\";bgcolor.click()'><img src='../img/color_set.jpg'/ ></div>";
    echo "<div class='imgtest2' onClick='file2.click()'><img src='".$back[0]."'/ ></div>";
	echo "<div class='imgtest2' onClick='userset()'><img src='../img/bj.png'></div>";
	echo "<div class='imgtest2' onClick='displayid(\"set\")'><img src='../img/close.png'></div>";
    echo "</div>";
	echo "<div class='body'  style=' padding-bottom:100px;background-image:url(".$back[0].");'>";
	echo "<div align='right' style='margin:0px 20px;color:#ddd; float:right; width:100px;'onClick='displayid(\"set\")'>设置</div>";
    echo "<div align='center'><div class='imgtest'> <img src='".$head[0]."' /></div>";
	echo "<p><sapn style='color:#eee;-webkit-box-shadow:0 0 30px #555;box-shadow:0 0 30px #fff;padding:0px 15px;width:auto;border-radius:180px;' align='center'>".$name[0]."</sapn></p></div>";
	echo "<div align='center' style='color:red;'>".$lvstar."</div>";
	echo "</div>";
	
	
	echo "<div  id='user_infor' tyle='padding:00px auto auto 20px;  background-color:".$bgcolor[0].";' >";
	echo "<a href='../index.php'><img src='../img/zhuye.png' height='100px' width='100px'/></a>";
	
		echo "<div class='hzl'>账号：".$user[0]."</div>";
		echo "<div class='hzl'>账户类型：".$type[0]."</div>";
		echo "<div class='hzl'>等级：<b color='red'>".$lv[0]."(".$exp[0]."/900)</b></div>";
		echo "<div class='hzl'>QQ：".$qq[0]."</div>";
		echo "<div class='hzl'>E-Mail：".$mail[0]."</div>";
		echo "<div class='hzl'>电话：".$phone[0]."</div>";
		echo "<div class='hzl'>生日：".$birth[0]."</div>";
	echo "</div>";
	
	echo "<div id='user_set' style='display:none;' >";
		echo "<form name='user_set' id='user_infor_set' style='display:;'  action='../up.php?id=".$id[0]."' method='post' enctype='multipart/form-data'>";
			echo "<div class='hzl'>昵称：<input type='text' value=".$name[0]." name='name'style='height:100px;width:700px;font-size:60px;border-radius:100px;' ></div>";
			echo "<div class='hzl'>QQ：<input type='text' value=".$qq[0]." name='qq'style='height:100px;width:700px;font-size:60px;border-radius:100px;' ></div>";
			echo "<div class='hzl'>E-Mail：<input type='email' value=".$mail[0]." name='mail'style='height:100px;width:700px;font-size:60px;border-radius:100px;'></div>";
			echo "<div class='hzl'>电话：<input type='text' value=".$phone[0]." name='phone'style='height:100px;width:700px;font-size:60px;border-radius:100px;'></div>";
			echo "<div class='hzl'>生日：<input type='date' value=".$birth[0]." name='birth' style='height:100px;width:700px;font-size:60px;border-radius:100px;'></div>";
			echo "<input type='text'  name='gettype' value='user_set' style='display:none; '>";		
		echo "</form>";
	echo"</div>";
	
	echo "<div align='center' id='bj' class='hzl' onClick='userset()'>编辑资料</div></div>";
		echo "<div  align='center' onClick=';location.replace(\"login.php?action=logout\")'  style='padding:50px 0px 50px 0px; background-color:red;border-radius:250px; color:white; margin:20px 0px; solid #666;font-size:40px;' onClick=''>退出登录</div></div>";
		
	echo " <form name='FORM' id='FORM' style='display:none;'  action='upload.php?id=".$id[0]."&type=head' method='post' enctype='multipart/form-data'>";
	echo "<input type='file' name='file' onchange='selected(1)' id='file' />";
	echo "</form>";
	echo "";
	echo " <form name='FORM2' id='FORM2' style='display:none;' action='upload.php?id=".$id[0]."&type=back' method='post' enctype='multipart/form-data'>";
	echo "<input type='file' name='file2' onchange='selected(2)' id='file2' /></form>";
	echo " <form name='FORM3' id='FORM3' style='display:none;' action='upload.php?id=".$id[0]."&type=bgcolor' method='post' enctype='multipart/form-data'>";
	echo "<input type='color' name='bgcolor' id='bgcolor' onChange='cgcolor()' width='200' height='50' >";
	echo "</form>";
   }
?>


</body>
<script>
	function selectfile(){
		document.getElementsByName("file").item(0).click()	
		}
	function selected(a){
		if(a==1){
		 document.getElementById("FORM").submit()
			}else{
		 document.getElementById("FORM2").submit()
			}
		}
	function cgcolor(){
	 document.getElementById("FORM3").submit()
		}
		
		var ai=0
	function displayid(a){
	  	    ai++
		
	    cn=document.getElementById(a)
		if(ai%2==0){
		  cn.style.display="none"
		  FORM3.style.display="none"
		}else{
		  cn.style.display="block"
		  FORM3.style.display="block"
	    }
	}
	var lft=1;
    function userset(){
		lft++
		if(lft%2==0){
			document.getElementById("user_infor").style.display='none'
			document.getElementById("set").style.display='none'
			document.getElementById("user_set").style.display='block'
			document.getElementById("bj").innerHTML='保存'
			document.getElementById("bj").style.display='block'
			
		}else{
			document.getElementById("user_infor_set").submit();
			
			}
	}
</script>
</html>