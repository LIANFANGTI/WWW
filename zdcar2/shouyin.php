<!DOCTYPE html>
<html>
	<?php	require_once 'function.php';  ?>
	<head>

		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>收银</title>
		<link href="css/bootstrap.min.css" rel="stylesheet" />
		<link href="css/shouyin.css" rel="stylesheet" />
		<link href="//netdna.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet">
		<script src="js/js.js"></script>
		<script src="js/jquery-1.10.2.js"></script>
		<script src="js/shouyin.js"></script>
		<style>
			#noviptb,#viptb,#isnulltb{
				display:none;
			}
		</style>
	</head>

	<body onload="pageload()">
	<input type="hidden" value="<?php echo $cp; ?>" id="cp">
	
		<div class="container-fluid">
			<div class="input-group">
				<input type="search" placeholder="请输入手机号或姓名" onkeyup="khcx(this.value)" class="form-control" />
				<!--
            	作者：1003316758@qq.com
            	时间：2016-03-14
            	描述：搜索回车并执行 ，第一执行判断：是否存在数据库{
				存在：判断是会否是会员{
				①会员，跳出会员面板
				②非会员，增加成为会员选项（仍能正常消费，不是一定是会员才能消费）

				}else{
					输出不存在数据库的页面，需要添加到数据库
					}
            	}
            -->
				<span class="input-group-btn"><button class="btn btn-info" type="button">搜索</button></span>
			</div>
		</div>
		<!--
        	作者：1003316758@qq.com
        	时间：2016-03-14
        	描述：检索是会员
        -->
		<div class="container" id="viptb">
			<table class="table table-bordered table-condensed table-hover table-striped">
				<thead>
					<th>会员卡号</th>
					<th>客户名称</th>
					<th>手机号码</th>
					<th>会员余额</th>
					<th>用户积分</th>
					<th>创建时间</th>
					<th>会员等级</th>
					<th colspan="4">操作</th>
				</thead>
				<tbody id="viptba">
					<td>后台调取</td>
					<td>后台调取</td>
					<td>后台调取</td>
					<td>后台调取</td>
					<td>后台调取</td>
					<td>后台调取</td>
					<td>后台调取</td>
					<td><a class="btn btn-primary btn-xs" data-toggle="modal" href="#addxf">添加消费</a></td>
					<td><a class="btn btn-primary btn-xs" data-toggle="modal" href="#addcz">充值记录</a></td>
					<td><a class="btn btn-primary btn-xs" data-toggle="modal" href="#xfjl">消费记录</a></td>
					<td><a class="btn btn-primary btn-xs" data-toggle="modal" href="#carinfo">车辆信息</a></td>
				</tbody>
				</table>
				</div>
				<!--      	作者：1003316758@qq.com  时间：2016-03-14    	描述：检索是非会员-->
				<div class="container" id="noviptb">
					<table class="table table-bordered table-condensed table-hover table-striped">
						<thead>
							<th>会员卡号</th>
							<th>客户名称</th>
							<th>手机号码</th>
							<th>会员余额</th>
							<th>用户积分</th>
							<th>创建时间</th>
							<th>会员等级</th>
							<th colspan="4">非会员，点击成为会员即可成为会员</th>
						</thead>
						<tbody  id="noviptba">
							<td>后台调取</td>
							<td>后台调取</td>
							<td>后台调取</td>
							<td>后台调取</td>
							<td>后台调取</td>
							<td>后台调取</td>
							<td>后台调取</td>
							<td><a class="btn btn-primary btn-xs" data-toggle="modal" href="#vip">成为会员</a></td>
							<td><a class="btn btn-primary btn-xs" data-toggle="modal" href="#addcz2">添加充值</a></td>
							<td><a class="btn btn-primary btn-xs" data-toggle="modal" href="#addxf2">添加消费</a></td>
							<td><a class="btn btn-primary btn-xs" data-toggle="modal" href="#addcar">添加车辆</a></td>
						</tbody>
						</table>
				</div>
						<!--第三部分：数据库不存在此人,所有选项不是必填项-->
						<div class="container" id="isnulltb">
							
							<table class="table table-bordered table-condensed table-hover table-striped">
								<thead><th colspan=5>无匹配客户，请添加客户信息</td></thead>
								<div id="tbody1"><thead>
									<th>姓名</th>
									<th>手机号码</th>
									<th>车牌号</th>
									<th>是否成为会员</th>
									<th>操作</th>
									
								</thead>
								<tbody>
									<td><input type="text" placeholder="手动输入" class="form-control btn-xs text-center"></input></td>
									<td><input type="text" placeholder="手动输入" class="form-control btn-xs text-center"></input></td>
									<td><input type="text" placeholder="手动输入" class="form-control btn-xs text-center"></input></td>
									<td><a  class="btn btn-primary btn-xs"  data-toggle="modal" href="#addcz2">成为会员</a></td>
									<td style="vertical-align:middle;"><a class="btn btn-primary btn-xs">保 存</a></td>
								</tbody>
								</div>
							</table>
						</div>
						<script src="js/jquery.js"></script>
						<script src="js/bootstrap.min.js"></script>
						
 <!--#################################### 弹窗区#################################################-->
 
 
