<?php
@session_start();
require_once 'mysql.class.php';
require_once 'page.class.php';
$db = new mysql('121.196.226.94', 'admin', 'xwq198291', "zckj_db");
if(!isset($_SESSION["company"])){
	header("Location: ../yunku/index.php");
}else{
	$cp=$_SESSION["company"];//公司id获取
	$db->select("company","*","id=".$cp."");$company=$db->fetchArray(MYSQL_ASSOC);$cpname=$company[0]["name"];//公司名称获取
	$username=$_SESSION["name"];//用户名获取
	$hd=$_SESSION["head"];
	echo "<input type='hidden' value='".$cp."' id='cp'>";
	}
	
/*通用函数库*/
function btypet($a){
	switch($a){
		case "0":$b="未选择订单类型";break;
		case "1":$b="美容";break;
		case "2":$b="维修";break;
		case "3":$b="保养";break;
		case "0":$b="改装";break;
	}	
	return $b;
}
function jsfst($a){
	switch($a){
		case "0":$b="未选择支付类型";break;
		case "1":$b="支付宝支付";break;
		case "2":$b="微信支付";break;
		case "3":$b="现金付款";break;
		case "0":$b="合作商付款";break;
	}	
	return $b;
}
function btype($a){
	//订单类型
	switch($a){
		case "0":
			$b="<option value='0' selected='selected'>选择订单类型</option><option value='1'>美容</optio<option value='2'>维修</option><option value='3'>保养</option><option value='4'>改装</option>";
			
	    break;
		case "1":
			$b="<option value='0'>选择订单类型</option>
				<option value='1'  selected='selected'>美容</option>
				<option value='2'>维修</option>
				<option value='3'>保养</option>
				<option value='4'>改装</option>
			";break;
		case "2":
				$b="<option value='0'>选择订单类型</option>
				<option value='1'>美容</option>
				<option value='2' selected='selected'>维修</option>
				<option value='3'>保养</option>
				<option value='4'>改装</option>
			"; break;	
		case "3":	
				$b="<option value='0'>选择订单类型</option>
				<option value='1' >美容</option>
				<option value='2'>维修</option>
				<option value='3' selected='selected'>保养</option>
				<option value='4'>改装</option>
			"; break;	
		case "4":	
				$b="<option value='0'>选择订单类型</option>
				<option value='1' >美容</option>
				<option value='2'>维修</option>
				<option value='3'>保养</option>
				<option value='4'  selected='selected'>改装</option>
			"; break;		
	}
	return "<select  type='text' id='b_type' name='btype' class='input_td ' style='overflow: hidden;width:auto;'>".$b."</select>";
}
/*结算状态*/
function jszt($a){
	switch($a){
		case "0":$b="<option selected='selected'>未结算</option><option>已结算</option>";break;
		case "1":$b="<option>未结算</option><option selected='selected'>已结算</option>";break;	
	}
	return "<select class='text' id='jszt'>".$b."</select>";
}
/*业务状态*/
function ywzt($a){
	switch($a){
		case "1":$b="<option value='1' selected='selected'>已完成</option><option value='0' >进行中</option>";break;
		case "0":$b="<option value='1' >已完成</option><option selected='selected' value='0' >进行中</option>";break;	
	}
	return "<select class='input_td' id='ywzt'>".$b."</select>";
}
/*结算方式*/
function jsfs($a){
	switch($a){
		case "0":
			$b="<option value='0' selected='selected'>选择支付方式</option>
				<option value='1'>支付宝支付</option>
				<option value='2'>微信支付</option>
				<option value='3'>现金付款</option>
				<option value='4'>合作商付款</option>
			";break;
		case "1":
			$b="<option value='0'>选择支付方式</option>
				<option value='1' selected='selected'>支付宝支付</option>
				<option value='2'>微信支付</option>
				<option value='3'>现金付款</option>
				<option value='4'>合作商付款</option>
			";break;
		case "2":
			$b="<option value='0'>选择支付方式</option>
				<option value='1'>支付宝支付</option>
				<option value='2' selected='selected'>微信支付</option>
				<option value='3'>现金付款</option>
				<option value='4'>合作商付款</option>
			";break;
		case "3":	
			$b="<option value='0'>选择支付方式</option>
				<option value='1'>支付宝支付</option>
				<option value='2'>微信支付</option>
				<option value='3' selected='selected'>现金付款</option>
				<option value='4'>合作商付款</option>
			";break;
		case "4":	
			$b="<option value='0'>选择支付方式</option>
				<option value='1'>支付宝支付</option>
				<option value='2'>微信支付</option>
				<option value='3'>现金付款</option>
				<option value='4' selected='selected'>合作商付款</option>
			";break;	
	}
	return "<select class='text' id='jsfs'>".$b."</select>";
}
/*客户信息*/
function kh($id,$col){
	global $db;
	$db->select("kehu", "*", "id=".$id );$kehu = $db->fetchArray(MYSQL_ASSOC);
	return	$kehu[0][$col];
}
/*商品信息*/
function sp($id,$col){
	global $db;
	$db->select("shop", "*", "sid=".$id );$shop = $db->fetchArray(MYSQL_ASSOC);
	return	$shop[0][$col];
}
/*订单信息*/
function bl($id,$col){
	global $db;
	$db->select("bill", "*", "id=".$id );$bill = $db->fetchArray(MYSQL_ASSOC);
	return	$bill[0][$col];
}
//通用查询 使用说明 select（表名，字段，值，要返回字段）返回单行值  多条结果取首条
function select($tab,$col,$val,$bal){global $db;$db->select($tab, "*", $col."=".$val);$array = $db->fetchArray(MYSQL_ASSOC);return $array[0][$bal];}
//通用查询 使用说明：select2（表名，字段，值）返回数组
function select2($tab,$col,$val){
	global $db;
	$db->select($tab, "*", $col."=".$val);$array = $db->fetchArray(MYSQL_ASSOC);	
	return $array;
}
function car($id,$kh){
	global $db;
	$db->select("car","*","kh=$kh");$array = $db->fetchArray(MYSQL_ASSOC);
	$option="";
	foreach($array as $row){
		$option.="<option value='".$row["id"]."'>".$row["carid"]."</option>";
		if($row["id"]==$id)$option.="<option value='".$row["id"]."' selected='selected' >".$row["carid"]."</option>";
	}
	if(empty($array))$option="<option value='0' selected='selected' >暂无车辆信息</option>";
	return "<select  id='carinfo' class='input_td'>".$option."</select>";
	
}
 ?>