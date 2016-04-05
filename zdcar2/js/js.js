// JavaScript Document
var itemok=0
var winh=1
var winw=1
//***************************************************【关闭窗口】*********************************************************
function closeb(obj){
	var obj1=document.getElementById(obj)
	obj1.style.display="none"
	document.getElementById("back").style.display="none"
}
//***************************************************【打开弹出啊窗口】*********************************************************
function add(obj){
	var obj1=document.getElementById(obj);
		
	var win_width=document.documentElement.clientWidth
	var box_width=obj1.style.width
		//alert("*"+box_width+"*")
		box_width=box_width.substring(0,box_width.length-2)
	var left=(win_width*0.5)-(box_width*0.5)
	
	//alert("可见宽度为"+win_width+"\n弹窗宽度为"+box_width+"\nLeft=("+win_width+"/2)-("+box_width+"/2)="+left+"")
	obj1.style.marginLeft=left+"px"
	obj1.style.display="block";

	document.getElementById("back").style.display="block";
}

function close2(){
	$('#ckehu').fadeToggle(100);$('#back').fadeToggle(100);
	}
//***************************************************【展开或收起栏目】*********************************************************
function display(obj){
	//alert(obj)
	var obj1=document.getElementById(obj)
	$(obj1).fadeToggle(300);
	}
	
//*****************************************************【新建一行函数】*********************************************************
function addtr(table){      
    var tb= document.getElementById(table);
	var c=tb.rows.length-2
	var content="<td>"+(c+1)+"</td>"+
				"<td><input type='text' class='input_td' id='khname1' onBlur='c(this,\"sava_kh\")' onclick='cls(this)' placeholder='客户姓名(必填)'></td>"+
				"<td><input type='text' class='input_td' id='khphone' onBlur='c(this,\"sava_kh\")' onclick='cls(this)' placeholder='联系电话(必填)'></td>"+
				"<td><input type='text' class='input_td' id='khaddr' onBlur='c(this,\"sava_kh\")' onclick='cls(this)' placeholder='联系地址(必填)'></td>"+
				"<td><input type='text' class='input_td' id='khcar' onBlur='c(this,\"sava_kh\")' onclick='cls(this)' placeholder='车型(必填)'></td>"+
				"<td><input type='text'class='input_td' id='khcarid' onBlur='c(this,\"sava_kh\")' onclick='cls(this)' placeholder='车牌(必填)' ></td>"+
				"<td><input type='text' class='input_td' id='khtips' onBlur='c(this,\"sava_kh\")' onclick='cls(this)' placeholder='备注(选填)' ></td>"+
				"<td><button onclick='javascript:savakh()' class='toolbt' id='sava_kh'>保存</button></td>"
$('<tr>'+content+'</tr>').insertAfter($('#kehutb tr:eq('+(c)+')')); //再倒数第一行前加入一行
	enable("addkh",false)
	enable("sava_kh",false)
}
//***************************************************【客户选择函数】*********************************************************
function ckehu(tab,rowindex,id){
	var name=document.getElementById("khname")  
	var tel=document.getElementById("khtel") 
	var a=$('#kehutb tr:eq('+(rowindex+1)+') td:nth-child(2)').html();  //选择当前行号的第二列的值
	var b=$('#kehutb tr:eq('+(rowindex+1)+') td:nth-child(3)').html();  //选择当前行号的第二列的值
	var khid=document.getElementById("khid")
	//alert(a)

	closeb("ckehu")
	name.value=a
	khid.value=id 
	tel.value=b
}

