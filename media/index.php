<?php 
	require_once("api.php");
?>
<!DOCTYPE html>
<html>
<head>
<?php
	echo getMeta("视频影音");
	echo getBootStrap(true);
	echo getHeaFooer(false);
	echo getSelfStyle();
?>
    <link  href="https://cdn.bootcss.com/font-awesome/4.6.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
</head>
<body>
<?php echo getHeader(2);?>
	<!--=========== BEGIN 内容模块 ================-->  
	<div class="container" style="margin-top:78px;">
		<div class="row">
			<div class="featured">
				<div class="main-vid">
					<div class="col-md-6 col-sm-12 col-xs-12" id="main-vid" style="margin-bottom:10px;">
						<div class="zoom-container">
							<div class="zoom-caption">
								<span>电台</span>
								<a href="/SecretBox"></a>
								<p style="padding:10px;font-size:20px;">小奶瓶的电台专题</p>
							</div>
							<img src="http://cdn.nypfansclub.cn/albumlist/bilibili/listradio.jpg"/>
						</div>
					</div>
				</div>
				<div class="sub-vid">
<?php
    echo GenVideoListCover(60001,3);
    echo GenVideoListCover(60002,3);
    echo GenVideoListCover(60003,3);
    echo GenVideoListCover(60004,3);
?>
				</div>
				<div class="clear"></div>
			</div>
		</div>
		<div class="row">
			<div id="main-content" class="col-md-8">
				<div class="box">
					<div class="box-header">
						<h2><i class="fa fa-globe"></i> 公演视频</h2>
					</div>
					<div class="box-content">
						<div class="row">
<?php
    echo GenVideoList(60001,6,true,4);
?>
						</div>
					</div>
				</div>
				<div class="box">
					<div class="box-header">
						<h2><i class="fa fa-play-circle-o"></i> 口袋录播</h2>
					</div>
					<div class="box-content">
						<div class="row">
<?php echo GenVideoList(60001,4,false,6); ?>
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
					<div class="heading"><h4><i class="fa fa-globe"></i> 精选视频</h4></div>
					<div class="content">
<?php
echo GenVideoList(50001,12,true,3);
?>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--=========== END 内容模块 ================--> 
<?php echo getFooter();?>
</body>