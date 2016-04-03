<!DOCTYPE html>
   <?php 
   		include("function.php");
		@session_start();
		if(!isset($_SESSION['username'])){
			//echo"session错误";
			echo"<script>window.location.href='login.php'</script> ";
		}else{
			$user=$_SESSION['username'];
			//echo"<script>alert('".$user."')<//script>";
		}
   ?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>用户管理</title>
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <link rel="stylesheet" type="text/css" href="lib/bootstrap/css/bootstrap.css">
    
    <link rel="stylesheet" type="text/css" href="stylesheets/theme.css">
    <link rel="stylesheet" href="lib/font-awesome/css/font-awesome.css">

    <script src="lib/jquery-1.7.2.min.js" type="text/javascript"></script>

    <!-- Demo page code -->

    <style type="text/css">
        #line-chart {
            height:300px;
            width:800px;
            margin: 0px auto;
            margin-top: 1em;
        }
        .brand { font-family: georgia, serif; }
        .brand .first {
            color: #ccc;
            font-style: italic;
        }
        .brand .second {
            color: #fff;
            font-weight: bold;
        }
    </style>

    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- Le fav and touch icons -->
    <link rel="shortcut icon" href="../assets/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="../assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="../assets/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="../assets/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="../assets/ico/apple-touch-icon-57-precomposed.png">
  </head>

  <!--[if lt IE 7 ]> <body class="ie ie6"> <![endif]-->
  <!--[if IE 7 ]> <body class="ie ie7 "> <![endif]-->
  <!--[if IE 8 ]> <body class="ie ie8 "> <![endif]-->
  <!--[if IE 9 ]> <body class="ie ie9 "> <![endif]-->
  <!--[if (gt IE 9)|!(IE)]><!--> 
  <body class=""> 
  <!--<![endif]-->
    
    <div class="navbar">
        <div class="navbar-inner">
                <ul class="nav pull-right">
                    
                    <li><a href="#" class="hidden-phone visible-tablet visible-desktop" role="button">Settings</a></li>
                    <li id="fat-menu" class="dropdown">
                        <a href="#" role="button" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="icon-user"></i><?php  echo $user;?>
                            <i class="icon-caret-down"></i>
                        </a>

                        <ul class="dropdown-menu">
                            <li><a tabindex="-1" href="#">我的账户</a></li>
                            <li class="divider"></li>
                            <li><a tabindex="-1" class="visible-phone" href="#">设置</a></li>
                            <li class="divider visible-phone"></li>
                            <li><a tabindex="-1" href="logout.php">注销</a></li>
                        </ul>
                    </li>
                    
                </ul>
                <a class="brand" href="index.php"><span class="first">Your</span> <span class="second">Company</span></a>
        </div>
    </div>
    


    
    <div class="sidebar-nav">
        <a href="#dashboard-menu" class="nav-header" data-toggle="collapse"><i class="icon-dashboard"></i>Dashboard</a>
        <ul id="dashboard-menu" class="nav nav-list collapse in">
            <li><a href="index.php">首页</a></li>
            <li class="active"><a href="users.php">用户管理</a></li>
            <li ><a href="user.php">Sample Item</a></li>
            <li ><a href="media.html">Media</a></li>
            <li ><a href="calendar.html">Calendar</a></li>
            
        </ul>

        <a href="#accounts-menu" class="nav-header" data-toggle="collapse"><i class="icon-briefcase"></i>Account<span class="label label-info">+3</span></a>
        <ul id="accounts-menu" class="nav nav-list collapse">
            <li ><a href="sign-in.html">Sign In</a></li>
            <li ><a href="sign-up.html">Sign Up</a></li>
            <li ><a href="reset-password.html">Reset Password</a></li>
        </ul>

        <a href="#error-menu" class="nav-header collapsed" data-toggle="collapse"><i class="icon-exclamation-sign"></i>Error Pages <i class="icon-chevron-up"></i></a>
        <ul id="error-menu" class="nav nav-list collapse">
            <li ><a href="403.html">403 page</a></li>
            <li ><a href="404.html">404 page</a></li>
            <li ><a href="500.html">500 page</a></li>
            <li ><a href="503.html">503 page</a></li>
        </ul>

        <a href="#legal-menu" class="nav-header" data-toggle="collapse"><i class="icon-legal"></i>Legal</a>
        <ul id="legal-menu" class="nav nav-list collapse">
            <li ><a href="privacy-policy.html">Privacy Policy</a></li>
            <li ><a href="terms-and-conditions.html">Terms and Conditions</a></li>
        </ul>

        <a href="help.html" class="nav-header" ><i class="icon-question-sign"></i>Help</a>
        <a href="faq.html" class="nav-header" ><i class="icon-comment"></i>Faq</a>
    </div>
    

    
    <div class="content">
        
        <div class="header">
            
            <h1 class="page-title">Users</h1>
        </div>
        
                <ul class="breadcrumb">
            <li><a href="index.php">Home</a> <span class="divider">/</span></li>
            <li class="active">Users</li>
        </ul>

        <div class="container-fluid">
            <div class="row-fluid">
                    
