<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<?php 
	$kid=$_GET["kid"];
	require_once 'mysql.class.php';
	$db = new mysql('121.196.226.94', 'admin', 'xwq198291', "zckj_db");
?>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>客户信息管理</title>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="css/index.css" type="text/css" />
    <script src="js/js.js"></script>
    <script src="js/jquery-1.10.2.js"></script>
    <script src="js/ekehu.js"></script>

</head>

<body>
<div class="box">
	<div class="box_title"><h4 class="caption">客户信息编辑</h4></div>
    <div class="box_content">
    <?php 
		$db->select("kehu", "*", "id=".$kid."");$kehu = $db->fetchArray(MYSQL_ASSOC);
		$vip="VIP".$kehu[0]["company"].date('Ymd',strtotime($kehu[0]["intime"]));
		$name=$kehu[0]["name"];
		$tel=$kehu[0]["phone"];
		//$vip=$kehu[0]["vip"];
		$carid=$kehu[0]["carid"];
		$cart=$kehu[0]["car_type"];
		$color=$kehu[0]["car_color"];
		$nkm=$kehu[0]["new_km"];
		$nbkm=$kehu[0]["next_by_km"]*1;
		$nbtime=$kehu[0]["next_by_time"];
		$nback=$kehu[0]["next_back"];
		$nbx=$kehu[0]["next_bx"];
		$bxcp=$kehu[0]["bx_company"];
		$bxps=$kehu[0]["bx_tips"];
		$carps=$kehu[0]["car_tips"];
		$tips=$kehu[0]["tips"];
	
	
	
	
	?>
           	<fieldset class="group"><legend><h5>身份信息</h5></legend>
        	<input type="hidden" value="<?php echo $kid ;?>" id="kid" />
            <input type="hidden" value="<?php echo $_GET["pg"]; ?>"  id="pg"/>
            客户姓名：<input id="name" type="text" class="text" value="<?php echo $name;  ?>"/>
            手机号码：<input id="tel" type="text" class="text" value="<?php echo $tel;  ?>"/>
            会员卡号：<input id="vip" type="text" class="text" value="<?php echo $vip;  ?>"/>
 		</fieldset>
    	<fieldset class="group"><legend><h5>车辆信息</h5></legend>
	       车牌号:<input id="carid" type="text" class="text" value="<?php echo $carid ;  ?>"/>
             车型:<input id="cart" type="text" class="text" value="<?php echo $cart;  ?>"/>
          车身颜色：<input id="color" type="text" class="text" value="<?php echo $color;  ?>"/>
          最新里程：<input id="nkm" type="text" class="text" value="<?php echo $nkm;  ?>"/>
             保险公司：<input id="bxcp" type="text" class="text" value="<?php echo $bxcp;  ?>"/>
 		</fieldset>
            	<fieldset class="group"><legend></legend>
			下次保养里程：<input id="nbkm" type="text" class="text" value="<?php echo $nbkm;  ?>"/>
            下次保养时间：<input id="nbtime" type="date" class="text" value="<?php echo $nbtime;  ?>"/>
           下次回访时间：<input id="nback" type="date" class="text" value="<?php echo $nback;  ?>"/>
            下次保险时间：<input id="nbx" type="date" class="text" value="<?php echo $nbx;  ?>"/>
            <div class="items">备注信息：<input type="text" class="input" id="tips" value="<?php echo $tips ;  ?>"/></div>
 		</fieldset>  			
    </div>
    <div class="boxbt"><input type="button" class="botton"  value="保存" onclick="skh()"/></div>
</div>



</body>
</html>