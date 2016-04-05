cp=document.getElementById("cp").value
function khcx(val){
	//alert(val)
	$.post("ajax.php",{cp:cp,val,atype:"test1"},function(data,aaa){
		a=cut(data,"(((",")))")
		//var kehu = JSON.parse(a)
		//alert(data)
		if(data.indexOf("匹配")!=-1){
			//alert("无匹配数据")
			viptb.style.display="none"
			isnulltb.style.display="block"

		}else{
			isnulltb.style.display="none"
			viptb.style.display="block"
			viptba.innerHTML=a;
		}
		
		
		/*	for(var row in kehu ){
		 viptb.innerHTML+=
				"<td>"+kehu[row]["vip"]+"</td>"+
				"<td>"+kehu[row]["name"]+"</td>"+
				"<td>"+kehu[row]["phone"]+"</td>"+
				"<td>"+kehu[row]["money"]+"</td>"+
				"<td>"+kehu[row]["jf"]+"</td>"+
				"<td>"+kehu[row]["intime"]+"</td>"+
				"<td>"+kehu[row]["vipdj"]+"</td>"+
				"<td><a href='#'>添加消费</a></td>"+
				"<td><a href='#'>充值记录</a></td>"+
				"<td><a href='#'>消费记录</a></td>"+
				"<td><a href='#'>车辆信息</a></td>"
		}*/
		
	})
	//alert(val)
}
function czjl(id){
	$.post("ajax.php",{kh:id,atype:"czjl2"},function(data,aaa){
		czjla.innerHTML=data
	})
}
function xfjl(id){
	$.post("ajax.php",{kh:id,atype:"xfjl"},function(data,aaa){
		xfjla.innerHTML=data
	})
}
function car(id){
	$.post("ajax.php",{kh:id,cp:1,atype:"car2"},function(data,aaa){
		carinfo1.innerHTML=data
	})
}
function addcz(){
 var kh=document.getElementById("khid").value
 $("#addcz1").toggle(1000)
 //alert(kh)
}
function addcar(){
	 $("#addcar").toggle(1000)
	 }
function scar(){
	var kh=document.getElementById("khid").value
	var pp=document.getElementById("pp").value
	var car1=document.getElementById("car").value
	var carid=document.getElementById("carid").value
	var tipsc1=document.getElementById("tipsc").value
	var bdate=document.getElementById("bdate").value
	//alert("tips:"+tipsc1)
	$.post("ajax.php",{kh:kh,cp:cp,pp:pp,bdate:bdate,carid:carid,tips:tipsc1,car:car1,atype:"addcar"},function(data,aaa){
		//alert(data)
		car(kh)
		alert("添加成功")
		$("#addcar").toggle(10)
	})

}
function tjcz(){
	 var kh=document.getElementById("khid").value
	 var czje=document.getElementById("money").value
	 var zffs=document.getElementById("czfs").value
	 var tips=document.getElementById("tips").value
	 alert(tips)
	 	/*$.post("ajax.php",{kh:kh,cp:cp,je:czje,zf:zffs,atype:"hycz"},function(data,aaa){
		  if(data.indexOf("成功")!=-1){
			  czjl(kh)
			   $("#addcz1").toggle(10)
		  }else{
			  alert(data)
		  }
	})*/
	
}


