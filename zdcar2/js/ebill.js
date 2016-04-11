 bid=document.getElementById("bid").value
function acitem(tab,rowindex,itemid){
	var iid=document.getElementById("iid"+rowindex).className
	var bid=document.getElementById("bid").value
	$.post("ajax.php",{bid:bid,iid:iid,gs:0,yh:0,stime:0,etime:0,gr:"员工1",tips:"无",atype:"aitem"},function(data,aaa){}); 
	delxm(0,bid)
}
function acshop(sid,bid,kc,sname){
	//alert(sid+":"+bid+":"+kc)
	var kh=document.getElementById("khid")
	sl=prompt("请输入<="+kc+"的所需数量\n\n商品名称:"+ sname +"\n\n当前库存剩余:["+kc+"]")
	if(sl>0&&sl<=kc){
		$.post("ajax.php",{bid:bid,sid:sid,gs:sl,yh:0,gr:"员工1",tips:"无",atype:"ashop"},function(data,aaa){history.go(-0);}) 
		
	}else if(sl>0){
		alert("库存不足")
	}else{
		alert("输入错误")
	}

	//closeb("csp")
}
function reloadsp(){
	$.post("ajax.php",{bid:bid,atype:"reloadsp"},function(data,aaa){ashop.innerHTML=cut(data,"[ashop]","[/ashop]")})
}
/*
function reloadt(tab){
	var bid=document.getElementById("bid").value
	if(tab=="aitem"){ tabn="itemtb";str="项目";col=12;}else{ tabn="shoptb";str="商品";col=14;}
	tabb=document.getElementById(tabn)
	$.post("ajax.php",{id:0,bid:bid,table:tab,atype:"del"},function(data,aaa){tabb.innerHTML=data
		if(tab=="aitem"){changermb(0,"item");}else{changermb(0,"shop");}
	})
}
*/
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
function cgxm(id){
//项目内容改动
	var bid=document.getElementById("bid").value
	var gs=document.getElementById("gs"+id).value
	var st=document.getElementById("st"+id).value
	var et=document.getElementById("et"+id).value
	var ps=document.getElementById("ps"+id).value
	$.post("ajax.php",{id:id,gs:gs,st:st,et:et,ps:ps,atype:"cgxm"},function(data,aaa){delxm(0,bid);})
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
function tuihuo(id,spname,sl,sp){
	var khid=document.getElementById("khid").value
	//var bid1=document.getElementById("bid").value
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
		if(data.indexOf("成功")!=-1){alert("退货成功");history.go(-0)}else{alert(data)}
		
	})
//alert("退货数量"+thsl+"\n退货原因"+thyy+"\n商品id"+sid+"\n客户id"+khid)
	
}

//更改滑块
function range(){
	var val=$("#range").val()
	val=Math.floor((val/100)*mmax)
	$("#thsl").val(val)
	
}
//退货数量进制转换
function cg(){
	var thsl=Math.floor($("#thsl").val())	
	$("#range").val(Math.floor(thsl/mmax*100))
}
//退货数量增加
function up(){
	var thsl=Math.floor($("#thsl").val())
	if(thsl<mmax){
		thsl++
		rval=Math.floor(thsl/mmax*100)
		$("#thsl").val(thsl);$("#range").val(rval)}//else{alert("max="+mmax+"\nthsl="+thsl)}
}
//退货数量减少
function down(){
	var thsl=Math.floor($("#thsl").val())
	if(thsl>0){
		thsl--
		rval=Math.floor(thsl/mmax*100)
		$("#thsl").val(thsl);$("#range").val(rval)}
}

//已添加项目删除
function delxm(id,bid){
	if(id){
		if(confirm("该操作无法撤销 ，是否确认删除？","超温馨的提示")){
			$.post("ajax.php",{aiid:id,bid:bid,atype:"delxm"},function(data,aaa){
				xmdata.innerHTML=cut(data,"[aitem]","[/aitem]")
			})
		}			
	}else{
			$.post("ajax.php",{aiid:id,bid:bid,atype:"delxm"},function(data,aaa){
				xmdata.innerHTML=cut(data,"[aitem]","[/aitem]")
			})		
	}
	
}

function jisuan(){
	var bid=document.getElementById("bid").value;
	var gs=document.getElementsByName("gs");
	var dj=document.getElementsByName("sdj");
	var sl=document.getElementsByName("sl");
	var spje=document.getElementById("spje").value;
	var zgs=0;
	for(var i=0;i<gs.length;i++){
		zgs+=parseInt(gs[i].value);
	}
	itemrmb.innerHTML="总计:"+zgs+"元";
	zje=zgs+parseInt(spje);
	rmbs.innerHTML="订单总额:"+zje+"元";
	$.post("ajax.php",{bid:bid,zje:zje,atype:"update-bill-zje"},function(data,aaa){
		//alert(data)
	});	
}

/*订单结算*/
function bill_js(bid,kh){
	khname=document.getElementById("khname").value
	$.post("ajax.php",{bid:bid,kh:kh,atype:"bill-js"},function(data,aaa){ 
		if(data.indexOf("不足")==-1){
			alert("结算成功");
			location.href="1-2.php"
		}else{
			/*if(confirm("结算失败，余额不足\n是否立即充值？")){
				switch(prompt("请选择充值面额\n1:50元\n2:100元\n3:300元\n4:500元\n5:1000元\n输入相应序号选择充值金额")){
					case "1":czje=50;break;
					case "2":czje=100;break;
					case "3":czje=300;break;
					case "3":czje=300;break;
					case "3":czje=300;break;
					case "3":czje=300;break;
					case "3":czje=300;break;
					case "3":czje=300;break;
					case "3":czje=300;break;
					case "3":czje=300;break;
					case "3":czje=300;break;
					case "4":czje=500;break;
					case "5":czje=1000;break;
					default:alert("输入错误")
				}
				switch(prompt("请选择充值面额\n1:微信支付\n2:支付宝\n3:现金\n4:其他\n输入相应序号选择充值方式")){
					case "1":czfs="微信支付";break;
					case "2":czfs="支付宝";break;
					case "3":czfs="现金支付";break;
					case "4":czfs="其他";break;
					default:alert("输入错误")
				}
				
				tips=prompt("备注信息"))
			}*/
			
			alert("结算失败 余额不足 请充值");
			window.open("shouyin.php?kh="+khname);
		}
	});	
}

function tjcz(){
	 var kh=document.getElementById("khid").value
	 //alert(tips)
	 	$.post("ajax.php",{kh:kh,cp:cp,je:czje,zf:zffs,atype:"hycz"},function(data,aaa){
		  if(data.indexOf("成功")!=-1){
			  czjl(kh)
			   $("#addcz1").toggle(10)
		  /* }else{ */
			  alert(data)
		  }
	})
	
}











