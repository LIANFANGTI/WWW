<!DOCTYPE html>
<?php
	$bid=$_GET["bid"];
	require_once 'function.php';
   // $db->select("kehu", "*", "user = 'admin'");
	$db->select("kehu", "*", "company=".$cp );$kehu = $db->fetchArray(MYSQL_ASSOC);//客户表读取
	$db->select("item", "*", "company=".$cp );$item = $db->fetchArray(MYSQL_ASSOC);//项目表读取
	$db->select("shop", "*", "company=".$cp );$shop = $db->fetchArray(MYSQL_ASSOC);//商品表读取
	//echo "<br>订单id：".$bid."公司id".$cp."<br>";
    $db->select("bill", "*", "id=".$bid." and company=".$cp );$bill = $db->fetchArray(MYSQL_ASSOC);//订单信息读取
	
	$db->select("ashop", "*", "bid=".$bid." and del and sl");$ashop = $db->fetchArray(MYSQL_ASSOC);//已添加商品表读取
	$db->select("aitem", "*", "bid=".$bid."");$aitem = $db->fetchArray(MYSQL_ASSOC);//已添加项目表读取
	//echo "<br>用户id：".$bill[0]["kehu"]."<br>";
	$db->select("kehu", "*", "id=".$bill[0]["kehu"]." and company=".$cp);$kehu1 = $db->fetchArray(MYSQL_ASSOC);//订单里客户id对应的客户信息读取
	$rq=date('Ymd');
	$bm="XM".$rq;
	
?>

