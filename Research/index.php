<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge"> 
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<title>农燕萍应援会周边选购</title>
<?php
	include_once("../service/php/LCSrv.php");
    if(isset($_GET['name'])){
		echo '
		<script src="http://mishengqiang.com/sweetalert/js/sweetalert-dev.js"></script>
		<link rel="stylesheet" href="http://mishengqiang.com/sweetalert/css/sweetalert.css">
	</head>
	<body>
		';
		if(false != GetArrOne("temp",'name="'.$_GET['name'].'"','name')){
			echo '<script>swal("好像", "你填过了！", "error");</script>';
			exit();
		}
		$keys = '';$vals = "";
        foreach($_GET as $k => $v){
			$keys .= ','.$k;
			$vals .= ',"'.$v.'"';
        }
		$keys = substr($keys,1);
		$vals = substr($vals,1);
		$sql = "insert into temp ($keys) values($vals)";
		QueryExec($sql);
		echo '<script>swal("恭喜", "搞定啦！", "success");</script>';
        exit();
    }
    else if(!isset($_GET['t'])){
        header('Location: http://www.nypfansclub.cn/404.php'); 
    }
    $t = $_GET['t']-1;
	$v = isset($_GET['v'])?1:0;
	$condArr = [
		["money>=111 and money<233","money>=233 and money<500","money>=500"],
		["money>=88 and money<198","money>=198 and money<430","money>=430"],
	];
	$cond = $condArr[$v][$t];
	
	$avaliableTags ='';
	$arr = GetArr("Minge",$cond,'name');
	if($arr)
		foreach($arr as $v) $avaliableTags .= '"'.$v['name'].'",';
	else{
		echo '
		<script src="http://mishengqiang.com/sweetalert/js/sweetalert-dev.js"></script>
		<link rel="stylesheet" href="http://mishengqiang.com/sweetalert/css/sweetalert.css">
	</head>
	<body>
		<script>swal("抱歉", "出问题了，这组有人吗？", "error");</script>';
		exit();
	}
?>
		<link rel="stylesheet" type="text/css" href="css/normalize.css" />
		<link rel="stylesheet" type="text/css" href="css/demo.css" />
		<link rel="stylesheet" type="text/css" href="css/component.css" />
		<link rel="stylesheet" type="text/css" href="css/cs-select.css" />
		<link rel="stylesheet" type="text/css" href="css/cs-skin-boxes.css" />
		<link rel="stylesheet" type="text/css" href="css/style.css" />
		<script src="//code.jquery.com/jquery-1.10.2.js"></script>
		<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
		<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
		<script src="js/modernizr.custom.js"></script>
	</head>
	<body>
		<div class="container">

			<div class="fs-form-wrap" id="fs-form-wrap">
				<div class="fs-title">
					<h1>农燕萍应援会周边选购</h1>
				</div>
				<form id="myform" class="fs-form fs-form-full" autocomplete="on">
					<ol class="fs-fields">
						<li>
							<label class="fs-field-label fs-anim-upper">您将获得</label><br/>
<?php
    if($t==0)
        echo '<label class="fs-field-label fs-anim-upper">手机壳、毛巾、绳袋三选一</label><br/>';
    elseif($t == 1){
        echo '<label class="fs-field-label fs-anim-upper">应援服一套</label><br/>';
        echo '<label class="fs-field-label fs-anim-upper">手机壳、毛巾、绳袋三选一</label><br/>';
    }
    elseif($t == 2){
        echo '<label class="fs-field-label fs-anim-upper">应援服一套</label><br/>';
		echo '<label class="fs-field-label fs-anim-upper">手机壳一个</label><br/>';
        echo '<label class="fs-field-label fs-anim-upper">毛巾、绳袋二选一</label><br/>';
    }
?>
							<label class="fs-field-label fs-anim-upper">请开始您的选择</label><br/>
							<input class="fs-anim-lower" type="hidden" placeholder="请勿填写此项" disabled/>
						</li>
<?php 
    if($t==0)
        GetChoise("=123");
    elseif($t == 1){
        GetYYF();
        GetChoise("=123");
    }
    elseif($t == 2){
        GetYYF();//必得应援服
        GetSJK();//必得手机壳
        GetChoise("=23");
    }
    GetMDID();
