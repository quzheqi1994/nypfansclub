<?php require_once("../heafooer.php");?>
<!DOCTYPE html>
<html>
<head>
<?php
	echo getMeta("视频影音");
	echo getBootStrap(true);
	echo getHeaFooer(true);
	echo getSelfStyle();
?>
    <link  href="https://cdn.bootcss.com/font-awesome/4.6.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
</head>
<body>
<?php echo getPreLoader();?>
	<div class="main_div">
<?php echo getHeader(2);?>
		<!--=========== BEGIN 内容模块 ================-->  
		<div class="container" style="margin-top:78px;">
			<div class="row">
				<div id="main-content" class="col-md-8">
					<div class="box">
						<div class="box-header">
							<h2><i class="fa fa-play-circle-o"></i> Random Videos</h2>
						</div>
						<div class="box-content">
							<div class="row">
								<div class="col-md-4 col-sm-4 col-xs-6" id="ra-vid1"></div>
								<div class="col-md-4 col-sm-4 col-xs-6" id="ra-vid2"></div>
								<div class="col-md-4 col-sm-4 col-xs-6" id="ra-vid3"></div>
								<div class="col-md-4 col-sm-4 col-xs-6" id="ra-vid4"></div>
								<div class="col-md-4 col-sm-4 col-xs-6" id="ra-vid5"></div>
								<div class="col-md-4 col-sm-4 col-xs-6" id="ra-vid6"></div>
							</div>
						</div>
					</div>
				</div>
				<div id="sidebar" class="col-md-4">
					<!---- Start Widget ---->
					<div class="widget wid-tags">
						<div class="heading"><h4><i class="fa fa-tags"></i>分类</h4></div>
						<div class="content">
							<ul class="list-inline">
								<li><a href="#">电台 ,</a></li>
								<li><a href="#">公演 ,</a></li>
								<li><a href="#">外务 ,</a></li>
								<li><a href="#">直播</a></li>
							</ul>
						</div>
						<div class="line"></div>
					</div>
					<!---- Start Widget ---->
					<div class="widget wid-post">
						<div class="heading"><h4><i class="fa fa-globe"></i> Category</h4></div>
						<div class="content">
							<div class="col-md-12 col-sm-6 col-xs-6" id="ca-vid1"></div>
							<div class="col-md-12 col-sm-6 col-xs-6" id="ca-vid2"></div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--=========== END 内容模块 ================--> 
<?php echo getFooter();?>
		</div>
</body>