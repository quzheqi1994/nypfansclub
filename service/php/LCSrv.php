<?php
    require 'Vendor/autoload.php';

    use LeanCloud\Client;
    use LeanCloud\Query;
    use LeanCloud\Object;
    // 参数依次为 AppId, AppKey, MasterKey
    Client::initialize("3TERgHuTNnqCBjg3GeiPqzIR-gzGzoHsz", "cGcs8iM54vvAd2LoEE9UHPn4", "6zBdwnNaMm2xTgrPp1HsJ3bF");
    Client::setServerUrl("https://3terghut.api.lncld.net");
    date_default_timezone_set("Asia/Shanghai");
    
    function QueryExecInner($str){
        try {return Query::doCloudQuery($str);} 
        catch (Exception $ex) {return NULL;}
    }
    function QueryExecOuter($cql,$sql){
        try {
            $result = Query::doCloudQuery($cql);
            for($i=0;$i< count($result['results']);$i++){
                $msql = $sql.$result['results'][$i]->get('objectId').'"';
                if(!QueryExecInner($msql))
                    return NULL;
            }
            return $result;
        } catch (Exception $ex) {
            return NULL;
        }
    }
    function QueryExec($str){
        $str = trim(preg_replace("/\s+/",' ',$str));
        $array = explode(' ',$str);
        switch($array[0]){
            case "insert":
            case "select":
                try{return Query::doCloudQuery($str);}
                catch(Exception $e){return NULL;}
            break;
            case "update":
                $cql="select * from ".$array[1];
                $sql="";
                for($i=0;$i< count($array);$i++){
                    if($array[$i] == 'where'){
                        for($j=$i;$j< count($array);$j++)
                            $cql .= " ".$array[$j];
                        break;
                    }
                    else
                        $sql .=$array[$i]." ";
                }
                $sql .= ' where objectId="';
                return QueryExecOuter($cql,$sql);
            break;
            case "delete":
                $cql = str_replace("delete from","select * from",$str);
                $sql ="delete from ".$array[2].' where objectId="';
                return QueryExecOuter($cql,$sql);
            break;
        }
    }
    
    function getJson($table,$cond,$params,$orderBy='',$bAsc=true){
        $paramArr = explode(",",$params);
        $sql = "select $params from $table where $cond";
        if($orderBy != ''){
            $sql .= " order by $orderBy ";
            $sql .=  $bAsc ? "asc":"desc";
        }
        $result = QueryExec($sql);
        if(!$result) return NULL;
        if(!$result || !isset($result['results'])) return NULL;
        $count = count($result);
        if($count>0){
            for($i=0;$i < $count;$i++)
                foreach($paramArr as $v)
                    $ret[$i][$v] = $result[$i]->get($v);
            $json = json_encode($ret,JSON_UNESCAPED_UNICODE);
            $json = str_replace('\/','/',$json);
            return $json;
        }
        return false;
    }
    function getArr($table,$cond,$params,$orderBy='',$bAsc=true){
        $paramArr = explode(",",$params);
        $sql = "select $params from $table where $cond";
        if($orderBy != ''){
            $sql .= " order by $orderBy ";
            $sql .=  $bAsc ? "asc":"desc";
        }
        $result = QueryExec($sql);
        if(!$result || !isset($result['results'])) return NULL;
        $result = $result['results'];
        $count = count($result);
        if($count>0){
            for($i=0;$i < $count;$i++)
                foreach($paramArr as $v)
                    $ret[$i][$v] = $result[$i]->get($v);
            return $ret;
        }
        return false;
    }
    function getJsonOne($table,$cond,$params,$orderBy='',$bAsc=true){
        $paramArr = explode(",",$params);
        $sql = "select $params from $table where $cond";
        if($orderBy != ''){
            $sql .= " order by $orderBy ";
            $sql .=  $bAsc ? "asc":"desc";
        }
        $result = QueryExec($sql);
        if(!$result || !isset($result['results'])) return NULL;
        $result = $result['results'];
        $count = count($result);
        if($count>0){
            foreach($paramArr as $v)
                $ret[$v] = $result[0]->get($v);
            $json = json_encode($ret,JSON_UNESCAPED_UNICODE);
            $json = str_replace('\/','/',$json);
            return $json;
        }
        return false;
    }
    function getArrOne($table,$cond,$params,$orderBy='',$bAsc=true){
        $paramArr = explode(",",$params);
        $sql = "select $params from $table where $cond";
        if($orderBy != ''){
            $sql .= " order by $orderBy ";
            $sql .=  $bAsc ? "asc":"desc";
        }
        $result = QueryExec($sql);
        if(!$result || !isset($result['results'])) return NULL;
        $result = $result['results'];
        $count = count($result);
        if($count>0){
            foreach($paramArr as $v)
                $ret[$v] = $result[0]->get($v);
            return $ret;
        }
        return false;
    }
?>