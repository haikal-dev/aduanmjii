<?php

class IssueModel
{
	protected $MYTIME;
	protected $db;

	// paginations for issue data
	public $paginate = [];
	
	public function __construct(){
		require_once "../app/models/TimeModel.php";
		require_once "../app/models/Database.php";
		$this->MYTIME = new TimeModel;
		$db = new Database;
		$this->db = $db->connect('mjiinetwork');
	}

	public function get_report_statistic(){
		$data = $this->show_simple_issue_all();

		$arr = [];
		$dates = [];
		$numbers = [];

		foreach($data as $j){
			$date = gmdate('Y', $j['updated'] + (3600*8));

			if(!isset($arr[$date])){
				$arr[$date] = 1;
			}

			else {
				$arr[$date]++;
			}
		}

		foreach($arr as $k => $v){
			$dates[] = $k;
			$numbers[] = $v;
		}

		return [
			'date' => $dates,
			'numbers' => $numbers
		];
	}

	public function updateSolution($id, $solution){
		$id = $this->db->real_escape_string($id);
		$solution = $this->db->real_escape_string($solution);
		return $this->db->query("UPDATE messages SET solution='$solution' WHERE id='$id';");
	}

	public function removeIssue($id){
		$id = $this->db->real_escape_string($id);
		return $this->db->query("DELETE FROM messages WHERE id='$id';");
	}

	public function updateStatus($id, $status){
		$id = $this->db->real_escape_string($id);
		$status = $this->db->real_escape_string($status);
		return $this->db->query("UPDATE messages SET status='$status' WHERE id='$id';");
	}
	
	public function download_data_by_date(){
		$query = $this->query("select * from messages;");
		$data = [];
		while($row = $query->fetchArray()){
			$date = $row['updated'] + (3600*8);
			$year = gmdate('Y', $date);
			$month = gmdate('m', $date);
			$day = gmdate('d', $date);
			
			$timestamp = mktime(0, 0, 0, $month, $day, $year);
			$data[] = $timestamp * 1000;
		}
		return $data;
	}
	
	public function get_unread_report(){
		$query = $this->db->query("SELECT * FROM messages WHERE status='0' ORDER BY id DESC;");
		$arr = [];
		while($row = $query->fetch_assoc()){
			$limit_message = 100;
			if(strlen($row['message']) > $limit_message){
				$row['message'] = substr($row['message'],0,$limit_message) . "...";
			}
			$pole = $this->get_pole_id($row['pole']);
			$row['pole'] = $pole['name'] . " - " . $pole['place'];
			$row['updated'] = $this->MYTIME->timeago(gmdate("Y-m-d H:i:s", $row['updated']));
			$arr[] = $row;
		}
		return $arr;
	}
	
	public function register_new_report($data = array()){
		$name = $this->db->real_escape_string($data['name']);
		$memberid = $this->db->real_escape_string($data['memberid']);
		$roomno = $this->db->real_escape_string($data['roomno']);
		$phone = $this->db->real_escape_string($data['phone']);
		$pole	= $this->db->real_escape_string($data['pole']);
		$message = $this->db->real_escape_string($data['message']);
		$status = "0";
		$updated = time();
		
		$s = false;
		
		$q = $this->db->query("insert into messages values(NULL, '$name', '$memberid', '$roomno', '$phone', '$pole', '$message', '', '$updated', '$status');");
		if($q){
			$s = true;
		}
		return $s;
	}
	
	public function show_short_data(){
		$query = $this->query("SELECT * FROM messages WHERE status='3' OR status='4' ORDER BY id DESC LIMIT 10;");
		$arr = [];
		while($row = $query->fetchArray()){
			$row['checked'] = ($row['status'] == 3) ? 'checked' : 'value=""';
			$row['message'] = substr($row['message'], 0, 100);
			if($row['status'] == 3 || $row['status'] == 4){
				$row['updated'] = $this->MYTIME->timeago(gmdate('Y-m-d H:i:s', $row['updated']));
				$arr[] = $row;
			}
		}
		return $arr;
	}
	
	public function get_total_progress(){
		$query = $this->db->query("SELECT count(*) AS total FROM messages where status='4';");
		$row = $query->fetch_assoc();
		return $row['total'];
	}
	
	public function total_issue_resolved(){
		$query = $this->db->query("SELECT count(*) AS total FROM messages where status='3';");
		$row = $query->fetch_assoc();
		return $row['total'];
	}
	
