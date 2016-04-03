<!doctype html>

<html>

<head>

<meta charset="utf-8">

<title>AddItem</title>

<link href="css.css" rel="stylesheet" type="text/css">

<style type="text/css">

</style>

</head>



<body>

<div id="title"><a href="index.php"><img  id="logo" src="./img/logo .jpg"/></a></div>

<div class="d2">

	<form name="FORM" id="FORM"  method="post" action="up.php" >

    	<fieldset>

        	<legend>题目类型:</legend>

          <select name="type" style="width:500px; font-size:40px;height:50px;">

                <option value="选择题">选择题</option>

                <option value="选择题">选择题</option>

           </select>

        </fieldset>

        <fieldset>

        	<legend>知识范围:</legend>

          <select  name="danyuan"  style="width:500px; font-size:40px;height:50px;">

                <option value="第一单元">第一单元</option>

                <option value="第二单元">第二单元</option>

                <option value="第三单元">第三单元</option>

                <option value="第四单元">第四单元</option>

                <option value="第五单元">第五单元</option>

                <option value="第六单元">第六单元</option>

           </select>

        </fieldset>

        <fieldset>

        	<legend>题目内容：</legend>

       	 <textarea id="text1" rows="10" cols="30" name="content" style="font-size:50px;"></textarea>

        </fieldset>

        <fieldset>

        	<legend>选项：</legend>

            	选项A：<input type="text" class="opti" name="opt1"><br><br> 

                选项B：<input type="text"class="opti"name="opt2"> <br><br>

                选项C：<input type="text"class="opti" name="opt3"> <br><br>

                选项D：<input type="text"class="opti"name="opt4"> <br>

        </fieldset>

        	

        <fieldset>

        	<legend>正确选项：</legend>

          <select  name="trued" style="width:500px; font-size:40px;height:50px;">

          		<option value="请选择">请选择</option>

                <option value="A">选项A</option>

                <option value="B">选项B</option>

                <option value="C">选项C</option>

                <option value="D">选项D</option>

                

           </select>

        </fieldset>   

       <input type='text'  name='gettype' value='add' style='display:none;'>

      </form>

     <div class="ba2" onClick="check()">提交</div>

</div>

<script>

	 function check(){

		 

		 var type="选择题"

		 var trued

		 var casen=[]

		 var content

		 var ps="无"

		 var msgbox="",counterror=0,countcase,yesorno="no"

//content内容赋值

		if(document.FORM.content.value==""){

			counterror=counterror+1

				msgbox=msgbox+counterror+"、请输入题目内容\n"

			}else{

				var content=document.FORM.content.value	

				}

//casen[n]ABCD各内容数组赋值

		if(document.getElementsByName("opt1").item(0).value==""){

			counterror=counterror+1

			msgbox=msgbox+counterror+"、请输入选项A内容\n"	

			}

		if(document.getElementsByName("opt2").item(0).value==""){

			counterror=counterror+1

			msgbox=msgbox+counterror+"、请输入选项B内容\n"	

			}

		if(document.getElementsByName("opt3").item(0).value==""){

			counterror=counterror+1

			msgbox=msgbox+counterror+"、请输入选项C内容\n"	

			}

		if(document.getElementsByName("opt4").item(0).value==""){

			counterror=counterror+1

			msgbox=msgbox+counterror+"、请输入选项D内容\n"	

			}


//正确选项赋值

		

		if(document.getElementsByName("trued").item(0).value!="请选择"){ var yesorno="yes"}

		//alert(document.getElementsByName("tured").item(0).value)

		//alert(document.getElementsByName("trued").item(0).value)



		 if(yesorno!="yes"){

			 counterror=counterror+1

			 msgbox=msgbox+counterror+"、请设定一个正确选项\n"

		 }

		

		 

	if(msgbox==""){

		alert("提交成功")

		submit()		

  }else{

		  alert("出现以下错误\n"+msgbox)

		}



     function submit(){

		  	document.getElementById("FORM").submit();

			    } 

		  

	 

	 }

</script>

</body>

</html>