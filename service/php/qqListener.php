<?php
	header("Content-type:text/html;charset=utf-8");
	if(!isset($_GET['msg'])){
	  echo "Error!!";exit();
	}

	$msg = $_GET['msg'];
	$fromQQ = $_GET['fromQQ'];
	
	DealGroupMsg($msg);
	function DealGroupMsg($msg){
		if(strpos($msg,"GNZ48-ũ��ƼӦԮ��")>0){
			$array = explode(' ',$msg);
			$fromUser = substr($array[0],1);
			$index = strpos($msg,"������");
			if($index > 0){
				$money = floatval(substr($msg,$index+6));
			    $marks = intval($money*10);
				if($money>0 && $marks>0){
					echo "�𾴵�".$fromUser."�������μ���".$money."Ԫ�������".$marks."���֣������ https://www.nypfansclub.cn/award �������ĳ齱֮��";
				}
				else{
					echo "Error";
				}
		
			}
		}
		else if(strpos($msg,"��ʽ")>0){
			echo $msg;
			require_once("MMysql.class.php");
			$array = explode('#',$msg);
			$mysql = new MMysql(0);

			//����
			$data = array(
				'date'=>date("Y-m-d"),
				'content'=>$array[1],
				);
			//$mysql->insert('wananshi',$data);
			echo date("Y-m-d")."����ʽ��".$array[1];
		}
		else
			echo "Error";
	}
?>