$(window).scroll(function (){
	//标题导航变色
	var v = $(".navbar").offset().top;
	var gg = parseInt(209+v*14/400);
	var bg = parseInt(51+v*179/400);
	if (v <= 400)
		$(".navbar-default,.navbar-default .navbar-nav > .active > a,.navbar-default .navbar-nav > .active > a:hover").css("background-color", "rgba(255,"+gg+","+bg+",1)");
	else
		$(".navbar-default,.navbar-default .navbar-nav > .active > a,.navbar-default .navbar-nav > .active > a:hover").css("background-color", "rgba(255,223,230,1)");
});