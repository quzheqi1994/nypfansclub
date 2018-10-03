<?php
	if(strpos($_GET['msg'],'打赏了'))
		RobotForRaise($_GET['msg'],isset($_GET['debug']));
	else
		echo "Error";


	//基本处理
    function RobotForRaise($msg,$debug){

		preg_match("/@([\S\s]+)?刚刚在[\S\s]+?打赏了(\S+)?元[\s\S]+?￥([^\/]+)/",$msg,$arr);
		$fromUser = $arr[1];
		$money = $arr[2];
		$progress = $arr[3];
		
		echo "感谢@".$fromUser.",您本次集-资".$money."元。\n";
		echo "当前排行总榜：\n";
		GetTops();
		echo "大家冲啊！";
    }
	function GetTops(){
		$json = file_get_contents("http://127.0.0.1:8008/tops?api=1");
		//$json = '[["Sil2002", "100.00"], ["No2\u5c0f\u54e5\u54e5", "73.00"], ["\u6709\u4e2a\u5c0f\u4e0d\u70b9", "10.00"]]';
		$arr = json_decode($json);
		foreach($arr as $k=>$v){
			$key   = $k+1;
			$value = iconv('UTF-8', 'GB2312', $v[0]);
			echo "第{$key}名：{$value},共{$v[1]}元\n";
			if($k >= 9) break;
		}
	}
?>