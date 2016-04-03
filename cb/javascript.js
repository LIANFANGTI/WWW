// JavaScript Document

     var sen1=0,t1=0
,t2=0,t3=0,t4=0,t5=0
     var t6=0,t7=0,t8=0
    
      function load(){
            
           startTime(); 
		   alert()
            
            
      
      
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
                  set2.innerHTML="设置"
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
        
        function getclass(sname) { 
   for (var i=0;i<document.styleSheets.length;i++) { 
      var rules; 
      if (document.styleSheets[i].cssRules) { 
      rules = document.styleSheets[i].cssRules;              } else { 
      rules = document.styleSheets[i].rules; 
} 
   for (var j=0;j<rules.length;j++) { 
      if (rules[j].selectorText == sname) { 
//selectorText 属性的作用是对一个选择的地址进行替换.意思应该是获取RULES[J]
      return rules[j].style; 
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

function startTime(){
     var today=new Date()
     var h=today.getHours()
     var m=today.getMinutes()
     var s=today.getSeconds()
     var day=today.getDate()
     var mon=today.getMonth()
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
 
			function selelct(){
		this.style.color="red"
		
		}
    function kaishi(){
		lianx.style.display="block"
		lianxi()
		
		}
		var tihao=[]
	function lianxi(){
		//alert("lianxi函数启动")
		var timu="ENIAC采用___作为主要电子元件"	
		var optiona="晶体管"
		var optionb="真空管"
		var optionc="集成电路"
		var optiond="电子管"
		var trueda="A"

		lianx.innerHTML="<h3>选择题</h3>"
		
	for(var i=1;i<=10;i++){
		var radioa="<br><label><input type='radio'   name='c1' value='A'  class='radio'>A、"+ optiona+"</label>"
		var radiob="<br><label><input type='radio'   name='c1' value='B'  class='radio'>B、"+ optionb+"</label>"
		var radioc="<br><label><input type='radio'   name='c1' value='C'  class='radio'>C、"+ optionc+"</label>"
		var radiod="<br><label><input type='radio'   name='c1' value='D'  class='radio'>D、"+ optiond+"</label>"
		tihao[i]="第"+i+"题"
		//name=c"+i+"
		lianx.innerHTML=lianx.innerHTML + i +"、"+timu+ radioa+radiob+radioc+radiod+"<hr color='white'>"
	 //<input type="radio" name="one" value="A" >A傻逼
     //<input type="radio" name="one" value="B">B不傻逼
	}
    lianx.innerHTML=lianx.innerHTML+"<div class='ba' onclick='yanzheng()'>提交</div>"
	}
	function yanzheng(){
		var ra=document.getelmentbyname("c1")
		alert(ra.length)
		for(i=1;i<tihao.length;i++){
			
		  }
		}