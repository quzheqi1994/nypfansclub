<?php
    require_once($_SERVER['DOCUMENT_ROOT']."/service/php/heafooer.php");
    require_once($_SERVER['DOCUMENT_ROOT']."/service/php/LCSrv.php");
    require_once($_SERVER['DOCUMENT_ROOT']."/service/php/Common.php");
	$types = $_REQUEST['types'];
	$id = $_REQUEST['id'];	
	$check = CheckCache($types,$id,false);
	if($check)
    	$json = $check;
	if($types=="playlist"){
        $data['playlist'] = getArrOne('playlist',"playlistid=$id",'name,coverImgUrl,crnickname');
		$data['playlist']['tracks'] = getArr('Track',"playlistid=$id",'id,name,arname,alname,alpicurl','id');
		$json = MakeCache($types,$id,$data,"array");
	}
	else{
		$json = getJsonOne('Track',"id=$id","$types");
		$json = MakeCache($types,$id,$json,"json");
	}
	echo $_GET['callback'].'('.$json.')';
?>