function GenAlert(href,type,title,content){
	var html = "<div class=\"alert alert-"+type+"\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\">×</button>"
	html += "<a href=\""+ href +"\"><h4>"+title+"</h4>"+ content +"</a></div>";
	$("#alertdiv").append(html);
}

function GenGoods(jsonStr){
	//[["tag","name","price","marks","href","img"]]
	var arr = JSON.parse(jsonStr);
	for(i=0;i<arr.length;i++){
		html = '<div class="col-md-3 col-xs-6 col-sm-4 product">';
		html+= '	<a href="'+arr[i][4]+'"><div class="pro-item"><div class="thumb-item">';
		html+= '		<img src="'+arr[i][5]+'" class="image-front"/> ';
		html+= '		<img src="'+arr[i][5]+'" class="image-back"/>';
		html+= '		<span class="product-top">'+arr[i][0]+'</span> ';
		html+= '	</div><div class="item-info">';
		html+= '		<h4>'+arr[i][1]+'</h4>';
		html+= '		<div class="info-price">￥'+arr[i][2]+'<span>+'+arr[i][3]+'积分</span></div>';
		html+= '		<span class="buy">前往购买</span>';
		html+= '</div></div></a></div>';
		$("#shopdiv").append(html);
	}
}

function GenVideo(jsonStr){
	//[["title","desc","img","link"]]
	var arr = JSON.parse(jsonStr);
	for(i=0;i<arr.length;i++){
		html = '<div class="col-lg-3 col-md-4 col-sm-6 col-xs-6">';
		html+= '<div class="hover ehover13">';
		html+= '	<img class="img-responsive" src="'+arr[i][2]+'">';
		html+= '	<div class="overlay"><h2>'+arr[i][0]+'</h2>';
		html+= '		<button class="info nullbutton" onclick="window.location.href=\''+arr[i][3]+"'\">查看详细</button>";
		html+= '	</div></div>';
		html+= '<div class="banner-bottom">';
		html+= '	<h5>'+arr[i][0]+'</h5><dd></dd>';
		html+= '<p>'+arr[i][1]+'</p></div></div>';
		$("#videodiv").append(html);
	}
}

function GenRadio(jsonStr){
	//[["title","desc","img","link"]]
	var arr = JSON.parse(jsonStr);
	for(i=0;i<arr.length;i++){
		html = '<div class="col-lg-3 col-md-4 col-sm-6 col-xs-6">';
		html+= '<div class="hover ehover1">';
		html+= '	<img class="img-responsive" src="'+arr[i][2]+'">';
		html+= '	<div class="overlay"><h2>'+arr[i][0]+'</h2>';
		html+= '		<button class="info nullbutton" onclick="window.location.href=\''+arr[i][3]+"'\">查看详细</button>";
		html+= '	</div></div>';
		html+= '<div class="banner-bottom">';
		html+= '	<h5>'+arr[i][0]+'</h5><dd></dd>';
		html+= '<p>'+arr[i][1]+'</p></div></div>';
		$("#picsdiv").append(html);
	}
}