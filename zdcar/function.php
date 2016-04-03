<?php

//#####################################################################################数据库连接函数
	function conmysql(){
		$line=mysql_connect("121.196.226.94",'root','root');
		if($line){
			mysql_select_db('zckj_db',$line) or die( '错误'.mysql_error());
			mysql_query("SET NAMES 'utf8'");//SQL读取中文乱码解决
		}
	}
//#####################################################################################用户类型转换			
	function type_c($a){
		switch($a){
			case "admin":$b="管理员";break;
			case "vip":$b="会员";break;
			case "pt_user":$b="普通用户";break;
			default:$b="普通用户";break;
		}	
		return $b;				
	}
//#####################################################################################数据查询	
	function mysql_con($sqls,$type){
		$line=mysql_connect("121.196.226.94",'root','root');
		if($line){
			mysql_select_db('zckj_db',$line) or die( '错误'.mysql_error());
			mysql_query("SET NAMES 'utf8'");//SQL读取中文乱码解决
			$sql=mysql_query($sqls);
			if($sql){
				switch($type){
					case "select":
						$row=mysql_fetch_array($sql);
						return $row;
					break;		
				}
			}else{
				return mysql_error();	
			}
		}
	}
//#####################################################################################记录检测
	function check_j($ziduan,$jilu){
		conmysql();
		$sql=mysql_query("select * from user where ".$ziduan."='".$jilu."'");
		if(mysql_num_rows($sql))return true ;else return false ;
	}
	
//
	function insert(&$a){
		
	}
?>
