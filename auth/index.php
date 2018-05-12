<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no">
    <title>跳转中请稍候</title>
    <script src="/service/av.min.js"></script>
    <script src="/service/initLeanCloud.js"></script>
	<script>
		window.onload=function(){
			if (!AV.User.current()) 
				window.setTimeout("location.href='signin'",500);
			else
				window.setTimeout("location.href='<?php echo isset($_GET['url'])?$_GET['url']:'/award'; ?>'",500);
		};
	</script>

  </head>
  <body>
	<h3 style="color:gray">跳转中请稍候...</h3>
  </body>
</html>
