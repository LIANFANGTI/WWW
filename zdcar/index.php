<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link type="text/css" rel="stylesheet" href="http://www.66km.com/skin/default/reg/base.css" />
<link type="text/css" rel="stylesheet" href="http://www.66km.com/skin/default/reg/index.css" />
<script type="text/javascript" src="http://www.66km.com/file/script/reg/jquery-1.8.3.min.js"></script>
<script type="text/javascript" src="http://www.66km.com/file/script/reg/jquery.DB_tabMotionBanner.min.js"></script>
<title>自点软件服务</title>
<meta name="keywords" content="汽配软件,汽车维修管理软件,售后管理软件"/>
<meta name="description" content="自点车坊汽车维修管理软件，集成汽车维修、库存管理、售后管理等多种功能为一身的汽配软件，致力于打造中国最好的汽配软件。自点汽配软件，为您提供免费试用、软件下载等多种优质服务。"/>
<link        rel="shortcut icon" href="favicon.ico" />
</head>
<body>
<div id="continer">
<div id="top">
    <div class="top" >
        <div class="logo">
            <img src="img/logo1.jpg" width="225" height="55" />
            </div>
            <div id="nav">
                <a href="#">首页</a>
                <a href="chanpin.html">产品</a>
<!--                 <a href="/price.html">产品价格</a>
 -->                <a href="/kehu.html">客户</a>
                <a href="/news/">行业资讯</a>
                <a href="/data/">汽修资料</a>
                <a href="/about_us.html">关于我们</a>
            </div>
            <div class="dl">
            <?php 
				@session_start();
				if(!isset($_SESSION['username'])){
					echo "<span class='dl_style'><a href='reg1.php'>注册</a></span>";
					echo "<span class='zc_style'><a href='login.php'>登录</a></span>";
				}else{
					$user=$_SESSION['username'];
					echo " <span class='dl_style'><a href='upage.php?name=".$user."'>个人中心</a></span>";
				}
			?>
            </div>
        </div>    
  </div>
  <div class="kePublic"> 
    <!--效果html开始-->
    <div class="DB_tab25">
      <ul class="DB_bgSet">
        <li style="background:url(/skin/default/images_reg/banner1.jpg) no-repeat 100% 100%;"></li>
        <li style="background:url(/skin/default/images_reg/bj4.jpg) no-repeat 100% 100%;"></li>
        <li style="background:url(/skin/default/images_reg/bj5.jpg) no-repeat 100% 100%;"></li>
        <li style="background:url(/skin/default/images_reg/bj3.jpg) no-repeat 100% 100%;"></li>
        <li style="background:url(/skin/default/images_reg/bj2.jpg) no-repeat 100% 100%;"></li>
      </ul>
      <ul class="DB_imgSet">
        <li onClick="javascript:window.location.href='/reg/reg1.php';"> <img class="DB_2_1" src="img/b1_dn.png" alt=""> <img class="DB_2_2" src="img/b1_bt1.png" alt=""> <img class="DB_2_3" src="img/b1_bt2.png" alt=""> </li>
        <li onClick="javascript:window.location.href='/reg/reg1.php';"> <img class="DB_3_1" src="img/yhhd_left.png" alt=""> <img class="DB_3_2" src="img/bj4_01.png" alt=""> <img class="DB_3_3" src="img/bj4_02.png" alt=""> <img class="DB_3_4" src="img/bj4_03.png" alt=""> <img class="DB_3_5" src="img/bj4_bt1.png" alt=""> <img class="DB_3_6" src="img/bj4_bt2.png" alt=""> <img class="DB_3_7" src="img/yhhd_an.png" alt=""> </li>
        <li onClick="javascript:window.location.href='/kehu.html';"> <img class="DB_4_1" src="img/bj5_bt1.png" alt=""> <img class="DB_4_2" src="img/bj5_bt2.png" alt=""> <img class="DB_4_3" src="img/bj5_01.png" alt=""> <img class="DB_4_4" src="img/bj5_02.png" alt=""> <img class="DB_4_5" src="img/bj5_03.png" alt=""> <img class="DB_4_6" src="img/bj5_04.png" alt=""> </li>
        <li onClick="javascript:window.location.href='/reg/reg1.php';"> <img class="DB_1_1" src="img/yhhd.png" alt=""> <img class="DB_1_2" src="img/yhhd_bt1.png" alt=""> <img class="DB_1_3" src="img/yhhd_an.png" alt=""> <img class="DB_1_4" src="img/yhhd_left.png" alt=""> </li>
        <li onClick="javascript:window.location.href='/about_us.html';"> <img class="DB_5_1" src="img/bj2_bt1.png" alt=""> <img class="DB_5_2" src="img/bj2_bt2.png" alt="">
      </ul>
      <div class="DB_menuWrap">
        <ul class="DB_menuSet">
          <li><img src="img/btn_off.png" alt=""></li>
          <li><img src="img/btn_off.png" alt=""></li>
          <li><img src="img/btn_off.png" alt=""></li>
          <li><img src="img/btn_off.png" alt=""></li>
          <li><img src="img/btn_off.png" alt=""></li>
        </ul>
        <div class="DB_next"><img src="img/nextArrow.png" alt="NEXT"></div>
        <div class="DB_prev"><img src="img/prevArrow.png" alt="PREV"></div>
      </div>
    </div>
    <script type="text/javascript">
