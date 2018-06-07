<?php
	if(!isset($_GET['playlistid']))
		header('Location: https://www.nypfansclub.cn/media/404.php');
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
<?php //echo getPreLoader();?>
    <div class="main_div">
<?php echo getHeader(2);?>
        <!--=========== BEGIN 内容模块 ================-->  
        <div class="container" style="margin-top:78px;">
            <div class="row">
                <div id="main-content" class="col-md-8">
                    <div class="box">
                        <div class="box-header">

<?php
    $arr = getArrOne("playlist","playlistid=".$_GET['playlistid'],'name');
    echo '<h2><i class="fa fa-play-circle-o"></i>  '.$arr['name'].'</h2>';
?>
                        </div>
                        <div class="box-content">
                            <div class="row">
<?php
    echo  GenVideoList($_GET['playlistid'],4);
?>
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
                        <div class="heading"><h4><i class="fa fa-globe"></i> 推荐</h4></div>
                        <div class="content">
<?php
    echo GenVideoListCover(60001,12);
    echo GenVideoListCover(60003,12);
?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--=========== END 内容模块 ================--> 
<?php echo getFooter();?>
        </div>
</body>