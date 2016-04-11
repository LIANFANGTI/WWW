<!DOCTYPE html>
<html>
<?php
   	require_once 'function.php';
 ?>
	<head>
		<meta charset="utf-8" />
		<title>商品管理</title>
		<link rel="stylesheet" href="css/index.css" type="text/css" />
		<script src="js/js.js"></script>
        <script src="js/jquery-1.10.2.js"></script>
        <script src="js/3-1.js"></script>
			<!-- bt框架-->
			<script src="js/bootstrap.min.js"></script>
			<link href="css/bootstrap.min.css" rel="stylesheet" />
			<link href="//netdna.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet">
		<!-- bt框架End-->
	</head>

	<body>
		<div class="main">
			<div class="box">
				<div class="box_title"><h4 class="caption">商品管理</h4>
					<a class="btn btn-success btn-sm" data-toggle="modal" href="#addsp">新建商品</a>
				</div>
                	<table class="table1">
                    	<tr><td><input type="search"  class="input_td" onKeyUp="tjcx()" id="tj" placeholder="输入商品关键字或编码或采购商家进行查询"/></td></tr>
                    </table>
					<table class="table table-striped table-bordered table-hover">
						<tr>
							<td>序号</td>
							<td>商品编码</td>
							<td>商品名称</td>
							<td>品牌</td>
							<td>规格</td>
							<td>单位</td>
							<td>适用车型</td>
							<td>库存</td>
                            <td>安全库存</td>
							<td>成本价</td>
							<td>销售价</td>
							<td>上次采购价</td>
							<td>供应商名称</td>
							<td>操作</td>
						</tr>
						
					<?php 
						
						 $db->select("shop","count(*) as ct","company=".$cp." and del");$shops=$db->fetchArray(MYSQL_ASSOC);
						 $zdt=$shops[0]["ct"];
						 $page=new Page($zdt,10);
						 $db->select("shop","*","company=".$cp." and del ".$page->limit1()."");$shops=$db->fetchArray(MYSQL_ASSOC);
						 $i=0;$bz=0;$zje=0;$zcb=0;$zlr=0;
						 if(empty($shops)){
							 echo "<tr><td colspan='14'>暂无商品</td></tr>";	 
						 }else{
                         foreach($shops as $row){
                            $zje+=$row["sdj"]*$row["skc"];
							$zcb+=$row["scb"]*$row["skc"];
							$row["akc"]==10?$akc="<a  href='#' class='btn btn-danger btn-xs' onclick='akc(".$row["sid"].")'>未设置</a>":$akc=($row["akc"]*1).$row["sdw"];
							if($row["skc"]<$row["akc"]){$bgcolor="#FF1515";$color="red";$bz++;}else{ $bgcolor="#eff6f7";$color="#000";};
                            echo "<tr id='sid".$i."'  color:".$color."'  class='".$row["sid"]."'>";
                            echo "<td>".($i+1)."</td>
							<td>SP00".$row["sid"]."</td>
							<td>".$row["sname"]."</td>
							<td>".$row["spp"]."</td>
							<td>".$row["sgg"]."</td>
							<td>".$row["sdw"]."</td>
							<td>".$row["scar"]."</td>
							<td ><label style='color:".$color.";'> ".$row["skc"]."</label>".$row["sdw"]."</td>
							<td title='双击设置安全库存' style='cursor:pointer;' onDblClick='akc(".$row["sid"].")'>".$akc."</td>
							<td>".$row["scb"]."￥</td>
							<td>".$row["sdj"]."￥</td>
							<td>".$row["lastcb"]."￥</td>
							<td>".$row["gys"]."</td>
							<td><button class='btn btn-danger btn-xs' onclick='delsp(".$row["sid"].")'>删除</button></td>";
                            echo"</tr>";
                            $i++;
                          }
						  $zlr=$zje-$zcb;
						  echo "<tr><td colspan='14'>".$page->showpage()."</td></tr>";
						  echo "<tr><td colspan='14'>共有<b style='color:red;'>".$zdt."</b>个商品，<b style='color:red;'>".$bz."</b>个商品库存不足10个，总价值为<b style='color:red;'>".$zje."</b>元,总成本为<b style='color:red;'>".$zcb."</b>元,总利润有<b style='color:red;'>".$zlr."</b>元</td></tr>";
						 }
						?>                      
						</tr>
					</table>
				

			</div>
		</div>

	<div class="modal fade" data-target="modal"  id="addsp" tabindex="-1" style="z-index:9999;">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<button class="close" data-dismiss="modal">
						<span class="fa fa-times fa-lg"></span>
						<span class="sr-only"></span>
					</button>
					<h4 class="modal-title">新建商品</h4>
				</div>
				<div class="modal-body">
					<div class="container-fluid">
						<div class="row">
							<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
								<div class="input-group">
									<span class="input-group-addon">名称</span>
									<input type="text" class="form-control" id="sname"/>
								</div>
							</div>
							
							<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
								<div class="input-group">
									<span class="input-group-addon" >数量</span>
									<input type="text" class="form-control" id="ssl" />
								</div>
							</div>
						</div>
						<br>
						<div class="row">
							<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
								<div class="input-group">
									<span class="input-group-addon">成本</span>
									<input type="text" class="form-control" id="scb" />
								</div>
							</div>
							<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
								<div class="input-group">
									<span class="input-group-addon">售价</span>
									<input type="text" class="form-control" id="sdj"/>
								</div>
							</div>
						</div>
						<br>
						<div class="row">
							<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
								<div class="input-group">
									<span class="input-group-addon">品牌</span>
									<input type="text" class="form-control" id="spp"/>
								</div>
							</div>
							<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
								<div class="input-group">
									<span class="input-group-addon">型号</span>
									<input type="text" class="form-control" id="xinghao" />
								</div>
							</div>
						</div>
						<br>
						<div class="row">
							<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
								<div class="input-group">
									<span class="input-group-addon">到期时间</span>
									<input type="date" class="form-control" id="etime" />
								</div>
							</div>
							<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
								<div class="input-group">
									<span class="input-group-addon">预警数量</span>
									<input type="text" class="form-control" id="akc" />
								</div>
							</div>
						</div>
						<br>
						<div class="row">
							<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
								<div class="input-group">
									<span class="input-group-addon">适用车型</span>
									<input type="text" class="form-control" id="car"/>
								</div>
							</div>
						</div>
						<br>
					</div>
					<div class="container-fluid">
						<div class="row">
							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
								<button class="btn btn-primary" onclick="sshop()">保存</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	</body>

</html>