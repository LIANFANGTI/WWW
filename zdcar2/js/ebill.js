function acitem(tab,rowindex,itemid){
	var iid=document.getElementById("iid"+rowindex).className
	var bid=document.getElementById("bid").value
	$.post("ajax.php",{bid:bid,iid:iid,gs:0,yh:0,stime:0,etime:0,gr:"员工1",tips:"无",atype:"aitem"},function(data,aaa){}); 
	reloadt("aitem")
	closeb("citem")
}
function acshop(tab,rowindex,shopid){
	var sid=document.getElementById("sid"+rowindex).className
	var bid=document.getElementById("bid").value
	$.post("ajax.php",{bid:bid,sid:sid,gs:0,yh:0,gr:"员工1",tips:"无",atype:"ashop"},function(data,aaa){}) 
	reloadt("ashop")
	closeb("csp")
}

function reloadt(tab){
	var bid=document.getElementById("bid").value
	if(tab=="aitem"){ tabn="itemtb";str="项目";col=12;}else{ tabn="shoptb";str="商品";col=14;}
	tabb=document.getElementById(tabn)
	$.post("ajax.php",{id:0,bid:bid,table:tab,atype:"del"},function(data,aaa){tabb.innerHTML=data
		if(tab=="aitem"){changermb(0,"item");}else{changermb(0,"shop");}
	})
}

function crm(rindex,type){
    var bid=document.getElementById("bid").value
	var rmbs=document.getElementById("rmbs") //订单总价获取
	var ot
	if(type=="aitem"){
		var gs=document.getElementById("gs"+rindex).value
		var iyh=document.getElementById("iyh"+rindex).value
	    var aiid=document.getElementById("aiid"+rindex).className	
		$.post("ajax.php",{id:aiid,gsl:gs,isyh:iyh,table:type,atype:"upais"},function(data,aaa){reloadt(type)})
	}else{
		var sl=document.getElementById("sl"+rindex).value
		var syh=document.getElementById("syh"+rindex).value
		var asid=document.getElementById("asid"+rindex).className
		$.post("ajax.php",{id:asid,gsl:sl,isyh:syh,table:type,atype:"upais"},function(data,aaa){reloadt(type);})
		//alert(asid+","+sl+","+syh)
	}
    rmbs.innerHTML="订单总额:"+(zrmba+zrmbb)+"元"
}
function update(){
	var bid=document.getElementById("bid").value
	var khid=document.getElementById("khid").value
	
	var btype=document.getElementById("b_type").value
	//alert("订单类型:"+btype)
	var bps=document.getElementById("bps").value
	var zje=(zrmba+zrmbb)
	//alert(bid+","+khname+","+error+","+bps+","+zje)
	$.post("ajax.php",{bid:bid,khid:khid,btype:btype,bps:bps,zje:zje,atype:"upbill"},function(data,aaa){})
	alert("保存成功")
	window.location.href="1-2.php"
	//alert("订单总金额为"+(bid))
}
function cut(a){
 var start=a.indexOf("{{")+2
 var end=a.indexOf("}}")
 alert(a.substring(start,end))
}
function billjx(){
	var ywzt=$("#ywzt").val()
	var jsfs=$("#jsfs").val()	
	alert("结算方式:"+jsfs+"\n业务状态："+ywzt)
	if(ywzt&jsfs){
		alert("结算成功")	
	}else{
		alert("订单状态不正确")	
	}
}
mmax=0
spid=0
asid=0
function tuihuo(id,spname,i,sp){
	var sl=document.getElementById("sl"+i).value
	var range=document.getElementById("range")
	var khid=document.getElementById("khid").value
	//var bid1=document.getElementById("bid").value
	$("#range").val(0)
	$("#thsl").val(0)
	$("#spname").val(spname)
	$("#max").html(sl)
	//$("#range").moves
	mmax=sl
	asid=id
	spid=sp
	add("th")
	

	//alert(id)
	//alert(sp)
	//alert(sl)
			
}
function subth(){
var thsl=document.getElementById("thsl").value
var khid=document.getElementById("khid").value
var thyy=document.getElementById("thyy").value
var cp=document.getElementById("cp").value
var bid=document.getElementById("bid").value
//alert(cp+"\nbid:"+bid)
del=mmax-thsl
//if(!del){alert("将会删除商品")}else{alert("还剩余"+del+"个")}
$.post("ajax.php",{asid:asid,cp:cp,bid:bid,sid:spid,khid:khid,thsl:thsl,thyy:thyy,del:del,atype:"spth"},function(data,aaa){
		if(data.indexOf("成功")!=-1){alert("退货成功");history.go(-0)}
		
	})
//alert("退货数量"+thsl+"\n退货原因"+thyy+"\n商品id"+sid+"\n客户id"+khid)
	
}

function range(){
	var val=$("#range").val()
	val=Math.floor((val/100)*mmax)
	$("#thsl").val(val)
	
}
function cg(){
	var thsl=Math.floor($("#thsl").val())	
	$("#range").val(Math.floor(thsl/mmax*100))
}
function up(){
	var thsl=Math.floor($("#thsl").val())
	if(thsl<mmax){
		thsl++
		rval=Math.floor(thsl/mmax*100)
		$("#thsl").val(thsl);$("#range").val(rval)}//else{alert("max="+mmax+"\nthsl="+thsl)}
}
function down(){
	var thsl=Math.floor($("#thsl").val())
	if(thsl>0){
		thsl--
		rval=Math.floor(thsl/mmax*100)
		$("#thsl").val(thsl);$("#range").val(rval)}
}