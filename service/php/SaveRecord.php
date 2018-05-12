<?php
require_once("simple_html_dom.php");
require_once("LCSrv.php");
$html = new simple_html_dom();
$result = QueryExec("select count(*) from Record where money>0");
$lean_count = $result['count'];//数据库总记录数
$page=1;
$index = 0;
$comment_count = 0;

$jsonstr = file_get_contents("http://3.quzheqi.applinzi.com/service/modian2.php?page=1");
$array = json_decode($jsonstr,true);
$comment_count = $array['comment_count'];
$upcount = $comment_count-$lean_count;//需要更新的数量

for($i=0;$i<$upcount;$i++){
	$page = intval($i/10)+1;
	$ser = $i%10;
	if($page>1&&$ser==0){
		$jsonstr = file_get_contents("http://3.quzheqi.applinzi.com/service/modian2.php?page=$page");
		$array = json_decode($jsonstr,true);
	}
	$id = $array[$ser][0];
	$time = $array[$ser][1];
	$money = $array[$ser][2];
	$ser = $upcount-$ser-$page*10+10+$lean_count;
	QueryExec("insert into Record (ID,time,money,ser) values('$id','$time',$money,$ser)");
}
?>
<script>
window.onload=function(){
	dt = new Date();
	min = dt.getMinutes();
	if(min>29)
		setTimeout("location.reload()",(60-min)*60*1000);
	else
		setTimeout("location.reload()",(30-min)*60*1000);
}
</script>