//***************************************************【项目选择函数】*********************************************************
function citem(tab,rowindex,itemid){
	var iid=$('#'+tab+' tr:eq('+rowindex+') td:nth-child(2)').html();//获取当前选择行的第二列（编号）
	var iname=$('#'+tab+' tr:eq('+rowindex+') td:nth-child(3)').html();//获取当前选择行的第三列（名称）
	var money=$('#'+tab+' tr:eq('+rowindex+') td:nth-child(4)').html();//获取当前选择行的第四列（单价）
	var itype=$('#'+tab+' tr:eq('+rowindex+') td:nth-child(5)').html();//获取当前选择行的第五列（类型）
	var ips=$('#'+tab+' tr:eq('+rowindex+') td:nth-child(6)').html();//获取当前选择行的第六列（备注）
	//alert(iname+"\n"+rowindex)	
		b=$('#itemtb tr:eq(1) td:nth-child(1)').html();
		if(b=="暂无项目请添加"){$('#itemtb tr:eq('+(1)+')').remove();}
		a=$("#itemtb").find("tr").length
		var select1="<select class='input_td' >"+
							"<option>人员1</option>"+
							"<option>人员2</option>"+
							"<option>人员3</option>"+
					"</select>"
		var content="<td>"+(a-1)+"</td>"+
				 "<td>"+iid+"</td>"+
				 "<td id='iid"+(a-1)+"' class="+itemid+">"+iname+"</td>"+
				 "<td ><input type='text' value='"+money+"' id='imoney"+(a-1)+"' class='input_td' disabled style='width:50px;'></td>"+
				 "<td><input type='text' class='input_td' title='工时'onChange='changermb("+(a-1)+",\"item\")' id='gs"+(a-1)+"' style='width:20px'/>h</td>"+
				 "<td><input type='text'class='input_td'title='优惠' onChange='changermb("+(a-1)+",\"item\")' id='iyh"+(a-1)+"' style='width:40px'/>%</td>"+
				  "<td id='irmb"+(a-1)+"'>0元</td>"+
				 "<td><input type='date'class='input_td' style='width:110px'/></td>"+
				 "<td><input type='date'class='input_td'/></td>"+
				 "<td>"+select1+"</td>"+
				 "<td>"+itype+"</td>"+
				 "<td><input type='text'class='text2'/></td>"+
				 "<td><button class='toolbt' onclick=\"delrow('itemtb',"+(a-1)+")\" >删除</button></td>"
				 
		$('<tr>'+content+'</tr>').insertAfter($('#itemtb tr:eq('+(a-2)+')')); //再倒数第一行前加入一行
		closeb("citem")
}


//***************************************************【商品选择函数】*********************************************************
function cshop(tab,rowindex,shopid){
	var sid=$('#'+tab+' tr:eq('+rowindex+') td:nth-child(2)').html();//获取当前选择行的第二列（编号）
	var sname=$('#'+tab+' tr:eq('+rowindex+') td:nth-child(3)').html();//获取当前选择行的第三列（名称）
	var spingp=$('#'+tab+' tr:eq('+rowindex+') td:nth-child(4)').html();//获取当前选择行的第四列（品牌）
	var scar=$('#'+tab+' tr:eq('+rowindex+') td:nth-child(7)').html();//获取当前选择行的第五列（适用车型）
	var sguige=$('#'+tab+' tr:eq('+rowindex+') td:nth-child(5)').html();//获取当前选择行的第六列（单位）
	var sdj=$('#'+tab+' tr:eq('+rowindex+') td:nth-child(8)').html();//获取当前选择行的第六列（单价）
	var skc=$('#'+tab+' tr:eq('+rowindex+') td:nth-child(6)').html();//获取当前选择行的第六列（库存）
	//alert("编码："+sid+"\n名称"+sname+"\n品牌"+spingp+"\n车型"+scar+"\n单位"+sguige+"\n单价"+sdj+"")
	//alert(iname+"\n"+rowindex)	

		b=$('#shoptb tr:eq(1) td:nth-child(1)').html();
		if(b=="暂无商品请添加"){$('#shoptb tr:eq('+(1)+')').remove();}
		a=$("#shoptb").find("tr").length
		var select1="<select class='input_td' >"+
							"<option>人员1</option>"+
							"<option>人员2</option>"+
							"<option>人员3</option>"+
					"</select>"
		var content="<td>"+(a-1)+"</td>"+
			"<td title='编码'>"+sid+"</td>"+
		    "<td id='sid"+(a-1)+"' class="+shopid+">"+sname+"</td>"+
			"<td title='品牌'>"+spingp+"</td>"+
			"<td>无</td>"+
			"<td>"+scar+"</td>"+
			"<td>"+sguige+"</td>"+
			"<td ><input type='text' value='"+sdj+"' id='smoney"+(a-1)+"'  title='单价' class='input_td' disabled style='width:50px;'></td>"+
			 "<td><input type='text' class='input_td' title='数量' onChange='changermb("+(a-1)+",\"shop\");cgkc("+skc+","+(a-1)+")' id='sl"+(a-1)+"' style='width:20px'/>"+sguige+"</td>"+
			 "<td><input type='text' class='input_td' title='优惠' onChange='changermb("+(a-1)+",\"shop\")' id='syh"+(a-1)+"' style='width:20px'/>%</td>"+
			"<td id='srmb"+(a-1)+"' title='金额'>0元</td>"+     
			"<td title='领料人员'>"+select1+"</td>"+
			"<td><input type='text'class='input_td' title='备注'/></td>"+
			"<td><button class='toolbt' onclick=\"del(0,'aitem')\" >删除</button></td>"
				 
		$('<tr>'+content+'</tr>').insertAfter($('#shoptb tr:eq('+(a-2)+')')); //再倒数第一行前加入一行
		closeb("csp")
}


