<?php
	if(!isset($_GET['msg'])){
	  echo "Error!!";exit();
	}

	$msg = $_GET['msg'];
	$fromQQ = $_GET['fromQQ'];
	$type = $_GET['type'];
	
	switch($type){
		case 1:
			echo "Error";
		break;
		case 2:
			DealGroupMsg($msg);
		break;
		case 3:
			echo "Error";
		break;
	}
	
	function DealGroupMsg($msg){
		if(strpos($msg,"GNZ48-ũ��ƼӦԮ��")>0){
			$array = explode(' ',$msg);
			$fromUser = substr($array[0],1);
			$index = strpos($msg,"������");
			if($index > 0){
				$money = floatval(substr($msg,$index+6));
			    $marks = intval($money*10);
				if($money>0 && $marks>0){
					echo "�𾴵�".$fromUser."�������μ���".$money."Ԫ�������".$marks."���֣������ http://www.nypfansclub.cn/award �������ĳ齱֮��";
				}
				else{
					echo "Error";
				}
		
			}
		}
		else
			echo "Error";
	}
?>