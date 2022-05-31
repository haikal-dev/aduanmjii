<?php

class Network extends Controller
{
	public function index(){
		
	}
	
	/* public function battery($page = 'index'){
		
		// ---------------------------------------------------------
		// 		Page: Index
		// ---------------------------------------------------------
		if($page == 'index'){
			
		}
		
		// ---------------------------------------------------------
		// 		Page: Update
		// ---------------------------------------------------------
		elseif($page == 'update'){
			if(isset($_GET['id']) && isset($_GET['voltage'])){
				echo "ok";
			}
		}
	} */
	
	/* public function radius($page = 'index', $action = 'index'){
		
		// ---------------------------------------------------------
		// 		Configurations
		// ---------------------------------------------------------
		$issue = $this->model('IssueModel');
		$radius = $this->model("Radius");
		$config = array(
			'title' => 'Radius',
			'info_number' => $issue->show_notification_number(),
			'notifications' => $issue->get_unread_report()
		);
		
		// issues
		$info = $this->model('InfoModel');			
		$this->view('header', $config['title']);
		$this->view('sidebar');
		$this->view('navbar', $config);
		
		// ---------------------------------------------------------
		// 		Pages
		// ---------------------------------------------------------
		if($page == 'users'){
			$paging = (isset($_GET['page'])) ? $_GET['page'] : 1;
			$radius->users_simplified($paging);
			$radius->data['page'] = "radius_users";
		}
		
		elseif($page == 'sessions'){
			//$radius->user_sessions();
			$radius->data['page'] = "radius_user_sessions";
		}
		
		else{
			$radius->data['ok'] = "404";
		}
		
		
		// ---------------------------------------------------------
		// 		Views
		// ---------------------------------------------------------
		$data = $radius->data;		
		if($data['ok'] == "OK"){
			$this->view($data['page'], $data);
		}
		
		elseif($data['ok'] == "ERR_CONN"){
			$this->view("radius_error");
		}
		
		elseif($data['ok'] == "404"){
			$this->view("radius_404");
		}
		
		$this->view('footer');
	} */
	
	public function connect(){
		header("Access-Control-Allow-Origin: *");
		header("Access-Control-Allow-Headers: *");
		header("Content-Type: application/json");
		$json = ['status' => 'connected'];
		echo json_encode($json, JSON_PRETTY_PRINT);
	}
}