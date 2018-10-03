<?php
    date_default_timezone_set("Asia/Shanghai");
    //组合来源
    $msg = 2;
    if(isset($_GET['grp']))
        switch($_GET['grp']){
            case 'SNH': $msg = 0; break;
            case 'BEJ': $msg = 1; break;
            case 'GNZ': $msg = 2; break;
            case 'SHY': $msg = 3; break;
            case 'CKG': $msg = 4; break;
        }
    $group = array('SNH',"BEJ","GNZ","SHY","CKG");
    //获取公演标题和背景图
    $url = ($msg == 0)? "http://zhibo.ckg48.com" :"http://live.".strtolower($group[$msg])."48.com";
    $html = file_get_contents($url);
    $atitle = PregMatch("/<h2>([^<]+)<\/h2>\s+<p>([^<]+)/",$html,2);
    $title  = $atitle[0].$atitle[1];
    $aimg   = PregMatch("/<div class=\"v-img\">[^\n]+?\"([^\"]+)\"><\/a><\/div>/",$html,1);
    $image  = $aimg[0];

    /////颜色处理
	$colortable = array("145,204,234","236,24,84","159,191,64","226,0,205","164,98,0");
	$color = $colortable[$msg];
	switch($msg){
        case 0://SNH48
            if(strpos($title,"以爱之名")) $color = "174,134,186";
            if(strpos($title,"头号新闻")) $color = "248,150,0";
            if(strpos($title,"命运")) $color = "148,212,1";
            if(strpos($title,"代号")) $color = "3,192,112";
		break;
        case 1://BEJ48
            if(strpos($title,"奇幻加冕礼")) $color = "12,200,195";
            if(strpos($title,"因为喜欢你")) $color = "0,106,182";
		break;
        case 2://GNZ48
            if(strpos($title,"Fiona")) $color = "255,226,73";
            if(strpos($title,"三角函数")) $color = "234,97,123";
		break;
        case 3://SHY48
            if(strpos($title,"头号新闻")) $color = "82,26,113";
        break;
        case 4://CKG48
            if(strpos($title,"奇幻加冕礼")) $color = "255,80,67";
    }
    /////颜色处理结束/**/


    //直播m3u8源
	$src = array('9999',"2001","3001","6001","8001");
	$qingxiduIndex = array("chaoqing","gaoqing","liuchang");
	$qingxiduValue = array("超清","高清","流畅");
    //清晰度
    $index_qingxidu = isset($_GET['qingxidu'])? $_GET['qingxidu'] : 0;

	$changeButton = '';
	for($i=0;$i < 3;$i++)
        if($index_qingxidu!=$i)
        	$changeButton .= "<a class=\"sel_btn\" href=\"index.php?grp=$group[$msg]&qingxidu=$i\">".$qingxiduValue[$i]."</a>&nbsp;&nbsp;";
    ////清晰度处理结束
?>
<html>
    <head>
        <style>
            .little_screen{font-size:12px;margin-right:5%;}
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
            div{float:right;margin-right:10%;}
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
        <title><?php echo $group[$msg]."48直播";?></title>
    </head>
    <body>
        <div id="live_plug_in" class="">
            <h4 align="center">直播录像插件</h4>
            <a class="sel_btn" href="https://pan.baidu.com/s/1Wb8EJBWzCYssQM0Mr4Vk3g" target="_blank">下载插件</a>百度网盘下载密码: bbfx<br/><hr/>
            <a class="sel_btn" href="#">安装方法</a>请看下载文件中的安装方法<br/><hr/>
            <a class="sel_btn" href="#">使用方法</a>相信你可以无师自通<br/><hr/>
            <a class="sel_btn" href="camerasnh://">打开录像</a>可以开始录制公演视频啦<br/><hr/>
            <?php
                for($i=0;$i<5;$i++){
                    if($msg!=$i)
                        echo "\n            <a class=\"sel_btn\" href=\"index.php?&grp=$group[$i]&qingxidu=$index_qingxidu\">$group[$i]"."48</a>&nbsp;&nbsp;";
                }
                echo "\n            <hr/>当前画质：".$qingxiduValue[$index_qingxidu]."&nbsp;切换：$changeButton";
            ?>
            <hr/>
            <span align="center">默认操作方法</span><br/><hr/>
          	F7：录制/停止，F8：暂停/继续<br/><hr/>
            F9：截图，F10：隐藏框体<br/><hr/>
            默认录制视频储存位置：D:\<br/><hr/>
            默认不会录制鼠标，请放心<br/><hr/>
            <!--<div id = "ishow"></div>-->
        </div>
        <h2 id="h2" style="display:inline"><?php echo $title;?></h2><br/><br/>
        <?php
            /////时间处理
            if(strpos($title,"2018")>0){//查询到时间
                $timetable = str_replace(' ','',substr($title,strpos($title,"2018")));
                $datenow   = date("Y年m月d日H:i:s");
                if(strcmp($timetable,$datenow)>0){
                    echo '<div style="float:left;width:40%;height:80%;text-align:right;font-size:100px;">尚未开始<br/>耐心等待</body></html>';
                    exit();
                }
            }
        ?>
<!--<?php echo $group[$msg]."48公演直播";?>-->
        <object type="application/x-shockwave-flash" id="SewisePlayer" data="http://live.gnz48.com/Public/flash/SewisePlayer.swf" width="60%" height="80%">
            <param name="allowscriptaccess" value="always">
            <param name="flashvars" value="autoStart=true&amp;type=flv&amp;published=0&amp;videoUrl=http://cyflv.ckg48.com/<?php echo $qingxiduIndex[$index_qingxidu].'/'.$src[$msg];?>.flv&amp;volume=0.8&amp;protocal=hls">
        </object>
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