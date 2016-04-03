
<html>

   <head>

        <title>DUCKDOG</title>

        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link href="css.css" rel="stylesheet" type="text/css">
        <script src="js/js.js" type="text/javascript"></script>
        <script src="js/jquery-1.11.3.min.js" type="text/javascript"></script>
   </head>
   <body onLoad="load()">
<embed src="music/qmnlg.mp3" hidden="true" autostart="true" loop="true"/> 
   <script>
     var sen1=0,t1=0

,t2=0,t3=0,t4=0,t5=0

     var t6=0,t7=0,t8=0

    

      function load(){

         startTime();
		
		 $("#ad_index_img2").hide()

          //alert("内容测试阶段，现在访问的都是\n傻逼\n现在内容只有第一单元\n若目录无法正常打开就只能说明人丑\n@(¯_¯)@")



}

 function password(){

       var pas=prompt("请输入管理密码",""); 

        if(pas=="adminn"){

               location.replace("update.php?user=admin")

             }else if(pas != ""){

               alert("密码错误")

             }

        }

 

      function input(){

          var abc=null

          var str=prompt("请输入新的项目名称",abc);

          d11.style.background=str

          var abc=str

      }

      

      function display(back){

         switch(back){

           case 1:

              t1=t1+1

              if(t1%2==1){

                  zml.style.display="block"

              }else{

                 zml.style.display="none"

              }

            break;

            case 2:

              t2=t2+1

              if(t2%2==1){zm2.style.display="block"}else{zm2.style.display="none"}

            break;

            case 3:

              t3=t3+1

              if(t3%2==1){zm3.style.display="block"}else{zm3.style.display="none"}

            break;

             case 4:

              t4=t4+1

              if(t4%2==1){zm4.style.display="block"}else{zm4.style.display="none"}

            break;

             case 5:

              t5=t5+1

              if(t5%2==1){zm5.style.display="block"}else{zm5.style.display="none"}

            break;

            case "set":

               sen1=sen1+1

               if(sen1%2==1){

                  conset.style.display="block" 

                  getclass(".d1").display="none"

                  getclass(".gml1").display="none"

                  set2.innerHTML="关闭"

                  getclass(".mul").display="none"

                  

               }else{

                  conset.style.display="none"

                  getclass(".d1").display="block"

                  getclass(".gml1").display="block"

                  set2.innerHTML="工具"

                      getclass(".mul").display="block"

               }

            break;

            case 6:

              t6=t6+1

              if(t6%2==1){zm6.style.display="block"}else{zm6.style.display="none"}

            break;

            case 7:

              t7=t7+1

              if(t7%2==1){zm7.style.display="block"}else{zm7.style.display="none"}

            break;

            

}



        }

        

        

 

		</script>

   <a name="top"></a>

<div id="title"><a href="index.php"><img  id="logo" src="./img/logo .jpg"/></a></div>

   <div class="tools">

      <div id="clock">1234</div>
	
      <div id="date">2015年<br>4月31日<br>星期四</div> 
      <?php  
	  $hd="<div class='hd' style='width:80px; margin:25px 0px 0px 20px;float:left;height:80px;border-radius:100px;overflow:hidden;' onClick='selectfile()'>";
	  $ed="</div>";
		@session_start();
		if(isset($_SESSION['logined'])){
//$line=mysql_connect('qdm16147017.my3w.com','qdm16147017','19981102aa');
$line=mysql_connect('localhost','root','root');
	 if($line){
mysql_select_db('qdm16147017_db',$line) or die( '错误'.mysql_error());
//mysql_select_db('qdm16147017',$line) or die( '错误'.mysql_error());
		 mysql_query("SET NAMES 'utf8'");//SQL读取中文乱码解决
		 $sql=mysql_query("select * from user where id=".$_SESSION['logined']."");
			 $rows=mysql_num_rows($sql);     //行读取 
			 $cols=mysql_num_fields($sql);
			 while($row=mysql_fetch_array($sql)){
				 $head[]=$row["head"];
			   }		 	
				$src=substr($head[0], 3);
               }			
			 $in="<a href='user/homepage.php?id=".$_SESSION['logined']."'><img style='width:100%;min-height:100%;text-align:center;'src='".$src."'/ ></a>"	;		
			}else{
			$in="<a href='user/login.php?action=\"login\"'><img style='width:100%;min-height:100%;text-align:center;' src='img/emoj_1.png'/></a>";
				}
		echo $hd.$in.$ed;
	?>
      <div  id="set1" onClick="night()"><img id="sun"src="./img/sun.jpg"></div>

      <div class="set" id="set2" onClick="display('set')">工具</div>

   </div>

   

   <div id="conset">

      <div class="cs" onClick=""><img  class="csimg" src="./img/color_set.jpg"></div>

      <div class="cs" id="yej" onClick="night()"><img  src="./img/moon.jpg"></div>

      <div class="cs" onClick="location.replace('Add.php')">1</div>

      <div class="cs" onClick="location.replace('update.php?user=admin')">管</div> 

      <a href="dos.htm" class="cs">C:\</a>

      <a href="content.php" class="cs">Ct</a>

      <a href="user/login.php" class="cs">登</a>
		<img src=""/>
        
   </div>
 
