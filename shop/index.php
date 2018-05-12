<?php
	require_once("../service/php/LCSrv.php");
	require_once("../heafooer.php");
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no">
	<title>周边商城</title>

	<script src="/js/jquery.min.js"></script>
	<script src="/js/bootstrap.min.js"></script>
	<link  href="/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
	<script src="/js/header.js"></script>
	<link  href="/css/header.css" rel="stylesheet" type="text/css"/>
<?php if(!isset($_GET['ID'])){ ?>
	<script src="/js/preloader.js"></script>
	<link  href="/css/preloader.css" rel="stylesheet" type="text/css"/>
<?php } ?>
	<script src="js/imagezoom.min.js"></script>
	<script src="js/jquery.flexslider-min.js"></script>
	<link  href="css/flexslider.min.css" rel="stylesheet" type="text/css"/>
	<link  href="css/style.css" rel="stylesheet" type="text/css"/>
</head>
<body>
<?php if(!isset($_GET['ID'])){ ?>
	<div id="preloader"><span></span><span></span><span></span><span></span><span></span></div>
<?php } ?>
	<div class="main_div">
<?php echo getHeader(3);?>
		<!--=========== BEGIN 商城模块 ================-->  
		<div class="container" style="margin-top:60px;">
			<div class="single">
				<div class="col-md-9 top-in-single">

	<?php 
	if(isset($_GET['ID'])){
		$ID = $_GET['ID'];
		$results = QueryExec("select * from Shop where ID = $ID");
		$result = $results['results'][0];
		$name = $result->get('name');
		$money = $result->get('money');
		$mark = $result->get('mark');
		
		$results = QueryExec("select * from ShopIn where ID = $ID");
		$result = $results['results'][0];
		$url = $result->get('url');
		$imgs = explode(",",$result->get('imgs'));
		$img1 = $imgs[0];
		$img2 = $imgs[1];
		$img3 = $imgs[2];
		$img4 = $imgs[3];
		$des = $result->get('description');
		echo "
					<!--=========== BEGIN 当前商品模块 ================-->
					<div class='col-md-5 single-top'>	
						<!-- start product_slider -->
						<div class='flexslider'>
							<ul class='slides'>
								<li data-thumb='$img1'>
									<div class='thumb-image'> <img src='$img1' data-imagezoom='true' class='img-responsive'> </div>
								</li>
								<li data-thumb='$img2'>
									<div class='thumb-image'> <img src='$img2' data-imagezoom='true' class='img-responsive'> </div>
								</li>
								<li data-thumb='$img3'>
									<div class='thumb-image'> <img src='$img3' data-imagezoom='true' class='img-responsive'> </div>
								</li>
								<li data-thumb='$img4'>
									<div class='thumb-image'> <img src='$img4' data-imagezoom='true' class='img-responsive'> </div>
								</li>
							</ul>
							<div class='clearfix'></div>
						</div>
						<!-- end product_slider -->

					</div>	
					<div class='col-md-7 single-top-in'>
						<div class='single-para'>
							<h4>$name</h4>
							<div class='para-grid'>
								<span  class='add-to'>￥$money 元 +$mark 积分</span>
								<a href='heading.php?ID=$ID&url=$url' class='hvr-shutter-in-vertical cart-to'>前往购买</a>					
								<div class='clearfix'></div>
							 </div>
							<!--<h5>已售100件</h5>-->
							<div class='available'>
								<h6>请选择型号</h6>
								<select>
									<option>无可选型号</option>
								</select>
							</div>
							<p>$des</p>
						</div>
					</div>
					<div class='clearfix'> </div>
					<!--=========== END 当前商品模块 ================--> 
		";
	}
	?>

					<!--=========== BEGIN 商品列表模块 ================-->
					<div class="content-top-in">
	<?php 
		$results = QueryExec("select * from Shop where ID > 0");
		$results = $results['results'];
		for($i=0;$i<count($results);$i++){
			$ID = $results[$i]->get('ID');
			$name = $results[$i]->get('name');
			$money = $results[$i]->get('money');
			$mark = $results[$i]->get('mark');
			$img = $results[$i]->get('img');
			echo "
						<div class='col-md-4 top-single'>
							<div class='col-md'>
								<img  src='$img'/>	
								<div class='top-content'>
									<h5>$name</h5>
									<div class='white'>
										<a href='index.php?ID=$ID' class='hvr-shutter-in-vertical hvr-shutter-in-vertical2'>前往查看</a>
										<p class='dollar'><span class='in-dollar'>￥</span><span>$money</span><span>+$mark 积分</span></p>
										<div class='clearfix'></div>
									</div>
								</div>							
							</div>
						</div>
			";
		}
		
	?>
						<div class="clearfix"></div>
					</div>
					<!--=========== END 商品列表模块 ================-->
				</div>
				<div class="col-md-3">
					<div class="single-bottom">
						<h4>周边分类查看</h4>
						<ul>
						<li><a href="index.php?class=0"><i> </i>第一类</a></li>
						<li><a href="index.php?class=1"><i> </i>第二类</a></li>
						<li><a href="index.php?class=2"><i> </i>第三类</a></li>
						<li><a href="index.php?class=3"><i> </i>第四类</a></li>
						<li><a href="index.php?class=4"><i> </i>第五类</a></li>
						</ul>
					</div>
					<div class="single-bottom">
						<h4>限时特价商品</h4>
						<!--=========== BEGIN 特价商品模块 ================-->
	<?php

		$results = QueryExec("select * from Shop where onsale = 1");
		$results = $results['results'];
		for($i=0;$i<count($results);$i++){
			$name = $results[$i]->get('name');
			$money = $results[$i]->get('money');
			$special_price = $results[$i]->get('special_price');
			$img = $results[$i]->get('img');
			echo "
						<div class='product'>
							<img class='img-responsive fashion' src='$img'>
							<div class='grid-product'>
								<a href='#' class='elit'>$name</a>
								<span class='price price-in'><small>￥$money</small> ￥$special_price</span>
							</div>
							<div class='clearfix'> </div>
						</div>
			";
		}
	?>
						<!--=========== END 特价商品模块 ================-->
					</div>
					<div class="clearfix"> </div>
				</div>
			</div>
		</div>
		<!--=========== END 商城模块 ================-->  
<?php echo getFooter();?>
	</div>
	<script type="text/javascript">
		$(document).ready(function() {
			$('.flexslider').flexslider({
				animation: "slide",
				controlNav: "thumbnails"
			});
		});
	</script>
</body>
</html>