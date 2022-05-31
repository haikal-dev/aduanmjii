<?php
namespace haikal;

class Announcement
{
	protected $db;
	protected $dbname= "../app/databases/mjiihotspot.db";
	
	public function __construct(){
		
	}
	
	public function doList(){
		$this->db = new \SQLite3($this->dbname);
		
		$query = $this->db->query("SELECT * FROM announcements ORDER BY updated DESC;");
		
		$arr = [];
		while($row = $query->fetchArray()){
			$row['updated'] = gmdate("d-m-Y H:i", $row['updated'] + (3600 * 8));
			$arr[] = $row;
		}
		$this->db->close();
		return $arr;
	}
	
	public function show(){
		$this->db = new \SQLite3($this->dbname);
		
		$query = $this->db->query("SELECT * FROM announcements WHERE published='1' ORDER BY updated DESC;");
		
		$arr = [];
		while($row = $query->fetchArray()){
			$row['updated'] = gmdate("d-m-Y H:i", $row['updated'] + (3600 * 8));
			$arr[] = $row;
		}
		$this->db->close();
		return $arr;
	}
	
	public function latest(){
		$this->db = new \SQLite3($this->dbname);
		
		require_once "../app/models/TimeModel.php";
		$sys = new \TimeModel;
		
		$query = $this->db->query("SELECT * FROM announcements WHERE published=1 ORDER BY updated DESC LIMIT 1;");
		
		$row = $query->fetchArray();
		if(isset($row['id'])){
			$row['ago'] = $sys->timeago("@" . $row['updated']);
			$row['updated'] = gmdate("d-m-Y", $row['updated'] + (3600 * 8));
			$row['message'] = html_entity_decode($row['message']);
		}
		
		
		$this->db->close();
		return $row;
	}
	
	public function remove($id){
		$this->db = new \SQLite3($this->dbname);
		$query = $this->db->query("DELETE FROM announcements WHERE id='$id';");
		$this->db->close();
		
		if($query) {
			return true;
		}
		
		else {
			return false;
		}
	}
	
	public function getPost($id){
		$this->db = new \SQLite3($this->dbname);
		
		$id = $this->db->escapeString($id);
		$query = $this->db->query("SELECT * FROM announcements WHERE id='$id';");
		$row = $query->fetchArray();
		$row['updated'] = gmdate("d-m-Y H:i", $row['updated'] + (3600 * 8));
		$row['message'] = html_entity_decode($row['message']);
		return $row;
	}
	
	public function doCreate($title, $message, $saveas){
		$this->db = new \SQLite3($this->dbname);
		
		$title 		= $this->db->escapeString($title);
		$message 	= $this->db->escapeString($message);
		$message 	= htmlspecialchars($message);
		$saveas 	= $this->db->escapeString($saveas);
		$createdAt	= time();
		
		
		$query = $this->db->query("INSERT INTO announcements(id,title,message,updated,published) VALUES(NULL, '$title', '$message', '$createdAt', '$saveas');");
		
		$this->db->close();
		
		if($query){
			return true;
		}
		else {
			return false;
		}
	}
	
	public function doEdit($id, $title, $message, $saveas){
		$this->db = new \SQLite3($this->dbname);
		
		$id			= $this->db->escapeString($id);
		$title 		= $this->db->escapeString($title);
		$message 	= $this->db->escapeString($message);
		$message 	= htmlspecialchars($message);
		$saveas 	= $this->db->escapeString($saveas);
		$createdAt	= time();
		
		
		$query = $this->db->query("UPDATE announcements SET title='$title', message='$message', updated='$createdAt', published='$saveas' WHERE id='$id';");
		
		$this->db->close();
		
		if($query){
			return true;
		}
		else {
			return false;
		}
	}
}