<?php
	if(isset($_GET['id']))
		$id = $_GET['id'];
	else
		header('Location: https://www.nypfansclub.cn/shop');
    require_once('api.php');
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title>即将跳转至淘宝</title>
	
	<!-- LeanCloud -->
    <script src="/service/av.min.js" type="text/javascript"></script>
    <script src="/service/initLeanCloud.js" type="text/javascript"></script>
	
    <link href="css/heading.css" type="text/css" rel="stylesheet"/>
</head>
<body class="lang-en">
    <div id="Redirect" class="redirect-container">
        <h1>谢谢您，即将完成…</h1>
        <ol class="Transfer">
            <li>
                <div><img src="images/logo122x65.png"/></div>
                <!--<p>您已完成预订</p>-->
            </li>
            <li class="Animation">
                <div>
                    <img src="images/progress.gif" alt="Transferring" class="MaxTransfer" />
                    <img src="images/progress_mobile.gif" alt="Transferring" class="MinTransfer" />
                </div>
				<!--<p>即将带您进入淘宝页面</p>-->
            </li>
            <li>
                <div><img src="images/taobao.png" alt="Mytrip" class="Provider" /></div>
                <!--<p>现在前往淘宝购买</p>-->
            </li>
        </ol>
<?php
    $result = getArrOne("Shop","id=$id",'tid,name,mark,money');	
	echo '
        <div class="Ticket">
			<h2>您购买的周边</h2>
            <div class="Itinerary">
                <table class="Detail">
					<tr><td>'.$result['name'].'</td></tr>
					<tr><td>型号：无可选型号</td></tr>
                </table>
				<div class="Detail">
					<span><strong>¥'.$result['money'].'</strong>+'.$result['mark'].' 积分</span>
				</div>
                <p>
					<!--<span class="CabinClass" style="float:left;"><em></em></span>-->
                    您的积分将被暂时冻结，感谢您对我们的支持<br/><em></em>
					如您未购买，积分将在明日24:00前恢复。
                </p>
            </div>
            <div class="Summary"></div>
        </div>
	';
?>
        <div class="Summary">
            <div class="ssdv-poweredby">
                <p>
                    <span class="poweredby-text">版权所有：</span>
                    <img src="/logo.png" alt="GNZ48-农燕萍应援会"/>
                </p>
            </div>
        </div>
    </div>
	<script>
		window.onload=function(){
			user = AV.User.current();
			if (user) {
				username = user.get("username");
				QueryExec("select * from Bind where tecent_id='"+username+"'",function(data){
					mark = data.results[0].get("marksjs")-data.results[0].get("cost")-data.results[0].get("freeze");
					if(mark < <?php echo $result['mark'];?>){
						setTimeout("alert('对不起，您的积分不足，即将跳转回原页面。')",1000);
						setTimeout("window.location='./?id=<?php echo $id;?>'",1000);
					}else{
						//这里冻结积分
						var freeze = data.results[0].get("freeze")+<?php echo $result['mark'];?>;
				        QueryExec("update Bind set freeze = "+freeze+" where tecent_id='"+username+"'",function(data){
    						setTimeout("alert('您的订单已经生成，本次扣除<?php echo $result['mark'];?>积分。')",1000);
    						setTimeout("window.location='<?php echo $_GET['tid']; ?>'",1000);
					    },function(error){alert("Error");});
					}
				},function(error){});
			} else {
				window.location.href = "/auth?from=/shop/?id=<?php echo $id;?>";
			}
		};
	</script>
</body>
</html>