<?php
	require_once("../service/php/LCSrv.php");
	if(isset($_GET['result']))
		$LastOfferFromJS = $_GET['result'];
	if(isset($_GET['tecent_id']))
		$tecent_id = $_GET['tecent_id'];
		
	$result = QueryExec("select * from Bind where tecent_id = '".$tecent_id."'");
	
	$cost = $result['results'][0]->get('cost');//消费的积分
	$marksjs = $result['results'][0]->get('marksjs');//所有积分
	$cardjs = $result['results'][0]->get('cardjs');
	$LastOffer = $result['results'][0]->get('LastOffer');
	
	if($result>-1 && $LastOfferFromJS==$LastOffer && $marksjs-$cost > 100){//有效的抽奖
		//更新积分
		$cost += 100;
		//更新卡片
		$arr = array(0,-1,1,-1,2,-1,3,-1,4,-1);
		if($arr[$LastOffer] >= 0){
			$cards = explode(',',$cardjs);
			$cards[$arr[$LastOffer]] = intval($cards[$arr[$LastOffer]])+1;
			$cardjs = $cards[0].','.$cards[1].','.$cards[2].','.$cards[3].','.$cards[4];
		}
		//重置结果状态
		$LastOffer = GetRandom();
		QueryExec("update Bind set cost = $cost , cardjs = '$cardjs',LastOffer = $LastOffer where tecent_id = '$tecent_id'");
	}
	if($LastOffer<0 || $LastOffer>9)
		$req[0] = '1';
	else
		$req[0] = '0';
	
	$str="QWERTYUIOPASDFGHJKLZXCVBNM1234567890qwertyuiopasdfghjklzxcvbnm";
	$salt1 = substr(str_shuffle($str),26,2);
	$salt2 = substr(str_shuffle($str),26,2);
	$salt3 = substr(str_shuffle($str),26,6);
	$thisTimeOffer = $LastOffer+rand(10,40)*10;
	$req[1] = base64_encode($salt2.base64_encode($salt1.$thisTimeOffer.$salt3));
	//$req[2] = $thisTimeOffer;
	echo json_encode($req);


	function GetRandom(){
		$array= array(0,1,2,3,4,5,6,7,8,9);
		$rate = array(10,20,10,20,1,2,10,20,10,20);
		$sum = $left = $right =0;
		foreach($rate as $value)
			$sum+=$value*10;
		$temp = rand(0,$sum);
		foreach($rate as $key=>$value){
			$right+=$value*10;
			if($left<=$temp && $temp<$right)
				return $array[$key];
			$left+=$value*10;
		}
	}
?>