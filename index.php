<?php
    require_once("api.php");
?>
<!DOCTYPE html>
<html>
<head>
<?php
    getMeta("农燕萍应援站");
    getBootStrap(true);
    getHeaFooer(false);
    getSelfStyle();
?>
    <!--Other Style-->
    <link  href="css/effects.css" rel="stylesheet" type="text/css"/>
</head>
<body>
<?php //echo getPreLoader(); ?>
    <div class="main_div">
<?php 
    echo getHeader(0);
    echo GenCarouselAndAlert();
?>
        <div class="container">
            <div class="lead-title">
                <h4>最新动态</h4><span><a href="/media">显示更多</a></span>
            </div>
            <div class="col-md-4 col-sm-4 col-xs-12">
                <div class="dynamic">
                    <iframe scrolling="no" src="//widget.weibo.com/weiboshow/index.php?language=&width=520&height=508&fansRow=0&ptype=1&speed=0&skin=1&isTitle=1&noborder=1&isWeibo=1&isFans=1&uid=6034212582&verifier=d529a5f6&dpc=1"></iframe>
                </div>
                <div class="line"></div>
            </div>
            <div class="col-md-8 col-sm-8 col-xs-12">
                <div class="dynamic">
                    <div><img src="images/news_icon.png"></div>
<?php echo GenNewDynamic();?>
                </div>
                <div class="line"></div>
            </div>
        </div>
        <!--=========== BEGIN 视频素材模块 ================--> 
        <div class="container" id="videodiv">
            <div class="lead-title">
                <h4>公演视频</h4><span><a href="/media">显示更多</a></span>
            </div>
<?php echo GenVideoList(13,60001,3,true,4);?>
        </div>
        <!--=========== END 视频素材模块 ================-->
        <!--=========== BEGIN 图片素材模块 ================-->
        <div class="container" id="picsdiv">
            <div class="lead-title">
                <h4>电台节目</h4><span><a href="/SecretBox">显示更多</a></span>
            </div>
<?php echo GenVideoList(1,50001,3,true,4);?>
        </div>
        <!--=========== END 图片素材模块 ================-->
        <!--=========== BEGIN 周边商城 ================-->  
        <div class="container" id="shopdiv">
            <div class="lead-title">
                <h4>周边购买</h4><span><a href="/shop">显示更多</a></span>
            </div>
<?php echo GenProductList();?>
        </div>
        <!--=========== END 周边商城 ================-->
<?php echo getFooter();?>
    </div>
</body>
</html>