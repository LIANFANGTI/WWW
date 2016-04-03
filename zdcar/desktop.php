<!DOCTYPE html>
<!-- saved from url=(0036)http://repair5.66km.com/home/desktop -->
<?php 
	include("function.php");
	@session_start();
	if(!isset($_SESSION['username'])){echo"<script>window.location.href='login.php'</script> ";}
	else{$user=$_SESSION['username'];}
?>
<html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>自点科技</title>
    <meta name="renderer" content="webkit">
    <meta charset="utf-8">
    
    <meta http-equiv="X-UA-Compatible" content="IE=8">
    <meta http-equiv="Expires" content="0">
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Cache-control" content="no-cache">
    <meta http-equiv="Cache" content="no-cache">
    <link href="http://repair5.66km.com/assets/css/base?v=nIiWSI4W9_Q0sqQp2xqEywEXlZPJMIZLHN4kn5VTSq01" rel="stylesheet">

    
    
    
<link rel="stylesheet" href="http://repair5.66km.com/assets/js/layer/skin/layer.css" id="layui_layer_skinlayercss"><link rel="stylesheet" href="http://repair5.66km.com/assets/js/layer/skin/layer.ext.css" id="layui_layer_skinlayerextcss"></head>
<body>
    <div>
            
<div class="padding-15">
    <div>
        <div>
            <div class="col-xs-9">
                <div class=" padding-r0">
                    <div class="e-box s-box s-bottom" style="background: none">
                        <div class="e-box-content">
                            <div class="clearfix e-form e-flat-form s-tips">
                                <span>你好，<?php echo $user ?>。这么多年你一直默默奋斗，现在，有自点车坊陪你一起努力。 </span>
                                <br>
                            </div>
                            <div class="clearfix e-form e-flat-form ">
                                <span style="color: #f00; font-size: 12px;">为了保证软件的更新，近期内，我们将于每日16点30至17点发布新功能，期间可能出现登录异常。如对您造成不便，敬请谅解！
                                    如有疑问，请随自点车坊客服。</span> 
                            </div>
                        </div>
                    </div>
                    <div class="e-box">
        <div class="e-box-title">
            <h3>工作提醒</h3>
        </div>
        <div class="e-box-content">
            <div class="clearfix e-form e-flat-form">
                <div class="form-group clearfix">
                    
                    <div style="width:40%" class="form-item">
                        <span class="form-item-name">客户提醒</span> <span class="form-item-prefix">：</span>
                        <a id="btnAm" style="margin-top:5px;width:50px" class="form-item-input" href="javascript:$.tabFrame.openTab('客户提醒','/Warning/CarWarning')">0</a>
                    </div>   
                    <div style="width:40%" class="form-item">
                        <span class="form-item-name">库存预警</span> <span class="form-item-prefix">：</span>
                        <a id="btnStorage" style="margin-top:5px; width:50px" class="form-item-input" href="javascript:$.tabFrame.openTab('库存预警','/Warning/Warning')">0</a>
                    </div>
                </div>
            </div>
        </div>
