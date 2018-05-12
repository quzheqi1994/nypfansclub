<?php require_once("../heafooer.php");?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no">
	<title>行程安排</title>
	<script src="/js/jquery.min.js"></script>
	<script src="/js/bootstrap.min.js"></script>
	<link  href="/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
	<!--标题和预加载模块-->
	<script src="/js/header.js"></script>
	<link  href="/css/header.css" rel="stylesheet" type="text/css"/>
	<script src="/js/preloader.js"></script>
	<link  href="/css/preloader.css" rel="stylesheet" type="text/css"/>
	
	<script src="js/news.js"></script>
    <link  href="css/news.css" rel="stylesheet">
	<script src="js/action.js" type="text/javascript"></script>
    <link  href="css/style.css" rel="stylesheet" type="text/css"/>
</head>
<body>
	<div id="preloader"><span></span><span></span><span></span><span></span><span></span></div>
	<div class="main_div">
		<!--<div data-am-widget="gotop" class="am-gotop am-gotop-fixed">
			<a href="#top">
				<img class="am-gotop-icon-custom" src="http://demo.cssmoban.com/cssthemes4/amz_17_bef/img/goTop.png"/>
			</a>
		</div>-->
<?php echo getHeader(1);?>
		<div class="pet_main" id="top" style="margin-top:78px;">
			<!--=========== BEGIN 行程安排模块 ================--> 
			<div class="panel" style="background:rgb(255,223,230)">
				<div class="panel-heading">
					<a class="btn btn-block" id="collswitch" data-toggle="collapse" href="#collapse" onclick="changeSwitch()">展开行程安排</a>
				</div>
				<div id="collapse" class="panel-collapse collapse">
					<div class="panel-body VivaTimeline">
						<dl>
							<dt>May 2016</dt>
							<dd class="pos-left clearfix">
								<div class="circ"></div>
								<div class="time">Feb 03</div>
								<div class="events">
									<div class="events-header">Event Heading</div>
									<div class="events-body">
										<div class="row">
											<div class="col-md-6 pull-left">
												<img class="img-responsive img-rounded" src="http://www.jq22.com/demo/jQueryTimeAxis201703212320/img/dog01.png" />
											</div>
											<div class="events-desc">Desc1</div>
										</div>
										<div class="row">
											<div class="col-md-6 pull-left">
												<img class="img-responsive img-rounded" src="http://www.jq22.com/demo/jQueryTimeAxis201703212320/img/dog01.png" />
											</div>
											<div class="events-desc">Desc2</div>
										</div>
									</div>
									<div class="events-footer"></div>
								</div>
							</dd>
							<dd class="pos-right clearfix">
								<div class="circ"></div>
								<div class="time">Feb 03</div>
								<div class="events">
									<div class="events-header">Event Heading</div>
									<div class="events-body">
										<div class="row">
											<div class="col-md-6 pull-left">
												<img class="img-responsive img-rounded" src="http://www.jq22.com/demo/jQueryTimeAxis201703212320/img/dog01.png" />
											</div>
											<div class="events-desc">Desc3</div>
										</div>
									</div>
									<div class="events-footer"></div>
								</div>
							</dd>
							<dt>Feb 2016</dt>
							<dt>Jan 2016</dt>
						</dl>
					</div>
				</div>
			</div>
			<!--=========== END 行程安排模块 ================-->
			<!--=========== BEGIN 分类导航模块 ================--> 
			<div class="pet_nav">
				<ul class="pet_nav_list">
					<li><a href="">&#xe61e;</a><span>新鲜事</span></li>
					<li><a href="">&#xe607;</a><span>趣闻</span></li>
					<li><a href="">&#xe62c;</a><span>阅读</span></li>
					<li><a href="">&#xe622;</a><span>专题</span></li>
					<li><a href="">&#xe629;</a><span>订阅</span></li>
					<li><a href="">&#xe602;</a><span>专栏</span></li>
					<li><a href="">&#xe604;</a><span>讨论</span></li>
					<li><a href="">&#xe600;</a><span>更多</span></li>
				</ul>
			</div>
			<!--=========== END 分类导航模块 ================-->
			<ul class="list">
				<li>
					<div class="col-md-12 col-xs-12 info">
						<div class="pet_l">
							<div class="img"><img class="img-responsive img-circle" src="http://demo.cssmoban.com/cssthemes4/amz_17_bef/img/a1.png"></div>
							<div class="name">作者</div>
						</div>
						<div class="pet_r">分类</div>
					</div>
					<div class="col-md-4 col-xs-4 images">
						<a href="#">
							<img src="http://demo.cssmoban.com/cssthemes4/amz_17_bef/img/q1.jpg" class="img-responsive"/>
						</a>
					</div>
					<div class="col-md-8 col-xs-8">
						<h3 class="title"><a href="news.html">新闻标题</a></h3>
						<div class="desc">猫咪不像人，猫咪的情绪不会写在脸上，反馈给我们的信息更多的应该是行为上肢体上的，当然从叫声中也会反应一些信息，那么要想“抓住它的心，就一定要抓住它的胃吗？”从它的行为和肢体语言当中我们可以读懂什么呢？</div>
					</div>
					<div class="col-md-12 col-xs-12 fill"></div>
				</li>
				<li>
					<div class="col-md-12 col-xs-12 info">
						<div class="pet_l">
							<div class="img"><img class="img-responsive img-circle" src="http://demo.cssmoban.com/cssthemes4/amz_17_bef/img/a1.png"></div>
							<div class="name">作者</div>
						</div>
						<div class="pet_r">分类</div>
					</div>
					<h3 class="title"><a>浣熊孤儿掉到树下，被一家人收养之后……</a></h3>
					<div class="col-md-4 col-xs-4 images">
						<a href="#">
							<img src="http://demo.cssmoban.com/cssthemes4/amz_17_bef/img/q1.jpg" class="img-responsive"/>
						</a>
					</div>
					<div class="col-md-4 col-xs-4 images">
						<a href="#">
							<img src="http://demo.cssmoban.com/cssthemes4/amz_17_bef/img/q1.jpg" class="img-responsive"/>
						</a>
					</div>
					<div class="col-md-4 col-xs-4 images">
						<a href="#">
							<img src="http://demo.cssmoban.com/cssthemes4/amz_17_bef/img/q1.jpg" class="img-responsive"/>
						</a>
					</div>
					<div class="col-md-12 col-xs-12 fill"></div>
					<div class="col-md-4 col-xs-4 images">
						<a href="#">
							<img src="http://demo.cssmoban.com/cssthemes4/amz_17_bef/img/q1.jpg" class="img-responsive"/>
						</a>
					</div>
					<div class="col-md-4 col-xs-4 images">
						<a href="#">
							<img src="http://demo.cssmoban.com/cssthemes4/amz_17_bef/img/q1.jpg" class="img-responsive"/>
						</a>
					</div>
					<div class="col-md-4 col-xs-4 images">
						<a href="#">
							<img src="http://demo.cssmoban.com/cssthemes4/amz_17_bef/img/q1.jpg" class="img-responsive"/>
						</a>
					</div>
					<div class="col-md-12 col-xs-12 fill"></div>
				</li>
				<li>
					<div class="col-md-12 col-xs-12 info">
						<div class="pet_l">
							<div class="img"><img class="img-responsive img-circle" src="http://demo.cssmoban.com/cssthemes4/amz_17_bef/img/a1.png"></div>
							<div class="name">作者</div>
						</div>
						<div class="pet_r">分类</div>
					</div>
					<h3 class="title"><a href="#">新闻标题</a></h3>
					<div class="col-md-12 col-xs-12 images
						<a href="#">
							<img src="http://demo.cssmoban.com/cssthemes4/amz_17_bef/img/c1.png" class="img-responsive"/>
						</a>
					</div>
					<div class="col-md-12 col-xs-12 desc">狗狗会天天的跟着我们生活在一起，它们的一切都会影响着主人，尤其是狗狗身上散发的味道，会无时无刻的对主人有影响，如果狗狗身体有异味，主人就会用过于香喷喷的洗漱品帮狗狗洗澡，这样不仅对狗狗身体有伤害，还会容易患上皮肤病，其实，我们知道一些小技巧，就会改善狗狗身上存在的味道。
					</div>
					<div class="col-md-12 col-xs-12 fill"></div>
				</li>
			</ul>
		</div>
		<!--=========== END 内容模块 ================-->
<?php echo getFooter();?>
	</div>
</body>
</html>