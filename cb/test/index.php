<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>是不是这个页面？</title>

</style>
</head>
<body >
<?php
	class human{
		var $name;
		var $age;
		function seeav(){
			if($this->age<18)return "已满18岁可以看AV";else	return "未满18岁不能看AV";
		}
		function say(){
			echo "我叫".$this->name."今年".$this->age."岁了，我".$this->seeav().",请多多关照。<br>";
		}
		function __destruct(){
			echo "<br>再见".$this->name;
		}

	}
	$human=new human();
	$human1=new human();


	$human->name="李二狗";$human->age=18;
	$human1->name="张全蛋";	$human1->age=14;

	$human->say();
	$human1->say();
?>
</body>
</html>