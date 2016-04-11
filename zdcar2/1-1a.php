<!DOCTYPE html>
<?php
	require_once 'function.php';
	$db->select("kehu","*","company=".$cp." and del");
	$kehu = $db->fetchArray(MYSQL_ASSOC);
	$db->select("item","*","company=".$cp." ");
	$item = $db->fetchArray(MYSQL_ASSOC);
	$db->select("shop","*","company=".$cp." and del");
	$shop = $db->fetchArray(MYSQL_ASSOC);
    //print_r($result); //打印所有数组元素
	isset($_GET["khid"])?$khid=$_GET["khid"]:$khid=0;
	//echo $khid;
	                	if($khid){
						$khname=kh($khid,"name");//客户姓名获取
						$khphone=kh($khid,"phone");	//客户电话获取
						//$carid=select("car","kh",$khid,"carid");	//客户车牌号获取
						$cartb=select2("car","kh",$khid);//获取用户所有车辆
						
					}else{
						$khname="请选择客户";
						$khphone="";		
					}
		//echo $khname."<br>".$khphone;			
	//$rq=date('Ymd');
	//$bm="XM".$rq;
?>

<html>
	<head>
		<meta charset="utf-8" />
		<title>一库汽车管理系统</title>
		<link rel="stylesheet" href="css/index.css" type="text/css" />
        <script src="js/js.js"></script>
		<script charset="gb2312" src="js/1-1a.js"></script>
		<script src="js/jquery-1.10.2.js"></script>
		<!-- bt框架-->
		<script src="js/bootstrap.min.js"></script>
		<link href="css/bootstrap.min.css" rel="stylesheet" />
		<link href="//netdna.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet">
		<!-- bt框架End-->
        <!-- <script src="js/khinfo.js"></script> -->
        
		
		 <OBJECT id="WebBrowser" height="0" width="0" classid="CLSID:8856F961-340A-11D0-A96B-00C04FD705A2"VIEWASTEXT></OBJECT>
	</head>
	<body onLoad="onload('page')">
		<SCRIPT LANGUAGE="JavaScript">
			<!-- Begin
			/*if (window.print) {
			document.write('<input type=button name=print value="打印本页面" '
			+ 'onClick="javascript:window.print()">');
			}*/
			// End -->
		</script>

   	<input type="hidden" value="<?php echo $cp; ?>" id="cp"/>
	<div class="back" id="back" ></div>
	<div id="main">
	 &nbsp &nbsp &nbsp <b>单号:</b><input type="text"  id="billbm" class="text" style="border:0px;"  value="<?php echo "未生成";?>"  />
	 &nbsp &nbsp &nbsp <b>时间:</b><input type="text"  id="billbm" class="text" style="border:0px;width:250px;"  value="<?php echo date("Y年m月d日H时i分");?>"  />
 	<div class="box">
        <div class="box_title">
			<h4 class="caption">开单信息</h4>
            <div class="close"><input type="button" class="btn btn-warning btn-xs" value="生成订单" onClick="sb()" id="save_bill"/></div>
        </div>
        <div class="box_content">
            <fieldset style="width:80%;border:0px; padding:0px 0px 0px 40px; border-color:rgba(255,255,255,0.4) ">
                <legend></legend>
                客户：<input type="text"  id="khname" class="text" style="border:0px;"  value="<?php echo $khname;?>"  onClick="add('ckehu')" />
                客户电话：<input type="text" id="khtel" style="border:0px;" value="<?php echo $khphone;?>"  class="text" onDblClick="add('qrbox')"  disabled/>
				车牌号：<select  type="text" id="carid" class="text" style="border:0px;" id="carid" >
							<option value='0'>请选择车辆</option>
							<?php 
								if(empty($cartb))echo "<option value='-1'>无车辆信息</option>";
								foreach($cartb as $row){
									echo "<option value='".$row["id"]."'>".$row["carid"]."</option>";
								}
							?>
						</select>
						<input type="hidden" id="khid" value="<?php echo $khid;?>" />
                    	<select  type="text" id="b_type" class="text" style="border:0px;" >
                            <option value="0">选择订单类型</option>
							<option value="1">美容</option>
                            <option value="2">维修</option>
                            <option value="3">保养</option>
                            <option value="4">改装</option>
                        </select>
            </fieldset>
			<div class="box" >
				<div class="box_title" onclick="$('#weixiuc').toggle(500);">
					<h4 class="caption">维修项目</h4>
                	<div class="close">
                	</div>
                </div>
				<div class="box_content" id="weixiuc">
                    <div class="table1">
                        <table cellpadding="0" cellspacing="0" id="itemtb">
                            <tr>
                                <td> 序号 </td>
                                <td>项目编码</td>
                                <td>项目名称</td>
                                <td>工时</td>
                                <td>开始时间</td>
                                <td>完工时间</td>
                                <td>施工人员</td>
                                <td>项目分类</td>
                                <td>备注</td>
                                <td>操作</td>
                            </tr>
                            <tr>
                                <td colspan="13">暂无项目请添加</td>
                            </tr>
                            <tr>
                               <td colspan="13"><a class="btn btn-info btn-xs" data-toggle="modal" href="#citem">添加项目</a></td>
                            </tr>
                        </table>
                    </div>
                    <div class="boxbt"><h3 class="mny" id="itemrmb"></h3></div>
                </div>
            </div>
            <fieldset style="border:0px">
                <h1 style="margin:20px 40px; float:right;color:#f9af02;" id="rmbs">总价：0元</h1>
            </fieldset>					
