<?php
    function GetColBox($coltype){
    	switch($coltype){//以宽屏为定义，最优的展示方式 col-md-x; x的值
    		case 3:return 'col-md-3 col-sm-6 col-xs-6';
    		case 4:return 'col-md-4 col-sm-4 col-xs-6';
    		case 6:return 'col-md-6 col-sm-6 col-xs-6';
    		case 12:return 'col-md-12 col-sm-6 col-xs-6';
    		return '';
    	}
    }

	function CheckCache($prefix,$id,$bRetArray = true){
		$cache = $_SERVER['DOCUMENT_ROOT']."/cache/{$prefix}_{$id}.json";
		if(file_exists($cache)) {//缓存存在，则读取缓存
	        $json = file_get_contents($cache);
	        if($bRetArray){
	        	return json_decode($json,true);
	        }
	        return $json;
    	}
    	return false;
	}
	function MakeCache($prefix,$id,$data,$dataType){
		error_reporting(0);
		$json ='';
		if($dataType=="array"){
			$json = json_encode($data,JSON_UNESCAPED_UNICODE);
			$json = str_replace('\/','/',$json);
		}
		else
			$json = $data;
		$cache = $_SERVER['DOCUMENT_ROOT']."/cache/{$prefix}_{$id}.json";
		file_put_contents($cache, $json);
		return $json;
	}