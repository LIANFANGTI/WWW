<!DOCTYPE html>
<?php
	$bid=$_GET["bid"];
	require_once 'function.php';
   // $db->select("kehu", "*", "user = 'admin'");
	$db->select("kehu", "*", "company=".$cp );$kehu = $db->fetchArray(MYSQL_ASSOC);//客户表读取
	$db->select("item", "*", "company=".$cp );$item = $db->fetchArray(MYSQL_ASSOC);//项目表读取
	$db->select("shop", "*", "company=".$cp );$shop = $db->fetchArray(MYSQL_ASSOC);//商品表读取
	//echo "<br>订单id：".$bid."公司id".$cp."<br>";
    $db->select("bill", "*", "id=".$bid." and company=".$cp );$bill = $db->fetchArray(MYSQL_ASSOC);//订单信息读取
	
	$db->select("ashop", "*", "bid=".$bid." and del and sl");$ashop = $db->fetchArray(MYSQL_ASSOC);//已添加商品表读取
	$db->select("aitem", "*", "bid=".$bid."");$aitem = $db->fetchArray(MYSQL_ASSOC);//已添加项目表读取
	//echo "<br>用户id：".$bill[0]["kehu"]."<br>";
	$db->select("kehu", "*", "id=".$bill[0]["kehu"]." and company=".$cp);$kehu1 = $db->fetchArray(MYSQL_ASSOC);//订单里客户id对应的客户信息读取
	$rq=date('Ymd');
	$bm="XM".$rq;
	
?>

<html>

	<head>
		<meta charset="utf-8" />
		<title>一库汽车管理系统</title>
		<link rel="stylesheet" href="css/index.css" type="text/css" />
        <script src="js/js.js"></script>
        <script src="js/jquery-1.10.2.js"></script>
        <script src="js/ebill.js"></script>
	</head>

	<body>
    <?php
	    $company=$bill[0]["company"];
		$date=date('Ymd',strtotime($bill[0]["date"]));
		//echo "公司：".$company;
		//echo "<br>日期：".$date;
		
		//select COUNT(*) from bill where date(date) = curdate() AND company=2;
		//select date as 日期, count(*) as 记录数 from bill WHERE company=1 and date='2016-01-27' GROUP BY date ;
	    $db->select("bill", "count(*) as c", "date='".$bill[0]["date"]."' and company=".$company."");$abm = $db->fetchArray(MYSQL_ASSOC);
	
		$count=fz($abm[0]["c"]);
		//echo "<br>数量：".$abm[0]["c"]."<br>";
		$bm="KD".fz($company).$date.$count;
		//echo $bm."<br>";
		//echo "<input type='text' value='".$bm."' id='bm'>";
		echo " <input type='hidden' value='".$bid."' id='bid'>
			"
		;
		
	  ?>
      
    <!--
    <div class="box">
    	<div class="box_title"><h4 class="caption">测试内容</h4></div>
        <div class="box_content" id="backdata"><?php /*
				if(!empty($ashop))print_r($ashop);else echo"未添加商品";
				echo"<hr>";
				print_r($aitem); 
				
		 */?>  
         <input type="button" value="test" onClick="test()"></div>
         </div>
    </div>
   -->
<div class="back" id="back" ></div>

