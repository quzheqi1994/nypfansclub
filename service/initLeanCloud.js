var APP_ID = '3TERgHuTNnqCBjg3GeiPqzIR-gzGzoHsz';
var APP_KEY = 'cGcs8iM54vvAd2LoEE9UHPn4';
AV.init({
  appId: APP_ID,
  appKey: APP_KEY
});

function QueryExecInner(str,f,e){
	AV.Query.doCloudQuery(str).then(function (data){
		f(data);
	}, function (error) {
	    e(error);
	});
}
function QueryExecOuter(cql,sql,f,e){
	AV.Query.doCloudQuery(cql).then(function (data) {
		for(i=0;i<data.results.length;i++){
			msql = sql+data.results[i].id+'"';
			QueryExecInner(msql,f,e);
		}
	}, function (error) {
		e(error);
	});
}
function QueryExec(str,f,e){
	str = str.trim().replace(/\s+/g, ' ');
	var array = str.split(' ');
	switch(array[0]){
		case "insert":
		case "select":
			QueryExecInner(str,f,e)
		break;
		case "update":
		    cql="select * from "+ array[1];
		    sql="";
			for(i=0;i<array.length;i++){
				if(array[i] == 'where'){
					for(j=i;j<array.length;j++)
						cql += " "+array[j];
					break;
				}
				else
					sql +=array[i]+" ";
			}
			sql += ' where objectId="';
			
			QueryExecOuter(cql,sql,f,e);
		break;
		case "delete":
		    cql = str.replace("delete from","select * from");
		    sql ="delete from "+ array[2]+ ' where objectId="';

			QueryExecOuter(cql,sql,f,e);
		break;
	}
}

function login(username,password,url){
  AV.User.logIn(username, password).then(function (loginedUser) {
    window.location.href = url;
  }, function (error) {
    alert(JSON.stringify(error));
  });
}