</div>
<a href="http://repair5.66km.com/home/desktop#" class="btn white-btn e-quicklink-setting s-btnfloat">编辑</a>
                    <div class=" s-box s-box-conlist" style="margin-top: 0px;">
                        <div id="div_show" class="e-box-content e-quicklink ">
                           
                           
                            <div class="col-xs-3">
                            	<div class="s-border-left s-border-bottom shome-link">
                                	<a class="shome-link-del sicons-26 sicons-26-del" href="http://repair5.66km.com/home/desktop#"></a>
                                	<a data-menu="1" href="javascript:$.tabFrame.openTab('开单','bill.php')">
                                        <div class="s-box-icons "><span class="sicons-100 sicons-100-order"></span></div>
                                        <p class="home-link-title">开单</p>
                               		</a>
                               </div>
                          </div>
                         
                         
                         
                         
                         <div class="col-xs-3">
                           <div class="s-border-left s-border-bottom shome-link"><a class="shome-link-del sicons-26 sicons-26-del" href="http://repair5.66km.com/home/desktop#"></a><a data-menu="2" href="javascript:$.tabFrame.openTab('采购开单','/Purchase/PurchaseEdit')"><div class="s-box-icons "><span class="sicons-100 sicons-100-shopping"></span></div><p class="home-link-title">采购开单</p></a></div></div><div class="col-xs-3"><div class="s-border-left s-border-bottom shome-link"><a class="shome-link-del sicons-26 sicons-26-del" href="http://repair5.66km.com/home/desktop#"></a><a data-menu="3" href="javascript:$.tabFrame.openTab('盘点单管理','/StockTake/Index')"><div class="s-box-icons "><span class="sicons-100 sicons-100-entrepot"></span></div><p class="home-link-title">盘点单管理</p></a></div></div><div class="col-xs-3"><div class="s-border-left s-border-bottom shome-link"><a class="shome-link-del sicons-26 sicons-26-del" href="http://repair5.66km.com/home/desktop#"></a><a data-menu="4" href="javascript:$.tabFrame.openTab('商品管理','/Goods/index')"><div class="s-box-icons "><span class="sicons-100 sicons-100-entrepot"></span></div><p class="home-link-title">商品管理</p></a></div></div><div class="col-xs-3"><div class="s-border-left s-border-bottom shome-link"><a class="shome-link-del sicons-26 sicons-26-del" href="http://repair5.66km.com/home/desktop#"></a><a data-menu="5" href="javascript:$.tabFrame.openTab('客户办卡','/Card/PrePaidCard')"><div class="s-box-icons "><span class="sicons-100 sicons-100-customer"></span></div><p class="home-link-title">客户办卡</p></a></div></div><div class="col-xs-3"><div class="s-border-left s-border-bottom shome-link"><a class="shome-link-del sicons-26 sicons-26-del" href="http://repair5.66km.com/home/desktop#"></a><a data-menu="6" href="javascript:$.tabFrame.openTab('套餐管理','/Package/PrePaid')"><div class="s-box-icons "><span class="sicons-100 sicons-100-customer"></span></div><p class="home-link-title">套餐管理</p></a></div></div><div class="col-xs-3"><div class="s-border-left s-border-bottom shome-link"><a class="shome-link-del sicons-26 sicons-26-del" href="http://repair5.66km.com/home/desktop#"></a><a data-menu="7" href="javascript:$.tabFrame.openTab('工具管理','/BasicData/Tools')"><div class="s-box-icons "><span class="sicons-100 sicons-100-use"></span></div><p class="home-link-title">工具管理</p></a></div></div><div class="col-xs-3"><div class="s-border-left s-border-bottom shome-link"><a class="shome-link-del sicons-26 sicons-26-del" href="http://repair5.66km.com/home/desktop#"></a><a data-menu="8" href="javascript:$.tabFrame.openTab('套餐管理','/Package/PrePaid')"><div class="s-box-icons "><span class="sicons-100 sicons-100-customer"></span></div><p class="home-link-title">套餐管理</p></a></div></div></div>
                    </div>
                </div>
            </div>
            <div class="col-xs-3">
                <div class="padding-9" style="padding: 0px 0px 0px 15px">
                    <div data-step="2" data-intro="扫描二维码并绑定，即可通过微信随时查看经营、配件等数据。" class="e-box ">
                        <div class="e-box-title">
                            <img src="img/s-tel.png" style="max-width: 100%;">
                        </div>
                        <div class="e-box-content s-tal-c padding-10-0">
                            <img src="img/sdashboard-code.png" style="max-width: 95%;">
                        </div>
                        <div class="e-box-content s-tal-c padding-10-0">
                            <a target="_blank" class="home-funbtn-title margin-r10" href="http://wpa.qq.com/msgrd?v=3&uin=897362598&site=qq&menu=yes">
                                <img src="img/kf1.png" style="max-width: 100%;">
                            </a><a target="_blank" class="home-funbtn-title" href="http://wpa.qq.com/msgrd?v=3&uin=670914750&site=qq&menu=yes">
                                <img src="img/kf2.png" style="max-width: 100%;">
                            </a>
                        </div>
                    </div>
                    <a target="_blank" href="http://repair5.66km.com/excels/66%E5%85%AC%E9%87%8C%E6%B1%BD%E4%BF%AE%E7%AE%A1%E7%90%86%E8%BD%AF%E4%BB%B6.url" class="home-funbtn"><img class="home-funbtn-img" src="img/66kj.jpg"><span class="home-funbtn-title">创建桌面快捷方式</span></a>
                    <img src="img/s-ad.png" style="max-width: 100%;">
                    
                </div>
            </div>
        </div>
    </div>
