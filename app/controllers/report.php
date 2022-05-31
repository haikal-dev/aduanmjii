<?php

class report extends Controller
{
	public function index(){
		header("location: /report/create");
	}

	public function whatsapp(){
		header("location: https://api.whatsapp.com/send?phone=601115341134");
	}
	
	public function create(){
		$app = $this->model("config");
		$issue = $this->model("IssueModel");

		if(!isset($_GET['mode'])){
			$this->view('mode_report', $app->load());
		}

		else {
			
			if($_GET['mode'] == 'whatsapp'){
				header("location: /report/whatsapp");
			}

			else {
				$app->set("title", "Report");
			
				// manage recent reports
				$recent_reports = $issue->get_unread_report();
				$app->set('number_of_recent_report', count($recent_reports));
				$app->set('recent_reports', $recent_reports);
				
				// Show list poles
				$app->set('poles', $issue->list_pole());
				
				if(isset($_GET['submit'])){
					$data = file_get_contents("php://input");
					$data = json_decode($data, true);
					if(isset($data['name']) && isset($data['memberid']) && isset($data['roomno']) && isset($data['phone']) && isset($data['pole']) && isset($data['message'])){
						
						extract($data);
						$update_data = $issue->register_new_report([
							"name" => $name,
							"memberid" => $memberid,
							"roomno" => $roomno,
							"phone" => $phone,
							"pole" => $pole,
							"message" => $message
						]);
						if($update_data){
							echo 'ok';
						}
						else {
							echo json_encode(["status" => "xok", "message" => "fail to communicate to server"]);
						}
					}
					else{
						header("location: /report/create");
					}
				}
				else {
					// navigations
					$app->set('navigations', [
						["title" => "Home", "url" => $app->load()['url']],
						["title" => "Create Report"]
					]);
					$this->view('create_report1', $app->load());
				}
			}
			
			
		}
		
	}
}