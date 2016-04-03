<!DOCTYPE html>
<?php 
	require_once 'function.php';



?>
<html>

	<head>
		<meta charset="UTF-8">
		<title>收银</title>
		<link href="css/bootstrap.min.css" rel="stylesheet" />
		<link href="css/shouyin.css" rel="stylesheet" />
				 <script src="js/js.js"></script>
		<script src="js/shouyin.js"></script>
		<script src="js/jquery-1.10.2.js"></script>

	</head>
	<body>
		<div class="container-fluid">
				<div class="input-group">
			<input type="search" placeholder="请输入手机号或姓名" class="form-control" onkeyup="khcx(this.value)" />
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
			<span class="input-group-addon"><input type="button" value="搜索" class="btn-link btn-primary"> </span>
		</div>
		</div>
		
		<!--
        	作者：1003316758@qq.com
        	时间：2016-03-14
        	描述：检索是会员
        -->
		<div class="container" id="vip">
			<table class="table table-bordered table-condensed table-hover table-striped">
			<thead >
				<th>会员卡号</th>
				<th>客户名称</th>
				<th>手机号码</th>
				<th>会员余额</th>
				<th>用户积分</th>
				<th>创建时间</th>
				<th>会员等级</th>
				<th colspan="4">操作</th>
			</thead>
			<tbody id="viptb">
				<!--/*后台读取部分  ajax 控制*/-->
			</tbody>
		</table>			
		</div>
		<!--
        	作者：1003316758@qq.com
        	时间：2016-03-14
        	描述：检索是非会员
        -->
        	<div class="container" id="novip"  style='display:none;'>
			<table class="table table-bordered table-condensed table-hover table-striped">
			<thead >
				<th>会员卡号</th>
				<th>客户名称</th>
				<th>手机号码</th>
				<th>会员余额</th>
				<th>用户积分</th>
				<th>创建时间</th>
				<th>会员等级</th>
				<th colspan="4">非会员，点击成为会员即可成为会员</th>
			</thead>
			<tbody>
				<td>后台调取</td>
				<td>后台调取</td>
				<td>后台调取</td>
				<td>后台调取</td>
				<td>后台调取</td>
				<td>后台调取</td>
				<td>后台调取</td>
				<td><a href="#">成为会员</a></td>
				<td><a href="#">添加充值</a></td>
				<td><a href="#">添加消费</a></td>
				<td><a href="#">添加车辆</a></td>
				</div>
					</tbody>
		</table>	
		<!--第三部分：数据库不存在此人,所有选项不是必填项-->
			<div class="container" id="isnull" style='display:none;'>
			<h4>查无此人，清添加个人信息</h4>
			<table class="table table-bordered table-condensed table-hover table-striped">
			<thead >
				<th>姓名</th>
				<th>手机号码</th>
				<th>创建时间</th>
				<th>车牌号</th>
				<th colspan="4">不存在此人，清添加</th>
			</thead>
			<tbody>
				<td><input type="text" placeholder="手动"></input></td>
				<td><input type="text" placeholder="手动"></input></td>
				<td>自动</input></td>
				<td><input type="text" placeholder="手动"></input></td>
				<td><a href="#" class="btn btn-info">保 存</a></td>
				</div>
					</tbody>
		</table>	
	</body>
</html>
