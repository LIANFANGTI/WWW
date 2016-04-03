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
	</head>

	<body>
		<div class="main">
			<div class="box">
				<div class="box_title"><h4 class="caption">商品管理</h4>
				<input type="button" value="新建商品" class="botton" onclick="showdiv()"/>
				</div>
				<div class="close">
						<!--下面这个是一个showdiv事件，在点击按钮的时候显示隐藏的div-->

						<div id="bg"></div>
						<div id="show">
							<div class="showdiv">
								<div class="box_title">
									<h4 style="float: left;">新建商品</h4>
									<p style="float: right;" onclick="hidediv()">X</p>
								</div>
								<div>
									<div class="item"> <span class="item_name">商品编码：</span>
										<input type="text" class="text" />
									</div>
									<div class="item"> <span class="item_name">商品名称：</span>
										<input type="text" class="text" />
									</div>
									<div class="item"> <span class="item_name">单位：</span>
										<input type="text" class="text" />
									</div>
									<div class="item"> <span class="item_name">期初库存：</span>
										<input type="text" class="text" />
									</div>
									<div class="item"> <span class="item_name">品牌：</span>
										<input type="text" class="text" />
									</div>
									<div class="item"> <span class="item_name">规格：</span>
										<input type="text" class="text" />
									</div>
									<div class="item"> <span class="item_name">销售单价：</span>
										<input type="text" class="text" />
									</div>
									<div class="item"> <span class="item_name">适用车型：</span>
										<input type="text" class="text" />
									</div>
									<div class="item"> <span class="item_name">备注	：</span>
										<input type="text" class="text" />
									</div>
								</div>
							</div>
							<input id="btnclose" type="button" value="保存" class="botton" onclick="hidediv()" />
						</div>
					</div>
					<!--
分界线分界线            
                    -->
                	<table class="table1">
                    	<tr><td>
                        	 <input type="search"  class="input_td" onKeyUp="tjcx()" id="tj" placeholder="输入商品关键字或编码或采购商家进行查询"/>
                        </td></tr>
                    </table>					
				<div>
					<table class="table1">
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
							<td bgcolor="">操作</td>
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
							$row["akc"]==10?$akc="<a  href='#' onclick='akc(".$row["sid"].")'>未设置</a>":$akc=($row["akc"]*1).$row["sdw"];
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
							<td><button class='toolbt' onclick='delsp(".$row["sid"].")'>删除</button></td>";
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
		</div>

	</body>

</html>