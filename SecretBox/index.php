<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=0">
    <meta http-equiv="Cache-Control" content="no-siteapp">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-touch-fullscreen" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="full-screen" content="yes">
    <meta name="browsermode" content="application">
    <meta name="x5-fullscreen" content="true">
    <meta name="x5-page-mode" content="app">
    <title>奶瓶的秘密盒子</title>
    <script src="/js/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="css/player.min.css">
    <link rel="stylesheet" type="text/css" href="css/small.min.css">
    <link rel="stylesheet" type="text/css" href="css/jquery.mCustomScrollbar.min.css">
    <link rel="stylesheet" href="plugin/skin/default/layer.css?v=3.0.2302" id="layuicss-skinlayercss">
</head>
<body>
    <div id="blur-img"></div>
    <div class="header"><div class="logo" title="Version 2.4; Based on Meting; Powered by Mengkun">♫ 奶瓶的秘密盒子</div></div>
    <div class="center">
        <div class="container">
            <div class="btn-bar">
                <div class="btn-box" id="btn-area">
                    <span class="btn" data-action="player" hidden>播放器</span>
                    <span class="btn" data-action="playing" title="正在播放列表">正在播放</span>
                    <span class="btn" data-action="sheet" title="音乐播放列表">播放列表</span>
                </div>
            </div>
            <div class="data-area">
                <div id="sheet" class="data-box" hidden></div>
                <div id="main-list" class="music-list data-box"></div>
            </div>
            <div class="player" id="player">
                <div class="cover"><img src="images/player_cover.png" class="music-cover" id="music-cover"></div>
                <div class="lyric"><ul id="lyric"></ul></div>
            </div>
        </div>
    </div>
    <div class="footer">
        <div class="container">
            <div class="con-btn">
                <a href="javascript:;" class="player-btn btn-prev" title="上一首"></a>
                <a href="javascript:;" class="player-btn btn-play" title="暂停/继续"></a>
                <a href="javascript:;" class="player-btn btn-next" title="下一首"></a>
    			<a href="javascript:;" class="player-btn btn-order" title="循环控制"></a>
            </div>
            <div class="vol">
                <div class="quiet"><a href="javascript:;" class="player-btn btn-quiet" title="静音"></a></div>
                <div class="volume"><div class="volume-box"><div id="volume-progress" class="mkpgb-area"></div></div></div>
            </div>
            <div class="progress"><div class="progress-box"><div id="music-progress" class="mkpgb-area"></div></div></div>
        </div>
    </div>
    <script src="plugin/layer.min.js"></script>
    <script src="js/ajax.min.js"></script>
    <script src="js/lyric.min.js"></script>
    <script src="js/functions.min.js"></script>
    <script src="js/player.min.js"></script>
    <script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="js/background-blur.min.js"></script>
</body>
</html>