$('.DB_tab25').DB_tabMotionBanner({
key:'b28551',
autoRollingTime:10000,                            
bgSpeed:500,
motion:{
DB_1_1:{left:-50,opacity:0,speed:1000,delay:500},
DB_1_2:{left:50,opacity:0,speed:1000,delay:1000},
DB_1_3:{left:150,opacity:0,speed:1000,delay:1500},
DB_1_4:{left:400,opacity:0,speed:1000,delay:1500},
DB_2_1:{top:50,opacity:0,speed:1000,delay:500},
DB_2_2:{top:50,opacity:0,speed:1000,delay:1000},
DB_2_3:{top:100,opacity:0,speed:1000,delay:1500},
DB_3_1:{left:-50,opacity:0,speed:1000,delay:500},
DB_3_2:{left:50,opacity:0,speed:1000,delay:1000},
DB_3_3:{left:130,opacity:0,speed:1000,delay:1500},
DB_3_4:{left:210,opacity:0,speed:1000,delay:1500},
DB_3_5:{left:330,opacity:0,speed:1000,delay:1500},
DB_3_6:{left:560,opacity:0,speed:1000,delay:1500},
DB_3_7:{left:670,opacity:0,speed:1000,delay:1500},
DB_4_1:{top:50,opacity:0,speed:1000,delay:500},
DB_4_2:{top:0,opacity:0,speed:1000,delay:1000},
DB_4_3:{top:0,opacity:0,speed:1000,delay:1500},
DB_4_4:{top:30,opacity:0,speed:1000,delay:2000},
DB_4_5:{top:70,opacity:0,speed:1000,delay:3000},
DB_4_6:{top:150,opacity:0,speed:1000,delay:3000},
end:null
}
})
</script> 
    <!--效果html结束-->
    <div class="clear"></div>
  </div>
  <div class="con-bj index_con">
    <div class="con-cp">
      <div class="con-issue">
        <div class="con-title">
          <h2>汽车服务店最怕哪些问题？</h2>
        </div>
        <ul class="con-issue-list">
          <li><a href='javascript:return false;' class='issue1'></a> <span>手工记账，易丢失</span></li>
          <li><a href='javascript:return false;' class='issue2'></a> <span>库存不明，常缺货</span></li>
          <li><a href='javascript:return false;' class='issue3'></a> <span>客户服务，效率低</span></li>
          <li><a href='javascript:return false;' class='issue4'></a> <span>营业报表，不清晰</span></li>
        </ul>
      </div>
    </div>
    <div class="index_con">
      <div class="con-title">
        <h2>自点  是你无可替代的贴心选择</h2>
        <span>更完善  更专业 最会持家的汽车后市场管理软件</span> </div>
      <div class="index-part ">
        <div class="i-part1">
          <div class="index-details ">
            <div class="con-cp-left">
              <div class="con-cp-detail index-b"> <b>一分钟摸透流程，新手开单无需引导</b>
                <p> 界面清爽，操作简单易上手<br />
                  功能齐全，支持多用户分权限操作<br />
                  轻松设置客户提醒，保持联系挖掘价值<br />
                  更多功能不断升级，满足管理的方方面面 </p>
                  <a href="reg1.php" class="kh-an cp-an" > 立即注册 </a> </div>
              <div class="clear"></div>
            </div>
            <div class="con-cp-right"> <span><img src="img/index1.png"  /></span> </div>
          </div>
        </div>
        <div class="i-part1">
          <div class="index-details ">
            <div class="con-cp-right"> <span><img src="img/index2.png"  /></span> </div>
            <div class="con-cp-left">
              <div class="con-cp-detail index-b"> <b>最完备的官方车型保养数据库</b>
                <p> 输入车架号及上次保养公里数，<br />即可获得4S店官方保养项目建议，<br />树立专业形象，<br />更好服务车主。</p>
               <a href="/reg/reg1.php" class="kh-an cp-an"> 立即注册 </a></div>
              <div class="clear"></div>
            </div>
          </div>
        </div>
        <div class="i-part1">
          <div class="index-details ">
            <div class="con-cp-left">
              <div class="con-cp-detail index-b"> <b>详尽直观的统计分析</b>
                <p> 一应俱全的统计报表，<br />一目了然的数据展示，<br />一眼看穿的经营问题，<br />经营运筹清楚井然。 </p>
                <a href="/reg/reg1.php" class="kh-an cp-an" > 立即注册 </a> </div>
              <div class="clear"></div>
            </div>
            <div class="con-cp-right"> <span><img src="img/index3.png"  /></span> </div>
          </div>
        </div>
        <div class="i-part1">
          <div class="index-details ">
            <div class="con-cp-right"> <span><img src="img/index4.png"  /></span> </div>
            <div class="con-cp-left">
              <div class="con-cp-detail index-b"> <b>只要你召唤，我们就出现</b>
                <p> 便捷的云端服务，随时随地陪伴你<br />