<?php
//$line=mysql_connect('qdm16147017.my3w.com','qdm16147017','19981102aa');
$line=mysql_connect('localhost','root','root');
	 if($line){
mysql_select_db('qdm16147017_db',$line) or die( '错误'.mysql_error());
//mysql_select_db('qdm16147017',$line) or die( '错误'.mysql_error());
		 
		 $sql3="SELECT unit,count(*) from content group by unit order by ps;";  //SQL语句
		 mysql_query("SET NAMES 'utf8'");//SQL读取中文乱码解决
		 $sql=mysql_query($sql3);        //SQL执行		
	     $rows=mysql_num_rows($sql);     //行读取 
		 $cols=mysql_num_fields($sql);
		 while($row=mysql_fetch_array($sql)){
			 $unit[]=$row["unit"];
			 $count2[]=$row["count(*)"];
		   }
		   $count1= count($unit);
		   echo "<table width='100%' border='1'>";
		   echo "<div id='ad_index' onclick='jqy1()'>
		   				<img src='img/5576a5c420c46.JPG' class='ad_index_img' id='ad_index_img1'>						
				</div> ";
				 for($i=0;$i<$count1;$i++){
						 unset($id);unset($unit2);unset($title);unset($content);			 	
						
						 $sql2=mysql_query("select * from content where unit='".$unit[$i]."'" );
                         $rows2=mysql_num_rows($sql2);
						 $cols2=mysql_num_fields($sql2);
						 while($row=mysql_fetch_array($sql2)){
						   $id[]=$row["id"];
						   $unit2[]=$row["unit"];
						   $title[]=$row["title"];
						   $content[]=$row["content"];
						  }
						  	//showcontent.php?id=".$id[$j]."
							
						  echo "<div  id='display_index1' class='gml1' onclick='display2(".$i.")'>".$unit[$i]."</div>";
						 for($j=0;$j<$count2[$i];$j++){
                            echo "<a href='javascript:window.open(\"showcontent.php?id=".$id[$j]."\")'class='".$i."' style=' background:#fff;width:100%;float:left;font-size:60px; padding:50px 0px 50px 0px;border-bottom-color:black;border-bottom-width:2px;border-bottom-style:solid;display:none;'> ".$title[$j]."</a>";
								}
					 }
			 echo"</table>";
	}
?>


<div style="text-align:center;padding:0px 0px 50px 0px;color:999;" >
<br>
<hr>
CB.AVICI18.CN(R) personal webpage 
(C)Copyright©Lianhuangji
</div>

<script type="text/javascript">

$(function() {

	$( "#Button1" ).button(); 

});

</script>
</body>

<script>
function jqy(){
	$("#ad_index_img1").hide()
	$("#ad_index_img2").fadeIn()

	}
function getclass(sname) { 
   for (var i=0;i<document.styleSheets.length;i++) { 
	  var rules; 
	  if (document.styleSheets[i].cssRules) { 
			  rules = document.styleSheets[i].cssRules;
		   } else { 
			  rules = document.styleSheets[i].rules; 
			} 
	  for (var j=0;j<rules.length;j++) { 
		  if (rules[j].selectorText == sname) { 
			  return rules[j].style;//selectorText 属性的作用是对一个选择的地址进行替换.意思应该是获取RULES[J] 
		  } 
	} 

} 

}

