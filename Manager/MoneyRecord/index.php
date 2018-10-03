<?php
	$origin_id = isset($_GET['oid'])? $_GET['oid']:'30947';
	if(!isset($_GET['output']))
    {
?>
<html>
    <head>  
        <meta charset="UTF-8">
        <style>
            .wds_like_ul .wds_item {
                margin-top: 30px;
                height: 42px;
                display: block;
                position: relative;
                padding-left: 77px;
                box-sizing: border-box;
            }
            .wds_item .no {
                width: 19px;
                height: 30px;
                position: absolute;
                text-align: center;
                font-size: 16px;
                line-height: 30px;
                left: 0;
                top: 50%;
                -webkit-transform: translateY(-50%);
                -ms-transform: translateY(-50%);
                transform: translateY(-50%);
            }
            .wds_item .item_logo {
                width: 42px;
                height: 42px;
                position: absolute;
                left: 26px;
                top: 50%;
                -webkit-transform: translateY(-50%);
                -ms-transform: translateY(-50%);
                transform: translateY(-50%);
            }
            .wds_item .item_logo img {
                width: calc(100% - 2px);
                width: -webkit-calc(100% - 2px);
                width: -moz-calc(100% - 2px);
                height: calc(100% - 2px);
                height: -webkit-calc(100% - 2px);
                height: -moz-calc(100% - 2px);
                border-radius: 50%;
                border: 1px solid #dee0e1;
            }
            .wds_item .item_logo {
                width: 42px;
                height: 42px;
                position: absolute;
                left: 26px;
                top: 50%;
                -webkit-transform: translateY(-50%);
                -ms-transform: translateY(-50%);
                transform: translateY(-50%);
            }
            .item_cont p:first-child {
                float: left;
                width: 222px;
                overflow: hidden;
                white-space: nowrap;
                text-overflow: ellipsis;
            }
            .item_cont p:last-child {
                position: absolute;
                right: 0;
                top: 50%;
                transform: translateY(-50%);
                -webkit-transform: translateY(-50%);
                -moz-transform: translateY(-50%);
            }
            .wds_item.first .item_logo img {
                border: 2px solid #f12453;
            }
            .wds_item.first .no {
                background: url(https://s.moimg.net/img/web4-0/wds_project/gold@2x.png) no-repeat center center;
                -webkit-background-size: contain;
                background-size: contain;
            }
            .wds_item.second .item_logo img {
                border: 2px solid #0d83d3;
            }
            .wds_item.second .no {
                background: url(https://s.moimg.net/img/web4-0/wds_project/silver@2x.png) no-repeat center center;
                -webkit-background-size: contain;
                background-size: contain;
            }
            .wds_item.third .item_logo img {
                border: 2px solid #079882;
            }
            .wds_item.third .no {
                background: url(https://s.moimg.net/img/web4-0/wds_project/bronze@2x.png) no-repeat center center;
                -webkit-background-size: contain;
                background-size: contain;
            }
            .btn {
                display: block;
                font-weight: 400;
                width:100%;
                color: #fff;
                background-color: #007bff;
                border-color: #007bff;
                text-align: center;
                white-space: nowrap;
                vertical-align: middle;
                -webkit-user-select: none;
                -moz-user-select: none;
                -ms-user-select: none;
                user-select: none;
                border: 1px solid transparent;
                padding: .375rem .75rem;
                font-size: 1rem;
                line-height: 1.5;
                border-radius: .25rem;
                transition: background-color .15s ease-in-out,border-color .15s ease-in-out,box-shadow .15s ease-in-out;
            }
        </style>
    </head>
    <body>
		<button class="btn" data-toggle="button" align="center" onclick="window.location.href='index.php?output&oid=<?php echo $origin_id;?>';">生成EXCEL</button>
<?php
        $result = "";$page = 0;
        while($str = getList($origin_id,++$page))
            $result .= $str;
        $result = preg_replace("/\s+<\/ul>\s+<ul class=\"wds_like_ul\">/",'',$result);
        echo $result.'</body></html>';
    }
	else//生成excel
    {
        header("Content-type:text/html;charset=utf-8");
        header("Content-type:application/vnd.ms-excel");    
        header("Content-Disposition:filename=集资记录.打开弹窗请点击确认.xls");  
        
        $result="序号\tID\t金额\r";
        $index = $page = 0;
        while($str = getArray($origin_id,++$page))
            foreach ($str as $row)
                $result.=++$index."\t".$row[0]."\t".$row[1]."\r";
        $result=iconv('UTF-8',"GB2312//IGNORE",$result);
        exit($result);
    }
    
//*
// 将UNICODE编码后的内容进行解码
function unescape($str) {
    $str = rawurldecode($str);
    preg_match_all("/(?:%u.{4})|.+/U",$str,$r);
    $ar = $r[0];
    foreach($ar as $k=>$v)
        if(substr($v,0,2) == "%u")
            $ar[$k] = iconv("UCS-2BE","UTF-8",pack("H4",substr($v,-4)));
    return join("",$ar);
}
function getList($origin_id,$page){
    $url = "http://127.0.0.1:8008/tops?ids=$origin_id&page=$page";
    $html =  file_get_contents($url);
    if(!strpos($html,'img'))
        return false;
    $html = str_replace('\u','%u',$html);
    $html = unescape($html);
    $html = str_replace('\n',"\n",$html);
    $html = str_replace('\\',"",$html);
    $html = preg_replace('/","title":"支持者 \S+;/', '', $html);
    $html = preg_replace("/[\s\S]+?<ul/", '<ul', $html);
    return $html;
}
function getArray($origin_id,$page){
    $url = "http://127.0.0.1:8008/tops?ids=$origin_id&page=$page";
    $html =  file_get_contents($url);
    if(!strpos($html,'img'))
        return false;
    $html = str_replace('\u','%u',$html);
    $html = unescape($html);
    preg_match_all("/<p>([^<]+)[\s\S]+?<p>¥([^<]+)/",$html,$arr);
    if(count($arr)<3)
        return false;

    foreach($arr[1] as $k=>$v)
        $ret[$k][0] = preg_replace("/[\s]+/",'',$v);
    foreach($arr[2] as $k=>$v)
        $ret[$k][1] = $v;
    return $ret;
}
?>