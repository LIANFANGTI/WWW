

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>第一次磨合test</title>
    <meta name="viewport" content="width=device-width" />
    <meta name="keywords" content="汽车改装、汽车美容、汽车维修、汽车保养、杭州汽车维修、杭州汽车快修、杭州汽车维修厂、自助修车、自助保养、杭州洗车  " />
    <meta name="description" content="汽车改装就到自点车坊,自点车坊由杭州的一群80后组建,首创自助式保养,集汽车改装\汽车维修\汽车保养\汽车美容\洗车\等多功能与一体的新业态汽车一站式维护中心。您的爱车要保养,要改装,要维修,要美容都到自点车坊来,自助式保养让您的保养更自主！
" />
<link href="/favicon.ico" rel="shortcut icon" type="image/x-icon" />

<link href="css/reset.css" rel="stylesheet" />
<link href="css/pubilc.css" rel="stylesheet" />
<link href="css/css.css" rel="stylesheet" />
<script src="js/jquery-1.11.1.min.js"></script>
<script src="js/jquery.SuperSlide.2.1.1.js"></script>
<!--[if IE]>
<script src="/HiiShe_Style/res/js/html5.js"></script>
<![endif]-->
<!--[if lte IE 6]>
<script src="/HiiShe_Style/res/js/ie6_png.js" type="text/javascript"></script>
<script type="text/javascript">
    DD_belatedPNG.fix('*');
</script>
<![endif]-->



<script type="text/javascript">

    //$(document).ready(function () {
    //    //菜单不同的颜色
    //    debugger;
    //    var obj = $(".nav-ul > li > a");
    //    obj.click(function () {
    //        // 取集合 先全部去掉点击class 
    //        obj.removeClass("on")
    //        // 只对当前点击添加class 
    //        $(this).addClass("on");
    //    });
    //});
//收藏平台
function AddFavorite(sURL, sTitle) {
		try {
				window.external.addFavorite(sURL, sTitle);
		}
		catch (e) {
				try {
						window.sidebar.addPanel(sTitle, sURL, "");
				}
				catch (e) {
						alert("对不起，您的浏览器不支持此收藏操作!请使用Ctrl+D收藏本平台。");
				}
		}
}
</script>
    
    <style>
        html, body {
            margin:0;padding:0
        }

    </style>
</head>
<body class="wrap-950">
    <div id="header" style="background-color:red">



<section class="containter clearfix">
    <header class="top-wrap">
        <div class="top"><span class="mr">
            <i>
               <a href='/Home/Index'>首页</a>&nbsp;&nbsp;&nbsp;&nbsp;
					<?php
						@session_start();
						if(!isset($_SESSION["user"])){
							$text1="【登陆】";$text2="【注册】";
							$url1="login.php";$url2="#";
						}else{
							$text1=$_SESSION["user"];$text2="【注销】";
							$url1="#";$url2="logout.php";
						}
                    	echo"<a href='".$url1."'>".$text1."</a>|<a href='".$url2."'>".$text2."</a>";
                    ?>
                 &nbsp;&nbsp;&nbsp;&nbsp;
                <a href="javascript:AddFavorite('http://www.zidianchefang.com', '自点车坊')">加入收藏</a>
                |<a href="/Home/Contactus?Length=0">联系我们</a>
            </i>
            </span>
        </div>
    </header>
    <nav class="nav-wrap">
        <div class="nav">
            <div class="logo"><a href="index.php"><img src="" /></a></div>
            <ul class="nav-ul">
                <li><a class="on" href="index.php">首  页</a></li>
                <li><span></span></li>
                <li><a class="on" href="1.html">公司介绍</a></li>
                <li><span></span></li>
                <li><a class="on" href="2.html">新闻媒体</a></li>
                <li><span></span></li>
                <li><a class="on" href="3.html">百科科普</a></li>
                <li><span></span></li>
                <li><a class="on" href="4.html">产品展示</a></li>
                <li><span></span></li>
                <li><a class="on" href="5.html">车友会 </a></li>
                <li><span></span></li>
                
                <li><a class="on" href="6.html">投资加盟</a></li>
                <li><span></span></li>
                <li><a class="on" href="7.html">联系我们</a></li>
            </ul>
        </div>
    </nav>
</section>
    </div>
    <div id="content" class="bodyer">
        
        

<script src="/HiiShe_Style/v1_0/JavaScript/HiiShe.Core.js"></script>
<script src="/HiiShe_Style/v1_0/JavaScript/HiiShe.Core.Dialog.js"></script>

<section class="fullSlide">
    <div class="banner">
        <div class="login"><a href="/UserAccount/"></a></div>
    </div>
    <div class="bd">        
        <ul>
                <li style="background: url(images/2015_02_11_18_28_56_1520.jpg) #0b0b0b center 0 no-repeat; "><a target="_blank" href="#"></a></li>
        </ul>
    </div>
    <div class="hd"><ul></ul></div>
