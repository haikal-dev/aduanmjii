
<?php

class InfoModel extends SQLite3
{
	public function __construct(){
		$this->open('mjiihostpot.db');
	}
	
	public function get_info_all($full = true){
		$limit = 'LIMIT 10';
		if(!$full){
			$limit = '';
		}
		$query = $this->query("SELECT * FROM information ORDER BY id DESC $limit;");
		$arr = array();
		while($row = $query->fetchArray()){
			if(!$full){
				$row['message'] = substr($row['message'], 0, 100);
			}
			$row['updated'] = $this->convertTime(gmdate('Y-m-d H:i:s', $row['updated']));
			$arr[] = $row;
		}
		return $arr;
	}
	
	public function create_info($data){
		$title = $this->escapeString($data['title']);
		$status = $this->escapeString($data['status']);
		$message = $this->escapeString($data['message']);
		$time = time();
		
		$this->query("INSERT INTO information(
			id,
			title,
			status,
			message,
			updated
		) VALUES(
			NULL,
			'$title',
			'$status',
			'$message',
			'$time'
		);");
	}
	
	public function delete_by_id($id){
		$query = $this->query("DELETE FROM information WHERE id='$id'");
		$status = false;
		if($query){
			$status = true;
		}
		return $status;
	}
	
	public function get_info_by_id($id){
		$query = $this->query("SELECT * FROM information WHERE id='$id';");
		$row = $query->fetchArray();
		return $row;
	}
	
	public function total_info(){
		$query = $this->query("SELECT count(*) as count FROM information;");
		$row = $query->fetchArray();
		return $row['count'];
	}
	
	public function convertTime($datetime, $full = false){
		$now = new DateTime(gmdate('Y-m-d H:i:s', time()));
		$ago = new DateTime($datetime);
		$diff = $now->diff($ago);

		$diff->w = floor($diff->d / 7);
		$diff->d -= $diff->w * 7;

		$string = array(
			'y' => 'year',
			'm' => 'month',
			'w' => 'week',
			'd' => 'day',
			'h' => 'hour',
			'i' => 'minute',
			's' => 'second',
		);
		foreach ($string as $k => &$v) {
			if ($diff->$k) {
				$v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
			} else {
				unset($string[$k]);
			}
		}

		if (!$full) $string = array_slice($string, 0, 1);
		return $string ? implode(', ', $string) . ' ago' : 'Just now';
	}
}