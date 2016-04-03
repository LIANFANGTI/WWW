// JavaScript Document
function delsp(sid){
	if(confirm("该操作无法撤销")){
	 $.post("ajax.php",{sid:sid,atype:"delsp"},function(data,aaa){location.replace("/zdcar2/3-1.php?") })
    }else{
		alert(sid)
	}
}
function akc(sid){
sakc=prompt("请输入要设置的安全库存");
if(sakc!=null){
	//alert("+"+sakc+"+")
 $.post("ajax.php",{sid:sid,akc:sakc,atype:"akc"},function(data,aaa){alert("设置成功");location.replace("/zdcar2/3-1.php?"); })	
}
}