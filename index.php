<?php require_once("/heafooer.php");?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<script src="/js/jquery.min.js"></script>
	<script src="/js/bootstrap.min.js"></script>
	<script src="/js/ElementGen.js"></script>
	<script src="/js/header.js"></script>
	<link  href="/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
	
	<script src="/js/preloader.js"></script>
	<link  href="/css/preloader.css" rel="stylesheet" type="text/css"/>
	
	<script src="js/mainpage.js"></script>
	<link  href="css/header.css" rel="stylesheet" type="text/css"/>
	<link  href="css/style.css" rel="stylesheet" type="text/css"/>
	<link  href="css/effects.css" rel="stylesheet" type="text/css"/>
	<title>农燕萍应援站</title>
</head>
<body>
	<div id="preloader"><span></span><span></span><span></span><span></span><span></span></div>
	<div class="main_div">
<?php echo getHeader(0);?>
	    <!--=========== BEGIN 图片轮播&基础提示框模块 ================-->  
		<div class="container" id="Carousel">
			<div id="myCarousel" class="carousel slide">
				<ol class="carousel-indicators">
					<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
					<li data-target="#myCarousel" data-slide-to="1"></li>
					<li data-target="#myCarousel" data-slide-to="2"></li>
				</ol>   
				<div class="carousel-inner">
					<div class="item active"><img src="/images/shutter_1.jpg"></div>
					<div class="item"><img src="/images/shutter_2.jpg"></div>
					<div class="item"><img src="/images/shutter_3.jpg"></div>
				</div>
			</div>
			<div class="alert-container" id="alertdiv"></div>
		</div>
		<!--=========== END 图片轮播&基础提示框模块 ================-->  
	    <!--=========== BEGIN 视频素材模块 ================--> 
		<div class="container" id="videodiv">
			<div class="lead-title">
				<h4>公演视频</h4><span><a href="/media">显示更多</a></span>
			</div>

        </div>
	    <!--=========== END 视频素材模块 ================-->
	    <!--=========== BEGIN 图片素材模块 ================-->
		<div class="container" id="picsdiv">
			<div class="lead-title">
				<h4>美颜盛世</h4><span><a href="/media">显示更多</a></span>
			</div>
		</div>
	    <!--=========== END 图片素材模块 ================-->
	    <!--=========== BEGIN 周边商城 ================-->  
		<div class="container" id="shopdiv">
			<div class="lead-title">
				<h4>周边购买</h4><span><a href="/shop">显示更多</a></span>
			</div>
		</div>
		<!--=========== END 周边商城 ================-->
<?php echo getFooter();?>
	</div>
</body>
</html>