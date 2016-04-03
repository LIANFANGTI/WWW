//Javascript document

car=""
function chose(value,pp){
	document.getElementById("dropdownMenu1").innerHTML=pp+"-"+value
	car=pp;
	//alert(value)
	
}
function save(){
	kh=document.getElementById("khid").value
	var carid=document.getElementById("carid").value
	var pp=document.getElementById("dropdownMenu1").innerHTML
	var km=document.getElementById("km").value
	var buydate=document.getElementById("buydate").value
	var tips=document.getElementById("tips").value
	if(carid!=""&&pp.indexOf("选择")==-1&&km!=""&&buydate!=""){
		$.post("http://www.zduber.com/zdcar2/ajax.php",{kh:kh,carid:carid,pp:car,car:pp,km:km,bdate:buydate,tips:tips,atype:"addcar"},function(data,aaa){
			if(data.indexOf("成功")!=-1){
				location.replace("car.php")	
			}
			})
		
	}else{alert("信息不正确")}
	//alert(carid+"\n"+pp+"\n"+km+"\n"+buydate+"\n"+tips)
}