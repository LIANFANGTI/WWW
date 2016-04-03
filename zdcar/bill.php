<!DOCTYPE html>
<!-- saved from url=(0033)http://repair5.66km.com/Sale/Bill -->
<?php 
	include("function.php");
	@session_start();
	if(!isset($_SESSION['username'])){echo"<script>window.location.href='login.php'</script> ";}
	else{$user=$_SESSION['username'];}
?>
<html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>自点科技-开单</title>
    <meta name="renderer" content="webkit">
    <meta charset="utf-8">
    
    <meta http-equiv="X-UA-Compatible" content="IE=8">
    <meta http-equiv="Expires" content="0">
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Cache-control" content="no-cache">
    <meta http-equiv="Cache" content="no-cache">
    <link href="http://repair5.66km.com/assets/css/base?v=nIiWSI4W9_Q0sqQp2xqEywEXlZPJMIZLHN4kn5VTSq01" rel="stylesheet">

    
    
    
<link rel="stylesheet" href="http://repair5.66km.com/assets/js/layer/skin/layer.css" id="layui_layer_skinlayercss"><link rel="stylesheet" href="http://repair5.66km.com/assets/js/layer/skin/layer.ext.css" id="layui_layer_skinlayerextcss"><link href="../../zdcar/css/WdatePicker.css" rel="stylesheet" type="text/css"></head>
<body style="zoom: 1;">
    <div>
            


<div class="e-auto" id="new-bill-app">
    <div class="e-page-title clearfix margin-0 e-hei">
        <h2>开单</h2>
        <a href="#" onclick="refresh()" class="e-btn page-title-tag active">开单</a>
        <div class="e-box-toolbar">
            <button href="#" id="bill-save" class="btn white-btn" cmd="save" disabled="">保存</button>
             
            <button href="#" id="bill-checkout" drmission-style="hide" class="btn white-btn hide " cmd="checkout" disabled="">完工</button>
          
            <button href="#" id="bill-account" data-permission-list="A013" data-permission-style="hide" class="btn white-btn hide" cmd="account" disabled="">结算</button>
            
            <button href="#" id="print-bill" class="btn white-btn" cmd="print" arg="bill" disabled="">打印</button>
            
        </div>
    </div>
    <div class="e-mainfun-content">
        <!--用来给下面的三层创建一个容器，主要是一个定位的坐标作用。-->
        <div class="h-100per e-mainfun-holder">
            <!--为了给右侧腾出空添加这一层，css3下box-sizing可以省掉这层-->
            <div class="e-pos-r h-100per">
                <!--为了给下级传递一个可用的高度添加这一层 css3的flex可以解决这个问题-->
                <div class="e-box e-mainfun w-100per h-100per margin-0 e-ph" style="">

                    <div class="e-box-title e-pos-r" id="customer-title">
                <div class="custom-info custom-info-select">
                    <span class="title-link"><a href="#" cmd="open-dialog" arg="customerSelector" onClick="customer-selector-dialog.style.dispaly='block';alert(1)">选择客户</a></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="title-link"><a href="#" cmd="open-dialog" arg="CustomerCarAdd">创建客户</a></span>
                   
                </div>

                <a class="custom-icon">
                    <img src="../../zdcar/img/choose.png" id="custom-icon" class="custom-icon-img">
                </a>
                        </div>
                    <div class="e-box-content  e-xh-main e-auto">
                        <form class="clearfix e-form e-flat-form" id="customer-info-form">
                    <div class="form-group clearfix">
                        <div class="form-item form-item-plus">
                            <span class="form-item-name ">最新里程</span>
                            <span class="form-item-prefix">：</span>
                            <input name="CurrentMileage" class="form-item-input required number" type="text" placeholder="请输入最新里程" value="">
                        
                        </div>
                        <div class="form-item">
                            <span class="form-item-name">上次里程</span>
                            <span class="form-item-prefix">：</span>
                            <input class="form-item-input " type="text" disabled="" value="">
                        </div>
                        <div class="form-item">
                            <span class="form-item-name">历史消费</span>
                            <span class="form-item-prefix">：</span>
                            <a class="form-item-input btn" href="http://repair5.66km.com/Sale/Bill#" onclick="" cmd="customerHistory" style=" line-height: 27px;">
&nbsp;
                            </a>
                        </div>
                                </div>
                                 <div class="form-group clearfix">
                                <div class="form-item">
                            <span class="form-item-name">接待人员</span>
                            <span class="form-item-prefix">：</span>
                            <select class="e-border-all " name="PickName">
                                <option value="">请选择</option>
                                <?php ?>
                            <option value="练慌鸡">练慌鸡</option></select>
                        </div>
                                 <div class="form-item">
                            <span class="form-item-name">车型</span>
                            <span class="form-item-prefix">：</span>
                            <input id="" class="form-item-input disabled" type="text" readonly value="">
                        </div>
                                 <div class="form-item">
                            <span class="form-item-name">历史单数</span>
                            <span class="form-item-prefix">：</span>
                            <a class="form-item-input btn" href="http://repair5.66km.com/Sale/Bill#" onclick="" cmd="customerHistory" style=" line-height: 27px;">
&nbsp;
                            </a>
                        </div>
                                </div>
                                <div class="form-group clearfix">
                          <div class="form-item">
                            <span class="form-item-name">业务类型</span>
                            <span class="form-item-prefix">：</span>
                            <select class="e-border-all form-item-input" name="BizTag">
                                <option value="">请选择</option>
                            </select>
                                </div>
                                 <div class="form-item">
                            <span class="form-item-name ">车身颜色</span>
                            <span class="form-item-prefix">：</span>
                            <input name="Color" class="form-item-input disabled" type="text" readonly value="">
                        </div>
                                <div class="form-item ">
                            <span class="form-item-name">历史欠款</span>
                            <span class="form-item-prefix">：</span>
                            <a class="form-item-input btn" href="http://repair5.66km.com/Sale/Bill#" onclick="" cmd="customerHistory" style="line-height: 27px;">
