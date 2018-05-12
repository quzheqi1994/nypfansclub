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
		if(strpos($msg,"GNZ48-农燕萍应援会")>0){
			$array = explode(' ',$msg);
			$fromUser = substr($array[0],1);
			$index = strpos($msg,"打赏了");
			if($index > 0){
				$money = floatval(substr($msg,$index+6));
			    $marks = intval($money*10);
				if($money>0 && $marks>0){
					echo "尊敬的".$fromUser."，您本次集资".$money."元，共获得".$marks."积分，请访问 http://www.nypfansclub.cn/award 开启您的抽奖之旅";
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