</section>
<section class="row clearfix">
    <div class="col-sm">
        <div class="title"><img src="images/newst.jpg" /></div>
        <ul class="row-news">
                <li><a href="/Home/News_Detail?code=354566A6CCA0E7C1">搭2.0L发动机 比亚迪商常规动力版曝光</a></li>
                <li><a href="/Home/News_Detail?code=EDF0CB74DA0AABB4">凯迪拉克先用 安吉星/移动推车载4G服务</a></li>
        </ul>
        <div class="more"><a href="/Home/News">查看更多&gt;&gt;</a></div>
    </div>
    <div class="col-sm">
        <div class="title"><img src="images/aboutt.jpg" /></div>
        <p class="row-intro"><a href="/Home/AboutUs">自点车坊，这是一家跟汽车相关的连锁品牌企业。    自点车坊，它的定位是车主家门口的自主式养车工坊。    自点车坊，营业范围从新车销售、保险购买、常规保养、备件选购、钣金维修、油漆事故、年审年检一直到二手车置换。不限品牌、不论价格，只要你是车主，你都可以来找我们。</a></p>
        <div class="more"><a href="/Home/AboutUs">查看详细&gt;&gt;</a></div>
    </div>
    <div class="col-sm">
        <div class="title"><img src="images/joint.jpg" /></div>
        <div><img src="images/joinc.jpg" /></div>
        <div class="more"><a href="/Home/ContactUs">查看详细>></a></div>
    </div>
</section>
<section class="active-box clearfix">
    <div class="active clearfix">
        <div class="a-title">
            <h2>车友活动</h2>
            <p>Cheyou activities</p>
        </div>
        <ul class="album">
            <li>
                <a href="#" target="_blank">
                    <div class="album_info"><span>西藏攻略图</span></div>
                    <img src="images/2015_01_22_18_54_44_2486.jpg" />
                </a>
            </li>
            <li>
                <a href="#" target="_blank">
                    <div class="album_info"><span></span></div>
                    <img src="images/2015_05_25_14_34_52_2270.jpg" />
                </a>
            </li>
            <li>
                <a href="#" target="_blank">
                    <div class="album_info"><span></span></div>
                    <img src="images/2015_01_22_18_52_10_2173.jpg" />
                </a>
            </li>
            <li class="album_more"><a href="/Home/Activity" target="_blank"></a></li>
            <li class="album-m">
                <a href="#" target="_blank">
                    <div class="album_info"><span></span></div>
                    <img src="images/2015_01_22_19_03_32_3111.jpg" />
                </a>
            </li>
            <li class="album-m">
                <a href="#" target="_blank">
                    <div class="album_info"><span></span></div>
                    <img src="images/2015_01_22_19_03_45_2017.jpg" />
                </a>
            </li>
            <li class="album-b">
                <a href="#" target="_blank">
                    <div class="album_info"><span></span></div>
                    <img src="images/2015_01_22_19_04_01_4830.jpg" />
                </a>
            </li>
            <li class="album-a">
                <a href="#" target="_blank">
                    <div class="album_info"><span></span></div>
                    <img src="images/2015_01_22_19_04_15_6705.jpg" />
                </a>
            </li>
        </ul>
    </div>
</section>
<section class="setmenu-box">
    <div class="setmenu clearfix">
        <div class="a-title">
            <h2>产品套餐</h2>
            <p>Product package</p>
        </div>
        <ul class="set-m clearfix">
                <li>
                    <a href="/Home/Product_Detail?code=07F8985C5EDFEF07" target="_blank" class="s-img"><img src="/UploadImageDir/PRODUCT_IMAGE/" /></a>
                <h3><a href="#" target="_blank">200/小时/节</a></h3>
                <div class="s-intro">1000公里私教</div>
                <div class="s-bbox"><a href="/Home/Product_Detail?code=07F8985C5EDFEF07" target="_blank" class="btn-orange-big">进入</a></div>
            </li>
                <li>
                    <a href="/Home/Product_Detail?code=7FACB88DEB9E60E5" target="_blank" class="s-img"><img src="images/2015_05_25_14_46_38_7430.jpg" /></a>
                <h3><a href="#" target="_blank">一个工时</a></h3>
                <div class="s-intro">DIY自助保养</div>
                <div class="s-bbox"><a href="/Home/Product_Detail?code=7FACB88DEB9E60E5" target="_blank" class="btn-orange-big">进入</a></div>
            </li>
                <li>
                    <a href="/Home/Product_Detail?code=0BB7988B9EE3A1C0" target="_blank" class="s-img"><img src="images/2015_05_25_14_52_05_8450.jpg" /></a>
                <h3><a href="#" target="_blank">车主DIY洗车</a></h3>
                <div class="s-intro">1元自助洗车</div>
                <div class="s-bbox"><a href="/Home/Product_Detail?code=0BB7988B9EE3A1C0" target="_blank" class="btn-orange-big">进入</a></div>
            </li>
        </ul>
    </div>
</section>
<section class="contus-box">
    <ul>
        <li><a href="/Home/ContactUs" class="tel" title="188-8888-8888"></a></li>
        <li><a href="javascript:HiiShe.Core.Dialog.OpenDialog('/Home/MailSendPage','用户邮件','_AdviceMail');" class="email"></a></li>
            <li><a href="tencent://message/?uin=410418827&Site=qq&Menu=yes" class="qq"></a></li>
        <li><a href="javascript:HiiShe.Core.Dialog.OpenDialog('/Home/PlacePage','位置','_PlacePage');" class="site"></a></li>
    </ul>
</section>

<script type="text/javascript">
  <!--广告切换图调用-->
	jQuery(".fullSlide").slide({ titCell:".hd ul", mainCell:".bd ul", effect:"topLoop", autoPlay:true, autoPage:true, trigger:"click" });
</script>

        
    </div>
    <div id="footer">
<footer>
    <div class="footer"><img src="images/code.png" style="height:150px; width:150px;" /></div>
    <div class="bottom">
        <p class="copyright">版权所有·Copyright © 杭州XXXXXXX有限公司 All Rights Reserve. 浙ICP备14027359号-1</p>
    </div>
</footer>
    </div>
    
</body>
</html>