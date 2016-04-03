function khcx(val){
	//alert(val)
	$.post("ajax.php",{val,atype:"test1"},function(data,aaa){
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
			viptba.innerHTML+=a;
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