<!-- 模态弹出窗内容>添加消费 -->
		<div class="modal dade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="addxf">
			<div class="modal-dialog modal-lg">
				<div class="modal-content text-center">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">
							<span class="fa fa-times fa-lg"></span></span><span class="sr-only">Close</span>
						</button>
						<h4 class="modal-title">快速添加消费</h4>
					</div>
					<div class="modal-body text-center">
						<div class="row">
							<table class="table table-striped table-bordered table-hover">
								<thead>
									<tr>
										<th><span class="fa fa-calendar-times-o"> 日期</span></th>
										<th><span class="fa fa-wrench"> 项目</span></th>
										<th><span class="fa fa-money"> 金额</span></th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td><input type="date" class="form-control btn-xs"></td>
										<td><input type="text" class="form-control btn-xs"></td>
										<td><input type="text" class="form-control btn-xs"></td>
									</tr>
								</tbody>
							</table>
							<input type="button" class="btn btn-primary btn-sm" value="添加消费" />
						</div>

					</div>
					<div class="modal-footer text-center">
						<button type="button" class="btn btn-primary">保存</button>
					</div>
				</div>
			</div>
		</div>
		
		
<!-- 模态弹出窗内容>充值记录 -->
		<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="addcz">
			<div class="modal-dialog modal-lg">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">
							<span aria-hidden="true"><span class="fa fa-times fa-lg"></span></span></span>
							<span class="sr-only">Close</span>
						</button>
						<h4 class="modal-title">充值记录</h4>
					</div>
					<div class="modal-body text-center">
						<div class="row">
							<table class="table table-bordered table-hover table-striped">
								<thead>
									<tr>
										<th><span class="fa fa-calendar-times-o"> 时间</th>
										<th><span class="fa fa-money"> 金额</th>
										<th><span class="fa fa-credit-card"> 支付方式</th>
										<th><span class="fa fa-credit-card"> 订单编号</th>
										<th><span class="fa fa-credit-card"> 地点</th>
									</tr>
								</thead>
								<tbody id="czjla">
								</tbody>
								<tr id="addcz1" style="display:none;">
									<td colspan=1>
										<select class="form-control btn-xs" id="money">
											<option value="0">选择充值面额</option>
											<option value="50">50</option>
											<option value="100">100</option>
											<option value="300">300</option>
											<option value="500">500</option>
											<option value="1000">1000</option>
										</select>
									</td>
									<td colspan=2>
										<select class="form-control btn-xs" id="czfs">
											<option value="0">选择支付方式</option>
											<option value="1">支付宝</option>
											<option value="2">微信</option>
											<option value="3">现金</option>
											<option value="4">其他</option>
										</select>
									</td>
									<td><input type="text" class="form-control btn-xs" placeholder="备注信息" id="tips"></td>
									<td><input type="button" value="提交" class="btn btn-primary btn-sm" onclick="tjcz()" /></td>
								</tr>			
							</table>
						</div>
						<input type="button" value="添加充值" class="btn btn-primary btn-sm" onclick="addcz()" />
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-primary">保存</button>
					</div>
				</div>
			</div>
		</div>		

		
<!-- 模态弹出窗内容  消费记录 -->
	<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="xfjl">
		<div class="modal-dialog modal-lg"">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">
						<span aria-hidden="true">
							<span class="fa fa-times fa-lg"></span>
						</span>
						<span class="sr-only">Close</span>
					</button>
					<h4 class="modal-title">消费记录</h4>
				</div>
				<div class="modal-body text-center">
					<div class="row">
						<table class="table table-striped table-bordered table-hover">
							<thead>
								<tr>
									<th><span class="fa fa-calendar-times-o"> 日期</span></th>
									<th><span class="fa fa-money"> 金额</span></th>
									<th><span class="fa fa-wrench">类型</span></th>
									<th><span class="fa fa-wrench">编码</span></th>
									<th><span class="fa fa-wrench">地点</span></th>
								</tr>
							</thead>
							<tbody id="xfjla">
								<tr>
									<td>后台调取</td>
									<td>后台调取</td>
									<td>后台调取</td>
								</tr>
								<tr>
									<td><input type="date" class="form-control btn-xs"></td>
									<td><input type="text" class="form-control btn-xs" /></td>
									<td><input type="text" class="form-control btn-xs"></td>
								</tr>
							</tbody>
						</table>
					</div>
					<input type="button" class="btn btn-primary btn-sm" value="添加消费" />
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-primary">保存</button>
				</div>
			</div>
		</div>
	</div>	
	
	
