<?php require_once("../heafooer.php");?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no">
	<title>视频影音</title>

	<script src="/js/jquery.min.js"></script>
	<script src="/js/bootstrap.min.js"></script>
	<link  href="/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
	<script src="/js/header.js"></script>
	<script src="js/ElementGen.js"></script>
	<link  href="/css/header.css" rel="stylesheet" type="text/css"/>
	<link  href="css/style.css" rel="stylesheet" type="text/css"/>
	<script src="/js/preloader.js"></script>
	<link  href="/css/preloader.css" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" type="text/css" href="http://cdn.bootcss.com/font-awesome/4.6.0/css/font-awesome.min.css">
</head>
<body>
	<div id="preloader"><span></span><span></span><span></span><span></span><span></span></div>
	<div class="main_div">
<?php echo getHeader(2);?>
		<!--=========== BEGIN 内容模块 ================-->  
		<div class="container" style="margin-top: 78px;">
			<div class="row">
				<div id="main-content" class="col-md-8">
					<div class="box" id="palyers"></div>
					<div class="box">
						<div class="box-header">
							<h2><i class="fa fa-play-circle-o"></i> Random Videos</h2>
						</div>
						<div class="box-content">
							<div class="row">
								<div class="col-md-4" id="ra-vid1"></div>
								<div class="col-md-4" id="ra-vid2"></div>
								<div class="col-md-4" id="ra-vid3"></div>
							</div>
						</div>
					</div>
				</div>
				<div id="sidebar" class="col-md-4">
					<!---- Start Widget ---->
					<div class="widget wid-post">
						<div class="heading"><h4><i class="fa fa-globe"></i> Category</h4></div>
						<div class="content" id="ca-vid"></div>
					</div>
					<!---- Start Widget ---->
					<div class="widget wid-news">
						<div class="heading"><h4><i class="fa fa-clock-o"></i> Top News</h4></div>
						<div class="content" id="to-vid"></div>
					</div>
				</div>
			</div>
		</div>
<?php echo getFooter();?>
	</div>
</body>