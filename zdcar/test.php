<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>MSQL类调用</title>
</head>
<?php
	require_once 'mysql.class.php';
	//require_once 'commonFun.php';
	$db = new mysql('121.196.226.94', 'admin', 'xwq198291', "zckj_db");
    $db->select("user", "*", "user = 'admin1233'");
	$result = $db->fetchArray(MYSQL_ASSOC);
    print_r($result);
?>

<?php
/*
function some_func(){
	echo "共传递了".func_num_args()."个参数<br>";
	for($i = 0; $i<func_num_args(); ++$i){
		$param = func_get_arg($i);
		echo "第".($i+1)."个参数是".$param."<br>";
	}
}
some_func(1,3,5,7,9);*/
?>
<body>
</body>
</html>
