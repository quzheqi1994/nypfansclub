<?php
    RobotForRaise($_GET['msg'],isset($_GET['debug']));


	//��������
    function RobotForRaise($msg,$debug){
        if(!strpos($msg,"ũ��Ƽ��ѡ")){
			if(strpos($msg,"����")){
				echo iconv('UTF-8', 'GB2312', file_get_contents("http://3.quzheqi.applinzi.com/test.php?pm=1"));
				exit();
			}
			if($debug)
				echo "here";
			else
				echo "Error";
            exit();
        }

		preg_match("/@([\S\s]+)?�ո���[\S\s]+?������(\S+)?Ԫ[\s\S]+?��([^\/]+)/",$msg,$arr);
		$fromUser = $arr[1];
		$money = $arr[2];
		$progress = $arr[3];
		
		echo "��л@".$fromUser.",�����μ�-��".$money."Ԫ��\n\n";
		//����ִ������
		//InsertData($fromUser,$money,$debug);
		BuTianChongci($progress,$debug);
		//xianshijizi(1050,1750,0900,"183000",$progress,$debug);
		//echo "�������˭�������ҵĻ�ֱ��@�Ұ�~��";
    }
	//�����ս
	function BuTianChongci($progress,$debug){
		echo "�����ս�����ڽ��С���ǰ������\n";
		$arr = json_decode(file_get_contents("http://3.quzheqi.applinzi.com/test.php?nyp=$progress"),true);
		$temp = $arr[1] + $arr[2] + $arr[3];
		echo "����VS��λ��".$arr[0]."ԪVS $temp Ԫ\n";
		echo "��ƿС��VSٻٻ���£�".$arr[2]."ԪVS".$arr[3]."Ԫ";
	}
	function BuTianDaZhan($progress,$debug){
		$chushijifen = -3;
		$jifenjishu = 2000;
		$jifen = intval($progress/$jifenjishu );
		$next = ($jifen+1)*$jifenjishu - $progress;
		
		echo "�����ս�����ڽ��С�$jifenjishu ԪΪ1���֣���ʼ���֣�$chushijifen ����ǰ�ۻ����֣�".$jifen+$chushijifen."\n";
		echo "�����´λ�û��ֻ���$next Ԫ��";
	}
    //����
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
		$output = "���а�\n";
		foreach($re as $k=>$v){
			$tmp = iconv('UTF-8', 'GB2312', $k);
			if($index<5)
				$output .= "�� $index ����".$tmp.",".$v."Ԫ\n";
			if($tmp==$fromUser)
				$input="���ĵ�ǰ�������� $index ������������ʱ���� $v Ԫ\n\n";
			$index++;
		}
		if(isset($input))
			echo $input;
		if(isset($output))
			echo $output;
		echo "Fighting!";
    }
	//�ܶ�
	function CheckAllMoney($fromUser,$money,$progress){
		$url = "http://3.quzheqi.applinzi.com/test.php";
		$money = file_get_contents($url);
		$money = floatval($money) - 111;
		if($money<0) exit();
		echo "FLAG1:6��12��24:00ǰ��1500Ԫ����1:1׷��\n";
		echo "��ǰ���ʶ$money Ԫ.\n";
	}
	//����Lean
	function InsertData($fromUser,$money,$debug){
		include_once("LCSrv.php");
		$tmp = iconv('GB2312', 'UTF-8', $fromUser);
		if(!$debug)
			QueryExec("insert into Minge (name,money) values(\"$tmp\",$money)");
	}
	//��ʱ����
	function xianshijizi($down,$up,$start_time,$end_time,$progress,$debug){
		//$progress = floatval(file_get_contents("http://3.quzheqi.applinzi.com/test.php"));
		$progress -= 6646.3;
		if($progress<=0&& !$debug) return;
		echo "FLAG:9:00-18:30����ʱ1:1׷�ӣ����ٴﵽ1050������1750.\n";
		if(strcmp(date("His"),$end_time)>0)
			echo "������ʱ׷���Ѿ���ֹ";
		echo "��ǰ���ȣ�$progress .";
		if($progress<1050){
			$temp = 1050 - $progress;
			echo "����1050����޶�� $temp Ԫ��Fighting!\n";
		}
		else if($progress<1750){
			echo "�Ѵ�����޶�������Ͱ���\n";
		}
		else if($progress>=1750){
			echo "����ɹ��������������ˣ�\n";
		}
		
	}
?>