<html>
	<head>
		<meta charset="utf-8" />
		<title>编辑订单</title>
		<link rel="stylesheet" href="css/index.css" type="text/css" />
        <script src="js/js.js"></script>
        <script src="js/jquery-1.10.2.js"></script>
        <script src="js/ebill.js"></script>
		<!-- bt框架-->
			<script src="js/bootstrap.min.js"></script>
			<link href="css/bootstrap.min.css" rel="stylesheet" />
			<link href="//netdna.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet">
		<!-- bt框架End-->
	</head>

	<body onload='jisuan()'>
		<?php
			$company=$bill[0]["company"];
			$date=date('Ymd',strtotime($bill[0]["date"]));
			$db->select("bill", "count(*) as c", "date='".$bill[0]["date"]."' and company=".$company."");$abm = $db->fetchArray(MYSQL_ASSOC);
			$count=fz($abm[0]["c"]);
			$bm="KD".fz($company).$date.$count;
			echo " <input type='hidden' value='".$bid."' id='bid'>";
			if(!$bill[0]["zt"]){
				$bill_zt="结算订单";
				$lock="";
			}else{
				$bill_zt="已结算";
				$lock="disabled";
			}
		?>
		<div class="back" id="back" ></div>
		<div id="main">
			<div class="box">
				<div class="box_title">
					<h4 class="caption">订单编号:</h4>&nbsp;
					<h4 class="caption"><?php echo bl($bid,"bid") ?></h4>
					<h4 class="caption">订单类型:<?php echo btype($bill[0]["btype"]); ?></h4>
					<h4 class="caption">业务状态:<?php echo ywzt($bill[0]["ywzt"]); ?></h4>
					<div class="close">
						<input type="button" class="btn btn-info" <?php echo $lock; ?> value="<?php echo $bill_zt; ?>" onClick="bill_js(<?php echo $bid.",".$bill[0]["kehu"]?>)" id="billjs"/>
					</div>
				</div>
				<div class="box_content">
					<div style="height:100%;">
						<?php $bid=$bill[0]["id"];$bbm=$bill[0]["bid"];$bkh=$kehu1[0]["name"];$khid=$kehu1[0]["id"];$tel=$kehu1[0]["phone"];$bgz=$bill[0]["btype"];$bps=$bill[0]["tips"];?>
						<fieldset style="width:95%; padding:0px 20px 5px 40px; border:0px;">
							客户:<input type="text"  id="khname" class="input_td" value="<?php echo $bkh; ?> "  onClick="add1('ckehu')"  disabled />
							客户电话:<input type="text" id="khtel"  class="input_td" value="<?php echo $tel; ?>" onDblClick="add('qrbox')"  disabled/>
							维修车辆:<?php echo car($bill[0]["carid"],$bill[0]["kehu"]); ?>
							<input type="hidden" id="khid" value="<?php echo $khid; ?>"  />
							<input type="hidden" id="bid" value="<?php echo $bid; ?>"  />
						</fieldset>
					</div>
				</div>
				<div class="boxbt">
					<!--项目栏开始-->			
						<div class="box" >
							<div class="box_title" onClick="$('#weixiuc').toggle(500);"><h4 class="caption">维修项目</h4></div>
								<div class="box_content" id="weixiuc">
									<div class="table1">
										<table class="table table-striped table-bordered table-hover" id="itemtb">
											<tr>
												<td> 序号 </td>
												<td>项目编码</td>
												<td>项目名称</td>
												<td>工时（时）</td>
												<td>开始时间</td>
												<td>完工时间</td>
												<td>施工人员</td>
												<td>项目分类</td>
												<td>备注</td>
												<td>操作</td>
											 </tr>
											 <tbody id="xmdata">
										<?php
											function fz($a){$re=$a;if($a<1000) $re="0".$a;if($a<100) $re="00".$a;if($a<10) $re="000".$a;return $re;	}
											if(empty($aitem)){
												echo"<tr><td colspan='14'>暂无项目请添加</td></tr>";
											}else{
												$c=0;
												$money=0;
												foreach($aitem as $row){
													$c++;
													$db->select("item", "*", "id=".$row["iid"]."");$iitem = $db->fetchArray(MYSQL_ASSOC);
													$money+=$row["gs"];
													$bm=$iitem[0]["itemid"];
													echo"<tr id='aiid".$c."' class='".$row["id"]."'>";
													echo"
														<td>".$c."</td>
														<td>".$bm."</td>
														<td>".$iitem[0]["itemname"]."</td>
														<td><input type='text' id='gs".$row["id"]."' class='input_td' onChange='cgxm(".$row["id"].");jisuan()' value='".$row["gs"]."' name='gs'></td>
														<td><input type='date' id='st".$row["id"]."' class='input_td' onChange='cgxm(".$row["id"].")' value='".$row["stime"]."'/></td>
														<td><input type='date' id='et".$row["id"]."' class='input_td' onChange='cgxm(".$row["id"].")' value='".$row["etime"]."'/></td>
														<td>".$row["gr"]."</td>
														<td>项目分类</td>
														<td><input type='text' id='ps".$row["id"]."' class='input_td' onChange='cgxm(".$row["id"].")' value='".$row["tips"]."' /></td>
														<td><button class='btn btn-danger btn-xs' onclick='delxm(".$row["id"].",$bid)'>删除</button></td>";
													echo"</tr>";	
												}	
											}
										?>
											</tbody>
											<tr>
												<td colspan="13"><a class="btn btn-success btn-sm" <?php echo $lock; ?> data-toggle="modal" href="#chosexm">添加项目</a>
												<h3 class="mny" id="itemrmb"><?php echo "总计:$money 元";?></h3></td>           
											</tr>
										</table>
									 </div>
									 <script>changermb(0,"item");</script>
								</div>
						</div>
					<!--项目栏结束-->

					<!--商品栏开始-->
						<div class="box">
							<div class="box_title" onClick="$('#xuanzesp').toggle(500);"><span class="cogs"></span><h4 class="caption">零配件选择</h4></div>
								<div class="box_content" id="xuanzesp">
									<div class="table1">
										<table class="table table-striped table-bordered table-hover" id="shoptb">
											<tr>
												<td> 序号 </td>
												<td>商品编码</td>
												<td>商品名称</td>
												<td>品牌</td>
												<td>规格</td>
												<td>适用车型</td>
												<td>单位</td>
												<td>销售价格</td>
												<td>数量</td>
												<td>金额</td>
												<td>领料人员</td>
												<td>商品备注</td>
												<td>操作</td>
											 </tr>
										<tbody id="ashop">
										<?php
											$srmb=0;
											if(empty($ashop)){
												echo"<tr><td colspan='14'>尚未添加</td></tr>";
											}else{
												$c=$srmb=$money=0;
												foreach($ashop as $row){
													$c++;
													$db->select("shop", "*", "sid=".$row["sid"]."");$sshop= $db->fetchArray(MYSQL_ASSOC);
													$smoney=($sshop[0]["sdj"]*$row["sl"]);
													//echo $sshop[0]["sdj"]."*".$row["sl"]."=".($sshop[0]["sdj"]*$row["sl"]);
													$srmb+=$smoney;
													$bm="SP".fz($sshop[0]["company"]).fz($row["id"]);
													echo" <input type='hidden' id='sid+".$c."' value='".$row["sid"]."'>";
													echo"<tr id='asid".$c."' class='".$row["id"]."'>";
													echo"
														<td>".$c."</td>
														<td>".$bm."</td>
														<td id='sp".$c."'>".$sshop[0]["sname"]."</td>
														<td>".$sshop[0]["spp"]."</td>
														<td>".$sshop[0]["tips"]."</td>
														<td>".$sshop[0]["scar"]."</td>
														<td>".$sshop[0]["sdw"]."</td>
														<td><input type='text' name='sdj' disabled id='smoney".$c."' style='width:25px;' class='input_td' value='".$sshop[0]["sdj"]."' />元</td>
														<td><input type='text' name='ssl' onChange='crm(".$c.",\"ashop\")' id='sl".$c."' style='width:30px;cursor:pointer;' class='input_td' value='".$row["sl"]."' /></td>
														<td id='srmb".$row["id"]."'>$smoney 元</td>
														<td>".$row["gr"]."</td>
														<td>".$row["tips"]."</td>
														<td><a data-toggle='modal' href='#spth' class='btn btn-danger btn-xs' onclick='tuihuo(".$row["id"].",\"".$sshop[0]["sname"]."\",".$row["sl"].",".$sshop[0]["sid"].")'>退货</a></td>";
													echo"</tr>";	
												}
												
											}
										?>
										</tbody>
											<tr>
												<td colspan="14"><a class="btn btn-success btn-sm" data-toggle="modal" href="#chosesp">添加零件</a></td>
											</tr>
										</table>
										<div class="boxbt"><h3 class="mny" id="shoprmb">总计:<?php echo $srmb; ?>元</h3><input type="hidden" id="spje" value=<?php echo $srmb; ?> /></div>
									</div>  
								</div>
								
								
						</div>
					<!--商品栏结束-->
			    </div>
			</div> 
			<fieldset style="border:0px"><h1 style="margin:20px 40px; float:right;color:#f9af02;" id="rmbs">订单总价：0元</h1></fieldset>
			</div>          	
					
				
