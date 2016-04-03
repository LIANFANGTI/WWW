<!DOCTYPE html>
<?php 
	require_once '../../lib/mysql.class.php';
    require_once '../../lib/fun.php';
	//$db = new mysql('121.196.226.94', 'admin', 'xwq198291', "zckj_db");
		@session_start();
		if(logincheck()){
			$openid=$_SESSION["openid"];
			$db->select("kehu","*","wx_openid='".$openid."'");$kehu=$db->fetchArray(MYSQL_ASSOC);
			if(empty($kehu)){die("您未同步云库账号 无法添加车辆");}
			$db->select("cartype","*","");$cartype=$db->fetchArray(MYSQL_ASSOC);
			echo $db->printMessage();		
		}else{
			die("您未登陆 无权访问");
		}

	
?>
<html>

	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<link href="css/bootstrap.min.css" rel="stylesheet" />
		<link href="css/tjcar.css" rel="stylesheet" />
		<link href="css/weui.min.css" rel="stylesheet" />
		<link href="css/bootstrap-datetimepicker.min.css" rel="stylesheet" />
        <script src="js/tjcar.js"></script>
		<title>添加车辆</title>
	</head>

	<body>
    <input type="hidden" id="khid" value="<?PHP echo $kehu[0]["id"];?>">
		<div class="container-fluid">
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center">
					<div class="input-group">
						<span class="input-group-addon">车牌</span>
						<input class="form-control" type="text" id="carid">
						<!--
   	作者：1003316758@qq.com
   	时间：2016-03-10
   	描述：
   -->
					</div>
				</div>
			</div>
			<div class="row" >
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center ">
					<div class="input-group">
						<span class="input-group-addon">品牌</span>
						<div class="dropdown" >
					  <button class="btn dropdown-toggle"  id="dropdownMenu1" data-toggle="dropdown">
        点击选择车辆品牌及车型
      <span class="caret"></span>
   </button>
							<ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1" style="overflow:scroll;height:1000%">
                      <?php 
					  
					  $c=0;
					  	foreach($cartype as $row){
							++$c;
							echo "<li role='presentation'>
							<a role='menuitem' tabindex='-1' href='#' name='".$row["pp"]."' title='".$row["name"]."' id='op$c' onClick='chose(op$c.title,op$c.name)'>".$row["pp"]."-".$row["name"]."</a>
						</li>";	
						}					  
					  ?>


							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		</div>

		<div class="container-fluid">
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					<div class="input-group">
						<span class="input-group-addon">当前里程</span>
						<input class="form-control" type="text" id="km"  placeholder="单位:千米">
					</div>
				</div>
				</div>
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					<div class="input-group">
						<span class="input-group-addon">购车日期</span>
						<input  class=" form-control" type="date" id="buydate" >
					</div>
				</div>
				</div>
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					<div class="input-group">
						<span class="input-group-addon">备注</span>
						<input class="form-control" type="text" id="tips">
					</div>
				</div>
				</div>
				</div>
				
				
			</div>
		</div>
		<div class="container-fluid">
			<input type="button" class="weui_btn weui_btn_primary" value="保存"  onClick="save()"/>
		</div>
		
		<script src="js/jquery.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/bootstrap-datetimepicker.min.js"></script>

	</body>

</html>