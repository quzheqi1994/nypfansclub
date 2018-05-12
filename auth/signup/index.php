<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no">
    <title>GNZ48-农燕萍应援站 用户注册</title>

    <!-- LeanCloud -->
    <script src="/service/av.min.js" type="text/javascript"></script>
    <script src="/service/initLeanCloud.js" type="text/javascript"></script>

    <script src="/js/jquery.min.js"></script>
    <link  href="/css/bootstrap.min.css" rel="stylesheet">
    
    <script src="../js/signup.js" type="text/javascript"></script>
    <link  href="../css/sign.css" rel="stylesheet">
    <link  href="../css/modianbox.css" rel="stylesheet">
</head>
<body>
    <div class="container">
    <div class="col-sm-12 col-md-12">
        <div class="header clearfix">
            <nav>
                <ul class="nav nav-tabs pull-right">
                    <li><a href="../signin">登录</a></li>
                    <li><a href="/">首页</a></li>
                </ul>
            </nav>
            <h3 class="text-muted">来啊</h3>
        </div>

            <form class="form-sign">
                <h2 class="form-sign-heading">注册绑定</h2>
                <input id="tecent_id" class="form-control" placeholder="QQ号码" required autofocus>
                <input type="username" id="modian_name" class="form-control" placeholder="摩点用户名" required>
                <input type="hidden" id="modian_id" class="form-control">
                <input type="password" id="password" class="form-control" placeholder="密码（本站密码非摩点密码）" required>
                <button class="btn btn-lg btn-primary btn-block" id="submit" type="submit">注册</button>
            </form>
            <div id="modian_list"></div>
        </div>
    </div> <!-- /container -->
    <script>
        $(function() {
          $(".form-sign").on('submit', function(e) {
            e.preventDefault();
            presignup();
          });
        });
    </script>
  </body>
</html>
