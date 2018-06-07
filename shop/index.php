<?php require_once("api.php");?>
<!DOCTYPE html>
<html>
<head>
<?php
	echo getMeta("周边商城");
	echo getBootStrap(true);
	echo getHeaFooer(false);
	echo getSelfStyle();
?>
	<script src="js/imagezoom.min.js"></script>
	<script src="js/jquery.flexslider-min.js"></script>
	<link  href="css/flexslider.min.css" rel="stylesheet" type="text/css"/>
</head>
<body>
<?php echo getHeader(3);?>
	<!--=========== BEGIN 商城模块 ================-->  
	<div class="container" style="margin-top:60px;">
		<div class="single">
			<div class="col-md-9 top-in-single">
<?php if(isset($_GET['id'])) echo GenMainProduct($_GET['id']);?>
				<!--=========== BEGIN 商品列表模块 ================-->
				<div class="content-top-in">
<?php echo GenProductList(0);?>
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
<?php  echo GenSpecialProductList(); ?>
					<!--=========== END 特价商品模块 ================-->
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>
	<!--=========== END 商城模块 ================-->  
<?php echo getFooter();?>
</body>
</html>