function cgkc(skc,i){
	var ssl=$("#sl"+i).val()
	if(ssl>skc){
		alert("库存不足");
		$("#sl"+i).val(skc)	
	}
	//alert("该商品库存为："+skc+"\n数量为："+ssl)
}

//*******************************************************【订单价格计算】***********************************************************
var gsa=[0],gsb=[0]
var yha=[0],yhb=[0]
var dja=[0],djb=[0]
var rmba=[0],rmbb=[0]
var zrmba=[0],zrmbb=[0]
zrmba=0,zrmbb=0
var rmbc=[0]
function changermb(rindex,type){
	//alert("价格更新函数启动")
	var rmbs=document.getElementById("rmbs") //订单总价获取
	var ot
	if(type=="item"){
		//alert("更新为项目金额")
		 zrmba=0 
		 var a=$("#itemtb").find("tr").length-2
		 var td=$('#shoptb tr:eq(1) td:nth-child(1)').html();
		 if(td=="暂无项目请添加")a=a-1
		 //alert("获取到的项目数为"+a)
		 rmba.length=0
		 for(var i=1;i<=a;i++){
			  gsa[i]=$("#gs"+i).val() 
			  yha[i]=$("#iyh"+i).val()//项目优惠获取
			  dja[i]=document.getElementById("imoney"+i).value //单价获取
			  if(yha[i]==""){yha[i]=0};
			  rmba[i]=dja[i]*gsa[i]-(dja[i]*gsa[i]*(yha[i]/100))
			  document.getElementById("irmb"+i).innerHTML=rmba[i]+"元" //各项项目价格输出
		 }
		 var str=""
		 $.each(rmba,function(name,value) {if(name!="0"){zrmba=zrmba+value;str+="+"+value;} });//项目总价计算
		 //alert(str+"="+zrmba)
		 ot=document.getElementById("itemrmb")	//项目总价输出对象获取
		 ot.innerHTML="总金额:"+zrmba+"元"//项目总价输出
		 //alert("项目金额更新完毕")
	}else{
		 //alert("更新为商品金额")
		 zrmbb=0
		 var a=$("#shoptb").find("tr").length-2
		 var td=$('#shoptb tr:eq(1) td:nth-child(1)').html();
		 if(td=="暂无商品请添加")a=a-1
		 //alert("获取到单元格内容为"+td)
		 //alert("获取到当前商品数为"+a)
		 rmbb.length=0;
		 for(var i=1;i<=a;i++){
			  gsb[i]=$("#sl"+i).val() 
			  yhb[i]=$("#syh"+i).val()//项目优惠获取
			  djb[i]=document.getElementById("smoney"+i).value //单价获取
			 // alert("smoney"+i+"获取成功")
			  if(yhb[i]==""){yhb[i]=0} 
			  rmbb[i]=djb[i]*gsb[i]-(djb[i]*gsb[i]*(yhb[i]/100))
			  //alert("第"+i+"项商品的价格为"+rmbb[i]+"元")
			  document.getElementById("srmb"+i).innerHTML=rmbb[i]+"元"//各项商品价格输出
		 }
		 $.each(rmbb,function(name,value) {if(name!="0"){zrmbb=zrmbb+value;} });  //商品总价计算alert("rmbb["+name+"]="+value)
		 ot=document.getElementById("shoprmb")	//商品总价输出对象获取
		 ot.innerHTML="总金额:"+zrmbb+"元"//商品总价输出
		 //alert("商品金额更新完毕，更新后商品总额为"+zrmbb)
	}
    rmbs.innerHTML="订单总额:"+(zrmba+zrmbb)+"元"
	document.getElementById("billzj").value=(zrmba+zrmbb)
}

