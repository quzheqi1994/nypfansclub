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
<?php
require_once("../LCSrv.php");
$post_id = $_GET['id'];
$table   = $_GET['table'];

$result = QueryExec("select count(*) from $table where money>=0");
if(!isset($result['count'])) exit();
$lean_count = $result['count'];//数据库总记录数


$jsonstr = file_get_contents("http://admin.nypfansclub.cn/service/GetModianRecord.php?page=1&post_id=$post_id");
$array = json_decode($jsonstr,true);
if(!isset($array['comment_count'])) exit();

$comment_count = $array['comment_count'];
$upcount = $comment_count-$lean_count;//需要更新的数量

for($i=0;$i<$upcount;$i++){
	$page = intval($i/10)+1;
	$ser = $i%10;
	if($page>1&&$ser==0){
		$jsonstr = file_get_contents("http://admin.nypfansclub.cn/service/GetModianRecord.php?page=$page&post_id=$post_id");
		$array = json_decode($jsonstr,true);
	}
	$id = $array[$ser][0];
	$time = $array[$ser][1];
	$money = $array[$ser][2];
	$ser = $comment_count-$i;
	QueryExec("insert into $table (ID,time,money,ser) values('$id','$time',$money,$ser)");
}
?>