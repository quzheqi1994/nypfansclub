$(function() {
	$('.carousel').carousel({ interval: 2000});
	$('#Carousel').css("margin-top",$('.navbar').height()+20);
	GenAlert("/award","info","公告:","应援会来啊功能上线，点击登录或从菜单中选择登录。");
	//GenAlert("#","success","行程:","我们的小奶瓶将在明天前往北京参加央视春晚的录制。详情请点击查看");
	GenVideo('[["48节公演","48节特殊公演","/images/1.jpg","#"],["48节公演","48节特殊公演","/images/1.jpg","#"],["48节公演","48节特殊公演","/images/1.jpg","#"],["48节公演","48节特殊公演","/images/1.jpg","#"]]');
	GenRadio('[["48节公演","48节特殊公演","/images/2.jpg","#"],["48节公演","48节特殊公演","/images/2.jpg","#"],["48节公演","48节特殊公演","/images/2.jpg","#"],["48节公演","48节特殊公演","/images/2.jpg","#"]]');
	GenGoods('[["新款","三代毛巾","70元","1000","/shop?ID=1","/images/a1t.png"],["新款","三代毛巾","70元","1000","/shop?ID=2","/images/a1t.png"],["新款","三代毛巾","70元","1000","/shop?ID=3","/images/a1t.png"]]');
});