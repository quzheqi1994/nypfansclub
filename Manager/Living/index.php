<?php
    date_default_timezone_set("Asia/Shanghai");
    //直播m3u8源
	$src = array('9999',"2001","3001","6001","8001");
	$groupArray = array('SNH',"BEJ","GNZ","SHY","CKG");
	$qingxiduValue = array("超清","高清","流畅");
	//初始化默认值
    $gcode = 2; $group="GNZ";$qingxidu = 0;
    //组合来源
    if(isset($_GET['g']))
        switch($_GET['g']){
            case 0: $gcode = 0; $group = 'SNH'; break;
            case 1: $gcode = 1; $group = 'BEJ'; break;
            case 2: $gcode = 2; $group = 'GNZ'; break;
            case 3: $gcode = 3; $group = 'SHY'; break;
            case 4: $gcode = 4; $group = 'CKG'; break;
        }
    
    if(isset($_GET['q']))
        switch($_GET['q']){
            case 0: $qingxidu = 0; break;
            case 1: $qingxidu = 1; break;
            case 2: $qingxidu = 2; break;
        }

    //获取公演标题和背景图
    $url = ($gcode == 0)? "http://zhibo.ckg48.com" :"http://live.".strtolower($group)."48.com";
    $html = file_get_contents($url);
    $atitle = PregMatch("/<h2>([^<]+)<\/h2>\s+<p>([^<]+)/",$html,2);
    $title  = $atitle[0].$atitle[1];
    $aimg   = PregMatch("/<div class=\"v-img\">[^\n]+?\"([^\"]+)\"><\/a><\/div>/",$html,1);
    $image  = $aimg[0];

    /////颜色处理
	$colortable = array("145,204,234","236,24,84","159,191,64","226,0,205","164,98,0");
	$color = $colortable[$gcode];
    /////颜色处理结束/**/
    ////清晰度切换按钮，也可以直接通过播放器切换
	$changeButton = '';
	for($i=0;$i < 3;$i++)
        if($qingxidu!=$i)
        	$changeButton .= "<a class=\"sel_btn\" href=\"index.php?g=$gcode&q=$i\">".$qingxiduValue[$i]."</a>&nbsp;&nbsp;";