&nbsp;
                            </a>
                        </div>
                        </div>
                    
                    <div class="form-group clearfix">
                                 <div class="form-item form-item-plus">
                            <span class="form-item-name ">送修人</span>
                            <span class="form-item-prefix">：</span>
                            <input name="DriverName" class="form-item-input" type="text" value="">
                        </div>
                    </div>
                            </form>
                        <div class="e-border-bottom e-border-top padding-5">
                            <button href="#" id="open-commentdialog" class="btn white-btn" cmd="open-commentdialog" arg="openDiagnosis">故障描述</button>
                            <button href="#" id="open-commentdialog" class="btn white-btn" cmd="open-commentdialog" arg="openRepairAdvise">维修建议</button>
                            <button href="#" id="open-commentdialog" class="btn white-btn" cmd="open-commentdialog" arg="openComment">备注</button>
                        </div>
                        <form id="comment-form" class="clearfix e-form e-flat-form padding-10 e-border-bottom">
                            <div id="openDiagnosis" class="form-group clearfix hide">
                                <div class="form-item form-item-3xl">
                                    <span class="form-item-name">故障描述</span>
                                    <span class="form-item-prefix">：</span>
                                    <input id="txtFaultDescription" name="FaultDescription" class="form-item-input" type="text">
                                </div>
                            </div>
                            <div class="form-group clearfix">
                                <div id="openRepairAdvise" class="form-item form-item-3xl hide">
                                    <span class="form-item-name">维修建议</span>
                                    <span class="form-item-prefix">：</span>
                                    <input id="txtRepairDescription" name="RepairDescription" class="form-item-input" type="text">
                                </div>
                            </div>
                            <div class="form-group clearfix">
                                <div id="openComment" class="form-item form-item-3xl hide">
                                    <span class="form-item-name">备注</span>
                                    <span class="form-item-prefix">：</span>
                                    <input id="txtComment" name="Comment" class="form-item-input" type="text">
                                </div>
                            </div>
                        </form>
                        <script type="text/x-handlebars-template" id="vin-info-tpl">
            <ul style="font-size: 14px">
            <li><span style="width: 80px">厂家: </span> {{厂家}}</li>
            <li><span style="width: 80px">品牌: </span> {{品牌}}</li>
            <li><span style="width: 80px">车型: </span> {{车型}}</li>
            <li><span style="width: 80px">销售名称:</span>  {{销售名称}}</li>
            <li><span style="width: 80px">指导价格:</span>  {{指导价格}}</li>
            <li><span style="width: 80px">上市年份:</span>  {{上市年份}}</li>
            <li><span style="width: 80px">燃油标号:</span>  {{燃油标号}}</li>
            <li><span style="width: 80px">发动机描述:</span>  {{发动机描述}}</li>
            <li><span style="width: 80px">变速器描述:</span>  {{变速器描述}}</li>
            <li><span style="width: 80px">前轮胎规格:</span>  {{前轮胎规格}}</li>
            <li><span style="width: 80px">后轮胎规格:</span>  {{后轮胎规格}}</li></ul>
                        </script>
                        <script type="text/x-handlebars-template" id="car-care-tpl">
            <table class="e-table etal-l" id="car-care-content">
                              <thead>
                                     <tr class="e-stripe-even">
                                                    <th>建议说明</th>
                                                    <th>保养类型 </th>
                                                    <th>保养间隔 </th>
                                                    <th>保养项目名称 </th>
                                                </tr>
                                            </thead>
                <tbody style="font-size: 14px">
                {{#each this}}
                    <tr><td>{{建议说明}}</td><td style="width: 130px">{{保养类型}}</td><td>{{保养间隔}}</td><td>{{保养项目名称}}</td></tr>
                    {{else}}
                    <tr><td>未获取到该车型的保养建议，数据完善中。</td></tr>
                {{/each}}
                </tbody>
            </table>
                        </script>


                        <div class="e-box-title">
                            <h3>维修项目</h3>
                            <div class="e-box-toolbar">
                                <a href="http://repair5.66km.com/Sale/Bill#" id="choose_project" class="btn green-btn" cmd="open-dialog" arg="itemSelector">选择</a>
                                 <a href="http://repair5.66km.com/Sale/Bill#" id="add_project" class="btn green-btn" cmd="open-dialog" arg="itemEditor">新建</a>
                            </div>
                        </div>
                        <div id="item-bill-form" class="e-box-content collapse in" style="*zoom: 1;" onsubmit="return false">
                            <table class="e-table" id="item-bill-detail-table">
                                <thead>
                                    <tr class="e-stripe-even">
                                        <th>序号 </th>
                                        <th>项目编码 </th>
                                        <th>项目名称 </th>
                                        <th>单价 </th>
                                        <th>工时 </th>
                                        <th data-permission-list="A011" data-permission-style="hide">优惠 </th>
                                        <th>金额 </th>
                                        <th>开始时间</th>
                                        <th>完工时间</th>
                                        <th>施工人员</th>
                                        <th>项目分类 </th>
                                        <th>项目备注 </th>
                                        <th>操作 </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td colspan="11">请点击选择或新建按钮添加维修项目…</td>
                                    </tr>
                                </tbody>
                            </table>
                            <script type="text/x-handlebars-template" id="item-bill-detail-tpl">
               
                <td> {{No}} </td>
                <td> {{ItemCode}} </td>
                <td>
                   
                    {{ItemName}}
                </td>
                <td>
                    <form onsubmit="return false"> <input name="SalePrice" type="text" value="{{number SalePrice 2}}" style="width: 80px"
                        class="form-item-input e-tal-r required number" /></form>
                </td>
                                
                <td>
                   <form onsubmit="return false"> <input name="SaleQty" type="text" value="{{number SaleQty 2}}" style="width: 50px"
                        class="form-item-input e-tal-r required number" /></form>
                </td>
                                {{#rights "A011"}}                           
                 <td class="e-pos-r">
                 <input name="DiscountPrice" type="text" value="{{number DiscountPrice 2}}" 
                        class="form-item-input e-tal-r  number" />
                </td>
                                {{/rights}}     
                <td class="e-tal-r">
                               <span  field="sum">  {{number sum 2}}</span>
                                {{#if IsCard}}
                               <span class="icons-12 icons-12-vip green margin-r5" ></span>
                                {{/if}}
                   
                </td>
                                  <td class="e-form">
                    <input name="StartTime" type="text" value="{{date StartTime 'yyyy-MM-dd HH:mm'}}" class="form-item-input form-item-date" style="width: 95px;height:20px" onclick="WdatePicker({dateFmt:'yyyy-MM-dd HH:mm'})">
                </td>
                <td class="e-form">
                    <input name="EndTime" type="text" value="{{date EndTime 'yyyy-MM-dd HH:mm'}}" class="form-item-input form-item-date" style="width: 95px;height:20px" onclick="WdatePicker({dateFmt:'yyyy-MM-dd HH:mm'})">
                </td>
                <td>
                  
                <input  name="WorkerName" style="width: 100px" cmd="addworker" value=""  placeholder="选择施工人员"/>
                </td>
                <td>
                   
                                 {{ItemTag}}
                </td>
                  <td>    <input name="Comment" type="text" value="{{Comment}}" 
                        class="form-item-input e-tal-r " /> </td>
                <td>
                    <ul class="e-list-tool">
                        <li class="tool-li">
                            <a href="#" class="tool-item btn green-btn mini" cmd="delete"><span class="e-tag-name user-edit">删除</span></a>
                        </li>
                    </ul>
                </td>
                
                            </script>
                        </div>

                        <div class="e-box-title e-border-top">
                            <h3>商品明细</h3>
                            <div class="e-box-toolbar">
                                <a href="http://repair5.66km.com/Sale/Bill#" id="choose_part" class="btn green-btn" cmd="open-dialog" arg="partSelector">选择</a>
                                 <a href="http://repair5.66km.com/Sale/Bill#" id="add_part" class="btn green-btn" cmd="open-dialog" arg="goodsEditor">新建</a>
                            </div>
                        </div>
                        <div class="e-box-content e-border-bottom" style="*zoom: 1;" id="part-bill-form">
                            <table class="e-table" id="part-bill-detail-table">
                                <thead>
                                    <tr class="e-stripe-even">
                                        <th>序号 </th>
                                        <th>商品编码 </th>
                                        <th>商品名称 </th>
                                        <th>品牌 </th>
                                        <th>规格 </th>
                                        <th>适用车型 </th>
                                        <th>单位 </th>
                                        <th style="width: 100px">销售单价 </th>
                                        <th style="width: 100px">数量 </th>
                                        <th data-permission-list="A011" data-permission-style="hide">优惠 </th>
                                        <th>金额 </th>
                                        <th>领料人员 </th>
                                        <th>商品备注 </th>
                                        <th>操作 </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td colspan="14">请点击选择或新建按钮添加商品…</td>
                                    </tr>
                                </tbody>
                            </table>
                            <script type="text/x-handlebars-template" id="part-bill-detail-tpl">
                <td> {{No}} </td>
                <td> {{GoodsCode}} </td>
                <td> {{GoodsName}} </td>
                <td> {{Brand}} </td>
                <td> {{Spec}} </td>
                <td> {{MatchCarModel}} </td>
                <td> {{Unit}} </td>
                <td>  <form onsubmit="return false"><input name="SalePrice" type="text" class="e-tal-r required number" style="width: 80px" value="{{number SalePrice 2}}" /></form> </td>
                <td>  <form onsubmit="return false"><input name="SaleQty" type="text" class="e-tal-r required number" style="width: 50px" value="{{number SaleQty 2}}" /> </form></td>
                                {{#rights "A011"}}         
                                <td  class="e-pos-r">
                 <input name="DiscountPrice" type="text" value="{{number DiscountPrice 2}}" 
                        class="form-item-input e-tal-r  number" />
                </td>
                                {{/rights}}     
                <td  class="e-tal-r">
                                <span field="sum">{{number sum 2}}</span>
                                 {{#if IsCard}}
                                <span class="icons-12 icons-12-vip green margin-r5"></span>
                                {{/if}}</td>
                                 <td>
                 <select name="TakeID" style="width: 100px">
                        <option selected="selected" value="">请选择</option>
                    </select>
                </td>
                                  <td>    <input name="Comment" type="text" value="{{Comment}}" 
                        class="form-item-input e-tal-r " /> </td>
                <td>
                    <ul class="e-list-tool">
                        <li class="tool-li">
                            <a href="#" class="tool-item btn green-btn mini" cmd="delete"><span class="e-tag-name user-edit">删除</span></a>
                        </li>
                    </ul>
                </td>
                            </script>
                        </div>
                    </div>
                    <div class="e-border-top padding-10 " style="">
                        总计消费 ：<span id="TotalAmount" class="txt-darkorange"></span> 元
                    </div>
                </div>
            </div>
         
       
        </div>
    </div>
</div>



    </div>

    
    <div id="customer-selector-dialog" class="e-pop-withtab" style="display:none">
    <ul class="e-nav-tab popout-tab clearfix">
        <li class="active">
            <a href="http://repair5.66km.com/Sale/Bill#tab1">选择客户</a>
        </li>
        <li class="">
            <a href="http://repair5.66km.com/Sale/Bill#tab2" cmd="create">新建客户</a>
        </li>
    </ul>
    <div class="e-tab-content">
        <div id="tab1" class="tab-pane active">
            <div class="e-box">
                <div class="box-content">

                    <div class="clearfix e-form e-flat-form">
                        <div class="form-group clearfix">
                            <div class="form-item form-item-2xl">
                                <span class="form-item-prefix">：</span>
                                <input target="" type="text" id="txtItemSearch" class="margin-r10 form-item-input fl-l" placeholder="请输入客户名称、车牌、手机号等搜索..." autofocus>
                                <span class="form-item-name fl-r padding-0 btn green-btn margin-0 e-tal-c">搜索</span>
                            </div>

                        </div>
                    </div>
                    <div class="e-auto e-border-top" style="height: 354px;" id="item-list">
                        <script type="text/x-handlebars-template" id="item-tpl">
                            <table class="e-table e-border-bottom">
                                <thead>
                                    <tr class="e-stripe-even">
                                        <th> 客户名称 </th>
                                        <th> 车牌号 </th>
                                        <th> 车型 </th>
                                        <th> 手机 </th>
                                        <th> 操作 </th>
                                    </tr>
                                </thead>
							
                                <tbody>
                                   	 {{#each Items}}
								<?php 
									conmusql();
									$sql=mysql_query("select name,carid,cartype,phone from kehu");
									
									while($row=mysql_fetch_array($sql)){
										echo $row["name"];
									}
								?>
                                    <tr>:
                                        <td> {{CustomerName}} </td>
                                        <td> {{PlateNumber}}</td>
                                        <td> {{CarModel}} </td>
                                        <td> {{MobilePhone}} </td>
                                        <td>
                                            <ul class="e-list-tool">
                                                <li class="tool-li">
                                                    <button class="btn green-btn" cmd="select"  argcar="{{CarID}}" arg="{{ID}}">选择</button>
                                                </li>
                                            </ul>
                                        </td>
                                    </tr> -->
                                    {{else}}
                                    <tr><td colspan="5">没有数据</td></tr>
                                    {{/each}}
                                </tbody>
                            </table>
                        </script>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="item-selector-dialog" class="e-pop-withtab" style="display:none">
    <ul class=" e-nav-tab popout-tab clearfix">
        <li class="active">
            <a href="http://repair5.66km.com/Sale/Bill#tab1">选择维修项目</a>
        </li>
        <li class="">
            <a href="http://repair5.66km.com/Sale/Bill#tab2" cmd="create">新建维修项目</a>
        </li>
    </ul>
    <div class="e-tab-content">
        <div id="tab1" class="tab-pane active">
            <div class="e-box">
                <div class="box-content">

                    <div class="clearfix e-form e-flat-form">
                        <div class="form-group clearfix">
                            <div class="form-item form-item-2xl">
                                <span class="form-item-prefix">：</span>
                                <input target="" type="text" id="txtItemSearch" class="margin-r10 form-item-input fl-l" placeholder="请输入项目名称或编码或分类搜索..." autofocus>
                                <span class="form-item-name fl-r padding-0 btn green-btn margin-0 e-tal-c">搜索</span>
                            </div>

                        </div>
                    </div>
                    <div class="e-auto e-border-top" style="height: 354px;" id="item-list">
                        <script type="text/x-handlebars-template" id="item-tpl">
                            <table class="e-table e-border-bottom">
                                <thead>
                                    <tr class="e-stripe-even">
                                        <th> 项目编码 </th>
                                        <th> 项目名称 </th>
                                        <th> 工时 </th>
                                        <th> 单价 </th>
                                        <th>项目分类</th>
                                        <th> 操作 </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {{#each Items}}
                                    <tr>
                                        <td> {{ItemCode}} </td>
                                        <td> {{ItemName}}</td>
                                        <td> {{WorkHours}} </td>
                                        <td> {{number UnitPrice 2}} </td>
                                        <td>{{CategoryName}}</td>
                                        <td>
                                            <ul class="e-list-tool">
                                                <li class="tool-li">
                                                    <button class="btn green-btn" cmd="select" arg="{{ID}}">选择</button>
                                                </li>
                                            </ul>
                                        </td>
                                    </tr>
                                    {{else}}
                                    <tr><td colspan="5">没有数据</td></tr>
                                    {{/each}}
                                </tbody>
                            </table>
                        </script>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    <div id="part-selector-dialog" class="e-pop-withtab" style="display:none">
    <ul class=" e-nav-tab popout-tab clearfix">
        <li class="active">
            <a>选择商品</a>
        </li>
         <li class="">
            <a href="http://repair5.66km.com/Sale/Bill#" cmd="create">新建商品</a>
        </li>
    </ul>
    <div class="e-tab-content">
        <div id="tab1" class="tab-pane active">
            <div class="e-box">
                <div class="box-content">

                    <div class="clearfix e-form e-flat-form">
                        <div class="form-group clearfix">
                            <div class="form-item form-item-2xl">
                                <span class="form-item-prefix">：</span>
                                <input target="" type="text" id="txtItemSearch" class="margin-r10 form-item-input fl-l" placeholder="请输入商品名称或编码或适用车型搜索..." autofocus>
                                <span class="form-item-name fl-r padding-0 btn green-btn margin-0 e-tal-c">搜索</span>
                            </div>

                        </div>
                    </div>
                    <div class="e-auto e-border-top" style="height: 493px;" id="item-list">
                        <script type="text/x-handlebars-template" id="item-tpl">
                            <table class="e-table e-border-bottom">
                                <thead>
                                    <tr class="e-stripe-even">
                                        <th> 商品编码 </th>
                                        <th> 商品名称 </th>
                                        <th> 品牌 </th>
                                        <th> 规格 </th>
                                        <th> 适用车型 </th>
                                        <th> 单位 </th>
                                        <th> 销售价 </th>
                                        <th> 库存 </th>
                                        <th> 操作 </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {{#each this.Items}}
                                    <tr>
                                        <td> {{GoodsCode}} </td>
                                        <td> {{GoodsName}}</td>
                                        <td> {{Brand}} </td>
                                        <td> {{Spec}} </td>
                                        <td> {{MatchCarModel}} </td>
                                        <td> {{Unit}} </td>
                                        <td> {{number SalePrice 2}} </td>
                                        <td> {{Qty}} </td>
                                        <td>
                                            <ul class="e-list-tool">
                                                <li class="tool-li">
                                                    <button class="btn green-btn" cmd="select" arg="{{ID}}">选择</button>
                                                </li>
                                            </ul>
                                        </td>
                                    </tr>
                                    {{else}}
                                    <tr><td colspan="8">没有数据</td></tr>
                                    {{/each}}
                                </tbody>
                            </table>
                        </script>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
         <!--添加客户和车 开始-->
            
            <!--添加客户和车 结束-->
            <!--结算-->
            <div id="checkout-dialog" style="display:none">
        <div class="e-box e-check-ulholder padding-10">
                  <form id="checkout-form">
                          <div class="e-box-title">
                <h4><span class="icons-12 icons-12-right gray margin-r5"></span>基本信息</h4>
            </div>
            <div class="clearfix e-form e-flat-form">
                <div class="form-group clearfix">
                    <div class="form-item mandatory ">
                        <span class="form-item-name">车牌号</span> <span class="form-item-prefix">：</span>
                        <input type="text" id="txtPlateNumber" name="PlateNumber" class="form-item-input " disabled="" maxlength="50">
                    </div>
                    <div class="form-item  form-item-plus mandatory">
                        <span class="form-item-name">客户名称</span> <span class="form-item-prefix">：</span>
                        <input type="text" id="txtCustomerName" name="CustomerName" disabled="" class="form-item-input " maxlength="100">
                    </div>
                </div>
                 <div class="form-group clearfix">
                     <div class="form-item mandatory">
                        <span class="form-item-name">收银人员</span>
                        <span class="form-item-prefix">：</span>
                        <select class="e-border-all required" name="PayeeName">
                        <option value="练慌鸡">练慌鸡</option></select>
                        <span class="form-item-mark">*</span>
                    </div>
                    <div class="form-item form-item-2xl mandatory">
                        <span class="form-item-name">结算日期</span> <span class="form-item-prefix">：</span>
                        <input type="text" id="txtPayTime" name="PayTime" onclick="WdatePicker({ dateFmt: &#39;yyyy-MM-dd HH:mm:ss&#39; })" class="form-item-input form-item-date" maxlength="20">
                        <span class="form-item-mark">*</span>
                    </div>
                </div>
                   
            </div>
          
            <div class="e-box-title">
                <h4><span class="icons-12 icons-12-right gray margin-r5"></span>金额信息</h4>
            </div>
            <div class="clearfix e-form e-flat-form">
                <div class="form-group clearfix">
                    <div class="form-item">
                        <span id="SCheckoutMoney" class="form-item-name">应收金额</span> <span class="form-item-prefix">：</span>
                        <input type="text" id="txtCheckoutMoney" disabled="" name="CheckoutMoney" class="form-item-input" maxlength="50">
                    </div>
                      <div class="form-item mandatory ">
                        <span id="SRecvedMoney" class="form-item-name">已收金额</span> <span class="form-item-prefix">：</span>
                        <input type="text" id="txtRecvedMoney" disabled="" name="RecvedMoney" class="form-item-input " maxlength="50">
                    </div>
                    <div class="form-item  form-item-plus mandatory">
                        <span class="form-item-name">尚欠金额</span> <span class="form-item-prefix">：</span>
                        <input type="text" id="txtRemainderMoney" disabled="" name="RemainderMoney" class="form-item-input " maxlength="100">

                    </div>
                </div>
            </div>
         <div class="e-box-title">
                    <h4><span class="icons-12 icons-12-right gray margin-r5"></span><span id="Stitle">收款信息</span> </h4>
                </div>
            <div class="clearfix e-form e-flat-form">
                 <div id="card" class="form-group clearfix">
                       
                       <div class="form-item ">
                        <span class="form-item-name">储值扣款</span> <span class="form-item-prefix">：</span>
                        <input type="text" id="txtCardMoney" name="CardMoney" class="form-item-input ">
                    </div>
                          <div class="form-item ">
                        <span class="form-item-name">卡内余额</span> <span class="form-item-prefix">：</span>
                        <input type="text" id="txtCardBalance" name="CardBalance" disabled="" class="form-item-input " maxlength="50">
                    </div>
                           <div class="form-item mandatory ">
                            <span class="form-item-name">扣款后余额</span> <span class="form-item-prefix">：</span>
                            <input type="text" id="txtCardAmount" disabled="" name="CardAmount" class="form-item-input ">
                        </div>
                    </div>
                <div class="form-group clearfix">
                    <div class="form-item ">
                        <span class="form-item-name" id="SPayMoney">本次收款</span> <span class="form-item-prefix">：</span>
                        <input type="text" id="txtPayMoney" name="PayMoney" class="form-item-input ">
                    </div>
                    <div class="form-item mandatory">
                        <span class="form-item-name">结算方式</span>
                        <span class="form-item-prefix">：</span>
                        <select class="e-border-all " name="PayMethod">
                            <option value="">请选择</option>
                        </select>
                    </div>
                   <div class="form-item mandatory">
                    <input type="checkbox" id="forceFlag"><span>是否进行强制结算</span>
                    </div>
                </div>
            </div>
           
           </form>
        </div>
</div>

            <!--结算-->
            <!--会员信息-->
            <div id="card-dialog" class="e-box e-subfun h-100per margin-0" style="display:none">

   
    <div class="e-box-content e-xh-main e-auto">
        <div class="e-box e-check-ulholder padding-10">
                  <form id="card-form">
            <div class="e-box-title">
                <h4><span class="icons-12 icons-12-right gray margin-r5"></span>会员信息</h4>
            </div>
            <div class="clearfix e-form e-flat-form">
                  <div class="form-group clearfix">
                   <div class="form-item mandatory ">
                        <span class="form-item-name">车牌号</span> <span class="form-item-prefix">：</span>
                        <input type="text" id="txtPlateNumber" name="PlateNumber" class="form-item-input " disabled="" maxlength="50">
                    </div>
                    <div class="form-item  form-item-plus mandatory">
                        <span class="form-item-name">客户名称</span> <span class="form-item-prefix">：</span>
                        <input type="text" id="txtCustomerName" name="CustomerName" disabled="" class="form-item-input " maxlength="100">
                    </div>
                </div>
                <div class="form-group clearfix">
                    <div class="form-item">
                        <span class="form-item-name">会员卡号</span> <span class="form-item-prefix">：</span>
                        <input type="text" id="txtCardCode" name="CardCode" class="form-item-input">
                    </div>
                </div>
            </div>
            <div id="membercarddetail">
                <div class="e-box-title">
                    <h4><span class="icons-12 icons-12-right gray margin-r5"></span>计次卡</h4>
                </div>
                <div id="card-membercarddetail">
                    <div class="clearfix e-form e-flat-form  padding-10-0">
                        <script type="text/x-handlebars-template" id="membercarddetail-query-tpl">
                            <div class="e-box">
                                <table class="e-table">
                                    <thead>
                                        <tr class="e-stripe-even">
                                            <th>套餐名称 </th>
                                            <th>编码 </th>
                                            <th>套餐项内容 </th>
                                            <th>剩余（含本次） </th>
                                            <th>操作</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        {{#each cardItems }}
                    <tr>
                        <td>{{PackName}} </td>
                        <td>{{Code}} </td>
                        <td>{{Name}} </td>
                        <td>{{AmountQty}} </td>
                        <td>
                             <ul class="e-list-tool">
                                <li class="tool-li">
                                    <a href="#"  arg-id="{{ID}}" class="tool-item btn green-btn mini" id="card-use" cmd="card-use">使用</a>
                                </li>
                             </ul>
                         </td>
                    </tr>
                                          {{else}}
                    <tr><td colspan="5"> 暂无数据 </td></tr>
                    {{/each}}
                                    </tbody>
                                </table>
                            </div>
                        </script>
                    </div>
                </div>
               
                <div class="e-box-title">
                    <h4><span class="icons-12 icons-12-right gray margin-r5"></span>储值卡</h4>
                </div>
                <div id="card-membercashdetail" class="clearfix e-form e-flat-form  padding-10-0">
                        <script type="text/x-handlebars-template" id="membercashItems-query-tpl">
                            <div class="e-box">
                                <table class="e-table">
                                    <thead>
                                        <tr class="e-stripe-even">
                                            
                                            <th>套餐项内容 </th>
                                            <th>剩余</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                              {{#if cardinfo.BookMoney}}  
                    <tr>
                        
                        <td>储值</td>
                        <td>{{cardinfo.BookMoney}} </td>
                    </tr>
                            {{else}}            
                    <tr><td colspan="3"> 暂无数据 </td></tr>
                            {{/if}}
                                    </tbody>
                                </table>
                            </div>
                        </script>
                    </div>
            </div>
           </form>
        </div>
    </div>
</div>

            <!--会员信息-->
            <!--提交-->
                <form id="submit-dialog" class="e-auto" style="display: none">
                    <div class="clearfix e-form e-flat-form">
                        <div class="form-group clearfix">
                            <div class="form-item mandatory" style="width:310px;">
                                <span class="form-item-name">完工日期</span> <span class="form-item-prefix">：</span>
                                <input type="text" id="txtFinishedTime" name="FinishedTime" contenteditable="false" class="form-item-input form-item-date required" style="width:170px;" onclick="WdatePicker({ dateFmt: &#39;yyyy-MM-dd HH:mm&#39; })">
                                <span class="form-item-mark">*</span>
                            </div>
                        </div>
                    </div>
            </form>
            <!--提交-->
            
    <div id="Itemlist-edit-dialog" class="e-auto" style="display:none">
        <form id="Itemlist-edit-form" class="e-box-content">
            <div class="clearfix e-form e-flat-form">
                <div class="form-group clearfix">
                    <div class="form-item mandatory">
                        <span class="form-item-name">项目编码</span> <span class="form-item-prefix">：</span>
                        <input type="text" id="txtItemCode" name="ItemCode" class="form-item-input required" maxlength="50">
                        <span class="form-item-mark">*</span>
                    </div>
                    <div class="form-item form-item-plus mandatory">
                        <span class="form-item-name">项目名称</span> <span class="form-item-prefix">：</span>
                        <input type="text" id="txtItemName" name="ItemName" class="form-item-input required" maxlength="100">
                        <span class="form-item-mark">*</span>
                    </div>
                </div>
                <div class="form-group clearfix">
                    <div class="form-item mandatory">
                        <span class="form-item-name">项目类型</span> <span class="form-item-prefix">：</span>
                        <select id="ddlCategory" class="e-border-all required" name="CategoryName">
                            <option value="">请选择</option>
                        <option value="维修">维修</option><option value="美容">美容</option><option value="洗车">洗车</option></select>
                        <span class="form-item-mark">*</span>
                    </div>
                </div>
                <div class="form-group clearfix">
                    <div class="form-item mandatory">
                        <span class="form-item-name">工时</span> <span class="form-item-prefix">：</span>
                        <input type="text" id="txtWorkHours" name="WorkHours" class="form-item-input required number" maxlength="50">
                        <span class="form-item-mark">*</span>
                    </div>
                    <div class="form-item form-item-plus mandatory">
                        <span class="form-item-name">单价</span> <span class="form-item-prefix">：</span>
                        <input type="text" id="txtUnitPrice" name="UnitPrice" class="form-item-input required number" maxlength="100">
                        <span class="form-item-mark">*</span>
                    </div>
                </div>

            </div>

        </form>
    </div>
              <form id="goodslist-edit-dialog" style="display:none">
                    <div class="e-box e-check-ulholder padding-10">
                        <!--
                        <div class="e-box-title">
                            <h4><span class="icons-12 icons-12-right gray margin-r5"></span>必填</h4>
                        </div>
                            -->
                        <div class="clearfix e-form e-flat-form">
                            <div class="form-group clearfix">
                                <div class="form-item mandatory ">
                                    <span class="form-item-name">商品编码</span> <span class="form-item-prefix">：</span>
                                    <input type="text" id="txtGoodsCode" name="GoodsCode" class="form-item-input required">
                                    <span class="form-item-mark">*</span>
                                </div>
                                <div class="form-item mandatory ">
                                    <span class="form-item-name">商品名称</span> <span class="form-item-prefix">：</span>
                                    <input type="text" id="txtGoodsName" name="GoodsName" class="form-item-input required" maxlength="100">
                                    <span class="form-item-mark">*</span>
                                </div>
                                <div class="form-item mandatory ">
                                    <span class="form-item-name">单位</span> <span class="form-item-prefix">：</span>
                                    <input type="text" id="txtUnit" name="Unit" class="form-item-input required" maxlength="100">
                                    <span class="form-item-mark">*</span>
                                </div>
                                <div class="form-item mandatory ">
                                    <span class="form-item-name">期初成本价</span> <span class="form-item-prefix">：</span>
                                    <input type="text" id="txtCostPrice" name="CostPrice" class="form-item-input number required">
                                    <span class="form-item-mark">*</span>
                                </div>
                            </div>
                              <div id="Storage" class="form-group clearfix">
                                  <div class="form-item mandatory ">
                                      <span class="form-item-name">期初库存</span> <span class="form-item-prefix">：</span>
                                      <input type="text" id="txtQuantity" name="Quantity" class="form-item-input number required">
                                      <span class="form-item-mark">*</span>
                                  </div>
                                  <div class="form-item mandatory ">
                                      <span class="form-item-name">仓库</span> <span class="form-item-prefix">：</span>
                                      <select id="txtStorageID" name="StorageID"><option value="42431d57-a636-4a29-8e0d-2c82258cd8af">默认仓库</option></select>
                                      <span class="form-item-mark">*</span>
                                  </div>
                            </div>
                        </div>
                        <!--
                        <div class="e-box-title">
                            <h4><span class="icons-12 icons-12-right gray margin-r5"></span>选填</h4>
                        </div>
                            -->
                        <div class="clearfix e-form e-flat-form">
                            <div class="form-group clearfix">
                                <div class="form-item">
                                    <span class="form-item-name">品牌</span> <span class="form-item-prefix">：</span>
                                    <input type="text" id="txtBrand" name="Brand" class="form-item-input" maxlength="50">
                                </div>
                                <div class="form-item">
                                    <span class="form-item-name">规格</span> <span class="form-item-prefix">：</span>
                                    <input type="text" id="txtSpec" name="Spec" class="form-item-input" maxlength="50">
                                </div>
                                <div class="form-item">
                                    <span class="form-item-name">适用车牌号</span> <span class="form-item-prefix">：</span>
                                    <input type="text" id="txtMatchPlateNumber" name="MatchPlateNumber" class="form-item-input" maxlength="50">
                                </div>
                                <div class="form-item">
                                    <span class="form-item-name">产地</span> <span class="form-item-prefix">：</span>
                                    <input type="text" id="txtOrigin" name="Origin" class="form-item-input" maxlength="20">
                                </div>
                            </div>
                             <div class="form-group clearfix">
                                  <div class="form-item ">
                                    <span class="form-item-name">销售单价</span> <span class="form-item-prefix">：</span>
                                    <input type="text" id="txtSalePrice" name="SalePrice" class="form-item-input number">
                                </div>
                                <div class="form-item ">
                                    <span class="form-item-name">安全库存</span> <span class="form-item-prefix">：</span>
                                    <input type="text" id="txtSafeQty" name="SafeQty" class="form-item-input number required" value="0">
                                </div>
                                 <div class="form-item">
                                     <span class="form-item-name">货位</span> <span class="form-item-prefix">：</span>
                                     <input type="text" id="txtLocation" name="Location" class="form-item-input" maxlength="20">
                                 </div>
                                <div class="form-item ">
                                    <span class="form-item-name">自定义分类</span> <span class="form-item-prefix">：</span>
                                    <input type="text" id="txtGcName" name="GcName" class="form-item-input ">
                                    <input type="hidden" id="txtCategoryID" name="CategoryID">
                                </div>
                            </div>
                              <div class="form-group clearfix">
                            </div>
                            <div class="form-group clearfix">
                                <div class="form-item form-item-2xl">
                                    <span class="form-item-name">适用车型</span> <span class="form-item-prefix">：</span>
                                    <input type="text" id="txtMatchCarModel" name="MatchCarModel" textmode="MultiLine" class="form-item-input" maxlength="200">
                                </div>
                                <div class="form-item form-item-2xl">
                                    <span class="form-item-name">OEM码</span> <span class="form-item-prefix">：</span>
                                    <input type="text" id="txtOEMCode" name="OEMCode" textmode="MultiLine" class="form-item-input" maxlength="200">
                                </div>
                            </div>
                            <div class="form-group clearfix">
                                <div class="form-item form-item-2xl">
                                    <span class="form-item-name">备注</span> <span class="form-item-prefix">：</span>
                                    <input type="text" id="txtComment" name="Comment" textmode="MultiLine" class="form-item-input" maxlength="200">
                                </div>
                            </div>
                        </div>
                    </div>
            </form>
              <div id="cus-car-dialog" style="display:none">
                    <div class="e-box e-check-ulholder padding-10">
                        <!--
                        <div class="e-box-title">
                            <h4><span class="icons-12 icons-12-right gray margin-r5"></span>客户</h4>
                        </div>
                    -->
                        <form id="Customer-edit-dialog">
                        <div class="clearfix e-form e-flat-form">
                            <div class="form-group clearfix">
                                <div class="form-item mandatory ">
                                    <span class="form-item-name">联系手机</span> <span class="form-item-prefix">：</span>
                                    <input type="text" id="txtMobilephone" name="Mobilephone" class="form-item-input required" maxlength="50">
                                    <span class="form-item-mark">*</span>
                                </div>
                                <div class="form-item  form-item-plus mandatory">
                                    <span class="form-item-name">客户名称</span> <span class="form-item-prefix">：</span>
                                    <input type="text" id="txtCustomerName" name="CustomerName" class="form-item-input required" maxlength="100">
                                     <span class="form-item-mark">*</span>
                                </div>
                                    <div class="form-item ">
                                        <span class="form-item-name">客户类型</span> <span class="form-item-prefix">：</span>
                                        <select id="txtCustomerTag" name="CustomerTag">
                                            <option value="">请选择</option>
                                        </select>
                                    </div>
                                <div class="form-item ">
                                    <span class="form-item-name">客户单位</span> <span class="form-item-prefix">：</span>
                                    <input type="text" id="txtWorkUnit" name="WorkUnit" class="form-item-input " maxlength="50">
                                </div>

                            </div>
                          <div class="form-group clearfix">
                                <div class="form-item form-item-plus">
                                    <span class="form-item-name">联系电话</span> <span class="form-item-prefix">：</span>
                                    <input type="text" id="txtTelePhone" name="TelePhone" class="form-item-input " maxlength="100">
                                </div>
                                <div class="form-item form-item-2xl">
                                    <span class="form-item-name">客户备注</span> <span class="form-item-prefix">：</span>
                                    <input type="text" id="txtComment" name="Comment" class="form-item-input " maxlength="200">
                                </div>
                            </div>
                        </div>
                        </form>
                        <form id="Car-edit-dialog">
                            <!--
                          <div class="e-box-title">
                            <h4><span class="icons-12 icons-12-right gray margin-r5"></span>车辆</h4>
                        </div>
                                -->
                          <div class="clearfix e-form e-flat-form">
                            <div class="form-group clearfix">
                                <div class="form-item mandatory">
                                    <span class="form-item-name">车牌号</span> <span class="form-item-prefix">：</span>
                                    <input type="text" id="txtPlateNumber" name="PlateNumber" class="form-item-input required" maxlength="100">
                                     <span class="form-item-mark">*</span>
                                </div>
                                <div class="form-item">
                                    <span class="form-item-name">车身颜色</span> <span class="form-item-prefix">：</span>
                                    <input type="text" id="txtColor" name="Color" class="form-item-input" maxlength="50">
                                </div>
                                <div class="form-item">
                                    <span class="form-item-name">最新里程</span> <span class="form-item-prefix">：</span>
                                    <input type="text" id="txtMilage" name="Milage" class="form-item-input number" maxlength="20">
                                </div>
                                <div class="form-item">
                                    <span class="form-item-name">购车时间</span> <span class="form-item-prefix">：</span>
                                    <input type="text" id="txtBuyDate" name="BuyDate" class="form-item-input" maxlength="20">
                                    <input type="hidden" id="txtNLevelID" name="NLevelID">
                                </div>

                            </div>
                              <div>
                                <div class="form-group clearfix">
                                <div class="form-item form-item">
                                    <span class="form-item-name">车架号VIN码</span> <span class="form-item-prefix">：</span>
                                    <input type="text" id="txtVIN" name="VIN" class="form-item-input" maxlength="50">
                                </div>
                                    <div class="form-item mandatory form-item">
                                        <span class="form-item-name">车型</span> <span class="form-item-prefix">：</span>
                                        <input type="text" id="txtCarModel" name="CarModel" class="form-item-input " maxlength="200">
                                    </div>

                                    <div class="form-item">
                                        <span class="form-item-name">发动机型号</span> <span class="form-item-prefix">：</span>
                                        <input type="text" id="txtEngineType" name="EngineType" class="form-item-input" maxlength="20">
                                    </div>
                                    <div class="form-item">
                                        <span class="form-item-name">发动机号</span> <span class="form-item-prefix">：</span>
                                        <input type="text" id="txtEngineCode" name="EngineCode" class="form-item-input" maxlength="20">
                                    </div>

                                    </div>
                            </div>
                              <div class="form-group clearfix">
                                  <div class="form-item">
                                      <span class="form-item-name">下次保养时间</span> <span class="form-item-prefix">：</span>
                                      <input type="text" id="txtNextCareDate" name="NextCareDate" class="form-item-input form-item-date" maxlength="20">
                                  </div>
                                  <div class="form-item">
                                      <span class="form-item-name">下次保养里程</span> <span class="form-item-prefix">：</span>
                                      <input type="text" id="txtNextCareMilage" name="NextCareMilage" class="form-item-input number" maxlength="20">
                                  </div>
                                  <div class="form-item">
                                      <span class="form-item-name">下次回访时间</span> <span class="form-item-prefix">：</span>
                                      <input type="text" id="txtNextReturnDate" name="NextReturnDate" class="form-item-input form-item-date" maxlength="20">
                                  </div>
                                  <div class="form-item">
                                      <span class="form-item-name">下次年审时间</span> <span class="form-item-prefix">：</span>
                                      <input type="text" id="txtNextAuditDate" name="NextAuditDate" class="form-item-input form-item-date" maxlength="50">
                                  </div>

                              </div>
                                  <div class="form-group clearfix">
                                      <div class="form-item">
                                          <span class="form-item-name">下次保险时间</span> <span class="form-item-prefix">：</span>
                                          <input type="text" id="txtInsuranceExpireDate" name="InsuranceExpireDate" class="form-item-input form-item-date" maxlength="20">
                                      </div>
                                      <div class="form-item">
                                          <span class="form-item-name">保险公司</span> <span class="form-item-prefix">：</span>
                                          <input type="text" id="txtInsuranceCompany" name="InsuranceCompany" class="form-item-input" maxlength="50">
                                      </div>

                                      <div class="form-item">
                                          <span class="form-item-name">保险备注</span> <span class="form-item-prefix">：</span>
                                          <input type="text" id="txtInsuranceDescription" name="InsuranceDescription" class="form-item-input" maxlength="200">
                                      </div>

                                      <div class="form-item form-item">
                                          <span class="form-item-name">车辆备注</span> <span class="form-item-prefix">：</span>
                                          <input type="text" id="txtComment" name="Comment" class="form-item-input " maxlength="200">
                                      </div>
                                  </div>
                              </div>
                        </form>
                    </div>
           </div>

            <div id="worker-add-dialog" style="display:none">
                <div class="e-box-content">
                    <ul class="e-check-ul clearfix">
                        <li class="e-check-li e-tag ">
                            <input type="checkbox" class="margin-r5" name="维修" id="001001"><label style="display: inline-block;" for="001001">维修</label></li>
                    </ul>
                </div>
            </div>
    <div id="car-care-dialog" class="e-auto" style="display: none">
        <div id="car-care-content"></div>
    </div>


    <script src="../../zdcar/base"></script>


    <script src="../../zdcar/javascript/layer.js"></script>
    <script src="../../zdcar/javascript/layer.ext.js"></script>
    <script type="text/javascript">
        //全局配置
        layer.config({
            extend: [
                'extend/layer.ext.js',
                'skin/layer.css'
            ]
            //,skin: 'layer-ext'
        });
    </script>

    <script type="text/javascript" src="../../zdcar/GetPermissions"></script>
    <script language="javascript" type="text/javascript">
        function OpenModel(OpenUrl, width, height) {
            if (window.showModalDialog === undefined) {
                window.showModalDialog = window.open;
            }
            window.showModalDialog(OpenUrl + "&date=" + Math.random(), window, "dialogWidth=" + width + "px;dialogHeight=" + height + "px;");
        }
    </script>
    <script type="text/javascript">
          $(document).ready(function () {
           
          });
	</script>
    
<script src="../../zdcar/javascript/LodopFuncs.js"></script>

<object id="LODOP_OB" classid="clsid:2105C259-1E0C-4534-8141-A753534CB4CA" width="0" height="0">
    <embed id="LODOP_EM" type="application/x-print-lodop" width="0" height="0" pluginspage="install_lodop.exe">
</object>
    <script src="../../zdcar/javascript/WdatePicker.js"></script>
    <script src="../../zdcar/javascript/CustomerCarAdd.js"></script>
    <script src="../../zdcar/javascript/SaleCheckout.js"></script>
    <script src="../../zdcar/javascript/BillEditor.js"></script>
    <script src="../../zdcar/javascript/GoodsEditor.js"></script>
    <script src="../../zdcar/javascript/ItemEditor.js"></script>
    <script type="text/javascript">

        $(function () {
           
            var v = new NewBillView('');
            v.setElement('#new-bill-app');
            v.render();
        });
        function refresh() {
            var id = window.top.$(".guidepost-con li.active a").attr('href');
            window.top.$.tabFrame.openTab('开单', "/sale/bill");
            window.top.$.tabFrame.closeTab(id);
        }
    </script>

    <div id="common-dialog" class="e-auto" style="display: none;">
        <div class="" id="common-dialog-txt" style="padding: 5px;">你确认删除吗？</div>
    </div>
    <script type="text/javascript">
        $('.nav-fixed-li .dropdown-toggle,.nav-fixed-li .dropdown-menu').hover(function () {
            $(this).parent('.nav-fixed-li').addClass("open")
        }, function () {
            $(this).parent('.nav-fixed-li').removeClass("open")
        });
	</script>


</body></html>