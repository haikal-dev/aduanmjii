<?php

class issue extends Controller
{
	public function index(){
		
	}
	
	public function show($id = 'all', $page = '1'){
		$app = $this->model("config");
		$issue = $this->model("IssueModel");
		
		// GLOBAL: manage recent reports
		$recent_reports = $issue->get_unread_report();
		$app->set('number_of_recent_report', count($recent_reports));
		$app->set('recent_reports', $recent_reports);
		
		if($id == 'all'){
			$app->set('title', "Issues");
			
			// manage table
			$app->set('manageTable', true);
			
			// navigations
			$app->set('navigations', [
				["title" => "Home", "url" => $app->load()['url']],
				["title" => "Issues"]
			]);

			// $app->set('issues', $issue->show_issue_all());
			$app->set('issues', $issue->show_issue_by_pagination($page));
			$app->set('paginate', $issue->paginate);
			$this->view("issues_all_1", $app->load());
		}
		
		else {
			$current_issue = $issue->show_issue_by_id($id);
			if(!isset($current_issue['id'])){
				header("location: /issue/show/all");
			}
			else{
				if($current_issue['id'] == ""){
					header("location: /issue/show/all");
				}
				else{
					// navigations
					if($current_issue['status'] == 'Unread'){
						header("location: /admin/login");
					}

					else {
						$app->set('navigations', [
							["title" => "Home", "url" => $app->load()['url']],
							["title" => "Issue", "url" => $app->load()['url'] . "/issue/show/all"],
							["title" => "#" . $current_issue['id']]
						]);
						
						$app->set('title', "Issue #" . $current_issue['id']);
						$app->set('issue', $current_issue);
						//$app->debug();
						
						$this->view('issue', $app->load());
					}
					
				}
			}
		}
	}
}