//***************************************************【按钮disabled属性控制函数】*************************************************
function enable(obj,value){
	//alert(value);alert($(obj).val())
	//$(obj).attr("disabled",value);
	var obj1=document.getElementById(obj)
	if(value){
		//alert("可用")
		obj1.disabled=""
		obj1.style.backgroundColor="#f9af02"
		obj1.style.borderColor="#b67f00"
	}else{
		//alert("不可用")
		obj1.disabled=1
		obj1.style.backgroundColor ="#666"
		obj1.style.borderColor="#333"
	}
}
//***************************************************【保存新建商品函数】**********************************************************
var sname,sdw,scb,skc,spp,sdj,scar
function s_shop(){
	
	 /*数据获取*/
	 sname=$("#sname").val(); //商品名称
	 sdw=$("#sdw").val();//商品单位
	 scb=$("#scb").val();//商品成本
	 sdj=$("#sdj").val();//商品单价
	 skc=$("#skc").val();//商品库存
	 spp=$("#spp").val();//商品品牌
	 scar=$("#scar").val();//适用车型
	cp=$("#cp").val()
	if(k(sname)&&k(sdw)&&k(scb)&&k(skc)&&k(spp)&&k(scar)&&k(sdj)){
			 alert(sname+","+sdw+","+scb+","+sdj+","+skc+","+spp+","+scar)
     //-**********************************************************************************************************AJAX数据提交
    $.post("ajax.php",{sname:sname,sdw:sdw,scb:scb,skc:skc,spp:spp,scar:scar,cp:cp,sdj:sdj,atype:"addshop"},function(data,aaa){
		nid=data.substring(data.indexOf("为")+2,data.length-16);
		alert("新添加的商品id为："+nid)
        var a=$("#ashoptb").find("tr").length-1
		alert("a="+a)
		var content="<td>"+(a)+"</td>"+
				 "<td>SP00"+nid+"</td>"+
				 "<td>"+sname+"</td>"+
				 "<td>"+spp	+"</td>"+
				 "<td>"+sdw+"</td>"+
				 "<td>"+scar+"</td>"+
				 "<td>"+sdj+"</td>"+
				 "<td><button class='toolbt' onclick='cshop(\"ashoptb\","+(a)+","+nid+")' >选择</button></td>"
		$('<tr>'+content+'</tr>').insertAfter($('#ashoptb tr:eq('+(a-1)+')')); //再倒数第一行前加入一行
		//enable("addkh",true)
		//alert("用户名字："+khname+"\n电话："+khpho+"\n地址："+khadd+"\n车型："+khcar+"\n车牌："+khcarid+"\n备注："+khps)
			});
		}		
		closeb("addsp")
}
























