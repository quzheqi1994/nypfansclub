<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>ckplayer</title>
		
		<style type="text/css">body{margin:0;padding:0px;font-family:"Microsoft YaHei",YaHei,"微软雅黑",SimHei,"黑体";font-size:14px}</style>
	</head>

	<body>
		<script type="text/javascript" src="ckplayer/ckplayer.js"></script>
		<div id="video" style="width:100%;"></div>
		<script type="text/javascript">
			window.onload=function(){
				urlArray=[['http://cyflv.ckg48.com/chaoqing/3001.flv', '', '超清', 10],['http://cyflv.ckg48.com/gaoqing/3001.flv', '', '高清', 5],['http://cyflv.ckg48.com/liuchang/3001.flv', '', '流畅', 0],];
				type=true;
				
				videoContainer = document.getElementById("video");
				videoContainer.style.height = videoContainer.offsetWidth/16*9+"px";
				var VideoObject = {
					container: '#video',
					autoplay: true,
					mobileCkControls:true,
					live:type,
					video: urlArray
				}
				new ckplayer(VideoObject);
			};
		</script><!--
		<p>
			<button type="button" onclick="player.videoPlay()">播放</button>
			<button type="button" onclick="player.videoPause()">暂停</button>
			<button type="button" onclick="player.playOrPause()">播放/暂停</button>
			<button type="button" onclick="player.videoMute()">静音</button>
			<button type="button" onclick="player.videoEscMute()">取消静音</button>
			<button type="button" onclick="player.screenshot('video',false,'视频截图')">视频截图(需要视频权限)</button>
			<button type="button" onclick="player.screenshot('player',false,'播放器截图')">播放器截图(需要视频权限)</button>
		</p>
		<p>
			<button type="button" onclick="player.changeControlBarShow(true)">显示控制栏</button>
			<button type="button" onclick="player.changeControlBarShow(false)">隐藏控制栏</button>
		</p>
		<p>
			<button type="button" onclick="player.videoRotation()">默认角度</button>
			<button type="button" onclick="player.videoRotation(1)">顺时针旋转</button>
			<button type="button" onclick="player.videoRotation(-1)">逆时针旋转</button>
			<button type="button" onclick="player.videoRotation(90)">旋转90</button>
			<button type="button" onclick="player.videoRotation(180)">旋转180</button>
			<button type="button" onclick="player.videoRotation(270)">旋转270</button>
			<button type="button" onclick="player.videoRotation(-90)">旋转-90</button>
			<button type="button" onclick="player.videoRotation(-180)">旋转-180</button>
			<button type="button" onclick="player.videoRotation(-270)">旋转-270</button>
		</p>
		<p>
			<button type="button" onclick="player.changePlaybackRate(1)">默认速度(仅H5)</button>
			<button type="button" onclick="player.changePlaybackRate(0)">0.5倍(仅H5)</button>
			<button type="button" onclick="player.changePlaybackRate(3)">1.5倍(仅H5)</button>
			<button type="button" onclick="player.changePlaybackRate(4)">2倍(仅H5)</button>
			
		</p>
		<p>
			<button type="button" onclick="player.changeConfig('config','timeScheduleAdjust',1)">正常拖动</button>
			<button type="button" onclick="player.changeConfig('config','timeScheduleAdjust',0)">不能拖动</button>
			<button type="button" onclick="player.changeConfig('config','timeScheduleAdjust',2)">只能前进（向右拖动）</button>
			<button type="button" onclick="player.changeConfig('config','timeScheduleAdjust',3)">只能后退</button>
			<button type="button" onclick="player.changeConfig('config','timeScheduleAdjust',4)">能回到第一次拖动时的位置</button>
			<button type="button" onclick="player.changeConfig('config','timeScheduleAdjust',5)">看过的地方可以随意拖动</button>
		</p>-->
	</body>

</html>