<!DOCTYPE html>
<?php include("function.php"); ?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Bootstrap Admin</title>
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
                    
                </ul>
                <a class="brand" href="index.php"><span class="first">Your</span> <span class="second">Company</span></a>
        </div>
    </div>
    


    

    
        <div class="row-fluid">
    <div class="dialog">
        <div class="block">
            <p class="block-heading">添加</p>
            <div class="block-body">
            <?php
					
				
				
				
			
			?>
            
                <form>
                    <label>账号</label><input type="text" class="span12" onBlur="ccc()"id="user">
                    <div id="msg1" style="color:#017719;"></div>
                  <label>所属公司</label>
                    	<select onChange="s_c()" id="comp">
							<?php 
								conmysql();
								$sql=mysql_query("select company from user group by company;");
								while($row=mysql_fetch_array($sql)){
									if($row["company"]!="company")
									echo"<option value='".$row["company"]."'>".$row["company"]."</option>";
									
								}  
                            ?>
                            <option value="add">添加公司</option>
                        </select>
                    <label>手机号</label><input type="text" class="span12" id="phone">
                  <label>密码</label><input type="text" class="span12" id="pwd">
                    <label>确认密码</label><input type="password" class="span12" id="pwd2" onKeyPress="submit1()">
                    <botton class="btn btn-primary pull-right" onClick="submit1();ccc()">添加</botton>
                    <div class="clearfix"></div>
                </form>
            </div>
        </div>
        <p><a href="privacy-policy.html">Privacy Policy</a></p>
    </div>
</div>


    


    <script src="lib/bootstrap/js/bootstrap.js"></script>
    <script type="text/javascript">
	var a
        $("[rel=tooltip]").tooltip();
        $(function() {
            $('.demo-cancel-click').click(function(){return false;});
        });
		
		function s_c(a){
			var b=document.getElementById("comp")
			if(b.value=='add'){
				var add=prompt("请输入添加的公司")
				b.innerHTML+="<option selected>"+add+"</option>"
			}
		}
		
		function ccc(){
			//alert("成功触发")
			 var msg1=document.getElementById("msg1")
			 var user=document.getElementById("user").value;
			 //alert(user)
			 var xmlh=new XMLHttpRequest();
			 var a
			 xmlh.open("POST","log.php?user="+user+"&log_type=check",true);
			 //alert(1)
			 xmlh.send(null);
			 //alert(2)
			 xmlh.onreadystatechange=function(){
  				if (xmlh.readyState==4 && xmlh.status==200){
					//alert("连接成功")
					//document.getElementById("error").innerHTML=xmlh.responseText;
					var backstr=xmlh.responseText
					//alert(backstr)
					if(backstr.indexOf("yes") > 0){ 
						a=0
						msg1.innerHTML="该用户已存在"
						msg1.style.color="#ff0000"
						 
					}else{
						a=1
						msg1.innerHTML="该用户名可用"
						msg1.style.color="#44aa33"
						 
					}
    			}else{
						//alert("错代："+xmlh.readyState+"\nstaus="+xmlh.status)
				}
  			}
			alert("a="+a)

		 }	
		 
	function submit1(){
		var user=document.getElementById("user")
		var pwd2=document.getElementById("pwd2")
		var mail=document.getElementById("phone")
		var comp=document.getElementById("comp")
		var pwd=document.getElementById("pwd")
		var msg1=document.getElementById("msg1")
		if(user.value==""){
			msg1.innerHTML="用户名不能为空"
			msg1.style.color="#ff0000"
		}
		alert("ccc的返回值为"+ccc())
		
	}
		
    </script>
  </body>
</html>


