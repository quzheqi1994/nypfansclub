<?php
	define('CACHE_PATH', 'cache/'); 
	include("../service/php/LCSrv.php");
	$types = $_REQUEST['types'];
	$id = $_REQUEST['id'];
	$json = '';
	
    $cache = CACHE_PATH.$types.'_'.$id.'.json';
    error_reporting(0);
    if(file_exists($cache)) {   // ������ڣ����ȡ����
        $data = file_get_contents($cache);
    	echo $_GET['callback'].'('.$data.')';
    	exit();
    }

	if($types=="playlist"){
            /*
			playlist:
				name �б�����
				coverImgUrl �б����
				crnickname �б���������
				cravatarUrl �б�����ͷ��
				tracks[i]
					id ����ID
					name ��������
					arname ר������
					alname ����������
					alpicurl ר��ͼƬ
            */
		$result = QueryExec("select * from playlist where playlistid = $id");
		if(count($result['results'])>0){
			$ret['playlist']['name']        = $result['results'][0]->get('name');
			$ret['playlist']['coverImgUrl'] = $result['results'][0]->get('coverImgUrl');
			$ret['playlist']['crnickname']  = $result['results'][0]->get('crnickname');
			$ret['playlist']['cravatarUrl'] = $result['results'][0]->get('cravatarUrl');
			$tracks = $result['results'][0]->get('tracklist');
			$arr    = explode(',',$tracks);
			
			$results = QueryExec("select * from Track where playlistid = $id order by id asc");
			if(count($results['results'])>0){
				for($i = 0;$i < count($results['results']);$i++){
					$ret['playlist']['tracks'][$i]['id']       = $results['results'][$i]->get('id');
					$ret['playlist']['tracks'][$i]['name']     = $results['results'][$i]->get('name');
					$ret['playlist']['tracks'][$i]['arname']   = $results['results'][$i]->get('arname');
					$ret['playlist']['tracks'][$i]['alname']   = $results['results'][$i]->get('alname');
					$ret['playlist']['tracks'][$i]['alpicurl'] = $results['results'][$i]->get('alpicurl');
				}
			}
			if(isset($_GET['debug'])){
				print_r($ret);
				exit();
			}
			$json = json_encode($ret,JSON_UNESCAPED_UNICODE);
			$json = str_replace('\/','/',$json);
		}
	}
	else{
		$result = QueryExec("select $types from Track where id = $id");
		if(count($result['results'])>0){
			$ret[$types] = $result['results'][0]->get($types);
			$json = json_encode($ret);
		}
	}
	echo $_GET['callback'].'('.$json.')';
	file_put_contents($cache, $json);
?>