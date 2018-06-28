<?php
    RobotForRaise($_GET['msg'],isset($_GET['debug']));


	//基本处理
    function RobotForRaise($msg,$debug){
        if(!strpos($msg,"农燕萍总选")){
			if(strpos($msg,"排名")){
				echo iconv('UTF-8', 'GB2312', file_get_contents("http://3.quzheqi.applinzi.com/test.php?pm=1"));
				exit();
			}
			if($debug)
				echo "here";
			else
				echo "Error";
            exit();
        }

		preg_match("/@([\S\s]+)?刚刚在[\S\s]+?打赏了(\S+)?元[\s\S]+?￥([^\/]+)/",$msg,$arr);
		$fromUser = $arr[1];
		$money = $arr[2];
		$progress = $arr[3];
		
		echo "感谢@".$fromUser.",您本次集-资".$money."元。\n\n";
		//函数执行区域
		//InsertData($fromUser,$money,$debug);
		BuTianChongci($progress,$debug);
		//xianshijizi(1050,1750,0900,"183000",$progress,$debug);
		//echo "如果你们谁有事找我的话直接@我吧~！";
    }
	//补天大战
	function BuTianChongci($progress,$debug){
		echo "补天大战，正在进行。当前排名：\n";
		$arr = json_decode(file_get_contents("http://3.quzheqi.applinzi.com/test.php?nyp=$progress"),true);
		$temp = $arr[1] + $arr[2] + $arr[3];
		echo "戴萌VS九位：".$arr[0]."元VS $temp 元\n";
		echo "奶瓶小树VS倩倩寒月：".$arr[2]."元VS".$arr[3]."元";
	}
	function BuTianDaZhan($progress,$debug){
		$chushijifen = -3;
		$jifenjishu = 2000;
		$jifen = intval($progress/$jifenjishu );
		$next = ($jifen+1)*$jifenjishu - $progress;
		
		echo "补天大战，正在进行。$jifenjishu 元为1积分，初始积分：$chushijifen 。当前累积积分：".$jifen+$chushijifen."\n";
		echo "距离下次获得积分还需$next 元。";
	}
    //排行
    function SortSelf($fromUser,$money){
		$fromUseru8 = iconv('GB2312', 'UTF-8', $fromUser);
		QueryExec("insert into Temp(name,money) values('$fromUseru8',$money)");
		$arr = GetArr("Temp","money>0","name,money");
		foreach($arr as $v){
			if(!isset($re[$v['name']]))
				$re[$v['name']] = 0;
			$re[$v['name']]+=$v['money'];
		}
		arsort($re);
		$index = 1;
		$output = "排行榜：\n";
		foreach($re as $k=>$v){
			$tmp = iconv('UTF-8', 'GB2312', $k);
			if($index<5)
				$output .= "第 $index 名：".$tmp.",".$v."元\n";
			if($tmp==$fromUser)
				$input="您的当前排名：第 $index 名，您本次限时集资 $v 元\n\n";
			$index++;
		}
		if(isset($input))
			echo $input;
		if(isset($output))
			echo $output;
		echo "Fighting!";
    }
	//总额
	function CheckAllMoney($fromUser,$money,$progress){
		$url = "http://3.quzheqi.applinzi.com/test.php";
		$money = file_get_contents($url);
		$money = floatval($money) - 111;
		if($money<0) exit();
		echo "FLAG1:6月12日24:00前，1500元以内1:1追加\n";
		echo "当前集资额：$money 元.\n";
	}
	//插入Lean
	function InsertData($fromUser,$money,$debug){
		include_once("LCSrv.php");
		$tmp = iconv('GB2312', 'UTF-8', $fromUser);
		if(!$debug)
			QueryExec("insert into Minge (name,money) values(\"$tmp\",$money)");
	}
	//限时集资
	function xianshijizi($down,$up,$start_time,$end_time,$progress,$debug){
		//$progress = floatval(file_get_contents("http://3.quzheqi.applinzi.com/test.php"));
		$progress -= 6646.3;
		if($progress<=0&& !$debug) return;
		echo "FLAG:9:00-18:30，限时1:1追加，至少达到1050，上限1750.\n";
		if(strcmp(date("His"),$end_time)>0)
			echo "本次限时追加已经截止";
		echo "当前进度：$progress .";
		if($progress<1050){
			$temp = 1050 - $progress;
			echo "距离1050最低限额还需 $temp 元，Fighting!\n";
		}
		else if($progress<1750){
			echo "已达最低限额，继续加油啊！\n";
		}
		else if($progress>=1750){
			echo "拔旗成功，坐等甜王结账！\n";
		}
		
	}
?>