无需下载，登录即可使用，操作不受地点、人数限制<br />
数据实时存储到云服务器，安全性高<br />
后台自动升级软件，专人维护数据库<br />
购买价格低，可免费试用，终生享受优质服务，性价比高。</p>
                 <a href="/reg/reg1.php" class="kh-an cp-an" > 立即注册 </a></div>
              <div class="clear"></div>
            </div>
          </div>
        </div>
      </div>
       <div class="con-title">
        <h2>我们的客户</h2>
            <span>不一样的客户，不一样的管理</span>
        </div>
      <ul class="kh-list">
         <li>
         <img src="img/kh1.png" width="180" height="109" /> </li>
           <li>
         <img src="img/kh2.png" width="180" height="109" /> </li>
           <li>
         <img src="img/kh3.png" width="180" height="109" /> </li>
           <li>
         <img src="img/kh4.png" width="180" height="109" /> </li>
           <li>
         <img src="img/kh5.png" width="180" height="109" /> </li>
           <li>
         <img src="img/kh6.png" width="180" height="109" /> </li>
           <li>
          <img src="img/kh19.png" width="180" height="109" /> </li>
           <li>
         <img src="img/kh20.png" width="180" height="109" /> </li>
           <li>
         <img src="img/kh21.png" width="180" height="109" /> </li>
           <li>
         <img src="img/kh22.png" width="180" height="109" /> </li>
           <li>
         <img src="img/kh23.png" width="180" height="109" /> </li>
           <li>
         <img src="img/kh24.png" width="180" height="109" /> </li>
           <li>
          <img src="img/kh7.png" width="180" height="109" /> </li>
           <li>
         <img src="img/kh8.png" width="180" height="109" /> </li>
           <li>
         <img src="img/kh9.png" width="180" height="109" /> </li>
           <li>
         <img src="img/kh10.png" width="180" height="109" /> </li>
           <li>
         <img src="img/kh11.png" width="180" height="109" /> </li>
           <li>
         <img src="img/kh12.png" width="180" height="109" /> </li>
           <li>
          <img src="img/kh13.png" width="180" height="109" /> </li>
           <li>
         <img src="img/kh14.png" width="180" height="109" /> </li>
           <li>
         <img src="img/kh15.png" width="180" height="109" /> </li>
           <li>
         <img src="img/kh16.png" width="180" height="109" /> </li>
           <li>
         <img src="img/kh17.png" width="180" height="109" /> </li>
           <li>
         <img src="img/kh18.png" width="180" height="109" /> </li>
      </ul> 
    </div>
    <div class="con-cp">
     <div class="con-title">
            <h2>借助自点实现业绩增长</h2>
          </div>
          <div class="index-box">&nbsp;</div>
    </div>
    <div class="index-part">
        <div class="price">
         <div class="index-news">
            <h2>行业新闻</h2>
                <div class="index-news-list">
                <a href="/news/265.html">
             <img src="http://www.66km.com/file/upload/201512/10/17-41-31-49-1.jpg" alt="华晨汽车的双十二电商计划_自点" width="230" height="232" />
                </a>
                    <ul>
                    <li><a href="/news/264.html">奥迪Q7来袭，或成其销量转折点</a></li>
                    <li><a href="/news/263.html">大众否认造假，声称仅9车型存在轻微偏差_66</a></li>
                    <li><a href="/news/262.html">小型汽车驾照自学直考获批：试点进行_66公</a></li>
                    <li><a href="/news/261.html">国际油价连跌，国内成品油改价或迎最佳窗口</a></li>
                    <li><a href="/news/260.html">易到用车市场占有率低迷，留给Ta的时间不多</a></li>
                    <li><a href="/news/259.html">环保部：黄标车淘汰任务提前完成_自点</a></li>
                    <li><a href="/news/258.html">中国计划启动新一轮汽车下乡政策</a></li>
                    <li><a href="/news/257.html">农村淘宝或称自主车企契机</a></li>
                    </ul>
                </div>
          </div>
          <div class="index-news">
            <h2>经营之道</h2>
                <div class="index-news-list">
                <a href="/news/198.html">
                  <img src="http://www.66km.com/file/upload/201512/01/10-46-39-37-1.jpg" alt="汽车店会员章程模板" width="230" height="232" />
                </a>
                    <ul>
                       <li><a href="/news/197.html">给你算一笔汽修厂的生意账</a></li>
                      <li><a href="/news/196.html">【经营管理】当四个小孩遇到熊之后……</a></li>
                      <li><a href="/news/129.html">汽修厂经营，为何一定要打品牌化这张牌？</a></li>
                      <li><a href="/news/114.html">汽修厂倒闭的六大原因解析！汽修管理者必读</a></li>
                      <li><a href="/news/113.html">一个汽车维修连锁店的小哥给我上了一堂营销</a></li>
                      <li><a href="/news/103.html">现在流行精细化客户管理，你会吗？</a></li>
                      <li><a href="/news/102.html">汽车美容店如何通过升级盈利？</a></li>
                      <li><a href="/news/90.html">汽修店经营中的“三十六计”</a></li>
                    </ul>
                </div>
          </div>
        </div>
     </div>
  </div>
