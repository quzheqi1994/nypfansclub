<?php
include('MMysql.class.php');
$mysql = new MMysql(0);

//插入
$data = array(
    'col1'=>3,
    'col2'=>141421,
    );
$mysql->insert('table1',$data);

//查询    
$res = $mysql->field('col1,col2')
    ->order('col1 asc,col2 desc')
    ->where('col1<4')
    //->limit(2)
    ->select('table1');
print_r($res);

//更新
$mysql->where('col1=2')->update('table1',$data);
//删除
//$mysql->where('col1=3')->delete('table1');

//获取最后执行的sql语句
$sql = $mysql->getLastSql();
echo $sql;
//直接执行sql语句
$sql = "show tables";
$res = $mysql->doSql($sql);
print_r($res);

//事务
//$mysql->startTrans();
//$mysql->where(array('sid'=>103))->update('t_table',array('bbc'=>'呵呵8888呵呵'));
//$mysql->where(array('sid'=>104))->delete('t_table');
//$mysql->commit();
?>