<div class="toolbox" id="additem"><div class="box_title">
            	<h4 class="caption">新建项目</h4>
                <div class="close" onClick="closeb('additem')">&times;</div>
            
            
            </div>
                <div class="box_content">
                	<div class="items">
                	 	<div class="item"><span class="item_name">项目编码：</span>
                     		<input type="text" class="text" value="<?php echo $bm;  ?>"  id="itemid" onBlur="c(this,'save_item')" /></div>
                     	<div class="item"><span class="item_name">项目名称：</span>
                     		<input type="text" class="text" id="itemname" onBlur="c(this,'save_item')" /></div>
                     <div class="item"><span class="item_name" >项目类型：</span>
                    	  <select class="text" id="itemtype" onBlur="c(this,'sava_item')">
							<option>洗车</option>
							<option>美容</option>
							<option>维修</option>
                         </select>
                     </div>
                    </div>
                    <div class="items">
                    
                     <div class="item"><span class="item_name">单价：</span>
                     	<input type="text" class="text" id="money" onBlur="c(this,'save_item')" /></div>
                   
                     <div class="item"><span class="item_name">故障类型：</span>
                     	<select class="text2" id="error" onBlur="c(this,'save_item')">
                        	<option>车胎故障</option>
                            <option>车身刮伤</option>
                            <option>发动机故障</option>
                            <option>其他</option>
                        </select>
                     </div>
                    </div>
                </div>
                <div class="boxbt">
                	<input type="button" value="保存" class="botton"  id="save_item" onClick="s_item()" ></div></div> <!--项目添加弹窗-->
		<div id="main">
            <div class="box">
           		<div class="box_title"><h4 class="caption">开单信息</h4>&nbsp;<h4 class="caption"><?php echo bl($bid,"bid") ?></h4>
                	<div class="close">
                    	<input type="button" class="botton" value="保存" onClick="update()" id="save_bill"/>
                    	<input type="button" class="botton" value="订单结算" onClick="billjx()" id="billjs"/>
                    </div>
                </div>
                <div class="box_content">
                	<div style="height:100%;">
					  <?php
                        $bid=$bill[0]["id"];
                        $bbm=$bill[0]["bid"];
                        $bkh=$kehu1[0]["name"];
						$khid=$kehu1[0]["id"];
						$tel=$kehu1[0]["phone"];
                        $bgz=$bill[0]["btype"];
                        $bps=$bill[0]["tips"];
                      ?>
                      
                    <fieldset style="width:95%; padding:0px 20px 5px 40px; border-color:rgba(255,255,255,0.4) ">
                    	<legend>客户选择</legend>
                        客户：<input type="text"   id="khname" class="text" value="<?php echo $bkh; ?>"  onClick="add('ckehu')" onBlur="c(this,'save_bill')"/>
                        客户电话：<input type="text" id="khtel"  class="text" value="<?php echo $tel; ?>" onDblClick="add('qrbox')"  disabled/>
						<input type="hidden" id="khid" value="<?php echo $khid; ?>"  />
  						<input type="hidden" id="bid" value="<?php echo $bid; ?>"  />
						<?php echo btype($bill[0]["btype"]); ?>
                        <input type="text"  id="bps" class="text" placeholder="<?php echo $bps; ?>" style="width:55%" >
                        <img src="../yunku/images/test.png" title="手机填写" style=" cursor:pointer; float:right;" onClick="add('qrbox')" width="30" height="30"/>
                    </fieldset>
                    <fieldset style="width:95%; padding:0px 20px 5px 40px; border-color:rgba(255,255,255,0.4) ">
                    	<legend>订单状态</legend>
						<ul class="ul">
						<?php 
							echo "<li>业务状态：".ywzt($bill[0]["ywzt"])."</li><li>选择结算方式：".jsfs($bill[0]["jsfs"])."</li><li>订单状态：".jszt($bill[0]["zt"])."</li>";
						?>
                        </ul>
                    </fieldset>
                    <fieldset style="border:0px">
                    	<h1 style="margin:20px 40px; float:right;color:#f9af02;" id="rmbs">订单总价：0元</h1>
                    </fieldset>
                  </div>
                </div>
                <div class="boxbt">
   <!--***********************************************************************************************************客户选择部分-->
           <div class="toolbox" id="ckehu" style="width:800px">
           		<div class="box_title" ><h4 class="caption">客户选择</h4>
                 	<!-- id=条件-->
                	<div class="close"onClick="close2()">×</div>
                </div>
                <div class="box_content">
                    <div class="table1">
                    	<table cellpadding="0" cellspacing="0">
                        	<tr><td colspan="8">
                            	<input type="search"  class="input_td" onKeyUp="tjcx()" id="tj" placeholder="输入账户信息查询"/>
                            </td></tr>
                        </table>
                        <table cellpadding="0" cellspacing="0" id="kehutb">
                            <tr>
                            	<td>序号</td>
                                <td>姓名</td>
                                <td>联系电话</td>
                                <td>通讯地址</td>
                                <td>车型</td>
                                <td>车牌</td>
                                <td>备注</td>
                                <td>操作</td>
                            </tr>
                            
                         <?php 
							$i=0;
							if(empty($kehu)){
								echo "<tr><td colspan=8>(ノдヽ)啊哦~暂无数据哦！</td></tr>";
							}else{
								foreach($kehu as $row){
									    echo "<tr class=a".$i.">";
										echo"<td>".($i+1)."</td>";
										echo"<td id='kh".$i."' class='".$row["id"]."'>".$row["name"]."</td>";
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
							?>
                            <tr class="aa">
                              <td colspan="8">
                                <input id="addkh"  type="button"  class="botton" value="新建客户" onClick="addtr('kehutb')"/></td>
                            </tr>
                       </table>
                    </div>
                </div>
                <div class="boxbt"></div>
           </div>
        
           
		   
 <!--***********************************************************************************************************项目选择部分-->
   <div id="msgbox" class="ui-widget-content" >
   		<div class="msgtitle">
        	<label class="caption"><h4 id="msg-caption">提示信息</h4></label>
        	<div class="close" style="margin-top:8px;"  onClick=""><h3>×</h3></div>
        </div>
        <div class="label">
        	<img src="jqueryui/img/bj5_01.png" class="ico" id="msg-ico"/>
            <div class="msgtext" id="msg-text">该操作无法撤销，是否确认删除该项目。</div>
        </div>
        <div class="msgbt">
        	<input type="button" value="确认" alt="确认" name="msg-bt" class="msgbutton" onClick="msgbox(0,1,'return')"/>
            <input type="button" value="取消" alt="取消" name="msg-bt" class="msgbutton" onClick="msgbox(0,0,'return')"/>
        </div>
   </div>
            
            
            <div class="box" >
            	<div class="box_title" onClick="$('#weixiuc').toggle(500);"><h4 class="caption">维修项目</h4>
                	<div class="close">
                        <input type="button" value="新建" class="toolbt" onClick="add('additem');enable('sava_item',false)">
                        <input type="button" value="选择" class="toolbt" onClick="add('citem')">
                	</div>
                </div>
            	<div class="box_content" id="weixiuc">
                    <div class="table1">
                        <table cellpadding="0" cellspacing="0" id="itemtb">
                            <tr>
                                <td> 序号 </td>
                                <td>项目编码</td>
                                <td>项目名称</td>
                                <td>单价</td>
                                <td>工时（时）</td>
                                <td>优惠（%）</td>
                                <td>金额（元）</td>
                                <td>开始时间</td>
                                <td>完工时间</td>
                                <td>施工人员</td>
                                <td>项目分类</td>
                                <td>备注</td>
                                <td class="">操作</td>
                            </tr>
                            
                            <?php
								function fz($a){
									$re=$a;
									if($a<1000) $re="0".$a;
									if($a<100) $re="00".$a;
									if($a<10) $re="000".$a;
									return $re;
									
									}
								if(empty($aitem)){
									echo"<tr><td colspan='14'>暂无项目请添加</td></tr>";
								}else{
									$c=0;
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
                                				<td><button class='toolbt' onclick='del(".$row["id"].",\"aitem\")'>删除</button></td>
											";
										echo"</tr>";	
									}	
								}
                            /**/
							echo "";
                            ?>
                            <tr>
                                <td colspan="13"><input type="button" value="添加项目" class="botton" onClick="add('citem')"></td>
                            </tr>
                        </table>
                        
                    </div>
                    <div class="boxbt"><h3 class="mny" id="itemrmb"></h3></div>
                    <script>changermb(0,"item");</script>
                </div>
                
            </div>
            
  <!--**************************************************项目选择弹窗-->           
      <div class="toolbox" id="citem" style="width:800px;">
           		<div class="box_title" ><h4 class="caption">项目选择</h4>
                 	
                	<div class="close"onClick="closeb('citem')">×</div>
                </div>
                <div class="box_content">
                	<div class="table1">
				<table cellpadding="0" cellspacing="0" id="aitemtb">
					<tr>
						<td> 序号 </td>
						<td>项目编码</td>
						<td>项目名称</td>
						<td>单价</td>
						<td>项目分类</td>
						<td>备注</td>
						<td>操作</td>
					</tr>
                         <?php 
							$i=0;
								foreach($item as $row){
								     if($i>6)break;
									echo "<tr class=a".$i.">";
										echo"<td>".($i+1)."</td>";
										echo"<td>".$row["itemid"]."</td>";
										echo"<td id='iid".($i+1)."' class='".$row["id"]."'>".$row["itemname"]."</td>";
										echo"<td>".$row["money"]."</td>";
										echo"<td>".$row["item_type"]."</td>";
										echo"<td>".$row["tips"]."</td>";
										echo"<td><button class='toolbt' onclick='acitem(\"aitemtb\",".($i+1).",".$row["id"].")'>选择</button></td>";
									echo"</tr>";
									$i++;
								}
							?>
                    <tr>
                    	<td colspan="13"><input type="button" value="新建项目" class="botton" onClick="add('additem')"></td>
                    </tr>
				</table>
			</div>
                </div>
                <div class="boxbt"></div>
           </div>
           	
          
  <!--***********************************************************************************************************商品选择部分-->    <!--**************************************************addsp==>>商品新建弹窗-->                
			<div class="toolbox" id="addsp">
            	<div class="box_title">
                    <h4 class="caption">新建商品</h4>
                    <div class="close" onClick="closeb('addsp')">×</div>
                </div>
                <div class="box_content">
                	<form>
                    <div class="items">
                         <div class="item"><span class="item_name">商品名称：</span><input type="text" class="text" id="sname"/></div>
                         <div class="item"><span class="item_name">单位:</span><input type="text" class="text" id="sdw" /> </div>
                     </div>
                     <div class="items">
                        <div class="item"><span class="item_name">期初成本：</span><input type="text" class="text" id="scb"/></div>
                         <div class="item"><span class="item_name">期初库存：</span><input type="text" class="text" id="skc"/></div> 
                          <div class="item"><span class="item_name">品牌:</span><input type="text" class="text" id="spp"/></div>
                     </div>
                     <div class="items">
                        <div class="item"><span class="item_name">销售单价：</span><input type="text" class="text" id="sdj"/></div>
                        <div class="item"><span class="item_name">适用车型：</span><input type="text" class="text" id="scar"/></div>
                     </div>
                      
                            </form>
                </div>
                <div class="boxbt"> <input type="button" value="保存" class="botton" onClick="s_shop()" /></div>
            </div>
    <!--**************************************************商品选择栏--> 
    <div class="toolbox" id="th" style="width:500px;">
    	<div class="box_title">
        	<h4 class="caption">商品退货</h4>
            <h4 class="close" onClick="closeb('th')">×</h4>
            
        </div>
      
        <div class="box_content">
        	<fieldset class="group" style="text-align:left; border-radius:10px;">
            <legend>信息填写</legend>
            <ul class="ul_br">
            	<li>商品名称：<input type="text" class="text" id="spname"></li>
                <li>退货数量：<input type="button" class="button-yuan" onClick="down()"  value="-">
                			<input type="text" value="0" class="text" onKeyUp="cg()"id="thsl">
                        	<input type="button" class="button-yuan"onClick="up()"  value="+">
                </li>
                <li><label id="min">0</label>
                <input type="range" min="0" id="range" onChange="range()" title="1" value="0"/>
                <label id="max">0</label>
                </li>
                 <br>
                
                <li>退货原因：<input type="text" id="thyy" class="text" style="width:55%;"></li>
                </ul>
            </fieldset>
            <input type="button" class="botton" onClick="subth()" value="提交">
        </div>
    </div>
			<div class="box">
            	<div class="box_title" onClick="$('#xuanzesp').toggle(500);"><h4 class="caption">商品选择</h4>
                    <div class="close">
                        <input type="button" value="新建" class="toolbt" onClick="add('addsp')">
                        <input type="button" value="选择" class="toolbt" onClick="add('csp')">
                	</div>
                </div>
                    <div class="box_content" id="xuanzesp">
                        <div class="table1">
                        <table cellpadding="0" cellspacing="0" id="shoptb">
                            <tr>
                                <td> 序号 </td>
                                <td>商品编码</td>
                                <td>商品名称</td>
                                <td>品牌</td>
                                <td>规格</td>
                                <td>适用车型</td>
                                <td>单位</td>
                                <td>销售价格</td>
                                <td>数量</td>
                                <td>优惠（%）</td>
                                <td>金额</td>
                                <td>领料人员</td>
                                <td>商品备注</td>
                                <td>操作</td>
                            </tr>

                            <?php
								if(empty($ashop)){
									echo"<tr><td colspan='14'>暂无商品请添加</td></tr>";
								}else{
									$c=0;
									foreach($ashop as $row){
										$c++;
										$db->select("shop", "*", "sid=".$row["sid"]."");$sshop= $db->fetchArray(MYSQL_ASSOC);
										$money=$sshop[0]["sdj"]*$row["sl"]*(1-$row["yh"]/100);
										$bm="SP".fz($sshop[0]["company"]).fz($row["id"]);
										echo" <input type='hidden' id='sid+".$c."' value='".$row["sid"]."'>";
										echo"<tr id='asid".$c."' class='".$row["id"]."'>";
											echo"
												<td>".$c."</td>
												<td>".$bm."</td>
												<td id='sp".$c."'>".$sshop[0]["sname"]."</td>
												<td>".$sshop[0]["spp"]."</td>
												<td>".$sshop[0]["tips"]."</td>
												<td>".$sshop[0]["scar"]."</td>
												<td>".$sshop[0]["sdw"]."</td>
												<td><input type='text' disabled id='smoney".$c."' style='width:25px;' class='input_td' value='".$sshop[0]["sdj"]."' />元</td>
												<td><input type='text' onChange='crm(".$c.",\"ashop\")' id='sl".$c."' style='width:30px;cursor:pointer;' class='input_td' value='".$row["sl"]."' /></td>
												<td><input type='text' onChange='crm(".$c.",\"ashop\")' id='syh".$c."' style='width:15px;' class='input_td' value='".($row["yh"]*1)."' /></td>
												<td id='srmb".$c."'>".$money."元</td>
												<td>".$row["gr"]."</td>
												<td>".$row["tips"]."</td>
                                				<td><button class='toolbt'
												 onclick='tuihuo(".$row["id"].",\"".$sshop[0]["sname"]."\",".$c.",".$sshop[0]["sid"].")'
												 >退货</button></td>
											";
										echo"</tr>";	
									}	
								}
                            /**/
						
                            ?>
                            <tr>
                            	<td colspan="14"><input type="button" value="添加商品" class="botton" onClick="add('csp')"></td>
                            </tr>
                        </table>
						
                      
					  </div>  
                    </div>
                    <div class="boxbt"><h3 class="mny" id="shoprmb"></h3></div>
                    <script>changermb(0,"shop") </script>
				</div>
                
 <!--**************************************************商品选择弹窗--> 
     <div class="toolbox" id="csp">
           		<div class="box_title" ><h4 class="caption">商品选择</h4>
                 	
                	<div class="close" onClick="closeb('csp')">×</div>
                    
                </div>
                <div class="box_content">
<div class="table1">
                        <table cellpadding="0" cellspacing="0" id="ashoptb">
                            <tr>
                                <td> 序号 </td>
                                <td>商品编码</td>
                                <td>商品名称</td>
                                <td>品牌</td>
                                <td>单位</td>
                                <td>适用车型</td>
                                <td>销售价格</td>
                                <td>操作</td>
                            </tr>
							<?php 
                                  $i=0;
                                  foreach($shop as $row){
                                     if($i>6)break;
                                     echo "<tr id='sid".$i."' class='".$row["sid"]."'>";
                                     echo"<td>".($i+1)."</td>";
                                     echo"<td>SP00".$row["sid"]."</td>";
                                     echo"<td>".$row["sname"]."</td>";
                                     echo"<td>".$row["spp"]."</td>";
                                     echo"<td>".$row["sdw"]."</td>";
                                     echo"<td>".$row["scar"]."</td>";
									 echo"<td>".$row["sdj"]."</td>";
                                     echo"<td><button class='toolbt' onclick='acshop(\"ashoptb\",".($i+1).",".$row["sid"].")'>选择</button></td>";
                                     echo"</tr>";
                                     $i++;
                                   }
							?>                             
                      
                            <tr>
                            	<td colspan="14"><input type="button" value="添加" class="botton" onClick="add('addsp')"></td>
                            </tr>
                        </table>
                      </div>
                </div>
                <div class="boxbt"></div>
           </div>
           
          </div>
           </div>  <!--开单信息层div 的底部结束标签-->
		
		</div>          	
            </div>	
	</body>
</html>
<!--
310 商品添加表

-->