<?php
	if(strpos($_GET['msg'],'������'))
		RobotForRaise($_GET['msg'],isset($_GET['debug']));
	else
		echo "Error";


	//��������
    function RobotForRaise($msg,$debug){

		preg_match("/@([\S\s]+)?�ո���[\S\s]+?������(\S+)?Ԫ[\s\S]+?��([^\/]+)/",$msg,$arr);
		$fromUser = $arr[1];
		$money = $arr[2];
		$progress = $arr[3];
		
		echo "��л@".$fromUser.",�����μ�-��".$money."Ԫ��\n";
		echo "��ǰ�����ܰ�\n";
		GetTops();
		echo "��ҳ尡��";
    }
	function GetTops(){
		$json = file_get_contents("http://127.0.0.1:8008/tops?api=1");
		//$json = '[["Sil2002", "100.00"], ["No2\u5c0f\u54e5\u54e5", "73.00"], ["\u6709\u4e2a\u5c0f\u4e0d\u70b9", "10.00"]]';
		$arr = json_decode($json);
		foreach($arr as $k=>$v){
			$key   = $k+1;
			$value = iconv('UTF-8', 'GB2312', $v[0]);
			echo "��{$key}����{$value},��{$v[1]}Ԫ\n";
			if($k >= 9) break;
		}
	}
?>