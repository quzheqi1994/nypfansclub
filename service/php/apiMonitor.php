<?php
/*
用户级错误
-1   //次数不足
-2   //频率超限
客户端错误
-101 //未传入用户键值
-102 //init参数格式错误
-103 //Redis该值不存在
系统级错误
-201 //Redis初始化失败
-202 //Redis设置值失败
-203 //Redis获取值失败
*/
	//系统级常量
    date_default_timezone_set('PRC');
	$time_init = 1536395276;//浮点值unix初始时间戳 当前为 201809080000
    $today = intval(strtotime(date("Y-m-d 00:00:00"))) - $time_init;

	if( !isset($_GET['key']) || !isset($_GET['init']))
		ret(-101);//未传入用户键值
	if(!$redis = new MRedis($_GET['key']))
		ret(-201);//Redis初始化失败
	if(!$redis->exists())
		ret(-103);//该值不存在
	if(!$monitor = $redis->get())
		ret(-203);//获取值失败
	if( $monitor[4] < $today || isset($_GET['force_set_init']) ){//跨天判断
		$array[0] = intval($_GET['init']) - 1;
		if( $array[0] <= 0 )
			ret(-102);//错误的初始化值
		for( $i = 1; $i < 6; ++$i ){
			list($t1,$t2) = explode(' ', microtime());
			$array[$i] = floatval($t1)+floatval($t2) - $time_init - 1;//减掉初始时间戳再减一秒
		}
		if( !$redis->set($array) )
			ret(-202);//Redis设置键值失败
		ret($array[0]);//一定是大于0的数字
	}
		
	//{500,57901.826071024,57902.826071024,57903.826071024,57905.826071024}
	if($monitor[0]<=0)
		ret(-1);//次数不足
	$bal = $monitor[0] - 1;
	list($t1, $t2) = explode(' ', microtime());
	$time = floatval($t1)+floatval($t2) - $time_init;
	if($time-1 < $monitor[1])
		ret(-2);//频率超限
	if( !$redis->set(array_merge(array($bal),array_slice($monitor,2),array($time))) )
		ret(-202);//设置键值失败
	ret($bal);//剩余量

	class MRedis{
		public $key;
		public $value;
		public $expire = 86400; /*60*60*24*/
		public $redis;

		public function __construct($key){
			if($this->redis = new redis()){
				if(!$this->redis->connect('127.0.0.1',6379)){
					$this->redis = false;
				}else{
					$this->key = $key;
					$this->redis->select(0);
					$this->redis->auth(null);
				}
			}else{
				$this->redis = false;
			}
		}

		public function exists(){
			return $this->redis->exists($this->key);
		}
		
		public function get(){
			return json_decode($this->redis->get($this->key),true);
		}

		public function set($value){
			//return $this->redis->set($this->key,json_encode($value));
			if($this->redis->set($this->key,json_encode($value)))
				return $this->redis->expire($this->key,$this->expire);
			return false;
		}
	}

	function ret($code){
		echo $code;
		exit();
	}
?>