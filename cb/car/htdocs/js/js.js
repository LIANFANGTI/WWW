
	var mod = new Array(100)
	for(i=0;i<mod.length;i++){
		mod[i]=1
		}
	function display(a){
	mod[a]++
	//alert(a)
	 cn=document.getElementsByClassName(a)
	 leng=cn.length
	 for(i=0;i<leng;i++){
			 if( mod[a]%2==0){
			 	cn.item(i).style.display="none"
			 }else{
				cn.item(i).style.display="block"
				 }
		 }
	
    }
	var ai=0
	function displayid(a){
	    ai++
		alert(ai)
	    cn=document.getElementsByid(a)
		if(ai%2==0){
		  cn.style.display="none"
		}else{
		  cn.style.display="block"
	    }
	}
	
    

 
 function submit(){
	document.getElementById("FORM").submit();
	 //alert("提交成功")
	 } 