var nightn=0

function night(){

   nightn=nightn+1

   if(nightn%2==1){

         var qcolor="#bedfe9"

        var dbcolor="black"

        var bcolor="#292b5d"

        var gmlcolor="black"

        var bordcolor="white"

        var mulbcolor="#505050"

        set1.innerHTML="<img id='sun'src='./img/moon.jpg'>"

        yej.innerHTML="日"

      //  sun.src="./img/sun.jpg"

        logo.src="./img/logo_n.jpg"

        

        

        title.style.background="black"

   }else{

        var qcolor="#422d4f"

        var dbcolor="white"

        var bcolor="#80d9ff"

        var gmlcolor="#ffecf2"

        var bordcolor="black"

        var mulbcolor="#fff"

        yej.innerHTML="夜"

        set1.innerHTML="<img id='sun'src='./img/sun.jpg'>"

        //sun.src="./img/sun.jpg"

       logo.src="./img/logo .jpg"

        title.style.background="white"

   

   }

  

  

        

        document.body.style.          backgroundColor=dbcolor

        document.body.style.Color=qcolor

        getclass(".d1").background = bcolor 

        getclass(".d1").color = qcolor 

        

        getclass(".gml1").color = qcolor 

        getclass(".gml1").background=gmlcolor 

        

        getclass(".mul").background=mulbcolor

        getclass(".mul").color = qcolor 

        getclass(".mul").borderColor = bordcolor

        

        getclass(".cs").background=mulbcolor

        getclass(".cs").color = qcolor 

        getclass(".cs").borderColor = bordcolor  

        

       conset.style.color = qcolor 

       conset.style.background=mulbcolor 

       gm1.style.borderColor=bordcolor  

       title.style.borderColor=bordcolor

       set1.style.borderColor=bordcolor

      

      

      

             

        getclass(".ba").borderColor = bordcolor        

        getclass(".ba").background=bcolor

        getclass(".ba").color = qcolor 

        

        getclass(".set").color = qcolor 

        getclass(".set").borderColor = bordcolor 

        

      

      }

</script>



<script type="text/javascript">
//时间控制++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
function startTime(){

     var today=new Date()

     var h=today.getHours()

     var m=today.getMinutes()

     var s=today.getSeconds()

     var day=today.getDate()

     var mon=today.getMonth()+1

     var ye=today.getFullYear()

     var week=today.getDay()

clock.innerHTML=ct(h)+":"+ct(m)+":"+ct(s)

date.innerHTML=ye+"年<br>"+mon+"月"+day+"日<br>"+weekc(week)



t=setTimeout('startTime()',500)



}





function ct(i)

{

if (i<10) 

  {i="0" + i}

  return i

}



	  function weekc(a){

		  switch(a){

         

			  case 1:

			  a="星期一"

			  return a

			   case 2:

			  a="星期二"

			  return a

			   case 3:

			  a="星期三"

			  return a

			   case 4:

			  a="星期四"

			  return a

			   case 5:

			  a="星期五"

			  return a

			   case 6:

			  a="星期六"

			  return a

			   case 0:

			  a="星期日"

			  return a

			  }

		  

		  } 

</script>

<script>

	function selectd(){

		

		alert(input.innerHTML)

		}

    function kaishi(){

		alert(1)

		getclass(".lianxi").style.display="block"

		lianxi()

		

		}

		var tihao=[]

	function lianxi(){

		

	}

	function yanzheng(){

		var ra=document.getelmentbyname("c1")

		alert(ra.length)

		for(i=1;i<tihao.length;i++){

			

		  }

		}
		
//目录控制+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++		

	var mod = new Array(100)
	for(i=0;i<mod.length;i++){
		mod[i]=0
		}
	function display2(a){
	mod[a]++
	//alert(a)
	 cn=document.getElementsByClassName(a)
	 leng=cn.length
	 for(i=0;i<leng;i++){
			 if( mod[a]%2==0){
			 	cn.item(i).style.display="none"
				
			 }else{
				cn.item(i).style.display="block"
				 
				 }
		 }
	
    }

</script>



</html>











