<!-- 模态弹出窗内容 车辆信息 -->
	<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="carinfo">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">
						<span aria-hidden="true">
							<span class="fa fa-times fa-lg"></span>
						</span>
						<span class="sr-only">Close</span>
				    </button>
					<h4 class="modal-title">车辆信息</h4>
				</div>
				<div class="modal-body text-center">
					<div class="row">
						<table class="table table-striped table-bordered table-hover">
							<thead>
								<tr>
									<th><span class="fa fa-calendar-times-o">序号</span></th>
									<th><span class="fa fa-wrench">品牌</span></th>
									<th><span class="fa fa-money">车型</span></th>
									<th><span class="fa fa-car">车牌</span></th>
									<th><span class="fa fa-car">购车日期</span></th>
									<th><span class="fa fa-car">备注</span></th>
								</tr>
							</thead>
							<tbody id="carinfo1">
							</tbody>
							<tr id="addcar" style="display:none;">
								<td><input type="text" class="form-control btn-xs" placeholder="品牌" id="pp"></td>
								<td><input type="text" class="form-control btn-xs" placeholder="车型" id="car"></td>
								<td><input type="date" class="form-control btn-xs" placeholder="购车日期" id="bdate"></td>
								<td><input type="text" class="form-control btn-xs" placeholder="车牌号" id="carid"></td>
								<td><input type="text" class="form-control btn-xs" placeholder="备注" id="tipsc"></td>
								<td colspan=2><input type="button" class="btn btn-primary btn-sm" onclick="scar()" value="提交" /></td>
							</tr>
						</table>
					</div>
					<input type="button" class="btn btn-primary btn-sm" onclick="addcar()" value="增加车辆" />
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-primary">保存</button>
				</div>
			</div>
		</div>
	</div>	
<!-- 模态弹出窗内容  添加消费 -->
	<div class="modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="addxf2">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">
						<span class="fa fa-times fa-lg"></span></span></span><span class="sr-only">Close</span>
					</button>
					<h4 class="modal-title">添加消费</h4>
				</div>
				<div class="modal-body">
					<div class="row">
						<table class="table table-striped table-bordered table-hover">
							<thead>
								<tr>
									<th><span class="fa fa-calendar-times-o"> 日期</span></th>
									<th><span class="fa fa-wrench"> 项目</span></th>
									<th><span class="fa fa-money"> 金额</span></th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td><input type="date" class="form-control btn-xs"></td>
									<td><input type="text" class="form-control btn-xs" /></td>
									<td><input type="text" class="form-control btn-xs"></td>
								</tr>
							</tbody>
						</table>
					</div>
					<input type="button" class="btn btn-primary btn-sm" value="添加消费" />
				</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-primary">保存</button>
			</div>
		</div>
	</div>
</div>	

<!-- 模态弹出窗内容 -->
	<div class="modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="addcar">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">
						<span class="fa fa-times fa-lg"></span></span></span><span class="sr-only">Close</span>
					</button>
					<h4 class="modal-title">添加车辆</h4>
				</div>
				<div class="modal-body">
					<div class="row">
						<table class="table table-striped table-bordered table-hover">
							<thead>
								<tr>
									<th><span class="fa fa-calendar-times-o"> 品牌</span></th>
									<th><span class="fa fa-wrench"> 车型</span></th>
									<th><span class="fa fa-money"> 购车日期</span></th>
									<th><span class="fa fa-car"> 车牌</span></th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td><input type="text" class="form-control btn-xs"></td>
									<td><input type="text" class="form-control btn-xs"></td>
									<td><input type="date" class="form-control btn-xs"></td>
									<td><input type="text" class="form-control btn-xs"></td>
								</tr>
							</tbody>
						</table>
						<input type="button" class="btn btn-primary btn-sm" value="新建车辆">
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-primary">保存</button>
				</div>
			</div>
		</div>
	</div>	
	
	
		<!-- 模态弹出窗内容 添加消费 -->
						<div class="modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="addxf2">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true"><span class="fa fa-times fa-lg"></span></span><span class="sr-only">Close</span></button>
										<h4 class="modal-title">快速添加消费</h4>
									</div>
									<div class="modal-body">
										<div class="row">
											<table class="table table-striped table-bordered table-hover">
												<thead>
													<tr>
														<th><span class="fa fa-calendar-times-o"> 日期</span></th>
														<th><span class="fa fa-wrench"> 项目</span></th>
														<th><span class="fa fa-money"> 金额</span></th>
													</tr>

												</thead>
												<tbody>
													<tr>
														<td><input type="date" class="form-control btn-xs"></td>
														<td><input type="text" class="form-control btn-xs"></td>
														<td><input type="text" class="form-control btn-xs"></td>
													</tr>
												</tbody>
											</table>
											<input type="button" class="btn btn-primary btn-sm" value="添加消费" />
										</div>

									</div>
									<div class="modal-footer">

										<button type="button" class="btn btn-primary">保存</button>
									</div>
								</div>
							</div>
						</div>
</body>
</html>