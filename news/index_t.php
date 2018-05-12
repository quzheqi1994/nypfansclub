<?php
	require_once("../service/php/LCSrv.php");
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no">
	<title>行程安排</title>

	<script src="/js/jquery.min.js"></script>
	<script src="/js/bootstrap.min.js"></script>
	<link  href="/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
	<script src="/js/header.js"></script>
	<link  href="/css/header.css" rel="stylesheet" type="text/css"/>
	<script src="/js/preloader.js"></script>
	<link  href="/css/preloader.css" rel="stylesheet" type="text/css"/>
</head>
<body>
	<div id="preloader"><span></span><span></span><span></span><span></span><span></span></div>
	<div class="main_div">
		<!--=========== BEGIN 标题导航模块 ================-->
		<nav class="navbar navbar-default navbar-fixed-top">  
			<div class="container">
				<div class="navbar-header">
					<!-- FOR MOBILE VIEW COLLAPSED BUTTON -->
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="/">GNZ48-<span>农燕萍应援会</span></a>            
				</div>
				<div id="navbar" class="navbar-collapse collapse">
					<ul id="top-menu" class="nav navbar-nav navbar-right">
						<li><a href="/">首页</a></li>
						<li class="active"><a href="#">行程</a></li>
						<li><a href="/media">影音</a></li>
						<li><a href="/shop">周边</a></li>
						<li><a href="/forum">论坛</a></li>
						<li><a href="/award">登录来啊</a></li>
					</ul>           
				</div><!--/.nav-collapse -->
			</div>     
		</nav>
		<!--=========== END 标题导航模块 ================-->  
		<div class="container" style="margin-top:60px;">
			<img style="width:100%;height：100%;"src="/images/waiting.jpg"/>
		</div>
	</div>
</body>