?>
<html>
    <head>
        <style>
            .little_screen{font-size:12px;}
            body{
                height: 95%;
                background-color:rgb(<?php echo $color;?>);
                background-image: url('<?php if(isset($image))echo $image;?>');
                background-repeat:no-repeat;
                background-position:0% 0%;  
                background-size:cover;
                color:rgb(<?php echo $color;;?>);
                text-shadow:#FFF 1px 0 0,#FFF 0 1px 0,#FFF -1px 0 0,#FFF 0 -1px 0;
                -webkit-text-shadow:#FFF 1px 0 0,#FFF 0 1px 0,#FFF -1px 0 0,#FFF 0 -1px 0;
                -moz-text-shadow:#FFF 1px 0 0,#FFF 0 1px 0,#FFF -1px 0 0,#FFF 0 -1px 0;
                *filter: Glow(color=#FFF, strength=1);
            }
            .sel_btn{
                height: 21px;
                line-height: 21px;
                padding: 0 4px;
                background: #02bafa;
                border: 1px #26bbdb solid;
                border-radius: 3px;
                color: #fff;
                display: inline-block;
                text-decoration: none;
                font-size: 12px;
                outline: none;
                color:rgb(<?php echo $color;;?>);
                text-shadow:#FFF 0px 0 0,#FFF 0 0px 0,#FFF 0x 0 0,#FFF 0 0px 0;
                -webkit-text-shadow:#FFF 0px 0 0,#FFF 0 0px 0,#FFF 0px 0 0,#FFF 0 0px 0;
                -moz-text-shadow:#FFF 0px 0 0,#FFF 0 0px 0,#FFF 0px 0 0,#FFF 0 0px 0;
            }
            #video{margin:0;float:left;width:75%;height:90%;}
            #video div{margin:0;}
            #live_plug_in {display:inline-block;}
        </style>
        <script>
        	window.onload = function(){
				if(document.documentElement.clientWidth<="950"){
                	document.getElementById("live_plug_in").setAttribute("class", "little_screen");
                    document.getElementById("h2").setAttribute("class", "little_screen");
                }
        	}
        	window.onresize = function(){
                if(document.documentElement.clientWidth>"950"){
                	document.getElementById("live_plug_in").setAttribute("class", "");
                    document.getElementById("h2").setAttribute("class", "");
                }
                else if(document.documentElement.clientWidth<="950"&&document.documentElement.clientWidth>"700"){
                	document.getElementById("live_plug_in").setAttribute("class", "little_screen");
                    document.getElementById("h2").setAttribute("class", "little_screen");
                }
        	}
        </script>
        <meta charset="utf-8" http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
        <title><?php echo $group."48直播-".$title;?></title>
    </head>
    <body>
        <h2 id="h2"><?php echo $title;?></h2>
        <?php
            /////时间处理
            $timetable = str_replace(' ','',substr($title,strpos($title,"2018")));
            $datenow   = date("Y年m月d日H:i:s");
            if($timetable !="" && strcmp($timetable,$datenow)>0)
                echo '<div id="video" style="text-align:center;font-size:80px;">尚未开始<br/>耐心等待</div>';
            else {
                echo "<!--".$group."48公演直播-->\n";
        ?>
		<div id="video"></div>
		<script type="text/javascript" src="../../service/videoplayer/ckplayer/ckservice.min.js" charset="UTF-8"></script>
		<script type="text/javascript">
			var videoObject = {
				container: '#video',
				variable: 'player',
				loaded: 'loadedHandler',
				autoplay: false,
				poster: '<?php if(isset($image))echo $image;?>',
				flashplayer: true,
				seek: 0,
				live:true,
				video: [
				    [<?php echo "'http://cyflv.ckg48.com/chaoqing/{$src[$gcode]}.flv', 'vod/flv', '超清', ";echo $qingxidu==0 ? 1 : 0;?>],
				    [<?php echo "'http://cyflv.ckg48.com/gaoqing/{$src[$gcode]}.flv', 'vod/flv', '高清', ";echo $qingxidu==1 ? 1 : 0;?>],
				    [<?php echo "'http://cyflv.ckg48.com/liuchang/{$src[$gcode]}.flv', 'vod/flv', '流畅', ";echo $qingxidu==2 ? 1 : 0;?>]
			    ]
			};
			var player = new ckplayer(videoObject);
		</script>
<?php }?>
        <div id="live_plug_in" class="">
            <h4 align="center">直播录像插件</h4>
            <a class="sel_btn" href="https://pan.baidu.com/s/1Wb8EJBWzCYssQM0Mr4Vk3g" target="_blank">下载插件</a>百度网盘下载密码: bbfx<br/><hr/>
            <a class="sel_btn" href="camerasnh://">打开录像</a>点击开始录制<br/><hr/>
            <?php
                for($i=0;$i<5;$i++){
                    if($gcode!=$i)
                        echo "\n            <a class=\"sel_btn\" href=\"index.php?&g=$i&q=$qingxidu\">$groupArray[$i]"."48</a>&nbsp;&nbsp;";
                }
                echo "\n            <hr/>当前画质：".$qingxiduValue[$qingxidu]."&nbsp;切换：$changeButton";
            ?>
            <hr/>
            <span align="center">控制区:</span>
            <a class="sel_btn" href="javascript:player.playOrPause();">播放/暂停</a>
            <a class="sel_btn" href="javascript:player.changeControlBarShow(false);">隐藏控制栏</a>
            <a class="sel_btn" href="javascript:player.changeControlBarShow(true);">显示控制栏</a>
            <a class="sel_btn" href="#">全屏</a>
            <hr/><span align="center">默认操作方法</span><br/><hr/>
          	F7：录制/停止，F8：暂停/继续<br/><hr/>
            F9：截图，F10：隐藏框体<br/><hr/>
            默认录制视频储存位置：D:\<br/><hr/>
            默认不会录制鼠标，请放心<br/><hr/>
            <!--<div id = "ishow"></div>-->
        </div>
    </body>
</html>



<?php
    function pregMatch($preg,$string,$count){
        preg_match($preg,$string,$array);
        $ct = count($array);
        if($ct < $count+1) return false;
        for($i = 1;$i < $ct;$i++)
            $ret[$i-1] = trim($array[$i]);
        return $ret;
    }
?>