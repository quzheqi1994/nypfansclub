$(function() {
	GenVideoList("#sub-vid1",'[["公演录播","#","/images/shutter_1.jpg","新的"],["口袋录播","#","/images/shutter_3.jpg","新的"]]','');
	GenVideoList("#sub-vid2",'[["应援视频","#","/images/shutter_2.jpg","新的"],["MC剪辑","#","/images/shutter_4.jpg","新的"]]','');
	GenVideo("#fe-vid1",'[["名字","#","/images/shutter_1.jpg","新的"],["名字","#","/images/shutter_1.jpg","新的"]]','[["农燕萍应援会","2018/05/06","500","这是一个描述"],["农燕萍应援会","2018/05/06","500",""]]');
	GenVideo("#fe-vid2",'[["名字","#","/images/shutter_1.jpg","新的"],["名字","#","/images/shutter_1.jpg","新的"]]','[["农燕萍应援会","2018/05/06","500","这是一个描述"],["农燕萍应援会","2018/05/06","500",""]]');
	GenVideo("#ra-vid1",'[["名字","#","/images/shutter_1.jpg","新的"]]','[["农燕萍应援会","2018/05/06","500",""]]');
	GenVideo("#ra-vid2",'[["名字","#","/images/shutter_1.jpg","新的"]]','[["农燕萍应援会","2018/05/06","500",""]]');
	GenVideo("#ra-vid3",'[["名字","#","/images/shutter_1.jpg","新的"]]','[["农燕萍应援会","2018/05/06","500",""]]');
	GenVideo("#ra-vid4",'[["名字","#","/images/shutter_1.jpg","新的"]]','[["农燕萍应援会","2018/05/06","500",""]]');
	GenVideo("#ra-vid5",'[["名字","#","/images/shutter_1.jpg","新的"]]','[["农燕萍应援会","2018/05/06","500",""]]');
	GenVideo("#ra-vid6",'[["名字","#","/images/shutter_1.jpg","新的"]]','[["农燕萍应援会","2018/05/06","500",""]]');
	GenVideo("#ca-vid1",'[["名字","#","/images/shutter_1.jpg","新的"]]','[["农燕萍应援会","2018/05/06","500",""]]');
	GenVideo("#ca-vid2",'[["名字","#","/images/shutter_1.jpg","新的"]]','[["农燕萍应援会","2018/05/06","500",""]]');
	GenMainVideo('15167934','24692390','1','测试视频','[["农燕萍应援会","2018/05/06","500","这是一个描述"]]');
					
});

function GenVideo(selecter,jsonStr,jsonStrDesc){
	//[["name","id","img","tag"]]
	var arr = JSON.parse(jsonStr);
	for(i=0;i<arr.length;i++){
		html='						<div class="wrap-vid">';
		html+='							<div class="zoom-container">';
		html+='								<div class="zoom-caption">';
		html+='									<span>'+arr[i][3]+'</span>';
		html+='									<a href="player.php?id='+arr[i][1]+'"></a>';
		html+='									<p>'+arr[i][0]+'</p>';
		html+='								</div>';
		html+='								<img src="'+arr[i][2]+'"/>';
		html+='							</div>';
		if(jsonStrDesc!='')
			html+= GenDesc(arr[i][0],jsonStrDesc,i);
		html+='						</div>';
		$(selecter).append(html);
	}
}
function GenVideoList(selecter,jsonStr,jsonStrDesc){
	//[["name","alid","img","tag"]]
	var arr = JSON.parse(jsonStr);
	for(i=0;i<arr.length;i++){
		html='						<div class="wrap-vid">';
		html+='							<div class="zoom-container">';
		html+='								<div class="zoom-caption">';
		html+='									<span>'+arr[i][3]+'</span>';
		html+='									<a href="list.php?alid='+arr[i][1]+'"></a>';
		html+='									<p>'+arr[i][0]+'</p>';
		html+='								</div>';
		html+='								<img src="'+arr[i][2]+'"/>';
		html+='							</div>';
		if(jsonStrDesc!='')
			html+= GenDesc(arr[i][0],jsonStrDesc,i);
		html+='						</div>';
		$(selecter).append(html);
	}
}
function GenDesc(name,jsonStr,i){
	//[["id","date","ol","des"]]
	var arr = JSON.parse(jsonStr);
		html='							<h1 class="vid-name"><a href="#">'+name+'</a></h1>';
		html+='							<div class="info">';
		html+='								<h5>By <a>'+arr[i][0]+'</a></h5>';
		html+='								<span><i class="fa fa-calendar"></i>'+arr[i][1]+'</span>';
		html+='								<span><i class="fa fa-heart"></i>'+arr[i][2]+'</span>';
		html+='							</div>';
		html+='							<p class="more">'+arr[i][3]+'</p>';
		html+='							<div class="line"></div>';
	return html;
}
function GenMainVideo(aid,cid,page,name,jsonStr){
		html='			<div class="wrap-vid">';
		html+='				<iframe src="https://player.bilibili.com/player.html?aid='+aid+'&cid='+cid+'&page='+page+'" scrolling="no" border="0" frameborder="no" framespacing="0" allowfullscreen="true"> </iframe>';
		html+='			</div>';
		html+='			<div class="line"></div>';
		html+=GenDesc("名字",'[["农燕萍应援会","2018/05/06","500","这是一个描述"]]',0);
		$("#palyers").append(html);
}