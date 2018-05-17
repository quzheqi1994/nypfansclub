<?php require_once("../heafooer.php");?>
<!doctype html>
<html>
<head>
<?php echo getMeta("奶瓶的秘密盒子");?>
    <script src="/js/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="css/player.css">
    <link rel="stylesheet" type="text/css" href="css/small.css">
    <link rel="stylesheet" type="text/css" href="css/jquery.mCustomScrollbar.min.css">
</head>
<body>

<div id="blur-img"></div>

<!-- 头部logo -->
<div class="header">
    <div class="logo" title="Version 2.4; Based on Meting; Powered by Mengkun">
        ♫ 奶瓶的秘密盒子
    </div>
</div>  <!--class="header"-->

<!-- 中间主体区域 -->
<div class="center">
    <div class="container">
        <div class="btn-bar">
            <!-- tab按钮区 -->
            <div class="btn-box" id="btn-area">
                <span class="btn" data-action="player" hidden>播放器</span>
                <span class="btn" data-action="playing" title="正在播放列表">正在播放</span>
                <span class="btn" data-action="sheet" title="音乐播放列表">播放列表</span>
            </div>
        </div>  <!--class="btn-bar"-->
        
        <div class="data-area">
            <!--歌曲歌单-->
            <div id="sheet" class="data-box" hidden></div>
            
            <!--音乐播放列表-->
            <div id="main-list" class="music-list data-box"></div>
        </div>  <!--class="data-area"-->
        
        <!-- 右侧封面及歌词展示 -->
        <div class="player" id="player">
            <!--歌曲封面-->
            <div class="cover">
                <img src="images/player_cover.png" class="music-cover" id="music-cover">
            </div>
            <!--滚动歌词-->
            <div class="lyric">
                <ul id="lyric"></ul>
            </div>
        </div>
    </div>  <!--class="container"-->
</div>  <!--class="center"-->

<!-- 播放器底部区域 -->
<div class="footer">
    <div class="container">
        <div class="con-btn">
            <a href="javascript:;" class="player-btn btn-prev" title="上一首"></a>
            <a href="javascript:;" class="player-btn btn-play" title="暂停/继续"></a>
            <a href="javascript:;" class="player-btn btn-next" title="下一首"></a>
			<a href="javascript:;" class="player-btn btn-order" title="循环控制"></a>
        </div>  <!--class="con-btn"-->
        
        <div class="vol">
            <div class="quiet">
                <a href="javascript:;" class="player-btn btn-quiet" title="静音"></a>
            </div>
            <div class="volume">
                <div class="volume-box">  
                    <div id="volume-progress" class="mkpgb-area"></div>
                </div>
            </div>
        </div>  <!--class="footer"-->
        
        <div class="progress">
            <div class="progress-box">  
                <div id="music-progress" class="mkpgb-area"></div>
            </div>
        </div>  <!--class="progress"-->
    </div>  <!--class="container"-->
</div>  <!--class="footer"-->

<!-- layer弹窗插件 -->
<script src="plugin/layer.js"></script>

<!-- 播放器数据加载模块 -->
<script src="js/ajax.js"></script>

<!-- 播放器歌词解析模块 -->
<script src="js/lyric.min.js"></script>

<!-- 封装函数及ui交互模块 -->
<script src="js/functions.js"></script>

<!-- 播放器主体功能模块 -->
<script src="js/player.js"></script>

<!-- 滚动条美化插件 -->
<script src="js/jquery.mCustomScrollbar.concat.min.js"></script>

<!-- 背景模糊化插件 -->
<script src="js/background-blur.min.js"></script>
</body>
</html>