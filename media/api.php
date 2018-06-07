<?php
    require_once($_SERVER['DOCUMENT_ROOT']."/service/php/heafooer.php");
    require_once($_SERVER['DOCUMENT_ROOT']."/service/php/LCSrv.php");
    require_once($_SERVER['DOCUMENT_ROOT']."/service/php/Common.php");
    function GenVideoListCover($playlistid,$coltype){
    	
    	$arr = CheckCache('VideoListCover',$playlistid);
    	if(!$arr){
    		$arr = getArrOne("playlist","playlistid=$playlistid",'name,coverImgUrl,crnickname,playlistid');
    		MakeCache('VideoListCover',$playlistid,$arr,'array');
    	}
    	$html ="\n".'					<div class="'.GetColBox($coltype).'">';
    	$html.="\n".'						<div class="wrap-vid">';
    	$html.="\n".'							<div class="zoom-container">';
    	$html.="\n".'								<div class="zoom-caption">';
    	$html.="\n".'									<span>'.$arr['crnickname'].'</span>';
    	$html.="\n".'									<a href="list.php?playlistid='.$arr['playlistid'].'"></a>';
    	$html.="\n".'									<p>'.$arr['name'].'</p>';
    	$html.="\n".'								</div>';
    	$html.="\n".'								<img src="'.$arr['coverImgUrl'].'"/>';
    	$html.="\n".'							</div>';
    	$html.="\n".'						</div>';
    	$html.="\n".'					</div>';
    	return $html;
    }
    function GenVideoList($playlistid,$coltype,$bWithDesc=false,$limit=0){
    	$html = '';
    	$arr = CheckCache('VideoList',$playlistid);
    	if(!$arr){
    		$arr = getArr("Track","playlistid=$playlistid",'name,alpicurl,arname,alname,id,lyric,date',"id");
    		MakeCache('VideoList',$playlistid,$arr,'array');
    	}
    	foreach($arr as $v){
    		$html.="\n".'					<div class="'.GetColBox($coltype).'">';
    		$html.="\n".'						<div class="wrap-vid">';
    		$html.="\n".'							<div class="zoom-container">';
    		$html.="\n".'								<div class="zoom-caption">';
    		$html.="\n".'									<span>'.$v['alname'].'</span>';
    		$html.="\n".'									<a href="player.php?list='.$playlistid.'&id='.$v['id'].'"></a>';
    		$html.="\n".'									<p>'.$v['name'].'</p>';
    		$html.="\n".'								</div>';
    		$html.="\n".'								<img src="'.$v['alpicurl'].'"/>';
    		$html.="\n".'							</div>';
    		if($bWithDesc){
    			$html.='							<h1 class="vid-name"><a href="#">'.$v["name"].'</a></h1>';
    			$html.='							<div class="info">';
    			$html.='								<h5>By <a>'.$v["arname"].'</a></h5>';
    			$html.='								<span><i class="fa fa-calendar"></i>'.$v["date"].'</span>';
    			//$html.='								<span><i class="fa fa-heart"></i>'.$v["arname"].'</span>';
    			$html.='							</div>';
    			$html.='							<p class="more">'.$v['lyric'].'</p>';
    			$html.='							<div class="line"></div>';
    		}
    		$html.="\n".'						</div>';
    		$html.="\n".'					</div>';
    		
    		if(--$limit==0) break;
    	}
    	return $html;
    }


    function GenMainVideo($id,$playlistid){
    	$html = '';
    	$arr = getArrOne("Track","id=$id and playlistid = $playlistid",'url,name,arname,lyric,date');
    	$ids = explode(',',$arr["url"]);
    	$html ='			<div class="wrap-vid">';
    	$html.='				<iframe src="//player.bilibili.com/player.html?aid='.$ids[0].'&cid='.$ids[1].'" scrolling="no" border="0" frameborder="no" framespacing="0" allowfullscreen="true"> </iframe>';
    	$html.='			</div>';
    	$html.='			<div class="line"></div>';
    	$html.='			<h1 class="vid-name"><a href="#">'.$arr["name"].'</a></h1>';
    	$html.='			<div class="info">';
    	$html.='				<h5>By <a>'.$arr["arname"].'</a></h5>';
    	$html.='				<span><i class="fa fa-calendar"></i>'.$arr["date"].'</span>';
    	//$html.='				<span><i class="fa fa-heart"></i>'.$arr["alname"].'</span>';
    	$html.='			</div>';
    	$html.='			<p class="more">'.$arr['lyric'].'</p>';
    	$html.='			<div class="line"></div>';
    	echo $html;
    }
?>