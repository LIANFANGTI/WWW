<!doctype html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>编辑</title>
<link href="css.css" rel="stylesheet" type="text/css">
</head>

<body onLoad="load()">

<div id="title"><a href="index.php"><img  id="logo" src="./img/logo .jpg"/></a></div>

<?php
$line=mysql_connect('qdm16147017.my3w.com','qdm16147017','19981102aa');
//$line=mysql_connect('localhost','root','root');
	 if($line){
mysql_select_db('qdm16147017_db',$line) or die( '错误'.mysql_error());
//""
		 $getid=$_GET['id'];
		
		 $sql3="select * from topic where id=".$getid.";";
		mysql_query("SET NAMES 'utf8'");
		 $sql=mysql_query($sql3);
		 while($row=mysql_fetch_array($sql)){
			 $tid[]=$row["id"];       //获取ID
			 $ttype[]=$row["type"];    //类型
			 $ttrued[]=$row["trued"]; //正确答案
			 $tcontent[]=$row["content"];//内容
			 $tcase1[]=$row["case1"];//A
			 $tcase2[]=$row["case2"];//B
			 $tcase3[]=$row["case3"];//C
			 $tcase4[]=$row["case4"];//D
		     $tfw[]=$row["ps"];//D
          };

		echo " <div class='d2'><form name='FORM' id='FORM'  method='post' action='up.php' >";
    	$topictype= "<fieldset><legend>题目类型:</legend>
						<select name='type' style='width:500px; font-size:40px;height:50px;'>
							<option value='选择题'>选择题</option>
							<option value='选择题'>选择题</optio>
						</select>
					</fieldset>";
			echo "所属范围".$tfw[0];
        $topicfwt="<fieldset><legend>知识范围:</legend>
					<select  name='danyuan'  style='width:500px; font-size:40px;height:50px;'>";
		switch($tfw[0]){
			case "第一单元":
					$topicfwmid="<option value='第一单元' selected='selected'>第一单元</option>
						<option value='第二单元'>第二单元</option>
						<option value='第三单元'>第三单元</option>
						<option value='第四单元'>第四单元</option>
						<option value='第五单元'>第五单元</option>
						<option value='第六单元'>第六单元</option>";
			break;
			case "第二单元":
										$topicfwmid="<option value='第一单元' >第一单元</option>
									<option value='第二单元' selected='selected'>第二单元</option>
									<option value='第三单元'>第三单元</option>
									<option value='第四单元'>第四单元</option>
									<option value='第五单元'>第五单元</option>
									<option value='第六单元'>第六单元</option>";
			break;
			case "第三单元":
						$topicfwmid="<option value='第一单元'>第一单元</option>
						<option value='第二单元'>第二单元</option>
						<option value='第三单元'  selected='selected'>第三单元</option>
						<option value='第四单元'>第四单元</option>
						<option value='第五单元'>第五单元</option>
						<option value='第六单元'>第六单元</option>";
			break;
			case "第四单元":
						$topicfwmid="<option value='第一单元''>第一单元</option>
						<option value='第二单元'>第二单元</option>
						<option value='第三单元'>第三单元</option>
						<option value='第四单元'  selected='selected>第四单元</option>
						<option value='第五单元'>第五单元</option>
						<option value='第六单元'>第六单元</option>";
			break;
			case "第五单元":
						$topicfwmid="<option value='第一单元'>第一单元</option>
						<option value='第二单元'>第二单元</option>
						<option value='第三单元'>第三单元</option>
						<option value='第四单元'>第四单元</option>
						<option value='第五单元'  selected='selected'>第五单元</option>
						<option value='第六单元'>第六单元</option>";
			break;
			case "第六单元":
						$topicfwmid="<option value='第一单元'>第一单元</option>
						<option value='第二单元'>第二单元</option>
						<option value='第三单元'>第三单元</option>
						<option value='第四单元'>第四单元</option>
						<option value='第五单元'>第五单元</option>
						<option value='第六单元'  selected='selected'>第六单元</option>";
			break;
			
			}

						
			$topicfww="</select></fieldset>";

			$topicfw=$topicfwt.$topicfwmid.$topicfww;
       $topiccontent=" <fieldset><legend>题目内容：</legend>
	   						<input name='content' type='text' value='".$tcontent[0]."' style='width:100%; font-size:40px;height:300px; vertical-align:text-top; '>
						</fieldset>";
	   $topiccasen="<fieldset>
	   			<legend>选项：</legend>
						选项A：<input type='text' class='opti' name='opt1' value='".$tcase1[0]."'><br><br> 
						选项B：<input type='text'class='opti'name='opt2' value='".$tcase2[0]."'> <br><br>
						选项C：<input type='text'class='opti' name='opt3' value='".$tcase3[0]."'> <br><br>
						选项D：<input type='text'class='opti'name='opt4' value='".$tcase4[0]."'> <br>
        </fieldset>";
		  $topictruedt=" <fieldset>
        	<legend>正确选项：</legend>
           <select  name='trued' style='width:500px; font-size:40px;height:50px;'>";
   switch($ttrued[0]){    	
           case "A":
		     $topictruedmid="<option value='请选择'>请选择</option>
                <option value='A'  selected='selected'>选项A</option>
                <option value='B'>选项B</option>
                <option value='C'>选项C</option>
                <option value='D'>选项D</option>";
		   break;
		   case "B":
		   		 $topictruedmid="<option value='请选择'>请选择</option>
                <option value='A' >选项A</option>
                <option value='B'  selected='selected'>选项B</option>
                <option value='C'>选项C</option>
                <option value='D'>选项D</option>";
		   break;
		   case "C":
		   		  $topictruedmid="<option value='请选择'>请选择</option>
                <option value='A'  >选项A</option>
                <option value='B'>选项B</option>
                <option value='C'>选项C</option>
                <option value='D'  selected='selected'>选项D</option>";
		   break;
		   case "D":
		   		  $topictruedmid="<option value='请选择'>请选择</option>
                <option value='A'  selected='selected'>选项A</option>
                <option value='B'>选项B</option>
                <option value='C'>选项C</option>
                <option value='D' selected='selected'>选项D</option>";
		   break;
		   		   case "请选择":
		   		  $topictruedmid="<option value='请选择'  selected='selected'>请选择</option>
                <option value='A' >选项A</option>
                <option value='B'>选项B</option>
                <option value='C'>选项C</option>
                <option value='D'>选项D</option>";
		   break;
    }
           $topictruedw="</select></fieldset><input type='text'  name='getid' value='".$getid."' style='display:none;'>
			<input type='text'  name='gettype' value='update' style='display:none;'>
			<div class='ba2' onclick='submit()'>保存修改</div><br>
			
		</form></div>";      
          $topictrued=$topictruedt.$topictruedmid.$topictruedw;
			
       	echo $topictype. $topicfw.$topiccontent.$topiccasen.$topictrued;
     echo "获取到的ID：".$getid;
		 }
		 

?>

<script>
     function submit(){
			if(document.getElementsByName("trued").item(0).value=="请选择"){
				alert("请设定一个正确选项")
			}else{
		  	document.getElementById("FORM").submit();
			 alert("提交成功")
			}
			    } 
</script>
</body>
</html>