</div>
<input type="hidden" id="menuid" name="menuid">
<div id="div_role" class="e-box e-check-ulholder" style="display: none">
</div>

    </div>

    

    <script src="base"></script>


    <script src="javascript/layer.js"></script>
    <script src="javascript/layer.ext.js"></script>
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

    <script type="text/javascript" src="GetPermissions"></script>
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
    
    <script type="text/javascript">
        function addquicklink() {
            return $.postJson("/home/GetQuickLinks").done(function (data) {
                if (data.code == 0) {
                    $('#div_role').empty();
                    var htmText = "";
                    var GroupName = "";
                    $.each(data.data, function (i, n) {

                        if (n.GroupName != GroupName) {
                            htmText += "</ul></div><div class='e-box-title'><h4><span class='icons-12 icons-12-right gray margin-r5'></span>" + n.GroupName + "</h4></div><div class='e-box-content'><ul class='e-check-ul clearfix'>";
                            GroupName = n.GroupName;
                        }
                        if (!n.RightID || (n.RightID && PageConfig.check(n.RightID))) {
                            htmText += "<li class='e-check-li e-tag '><input type='checkbox' class='margin-r5' name='" + n.Title + "' id='" + n.ID + "'></input><label style='display: inline-block;' for='" + n.ID + "'>" + n.Title + "</label></li>";
                        }
                    });
                    htmText = htmText.substr(11);
                    $("#div_role").append(htmText);
                }
                $('#div_role').dialog({
                    title: "添加快捷方式",
                    width: 1000,
                    height: 500,
                    modal: true,
                    buttons: {
                        '保存': function () {
                            var menuid = "menuid" + $("#menuid").val();
                            var linkid = $('input[type="checkbox"]:checked').attr('id');
                            $.postJson("/home/SaveUserQuickLink", { menuID: menuid, linkID: linkid }).done(function (data) {
                                if (data.code == 0) {
                                    $('#emprole-roleedit-dialog').dialog('close');
                                    $('#common-dialog-txt').text("设置成功");
                                    $('#common-dialog').dialog({
                                        title: "提示",
                                        width: 320,
                                        height: 200,
                                        buttons: {
                                            '确定': function () {
                                                $('#common-dialog').dialog('close');
                                                $('#div_role').dialog('close');
                                                quicklinkshow();
                                            }
                                        }
                                    });
                                }
                            }).always(function () {
                                $('#div_role').parent().find('.ui-dialog-buttonset button').prop('disabled', false)
                            });
                        },
                        '关闭': function () {
                            $('#div_role').dialog('close');
                        }
                    }
                });
                $("input[type='checkbox']").click(function () {
                    $("input[type=checkbox]").prop("checked", false);
                    $("input[type=checkbox]").parent().removeClass('active');
                    $(this).prop("checked", true);
                    if ($(this).prop('checked') == true) {
                        $(this).parent().addClass('active');
                    }
                    else {
                        $(this).parent().removeClass('active');
                    }
                });
            });
        }
        function quicklinkshow() {
            return $.postJson("/home/GetUserQuickLinks").done(function (data) {
                if (data.code == 0) {
                    $('#div_show').empty();
                    var htmText = "";
                    $.each(data.data, function (i, n) {
                        if (!n) {
                            htmText += "<div class='col-xs-3'><div class='s-border-left s-border-bottom shome-link'><a data-menu='" + (i + 1) + "' href='#'><div class='s-box-icons'><span class='sicons-100 sicons-100-lineadd'></span></div><p class='home-link-title'>添加快捷方式</p></a></div></div>";
                        }
                        else {
                            if (n.RightID && PageConfig.check(n.RightID)) {
                                htmText += "<div class='col-xs-3'><div class='s-border-left s-border-bottom shome-link'><a class='shome-link-del sicons-26 sicons-26-del' href='#'></a><a data-menu='" + (i + 1) + "' href=\"javascript:$.tabFrame.openTab('" + n.Title + "','" + n.URL + "')\"><div class='s-box-icons '><span class='sicons-100 " + n.ICON + "'></span></div><p class='home-link-title'>" + n.Title + "</p></a></div></div>";
                            } else {
                                htmText += "<div class='col-xs-3'><div class='s-border-left s-border-bottom shome-link'><a class='shome-link-del sicons-26 sicons-26-del' href='#'></a><a data-menu='" + (i + 1) + "' href=\"javascript:messageManager.alert('您没有相关权限！');\"><div class='s-box-icons '><span class='sicons-100 " + n.ICON + "'></span></div><p class='home-link-title'>" + n.Title + "</p></a></div></div>";
                            }
                        }
                    });
                    $("#div_show").append(htmText);
                    $("#div_show .sicons-100-lineadd").click(function () {
                        var menuid = $(this).parent().parent().attr("data-menu");
                        $("#menuid").val(menuid);
                        addquicklink();
                    })
                    $('#div_show .sicons-26-del').click(function () {
                        var menuid = $(this).next().attr("data-menu");
                        delquicklink(menuid);
                    })
                }
            })
        };
        function delquicklink(menuid) {
            menuid = "menuid" + menuid;
            return $.postJson("/home/DelUserQuickLink", { menuID: menuid }).done(function (data) {
                if (data.code == 0) {
                    quicklinkshow();
                }
            })
        }
    </script>
    <script type="text/javascript">
        $(function () {
            $('.e-quicklink-setting').click(function () {
                $('.e-quicklink').toggleClass('setting');
            })
            quicklinkshow();

        })
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