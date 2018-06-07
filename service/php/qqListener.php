<?php
    header("Content-type:text/html;charset=utf-8");
    require_once("LCSrv.php");
    if(!isset($_GET['msg'])){
      echo "Error";exit();
    }

    $msg = $_GET['msg'];
    //$fromQQ = $_GET['fromQQ'];
    
    RobotForRaise($msg);

    function RobotForRaise($msg){
        if(!strpos($msg,"GNZ48农燕萍应援会")){
            echo "Error";
            exit();
        }
        if(strcmp(date("H"),"19")>0){
            echo "限时集资已于20:00结束，感谢您的支持！\n";
            exit();
        }
    }
    
    function SortSelf($msg){
        $array = explode(' ',$msg);
        $fromUser = substr($array[0],1);
        $index = strpos($msg,"打赏了");
        if($index > 0){
            $money = floatval(substr($msg,$index+6));
            if($money>0){
                echo "感谢 @".$fromUser." ,您本次集资".$money."元。\n";
                $fromUseru8 = iconv('GB2312', 'UTF-8', $fromUser);
                QueryExec("insert into Temp(name,money) values('$fromUseru8',$money)");
                $arr = GetArr("Temp","money>0","name,money");
                foreach($arr as $v){
                    if(!isset($re[$v['name']]))
                        $re[$v['name']] = 0;
                    $re[$v['name']]+=$v['money'];
                }
                arsort($re);
                $index = 1;
                $output = "排行榜：\n";
                foreach($re as $k=>$v){
                    $tmp = iconv('UTF-8', 'GB2312', $k);
                    if($index<5)
                        $output .= "第 $index 名：".$tmp.",".$v."元\n";
                    if($tmp==$fromUser)
                        $input="您的当前排名：第 $index 名，您本次限时集资 $v 元\n\n";
                    $index++;
                }
                if(isset($input))
                    echo $input;
                if(isset($output))
                    echo $output;
                echo "Fighting!";
            }
            else{
                echo "Error";
            }
        }
    }
?>