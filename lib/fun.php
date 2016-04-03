<?php
require_once 'mysql.class.php';
$db = new mysql('121.196.226.94', 'admin', 'xwq198291', "zckj_db");
function btypete($a){
	switch($a){
		case "0":$b="未选择订单类型";break;
		case "1":$b="美容";break;
		case "2":$b="维修";break;
		case "3":$b="保养";break;
		case "4":$b="改装";break;
	}	
	return $b;
}
function select($tab,$tj,$val){
	global $db;
	$db->select($tab, "*", $tj."=".$val);$array = $db->fetchArray(MYSQL_ASSOC);	
	return $array;
}
function login($info,$url){
	//echo $info[0]["name"];
	@session_start();
	echo "<br>".$_SESSION['user']=$info[0]["phone"];
	echo "<br>".$_SESSION['openid']=$info[0]["openid"];
	echo "<br>".$_SESSION['name']=$info[0]["name"];
	echo "<br>".$_SESSION['company']=$info[0]["company"];
	echo "<br>".$_SESSION['head']=$info[0]["head"];
	header('Location:'.$url);	
}
function logincheck(){
	@session_start();
	if(isset($_SESSION["openid"])){
		$openid=$_SESSION["oepnid"];
		return $openid=$_SESSION["openid"];
	}else{
		return false;
	}
}
function wx_userinfo($openid){
	
}
//以表格形式打印数组
function print_a($array){
	if(empty($array)){
		echo"ERROR:数组为空";
	}
echo "<table border=1><caption>数组</caption>";
foreach($array as $key=>$val){
	echo "<tr><td>".$key."</td><td>".$val."</td></tr>";
}
echo"</table>";

}
/*
function info($tab,$date,$val,$col){
	global $db;
	$db->select($tab,$col,"id=".$id );$kehu = $db->fetchArray(MYSQL_ASSOC);
	echo $db->printMessage();
	return	$kehu[0][$col];
}*/
function iname($id){
	global $db;
	$db->select("item","*","id=".$id );$items = $db->fetchArray(MYSQL_ASSOC);
	//echo $db->printMessage();
	return	$items[0]["itemname"];
}
function sname($id){
	global $db;
	$db->select("shop","*","sid=".$id );$shops = $db->fetchArray(MYSQL_ASSOC);
	//echo $db->printMessage();
	return	$shops[0]["sname"];
}
function curl($url){
	$json =curl_init();
	curl_setopt($json, CURLOPT_URL, $url);
	curl_setopt($json,CURLOPT_SSL_VERIFYPEER, FALSE);
	curl_setopt($json, CURLOPT_SSL_VERIFYHOST, FALSE);
	curl_setopt($json,CURLOPT_RETURNTRANSFER, 1);
	$json1 = curl_exec($json);
	curl_close($json);
	$bcode=json_decode($json1,true);
	return $bcode;
}
?>