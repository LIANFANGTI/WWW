zje1=0

function sb(){
	var items=document.getElementsByName("itemgs")
	var bkh=document.getElementById("khid").value
    var bty=document.getElementById("b_type").value
	var cp=$("#cp").val()
	var carid=$("#carid").val()
	var bps=""
	
	//alert(bkh+":"+bty+":"+cp+":"+carid)
	if(items.length>0&&bkh!=""&& bty!=0&& carid!=0 ){
		//alert("bkh:"+bkh+"bty:"+bty+"carid:"+carid+"cp:"+cp+"zje1:"+zje1)
		$.post("ajax.php",{zje:zje1,bkh:bkh,ber:bty,bps:bps,company:cp,carid:carid,atype:"abill"},function(data,aaa){
			bbid=data.substring(data.indexOf("id为")+4,data.length-16);
			var iids=document.getElementsByName("itemid")
			for(i=0;i<iids.length;i++){	
			   //alert(iid=iids[i].className)
			 
			  $.post("ajax.php",{bid:bbid,i:i,cs:iids.length,iid:iid,gs:items[i].value,yh:0,stime:0,etime:0,gr:"员工1",tips:"无",atype:"aitem"},function(data,aaa){
				   //alert(data)
			  }); 			
			  document.getElementById("billbm").value=cut(data,"[bm]","[/bm]")
			
				//if(data.indexOf("添加结束跳转")!=-1){alert("订单新建成功");location.replace("1-2.php")}
			 }
				alert("订单生成成功")
			  // location.href="index.php"
			   javascript:window.print()
		})
	}else{
		alert("请完善订单信息")
	}

	//alert(items.length)
}
function zje(){
	
	var items=document.getElementsByName("itemgs")
	var a=0
	
	for(i=0;i<items.length;i++){
		a+=parseInt(items[i].value)
	}
	zje1=a
	rmbs.innerHTML="总价"+a+"元"
	
}