//***************************************************【保存新建项目函数】**********************************************************
var sid,sname,itype,imoney,ierror
function s_item(){
	 /*数据获取*/
	 iid=$("#itemid").val(); //项目编码
	 iname=$("#itemname").val();//项目名称
	 itype=$("#itemtype").val();//项目类型
	 imoney=$("#money").val();//项目单价
	 ierror=$("#error").val();//项目故障
	 cp=$("#cp").val();//公司id获取
	if(k(iid)&&k(iname)&&k(itype)&&k(imoney)&&k(ierror)){
     //-**********************************************************************************************************AJAX数据提交
    $.post("ajax.php",{iid:iid,iname:iname,itype:itype,imoney:imoney,ierror:ierror,cp:cp,atype:"additem"},function(data,aaa){
		alert(data)
		nid=data.substring(data.indexOf("为")+2,data.length-16);
		//alert("新添加的商品id为："+nid)
		var a=$("#aitemtb").find("tr").length-1
		var content="<td>"+(a)+"</td>"+
				 "<td>"+iid+"</td>"+
				 "<td>"+iname+"</td>"+
				 "<td>"+imoney+"</td>"+
				 "<td>"+itype+"</td>"+
				 "<td>"+ierror+"</td>"+
				 "<td><button class='toolbt' onclick='citem(\"aitemtb\","+(a)+","+nid+")' >选择</button></td>"
		$('<tr>'+content+'</tr>').insertAfter($('#aitemtb tr:eq('+(a-1)+')')); //再倒数第一行前加入一行
		//enable("addkh",true)
		//alert("用户名字："+khname+"\n电话："+khpho+"\n地址："+khadd+"\n车型："+khcar+"\n车牌："+khcarid+"\n备注："+khps)

   });
	/*************************在项目选择列表中插入一行*************************/
		}		
		closeb("additem")
}
//***************************************************【保存新建用户函数】*******************************************************
var khname,khpho,khadd,khcar,khcarid
function savakh(){
	 khname=$("#khname1").val();khpho=$("#khphone").val();khadd=$("#khaddr").val();
	 khcar=$("#khcar").val();khcarid=$("#khcarid").val();khps=$("#khtips").val()
	 cp=$("#cp").val()
	
	if(k(khname)&&k(khpho)&&k(khadd)&&k(khcar)&&k(khcarid)){
		
		//-**********************************************************************************************************AJAX数据提交
    $.post("ajax.php",{khname:khname,khpho:khpho,khadd:khadd,khcar:khcar,khcarid:khcarid,khps:khps,cp:cp,atype:"addkh"},
					   function(data,aaa){});//data为返回的数据  ，aaa为状态
	
		a=$("#kehutb").find("tr").length-1
		//alert(a)
		$('#kehutb tr:eq('+(a-1)+')').remove();
		var content="<td>"+(a-1)+"</td>"+
				 "<td>"+khname+"</td>"+
				 "<td>"+khpho+"</td>"+
				 "<td>"+khadd+"</td>"+
				 "<td>"+khcar+"</td>"+
				 "<td>"+khcarid+"</td>"+
				 "<td>"+khps+"</td>"+
				 "<td><button class='toolbt' onclick='ckehu(\"kehutb\","+(a-2)+")' >选择</button></td>"
		$('<tr>'+content+'</tr>').insertAfter($('#kehutb tr:eq('+(a-2)+')')); //再倒数第一行前加入一行
		enable("addkh",true)
		//alert("用户名字："+khname+"\n电话："+khpho+"\n地址："+khadd+"\n车型："+khcar+"\n车牌："+khcarid+"\n备注："+khps)
		}		
}
//***************************************************【保存新建客户结束】*********************************************************

//***************************************************【检测对象值是否为空】*******************************************************
function k(a){if(a=="")return false; else return true;}
//****************************************************************************************************************************
var tok=[0]
//***************************************【检测输入值是否符合要求控制提交按钮是否可用】************************************************
function c(obj,bt){
	if(k(obj.value)){obj.style.boxShadow="-1px -1px 5px #0F0 inset"}
	else{obj.style.boxShadow="-1px -1px 5px #F00 inset"}
	khname=$("#khname1").val();khpho=$("#khphone").val();khadd=$("#khaddr").val();
	khcar=$("#khcar").val();khcarid=$("#khcarid").val();khps=$("#khtips").val()
	enable(bt,true)
	switch(bt){
		case "save_item":
			if(k($("#itemid").val())&&  //项目编码不为空
			   k($("#itemname").val())&&
			   k($("#itemtype").val())&&
			   k($("#error").val())&&
			   k($("#money").val())){enable(bt,true)}else{enable(bt,false)}
		break;
		case "save_kh":
			if(k(khname)&&k(khpho)&&k(khadd)&&k(khcar)&&k(khcarid)){enable(bt,true)}else{enable(bt,false)}
		break;
	}
}

