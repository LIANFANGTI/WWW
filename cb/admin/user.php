<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>用户信息修改</title>
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
      <script src='http://html5shim.googlecode.com/svn/trunk/html5.js'></script>
    <![endif]-->

    <!-- Le fav and touch icons -->
    <link rel="shortcut icon" href="../assets/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="../assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="../assets/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="../assets/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="../assets/ico/apple-touch-icon-57-precomposed.png">
  </head>

  <!--[if lt IE 7 ]> <body class='ie ie6'> <![endif]-->
  <!--[if IE 7 ]> <body class='ie ie7 '> <![endif]-->
  <!--[if IE 8 ]> <body class='ie ie8 '> <![endif]-->
  <!--[if IE 9 ]> <body class='ie ie9 '> <![endif]-->
  <!--[if (gt IE 9)|!(IE)]><!--> 
  <body class=""> 
  <!--<![endif]-->
    <div class="navbar">
        <div class="navbar-inner">
                <ul class="nav pull-right">
                    
                    <li><a href="#" class="hidden-phone visible-tablet visible-desktop" role="button">Settings</a></li>
                    <li id="fat-menu" class="dropdown">
                        <a href="#" role="button" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="icon-user"></i> Jack Smith
                            <i class="icon-caret-down"></i>
                        </a>

                        <ul class="dropdown-menu">
                            <li><a tabindex="-1" href="#">My Account</a></li>
                            <li class="divider"></li>
                            <li><a tabindex="-1" class="visible-phone" href="#">Settings</a></li>
                            <li class="divider visible-phone"></li>
                            <li><a tabindex="-1" href="sign-in.php">Logout</a></li>
                        </ul>
                    </li>
                    
                </ul>
                <a class="brand" href="index.php"><span class="first">Your</span> <span class="second">Company</span></a>
        </div>
    </div>
    


    
    <div class="sidebar-nav">
        <a href="#dashboard-menu" class="nav-header" data-toggle="collapse"><i class="icon-dashboard"></i>Dashboard</a>
        <ul id="dashboard-menu" class="nav nav-list collapse in">
            <li><a href="index.php">Home</a></li>
            <li ><a href="users.php">Sample List</a></li>
            <li class="active"><a href="user.php">Sample Item</a></li>
            <li ><a href="media.php">Media</a></li>
            <li ><a href="calendar.php">Calendar</a></li>
            
        </ul>

        <a href="#accounts-menu" class="nav-header" data-toggle="collapse"><i class="icon-briefcase"></i>Account<span class="label label-info">+3</span></a>
        <ul id="accounts-menu" class="nav nav-list collapse">
            <li ><a href="sign-in.php">Sign In</a></li>
            <li ><a href="sign-up.php">Sign Up</a></li>
            <li ><a href="reset-password.php">Reset Password</a></li>
        </ul>

        <a href="#error-menu" class="nav-header collapsed" data-toggle="collapse"><i class="icon-exclamation-sign"></i>Error Pages <i class="icon-chevron-up"></i></a>
        <ul id="error-menu" class="nav nav-list collapse">
            <li ><a href="403.php">403 page</a></li>
            <li ><a href="404.php">404 page</a></li>
            <li ><a href="500.php">500 page</a></li>
            <li ><a href="503.php">503 page</a></li>
        </ul>

        <a href="#legal-menu" class="nav-header" data-toggle="collapse"><i class="icon-legal"></i>Legal</a>
        <ul id="legal-menu" class="nav nav-list collapse">
            <li ><a href="privacy-policy.php">Privacy Policy</a></li>
            <li ><a href="terms-and-conditions.php">Terms and Conditions</a></li>
        </ul>

        <a href="help.php" class="nav-header" ><i class="icon-question-sign"></i>Help</a>
        <a href="faq.php" class="nav-header" ><i class="icon-comment"></i>Faq</a>
    </div>
    

    
    <div class="content">
        
        <div class="header">
            
            <h1 class="page-title">Edit User</h1>
        </div>
        
                <ul class="breadcrumb">
            <li><a href="index.php">Home</a> <span class="divider">/</span></li>
            <li><a href="users.php">Users</a> <span class="divider">/</span></li>
            <li class="active">User</li>
        </ul>

        <div class="container-fluid">
            <div class="row-fluid">
                    
<div class="btn-toolbar">
    <button class="btn btn-primary" onClick="ajax()"><i class="icon-save"></i>保存</button>
    <a href="#myModal" data-toggle="modal" class="btn">删除</a>
    
  <div class="btn-group">
  </div>
