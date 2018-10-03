/*0:id,1:金额,2:日期,3:时间,4:头像.*/
function makeCon(message){
    var html = "";
	html+="<div class=\"row-fluid list\">";
	html+="	<div class=\"span6\">";
	html+="		<div class=\"row-fluid\">";
	html+="			<div class=\"span6 fleft\">";
	html+="				<img alt=\"30x30\" src=\""+message[4]+"\"/>";
	html+="			</div>";
	html+="			<div class=\"span6 gleft\"><p>"+message[0]+"</p></div>";
	html+="		</div>";
	html+="		<div class=\"row-fluid\">";
	html+="			<div class=\"span6 fleft\" style=\"padding-left:12px;\">";
	html+="				<img alt=\"30x30\" src=\"wallet.png\"/>";
	html+="			</div>";
	html+="			<div class=\"span6 gleft\"><p><font color=\"gray\">支持了"+message[1]+"元</font></p></div>";
	html+="		</div>";
	html+="	</div>";
	html+="	<div class=\"span6 text-right\">";
	html+="		<p>·</p>";
	html+="		<p>"+message[2]+"</p>";
	html+="		<p>"+message[3]+"</p>";
	html+="	</div>";
	html+="</div>";
	return html;
}

function setHTML(message){
    var html="";
    for(var i=0;i<message.length;i++)
        html+=makeCon(message[i]);
    document.getElementById("data").innerHTML=html;
}

function sortByTime(message,timeStart,timeEnd,moneymin,moneymax){
    var time,id,areturn,sum=0;
    var array = [];
    var areturn = [];
    for(var i=0;i<message.length;i++){
    	if(message[i][2].indexOf("小时前")>0)//24小时之内
    		time = getTimes(parseInt(message[i][2]),0);
    	else if(message[i][2].indexOf("分钟前")>0)//1小时之内
    		time = getTimes(0,parseInt(message[i][2]));
    	else
    		time = message[i][2]+" "+message[i][3];
    	if(time<=timeEnd&&time>=timeStart){
    		id = parseInt(message[i][5]);
    		if(!(typeof(array[id]) == "undefined")){//已定义
    			array[id][2] = accAdd(array[id][2],message[i][1]);
    			array[id][3] += 1;
    		}
    		else{//未定义
    			array[id] = [];
    			array[id][0] = message[i][0];
    			array[id][1] = message[i][4];
    			array[id][2] = parseFloat(message[i][1]);
    			array[id][3] = 1;
    		}
    	}
    	
    }
    for(i=0;i<array.length;i++){
    	if(!(typeof(array[i]) == "undefined")){//已定义
    		if(parseInt(moneymin)>array[i][2] || array[i][2]>parseInt(moneymax))
    			continue;//超过筛选范围
    		areturn[sum] = [];
    		areturn[sum][0] = array[i][0];//ID
    		areturn[sum][1] = array[i][2];//金额
    		areturn[sum][2] = "筛选展示";//日期
    		areturn[sum][3] = "共"+array[i][3]+"笔";//时间
			areturn[sum++][4] = array[i][1];//头像
    	}
    }
    return areturn;
}

function accAdd(arg1,arg2){ 
	var r1,r2,m; 
	try{r1=arg1.toString().split(".")[1].length}catch(e){r1=0} 
	try{r2=arg2.toString().split(".")[1].length}catch(e){r2=0} 
	m=Math.pow(10,Math.max(r1,r2)); 
	return (arg1*m+arg2*m)/m; 
} 

function getTimes(hours,minutes){
	var toMinus = hours*60*60*1000+minutes*60*1000
	var dt = new Date();
	var myDate=new Date(dt.getTime()-toMinus);
	return myDate.Format("yyyy-MM-dd hh:mm");
}

Date.prototype.Format = function (fmt) {
    var o = {
        "M+": this.getMonth() + 1, //月份 
        "d+": this.getDate(), //日 
        "h+": this.getHours(), //小时 
        "m+": this.getMinutes(), //分 
        "s+": this.getSeconds(), //秒 
        "q+": Math.floor((this.getMonth() + 3) / 3), //季度 
        "S": this.getMilliseconds() //毫秒 
    };
    if (/(y+)/.test(fmt)) fmt = fmt.replace(RegExp.$1, (this.getFullYear() + "").substr(4 - RegExp.$1.length));
    for (var k in o)
    if (new RegExp("(" + k + ")").test(fmt)) fmt = fmt.replace(RegExp.$1, (RegExp.$1.length == 1) ? (o[k]) : (("00" + o[k]).substr(("" + o[k]).length)));
    return fmt;
}

$(document).ready(function(){
    setHTML(message);
    $('.form_datetime_start').datetimepicker({
		forceParse: true,
		autoclose: 1,
		todayHighlight: 1,
    });
    $('.form_datetime_end').datetimepicker({
		forceParse: true,
		autoclose: 1,
		todayHighlight: 1,
    });
    $(".btn").click(function(){
    	var message_t = sortByTime(message,$("#date1").val(),$("#date2").val(),$("#moneymin").val(),$("#moneymax").val());
    	setHTML(message_t);
    });
});