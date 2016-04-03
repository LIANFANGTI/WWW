<!DOCTYPE html>
<?php 
	require_once '../../lib/mysql.class.php';
    require_once '../../lib/fun.php';
		@session_start();
		if(logincheck()){
			$openid=$_SESSION["openid"];
			$db->select("kehu","*","wx_openid='".$openid."'");$kehu=$db->fetchArray(MYSQL_ASSOC);
			if(!empty($kehu)){
				$db->select("czjl","*","kh=".$kehu[0]["id"]);$czjl=$db->fetchArray(MYSQL_ASSOC);
			}else{
				die("您未同步，暂无数据");
			}	
		}else{
			die("您未登录 无权访问");
		}	
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>充值记录</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link  href="//netdna.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet">
</head>
<body>
<div class="container-fluid">
    <div class="row">
        <table class="table table-bordered table-striped text-center">
            <tbody>
            <tr>
                <td><span class="fa fa-calendar"> 时间</span></td>
                <td><span class="fa fa-money"> 金额</span></td>
            </tr>
			<?php
				if(!empty($czjl)){
				foreach($czjl as $row){
					echo "<tr>
							<td>".$row["date"]."</td>
						    <td>￥".$row["je"]."</td>
					     </tr>";
				}
				}else{
					echo"<tr><td colspan='2'>暂无充值记录</td></tr>";
				}
			?>
            </tbody>



        </table>
    </div>




</div>

</body>
</html>