</div>
<div class="well">
    <ul class="nav nav-tabs">
      <li class="active"><a href="#home" data-toggle="tab">信息修改</a></li>
      <li><a href="#profile" data-toggle="tab">密码修改</a></li>
    </ul>
    <div id="myTabContent" class="tab-content">
      <div class="tab-pane active in" id="home">
    <form id="tab">
    <?php
			$id=$_GET["id"];
			$line=mysql_connect('121.196.226.94','root','root');
	 if($line){
			mysql_select_db('zckj_db',$line) or die( '错误'.mysql_error());
			mysql_query("SET NAMES 'utf8'");//SQL读取中文乱码解决
			$sql=mysql_query("select * from user where id=".$id);
			$rows=mysql_num_rows($sql);     //行读取 
			$cols=mysql_num_fields($sql); //列读取
			while($row=mysql_fetch_array($sql)){
				$name[]=$row["name"];
				$type[]=$row["type"];
				$phone[]=$row["phone"];
				$mail[]=$row["mail"];
				$addr[]=$row["addr"];	
		    }
	 }
	 	switch($type[0]){
				case "admin": 
					$type_op="<option value='admin' selected ='selected' >管理员</option>
							 <option value='vip'>会员用户</option>
							 <option value='pt_user'>普通用户</option>";
				break;
				case "vip": 
					$type_op="<option value='admin'>管理员</option>
							 <option value='vip'  selected ='selected' >会员用户</option>
							 <option value='pt_user'>普通用户</option>";
				break;
				case "pt_user": 
					$type_op="<option value='admin'  >管理员</option>
							 <option value='vip'>会员用户</option>
							 <option value='pt_user' selected ='selected' >普通用户</option>";
				break;
				default:
					$type_op="<option value='admin'  >管理员</option>
							 <option value='vip'>会员用户</option>
							 <option value='pt_user' selected ='selected' >普通用户</option>";
				break;
			}
        echo"<label>用户名</label><input type='text' name='name' value='".$name[0]."' class='input-xlarge'>
        <label>用户类型</label>
        <select name='type' id='type' class='input-xlarge'>
		   		".$type_op."
        </select>
		<input id='getid' value=".$id." type='text' style='display:none'/>
        <label>电话</label><input id='phone' type='text' value='".$phone[0]."' class='input-xlarge'>
        <label>邮箱</label><input id='mail' type='text' value='".$mail[0]."' class='input-xlarge'>
        <label>通讯地址</label><textarea id='addr'  value='".$addr[0]."' rows='3' class='input-xlarge'>".$addr[0]."</textarea>";
				
	?>
    </form>
    <div id="msg" style="color:#98191C;"></div>
      </div>
      <div class="tab-pane fade" id="profile">
    <form id="tab2">
        <label>新密码</label>
        <input type="password" class="input-xlarge">
        <div>
            <button class="btn btn-primary">更新</button>
        </div>
    </form>
      </div>
  </div>

</div>

<div class="modal small hide fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel">删除用户</h3>
  </div>
  <div class="modal-body">
    
    <p class="error-text"><i class="icon-warning-sign modal-icon"></i>你确定要删除该用户？</p>
 </div>
  <div class="modal-footer">
    <button class="btn" data-dismiss="modal" aria-hidden="true">取消</button>
    <button class="btn btn-danger"  onClick="del()" data-dismiss="modal">删除</button>
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
      /*  $(function() {
            $('.demo-cancel-click').click(function(){return false;});
			
        });*/
		
		
	function ajax(){
		 //alert("ajax()函数触发")
		 var id=document.getElementById("getid").value
		 var name=document.getElementsByName("name").item(0).value;
		 var type=document.getElementById("type").value;
		 var phone=document.getElementById("phone").value;
		 var mail=document.getElementById("mail").value
		 var addr=document.getElementById("addr").value;
		 //alert("addr="+addr)
		 var xmlh=new XMLHttpRequest();
		 var url="log.php?name="+name+"&type="+type+"&phone="+phone+"&mail="+mail+"&addr="+addr+"&log_type=update&id="+id
		 //alert(url)
		 xmlh.open("POST",url,true);
		 xmlh.send(null);
		 xmlh.onreadystatechange=function(){
			if (xmlh.readyState==4 && xmlh.status==200){
			document.getElementById("msg").innerHTML=xmlh.responseText;
				var backstr=xmlh.responseText
				if(backstr.indexOf("成功") > 0){alert("保存成功");window.location.href="users.php"}
			}else{
				//alert("错代："+xmlh.readyState+"\nstaus="+xmlh.status)
			}
		 }

	 }
	 function del(){
		 //alert("delete()函数触发")
		 var id=document.getElementById("getid").value
		 //alert("节点1：变量id复制成功")
		 var url="log.php?log_type=delete&id="+id
	     //alert("节点2：变量url赋值成功")
		 var xmlh=new XMLHttpRequest();
		 xmlh.open("POST",url,true);
		 //alert("连接后台成功")
		 xmlh.send(null);
		 xmlh.onreadystatechange=function(){
			if (xmlh.readyState==4 && xmlh.status==200){
			document.getElementById("msg").innerHTML=xmlh.responseText;
				var backstr=xmlh.responseText
				if(backstr.indexOf("成功") > 0){alert("成功删除");window.location.href="users.php"}
			}else{
				//alert("错代："+xmlh.readyState+"\nstaus="+xmlh.status)
			}
		 }
		 
	 }
	 
    </script>
  </body>
</html>


