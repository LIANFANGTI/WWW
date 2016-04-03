
<!-- saved from url=(0037)http://signin.66km.com/Passport/Login -->
<html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width">
   
    <link href="css/register.css" rel="stylesheet">
    <title>自点科技-登录</title>
</head>

<body class="page-login" style="height: 100%; zoom: 1; background: url(img/login_bj.jpg) 50% 0% no-repeat;">
    <?php //echo md5("123456") ?>
    <div id="login">
    	<div class="login-con">
        	<div class="login-logo">
            	
            </div>
              <form id="login-form" method="post" onsubmit="return LoginDialog();">
            <div class="login-form">
            	<h1>自点车坊服务</h1>
                    <input class="login-form_input required" id="Name" name="Name" placeholder="账号" type="text" value="">
                    <input class="login-form_input password required" id="Pass" name="Pass" placeholder="密码" type="password">
                    <div id="error" class="error login_tips"></div>
                	<div class="register_list_infor">                	
                    <input type="botton" value="登 录" class="form_anniu login_anniu" onClick="ajax()">
                    
                     <a href="reg1.php" class="login-link">立即注册</a>
                     <a href="resetpassword.php" class="login-link">找回密码</a>
                </div>
            </div>
                  </form>
        </div>
    </div>
       <div class="b-kf">全国客服热线：400-820-8820</div>
    <script src="javascript/json2.js" type="text/javascript"></script>
    <script src="javascript/jquery-1.10.2.js" type="text/javascript" charset="utf-8"></script>
    <script src="javascript/jquery.serializejson.min.js" type="text/javascript" charset="utf-8"></script>
    <script src="javascript/jquery.binddata.js" type="text/javascript" charset="utf-8"></script>
    <script src="javascript/bootstrap.min.js" type="text/javascript" charset="utf-8"></script>
    <script src="javascript/jquery.validate.js"></script>
    <script src="javascript/common.js"></script>
    <script type="text/javascript">
        function LoginDialog() {
            var form = $('#login-form');
            $.validator.messages.required = '';
            var validate = form.validate();
            if (!validate.form()) {
                return false;
            }
            form.get(0).submit();
            return false;

            var para = {};
            para.MCode = $("#MCode").val();
            para.Code = $("#Code").val();
            para.Password = $("#Password").val();
            $.postJson("/Login/Login", para).done(function (data) {
                if (data.errcode) {
                    var message = new Object();
                    message.Password = data.message;
                    validate.showErrors(message);
                }
                window.location.href = "http://" + data.domain + "/account/logintoken?tokencode=" + data.tokencode;
                //window.location.href = "http://localhost:4677/account/logintoken?tokencode=" + data.tokencode;
            })
        }
    </script>
    <script type="text/javascript">
        $(function () {
            var explorer = navigator.userAgent;
            if (explorer.indexOf("Chrome") >= 0) {
                $(".e-pos-r").removeClass("login-chrome-con");
            } else {
                $(".e-pos-r").addClass("login-chrome-con");
            }
            $('#loginButton').click(function (e) {
                e.preventDefault();
                LoginDialog();
            })

        });
    </script>
    <script type="text/javascript">
        (function (name, msg) {
            if (name && msg) {
                var form = $('#login-form');
                var validate = form.validate();
                var message = {};
                message[name] = "* "+msg;
                validate.showErrors(message);
                var err = $("#" + name + "-error").addClass("login_tips");
            }
        })("", "");
    </script>
    <div style="display: none;">
        
    </div>
 <script>
function ajax(){
		 var user=document.getElementById("Name").value;
		 var pwd=document.getElementById("Pass").value;
		 var xmlh=new XMLHttpRequest();
		 xmlh.open("POST","log.php?user="+user+"&pwd="+pwd+"&log_type=login",true);
		 xmlh.send(null);
		 xmlh.onreadystatechange=function(){
			if (xmlh.readyState==4 && xmlh.status==200){
				//alert("返回值："+xmlh.responseText);
				document.getElementById("error").innerHTML=xmlh.responseText;
				var backstr=xmlh.responseText
				if(backstr.indexOf("成功") > 0){ window.location.href="upage.php"}
			}else{
				//alert("错代："+xmlh.readyState+"\nstaus="+xmlh.status)
			}
		}
	
		 }
</script>

</body></html>