	public function get_total_unsolved(){
		$query = $this->db->query("SELECT count(*) AS total FROM messages where status='2';");
		$row = $query->fetch_assoc();
		return $row['total'];
	}
	
	public function get_total_issue(){
		$query = $this->db->query("SELECT count(*) as count FROM messages;");
		$row = $query->fetch_assoc();
		return $row['count'];
	}
	
	public function get_total_unread_report(){
		$query = $this->db->query("SELECT count(*) as count FROM messages WHERE status='0';");
		$query1 = $this->db->query("SELECT count(*) as count FROM messages WHERE status='1';");
		$row = $query->fetch_assoc();
		$row1 = $query1->fetch_assoc();
		return $row['count'] + $row1['count'];
	}
	
	public function list_pole(){
		$q = $this->db->query("select * from poles;");
		$arr = array();
		while($row = $q->fetch_assoc()){
			$arr[] = $row;
		}
		return $arr;
	}
	
	public function get_pole_id($id){
		$q = $this->db->query("select * from poles where id='$id';");
		$r = $q->fetch_assoc();
		return $r;
	}
	
	public function show_notification_number(){
		$query = $this->query("SELECT count(*) as count FROM messages WHERE status='4';");
		$row = $query->fetchArray();
		return $row['count'];
	}

	

	public function show_solved_issue_all(){
		$query = $this->db->query("SELECT * FROM messages WHERE status='3' ORDER BY id DESC;");
		$arr = [];
		while($row = $query->fetch_assoc()){
			$row['checked'] = ($row['status'] == 3) ? 'checked' : 'value=""';
			if(strlen($row['message']) >= 100){
				$row['message'] = substr($row['message'], 0, 100) . "...";
			}
			
			// readable text status
			if($row['status'] == '3'){ $row['status'] = 'Resolved / Closed'; }

			// readable datetime
			$row['updated'] = gmdate("Y-m-d H:i", $row['updated'] + (3600*8));

			// readable pole name
			$pole = $this->get_pole_id($row['pole']);
				
			if(isset($pole['name'])){
				$row['polename'] = ($pole['name'] == '') ? "" : $pole['name'];
			}
			
			else{
				$row['polename'] = "";
			}

			$arr[] = $row;
		}
		return $arr;
	}

	public function show_new_issue_all(){
		$query = $this->db->query("SELECT * FROM messages WHERE status='0' OR status='1' ORDER BY id DESC;");
		$arr = [];
		while($row = $query->fetch_assoc()){
			$row['checked'] = ($row['status'] == 3) ? 'checked' : 'value=""';
			if(strlen($row['message']) >= 100){
				$row['message'] = substr($row['message'], 0, 100) . "...";
			}
			
			// readable text status
			if($row['status'] == '0' || $row['status'] == '1'){ $row['status'] = 'New'; }

			// readable datetime
			$row['updated'] = gmdate("Y-m-d H:i", $row['updated'] + (3600*8));

			// readable pole name
			$pole = $this->get_pole_id($row['pole']);
				
			if(isset($pole['name'])){
				$row['polename'] = ($pole['name'] == '') ? "" : $pole['name'];
			}
			
			else{
				$row['polename'] = "";
			}

			$arr[] = $row;
		}
		return $arr;
	}

	public function show_unsolved_issue_all(){
		$query = $this->db->query("SELECT * FROM messages WHERE status='2' ORDER BY id DESC;");
		$arr = [];
		while($row = $query->fetch_assoc()){
			$row['checked'] = ($row['status'] == 3) ? 'checked' : 'value=""';
			if(strlen($row['message']) >= 100){
				$row['message'] = substr($row['message'], 0, 100) . "...";
			}
			
			// readable text status
			if($row['status'] == '0' || $row['status'] == '2'){ $row['status'] = 'Unsolved / Closed'; }

			// readable datetime
			$row['updated'] = gmdate("Y-m-d H:i", $row['updated'] + (3600*8));

			// readable pole name
			$pole = $this->get_pole_id($row['pole']);
				
			if(isset($pole['name'])){
				$row['polename'] = ($pole['name'] == '') ? "" : $pole['name'];
			}
			
			else{
				$row['polename'] = "";
			}

			$arr[] = $row;
		}
		return $arr;
	}

