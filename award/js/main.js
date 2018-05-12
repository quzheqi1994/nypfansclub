var initFlag = false;
function setupData(user) {
	tecent_id = user.get("username");
	console.log(user.get("emailVerified"));
	if(!user.get("emailVerified")){
		$(".welcome").html("<button onclick='logout()' class='btn btn-info'>注销登录</button>");
		$(".tabbable").html('<p>您的邮箱 '+user.get("email")+' 尚未认证，请点击下方按钮发送验证邮件验证。</p><button class="btn btn-block btn-success" onclick="checkEmail(\''+user.get("email")+'\')">验证邮箱</button>');
		return;
	};
	console.log(user);
	var cards = [];
	var mark;
	var md;
	tstr = 'select * from Bind where tecent_id = "'+tecent_id+'"';
	QueryExec(tstr,function(data){
		mark = data.results[0].get("marksjs");
		cardarr = data.results[0].get("cardjs").split(',');
		for(j=0;j<5;j++)
			cards[j] = parseInt(cardarr[j]);
		md = data.results[0].get("modian_name");
		mdid = data.results[0].get("modian_id");
		//初始化展示信息
		$(".welcome").html("欢迎您<br/>"+md);
		$("#tecent_id span").html(tecent_id);
		$("#modian_id span").html(md);
		UpdateCardsMarksInfo(-1);
		//查询集资记录
		QueryRecord(mdid);
		console.log(cards);
		console.log(md);
		console.log(mark);
	},function(error){});
  		
};

function UpdateCardsMarksInfo(result){
	//ajax异步到php检查更新代码，返回格式校验如下
	//[status,ser]
	tecent_id = AV.User.current().get("username");
	$.ajax({
		url:"CheckCardsMarks.php",//请求的url地址
		dataType:"json",//返回的格式为json
		async:true,//请求是否异步，默认true异步，这是ajax的特性
		data:{"result":result,"tecent_id":tecent_id},//参数值
		type:"GET",//请求的方式
		beforeSend:function(){},//请求前的处理
		success:function(req){
			if(req[0] != '0'){
				alert("网络异常，请刷新重试！");
				return;
			}
			gg(req[1]);
			if(!initFlag){ff();initFlag = true;}
			
			var cards = [];
			var mark;
			var md;
			
			tstr = 'select * from Bind where tecent_id = "'+tecent_id+'"';
			QueryExec(tstr,function(data){
				mark = data.results[0].get("marksjs") - data.results[0].get("cost");
				cardarr = data.results[0].get("cardjs").split(',');
				sets_n = 9999;
				for(j=0;j<5;j++){
					cards[j] = parseInt(cardarr[j]);
					if(cards[j]<sets_n)
						sets_n = cards[j];
				}
				$("#marks").html(mark);
				$("#lottery-marks").html("剩余积分"+mark+"分");
				$("#cards-number").html("");
				$("#shop span").html(sets_n);
				SetCards("卡牌一",cards,0);
				SetCards("卡牌二",cards,1);
				SetCards("卡牌三",cards,2);
				SetCards("卡牌四",cards,3);
				SetCards("卡牌五",cards,4);
			},function(error){});
		},//请求成功的处理
		complete:function(){},//请求完成的处理
		error:function(){}//请求出错的处理
	});
	return;

}

function SetCards(name,cardarr,ser){
	str = cardarr[ser]>0? "btn-success'>"+name+" <span>"+cardarr[ser]+" 张</span>":"btn-disabled'>"+name+" <span>未获得</span>";
	$("#cards-number").append("<a class='btn-block "+str+"</a>");
	sers = ser + 1;
	eval('$(".t'+sers+' span").html("'+cardarr[ser]+'张");');
	
}

function QueryRecord(mdid){
	tstr = 'select * from Record where ID = "'+mdid+'"';
	QueryExec(tstr,function(data){
		record = 0;
		for(i=0;i<data.results.length;i++){
			record += parseInt(data.results[i].get("money")*10);
			$("#Record").append("<li>"+data.results[i].get("time")+" 集资"+data.results[i].get("money")+"元</li>")
  		}
		QueryExec("update Bind set marksjs = "+record+" where modian_id = '"+mdid+"'",function(data){console.log("更新积分成功")},function(error){});
	},function(error){});
};

function logout() {
  AV.User.logOut();
  window.location.href = "/auth";
};

function checkEmail(email){
	AV.User.logOut();//注销登录后
	AV.User.requestEmailVerify(email).then(function (result) {
		console.log(JSON.stringify(result));
	}, function (error) {
		console.log(JSON.stringify(error));
	});
};

function checkMarks(){
	if(parseInt($("#marks").html())>100)
		return true;
	alert("积分不足，无法抽奖！");
	return false;
}