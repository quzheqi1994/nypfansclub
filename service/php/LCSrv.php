<?php
	require 'Vendor/autoload.php';

	use LeanCloud\Client;
	use LeanCloud\Query;
	use LeanCloud\Object;
	use LeanCloud\User;
	// 参数依次为 AppId, AppKey, MasterKey
	Client::initialize("3TERgHuTNnqCBjg3GeiPqzIR-gzGzoHsz", "cGcs8iM54vvAd2LoEE9UHPn4", "6zBdwnNaMm2xTgrPp1HsJ3bF");
	Client::setServerUrl("https://3terghut.api.lncld.net");
	date_default_timezone_set("Asia/Shanghai");
	
	//print_r(QueryExec("delete from Bind where marksjs = 0"));
	
	function QueryExecInner($str){
		try {return Query::doCloudQuery($str);} 
		catch (Exception $ex) {return NULL;}
	}
	function QueryExecOuter($cql,$sql){
		try {
			$result = Query::doCloudQuery($cql);
			for($i=0;$i< count($result['results']);$i++){
				$msql = $sql.$result['results'][$i]->get('objectId').'"';
				if(!QueryExecInner($msql))
					return NULL;
			}
			return $result;
		} catch (Exception $ex) {
			return NULL;
		}
	}
	function QueryExec($str){
		$str = trim(preg_replace("/\s+/",' ',$str));
		$array = explode(' ',$str);
		switch($array[0]){
			case "insert":
			case "select":
				try{return Query::doCloudQuery($str);}
				catch(Exception $e){return NULL;}
			break;
			case "update":
			    $cql="select * from ".$array[1];
			    $sql="";
				for($i=0;$i< count($array);$i++){
					if($array[$i] == 'where'){
						for($j=$i;$j< count($array);$j++)
							$cql .= " ".$array[$j];
						break;
					}
					else
						$sql .=$array[$i]." ";
				}
				$sql .= ' where objectId="';
				return QueryExecOuter($cql,$sql);
			break;
			case "delete":
				$cql = str_replace("delete from","select * from",$str);
			    $sql ="delete from ".$array[2].' where objectId="';
				return QueryExecOuter($cql,$sql);
			break;
		}
	}
	
	function object_to_array($obj) {
		$obj = (array)$obj;
		foreach ($obj as $k => $v) {
			if (gettype($v) == 'resource') {
				return;
			}
			if (gettype($v) == 'object' || gettype($v) == 'array') {
				$obj[$k] = (array)object_to_array($v);
			}
		}
	 
		return $obj;
	}
	
	function getUser(){
		$currentUser = User::getCurrentUser();
		if($currentUser)
			return "1".$currentUser->getUsername();
		return "22";
	}
?>