//****************************************************************************************************************************
//***********************************************【输入框获取焦点时清空内容还原样式】************************************************
function cls(obj){
	if(!k(obj.value)){
		obj.style.boxShadow="0px 0px 0px #0F0 inset"
		obj.value=""	
	}
}
//****************************************************************************************************************************
//*************************************************【输入客户信息筛选用户列表】****************************************************
function tjcx(){
	var tj=document.getElementById("tj").value
	var cp=document.getElementById("cp").value

	$.post("ajax.php",{tj:tj,cp:cp,atype:"tjcx"}, function(data,aaa){ document.getElementById("kehutb").innerHTML=data});//data为返回的数据  ，aaa为状态
	//以post方式 传送 数据至ajax.php  
}
//**********************************************************【订单保存订单】***************************************************
function save_bill(){
 var bkh=document.getElementById("khid").value
 var bty=document.getElementById("b_type").value
 var bps=document.getElementById("bps").value
 var ci,cs
 var a=$('#itemtb tr:eq(1) td:nth-child(1)').html();
 var b=$('#shoptb tr:eq(1) td:nth-child(1)').html();

 //获取ci(添加的项目数)cs(添加的商品数)
 if(a=="暂无项目请添加"&&b=="暂无商品请添加"){ci=cs=0
 }else if(a=="暂无项目请添加"&&b!="暂无商品请添加"){ci=0, cs=$("#shoptb").find("tr").length-2
 }else if(a!="暂无项目请添加"&&b=="暂无商品请添加"){ci=$("#itemtb").find("tr").length-2;cs=0
 }else{ci=$("#itemtb").find("tr").length-2;cs=$("#shoptb").find("tr").length-2}


 
 
 /***********************************************数据提交*************************************************************/
//订单保存
 if(bkh!="请选择客户"&&bty!="选择订单类型"&&k(bps)&&(ci>0||cs>0)){
	 cp=$("#cp").val()
	 khid=document.getElementById("khid").value
	 zje=document.getElementById("billzj").value
     $.post("ajax.php",{zje:zje,bkh:bkh,ber:bty,bps:bps,company:cp,atype:"abill"},function(data,aaa){
			 //alert("订单信息提交返回值：\n"+data);
			 bbid=data.substring(data.indexOf("为")+2,data.length-16); 
			 for(i=1;i<=ci;i++){
			   var iid=document.getElementById("iid"+i).className   	
			   $.post("ajax.php",{khid:khid,bid:bbid,i:i,cs:ci,iid:iid,gs:gsa[i],yh:yha[i],stime:0,etime:0,gr:"员工1",tips:"无",atype:"aitem"},function(data,aaa){}); 
			    if(data.indexOf("添加结束跳转")!=-1){alert("订单新建成功");location.replace("1-2.php")}
			 }
			//商品信息提交
			for(i=1;i<=cs;i++){
			  var sid=document.getElementById("sid"+i).className
			  //alert("工时/优惠"+i+":"+gsb[i]+"/"+yhb[i])
			  $.post("ajax.php",{khid:khid,bid:bbid,sid:sid,gs:gsb[i],yh:yhb[i],i:i,cs:cs,gr:"员工1",tips:"无",atype:"ashop"},function(data,aaa){
				  
				 // alert("商品信息提交返回值：\n"+data);
				  if(data.indexOf("添加结束跳转")!=-1){alert("订单新建成功");location.replace("1-2.php")}
				  
				  });
			}
						

    }); 

 }else if(cs<=0||ci<=0){
 	alert("请添加订单内容")
 }else{
	alert("请填写正确信息")	 
 }
}
/*************************************************【删除已选项项目（商品）函数】******************************************************/
function del(id,tab){
	var bid=0
	if(tab=="aitem"){ tabn="itemtb";str="项目";col=12;
	}else{ tabn="shoptb";str="商品";col=14;}
	a=$("#"+tabn+"").find("tr").length
	if(confirm("该操作无法撤销 ，是否确认删除？","温馨提示")){
		for(var i=1;i<a;i++){
			//if($('#'+tabn+' tr:eq('+i+')').hasClass(id)){$('#'+tabn+' tr:eq('+i+')').remove();}	
		}
		//alert(bid)
		tabb=document.getElementById(tabn)
		
		$.post("ajax.php",{id:id,bid:bid,table:tab,atype:"del"},function(data,aaa){tabb.innerHTML=data
		if(tab=="aitem"){changermb(0,"item");}else{changermb(0,"shop");}
		
		})
		
		
		
	}
}
/*字符串剪切函数 格式cut(zifu)*/
function cut(str,left,right){
	var start=str.indexOf(left)+left.length
	var end=str.indexOf(right)
	return str.substring(start,end)
}
/*判断是否为微信浏览器*/
function is_weixn(){  
    var ua = navigator.userAgent.toLowerCase();  
    if(ua.match(/MicroMessenger/i)=="micromessenger") {  
        return true;  
    } else {  
        return false;  
    }  
}  
function delrow(tab,rowid){
$('#'+tab+' tr:eq('+(rowid)+')').remove();	
}

