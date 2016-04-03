<!DOCTYPE html>
<?php
	isset($_GET["openid"])?$openid=$_GET["openid"]:die("openid参数错误，拒绝访问");
 ?>
<html>
	<head>
		<meta charset="UTF-8">
			<meta name="viewport" content="width=device-width, initial-scale=1.0" />
			<link href="css/bootstrap.min.css" rel="stylesheet" />
			<link href="css/bding.css" rel="stylesheet" />
			<link href="css/weui.min.css" rel="stylesheet" />

		<title>绑定信息</title>
	</head>
	<body>
    
		<div class="container-fluid">

			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center">
				<input class="txt" id="phone" type="text"  placeholder="输入手机号点击发送"/>
				<?php 
				    $num=rand(1000,9999);//验证码生成
					echo "<input type='hidden'  id='rand' value='".$num."' />";
				?>
                <input type="hidden" value="<?php echo $_GET["openid"] ?>" id="openid"/>
                <input type="hidden" value="<?php echo $_GET["hd"] ?>" id="head"/>
                
                            <script src="js/bding.js"></script>
            <script src="http://www.zduber.com/lib/js/jquery-1.10.2.js"></script>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center">
				<input class="weui_btn weui_btn_primary" id="send" onClick="check()"type="button" value="获取验证码" />
				</div>
				</div>
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center">
				<input class="txt" type="text" id="yzcode" placeholder="输入验证码"　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　/>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center">
				<input class="weui_btn weui_btn_primary" type="button" onClick="bding()" value="下一步" />	
				</div>
			</div>	
			</div>
		</div>
	</body>
</html>
