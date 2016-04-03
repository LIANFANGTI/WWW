<!DOCTYPE html>
<html>
<head>

<?php 
require_once '../zdcar2/mysql.class.php';
$db = new mysql('121.196.226.94', 'admin', 'xwq198291', "zckj_db");
@session_start();
if(isset($_SESSION["user"])){
	$db->select("company","*","id=".$_SESSION["company"]."");
	$company=$db->fetchArray(MYSQL_ASSOC);
	$cpname=$company[0]["name"];//公司名称获取
	$info="<li title='我的云库'><a href='../zdcar2/index.php'>".$cpname."</a></li>
		<li><a href='logout.php'>退出</a></li>";
}else{
	$info="<a href='login.php'>登录</a>";
}
?>
<title>云库科技8</title>
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
<!-- jQuery (Bootstrap's JavaScript plugins) -->
<script src="js/jquery.min.js"></script>
<!-- Custom Theme files -->
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<!-- Custom Theme files -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta property="qc:admins" content="1443161027622123326375731765060454" />
<meta name="keywords" content="汽修软件, 云库科技, 微信对接, 微信运营, 
汽车修理厂解决方案, 收银软件, 库存管理软件" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!--webfont-->
<link href='http://fonts.useso.com/css?family=Source+Sans+Pro:200,300,400,600,700,900' rel='stylesheet' type='text/css'>
	<!--
    	作者：1003316758@qq.com
    	时间：2016-01-27
    	描述：字体设置
    -->
<link href='http://fonts.useso.com/css?family=Raleway:400,800,300,100,500,700,600,900' rel='stylesheet' type='text/css'>
	<!--
    	作者：1003316758@qq.com
    	时间：2016-01-27
    	描述：字体设置
    -->
<!--animated-css-->
<link href="css/animate.css" rel="stylesheet" type="text/css" media="all">
	<link rel="icon" href="images/favicon.ico" type="images/x-icon" id="page_favicon" />
<script src="js/wow.min.js"></script>
<script>
 new WOW().init();
</script>
<!--/animated-css-->
<!--script-->
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script>
<!--/script-->
<script type="text/javascript">
			jQuery(document).ready(function($) {
				$(".scroll").click(function(event){		
					event.preventDefault();
					$('html,body').animate({scrollTop:$(this.hash).offset().top},900);
				});
			});
</script>
</head>
<body>
<!---->
	 
<div class="banner">
	 <div class="container">
		 <div class="header">	 
		 	 <div class="logo wow fadeInLeft" data-wow-delay="0.5s">
			 <a href="index.php"><img src="images/3347542_161350276000_2.png" alt="点击此处可登陆哦"/></a>
			 </div>	
			 <div class="top-menu">
				 <span class="menu"></span> 
				 <ul>
					 <li><a class="scroll" href="#home">主页</a></li>
					 <li><a class="scroll" href="#brief">摘要</a></li>
					 <li><a class="scroll" href="#features">产品特点</a></li>
					 <li><a class="scroll" href="#pricing">产品入手</a></li>
					 <li><a class="scroll" href="#screenshots">SCREENSHOTS</a></li>
					 <li><a class="scroll" href="#contact">联系我们</a></li>
					 <li><?php echo $info; ?></li>
				 </ul>
			 </div>
			 <div class="clearfix"></div>
			 <!-- script-for-menu -->
		 <script>					
					$("span.menu").click(function(){
						$(".top-menu ul").slideToggle("slow" , function(){
						});
					});
		 </script>
		 <!-- script-for-menu -->			 
		 </div>
		 </div>	
		 <div class="banner-text wow fadeInUp" data-wow-delay="0.5s">
			 <h1>为你得到最好的 <span>解决方案</span> <label></label></h1>
			 <h2>你最好的汽车服务管家</h2>
		 </div>
		 <div class="banner-form">
			 <form action="signup.php" method="post">
				 <input class="wow fadeInRight" data-wow-delay="0.5s" type="text" placeholder="公司名称" name="cp" id="cp"required/>
				 <input class="wow fadeInRight" data-wow-delay="0.5s" type="text" placeholder="姓名" name="name" required/>
				 <input class="wow fadeInLeft" data-wow-delay="0.5s" type="text" placeholder="电话" name="tel" required/>
				 <input class="wow fadeInLeft" data-wow-delay="0.5s" type="submit" value="我要使用"/>
			 </form>
			 <div class="register">
			 <span></span>
			 <h3 class="wow bounceInRight" data-wow-delay="0.5s">现在注册并获得自由</h3>		 
		     </div>	
			 <div class="clearfix"></div>
		 </div>		 
	 </div>
</div>
<!---->
<div id="brief" class="brief">
	 <div class="container">
		 <div class="col-md-6 brief-grids wow fadeInLeft" data-wow-delay="0.5s">
			 <img src="images/browse.jpg" alt=""/>
			 <div class="brief-grid">
				 <div class="brief-grid-text">
					 <h3>探索精彩</h3>
					 <p>通过统一技术支撑平台，整合供公司投资现有资源；统一业务创新平台，提升产品创新能力，快速响应业务创新需求；统一营销、服务平台，适应低成本扩张需求，提升核心竞争力；</p>
				 </div>
				 <div class="brief-grid-content1">
					 <h3>自由定制</h3>
					 <p>可自由选择套餐和配件，契合您的心意，给我们鼓励.</p>
				 </div>
				 <div class="brief-grid-content2">
					 <h3>质量设计</h3>
					 <p>阿里云服务器，专业数据库，为您的数据保驾护航.</p>
				 </div>
			 </div>
		 </div>
		 <div class="col-md-6 brief-grids wow fadeInRight" data-wow-delay="0.5s">
			 <img src="images/browse2.jpg" alt=""/>
			 <div class="brief-grid">
				 <div class="brief-grid-text">
					 <h3>了解更多产品</h3>
					 <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, 
					 quis nostrud exercitation ullamco laboris nisi ut.</p>
				 </div>
				 <div class="brief-grid-content1 good">
					 <h3>追求极致的性能</h3>
					 <p>Lorem lean startup ipsum product market fit customer development 
						acquihire technical cofounder.</p>
				 </div>
				 <div class="brief-grid-content2 video-bac">
					 <h3>视频背景</h3>
					 <p>Lorem lean startup ipsum product market fit customer development 
						acquihire technical cofounder.</p>
				 </div>
			 </div>
		 </div>
		 <div class="clearfix"></div>		 
	 </div>
</div>
<!---->
<div id="features" class="features">
	 <div class="container">
		 <div class="feature-text text-center">
			 <h3>特性</h3>
			 <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
		 </div>
		 <div class="features-section">
			 <div class="col-md-6 feature-grid text-center">
			 <i class="f1 wow bounceIn" data-wow-delay="0.5s"></i>
			 <h3>响应式设计</h3>
			 <p>Lorem lean startup ipsum product market fit customer development acquihire technical cofounder. User engagement.
			 sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
			 </div>
			 <div class="col-md-6 feature-grid text-center">
			 <i class="f2 wow bounceIn" data-wow-delay="0.5s"></i>
			 <h3>使用Bootstarp</h3>
			 <p>Lorem lean startup ipsum product market fit customer development acquihire technical cofounder. User engagement.
			 sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
			 </div>
			 <div class="clearfix"></div>
			 <div class="col-md-6 feature-grid text-center">
			 <i class="f3 wow bounceIn" data-wow-delay="0.5s"></i>
			 <h3>自由定制</h3>
			 <p>Lorem lean startup ipsum product market fit customer development acquihire technical cofounder. User engagement.
			 sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
			 </div>
			 <div class="col-md-6 feature-grid text-center">
			 <i class="f4 wow bounceIn" data-wow-delay="0.5s"></i>
			 <h3>有效的标记</h3>
			 <p>Lorem lean startup ipsum product market fit customer development acquihire technical cofounder. User engagement.
			 sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
			 </div>
		 </div>
	 </div>
</div>
<!---->
<div id="pricing" class="pricing">
	 <div class="container">
		 <div class="pricing-text text-center">
			 <h3>价格和计划</h3>
			 <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
		 </div>
		 <div class="pricing-section">
			 <div class="col-md-4 pricing-grid wow fadeInUp" data-wow-delay="0.5s">
				 <div class="pricing-top text-center">
					 <h3>基础版</h3>
					 <p>只要 <span>3000</span>一年</p>
				 </div>
				 <div class="pricing-offer">
					 <ul>
						<li class="whyt"><a href="#">50GB 数据空间 </a></li>
						<li><a href="#">1000 用户</a></li>
						<li class="whyt"><a href="#">10 E-Mail Address </a></li>
						<li><a href="#">10GB带宽总量</a></li>
						<li class="whyt"><a href="#">后续技术支持</a></li>
				     </ul>
					 <div class="sign text-center">
						 <a href="#">入手</a>
					 </div>
				 </div>
			 </div>
			 <div class="col-md-4 pricing-grid wow fadeInDown" data-wow-delay="0.5s">
				 <div class="pricing-top text-center">
					 <h3>商务版</h3>
					 <p>只要 <span>9900</span>一年</p>
				 </div>
				 <div class="pricing-offer">
					 <ul>
						<li class="whyt"><a href="#">150GB 数据空间 </a></li>
						<li><a href="#">5000 用户</a></li>
						<li class="whyt"><a href="#">20 E-Mail Address </a></li>
						<li><a href="#">50GB 带宽总量 </a></li>
						<li class="whyt"><a href="#">后续技术支持</a></li>
				     </ul>
					 <div class="sign text-center">
						 <a href="#">入手</a>
					 </div>
				 </div>
			 </div>
			 <div class="col-md-4 pricing-grid wow fadeInUp" data-wow-delay="0.5s">
				 <div class="pricing-top text-center">
					 <h3>旗舰版</h3>
					 <p>只要 <span>15000</span>一年</p>
				 </div>
				 <div class="pricing-offer">
					 <ul>
						<li class="whyt"><a href="#">1TB 数据空间 </a></li>
						<li><a href="#">用户数量无限制</a></li>
						<li class="whyt"><a href="#">20 E-Mail Address </a></li>
						<li><a href="#">1TB 带宽总量 </a></li>
						<li class="whyt"><a href="#">后续技术支持</a></li>
				     </ul>
					 <div class="sign text-center">
						 <a href="#">入手</a>
					 </div>
				 </div>
			 </div>
			 <div class="clearfix"></div>
		 </div>
	 </div>
</div>
<!---->
<!--<div class="video">
	 <div class="container">
		 <div class="video-text text-center">
			 <h3>观看视频</h3>
			<p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
		 </div>
		 <div class="video-play ">
			 <div class="playing">				
				 
			 </div>
			 <h4 class="wow fadeInLeft" data-wow-delay="0.5s"><a href="#" class="p1">Trusted by 100+ users</a></h4>
			 <h4 class="wow fadeInUp" data-wow-delay="0.5s"><a href="#" class="p2">Video Documentation</a></h4>
			 <h4 class="wow fadeInRight" data-wow-delay="0.5s"><a href="#" class="p3">24/7 Chat Support</a></h4>			 
		 </div>
	 </div>
</div>-->
<!---->
<div id="screenshots" class="screenshots">
	 <div class="container">
		 <div class="screen-text text-center">
			 <h3>图片展示</h3>
			<p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
		 </div>
		 <!-- requried-jsfiles-for owl -->
				<link href="css/owl.carousel.css" rel="stylesheet">
							    <script src="js/owl.carousel.js"></script>
							        <script>
							    $(document).ready(function() {
							      $("#owl-demo").owlCarousel({
							        items : 1,
							        lazyLoad : true,
							        autoPlay : true,
							        navigation : false,
							        navigationText :  false,
							        pagination : true,
							      });
							    });
							    </script>
			<!-- //requried-jsfiles-for owl -->
		  <div id="owl-demo" class="owl-carousel">
			  <div class="item text-center guide-sliders">
				 <div class="col-md-4 image-grid">
					 <img src="images/sc1.JPG">					 
				 </div>
				 <div class="col-md-4 image-grid">
					 <img src="images/sc2.JPG">					 
				 </div>
				 <div class="col-md-4 image-grid">
					 <img src="images/sc3.JPG">					 
				 </div>				   
			  </div>			  
			  <div class="item text-center guide-sliders">
				 <div class="col-md-4 image-grid">
					 <img src="images/sc4.JPG">					 
				 </div>
				 <div class="col-md-4 image-grid">
					 <img src="images/sc5.JPG">					 
				 </div>
				 <div class="col-md-4 image-grid">
					 <img src="images/sc1.JPG">					 
				 </div>						
			  </div>
			  <div class="item text-center guide-sliders">
				 <div class="col-md-4 image-grid">
					 <img src="images/sc5.JPG">					 
				 </div>
				 <div class="col-md-4 image-grid">
					 <img src="images/sc4.JPG">					 
				 </div>
				 <div class="col-md-4 image-grid">
					 <img src="images/sc2.JPG">					 
				 </div>						
			  </div>
			  
		  </div>
	 </div>
</div>
<!---->
<div id="testimonial" class="trusted">
	 <div class="container">
		 <div class="trusted-text text-center">
			 <h3>我们有成千上万的信任</h3>
			<p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
		 </div>
		 <div class="sponcer">
			 <ul id="flexiselDemo1">
				<li>
					<div class="biseller-column">
					<img src="images/sld1.png" alt="">
					</div>
				</li>
				<li>
					<div class="biseller-column">
					<img src="images/sld2.png" alt="">
					</div>
				</li>
				<li>
					<div class="biseller-column">
					<img src="images/sld3.png" alt="">
					</div>
				</li>
				<li>
					<div class="biseller-column">
					<img src="images/sld4.png" alt="">
					</div>
				</li>
				<li>
					<div class="biseller-column">
					<img src="images/sld1.png" alt="">
					</div>
				</li>
				<li>
					<div class="biseller-column">
					<img src="images/sld3.png" alt="">
					</div>
				</li>
				<li>
					<div class="biseller-column">
					<img src="images/sld4.png" alt="">
					</div>
				</li>
				<li>
					<div class="biseller-column">
					<img src="images/sld2.png" alt="">
					</div>
				</li>
			 </ul>
			 <script type="text/javascript">
			 $(window).load(function() {
				$("#flexiselDemo1").flexisel({
					visibleItems: 4,
					animationSpeed: 1000,
					autoPlay: true,
					autoPlaySpeed: 3000,    		
					pauseOnHover: true,
					enableResponsiveBreakpoints: true,
					responsiveBreakpoints: { 
						portrait: { 
							changePoint:480,
							visibleItems: 1
						}, 
						landscape: { 
							changePoint:640,
							visibleItems: 2
						},
						tablet: { 
							changePoint:768,
							visibleItems: 3
						}
					}
				});
				
			 });
			   </script>
			   <script type="text/javascript" src="js/jquery.flexisel.js"></script>	
	     </div>
		  <div class="box-grids">
				 <div class="col-md-4 client wow fadeInLeft" data-wow-delay="0.5s">
					 <div class="box-grid">
					 <span></span>
					 <p>Lorem lean startup ipsum product market fit customer development acquihire technical cofounder. User engagement A/B testing shrink a market venture capital pitch deck. 
					 Social bookmarking group buying crowded market pivot onboarding.</p>
					 <label></label>
					 </div>
					 <h4><a href="#">Market Diaz</a></h4>
					 <p class="ceo">Abz Network</p>
				 </div>
				 <div class="col-md-4 client wow fadeInUp" data-wow-delay="0.5s">
					 <div class="box-grid">
					 <span></span>
					 <p>Lorem lean startup ipsum product market fit customer development acquihire technical cofounder. User engagement A/B testing shrink a market venture capital pitch deck. 
					 Social bookmarking group buying crowded market pivot onboarding.</p>
					 <label></label>
					 </div>
					 <h4><a href="#">Market Diaz</a></h4>
					 <p class="ceo">Abz Network</p>
				 </div>
				 <div class="col-md-4 client wow fadeInRight" data-wow-delay="0.5s">
					 <div class="box-grid">
					 <span></span>
					 <p>Lorem lean startup ipsum product market fit customer development acquihire technical cofounder. User engagement A/B testing shrink a market venture capital pitch deck. 
					 Social bookmarking group buying crowded market pivot onboarding.</p>
					 <label></label>
					 </div>	
						<h4><a href="#">Market Diaz</a></h4>
					 <p class="ceo">Abz Network</p>
				 </div>
				 <div class="clearfix"></div>
		  </div>
	</div>
</div>
<!---->
<div class="get-started">
	 <div class="container">
		 <h4 class="wow bounceInLeft" data-wow-delay="0.5s">我们已经准备好</h4>
		 <h3 class="wow bounceInRight" data-wow-delay="0.5s">为你的企业提供最好的解决方案</h3>
		 <a href="#">让我们开始</a>
	 </div>
</div>
<!---->

<!---->
<div class="footer">
	 <div class="container">
		 <div class="ftr-logo">
			 <a class="wow bounceIn" data-wow-delay="0.5s" href="index.php"><img src="images/logo2.png" alt=""/></a>
		 </div>
		 <div class="copy-right wow bounceInUp" data-wow-delay="0.5s">
			 <p>Copyright &copy; 2016.YunKu All rights reserved.</p>
		 </div>

	 </div>
</div>
<!---->
<script type="text/javascript">
		$(document).ready(function() {
				/*
				var defaults = {
				containerID: 'toTop', // fading element id
				containerHoverID: 'toTopHover', // fading element hover id
				scrollSpeed: 1200,
				easingType: 'linear' 
				};
				*/
		$().UItoTop({ easingType: 'easeOutQuart' });
});
</script>
<a href="#to-top" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>
<!----> 
 </body>
 </html>