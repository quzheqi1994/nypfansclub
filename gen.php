<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <style>
        .ctrol_name{
            background-color: #cc0000;
        }
        .att_name{
            background-color: #00cc00;
        }
        </style>
    <script src="/service/av.min.js" type="text/javascript"></script>
    <script src="/service/initLeanCloud.js" type="text/javascript"></script>
        <script>
        window.onload=function(){ 
            var dropbox=document.getElementById("dropbox");
            dropbox.addEventListener("dragenter", function(e) {
                e.stopPropagation();  
                e.preventDefault(); 
                dropbox.style.borderColor = 'gray';
                dropbox.style.backgroundColor = 'white';
            }, false);
            dropbox.addEventListener("dragleave", function(e) {
                dropbox.style.backgroundColor = 'transparent';
            }, false);
            dropbox.addEventListener("dragover", function(e) {
                e.stopPropagation();
                e.preventDefault();
            }, false);
            dropbox.addEventListener("drop", function(e) {
                e.stopPropagation();
                e.preventDefault();
 
                handleFiles(e.dataTransfer.files);
 
                //submit.disabled = false;
            }, false);
 
            document.addEventListener("dragover", function(e) {
                e.stopPropagation();
                e.preventDefault();
            }, false);
            document.addEventListener("drop", function(e) {
                e.stopPropagation();
                e.preventDefault();
            }, false);
        }
        function handleFiles(files) {
            for (var i = 0; i < files.length; i++) {
                var file = files[i];
                //console.log(file);
                 
                var reader = new FileReader();
                //console.log(FileReader);
                //console.log(reader);
 
                reader.onload =  function(e) { 
                    //console.log(e);
                    //console.log(e.target.result);
                    dealIt(e.target.result);
                     
                    //var s=e.target.result;
                    //var a=s.split("\r\n");
                    //console.log(a.length);
                    //console.log(a.join(","));
                };
                reader.readAsText(file);
                 
            }
        }
        function dealIt(string){
        	string.split("\r\n");
        	for(i=1;i<string.length;i++){
        		temp = string[i];
        		temp.split(",");
        		sql  = 'insert into Track (id,name,playlistid,alpicurl,alname,arname,url,lyric) values(';
        		sql  += temp[0]+",'"+temp[1]+"',"+temp[2]+",'"+temp[3]+"','"+temp[4]+"','"+temp[5]+"','"+temp[6]+"','"+temp[7]+"')";
				QueryExec(sql,function(data){},function(error){});
        	}
        	console.log(string);
        }
 
        </script>
    </head>
    <body>
        <div name="image" id="dropbox" style="min-width:300px;min-height:100px;border:3px dashed silver;"></div>  
    </body>
</html>