<!-----------------------------------------------------------------------弹窗区----------------------------------------------------------------------->			

	<!--项目选择弹窗-->
		<div class="modal fade" data-keyboard="false" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="chosexm" >
			<div class="modal-dialog modal-lg">
				<div class="modal-content text-center">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">
							<span class="fa fa-times fa-lg"></span>
							<span class="sr-only">Close</span>
						</button>
						<h4 class="modal-title">项目选择</h4>
					</div>
					<div class="modal-body text-center">
						<div class="row">
							<table class="table table-striped table-bordered table-hover">
								<tr>
									<td>序号</td>
									<td>项目编码</td>
									<td>项目名称</td>
									<td>单价</td>
									<td>项目分类</td>
									<td>备注</td>
									<td>操作</td>
								</tr>
							 <?php 
								$i=0;
									foreach($item as $row){
										echo "<tr class=a".$i.">";
											echo"<td>".($i+1)."</td>";
											echo"<td>".$row["itemid"]."</td>";
											echo"<td id='iid".($i+1)."' class='".$row["id"]."'>".$row["itemname"]."</td>";
											echo"<td>".$row["money"]."</td>";
											echo"<td>".$row["item_type"]."</td>";
											echo"<td>".$row["tips"]."</td>";
											echo"<td><button data-dismiss='modal' class='btn btn-success btn-xs' onclick='acitem(\"aitemtb\",".($i+1).",".$row["id"].")'>选择</button></td>";
										echo"</tr>";
										$i++;
									}
								?>							 <?php 
								$i=0;
									foreach($item as $row){
										echo "<tr class=a".$i.">";
											echo"<td>".($i+1)."</td>";
											echo"<td>".$row["itemid"]."</td>";
											echo"<td id='iid".($i+1)."' class='".$row["id"]."'>".$row["itemname"]."</td>";
											echo"<td>".$row["money"]."</td>";
											echo"<td>".$row["item_type"]."</td>";
											echo"<td>".$row["tips"]."</td>";
											echo"<td><button data-dismiss='modal' class='btn btn-success btn-xs' onclick='acitem(\"aitemtb\",".($i+1).",".$row["id"].")'>选择</button></td>";
										echo"</tr>";
										$i++;
									}
								?>
								<tr>
									<td colspan="13"><a href="#addxm" data-toggle="modal" class="btn btn-success btn-sm" >新建项目</a></td>
								</tr>
							</table>
						</div>
					</div>
					<div class="modal-footer text-center">
						<!--底部内容-->
					</div>
				</div>
			</div>
		</div>
	<!--/项目选择弹窗-->

	<!--商品选择弹窗开始-->
			<div class="modal fade" data-keyboard="false" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="chosesp" >
				<div class="modal-dialog modal-lg">
					<div class="modal-content text-center">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal">
								<span class="fa fa-times fa-lg"></span>
								<span class="sr-only">Close</span>
							</button>
							<h4 class="modal-title">零件选择</h4>
							<div class="row">
								<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
									<div class="input-group input-group-sm">
										<input type="text" class="form-control" />
										<span class="input-group-btn"><button class="btn btn-primary">搜索</button></span>
									</div>
								</div>
							</div>

						</div>
						<div class="modal-body text-center">
							<div class="row">
								<table class="table table-striped table-bordered table-hover">
									  <tr>
									<td> 序号 </td>
									<td>商品编码</td>
									<td>商品名称</td>
									<td>品牌</td>
									<td>单位</td>
									<td>库存</td>
									<td>适用车型</td>
									<td>销售价格</td>
									<td>操作</td>
								</tr>
								<?php 
									  $i=0;
									  foreach($shop as $row){
										 echo "<tr id='sid".$i."' class='".$row["sid"]."'>";
										 echo"<td>".($i+1)."</td>";
										 echo"<td>SP00".$row["sid"]."</td>";
										 echo"<td>".$row["sname"]."</td>";
										 echo"<td>".$row["spp"]."</td>";
										 echo"<td>".$row["sdw"]."</td>";
										 echo"<td>".$row["skc"]."</td>";
										 echo"<td>".$row["scar"]."</td>";
										 echo"<td>".$row["sdj"]."</td>";
										 echo"<td><button class='btn btn-success btn-xs' data-dismiss='modal' onclick='acshop(".$row["sid"].",$bid,".$row["skc"].",\"".$row["sname"]."\")'>选择</button></td>";
										 echo"</tr>";
										 $i++;
									   }
									    if(empty($shop)){
										   echo "<tr><td colspan=9>您的仓库尚未添加商品信息，请到
										   <a href='3-1.php'>商品管理</a>
										   页面进行管理</td>";
										}
								?>                             
								<tr>
									<!--<td colspan="14"><input type="button" value="添加" class="btn btn-success btn-sm" onClick="add('addsp')"></td>-->
								</tr>
							</table>
							</div>
						</div>
						<div class="modal-footer text-center">
							<!--底部内容-->
						</div>
					</div>
				</div>
			</div>
	<!--商品选择弹窗结束-->

	<!--商品新建弹窗开始-->                
		<div class="toolbox" id="addsp">
			<div class="box_title">
				<h4 class="caption">新建商品</h4>
				<div class="close" onClick="closeb('addsp')">×</div>
			</div>
			<div class="box_content">
				<form>
						<div class="items">
							 <div class="item"><span class="item_name">商品名称：</span><input type="text" class="text" id="sname"/></div>
							 <div class="item"><span class="item_name">单位:</span><input type="text" class="text" id="sdw" /> </div>
						 </div>
						 <div class="items">
							<div class="item"><span class="item_name">期初成本：</span><input type="text" class="text" id="scb"/></div>
							 <div class="item"><span class="item_name">期初库存：</span><input type="text" class="text" id="skc"/></div> 
							  <div class="item"><span class="item_name">品牌:</span><input type="text" class="text" id="spp"/></div>
						 </div>
						 <div class="items">
							<div class="item"><span class="item_name">销售单价：</span><input type="text" class="text" id="sdj"/></div>
							<div class="item"><span class="item_name">适用车型：</span><input type="text" class="text" id="scar"/></div>
						 </div>
						  
								</form>
					</div>
					<div class="boxbt"> <input type="button" value="保存" class="botton" onClick="s_shop()" /></div>
		</div>
	<!--商品新建弹窗结束-->
	  
	<!--商品退货弹窗开始--> 
	<div class="modal fade" data-target="modal" data-keyboard="false" data-backdrop="static" id="spth" tabindex="-1">
			<div class="modal-dialog modal-xs">
				<div class="modal-content">
					<div class="modal-header">
						<button class="close" data-dismiss="modal"><span class="fa fa-times fa-lg"></span><span class="sr-only"></span></button>
						<h4 class="modal-title">商品退货</h4>
					</div>
					<div class="modal-body">
						<div class="container-fluid">
							<div class="row">
								<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
									<div class="input-group">
										<span class="input-group-addon"   >商品名称</span>
										<input type="text" class="form-control" id="spname" />
									</div>
								</div>
							</div>
							<br>
							<div class="row">
								<div class="col-lg-3">
									<div class="input-group">
										<span class="input-group-btn">
											<button class="btn btn-info" type="button" onClick="down()">-</button>
										</span>
										<input type="text" class="form-control text-center" id="thsl" placeholder="输入退货数量">
										<span class="input-group-btn">
											<button class="btn btn-info" type="button" onClick="up()">+</button>
										</span>
									</div>
									<!-- /input-group -->
								</div>
								<!-- /.col-lg-6 -->
							</div>
							<br>
							<div class="row">
								<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
									<div class="form-group">
										退货原因
									<textarea class="form-control" rows="3" id="thyy"></textarea>
								</div>
								</div>
							</div>
							<br>
							<div class="row">
								<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
									<button class="btn btn-primary" onClick="subth()" data-dismiss="modal">提交</button>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
