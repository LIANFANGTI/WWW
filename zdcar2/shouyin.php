<!DOCTYPE html>
<html>

	<head>

		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>收银1</title>
		<link href="css/bootstrap.min.css" rel="stylesheet" />
		<link href="css/shouyin.css" rel="stylesheet" />
		<link href="//netdna.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet">
		<script src="js/js.js"></script>
		<script src="js/shouyin.js"></script>
		<style>
			#noviptb,#viptb,#isnulltb{
				display:none;
			}
		</style>
	</head>

	<body>
	<a class="btn btn-primary btn-xs" data-toggle="modal" href="#addxf2">添加消费</a>
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
							<h4><b>查无此人，清添加个人信息</b></h4>
							<table class="table table-bordered table-condensed table-hover table-striped">
								<thead>
									<th>姓名</th>
									<th>手机号码</th>
									<th>车牌号</th>
									<th colspan="4">不存在此人，清添加</th>
								</thead>
								<tbody>
									<td><input type="text" placeholder="手动输入" class="form-control btn-xs text-center"></input></td>
									<td><input type="text" placeholder="手动输入" class="form-control btn-xs text-center"></input></td>
									<td><input type="text" placeholder="手动输入" class="form-control btn-xs text-center"></input></td>
									<td style="vertical-align:middle;"><a class="btn btn-primary btn-xs">保 存</a></td>
						</div>
						</tbody>
						</table>
						<script src="js/jquery.js"></script>
						<script src="js/bootstrap.min.js"></script>
						
 <!--#################################### 弹窗区#################################################-->
 
 
<!-- 模态弹出窗内容>添加消费 -->
		<div class="modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="addxf">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">
							<span class="fa fa-times fa-lg"></span></span><span class="sr-only">Close</span>
						</button>
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
		
		
<!-- 模态弹出窗内容>充值记录 -->
		<div class="modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="addcz">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">
							<span aria-hidden="true"><span class="fa fa-times fa-lg"></span></span></span>
							<span class="sr-only">Close</span>
						</button>
						<h4 class="modal-title">充值记录</h4>
					</div>
					<div class="modal-body">
						<div class="row">
							<table class="table table-bordered table-hover table-striped">
								<thead>
									<tr>
										<th><span class="fa fa-calendar-times-o"> 时间</th>
										<th><span class="fa fa-credit-card"> 支付方式</th>
										<th><span class="fa fa-money"> 金额</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>后台调取</td>
										<td>后台调取</td>
										<td>后台调取</td>
									</tr>
									<tr>
										<td><input type="date" class="form-control btn-xs"></td>
										<td>
											<select class="form-control btn-xs">
												<option selected="selected">支付宝</option>
													<option>微信</option>
													<option>现金</option>
													<option>其他</option>
											</select>
										</td>
										<td><input type="text" class="form-control btn-xs"></td>
									</tr>
								</tbody>
											
							</table>
						</div>
						<input type="button" value="添加充值" class="btn btn-primary btn-sm" />
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-primary">保存</button>
					</div>
				</div>
			</div>
		</div>		

		
<!-- 模态弹出窗内容  消费记录 -->
	<div class="modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="xfjl">
		<div class="modal-dialog">
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
	<div class="modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="carinfo">
		<div class="modal-dialog">
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
									<td>后台调取</td>
									<td>后台调取</td>
									<td>后台调取</td>
									<td>后台调取</td>
								</tr>
								<tr>
									<td>后台调取</td>
									<td>后台调取</td>
									<td>后台调取</td>
									<td>后台调取</td>
								</tr>
								<tr>
									<td><input type="text" class="form-control btn-xs"></td>
									<td><input type="date" class="form-control btn-xs"></td>
									<td><input type="text" class="form-control btn-xs"></td>
									<td><input type="text" class="form-control btn-xs"></td>
								</tr>

							</tbody>
						</table>
					</div>
					<input type="button" class="btn btn-primary btn-sm" value="增加车辆" />
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-primary">保存</button>
				</div>
			</div>
		</div>
	</div>	
	
	
<!-- 模态弹出窗内容>充值 -->
	<div class="modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="vip">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">
						<span class="fa fa-times fa-lg"></span></span></span><span class="sr-only">Close</span>
					</button>
					<h4 class="modal-title">成为会员</h4>
				</div>
				<div class="modal-body">
					<div class="row">
						<table class="table table-bordered table-hover table-striped">
							<thead>
								<tr>
									<th><span class="fa fa-calendar-times-o"> 时间</th>
									<th><span class="fa fa-credit-card"> 支付方式</th>
									<th><span class="fa fa-money"> 金额</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td><input type="date" class="form-control btn-xs"></td>
									<td>
										<select class="form-control btn-xs">
											<option selected="selected">支付宝</option>
											<option>微信</option>
											<option>现金</option>
											<option>其他</option>
										</select>
									</td>
									<td><input type="text" class="form-control btn-xs"></td>
								</tr>
							</tbody>
						</table>
					</div>
					<input type="button" value="添加充值" class="btn btn-primary btn-sm" />
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


<!-- 模态弹出窗内容  添加充值 -->
	<div class="modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="addcz2">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">
						<span aria-hidden="true">
							<span class="fa fa-times fa-lg"></span>
						</span>
						<span class="sr-only">Close</span>
					</button>
					<h4 class="modal-title">添加充值</h4>
				</div>
				<div class="modal-body">
					<div class="row">
						<table class="table table-bordered table-hover table-striped">
							<thead>
								<tr>
									<th><span class="fa fa-calendar-times-o"> 时间</th>
									<th><span class="fa fa-credit-card"> 支付方式</th>
									<th><span class="fa fa-money"> 金额</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td><input type="date" class="form-control btn-xs"></td>
									<td>
										<select class="form-control btn-xs">
											<option selected="selected">支付宝</option>
											<option>微信</option>
											<option>现金</option>
											<option>其他</option>
										</select>
									</td>
									<td><input type="text" class="form-control btn-xs"></td>
								</tr>
							</tbody>				
						</table>
					</div>
					<input type="button" value="添加充值" class="btn btn-primary btn-sm" />
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