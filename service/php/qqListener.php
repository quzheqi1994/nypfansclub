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
        if(!strpos($msg,"GNZ48ũ��ƼӦԮ��")){
            echo "Error";
            exit();
        }
        if(strcmp(date("H"),"19")>0){
            echo "��ʱ��������20:00��������л����֧�֣�\n";
            exit();
        }
    }
    
    function SortSelf($msg){
        $array = explode(' ',$msg);
        $fromUser = substr($array[0],1);
        $index = strpos($msg,"������");
        if($index > 0){
            $money = floatval(substr($msg,$index+6));
            if($money>0){
                echo "��л @".$fromUser." ,�����μ���".$money."Ԫ��\n";
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
                $output = "���а�\n";
                foreach($re as $k=>$v){
                    $tmp = iconv('UTF-8', 'GB2312', $k);
                    if($index<5)
                        $output .= "�� $index ����".$tmp.",".$v."Ԫ\n";
                    if($tmp==$fromUser)
                        $input="���ĵ�ǰ�������� $index ������������ʱ���� $v Ԫ\n\n";
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