?>
					</ol><!-- /fs-fields -->
					<button class="fs-submit" type="submit">提交问卷</button>
				</form><!-- /fs-form -->
			</div><!-- /fs-form-wrap -->

		</div><!-- /container -->
		<script src="js/classie.js"></script>
		<script src="js/selectFx.js"></script>
		<script src="js/fullscreenForm.js"></script>
		<script>
	        var g_index = 0;
			(function() {
			   var availableTags = [<?php echo $avaliableTags;?>];
				$( "#name" ).autocomplete({
				  source: availableTags
				});
				var formWrap = document.getElementById( 'fs-form-wrap' );

				[].slice.call( document.querySelectorAll( 'select.cs-select' ) ).forEach( function(el,index) {
					new SelectFx( el, {
						stickyPlaceholder: false,
						onChange: function(val){
							document.querySelector('span.select'+index).style.backgroundImage  = 'url(img/'+val+'.png)';
						}
					});
				} );

				new FForm( formWrap, {
					onReview : function() {
						classie.add( document.body, 'overview' ); // for demo purposes only
					}
				} );
			})();
		</script>
	</body>
</html>




<?php
    function GetMDID(){
        echo '
						<li>
							<label class="fs-field-label fs-anim-upper" for="q1">您的摩点ID是?</label>
							<input class="fs-anim-lower" id="name" name="name" type="text" placeholder="请填写" required/>
						</li>
        ';
    }
    function GetSJK($bShow = true){
		$str1 = '';
		$str2 = 'required';
		if(!$bShow){
			$str1 = ' class="li-hidden"';
			$str2 = '';
		}
        echo '
						<li'.$str1.' data-input-trigger>
							<label class="fs-field-label fs-anim-upper" data-info="请选择您手机壳的样式">请选择您手机壳的样式.</label>
							<select class="cs-select cs-skin-boxes fs-anim-lower" name="sjkstyle" '.$str2.'>
								<option value="" disabled selected>选择</option>
								<option value="kw1" data-class="kw1">白色1款</option>
								<option value="kb1" data-class="kb1">黑色1款</option>
								<option value="kw2" data-class="kw2">白色2款</option>
								<option value="kb2" data-class="kb2">黑色2款</option>
								<option value="kw3" data-class="kw3">白色3款</option>
								<option value="kb3" data-class="kb3">黑色3款</option>
							</select>
						</li>
						<li'.$str1.' data-input-trigger>
							<label class="fs-field-label fs-anim-upper" data-info="颜色仅供参考，以您选择的颜色为准">请选择您定制ID的位置.</label>
							<select class="cs-select cs-skin-boxes fs-anim-lower" name="sjkid" '.$str2.'>
								<option value="" disabled selected>选择</option>
								<option value="kup" data-class="kup">上方</option>
								<option value="kdown" data-class="kdown">下方</option>
								<option value="kno" data-class="kno">无ID</option>
							</select>
						</li>
		';
    }
    function GetYYF(){
        echo '
						<li data-input-trigger>
							<label class="fs-field-label fs-anim-upper" data-info="请选择您应援服的样式">请选择您应援服的样式.</label>
							<select class="cs-select cs-skin-boxes fs-anim-lower" name="yyfstyle" required>
								<option value="" disabled selected>选择</option>
								<option value="fw1" data-class="fw1">白色款</option>
								<option value="fb1" data-class="fb1">黑色款</option>
								<option value="fy1" data-class="fy1">黄色款</option>
							</select>
						</li>
						<li data-input-trigger>
							<label class="fs-field-label fs-anim-upper" data-info="颜色仅供参考，以您选择的颜色为准">请选择您定制ID的位置.</label>
							<select class="cs-select cs-skin-boxes fs-anim-lower" name="yyfid" required>
								<option value="" disabled selected>选择</option>
								<option value="fup" data-class="fup">前方</option>
								<option value="fbup" data-class="fbup">后方上部</option>
								<option value="fbdown" data-class="fbdown">后方下部</option>
								<option value="fno" data-class="fno">无ID</option>
							</select>
						</li>
		';
    }
    function GetChoise($s){
        $ret = '
			<li data-input-trigger>
				<label class="fs-field-label fs-anim-upper" data-info="从以下周边中选择一款">请从以下周边中选择一款.</label>
				<select class="cs-select cs-skin-boxes fs-anim-lower" name="choise" required>
					<option value="" disabled selected>选择</option>';
        //1:手机壳 2:毛巾 3:绳袋
        if(strpos($s,'1')) $ret .= '
                    <option value="csjk" data-class="csjk">手机壳</option>';
        if(strpos($s,'2')) $ret .= '
                    <option value="cmj" data-class="cmj">毛巾</option>';
        if(strpos($s,'3')) $ret .= '
                    <option value="csd" data-class="csd">绳袋</option>';
        $ret .= '
				</select>
			</li>
		';
		echo $ret;
		GetSJK(false);
		    
    }
?>