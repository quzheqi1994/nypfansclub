<?php
class MRedis{
    public $key;
    public $value;
    public $expire = 86400; /*60*60*24*/
    public $redis;
    public $ip = '127.0.0.1';
    public $port = 6379;
    private $password = null;
    public $dbindex = 0;

    public function __construct($key){
        //if(extension_loaded('redis')){
            if($this->redis = new redis()){
				$this->key = $key;
                if(!$this->ping()){
                    $this->redis = false;
                }else{
                    $this->redis->select($this->dbindex);
                    $this->redis->auth($this->password);
                }
            }else{
                $this->redis = false;
            }
        //}else{
        //    $this->redis = false;
        //}
    }

    public function ping(){
        return $this->redis->connect($this->ip,$this->port);
    }

    public function get(){
        if($this->redis->exists($this->key))
            return json_decode($this->redis->get($this->key),true);
        return false;
    }

    public function setex(){
        return $this->redis->setex($this->key,$this->expire,json_encode($this->value));
    }

    public function set(){
        if($this->redis->set($this->key,json_encode($this->value)))
            return $this->redis->expire($this->key,$this->expire);
        return false;
    }

    public function ttl(){
        return $this->redis->ttl($this->key);
    }

    public function del(){
        return $this->redis->del($this->key);
    }

    public function flushall(){
        return $this->redis->flushall();
    }

    public function keys(){
        return $this->redis->keys('*');
    }
}
?>