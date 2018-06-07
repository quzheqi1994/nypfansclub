<?php
	if(!isset($_GET['id'])||!isset($_GET['list']))
		header('Location: https://www.nypfansclub.cn/media/404.php');
	require_once("api.php");
?>
<!DOCTYPE html>
<html>
<head>
<?php
	getMeta("视频影音");
	getBootStrap(true);
	getHeaFooer(false);
	//getHeaFooer(true);
?>
	<link  href="css/style.css" rel="stylesheet" type="text/css"/>
    <link  href="http://cdn.bootcss.com/font-awesome/4.6.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
</head>
<body>
<?php //getPreLoader();?>
	<div class="main_div">
<?php getHeader(2);?>
		<!--=========== BEGIN 内容模块 ================-->  
		<div class="container" style="margin-top: 78px;">
			<div class="row">
				<div id="main-content" class="col-md-8">
					<div class="box" id="palyers">
<?php
    $playlistid =  $_GET['list'];
    GenMainVideo($_GET['id'],$playlistid);
?>
					</div>
					<div class="box">
						<div class="box-header">
							<h2><i class="fa fa-play-circle-o"></i> 相关视频</h2>
						</div>
						<div class="box-content">
							<div class="row">
<?php echo GenVideoList($playlistid,4,false,6);?>
							</div>
						</div>
					</div>
				</div>
				<div id="sidebar" class="col-md-4">
					<!---- Start Widget ---->
					<div class="widget wid-post">
						<div class="heading"><h4><i class="fa fa-globe"></i> 专辑列表</h4></div>
						<div class="content">
<?php
	echo GenVideoListCover(60001,12);
	echo GenVideoListCover(60002,12);
	echo GenVideoListCover(60003,12);
?>
						</div>
					</div>
					<!---- Start Widget ---->
					<div class="widget wid-news">
						<div class="heading"><h4><i class="fa fa-clock-o"></i> 推荐视频</h4></div>
						<div class="content">
<?php echo GenVideoList(60001,12,false,6);?>
						</div>
					</div>
				</div>
			</div>
		</div>
<?php echo getFooter();?>
	</div>
</body>