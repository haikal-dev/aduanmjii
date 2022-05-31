<?php

class api extends Controller
{
	public function index(){
		http_response_code(403);
	}

	public function data_report_statistics(){
		require_once "../app/models/IssueModel.php";
		$issue = new IssueModel();
		$data = $issue->get_report_statistic();

		header('Content-type: application/json');
		echo json_encode(['message' => $data], JSON_PRETTY_PRINT);
	}
	
	public function announcement($page = 'index'){
		if(isset($_SESSION['session']) && $_SESSION['session'] == 'admin'){
			
			// API -> Announcement
			if($page == 'index'){
				echo "<code>// api -> announcement</code>";
			}
			
			// doCreate
			elseif($page == 'doCreate') {
				$data = file_get_contents("php://input");
				$data = json_decode($data, true);
				if(!isset($data['title']) || !isset($data['message']) || !isset($data['saveas'])){
					echo json_encode(["message" => "Parameter error"]);
				}
				else {
					require_once "../app/models/Announcement.php";
					$announce = new \haikal\Announcement();
					if($announce->doCreate($data['title'], $data['message'], $data['saveas'])){
						echo json_encode(["message" => "ok"]);
					}
					else {
						echo json_encode(["message" => "SQL Error"]);
					}
				}
			}
			
			// doRemove
			elseif($page == 'doRemove'){
				$data = file_get_contents("php://input");
				$data = json_decode($data, true);
				if(!isset($data['id'])){
					http_response_code(404);
				}
				
				else {
					require_once "../app/models/Announcement.php";
					$announce = new \haikal\Announcement();
					
					if($announce->remove($data['id'])){
						echo json_encode(["message" => "ok"]);
					}
					
					else {
						echo json_encode(["message" => "SQL Error"]);
					}
				}
			}
			
			// doEdit
			elseif($page == 'doEdit') {
				$data = file_get_contents("php://input");
				$data = json_decode($data, true);
				if(!isset($data['title']) || !isset($data['message']) || !isset($data['saveas']) || !isset($data['id'])){
					echo json_encode(["message" => "Parameter error"]);
				}
				else {
					require_once "../app/models/Announcement.php";
					$announce = new \haikal\Announcement();
					if($announce->doEdit($data['id'], $data['title'], $data['message'], $data['saveas'])){
						echo json_encode(["message" => "ok"]);
					}
					else {
						echo json_encode(["message" => "SQL Error"]);
					}
				}
			}
			
			// Show
			elseif($page == 'show'){
				if(isset($_GET['id'])){
					require_once "../app/models/Announcement.php";
					$announce = new \haikal\Announcement();
					echo json_encode($announce->getPost($_GET['id']));
				}
			}
			
			// doList
			elseif($page == 'doList'){
				require_once "../app/models/Announcement.php";
				$announce = new \haikal\Announcement();
				echo json_encode(["data" => $announce->doList()]);
			}
		}
		else {
			http_response_code(404);
		}
	}
}