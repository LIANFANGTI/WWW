<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ajax</title>
</head>

<body>
<?php

require_once 'mysql.class.php';
require_once 'page.class.php';
require_once '../function/fun.php';
$db = new mysql('121.196.226.94', 'admin', 'xwq198291', "zckj_db");
$atype=$_POST["atype"];
switch($atype){
	/*添加客户*/
	case "addkh": 
		$name=$_POST["khname"];
		$pho=$_POST["khpho"];
		$add=$_POST["khadd"];
		$car=$_POST["khcar"];
		$carid=$_POST["khcarid"];
		$ps=$_POST["khps"];
		$cp=$_POST["cp"];
		isset($_POST["key"])?$key=$_POST["key"]:$key=0;
		echo "\nkey=".$key."\n";
		$userInfo = array('name'=>$name, 'phone' =>$pho, 'kehu_c' =>$add,'car_type' =>$car,'carid' =>$carid,'tips' =>$ps,'company'=>$cp,'intime'=>date("Ymd"),'khkey'=>$key);
		$db->insert("kehu", $userInfo);
		echo $db->printMessage();	
		/*****************************************以下是会员卡号生成部分 */
		//获取该公司最后一条记录的id
		$db->select("kehu", "id", "company=".$cp." order by id desc limit 1");$reid = $db->fetchArray(MYSQL_ASSOC);
		//获取该公司的会员数
		$db->select("kehu", "count(*) as ct", "company=".$cp."");$kehu = $db->fetchArray(MYSQL_ASSOC);$number=$kehu[0]["ct"];
		//根据该ID查询该条数据 获取公司 和 信息日期 
		$db->select("kehu", "*", "id=".$reid[0]["id"]."");$kehu = $db->fetchArray(MYSQL_ASSOC);
		//会员卡号生成  格式 VIP+公司+日期+第几位
		$vip="VIP".$kehu[0]["company"].date('Ymd',strtotime($kehu[0]["intime"])).fz($number);
		echo "\nVIP:".$vip."\n";
		$kehuInfo = array('vip'=>$vip);
		$db->update("kehu", $kehuInfo, "id = ".$reid[0]["id"]."");
		echo $db->printMessage();	

	break;
	/*客户搜索*/
	case "tjcx":
		$cp=$_POST["cp"];
		$tj=$_POST["tj"];
		//SELECT * FROM kehu where company=13 and ((name LIKE '%户2%' )or(phone LIKE '%户2%'));
		$db->select("kehu", "*", " company=".$cp." and  (name like '%".$tj."%' or phone like '%".$tj."%')");
		$tjkh = $db->fetchArray(MYSQL_ASSOC);
		$i=0;
       		echo"<tr>
                 	<td>序号</td>
                    <td>姓名</td>
                    <td>联系电话</td>
                    <td>通讯地址</td>
                    <td>车型</td>
                    <td>车牌</td>
                    <td>备注</td>
                    <td>操作</td>
                </tr>";
		if(empty($tjkh)){
			echo "<tr><td colspan=8><b style='color:red;'> <h2>(ノдヽ)</h2></b>&nbsp;啊哦~未查找到匹配数据！</td></tr>";
		}else{
			foreach($tjkh as $row){
				if($tj==""&&$i>6)break;
				echo "<tr class=a".$i.">";
				echo"<td>".($i+1)."</td>";
				echo"<td>".$row["name"]."</td>";
				echo"<td>".$row["phone"]."</td>";
				echo"<td>".$row["kehu_c"]."</td>";
				echo"<td>".$row["car_type"]."</td>";
				echo"<td>".$row["carid"]."</td>";
				echo"<td>".$row["tips"]."</td>";
				echo"<td><button class='toolbt' onclick='ckehu(\"kehutb\",".$i.",".$row["id"].")'>选择</button></td>";
				echo"</tr>";
				$i++;
			}
		}
		if($tj==""){
			echo"<tr>
                    <td colspan='8'>
                    	<input id='addkh'  type='button'  class='botton' value='新建客户' onClick='addtr(\"kehutb\")'/></td>
                    </tr>";
			}

	break;
	/*添加项目*/
	case"additem":
		
		$iname=$_POST["iname"];
		$itype=$_POST["itype"];
		$imoney=$_POST["imoney"];
		$ierror=$_POST["ierror"];		
		$cp=$_POST["cp"];
		$db->select("item","count(*) as ct","company =".$cp."");$item = $db->fetchArray(MYSQL_ASSOC);$ict=$item[0]["ct"];
		$iid="XM".fz($cp).date('Ymd').fz($ict);
		echo "\nBM:".$iid."\n";
		$itemInfo = array('itemid'=>$iid,'itemname' =>$iname, 'money' =>$imoney ,'error' =>$ierror,'item_type' =>$itype,'tips' =>'无','company'=>$cp,'date'=>date('Ymd'));
		$db->insert("item", $itemInfo);
		echo "名字：".$iname;
		echo $db->printMessage();		
	break;
	/*添加商品*/
	case"addshop":
	
		$sname=$_POST["sname"];
		$sdw=$_POST["sdw"];
		$scb=$_POST["scb"];
		$skc=$_POST["skc"];
		$spp=$_POST["spp"];
		$scar=$_POST["scar"];
		$sdj=$_POST["sdj"];		
		$cp=$_POST["cp"];
		$db->select("shop","count(*) as ct","company =".$cp."");$shop = $db->fetchArray(MYSQL_ASSOC);$sct=$shop[0]["ct"];
		$bm="SP".fz($cp).date('Ymd').fz($sct);		
		$shopInfo = array('sname'=>$sname, 'spp' =>$spp, 'sdw' =>$sdw ,'scar' =>$scar,'sdj' =>$sdj,'scb' =>$scb,'skc' =>$skc,'company'=>$cp,'date'=>date('Ymd'),'sbm'=>$bm);
		$db->insert("shop", $shopInfo);
		echo "名字：";
		echo $db->printMessage();		
	break;
   /*存入订单已添加项目*/
   case"aitem":
   		$khid=$_POST["khid"];
		$iid=$_POST["iid"];
		$bid=$_POST["bid"];
		$gs=$_POST["gs"];
		$yh=$_POST["yh"];
		$gr=$_POST["gr"];
		$tips=$_POST["tips"];	
		$geti=$_POST["i"];
		$getcs=$_POST["cs"];
		if($geti>=$getcs)echo "添加结束跳转";	
		$je=dbinfo("item",$iid,"money")*$gs; //获取项目单价乘以工时
		$money=dbinfo("kehu",$khid,"money");//获取用户当前余额
		echo "\n扣除金额：".$je."\n";					
		$userInfo = array('iid'=>$iid, 'bid' =>$bid, 'gs' =>$gs ,'yh' =>$yh,'gr' =>$gr,'tips' =>'无',);
		$db->insert("aitem", $userInfo);
        echo $db->printMessage();	
		$money-=$je;$cmoney=array('money'=>$money);
		$db->update("kehu", $cmoney, "id = ".$khid."");
			
		echo $db->printMessage()."\n客户id为".$khid ."\n扣除金额：".$je."\n扣除前金额".$money;	
		$money=array('money'=>1);
	break;
	/*存入订单已添加商品*/
	case"ashop":
		$khid=$_POST["khid"];
		$sid=$_POST["sid"];
		$bid=$_POST["bid"];
		$sl=$_POST["gs"];
		$yh=$_POST["yh"];
		$gr=$_POST["gr"];
		$tips=$_POST["tips"];
		$geti=$_POST["i"];
		$getcs=$_POST["cs"];
		$je=sdbinfo("shop",$sid,"sdj")*$sl; //获取商品单价乘以工时
		$money=dbinfo("kehu",$khid,"money");//获取用户当前余额
		echo "\n##获取到余额".$money."##\n";
		if($geti>=$getcs)echo "添加结束跳转";	
		##ashop记录插入
		$userInfo = array('sid'=>$sid, 'bid' =>$bid, 'sl' =>$sl ,'yh' =>$yh,'gr' =>$gr,'tips' =>'无',);
		$db->insert("ashop", $userInfo);
	    echo $db->printMessage()."\n客户id为".$khid ."\n扣除金额：".$je."\n扣除前金额".$money;	
		##kehu表余额更新
		$money-=$je;$cmoney=array('money'=>$money);
		$db->update("kehu", $cmoney, "id = ".$khid."");
		##shop表库存更新
		$db->select("shop","*","sid=".$sid);$shop = $db->fetchArray(MYSQL_ASSOC);
		$skc=$shop[0]["skc"];
		echo "\n库存：".$skc."\n数量：".$sl."\n";
		$skc-=$sl;
		echo "剩余库存".$skc;
		$shopj = array('skc'=>$skc);
		echo "\nashop表新增信息".$db->printMessage();
        $db->update("shop", $shopj, "sid =".$sid);
		echo "\n库存更新：".$db->printMessage();		
	break;
	/*存入订单信息*/
   case"abill":
		$bid=0;
		$bkh=$_POST["bkh"];
		$ber=$_POST["ber"];
		$bps=$_POST["bps"];
		$zje=$_POST["zje"];		
		$company=$_POST["company"];
		$userInfo = array('zje'=>$zje,'bid'=>$bid, 'kehu' =>$bkh, 'btype' =>$ber ,'tips' =>$bps,'date'=>date('Y-m-d'),'company'=>$company);
		$db->insert("bill", $userInfo);
		echo $db->printMessage();
 
        /*订单编号生成部分*/
		//首先获取刚刚插入的数据的id
		$db->select("bill", "id", "1=1 order by id desc limit 1");$reid = $db->fetchArray(MYSQL_ASSOC);
		//根据该ID查询该条数据 获取公司 和 日期 信息
		$db->select("bill", "*", "id=".$reid[0]["id"]."");$bill = $db->fetchArray(MYSQL_ASSOC);
		//赋值
		$company=$bill[0]["company"];
		//根据公司和日期 查询该记录是该公司这一天的记录数
		$db->select("bill", "count(*) as c", "date='".$bill[0]["date"]."' and company=".$company."");$abm = $db->fetchArray(MYSQL_ASSOC);
		//将得到的日期格式化为19700101格式
		$date=date('Ymd',strtotime($bill[0]["date"]));
		//编码生成 格式为： KD+公司+日期+订单数
		$bm="KD".fz($company).$date.fz($abm[0]["c"]);
		//更新刚刚插入记录的订单编码字段
		$billInfo = array('bid'=>$bm);
        $db->update("bill", $billInfo, "id =".$reid[0]["id"]);
		/**编码生成完成**/
		
		//echo $db->printMessage();		
	break;
	/*删除已选择的项目/商品*/
   case"del":
		$id=$_POST["id"];
		$bid=$_POST["bid"];
		$table=$_POST["table"];
        $db->delete($table, "id = ".$id."");
		$db->select("aitem", "*", "bid=".$bid."");$aitem = $db->fetchArray(MYSQL_ASSOC);//已添加项目表读取
		$db->select("ashop", "*", "bid=".$bid."");$ashop = $db->fetchArray(MYSQL_ASSOC);//已添加项目表读取
		if($table=="aitem"){
			$tabt="<td> 序号 </td><td>项目编码</td>
                                <td>项目名称</td>
                                <td>单价</td>
                                <td>工时（时）</td>
                                <td>优惠（%）</td>
                                <td>金额</td>
                                <td>开始时间</td>
                                <td>完工时间</td>
                                <td>施工人员</td>
                                <td>项目分类</td>
                                <td>备注</td>
                                <td >操作</td>";
								
			$abt="<tr><td colspan='13'><input type='button' value='新建项目' class='botton' onClick=\"add('citem')\"></td></tr>";
			if(empty($aitem)){
				
				echo $tabt."<tr><td colspan='14'>暂无项目请添加</td></tr>".$abt;
		  	}else{
				$c=0;
				echo $tabt ;
				foreach($aitem as $row){
					$c++;
					$db->select("item", "*", "id=".$row["iid"]."");$iitem = $db->fetchArray(MYSQL_ASSOC);
					$money=$iitem[0]["money"]*$row["gs"]*(1-$row["yh"]/100);
					$bm="XM".fz($iitem[0]["company"]).fz($row["id"]);
					echo"<tr id='aiid".$c."' class='".$row["id"]."'>";
					echo"
					<td>".$c."</td>
					<td>".$bm."</td>
					<td>".$iitem[0]["itemname"]."</td>
					<td><input type='text'  disabled id='imoney".$c."' class='input_td' value='".$iitem[0]["money"]."'></td>
					<td><input type='text'  onChange='crm(".$c.",\"aitem\")' id='gs".$c."' class='input_td' value='".$row["gs"]."'></td>
					<td><input type='text'  onChange='crm(".$c.",\"aitem\")' id='iyh".$c."'  class='input_td' value='".($row["yh"]*1)."'></td>
					<td id='irmb".$c."'>".$money."</td>
					<td><input type='date' class='input_td' value='".$row["stime"]."'/></td>
					<td><input type='date' class='input_td' value='".$row["etime"]."'/></td>
					<td>".$row["gr"]."</td>
					<td>项目分类</td>
					<td>".$row["tips"]."</td>
					<td><button class='toolbt' onclick='del(".$row["id"].",\"aitem\")'>删除</button></td>";
					echo"</tr>";	
			   }
			   echo $abt;	
			}
	 }else{
		   $tabt=" <tr><td> 序号 </td><td>商品编码</td><td>商品名称</td><td>品牌</td><td>规格</td><td>适用车型</td>
                      <td>单位</td> <td>销售价格</td><td>数量</td><td>优惠</td><td>金额</td><td>领料人员</td><td>商品备注</td>
                      <td>操作</td></tr>";
		  $abt="<tr><td colspan='14'><input type='button' value='商品添加' class='botton' onClick=\"add('csp')\"></td></tr>";	
			if(empty($ashop)){
				echo $tabt;
				echo"<tr><td colspan='14'>暂无商品请添加</td></tr>";
			 	echo $abt;
			}else{
				$c=0;
				echo $tabt;
				foreach($ashop as $row){
					$c++;
					$db->select("shop", "*", "sid=".$row["sid"]."");$sshop= $db->fetchArray(MYSQL_ASSOC);
					$money=$sshop[0]["sdj"]*$row["sl"]*(1-$row["yh"]/100);
					$bm="SP".fz($sshop[0]["company"]).fz($row["id"]);
					echo"<tr id='asid".$c."' class='".$row["id"]."'>";
					echo"<td>".$c."</td>
					<td>".$bm."</td>
					<td>".$sshop[0]["sname"]."</td>
					<td>".$sshop[0]["spp"]."</td>
					<td>".$sshop[0]["tips"]."</td>
					<td>".$sshop[0]["scar"]."</td>
					<td>".$sshop[0]["sdw"]."</td>
					<td><input type='text' disabled id='smoney".$c."' style='width:15px;' class='input_td' value='".$sshop[0]["sdj"]."' />元</td>
					<td><input type='text' onChange='crm(".$c.",\"ashop\")' id='sl".$c."' style='width:30px;cursor:pointer;' class='input_td' value='".$row["sl"]."' /></td>
					<td><input type='text' onChange='crm(".$c.",\"ashop\")' id='syh".$c."' style='width:15px;' class='input_td' value='".($row["yh"]*1)."' /></td>
					<td id='srmb".$c."'>".$money."</td>
					<td>".$row["gr"]."</td>
					<td>".$row["tips"]."</td>
					<td><button class='toolbt'
					onclick='tuihuo(".$row["id"].",\"".$sshop[0]["sname"]."\",".$c.")'
					>退货</button></td>";
					echo"</tr>";
					
			    }
				echo $abt;	
			}
		}/**/
	break;
/*更新订单信息*/
   case"upbill":
   		$id=$_POST["bid"];
		echo $id;
		$khname=$_POST["khid"];
		$btype=$_POST["btype"];
        $bps=$_POST["bps"];
		$zje=$_POST["zje"];
		
		$billInfo = array('kehu' => $khname,'btype'=>$btype,'tips'=>$bps,'zje'=>$zje);
        $db->update("bill", $billInfo, "id =".$id);
		echo $db->printMessage();		
	break;
 /*订单编辑 价格实时更新*/
   case"upais":
		$aisid=$_POST["id"];
		$table=$_POST["table"];
		$gsl=$_POST["gsl"];
		$isyh=$_POST["isyh"];
		if($table=="aitem")$upisInfo = array('gs' => $gsl,'yh'=>$isyh);else $upisInfo = array('sl' => $gsl,'yh'=>$isyh);
		$db->update($table, $upisInfo, "id = ".$aisid);
        echo $db->printMessage();	
	break;
/*订单条件查询*/
   case"cxbill":
   		
		$bid=$_POST["bid"];
		$bkh=$_POST["bkh"];
		$sdate=$_POST["sdate"];
		$edate=$_POST["edate"];
		!$edate?$edate=date('Ymd'):$edate;
		$cp=$_POST["cp"];
		//从客户表中获取名字或电话中包含搜索条件$bkh 的记录
		$db->select("kehu", "*", "company =".$cp." and (name like '%".$bkh."%' or phone like '%".$bkh."%')");
		$tjkh = $db->fetchArray(MYSQL_ASSOC);
		
		//客户条件初始化
		$khtj="";
		//遍历获取答符合上方条件的记录中的id 并加入的 客户条件变量$khtj中
		foreach($tjkh as $row){
			$khtj.="kehu=".$row["id"]." or ";	
		}
		$khtj.="0";
		/*客户条件获取结束*/
		#查询符合条件为（bid 中包含搜索条件 $bid 且 日期值介于 $sdate-$edate之间 且 客户名称符合客户条件）的记录数的总和 赋值给总记录数$zjl
		//echo "<br>select * from bill where company=".$cp." and  bid like '%".$bid."%'  and (date between '".$sdate."' and '".$edate."') and (".$khtj.") <br>";
		$db->select("bill", "count(*) as ct", "company=".$cp." and bid like '%".$bid."%'  and (date between '".$sdate."' and '".$edate."') and (".$khtj.") ");$bills = $db->fetchArray(MYSQL_ASSOC);  //获取数据
		//print_r($bills);
		$zjl=$bills[0]["ct"];//总记录条数
		$page = new Page($zjl,8); //分页类构造初始化 每页显示8条
		#查询符合条件为（bid 中包含搜索条件 $bid 且 日期值介于 $sdate-$edate之间 且 客户名称符合客户条件）的所有记录 赋值给二维数组$bills
		$db->select("bill", "*", "bid like '%".$bid."%' and date between '".$sdate."' and '".$edate."' and (".$khtj.")".$page->limit1()."");
		$cxbill = $db->fetchArray(MYSQL_ASSOC);
        $c=0;
		//echo "<tr> <td colspan='17'>SELECT * FROM bill WHERE bid LIKE '%".$bid."%' AND date BETWEEN '".$sdate."' AND '".$edate."' AND (".$khtj.")</td></tr>";
		$jsfs="<select><option>支付宝付款</option><option>微信付款</option><option>现金付款</option>
				<option>合作商付款</option></select>";
		$ywzt="<select><option>完成中</option><option>已完成</option></select>";
		$ywlx="<select><option>美容</option><option>维修</option><option>保养</option>
				<option>改装</option></select>";
		echo "<tr><td>序号</td><td>单号</td><td>开单日期</td><td>客户名称</td><td>联系手机</td><td>车牌号</td>
				<td>车型</td><td>接待人</td><td>应收金额</td><td>已收金额</td><td>尚欠金额</td><td>结算日期</td>
				<td>结算方式</td><td>业务状态</td><td>结算状态</td><td>业务类型</td><td>备注</td></tr>";
		if(empty($cxbill)){echo "<tr><td colspan='17'>啊哦~找不到匹配的订单信息!<b style='color:red;'>( ´･ ̮ ･` )</b></td></tr>";}else{
		foreach($cxbill as $row){
			$c++;
			$db->select("kehu", "*", "id=".$row["kehu"]."");$kehu = $db->fetchArray(MYSQL_ASSOC);
			echo"<tr>
			<td>".$c."</td>
			<td><a href='ebill.php?bid=".$row["id"]."'>".$row["bid"]."</a></td>
			<td>".$row["date"]."</td>
			<td>".$kehu[0]["name"]."</td>
			<td>".$kehu[0]["phone"]."</td>
			<td>".$kehu[0]["carid"]."</td>
			<td>".$kehu[0]["car_type"]."</td>
			<td>员工一</td>
			<td><b style='color:#b67f00;'>".($row["zje"]*1)."￥</b></td>
			<td>".($row["yshou"]*1)."￥</td>
			<td>".($row["zje"]*1-$row["yshou"]*1)."￥</td>
			<td>未结</td>
			<td>".$jsfs."</td>
			<td>".$ywzt."</td>
			<td>".$row["zt"]."</td>
			<td>".$ywlx."</td>
			<td>".$row["tips"]."</td>
		</tr>";
		}
		 echo "<tr><td colspan='17'> <div class='page'>".$page->showpage()."</td></tr></div>"; 
	}
       	
	break;
/*商品删除*/
	case "delsp":
		$sid=$_POST["sid"];
		$shopInfo = array('del' => 0);
		$db->update("shop", $shopInfo, "sid = ".$sid."");
		echo $db->printMessage();
	break;
	case "skh":
		$kid=$_POST["id"];
		$name=$_POST["name"];
		$tel=$_POST["tel"];
		$vip=$_POST["vip"];
		$carid=$_POST["carid"];
		$cart=$_POST["cart"];
		$color=$_POST["color"];
		$nkm=$_POST["nkm"];
		$nbkm=$_POST["nbkm"];
		$nbtime=$_POST["nbtime"];
		$nback=$_POST["nback"];
		$nbx=$_POST["nbx"];
		$bxcp=$_POST["bxcp"];
		$tips=$_POST["tips"];
		//$id.$name.$id.$name.$tel.$vip.$carid.$cart.$color.$nkm.$nbkm.$nbtime.$nback.$nbx.$bxcp.$tips
		$kehuInfo = array('name'=>$name,'phone'=>$tel,'vip'=>$vip,'carid'=>$carid,'car_type'=>$cart,'car_color'=>$color,'new_km'=>$nkm,'next_by_km'=>$nbkm,'next_by_time'=>$nbtime,'next_back'=>$nback,'next_bx'=>$nbx,'bx_company'=>$bxcp,'tips'=>$tips);
		echo "客户id=".$kid."\n";
		$db->update("kehu", $kehuInfo, "id = ".$kid."");
		echo $db->printMessage();		
        //echo $id.$name.$id.$name.$tel.$vip.$carid.$cart.$color.$nkm.$nbkm.$nbtime.$nback.$nbx.$bxcp.$tips;	
	break;
	case "akh":
		$cp=$_POST["cp"];
		$name=$_POST["name"];
		$tel=$_POST["tel"];
		$carid=$_POST["carid"];
		$cart=$_POST["cart"];
		$color=$_POST["color"];
		$nkm=$_POST["nkm"];
		$nbkm=$_POST["nbkm"];
		$nbtime=$_POST["nbtime"];
		$nback=$_POST["nback"];
		$nbx=$_POST["nbx"];
		$bxcp=$_POST["bxcp"];
		$tips=$_POST["tips"];
		echo "公司".$cp;
		  //echo $name.$tel.$carid.$cart.$color.$nkm.$nbkm.$nbtime.$nback.$nbx.$bxcp.$tips;	
		$kehuInfo = array('name'=>$name,'phone'=>$tel,'carid'=>$carid,'car_type'=>$cart,'car_color'=>$color,'new_km'=>$nkm,'next_by_km'=>$nbkm,'next_by_time'=>$nbtime,'next_back'=>$nback,'next_bx'=>$nbx,'bx_company'=>$bxcp,'tips'=>$tips,'company'=>$cp,'intime'=>date("Ymd"));
		$db->insert("kehu", $kehuInfo);
		/*****************************************以下是会员卡号生成部分 */
		//获取该公司最后一条记录的id
		$db->select("kehu", "id", "company=".$cp." order by id desc limit 1");$reid = $db->fetchArray(MYSQL_ASSOC);
		//获取该公司的会员数
		$db->select("kehu", "count(*) as ct", "company=".$cp."");$kehu = $db->fetchArray(MYSQL_ASSOC);$number=$kehu[0]["ct"];
		//根据该ID查询该条数据 获取公司 和 信息日期 
		$db->select("kehu", "*", "id=".$reid[0]["id"]."");$kehu = $db->fetchArray(MYSQL_ASSOC);
		//会员卡号生成  格式 VIP+公司+日期+第几位
		$vip="VIP".$kehu[0]["company"].date('Ymd',strtotime($kehu[0]["intime"])).fz($number);
		echo "\nVIP:".$vip."\n";
		$kehuInfo = array('vip'=>$vip);
		$db->update("kehu", $kehuInfo, "id = ".$reid[0]["id"]."");
		echo $db->printMessage();	
	break;
	/*客户删除*/
	case "dkh":
		$kid=$_POST["kid"];
		echo "客户id".$kid."\n";
		$kehuInfo = array('del' => 0);
		$db->update("kehu", $kehuInfo, "id = ".$kid."");
		echo $db->printMessage();
	break;
	/*安全库存设置*/
	case "akc":
		$sid=$_POST["sid"];
		$akc=$_POST["akc"];
		echo "客户id".$kid."\n";
		$shopInfo = array('akc' => $akc);
		$db->update("shop", $shopInfo, "sid = ".$sid."");
		echo $db->printMessage();
	break;
	
	/***************************************************************************下面是yunku官网部分*/
	/*登录*/
	case "login":
		$user=$_POST["user"];
		$pwd=$_POST["pwd"];
		$db->select("user", "*", "user='".$user."'");$users = $db->fetchArray(MYSQL_ASSOC);
		echo $db->printMessage()."\n";
		if(empty($users)){
			echo "用户不存在";	
		}else if($user==$users[0]["user"]&&$pwd==$users[0]["password"]){
			echo "登录成功";
			@session_start();
			$_SESSION['user']=$users[0]["user"];
			$_SESSION['name']=$users[0]["name"];
			$_SESSION['company']=$users[0]["company"];
			$_SESSION['head']=$users[0]["head"];
		}else{
			echo "用户名或密码不正确";	
		}
		echo $user.$pwd;
	break;
	/*注册*/
	case "singup";
		//name:name,cp:cp,tel:tel,pwd:pwd,
		$name=$_POST["name"];
		$cp=$_POST["cp"];
		$tel=$_POST["tel"];
	    $pwd=$_POST["pwd"];
		$openid=$_POST["openid"];
		$head=$_POST["hd"];
		$cpInfo=array('name'=>$cp);
		$db->insert("company", $cpInfo);//先向公司表增加一条数据
		$db->select("company", "id", "1=1 order by id desc limit 1");$reid = $db->fetchArray(MYSQL_ASSOC);	//返回新增的id
		$userInfo = array('name'=>$name,'user'=>$tel,'phone'=>$tel,'company'=>$reid[0]["id"],'password'=>$pwd,'head'=>$head,'openid'=>$openid);//将id于用户信息存入user表
		$db->insert("user", $userInfo);
		if($openid!=""){
			$db->select("user","*","openid='".$openid."'");$user=$db->fetchArray(MYSQL_ASSOC);
			@session_start();
			echo $_SESSION['user']=$user[0]["user"];
			echo $_SESSION['name']=$user[0]["name"];
			echo $_SESSION['company']=$user[0]["company"];
			echo $_SESSION['head']=$user[0]["head"];
			
			echo "@QQ登录跳转@";
		};
		echo $db->printMessage();
	break;
	/*检测用户名是否已存在*/
	case "ckuser":
	$user=$_POST["user"];
		$db->select("user","*","user='".$user."' or phone='".$user."'"); $user = $db->fetchArray(MYSQL_ASSOC);
		echo $db->printMessage();
		if(empty($user))echo"可用";else echo"不存在";
	break;
	case "echoto":
		$value=$_POST["key"];
		$CacheInfo = array('value'=>$value);//将id于用户信息存入user表
			$db->insert("cache", $CacheInfo);
			echo $db->printMessage();	
		/*
			$userInfo = array('name'=>$name,'key'=>$key,'company'=>$cp);//将id于用户信息存入user表
		$db->select("kehu","*","us='".$user."' or phone='".$user."'"); $user = $db->fetchArray(MYSQL_ASSOC);
			echo $db->printMessage();
			if(empty($user))echo"可用";*/
	break;
	case "echoba":
		$value=$_POST["key"];
		$db->select("cache","*","value=".$value); $cache = $db->fetchArray(MYSQL_ASSOC);
		if(!empty($cache))echo"已被访问";else echo"未被访问";
	break;
	case "khinfoba":
		$key=$_POST["key"];
		echo "\nkey:".$key."\n";
		$db->select("kehu","*","khkey='".$key."'"); $kehu = $db->fetchArray(MYSQL_ASSOC);
		echo "SELECT　* FROM kehu WHERE khkey='".$key."'";
		if(!empty($kehu)){
			echo "{id}".$kehu[0]["id"]."{/id}";
			echo "{name}".$kehu[0]["name"]."{/name}";
			echo "{phone}".$kehu[0]["phone"]."{/phone}";				
		 }else{
			echo "未检测到数据";	 
		}
	break;
	/*订单删除*/
	case "dbill":
		$bid=$_POST["bid"];
		echo $bid;
		$bInfo = array('del' => 0);
		$db->update("bill", $bInfo, "id = ".$bid."");
		echo $db->printMessage();
		//echo ;		
	break;
	/*商品退货*/
	case "spth":
		$sid=$_POST["sid"];
		$khid=$_POST["khid"];
		$thsl=$_POST["thsl"];
		$thyy=$_POST["thyy"];
		$del=$_POST["del"];
		$asid=$_POST["asid"];
		$cp=$_POST["cp"];
		$bid=$_POST["bid"];
		//$del?$del=1:$del=0;
		$thInfo = array('khid'=>$khid,'jsr'=>1,'sl'=>$thsl,'sp'=>$sid,'tips'=>$thyy,'cp'=>$cp,'bid'=>$bid,'date'=>date("Ymd"));//退货表信息
		$db->insert("tuihuo", $thInfo);	
		echo "\n数据插入状态：".$db->printMessage()."\n";
		$bInfo = array('sl' => $del,'del'=>$del);
		$db->update("ashop", $bInfo, "id = ".$asid);
		echo "\n数据更新状态：".$db->printMessage()."\n";
		echo "商品id：".$sid."\n客户：id".$khid."\n退货数量：".$thsl."\n退货原因：".$thyy."\n删除状态：".$del."\n";
		//sid:sid,khid:khid,thsl:thsl,thyy:thyy,del:del
	break;	
	case "czjl":
		$kh=$_POST["kh"];
		$cp=$_POST["cp"];
		$db->select("czjl","*","company=".$cp." and kh=".$kh); $czjl = $db->fetchArray(MYSQL_ASSOC);
		echo $db->printMessage();
		if(!empty($czjl)){
			foreach($czjl as $row){
				echo "<tr>
						<td>".$row["date"]."</td>
						<td>".$row["je"]."</td>	
						<td>".jsfst($row["zf"])."</td>	
						<td>".$row["bm"]."</td>	
						<td>杭州</td>		
					 </tr>";	
			}	
		}else{
			echo"<tr><td colspan='5' >暂无记录</td></tr>";	
		}
	    echo"<tr><td colspan='5' ><input type='button' value='充值' class='botton' onClick=\"$('#cz1').toggle(200)\"/></td></tr>";
		echo "<input type='hidden' value='".$kh."' id='khid'>";
	break;
	case "car":
		$kh=$_POST["kh"];
		$cp=$_POST["cp"];
		$db->select("car","*","kh=".$kh); $car = $db->fetchArray(MYSQL_ASSOC);
		echo $db->printMessage();
		if(!empty($car)){
			$c=0;
			foreach($car as $row){
				echo "<tr>
						<td>".$c++."</td>
						<td><input type='text' onChange='upcar(".$row["id"].")' class='input_td' id='pp' value='".$row["pp"]."'/></td>
						<td><input type='text' onChange='upcar(".$row["id"].")' class='input_td' id='car' value='".$row["car"]."'/></td>	
						<td><input type='text' onChange='upcar(".$row["id"].")' class='input_td' id='carid' value='".$row["carid"]."'/></td>	
						<td><input type='date' onChange='upcar(".$row["id"].")' class='input_td' id='bdate' value='".$row["buydate"]."'/></td>	
						<td><input type='text'onChange='upcar(".$row["id"].")'  class='input_td' id='vin' value='".$row["vin"]."'/></td>		
					 </tr>";	
			}	
		}else{
			echo"<tr><td colspan='6' >暂无记录</td></tr>";	
		}
	    echo"<tr><td colspan='6' ><input type='button' value='添加' class='botton' onClick=\"$('#addcar').toggle(200)\"/></td></tr>";
		echo "<input type='hidden' value='".$kh."' id='khid'>";
	break;
	case "hycz":
		$kh=$_POST["kh"];
		$cp=$_POST["cp"];
		$je=$_POST["je"];
		$zf=$_POST["zf"];	
		$date=date('Ymd');
		
		$db->select("czjl","count(*) as ct","kh=".$kh);$czjl = $db->fetchArray(MYSQL_ASSOC);
		$ct=$czjl[0]["ct"]+1;
		$bm="CZ".$cp.$date.fz($ct);
		echo $bm;
				
		$czjl=array('kh'=>$kh,'company'=>$cp,'je'=>$je,'zf'=>$zf,'date'=>$date,'bm'=>$bm);
		$db->insert("czjl",$czjl);
		echo $db->printMessage();
		
		$db->select("kehu","money","id=".$kh);$kehu = $db->fetchArray(MYSQL_ASSOC);
		$money=$kehu[0]["money"];
		$money+=$je;		
		$kehuinfo=array("money"=>$money);
		$db->update("kehu",$kehuinfo,"id=".$kh);
		echo $db->printMessage();
		print_r($czjl);
	break;
	case "addcar":
		$pp=$_POST["pp"];
		$kh=$_POST["kh"];
		$car=$_POST["car"];
		$carid=$_POST["carid"];
		$vin=$_POST["vin"];
		$bdate=$_POST["bdate"];
		$carinfo=array("pp"=>$pp,"kh"=>$kh,"car"=>$car,"carid"=>$carid,"vin"=>$vin,'buydate'=>$bdate);
		$db->insert("car",$carinfo);
		echo $db->printMessage();
	break;
	case "upcar":
		$pp=$_POST["pp"];
		$kh=$_POST["kh"];
		$car=$_POST["car"];
		$carid=$_POST["carid"];
		$vin=$_POST["vin"];
		$bdate=$_POST["bdate"];
		$cid=$_POST["cid"];
		$carinfo=array("pp"=>$pp,"kh"=>$kh,"car"=>$car,"carid"=>$carid,"vin"=>$vin,'buydate'=>$bdate);
		$db->update("car",$carinfo,"id=".$cid);
		echo $db->printMessage();
	break;
	case "xfjl":
		$kh=$_POST["kh"];
		$db->select("bill","*","kehu=".$kh);$xfjl = $db->fetchArray(MYSQL_ASSOC);
		foreach($xfjl as $row){
			echo "<tr>
					<td>".$row["date"]."</td>
				    <td>".($row["zje"]*1)."元</td>
			        <td>".btypete($row["btype"])."</td>           
				    <td><a  target='_blank' href='../ebill.php?bid=".$row["id"]."'>".$row["bid"]."</a></td>             
				    <td>杭州</td>
			
			</tr>";
			
		}
		echo"<input type='hidden' value='".$kh."' id='khid'> ";
	break;
	}
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	function fz($a){$re=0;if($a<1000) $re="0".$a;if($a<100) $re="00".$a;if($a<10) $re="000".$a;return $re;}
function btypet($a){switch($a){case "0":$b="未选择订单类型";break;case "1":$b="美容";break;	case "2":$b="维修";break;case "3":$b="保养";break;case "0":$b="改装";break;}return $b;}
function jsfst($a){
	switch($a){
		case "0":$b="未选择支付类型";break;
		case "1":$b="支付宝支付";break;
		case "2":$b="微信支付";break;
		case "3":$b="现金付款";break;
		case "0":$b="合作商付款";break;
	}	
	return $b;
}

function dbinfo($tab,$id,$col){
		global $db;
		$db->select($tab,$col,"id=".$id);$dbinfo=$db->fetchArray(MYSQL_ASSOC);
		return	$dbinfo[0][$col];
}

function sdbinfo($tab,$id,$col){
		global $db;
		$db->select($tab,$col,"sid=".$id);$dbinfo=$db->fetchArray(MYSQL_ASSOC);
		return	$dbinfo[0][$col];
}

?>
</body>
</html>