/*
function msgbox(str,title,type){
	 var msgbox=document.getElementById("msgbox")
	 var caption=document.getElementById("msg-caption")	
	 var pic=document.getElementById("msg-ico")
	 var text=document.getElementById("msg-text")
	 var ba=document.getElementById("back")
if(type!="return"){
	 caption.innerHTML=title
	 text.innerHTML=str
	 ba.style.display="block"
	 msgbox.style.display="block"
	 var msg_bt=document.getElementsByName("msg-bt")
	 var l=msg_bt.length
	 var bt=$("[name='msg-bt']")
	
	 bt.each(function(index, element) {
		 //elment.click=(funciton(){})
		 $(this).click(function(){
				 if(this.value=="确认")window.re="ok";else window.re="no";
		  });
       //alert(this.alt)
    });
    alert(window.re)
}else{
	if(title){
	  
	  ba.style.display="none";
	  msgbox.style.display="none";
	  return true;
	}else{
	  
	  ba.style.display="none";
	  msgbox.style.display="none";
	  return false;
	}
}
 
}
//***************************************************************************窗口拖动
 /* $(function() {
    $( "#msgbox" ).draggable();
  });
window.onscroll=function(){
	
	
	var box=document.getElementById("additem")
	var winh=document.body.clientHeight;
    var winw=document.body.clientHeight;
	btop=(winw/2)-( box.style.width * 0.5)
	bleft=(winh/2)-(box.style.height*0.5)
	box.style.left=btop+"px"
	box.style.top=bleft+"px"
	
	$("#additem").css({
    "position": "absolute",
    "top": btop,
    "left":bleft
	}); 
	//alert(box.style.top)

	s += "\n网页可见区域宽："+ document.body.clientWidth; 
	s += "\n网页可见区域高："+ document.body.clientHeight; 
	s += "\n网页可见区域宽："+ document.body.offsetWidth +" (包括边线和滚动条的宽)"; 
	s += "\n网页可见区域高："+ document.body.offsetHeight +" (包括边线的宽)"; 
	s += "\n网页正文全文宽："+ document.body.scrollWidth; 

	s += "\n网页正文全文高："+ document.body.scrollHeight; 
	s += "\n网页被卷去的高："+ document.body.scrollTop; 
	s += "\n网页被卷去的左："+ document.body.scrollLeft; 
	s += "\n网页正文部分上："+ window.screenTop; 
	s += "\n网页正文部分左："+ window.screenLeft; 
	s += "\n屏幕分辨率的高："+ window.screen.height; 

	s += "\n屏幕分辨率的宽："+ window.screen.width; 
	s += "\n屏幕可用工作区高度："+ window.screen.availHeight; 
	s += "\n屏幕可用工作区宽度："+ window.screen.availWidth; 
	s += "\n你的屏幕设置是 "+ window.screen.colorDepth +" 位彩色"; 
	s += "\n你的屏幕设置 "+ window.screen.deviceXDPI +" 像素/英寸";
	//alert(s); 

	  }

*/ 

//use

