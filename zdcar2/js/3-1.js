// JavaScript Document
/*商品删除*/
function delsp(sid){
	if(confirm("该操作无法撤销")){
	 $.post("ajax.php",{sid:sid,atype:"delsp"},function(data,aaa){location.replace("/zdcar2/3-1.php?") })
    }else{
		alert(sid)
	}
}
/*安全库存设置*/
function akc(sid){
	sakc=prompt("请输入要设置的安全库存");
	if(sakc!=null){
		//alert("+"+sakc+"+")
	 $.post("ajax.php",{sid:sid,akc:sakc,atype:"akc"},function(data,aaa){alert("设置成功");location.replace("/zdcar2/3-1.php?"); })	
	}
}
/*新建商品*/
function sshop(){
	/*
		$sname=$_POST["sname"];
		$sdw=$_POST["sdw"];
		$scb=$_POST["scb"];
		$skc=$_POST["skc"];
		$spp=$_POST["spp"];
		$scar=$_POST["scar"];
		$sdj=$_POST["sdj"];		
		$cp=$_POST["cp"];*/
		
		var sname=document.getElementById("sname").value;
		var skc=document.getElementById("ssl").value;
		var sdj=document.getElementById("sdj").value;
		var scb=document.getElementById("scb").value;
		var spp=document.getElementById("spp").value;
		var xinghao=document.getElementById("xinghao").value;
		var etime=document.getElementById("etime").value;
		var akc=document.getElementById("akc").value;
		var scar=document.getElementById("car").value;
		var cp=document.getElementById("cp").value;
		
		
		
		
		if(sname!=""&&skc!=""&&scb!=""&&sdj!=""){
			$.post("ajax.php",{sdw:"",sname:sname,skc:skc,sdj:sdj,scb:scb,spp:spp,xinghao:xinghao,etime:etime,akc:akc,scar:scar,cp:cp,atype:"addshop"},function(data,aaa){
				if(data.indexOf("成功")!=-1){
					alert("添加成功")
					history.go(-0);
				}else{
					alert(data)
				}
			})
			//alert("提交成功")
		}else{
			alert("请完善信息")
		}
		
		
}
