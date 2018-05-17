<?php
	header("Content-type:text/html;charset=utf-8");
	if(!isset($_GET['msg'])){
	  echo "Error!!";exit();
	}

	$msg = $_GET['msg'];
	$fromQQ = $_GET['fromQQ'];
	
	DealGroupMsg($msg);
	function DealGroupMsg($msg){
		if(strpos($msg,"GNZ48-农燕萍应援会")>0){
			$array = explode(' ',$msg);
			$fromUser = substr($array[0],1);
			$index = strpos($msg,"打赏了");
			if($index > 0){
				$money = floatval(substr($msg,$index+6));
			    $marks = intval($money*10);
				if($money>0 && $marks>0){
					echo "尊敬的".$fromUser."，您本次集资".$money."元，共获得".$marks."积分，请访问 https://www.nypfansclub.cn/award 开启您的抽奖之旅";
				}
				else{
					echo "Error";
				}
		
			}
		}
		else if(strpos($msg,"晚安式")>0){
			echo $msg;
			require_once("MMysql.class.php");
			$array = explode('#',$msg);
			$mysql = new MMysql(0);

			//插入
			$data = array(
				'date'=>date("Y-m-d"),
				'content'=>$array[1],
				);
			//$mysql->insert('wananshi',$data);
			echo date("Y-m-d")."的晚安式：".$array[1];
		}
		else
			echo "Error";
	}
?>