	public function show_progress_issue_all(){
		$query = $this->db->query('SELECT * FROM messages WHERE status="4" ORDER BY id DESC;');
		$arr = [];
		while($row = $query->fetch_assoc()){
			$row['checked'] = ($row['status'] == 3) ? 'checked' : 'value=""';
			if(strlen($row['message']) >= 100){
				$row['message'] = substr($row['message'], 0, 100) . "...";
			}
			if($row['status'] == 3 || $row['status'] == 4){
				
				// readable text status
				if($row['status'] == '3'){ $row['status'] = 'Resolved'; }
				elseif($row['status'] == '4'){ $row['status'] = 'Progress'; }
				
				// readable datetime
				$row['updated'] = gmdate("Y-m-d H:i", $row['updated'] + (3600*8));
				
				// readable pole name
				$pole = $this->get_pole_id($row['pole']);
				
				if(isset($pole['name'])){
					$row['polename'] = ($pole['name'] == '') ? "" : $pole['name'];
				}
				
				else{
					$row['polename'] = "";
				}
				$arr[] = $row;
			}
		}
		return $arr;
	}

	public function show_simple_issue_all(){
		$query = $this->db->query('SELECT * FROM messages ORDER BY updated ASC;');
		$arr = [];
		while($row = $query->fetch_assoc()){
			$arr[] = $row;
		}
		return $arr;
	}

	public function show_issue_by_pagination($page){
		// retrieve all data
		$data = $this->show_issue_all();

		// The number of records to display per page
		$page_size = 10;
		
		// Calculate total number of records, and total number of pages
		$total_records = count($data);
		$total_pages   = ceil($total_records / $page_size);

		// Validation: Page to display can not be greater than the total number of pages
		if ($page > $total_pages) {
			$page = $total_pages;
		}

		// Validation: Page to display can not be less than 1
		if ($page < 1) {
			$page = 1;
		}

		// Calculate the position of the first record of the page to display
		$offset = ($page - 1) * $page_size;

		// Get the subset of records to be displayed from the array
		$data = array_slice($data, $offset, $page_size);

		$this->paginate = [
			// variables for pagination links
			'first' => $page > 1 ? 1 : '#',
			'prev'  => $page > 1 ? $page-1 : '#',
			'next'  => $page < $total_pages ? $page + 1 : '#',
			'last'  => $page < $total_pages ? $total_pages : '#',
			'status' => 'Page ' . $page . ' of ' . $total_pages
		];

		return $data;
	}
	
	public function show_issue_all(){
		$query = $this->db->query('SELECT * FROM messages ORDER BY id DESC;');
		$arr = [];
		while($row = $query->fetch_assoc()){
			$row['checked'] = ($row['status'] == 3) ? 'checked' : 'value=""';
			if(strlen($row['message']) >= 100){
				$row['message'] = substr($row['message'], 0, 100) . "...";
			}
			if($row['status'] == 3 || $row['status'] == 4){
				
				// readable text status
				if($row['status'] == '3'){ $row['status'] = 'Resolved'; }
				elseif($row['status'] == '4'){ $row['status'] = 'Progress'; }

				// datetime with @strtime
				$row['mdate'] = $row['updated'];
				
				// readable datetime
				$row['updated'] = gmdate("Y-m-d H:i", $row['updated'] + (3600*8));
				
				// readable pole name
				$pole = $this->get_pole_id($row['pole']);
				
				if(isset($pole['name'])){
					$row['polename'] = ($pole['name'] == '') ? "" : $pole['name'];
				}
				
				else{
					$row['polename'] = "";
				}
				$arr[] = $row;
			}
		}
		return $arr;
	}
	
	public function show_issue_by_id($id){
		$query = $this->db->query("SELECT * FROM messages WHERE id='$id';");
		$row = $query->fetch_assoc();
		if(!isset($row['id'])){
			$row['id'] = '';
			$row['status'] = '';
			$row['icon'] = '';
			$row['message'] = 'No issue registered in this reference #' . $id;
			$row['updated'] = '';
		}
		else{
			$row['status'] = $this->get_status($row['status']);
			$row['icon'] = ($row['status'] == 'Solved') ? 'check' : 'history';
			$row['updated'] = gmdate('d/m/Y h:i A', $row['updated'] + (3600*8));
			$pole = $this->get_pole_id($row['pole']);
			if(isset($pole['name']) && $pole['name'] != ""){
				$row['polename'] = $pole['name'];
				$row['poleplace'] = $pole['place'];
			}
			else{
				$row['polename'] = "Unknown";
				$row['poleplace'] = "Unknown";
			}
		}
		return $row;
	}
	
	private function get_status($status_number){
		$arr = array('Unread', 'Read', 'Unresolved', 'Resolved', 'Progress');
		return $arr[$status_number];
	}
}
