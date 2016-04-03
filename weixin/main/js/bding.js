var openid=document.getElementById("openid").value
var head=document.getElementById("head").value
function check(){
 var tel=document.getElementById("phone").value
 if(tel.length!=11){
		alert("请输入正确的手机号哦")	 
 }else{
	$.post("http://www.zduber.com/zdcar2/ajax.php",{user:tel,atype:"ckuser"},function(data,aaa){
		if(data.indexOf("不可用")!=-1){//数据库中已存在号码
			document.title="测试功能：您的验证码为"+document.getElementById("rand").value
			sendcode()
		}else{//数据库中不存在号码
				alert("您不是云库的客户")		//self.location='http://www.zduber.com/weixin/main/kehuinfo.php?tel='+tel+'&openid='+openid+'&head='+head;
		}
	})
	//alert("发送成功")	 
 }
}

function sendcode(){
	var time=30
	var send=document.getElementById("send")
	//alert(send.value)
	send.setAttribute("disabled", true);
	countdown()
	//val.removeAttribute("disabled");  
}
 count=30
function countdown(){
	count--
	var t=setTimeout("countdown()",1000)
	var send=document.getElementById("send")
	send.value="("+count+")秒后可重新获取"
	if(count<=0){ 
		clearTimeout(t)
		count=30;
		send.removeAttribute("disabled"); 
		send.value="获取验证码"
	}
	
}
function bding(){
	var yzcode=document.getElementById("yzcode").value
	var tel=document.getElementById("phone").value
	var rand=document.getElementById("rand").value
	if(yzcode==rand){
		$.post("http://www.zduber.com/zdcar2/ajax.php",{openid:openid,tel:tel,head:head,atype:"bding"},function(data,aaa){
				if(data.indexOf("成功")!=-1){
					alert("绑定成功啦");
					self.location='http://www.zduber.com/weixin/main/index.php?openid='+openid
				}
			})
	}else{
		alert("验证码不正确")
	}
	
}