<!--弹窗部分代码-->
		<div class="modal fade" data-keyboard="false" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="citem" >
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
									<td> 序号 </td>
									<td>项目编码</td>
									<td>项目名称</td>
									<td>单价</td>
									<td>项目分类</td>
									<td>备注</td>
									<td>操作</td>
								</tr>
								<tbody id="itemstb">
							<?php 
								$i=0;
								foreach($item as $row){
									echo "<tr class=a".++$i.">";
									echo"<td>".($i+1)."</td>";
									echo"<td>".$row["itemid"]."</td>";
									echo"<td>".$row["itemname"]."</td>";
									echo"<td>".$row["money"]."</td>";
									echo"<td>".$row["item_type"]."</td>";
									echo"<td>".$row["tips"]."</td>";
									echo"<td><button data-dismiss='modal' class='btn btn-success btn-xs' onclick='citem(\"aitemtb\",".($i).",".$row["id"].")'>选择</button></td>";
									echo"</tr>";
								}
							?>
							</table>
							<a href="#addxm" data-toggle="modal" class="btn btn-primary btn-sm" >新建项目</a>
						</div>

					</div>
					<div class="modal-footer text-center">
						<!--底部内容-->
					</div>
				</div>
			</div>
		</div>
<!--弹窗End-->
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
									<span class="input-group-addon" >项目类型</span>
									<select class="form-control" id="itemtype">
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

        <div class="toolbox" id="citem" style="width:800px;">
			<div class="box_title" >
				<h4 class="caption">项目选择</h4>
                <div class="close"onClick="closeb('citem')">×</div>
            </div>
            <div class="box_content" >
                <div class="table1">
					<table cellpadding="0" cellspacing="0" id="aitemtb">
						<tr>
							<td> 序号 </td>
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
								echo"<td>".$row["itemname"]."</td>";
								echo"<td>".$row["money"]."</td>";
								echo"<td>".$row["item_type"]."</td>";
								echo"<td>".$row["tips"]."</td>";
								echo"<td><button class='toolbt' onclick='citem(\"aitemtb\",".($i+1).",".$row["id"].")'>选择</button></td>";
								echo"</tr>";
								$i++;
							}
						?>
						<tr>
							<td colspan="13"><input type="button" value="新建项目" class="botton" onClick="add('additem')"></td>
						</tr>
					</table>
				</div>
        </div>
<!-- 客户选择 -->
		<div class="boxbt"> <input type="button" value="保存" class="botton" onclick="s_shop()" /></div></div><!--商品添加-->
			<div class="toolbox" id="ckehu" style="width:800px;"><div class="box_title" ><h4 class="caption">客户选择</h4> <div class="close" onClick="close2()">×</div></div>
					<div class="box_content" style="height:300px; overflow:auto; margin:0px;">
						<div class="table1">
												   <table cellpadding="0" cellspacing="0">
							  <tr><td colspan="8">
									   <input type="search"  class="input_td" onKeyUp="tjcx()" id="tj" placeholder="输入账户信息查询"/>
							  </td></tr
							></table>
								<table cellpadding="0" cellspacing="0" id="kehutb">
									
									<tr>
										<td>序号</td>
										<td>姓名</td>
										<td>联系电话</td>
										<td>通讯地址</td>
										<td>车型</td>
										<td>车牌</td>
										<td>备注</td>
										<td>操作</td>
									</tr>
									
								 <?php 
									$i=0;
										foreach($kehu as $row){
											 //if($i>6)break;
											echo "<tr class=a".$i.">";
												echo"<td>".($i+1)."</td>";
												echo"<td>".$row["name"]."</td>";
												echo"<td>".$row["phone"]."</td>";
												echo"<td>".$row["kehu_c"]."</td>";
												echo"<td>".$row["car_type"]."</td>";
												echo"<td>".$row["carid"]."</td>";
												echo"<td>".$row["tips"]."</td>";
												echo"<td><button class='toolbt' onclick='ckehu(\"kehutb\",".$i.",".$row["id"].")'>选择</button></td>";
											echo"</tr>";
											$i++;
										}
									?>
									<tr class="aa">
									  <td colspan="8">
										<input id="addkh"  type="button"  class="botton" value="新建客户" onClick="addtr('kehutb')"/></td>
									</tr>
							   </table>
						</div>
		</div>				
	</body>
</html>