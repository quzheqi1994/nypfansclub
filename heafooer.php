<?php
//获取头部和尾部的内容
function getHeader($index){
	$return = '
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
						<li><a href="/news">行程</a></li>
						<li><a href="/media">影音</a></li>
						<li><a href="/shop">周边</a></li>
						<li><a href="/forum">论坛</a></li>
						<li><a href="/award">来啊</a></li>
					</ul>           
				</div><!--/.nav-collapse -->
			</div>     
		</nav>
	    <!--=========== END 标题导航模块 ================--> 
	';

	switch($index){
		case 0:
			$return = str_replace('<li><a href="/">','<li class="active"><a href="/">',$return);
		break;
		case 1:
			$return = str_replace('<li><a href="/news">','<li class="active"><a href="/news">',$return);
		break;
		case 2:
			$return = str_replace('<li><a href="/media">','<li class="active"><a href="/media">',$return);
		break;
		case 3:
			$return = str_replace('<li><a href="/shop">','<li class="active"><a href="/shop">',$return);
		break;
	}
	return $return;
}    
	    
function getFooter(){
	return '
		<!--=========== BEGIN 底部脚本 ================-->
		<footer>
			<div class="container spread">
				<div class="col-md-4 col-sm-12">
					<div class="row">
						<div class="col-md-6 col-xs-6">
							<p><span>联系我们</span></p>
							<p><a href="http://mail.qq.com/cgi-bin/qm_share?t=qm_mailme&email=advice@nypfansclub.cn">发送邮件</a></p>
							<p><a href="https://weibo.com/u/5982735156">关注微博</a></p>
							<p><a href="https://shang.qq.com/wpa/qunwpa?idkey=c9fdba8bd747db1ead2e7aa4915a79ae97de42d9ebb74464fb207a195474820d">加入qq群</a>
						</div>
						<div class="col-md-6 col-xs-6">
							<p><span>自媒体</span></p>
							<p><a href="https://space.bilibili.com/226673030">Bilibili</a></p>
							<p><a href="http://music.163.com/#/user/home?id=1309012109">网易云音乐</a></p>
							<p><a href="#">微信公众号</a></p>
						</div>
					</div>
				</div>
				<div class="col-md-4 col-sm-12">
					<div class="row">
						<div class="col-md-6 col-xs-6">
							<p><span>友情链接</span></p>
							<p><a href="https://www.nypfansclub.cn">农燕萍应援会</a></p>
							<p><a href="https://www.nypfansclub.cn">农燕萍应援会</a></p>
							<p><a href="https://www.nypfansclub.cn">农燕萍应援会</a></p>
						</div>
						<div class="col-md-6 col-xs-6">
							<p><span>集资打卡</span></p>
							<p><a href="https://zhongchou.modian.com/item/15649.html">总选集资</a></p>
							<p><a href="#">积分规则</a></p>
						</div>
					</div>
				</div>
				<div class="col-md-4 col-sm-12">
					<div class="row">
						<div class="col-md-6 col-xs-6">
							<p><span>关于农燕萍</span></p>
							<p><a href="#">农燕萍简介</a></p>
							<p><a href="http://www.gnz48.com/nongyanping/">农燕萍主页</a></p>
							<p><a href="https://weibo.com/u/6034212582">农燕萍微博</a></p>
						</div>
						<div class="col-md-6 col-xs-6">
							<p><span>关于应援会</span></p>
							<p><a href="#">应援会简介</a></p>
						</div>
					</div>
				</div>
			</div>
			<hr/>2018  黑ICP备18001969号   <a href="http://www.nypfansclub.cn/" target="_blank">农燕萍应援会</a>版权所有
		</footer>
		<!--=========== END 底部脚本 ================-->
	';
}
function getPreLoader(){
	return '	<div id="preloader"><span></span><span></span><span></span><span></span><span></span></div>';
}
//获取各种样式
function getMeta($title){
	return '	<meta charset="utf-8">
	<meta name="viewport" content="target-densitydpi=device-dpi, width=device-width, initial-scale=1, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">
	<title>'.$title.'</title>';
}
function getBootStrap($bWithJS){
	$return = '
	<!--bootstrap-->
	<script src="/js/jquery.min.js"></script>
	<link  href="/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
	';
	if($bWithJS)
		$return .='<script src="/js/bootstrap.min.js"></script>
		';
	return $return;
}
function getHeaFooer($bWithPre){
	$return= '
	<!--header and footer-->
	<script src="/js/header.js"></script>
	<link  href="/css/header.css" rel="stylesheet" type="text/css"/>';
	if($bWithPre)
		$return.='
	<script src="/js/preloader.js"></script>
	<link  href="/css/preloader.css" rel="stylesheet" type="text/css"/>';
	return $return;
}
function getSelfStyle($styleAdded=""){
	$return= '
	<!--file style and action-->
	<script src="js/ElementGen.js"></script>
	<script src="js/action.js"></script>
	<link  href="css/style.css" rel="stylesheet" type="text/css"/>';
	$return .= getOnlyStyle($styleAdded);
	return $return;
}
function getOnlyStyle($styleAdded=""){
	$return= '';
	if($styleAdded!=""){
		$return.='
	<script src="js/'.$styleAdded.'.js"></script>
	<link  href="css/'.$styleAdded.'.css" rel="stylesheet" type="text/css"/>';
	}
	return $return;
}
?>