<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no">
    <title>我的信息</title>

    <script src="/service/av.min.js" type="text/javascript"></script>
    <script src="/service/initLeanCloud.js" type="text/javascript"></script>

    <script src="/js/jquery.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <link  href="/css/bootstrap.min.css" rel="stylesheet">
	
    <script src="js/main.js" type="text/javascript"></script>
    <script src="js/awardRotate.js" type="text/javascript"></script>
    <script src="js/awardInit.js" type="text/javascript"></script>
    <link  href="css/style.css" rel="stylesheet">
</head>
<body>
    <div class="container">
		<div class="header clearfix">
			<nav>
				<ul class="nav pull-right">
					<li role="presentation" class="welcome">欢迎您<br/></li>
				</ul>
			</nav>
			<h3 class="text-muted">我的信息</h3>
		</div>
		<div class="tabbable">
			<ul class="nav nav-tabs">
				<li class="text-center col-md-4 col-sm-4" id="lead-li">
					<a href="#panel-1" data-toggle="tab">抽卡</a>
				</li>
				<li class="text-center col-md-4 col-sm-4" id="lead-li">
					<a href="#panel-2" data-toggle="tab">卡牌</a>
				</li>
				<li class="text-center col-md-4 col-sm-4 on active" id="lead-li">
					<a href="#panel-3" data-toggle="tab">信息</a>
				</li>
			</ul>
			<div class="tab-content">
				<div class="tab-pane" id="panel-1">
					<div class="col-md-12 col-sm-12 plate" style="overflow:hidden;">
						<img src="images/1.png" id="shan-img" style="display:none;" />
						<img src="images/2.png" id="sorry-img" style="display:none;" />
						<div class="banner">
							<div class="turnplate" style="background-size:100% 100%;">
								<canvas class="item" id="wheelcanvas" width="422px" height="422px"></canvas>
								<img class="pointer" src="images/turnplate-pointer.png"/>
							</div>
							<h4 class="text-center" id="lottery-marks">剩余积分10000</h4>
						</div>
					</div>
				</div>
				<div class="tab-pane" id="panel-2">
					<div class="col-md-12 col-sm-12 cards-list">
					  <div class="nav">
						<ul class="list-inline text-center">
						  <li class="item t1"><i></i><em></em><span></span></li>
						  <li class="item t2"><i></i><em></em><span></span></li>
						  <li class="item t3"><i></i><em></em><span></span></li>
						  <li class="item t4"><i></i><em></em><span></span></li>
						  <li class="item t5"><i></i><em></em><span></span></li>
						</ul>
					  </div>
					  <div class="box">
						<div class="p p1 show">
						  <span></span><img src="images/p1.png">
						</div>
						<div class="p p2">
						  <span></span><img src="images/p2.png">
						</div>
						<div class="p p3">
						  <span></span><img src="images/p3.png">
						</div>
						<div class="p p4">
						  <span></span><img src="images/p4.png">
						</div>
						<div class="p p5">
						  <span></span><img src="images/p5.png">
						</div>
					  </div>
					</div>
				</div>
				<div class="tab-pane active" id="panel-3">
					<div class="col-md-12 col-sm-12 message">
						<div class="panel-group wrap" id="accordion" role="tablist">
							<div class="panel">
								<div class="panel-heading" role="tab" id="heading1">
									<a class="btn btn-block text-left" data-toggle="collapse" data-parent="#accordion" href="#collapse1">
									我的QQ号</a>
								</div>
								<div id="collapse1" class="panel-collapse collapse" role="tabpanel">
									<div class="panel-body" id="tecent_id">
										<span>00000000</span><a href="#">变更</a>
									</div>
								</div>
							</div>
						  <!-- end of panel -->

							<div class="panel">
								<div class="panel-heading" role="tab" id="heading2">
									<a class="btn btn-block text-left" data-toggle="collapse" data-parent="#accordion" href="#collapse2">
									我的摩点ID</a>
								</div>
								<div id="collapse2" class="panel-collapse collapse" role="tabpanel">
									<div class="panel-body" id="modian_id">
										<span>wds_00000000</span><a href="#">变更</a>
									</div>
								</div>
							</div>
						  <!-- end of panel -->

							<div class="panel">
								<div class="panel-heading" role="tab" id="heading3">
									<a class="btn btn-block text-left" data-toggle="collapse" data-parent="#accordion" href="#collapse3">
									集资与积分</a>
								</div>
								<div id="collapse3" class="panel-collapse collapse" role="tabpanel">
									<div class="panel-body">
										<h4>当前累计积分<span id="marks"></span></h4>
										<h4 style="display:inline-block;">您的集资记录如下：</h4>
										<ol id="Record"></ol>
									</div>
								</div>
							</div>
						  <!-- end of panel -->
						  
							<div class="panel">
								<div class="panel-heading" role="tab" id="heading4">
									<a class="btn btn-block text-left" data-toggle="collapse" data-parent="#accordion" href="#collapse4">
									已获得卡牌</a>
								</div>
								<div id="collapse4" class="panel-collapse collapse" role="tabpanel">
									<div class="panel-body" id="cards-number"></div>
									<div class="panel-body" id="shop">
										<h4>您已集齐<span></span>套卡牌</h4>
										请前往周边商城兑换奖励或购买周边
									</div>
								</div>
							</div>
						  <!-- end of panel -->
						  
						</div>
						<a href="/shop" id="logout" class="btn btn-block btn-success">周边商城</a>
						<a href="/" id="logout" class="btn btn-block btn-info">回到首页</a>
						<a href="#" id="logout" class="btn btn-block btn-danger" onclick="logout()">退出登录</a>
						<!-- end of #accordion -->
					  </div>
				</div>
			</div>
		</div>
    </div> <!-- /container -->

	<script>
		$(function() {
			if (AV.User.current()) {
				setupData(AV.User.current());
			} else {
				window.location.href = "/auth";
			}
			$('.nav li').on('click', function () {
				$(this).addClass('on').siblings().removeClass('on');
				$('.p').eq($(this).index()).addClass('show').siblings().removeClass('show');
			});
		});
	</script>

  </body>
</html>
