<?php
include('MMysql.class.php');
$mysql = new MMysql(0);

//����
$data = array(
    'col1'=>3,
    'col2'=>141421,
    );
$mysql->insert('table1',$data);

//��ѯ    
$res = $mysql->field('col1,col2')
    ->order('col1 asc,col2 desc')
    ->where('col1<4')
    //->limit(2)
    ->select('table1');
print_r($res);

//����
$mysql->where('col1=2')->update('table1',$data);
//ɾ��
//$mysql->where('col1=3')->delete('table1');

//��ȡ���ִ�е�sql���
$sql = $mysql->getLastSql();
echo $sql;
//ֱ��ִ��sql���
$sql = "show tables";
$res = $mysql->doSql($sql);
print_r($res);

//����
//$mysql->startTrans();
//$mysql->where(array('sid'=>103))->update('t_table',array('bbc'=>'�Ǻ�8888�Ǻ�'));
//$mysql->where(array('sid'=>104))->delete('t_table');
//$mysql->commit();
?>