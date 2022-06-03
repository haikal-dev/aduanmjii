<?php

require_once "../app/models/Database.php";
require_once "../app/models/TimeModel.php";

class mjiinetwork extends Database
{
	public $db;
	public $timeModel;
	public $response;
	
	public function __construct(){
		$this->db = $this->connect("mjiinetwork");
		$this->timeModel = new TimeModel;
	}

	public function projectAdd($title, $video_url, $description){
		$title = $this->db->real_escape_string($title);
		$video_url = $this->db->real_escape_string($video_url);
		$description = $this->db->real_escape_string($description);
		$time = time();
		return $this->db->query("INSERT INTO projects(title, video_url, description, created_at, updated_at) VALUES('$title', '$video_url', '$description', '$time', '$time');");
	}

	public function printProjectRequest(){
		$data = [];
		$query = $this->db->query("SELECT * FROM projects ORDER BY id DESC;");
		while($row = $query->fetch_assoc()){
			$row['created_at'] = gmdate('d/m/Y H:i', $row['created_at'] + (3600*8));
			$data[] = $row;
		}
		return $data;
	}

	public function rmProject($id){
		return $this->db->query("DELETE FROM projects WHERE id=" . $id);
	}
	
	public function network_exists($id){
		$query = $this->db->query("SELECT * FROM netwatch WHERE id='$id';");
		$this->response['ok'] = false;
		$this->response['msg'] = "Network was not exist!";
		$row = $query->fetch_assoc();
		if(isset($row['id']) && $row['id'] == $id){
			$this->response['ok'] = true;
		}
		
		return $this->response['ok'];
	}
	
	public function network_display(){
		$query = $this->db->query("SELECT * FROM netwatch ORDER BY device ASC;");
		$arr = [];
		while($row = $query->fetch_assoc()){
			$row['updated_at'] = ($row['updated_at'] == '') ? "n/a" : $this->timeModel->timeago('@'.$row['updated_at']);
			if($row['status'] == 'up'){
				$row['status'] = "Connected";
			}
			elseif($row['status'] == 'down'){
				$row['status'] = "Disconnected";
			}
			$arr[] = $row;
		}
		return json_encode($arr, JSON_PRETTY_PRINT);
	}
	
	public function network_update($id, $status){
		$this->response['ok'] = false;
		$this->response['msg'] = "Network can't be update. Probably database error.";
		
		$ok = false;
		
		if($status == 'up' || $status == 'down'){
			$modified = time();
			$query = $this->db->query("UPDATE netwatch SET status='$status', updated_at='$modified' WHERE id='$id';");
			if($query){
				$this->response['ok'] = true;
				$this->response['msg'] = "Updated successfully.";
			}
		}
	}
	
	public function check_battery($id){
		$query = $this->db->query("SELECT voltage FROM batteries WHERE routerid='$id';");
		$arr = [];
		while($row = $query->fetch_assoc()){
			//$row['created_at'] = gmdate("d/m/Y H:i", $row['created_at'] + (3600*8));
			$arr[] = $row;
		}
		return $arr;
	}
	
	public function check_current_battery($id){
		$query = $this->db->query("SELECT voltage FROM batteries WHERE routerid='$id';");
		$arr = [];
		while($row = $query->fetch_assoc()){
			//$row['created_at'] = gmdate("d/m/Y H:i", $row['created_at'] + (3600*8));
			$arr[] = $row;
		}
		$total_data = count($arr);
		$arr = array_slice($arr, ($total_data-1), $total_data);
		return $arr;
	}
	
	public function battery_update($id, $voltage){
		$created_at = time();
		$id = $this->db->real_escape_string($id);
		$voltage = $this->db->real_escape_string($voltage);
		
		$query = $this->db->query("INSERT INTO batteries(id, routerid, voltage, created_at) VALUES(NULL, '$id', '$voltage', '$created_at');");
		return $query;
	}
	
	public function response(){
		return json_encode($this->response, JSON_PRETTY_PRINT);
	}
}