<?php



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
function login($id,$type){
		
}
?>