<!doctype html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>dipseing....</title>
</head>

<body>

<?php

 $gettype = $_POST['gettype'];
	switch ($gettype){
//题目添加提交+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++=
	case "add":
		  $content = $_POST['content'];
		  $trued = $_POST['trued'];
		  $case1 = $_POST['opt1'];
		  $case2 = $_POST['opt2'];
		  $case3 = $_POST['opt3'];
		  $case4 = $_POST['opt4'];
		  $danyuan = $_POST['danyuan'];
		  $type = $_POST['type'];
	 	  echo "当前提交类型为添加";
		  echo "<br>题目范围：".$danyuan;
		  echo "<br>题目类型：".$type;
		  echo "<br>正确答案：".$trued;
		  echo "<br>内容：".$content;
		  echo "<br>选项A：".$case1;
		  echo "<br>选项B：".$case2;
		  echo "<br>选项C：".$case3;
		  echo "<br>选项D：".$case4;
		  echo "<br>".$gettype;
$line=mysql_connect('qdm16147017.my3w.com','qdm16147017','19981102aa');
//$line=mysql_connect('localhost','root','root');
	 	  if($line){
				//echo "版本信息".mysql_get_client_info();
				//echo "<br>链接类型".mysql_get_host_info();
				//echo "<br>协议版本".mysql_get_proto_info();
				//echo "<br>工作状态".mysql_stat();
mysql_select_db('qdm16147017_db',$line) or die( '错误'.mysql_error());
//""
				$sqls=" insert into topic(type,trued,case1,case2,case3,case4,content,ps) values('".$type."','".$trued."','".$case1."','".$case2."','".$case3."','".$case4."','".$content."','".$danyuan."');";
				mysql_query("SET NAMES 'utf8'");
				$sql=mysql_query($sqls);
		 if($sql && mysql_affected_rows()>0){
			echo "<script>location.replace('Add.php')</script>";
			}else{
				echo "<br>".mysql_error();
			}
}
	    break; 
//内容添加提交+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
 case "add2":
     $unit= $_POST['danyuan'];
	 $title=$_POST['title'];
 	 $content= $_POST['content'];
	 switch($unit){
		 case "第一单元":
		 	$ps=1;
		 break;
		 case "第二单元":
		 	$ps=2;
		 break;
		 case "第三单元":
		 	$ps=3;
		 break;
		 case "第四单元":
		 	$ps=4;
		 break;
		 case "第五单元":
		 	$ps=5;
		 break;
		 case "第六单元":
		 	$ps=6;
		 break;
		 case "第七单元":
		 	$ps=7;
		 break;
		 default:
		 	$ps="a";
		 break;		 
		 }
	 echo $unit."<br>".$title."<br>".$content."<br>".$ps;
$line=mysql_connect('qdm16147017.my3w.com','qdm16147017','19981102aa');
//$line=mysql_connect('localhost','root','root');
	 	  if($line){
mysql_select_db('qdm16147017_db',$line) or die( '错误'.mysql_error());
//""
			   $sqls=" insert into content(unit,title,content,ps) values('".$unit."','".$title."','".$content."','".$ps."');";
			   mysql_query("SET NAMES 'utf8'");
			   $sql=mysql_query($sqls);
			   if($sql && mysql_affected_rows()>0){
			      echo "<script>window.close();</script>";
			       }else{
				      echo "<br>".mysql_error();
			 }
			  
			  
			  
			  
			  
			  
			  
			  }

 	 break; 
	 
//内容更改提交+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++	 
 case "ed2":
 	 $getid = $_POST['getid'];
     $unit= $_POST['danyuan'];
	 $title=$_POST['title'];
 	 $content= $_POST['content'];
	 switch($unit){
		 case "第一单元":
		 	$ps=1;
		 break;
		 case "第二单元":
		 	$ps=2;
		 break;
		 case "第三单元":
		 	$ps=3;
		 break;
		 case "第四单元":
		 	$ps=4;
		 break;
		 case "第五单元":
		 	$ps=5;
		 break;
		 case "第六单元":
		 	$ps=6;
		 break;
		 case "第七单元":
		 	$ps=7;
		 break;
		 default:
		 	$ps="a";
		 break;		 
		 }
	 echo "<h1>LOAOING...</h1>";//$unit."<br>".$title."<br>".$content."<br>".$ps;
$line=mysql_connect('qdm16147017.my3w.com','qdm16147017','19981102aa');
//$line=mysql_connect('localhost','root','root');
	 	  if($line){
mysql_select_db('qdm16147017_db',$line) or die( '错误'.mysql_error());
//""
			   $sqls=" update content set unit='".$unit."', title='".$title."', content='".$content."' where id=".$getid;
			   mysql_query("SET NAMES 'utf8'");
			   $sql=mysql_query($sqls);
			   if($sql && mysql_affected_rows()>0){
			      echo "<script>alert('保存成功');location.replace('update.php?user=admin')</script>";
			       }else{
				      echo "<br>".mysql_error();
			 }
			  
			  
			  echo "<script>location.replace('update.php?user=admin')</script>";
			  
			  
			  
			  
			  }

 	 break; 
//题目更改提交+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++	 
 case "update":
			  $content = $_POST['content'];
			  $trued = $_POST['trued'];
			  $case1 = $_POST['opt1'];
			  $case2 = $_POST['opt2'];
			  $case3 = $_POST['opt3'];
			  $case4 = $_POST['opt4'];
			  $danyuan = $_POST['danyuan'];
			  $type = $_POST['type'];
			  $getid = $_POST['getid'];
 		      echo "<br>修改id为".$getid;
		      echo "<br>题目范围：".$danyuan;
			  echo "<br>题目类型：".$type;
			  echo "<br>正确答案：".$trued;
			  echo "<br>内容：".$content;
			  echo "<br>选项A：".$case1;
			  echo "<br>选项B：".$case2;
			  echo "<br>选项C：".$case3;
			  echo "<br>选项D：".$case4;
			  echo "<br>".$gettype;
			  echo "<br>".$getid;
			  
$line=mysql_connect('qdm16147017.my3w.com','qdm16147017','19981102aa');
//$line=mysql_connect('localhost','root','root');
	 	  if($line){
mysql_select_db('qdm16147017_db',$line) or die( '错误'.mysql_error());
//""
				$sqls=" update topic set type='".$type."', trued='".$trued."', case1='".$case1."', case2='".$case2."', case3='".$case3."', case4='".$case4."', content='".$content."', ps='".$danyuan."' where id=".$getid;
				mysql_query("SET NAMES 'utf8'");
 
				$sql=mysql_query($sqls);
		 if($sql){
			echo "<script>location.replace('ed.php?id=".$getid."')</script>";
			}else{
				echo "<br>".mysql_error();
				}
		  }
	break; 
//登录++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
case "login":
			  $getuser = $_POST['user'];
			  $getpwd=$_POST['pwd'];
 		      //echo "用户".$getuser."<br>密码".$getpwd;
		      
			  
$line=mysql_connect('qdm16147017.my3w.com','qdm16147017','19981102aa');
//$line=mysql_connect('localhost','root','root');
	 	  if($line){
mysql_select_db('qdm16147017_db',$line) or die( '错误'.mysql_error());
//""
			      $sql3="SELECT * from user";  //SQL语句
				  mysql_query("SET NAMES 'utf8'");//SQL读取中文乱码解决
			      $sql=mysql_query($sql3);        //SQL执行		
			      $rows=mysql_num_rows($sql);     //行读取 
			      $cols=mysql_num_fields($sql);
				  while($row=mysql_fetch_array($sql)){
					   $id[]=$row["id"];
					   $user[]=$row["user"];
					   $pwd[]=$row["password"];
				   }
				    $a=0;
				  for($i=0;$i<count($id);$i++){
					  if($getuser==$user[$i]&&$getpwd==$pwd[$i]){
						  $a++;
						  echo "<script>location.replace('user/homepage.php?id=".$id[$i]."')</script>";
						  @session_start();
						  $_SESSION['logined']=$id[$i];
					   }else if($getuser==$user[$i]){
						  
						  $a++;
						
						  if($getpwd!=$pwd[$i]){echo "<script>alert('用户名或密码错误');location.replace('./user/login.php?action=login')</script>";}
					   }
					   		
							 
				    }
                      if($a==0){echo "<script>alert('账户不存在');location.replace('./user/login.php?action=login')</script>";}
		  }
	break; 
//注册++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
case "singup":
			  $getuser = $_POST['user'];
			  $getpwd=$_POST['pwd'];
 		      //echo "用户".$getuser."<br>密码".$getpwd;
		     
			  
$line=mysql_connect('qdm16147017.my3w.com','qdm16147017','19981102aa');
//$line=mysql_connect('localhost','root','root');
	 	  if($line){
mysql_select_db('qdm16147017_db',$line) or die( '错误'.mysql_error());
//""
				  mysql_query("SET NAMES 'utf8'");//SQL读取中文乱码解决
			      $sql=mysql_query("select * from user;");        //SQL执行		
			      $rows=mysql_num_rows($sql);     //行读取 
			      $cols=mysql_num_fields($sql);
				 while($row=mysql_fetch_array($sql)){
					   $user[]=$row["user"];
				   }
				   $count1=0;
				  
				for($i=0;$i<count($user);$i++){
					if($getuser==$user[$i]){$count1++;}			
					}
					
				if($count1>0){echo"<script>alert('该用户已存在');location.replace('./user/singup.php')</script>";}else{
					
					$sql2=mysql_query(" insert into user(user,password,type) values('".$getuser."','".$getpwd."','普通用户');");
						if($sql && mysql_affected_rows()>0){
							echo "<script>alert('注册成功');location.replace('./user/login.php?action=login')</script>";
						}else{
							echo "<br>".mysql_error();
						}
					}
				  
		  }
	break; 
	
//用户资料修改++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
	case "user_set":
		$getname = $_POST['name'];
	    $getqq=$_POST['qq'];
		$getmail=$_POST['mail'];
		$getphone=$_POST['phone'];
		$getbirth=$_POST['birth'];
		$getid =$_GET['id'];
		echo "loading...";
$line=mysql_connect('qdm16147017.my3w.com','qdm16147017','19981102aa');
//$line=mysql_connect('localhost','root','root');
	 	  if($line){
mysql_select_db('qdm16147017_db',$line) or die( '错误'.mysql_error());
//""
			   $sqls=" update user set name='".$getname."', qq='".$getqq."', mail='".$getmail."',phone='".$getphone."',birth='".$getbirth."' where id=".$getid;
			   mysql_query("SET NAMES 'utf8'");
			   $sql=mysql_query($sqls);
			   if($sql){
			      echo "<script>alert('保存成功');location.replace('./user/homepage.php?id=".$getid."')</script>";
			       }else{
				      echo "<br>".mysql_error();
			 }
			  
			  

			   }
	break; 
	case "tp":
		  $name = $_POST['name'];
		  $option = $_POST['option'];
$line=mysql_connect('qdm16147017.my3w.com','qdm16147017','19981102aa');
//$line=mysql_connect('localhost','root','root');
	 	  if($line){
mysql_select_db('qdm16147017_db',$line) or die( '错误'.mysql_error());
//""
				//$sqls=" insert into toupiao(option,name) values('".$option."','".$name."');";
				$sqls="";
				mysql_query("SET NAMES 'utf8'");
				$sql=mysql_query(" insert into toupiao(option1,name1) values('".$option."','".$name."');");
		 if($sql && mysql_affected_rows()>0){
			echo "<script>alert('ok');;location.replace('toupiao.php')</script>";
			}else{
				echo "<br>".mysql_error();
			}
}
	    break; 
}


	

?>
</body>
</html>