<!----------------------------------------------------------------------
		<div class="toolbox" id="th" style="width:500px;">
			<div class="box_title">
				<h4 class="caption">商品退货</h4>
				<h4 class="close" onClick="closeb('th')">×</h4>
				
			</div>
		  
			<div class="box_content">
				<fieldset class="group" style="text-align:left; border-radius:10px;">
				<legend>信息填写</legend>
				<ul class="ul_br">
					<li>商品名称：<input type="text" class="text" id="spname"></li>
					<li>退货数量：<input type="button" class="button-yuan" onClick="down()"  value="-">
								<input type="text" value="0" class="text" onKeyUp="cg()"id="thsl">
								<input type="button" class="button-yuan"onClick="up()"  value="+">
					</li>
					<li><label id="min">0</label>
					<input type="range" min="0" id="range" onChange="range()" title="1" value="0"/>
					<label id="max">0</label>
					</li>
					 <br>
					
					<li>退货原因：<input type="text" id="thyy" class="text" style="width:55%;"></li>
					</ul>
				</fieldset>
				<input type="button" class="botton" onClick="subth()" value="提交">
			</div>
		</div>-->
	<!--商品退货弹窗结束--> 

	<!--新建项目弹窗开始-->
<!--新建项目弹窗Start-->
	<div class="modal fade" data-target="modal" data-keyboard="false" data-backdrop="static" id="addxm" tabindex="-1">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<button class="close" data-dismiss="modal"><span class="fa fa-times fa-lg"></span><span class="sr-only"></span></button>
					<h4 class="modal-title">添加项目</h4>
				</div>
				<div class="modal-body">
					<div class="container-fluid">
						<div class="row">
						<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
								<div class="input-group">
									<span class="input-group-addon">项目名称</span>
									<input type="text" class="form-control"  id="itemname" />
								</div>
							</div>
							<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
								<div class="input-group">
									<span class="input-group-addon" id="itemtype" >项目类型</span>
									<select class="form-control">
										<option>未选择</option>
										<option>洗车</option>
										<option>美容</option>
										<option>保养</option>
										<option>改装</option>
									</select>
								</div>
							</div>
						</div>
						<br>
						<div class="row">
							<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
								<div class="input-group">
									<span class="input-group-addon">工时</span>
									<input type="text" class="form-control" />
								</div>
							</div>
							<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
								<div class="input-group">
									<span class="input-group-addon">故障类型</span>
									<select class="form-control" id="error">
										<option>未选择</option>
										<option>车胎故障</option>
										<option>车身刮伤</option>
										<option>其他故障</option>
									</select>
								</div>
							</div>
						</div>
					</div>
					<br>
					<div class="container-fluid">
						<div class="row">
							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
								<button class="btn btn-primary" data-dismiss="modal" onClick="sitem()">保存</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<!--新建项目弹窗End-->
	<!------------
		<div class="toolbox" id="additem">
			<div class="box_title">
				<h4 class="caption">新建项目</h4>
				<div class="close" onClick="closeb('additem')">&times;</div>
			</div>
			<div class="box_content">
				<div class="items">
					<div class="item"><span class="item_name">项目编码：</span>
						<input type="text" class="text" value="<?php echo $bm;  ?>"  id="itemid" onBlur="c(this,'save_item')" /></div>
						 <div class="item"><span class="item_name">项目名称：</span>
									<input type="text" class="text" id="itemname" onBlur="c(this,'save_item')" /></div>
							 <div class="item"><span class="item_name" >项目类型：</span>
								  <select class="text" id="itemtype" onBlur="c(this,'sava_item')">
									<option>洗车</option>
									<option>美容</option>
									<option>维修</option>
								 </select>
							 </div>
							</div>
							<div class="items">
							
							 <div class="item"><span class="item_name">单价：</span>
								<input type="text" class="text" id="money" onBlur="c(this,'save_item')" /></div>
						   
							 <div class="item"><span class="item_name">故障类型：</span>
								<select class="text2" id="error" onBlur="c(this,'save_item')">
									<option>车胎故障</option>
									<option>车身刮伤</option>
									<option>发动机故障</option>
									<option>其他</option>
								</select>
							 </div>
							</div>
						</div>
						<div class="boxbt">
							<input type="button" value="保存" class="botton"  id="save_item" onClick="s_item()" ></div>
		</div>-->
	<!--新建项目弹窗结束-->	
	</body>
</html>