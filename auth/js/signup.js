function presignup() {
	var modian_name = $('#modian_name').val();
	var password  = $('#password').val();
	var tecent_id = $('#tecent_id').val();
	//校验摩点ID
    $("#modian_list").html("校验中，请稍等。。。");
	$.get("http://3.quzheqi.applinzi.com/service/member.php?user="+modian_name,
    function(data,status){
    	if(status=="success"){
    		$("#modian_list").html(data);
    	}
    });
};

function signup(){
	$("#submit").addClass("disabled");
    $("#modian_list").html("注册校验中，请稍等。。。");
	var modian_name = $('#modian_name').val();
	var modian_id = $('#modian_id').val();
	var password  = $('#password').val();
	var tecent_id = $('#tecent_id').val();
	

	QueryExec("select * from Bind where modian_id = '"+modian_id+"'",function(data){
		if(data.results.length != 0){
			//已被注册
    		$("#modian_list").html("对不起，该摩点账户 ID"+modian_name+"已被注册，如有疑问请联系管理员。");
			$("#submit").removeClass("disabled");
			
		}
		else{
    		$("#modian_list").html("校验通过请稍候。。。");
			var user = new AV.User();
			user.setUsername(tecent_id);
			user.setPassword(password);
			user.setEmail(tecent_id+"@qq.com");
			user.signUp().then(function (loginedUser) {
				bindInfo(modian_id,modian_name,tecent_id);
			}, (function (error) {
				alert(JSON.stringify(error));
			}));
		}
	},function(error){
			$("#submit").removeClass("disabled");
    		$("#modian_list").html("注册失败，请稍候重试。");
	});
}
function bindInfo(modian_id,modian_name,tecent_id){
	cstr = 'insert into Bind (modian_id,tecent_id,modian_name) values ("'+modian_id+'","'+tecent_id+'","'+modian_name+'")';
	QueryExec(cstr,function(data){
    		$("#modian_list").html("摩点账户 ID"+modian_name+"注册成功，请检查您QQ号对应的QQ邮箱激活账户并等待绑定审核。");
  			window.location.href = "/auth";
	},function(error){alert("error")});
}