<div class="btn-toolbar">
    <button class="btn btn-primary"><i class="icon-plus"></i>添加用户</button>
    <button class="btn" onClick="edit()">快速编辑</button>
    <button class="btn">保存</button>
	<select class="btn" onChange="sx()" id="company">
    	<option>公司</option>
        <?php
			$line=mysql_connect('121.196.226.94','root','root');
			if($line){
				mysql_select_db('zckj_db',$line) or die( '错误'.mysql_error());
				mysql_query("SET NAMES 'utf8'");//SQL读取中文乱码解决
				$sql=mysql_query("select company from user group by company");
				if($sql){
					//$row=mysql_fetch_array($sql);
					while($row=mysql_fetch_array($sql)){
						echo"<option value='".$row["company"]."'>".$row["company"]."</option>";
					}
				}}
		?>
    </select>
    <select class="btn" onChange="sx()" id="type">
    	<option>用户类型</option>
        <?php
				$sql=mysql_query("select type from user group by type");
				if($sql){
					//$row=mysql_fetch_array($sql);
					while($row=mysql_fetch_array($sql)){
						echo"<option value='".$row["type"]."'>".type_c($row["type"])."</option>";
					}
				}
		?>
    </select>
        

   
    
  <div class="btn-group">
  </div>
</div>
<div class="well">

    <table class="table">
      <thead>
        <tr>
          <th>序号</th>
          <th>用户名</th>
          <th>用户类型</th>
          <th>联系电话</th>
          <th>所属公司</th>
          <th style="width: 26px;"></th>
        </tr>
      </thead>
      <tbody id="tbody">
      		<?php 
			    //$line=mysql_connect('qdm16147017.my3w.com','qdm16147017','19981102aa');
			  	$line=mysql_connect("121.196.226.94","root","root");
			    if($line){
					mysql_select_db('zckj_db',$line) or die( '错误'.mysql_error());
					mysql_query("SET NAMES 'utf8'");//SQL读取中文乱码解决
					$sql=mysql_query("select * from user");
					$count=0;
					while($row=mysql_fetch_array($sql)){$count++;}
					$size=10;
					$pagecount = ceil($count/$size);
					$page = isset($_GET['page']) ? intval(trim($_GET['page'])) : 1;
					if($page < 1 || $page > $pagecount) $page = 1;
					$begin = ($page - 1) * $size;
					$sql1 = mysql_query("SELECT * FROM user order by id  LIMIT ".$begin.",".$size."");
					//echo "count=".$count."<br>pagecount=".$pagecount."<br>page=".$page."<br>begin=".$begin;
					$c=0;
					while($count && $arr = mysql_fetch_array($sql1)){
							echo"<tr>
								<td>".($begin+1)."</td>
								<td class='edit'>".$arr["name"]."</td>
								<td>".type_c($arr["type"])."</td>
								<td class='edit'>".$arr["phone"]."</td>
								<td class='edit'>".$arr["company"]."</td>
								<td>
									<a href='user.php?id=".$arr["id"]."'><i class='icon-pencil'></i></a>
									<a href='#myModal' role='button' data-toggle='modal'><i class='icon-remove'></i></a>
								</td>
						    </tr>";$begin++;
					}	
	
				}	
	
			  ?>
      </tbody>
    </table>
</div>
<div class="pagination">
    <ul>
    	<?php 	
		$pageup=$page-1;
		$padown=$page+1;
        echo"<li><a href='users.php?page=".$pageup."'>上一页</a></li>";
			for($i=1;$i<=$pagecount;$i++){
				echo"<li><a href='users.php?page=".$i."'>".$i."</a></li>";	
			}		
        echo"<li><a href='users.php?page=".$padown."'>下一页</a></li>";
		echo"<li><a>当前第".$page."页/共".$pagecount."页</a></li>";
		echo"<li><a>显示全部</a></li>";
		?>
    </ul>
</div>

<div class="modal small hide fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="myModalLabel">Delete Confirmation</h3>
    </div>
    <div class="modal-body">
        <p class="error-text"><i class="icon-warning-sign modal-icon"></i>Are you sure you want to delete the user?</p>
    </div>
    <div class="modal-footer">
        <button class="btn" data-dismiss="modal" aria-hidden="true">返回</button>
        <button class="btn btn-danger" data-dismiss="modal">删除</button>
    </div>
</div>  
                    <footer>
                        <hr>

                        
                        <p class="pull-right">Collect from <a href="http://www.cssmoban.com/" title="网页模板" target="_blank">网页模板</a></p>

                        <p>&copy; 2012 <a href="#" target="_blank">Portnine</a></p>
                    </footer>
                    
            </div>
        </div>
    </div>
    


    <script src="lib/bootstrap/js/bootstrap.js"></script>
    <script type="text/javascript">
        $("[rel=tooltip]").tooltip();
        $(function() {
            $('.demo-cancel-click').click(function(){return false;});
        });

	function qedit(){	
		var i;
		for(i=0;i<=3;i++){
			var edit=document.getElementsByName("edit")
			name[i]=edit.item(i).innerHTML
			edit.innerHTML="<input type='text'style='height:16px; margin: 0px 0px;' value='"+name[i]+"'/>"	
		}
	}
	
	function sx(){
		 var company=document.getElementById("company").value;
		 var type=document.getElementById("type").value;
		 //alert(type)
	 	 var xmlh=new XMLHttpRequest();
	 	 xmlh.open("POST","log.php?company="+company+"&type="+type+"&log_type=SaiXuan",true);
	 	 xmlh.send(null);
	 	 xmlh.onreadystatechange=function(){
  		 if (xmlh.readyState==4 && xmlh.status==200){
			//alert(xmlh.responseText)
			document.getElementById("tbody").innerHTML=xmlh.responseText;
			//$("tbody").html
			var backstr=xmlh.responseText
			//if(backstr.indexOf("成功") > 0){ window.location.href="index.php"}
    	 }else{
			//alert("错代："+xmlh.readyState+"\nstaus="+xmlh.status)
		}
  	}

	 
		}
    </script>
    
  </body>
</html>