<div id="footer">
    <div class="footer_con">
            <div class="footer_list">
            <ul>
                    <li>
                        <h2>自点官方微信</h2>
                        <img src="img/weixin.jpg" width="100" height="101" />
                    </li>
                    <li  style="text-align:center">
                        关注自点
                    </li>
                </ul>
                <ul>
                    <li>
                        <h2>产品</h2>
                    </li>
                    <li><a href="/reg/reg1.php">单店普及版</a></li>
                    <li><a href="/reg/reg1.php">单店高级版</a></li>
                    <li><a href="/reg/reg1.php">连锁普及版</a></li>
                    <li><a href="/reg/reg1.php">连锁高级版</a></li>
                </ul>
                <ul>
                    <li>
                        <h2>资料</h2>
                    </li>
                    <li><a href="/news/">行业资讯</a></li>
                    <li><a href="/data/">汽修资料</a></li>
                    
                </ul>
                <ul>
                    <li>
                        <h2>合作伙伴</h2>
                    </li>
                    <li><a href="javascript:return false;">渠道合作</a></li>
                     <li>
                        QQ:760063163
                    </li>
                   
                </ul>
                <ul>
                    <li>
                        <h2>联系我们</h2>
                    </li>
                    <li>
                    客服电话：400-88184006
                    </li>
                    <li>
                    公司地址：浙江省杭州市余杭区莫干山路1515号 </li>
                    
                   
                </ul>
            </div>
            <div class="right">© 2014 Copyright 自点网络技术有限公司 浙ICP备14011289-2号
</div>
        </div>
        
    </div>
</div>
<script>
var _hmt = _hmt || [];
(function() {
  var hm = document.createElement("script");
  hm.src = "//hm.baidu.com/hm.js?f5156a97eb72869b3f18c45ee559380d";
  var s = document.getElementsByTagName("script")[0]; 
  s.parentNode.insertBefore(hm, s);
})();
</script>
<script>
    (function (i, s, o, g, r, a, m) {
        i['GoogleAnalyticsObject'] = r; i[r] = i[r] || function () {
            (i[r].q = i[r].q || []).push(arguments)
        }, i[r].l = 1 * new Date(); a = s.createElement(o),
        m = s.getElementsByTagName(o)[0]; a.async = 1; a.src = g; m.parentNode.insertBefore(a, m)
    })(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');
    ga('create', 'UA-60954258-1', { 'cookieDomain': '66km.com' });
    ga('send', 'pageview');
</script>
</body>
</html>
