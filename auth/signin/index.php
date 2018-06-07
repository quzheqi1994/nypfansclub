<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no">
    <title>GNZ48-农燕萍应援站 用户登录</title>

    <!-- LeanCloud -->
    <script src="/service/av.min.js" type="text/javascript"></script>
    <script src="/service/initLeanCloud.js" type="text/javascript"></script>

    <script src="/js/jquery.min.js"></script>
    <link  href="/css/bootstrap.min.css" rel="stylesheet">
    
    <link href="../css/sign.css" rel="stylesheet">
</head>
<body>
    <div class="container">
    <div class="col-sm-12 col-md-12">
        <div class="header clearfix">
            <nav>
                <ul class="nav nav-tabs pull-right">
                    <li><a href="../signup">注册</a></li>
                    <li><a href="/">首页</a></li>
                </ul>
            </nav>
            <h3 class="text-muted">来啊</h3>
        </div>

            <form class="form-sign">
                <h2 class="form-sign-heading">登录</h2>
                <input type="username" id="inputUsername" class="form-control" placeholder="QQ号" required autofocus>
                <input type="password" id="inputPassword" class="form-control" placeholder="密码（本站密码非QQ密码）" required>
                <button class="btn btn-lg btn-primary btn-block" type="submit">登录</button>
            </form>
        </div>
    </div> <!-- /container -->
    <script>
        $(function() {
          $(".form-sign").on('submit', function(e) {
            e.preventDefault();
            login($('#inputUsername').val(),$('#inputPassword').val(),"<?php echo isset($_GET['from'])?$_GET['from']:'/award';?>");
          });
        });
    </script>
  </body>
</html>
